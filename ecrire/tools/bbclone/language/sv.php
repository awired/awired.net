<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/sv.php,v 1.7 2004/10/17 14:08:40 olliver Exp $
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
 *
 * Translated by: Erik Englund, erkend00@student.umu.se
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d-m-Y",

// Global translation
"global_bbclone_copyright" => "BBClone-teamet - licensierad under ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "ja",
"global_no" => "nej",

// The error messages
"error_cannot_see_config" =>
"Du har inte tillst&aring;nd att se BBClone-konfigurationen p&aring; den h&auml;r servern.",

// Address Extensions
"numeric" => "Numerisk", "com" => "Kommersiell",
"net" => "N&auml;tverk", "edu" => "Utbildning",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japan", "us" => "F&ouml;renta staterna",
"uk" => "F&ouml;renade kungariket", "de" => "Tyskland",
"mil" => "F&ouml;renta staternas milit&auml;r", "ca" => "Kanada",
"it" => "Italien", "au" => "Australien",
"org" => "Organisationer", "nl" => "Nederl&auml;nderna",
"fr" => "Frankrike", "tw" => "Taiwan",
"gov" => "F&ouml;renta staternas regering", "fi" => "Finland",
"br" => "Brasilien", "se" => "Sverige",
"es" => "Spanien", "no" => "Norge",
"mx" => "Mexico", "kr" => "Korea",
"ch" => "Schweiz", "dk" => "Danmark",
"be" => "Belgien", "at" => "&Ouml;sterrike",
"nz" => "Nya Zeeland", "ru" => "Ryssland",
"pl" => "Polen", "za" => "Sydafrika",
"unknown" => "Ok&auml;nd", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapore",
"arpa" => "Fel", "cz" => "Tjeckien",
"hu" => "Ungern", "hk" => "Hongkong",
"pt" => "Portugal", "tr" => "Turkiet",
"gr" => "Grekland", "cn" => "Kina",
"ie" => "Irland", "my" => "Malaysia",
"th" => "Thailand", "cl" => "Chile",
"co" => "Colombia", "is" => "Island",
"uy" => "Uruguay", "ee" => "Estland",
"in" => "Indien", "ua" => "Ukraina",
"sk" => "Slovakien", "ro" => "Rum&auml;nien",
"ae" => "F&ouml;renade Arabemiraten", "id" => "Indonesien",
"su" => "Sovjetunionen", "si" => "Slovenien",
"hr" => "Kroatien", "ph" => "Filippinerna",
"lv" => "Lettland", "ve" => "Venezuela",
"bg" => "Bulgarien", "lt" => "Litauen",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Internationella organisationer",
"do" => "Dominikanska republiken", "cy" => "Cypern",
"pk" => "Pakistan", "cc" => "Kokos&ouml;arna",
"tt" => "Trinidad och Tobago", "eg" => "Egypten",
"lb" => "Libanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Saudiarabien",
"zw" => "Zimbabwe", "kg" => "Kirgizistan",
"cx" => "Jul&ouml;n", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Makedonien", "gl" => "Gr&ouml;nland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "F&auml;r&ouml;arna",
"ac" => "Ascension", "pr" => "Puerto Rico",
"am" => "Armenien", "pf" => "Franska Polynesien",
"ge" => "Georgien", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Vitryssland",
"sv" => "El Salvador", "ma" => "Marocko",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnien och Hercegovina", "om" => "Oman",
"jo" => "Jordanien", "ir" => "Iran",
"st" => "São Tomé och Príncipe", "vi" => "Jungfru&ouml;arna (US)",
"ci" => "Elfenbenskusten", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Cayman&ouml;arna",
"gp" => "Guadeloupe", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Amerikanska Samoa", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Heard&ouml;n och McDonald&ouml;arna", "fm" => "Mikronesien",
"fj" => "Fiji", "cu" => "Kuba",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua Nua Guinea",
"bz" => "Belize", "sh" => "Saint Helena",
"aw" => "Aruba", "mv" => "Maldiverna",
"nc" => "Nya Kaledonien", "ag" => "Antigua och Barbuda",
"uz" => "Uzbekistan", "tj" => "Tadzjikistan",
"sb" => "Salomon&ouml;arna", "bf" => "Burkina Faso",
"kh" => "Kambodja", "tc" => "Turks- och Caicos&ouml;arna",
"tf" => "De franska territorierna i s&ouml;dra Indiska oceanen", "az" => "Azerbajdzjan",
"dm" => "Dominica", "mz" => "Moçambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongoliet", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Franska Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albanien", "gh" => "Ghana",
"nf" => "Norfolk&ouml;n", "io" => "Brittiska territoriet i Indiska Oceanen",
"gs" => "Sydgeorgien och Sydsandwich&ouml;arna", "ye" => "Yemen",
"an" => "Nederl&auml;ndska Antillerna", "aq" => "Antarktis",
"tn" => "Tunisien", "ck" => "Cook&ouml;arna",
"ls" => "Lesotho", "et" => "Etiopien",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Jungfru&ouml;arna (UK)", "vn" => "Vietnam",
"mr" => "Mauretanien", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Komorerna", "dz" => "Algeriet",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Storbritannien", "bs" => "Bahamas",
"va" => "Heliga stolen", "lc" => "Saint Lucia",
"cd" => "Demokratiska republiken Kongo", "gm" => "Gambia",
"mp" => "Nordmarianerna", "gw" => "Guinea-Bissau",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libyen",
"cf" => "Centralafrikanska republiken", "mm" => "Myanmar",
"td" => "Tchad", "iq" => "Irak",
"kn" => "Saint Christopher och Nevis", "sc" => "Seychellerna",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Kap Verde", "mh" => "Marshall&ouml;arna",
"pm" => "Saint Pierre och Miquelon", "so" => "Somalia",
"vc" => "Saint Vincent och Grenadinerna", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Réunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet&ouml;n",
"fk" => "Falklands&ouml;arna", "gq" => "Ekvatorialguinea",
"sd" => "Sudan", "sj" => "Svalbard och Jan Mayen",
"sr" => "Surinam", "sy" => "Syrien",
"tp" => "&Ouml;sttimor", "um" => "US mindre &ouml;ar i Oceanien och V&auml;stindien",
"wf" => "Wallis och Futuna", "yt" => "Mayotte",
"zr" => "Zaire",


// Miscellaneous translations
"misc_other" => "Annan",
"misc_unknown" => "Ok&auml;nd",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Huvudsidan",
"navbar_Configuration" => "Konfiguration",
"navbar_Global_Stats" => "Global statistik",
"navbar_Detailed_Stats" => "Detaljerad statistik",
"navbar_Time_Stats" => "Tidsstatistik",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tid",
"dstat_visits" => "Bes&ouml;k",
"dstat_extension" => "Toppdom&auml;n",
"dstat_dns" => "Hostname",
"dstat_from" => "Fr&aring;n",
"dstat_os" => "OS",
"dstat_browser" => "Webbl&auml;sare",
"dstat_visible_rows" => "Synliga bes&ouml;k",
"dstat_green_rows" => "gr&ouml;na rader",
"dstat_blue_rows" => "bl&aring; rader",
"dstat_red_rows" => "r&ouml;da rader",
"dstat_last_visit" => "senaste bes&ouml;k",
"dstat_robots" => "robotar",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Bes&ouml;k",
"gstat_Total_visits" => "Totala bes&ouml;k",
"gstat_Total_unique" => "Totala unika",
"gstat_Operating_systems" => "Operativsystem",
"gstat_Browsers" => "Webbl&auml;sare",
"gstat_extensions" => "%d f&ouml;rsta toppdom&auml;nerna",
"gstat_hosts" => "Top %d Hosts",
"gstat_Robots" => "Robotar",
"gstat_pages" => "%d f&ouml;rsta sidorna",
"gstat_origins" => "%d f&ouml;rsta ursprungen",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Totalt",
"gstat_Not_specified" => "Ospecificerade",

// Time stats words
"tstat_Su" => "S&ouml;n",
"tstat_Mo" => "M&aring;n",
"tstat_Tu" => "Tis",
"tstat_We" => "Ons",
"tstat_Th" => "Tor",
"tstat_Fr" => "Fre",
"tstat_Sa" => "L&ouml;r",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "Maj",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Senaste dagen",
"tstat_last_week" => "Senaste veckan",
"tstat_last_month" => "Senaste m&aring;naden",
"tstat_last_year" => "Senaste &aring;ret",

// Configuration page words and sentences
"config_Variable_name" => "Variabelnamn",
"config_Variable_value" => "Variabelv&auml;rde",
"config_Explanations" => "F&ouml;rklaringar",

"config_bbc_mainsite" =>
"If this variable has been set, a link to the specified location will be
generated. The default value is pointing to the parent directory. In case your
main site is located elsewhere, you probably want to adjust the value to suit
your needs.<br />
Examples:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone defaults to revealing the stats' settings. In case this behavior isn't
desired you can deny access to it by deactivating the option.<br />
Examples:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Titeln som visas i titelf&auml;ltet och som &auml;r synlig i alla BBClone-sidor.<br />
Fungerande makros &auml;r:<br />
<ul>
<li>%SERVER: servernamn,</li>
<li>%DATE: nuvarande datum.</li>
</ul>
HTML-taggar &auml;r ocks&aring; till&aring;tna.<br />
Examples:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My stats from %DATE look like this:&quot;;
<br />",

"config_bbc_language" =>
"BBClone's default language, in case it hasn't been specified by the browser.
The following languages are supported:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"This variable defines the length of an unique visit in seconds. Each hit from
the same visitor within this period will be considered as one visit, as long as
two successive hits don't exceed the specified limit. Default is the de facto
web standard of 30 minutes (1800 seconds), but depending on your needs you may
wish to assign a different value.<br />
Examples:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"How many entries you want to have listed in the detailed stats? The default
value is 100. It's recommended not to set it higher than 500 to avoid too heavy
load.",

"config_bbc_detailed_stat_fields" =>
"The variable \$BBC_DETAILED_STAT_FIELDS determines the columns to be displayed
in the detailed statistics. Possible columns are:
<ul>
<li>id&nbsp;=&gt;&nbsp;The x-th visitor since you've started counting</li>
<li>time&nbsp;=&gt;&nbsp;The time at which the last hit was registerred</li>
<li>visits&nbsp;=&gt;&nbsp;The hits of one unique visitor</li>
<li>dns&nbsp;=&gt;&nbsp;Visitor's hostname</li>
<li>ip&nbsp;=&gt;&nbsp;Visitor's IP address</li>
<li>os&nbsp;=&gt;&nbsp;the operating system (if available and/or no robot)</li>
<li>browser&nbsp;=&gt;&nbsp;The software used for establishing the connection
</li>
<li>ext&nbsp;=&gt;&nbsp;Visitor's country or extension</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li></ul>
The same order you've arranged the columns will be used for display.<br />
Examples:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"In case the server time doesn't match your local timezone, you can adjust the
time in minutes by using this switch. Negative values will set back the time,
positive ones will set it forth.<br />
Examples:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"This options defines, whether IP addresses should be resolved to hostnames or
not. While hostnames tell a lot more about the visitor, resolving them may
considerably slow down your site, if the DNS servers used are slow, limited in
their capacity or otherwise unreliable. Setting this variable may solve the
problem.<br />
Examples:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"BBClone's default is to show hits in the time stats, because it gives a quite
useful Impression from the actual server load. If, however, you prefer to use
unique visits as base for your time stats, you can change the way of counting
by setting this variable.<br />
Examples:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"This option can be used to exclude particular IP addresses or address ranges
from counting. In case you want to add several expressions use a comma as
separator.<br />
Examples:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"In case you don't want to have particular referrers from your visitors listed
in your ranking or detailed stats, you can specify one or more keywords used
for blocking if a referrer matches up against them. If you use more keywords,
please use a comma as separator.<br />
Examples:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"You can use this option to determine the treatment of robots. The default is
to ignore them in the top hosts ranking but leave them in the remaining
stats. If you don't want to see any robots at all you can set this option to
&quot;2&quot;, then only human visits will be taken into account.<br />
Examples:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"This option defines how BBClone tells one visitor from another. Default is to
use the IP address only, which provides realistic figures in most cases. If,
however, your visitors often are hidden behind proxy servers, deactivation of
this option could provide more realistic figures, since a new visitor will be
assumed by the time the user agent has changed.<br />
Examples:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Whenever you wish to reset your stats you can activate this switch and have
them deleted by the next visit. Don't forget to deactivate it afterwards, else
you'll probably experience unusually low traffic ;).<br />
Examples:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Host and referrer stats can generate a huge amount of data, however mostly
caused by one time visitors. By enabling this switch you can purge these
entries and considerably shrink access.php in its size without affecting your
actual visible host and referrer ranking. The amount of hits will be added to
the &quot;not_specified&quot; entries to keep the overall score intact.<br />
Examples:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>