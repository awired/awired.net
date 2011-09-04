<?php
/*This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/robot.php,v 1.96 2004/10/17 14:31:45 olliver Exp $
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

$robot = array(
  "2dehands" => array(
    "icon" => "2dehands",
    "title" => "2deHands",
    "rule" => array(
      "2dehands\.nl" => ""
    )
  ),
  "abacho" => array(
    "icon" => "robot",
    "title" => "Abacho",
    "rule" => array(
      "^ABACHOBot" => ""
    )
  ),
  "about" => array(
    "icon" => "about",
    "title" => "About",
    "rule" => array(
      "Libby[_/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "acoon" => array(
    "icon" => "acoon",
    "title" => "Acoon",
    "rule" => array(
      "Acoon[ \-]?Robot" => ""
    )
  ),
  "aleksika" => array(
    "icon" => "aleksika",
    "title" => "Aleksika",
    "rule" => array(
      "Aleksika Spider[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "alexa" => array(
    "icon" => "alexa",
    "title" => "Alexa",
    "rule" => array(
      "^ia_archive" => ""
    )
  ),
  "almaden" => array(
    "icon" => "robot",
    "title" => "IBM Crawler",
    "rule" => array(
      "www\.almaden\.ibm\.com/cs/crawler" => ""
    )
  ),
  "altavista" => array(
    "icon" => "altavista",
    "title" => "Altavista",
    "rule" => array(
      "Scooter[ /\-]*[a-z]*([0-9.]{1,10})" => "\\1"
    )
  ),
  "amidella" => array(
    "icon" => "amidella",
    "title" => "Amidella",
    "rule" => array(
      "^amibot" => ""
    )
  ),
  "amphetameme" => array(
    "icon" => "robot",
    "title" => "Amphetameme",
    "rule" => array(
      "amphetameme[ \-]?crawler" => ""
    )
  ),
  "apachebench" => array(
    "icon" => "robot",
    "title" => "ApacheBench",
    "rule" => array(
      "ApacheBench[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "aport" => array(
    "icon" => "aport",
    "title" => "Aport",
    "rule" => array(
      "^Aport" => ""
    )
  ),
  "appie" => array(
    "icon" => "robot",
    "title" => "Walhello",
    "rule" => array(
      "appie[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "arachmo" => array(
    "icon" => "arachmo",
    "title" => "Arachmo",
    "rule" => array(
      "compatible; Arachmo" => ""
    )
  ),
  "ask" => array(
    "icon" => "askjeeves",
    "title" => "Ask Jeeves",
    "rule" => array(
      "Ask[ \-]?Jeeves" => "",
      "teomaagent" => ""
    )
  ),
  "atomz" => array(
    "icon" => "atomz",
    "title" => "Atomz",
    "rule" => array(
      "Atomz[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "axel" => array(
    "icon" => "robot",
    "title" => "Axel",
    "rule" => array(
      "^axel" => ""
    )
  ),
  "axmo" => array(
    "icon" => "axmo",
    "title" => "Axmo",
    "rule" => array(
      "AxmoRobot" => ""
    )
  ),
  "answerbus" => array(
    "icon" => "robot",
    "title" => "AnswerBus",
    "rule" => array(
      "answerbus" => ""
    )
  ),
  "augurnfind" => array(
    "icon" => "robot",
    "title" => "Augurnfind",
    "rule" => array(
      "augurnfind[/ ][v\-]*([0-9.]{1,10})" => "\\1"
    )
  ),
  "awasu" => array(
    "icon" => "awasu",
    "title" => "Awasu",
    "rule" => array(
      "Awasu[/ ]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "baidu" => array(
    "icon" => "baidu",
    "title" => "Baidu",
    "rule" => array(
      "Baiduspider" => ""
    )
  ),
  "bananatree" => array(
    "icon" => "robot",
    "title" => "BananaTree",
    "rule" => array(
      "www\.thebananatree\.org" => ""
    )
  ),
  "bitbeamer" => array(
    "icon" => "bitbeamer",
    "title" => "BitBeamer",
    "rule" => array(
      "BitBeamer/([0-9.]{1,10})" => "\\1"
    )
  ),
  "blogbot" => array(
    "icon" => "robot",
    "title" => "BlogBot",
    "rule" => array(
      "Blog[ \-]?Bot" => ""
    )
  ),
  "bloglines" => array(
    "icon" => "bloglines",
    "title" => "Bloglines",
    "rule" => array(
      "Bloglines[ /]([0-9.]{1,10})" => "\\1",
      "Bloglines" => ""
    )
  ),
  "blogmap" => array(
    "icon" => "robot",
    "title" => "Blogmap",
    "rule" => array(
      "blogmap" => ""
    )
  ),
  "blogosphere" => array(
    "icon" => "robot",
    "title" => "Blogosphere",
    "rule" => array(
      "Blogosphere" => ""
    )
  ),
  "blogpulse" => array(
    "icon" => "robot",
    "title" => "Blogpulse",
    "rule" => array(
      "Blogpulse" => ""
    )
  ),
  "blogranking" => array(
    "icon" => "blogranking",
    "title" => "BlogRanking",
    "rule" => array(
      "^BlogRanking(/RSS checker)?" => ""

    )
  ),
  "blogs" => array(
    "icon" => "robot",
    "title" => "Blo.gs",
    "rule" => array(
      "blo\.gs[ /]([0-9.]{1,10})" => "\\1",
      "blo\.gs" => ""

    )
  ),
  "blogshares" => array(
    "icon" => "robot",
    "title" => "BlogShares",
    "rule" => array(
      "BlogShares[ /]V?([0-9.]{1,10})" => "\\1",
      "(^| |\()Blogshares(\.com| |\))" => ""
    )
  ),
  "blogsnow" => array(
    "icon" => "robot",
    "title" => "BlogsNow",
    "rule" => array(
      "blogsnowbot" => ""
    )
  ),
  "blogstreet" => array(
    "icon" => "blogstreet",
    "title" => "BlogStreet",
    "rule" => array(
      "^BlogStreetBot" => ""
    )
  ),
  "blogsurf" => array(
    "icon" => "robot",
    "title" => "BlogSurf",
    "rule" => array(
      "nomadscafe_ra[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "blogtick" => array(
    "icon" => "robot",
    "title" => "BlogTick",
    "rule" => array(
      "BlogTickServer" => ""
    )
  ),
  "blogwise" => array(
    "icon" => "robot",
    "title" => "Blogwise",
    "rule" => array(
      "Blogwise\.com(-MetaChecker)?[/ ]([0-9.]{1,10})" => "\\2",
    )
  ),
  "bobby" => array(
    "icon" => "bobby",
    "title" => "Bobby",
    "rule" => array(
      "bobby[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "boitho" => array(
    "icon" => "robot",
    "title" => "Boitho",
    "rule" => array(
      "Boitho\.com[ \-](dc|robot)?[/ ]([0-9.]{1,10})" => "\\2"
    )
  ),
  "book" => array(
    "icon" => "book",
    "title" => "Bookmark",
    "rule" => array(
      "\[http://www\.bookmark\.ne\.jp/\]" => ""
    )
  ),
  "bordermanager" => array(
    "icon" => "bordermanager",
    "title" => "Border Manager",
    "rule" => array(
      "BorderManager[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "bottomfeeder" => array(
    "icon" => "bottomfeeder",
    "title" => "BottomFeeder",
    "rule" => array(
      "BottomFeeder[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "browserspy" => array(
    "icon" => "robot",
    "title" => "BrowserSpy",
    "rule" => array(
      "BrowserSpy" => ""
    )
  ),
  "bruinbot" => array(
    "icon" => "robot",
    "title" => "BruinBot",
    "rule" => array(
      "BruinBot" => ""
    )
  ),
  "bruno" => array(
    "icon" => "robot",
    "title" => "Bruno",
    "rule" => array(
      "^Bruno" => ""
    )
  ),
  "btbot" => array(
    "icon" => "robot",
    "title" => "BitTorrent",
    "rule" => array(
      "BTbot/([0-9.]{1,10})" => "\\1"
    )
  ),
  "bulkfeeds" => array(
    "icon" => "robot",
    "title" => "Bulkfeeds",
    "rule" => array(
      "Bulkfeeds[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "centrum" => array(
    "icon" => "centrum",
    "title" => "Centrum",
    "rule" => array(
      "holmes[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "cerberian" => array(
    "icon" => "robot",
    "title" => "Cerberian Drtrs",
    "rule" => array(
      "^Cerberian Drtrs" => ""
    )
  ),
  "cirilizator" => array(
    "icon" => "cirilizator",
    "title" => "Cirilizator",
    "rule" => array(
      "Cirilizator[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "claria" => array(
    "icon" => "robot",
    "title" => "Claria",
    "rule" => array(
      "(Claria|Diamond)(Bot)?[ /]([0-9.]{1,10})$" => "\\3"
    )
  ),
  "claymont" => array(
    "icon" => "claymont",
    "title" => "Claymont",
    "rule" => array(
      "claymont\.com" => ""
    )
  ),
  "clush" => array(
    "icon" => "clush",
    "title" => "Clush",
    "rule" => array(
      "Clus(tered-Search-|h)Bot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "coldfusion" => array(
    "icon" => "coldfusion",
    "title" => "ColdFusion",
    "rule" => array(
      "^coldfusion" => ""
    )
  ),
  "combot" => array(
    "icon" => "robot",
    "title" => "comBot",
    "rule" => array(
      "comBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "commerobo" => array(
    "icon" => "robot",
    "title" => "Commerobo",
    "rule" => array(
      "Commerobo[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "convera" => array(
    "icon" => "convera",
    "title" => "Convera",
    "rule" => array(
      "ConveraCrawler[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "coolbot" => array(
    "icon" => "robot",
    "title" => "CoolBot",
    "rule" => array(
      "^CoolBot" => ""
    )
  ),
  "cosmos" => array(
    "icon" => "robot",
    "title" => "Cosmos",
    "rule" => array(
      "^cosmos" => ""
    )
  ),
  "creativecommons" => array(
    "icon" => "creativecommons",
    "title" => "Creative Commons",
    "rule" => array(
    "CreativeCommons[/ ]([0-9.]{1,6}(-dev)?)" => "\\1"
    )
  ),
  "csscheck" => array(
    "icon" => "css",
    "title" => "CSSCheck",
    "rule" => array(
      "CSS(Check|_Validator)" => ""
    )
  ),
  "custo" => array(
    "icon" => "robot",
    "title" => "Custo",
    "rule" => array(
      "Custo[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "cyberz" => array(
    "icon" => "cyberz",
    "title" => "Cyberz",
    "rule" => array(
      "Cyberz Communication Agent" => ""
    )
  ),
  "cydral" => array(
    "icon" => "robot",
    "title" => "Cydral",
    "rule" => array(
      "CydralSpider[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "cynthia" => array(
    "icon" => "cynthia",
    "title" => "Cynthia Says",
    "rule" => array(
      "Cynthia[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "d4x" => array(
    "icon" => "d4x",
    "title" => "Downloader for X",
    "rule" => array(
      "Downloader for X[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "da" => array(
    "icon" => "da",
    "title" => "DA",
    "rule" => array(
      "^DA[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "daypop" => array(
    "icon" => "robot",
    "title" => "Daypop",
    "rule" => array(
      "daypopbot[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "discopump" => array(
    "icon" => "robot",
    "title" => "DISCo Pump",
    "rule" => array(
      "DISCo Pump[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "doctorhtml" => array(
    "icon" => "robot",
    "title" => "DoctorHTML",
    "rule" => array(
      "Doctor[ \-]?HTML" => ""
    )
  ),
  "downloadninja" => array(
    "icon" => "robot",
    "title" => "Download Ninja",
    "rule" => array(
      "Download Ninja[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "dsns" => array(
    "icon" => "robot",
    "title" => "DSNS Scanner",
    "rule" => array(
      "^DSNS" => ""
    )
  ),
  "dtsagent" => array(
    "icon" => "robot",
    "title" => "DTS Agent",
    "rule" => array(
      "DTS Agent" => ""
    )
  ),
  "earthcom" => array(
    "icon" => "earthcom",
    "title" => "Earthcom",
    "rule" => array(
      "EARTHCOM\.info[/ ]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "eknip" => array(
    "icon" => "robot",
    "title" => "E-Knip",
    "rule" => array(
      "eknip[ /]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "eliyon" => array(
    "icon" => "robot",
    "title" => "Eliyon",
    "rule" => array(
      "NextGenSearchBot[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "emailsiphon" => array(
    "icon" => "robot",
    "title" => "Email Siphon",
    "rule" => array(
      "Email[ \-]?Siphon" => ""
    )
  ),

  "empas" => array(
    "icon" => "robot",
    "title" => "Empas",
    "rule" => array(
      "DigExt; empas\)$" => "",
      "^EMPAS-ROBOT" => ""
    )
  ),
  "entireweb" => array(
    "icon" => "entireweb",
    "title" => "Entireweb",
    "rule" => array(
      "^Speedy Spider" => ""
    )
  ),
  "estyle" => array(
    "icon" => "robot",
    "title" => "eStyle Search",
    "rule" => array(
      "eStyleSearch[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "eurip" => array(
    "icon" => "robot",
    "title" => "Eurip",
    "rule" => array(
      "EuripBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "euroseek" => array(
    "icon" => "euroseek",
    "title" => "EuroSeek",
    "rule" => array(
      "Arachnoidea" => ""
    )
  ),
  "exabot" => array(
    "icon" => "exabot",
    "title" => "ExaBot",
    "rule" => array(
      "^NG[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "exactseek" => array(
    "icon" => "robot",
    "title" => "ExactSeek",
    "rule" => array(
      "ExactSeek[ \-]?Crawler" => ""
    )
  ),
  "exava" => array(
    "icon" => "robot",
    "title" => "Exava",
    "rule" => array(
      "Exabot@exava\.com\)$" => ""
    )
  ),
  "excite" => array(
    "icon" => "excite",
    "title" => "Excite",
    "rule" => array(
      "Architext[ \-]?Spider" => ""
    )
  ),
  "expertmonitor" => array(
    "icon" => "robot",
    "title" => "ExpertMonitor",
    "rule" => array(
      "^NetMonitor[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "fast" => array(
    "icon" => "fast",
    "title" => "Fast",
    "rule" => array(
      "^FAST Enterprise Crawler[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "fastbuzz" => array(
    "icon" => "fastbuzz",
    "title" => "Fastbuzz",
    "rule" => array(
      "^fastbuzz\.com" => ""
    )
  ),
  "favorg" => array(
    "icon" => "robot",
    "title" => "FavOrg",
    "rule" => array(
      "^FavOrg" => ""
    )
  ),
  "faxo" => array(
    "icon" => "robot",
    "title" => "Faxo",
    "rule" => array(
      "^Faxobot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "fdse" => array(
    "icon" => "robot",
    "title" => "FDSE Robot",
    "rule" => array(
      "FDSE[ \-]?robot" => ""
    )
  ),
  "feedback" => array(
    "icon" => "robot",
    "title" => "FeedBack",
    "rule" => array(
      "FeedBack[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "feeddemon" => array(
    "icon" => "feeddemon",
    "title" => "FeedDemon",
    "rule" => array(
      "FeedDemon[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "feedonfeeds" => array(
    "icon" => "robot",
    "title" => "Feed On Feeds",
    "rule" => array(
      "FeedOnFeeds[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "feedparser" => array(
    "icon" => "robot",
    "title" => "Feedparser",
    "rule" => array(
      "UniversalFeedParser[/ ]([0-9a-z.\-]{1,10})" => "\\1"
    )
  ),
  "feedreader" => array(
    "icon" => "feedreader",
    "title" => "Feedreader",
    "rule" => array(
      "^Feedreader" => ""
    )
  ),
  "feedster" => array(
    "icon" => "feedster",
    "title" => "Feedster",
    "rule" => array(
      "Feedster Crawler[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "feedvalidator" => array(
    "icon" => "robot",
    "title" => "Feed Validator",
    "rule" => array(
      "^FeedValidator[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "findengines" => array(
    "icon" => "findengines",
    "title" => "FindEngines",
    "rule" => array(
      "FindEngines! Bot" => ""
    )
  ),
  "findlinks" => array(
    "icon" => "robot",
    "title" => "FindLinks",
    "rule" => array(
      "findlinks[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "firefly" => array(
    "icon" => "firefly",
    "title" => "Firefly",
    "rule" => array(
      "Firefly" => ""
    )
  ),
  "flashget" => array(
    "icon" => "flashget",
    "title" => "FlashGet",
    "rule" => array(
      "^FlashGet" => ""
    )
  ),
  "flickbot" => array(
    "icon" => "robot",
    "title" => "FlickBot",
    "rule" => array(
      "FlickBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "friend" => array(
    "icon" => "friend",
    "title" => "Friend",
    "rule" => array(
      "www\.friend\.fr" => ""
    )
  ),
  "frontier" => array(
    "icon" => "frontier",
    "title" => "Frontier",
    "rule" => array(
      "Frontier[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "gaisbot" => array(
    "icon" => "robot",
    "title" => "Gaisbot",
    "rule" => array(
      "Gaisbot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "galaxy" => array(
    "icon" => "galaxy",
    "title" => "Galaxy",
    "rule" => array(
      "GalaxyBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "genome" => array(
    "icon" => "robot",
    "title" => "Genome Machine",
    "rule" => array(
      "Genome[ \-]?Machine" => ""
    )
  ),
  "geona" => array(
    "icon" => "robot",
    "title" => "Geona",
    "rule" => array(
      "GeonaBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "geoblog" => array(
    "icon" => "robot",
    "title" => "The World as a Blog",
    "rule" => array(
      "The World as a Blog" => ""
    )
  ),
  "getright" => array(
    "icon" => "getright",
    "title" => "GetRight",
    "rule" => array(
      "GetRight[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "getsmart" => array(
    "icon" => "getsmart",
    "title" => "GetSmart",
    "rule" => array(
      "GetSmart[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "gigabot" => array(
    "icon" => "robot",
    "title" => "Gigablast",
    "rule" => array(
      "Gigabot[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "girafabot" => array(
    "icon" => "girafa",
    "title" => "Girafa",
    "rule" => array(
      "Girafabot" => ""
    )
  ),
  "globalspec" => array(
    "icon" => "robot",
    "title" => "GlobalSpec",
    "rule" => array(
      "Ocelli[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "glucose" => array(
    "icon" => "glucose",
    "title" => "Glucose",
    "rule" => array(
      "glucose[ /]([0-9a-z.\-]{1,10})" => "\\1"
    )
  ),
  "goforit" => array(
    "icon" => "goforit",
    "title" => "GoForIt",
    "rule" => array(
      "^GoForIt\.com" => ""
    )
  ),
  "goo" => array(
    "icon" => "goo",
    "title" => "Goo",
    "rule" => array (
      "mog(et|imogi)[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "google" => array(
    "icon" => "google",
    "title" => "Google",
    "rule" => array (
      "Googl(e|ebot)(-Image)?/([0-9.]{1,10})" => "\\3",
      "Googl(e|ebot)(-Image)?/" => ""
    )
  ),
  "grub" => array(
    "icon" => "grub",
    "title" => "Grub",
    "rule" => array(
      "grub[ \-]?client[ /\-]{1,5}([0-9.]{1,10})" => "\\1"
    )
  ),
  "gulliver" => array(
    "icon" => "robot",
    "title" => "Gulliver",
    "rule" => array(
      "Gulliver" => ""
    )
  ),
  "gush" => array(
    "icon" => "robot",
    "title" => "Gush",
    "rule" => array(
      "^Gush[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "gziptester" => array(
    "icon" => "robot",
    "title" => "Gzip Tester",
    "rule" => array(
      "g(id)?zip[ \-]?test(er)?" => ""
    )
  ),
  "harbot" => array(
    "icon" => "harbot",
    "title" => "Harbot",
    "rule" => array(
      "^Harbot GateStation" => ""
    )
  ),
  "hatena" => array(
    "icon" => "hatena",
    "title" => "Hatena",
    "rule" => array(
      "Hatena Antenna[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "heritrix" => array(
    "icon" => "heritrix",
    "title" => "Heritrix",
    "rule" => array(
      "heritrix[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "htdig" => array(
    "icon" => "htdig",
    "title" => "ht://Dig",
    "rule" => array(
      "htdig[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "html2jpg" => array(
    "icon" => "html2jpg",
    "title" => "HTML2JPG",
    "rule" => array(
      "^HTML2JPG" => ""
    )
  ),
  "httperf" => array(
    "icon" => "robot",
    "title" => "HTTPerf",
    "rule" => array(
      "httperf[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "httrack" => array(
    "icon" => "robot",
    "title" => "HTTrack",
    "rule" => array(
      "HTTrack[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "iknow" => array(
    "icon" => "robot",
    "title" => "I know",
    "rule" => array(
      "Comaneci_bot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "ilse" => array(
    "icon" => "ilse",
    "title" => "Ilse",
    "rule" => array(
      "INGRID[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "iltrovatore" => array(
    "icon" => "iltrovatore",
    "title" => "IlTrovatore",
    "rule" => array(
      "iltrovatore-setaccio[ /]([0-9.]{1,10})" => "\\1",
      "Iltrovatore-Setaccio" => ""
    )
  ),
  "indylibrary" => array(
    "icon" => "robot",
    "title" => "Indy Library",
    "rule" => array(
      "Indy[ \-]?Library" => ""
    )
  ),
  "infoart" => array(
    "icon" => "robot",
    "title" => "InfoArt",
    "rule" => array(
      "InfoArt crawler" => ""
    )
  ),
  "infoseek" => array(
    "icon" => "infoseek",
    "title" => "Infoseek",
    "rule" => array(
      "SideWinder[ /]?([0-9a-z.]{1,10})" => "\\1",
      "Infoseek" => ""
    )
  ),
  "inktomi" => array(
    "icon" => "inktomi",
    "title" => "Inktomi",
    "rule" => array(
      "slurp@inktomi\.com" => ""
    )
  ),
  "insitor" => array(
    "icon" => "robot",
    "title" => "Insitor",
    "rule" => array(
      "^Insitor," => ""
    )
  ),
  "internetninja" => array(
    "icon" => "robot",
    "title" => "Internet Ninja",
    "rule" => array(
      "^Internet Ninja[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "internetseer" => array(
    "icon" => "robot",
    "title" => "InternetSeer",
    "rule" => array(
      "^InternetSeer\.com" => ""
    )
  ),
  "irvine" => array(
    "icon" => "robot",
    "title" => "Irvine",
    "rule" => array(
      "Irvine[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "java" => array(
    "icon" => "java",
    "title" => "Java",
    "rule" => array(
      "java[ /]([0-9.]{1,10})" => "\\1",
      "java" => ""
    )
  ),
  "jeteye" => array(
    "icon" => "jeteye",
    "title" => "Jeteye",
    "rule" => array(
      "Jetbot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "jigsaw" => array(
    "icon" => "jigsaw",
    "title" => "Jigsaw",
    "rule" => array(
      "Jigsaw[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "jxta" => array(
    "icon" => "robot",
    "title" => "Jxta",
    "rule" => array(
      "falcon[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "jyxo" => array(
    "icon" => "jyxo",
    "title" => "Jyxo",
    "rule" => array(
      "Jyxobot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "keywen" => array(
    "icon" => "keywen",
    "title" => "Keywen",
    "rule" => array(
      "EasyDL[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "kinja" => array(
    "icon" => "kinja",
    "title" => "Kinja",
    "rule" => array(
      "kinjabot[ /]([0-9.]{1,10})" => "\\1",
      "^kinjabot" => ""
    )
  ),
  "lachesis" => array(
    "icon" => "robot",
    "title" => "Lachesis",
    "rule" => array(
      "lachesis" => ""
    )
  ),
  "larbin" => array(
    "icon" => "robot",
    "title" => "Larbin",
    "rule" => array(
      "larbin[_/ ]?([0-9.]{1,10})" => "\\1"
    )
  ),
  "leechget" => array(
    "icon" => "leechget",
    "title" => "LeechGet",
    "rule" => array(
      "^LeechGet[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "linkman" => array(
    "icon" => "linkman",
    "title" => "Linkman",
    "rule" => array(
      "\(compatible; Linkman\)" => ""
    )
  ),
  "linkcheck" => array(
    "icon" => "linkcheck",
    "title" => "Linkcheck",
    "rule" => array(
      "checklink[ /]([0-9.]{1,10})" => "\\1",
      "Link[ \-]?(Chec(k|ker)|Val(et|idator))" => ""
    )
  ),
  "linkssql" => array(
    "icon" => "robot",
    "title" => "Links SQL",
    "rule" => array(
      "links sql" => ""
    )
  ),
  "linksweeper" => array(
    "icon" => "robot",
    "title" => "Link Sweeper",
    "rule" => array(
      "LinkSweeper[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "linkwalker" => array(
    "icon" => "robot",
    "title" => "Link Walker",
    "rule" => array(
      "^LinkWalker" => ""
    )
  ),
  "livedoor" => array(
    "icon" => "livedoor",
    "title" => "Livedoor",
    "rule" => array(
      "^Livedoor( SF( - California Crawl)?|Checkers)[ /]([0-9a-z.]{1,10})" => "\\2"
    )
  ),
  "livejournal" => array(
    "icon" => "livejournal",
    "title" => "Live Journal",
    "rule" => array(
      "^LiveJournal\.com" => ""
    )
  ),
  "lmspider" => array(
    "icon" => "robot",
    "title" => "Lmspider",
    "rule" => array(
      "^lmspider" => ""
    )
  ),
  "locators" => array(
    "icon" => "robot",
    "title" => "Locaters",
    "rule" => array(
      "^FiNDoBot[/ ]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "look" => array(
    "icon" => "look",
    "title" => "Look",
    "rule" => array(
      "www\.look\.com" => ""
    )
  ),
  "loop" => array(
    "icon" => "loop",
    "title" => "LOOP",
    "rule" => array(
      "NetResearchServer[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "looksmart" => array(
    "icon" => "looksmart",
    "title" => "Looksmart",
    "rule" => array(
      "looksmart-sv-fw" => ""
    )
  ),
  "lotkyll" => array(
    "icon" => "robot",
    "title" => "Lotkyll",
    "rule" => array(
      "Lotkyll" => ""
    )
  ),
  "lwp" => array(
    "icon" => "robot",
    "title" => "lwp",
    "rule" => array(
      "lwp(-trivial|::simple)[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "lycos" => array(
    "icon" => "lycos",
    "title" => "Lycos",
    "rule" => array(
      "Lycos_Spider_" => ""
    )
  ),
  "magpierss" => array(
    "icon" => "robot",
    "title" => "MagpieRSS",
    "rule" => array(
      "MagpieRSS" => ""
    )
  ),
  "mailsweeper" => array(
    "icon" => "robot",
    "title" => "Mail Sweeper",
    "rule" => array(
      "Mail[ \-]?Sweeper" => ""
    )
  ),
  "marvin" => array(
    "icon" => "robot",
    "title" => "Marvin",
    "rule" => array(
      "^Marvin" => ""
    )
  ),
  "matkurja" => array(
    "icon" => "matkurja",
    "title" => "Mat'Kurja",
    "rule" => array(
      "Mosad[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "mavicanet" => array(
    "icon" => "mavicanet",
    "title" => "Mavicanet",
    "rule" => array(
      "Mavicanet robot" => ""
    )
  ),
  "mercator" => array(
    "icon" => "robot",
    "title" => "Mercator",
    "rule" => array(
      "Mercator" => ""
    )
  ),
  "metager" => array(
    "icon" => "metager",
    "title" => "MetaGer",
    "rule" => array(
      "MetaGer" => ""
    )
  ),
  "metamedic" => array(
    "icon" => "metamedic",
    "title" => "MetaMedic",
    "rule" => array(
      "MediBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "mirago" => array(
    "icon" => "mirago",
    "title" => "Mirago",
    "rule" => array(
      "Mirago" => ""
    )
  ),
  "missigua" => array(
    "icon" => "robot",
    "title" => "Missigua Locator",
    "rule" => array(
      "Missigua Locator[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "mnogo" => array(
    "icon" => "robot",
    "title" => "Mnogo",
    "rule" => array(
      "Mnogosearch[ \-]([0-9.]{1,10})" => "\\1"
    )
  ),
  "momspider" => array(
    "icon" => "robot",
    "title" => "MOM Spider",
    "rule" => array(
      "MOMspider[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "movabletype" => array(
    "icon" => "movabletype",
    "title" => "Movable Type",
    "rule" => array(
      "MovableType[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "mozdex" => array(
    "icon" => "mozdex",
    "title" => "MozDex",
    "rule" => array(
      "mozDex[ /]([0-9.]{1,6}(-dev)?)" => "\\1"
    )
  ),
  "msnbot" => array(
    "icon" => "msn",
    "title" => "MSN",
    "rule" => array(
      "MSN(BOT|PTC)[ /]([0-9.]{1,10})" => "\\2",
    )
  ),
  "msproxy" => array(
    "icon" => "robot",
    "title" => "MSProxy",
    "rule" => array(
      "MSProxy[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "mswebdav" => array(
    "icon" => "robot",
    "title" => "MS-WebDAV",
    "rule" => array(
      "Microsoft[ \-]?WebDAV[ \-]?MiniRedir" => ""
    )
  ),
  "mticon" => array(
    "icon" => "robot",
    "title" => "MTIcon",
    "rule" => array(
      "MTIcon[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "nameprotect" => array(
    "icon" => "nameprotect",
    "title" => "Name Protect",
    "rule" => array(
      "NPBot" => ""
    )
  ),
  "nationaldirectory" => array(
    "icon" => "robot",
    "title" => "National Directory",
    "rule" => array(
      "NationalDirectory-WebSpider[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "natsumican" => array(
    "icon" => "robot",
    "title" => "Natsu Mican",
    "rule" => array(
      "NATSU[ \-]MICAN[/ ]([0-9a-z.]{1,10})" => "\\1",
    )
  ),
  "naverbot" => array(
    "icon" => "naverbot",
    "title" => "Naver",
    "rule" => array(
      "NaverBot([_\-]dloader)?[/ \-]([0-9.]{1,10})" => "\\2",
      "Naver(Bot)?" => ""
    )
  ),
  "nessus" => array(
    "icon" => "nessus",
    "title" => "Nessus",
    "rule" => array(
      "Nessus\)$" => ""
    )
  ),
  "netants" => array(
    "icon" => "netants",
    "title" => "NetAnts",
    "rule" => array(
      "NetAnts[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "netcraft" => array(
    "icon" => "netcraft",
    "title" => "Netcraft",
    "rule" => array(
      "netcraft" => ""
    )
  ),
  "netmechanic" => array(
    "icon" => "netmechanic",
    "title" => "NetMechanic",
    "rule" => array(
      "NetMechanic[ /V]{1,5}([0-9.]{1,10})" => "\\1"
    )
  ),
  "netnewswire" => array(
    "icon" => "netnewswire",
    "title" => "NetNewsWire",
    "rule" => array(
      "NetNewsWire[/ ]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "netnose" => array(
    "icon" => "netnose",
    "title" => "NetNose",
    "rule" => array(
      " NetNose[ \-]Crawler[/ ]([0-9.]{1,10})[\);]" => "\\1"
    )
  ),
  "netoskop" => array(
    "icon" => "robot",
    "title" => "Netoskop",
    "rule" => array(
      "netoskop" => ""
    )
  ),
  "netscapeproxy" => array(
    "icon" => "netscape",
    "title" => "Netscape Proxy",
    "rule" => array(
      "Netscape\-Proxy[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "newsfire" => array(
    "icon" => "newsfire",
    "title" => "NewsFire",
    "rule" => array(
      "NewsFire[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "newsgator" => array(
    "icon" => "newsgator",
    "title" => "NewsGator",
    "rule" => array(
      "NewsGator[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "newzcrawler" => array(
    "icon" => "newzcrawler",
    "title" => "NewzCrawler",
    "rule" => array(
      "NewzCrawler[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "noviforum" => array(
    "icon" => "noviforum",
    "title" => "Noviforum",
    "rule" => array(
      "TridentSpider[/ ]?([0-9.]{1,10})" => "\\1"
    )
  ),
  "nutchorg" => array(
    "icon" => "robot",
    "title" => "Nutch",
    "rule" => array(
      "Nutch(Org|CVS)?[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "obidosbot" => array(
    "icon" => "robot",
    "title" => "Bookwatch",
    "rule" => array(
      "obidos[ \-]?bot" => ""
    )
  ),
  "objectssearch" => array(
    "icon" => "robot",
    "title" => "Objects Search",
    "rule" => array(
      "ObjectsSearch[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "onet" => array(
    "icon" => "onet",
    "title" => "Onet",
    "rule" => array(
      "inktomi\.search\.onet" => ""
    )
  ),
  "openfind" => array(
    "icon" => "openfind",
    "title" => "Openfind",
    "rule" => array(
      "openbot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "organica" => array(
    "icon" => "robot",
    "title" => "Organica",
    "rule" => array(
      "crawler@organica\.us" => ""
    )
  ),
  "overture" => array(
    "icon" => "overture",
    "title" => "Overture",
    "rule" => array(
      "Overture[ \-]?WebCrawler" => ""
    )
  ),
  "panopeabot" => array(
    "icon" => "robot",
    "title" => "PanopeaBot",
    "rule" => array(
      "PanopeaBot[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "peerbot" => array(
    "icon" => "peerbot",
    "title" => "Peerbot",
    "rule" => array(
      "^PEERbot" => ""
    )
  ),
  "php" => array(
    "icon" => "php",
    "title" => "PHP",
    "rule" => array(
      "^PHP[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "pinseri" => array(
    "icon" => "pinseri",
    "title" => "Pinseri",
    "rule" => array(
      "www\.pinseri\.com/bloglist" => ""
    )
  ),
  "plsearch" => array(
    "icon" => "plsearch",
    "title" => "PlanetSearch",
    "rule" => array(
      "fido[ /]([0-9.]{1,10}) Harvest" => "PlanetSearch"
    )
  ),
  "poodle" => array(
    "icon" => "robot",
    "title" => "Poodle predictor",
    "rule" => array(
      "Poodle[ \-]?predictor" => ""
    )
  ),
  "pompos" => array(
    "icon" => "pompos",
    "title" => "Pompos",
    "rule" => array(
      "Pompos[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "popdex" => array(
    "icon" => "robot",
    "title" => "Popdexter",
    "rule" => array(
      "Popdexter" => ""
    )
  ),
  "powermarks" => array(
    "icon" => "robot",
    "title" => "Powermarks",
    "rule" => array(
      "Powermarks[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "proxycache" => array(
    "icon" => "robot",
    "title" => "Proxy Cache",
    "rule" => array(
      "^Mozilla/[0-9.]{1,10} \(compatible\;\)$" => ""
    )
  ),
  "proxyhunter" => array(
    "icon" => "robot",
    "title" => "ProxyHunter",
    "rule" => array(
      "ProxyHunter" => ""
    )
  ),
  "psbot" => array(
    "icon" => "robot",
    "title" => "PicSearch",
    "rule" => array(
      "^psbot" => ""
    )
  ),
  "pubsub" => array(
    "icon" => "robot",
    "title" => "PubSub",
    "rule" => array(
      "^PubSub\.com" => ""
    )
  ),
  "pukiwiki" => array(
    "icon" => "pukiwiki",
    "title" => "PukiWiki",
    "rule" => array(
      "PukiWiki[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "pxys" => array(
    "icon" => "robot",
    "title" => "PXYS",
    "rule" => array(
      "^pxys" => ""
    )
  ),
  "quepasa" => array(
    "icon" => "quepasa",
    "title" => "Quepasa",
    "rule" => array(
      "Quepasa[ \-]?Creep" => ""
    )
  ),
  "questfinder" => array(
    "icon" => "robot",
    "title" => "QuestFinder",
    "rule" => array(
      "www\.questfinder\.com" => ""
    )
  ),
  "rambler" => array(
    "icon" => "rambler",
    "title" => "Rambler",
    "rule" => array(
      "StackRambler[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "repia" => array(
    "icon" => "robot",
    "title" => "Repia",
    "rule" => array(
      "webmaster@repia\.com" => ""
    )
  ),
  "robozilla" => array(
    "icon" => "robot",
    "title" => "Robozilla",
    "rule" => array(
      "Robozilla" => ""
    )
  ),
  "rojo" => array(
    "icon" => "robot",
    "title" => "Rojo",
    "rule" => array(
      "aggregator\:Rojo[;\)]" => ""
    )
  ),
  "rssbandit" => array(
    "icon" => "rssbandit",
    "title" => "RssBandit",
    "rule" => array(
      "RssBandit[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "rssowl" => array(
    "icon" => "rssowl",
    "title" => "RSSOwl",
    "rule" => array(
      "RSSOwl[ /]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "rssreader" => array(
    "icon" => "robot",
    "title" => "RssReader",
    "rule" => array(
      "RssReader[ /]([0-9.]{1,10})" => ""
    )
  ),
  "sanszbot" => array(
    "icon" => "robot",
    "title" => "Sansz",
    "rule" => array(
      "SanszBot" => ""
    )
  ),
  "saucereader" => array(
    "icon" => "saucereader",
    "title" => "Sauce Reader",
    "rule" => array(
      "Sauce[ ]?Reader[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "scirus" => array(
    "icon" => "robot",
    "title" => "Scirus",
    "rule" => array(
    "FAST-WebCrawler/[0-9a-z.]{1,10}/Scirus" => ""
    )
  ),
  "scrubby" => array(
    "icon" => "scrubby",
    "title" => "Scrubby",
    "rule" => array(
      "Scrubby[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "sealinks" => array(
    "icon" => "robot",
    "title" => "Sea Links",
    "rule" => array(
    "SEA-Links( HTML-Scanner Pingoo\!)?[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "searchch" => array(
    "icon" => "robot",
    "title" => "Search.ch",
    "rule" => array(
      "search\.ch[ /]?V?([0-9.]{1,10})" => "\\1"
    )
  ),
  "searchthruus" => array(
    "icon" => "robot",
    "title" => "SearchThruUs",
    "rule" => array(
      "www\.unitek-systems\.co\.uk[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "seekport" => array(
    "icon" => "seekport",
    "title" => "Seekport",
    "rule" => array(
      "Seekbot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "semanticdiscovery" => array(
    "icon" => "robot",
    "title" => "Semantic Discovery",
    "rule" => array(
      "semanticdiscovery[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "shareware" => array(
    "icon" => "robot",
    "title" => "Shareware",
    "rule" => array(
      "Program[ \-]?Shareware[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "sharpreader" => array(
    "icon" => "sharpreader",
    "title" => "SharpReader",
    "rule" => array(
      "SharpReader[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "sherlockspider" => array(
    "icon" => "robot",
    "title" => "Sherlock Spider",
    "rule" => array(
      "sherlock_spider" => ""
    )
  ),
  "siege" => array(
    "icon" => "robot",
    "title" => "Siege",
    "rule" => array(
      " Siege[ /]([0-9.]{1,10})[\);]" => "\\1"
    )
  ),
  "siets" => array(
    "icon" => "robot",
    "title" => "Siets",
    "rule" => array(
      "SietsCrawler[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "simpy" => array(
    "icon" => "simpy",
    "title" => "Simpy",
    "rule" => array(
      "^simpy[ /]([0-9.]{1,10})" => "\\1",
    )
  ),
  "singingfish" => array(
    "icon" => "singingfish",
    "title" => "SingingFish",
    "rule" => array(
      "asterias[ /]([0-9.]{1,10})" => "\\1",
      "asterias" => ""
    )
  ),
  "sirobot" => array(
    "icon" => "robot",
    "title" => "SiroBot",
    "rule" => array(
      "sirobot" => ""
    )
  ),
  "sitebar" => array(
    "icon" => "sitebar",
    "title" => "SiteBar",
    "rule" => array(
      "SiteBar[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "sitespider" => array(
    "icon" => "robot",
    "title" => "SiteSpider",
    "rule" => array(
      "^SiteSpider" => ""
    )
  ),
  "soegning" => array(
    "icon" => "robot",
    "title" => "S&oslash;gning",
    "rule" => array(
      "soegning\.dk/spider[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "soft411" => array(
    "icon" => "soft411",
    "title" => "Soft411",
    "rule" => array(
      "SOFT411 Directory" => ""
    )
  ),
  "sohu" => array(
    "icon" => "robot",
    "title" => "Sohu",
    "rule" => array(
      "sohu-search" => ""
    )
  ),
  "souppot" => array(
    "icon" => "robot",
    "title" => "SoupPot",
    "rule" => array(
      "SoupPotBot" => ""
    )
  ),
  "stardownloader" => array(
    "icon" => "stardownloader",
    "title" => "Star Downloader",
    "rule" => array(
      "^Star Downloader( Pro)?" => ""
    )
  ),
  "steeler" => array(
    "icon" => "robot",
    "title" => "Steeler",
    "rule" => array(
      "Steeler[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "superbot" => array(
    "icon" => "superbot",
    "title" => "SuperBot",
    "rule" => array(
      "SuperBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "surfcontrol" => array(
    "icon" => "robot",
    "title" => "SurfControl",
    "rule" => array(
      "SurfControl" => ""
    )
  ),
  "surfnet" => array(
    "icon" => "robot",
    "title" => "SURFnet",
    "rule" => array(
      "AVSearch[ \-]([0-9.]{1,10})" => "\\1"
    )
  ),
  "surveybot" => array(
    "icon" => "robot",
    "title" => "Whois Survey",
    "rule" => array(
      "SurveyBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "syndic8" => array(
    "icon" => "robot",
    "title" => "Syndic8",
    "rule" => array(
      "Syndic8[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "syndicatie" => array(
    "icon" => "robot",
    "title" => "Syndicatie.nl",
    "rule" => array(
      "Syndicatie\.nl robot;" => ""
    )
  ),
  "szukacz" => array(
    "icon" => "szukacz",
    "title" => "Szukacz",
    "rule" => array(
      "Szukacz[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "tamu" => array(
    "icon" => "robot",
    "title" => "Tamu Crawler",
    "rule" => array(
      "TAMU_CS_IRL_CRAWLER[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "technorati" => array(
    "icon" => "technorati",
    "title" => "Technorati",
    "rule" => array(
      "Technoratibot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "teleport" => array(
    "icon" => "teleport",
    "title" => "Teleport",
    "rule" => array(
      "Teleport[ \-]?Pro" => ""
    )
  ),
  "terrar" => array(
    "icon" => "robot",
    "title" => "Terrar",
    "rule" => array(
      "^Fresh Search :: Terrar" => ""
    )
  ),
  "thunderstone" => array(
    "icon" => "thunderstone",
    "title" => "Thunderstone",
    "rule" => array(
      "T-H-U-N-D-E-R-S-T-O-N-E" => ""
    )
  ),
  "timbobot" => array(
    "icon" => "robot",
    "title" => "timboBot",
    "rule" => array(
      "timboBot" => ""
    )
  ),
  "tricus" => array(
    "icon" => "robot",
    "title" => "Tricus",
    "rule" => array(
      "B_l_i_t_z_B_O_T_@_t_r_i_c_u_s_\._c_o_m" => ""
    )
  ),
  "turnitin" => array(
    "icon" => "turnitin",
    "title" => "Turnitin",
    "rule" => array(
      "TurnitinBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "tutorgig" => array(
    "icon" => "robot",
    "title" => "TutorGig",
    "rule" => array(
      "TutorGig(Bot)?[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "typepad" => array(
    "icon" => "typepad",
    "title" => "TypePad",
    "rule" => array(
      "TypePad/([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "udmsearch" => array(
    "icon" => "robot",
    "title" => "UdmSearch",
    "rule" => array(
      "UdmSearch[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "urlcontr" => array(
    "icon" => "robot",
    "title" => "MS URL Control",
    "rule" => array(
      "Microsoft URL[ \-]?Control" => "\\1"
    )
  ),
  "ultraseek" => array(
    "icon" => "robot",
    "title" => "Ultraseek",
    "rule" => array(
      "Ultraseek" => ""
    )
  ),
  "vagabondo" => array(
    "icon" => "wiseguys",
    "title" => "WiseGuys",
    "rule" => array(
      "Vagabondo[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "validator" => array(
    "icon" => "validator",
    "title" => "W3C Validator",
    "rule" => array(
      "W3C_Validator[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "vindex" => array(
    "icon" => "vindex",
    "title" => "Vindex",
    "rule" => array(
      "Vindex[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "voila" => array(
    "icon" => "voila",
    "title" => "Voila",
    "rule" => array(
      "VoilaBot[ /]?[a-z ]*([0-9.]{1,10})" => "\\1"
    )
  ),
  "watson" => array(
    "icon" => "addy",
    "title" => "Dr.Watson",
    "rule" => array(
      "Watson[ /]([0-9.]{1,10})" => "\\1",
      "watson\.addy\.com" => ""
    )
  ),
  "waypath" => array(
    "icon" => "waypath",
    "title" => "Waypath",
    "rule" => array(
      "Waypath[ \-]?Scout" => "",
      "Waypath (development )?crawler" => ""
    )
  ),
  "webcapture" => array(
    "icon" => "robot",
    "title" => "WebCapture",
    "rule" => array(
      " WebCapture[/ ]([0-9.]{1,10})[;\)]" => "\\1"
    )
  ),
  "webcollage" => array(
    "icon" => "robot",
    "title" => "Webcollage",
    "rule" => array(
      "webcollage" => ""
    )
  ),
  "webcopier" => array(
    "icon" => "webcopier",
    "title" => "WebCopier",
    "rule" => array(
      "WebCopier[/ ]v?([0-9.]{1,10})" => "\\1"
    )
  ),
  "webcrawl" => array(
    "icon" => "robot",
    "title" => "WebCrawl",
    "rule" => array(
      "webcrawl\.net" => ""
    )
  ),
  "webmin" => array(
    "icon" => "webmin",
    "title" => "Webmin",
    "rule" => array(
      "^webmin" => ""
    )
  ),
  "webmon" => array(
    "icon" => "webmon",
    "title" => "Webmon",
    "rule" => array(
      "WebMon[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "webpix" => array(
    "icon" => "webpix",
    "title" => "WebPix",
    "rule" => array(
      "WebPix[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "webresult" => array(
    "icon" => "robot",
    "title" => "Webresult",
    "rule" => array(
      "Der webresult\.de Robot" => ""
    )
  ),
  "webring" => array(
    "icon" => "robot",
    "title" => "Webring Checker",
    "rule" => array(
      "WebRingChecker[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "websense" => array(
    "icon" => "robot",
    "title" => "Websense",
    "rule" => array(
      "(Sqworm|websense|Konqueror/3\.(0|1)(\-rc[1-6])?; i686 Linux; 2002[0-9]{4})" => ""
    )
  ),
  "websquash" => array(
    "icon" => "websquash",
    "title" => "Websquash",
    "rule" => array(
      "webs(quash\.com|ite[ \-]?Monitor)" => ""
    )
  ),
  "webstripper" => array(
    "icon" => "robot",
    "title" => "WebStripper",
    "rule" => array(
      "WebStripper[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "webzip" => array(
    "icon" => "webzip",
    "title" => "WebZIP",
    "rule" => array(
      "Web[ \-]?ZIP[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wep" => array(
    "icon" => "robot",
    "title" => "WEP Search",
    "rule" => array(
      "WEP Search[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wget" => array(
    "icon" => "wget",
    "title" => "Wget",
    "rule" => array(
      "Wget[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wmp" => array(
    "icon" => "robot",
    "title" => "WMP",
    "rule" => array(
      "^WMP" => ""
    )
  ),
  "worldlight" => array(
    "icon" => "worldlight",
    "title" => "WorldLight",
    "rule" => array(
      "^WorldLight" => ""
    )
  ),
  "worqmada" => array(
    "icon" => "robot",
    "title" => "WorQmada",
    "rule" => array(
        "WorQmada[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wotbox" => array(
    "icon" => "wotbox",
    "title" => "Wotbox",
    "rule" =>
    array(
      "Wotbox[ /]?[a-z]*([0-9.]{1,10})" => "\\1"
    )
  ),
  "wp" => array(
    "icon" => "wp",
    "title" => "Wirtualna Polska",
    "rule" => array(
      "NetSprint[ /\-]{1,4}([0-9.]{1,10})" => "\\1"
    )
  ),
  "wwgrapevine" => array(
    "icon" => "wwgrapevine",
    "title" => "WWgrapevine",
    "rule" => array(
      "wwgrapevine[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wwwc" => array(
    "icon" => "wwwc",
    "title" => "WWWC",
    "rule" => array(
      "^WWWC[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wwwd" => array(
    "icon" => "robot",
    "title" => "WWWD",
    "rule" => array(
      "^WWWD[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "wwweasel" => array(
    "icon" => "wwweasel",
    "title" => "WWWeasel",
    "rule" => array(
      "WWWeasel( Robot)?[/ ]v?([0-9.]{1,10})" => "\\2"
    )
  ),
  "wysigot" => array(
    "icon" => "wysigot",
    "title" => "Wysigot",
    "rule" => array(
      "Wysigot[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "xenu" => array(
    "icon" => "robot",
    "title" => "Xenu Link Sleuth",
    "rule" => array(
      "Xenu(&#039;s)? Link Sleuth[/ ]([0-9a-z.]{1,10})" => "\\1"
    )
  ),
  "yahoo" => array(
    "icon" => "yahoo",
    "title" => "Yahoo",
    "rule" => array(
      "Yahoo(! ([a-z]{1,3} )?Slurp;|-|FeedSeeker)" => ""
    )
  ),
  "yandex" => array(
    "icon" => "yandex",
    "title" => "Yandex",
    "rule" => array(
      "Yandex[/ ]([0-9.]{1,10})" => "\\1"
    )
  ),
  "zao" => array(
    "icon" => "robot",
    "title" => "Zao",
    "rule" => array(
      "Zao[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "zealbot" => array(
    "icon" => "zeal",
    "title" => "ZealBot",
    "rule" => array(
      "Zealbot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "zeus" => array(
    "icon" => "robot",
    "title" => "Zeus",
    "rule" => array(
      "Zeus" => ""
    )
  ),
  "zippp" => array(
    "icon" => "robot",
    "title" => "Zippp",
    "rule" => array(
      "ZipppBot[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
  "zyborg" => array(
    "icon" => "zyborg",
    "title" => "WiseNutBot",
    "rule" => array(
      "Zyborg[ /]([0-9.]{1,10})" => "\\1"
    )
  ),
// generic stuff
  "httpclient" => array(
    "icon" => "robot",
    "title" => "HTTPClient",
    "rule" => array(
      "HTTP[ \-]?Client" => ""
    )
  ),
  "libfetch" => array(
    "icon" => "robot",
    "title" => "Libfetch",
    "rule" => array(
      "^(fetch )?libfetch[ /]([0-9.]{1,10})" => "\\2"
    )
  ),
  "libwww" => array(
    "icon" => "libwww",
    "title" => "libWWW",
    "rule" => array(
      "^libww(w|w-perl|w-FM)[ /]([0-9.]{1,10}))" => "\\1",
      "^libww(w|w-perl|w-FM))" => ""
    )
  ),
  "pythonurl" => array(
    "icon" => "robot",
    "title" => "Python-url",
    "rule" => array(
      "Python[ \-]?urllib" => ""
    )
  ),
// Catch up for things we don't know by now
  "robot" => array(
    "icon" => "robot",
    "title" => "Robot",
    "rule" => array(
      "(robot|crawler|spider|harvest)" => ""
    )
  )
);
?>