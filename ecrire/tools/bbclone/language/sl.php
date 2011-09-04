<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * Copyright (C) 2001-2004, the BBClone Team (see file doc/authors.txt
 * distributed with this library)
 *
 * $Header: /cvs/bbclone/language/sl.php,v 1.5 2004/10/17 14:08:40 olliver Exp $
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * See doc/copying.txt for details
 *
 * Translated by: Rok Potoènik, bbclone@rula.net
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-2",

// Date format (used with date())
"global_date_format" => "d.m.Y",

// Global translation
"global_bbclone_copyright" => "BBClone ekipa - Pod licenco",
"global_last_reset" => "Statistika nazadnje obnovljena",
"global_yes" => "da",
"global_no" => "ne",

// The error messages
"error_cannot_see_config" =>
"Nimate dovoljenja videti BBClone nastavitev na tem stre¾niku.",

// Address Extensions
"numeric" => "©tevilèno", "com" => "Komercialne",
"net" => "Omre¾ja", "edu" => "Izobra¾evalne",
"biz" => "Poslovna", "info" => "Informacijske",
"name" => "Osebna", "ps" => "Palestina",
"jp" => "Japonska", "us" => "Zdru¾ene dr¾ave Amerike",
"uk" => "Zdru¾eno kraljestvo", "de" => "Nemèija",
"mil" => "ZDA vojska", "ca" => "Kanada",
"it" => "Italija", "au" => "Avstralija",
"org" => "Organizacije", "nl" => "Nizozemska",
"fr" => "Francija", "tw" => "Tajvan",
"gov" => "ZDA vlada", "fi" => "Finska",
"br" => "Brazilija", "se" => "©vedska",
"es" => "©panija", "no" => "Norve¹ka",
"mx" => "Mehika", "kr" => "Koreja",
"ch" => "©vica", "dk" => "Danska",
"be" => "Belgija", "at" => "Avstrija",
"nz" => "Nova Zelandija", "ru" => "Rusija",
"pl" => "Poljska", "za" => "Ju¾na Afrika",
"unknown" => "Neznano", "ar" => "Argentina",
"il" => "Izrael", "sg" => "Singapur",
"arpa" => "Arpa", "cz" => "Èe¹ka Republika",
"hu" => "Mad¾arska", "hk" => "Hongkong",
"pt" => "Portugalska", "tr" => "Turèija",
"gr" => "Grèija", "cn" => "Kitajska",
"ie" => "Irska", "my" => "Malezija",
"th" => "Tajska", "cl" => "Èile",
"co" => "Kolumbija", "is" => "Islandija",
"uy" => "Urugvaj", "ee" => "Estonija",
"in" => "Indija", "ua" => "Ukrajina",
"sk" => "Slova¹ka", "ro" => "Romunija",
"ae" => "Zdru¾eni arabski emirati", "id" => "Indonezija",
"su" => "Sovjetska zveza", "si" => "Slovenija",
"hr" => "Hrva¹ka", "ph" => "Filipini",
"lv" => "Latvija", "ve" => "Venezuela",
"bg" => "Bolgarija", "lt" => "Litva",
"yu" => "Srbija in Èrna gora", "lu" => "Luksemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kostarika", "int" => "Mednarodne organizacije",
"do" => "Dominikanska republika", "cy" => "Ciper",
"pk" => "Pakistan", "cc" => "Kokosovi otoki",
"tt" => "Trinidad in Tobago", "eg" => "Egipt",
"lb" => "Libanon", "kw" => "Kuvajt",
"to" => "Tonga", "kz" => "Kazahstan",
"na" => "Namibija", "mu" => "Mauritius",
"bm" => "Bermudi", "sa" => "Savdova Arabija",
"zw" => "Zimbabve", "kg" => "Kirgizistan",
"cx" => "Bo¾ièni otok", "pa" => "Panama",
"gt" => "Gvatemala", "bw" => "Bocvana",
"mk" => "Makedonija", "gl" => "Grenlandija",
"ec" => "Ekvador", "lk" => "©rilanka",
"md" => "Moldavija", "py" => "Paragvaj",
"bo" => "Bolivija", "bn" => "Brunej",
"mt" => "Malta", "fo" => "Ferski otoki",
"ac" => "*Otok Ascension", "pr" => "Portoriko",
"am" => "Armenija", "pf" => "Francoska polinezija",
"ge" => "Georgia", "bh" => "Bahrajn",
"ni" => "Nikaragva", "by" => "Belorusija",
"sv" => "Salvador", "ma" => "Maroko",
"ke" => "Kenija", "ad" => "Andora",
"zm" => "Zambija", "np" => "Nepal",
"bt" => "Butan", "sz" => "Svazi",
"ba" => "Bosna in Hercegovina", "om" => "Oman",
"jo" => "Jordanija", "ir" => "Iran",
"st" => "Sao Tome in Principe", "vi" => "Devi¹ki otoki (ZDA)",
"ci" => "Slonoko¹èena Obala", "jm" => "Jamajka",
"li" => "Lihten¹tajn", "ky" => "Kajmanski otoki",
"gp" => "Guadeloupe", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Ameri¹ka Samoa", "tz" => "Tanzanija",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monako", "sn" => "Senegal",
"hm" => "Heardov otok in McDonaldovi otoki", "fm" => "Mikronesija",
"fj" => "Fid¾i", "cu" => "Kuba",
"rw" => "Ruanda", "mq" => "Martinik",
"ai" => "Angvila", "pg" => "Papua Nova Gvineja",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldivi",
"nc" => "Nova Kaledonija", "ag" => "Antigva in Barbuda",
"uz" => "Uzbekistan", "tj" => "Tad¾ikistan",
"sb" => "Salomonovi otoki", "bf" => "Burkina Faso",
"kh" => "Kambod¾a", "tc" => "Otoki Turks in Caicos",
"tf" => "Francosko ju¾no ozemlje", "az" => "Azerbajd¾an",
"dm" => "Dominika", "mz" => "Mozambik",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolija", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nigerija", "gf" => "Franvoska Gvajana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albanija", "gh" => "Gana",
"nf" => "Norfol¹ki otok", "io" => "Britansko ozemlje indijskega oceana",
"gs" => "Ju¾na Georgia in otoki Ju¾ni Sandwich", "ye" => "Jemen",
"an" => "Nizozemski Antili", "aq" => "Antarktika",
"tn" => "Tunizija", "ck" => "Cookovi otoki",
"ls" => "Lesoto", "et" => "Etiopija",
"ng" => "Nigerija", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Otok Jersey",
"vg" => "Devi¹ki otoki (VB)", "vn" => "Vietnam",
"mr" => "Mavretanija", "gy" => "Gvajana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "D¾ibuti",
"km" => "Komori", "dz" => "Al¾irija",
"im" => "Otok Man", "pn" => "Pitcairn",
"qa" => "Katar", "gg" => "Guernesey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Velika Britanija", "bs" => "Bahami",
"va" => "Vatikan", "lc" => "St. Lucia",
"cd" => "Kongo", "gm" => "Gambija",
"mp" => "Severni Marianski otoki", "gw" => "Gvineja Bissau",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritreja", "ly" => "Libija",
"cf" => "Srednjeafri¹ka republika", "mm" => "Mjanmar",
"td" => "Èad", "iq" => "Irak",
"kn" => "St. Kitts in Nevis", "sc" => "Sej¹eli",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganistan",
"cv" => "Zelenortski otoki", "mh" => "Marshallovi otoki",
"pm" => "St. Pierre in Miquelon", "so" => "Somalija",
"vc" => "St. Vincent in Grenadine", "bd" => "Banglade¹",
"gn" => "Gvineja", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberija",
"mw" => "Malavi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvetov otok",
"fk" => "Falklandski otoki", "gq" => "Ekvatorialna Gvineja",
"sd" => "Sudan", "sj" => "Svalbard in Jan Mayen",
"sr" => "Surinam", "sy" => "Sirija",
"tp" => "Vzhodni Timor", "um" => "Stranski zunanji otoki Zdru¾enih dr¾av",
"wf" => "Otoki Wallis in Futuna", "yt" => "Mayotte",
"zr" => "Zair",

// Miscellaneous translations
"misc_other" => "Ostalo",
"misc_unknown" => "Neznano",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Glavna stran",
"navbar_Configuration" => "Nastavitve",
"navbar_Global_Stats" => "Celotna statistika",
"navbar_Detailed_Stats" => "Izèrpna statistika",
"navbar_Time_Stats" => "Èasovna statistika",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Èas",
"dstat_visits" => "©t. obiskov",
"dstat_extension" => "Konènica",
"dstat_dns" => "Ime gostitelja",
"dstat_from" => "Izvira iz",
"dstat_os" => "Operacijski sistem",
"dstat_browser" => "Brskalnik",
"dstat_visible_rows" => "Vidnih dostopov",
"dstat_green_rows" => "zelene vrste",
"dstat_blue_rows" => "modre vrste",
"dstat_red_rows" => "rdeèe vrste",
"dstat_last_visit" => "zadnji obisk",
"dstat_robots" => "roboti",
"dstat_no_data" => "Ni dostopnih podatkov",
"dstat_prx" => "Proxy stre¾nik",
"dstat_ip" => "IP naslov",
"dstat_user_agent" => "Uporabni¹ki vmesnik",
"dstat_nr" => "©t.",
"dstat_pages" => "Strani",
"dstat_visit_length" => "Dol¾ina obiska",
"dstat_reloads" => "©t. osve¾itev",

// Global stats words
"gstat_Accesses" => "Dostopi",
"gstat_Total_visits" => "Skupnih dostopov",
"gstat_Total_unique" => "Edinstvenih dostopov",
"gstat_Operating_systems" => "%d naj operacijskih sistemov",
"gstat_Browsers" => "%d naj brskalnikov",
"gstat_extensions" => "%d naj konènic",
"gstat_Robots" => "%d naj robotov",
"gstat_pages" => "%d naj obiskanih strani",
"gstat_origins" => "%d naj izvorov",
"gstat_hosts" => "%d naj gostiteljev",
"gstat_keys" => "%d naj kljuènih besed",
"gstat_Total" => "Skupno",
"gstat_Not_specified" => "Ni doloèeno",

// Time stats words
"tstat_Su" => "Ned",
"tstat_Mo" => "Pon",
"tstat_Tu" => "Tor",
"tstat_We" => "Sre",
"tstat_Th" => "Èet",
"tstat_Fr" => "Pet",
"tstat_Sa" => "Sob",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "Maj",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Avg",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Zadnji dan",
"tstat_last_week" => "Zadnji teden",
"tstat_last_month" => "Zadnji mesec",
"tstat_last_year" => "Zadnje leto",

// Configuration page words and sentences
"config_Variable_name" => "Ime spremenljivke",
"config_Variable_value" => "Vrednost spremenljivke",
"config_Explanations" => "Razlaga",

"config_bbc_mainsite" =>
"Glavna stran:<br />
Èe je ta spremenljivka nastavljena, bo vzpostavljena povezava do navedene lokacije.
Privzeta vrednost ka¾e na star¹evski imenik. V primeru, da je va¹a glavna stran
name¹èena drugje, boste verjetno ¾eleli popraviti vrednost, da bo ustrezala va¹im
potrebam.<br />
Primeri:<br />
\$BBC_MAINSITE = &quot;http://www.mojstreznik.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Prikaz nastavitev:<br />
Privzeta vrednost je nastavljena na prikaz nastavitev BBClona. Èe tega ne
¾elite, lahko prepreèite dostop z izklopom te izbire.<br />
Primeri:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Naslovna vrstica:<br />
Prikazana bo v navigacijski vrstici vseh BBClone strani<br />
Sledeèi makroji so prepoznani:<br />
<ul>
<li>%SERVER: ime stre¾nika,</li>
<li>%DATE: trenutni datum.</li>
</ul>
HTML oznaèbe dovoljene.<br />
Primeri:<br />
\$BBC_TITLEBAR = &quot;Statistika za %SERVER narejena %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Moja statitika do dne %DATE zgleda takole:&quot;;
<br />",

"config_bbc_language" =>
"Privzet jezik prikaza strani, v primeru da ni bil doloèen s strani brskalnika.
Podprti so sledeèi jeziki:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr in zh-cn</p>",

"config_bbc_maxtime" =>
"Ta spremenljivka definira dol¾ino edinstvenega dostopa v sekundah. Vsak
dostop istega naslova v tem èasu bo smatran kot en sam obisk, dokler dva
zaporedna obiska ne prekoraèita doloèene meje. Privzeta je 'de facto'
vrednost spletnega standarda 30 minut (1800 sekund), ampak jo lahko spremenite
glede na svoje potrebe.<br />
Primeri:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Koliko vnosov ¾elite imeti prikazanih pri izèrpni statistiki. Privzeta
vrednost je 100. Priporoèene so vrednosti do 500 zaradi prevelikih
obremenitev.",

"config_bbc_detailed_stat_fields" =>
"Spremenljivka \$BBC_DETAILED_STAT_FIELDS doloèa, kateri stolpci naj bodo
prikazani pri izèrpni statistiki. Mo¾nosti so:
<ul>
<li>id&nbsp;=&gt;&nbsp;zaporedna ¹tevilka obiskovalca od zaèetka ¹tetja</li>
<li>time&nbsp;=&gt;&nbsp;èas zadnjega obiska</li>
<li>visits&nbsp;=&gt;&nbsp;¹t. obiskov vsakega edinstvenega dostopa</li>
<li>dns&nbsp;=&gt;&nbsp;ime gostitelja</li>
<li>ip&nbsp;=&gt;&nbsp;IP naslov</li>
<li>os&nbsp;=&gt;&nbsp;operacijski sistem (ali robot, èe obstaja)</li>
<li>browser&nbsp;=&gt;&nbsp;brskalnik (ali robot)
</li>
<li>ext&nbsp;=&gt;&nbsp;dr¾ava ali konènica obiskovalca</li>
<li>referer&nbsp;=&gt;&nbsp;povezava, s katere je obiskovalec pri¹el (èe
obstaja)
</li></ul>
Enak vrstni red bo uporabljen za prikaz.<br />
Primeri:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"V primeru da stre¾nik ni v enaki èasovni zoni, se lahko nastavi relativni èas
v minutah z uporabo tega stikala. Negativne vrednosti bodo nastavile èas nazaj,
pozitivne pa naprej.<br />
Primeri:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Ta izbira upravlja nastavitev razre¹itve gostiteljskega imena. Medtem, ko imena
povedo nekaj veè o obiskovalcu, lahko razre¹evanje poteka sorazmerno poèasi, èe
so uporabljeni domenski stre¾niki poèasni, omejeni v zmogljivosti ali kako
drugaèe nezanesljivi. Nastavljanje te spremenljivke lahko re¹i problem.<br />
Primeri:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"BBClonova privzeta nastavitev je prikazovanje skupnega ¹tevila dostopov v
èasovni statistiki, ker nam da uporaben vtis trenutne obremenitve stre¾nika.
Èe vam je ljub¹e, lahko uporabljate prikaz edinstvenih dostopov.<br />
Primeri:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"S to nastavitvijo lahko doloèite IP naslove ali obmoèja, ki jih ne boste
upo¹tevali pri ¹tetju. Èe bi radi uporabili veè izrazov uporabite vejico kot
loèilo.<br />
Primeri:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Èe ne ¾elite upo¹tevati doloèenih izvorov obiskovalcev na¹tetih med
vodilnimi ali v izèrpni statistiki, lahko nastavite eno ali veè kljuènih
besed uporabljenih za filter. Èe jih uporabite veè, uporabljajte vejico
kot loèilo.<br />
Primeri:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"S to nastavitvijo upravljate ravnanje z roboti. Privzeto je, da se roboti
prezrejo med vodeèimi, ampak se ¹tejejo pri ostali statistiki. Èe ¾elite da
se roboti ne ¹tejejo pri katerikoli statistiki, nastavite vrednost &quot;2&quot;,
takrat bodo v ¹tetje vzeti le èlove¹ki obiski.<br />
Primeri:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Ta nastavitev doloèa, kako bo BBClone loèil med obiskovalci. Privzeto je
loèevanje samo po IP naslovu, ki je stvarna v veèini primerov. Èe pa so
obiskovalci za proxy stre¾nmiki, bo deaktviacije te nastavitve priskrbela
bolj toène ¹tevilke, ker bodo obiskovalci loèeni s spremembo uporabni¹kega
vmesnika.<br />
Primeri:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Ko ¾elite izbrisati statistiko, vkljuèite to stikalo, statistika se
bo pa zbrisala ob naslednjem obisku. Ne pozabite ga potem izklopiti, drugaèe
boste verjetno izkusili nenavadno nizek promet ;).<br />
Primeri:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Ime gostitelja in stran izvora lahko proizvede velike kolièine
podatkov, èeprav jih je veèina od enkratnih obiskovalcev. Z vkljuèitvijo tega
stikala lahko oèistite te vnose in znatno zmanj¹ate velikost datoteke
access.php brez da bi vplivali na vidne gostitelje ali tabelo naj
izvorov. ©tevilo zadetkov bo dodano &quot;nedoloèenim&quot; vnosom da bo
skupni rezultat isti.<br />
Primeri:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>