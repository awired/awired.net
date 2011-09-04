<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/show_time.php,v 1.54 2004/10/17 01:37:34 olliver Exp $
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

// Functions

// Plot a positive sequence of integers $y in function of a sequence $x
// (whatever it is) in a box of size [$width * $height] in pixels
// Note: the width is only an indication. The real width is always a bit greater
// than $width (html sucks).
function bbc_plot($x, $y, $width, $height) {
  global $BBC_IMAGES_PATH;

  // Graphical elements
  $bar = $BBC_IMAGES_PATH."plot_bar.png";
  $bar_top = $BBC_IMAGES_PATH."plot_bar_top.png";
  $bar_bottom = $BBC_IMAGES_PATH."plot_bar_bottom.png";
  $bar_empty = $BBC_IMAGES_PATH."plot_bar_empty.png";

  // Various sizes
  $nb_x = count($x);
  $nb_y = count($y);
  $nb = !empty($x) ? min($nb_x, $nb_y) : $nb_y;
  $bar_width = max(6, floor($width / $nb)) + 6;

  // Finding the maxima
  for ($k = 0, $max_y = 0; $k < $nb; $max_y = max($y[$k],$max_y), $k++);
  // The height of one unit
  $unit_height = !empty($max_y) ? (0.7 * ($height / $max_y)) : 0;

  // THE GRAPH
  $str  = "<table align=\"center\"><tr><td valign=\"middle\" width=\"$width\" height=\"$height\">"
         ."<table width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
  // Drawing the bar
          ."<tr style=\"background-color: #edf7ff\">\n";
  for ($k = 0; $k < $nb; $k++) {
    $bar_top_height = max(3, round(10 * $bar_width / 50));
    $bar_height = round($y[$k] * $unit_height);
    $str .= "<td valign=\"bottom\" align=\"center\" width=\"".$bar_width."\">\n";

    if ($y[$k]) {
      $numb = ($y[$k] > 1000) ? substr(($tmp = $y[$k] / 1000) ,0 , (strpos($tmp, ".") + 2))."k" : $y[$k];

      $str .= "<span class=\"graph\">$numb</span><br />\n"
             ."<img src=\"$bar_top\" alt=\"".$y[$k]."\" title=\"".$y[$k]."\" style=\"display:block\" height=\"$bar_top_height\" "
             ."width=\"$bar_width\" />"
            // ."<br />\n"
             ."<img src=\"$bar\" alt=\"".$y[$k]."\" title=\"".$y[$k]."\" style=\"display:block\" height=\"$bar_height\" "
             ."width=\"$bar_width\" />"
            // ."<br />\n"
             ."<img src=\"$bar_bottom\" alt=\"".$y[$k]."\" title=\"".$y[$k]."\" style=\"display:block\" height=\"$bar_top_height\" "
             ."width=\"$bar_width\" />\n";
    }
    else {
      $str .= "<img src=\"$bar_empty\" alt=\"0\" title=\"0\" style=\"display:block\" height=\"$bar_top_height\" width=\"$bar_width\"  />"
             ."\n";
    }
    $str .= "</td>\n";
  }
  $str .= "</tr>\n";

  // Adding the $x label
  $str .= "<tr>\n";

  for ($k = 0; $k < $nb; $k++) {
    $str .= "<td valign=\"bottom\" align=\"center\" height=\"16\">\n"
           ."<span class=\"capt\">".$x[$k]."</span>\n"
           ."</td>\n";
  }
  $str .= "</tr>\n"
         ."</table></td></tr></table>\n";

  return $str;
}

function bbc_show_plot_time_type($time_type, $width, $height) {
  global $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $access, $_;

  $last_time = isset($access['time']['last']) ? $access['time']['last'] : 0;
  $current_time = $BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60);
  $nb_seconds_in_day  = 86400;
  $nb_seconds_in_week = 7 * $nb_seconds_in_day;
  $last_month = date("n", $last_time) - 1;
  $nb_seconds_in_last_year = (date("L", $last_time) ? 366 : 365) * $nb_seconds_in_day;

  switch ($time_type) {
    case "hour":
      $current_hour = date("G", $current_time);
      $last_hour    = date("G", $last_time);

      for ($k = $current_hour - 23; $k <= $current_hour; $x[] = ($k < 0) ? $k + 24 : $k, $k++);
      for ($k = 0; $k < 24; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= $nb_seconds_in_day) {
        $elapsed = $current_hour - $last_hour;
        $elapsed = ($elapsed < 0) ? $elapsed + 24 : $elapsed;

        for ($k = $elapsed; $k < 24; $k++) {
          $y[$k - $elapsed] = $access['time']['hour'][($last_hour + 1 + $k) % 24];
        }
      }
      break;

    case "wday":
      $day_name = array($_['tstat_Su'], $_['tstat_Mo'], $_['tstat_Tu'],
                        $_['tstat_We'], $_['tstat_Th'], $_['tstat_Fr'],
                        $_['tstat_Sa']);

      $current_wday = date("w", $current_time);
      $last_wday    = date("w", $last_time);

      for ($k = $current_wday - 6; $k <= $current_wday;
        $x[] = $day_name[($k < 0) ? $k + 7 : $k], $k++);
      for ($k = 0; $k < 7; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= $nb_seconds_in_week) {
        $elapsed = $current_wday - $last_wday;
        $elapsed = ($elapsed < 0) ? $elapsed + 7 : $elapsed;

        for ($k = $elapsed; $k < 7; $k++) {
          $y[$k - $elapsed] = $access['time']['wday'][($last_wday + 1 + $k) % 7];
        }
      }
      break;

    case "day":
      // We suppose that the first day of the month is 0 for array compatibility
      $current_day    = date("j", $current_time) - 1;
      $last_day       = date("j", $last_time) - 1;
      $time_in_prec_month = $current_time - ($current_day + 1) * $nb_seconds_in_day;
      $lg_prec_month  = date("t", $time_in_prec_month);
      $lg_prec_month  = ($current_day >= $lg_prec_month ? $current_day + 1 : $lg_prec_month);
      $current_month  = date("n", $current_time);
      $prec_month     = date("n", $time_in_prec_month);

      // Computing the $x
      for ($k = $current_day + 1; $k < $lg_prec_month; $x[] = ($k + 1), $k++);
      for ($k = 0; $k <= $current_day; $x[] = ($k + 1), $k++);
      // Computing the $y
      for ($k = 0; $k < 31; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= ($lg_prec_month * $nb_seconds_in_day)) {
        $elapsed = $current_day - $last_day;
        $elapsed = ($elapsed < 0) ? $elapsed + $lg_prec_month : $elapsed;

        for ($k = $elapsed; $k < $lg_prec_month; $k++) {
          $y[$k - $elapsed] = $access['time']['day'][($last_day + 1 + $k) % $lg_prec_month];
        }
      }
      break;

    case "month":
      $month_name = array($_['tstat_Jan'], $_['tstat_Feb'], $_['tstat_Mar'], $_['tstat_Apr'], $_['tstat_May'],
                          $_['tstat_Jun'], $_['tstat_Jul'], $_['tstat_Aug'], $_['tstat_Sep'], $_['tstat_Oct'],
                          $_['tstat_Nov'], $_['tstat_Dec']);

      $current_month = date("n", $current_time) - 1;
      $last_month    = date("n", $last_time) - 1;

      for($k = $current_month - 11; $k <= $current_month;
        $x[] = $month_name[($k < 0) ? $k + 12 : $k], $k++);
      for($k = 0; $k < 12; $y[$k] = 0, $k++);
      if (($current_time - $last_time) <= $nb_seconds_in_last_year) {
        $elapsed = $current_month - $last_month;
        $elapsed = ($elapsed < 0) ? $elapsed + 12 : $elapsed;
        for ($k = $elapsed; $k < 12; $k++) {
          $y[$k - $elapsed] = $access['time']['month'][($last_month + 1 + $k) % 12];
        }
      }
      break;
  }

  return bbc_plot($x, $y, $width, $height);
}

// MAIN

/*
echo $bbc_html->html_begin()
    .$bbc_html->topbar()
    .(isset($access['time']['reset']) ? $bbc_html->last_reset($access['time']['reset']) : "")
    ."<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\" colspan=\"2\">\n"
    ."<b>". $_['tstat_last_day']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("hour", 570, 240)
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\">\n"
    ."<b>". $_['tstat_last_week']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("wday", 200, 240)
    ."</td>\n"
    ."<td valign=\"top\" align=\"center\">\n"
    ."<b>".$_['tstat_last_year']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("month", 340, 240)
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\" colspan=\"2\">\n"
    ."<b>".$_['tstat_last_month']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("day", 540, 240)
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    .$bbc_html->copyright()
    .$bbc_html->topbar(0, 1)
    .$bbc_html->html_end();

*/
?>