<?php
/*
 * This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/da.php,v 1.35 2004/10/17 14:08:39 olliver Exp $
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
 * translated by: Jonathan Fromer, jf(at)sof.dk
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d-m-Y",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensed under the",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "ja",
"global_no" => "nej",

// The error messages
"error_cannot_see_config" =>
"Du har ikke tilladelse til at se BBClone konfigurationen p&aring; denne server.",

// Address Extensions
"numeric" => "numeric", "com" => "Kommerciel",
"net" => "Netv&aelig;rk","edu" => "Uddannelse",
"biz" => "Business","info" => "Information",
"jp" => "Japan", "us" => "De Forenede Stater",
"uk" => "Storbritannien","de" => "Tyskland",
"name" => "Personal", "ps" => "Palestina",
"mil" => "De Forenede Staters milit&aelig;r", "ca" => "Canada",
"it" => "Italien", "au" => "Australien",
"org" => "Organisationer", "nl" => "Holland",
"fr" => "Frankrig", "tw" => "Taiwan",
"gov" => "De Forenede Staters regering", "fi" => "Finland",
"br" => "Brasilien","se" => "Sverige",
"es" => "Spanien", "no" => "Norge",
"mx" => "Mexico", "kr" => "Korea",
"ch" => "Schweiz", "dk" => "Danmark",
"be" => "Belgien", "at" => "&Oslash;strig",
"nz" => "New Zealand","ru" => "Rusland",
"pl" => "Polen", "za" => "Sydafrika",
"unknown" => "Ukendt", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapore",
"arpa" => "Fejl", "cz" => "Tjekkiet",
"hu" => "Ungarn", "hk" => "Hongkong",
"pt" => "Portugal", "tr" => "Tyrkiet",
"gr" => "Gr&aelig;kenland","cn" => "Kina",
"ie" => "Irland", "my" => "Malaysia",
"th" => "Thailand", "cl" => "Chile",
"co" => "Colombia", "is" => "Island",
"uy" => "Uruguay", "ee" => "Estland",
"in" => "Indien", "ua" => "Ukraine",
"sk" => "Slovakiet","ro" => "Rum&aelig;nien",
"ae" => "Forenede Arabiske Emirater", "id" => "Indonesien",
"su" => "Sovjetunionen", "si" => "Slovenien",
"hr" => "Kroatien", "ph" => "Filippinerne",
"lv" => "Letland", "ve" => "Venezuela",
"bg" => "Bulgarien","lt" => "Litauen",
"yu" => "Serbia and Montenegro","lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica","int" => "Internationale organisationer",
"do" => "Dominikanske Republik", "cy" => "Cypern",
"pk" => "Pakistan", "cc" => "Kokos&oslash;erne",
"tt" => "Trinidad og Tobago", "eg" => "Egypten",
"lb" => "Libanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Saudi-Arabien",
"zw" => "Zimbabwe", "kg" => "Kirgizistan",
"cx" => "Jule&oslash;en","pa" => "Panama",
"gt" => "Guatemala","bw" => "Botswana",
"mk" => "Makedonien","gl" => "Gr&oslash;nland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "F&aelig;r&oslash;erne",
"ac" => "Ascenci&oacute;n","pr" => "Puerto Rico",
"am" => "Armenien", "pf" => "Fransk Polynesien",
"ge" => "Georgien", "bh" => "Bahrain",
"ni" => "Nicaragua","by" => "Hviderusland",
"sv" => "El Salvador","ma" => "Marokko",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnien-Hercegovina", "om" => "Oman",
"jo" => "Jordan", "ir" => "Iran",
"st" => "Sao Tomé og Príncipe", "vi" => "Amerikanske Jomfru&oslash;erne",
"ci" => "Elfenbenskysten","jm" => "Jamaica",
"li" => "Liechtenstein","ky" => "Cayman &oslash;erne",
"gp" => "Guadeloupe","mg" => "Madagaskar",
"gi" => "Gibraltar","sm" => "San Marino",
"as" => "Amerikansk Samoa","tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Heard & Mc Donald &oslash;erne", "fm" => "Mikronesien",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua Nua Guinea",
"bz" => "Belize", "sh" => "Saint Helena",
"aw" => "Aruba", "mv" => "Maldiverne",
"nc" => "Ny Caledonien","ag" => "Antigua og Barbuda",
"uz" => "Uzbekistan","tj" => "Tadzjikistan",
"sb" => "Salamon&oslash;erne", "bf" => "Burkina Faso",
"kh" => "Cambodia", "tc" => "Turks & Caicos &oslash;erne",
"tf" => "Franske Sydlige Territorier", "az" => "Azerbajdzjan",
"dm" => "Dominica", "mz" => "Moçambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongoliet","ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Fransk Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albanien", "gh" => "Ghana",
"nf" => "Norfolk &oslash;en", "io" => "British Indian Ocean Territory",
"gs" => "Georgia & Sandwich &oslash;erne", "ye" => "Yemen",
"an" => "Hollandske Antiller", "aq" => "Antarktis",
"tn" => "Tunisien", "ck" => "Cook &oslash;erne",
"ls" => "Lesotho", "et" => "Etiopien",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Britiske Jomfru&oslash;erne", "vn" => "Vietnam",
"mr" => "Mauretanien","gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comorerne","dz" => "Algeriet",
"im" => "Isle of Man","pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Storbritannien","bs" => "Bahamas",
"va" => "Vatikanstaten","lc" => "Saint Lucia",
"cd" => "Demokratiske Republik Congo", "gm" => "Gambia",
"mp" => "Northern Mariana &oslash;erne", "gw" => "Guinea-Bissau",
"cm" => "Cameroun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libyen",
"cf" => "Centralafrikanske Republik", "mm" => "Myanmar",
"td" => "Tchad", "iq" => "Irak",
"kn" => "Saint Christopher og Nevis", "sc" => "Seychellerne",
"cg" => "Congo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Kap Verde","mh" => "Marshall&oslash;erne",
"pm" => "Saint Pierre og Miquelon", "so" => "Somalia",
"vc" => "Saint Vincent og Grenadinerne", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "R&eacute;union", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet &oslash;en",
"fk" => "Falklands&oslash;erne", "gq" => "&Aelig;kvatorial Guinea",
"sd" => "Sudan", "sj" => "Svalbard og Jan Mayen",
"sr" => "Surinam", "sy" => "Syrien",
"tp" => "&Oslash;ttimor", "um" => "US mindre &oslash;er i Oceanien og Vestindien",
"wf" => "Wallis og Futuna &oslash;erne", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneoux translations
"misc_other" => "Andre",
"misc_unknown" => "Ukendt",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Hoved Side",
"navbar_Configuration" => "Konfiguration",
"navbar_Global_Stats" => "Generel Statistik",
"navbar_Detailed_Stats" => "Detaljeret Statistik",
"navbar_Time_Stats" => "Historik",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tidspunkt",
"dstat_visits" => "Bes&oslash;g",
"dstat_extension" => "Topdom&aelig;ne",
"dstat_dns" => "V&aelig;rtsnavn",
"dstat_from" => "Fra",
"dstat_os" => "OS",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Synlige bes&oslash;g",
"dstat_green_rows" => "gr&oslash;nne r&aelig;kker",
"dstat_blue_rows" => "bl&aring; r&aelig;kker",
"dstat_red_rows" => "r&oslash;de r&aelig;kker",
"dstat_last_visit" => "senest bes&oslash;gt",
"dstat_robots" => "robotter",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Bes&oslash;gende",
"gstat_Total_visits" => "Samlede hits",
"gstat_Total_unique" => "Samlede unikke hits",
"gstat_Operating_systems" => "Top %d Operativsystemer",
"gstat_Browsers" => "Top %d Browsere",
"gstat_extensions" => "%d f&oslash;rste topdom&aelig;ner",
"gstat_Robots" => "Top %d Robotter",
"gstat_pages" => "%d f&oslash;rste sider",
"gstat_origins" => "%d f&oslash;rste oprindelser",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "I alt",
"gstat_Not_specified" => "Ikke specificeret",

// Time stats words
"tstat_Su" => "S&oslash;n",
"tstat_Mo" => "Man",
"tstat_Tu" => "Tir",
"tstat_We" => "Ons",
"tstat_Th" => "Tor",
"tstat_Fr" => "Fri",
"tstat_Sa" => "L&oslash;r",

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

"tstat_last_day" => "Sidste d&oslash;gn",
"tstat_last_week" => "Sidste uge",
"tstat_last_month" => "Sidste m&aring;ned",
"tstat_last_year" => "Sidste &aring;r",

// Configuration page words and sentences
"config_Variable_name" => "Variabel navn",
"config_Variable_value" => "Variabel v&aelig;rdi",
"config_Explanations" => "Forklaring",

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
"Titlen p&aring; alle BBClone siderne.<br />
Flg. makroer kan bruges:<br />
<ul>
<li>%SERVER: servernavn,</li>
<li>%DATE: nuv&aelig;rende dato.</li>
</ul>
HTML tags m&aring; ogs&aring; bruges.<br />
Examples:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My Statistics from %DATE look like this:&quot;;<br />",

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