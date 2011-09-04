<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/browser.php,v 1.53 2004/10/17 01:37:35 olliver Exp $
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

$browser = array(
  "abrowse" => array(
    "icon" => "abrowse",
    "title" => "ABrowse",
    "rule" => array(
      "abrowse[ /\-]([0-9.]{1,10})" => "\\1",
      "^abrowse" => ""
    )
  ),
  "amaya" => array(
    "icon" => "amaya",
    "title" => "Amaya",
    "rule" => array(
      "amaya/([0-9.]{1,10})" => "\\1"
    )
  ),
  "aol" => array(
    "icon" => "aol",
    "title" => "AOL",
    "rule" => array(
      "aol[ /\-]([0-9.]{1,10})" => "\\1",
      "aol[ /\-]?browser" => ""
    )
  ),
  "avantbrowser" => array(
    "icon" => "avantbrowser",
    "title" => "Avant Browser",
    "rule" => array(
      "Avant[ ]?Browser" => ""
    )
  ),
  "avantgo" => array(
    "icon" => "avantgo",
    "title" => "AvantGo",
    "rule" => array(
      "AvantGo[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "aweb" => array(
    "icon" => "aweb",
    "title" => "Aweb",
    "rule" => array(
      "Aweb[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "beonex" => array(
    "icon" => "beonex",
    "title" => "Beonex",
    "rule" => array(
      "beonex/([0-9.]{1,10})" => "\\1"
    )
  ),
  "blazer" => array(
    "icon" => "blazer",
    "title" => "Blazer",
    "rule" => array(
      "Blazer[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "camino" => array(
    "icon" => "camino",
    "title" => "Camino",
    "rule" => array(
      "camino/([0-9.+]{1,10})" => "\\1"
    )
  ),
  "chimera" => array(
    "icon" => "chimera",
    "title" => "Chimera",
    "rule" => array(
      "chimera/([0-9.+]{1,10})" => "\\1"
    )
  ),
  "columbus" => array(
    "icon" => "columbus",
    "title" => "Columbus",
    "rule" => array(
      "columbus[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "crazybrowser" => array(
    "icon" => "crazybrowser",
    "title" => "Crazy Browser",
    "rule" => array(
      "Crazy Browser[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "curl" => array(
    "icon" => "curl",
    "title" => "Curl",
    "rule" => array(
      "curl[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "deepnet" => array(
    "icon" => "deepnet",
    "title" => "Deepnet Explorer",
    "rule" => array(
      " Deepnet Explorer[\);]" => ""
    )
  ),
  "dillo" => array(
    "icon" => "dillo",
    "title" => "Dillo",
    "rule" => array(
      "dillo/([0-9.]{1,10})" => "\\1"
    )
  ),
  "doris" => array(
    "icon" => "doris",
    "title" => "Doris",
    "rule" => array(
      "Doris/([0-9.]{1,10})" => "\\1"
    )
  ),
  "Elinks" => array(
    "icon" => "links",
    "title" => "ELinks",
    "rule" => array(
      "ELinks[ /][\(]*([0-9.]{1,10})" => "\\1"
    )
  ),
  "Epiphany"  => array(
    "icon"  => "epiphany",
    "title" => "Epiphany",
    "rule"  => array(
      "Epiphany/([0-9.]{1,10})" => "\\1"
    )
  ),
  "firebird"  => array(
    "icon"  => "firebird",
    "title" => "Firebird",
    "rule"  => array(
      "Firebird/([0-9.+]{1,10})" => "\\1"
    )
  ),
  "firefox"  => array(
    "icon"  => "firefox",
    "title" => "Firefox",
    "rule"  => array(
      "Firefox/([0-9.+]{1,10})" => "\\1"
    )
  ),
  "galeon" => array(
    "icon" => "galeon",
    "title" => "Galeon",
    "rule" => array(
      "galeon/([0-9.]{1,10})" => "\\1"
    )
  ),
  "ibrowse" => array(
    "icon" => "ibrowse",
    "title" => "IBrowse",
    "rule" => array(
      "ibrowse[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "icab" => array(
    "icon" => "icab",
    "title" => "iCab",
    "rule" => array(
      "icab/([0-9.]{1,10})" => "\\1"
    )
  ),
  "isilox" => array(
    "icon" => "isilox",
    "title" => "iSiloX",
    "rule" => array(
      "iSilox/([0-9.]{1,10})" => "\\1"
    )
  ),
  "lotus" => array(
    "icon" => "lotus",
    "title" => "Lotus Notes",
    "rule" => array(
      "Lotus[ \-]?Notes[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "k-meleon" => array(
    "icon" => "k-meleon",
    "title" => "K-Meleon",
    "rule" => array(
      "K-Meleon[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "konqueror" => array(
    "icon" => "konqueror",
    "title" => "Konqueror",
    "rule" => array(
      "konqueror/([0-9.]{1,10})" => "\\1"
    )
  ),
  "links" => array(
    "icon" => "links",
    "title" => "Links",
    "rule" => array(
      "Links[ /]\(([0-9.]{1,10})" => "\\1"
    )
  ),
  "lunascape" => array(
    "icon" => "lunascape",
    "title" => "Lunascape",
    "rule" => array(
      "Lunascape[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "lynx" => array(
    "icon" => "lynx",
    "title" => "Lynx",
    "rule" => array(
      "lynx/([0-9a-z.]{1,10})" => "\\1"
    )
  ),
   "maxthon" => array(
    "icon" => "maxthon",
    "title" => "Maxthon",
    "rule" => array(
      " Maxthon[\);]" => ""
    )
  ),
  "mbrowser" => array(
    "icon" => "mbrowser",
    "title" => "mBrowser",
    "rule" => array(
      "mBrowser[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "mosaic" => array(
    "icon" => "mosaic",
    "title" => "Mosaic",
    "rule" => array(
      "mosaic[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "multibrowser" => array(
    "icon" => "multibrowser",
    "title" => "Multi-Browser",
    "rule" => array(
      "Multi-Browser[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "myie2" => array(
    "icon" => "myie2",
    "title" => "MyIE2",
    "rule" => array(
      " MyIE2[\);]" => ""
    )
  ),
  "nautilus" => array(
    "icon" => "nautilus",
    "title" => "Nautilus",
    "rule" => array(
      "(gnome[ \-]?vfs|nautilus)/([0-9.]{1,10})" => "\\1"
    )
  ),
  "netcaptor" => array(
    "icon" => "netcaptor",
    "title" => "Netcaptor",
    "rule" => array(
      "netcaptor[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "netfront" => array(
    "icon" => "netfront",
    "title" => "NetFront",
    "rule" => array(
      "NetFront[ /]([0-9.]{1,10})$" => "\\1"
    )
  ),
  "netpositive" => array(
    "icon" => "netpositive",
    "title" => "NetPositive",
    "rule" => array(
      "netpositive[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "omniweb" => array(
    "icon" => "omniweb",
    "title" => "OmniWeb",
    "rule" => array(
      "omniweb/[ a-z]?([0-9.]{1,10})$" => "\\1"
    )
  ),
  "opera" => array(
    "icon" => "opera",
    "title" => "Opera",
    "rule" => array(
      "opera[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "oregano" => array(
    "icon" => "oregano",
    "title" => "Oregano",
    "rule" => array(
      "Oregano[0-9]?[ /]([0-9.]{1,10})$" => "\\1"
    )
  ),
  "plink" => array(
    "icon" => "plink",
    "title" => "PLink",
    "rule" => array(
      "PLink[ /]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "phoenix" => array(
    "icon" => "phoenix",
    "title" => "Phoenix",
    "rule" => array(
      "Phoenix/([0-9.+]{1,10})" => "\\1"
    )
  ),
  "proxomitron" => array(
    "icon" => "proxomitron",
    "title" => "Proxomitron",
    "rule" => array(
      "Space[ ]?Bison/[0-9.]{1,10}" => ""
    )
  ),
  "safari" => array(
    "icon" => "safari",
    "title" => "Safari",
    "rule" => array(
      "safari/([0-9.]{1,10})" => "\\1"
    )
  ),
  "shiira" => array(
    "icon" => "shiira",
    "title" => "Shiira",
    "rule" => array(
      "Shiira/([0-9.]{1,10})" => "\\1"
    )
  ),
  "sleipnir" => array(
    "icon" => "sleipnir",
    "title" => "Sleipnir",
    "rule" => array(
      "Sleipnir( Version)?[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "slimbrowser" => array(
    "icon" => "slimbrowser",
    "title" => "SlimBrowser",
    "rule" => array(
      "Slimbrowser" => ""
    )
  ),
  "staroffice" => array(
    "icon" => "staroffice",
    "title" => "StarOffice",
    "rule" => array(
      "staroffice[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "voyager" => array(
    "icon" => "voyager",
    "title" => "Voyager",
    "rule" => array(
      "voyager[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "w3m" => array(
    "icon" => "w3m",
    "title" => "w3m",
    "rule" => array(
      "w3m/([0-9.]{1,10})" => "\\1"
    )
  ),
  "webtv" => array(
    "icon" => "webtv",
    "title" => "Webtv",
    "rule" => array(
      "webtv[ /]([0-9.]{1,10})" => "\\1",
      "webtv" => ""
    )
  ),
  "xiino" => array(
    "icon" => "xiino",
    "title" => "Xiino",
    "rule" => array(
      "^Xiino[ /]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
// Catch up for the originals. they got to stay in that order.
  "explorer" => array(
    "icon" => "explorer",
    "title" => "Explorer",
    "rule" => array(
      "\(compatible; MSIE[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "netscape" => array(
    "icon" => "netscape",
    "title" => "Netscape",
    "rule" => array(
      "netscape[0-9]?/([0-9.]{1,10})" => "\\1",
      "^mozilla/([0-4]\.[0-9.]{1,10})" => "\\1"
    )
  ),
  "mozilla" => array(
    "icon" => "mozilla",
    "title" => "Mozilla",
    "rule" => array(
      "^mozilla/[5-9]\.[0-9.]{1,10}.+rv:([0-9a-z.+]{1,10})" => "\\1",
      "^mozilla/([5-9]\.[0-9a-z.]{1,10})" => "\\1"
    )
  ),
// Things we don't know by now
  "other" => array(
    "icon" => "question",
    "title" => "other",
    "rule" => array(
      ".*" => ""
    )
  )
);
?>