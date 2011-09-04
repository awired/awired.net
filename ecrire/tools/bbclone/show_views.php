<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_views.php,v 1.18 2004/10/12 22:53:21 olliver Exp $
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

function bbc_visit_time($this_time, $next_time, $nr = 0) {
  $diff = ($next_time !== false) ? ($next_time - $this_time) : 0;

  if ($diff >= 3600) {
    $h = floor($diff / 3600);
    $m = floor((($mod = $diff % 3600) / 60));
    $s = $mod % 60;

    return "$h&nbsp;h&nbsp;".(($m < 10) ? "0".$m : $m)."&nbsp;m&nbsp;".(($s < 10) ? "0".$s : $s)."&nbsp;s&nbsp;";
  }
  elseif (($diff > 60) && ($diff < 3600)) {
    return ((($rnd = floor(($diff / 60))) < 10) ? "0".$rnd : $rnd)."&nbsp;m&nbsp;".((($mod = $diff % 60) < 10) ?
           "0".$mod : $mod)."&nbsp;s";
  }
  else return (($diff < 10) ? "0".$diff : $diff)."&nbsp;s";
}

function bbc_list_visits() {
  if (_BBC_PHP < 410) global $HTTP_GET_VARS;

  global $bbc_html, $last, $_, $BBC_MAXVISIBLE;

  $is_id = 0;

  if (((_BBC_PHP < 410) ? !isset($HTTP_GET_VARS['id']) : !isset($_GET['id'])) ||
      !preg_match(":^[0-9]+$:", ((_BBC_PHP < 410) ? $HTTP_GET_VARS['id'] : $_GET['id'])) ||
      !is_array($last['traffic']) || empty($last['traffic'])) {
    return $_['dstat_no_data'].".";
  }

  reset($last['traffic']);

  while (list(, $connect) = each($last['traffic'])) {
    if ((isset($connect['id'])) && ($connect['id'] == ((_BBC_PHP < 410) ? $HTTP_GET_VARS['id'] : $_GET['id']))) {
      $is_id = 1;
      break;
    }
  }
  if (!$is_id) return $_['dstat_no_data'].".";

  $prx_ip = (($connect['prx_ip'] == "unknown") || ($connect['prx_ip'] == $connect['ip'])) ? $_['global_no'] :
            $connect['prx_ip'];
  $off = $connect['visits'] - ($BBC_MAXVISIBLE + (isset($connect['off']) ? $connect['off'] : 0));
  // hexcolor depending on the age of the selected connection
  $hex = $bbc_html->connect_code_color($connect);



  $str = "<table border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\">\n"
        ."<tr>\n"
        ."<td>&nbsp;<b>".$_['dstat_id']."</b></td>"
        ."<td>&nbsp;<b>".$_['dstat_prx']."</b></td>\n"
        ."<td>&nbsp;<b>".$_['dstat_ip']."</b></td>\n"
        ."<td>&nbsp;<b>".$_['dstat_user_agent']."</b></td>\n"
        ."<td>&nbsp;<b>".$_['dstat_nr']."</b></td>"
        ."<td>&nbsp;<b>".$_['dstat_pages']."</b></td>"
        ."<td>&nbsp;<b>".$_['dstat_visit_length']."</b></td>\n"
        ."<td>&nbsp;<b>".$_['dstat_reloads']."</b></td>"
        ."</tr>\n"
        ."<tr style=\"background-color: $hex\">\n";

  for ($i = 0, $k = count($connect['views']); $i < $k; $i++) {
    $page = substr($connect['views'][$i], (strpos($connect['views'][$i], "|") + 1));
    $page = substr($page, 0, strpos($page, "|"));
    $page = ($last['pages'][$page] == "index") ? $_['navbar_Main_Site'] : $last['pages'][$page];
    $cnt = substr($connect['views'][$i], (strrpos($connect['views'][$i], "|") + 1)) - 1;
    $this_time = substr($connect['views'][$i], 0, strpos($connect['views'][$i], "|"));
    $next_time = !isset($connect['views'][($i + 1)]) ? false :
                 substr($connect['views'][($i + 1)], 0, strpos($connect['views'][($i + 1)], "|"));

    switch ($i) {
      case 0:
        $str .= "<td align=\"right\" rowspan=\"$k\">".$connect['id']."&nbsp;</td>\n"
               ."<td align=\"right\" rowspan=\"$k\">$prx_ip&nbsp;</td>\n"
               ."<td align=\"right\" rowspan=\"$k\">".$connect['ip']."&nbsp;</td>\n"
               ."<td width=\"300\" rowspan=\"$k\">&nbsp;".(($connect['agent'] == "unknown") ? "&nbsp;" : $connect['agent'])."</td>\n"
               ."<td align=\"right\">".($i + (($off > 0) ? ($off + 1) : 1))."&nbsp;</td>\n"
               ."<td>&nbsp;$page</td>"
               ."<td align=\"right\">".((($i + 1)  === $k) ? "" : bbc_visit_time($this_time, $next_time, $i))
               ."&nbsp;</td>\n"
               ."<td align=\"right\">".(($cnt > 0) ? $cnt : "")."&nbsp;</td>"
               ."</tr>\n"
               .((($i + 1)  === $k) ? "</table>\n" : "<tr style=\"background-color: $hex\">\n");
        break;

      default:
        $str .= "<td align=\"right\">".($i + (($off > 0) ? ($off + 1) : 1))."&nbsp;</td>\n"
               ."<td>&nbsp;$page</td>"
               ."<td align=\"right\">".((($i + 1)  === $k) ? "" : bbc_visit_time($this_time, $next_time, $i))
               ."&nbsp;</td>\n"
               ."<td align=\"right\">".(($cnt > 0) ? $cnt : "")."&nbsp;</td>"
               ."</tr>\n"
               .((($i + 1)  === $k) ? "</table>\n" : "<tr style=\"background-color: $hex\">\n");
    }
  }
  return $str;
}

// Main
/*
echo $bbc_html->html_begin()
    .$bbc_html->topbar(0, 0)
    .$bbc_html->color_explain()
    ."<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\">"
    ."<tr>\n"
    ."<td align=\"center\">".bbc_list_visits()."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br />\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();
*/
?>