<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_detailed.php,v 1.66 2004/10/17 01:37:34 olliver Exp $
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

foreach (array($BBC_CONFIG_FILE, $BBC_LIB_PATH."selectlang.php", $BBC_LAST_FILE) as $i) {
  if (is_readable($i)) require_once($i);
  else exit(bbc_msg($i));
}

// Functions

// generates the contents of each field in the detailed stats
function bbc_show_connect_field($connect, $field, $lng, $id = 0) {
  global $BBC_IMAGES_PATH, $BBC_LIB_PATH, $bbc_html, $_;

  switch ($field) {
    case "id":
      return "<div align=\"right\">".$connect[$field]."&nbsp;</div>\n";

    case "time":
      return "<div align=\"right\">".str_replace(" ", "&nbsp;", date("j M, H:i:s", $connect['time']))."&nbsp;</div>\n";

    case "visits":
      return "<div align=\"right\"><a href=\"tools.php?p=bbclone&amp;mod=views&amp;id=$id&amp;lng=$lng\">".$connect[$field]
            ."</a>&nbsp;</div>\n";

    case "ext":
      return "<img src=\"".$BBC_IMAGES_PATH."ext_".$connect['ext'].".png\" height=\"14\" width=\"14\" alt=\""
            .$_[$connect['ext']]."\" title=\"".$_[$connect['ext']]."\" />";
    
    /*
    case "dns":
      if (strlen($connect['dns']) > 32) $connect['dns'] = "...".substr($connect['dns'], -29);
      return "&nbsp;".$connect['dns'];
    */
  
    case "dns":
      if (strlen($connect['dns']) > 32) $connect['dns'] = '<abbr title="'.$connect['dns'].'">' .substr($connect['dns'],0 , 29) . "...</abbr>";
      return "&nbsp;".$connect['dns'];
   

    case "referer":
      $str = (strpos($connect['referer'], "://") !== false) ? substr(strstr($connect['referer'], "://"), 3) : "unknown";
      $str = (($slash = strpos($str, "/")) !== false) ? substr($str, 0, $slash) : $str;

      if (trim($str) == "unknown") return "&nbsp;";
      if ((strlen($str)) > 50) $str = "...".substr($str, -47);

      return "&nbsp;<a href=\"".$connect['referer']."\">$str</a>";

    case "browser":
      if (!empty($connect['robot'])) return bbc_show_connect_field($connect, "robot", $lng);

      if (is_readable($BBC_LIB_PATH."browser.php")) require($BBC_LIB_PATH."browser.php");
      else return bbc_mag($BBC_LIB_PATH."browser.php");

      $browser_type = $connect['browser'];

      if (!isset($browser[$browser_type])) return "&nbsp;";

      $browser[$browser_type]['title'] = str_replace("other", $_['misc_other'], $browser[$browser_type]['title']);
      $str = "&nbsp;<img src=\"".$BBC_IMAGES_PATH."browser_".$browser[$browser_type]['icon'].".png"
            ."\" height=\"14\" width=\"14\" alt=\"".$browser[$browser_type]['title']
            ."\" title=\"".$browser[$browser_type]['title']
            ."\" />&nbsp;".str_replace(" ", "&nbsp;", $browser[$browser_type]['title']);
      if (!empty($connect['browser_note'])) $str .= "&nbsp;".$connect['browser_note'];
      return $str;

    case "os":
      if (!empty($connect['robot'])) return bbc_show_connect_field($connect,"robot", $lng);

      if (is_readable($BBC_LIB_PATH."os.php")) require($BBC_LIB_PATH."os.php");
      else return bbc_mag($BBC_LIB_PATH."os.php");

      $os_type = $connect['os'];

      if (!isset($os[$os_type])) return "&nbsp;";

      $os[$os_type]['title'] = str_replace("other", $_['misc_other'], $os[$os_type]['title']);
      $str = "&nbsp;<img src=\"".$BBC_IMAGES_PATH."os_".$os[$os_type]['icon'].".png"
            ."\" height=\"14\" width=\"14\" alt=\"".$os[$os_type]['title']."\" title=\"".$os[$os_type]['title']
            ."\" />";
      //$str .= "&nbsp;".str_replace(" ", "&nbsp;", $os[$os_type]['title']);
      //if (!empty($connect['os_note'])) $str .= "&nbsp;".$connect['os_note'];
      return $str;

    case "robot":
      if (is_readable($BBC_LIB_PATH."robot.php")) require($BBC_LIB_PATH."robot.php");
      else return bbc_msg($BBC_LIB_PATH."robot.php");

      $robot_type = $connect['robot'];

      if (!isset($robot[$robot_type])) return "&nbsp;";

      $str = "&nbsp;<img src=\"". $BBC_IMAGES_PATH."robot_".$robot[$robot_type]['icon'].".png"
            ."\" height=\"14\" width=\"14\" alt=\"".$robot[$robot_type]['title']."\" title=\""
            .$robot[$robot_type]['title']."\" />";
      //$str .= "&nbsp;".str_replace(" ", "&nbsp;", $robot[$robot_type]['title']);
      //if (!empty($connect['robot_note'])) $str .= "&nbsp;".$connect['robot_note'];
      return $str;

    default:
      return $connect[$field];
  }
}

// generates each row of the detailed stats
function bbc_rows_gen() {
  global $_, $BBC_DETAILED_STAT_FIELDS, $BBC_MAXVISIBLE, $bbc_html, $last;

  $fields = explode(",", str_replace(" ", "", $BBC_DETAILED_STAT_FIELDS));
  $nb_access = isset($last['traffic']) ? count($last['traffic']) : 0;
  $fields_title = array("id" => $_['dstat_id'], "time" => $_['dstat_time'], "visits" => $_['dstat_visits'],
                  "ext" => $_['dstat_extension'], "dns" => $_['dstat_dns'], "ip" => $_['dstat_ip'],
                  "prx_ip" => $_['dstat_prx'], "referer" => $_['dstat_from'], "os" => $_['dstat_os'],
                  "browser" => $_['dstat_browser']);
  $str = "";
    
  foreach ($fields as $val) $str .= "<td><b>".$fields_title[$val]."</b></td>\n";

  $str .= "</tr>\n";

  for ($k = $nb_access - 1; $k >= max(0, $nb_access - $BBC_MAXVISIBLE); $k--) {
    $str .= "<tr style=\"background-color: ".$bbc_html->connect_code_color($last['traffic'][$k])."\">\n";

    reset($fields);

    while (list(, $val) = each($fields)) {
      $cell = bbc_show_connect_field($last['traffic'][$k], $val, $bbc_html->lng, $last['traffic'][$k]['id']);
      $str .= "<td>".(empty($cell) ? "&nbsp;" : $cell)."</td>\n";
    }
    $str .= "</tr>\n";
  }
  return $str;
}

// MAIN

/*
echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    .$bbc_html->color_explain()
    ."<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\"><tr>\n"
    .bbc_rows_gen()
    ."</table>\n"
    ."<br />\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();

*/
?>