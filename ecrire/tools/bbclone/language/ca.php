<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/ca.php,v 1.38 2004/10/17 14:08:39 olliver Exp $
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
 * Traduït al Català per Gregori Arjona Toledo garjona@menta.net
 * Revisat i actualitzat per Lacetani traduccions@lacetani.net
 *
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "L&#8217;equip de BBClone - Llicenciat sota la",
"global_last_reset" => "Estad&iacute;stiques des de",
"global_yes" => "s&iacute;",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"No es pot mostrar la configuraci&oacute; de BBClone en aquest servidor.",

// Address Extensions
"numeric" => "Adre&ccedil;a IP", "com" => "Comercial",
"net" => "Xarxes", "edu" => "Educaci&oacute;",
"biz" => "Empreses", "info" => "Informaci&oacute;",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Jap&oacute;", "us" => "Estats Units",
"uk" => "Regne Unit", "de" => "Alemanya",
"mil" => "Ex&egrave;rcit dels Estats Units", "ca" => "Canad&agrave;",
"it" => "It&agrave;lia", "au" => "Austr&agrave;lia",
"org" => "Organitzacions", "nl" => "Holanda",
"fr" => "Fran&ccedil;a", "tw" => "Taiwan",
"gov" => "Govern d&#8217;Estats Units", "fi" => "Finl&agrave;ndia",
"br" => "Brasil", "se" => "Su&egrave;cia",
"es" => "Espanya", "no" => "Noruega",
"mx" => "M&egrave;xic", "kr" => "Corea",
"ch" => "Su&iuml;ssa", "dk" => "Dinamarca",
"be" => "B&egrave;lgica", "at" => "&Agrave;ustria",
"nz" => "Nova Zelanda", "ru" => "R&uacute;ssia",
"pl" => "Pol&ograve;nia", "za" => "Sud &Agrave;frica",
"unknown" => "Desconegut", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapur",
"arpa" => "Errors", "cz" => "Rep&uacute;blica Txeca",
"hu" => "Hongria", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "Turquia",
"gr" => "Gr&egrave;cia", "cn" => "Xina",
"ie" => "Irlanda", "my" => "Mal&agrave;isia",
"th" => "Tail&agrave;ndia", "cl" => "Xile",
"co" => "Col&ograve;mbia", "is" => "Isl&agrave;ndia",
"uy" => "Uruguai", "ee" => "Est&ograve;nia",
"in" => "&Iacute;ndia", "ua" => "Ucra&iuml;na",
"sk" => "Eslov&agrave;quia", "ro" => "Romania",
"ae" => "Emirats &Agrave;rabs", "id" => "Indon&egrave;sia",
"su" => "Uni&oacute; sovi&egrave;tica", "si" => "Eslov&egrave;nia",
"hr" => "Cro&agrave;cia", "ph" => "Filipines",
"lv" => "Let&ograve;nia", "ve" => "Vene&ccedil;uela",
"bg" => "Bulg&agrave;ria", "lt" => "Litu&agrave;nia",
"yu" => "Servia i Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Per&uacute;",
"cr" => "Costa Rica", "int" => "Organitzacions",
"do" => "Rep&uacute;blica Dominicana", "cy" => "Xipre",
"pk" => "Pakistan", "cc" => "Illes Cocos",
"tt" => "Trinitat i Tobago", "eg" => "Egipte",
"lb" => "L&iacute;ban", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakhstan",
"na" => "Nam&iacute;bia", "mu" => "Maurit&agrave;nia",
"bm" => "Bermudes", "sa" => "Ar&agrave;bia Saudita",
"zw" => "Zimbabwe", "kg" => "Kirguizistan",
"cx" => "Illes de Navidad", "pa" => "Panam&agrave;",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Maced&ograve;nia", "gl" => "Terra Verda",
"ec" => "Equador", "lk" => "Sri Lanka",
"md" => "Mold&agrave;via", "py" => "Paraguai",
"bo" => "Bol&iacute;via", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Illes F&egrave;roe",
"ac" => "Illes de l'assumpci&oacute;", "pr" => "Puerto Rico",
"am" => "Arm&egrave;nia", "pf" => "Polin&egrave;sia francesa",
"ge" => "Ge&ograve;rgia", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Bielorr&uacute;ssia",
"sv" => "El Salvador", "ma" => "Marroc",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Z&agrave;mbia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swazil&agrave;ndia",
"ba" => "B&ograve;snia Hercegovina", "om" => "Oman",
"jo" => "Jord&agrave;nia", "ir" => "Iran",
"st" => "S&atilde;o Tom&eacute; i Pr&iacute;ncep", "vi" => "Illes Verges",
"ci" => "Costa d&#8217;ivori", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Illes Caiman",
"gp" => "Guadalupe", "mg" => "Madagascar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Samoa Americana", "tz" => "Tanz&agrave;nia",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "M&ograve;naco", "sn" => "Senegal",
"hm" => "Illes Heard i Mc Donald", "fm" => "Micron&egrave;sia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Rwanda", "mq" => "Martinica",
"ai" => "Anguilla", "pg" => "Papua Nova Guinea",
"bz" => "Belize", "sh" => "Saint Helena",
"aw" => "Aruba", "mv" => "Maldives",
"nc" => "Nova Caled&ograve;nia", "ag" => "Antigua i Barbuda",
"uz" => "Uzbekistan", "tj" => "Tadjikistan",
"sb" => "Illes Salom&oacute;", "bf" => "Burkina Faso",
"kh" => "Cambodja", "tc" => "Illes Turks i Caicos",
"tf" => "Territoris del sud de Fran&ccedil;a", "az" => "Azerbaidjan",
"dm" => "Dominica", "mz" => "Mo&ccedil;ambic",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mong&ograve;lia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nig&egrave;ria", "gf" => "Guinea francesa",
"gu" => "Guam", "hn" => "Hondures",
"al" => "Alb&agrave;nia", "gh" => "Ghana",
"nf" => "Illes Norfolk", "io" => "Territori brit&agrave;nic de l&#8217;oce&agrave; &iacute;ndic",
"gs" => "Sud de Ge&ograve;rgia i illes Sandwich", "ye" => "Iemen",
"an" => "Antilles Holandeses", "aq" => "Ant&agrave;rtica",
"tn" => "Tun&iacute;sia", "ck" => "Illes Cook",
"ls" => "Lesotho", "et" => "Eti&ograve;pia",
"ng" => "Nig&egrave;ria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Illes verges (Anglaterra)", "vn" => "Vietnam",
"mr" => "Maurit&agrave;nia", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comores", "dz" => "Alg&egrave;ria",
"im" => "Illa de Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Ben&iacute;n", "ga" => "Gabon",
"gb" => "Gabon", "bs" => "Bahames",
"va" => "Estat del vatic&agrave;", "lc" => "Saint Lucia",
"cd" => "Congo", "gm" => "G&agrave;mbia",
"mp" => "Illes marines del nord", "gw" => "Guinea-Bissau",
"cm" => "Camerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "L&iacute;bia",
"cf" => "Rep&uacute;blica centre africana", "mm" => "Myanmar",
"td" => "Txad", "iq" => "Irak",
"kn" => "Sant Kitts i Nevis", "sc" => "Seychelles",
"cg" => "Rep&uacute;blica del Congo", "gd" => "Granada",
"nr" => "Nauru", "af" => "Afganistan",
"cv" => "Cap Verd", "mh" => "Illes Marshall",
"pm" => "Saint-Pierre-et-Miquelon", "so" => "Som&agrave;lia",
"vc" => "Saint Vincent i les Grenadines ", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Hait&iacute;",
"la" => "Laos", "lr" => "Lib&egrave;ria",
"mw" => "Malawi", "pw" => "Illes Palau",
"re" => "Illa de la reuni&oacute;", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Illes Bouvet",
"fk" => "Illes Falkland (Malvines)", "gq" => "Guinea equatorial",
"sd" => "Sudan", "sj" => "Illes Svalbard i Jan Mayen",
"sr" => "Surinam", "sy" => "S&iacute;ria",
"tp" => "Timor est", "um" => "Illes menors dels Estats Units",
"wf" => "Wallis i illes Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Altres",
"misc_unknown" => "Desconegut",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Lloc principal",
"navbar_Configuration" => "Configuraci&oacute;",
"navbar_Global_Stats" => "Estad&iacute;stiques globals",
"navbar_Detailed_Stats" => "Estad&iacute;stiques detallades",
"navbar_Time_Stats" => "Estad&iacute;stiques temporals",

// Detailed stats words
"dstat_id" => "Identificador",
"dstat_time" => "Data",
"dstat_visits" => "Visites",
"dstat_extension" => "Extensi&oacute;",
"dstat_dns" => "Nom del host",
"dstat_from" => "Des d'on ha arribat",
"dstat_os" => "Sistema operatiu",
"dstat_browser" => "Navegador",
"dstat_visible_rows" => "Accessos visibles",
"dstat_green_rows" => "Files verdes",
"dstat_blue_rows" => "Files blaves",
"dstat_red_rows" => "Files vermelles",
"dstat_last_visit" => "&Uacute;ltima visita",
"dstat_robots" => "Robots",
"dstat_no_data" => "Dades no disponibles",
"dstat_prx" => "Servidor Proxy",
"dstat_ip" => "Adre&ccedil;a IP",
"dstat_user_agent" => "Agent d'usuari",
"dstat_nr" => "Nr",
"dstat_pages" => "P&agrave;gines",
"dstat_visit_length" => "Durada de la visita",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Accessos",
"gstat_Total_visits" => "Visites totals",
"gstat_Total_unique" => "Totals &uacute;niques",
"gstat_Operating_systems" => "Sistemes operatius",
"gstat_Browsers" => "Navegadors",
"gstat_extensions" => "%d primeres extensions",
"gstat_Robots" => "Robots",
"gstat_pages" => "%d primeres p&agrave;gines",
"gstat_origins" => "%d primers or&iacute;gens",
"gstat_hosts" => "%d hosts amb m&eacute;s visites",
"gstat_keys" => "%d primeres paraules clau",
"gstat_Total" => "Total",
"gstat_Not_specified" => "sense especificar",

// Time stats words
"tstat_Su" => "Dium",
"tstat_Mo" => "Dill",
"tstat_Tu" => "Dima",
"tstat_We" => "Dime",
"tstat_Th" => "Dijo",
"tstat_Fr" => "Dive",
"tstat_Sa" => "Diss",

"tstat_Jan" => "Gen",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Abr",
"tstat_May" => "Mai",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Ago",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Oct",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Des",

"tstat_last_day" => "&Uacute;ltim dia",
"tstat_last_week" => "&Uacute;ltima setmana",
"tstat_last_month" => "&Uacute;ltim mes",
"tstat_last_year" => "&Uacute;ltim any",

// Configuration page words and sentences
"config_Variable_name" => "Nom de la variable",
"config_Variable_value" => "Valor de la variable",
"config_Explanations" => "Explicacions",

"config_bbc_mainsite" =>
"Si aquesta variable s&#8217;ha establert, es generar&agrave; un enlla&ccedil; al lloc especificat. El valor per defecte &eacute;s un enlla&ccedil; al directori pare. En el cas que la teva p&agrave;gina web estigui localitzada en un altre lloc, probablement voldr&agrave;s ajustar el valor per satisfer les teves necessitats.<br />
Exemples:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Per defecte, BBClone mostra la configuraci&oacute;. Si no t&#8217;agrada, pots desactivar aquesta opci&oacute;.<br />
Examples:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Text que apareixer&agrave; a la barra de t&iacute;tol de totes les p&agrave;gines de BBClone.<br />
Les macros admeses s&oacute;n:<br />
<ul>
<li>%SERVER: nom del servidor,</li>
<li>%DATE: data actual.</li>
</ul>
S&#8217;accepten etiquetes HTML.<br />
Exemples:<br />
\$BBC_TITLEBAR = &quot;Estad&iacute;stiques per %SERVER generades al %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Les meves estad&iacute;stiques al %DATE s&oacute;n aquestes:&quot;;<br />",

"config_bbc_language" =>
"Idioma per defecte del BBClone en el cas que no estigui especificat pel navegador.
Els seg&uuml;ents idiomes estan suportats:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"Aquesta variable defineix la durada d&#8217;una visita &uacute;nica. Cada visita del mateix visitant separada un temps superior a l&#8217;especificat ser&agrave; considerada una nova visita. El valor per defecte &eacute;s de 30 minuts (1800 segons).<br />
Exemples:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Quantes visites vols que siguin llistades a les visites detallades? El valor per defecte &eacute;s 100. Es recomana no superar el valor de 500 per no alentir el proc&eacute;s de c&agrave;rrega de la p&agrave;gina.",

"config_bbc_detailed_stat_fields" =>
"La variable \$BBC_DETAILED_STAT_FIELDS determina les columnes que es mostraran a les estad&iacute;stiques detallades. Columnes possibles s&oacute;n:
<ul>
<li>id&nbsp;=&gt;&nbsp;N&uacute;mero de visitants des de l&#8217;inici del comptador </li>
<li>time&nbsp;=&gt;&nbsp;Hora en que l&#8217;&uacute;ltima visita va ser registrada </li>
<li>visits&nbsp;=&gt;&nbsp;Els clics de visitants &uacute;nics </li>
<li>dns&nbsp;=&gt;&nbsp;Nom del servidor dels visitants </li>
<li>ip&nbsp;=&gt;&nbsp;Adre&ccedil;a IP dels visitants </li>
<li>os&nbsp;=&gt;&nbsp;El sistema operatiu (si est&agrave; disponible i no &eacute;s un robot) </li>
<li>browser&nbsp;=&gt;&nbsp;El programari utilitzat per establir la connexi&oacute;</li>
<li>ext&nbsp;=&gt;&nbsp;Pa&iacute;s o extensi&oacute; del visitant </li>
<li>referer&nbsp;=&gt;&nbsp;Enlla&ccedil; des d&#8217;on ve el visitant (si est&agrave; disponible)
</li></ul>
Les columnes es mostraran en el mateix ordre que les especifiquis.<br />
Exemples:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"En el cas que l&#8217;hora del servidor no sigui la mateixa que la teva hora local, pots ajustar-ho amb aquesta variable. Valors negatius endarreriran el temps i valors positius l&#8217;avan&ccedil;aran.<br />
Exemples:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Aquesta opci&oacute; defineix quan una adre&ccedil;a IP ha de ser resolta per trobar el nom del servidor. El nom del servidor d&oacute;na molta m&eacute;s informaci&oacute; del visitant per&ograve; fa que la p&agrave;gina web vagi m&eacute;s lenta.<br />
Exemples:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Per defecte, BBClone basa les estad&iacute;stiques a partir de les visites per&ograve;, si vols, aqu&iacute; pots fer que les basi en les visites &uacute;niques.<br />
Exemples:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Aquesta opci&oacute; exclou una adre&ccedil;a o un rang d&#8217;adreces de les estad&iacute;stiques. Si vols utilitzar m&eacute;s d&#8217;una expressi&oacute;, separa-les amb una coma.<br />
Exemples:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Si no vols que apareguin alguns dels or&iacute;gens dels teus visitants, pots especificar-los aqu&iacute;. Si vols especificar-ne m&eacute;s d&#8217;un, utilitza la coma com a separador.<br />
Exemples:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Aqu&iacute; pots especificar el tractament dels robots. El valor per defecte &eacute;s ignorar-los en el r&agrave;nquing de servidors per&ograve; mantenir-los en la resta d&#8217;estad&iacute;stiques. Si no vols que apareguin enlloc, pots posar un &quot;2&quot;, i aleshores nom&eacute;s apareixeran les visites humanes.<br />
Exemples:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Aquesta opci&oacute; especifica com el BBClone identifica un usuari. Per defecte nom&eacute;s s&#8217;utilitza l&#8217;adre&ccedil;a IP per&ograve; alguns visitants s&#8217;amaguen darrera un proxy i desactivar aquesta opci&oacute; proporcionar&agrave; unes estad&iacute;stiques m&eacute;s reals en aquests casos.<br />
Exemples:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Quan vulguis esborrar totes les estad&iacute;stiques, activa aquesta opci&oacute; i quan entri el seg&uuml;ent visitant, aquest esborrar&agrave; les estad&iacute;stiques. No oblidis de tornar-ho a desactivar si no vols experimentar un tr&agrave;fic molt redu&iuml;t ;).<br />
Exemples:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Les estad&iacute;stiques poden generar una gran quantitat de dades. Activant aquesta opci&oacute; s&#8217;eliminen els detalls de les visites menys rellevants i s&#8217;aconsegueix aix&iacute; reduir considerablement el fitxer access.php. Les visites que s&#8217;eliminin s&#8217;afegiran a entrades &quot;sense especificar&quot; per mantenir el nombre de visites intacte.<br />
Exemples:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>