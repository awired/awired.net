<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/pl.php,v 1.33 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Dariusz Kramin, kramer@irc.pl
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-2",

// Date format (used with date() )
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "Grupa BBClone, wersja polska <a href=\"mailto:kramer@irc.pl\">Dariusz Kramin</a> - Na licencji",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "tak",
"global_no" => "nie",

// The error messages
"error_cannot_see_config" =>
"Nie posiadasz uprawnieñ do ogl±dania konfiguracji statystyk.",

// Address Extensions
"numeric" => "Bez revDNS", "com" => "Komercyjne",
"net" => "Sieci", "edu" => "Edukacja",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonia", "us" => "Stany Zjednoczone",
"uk" => "Zjednoczone Królestwo", "de" => "Niemcy",
"mil" => "Wojsko USA", "ca" => "Kanada",
"it" => "W³ochy", "au" => "Australia",
"org" => "Organizacje", "nl" => "Holandia",
"fr" => "Francja", "tw" => "Tajwan",
"gov" => "Rz±dy", "fi" => "Finlandia",
"br" => "Brazylia", "se" => "Szwecja",
"es" => "Hiszpania", "no" => "Norwegia",
"mx" => "Meksyk", "kr" => "Korea",
"ch" => "Szwarcajria", "dk" => "Dania",
"be" => "Belgia", "at" => "Austria",
"nz" => "Nowa Zelandia", "ru" => "Federacja Rosyjska",
"pl" => "Polska", "za" => "Po³udniowa Afryka",
"unknown" => "Nieznany", "ar" => "Argentyna",
"il" => "Izrael", "sg" => "Singapur",
"arpa" => "B³±d DNS", "cz" => "Czechy",
"hu" => "Wêgry", "hk" => "Hong Kong",
"pt" => "Portugalia", "tr" => "Turcja",
"gr" => "Grecja", "cn" => "Chiny",
"ie" => "Irlandia", "my" => "Malezja",
"th" => "Tailandia", "cl" => "Czile",
"co" => "Kolumbia", "is" => "Islandia",
"uy" => "Urugwaj", "ee" => "Estonia",
"in" => "Indie", "ua" => "Ukraina",
"sk" => "S³owacja", "ro" => "Rumunia",
"ae" => "Zjednoczone Emiraty Arabskie", "id" => "Indonezja",
"su" => "Zwi±zek Radziecki", "si" => "S³owenia",
"hr" => "Chorwacja", "ph" => "Filipiny",
"lv" => "£otwa", "ve" => "Wenezuela",
"bg" => "Bu³garia", "lt" => "Litwa",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kostaryka", "int" => "Organizacje",
"do" => "Dominikana", "cy" => "Cypr",
"pk" => "Pakistan", "cc" => "Wyspy Kokosowe",
"tt" => "Trinidad i Tobago", "eg" => "Egipt",
"lb" => "Lebanon", "kw" => "Kuwejt",
"to" => "Tonga", "kz" => "Kazahstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermudy", "sa" => "Arabia Saudyjska",
"zw" => "Zimbabwe", "kg" => "Kirgistan",
"cx" => "Wyspy Boego Narodzenia", "pa" => "Panama",
"gt" => "Gwatemala", "bw" => "Botswana",
"mk" => "Macedonia", "gl" => "Grenlandia",
"ec" => "Ekwador", "lk" => "Sri Lanka",
"md" => "Mo³dawia", "py" => "Paragwaj",
"bo" => "Boliwia", "bn" => "Brunea",
"mt" => "Malta", "fo" => "Wyspy Faroe",
"ac" => "Wyspa Ascension", "pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "Polinezja Fracuska",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nikaragua", "by" => "Bia³oru¶",
"sv" => "Salwador", "ma" => "Maroko",
"ke" => "Kenja", "ad" => "Andora",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bo¶nia i Hercegowina", "om" => "Oman",
"jo" => "Jordania", "ir" => "Iran",
"st" => "Sao Tome", "vi" => "Wyspy Dziewicze (U.S.)",
"ci" => "Wybrze¿e Ko¶ci S³oniowej", "jm" => "Jamajka",
"li" => "Lichtenstein", "ky" => "Kajmany",
"gp" => "Gwadelupa", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Samoa Amerykañska", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monako", "sn" => "Senegal",
"hm" => "Wyspu Mc Donalda", "fm" => "Mikronezja",
"fj" => "Fiji", "cu" => "Kuba",
"rw" => "Rwanda", "mq" => "Martinika",
"ai" => "Anguila", "pg" => "Papua Nowa Gwinea",
"bz" => "Belize", "sh" => "Wyspa ¦wiêtej Heleny",
"aw" => "Aruba", "mv" => "Malediwy",
"nc" => "Nowa Kaledonia", "ag" => "Antigua i Barbuda",
"uz" => "Uzbekistan", "tj" => "Tajikistan",
"sb" => "Wyspy Salomona", "bf" => "Burkina Faso",
"kh" => "Kamboda", "tc" => "Wyspy Kaiko",
"tf" => "Francuskie Terytorium Po³udniowe", "az" => "Azerbejd¿an",
"dm" => "Dominika", "mz" => "Mozambik",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Gujana Francuska",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albania", "gh" => "Ghana",
"nf" => "Wyspy Norfolk", "io" => "Brytyjskie Terytorium Oceanu Indyjskiego",
"gs" => "Po³udniowa Georgia i Wyspy Sandwitch", "ye" => "Jemen",
"an" => "Antyle Holenderskie", "aq" => "Antarktyka",
"tn" => "Tunezja", "ck" => "Wyspy Cooka",
"ls" => "Lesotho", "et" => "Etiopia",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Brytyjskie Wyspy Dziewicze", "vn" => "Vietnam",
"mr" => "Mauretania", "gy" => "Gujana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Komory", "dz" => "Algeria",
"im" => "Wyspa Man", "pn" => "Pitcairn",
"qa" => "Katar", "gg" => "Wyspa Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Zjednoczone Królestwo Brytyjskie", "bs" => "Bahamy",
"va" => "Watykan", "lc" => "¦wiêta ucja",
"cd" => "Kongo", "gm" => "Gambia",
"mp" => "Pó³nocne Wyspy Mariana", "gw" => "Gwinea-Bissau",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Erytrea", "ly" => "Libia",
"cf" => "Republika Afyki", "mm" => "Myanmar",
"td" => "Czad", "iq" => "Irak",
"kn" => "Saint Kitts i Nevis", "sc" => "Seszele",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganistan",
"cv" => "Cape Verde", "mh" => "Wyspy Marshalla",
"pm" => "St. Pierre i Miquelon", "so" => "Somalia",
"vc" => "St. Vincent i Grenadines", "bd" => "Bangladesz",
"gn" => "Gwinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "Falklandy", "gq" => "Gwinea Równikowa",
"sd" => "Sudan", "sj" => "Svalbard i wyspy Jan Mayen",
"sr" => "Surinam", "sy" => "Syria",
"tp" => "Wschodni Timor", "um" => "Pozaterytorialne wyspy USA",
"wf" => "Wallis i wyspy Futuna", "yt" => "Majott",
"zr" => "Zair",

// Miscellaneous translations
"misc_other" => "Inne",
"misc_unknown" => "Nieznany",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Strona G³ówna",
"navbar_Configuration" => "Konfiguracja",
"navbar_Global_Stats" => "G³ówna statystyka",
"navbar_Detailed_Stats" => "Statystyka szczegó³owa",
"navbar_Time_Stats" => "Statystyka czasowa",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Czas",
"dstat_visits" => "Wizyt",
"dstat_extension" => "Rozszerzenie",
"dstat_dns" => "Hostname",
"dstat_from" => "OD",
"dstat_os" => "System",
"dstat_browser" => "Przegl±darka",
"dstat_visible_rows" => "Widoczne odwiedziny",
"dstat_green_rows" => "zielone rzêdy",
"dstat_blue_rows" => "niebieskie rzêdy",
"dstat_red_rows" => "czerwone rzêdy",
"dstat_last_visit" => "ostatnie wizyty",
"dstat_robots" => "roboty",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Dostêpy",
"gstat_Total_visits" => "Wszytkie wizyty",
"gstat_Total_unique" => "Unikalne adresy",
"gstat_Operating_systems" => "%d pierwszych Systemy operacyjne",
"gstat_Browsers" => "%d pierwszych Przegl±darki",
"gstat_extensions" => "%d pierwszych rozszerzeñ",
"gstat_Robots" => "%d pierwszych Roboty",
"gstat_pages" => "%d pierwszych stron",
"gstat_origins" => "%d pierwszych ¼róde³",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Razem",
"gstat_Not_specified" => "Nie wyszczególnione",

// Time stats words
"tstat_Su" => "Nie",
"tstat_Mo" => "Pon",
"tstat_Tu" => "Wto",
"tstat_We" => "¦ro",
"tstat_Th" => "Czw",
"tstat_Fr" => "Pi±",
"tstat_Sa" => "Sob",

"tstat_Jan" => "Sty",
"tstat_Feb" => "Lut",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Kwi",
"tstat_May" => "Maj",
"tstat_Jun" => "Cze",
"tstat_Jul" => "Lip",
"tstat_Aug" => "Sie",
"tstat_Sep" => "Wrz",
"tstat_Oct" => "Pa¼",
"tstat_Nov" => "Lis",
"tstat_Dec" => "Gru",

"tstat_last_day" => "Ostani dzieñ",
"tstat_last_week" => "Ostani tydzieñ",
"tstat_last_month" => "Ostatni miesi±c",
"tstat_last_year" => "Ostatni rok",

// Configuration page words and sentences
"config_Variable_name" => "Nazwa zmiennej",
"config_Variable_value" => "Warto¶æ zmiennej",
"config_Explanations" => "Wyja¶nienie",

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
"Ta linijka jest widoczna we wszystkich stonach statystyki.<br />
Znane makrodefinicje to:<br />
<ul>
<li>%SERVER: nazwa serwera,</li>
<li>%DATE: obecja data.</li>
</ul>
Tagi HTML s± dozwolone.<br />
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