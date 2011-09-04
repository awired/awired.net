<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

function AkoParse($message, $smiley, $ac_bbcodesupport, $ac_picsupport, $ac_smiliesupport, $mosConfig_live_site) {
  # Convert BB Code to HTML commands
  if ($ac_bbcodesupport) {
    $matchCount = preg_match_all("#\[code\](.*?)\[/code\]#si", $message, $matches);
    for ($i = 0; $i < $matchCount; $i++) {
      $currMatchTextBefore = preg_quote($matches[1][$i]);
      $currMatchTextAfter = htmlspecialchars($matches[1][$i]);
      $message = preg_replace("#\[code\]$currMatchTextBefore\[/code\]#si", "<b>Code:</b><HR>$currMatchTextAfter<HR>", $message);
    }
    $message = preg_replace("#\[quote\](.*?)\[/quote]#si", "<b>Quote:</b><HR><BLOCKQUOTE>\\1</BLOCKQUOTE><HR>", $message);
    $message = preg_replace("#\[b\](.*?)\[/b\]#si", "<B>\\1</B>", $message);
    $message = preg_replace("#\[i\](.*?)\[/i\]#si", "<I>\\1</I>", $message);
    $message = preg_replace("#\[u\](.*?)\[/u\]#si", "<U>\\1</U>", $message);
    $message = preg_replace("#\[url\](http://)?(.*?)\[/url\]#si", "<A HREF=\"http://\\2\" TARGET=\"_blank\">\\2</A>", $message);
    $message = preg_replace("#\[url=(http://)?(.*?)\](.*?)\[/url\]#si", "<A HREF=\"http://\\2\" TARGET=\"_blank\">\\3</A>", $message);
    $message = preg_replace("#\[email\](.*?)\[/email\]#si", "<A HREF=\"mailto:\\1\">\\1</A>", $message);
    if ($ac_picsupport) $message = preg_replace("#\[img\](.*?)\[/img\]#si", "<IMG SRC=\"\\1\">", $message);
    $matchCount = preg_match_all("#\[list\](.*?)\[/list\]#si", $message, $matches);
    for ($i = 0; $i < $matchCount; $i++) {
      $currMatchTextBefore = preg_quote($matches[1][$i]);
      $currMatchTextAfter = preg_replace("#\[\*\]#si", "<LI>", $matches[1][$i]);
      $message = preg_replace("#\[list\]$currMatchTextBefore\[/list\]#si", "<UL>$currMatchTextAfter</UL>", $message);
    }
    $matchCount = preg_match_all("#\[list=([a1])\](.*?)\[/list\]#si", $message, $matches);
    for ($i = 0; $i < $matchCount; $i++) {
      $currMatchTextBefore = preg_quote($matches[2][$i]);
      $currMatchTextAfter = preg_replace("#\[\*\]#si", "<LI>", $matches[2][$i]);
      $message = preg_replace("#\[list=([a1])\]$currMatchTextBefore\[/list\]#si", "<OL TYPE=\\1>$currMatchTextAfter</OL>", $message);
    }
  }
  # Convert CR and LF to HTML BR command and strip slashes
  $message = preg_replace("/(\015\012)|(\015)|(\012)/","&nbsp;<br />", $message);
  $message = stripslashes($message);
  # Convert smilies to images
  if ($ac_smiliesupport) {
    foreach ($smiley as $i=>$sm) {
      $message = str_replace ("$i", "<IMG src='$mosConfig_live_site/components/com_akocomment/images/$sm' BORDER='0' ALT='$i'>", $message);
    }
  }
  return $message;
}

function textwrap($text, $width = 75) {
 if ($text) return preg_replace("/([^\n\r ?&\.\/<>\"\\-]{".$width."})/i"," \\1\n",$text);
}

?>