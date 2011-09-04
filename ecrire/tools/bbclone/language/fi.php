<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/fi.php,v 1.25 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Ville Pohjanheimo (vpohjanheimo on hotmail)
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "BBclone tiimi - Lisenssi on",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "kyllä",
"global_no" => "ei",

// The error messages
"error_cannot_see_config" =>
"Sinulle ei ole annettu oikeuksia tarkastella BBClonen asetuksia tällä palvelimella.",

// Address Extensions
"numeric" => "Numeerinen", "com" => "Kaupallinen",
"net" => "Verkko", "edu" => "Oppilaitos",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japani", "us" => "Yhdysvallat",
"uk" => "Iso-Britannia","de" => "Saksa",
"mil" => "USAn armeija","ca" => "Kanada",
"it" => "Italia", "au" => "Australia",
"org" => "Organisaatio", "nl" => "Alankomaat",
"fr" => "Ranska", "tw" => "Taiwan",
"gov" => "Hallitus","fi" => "Suomi",
"br" => "Brasilia", "se" => "Ruotsi",
"es" => "Espanja", "no" => "Norja",
"mx" => "Meksiko", "kr" => "Korea",
"ch" => "Sweitsi", "dk" => "Tanska",
"be" => "Belgia", "at" => "Itävalta",
"nz" => "Uusi Seelanti","ru" => "Venäjä",
"pl" => "Puola", "za" => "Etelä-Afrikka",
"unknown" => "Tuntematon","ar" => "Argentiina",
"il" => "Israel", "sg" => "Singapori",
"arpa" => "Arpanet", "cz" => "Tsekki",
"hu" => "Unkari", "hk" => "Hong Kong",
"pt" => "Portugali","tr" => "Turkki",
"gr" => "Kreikka", "cn" => "Kiina",
"ie" => "Irlanti", "my" => "Malesia",
"th" => "Thaimaa", "cl" => "Chile",
"co" => "Kolumbia", "is" => "Islanti",
"uy" => "Uruguay", "ee" => "Eesti",
"in" => "Intia", "ua" => "Ukraina",
"sk" => "Slovakia", "ro" => "Romania",
"ae" => "Yhdistyneet Arabi Emiraatit","id" => "Indonesia",
"su" => "Neuvostoliitto","si" => "Slovenia",
"hr" => "Kroatia", "ph" => "Philippiinit",
"lv" => "Latvia", "ve" => "Venezuela",
"bg" => "Bulgaria", "lt" => "Liettua",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Kansainvälinen",
"do" => "Dominikaaninen Tasavalta","cy" => "Kypros",
"pk" => "Pakistan", "cc" => "Cocos (Keeling) Saaret",
"tt" => "Trinidad ja Tobago", "eg" => "Egypti",
"lb" => "Libanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakhstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Saudi Arabia",
"zw" => "Zimbabwe", "kg" => "Kyrgyzstan",
"cx" => "Joulusaaret", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Makedonia", "gl" => "Grönlanti",
"ec" => "Ecuadori", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Färsaaret",
"ac" => "Ascension Saaret", "pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "Ranskan Polynesia",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Marokko",
"ke" => "Kenia", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepali",
"bt" => "Bhutan", "sz" => "Swazimaa",
"ba" => "Bosnia Herzegowina","om" => "Oman",
"jo" => "Jordania", "ir" => "Iran",
"st" => "Sao Tome ja Principe", "vi" => "Neitsyt Saaret (U.S.)",
"ci" => "Norsunluurannikko","jm" => "Jamaika",
"li" => "Liechtenstein", "ky" => "Cayman Saaret",
"gp" => "Guadeloupe", "mg" => "Madagascar",
"gi" => "Gibraltari", "sm" => "San Marino",
"as" => "Amerikan Samoa", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monako", "sn" => "Senegal",
"hm" => "Heardin and Mc Donaldin Saaret", "fm" => "Micronesia",
"fj" => "Fiji", "cu" => "Kuuba",
"rw" => "Ruanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua New Guinea",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldiivit",
"nc" => "Uusi Caledonia", "ag" => "Antigua and Barbuda",
"uz" => "Uzbekistan", "tj" => "Tajikistan",
"sb" => "Solomon Islands", "bf" => "Burkina Faso",
"kh" => "Kamputsea", "tc" => "Turks and Caicos Saaret",
"tf" => "Ranskan eteläiset territoriot", "az" => "Azerbaijan",
"dm" => "Dominica", "mz" => "Mozambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Ranskan Guiana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albania", "gh" => "Ghana",
"nf" => "Norfolk Saaret", "io" => "Britannian Intian valtameren territoriot",
"gs" => "Etelä-Georgia ja Etelä-Sandwichin saaret", "ye" => "Jemen",
"an" => "Alankomaiden Antilles","aq" => "Etelämanner",
"tn" => "Tunisia", "ck" => "Cook Saaret",
"ls" => "Lesotho", "et" => "Etiopia",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Neitsyt Saaret (Britannia)","vn" => "Vietnam",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Algeria",
"im" => "Man-saari", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Yhdistyneet kuningaskunnat","bs" => "Bahamas",
"va" => "Vatikaani", "lc" => "Saint Lucia",
"cd" => "Kongo", "gm" => "Gambia",
"mp" => "Pohjoiset Marianan saaret", "gw" => "Guinea-Bissau",
"cm" => "Kameron", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libya",
"cf" => "Keskiafrikan tasavalta", "mm" => "Myanmar",
"td" => "Chad", "iq" => "Iraq",
"kn" => "Saint Kitts ja Nevis", "sc" => "Seychellit",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistani",
"cv" => "Cape Verde", "mh" => "Marshall Saaret",
"pm" => "St. Pierre ja Miquelon", "so" => "Somalia",
"vc" => "St. Vincent ja Grenadiinit", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet saari",
"fk" => "Falklandit (Malvinas)", "gq" => "Päiväntasaajan Guinea",
"sd" => "Sudan", "sj" => "Svalbard ja Jan Mayen Islands",
"sr" => "Suriname", "sy" => "Syyria",
"tp" => "Itä-Timor", "um" => "Yhdysvaltojen Minor Outlying Islands",
"wf" => "Wallis ja Futuna Islands", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Muu",
"misc_unknown" => "Tuntematon",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Seurattu sivusto",
"navbar_Configuration" => "Asetukset",
"navbar_Global_Stats" => "Kokonaistilastot",
"navbar_Detailed_Stats" => "Käyntikertakoht. tilastot",
"navbar_Time_Stats" => "Aikatilastot",

// Detailed stats words
"dstat_id" => "Nro",
"dstat_time" => "Aika",
"dstat_visits" => "Lkm",
"dstat_extension" => "Pääte",
"dstat_dns" => "Osoite",
"dstat_from" => "Lähdesivu",
"dstat_os" => "Käyttöjärjestelmä",
"dstat_browser" => "Selain",
"dstat_visible_rows" => "Listassa vierailuja",
"dstat_green_rows" => "vihreä rivi",
"dstat_blue_rows" => "sininen rivi",
"dstat_red_rows" => "punainen rivi",
"dstat_last_visit" => "viimeinen vierailu",
"dstat_robots" => "robotteja",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Vierailuja",
"gstat_Total_visits" => "Yhteensä",
"gstat_Total_unique" => "Eri osoitteista",
"gstat_Operating_systems" => "Top %d käyttöjärjestelmää",
"gstat_Browsers" => "Top %d selainta",
"gstat_extensions" => "Top %d päätettä",
"gstat_Robots" => "Top %d robottia",
"gstat_pages" => "Top %d sivua",
"gstat_origins" => "Top %d viittaavaa sivua",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Yhteensä",
"gstat_Not_specified" => "Ei määritelty",

// Time stats words
"tstat_Su" => "Su",
"tstat_Mo" => "Ma",
"tstat_Tu" => "Ti",
"tstat_We" => "Ke",
"tstat_Th" => "To",
"tstat_Fr" => "Pe",
"tstat_Sa" => "La",

"tstat_Jan" => "Tam",
"tstat_Feb" => "Hel",
"tstat_Mar" => "Maa",
"tstat_Apr" => "Huh",
"tstat_May" => "Tou",
"tstat_Jun" => "Kes",
"tstat_Jul" => "Hei",
"tstat_Aug" => "Elo",
"tstat_Sep" => "Syy",
"tstat_Oct" => "Lok",
"tstat_Nov" => "Mar",
"tstat_Dec" => "Jou",

"tstat_last_day" => "Viimeisen vuorokauden aikana",
"tstat_last_week" => "Viimeisen viikon aikana",
"tstat_last_month" => "Viimeisen kuukauden aikana",
"tstat_last_year" => "Viimeisen vuoden aikana",

// Configuration page words and sentences
"config_Variable_name" => "Muuttuja",
"config_Variable_value" => "Muuttujan arvo",
"config_Explanations" => "Kuvaus",

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
"Kaikilla BBClonen luomilla sivuilla näkyvä otsikko.<br />
Seuraavia muuttujia voi käyttää:<br />
<ul>
<li>%SERVER: palvelimen nimi,</li>
<li>%DATE: päivämäärä.</li>
</ul>
HTML-koodi on myös ok.<br />
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