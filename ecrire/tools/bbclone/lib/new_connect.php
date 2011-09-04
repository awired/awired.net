<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/new_connect.php,v 1.18 2004/10/11 11:32:36 olliver Exp $
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

// fallback in case something can't be resolved
function bbc_legacy_ext($ext) {
  $gen_ext = array(
    "ac", "ad", "ae", "af", "ag", "ai", "al", "am", "an", "ao", "aq", "ar", "arpa", "as", "at", "au", "aw", "az", "ba",
    "bb", "bd", "be", "bf", "bg", "bh", "bi", "biz", "bj", "bm", "bn", "bo", "br", "bs", "bt", "bv", "bw", "by", "bz",
    "ca", "cc", "cd", "cf", "cg", "ch", "ci", "ck", "cl", "cm", "cn", "co", "com", "coop", "cr", "cu", "cv", "cx",
    "cy", "cz", "de", "dj", "dk", "dm", "do", "dz", "ec", "edu", "ee", "eg", "er", "es", "et", "fi", "fj", "fk", "fm",
    "fo", "fr", "ga", "gb", "gd", "ge", "gf", "gg", "gh", "gi", "gl", "gm", "gn", "gov", "gp", "gq", "gr", "gs", "gt",
    "gu", "gw", "gy", "hk", "hm", "hn", "hr", "ht", "hu", "id", "ie", "il", "im", "in", "info", "int", "io", "iq",
    "ir", "is", "it", "je", "jm", "jo", "jp", "ke", "kg", "kh", "ki", "km", "kn", "kr", "kw", "ky", "kz", "la", "lb",
    "lc", "li", "lk", "lr", "ls", "lt", "lu", "lv", "ly", "ma", "mc", "md", "mg", "mh", "mil", "mk", "ml", "mm", "mn",
    "mo", "mp", "mq", "mr", "ms", "mt", "mu", "museum", "mv", "mw", "mx", "my", "mz", "na", "name", "nc", "ne", "net",
    "nf", "ng", "ni", "nl", "no", "np", "nr", "nu", "nz", "om", "org", "pa", "pe", "pf", "pg", "ph", "pk", "pl", "pm",
    "pn", "pr", "ps", "pt", "pw", "py", "qa", "re", "ro", "ru", "rw", "sa", "sb", "sc", "sd", "se", "sg", "sh", "si",
    "sj", "sk", "sl", "sm", "sn", "so", "sr", "st", "su", "sv", "sy", "sz", "tc", "td", "tf", "tg", "th", "tj", "tk",
    "tm", "tn", "to", "tp", "tr", "tt", "tv", "tw", "tz", "ua", "ug", "uk", "um", "us", "uy", "uz", "va", "vc", "ve",
    "vg", "vi", "vn", "vu", "wf", "ws", "ye", "yt", "yu", "za", "zm", "zr", "zw"
  );

  if (preg_match(":^[0-9]+$:", $ext)) return "numeric";
  elseif (!in_array($ext, $gen_ext)) return "unknown";
  else return $ext;
}

function bbc_get_extension($host, $addr) {
  global $BBC_IP2EXT_PATH;

  $file = $BBC_IP2EXT_PATH.(substr($addr, 0, strpos($addr, ".")).".inc");
  $ext = strtolower(substr($host, (strrpos($host, ".") + 1)));

  if (!is_readable($file)) return bbc_legacy_ext($ext);

  $long = ip2long($addr);
  $long = ($long < 0) ? sprintf("%u", $long) : $long;
  $fp = fopen($file, "r");

  while (($range = fgetcsv($fp, 32, "|")) !== false) {
    if (($long >= $range[1]) && ($long <= ($range[1] + $range[2] - 1))) {
      // don't hose our stats with unexpected extensions
      $db_ext = (bbc_legacy_ext($range[0]) != "unknown") ? $range[0] : bbc_legacy_ext($ext);
      break;
    }
  }
  fclose($fp);
  // if $db_ext is empty it means the ip couldn't be found in our database
  return (!empty($db_ext) ? $db_ext : bbc_legacy_ext($ext));
}

function bbc_update_connect($connect) {
  global $BBC_LIB_PATH;

  // Sanity check has already been made in mark_page.php
  foreach (array("browser", "os", "robot") as $i) require($BBC_LIB_PATH.$i.".php");

  $connect['visits'] = 1;

  // Detecting robots, browsers and os
  foreach (array("robot", "browser", "os") as $rule) {
    reset($$rule);

    while (list(${$rule."_name"}, ${$rule."_elem"}) = each($$rule)) {
      reset(${$rule."_elem"}['rule']);

      while (list($pattern, $note) = each(${$rule."_elem"}['rule'])) {
        // eregi() is intentionally used because some php installations don't
        // know the "i" switch of preg_match() and would generate phony compile
        // error messages
        if (!eregi($pattern, $connect['agent'], $regs)) continue;

        $connect[$rule] = ${$rule."_name"};

        if (preg_match(":\\\\[0-9]{1}:" ,$note)) {
          $str = preg_replace(":\\\\([0-9]{1}):", "\$regs[\\1]", $note);

          eval("\$str = \"$str\";");

          $connect[$rule."_note"] = $str;
        }
        break 2;
      }
    }
    if (!empty($connect['robot'])) break;
  }
  return $connect;
}

function bbc_update_access($connect) {
  global $access;

  // Assign an identification number to the new connection
  $connect['id'] = isset($access['stat']['totalcount']) ? ($access['stat']['totalcount'] + 1) : 1;

  // Recording the detected extension in the global statistics
  $access['stat']['ext'][$connect['ext']] = !isset($access['stat']['ext'][$connect['ext']]) ? 1 :
                                            ++$access['stat']['ext'][$connect['ext']];

  foreach (array("robot", "browser", "os") as $type) {
    if (($type == "robot") && (empty($connect[$type]))) continue;

    if (isset($access['stat'][$type][$connect[$type]])) $access['stat'][$type][$connect[$type]]++;
    else $access['stat'][$type][$connect[$type]] = 1;

    if (($type == "robot") && (!empty($connect[$type]))) break;
  }
  return $connect;
}
?>