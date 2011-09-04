<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/log_processor.php,v 1.84 2004/10/11 11:32:36 olliver Exp $
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

// Checking where we came from
if (!defined("_MARK_PAGE")) return;

// used by usort()
function bbc_sort_time_sc($row_a, $row_b) {
  if ($row_a['time'] == $row_b['time']) return 0;
  return ($row_a['time'] > $row_b['time'] ) ? 1 : -1;
}

// return the key of a value
function bbc_get_key($array, $str) {
  reset($array);

  while (list($idx, $val) = each($array)) {
    if ($val == $str) return $idx;
  }
  return 0;
}

// purge host and referrer stats at request
function bbc_purge_single() {
  global $access;

  foreach (array("host", "key", "referer") as $cat) {
    reset($access[$cat]);

    while (list($key, $score) = each($access[$cat])) {
      if ($score == 1) {
        unset($access[$cat][$key]);
        ($cat == "referer") ? ++$access[$cat]['not_specified'] : "";
      }
    }
  }
}

// records the hosts that visited us most. Note, that we only pick up hostnames and strip
// any sort of prefix because else the listing would become rather useless
function bbc_update_host_stat($client) {
  global $access, $BBC_IGNORE_BOTS;

  if ((empty($BBC_IGNORE_BOTS)) || (!isset($client['robot']))) {
    $is_num = ($client['dns'] == $client['ip']) ? 1 : 0;
    $host = (!$is_num) ? explode(".", strtolower($client['dns'])) : trim(substr($client['ip'], 0,
             strrpos($client['ip'], "."))).".&nbsp;-";
    $parts = (!$is_num) ? count($host) : 0;
    // these ones can have less than 3 characters as hostname
    $glob = array("org", "com", "edu", "mil", "net", "gov", "int");

    if ($parts > 2) {
      $host = ((!in_array(trim($host[($parts - 1)]), $glob)) && (((strlen(trim($host[($parts - 2)])) < 3)) ||
              (in_array($host[($parts - 2)], $glob)))) ?
              trim(implode(".", array_splice($host, -3))) : trim(implode(".", array_splice($host, -2)));
    }
    else $host = (!$is_num) ? trim(implode(".", $host)) : $host;
  }

  if ((empty($BBC_IGNORE_BOTS)) || (!isset($client['robot']))) {
    if (!isset($access['host'][$host])) $access['host'][$host] = 0;
    $access['host'][$host]++;
  }

  if (isset($access['host']['not_specified'])) unset($access['host']['not_specified']);
}

// the listing of the visited pages
function bbc_update_visits($time, $page, $nr) {
  global $BBC_MAXVISIBLE, $last;

  $lv = count($last['traffic'][$nr]['views']) - 1;
  $last_time = substr($last['traffic'][$nr]['views'][$lv], 0, strpos($last['traffic'][$nr]['views'][$lv], "|"));
  $last_cnt = substr($last['traffic'][$nr]['views'][$lv], (strrpos($last['traffic'][$nr]['views'][$lv], "|") + 1));
  $last_page = substr($last['traffic'][$nr]['views'][$lv], (strpos($last['traffic'][$nr]['views'][$lv], "|") + 1));
  $last_page = substr($last_page, 0, strpos($last_page, "|"));
  $last['traffic'][$nr]['off'] = !empty($last['traffic'][$nr]['off']) ? $last['traffic'][$nr]['off'] : 0;

  if ((empty($last['traffic'][$nr]['views'])) || (!is_array($last['traffic'][$nr]['views']))) return;

  if (intval($last_page) === intval($page)) {
    $last['traffic'][$nr]['views'][$lv] = "$last_time|$last_page|".++$last_cnt;
    $last['traffic'][$nr]['off']++;
  }
  else $last['traffic'][$nr]['views'][] = "$time|$page|1";

  sort($last['traffic'][$nr]['views']);

  // number of elements to be removed with array_splice() if necessary
  $lv = count($last['traffic'][$nr]['views']) - 1;
  $del = (($lv + 1) > $BBC_MAXVISIBLE) ? (($lv + 1) - $BBC_MAXVISIBLE) : false;
  $last['traffic'][$nr]['views'] = ($del !== false) ? array_splice($last['traffic'][$nr]['views'], $del) :
                                     $last['traffic'][$nr]['views'];
}

// The most visited pages ranking
function bbc_update_page_stats($connect) {
  global $access, $last;

  $long_page = $connect['page'];
  $over_60 = (strlen($long_page) > 60) ? 1 : 0;
  $connect['page'] = $over_60 ? "...".substr($long_page, -57) : $long_page;

  if (($over_60) && (isset($access['page'][$long_page]['count']))) {
    $access['page'][($connect['page'])]['count'] = $access['page'][$long_page]['count'];
    $access['page'][($connect['page'])]['uri'] = $access['page'][$long_page]['uri'];
    unset($access['page'][$long_page]);
  }

  if (!isset($access['page'][($connect['page'])]['count'])) {
    $access['page'][($connect['page'])]['count'] = 0;
  }

  $access['page'][($connect['page'])]['count']++;
  $access['page'][($connect['page'])]['uri'] = $connect['uri'];

  $last['pages'] = ((empty($last['pages'])) || (!is_array($last['pages']))) ? array() : $last['pages'];

  if (($over_60) && (in_array($long_page, $last['pages']))) {
    $last['pages'][bbc_get_key($last['pages'], $long_page)] = $connect['page'];
  }
  if (!in_array($connect['page'], $last['pages'])) $last['pages'][] = $connect['page'];

  $connect['page'] = bbc_get_key($last['pages'], $connect['page']);

  if (isset($connect['uri'])) unset($connect['uri']);

  return $connect;
}

// Transfer the raw data from the main counters of var into $last.
// Any new data (more recent than $BBC_MAXTIME) is used in the global stats
function bbc_add_new_connections_to_old() {
  global $BBC_IGNORE_AGENT, $BBC_IGNORE_BOTS, $BBC_MAXTIME, $BBC_MAXVISIBLE, $BBC_NO_DNS, $BBC_NO_HITS,
         $BBC_PURGE_SINGLE, $access, $last;

  // Checking whether we have new connections
  if (!$new_access = bbc_counter_to_array()) return false;

  // cleanup if requested
  !empty($BBC_PURGE_SINGLE) ? bbc_purge_single() : "";

  ((!empty($access['time'])) && (is_array($access['time']))) ? bbc_time_offset() : "";

  // Upgrade from older versions. We need to erase the "last" data.
  if (isset($access['last'])) unset($access['last']);

  //check for broken 0.4.2 referrer counting and apply fix if necessary
  if (isset($access) && isset($access['referer']['not_specified']) && !isset($access['bugs']['ref_fix'])) {
    bbc_fix_refer_stat(array_sum($access['referer']));
  }

  // fix wrong browser assignments
  foreach (array("java", "wwwc", "libwww") as $what) {
    if (isset($access) && isset($access['stat']['browser'][$what])) {
      $access['stat']['robot'][$what] = $access['stat']['browser'][$what];
      $access['stat']['os']['other'] -= $access['stat']['robot'][$what];

      unset($access['stat']['browser'][$what]);
    }
  }

  $nb_new_access = ((!empty($new_access)) && (is_array($new_access))) ? count($new_access) : 0;
  $nb_last_access = ((!empty($last['traffic'])) && (is_array($last['traffic']))) ? count($last['traffic']) : 0;

  foreach ($new_access as $connect) {
    $connect = bbc_update_connect($connect);

    // the "last reset on" flag initialisation
    if ((!isset($access['time'])) && (!isset($access['time']['reset']))) {
      $access['time']['reset'] = $connect['time'];
    }

    // Stop processing if bots are completely ignored
    if ((!empty($BBC_IGNORE_BOTS)) && ($BBC_IGNORE_BOTS == 2)) {
      if (!empty($connect['robot'])) {
        --$nb_new_access;
        continue;
      }
    }
    // Omit referrer spam coming from robots
    $connect['referer'] = !empty($connect['robot']) ? "unknown" : $connect['referer'];

    $this_connect = $connect['time'];
    $last_connect = !empty($access['time']['last']) ? $access['time']['last'] : 0;

    // Hits as base for time stats if desired
    if (empty($BBC_NO_HITS)) bbc_update_time_stat($this_connect, $last_connect);

    // The script viewed
    $connect = isset($connect['page']) ? bbc_update_page_stats($connect) : $connect;
    $prev_recorded = 0;

    // Check if a similar connection has been recorded yet
    for($l = $nb_last_access - 1; ($l >= 0) && (($connect['time'] - $last['traffic'][$l]['time']) < $BBC_MAXTIME);
        $l--) {
      if (!empty($BBC_IGNORE_AGENT) ? ($connect['ip'] == $last['traffic'][$l]['ip']) :
          (($connect['ip'] == $last['traffic'][$l]['ip']) && ($connect['agent'] == $last['traffic'][$l]['agent']))) {
        $last['traffic'][$l]['time'] = $this_connect;
        $last['traffic'][$l]['visits']++;
        $access['stat']['totalvisits']++;

        ($BBC_MAXVISIBLE > 0) ? bbc_update_visits($connect['time'], $connect['page'], $l) : "";

        $prev_recorded = 1;
        break;
      }
    }

    // Add new connection if it hasn't been recorded yet
    if (!$prev_recorded) {
      if (empty($access['stat']['totalvisits'])) $access['stat']['totalvisits'] = 0;
      if (empty($access['stat']['totalcount'])) $access['stat']['totalcount'] = 0;

      $connect['dns'] = !empty($BBC_NO_DNS) ? $connect['ip'] : bbc_clean(gethostbyaddr($connect['ip']));
      $connect['ext'] = bbc_get_extension($connect['dns'], $connect['ip']);

      $last['traffic'][$nb_last_access] = bbc_update_access($connect);
      // Visit stats
      $last['traffic'][$nb_last_access]['views'][] = $last['traffic'][$nb_last_access]['time']."|"
                                                    .$last['traffic'][$nb_last_access]['page']."|1";
      // Ugly hack to avoid duplicate entries
      if (isset($last['traffic'][$nb_last_access]['page'])) unset($last['traffic'][$nb_last_access]['page']);

      $access['stat']['totalvisits']++;
      $access['stat']['totalcount']++;
      $nb_last_access++;

      // Unique visits as base for time stats if desired
      if (!empty($BBC_NO_HITS)) bbc_update_time_stat($this_connect, $last_connect);

      // The referer list is update according to this new visit
      if (isset($connect['referer'])) {
        bbc_update_referer_stat($connect['referer']);
        bbc_get_keywords($connect['referer']);
      }

      // The host listing
      if ((isset($connect['dns'])) && (isset($connect['ip']))) {
        bbc_update_host_stat($last['traffic'][$nb_last_access - 1]);
      }
    }
  }
  return $nb_new_access;
}

// Removed unnecessary connections from $last, namely those after the $BBC_MAXVISIBLE more recent
// and older than time() - $BBC_MAXTIME.
function bbc_update_last_access() {
  global $last, $BBC_MAXTIME, $BBC_MAXVISIBLE, $BBC_TIMESTAMP, $BBC_TIME_OFFSET;

  if (($BBC_MAXVISIBLE <= 0) || (empty($last['traffic'])) || (!is_array($last['traffic']))) {
    $last['traffic'] = array();
    return;
  }
  else {
    $nb_connect = count($last['traffic']);
    $ctime = $BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60);

    for ($k = $nb_connect - 1 - $BBC_MAXVISIBLE; $k >= 0; $k--) {
      if (($ctime - $last['traffic'][$k]['time']) > $BBC_MAXTIME) unset($last['traffic'][$k]);
    }
    usort($last['traffic'],"bbc_sort_time_sc");
  }
}
?>