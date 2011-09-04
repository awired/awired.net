<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/lt.php,v 1.33 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Vilius Simonaitis <maumas98@yahoo.com>
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "windows-1257",

// Date format (used with date() )
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "BBClone komanda - Licenzijuota pagal",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "taip",
"global_no" => "ne",

// The error messages
"error_cannot_see_config" =>
"Jums n�ra leista matyti BBClone konfig�racijos �iame serveryje.",

// Address Extensions
"numeric" => "Skaitinis", "com" => ".com",
"net" => ".net", "edu" => ".edu",
"biz" => "Verslas", "info" => "Informacin�s Tarnybos",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonija", "us" => "JAV",
"uk" => "Jungtin�s Karalyst�s", "de" => "Vokietija",
"mil" => "Jungtini� Taut� karin� tarnyba", "ca" => "Kanada",
"it" => "Italija", "au" => "Australija",
"org" => ".org", "nl" => "Netherlands",
"fr" => "Pranc�zija", "tw" => "Taivan",
"gov" => "Vyriausyb� (.gov)", "fi" => "Suomija",
"br" => "Brazilija", "se" => "�vedija",
"es" => "Ispanija", "no" => "Norvegija",
"mx" => "Meksika", "kr" => "Kor�ja",
"ch" => "�veicarija", "dk" => "Danija",
"be" => "Belgija", "at" => "Austrija",
"nz" => "Naujoji Zelandija", "ru" => "Rusijos federacija",
"pl" => "Lenkija", "za" => "Piet� Afrika",
"unknown" => "Ne�inoma", "ar" => "Argentina",
"il" => "Izraelis", "sg" => "Singap�ras",
"arpa" => "Klaidos", "cz" => "�ekijos respublika",
"hu" => "Vangrija", "hk" => "Hong-Kongas",
"pt" => "Portugalija", "tr" => "Turkija",
"gr" => "Graikija", "cn" => "Kinija",
"ie" => "Airija", "my" => "Malaizija",
"th" => "Tailandas", "cl" => "�il�",
"co" => "Kolombija", "is" => "Islandija",
"uy" => "Urugvajus", "ee" => "Estija",
"in" => "Indija", "ua" => "Ukraina",
"sk" => "Slovakija", "ro" => "Rumunija",
"ae" => "Jungtiniai arab� emiratai", "id" => "Indonezija",
"su" => "Saviet� S�junga", "si" => "Slov�nija",
"hr" => "Kroatija", "ph" => "Filipinai",
"lv" => "Latvija", "ve" => "Venesuela",
"bg" => "Bulgarija", "lt" => "Lietuva",
"yu" => "Serbia and Montenegro", "lu" => "Liuksemburgas",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kosta Rika", "int" => "Tarptautin�s Organizacijos",
"do" => "Dominikos Respublika", "cy" => "Kipras",
"pk" => "Pakistanas", "cc" => "Kokoso Salos",
"tt" => "Trinidadas ir Tobagas", "eg" => "Egiptas",
"lb" => "Lebanonas", "kw" => "Kuveitas",
"to" => "Tongas", "kz" => "Kazakstanas",
"na" => "Namibija", "mu" => "Mauricijus",
"bm" => "Bermudai", "sa" => "Saudo Arabija",
"zw" => "Zimbabv�", "kg" => "Kirgistanas",
"cx" => "Kal�d� Salos", "pa" => "Panama",
"gt" => "Gvatemala", "bw" => "Botsvana",
"mk" => "Makedonija", "gl" => "Greenland'as",
"ec" => "Ekvadoras", "lk" => "�ri Lanka",
"md" => "Moldova", "py" => "Paragvajus",
"bo" => "Bolivija", "bn" => "Brun�jus",
"mt" => "Malta", "fo" => "Faraon� Salos",
"ac" => "Prisik�limo Sala", "pr" => "Puerto Rikas",
"am" => "Armenija", "pf" => "Pranc�z� Polinezija",
"ge" => "Georgija", "bh" => "Bachrainas",
"ni" => "Nikaragva", "by" => "Belarus",
"sv" => "El Salvadoras", "ma" => "Marokas",
"ke" => "Kenia", "ad" => "Andora",
"zm" => "Zambija", "np" => "Nepalas",
"bt" => "Bhutanas", "sz" => "Swaziland'as",
"ba" => "Bosnija and Hercogovina", "om" => "Omanas",
"jo" => "Jordanija", "ir" => "Iranas",
"st" => "Sao Tome and Principe", "vi" => "Virginijos Salos (US)",
"ci" => "Ivory Coast", "jm" => "Jamaika",
"li" => "Liechten�teinas", "ky" => "Caiman� Salos",
"gp" => "Gvadelup�", "mg" => "Madagaskaras",
"gi" => "Gibraltaras", "sm" => "San Marinas",
"as" => "Amerikos Samoa", "tz" => "Tanzanija",
"ws" => "Samoa", "tm" => "Turkmenistanas",
"mc" => "Monakas", "sn" => "Senegalas",
"hm" => "Heard ir Mc Donald Salos", "fm" => "Mikronezija",
"fj" => "Fid�i", "cu" => "Kuba",
"rw" => "Rovanda", "mq" => "Martinika",
"ai" => "Angila", "pg" => "Papua Naujoji Gvin�ja",
"bz" => "Beliz�", "sh" => "�v. Helena",
"aw" => "Aruba", "mv" => "Maldivai",
"nc" => "Naujoji Caledonija", "ag" => "Antigva ir Barbuda",
"uz" => "Uzbekistanas", "tj" => "Taikistanas",
"sb" => "Saliamono Salos", "bf" => "Burkina Faso",
"kh" => "Cambod�a", "tc" => "Turks and Caicos Islands",
"tf" => "Pranc�z� Piet� teritorijos", "az" => "Azerbaid�ianas",
"dm" => "Dominika", "mz" => "Mozambikas",
"mo" => "Makau", "vu" => "Vanuatu",
"mn" => "Mongolija", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nigeris", "gf" => "Pranc�z� Gujana",
"gu" => "Guama", "hn" => "Honduras",
"al" => "Albanija", "gh" => "Gana",
"nf" => "Norfolk'o Sala", "io" => "Brit� Indijos Vandenyno teritorijos",
"gs" => "Piet� Georgija ir Piet� Buterbrodo Salos", "ye" => "Jemenas",
"an" => "Skandinav� Antilai", "aq" => "Antarktika",
"tn" => "Tunisija", "ck" => "Gegut�s Salos",
"ls" => "Lesotas", "et" => "Etiopija",
"ng" => "Nigerija", "sl" => "Siera Leonas",
"bb" => "Barbadosas", "je" => "D�ersis",
"vg" => "Virginijos Salos (UK)", "vn" => "Vietnamas",
"mr" => "Mauritanija", "gy" => "Gujana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Komorosas", "dz" => "Algerija",
"im" => "Vyro sala", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Beninas", "ga" => "Gabonas",
"gb" => "Jungtin�s Karalyst�s", "bs" => "Bahamai",
"va" => "Vatikanas", "lc" => "�ventoji Liucija",
"cd" => "Kongas", "gm" => "Gambija",
"mp" => "�iaurin�s Marijanos Salos", "gw" => "Gvin�ja-Bissau",
"cm" => "Kamer�nas", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libija",
"cf" => "Centrin�s Afrikos Respublika", "mm" => "Myanmar",
"td" => "�iadas", "iq" => "Irakas",
"kn" => "Saint Kitts and Nevis", "sc" => "Sei�eliai",
"cg" => "Kongas", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistanas",
"cv" => "Cape Verde", "mh" => "Mar�alo Salos",
"pm" => "�v. Pierre ir Miquelon", "so" => "Somalia",
"vc" => "�v. Vincent ir Grenadines", "bd" => "Banglade�as",
"gn" => "Gvin�ja", "ht" => "Haitis",
"la" => "Laosas", "lr" => "Liberija",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "Folklando Salos", "gq" => "Ekvatorin� Gvin�ja",
"sd" => "Sudanas", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "Surinamas", "sy" => "Sirija",
"tp" => "Ryt� Tim�ras", "um" => "US Minor Outlying Islands",
"wf" => "Uolio irFutunos salos", "yt" => "Majotas",
"zr" => "Zairas",

// Miscellaneoux translations
"misc_other" => "Kita",
"misc_unknown" => "Ne�inoma",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Titulinis",
"navbar_Configuration" => "Konfig�racija",
"navbar_Global_Stats" => "Globali Statistika",
"navbar_Detailed_Stats" => "Detali Statistika",
"navbar_Time_Stats" => "Laikmatis",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Laikas",
"dstat_visits" => "Apsilankymai",
"dstat_extension" => "I�pl�timas",
"dstat_dns" => "Hostname'as",
"dstat_from" => "I� kur",
"dstat_os" => "OS",
"dstat_browser" => "Nar�ykl�",
"dstat_visible_rows" => "Matoma u�klaus�",
"dstat_green_rows" => "�alios eilut�s",
"dstat_blue_rows" => "m�lynos eilut�s",
"dstat_red_rows" => "raudonos eilut�s",
"dstat_last_visit" => "paskutinis apsilankymas",
"dstat_robots" => "paie�kos sistemos",
"dstat_no_data" => "N�ra duomen�",
"dstat_prx" => "Proxy Serveris",
"dstat_ip" => "IP Addresas",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Puslapiai",
"dstat_visit_length" => "Apsilankymo trukm�",
"dstat_reloads" => "Perkrovimai",

// Global stats words
"gstat_Accesses" => "U�klausos",
"gstat_Total_visits" => "Viso apsilankym�",
"gstat_Total_unique" => "Viso unikali�",
"gstat_Operating_systems" => "Operacin�s sistemos",
"gstat_Browsers" => "Nar�ykl�s",
"gstat_extensions" => "%d pirm� pl�tini�",
"gstat_Robots" => "Paie�kos sistemos",
"gstat_pages" => "%d pirm� puslapi�",
"gstat_origins" => "%d pirm� nuorod�",
"gstat_hosts" => "%d pirm� Host�",
"gstat_keys" => "%d pirm� rakta�od�i�",
"gstat_Total" => "Viso",
"gstat_Not_specified" => "Nenurodyta",

// Time stats words
"tstat_Su" => "Sek",
"tstat_Mo" => "Pir",
"tstat_Tu" => "Ant",
"tstat_We" => "Tre",
"tstat_Th" => "Ket",
"tstat_Fr" => "Pen",
"tstat_Sa" => "�e�",

"tstat_Jan" => "Sau",
"tstat_Feb" => "Vas",
"tstat_Mar" => "Kov",
"tstat_Apr" => "Bal",
"tstat_May" => "Geg",
"tstat_Jun" => "Bir",
"tstat_Jul" => "Lie",
"tstat_Aug" => "Rugp",
"tstat_Sep" => "Rugs",
"tstat_Oct" => "Spa",
"tstat_Nov" => "Lap",
"tstat_Dec" => "Gruo",

"tstat_last_day" => "Pastaraj� dien�",
"tstat_last_week" => "Pastaraj� savit�",
"tstat_last_month" => "Pastaraj� men�s�",
"tstat_last_year" => "Pastaraisiais metais",

// Configuration page words and sentences
"config_Variable_name" => "Kintamojo vardas",
"config_Variable_value" => "Kintamojo reik�m�",
"config_Explanations" => "Paai�kinimas",

"config_bbc_mainsite" =>
"�is kintamasis nusako nuorod� � svetain�. Pagal nutyl�jim�, svetain�s
adresu laikoma auk�tesn� direktorija. Jei J�s� svetain� yra kur nors kitur,
galite pritakyti �i� nuorod� savo reikm�ms.<br />
Pavyzd�iai:<br />
\$BBC_MAINSITE = &quot;http://www.svetaine.lt/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone statistikos' nustatym� per�i�ra. �iuo kintamuoju galite
u�drausti j� per�i�r�.<br />
Pavyzd�iai:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Tekstas, atsirandantis antra�t�je, visuose BBClone puslapiuose.<br />
Galima naudoti tokius kintamuosius:<br />
<ul>
<li>%SERVER: serverio adresas,</li>
<li>%DATE: dabartin� data.</li>
</ul>
Taip pat galima naudoti ir HTML.<br />
Pavyzd�iai:<br />
\$BBC_TITLEBAR = &quot;%SERVER statistika sugeneruota %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Mano statistika %DATE buvo tokia:&quot;;
<br />",

"config_bbc_language" =>
"BBClone kalba pagal nutyl�jim�, nustatoma tam atvejui, jei nar�yl� nepateik� pagedautinos kalbos.
Galima naudoti �ias kalbas:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr ir zh-cn</p>",

"config_bbc_maxtime" =>
"�is kintamasis nusako unikalaus apsilankymo tarpsn� sekund�mis. Kiekvienas
to paties lankytojo paspaudimas per �� period� bus laikomas kaip vienas apsilankymas,
kadangi du gretimi paspaudimai nevir�yja �io laiko limito. Pagal nutyl�jim�
yra laikomas defacto web standartas - 30 minu�i� (1800 sekund�i�), nors, esant porekiui,
galite priskirti savo pageidaujam� reik�m�.<br />
Pavyzd�iai:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Kiek �ra�� norite matyti Detaliame apsilankym� s�ra�e? Pagal nutyl�jim�,
�io kintamojo reik�m� yra 100. Yra rekomenduotina nenaudoti daugiau nei
500 �ra��. Didesnis �ra�� kiekis gali sukelti na�umo problem�.",

"config_bbc_detailed_stat_fields" =>
"Kintamasis \$BBC_DETAILED_STAT_FIELDS nusako stulpelius detaliame apsilankym� s�ra�e.
Galimi �ie stulpeliai:
<ul>
<li>id&nbsp;=&gt;&nbsp;n-tasis lankytojas nuo statistikos vedimo prad�ios</li>
<li>time&nbsp;=&gt;&nbsp;Paskutinio paspaudimo laikas</li>
<li>visits&nbsp;=&gt;&nbsp;Unikalaus lankytojo paspaudimai</li>
<li>dns&nbsp;=&gt;&nbsp;Lankytojo hostname'as</li>
<li>ip&nbsp;=&gt;&nbsp;Lankytojo IP adresas</li>
<li>os&nbsp;=&gt;&nbsp;Operacin� sistema (arba, jei �manoma nustatyti, paie�kos robotas)</li>
<li>browser&nbsp;=&gt;&nbsp;Nar�ykl�
</li>
<li>ext&nbsp;=&gt;&nbsp;Lankytojo �alis arba pl�tinys</li>
<li>referer&nbsp;=&gt;&nbsp;Nuoroda, i� kurios lankytojas at�jo � J�s� svetain� (jei �manoma nustatyti)
</li></ul>
Stulpeliai bus i�d�styti tokia tvarka, kokia J�s nurodysit.<br />
Pavyzd�iai:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Tam atvejui, jei J�s� virtualaus serverio laikas nesutampa su J�s� laiko juosta,
�iuo kintamuoju galite sureguliuoti laik�. Neigiama reik�m� nustatys laik� atgal.<br />
Pavyzdys:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"�i opcija nusako ar IP adres� reikia bandyti konvertuoti � hostname'�.
Nors hostname'ai pasako daug daugiau apie lankytoj�, j� nustatymas gali
smarkiai sul�tinti svetain�s darb�, ypa� jei J�s� serverio ry�ys su
DNS serveriu yra l�tas ar nepatikimas. �ios opcijos i�jungimas gali i�spr�sti
susidariusias na�umo problemas.<br />
Pavyzd�iai:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_string" => "Pagal nutyl�jim�, BBClone i�veda komentarus, nusakan�ius 
statistikos veikimo b�sen�, � svetain�s HTML kod�. �is i�vedimas gali neigiamai paveikti
kai kuriuos forumus ar turinio valdymo sistemas. Jei jums i�vedamas tu��ias puslapis
ar susiduriate su &quot;headers already sent by&quot; prane�imais, galite atjungti
�iuos komentarus.<br />
Pavyzd�iai:<br />
\$BBC_NO_STRING = 1;<br />
\$BBC_NO_STRING = &quot;&quot;;",

"config_bbc_no_hits" =>
"Pagal nutyl�jim� BBClone laikmatyje rodo lankytoj� paspaudimus, kadangi tai
gerai atspindi tikr�j� svetain�s apkrovim�. Jei J�s, d�l tam tikr� prie�as�i�
pageidaujate matyti unikalius apsilankymus, pakeiskite �io kintamojo reik�m�.<br />
Pavyzd�iai:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"�ia opcija galite nustatyti neregistruotinus lankytoj� IP adresus.
Nor�dami naudoti kelias i�rai�kas, skirtuku naudokite kablel�.<br />
Pavyzd�iai:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Tuo atveju, jei norite ignoruoti tam tikras nuorodas, vedan�ias � J�s� svetain�,
galite �vesti vien� ar daugiau rakta�od�i�, blokuosian�i� �ias nuorodas.
Nor�dami naudoti kelias i�rai�kas, skirtuku naudokite kablel�.<br />
Pavyzd�iai:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"�ia galite nurodyti elgsen� su paie�kos robotais. Pagal nuryl�jim� jie yra
ignoruojami lankomiausiuose host'uose, bet registruojami kiruose rodikliuose.
Jei apskritai nenorite matyti paie�kos robot�, galite nustatyti �� kintam�j�
� &quot;2&quot;. Tokiu atveju bus registruojami tik tikrieji lankytojai.<br />
Pavyzd�iai:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"�i opcija nusako kaip BBClone skiria vienus lankytojus nuo kit�. Paga nutyl�jim�
yra naudojamas ti IP adresas, kuris da�niausiai duoda tikriausius lankomumo duomenis.
Ta�iau jei lankytojus da�nai dengia proxy serveriai, �ios opcijos deaktyvavimas
gali duoti tikresnius duomenis, kadangi lankytojai bus atpa�ystami pagal nar�ykl�s
para�� (user-agent).<br />
Pavyzd�iai:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Jei norite i�valyti vis� svetain�s statistik�, aktyvuokite �i� parinkt�.
Sekantis apsilankymas i�valys visus duomenis. Nepamir�kite v�liau deaktyvuoti
�i� parinkt�. Prie�ingu atveju galite b�ti nustebintas itin silpnu svetain�s
lankomumu ;).<br />
Pavyzd�iai:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Host� ir Refereri� statistika gali genruoti didelius duomen� kiekius, sukuriamus
vienkartini� lankytoj�. �ios opcijos �jungimas gali ry�kiai suma�inti duomen�
apimtis bei access.php fail� neprarandant vis� matom� host� ir refereri� s�ra�o.
Paspaudim� kiekis bus prid�tas prie &quot;Nenurodyta&quot; �ym�s ir ne�takos
bendro paspaudim� skatliuko.<br />
Pavyzd�iai:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>