<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/tr.php,v 1.24 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Serkan Sisman, fatcoins@yahoo.com
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "windows-1254",

// Date format (used with date() )
"global_date_format" => "d-m-Y",

// Global translation
"global_bbclone_copyright" => "BBClone tak�m� ad�na Lisansl�d�r.",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "evet",
"global_no" => "hay�r",

// The error messages
"error_cannot_see_config" =>
"Server'daki BBClone ayarlar�n�n do�ru olmad��� i�in bu sayfay� g�remiyorsunuz.",

// Address Extensions
"numeric" => "Say�sal", "com" => "Ticari",
"net" => "Net A��", "edu" => "E�itimsel",
"biz" => "��", "info" => "Bilgi",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonya", "us" => "A.B.D",
"uk" => "�ngiltere", "de" => "Almanya",
"mil" => "A.B.D Askeri", "ca" => "Kanada",
"it" => "�talya", "au" => "Avusturalya",
"org" => "Kurulu�lar", "nl" => "Hollanda",
"fr" => "Fransa", "tw" => "Tayvan",
"gov" => "H�k�met", "fi" => "Finlandiya",
"br" => "Brezilya", "se" => "Isve�",
"es" => "�spanya", "no" => "Norve�",
"mx" => "Meksika", "kr" => "Kore",
"ch" => "�svi�re", "dk" => "Danimarka",
"be" => "Bel�ika", "at" => "Avusturya",
"nz" => "Yeni Zellanda", "ru" => "Rusya",
"pl" => "Polonya", "za" => "G�ney Afrika",
"unknown" => "Bilinmeyen", "ar" => "Arjantin",
"il" => "�srail", "sg" => "Singapur",
"arpa" => "Hatalar", "cz" => "�ek Cumhuriyeti",
"hu" => "Macaristan", "hk" => "Honk Hong",
"pt" => "Portekiz", "tr" => "T�RK�YE",
"gr" => "Yunanistan", "cn" => "�in",
"ie" => "�rlanda", "my" => "Malezya",
"th" => "Tayland", "cl" => "�ili",
"co" => "Kolombiya", "is" => "�zlanda",
"uy" => "Uruguay", "ee" => "Estonya",
"in" => "Hindistan", "ua" => "Ukrayna",
"sk" => "Slovakya", "ro" => "Romanya",
"ae" => "Birle�ik Arap Emirlikleri", "id" => "Endonezya",
"su" => "Sovyetler Birli�i", "si" => "Slovenya",
"hr" => "H�rvatistan", "ph" => "Filipinler",
"lv" => "Letonya", "ve" => "Venezuella",
"bg" => "Bulgaristan", "lt" => "Litvanya",
"yu" => "Serbia and Montenegro", "lu" => "L�ksemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kosta Rika", "int" => "Uluslararas� Kurulu�lar",
"do" => "Dominik Cumhuriyeti", "cy" => "G�ney K�br�s",
"pk" => "Pakistan", "cc" => "Kokos Adalar�",
"tt" => "Trinidad ve Tobago", "eg" => "M�s�r",
"lb" => "L�bnan", "kw" => "Kuveyt",
"to" => "Tonga", "kz" => "Kazakistan",
"na" => "Namibya", "mu" => "Maritus",
"bm" => "Bermuda", "sa" => "Suudi Arabistan",
"zw" => "Zimbabve", "kg" => "K�rg�zistan",
"cx" => "Noel Adas�", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botsvana",
"mk" => "Makedonya", "gl" => "Gr�nland Adas�",
"ec" => "Ekvator", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivya", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Faroe Adalar�",
"ac" => "Y�kselme Adas�", "pr" => "Porto Riko",
"am" => "Ermenistan", "pf" => "Frans�z Polonezyas�",
"ge" => "G�rcistan", "bh" => "Bahreyn",
"ni" => "Nikaragua", "by" => "Beyaz Rusya",
"sv" => "El Salvador", "ma" => "Fas",
"ke" => "Kenya", "ad" => "Andor Prensli�i",
"zm" => "Zambiya", "np" => "Nepal",
"bt" => "Butan", "sz" => "Svaziland",
"ba" => "Bosna Hersek", "om" => "Umman",
"jo" => "�rd�n", "ir" => "�ran",
"st" => "Sao Tome ve Principe", "vi" => "Bakire Adalar� (A.B.D)",
"ci" => "Fildi�i Sahilleri", "jm" => "Jamaika",
"li" => "Lihten�tayn", "ky" => "Seymen Adalar�",
"gp" => "Guadeloupe", "mg" => "Madagaskar",
"gi" => "Cebelitar�k", "sm" => "San Marino",
"as" => "Amerikan Samoa", "tz" => "Tanzanya",
"ws" => "Samoa", "tm" => "T�rkmenistan",
"mc" => "Monako", "sn" => "Senegal",
"hm" => "Heard ve Mc Donald Adalar�", "fm" => "Mikronezya",
"fj" => "Fiji", "cu" => "K�ba",
"rw" => "Ruanda", "mq" => "Martinik",
"ai" => "Anguilla", "pg" => "Papua Yeni Gine",
"bz" => "Beliz", "sh" => "Aziz Helena",
"aw" => "Aruba", "mv" => "Maldivler",
"nc" => "Yeni Kaledonya", "ag" => "Antigua ve Barbuda",
"uz" => "�zbekistan", "tj" => "Tacikistan",
"sb" => "Solomon Adalar�", "bf" => "Burkina Faso",
"kh" => "Kambo�ya", "tc" => "Turks ve Caicos Adalar�",
"tf" => "Frans�z G�ney B�lgeleri", "az" => "Azerbaycan",
"dm" => "Dominik", "mz" => "Mozambik",
"mo" => "Makao", "vu" => "Vanuatu",
"mn" => "Mo�olistan", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nijer", "gf" => "Frans�z Guyanas�",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Arnavutluk", "gh" => "Gana",
"nf" => "Norfolk Adas�", "io" => "�ngiliz Hint Okyanusu B�lgesi",
"gs" => "G�ney G�rcistan ve G�ney Sandvi� Adalar�", "ye" => "Yemen",
"an" => "Hollanda Antilleri", "aq" => "Antartika",
"tn" => "Tunus", "ck" => "Yemek Adalar�",
"ls" => "Lesoto", "et" => "Etiyopya",
"ng" => "Nijerya", "sl" => "Siera Leon",
"bb" => "Barbados", "je" => "Jerse Adas�",
"vg" => "Bakire Adalar� (UK)", "vn" => "Vietnam",
"mr" => "Moritanya", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djiboti",
"km" => "Komor Adalar�", "dz" => "Cezayir",
"im" => "Adam Adas�", "pn" => "Pitcairn Adalar�",
"qa" => "Katar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "�ngiltere", "bs" => "Bahama",
"va" => "Vatikan", "lc" => "Aziz Lucia",
"cd" => "Kongo Demoktarik Cum.", "gm" => "Gambiya",
"mp" => "Kuzey Mariana Adalar�", "gw" => "Gine-Bisav",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritre", "ly" => "Libya",
"cf" => "Orta Afrika Cumhuriyeti", "mm" => "Miyanmar",
"td" => "�ad", "iq" => "Irak",
"kn" => "Aziz Kitts ve Nevis", "sc" => "Sey�eller",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganistan",
"cv" => "Cabo Verde", "mh" => "Mar�al Adalar�",
"pm" => "Aziz Pierre ve Miquelon", "so" => "Somali",
"vc" => "Aziz Vincent ve the Grenadines", "bd" => "Banglade�",
"gn" => "Gine", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberya",
"mw" => "Malavi", "pw" => "Palau",
"re" => "Birle�me", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Adas�",
"fk" => "Falkland Adalar�", "gq" => "Ekvatoryal Gine",
"sd" => "Sudan", "sj" => "Svalbard ve Jan Mayen Adalar�",
"sr" => "Surinam", "sy" => "Suriye",
"tp" => "Do�u Timor", "um" => "A.B.D K���k Uzak Adalar�",
"wf" => "Wallis ve Futuna Adalar�", "yt" => "Mayotte",
"zr" => "Zaire Cumhuriyeti",

// Miscellaneous translations
"misc_other" => "Di�er",
"misc_unknown" => "Bilinmeyen",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Ana Sayfa",
"navbar_Configuration" => "Bi�im",
"navbar_Global_Stats" => "Kapsaml� �statistikler",
"navbar_Detailed_Stats" => "Ayr�nt�l� �statistikler",
"navbar_Time_Stats" => "Zaman �statistikleri",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Zaman",
"dstat_visits" => "Ziyaretler",
"dstat_extension" => "Uzant�",
"dstat_dns" => "Sunucu Ad�",
"dstat_from" => "Nereden",
"dstat_os" => "��letim Sistemi",
"dstat_browser" => "Taray�c�",
"dstat_visible_rows" => "G�r�n�r giri�ler",
"dstat_green_rows" => "ye�il sat�rlar",
"dstat_blue_rows" => "mavi sat�rlar",
"dstat_red_rows" => "k�rm�z� sat�rlar",
"dstat_last_visit" => "son ziyaret",
"dstat_robots" => "robotlar",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Giri�ler",
"gstat_Total_visits" => "Toplam Ziyaretler",
"gstat_Total_unique" => "Toplam Tekil Ziyaretler",
"gstat_Operating_systems" => "En y�ksek %d ��letim Sistemi",
"gstat_Browsers" => "En y�ksek %d Taray�c�",
"gstat_extensions" => "En y�ksek %d Uzant�",
"gstat_Robots" => "En y�ksek %d Robot",
"gstat_pages" => "En y�ksek %d Ziyaret Edilen Sayfalar",
"gstat_origins" => "En y�ksek %d Kaynak",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Toplam",
"gstat_Not_specified" => "Belirlenmemi�",

// Time stats words
"tstat_Su" => "Paz",
"tstat_Mo" => "Pzt",
"tstat_Tu" => "Sal",
"tstat_We" => "�ar",
"tstat_Th" => "Per",
"tstat_Fr" => "Cum",
"tstat_Sa" => "Cmt",

"tstat_Jan" => "Oca",
"tstat_Feb" => "�ub",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Nis",
"tstat_May" => "May",
"tstat_Jun" => "Haz",
"tstat_Jul" => "Tem",
"tstat_Aug" => "Agu",
"tstat_Sep" => "Eyl",
"tstat_Oct" => "Eki",
"tstat_Nov" => "Kas",
"tstat_Dec" => "Ara",

"tstat_last_day" => "�imdiki g�n",
"tstat_last_week" => "�imdiki hafta",
"tstat_last_month" => "�imdiki ay",
"tstat_last_year" => "�imdiki y�l",

// Configuration page words and sentences
"config_Variable_name" => "De�i�ken ad�",
"config_Variable_value" => "De�i�ken de�eri",
"config_Explanations" => "A��klama",

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
"Burdaki ba�l�k b�t�n BBClone sayfalar�nda g�r�necek.<br />
The following macros are recognized:<br />
<ul>
<li>%SERVER: server ad�,</li>
<li>%DATE: �u anki tarih.</li>
</ul>
HTML etiketinin izin verdi�i gibi.<br />
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