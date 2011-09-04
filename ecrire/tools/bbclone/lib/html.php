<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/html.php,v 1.94 2004/10/12 22:53:21 olliver Exp $
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

class bbc_html {
  var $lang_tab, $lng, $server;

  function get_lng() {
    if (_BBC_PHP < 410) global $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_SERVER_VARS;

    global $BBC_LANGUAGE;

    $get = ((_BBC_PHP < 410) ? !empty($HTTP_GET_VARS['lng']) : !empty($_GET['lng'])) ?
           ((_BBC_PHP < 410) ? $HTTP_GET_VARS['lng'] : $_GET['lng']) : "";
    $post = ((_BBC_PHP < 410) ? !empty($HTTP_POST_VARS['lng']) : !empty($_POST['lng'])) ?
            ((_BBC_PHP < 410) ? $HTTP_POST_VARS['lng'] : $_POST['lng']) : "";
    $aclng = ((_BBC_PHP < 410) ? !empty($HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE']) :
             !empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) ? ((_BBC_PHP < 410) ?
             $HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE'] : $_SERVER['HTTP_ACCEPT_LANGUAGE']) : "";

    if ($get && preg_match(":^[a-zA-Z\-]{1,5}:", $get)) $this->lng = $get;
    elseif ($post && (preg_match(":^[a-zA-Z\-]{1,5}:", $post))) $this->lng = $post;
    elseif ($aclng && (preg_match(":^[a-zA-Z\-]{1,5}:", $aclng))) {
      $this->lng = (($comma = strpos($aclng, ",")) !== false) ? substr($aclng, 0, $comma) : $aclng;
      $this->lng = ((($dash = strpos($this->lng, "-")) !== false) && (!isset($this->lang_tab[$this->lng]))) ?
                   substr($this->lng, 0, $dash) : $this->lng;
    }
    else $this->lng = $BBC_LANGUAGE;

    return (isset($this->lang_tab[$this->lng]) ? $this->lng : $BBC_LANGUAGE);
  }

  // Date format depending on the detected language
  function set_title() {
    global $_, $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $BBC_TITLEBAR;

    return str_replace("%DATE", date($_['global_date_format'], ($BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60))),
           str_replace("%SERVER", $this->server, $BBC_TITLEBAR));
  }

  // Begin of all bbclone files
  function html_begin() {
    global $BBC_VERSION, $BBC_IMAGES_PATH, $BBC_NUM_SIZE, $BBC_TEXT_SIZE, $BBC_TITLE_SIZE, $BBC_SUBTITLE_SIZE, $_;

    // Work around braindead default charset in Apache 2 (Thanks Martin Halachev!)
    if (!headers_sent()) header("Content-type: text/html; charset=".$_['global_charset']);

    return "<?xml version=\"1.0\" encoding=\"".$_['global_charset']."\"?>\n"
          ."<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" "
          ."\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n"
          ."<html xmlns=\"http://www.w3.org/1999/xhtml\">\n"
          ."<head>\n"
          ."<title>BBClone ".$BBC_VERSION."</title>\n"
          ."<link rel=\"shortcut icon\" href=\"".$BBC_IMAGES_PATH."favicon.ico\" />\n"
          ."<meta http-equiv=\"pragma\" content=\"no-cache\" />\n"
          ."<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$_['global_charset']."\" />\n"
          ."<style type=\"text/css\">\n"
          ."<!--\n"
    // Body styles
          ."  body {margin: 0px; background-color: #ffffff}\n"
    // Links styles
          ."  a:hover {text-decoration: none; color: #43A246}\n"
          ."  a {text-decoration: underline; color: #ff0000}\n"
          ."  a.navbar {font-family: Arial, Helvetica, sans-serif; font-size: "
          .$BBC_SUBTITLE_SIZE."pt; text-decoration: underline; color: #838ba0}\n"
          ."  a.navbar:hover  {font-family: Arial, Helvetica, sans-serif; font-size: "
          .$BBC_SUBTITLE_SIZE."pt; text-decoration: none; color: #43A246}\n"
    // redefined tags
          ."  p {font-family: Arial, Helvetica, sans-serif; color: #000000; font-size: "
          .$BBC_TEXT_SIZE."pt}\n"
          ."  td {font-family: Arial, Helvetica, sans-serif; color: #000000; font-size: "
          .$BBC_TEXT_SIZE."pt}\n"
    // Navbar
          ."  .navbar {font-family: Arial, Helvetica, sans-serif; font-size: "
          .$BBC_SUBTITLE_SIZE."pt; color: #98a3d1; font-weight: bold; margin: 0px; padding: 0px}\n"
    // Titlebar
          ."  .titlebar {color: #707a9e; font-weight: bold; font-size: ".$BBC_TITLE_SIZE."pt}\n"
    // Time stats
          ."  .graph {font-family: Arial, Helvetica, sans-serif; color: #000000; font-size: "
          .$BBC_NUM_SIZE."pt; "
          ."vertical-align: top}\n"
          ."  .capt {font-family: Arial, Helvetica, sans-serif; color: #000000; font-size: "
          .$BBC_TEXT_SIZE."pt}\n"
          ."//-->\n"
          ."</style>\n"
          ."</head>\n"
          ."<body>\n"
    // BBClone Copyleft notice
          ."<!--\n"
          ."This is BBClone $BBC_VERSION\n"
          ."Homebase: http://bbclone.de/\n"
          ."License:  GNU/GPL, version 2 or later\n"
          ."Copyleft: 2001-2004 The BBClone team\n"
          ."-->\n";
  }

  // End of all bbclone html documents
  function html_end() {
    return "</body>\n"
          ."</html>\n";
  }

  // Return the navigation toolbar
  //  if set to 0 $lang_sel turns off the navbar and $on_bottom the title
  function topbar($lang_sel = 1, $on_bottom = 0) {
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    global $_, $BBC_IMAGES_PATH, $BBC_MAINSITE, $BBC_SHOW_CONFIG;

    $self = htmlspecialchars(((_BBC_PHP < 410) ? $HTTP_SERVER_VARS['PHP_SELF'] : $_SERVER['PHP_SELF']), ENT_QUOTES);
    $url_query = !empty($this->lang_tab[$this->lng]) ? "?lng=".$this->lng."" : "";
    // Navigation bar stuff
    $navbar_title[$BBC_MAINSITE] = !empty($BBC_MAINSITE) ? $_['navbar_Main_Site'] : "";
    $navbar_title["show_config.php".$url_query] = !empty($BBC_SHOW_CONFIG) ? $_['navbar_Configuration'] : "";
    $navbar_title["show_global.php".$url_query] = $_['navbar_Global_Stats'];
    $navbar_title["show_detailed.php".$url_query] = $_['navbar_Detailed_Stats'];
    $navbar_title["show_time.php".$url_query] = $_['navbar_Time_Stats'];

    $str = (empty($lang_sel) ? "" : "<form method=\"post\" action=\"".str_replace("index.php", "", $self)."\">\n")
          ."<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=\"100%\" "
          ."style=\"background-color: #d1daf4\">\n"
          ."<tr align=\"center\">\n"
          ."<td height=\"26\" width=\"100%\" valign=\"middle\">\n"
          ."<span class=\"navbar\">\n";

    $sep = "";

    foreach ($navbar_title as $url => $title) {
      if (!empty($title)) {
        $str .= "$sep<a class=\"navbar\" href=\"$url\">$title</a>";
        $sep = "&nbsp;|\n";
      }
    }

    if (!empty($lang_sel)) {
      $str .= "&nbsp;|&nbsp;\n";
      $jscode = "onchange=\"if (this.selectedIndex>0){location.href='$self?lng=' + "
               ."this.options[this.selectedIndex].value;}\"";
      $str .= "<select name=\"lng\" $jscode>\n"
             ."<option value=\"\"".(empty($this->lng) ? " selected=\"selected\"" : "").">Language</option>\n";

      foreach ($this->lang_tab as $lang_id => $lang_name) {
        $str .= "<option value=\"$lang_id\"".(($this->lng == $lang_id) ? " selected=\"selected\"" : "")
               .">$lang_name</option>\n";
      }
      $lang_tab_lng = empty($this->lang_tab[$this->lng]) ? "" : $this->lang_tab[$this->lng];
      $str .= "</select>\n"
             ."&nbsp;<input type=\"submit\" value=\"Go!\" />\n";
    }

    $str .= "</span>\n"
           ."</td>\n"
           ."</tr>\n"
           ."</table>\n"
           .((!empty($on_bottom)) ? "" :
            "<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=\"100%\" "
           ."style=\"background-color: #e8edf9\">\n"
           ."<tr>\n"
           ."<td width=\"100%\" align=\"center\">\n"
           ."<span class=\"titlebar\">\n"
           .$this->set_title()."\n"
           ."</span>\n"
           ."</td>\n"
           ."</tr>\n"
           ."</table>\n")
           .(empty($lang_sel) ? "" : "</form>\n");

      return $str;
  }

  function last_reset($timestamp) {
    global $_;

    return "<p align=\"center\"><i>".$_['global_last_reset'].": ".date($_['global_date_format'], $timestamp)
          ."</i></p>\n";
  }

  function copyright() {
    global $BBC_IMAGES_PATH, $BBC_VERSION, $_;

    return "<p align=\"center\"><a href=\"http://bbclone.de/\">"
          ."BBClone ".$BBC_VERSION."</a> &copy; ".$_['global_bbclone_copyright']
          ." <a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a>. \n"
          ." <a href=\"http://validator.w3.org/check/referer\"><img src=\"".$BBC_IMAGES_PATH
          ."valid-xhtml10.png\" height=\"15\" width=\"80\" "
          ."border=\"0\" alt=\"Valid XHTML 1.0!\" title=\"Valid XHTML 1.0!\" align=\"middle\" /></a>\n"
          ." <a href=\"http://jigsaw.w3.org/css-validator/check/referer\"><img src=\""
          .$BBC_IMAGES_PATH."valid-css.png\" height=\"15\" width=\"80\" "
          ."border=\"0\" alt=\"Valid CSS!\" title=\"Valid CSS!\" align=\"middle\" /></a></p>\n";
  }

  // generates the explanation rows. The $val switch determines whether we show
  // the variable's value or just indicate its state
  function show_var($varname, $val = 1) {
    $caps = "BBC_".strtoupper($varname);

    global $$caps, $_;

    // Ugly hack to save some lines of typing
    $$caps = ($caps == "BBC_TITLEBAR") ? $this->set_title() : $$caps;

    return "<tr style=\"background-color: #e8edf9\">\n"
          ."<td valign=\"top\">\n"
          ."\$$caps\n"
          ."</td>\n"
          ."<td valign=\"top\">\n"
          .$_["config_bbc_".$varname]."\n"
          ."</td>\n"
          ."<td valign=\"top\">\n"
          .(!empty($$caps) ? (empty($val) ? $_['global_yes'] : $$caps) : $_['global_no'])."\n"
          ."</td>\n"
          ."</tr>\n";
  }

  // Color explanation
  function color_explain() {
    global $_, $BBC_MAXTIME, $BBC_MAXVISIBLE;

    return "<p align=\"center\"><i>\n"
          .$_['dstat_visible_rows'].": $BBC_MAXVISIBLE,\n"
          ."<span style=\"color:green\">".$_['dstat_green_rows']
          .":</span> ".$_['dstat_last_visit']." &lt; $BBC_MAXTIME ".$_['misc_second_unit'].",\n"
          ."<span style=\"color:blue\">".$_['dstat_blue_rows']
          .":</span> ". $_['dstat_last_visit']." &gt; $BBC_MAXTIME ".$_['misc_second_unit'].",\n"
          ."<span style=\"color:red\">".$_['dstat_red_rows'].":</span> ".$_['dstat_robots'].".\n"
          ."</i></p>\n";
  }

  // Determine the color of the connection
  function connect_code_color($connect) {
    global $BBC_MAXTIME, $BBC_TIMESTAMP, $BBC_TIME_OFFSET;

    if ((($BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60)) - $connect['time']) < $BBC_MAXTIME) return "#f6f9f2";
    // else, it is red if it is a robot
    elseif (!empty($connect['robot'])) return "#f9e8e8";
    // or blue if something else
    else return "#f4f7f9";
  }

  //constructor
  function bbc_html() {
    if (_BBC_PHP < 410) global $HTTP_SERVER_VARS;

    $this->lang_tab = array(
      "bg"    => "Bulgarian",
      "ca"    => "Catalan",
      "cs"    => "Czech",
      "zh-cn" => "Chinese (Simp.)",
      "da"    => "Danish",
      "nl"    => "Dutch",
      "en"    => "English",
      "fi"    => "Finnish",
      "fr"    => "French",
      "de"    => "German",
      "el"    => "Greek",
      "hu"    => "Hungarian",
      "it"    => "Italian",
      "ja"    => "Japanese",
      "lt"    => "Lithuanian",
      "nb"    => "Norwegian (Bokm.)",
      "pl"    => "Polish",
      "pt-br" => "Portuguese (Br.)",
      "ro"    => "Romanian",
      "ru"    => "Russian",
      "sl"    => "Slovenian",
      "es"    => "Spanish",
      "sv"    => "Swedish",
      "tr"    => "Turkish",
      "uk"    => "Ukrainian"
    );

    $this->lng = $this->get_lng();
    $this->server = ((_BBC_PHP < 410) ? !empty($HTTP_SERVER_VARS['SERVER_NAME']) : !empty($_SERVER['SERVER_NAME'])) ?
                    htmlspecialchars(((_BBC_PHP < 410) ? $HTTP_SERVER_VARS['SERVER_NAME'] : $_SERVER['SERVER_NAME']),
                    ENT_QUOTES) : "noname";
  }
}
?>