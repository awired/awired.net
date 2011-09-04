<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_global.php,v 1.72 2004/10/17 01:37:34 olliver Exp $
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

// Check for PHP 4.0.3 or older
if (!function_exists("array_sum")) exit("<hr /><b>Error:</b> PHP ".PHP_VERSION." is too old for BBClone.");
//elseif (is_readable("constants.php")) require_once("constants.php");
//else return;

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."selectlang.php", $BBC_ACCESS_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

// Auxilliary Functions

// cumulative hits in different periods of time
function bbc_histcalc($array) {
  $result = 0;

  if (is_array($array)) {
    foreach ($array as $val) $result += $val;
  }
  return $result;
}

// This is used in the bbc_show_top_pages to class page with usort().
function bbc_sort_page_count($page_a, $page_b) {
  if ($page_a['count'] === $page_b['count']) return 0;
  return ($page_a['count'] > $page_b['count']) ? -1 : 1;
}

// Referer link generation
function bbc_refgen($ref) {
  global $_;

  if ($ref == "not_specified") $str = "<i>". $_['gstat_Not_specified']."</i>";
  else {
    $ref = (strpos($ref, "://") !== false) ? substr(strstr($ref, "://"), 3) : $ref;
    $ref_name = (($slash = strpos($ref, "/")) !== false) ? substr($ref, 0, $slash) : $ref;
    $str = "<a href=\"http://$ref\">$ref_name</a>";
  }
  return $str;
}

// Summary's header
function bbc_rank_head($cat, $i18n, $flag = 0) {
  global $_;

  return "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\">\n"
        ."<tr>\n"
        ."<td colspan=\"".(!empty($flag) ? 3 : 4)."\" align=\"center\">\n"
        ."<b>".sprintf($_[$i18n], $cat)."</b>\n"
        ."</td>\n"
        ."</tr>\n";
}

function bbc_list_item($icon, $item, $item_score, $total_score) {
  global $BBC_IMAGES_PATH;

  return "<tr>\n"
        .(!empty($icon) ?
         "<td>\n<img src=\"".$BBC_IMAGES_PATH.$icon."\" height=\"14\" width=\"14\" alt=\"".$item."\" title=\""
        .$item."\" />\n</td>\n" : "")
        ."<td>\n"
        .$item."&nbsp;\n"
        ."</td>\n"
        ."<td>\n"
        ."<div align=\"right\">\n"
        .$item_score."&nbsp;\n"
        ."</div>\n"
        ."</td>\n"
        ."<td>\n"
        ."<div align=\"right\">\n"
        .(sprintf("%.2f%%", (round(10000 * $item_score / $total_score) / 100)))."\n"
        ."</div>\n"
        ."</td>\n"
        ."</tr>\n";
  }

// Summary for rankings
function bbc_rank_sum($cat, $flag = 0) {
  global $_;

  return "<tr>\n"
        .(!empty($flag) ? "" : "<td>\n</td>\n")
        ."<td>\n"
        ."<b>".$_['gstat_Total']."</b>\n"
        ."</td>\n"
        ."<td>\n"
        ."<b>$cat&nbsp;</b>\n"
        ."</td>\n"
        ."</tr>\n"
        ."</table>\n";
}

// Main Functions

function bbc_show_access() {
  global $_, $access;

  return "<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"0\">\n"
        ."<tr>"
        ."<td colspan=\"11\" align=\"center\">\n"
        ."<b>".$_['gstat_Accesses']."</b>\n"
        ."</td>"
        ."</tr>\n"
        ."<tr>"
        ."<td>\n".$_['tstat_last_year']."&nbsp;&nbsp;\n</td>\n"
        ."<td align=\"left\">\n<div align=\"right\">\n"
        .(!empty($access['time']['month']) ? bbc_histcalc($access['time']['month'])."\n" : "0\n")
        ."</div>\n</td>"
        ."<td>".str_repeat("&nbsp;", 6)."</td>"
        ."<td>\n".$_['tstat_last_month']."&nbsp;&nbsp;\n</td>\n"
        ."<td align=\"left\">\n<div align=\"right\">\n"
        .((!empty($access['time']['month'])) ? bbc_histcalc($access['time']['day'])."\n" : "0\n")
        ."</div>\n</td>"
        ."<td>".str_repeat("&nbsp;", 6)."</td>"
        ."<td>\n".$_['tstat_last_week']."&nbsp;&nbsp;\n</td>\n"
        ."<td align=\"left\">\n<div align=\"right\">\n"
        .(!empty($access['time']['wday']) ? bbc_histcalc($access['time']['wday'])."\n" : "0\n")
        ."</div>\n</td>"
        ."<td>".str_repeat("&nbsp;", 6)."</td>"
        ."<td>\n".$_['tstat_last_day']."&nbsp;&nbsp;\n</td>\n"
        ."<td align=\"left\">\n<div align=\"right\">\n"
        .(!empty($access['time']['wday']) ? bbc_histcalc($access['time']['hour'])."\n" : "0\n")
        ."</div></td>"
        ."</tr>\n"
        ."<tr>"
        ."<td colspan=\"3\">&nbsp;</td>"
        ."<td>\n<b>".$_['gstat_Total_visits']."</b>&nbsp;&nbsp;\n"."</td>\n"
        ."<td align=\"left\">\n<div align=\"right\">\n<b>"
        .(!empty($access['stat']['totalvisits']) ? $access['stat']['totalvisits']."\n" : "0\n")
        ."</b></div>\n</td>"
        ."<td>".str_repeat("&nbsp;", 6)."</td>"
        ."<td>\n<b>".$_['gstat_Total_unique']."</b>&nbsp;&nbsp;\n</td>\n"
        ."<td align=\"left\">\n<div align=\"right\">\n<b>"
        .(!empty($access['stat']['totalcount']) ? $access['stat']['totalcount']."\n" : "0\n")
        ."</b></div>\n</td>"
        ."<td colspan=\"3\">&nbsp;</td>"
        ."</tr>\n"
        ."</table>\n";
}

function bbc_show_os() {
  global $_, $access, $BBC_IMAGES_PATH, $BBC_LIB_PATH, $BBC_MAXOS;

  if (is_readable($BBC_LIB_PATH."os.php")) require($BBC_LIB_PATH."os.php");
  else return bbc_mag($BBC_LIB_PATH."os.php");

  $os_tab = isset($access['stat']['os']) ? $access['stat']['os'] : array();

  for ($os_total = 0; list(, $os_score) = each($os_tab); $os_total += $os_score);

  arsort($os_tab);
  reset($os_tab);

  $str = bbc_rank_head($BBC_MAXOS, "gstat_Operating_systems");

  for ($k = 0; (list($os_type, $os_score) = each($os_tab)) && ($k < $BBC_MAXOS); $k++) {
    if (!isset($os[$os_type])) {
      $str.= bbc_list_item("&nbsp;", "&nbsp;", $os_score, $os_total);
      continue;
    }

    $os[$os_type]['title'] = str_replace("other", $_['misc_other'], $os[$os_type]['title']);

    $str .= bbc_list_item("os_".$os[$os_type]['icon'].".png", $os[$os_type]['title'], $os_score, $os_total);
  }

  $str .= bbc_rank_sum($os_total);
  return $str;
}

function bbc_show_browser() {
  global $_, $access, $BBC_IMAGES_PATH, $BBC_LIB_PATH, $BBC_MAXBROWSER;

  if (is_readable($BBC_LIB_PATH."browser.php")) require($BBC_LIB_PATH."browser.php");
  else return bbc_mag($BBC_LIB_PATH."browser.php");

  $browser_tab = isset($access['stat']['browser']) ? $access['stat']['browser'] : array();

  for ($browser_total = 0; list(, $browser_score) = each($browser_tab); $browser_total += $browser_score);

  arsort($browser_tab);
  reset($browser_tab);

  $str = bbc_rank_head($BBC_MAXBROWSER, "gstat_Browsers");

  for ($k = 0; (list($browser_type, $browser_score) = each($browser_tab)) && ($k < $BBC_MAXBROWSER); $k++) {
    if (!isset($browser[$browser_type])) {
      $str.= bbc_list_item("&nbsp;", "&nbsp;", $browser_score, $browser_total);
      continue;
    }

    $browser[$browser_type]['title'] = str_replace("other", $_['misc_other'], $browser[$browser_type]['title']);

    $str.= bbc_list_item("browser_".$browser[$browser_type]['icon'].".png", $browser[$browser_type]['title'],
                     $browser_score, $browser_total);
  }

  $str .= bbc_rank_sum($browser_total);
  return $str;
}

function bbc_show_robot() {
  global $_, $access, $BBC_IMAGES_PATH, $BBC_LIB_PATH, $BBC_MAXROBOT;

  if (is_readable($BBC_LIB_PATH."robot.php")) require($BBC_LIB_PATH."robot.php");
  else return bbc_mag($BBC_LIB_PATH."robot.php");

  $robot_tab = isset($access['stat']['robot']) ? $access['stat']['robot'] : array();

  for ($robot_total = 0; list(,$robot_score) = each($robot_tab); $robot_total += $robot_score);

  arsort($robot_tab);
  reset($robot_tab);

  $str = bbc_rank_head($BBC_MAXROBOT, "gstat_Robots");

  for ($k = 0; (list($robot_type, $robot_score) = each($robot_tab)) && ($k < $BBC_MAXROBOT); $k++) {
    if (!isset($robot[$robot_type])) {
      $str.= bbc_list_item("&nbsp;", "&nbsp;", $robot_score, $robot_total);
      continue;
    }

    $str .= bbc_list_item("robot_".$robot[$robot_type]['icon'].".png", $robot[$robot_type]['title'], $robot_score,
                      $robot_total);
  }

  $str .= bbc_rank_sum($robot_total);
  return $str;
}

function bbc_show_extension() {
  global $_, $access, $BBC_IMAGES_PATH, $BBC_MAXEXTENSION;

  $ext_tab = isset($access['stat']['ext']) ? $access['stat']['ext'] : array();

  for ($ext_total = 0; list(, $ext_score) = each($ext_tab); $ext_total += $ext_score);

  arsort($ext_tab);
  reset($ext_tab);

  $str = bbc_rank_head($BBC_MAXEXTENSION, "gstat_extensions");

  for ($k = 0; (list($ext, $ext_score) = each($ext_tab)) && ($k < $BBC_MAXEXTENSION); $k++) {
    $str .= bbc_list_item("ext_".$ext.".png", $_[$ext], $ext_score, $ext_total);
  }

  $str .= bbc_rank_sum($ext_total);
  return $str;
}

function bbc_show_top_pages() {
  global $_, $access, $BBC_MAXPAGE;

  $page_tab = isset($access['page']) ? $access['page'] : array();

  for ($page_total = 0; list(, $page_elem) = each($page_tab); $page_total += $page_elem['count']);

  uasort($page_tab, "bbc_sort_page_count");
  reset($page_tab);

  $str = bbc_rank_head($BBC_MAXPAGE, "gstat_pages", 1);

  for ($k = 0; (list($page_name, $page_elem) = each($page_tab)) && ($k < $BBC_MAXPAGE); $k++) {
    $page_name = ($page_name == "index") ? $_['navbar_Main_Site'] : $page_name;

    $str .= bbc_list_item("", "<a href=\"".$page_elem['uri']."\">$page_name</a>", $page_elem['count'], $page_total);
  }

  $str .= bbc_rank_sum($page_total, 1);
  return $str;
}

function bbc_show_top_origins() {
  global $_, $access, $BBC_MAXORIGIN;

  $referer_tab = isset($access['referer']) ? $access['referer'] : array();

  for ($referer_total = 0; list(, $referer_score) = each($referer_tab); $referer_total += $referer_score);

  arsort($referer_tab);
  reset($referer_tab);

  $str = bbc_rank_head($BBC_MAXORIGIN, "gstat_origins", 1);

  for ($k = 0; ($k < $BBC_MAXORIGIN) && (list($referer_name, $referer_score) = each($referer_tab)); $k++) {
    $str .= bbc_list_item("", bbc_refgen($referer_name), $referer_score, $referer_total);
  }

  $str .= bbc_rank_sum($referer_total, 1);
  return $str;
}

function bbc_show_top_hosts() {
  global $access, $BBC_MAXHOST;

  $host_tab = isset($access['host']) ? $access['host'] : array();

  for ($host_total = 0; list(, $host_score) = each($host_tab); $host_total += $host_score);

  arsort($host_tab);
  reset($host_tab);

  $str = bbc_rank_head($BBC_MAXHOST, "gstat_hosts", 1);

  for ($k = 0; ($k < $BBC_MAXHOST) && (list($host_name, $host_score) = each($host_tab)); $k++) {
    $str .= bbc_list_item("", "<span class=\"capt\">$host_name</span>", $host_score, $host_total);
  }

  $str .= bbc_rank_sum($host_total, 1);
  return $str;
}

function bbc_show_top_keys() {
  global $_, $access, $BBC_MAXKEY;

  $key_tab = isset($access['key']) ? $access['key'] : array();

  for ($key_total = 0; list(, $key_score) = each($key_tab); $key_total += $key_score);

  arsort($key_tab);
  reset($key_tab);

  $str = bbc_rank_head($BBC_MAXKEY, "gstat_keys", 1);

  for ($k = 0; ($k < $BBC_MAXKEY) && (list($key_name, $key_score) = each($key_tab)); $k++) {
    $str .= bbc_list_item("", "<span class=\"capt\">$key_name</span>", $key_score, $key_total);
  }

  $str .= bbc_rank_sum($key_total, 1);
  return $str;
}

// MAIN

/*
echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    .(isset($access['time']['reset']) ? $bbc_html->last_reset($access['time']['reset']) : "")
    ."<table align=\"center\" border=\"0\" cellpadding=\"9\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_browser()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_os()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_extension()
    ."</td>\n"
    .(((!empty($BBC_IGNORE_BOTS)) && ($BBC_IGNORE_BOTS == 2)) ? "" : "<td valign=\"top\">\n"
    .bbc_show_robot()."</td>\n")
    ."</tr>\n"
    ."</table>\n"
    ."<table align=\"center\" border=\"0\" cellpadding=\"9\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_top_hosts()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_top_pages()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_top_origins()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_top_keys()
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    .bbc_show_access()
    ."<br />\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();

*/
?>