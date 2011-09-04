<?php
/*
 * This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/cs.php,v 1.29 2004/10/17 14:08:39 olliver Exp $
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
 * Translated by: Josef Pinc <josefpinc@atlas.cz>
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-2",

// Date format (used with date() )
"global_date_format" => "d.m.Y",

// Global translation
"global_bbclone_copyright" => "BBClone tým - ©íøeno pod licencí",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "ano",
"global_no" => "ne",

// The error messages
"error_cannot_see_config" =>
"Nemáte oprávnìní k prohlí¾ení konfiguraèního souboru BBClone.",

// Address Extensions
"numeric" => "Èíselná", "com" => "Komerèní servery",
"net" => "Sí»ová infrastruktura", "edu" => "©kolství",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonsko", "us" => "USA",
"uk" => "Spojené království", "de" => "Nìmecko",
"mil" => "Vojenské servery USA", "ca" => "Kanada",
"it" => "Itálie", "au" => "Austrálie",
"org" => "Nevládní organizace", "nl" => "Holandsko",
"fr" => "Francie", "tw" => "Tchajwan",
"gov" => "Vládní servery USA", "fi" => "Finsko",
"br" => "Brazílie", "se" => "©védsko",
"es" => "©panìlsko", "no" => "Norsko",
"mx" => "Mexiko", "kr" => "Korea",
"ch" => "©výcarsko", "dk" => "Dánsko",
"be" => "Belgie", "at" => "Rakousko",
"nz" => "Nový Zéland", "ru" => "Rusko",
"pl" => "Polsko", "za" => "Ji¾ní Afrika",
"unknown" => "Neznámý", "ar" => "Argentina",
"il" => "Izrael", "sg" => "Singapur",
"arpa" => "Sí»ová infrastruktura", "cz" => "Èeská republika",
"hu" => "Maïarsko", "hk" => "Hongkong",
"pt" => "Portugalsko", "tr" => "Turecko",
"gr" => "Øecko", "cn" => "Èína",
"ie" => "Irsko", "my" => "Malajsie",
"th" => "Thajsko", "cl" => "Chile",
"co" => "Kolumbie", "is" => "Island",
"uy" => "Uruguay", "ee" => "Estonsko",
"in" => "Indie", "ua" => "Ukrajina",
"sk" => "Slovensko", "ro" => "Rumunsko",
"ae" => "Spojené arabské emiráty", "id" => "Indonézie",
"su" => "Sovìtský svaz", "si" => "Slovinsko",
"hr" => "Chorvatsko", "ph" => "Filipíny",
"lv" => "Litva", "ve" => "Venezuela",
"bg" => "Bulharsko", "lt" => "Loty¹sko",
"yu" => "Serbia and Montenegro", "lu" => "Lucembursko",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kostarika", "int" => "Mezinárodní organizace",
"do" => "Dominikánská republika", "cy" => "Kypr",
"pk" => "Pákistán", "cc" => "Kokosové ostrovy",
"tt" => "Trinidad a Tobago", "eg" => "Egypt",
"lb" => "Libanon", "kw" => "Kuvajt",
"to" => "Tonga", "kz" => "Kazachstán",
"na" => "Namibie", "mu" => "Mauritius",
"bm" => "Bermudy", "sa" => "Saudská Arábie",
"zw" => "Zimbabwe", "kg" => "Kyrgyzsko",
"cx" => "Vánoèní ostrov", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Makedonie", "gl" => "Grónsko",
"ec" => "Ekvádor", "lk" => "Srí Lanka",
"md" => "Moldávie", "py" => "Paraguay",
"bo" => "Bolívie", "bn" => "Brunej",
"mt" => "Malta", "fo" => "Faerské ostrovy",
"ac" => "Ascension", "pr" => "Portoriko",
"am" => "Arménie", "pf" => "Francouzská Polynésie",
"ge" => "Georgie", "bh" => "Bahrajn",
"ni" => "Nikaragua", "by" => "Bìlorusko",
"sv" => "Salvador", "ma" => "Maroko",
"ke" => "Keòa", "ad" => "Andorra",
"zm" => "Zambie", "np" => "Nepál",
"bt" => "Bhútán", "sz" => "Svazijsko",
"ba" => "Bosna a Hercegovina", "om" => "Omán",
"jo" => "Jordánsko", "ir" => "Irán",
"st" => "Svatý Tomá¹ a Princùv ostrov", "vi" => "Americké Panenské ostrovy",
"ci" => "Pobøe¾í slonoviny", "jm" => "Jamajka",
"li" => "Lichten¹tejnsko", "ky" => "Kajmanské ostrovy",
"gp" => "Guadeloupe", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Americká Samoa", "tz" => "Tanzánie",
"ws" => "Samoa", "tm" => "Turkmenistán",
"mc" => "Monako", "sn" => "Senegal",
"hm" => "Ostrovy Heard a McDonald", "fm" => "Mikronésie",
"fj" => "Fid¾i", "cu" => "Kuba",
"rw" => "Rwanda", "mq" => "Martinik",
"ai" => "Anguilla", "pg" => "Papua - Nová Guinea",
"bz" => "Belize", "sh" => "Svatá Helena",
"aw" => "Aruba", "mv" => "Maledivy",
"nc" => "Nová Kaledonie", "ag" => "Antigua a Barbuda",
"uz" => "Uzbekistán", "tj" => "Tád¾ikistán",
"sb" => "©alamounovy ostrovy", "bf" => "Burkina Faso",
"kh" => "Kambod¾a", "tc" => "Ostrovy Turks a Caicos",
"tf" => "Francouzská ji¾ní teritoria", "az" => "Azerbajd¾án",
"dm" => "Dominika", "mz" => "Mozambik",
"mo" => "Macao", "vu" => "Vanuatu",
"mn" => "Mongolsko", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Francouzská Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albánie", "gh" => "Ghana",
"nf" => "Norfolk", "io" => "Britské indickooceánské teritorium",
"gs" => "Ji¾ní Georgie a Ji¾ní Sandwichovy ostrovy", "ye" => "Jemen",
"an" => "Nizozemské Antily", "aq" => "Antarktida",
"tn" => "Tunisko", "ck" => "Cookovy ostrovy",
"ls" => "Lesotho", "et" => "Etiopie",
"ng" => "Nigérie", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Britské Panenské ostrovy", "vn" => "Vietnam",
"mr" => "Mauretánie", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "D¾ibuti",
"km" => "Komory", "dz" => "Al¾írsko",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "Katar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabun",
"gb" => "Velká Británie", "bs" => "Bahamy",
"va" => "Vatikán", "lc" => "Svatá Lucie",
"cd" => "Kongo, Demokratická republika", "gm" => "Gambie",
"mp" => "Severní Mariany", "gw" => "Guinea-Bissau",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libye",
"cf" => "Støedoafrická republika", "mm" => "Barma (Myanmar)",
"td" => "Èad", "iq" => "Irák",
"kn" => "Svatý Kitts a Nevis", "sc" => "Seychely",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistán",
"cv" => "Kapverdy", "mh" => "Marshallovy ostrovy",
"pm" => "Svatý Pierre a Miquelon", "so" => "Somálsko",
"vc" => "Svatý Vincenc a Grenadiny", "bd" => "Bangladé¹",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Libérie",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Réunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet",
"fk" => "Falklandy", "gq" => "Rovníková Guinea",
"sd" => "Súdán", "sj" => "Ostrovy Svalbard a Jan Mayen",
"sr" => "Surinam", "sy" => "Sýrie",
"tp" => "Východní Timor", "um" => "Malé odlehlé ostrovy patøící USA",
"wf" => "Ostrovy Wallis a Futuna", "yt" => "Mayotte",
"zr" => "Zair",

// Miscellaneoux translations
"misc_other" => "Jiný",
"misc_unknown" => "Neznámý",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Hlavní strana",
"navbar_Configuration" => "Konfigurace",
"navbar_Global_Stats" => "Souhrnná statistika",
"navbar_Detailed_Stats" => "Podrobná statistika",
"navbar_Time_Stats" => "Èasová statistika",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Èas",
"dstat_visits" => "Nav¹tíveno",
"dstat_extension" => "Doména",
"dstat_dns" => "Jméno stroje",
"dstat_from" => "Odkud",
"dstat_os" => "OS",
"dstat_browser" => "Prohlí¾eè",
"dstat_visible_rows" => "Zobrazovaných pøístupù",
"dstat_green_rows" => "zelený øádek",
"dstat_blue_rows" => "modrý øádek",
"dstat_red_rows" => "èervený øádek",
"dstat_last_visit" => "poslední náv¹tìva",
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

"gstat_Accesses" => "Pøístupy",
"gstat_Total_visits" => "Celkem nav¹tíveno",
"gstat_Total_unique" => "Celkem jedineèné adresy",
"gstat_Operating_systems" => "Top %d operaèních systémù",
"gstat_Browsers" => "Top %d prohlí¾eèù",
"gstat_extensions" => "Top %d domén",
"gstat_Robots" => "Top %d robotù",
"gstat_pages" => "Top %d nav¹tívených stránek",
"gstat_origins" => "Top %d zdrojù",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Celkem",
"gstat_Not_specified" => "Neurèeno",

// Time stats words
"tstat_Su" => "Ne",
"tstat_Mo" => "Po",
"tstat_Tu" => "Út",
"tstat_We" => "St",
"tstat_Th" => "Èt",
"tstat_Fr" => "Pá",
"tstat_Sa" => "So",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "May",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Oct",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Poslední den",
"tstat_last_week" => "Poslední týden",
"tstat_last_month" => "Poslední mìsíc",
"tstat_last_year" => "Poslední rok",

// Configuration page words and sentences

"config_Variable_name" => "Název promìnné",
"config_Variable_value" => "Hodnota promìnné",
"config_Explanations" => "Vysvìtlivky",

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
"Titulek bude zobrazen v navigaèním panelu na v¹ech BBClone stránkách.<br />
K dispozici jsou následující promìnné:<br />
<ul>
<li>%SERVER: jméno serveru,</li>
<li>%DATE: aktuální datum.</li>
</ul>
HTML tagy jsou povoleny.<br />
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