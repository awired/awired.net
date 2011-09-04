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
"Jums nëra leista matyti BBClone konfigûracijos ðiame serveryje.",

// Address Extensions
"numeric" => "Skaitinis", "com" => ".com",
"net" => ".net", "edu" => ".edu",
"biz" => "Verslas", "info" => "Informacinës Tarnybos",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japonija", "us" => "JAV",
"uk" => "Jungtinës Karalystës", "de" => "Vokietija",
"mil" => "Jungtiniø Tautø karinë tarnyba", "ca" => "Kanada",
"it" => "Italija", "au" => "Australija",
"org" => ".org", "nl" => "Netherlands",
"fr" => "Prancûzija", "tw" => "Taivan",
"gov" => "Vyriausybë (.gov)", "fi" => "Suomija",
"br" => "Brazilija", "se" => "Ðvedija",
"es" => "Ispanija", "no" => "Norvegija",
"mx" => "Meksika", "kr" => "Korëja",
"ch" => "Ðveicarija", "dk" => "Danija",
"be" => "Belgija", "at" => "Austrija",
"nz" => "Naujoji Zelandija", "ru" => "Rusijos federacija",
"pl" => "Lenkija", "za" => "Pietø Afrika",
"unknown" => "Neþinoma", "ar" => "Argentina",
"il" => "Izraelis", "sg" => "Singapûras",
"arpa" => "Klaidos", "cz" => "Èekijos respublika",
"hu" => "Vangrija", "hk" => "Hong-Kongas",
"pt" => "Portugalija", "tr" => "Turkija",
"gr" => "Graikija", "cn" => "Kinija",
"ie" => "Airija", "my" => "Malaizija",
"th" => "Tailandas", "cl" => "Èilë",
"co" => "Kolombija", "is" => "Islandija",
"uy" => "Urugvajus", "ee" => "Estija",
"in" => "Indija", "ua" => "Ukraina",
"sk" => "Slovakija", "ro" => "Rumunija",
"ae" => "Jungtiniai arabø emiratai", "id" => "Indonezija",
"su" => "Savietø Sàjunga", "si" => "Slovënija",
"hr" => "Kroatija", "ph" => "Filipinai",
"lv" => "Latvija", "ve" => "Venesuela",
"bg" => "Bulgarija", "lt" => "Lietuva",
"yu" => "Serbia and Montenegro", "lu" => "Liuksemburgas",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Kosta Rika", "int" => "Tarptautinës Organizacijos",
"do" => "Dominikos Respublika", "cy" => "Kipras",
"pk" => "Pakistanas", "cc" => "Kokoso Salos",
"tt" => "Trinidadas ir Tobagas", "eg" => "Egiptas",
"lb" => "Lebanonas", "kw" => "Kuveitas",
"to" => "Tongas", "kz" => "Kazakstanas",
"na" => "Namibija", "mu" => "Mauricijus",
"bm" => "Bermudai", "sa" => "Saudo Arabija",
"zw" => "Zimbabvë", "kg" => "Kirgistanas",
"cx" => "Kalëdø Salos", "pa" => "Panama",
"gt" => "Gvatemala", "bw" => "Botsvana",
"mk" => "Makedonija", "gl" => "Greenland'as",
"ec" => "Ekvadoras", "lk" => "Ðri Lanka",
"md" => "Moldova", "py" => "Paragvajus",
"bo" => "Bolivija", "bn" => "Brunëjus",
"mt" => "Malta", "fo" => "Faraonø Salos",
"ac" => "Prisikëlimo Sala", "pr" => "Puerto Rikas",
"am" => "Armenija", "pf" => "Prancûzø Polinezija",
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
"li" => "Liechtenðteinas", "ky" => "Caimanø Salos",
"gp" => "Gvadelupë", "mg" => "Madagaskaras",
"gi" => "Gibraltaras", "sm" => "San Marinas",
"as" => "Amerikos Samoa", "tz" => "Tanzanija",
"ws" => "Samoa", "tm" => "Turkmenistanas",
"mc" => "Monakas", "sn" => "Senegalas",
"hm" => "Heard ir Mc Donald Salos", "fm" => "Mikronezija",
"fj" => "Fidþi", "cu" => "Kuba",
"rw" => "Rovanda", "mq" => "Martinika",
"ai" => "Angila", "pg" => "Papua Naujoji Gvinëja",
"bz" => "Belizë", "sh" => "Ðv. Helena",
"aw" => "Aruba", "mv" => "Maldivai",
"nc" => "Naujoji Caledonija", "ag" => "Antigva ir Barbuda",
"uz" => "Uzbekistanas", "tj" => "Taikistanas",
"sb" => "Saliamono Salos", "bf" => "Burkina Faso",
"kh" => "Cambodþa", "tc" => "Turks and Caicos Islands",
"tf" => "Prancûzø Pietø teritorijos", "az" => "Azerbaidþianas",
"dm" => "Dominika", "mz" => "Mozambikas",
"mo" => "Makau", "vu" => "Vanuatu",
"mn" => "Mongolija", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nigeris", "gf" => "Prancûzø Gujana",
"gu" => "Guama", "hn" => "Honduras",
"al" => "Albanija", "gh" => "Gana",
"nf" => "Norfolk'o Sala", "io" => "Britø Indijos Vandenyno teritorijos",
"gs" => "Pietø Georgija ir Pietø Buterbrodo Salos", "ye" => "Jemenas",
"an" => "Skandinavø Antilai", "aq" => "Antarktika",
"tn" => "Tunisija", "ck" => "Gegutës Salos",
"ls" => "Lesotas", "et" => "Etiopija",
"ng" => "Nigerija", "sl" => "Siera Leonas",
"bb" => "Barbadosas", "je" => "Dþersis",
"vg" => "Virginijos Salos (UK)", "vn" => "Vietnamas",
"mr" => "Mauritanija", "gy" => "Gujana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Komorosas", "dz" => "Algerija",
"im" => "Vyro sala", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Beninas", "ga" => "Gabonas",
"gb" => "Jungtinës Karalystës", "bs" => "Bahamai",
"va" => "Vatikanas", "lc" => "Ðventoji Liucija",
"cd" => "Kongas", "gm" => "Gambija",
"mp" => "Ðiaurinës Marijanos Salos", "gw" => "Gvinëja-Bissau",
"cm" => "Kamerûnas", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libija",
"cf" => "Centrinës Afrikos Respublika", "mm" => "Myanmar",
"td" => "Èiadas", "iq" => "Irakas",
"kn" => "Saint Kitts and Nevis", "sc" => "Seiðeliai",
"cg" => "Kongas", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistanas",
"cv" => "Cape Verde", "mh" => "Marðalo Salos",
"pm" => "Ðv. Pierre ir Miquelon", "so" => "Somalia",
"vc" => "Ðv. Vincent ir Grenadines", "bd" => "Bangladeðas",
"gn" => "Gvinëja", "ht" => "Haitis",
"la" => "Laosas", "lr" => "Liberija",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "Folklando Salos", "gq" => "Ekvatorinë Gvinëja",
"sd" => "Sudanas", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "Surinamas", "sy" => "Sirija",
"tp" => "Rytø Timûras", "um" => "US Minor Outlying Islands",
"wf" => "Uolio irFutunos salos", "yt" => "Majotas",
"zr" => "Zairas",

// Miscellaneoux translations
"misc_other" => "Kita",
"misc_unknown" => "Neþinoma",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Titulinis",
"navbar_Configuration" => "Konfigûracija",
"navbar_Global_Stats" => "Globali Statistika",
"navbar_Detailed_Stats" => "Detali Statistika",
"navbar_Time_Stats" => "Laikmatis",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Laikas",
"dstat_visits" => "Apsilankymai",
"dstat_extension" => "Iðplëtimas",
"dstat_dns" => "Hostname'as",
"dstat_from" => "Ið kur",
"dstat_os" => "OS",
"dstat_browser" => "Narðyklë",
"dstat_visible_rows" => "Matoma uþklausø",
"dstat_green_rows" => "þalios eilutës",
"dstat_blue_rows" => "mëlynos eilutës",
"dstat_red_rows" => "raudonos eilutës",
"dstat_last_visit" => "paskutinis apsilankymas",
"dstat_robots" => "paieðkos sistemos",
"dstat_no_data" => "Nëra duomenø",
"dstat_prx" => "Proxy Serveris",
"dstat_ip" => "IP Addresas",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Puslapiai",
"dstat_visit_length" => "Apsilankymo trukmë",
"dstat_reloads" => "Perkrovimai",

// Global stats words
"gstat_Accesses" => "Uþklausos",
"gstat_Total_visits" => "Viso apsilankymø",
"gstat_Total_unique" => "Viso unikaliø",
"gstat_Operating_systems" => "Operacinës sistemos",
"gstat_Browsers" => "Narðyklës",
"gstat_extensions" => "%d pirmø plëtiniø",
"gstat_Robots" => "Paieðkos sistemos",
"gstat_pages" => "%d pirmø puslapiø",
"gstat_origins" => "%d pirmø nuorodø",
"gstat_hosts" => "%d pirmø Hostø",
"gstat_keys" => "%d pirmø raktaþodþiø",
"gstat_Total" => "Viso",
"gstat_Not_specified" => "Nenurodyta",

// Time stats words
"tstat_Su" => "Sek",
"tstat_Mo" => "Pir",
"tstat_Tu" => "Ant",
"tstat_We" => "Tre",
"tstat_Th" => "Ket",
"tstat_Fr" => "Pen",
"tstat_Sa" => "Ðeð",

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

"tstat_last_day" => "Pastarajà dienà",
"tstat_last_week" => "Pastarajà savitæ",
"tstat_last_month" => "Pastarajá menësá",
"tstat_last_year" => "Pastaraisiais metais",

// Configuration page words and sentences
"config_Variable_name" => "Kintamojo vardas",
"config_Variable_value" => "Kintamojo reikðmë",
"config_Explanations" => "Paaiðkinimas",

"config_bbc_mainsite" =>
"Ðis kintamasis nusako nuorodà á svetainæ. Pagal nutylëjimà, svetainës
adresu laikoma aukðtesnë direktorija. Jei Jûsø svetainë yra kur nors kitur,
galite pritakyti ðià nuorodà savo reikmëms.<br />
Pavyzdþiai:<br />
\$BBC_MAINSITE = &quot;http://www.svetaine.lt/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone statistikos' nustatymø perþiûra. Ðiuo kintamuoju galite
uþdrausti jø perþiûrà.<br />
Pavyzdþiai:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Tekstas, atsirandantis antraðtëje, visuose BBClone puslapiuose.<br />
Galima naudoti tokius kintamuosius:<br />
<ul>
<li>%SERVER: serverio adresas,</li>
<li>%DATE: dabartinë data.</li>
</ul>
Taip pat galima naudoti ir HTML.<br />
Pavyzdþiai:<br />
\$BBC_TITLEBAR = &quot;%SERVER statistika sugeneruota %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Mano statistika %DATE buvo tokia:&quot;;
<br />",

"config_bbc_language" =>
"BBClone kalba pagal nutylëjimà, nustatoma tam atvejui, jei narðylë nepateikë pagedautinos kalbos.
Galima naudoti ðias kalbas:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr ir zh-cn</p>",

"config_bbc_maxtime" =>
"Ðis kintamasis nusako unikalaus apsilankymo tarpsná sekundëmis. Kiekvienas
to paties lankytojo paspaudimas per ðá periodà bus laikomas kaip vienas apsilankymas,
kadangi du gretimi paspaudimai nevirðyja ðio laiko limito. Pagal nutylëjimà
yra laikomas defacto web standartas - 30 minuèiø (1800 sekundþiø), nors, esant porekiui,
galite priskirti savo pageidaujamà reikðmæ.<br />
Pavyzdþiai:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Kiek áraðø norite matyti Detaliame apsilankymø sàraðe? Pagal nutylëjimà,
ðio kintamojo reikðmë yra 100. Yra rekomenduotina nenaudoti daugiau nei
500 áraðø. Didesnis áraðø kiekis gali sukelti naðumo problemø.",

"config_bbc_detailed_stat_fields" =>
"Kintamasis \$BBC_DETAILED_STAT_FIELDS nusako stulpelius detaliame apsilankymø sàraðe.
Galimi ðie stulpeliai:
<ul>
<li>id&nbsp;=&gt;&nbsp;n-tasis lankytojas nuo statistikos vedimo pradðios</li>
<li>time&nbsp;=&gt;&nbsp;Paskutinio paspaudimo laikas</li>
<li>visits&nbsp;=&gt;&nbsp;Unikalaus lankytojo paspaudimai</li>
<li>dns&nbsp;=&gt;&nbsp;Lankytojo hostname'as</li>
<li>ip&nbsp;=&gt;&nbsp;Lankytojo IP adresas</li>
<li>os&nbsp;=&gt;&nbsp;Operacinë sistema (arba, jei ámanoma nustatyti, paieðkos robotas)</li>
<li>browser&nbsp;=&gt;&nbsp;Narðyklë
</li>
<li>ext&nbsp;=&gt;&nbsp;Lankytojo ðalis arba plëtinys</li>
<li>referer&nbsp;=&gt;&nbsp;Nuoroda, ið kurios lankytojas atëjo á Jûsø svetainæ (jei ámanoma nustatyti)
</li></ul>
Stulpeliai bus iðdëstyti tokia tvarka, kokia Jûs nurodysit.<br />
Pavyzdþiai:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Tam atvejui, jei Jûsø virtualaus serverio laikas nesutampa su Jûsø laiko juosta,
ðiuo kintamuoju galite sureguliuoti laikà. Neigiama reikðmë nustatys laikà atgal.<br />
Pavyzdys:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Ði opcija nusako ar IP adresà reikia bandyti konvertuoti á hostname'à.
Nors hostname'ai pasako daug daugiau apie lankytojà, jø nustatymas gali
smarkiai sulëtinti svetainës darbà, ypaè jei Jûsø serverio ryðys su
DNS serveriu yra lëtas ar nepatikimas. Ðios opcijos iðjungimas gali iðspræsti
susidariusias naðumo problemas.<br />
Pavyzdþiai:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_string" => "Pagal nutylëjimà, BBClone iðveda komentarus, nusakanèius 
statistikos veikimo bûsenà, á svetainës HTML kodà. Ðis iðvedimas gali neigiamai paveikti
kai kuriuos forumus ar turinio valdymo sistemas. Jei jums iðvedamas tuðèias puslapis
ar susiduriate su &quot;headers already sent by&quot; praneðimais, galite atjungti
ðiuos komentarus.<br />
Pavyzdþiai:<br />
\$BBC_NO_STRING = 1;<br />
\$BBC_NO_STRING = &quot;&quot;;",

"config_bbc_no_hits" =>
"Pagal nutylëjimà BBClone laikmatyje rodo lankytojø paspaudimus, kadangi tai
gerai atspindi tikràjá svetainës apkrovimà. Jei Jûs, dël tam tikrø prieþasèiø
pageidaujate matyti unikalius apsilankymus, pakeiskite ðio kintamojo reikðmæ.<br />
Pavyzdþiai:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Ðia opcija galite nustatyti neregistruotinus lankytojø IP adresus.
Norëdami naudoti kelias iðraiðkas, skirtuku naudokite kablelá.<br />
Pavyzdþiai:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Tuo atveju, jei norite ignoruoti tam tikras nuorodas, vedanèias á Jûsø svetainæ,
galite ávesti vienà ar daugiau raktaþodþiø, blokuosianèiø ðias nuorodas.
Norëdami naudoti kelias iðraiðkas, skirtuku naudokite kablelá.<br />
Pavyzdþiai:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Èia galite nurodyti elgsenà su paieðkos robotais. Pagal nurylëjimà jie yra
ignoruojami lankomiausiuose host'uose, bet registruojami kiruose rodikliuose.
Jei apskritai nenorite matyti paieðkos robotø, galite nustatyti ðá kintamàjá
á &quot;2&quot;. Tokiu atveju bus registruojami tik tikrieji lankytojai.<br />
Pavyzdþiai:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Ði opcija nusako kaip BBClone skiria vienus lankytojus nuo kitø. Paga nutylëjimà
yra naudojamas ti IP adresas, kuris daþniausiai duoda tikriausius lankomumo duomenis.
Taèiau jei lankytojus daþnai dengia proxy serveriai, ðios opcijos deaktyvavimas
gali duoti tikresnius duomenis, kadangi lankytojai bus atpaþystami pagal narðyklës
paraðà (user-agent).<br />
Pavyzdþiai:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Jei norite iðvalyti visà svetainës statistikà, aktyvuokite ðià parinktá.
Sekantis apsilankymas iðvalys visus duomenis. Nepamirðkite vëliau deaktyvuoti
ðià parinktá. Prieðingu atveju galite bûti nustebintas itin silpnu svetainës
lankomumu ;).<br />
Pavyzdþiai:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Hostø ir Refereriø statistika gali genruoti didelius duomenø kiekius, sukuriamus
vienkartiniø lankytojø. Ðios opcijos ájungimas gali ryðkiai sumaþinti duomenø
apimtis bei access.php failà neprarandant visø matomø hostø ir refereriø sàraðo.
Paspaudimø kiekis bus pridëtas prie &quot;Nenurodyta&quot; þymës ir neátakos
bendro paspaudimø skatliuko.<br />
Pavyzdþiai:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>