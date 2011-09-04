<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/referrer.php,v 1.16 2004/10/17 01:37:35 olliver Exp $
 *
 * Copyright (C) 2001-2004, the BBClone Team (see file doc/authors.txt
 * distributed with this library)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * See doc/copying.txt for details
 */

// referer stats
function bbc_update_referer_stat($referer) {
  global $access;

  $referer_light = substr(strstr($referer, "://"), 3);

  if (empty($referer_light)) {
    $access['referer']['not_specified'] = !isset($access['referer']['not_specified']) ? 1 :
                                          ++$access['referer']['not_specified'];
    return;
  }

  if (($qm = strpos($referer_light, "?")) !== false) $referer_light = substr($referer_light, 0, $qm);
  if ((($parent = dirname($referer_light)) == ".") || ($parent === false)) {
    $referer_light = ((strlen($referer_light) - 1) === strrpos($referer_light, "/")) ? $referer_light :
                       $referer_light."/";
  }
  else $referer_light = $parent."/";

  // compare whether we got a "www.*" equivalent recorded (or missing)
  $prefix = substr($referer_light, 0, ($tmp = strpos($referer_light, ".")));
  $suffix = substr($referer_light, ++$tmp);
  $result = ($prefix != "www") ? "www.".$referer_light : $suffix;
  // patterns for old records without trailing slashes
  $ref_no_slash = substr($referer_light, 0, (strlen($referer_light) - 1));
  $res_no_slash = substr($result, 0, (strlen($result) - 1));

  // neither recorded with "www." nor without, seems to be our 1st visit ;)
  if ((!isset($access['referer'][$referer_light])) && (!isset($access['referer'][$result]))) {
    $access['referer'][$referer_light] = 1;
  }
  // if there are old records without trailing slashes we will add them to our score too...
  elseif ((!isset($access['referer'][$referer_light])) && (isset($access['referer'][$result]))) {
    if (isset($access['referer'][$res_no_slash])) {
      $access['referer'][$result] += $access['referer'][$res_no_slash];

      unset($access['referer'][$res_no_slash]);
    }
    $access['referer'][$result]++;
  }
  // same here...
  elseif ((isset($access['referer'][$referer_light])) && (!isset($access['referer'][$result]))) {
    if (isset($access['referer'][$ref_no_slash])) {
      $access['referer'][$referer_light] += $access['referer'][$ref_no_slash];

      unset($access['referer'][$ref_no_slash]);
    }
    $access['referer'][$referer_light]++;
  }
  // Now we got both of them, let's continue with the one we got most of
  else {
    if ($access['referer'][$referer_light] < $access['referer'][$result]) {
      $access['referer'][$result] += $access['referer'][$referer_light];

      unset($access['referer'][$referer_light]);

      $access['referer'][$result]++;
    }
    else {
      $access['referer'][$referer_light] += $access['referer'][$result];

      unset($access['referer'][$result]);

      $access['referer'][$referer_light]++;
    }
  }
}

function bbc_fix_refer_stat($refsum) {
  global $access;

  $access['bugs']['ref_fix'] = 1;
  $access['referer']['not_specified'] = $access['stat']['totalcount'] - $refsum + $access['referer']['not_specified'];
}

function bbc_get_sep($query, $array) {
  // puts the query into an array

  foreach ($array as $match) {
    $has_sep = (strpos($query, $match) !== false) ? true : false;
    $pool = $has_sep ? explode($match, $query) : array($query);

    for ($i = 0, $max = count($pool); $i < $max; $i++) {
      // unsafe decoded characters could hose our stats
      $pool[$i] = preg_replace("%^[\'\"<>@\^\!\?/\(\)\[\]\{\}|+*~#;,.:_\-]+%", "", $pool[$i]);
      $pool[$i] = preg_replace("%[\'\"<>@\^\!\?/\(\)\[\]\{\}|+*~#;,.:_\-]+$%", "", $pool[$i]);

      if (empty($pool[$i]) || (strlen($pool[$i]) < 3)) {
        unset($pool[$i]);
        continue;
      }
    }
    if ($has_sep) return array_values($pool);
  }
  return array_values($pool);
}

function bbc_get_search($array) {
  // turns variable assignments to an associative array
  $query = array(
    "^as_(ep|o|e)?q=", "^q(_(a(ll|ny)|phrase|not)|t|u(ery)?)?=", "^s(u|2f|p\-q|earch(_?for)?|zukaj)?=",
    "^k(w|e(reses|y(word)?s?))=", "^b(egriff|uscar?)=", "^w(d|ords?)?=", "^te(rms?|xt)=", "^mi?t=", "^heureka=",
    "^p=", "^r(eq)?=", "/search/web/", "^v[aeop]="
  );

  foreach ($array as $string) {
    $string = urldecode($string);
    // skip empty GET variables
    if (substr($string, (strlen($string) - 1)) == "=") continue;

    foreach ($query as $key) {
      preg_match(":$key:", $string, $matches);
      if (count($matches) == 0) continue;

      $par = $matches[0];
      $pos = strpos($string, $par);
      $term = substr($string, ($pos + strlen($par)));

      if (strlen($term) < 3) continue;
      return $term;
    }
  }
  return false;
}

function bbc_get_keywords($ref) {
  global $access;

  $var_sep =  array("&amp;", "&", "|");
  $word_sep = array( "+", " ", "/");
  $match = array(
    "ara", "busca", "pesquis", "search", "srch", "seek", "zoek", "result", "szuka", "cherch", "such", "find",
    "trouve", "trova", "pursuit", "keres", "katalogus", "alltheinternet.com", "mamma.com", "baidu.com", "heureka.hu",
    "kartoo.com", "ask.com", "aport.ru", "google", "yahoo"
  );

  foreach ($match as $key) {
    // if string occurs at the beginning strpos() returns integer 0, if it can't be
    // found at all, however, it returns boolean false => definition required which
    // considers 0 as true
    $is_search = (strpos(strtolower($ref), $key) !== false) ? true : false;
    if ($is_search) break;
  }

  if (!$is_search) return false;

  $ref = urldecode($ref);
  $is_query = strrpos($ref, "?");
  $ref = ($is_query !== false) ? substr($ref, ++$is_query) : substr($ref, (strpos($ref, "://") + 3));
  $get_vars = bbc_get_sep($ref, $var_sep);
  $raw_search = bbc_get_search($get_vars);

  if ($raw_search === false) return false;

  // Conversion of keywords, if applicable
  $from = function_exists("mb_detect_encoding") ? bbc_get_encoding($raw_search) : false;
  $raw_search = (($from !== false) || function_exists("recode_string")) ? bbc_convert_lang($raw_search, $from) :
                $raw_search;

  foreach (bbc_get_sep($raw_search, $word_sep) as $key) {
    $key = strtolower($key);

    // Filter search engine cache indicator
    if ((strlen($key) > 50) || (strlen($key) < 3) ||
        (preg_match("#^(cache|tbn)\:[a-z0-9_\-]{8,16}\:#", $key))) continue;

    $key = bbc_clean($key);

    if (!isset($access['key'][$key])) $access['key'][$key] = 0;

    $access['key'][$key]++;
  }
}
?>