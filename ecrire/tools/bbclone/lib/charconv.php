<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/charconv.php,v 1.3 2004/10/13 12:55:28 olliver Exp $
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

 function bbc_get_cyrillic($str) {
  // note that iso-8859-1 is only a placeholder. The focus lies on detecting UTF-8...
  if (mb_detect_encoding($str, "UTF-8, iso-8859-1") == "UTF-8") return "UTF-8";

  $win = 0;
  $koi = 0;

  for($i = 0, $j = strlen($str); $i < $j; $i++) {
    if ((ord($str[$i]) > 224) && (ord($str[$i]) < 255)) $win++;
    if ((ord($str[$i]) > 192) && (ord($str[$i]) < 223)) $koi++;
  }
  return (($win < $koi) ? "KOI8-R" : "Windows-1251");
}

function bbc_get_encoding($str) {
  global $BBC_LANGUAGE;

  switch ($BBC_LANGUAGE) {
    case "ja":
      return mb_detect_encoding($str, "JIS, UTF-8, EUC-JP, SJIS");

    case "ru":
      return bbc_get_cyrillic($str);

    case "bg":
      return bbc_get_cyrillic($str);

    case "uk":
      return bbc_get_cyrillic($str);

    default:
      // note that iso-8859-1 is only a placeholder. The focus lies on detecting UTF-8...
      return (mb_detect_encoding($str, "UTF-8, iso-8859-1") == "UTF-8") ? "UTF-8" : false;
  }
}

function bbc_convert_keys($str, $from, $to) {
  global $BBC_CUSTOM_CHARSET;

  if (($from !== false) && function_exists("iconv")) {
    return iconv($from, (!empty($BBC_CUSTOM_CHARSET) ? $BBC_CUSTOM_CHARSET : $to)."//TRANSLIT", $str);
  }
  elseif (($from !== false) && function_exists("mb_convert_encoding") && (($to == "EUC-JP") ||
      (strpos($to, "iso-8859-") !== false) || (!empty($BBC_CUSTOM_CHARSET) &&
      (stristr("UTF-8", $BBC_CUSTOM_CHARSET)) !== false))) {
    return mb_convert_encoding($str, (!empty($BBC_CUSTOM_CHARSET) ? $BBC_CUSTOM_CHARSET : $to), $from);
  }
  elseif (function_exists("recode_string")) {
    return recode_string((!empty($BBC_CUSTOM_CHARSET) ? $BBC_CUSTOM_CHARSET : $to), $str);
  }
  // bail out with unmodified string
  else return $str;
}

// Note: A custom charset will overwrite the specified default. So you need not
// worry about your personal UTF-8 or whatever language file and change
// anything here. Just specify $BBC_CUSTOM_CHARSET and everything will be
// alright
function bbc_convert_lang($str, $from) {
  global $BBC_LANGUAGE;

  switch ($BBC_LANGUAGE) {
    case "bg":
      return bbc_convert_keys($str, $from, "Windows-1251");

    case "cs":
      return bbc_convert_keys($str, $from, "iso-8859-2");

    case "el":
      return bbc_convert_keys($str, $from, "iso-8859-7");

    case "hu":
      return bbc_convert_keys($str, $from, "iso-8859-2");

    case "ja":
      return bbc_convert_keys($str, $from, "EUC-JP");

    case "lt":
      return bbc_convert_keys($str, $from, "Windows-1257");

    case "pl":
      return bbc_convert_keys($str, $from, "iso-8859-2");

    case "ro":
      return bbc_convert_keys($str, $from, "iso-8859-2");

    case "ru":
      return bbc_convert_keys($str, $from, "Windows-1251");

    case "sl":
      return bbc_convert_keys($str, $from, "iso-8859-2");

    case "tr":
      return bbc_convert_keys($str, $from, "Windows-1254");

    case "uk":
      return bbc_convert_keys($str, $from, "Windows-1251");

    case "zh-cn":
      return bbc_convert_keys($str, $from, "gb2312");

    default:
      return bbc_convert_keys($str, $from, "iso-8859-15");
  }
}
?>