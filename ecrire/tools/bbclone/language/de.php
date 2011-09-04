<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/de.php,v 1.48 2004/10/17 14:08:39 olliver Exp $
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

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date())
"global_date_format" => "d.m.Y",

// Global translation
"global_bbclone_copyright" => "Das BBClone Team - Lizensiert unter der",
"global_last_reset" => "Statistik zuletzt zur&uuml;ckgesetzt am",
"global_yes" => "ja",
"global_no" => "nein",

// The error messages
"error_cannot_see_config" =>
"Es ist Ihnen nicht gestattet, die Einstellungen von BBClone auf diesem Server
einzusehen.",

// Address Extensions
"numeric" => "Numerisch", "com" => "Unternehmen",
"net" => "Netzwerke", "edu" => "Lehreinrichtungen",
"biz" => "Gewerbe", "info" => "Auskunft",
"name" => "Pers&ouml;nlich", "ps" => "Pal&auml;stina",
"jp" => "Japan", "us" => "Vereinigte Staaten",
"uk" => "Gro&szlig;britannien", "de" => "Deutschland",
"mil" => "US Streitkr&auml;fte", "ca" => "Kanada",
"it" => "Italien", "au" => "Australien",
"org" => "Organisationen", "nl" => "Holland",
"fr" => "Frankreich", "tw" => "Taiwan",
"gov" => "Regierungsbeh&ouml;rden", "fi" => "Finnland",
"br" => "Brasilien", "se" => "Schweden",
"es" => "Spanien", "no" => "Norwegen",
"mx" => "Mexiko", "kr" => "Korea",
"ch" => "Schweiz", "dk" => "D&auml;nemark",
"be" => "Belgien", "at" => "&Ouml;sterreich",
"nz" => "Neuseeland", "ru" => "Ru&szlig;land",
"pl" => "Polen", "za" => "S&uuml;dafrika",
"unknown" => "Unbekannt", "ar" => "Argentinien",
"il" => "Israel", "sg" => "Singapur",
"arpa" => "Arpa", "cz" => "Tschechien",
"hu" => "Ungarn", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "T&uuml;rkei",
"gr" => "Griechenland", "cn" => "China",
"ie" => "Irland", "my" => "Malaysia",
"th" => "Thailand", "cl" => "Chile",
"co" => "Columbien", "is" => "Island",
"uy" => "Uruguay", "ee" => "Estland",
"in" => "Indien", "ua" => "Ukraine",
"sk" => "Slowakei", "ro" => "Rum&auml;nien",
"ae" => "Vereinigte Arabische Emirate", "id" => "Indonesien",
"su" => "Sowjetunion", "si" => "Slowenien",
"hr" => "Kroatien", "ph" => "Philippinen",
"lv" => "Lettland", "ve" => "Venezuela",
"bg" => "Bulgarien", "lt" => "Litauen",
"yu" => "Serbien und Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Internationale Organisationen",
"do" => "Dominikanische Republik", "cy" => "Zypern",
"pk" => "Pakistan", "cc" => "Kokusinseln",
"tt" => "Trinidad und Tobago", "eg" => "&Auml;gypten",
"lb" => "Libanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kasachstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Saudi Arabien",
"zw" => "Zimbabwe", "kg" => "Kirgisien",
"cx" => "Weihnachtsinsel", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Mazedonien", "gl" => "Gr&ouml;nland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldawien", "py" => "Paraguay",
"bo" => "Bolivien", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Faroer",
"ac" => "Ascension", "pr" => "Puerto Rico",
"am" => "Armenien", "pf" => "Franz&ouml;sisch Polynesien",
"ge" => "Georgien", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Wei&szlig;ru&szlig;land",
"sv" => "El Salvador", "ma" => "Marokko",
"ke" => "Kenia", "ad" => "Andorra",
"zm" => "Sambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnien und Herzegowina", "om" => "Oman",
"jo" => "Jordanien", "ir" => "Iran",
"st" => "Sao Tome und Principe", "vi" => "Jungferninseln (US)",
"ci" => "Elfenbeink&uuml;ste", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Kaimaninseln",
"gp" => "Guadalupe", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Amerikanisch Samoa", "tz" => "Tansania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Heard und McDonald-Inseln", "fm" => "Mikronesien",
"fj" => "Fiji", "cu" => "Kuba",
"rw" => "Ruanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua Neuguinea",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Malediwen",
"nc" => "Neukaledonien", "ag" => "Antigua und Barbuda",
"uz" => "Usbekistan", "tj" => "Tadschikistan",
"sb" => "Solomoninseln", "bf" => "Burkina Faso",
"kh" => "Kambodscha", "tc" => "Turks und Caicosinseln",
"tf" => "Franz&ouml;sische S&uuml;dterritorien", "az" => "Aserbaidschan",
"dm" => "Dominica", "mz" => "Mo&ccedil;ambique",
"mo" => "Ma&ccedil;ao", "vu" => "Vanuatu",
"mn" => "Mongolien", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Franz&ouml;sich Guayana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albanien", "gh" => "Ghana",
"nf" => "Norfolk-Inseln", "io" => "UK Indische-Ozean-Territorium",
"gs" => "S&uuml;dgeorgien und S&uuml;d-Sandwich-Inseln", "ye" => "Jemen",
"an" => "Niederl&auml;ndische Antillen", "aq" => "Antarktis",
"tn" => "Tunesien", "ck" => "Cook Inseln",
"ls" => "Lesotho", "et" => "&Auml;thiopien",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Jungferninseln (UK)", "vn" => "Vietnam",
"mr" => "Mauritanien", "gy" => "Guayana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Algerien",
"im" => "Insel Man", "pn" => "Pitcairn",
"qa" => "Quatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabun",
"gb" => "Gro&szlig;britannien", "bs" => "Bahamas",
"va" => "Vatikanstaat", "lc" => "St. Lucia",
"cd" => "Kongo (Demokratische Republik)", "gm" => "Gambia",
"mp" => "N&ouml;rdliche Mariannen-Inseln", "gw" => "Guinea-Bissau",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libyen",
"cf" => "Zentralafrikanische Republik", "mm" => "Myanmar",
"td" => "Tschad", "iq" => "Irak",
"kn" => "St. Kitts und Nevis", "sc" => "Seychellen",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Cap Verde", "mh" => "Marshall Inseln",
"pm" => "St. Pierre und Miquelon", "so" => "Somalia",
"vc" => "St. Vincent und die Grenadinen", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberien",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet-Insel",
"fk" => "Falkland-Inseln", "gq" => "&Auml;quatorisch Guinea",
"sd" => "Sudan", "sj" => "Svalbard und Jan-Mayen",
"sr" => "Surinam", "sy" => "Syrien",
"tp" => "Ost-Timor", "um" => "USA kleinere au&szlig;erhalb liegende Inseln",
"wf" => "Wallis und Futuna Inseln", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Sonstige",
"misc_unknown" => "unbekannt",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Hauptseite",
"navbar_Configuration" => "Einstellungen",
"navbar_Global_Stats" => "Allgemeine Statistik",
"navbar_Detailed_Stats" => "Ausf&uuml;hrliche Statistik",
"navbar_Time_Stats" => "Zeitstatistik",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Zuletzt",
"dstat_visits" => "Aufrufe",
"dstat_extension" => "Kennung",
"dstat_dns" => "Hostname",
"dstat_from" => "Gekommen von",
"dstat_os" => "BS",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Angezeigte Zugriffe",
"dstat_green_rows" => "gr&uuml;ne Zeilen",
"dstat_blue_rows" => "blaue Zeilen",
"dstat_red_rows" => "rote Zeilen",
"dstat_last_visit" => "letzter Aufruf",
"dstat_robots" => "Robots",
"dstat_no_data" => "Keine Daten verf&uuml;gbar",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Adresse",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Seiten",
"dstat_visit_length" => "Besuchsdauer",
"dstat_reloads" => "Neu geladen",

// Global stats words
"gstat_Accesses" => "Zugriffe",
"gstat_Total_visits" => "Aufrufe insgesamt",
"gstat_Total_unique" => "Einmalige Aufrufe",
"gstat_Operating_systems" => "Die ersten %d Betriebssysteme",
"gstat_Browsers" => "Die ersten %d Browser",
"gstat_extensions" => "Die ersten %d Kennungen",
"gstat_Robots" => "Die ersten %d Robots",
"gstat_pages" => "Die ersten %d Seiten",
"gstat_origins" => "Die ersten %d Herk&uuml;nfte",
"gstat_hosts" => "Die ersten %d Hosts",
"gstat_keys" => "Die ersten %d Suchbegriffe",
"gstat_Total" => "Insgesamt",
"gstat_Not_specified" => "keine Angaben",

// Time stats words
"tstat_Su" => "So",
"tstat_Mo" => "Mo",
"tstat_Tu" => "Di",
"tstat_We" => "Mi",
"tstat_Th" => "Do",
"tstat_Fr" => "Fr",
"tstat_Sa" => "Sa",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "M&auml;r",
"tstat_Apr" => "Apr",
"tstat_May" => "Mai",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dez",

"tstat_last_day" => "Bisheriger Tag",
"tstat_last_week" => "Bisherige Woche",
"tstat_last_month" => "Bisheriger Monat",
"tstat_last_year" => "Bisheriges Jahr",

// Configuration page words and sentences
"config_Variable_name" => "Name der Variable",
"config_Variable_value" => "Wert der Variable",
"config_Explanations" => "Erl&auml;uterung",

"config_bbc_mainsite" =>
"Wenn diese Variable gesetzt ist, wird ein Link zum angegebenen Ziel erstellt.
Der Vorgabewert zeigt zum &uuml;bergeordneten Verzeichnis. Falls sich Ihre
Hauptseite woanders befindet, m&ouml;chten Sie vermutlich den Wert den
tats&auml;chlichen Begebenheiten angleichen.
<br />
Beispiele:<br />
\$BBC_MAINSITE = &quot;http://www.meinserver.de/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone zeigt standardm&auml;&szlig;ig die Einstellungen der Statistik an.
Falls dies nicht erw&uuml;scht ist, k&ouml;nnen sie durch Deaktivieren der
Option den Zugriff sperren.<br />
Beispiele:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Der Titel Ihrer Statistikseite.<br />
Dieser wird in der Navigationsleiste aller BBClone Seiten angezeigt.<br />
Folgende Makros werden ausgewertet:<br />
<ul>
<li>%SERVER: Server Name,</li>
<li>%DATE: aktuelles Datum.</li>
</ul>
HTML Tags sind erlaubt.<br />
Beispiele:<br />
\$BBC_TITLEBAR = &quot;Statistik f&uuml;r %SERVER erstellt am %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Meine Statistik vom %DATE sieht wie folgt aus:&quot;;
<br />",

"config_bbc_language" =>
"BBClones Standardsprache, falls diese nicht vom Browser angegeben wurde. Die
folgenden Sprachen werden unterst&uuml;tzt:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr und zh-cn</p>",

"config_bbc_maxtime" =>
"Diese Variable definiert die Dauer eines einmaligen Besuches in Sekunden.
Jeder Aufruf des gleichen Besuchers innerhalb dieses Zeitraumes wird als ein
Besuch behandelt, solange zwei aufeinanderfolgende Aufrufe nicht den
vorgegebenen Grenzwert &uuml;berschreiten. Der Vorgabewert ist der de facto
Webstandard von 30 Minuten (1800 Sekunden), aber abh&auml;ngig von Ihren
Bed&uuml;rfnissen m&ouml;chten Sie der Variablen vielleicht einen anderen Wert
zuweisen.<br />
Beispiele:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Wieviele Eintr&auml;ge sollen in der ausf&uuml;rlichen Statistik aufgelistet
werden? Der Standardwert ist 100. Es ist ratsam, diesen Wert nicht h&ouml;her
als 500 zu setzen, um eine zu schwere Serverlast zu verhindern.",

"config_bbc_detailed_stat_fields" =>
"Die Variable \$BBC_DETAILED_STAT_FIELDS bestimmt die anzuzeigenden Spalten in
der ausf&uuml;rlichen Statistik. M&ouml;gliche Spalten sind:
<ul>
<li>id&nbsp;=&gt;&nbsp;Der x-te Besucher seit dem Beginn des Z&auml;hlens</li>
<li>time&nbsp;=&gt;&nbsp;Der Zeitpunkt, an dem der Besuch registriert wurde</li>
<li>visits&nbsp;=&gt;&nbsp;Die Aufrufe eines einmaligen Besuchers</li>
<li>dns&nbsp;=&gt;&nbsp;Hostname des Besuchers</li>
<li>ip&nbsp;=&gt;&nbsp;IP Adresse des Besuchers</li>
<li>os&nbsp;=&gt;&nbsp;dessen Betriebssystem (falls verf&uuml;gbar und/oder
kein Robot)</li>
<li>browser&nbsp;=&gt;&nbsp;Die f&uuml;r den Verbindungsaufbau verwendete
Software</li>
<li>ext&nbsp;=&gt;&nbsp;Das Land oder die Kennung des Besuchers</li>
<li>referer&nbsp;=&gt;&nbsp;Der Link, welchem ein Besucher gefolgt ist (falls
vorhanden)</li>
</ul>
Die gleiche Reihenfolge, in der Sie die Spalten anordnen, wird f&uuml;r die
Darstellung verwendet.<br />
Beispiele:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Falls die Serverzeit nicht Ihrer lokalen Zeitzone entspricht, k&ouml;nnen sie
mit diesem Schalter die Zeit in Minuten angleichen. Negative Werte setzen die
Zeit zurück, positive stellen sie vor.<br />
Beispiele:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Diese Option legt fest, ob IP Adressen zu Hostnamen aufgel&ouml;st werden
sollen oder nicht. Während Hostnamen wesentlich mehr &uuml;ber den Besucher
aussagen, so kann doch das Auflösen zu Namen die Website beträchtlich
ausbremsen, sobald die verwendeten DNS Server langsam, begrenzt mit ihrer
Kapazität oder anderweitig unzuverl&auml;ssig sind. Das Setzen dieser Variable
kann dieses Problem beheben.<br />
Beispiele:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Das Standardverhalten von BBClone ist, Hits in der Zeitstatistik anzuzeigen,
weil dies recht guten Aufschlu&szlig; &uuml;ber die tats&auml;chliche
Serverauslastung gibt. Wenn Sie jedoch lieber einmalige Besuche als Grundlage
der Zeitstatistik verwenden m&ouml;chten, k&ouml;nnen sie mit Setzen dieser
Variable den Z&auml;hlmodus ver&auml;ndern.<br />
Beispiele:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Diese Option kann verwendet werden, um bestimmte IP Adressen oder
Adressbereiche von der Z&auml;hlung auszuschließen. Wenn sie mehrere
Ausdr&uuml;cke auff&uuml;hren wollen, verwenden Sie bitte ein Komma als
Trennzeichen.<br />
Beispiele:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Falls Sie bestimmte Referrer Ihrer Besucher nicht in Ihrer Rangliste oder der
ausf&uuml;hrlichen Statistik aufgeführt sehen m&ouml;chten, k&ouml;nnen sie hier
ein oder mehrere Schl&uuml;sselbegriffe angeben, bei deren Vorkommen im
Referrer BBClone dessen Anzeige unterdr&uuml;ckt. Verwenden Sie bitte bei
mehreren Ausdr&uuml;cken ein Komma als Trennzeichen.<br />
Beispiele:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Sie k&ouml;nnen diese Option verwenden, um die Verfahrensweise bei Robots
festzulegen. Standard ist, diese in der Hosts Rangliste zu ignorieren, jedoch
in den restlichen Statistiken zu belassen. Falls sie &uuml;berhaupt keine
Robots aufgelistet sehen m&ouml;chten, k&ouml;nnen Sie diese Option auf
&quot;2&quot; setzen, dann werden nur Besuche von Menschen
ber&uuml;cksichtigt.<br />
Beispiele:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Diese Option legt fest, auf welche Weise BBClone Besucher voneinander
unterscheidet. Standard ist nur die IP Adresse dafür zu verwenden, was in den
meisten Fällen für ein realistisches Zählen sorgt. Wenn jedoch Ihre Besucher
häufig hinter Proxyservern verborgen bleiben, k&ouml;nnte das Deaktivieren der
Option hier f&uuml;r realistischere Zahlen sorgen, weil dann bei jeder
Ver&auml;nderung des User Agents von einem neuen Besucher ausgegangen wird.
<br />
Beispiele:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Jedesmal, wenn Sie Ihre Statisik zur&uuml;cksetzen m&ouml;chten, k&ouml;nnen
Sie daf&uuml;r diese Option verwenden und sie mit dem n&auml;chsten Zugriff
unwiderbringlich l&ouml;schen lassen. Sie sollten allerdings danach nicht
vergessen, die Option wieder zu deaktivieren, sonst werden Sie vermutlich
ungew&ouml;hnlich wenig Traffic in n&auml;chster Zeit haben ;).<br />
Beispiele:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Die Host und Referrer Statistik kann eine Menge Daten erzeugen, die jedoch
meist von einmaligen Besuchern stammen. Durch das Aktivieren dieser Option
k&ouml;nnen sie diese Eintr&auml;ge entfernen und somit die Gr&ouml;&szlig;e
von access.php betr&auml;chtlich verringern, ohne da&szlig; Ihre sichtbare
Rangordnung der Hosts und Referrer davon ber&uuml;hrt werden. Die Summe der
Zugriffe wird dann zu den &quot;keine Angaben&quot; hinzugez&auml;hlt, damit
der insgesamte Z&auml;hlerstand in sich stimmig bleibt.<br />
Beispiele:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>