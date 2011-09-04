<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/hu.php,v 1.14 2004/10/17 14:08:40 olliver Exp $
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
 * Last updated: 17/10/2004
 * Translated by: Dibuz S�ndor, <ha3pg [at] dwatt [dot] com>
 */


// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-2",

// Date format (used with date())
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensz:",
"global_last_reset" => "Statisztika utolj�ra reszetelve: ",
"global_yes" => "igen",
"global_no" => "nem",

// The error messages
"error_cannot_see_config" =>
"Ezen a szerveren a BBClone konfigur�ci�j�nak megtekint�se nem enged�lyezett.",

// Address Extensions
"numeric" => "numerikus", "com" => "kereskedelmi",
"net" => "h�l�zatok", "edu" => "egyetemi",
"biz" => "�zleti", "info" => "inform�ci�s",
"name" => "szem�lyes", "ps" => "Palesztina",
"jp" => "Jap�n", "us" => "USA",
"uk" => "Egyes�lt Kir�lys�g", "de" => "N�metorsz�g",
"mil" => "USA katonai", "ca" => "Kanada",
"it" => "Olaszorsz�g", "au" => "Ausztr�lia",
"org" => "szervezetek", "nl" => "Hollandia",
"fr" => "Franciaorsz�g", "tw" => "Tajvan",
"gov" => "USA �llami", "fi" => "Finnorsz�g",
"br" => "Braz�lia", "se" => "Sv�dorsz�g",
"es" => "Spanyolorsz�g", "no" => "Norv�gia",
"mx" => "Mexik�", "kr" => "Korea",
"ch" => "Sv�jc", "dk" => "D�nia",
"be" => "Belgium", "at" => "Ausztria",
"nz" => "�j-Z�land", "ru" => "Oroszorsz�g",
"pl" => "Lengyelorsz�g", "za" => "D�l-Afrika",
"unknown" => "ismeretlen", "ar" => "Argent�na",
"il" => "Izrael", "sg" => "Szingap�r",
"arpa" => "arpa", "cz" => "Csehorsz�g",
"hu" => "Magyarorsz�g", "hk" => "Hong Kong",
"pt" => "Portug�lia", "tr" => "T�r�korsz�g",
"gr" => "G�r�gorsz�g", "cn" => "K�na",
"ie" => "�rorsz�g", "my" => "Malajzia",
"th" => "Thaif�ld", "cl" => "Chile",
"co" => "Kolumbia", "is" => "Izland",
"uy" => "Uruguay", "ee" => "�sztorsz�g",
"in" => "India", "ua" => "Ukrajna",
"sk" => "Szlov�kia", "ro" => "Rom�nia",
"ae" => "Egyes�lt Arab Em�rs�gek", "id" => "Indon�zia",
"su" => "Szovjet�ni�", "si" => "Szlov�nia",
"hr" => "Horv�torsz�g", "ph" => "F�l�p-szigetek",
"lv" => "Lettorsz�g", "ve" => "Venezuela",
"bg" => "Bulg�ria", "lt" => "Litv�nia",
"yu" => "Szerbia �s Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "nemzetk�zi szervezetek",
"do" => "Dominika", "cy" => "Ciprus",
"pk" => "Pakiszt�n", "cc" => "K�kusz-Szigetek",
"tt" => "Trinidad �s Tobago", "eg" => "Egyiptom",
"lb" => "Libanon", "kw" => "Kuvait",
"to" => "Tonga", "kz" => "Kazahszt�n",
"na" => "Nam�bia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Sza�d-Ar�bia",
"zw" => "Zimbabwe", "kg" => "Kirgiziszt�n",
"cx" => "Kar�csony-sziget", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Maced�nia", "gl" => "Gr�nland",
"ec" => "Ecuador", "lk" => "Sr� Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bol�via", "bn" => "Brunei",
"mt" => "M�lta", "fo" => "Fer�er-Szigetek",
"ac" => "Ascension-sziget", "pr" => "Puerto Rico",
"am" => "�rm�nyorsz�g", "pf" => "Francia Polin�zia",
"ge" => "Gr�zia", "bh" => "Bahrein",
"ni" => "Nicaragua", "by" => "Belorusszia",
"sv" => "El Salvador", "ma" => "Marokk�",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nep�l",
"bt" => "Bhut�n", "sz" => "Szv�zif�ld",
"ba" => "Bosznia-Hercegovina", "om" => "Om�n",
"jo" => "Jord�nia", "ir" => "Ir�n",
"st" => "Sao Tome �s Principe", "vi" => "Virgin-szigetek (USA)",
"ci" => "Elef�ntcsontpart", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Kajm�n-szigetek",
"gp" => "Guadeloupe", "mg" => "Madagaszk�r",
"gi" => "Gibralt�r", "sm" => "San Marino",
"as" => "Amerikai Szamoa", "tz" => "Tanz�nia",
"ws" => "Szamoa", "tm" => "T�rkmeniszt�n",
"mc" => "Monaco", "sn" => "Szeneg�l",
"hm" => "Heard- �s McDonald-szigetek", "fm" => "Mikron�zia",
"fj" => "Fidzsi", "cu" => "Kuba",
"rw" => "Ruanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "P�pua �j-Guinea",
"bz" => "Belize", "sh" => "Szent Ilona",
"aw" => "Aruba", "mv" => "Mald�v-szigetek",
"nc" => "�j-Kaled�nia", "ag" => "Antigua �s Barbuda",
"uz" => "�zbegiszt�n", "tj" => "T�dzsikiszt�n",
"sb" => "Salamon-szigetek", "bf" => "Burkina Faso",
"kh" => "Kambodzsa", "tc" => "Turks- �s Caicos-szigetek",
"tf" => "Francia D�li Ter�letek", "az" => "Azerbajdzs�n",
"dm" => "Dominika", "mz" => "Mozambik",
"mo" => "Maka�", "vu" => "Vanuatu",
"mn" => "Mong�lia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nig�ria", "gf" => "Francia Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Alb�nia", "gh" => "Gh�na",
"nf" => "Norfolk-sziget", "io" => "UK Indian Ocean Territory",
"gs" => "D�l-Georgia �s a D�l-Sandwich-szigetek", "ye" => "Jemen",
"an" => "Holland Antill�k", "aq" => "Antarktisz",
"tn" => "Tun�zia", "ck" => "Cook-szigetek",
"ls" => "Lesotho", "et" => "Eti�pia",
"ng" => "Nig�ria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Virgin-szigetek (EK)", "vn" => "Vietn�m",
"mr" => "Maurit�nia", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Dzsibuti",
"km" => "Comore-szigetek", "dz" => "Alg�ria",
"im" => "Man-sziget", "pn" => "Pitcairn",
"qa" => "Katar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Egyes�lt Kir�lys�g", "bs" => "Bahama-szigetek",
"va" => "Vatik�n", "lc" => "Szent Lucia",
"cd" => "Kong�", "gm" => "Gambia",
"mp" => "�szak-Mariana-szigetek", "gw" => "Bissau-Guinea",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "L�bia",
"cf" => "K�z�p-Afrikai K�zt�rsas�g", "mm" => "Myanmar",
"td" => "Cs�d", "iq" => "Irak",
"kn" => "Saint Kitts �s Nevis", "sc" => "Seychelle-szigetek",
"cg" => "Kong�", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganiszt�n",
"cv" => "Z�ld-foki-szigetek", "mh" => "Marshall-szigetek",
"pm" => "St. Pierre �s Miquelon", "so" => "Szom�lia",
"vc" => "St. Vincent �s the Grenadines", "bd" => "Banglades",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laosz", "lr" => "Lib�ria",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet-sziget",
"fk" => "Falkland-szigetek", "gq" => "Egyenl�t�i Guinea",
"sd" => "Szud�n", "sj" => "Svalbard- �s Jan Mayen-szigetek",
"sr" => "Suriname", "sy" => "Sz�ria",
"tp" => "Kelet-Timor", "um" => "US Minor Outlying Islands",
"wf" => "Wallis �s Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "egy�b",
"misc_unknown" => "ismeretlen",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "F�oldal",
"navbar_Configuration" => "Be�ll�t�sok",
"navbar_Global_Stats" => "�ltal�nos statisztika",
"navbar_Detailed_Stats" => "R�szletes statisztika",
"navbar_Time_Stats" => "Id� statisztika",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Id�pont",
"dstat_visits" => "Tal�lat",
"dstat_extension" => "N�vv�gz�d�s szerint",
"dstat_dns" => "Hosztn�v vagy IP",
"dstat_from" => "Honnan",
"dstat_os" => "Op. rendszer",
"dstat_browser" => "B�ng�sz�",
"dstat_visible_rows" => "Felsorolva az utols�",
"dstat_green_rows" => "z�ld sorok",
"dstat_blue_rows" => "k�k sorok",
"dstat_red_rows" => "piros sorok",
"dstat_last_visit" => "utols� tal�lat",
"dstat_robots" => "robotok",
"dstat_no_data" => "nincs adat",
"dstat_prx" => "Proxy szerver",
"dstat_ip" => "IP c�m",
"dstat_user_agent" => "B�ng�sz�",
"dstat_nr" => "#",
"dstat_pages" => "Oldalak",
"dstat_visit_length" => "Id�tartam",
"dstat_reloads" => "�jrat�lt�s",

// Global stats words
"gstat_Accesses" => "Tal�latok sz�ma",
"gstat_Total_visits" => "�sszes tal�lat",
"gstat_Total_unique" => "�sszes egyedi",
"gstat_Operating_systems" => "Els� %d op. rendszer",
"gstat_Browsers" => "Els� %d b�ng�sz�",
"gstat_extensions" => "Els� %d n�vv�gz�d�s",
"gstat_Robots" => "Els� %d robot",
"gstat_pages" => "Els� %d l�togatott oldal",
"gstat_origins" => "Els� %d hivatkoz�s",
"gstat_hosts" => "Els� %d hosztn�v",
"gstat_keys" => "Els� %d kulcssz�",
"gstat_Total" => "�sszesen",
"gstat_Not_specified" => "meghat�rozatlan",

// Time stats words
"tstat_Su" => "Vas",
"tstat_Mo" => "H�t",
"tstat_Tu" => "Ked",
"tstat_We" => "Sze",
"tstat_Th" => "Cs�",
"tstat_Fr" => "P�n",
"tstat_Sa" => "Szo",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "M�r",
"tstat_Apr" => "�pr",
"tstat_May" => "M�j",
"tstat_Jun" => "J�n",
"tstat_Jul" => "J�l",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sze",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "M�lt nap",
"tstat_last_week" => "M�lt h�t",
"tstat_last_month" => "M�lt h�nap",
"tstat_last_year" => "M�lt �v",

// Configuration page words and sentences
"config_Variable_name" => "V�ltoz� neve",
"config_Variable_value" => "V�ltoz� �rt�ke",
"config_Explanations" => "Magyar�zat",

"config_bbc_mainsite" =>
"Ennek a v�ltoz�nak a be�ll�t�s�val egy linket hat�rozhatsz meg, amely a
megadott helyre mutat. Alap�rtelmez�sben ez a sz�l� k�nyvt�r. Abban az
esetben, ha honlapod f�oldala valahol m�shol tal�lhat�, akkor val�sz�n�leg
annak c�m�t fogod ide be�rni.<br />
P�ld�ul:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Alap�rtelmez�sben a BBClone konfigur�ci�s be�ll�t�sai szabadon olvashat�k.
Ha ezt nem k�v�natosnak tartod, letilthatod ennek el�r�s�t.<br />
P�ld�ul:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"A BBClone c�msora. Minden oldalon a navig�ci�s sor alatt jelenik meg.
A k�vetkez� makr�kat ismeri:<br /><br />
%SERVER: a szerver neve<br />
%DATE: jelen d�tum<br /><br />

A HTML cimk�k haszn�lata megengedett.<br />
P�ld�ul:<br />
\$BBC_TITLEBAR = &quot;%SERVER szerver statisztika (%DATE)&quot;;<br />
\$BBC_TITLEBAR = &quot;A mai (%DATE) statisztika �gy n�z ki:&quot;;
<br />",

"config_bbc_language" =>
"A BBClone alap�rtelmezett nyelve, amennyiben a b�ng�sz� m�sk�nt nem
defini�lja. Jelenleg a k�vetkez� nyelvek v�laszthat�k:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"Ez a v�ltoz� hat�rozza meg az egyedinek tekintett l�togat�s hossz�t
(m�sodpercben). Egy l�togat�snak sz�m�t (egyazon l�togat�t�l) minden tal�lat
eg�szen addig, am�g a k�t egym�st k�vet� tal�lat k�z�tt eltelt id� t�l nem
l�pi az itt meghat�rozott �rt�ket. Alap�rtelmezett a de facto web szabv�nynak
tekinthet� 30 perc (1800 m�sodperc), de sz�ks�g szerint m�s �rt�k is
be�ll�that�.<br />
P�ld�ul:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Mennyi sor jelenjen meg a r�szletes statisztik�ban? Az alap�rtelmezett �rt�k
100. A jelent�s m�rt�k� terhel�sn�veked�s elker�l�s�nek �rdek�ben 500-n�l
nagyobbat nem aj�nlott be�ll�tani.",

"config_bbc_detailed_stat_fields" =>
"Ez a v�ltoz� a r�szletes statisztika oszlopait hat�rozza meg. Lehets�ges
�rt�kei:<br /><br />
id&nbsp;=&gt;&nbsp;h�nyadik l�togat� a sz�ml�l� ind�t�sa �ta<br />
time&nbsp;=&gt;&nbsp;az utols� tal�lat r�gz�t�s�nek id�pontja<br />
visits&nbsp;=&gt;&nbsp;tal�latok sz�ma az adott l�togat�s alatt<br />
dns&nbsp;=&gt;&nbsp;a l�togat� g�p�nek hosztneve<br />
ip&nbsp;=&gt;&nbsp;a l�togat� g�p�nek IP c�me<br />
os&nbsp;=&gt;&nbsp;az oper�ci�s rendszer (ha azonos�that� �s/vagy nem robot)<br />
browser&nbsp;=&gt;&nbsp;a kapcsolat l�trehoz�sakor haszn�lt b�ng�sz� (ha azonos�that�)<br />
ext&nbsp;=&gt;&nbsp;a l�togat� orsz�ga a hosztn�v v�gz�d�se alapj�n<br />
referer&nbsp;=&gt;&nbsp;URL, ahonnan a l�togat� �rkezett (referrer)<br /><br />
A megjelen�t�s a v�ltoz� �rt�keinek itt megadott sorrendje szerint t�rt�nik.<br />
P�ld�ul:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Amennyiben a szerver �r�ja nem a helyi id�z�n�d szerint j�r, akkor ezzel a
v�ltoz�val be�ll�thatod a pontos id�t (percekben). Negat�v �rt�k visszafele,
pozit�v pedig �rtelemszer�en el�re �ll�tja azt.<br />
P�ld�ul:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Ezzel az opci�val meghat�rozhatod, hogy az IP c�meket feloldja-e a program
hosztnevekre vagy sem. J�llehet a hosztnevek t�bbet el�rulnak a l�togat�r�l,
felold�suk jelent�sen lelass�thatja a g�pet, ha a haszn�lt DNS szerver lass�,
korl�tozott teljes�t�k�pess�g� vagy megb�zhatatlan. Ilyenkor ennek a
v�ltoz�nak a be�ll�t�sa seg�thet megoldani a probl�m�t.<br />
P�ld�ul:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Alap�rtelmez�sben a BBClone a tal�latok sz�m�t mutatja az id� statisztik�ban,
mert ez hasznos t�j�koztat�st ny�jt a szerver leterhelts�g�r�l. Ha m�gis
ink�bb az egyedi l�togat�sok sz�m�t szeretn�d az id� statisztika alapj�ul
haszn�lni, akkor ennek a v�ltoz�nak az 1-re �ll�t�s�val ezt megteheted.<br />
P�ld�ul:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Ez az opci� a megadott IP c�meknek vagy c�mtartom�nyoknak a sz�mol�sb�l
t�rt�n� kiz�r�s�ra szolg�l. Ha t�bb kifejez�st is meg akarsz adni, haszn�ld
a vessz�t elv�laszt�sk�nt.<br />
P�ld�ul:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Ha azt szeretn�d, hogy bizonyos referrerek (ahonnan a l�togat� pl. egy linkre
kattintva �rkezett) ne jelenjenek meg a list�ban, akkor itt megadhatsz egy
vagy t�bb kulcssz�t. Illeszked�s eset�n a pgm. az adott referrert blokkolja,
nem jelen�tni meg.<br />
P�ld�ul:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Ezzel az opci�val meghat�rozhatod, hogy a program mik�nt kezelje a
robotokat. Alap�rtelmez�sben a hoszt rangsor kiv�tel�vel mindenhol figyelembe
veszi �ket. Ha egy�ltal�n nem akarod, hogy a robotokkal is foglalkozzon, akkor
�ll�tsad 2-re �s �gy csak a hum�n l�togat�kat jegyzi majd a pgm.<br />
P�ld�ul:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Ezzel az opci�val meghat�rozhatod, hogy mik�nt k�l�nb�ztesse meg a BBClone
az egyes l�togat�kat. Alap�rtelmez�sben csak az IP c�met veszi figyelembe,
ez a legt�bb esetben val�s sz�mokat biztos�t. Abban az esetben, ha a
l�togat�k gyakran proxy szerverr�l �rkeznek, ennek az opci�nak az �t�ll�t�sa
(&quot;ignore_agent&quot; jelent�se: hagyja figyelmen k�v�l a b�ng�sz�t) re�lisabb
adatokat eredm�nyezhet, mert pl. ha az adott IP sz�mr�l m�s b�ng�sz�vel
j�n valaki, azt �j l�togat�nak veszi.<br />
P�ld�ul:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Ha valaha is reszetelni szeretn�d a statisztik�dat, ennek 1-re �ll�t�s�val
a legk�zelebbi l�togat�s alkalm�val az adatok t�rl�dnek. Ne felejtsd el azt�n
vissza�ll�tani, k�l�nben csod�lkozol majd, hogy milyen alacsony a forgalom! ;)<br />
P�ld�ul:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"A hoszt �s a hivatkoz�si (referrer) statisztik�k igen nagy adatmennyis�get
gener�lhatnak, j�llehet ezek legt�bbj�t a csak egyszer (�s �ltal�ban
t�ved�sb�l) felbukkan� l�togat�k adj�k. Ennek a v�ltoz�nak a be�ll�t�s�val
t�r�lheted ezeket a bejegyz�seket, �gy az access.php file m�rete jelent�sen
cs�kken an�lk�l, hogy ez a l�that� hoszt �s hivatkoz�si rangsort befoly�soln�.
Ezek a tal�latok a &quot;meghat�rozatlan&quot; bejegyz�sek sz�m�t n�velik
majd, �gy az �sszes�t�sek nem v�ltoznak.<br />
P�ld�ul:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>