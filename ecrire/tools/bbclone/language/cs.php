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
"global_bbclone_copyright" => "BBClone t�m - ���eno pod licenc�",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "ano",
"global_no" => "ne",

// The error messages
"error_cannot_see_config" =>
"Nem�te opr�vn�n� k prohl�en� konfigura�n�ho souboru BBClone.",

// Address Extensions
"numeric" => "��seln�", "com" => "Komer�n� servery",
"net" => "S�ov� infrastruktura", "edu" => "�kolstv�",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonsko", "us" => "USA",
"uk" => "Spojen� kr�lovstv�", "de" => "N�mecko",
"mil" => "Vojensk� servery USA", "ca" => "Kanada",
"it" => "It�lie", "au" => "Austr�lie",
"org" => "Nevl�dn� organizace", "nl" => "Holandsko",
"fr" => "Francie", "tw" => "Tchajwan",
"gov" => "Vl�dn� servery USA", "fi" => "Finsko",
"br" => "Braz�lie", "se" => "�v�dsko",
"es" => "�pan�lsko", "no" => "Norsko",
"mx" => "Mexiko", "kr" => "Korea",
"ch" => "�v�carsko", "dk" => "D�nsko",
"be" => "Belgie", "at" => "Rakousko",
"nz" => "Nov� Z�land", "ru" => "Rusko",
"pl" => "Polsko", "za" => "Ji�n� Afrika",
"unknown" => "Nezn�m�", "ar" => "Argentina",
"il" => "Izrael", "sg" => "Singapur",
"arpa" => "S�ov� infrastruktura", "cz" => "�esk� republika",
"hu" => "Ma�arsko", "hk" => "Hongkong",
"pt" => "Portugalsko", "tr" => "Turecko",
"gr" => "�ecko", "cn" => "��na",
"ie" => "Irsko", "my" => "Malajsie",
"th" => "Thajsko", "cl" => "Chile",
"co" => "Kolumbie", "is" => "Island",
"uy" => "Uruguay", "ee" => "Estonsko",
"in" => "Indie", "ua" => "Ukrajina",
"sk" => "Slovensko", "ro" => "Rumunsko",
"ae" => "Spojen� arabsk� emir�ty", "id" => "Indon�zie",
"su" => "Sov�tsk� svaz", "si" => "Slovinsko",
"hr" => "Chorvatsko", "ph" => "Filip�ny",
"lv" => "Litva", "ve" => "Venezuela",
"bg" => "Bulharsko", "lt" => "Loty�sko",
"yu" => "Serbia and Montenegro", "lu" => "Lucembursko",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kostarika", "int" => "Mezin�rodn� organizace",
"do" => "Dominik�nsk� republika", "cy" => "Kypr",
"pk" => "P�kist�n", "cc" => "Kokosov� ostrovy",
"tt" => "Trinidad a Tobago", "eg" => "Egypt",
"lb" => "Libanon", "kw" => "Kuvajt",
"to" => "Tonga", "kz" => "Kazachst�n",
"na" => "Namibie", "mu" => "Mauritius",
"bm" => "Bermudy", "sa" => "Saudsk� Ar�bie",
"zw" => "Zimbabwe", "kg" => "Kyrgyzsko",
"cx" => "V�no�n� ostrov", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Makedonie", "gl" => "Gr�nsko",
"ec" => "Ekv�dor", "lk" => "Sr� Lanka",
"md" => "Mold�vie", "py" => "Paraguay",
"bo" => "Bol�vie", "bn" => "Brunej",
"mt" => "Malta", "fo" => "Faersk� ostrovy",
"ac" => "Ascension", "pr" => "Portoriko",
"am" => "Arm�nie", "pf" => "Francouzsk� Polyn�sie",
"ge" => "Georgie", "bh" => "Bahrajn",
"ni" => "Nikaragua", "by" => "B�lorusko",
"sv" => "Salvador", "ma" => "Maroko",
"ke" => "Ke�a", "ad" => "Andorra",
"zm" => "Zambie", "np" => "Nep�l",
"bt" => "Bh�t�n", "sz" => "Svazijsko",
"ba" => "Bosna a Hercegovina", "om" => "Om�n",
"jo" => "Jord�nsko", "ir" => "Ir�n",
"st" => "Svat� Tom� a Princ�v ostrov", "vi" => "Americk� Panensk� ostrovy",
"ci" => "Pob�e�� slonoviny", "jm" => "Jamajka",
"li" => "Lichten�tejnsko", "ky" => "Kajmansk� ostrovy",
"gp" => "Guadeloupe", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Americk� Samoa", "tz" => "Tanz�nie",
"ws" => "Samoa", "tm" => "Turkmenist�n",
"mc" => "Monako", "sn" => "Senegal",
"hm" => "Ostrovy Heard a McDonald", "fm" => "Mikron�sie",
"fj" => "Fid�i", "cu" => "Kuba",
"rw" => "Rwanda", "mq" => "Martinik",
"ai" => "Anguilla", "pg" => "Papua - Nov� Guinea",
"bz" => "Belize", "sh" => "Svat� Helena",
"aw" => "Aruba", "mv" => "Maledivy",
"nc" => "Nov� Kaledonie", "ag" => "Antigua a Barbuda",
"uz" => "Uzbekist�n", "tj" => "T�d�ikist�n",
"sb" => "�alamounovy ostrovy", "bf" => "Burkina Faso",
"kh" => "Kambod�a", "tc" => "Ostrovy Turks a Caicos",
"tf" => "Francouzsk� ji�n� teritoria", "az" => "Azerbajd��n",
"dm" => "Dominika", "mz" => "Mozambik",
"mo" => "Macao", "vu" => "Vanuatu",
"mn" => "Mongolsko", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Francouzsk� Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Alb�nie", "gh" => "Ghana",
"nf" => "Norfolk", "io" => "Britsk� indickooce�nsk� teritorium",
"gs" => "Ji�n� Georgie a Ji�n� Sandwichovy ostrovy", "ye" => "Jemen",
"an" => "Nizozemsk� Antily", "aq" => "Antarktida",
"tn" => "Tunisko", "ck" => "Cookovy ostrovy",
"ls" => "Lesotho", "et" => "Etiopie",
"ng" => "Nig�rie", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Britsk� Panensk� ostrovy", "vn" => "Vietnam",
"mr" => "Mauret�nie", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "D�ibuti",
"km" => "Komory", "dz" => "Al��rsko",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "Katar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabun",
"gb" => "Velk� Brit�nie", "bs" => "Bahamy",
"va" => "Vatik�n", "lc" => "Svat� Lucie",
"cd" => "Kongo, Demokratick� republika", "gm" => "Gambie",
"mp" => "Severn� Mariany", "gw" => "Guinea-Bissau",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libye",
"cf" => "St�edoafrick� republika", "mm" => "Barma (Myanmar)",
"td" => "�ad", "iq" => "Ir�k",
"kn" => "Svat� Kitts a Nevis", "sc" => "Seychely",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanist�n",
"cv" => "Kapverdy", "mh" => "Marshallovy ostrovy",
"pm" => "Svat� Pierre a Miquelon", "so" => "Som�lsko",
"vc" => "Svat� Vincenc a Grenadiny", "bd" => "Banglad�",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Lib�rie",
"mw" => "Malawi", "pw" => "Palau",
"re" => "R�union", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet",
"fk" => "Falklandy", "gq" => "Rovn�kov� Guinea",
"sd" => "S�d�n", "sj" => "Ostrovy Svalbard a Jan Mayen",
"sr" => "Surinam", "sy" => "S�rie",
"tp" => "V�chodn� Timor", "um" => "Mal� odlehl� ostrovy pat��c� USA",
"wf" => "Ostrovy Wallis a Futuna", "yt" => "Mayotte",
"zr" => "Zair",

// Miscellaneoux translations
"misc_other" => "Jin�",
"misc_unknown" => "Nezn�m�",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Hlavn� strana",
"navbar_Configuration" => "Konfigurace",
"navbar_Global_Stats" => "Souhrnn� statistika",
"navbar_Detailed_Stats" => "Podrobn� statistika",
"navbar_Time_Stats" => "�asov� statistika",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "�as",
"dstat_visits" => "Nav�t�veno",
"dstat_extension" => "Dom�na",
"dstat_dns" => "Jm�no stroje",
"dstat_from" => "Odkud",
"dstat_os" => "OS",
"dstat_browser" => "Prohl�e�",
"dstat_visible_rows" => "Zobrazovan�ch p��stup�",
"dstat_green_rows" => "zelen� ��dek",
"dstat_blue_rows" => "modr� ��dek",
"dstat_red_rows" => "�erven� ��dek",
"dstat_last_visit" => "posledn� n�v�t�va",
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

"gstat_Accesses" => "P��stupy",
"gstat_Total_visits" => "Celkem nav�t�veno",
"gstat_Total_unique" => "Celkem jedine�n� adresy",
"gstat_Operating_systems" => "Top %d opera�n�ch syst�m�",
"gstat_Browsers" => "Top %d prohl�e��",
"gstat_extensions" => "Top %d dom�n",
"gstat_Robots" => "Top %d robot�",
"gstat_pages" => "Top %d nav�t�ven�ch str�nek",
"gstat_origins" => "Top %d zdroj�",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Celkem",
"gstat_Not_specified" => "Neur�eno",

// Time stats words
"tstat_Su" => "Ne",
"tstat_Mo" => "Po",
"tstat_Tu" => "�t",
"tstat_We" => "St",
"tstat_Th" => "�t",
"tstat_Fr" => "P�",
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

"tstat_last_day" => "Posledn� den",
"tstat_last_week" => "Posledn� t�den",
"tstat_last_month" => "Posledn� m�s�c",
"tstat_last_year" => "Posledn� rok",

// Configuration page words and sentences

"config_Variable_name" => "N�zev prom�nn�",
"config_Variable_value" => "Hodnota prom�nn�",
"config_Explanations" => "Vysv�tlivky",

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
"Titulek bude zobrazen v naviga�n�m panelu na v�ech BBClone str�nk�ch.<br />
K dispozici jsou n�sleduj�c� prom�nn�:<br />
<ul>
<li>%SERVER: jm�no serveru,</li>
<li>%DATE: aktu�ln� datum.</li>
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