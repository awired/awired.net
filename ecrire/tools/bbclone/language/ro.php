<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/ro.php,v 1.32 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: ciprian manea ciprian.manea@welho.com
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-2",

// Date format (used with date() )
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "Echipa BBClone - licenta",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "da",
"global_no" => "nu",

// The error messages
"error_cannot_see_config" =>
"Nu ai dreptul sa vezi configuratia BBClone a acestui server.",

// Address Extensions
"numeric" => "Numeric", "com" => "Commercial",
"net" => "Retele", "edu" => "Educational",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonia", "us" => "Statele Unite",
"uk" => "Marea Britanie", "de" => "Germania",
"mil" => "US Militar", "ca" => "Canada",
"it" => "Italia", "au" => "Australia",
"org" => "Organizatii", "nl" => "Olanda",
"fr" => "Franta", "tw" => "Taiwan",
"gov" => "Guvernamental", "fi" => "Finlanda",
"br" => "Brazilia", "se" => "Suedia",
"es" => "Spania", "no" => "Norvegia",
"mx" => "Mexic", "kr" => "Corea",
"ch" => "Elvetia", "dk" => "Danemarca",
"be" => "Belgia", "at" => "Austria",
"nz" => "Noua Zeelanda", "ru" => "Federatia Rusa",
"pl" => "Polonia", "za" => "Africa de Sud",
"unknown" => "Necunoscut", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapore",
"arpa" => "Greseli", "cz" => "Cehia",
"hu" => "Ungaria", "hk" => "Hong Kong",
"pt" => "Portugalia", "tr" => "Turcia",
"gr" => "Grecia", "cn" => "China",
"ie" => "Irlanda", "my" => "Malaezia",
"th" => "Tailanda", "cl" => "Chile",
"co" => "Columbia", "is" => "Islanda",
"uy" => "Uruguay", "ee" => "Estonia",
"in" => "India", "ua" => "Ucraina",
"sk" => "Slovacia", "ro" => "Romania",
"ae" => "Emiratele Arabe Unite", "id" => "Indonezia",
"su" => "Uniunea Sovietica", "si" => "Slovenia",
"hr" => "Croatia", "ph" => "Filipine",
"lv" => "Letonia", "ve" => "Venezuela",
"bg" => "Bulgaria", "lt" => "Lituania",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Organizatii Internationale",
"do" => "Republica Dominicana", "cy" => "Cipru",
"pk" => "Pakistan", "cc" => "Insulele Cocos",
"tt" => "Trinidad Tobago", "eg" => "Egipt",
"lb" => "Liban", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakhstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermude", "sa" => "Arabia Saudita",
"zw" => "Zimbabwe", "kg" => "Kyrgyzstan",
"cx" => "Insula Craciunului", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Macedonia", "gl" => "Groenlanda",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Insulele Faroe",
"ac" => "Insula Inaltarii",
"pr" => "Porto Rico",
"am" => "Armenia", "pf" => "Polinezia Franceza",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Belarus",
"sv" => "Salvador", "ma" => "Maroc",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnia si Hertegovina", "om" => "Oman",
"jo" => "Iordania", "ir" => "Iran",
"st" => "Sao Tome si Principe", "vi" => "Insulele Virgine (US)",
"ci" => "Coasta de Fildes", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Insulele Cayman",
"gp" => "Guadeloupe", "mg" => "Madagascar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Samoa Americana", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Insulele Heard si Mc Donald", "fm" => "Micronezia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Rwanda", "mq" => "Martinica",
"ai" => "Angola", "pg" => "Papua Noua Guinee",
"bz" => "Belize", "sh" => "Sfanta Elena",
"aw" => "Aruba", "mv" => "Maldive",
"nc" => "Noua Caledonie", "ag" => "Antigua si Barbuda",
"uz" => "Uzbekistan", "tj" => "Tadjikistan",
"sb" => "Insulele Solomon", "bf" => "Burkina Faso",
"kh" => "Cambodgia",
"tc" => "Insulele Turks si Caicos",
"tf" => "Teritoriile Franceze de Sud", "az" => "Azerbaijan",
"dm" => "Dominica", "mz" => "Mozambic",
"mo" => "Macao", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Guiana Franceza",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albania", "gh" => "Ghana",
"nf" => "Insulele Norfolk", "io" => "Teritoriile Engleze din Oceanul Indian",
"gs" => "Georgia de Sud si Insulele Sandwich de Sud", "ye" => "Yemen",
"an" => "Antilele Olandeze", "aq" => "Antarctica",
"tn" => "Tunisia", "ck" => "Insulele Cook",
"ls" => "Lesoto", "et" => "Etiopia",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Insulele Virgine (UK)", "vn" => "Vietnam",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Algeria",
"im" => "Insula Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Marea Britanie", "bs" => "Bahamas",
"va" => "Vatican", "lc" => "Sfanta Lucia",
"cd" => "Congo", "gm" => "Gambia",
"mp" => "Insulele Mariane de Nord", "gw" => "Guineea-Bissau",
"cm" => "Camerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libia",
"cf" => "Republica Central-Africana", "mm" => "Myanmar",
"td" => "Ciad", "iq" => "Irak",
"kn" => "Sf. Kitts si Nevis", "sc" => "Seychelles",
"cg" => "Congo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganistan",
"cv" => "Insula Capul Verde", "mh" => "Insulele Marshall",
"pm" => "Sf. Pierre si Miquelon", "so" => "Somalia",
"vc" => "Sf. Vincent si Grenadine", "bd" => "Banglades",
"gn" => "Guineea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "Insulele Falkland", "gq" => "Guineea Ecuatoriala",
"sd" => "Sudan", "sj" => "Svalbard si Insulele Jan Mayen",
"sr" => "Surinam", "sy" => "Siria",
"tp" => "Timorul de Est", "um" => "Insulele Minor Outlying (US)",
"wf" => "Insulele Wallis si Futuna", "yt" => "Mayotte",
"zr" => "Zair",

// Miscellaneous translations
"misc_other" => "Alt",
"misc_unknown" => "Necunoscut",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Situl Principal",
"navbar_Configuration" => "Configurare",
"navbar_Global_Stats" => "Statistici Generale",
"navbar_Detailed_Stats" => "Statistici Detaliate",
"navbar_Time_Stats" => "Statistici in Timp",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Timp",
"dstat_visits" => "Vizite",
"dstat_extension" => "Extensie",
"dstat_dns" => "Hostname",
"dstat_from" => "De la",
"dstat_os" => "OS",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Accesari vizibile",
"dstat_green_rows" => "randuri verzi",
"dstat_blue_rows" => "randuri albastre",
"dstat_red_rows" => "randuri rosii",
"dstat_last_visit" => "ultima vizita",
"dstat_robots" => "roboti",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Accese",
"gstat_Total_visits" => "Total vizite",
"gstat_Total_unique" => "Total unici",
"gstat_Operating_systems" => "Sisteme de operare",
"gstat_Browsers" => "Browsere",
"gstat_extensions" => "Primele %d extensii",
"gstat_Robots" => "Roboti",
"gstat_pages" => "Primele %d pagini",
"gstat_origins" => "Primele %d origini",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Total",
"gstat_Not_specified" => "Nespecificat",

// Time stats words
"tstat_Su" => "Duminica",
"tstat_Mo" => "Luni",
"tstat_Tu" => "Marti",
"tstat_We" => "Miercuri",
"tstat_Th" => "Joi",
"tstat_Fr" => "Vineri",
"tstat_Sa" => "Sambata",

"tstat_Jan" => "Ian",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "Mai",
"tstat_Jun" => "Iun",
"tstat_Jul" => "Iul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Oct",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Ultima zi",
"tstat_last_week" => "Ultima saptamana",
"tstat_last_month" => "Ultima luna",
"tstat_last_year" => "Ultimul an",

// Configuration page words and sentences
"config_Variable_name" => "Nume variabila",
"config_Variable_value" => "Valoare variabila",
"config_Explanations" => "Explicatii",

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
"Titlul care apare in toate paginile contorului.<br />
Cuvintele cheie sunt:<br />
<ul>
<li>%SERVER: numele server-ului,</li>
<li>%DATE: data curenta.</li>
</ul>
Codul HTML este de asemenea permis.<br />
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