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
 * Translated by: Dibuz Sándor, <ha3pg [at] dwatt [dot] com>
 */


// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-2",

// Date format (used with date())
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensz:",
"global_last_reset" => "Statisztika utoljára reszetelve: ",
"global_yes" => "igen",
"global_no" => "nem",

// The error messages
"error_cannot_see_config" =>
"Ezen a szerveren a BBClone konfigurációjának megtekintése nem engedélyezett.",

// Address Extensions
"numeric" => "numerikus", "com" => "kereskedelmi",
"net" => "hálózatok", "edu" => "egyetemi",
"biz" => "üzleti", "info" => "információs",
"name" => "személyes", "ps" => "Palesztina",
"jp" => "Japán", "us" => "USA",
"uk" => "Egyesült Királyság", "de" => "Németország",
"mil" => "USA katonai", "ca" => "Kanada",
"it" => "Olaszország", "au" => "Ausztrália",
"org" => "szervezetek", "nl" => "Hollandia",
"fr" => "Franciaország", "tw" => "Tajvan",
"gov" => "USA állami", "fi" => "Finnország",
"br" => "Brazília", "se" => "Svédország",
"es" => "Spanyolország", "no" => "Norvégia",
"mx" => "Mexikó", "kr" => "Korea",
"ch" => "Svájc", "dk" => "Dánia",
"be" => "Belgium", "at" => "Ausztria",
"nz" => "Új-Zéland", "ru" => "Oroszország",
"pl" => "Lengyelország", "za" => "Dél-Afrika",
"unknown" => "ismeretlen", "ar" => "Argentína",
"il" => "Izrael", "sg" => "Szingapúr",
"arpa" => "arpa", "cz" => "Csehország",
"hu" => "Magyarország", "hk" => "Hong Kong",
"pt" => "Portugália", "tr" => "Törökország",
"gr" => "Görögország", "cn" => "Kína",
"ie" => "Írország", "my" => "Malajzia",
"th" => "Thaiföld", "cl" => "Chile",
"co" => "Kolumbia", "is" => "Izland",
"uy" => "Uruguay", "ee" => "Észtország",
"in" => "India", "ua" => "Ukrajna",
"sk" => "Szlovákia", "ro" => "Románia",
"ae" => "Egyesült Arab Emírségek", "id" => "Indonézia",
"su" => "Szovjetúnió", "si" => "Szlovénia",
"hr" => "Horvátország", "ph" => "Fülöp-szigetek",
"lv" => "Lettország", "ve" => "Venezuela",
"bg" => "Bulgária", "lt" => "Litvánia",
"yu" => "Szerbia és Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "nemzetközi szervezetek",
"do" => "Dominika", "cy" => "Ciprus",
"pk" => "Pakisztán", "cc" => "Kókusz-Szigetek",
"tt" => "Trinidad és Tobago", "eg" => "Egyiptom",
"lb" => "Libanon", "kw" => "Kuvait",
"to" => "Tonga", "kz" => "Kazahsztán",
"na" => "Namíbia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Szaúd-Arábia",
"zw" => "Zimbabwe", "kg" => "Kirgizisztán",
"cx" => "Karácsony-sziget", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Macedónia", "gl" => "Grönland",
"ec" => "Ecuador", "lk" => "Srí Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolívia", "bn" => "Brunei",
"mt" => "Málta", "fo" => "Feröer-Szigetek",
"ac" => "Ascension-sziget", "pr" => "Puerto Rico",
"am" => "Örményország", "pf" => "Francia Polinézia",
"ge" => "Grúzia", "bh" => "Bahrein",
"ni" => "Nicaragua", "by" => "Belorusszia",
"sv" => "El Salvador", "ma" => "Marokkó",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepál",
"bt" => "Bhután", "sz" => "Szváziföld",
"ba" => "Bosznia-Hercegovina", "om" => "Omán",
"jo" => "Jordánia", "ir" => "Irán",
"st" => "Sao Tome és Principe", "vi" => "Virgin-szigetek (USA)",
"ci" => "Elefántcsontpart", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Kajmán-szigetek",
"gp" => "Guadeloupe", "mg" => "Madagaszkár",
"gi" => "Gibraltár", "sm" => "San Marino",
"as" => "Amerikai Szamoa", "tz" => "Tanzánia",
"ws" => "Szamoa", "tm" => "Türkmenisztán",
"mc" => "Monaco", "sn" => "Szenegál",
"hm" => "Heard- és McDonald-szigetek", "fm" => "Mikronézia",
"fj" => "Fidzsi", "cu" => "Kuba",
"rw" => "Ruanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Pápua Új-Guinea",
"bz" => "Belize", "sh" => "Szent Ilona",
"aw" => "Aruba", "mv" => "Maldív-szigetek",
"nc" => "Új-Kaledónia", "ag" => "Antigua és Barbuda",
"uz" => "Üzbegisztán", "tj" => "Tádzsikisztán",
"sb" => "Salamon-szigetek", "bf" => "Burkina Faso",
"kh" => "Kambodzsa", "tc" => "Turks- és Caicos-szigetek",
"tf" => "Francia Déli Területek", "az" => "Azerbajdzsán",
"dm" => "Dominika", "mz" => "Mozambik",
"mo" => "Makaó", "vu" => "Vanuatu",
"mn" => "Mongólia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nigéria", "gf" => "Francia Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albánia", "gh" => "Ghána",
"nf" => "Norfolk-sziget", "io" => "UK Indian Ocean Territory",
"gs" => "Dél-Georgia és a Dél-Sandwich-szigetek", "ye" => "Jemen",
"an" => "Holland Antillák", "aq" => "Antarktisz",
"tn" => "Tunézia", "ck" => "Cook-szigetek",
"ls" => "Lesotho", "et" => "Etiópia",
"ng" => "Nigéria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Virgin-szigetek (EK)", "vn" => "Vietnám",
"mr" => "Mauritánia", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Dzsibuti",
"km" => "Comore-szigetek", "dz" => "Algéria",
"im" => "Man-sziget", "pn" => "Pitcairn",
"qa" => "Katar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Egyesült Királyság", "bs" => "Bahama-szigetek",
"va" => "Vatikán", "lc" => "Szent Lucia",
"cd" => "Kongó", "gm" => "Gambia",
"mp" => "Észak-Mariana-szigetek", "gw" => "Bissau-Guinea",
"cm" => "Kamerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Líbia",
"cf" => "Közép-Afrikai Köztársaság", "mm" => "Myanmar",
"td" => "Csád", "iq" => "Irak",
"kn" => "Saint Kitts és Nevis", "sc" => "Seychelle-szigetek",
"cg" => "Kongó", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganisztán",
"cv" => "Zöld-foki-szigetek", "mh" => "Marshall-szigetek",
"pm" => "St. Pierre és Miquelon", "so" => "Szomália",
"vc" => "St. Vincent és the Grenadines", "bd" => "Banglades",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laosz", "lr" => "Libéria",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet-sziget",
"fk" => "Falkland-szigetek", "gq" => "Egyenlítõi Guinea",
"sd" => "Szudán", "sj" => "Svalbard- és Jan Mayen-szigetek",
"sr" => "Suriname", "sy" => "Szíria",
"tp" => "Kelet-Timor", "um" => "US Minor Outlying Islands",
"wf" => "Wallis és Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "egyéb",
"misc_unknown" => "ismeretlen",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Fõoldal",
"navbar_Configuration" => "Beállítások",
"navbar_Global_Stats" => "Általános statisztika",
"navbar_Detailed_Stats" => "Részletes statisztika",
"navbar_Time_Stats" => "Idõ statisztika",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Idõpont",
"dstat_visits" => "Találat",
"dstat_extension" => "Névvégzõdés szerint",
"dstat_dns" => "Hosztnév vagy IP",
"dstat_from" => "Honnan",
"dstat_os" => "Op. rendszer",
"dstat_browser" => "Böngészõ",
"dstat_visible_rows" => "Felsorolva az utolsó",
"dstat_green_rows" => "zöld sorok",
"dstat_blue_rows" => "kék sorok",
"dstat_red_rows" => "piros sorok",
"dstat_last_visit" => "utolsó találat",
"dstat_robots" => "robotok",
"dstat_no_data" => "nincs adat",
"dstat_prx" => "Proxy szerver",
"dstat_ip" => "IP cím",
"dstat_user_agent" => "Böngészõ",
"dstat_nr" => "#",
"dstat_pages" => "Oldalak",
"dstat_visit_length" => "Idõtartam",
"dstat_reloads" => "Újratöltés",

// Global stats words
"gstat_Accesses" => "Találatok száma",
"gstat_Total_visits" => "Összes találat",
"gstat_Total_unique" => "Összes egyedi",
"gstat_Operating_systems" => "Elsõ %d op. rendszer",
"gstat_Browsers" => "Elsõ %d böngészõ",
"gstat_extensions" => "Elsõ %d névvégzõdés",
"gstat_Robots" => "Elsõ %d robot",
"gstat_pages" => "Elsõ %d látogatott oldal",
"gstat_origins" => "Elsõ %d hivatkozás",
"gstat_hosts" => "Elsõ %d hosztnév",
"gstat_keys" => "Elsõ %d kulcsszó",
"gstat_Total" => "Összesen",
"gstat_Not_specified" => "meghatározatlan",

// Time stats words
"tstat_Su" => "Vas",
"tstat_Mo" => "Hét",
"tstat_Tu" => "Ked",
"tstat_We" => "Sze",
"tstat_Th" => "Csü",
"tstat_Fr" => "Pén",
"tstat_Sa" => "Szo",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Már",
"tstat_Apr" => "Ápr",
"tstat_May" => "Máj",
"tstat_Jun" => "Jún",
"tstat_Jul" => "Júl",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sze",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Múlt nap",
"tstat_last_week" => "Múlt hét",
"tstat_last_month" => "Múlt hónap",
"tstat_last_year" => "Múlt év",

// Configuration page words and sentences
"config_Variable_name" => "Változó neve",
"config_Variable_value" => "Változó értéke",
"config_Explanations" => "Magyarázat",

"config_bbc_mainsite" =>
"Ennek a változónak a beállításával egy linket határozhatsz meg, amely a
megadott helyre mutat. Alapértelmezésben ez a szülõ könyvtár. Abban az
esetben, ha honlapod fõoldala valahol máshol található, akkor valószínûleg
annak címét fogod ide beírni.<br />
Például:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Alapértelmezésben a BBClone konfigurációs beállításai szabadon olvashatók.
Ha ezt nem kívánatosnak tartod, letilthatod ennek elérését.<br />
Például:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"A BBClone címsora. Minden oldalon a navigációs sor alatt jelenik meg.
A következõ makrókat ismeri:<br /><br />
%SERVER: a szerver neve<br />
%DATE: jelen dátum<br /><br />

A HTML cimkék használata megengedett.<br />
Például:<br />
\$BBC_TITLEBAR = &quot;%SERVER szerver statisztika (%DATE)&quot;;<br />
\$BBC_TITLEBAR = &quot;A mai (%DATE) statisztika így néz ki:&quot;;
<br />",

"config_bbc_language" =>
"A BBClone alapértelmezett nyelve, amennyiben a böngészõ másként nem
definiálja. Jelenleg a következõ nyelvek választhatók:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"Ez a változó határozza meg az egyedinek tekintett látogatás hosszát
(másodpercben). Egy látogatásnak számít (egyazon látogatótól) minden találat
egészen addig, amíg a két egymást követõ találat között eltelt idõ túl nem
lépi az itt meghatározott értéket. Alapértelmezett a de facto web szabványnak
tekinthetõ 30 perc (1800 másodperc), de szükség szerint más érték is
beállítható.<br />
Például:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Mennyi sor jelenjen meg a részletes statisztikában? Az alapértelmezett érték
100. A jelentõs mértékû terhelésnövekedés elkerülésének érdekében 500-nál
nagyobbat nem ajánlott beállítani.",

"config_bbc_detailed_stat_fields" =>
"Ez a változó a részletes statisztika oszlopait határozza meg. Lehetséges
értékei:<br /><br />
id&nbsp;=&gt;&nbsp;hányadik látogató a számláló indítása óta<br />
time&nbsp;=&gt;&nbsp;az utolsó találat rögzítésének idõpontja<br />
visits&nbsp;=&gt;&nbsp;találatok száma az adott látogatás alatt<br />
dns&nbsp;=&gt;&nbsp;a látogató gépének hosztneve<br />
ip&nbsp;=&gt;&nbsp;a látogató gépének IP címe<br />
os&nbsp;=&gt;&nbsp;az operációs rendszer (ha azonosítható és/vagy nem robot)<br />
browser&nbsp;=&gt;&nbsp;a kapcsolat létrehozásakor használt böngészõ (ha azonosítható)<br />
ext&nbsp;=&gt;&nbsp;a látogató országa a hosztnév végzõdése alapján<br />
referer&nbsp;=&gt;&nbsp;URL, ahonnan a látogató érkezett (referrer)<br /><br />
A megjelenítés a változó értékeinek itt megadott sorrendje szerint történik.<br />
Például:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Amennyiben a szerver órája nem a helyi idõzónád szerint jár, akkor ezzel a
változóval beállíthatod a pontos idõt (percekben). Negatív érték visszafele,
pozitív pedig értelemszerûen elõre állítja azt.<br />
Például:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Ezzel az opcióval meghatározhatod, hogy az IP címeket feloldja-e a program
hosztnevekre vagy sem. Jóllehet a hosztnevek többet elárulnak a látogatóról,
feloldásuk jelentõsen lelassíthatja a gépet, ha a használt DNS szerver lassú,
korlátozott teljesítõképességû vagy megbízhatatlan. Ilyenkor ennek a
változónak a beállítása segíthet megoldani a problémát.<br />
Például:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Alapértelmezésben a BBClone a találatok számát mutatja az idõ statisztikában,
mert ez hasznos tájékoztatást nyújt a szerver leterheltségérõl. Ha mégis
inkább az egyedi látogatások számát szeretnéd az idõ statisztika alapjául
használni, akkor ennek a változónak az 1-re állításával ezt megteheted.<br />
Például:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Ez az opció a megadott IP címeknek vagy címtartományoknak a számolásból
történõ kizárására szolgál. Ha több kifejezést is meg akarsz adni, használd
a vesszõt elválasztásként.<br />
Például:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Ha azt szeretnéd, hogy bizonyos referrerek (ahonnan a látogató pl. egy linkre
kattintva érkezett) ne jelenjenek meg a listában, akkor itt megadhatsz egy
vagy több kulcsszót. Illeszkedés esetén a pgm. az adott referrert blokkolja,
nem jelenítni meg.<br />
Például:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Ezzel az opcióval meghatározhatod, hogy a program miként kezelje a
robotokat. Alapértelmezésben a hoszt rangsor kivételével mindenhol figyelembe
veszi õket. Ha egyáltalán nem akarod, hogy a robotokkal is foglalkozzon, akkor
állítsad 2-re és így csak a humán látogatókat jegyzi majd a pgm.<br />
Például:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Ezzel az opcióval meghatározhatod, hogy miként különböztesse meg a BBClone
az egyes látogatókat. Alapértelmezésben csak az IP címet veszi figyelembe,
ez a legtöbb esetben valós számokat biztosít. Abban az esetben, ha a
látogatók gyakran proxy szerverrõl érkeznek, ennek az opciónak az átállítása
(&quot;ignore_agent&quot; jelentése: hagyja figyelmen kívül a böngészõt) reálisabb
adatokat eredményezhet, mert pl. ha az adott IP számról más böngészõvel
jön valaki, azt új látogatónak veszi.<br />
Például:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Ha valaha is reszetelni szeretnéd a statisztikádat, ennek 1-re állításával
a legközelebbi látogatás alkalmával az adatok törlõdnek. Ne felejtsd el aztán
visszaállítani, különben csodálkozol majd, hogy milyen alacsony a forgalom! ;)<br />
Például:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"A hoszt és a hivatkozási (referrer) statisztikák igen nagy adatmennyiséget
generálhatnak, jóllehet ezek legtöbbjét a csak egyszer (és általában
tévedésbõl) felbukkanó látogatók adják. Ennek a változónak a beállításával
törölheted ezeket a bejegyzéseket, így az access.php file mérete jelentõsen
csökken anélkül, hogy ez a látható hoszt és hivatkozási rangsort befolyásolná.
Ezek a találatok a &quot;meghatározatlan&quot; bejegyzések számát növelik
majd, így az összesítések nem változnak.<br />
Például:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>