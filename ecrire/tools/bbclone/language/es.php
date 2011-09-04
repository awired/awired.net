<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/es.php,v 1.33 2004/10/17 14:08:40 olliver Exp $
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

// Date format (used with date() )
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "El equipo de BBClone - licenciado bajo la",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "si",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"no puedes ver la configuracion de BBClone en este servidor.",

// Address Extensions
"numeric" => "Numerico", "com" => "Comercial",
"net" => "Redes", "edu" => "Educación",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japón", "us" => "Estados Unidos",
"uk" => "Reino unido", "de" => "Alemania",
"mil" => "Ejercito estados unidos", "ca" => "Canada",
"it" => "Italia", "au" => "Australia",
"org" => "Organizaciones", "nl" => "Holanda",
"fr" => "Francia", "tw" => "Taiwan",
"gov" => "Gobierno estados unidos", "fi" => "Finlandia",
"br" => "Brasil", "se" => "Sweden",
"es" => "España", "no" => "Noruega",
"mx" => "Mejico", "kr" => "corea",
"ch" => "Suiza", "dk" => "Dinamarca",
"be" => "Bélgica", "at" => "Austria",
"nz" => "Nueva zelanda", "ru" => "Rusia",
"pl" => "Polonia", "za" => "Sud Africa",
"unknown" => "Desconocido", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapur",
"arpa" => "Errores", "cz" => "República checa",
"hu" => "Hungría", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "Turquía",
"gr" => "Grecia", "cn" => "China",
"ie" => "Irlanda", "my" => "Malasia",
"th" => "Tailandia", "cl" => "Chile",
"co" => "Colombia", "is" => "Islandia",
"uy" => "Uruguay", "ee" => "Estonia",
"in" => "India", "ua" => "Ucrania",
"sk" => "Eslovaquia", "ro" => "Rumanía",
"ae" => "Emiratos árabes", "id" => "Indonesia",
"su" => "Unión soviética", "si" => "Eslovenia",
"hr" => "Croacia", "ph" => "Filipinas",
"lv" => "Letonia", "ve" => "Venezuela",
"bg" => "Bulgaria", "lt" => "Lituania",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburgo",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Organizaciones",
"do" => "Republica Dominicana", "cy" => "Cyprus",
"pk" => "Pakistan", "cc" => "Islas Cocos",
"tt" => "Trinidad y Tobago", "eg" => "Egipto",
"lb" => "Lebanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakhistán",
"na" => "Namibia", "mu" => "Mauritania",
"bm" => "Bermudas", "sa" => "Arabia Saudí",
"zw" => "Zimbabwe", "kg" => "Kyrgyzstan",
"cx" => "Islas de Navidad", "pa" => "Panamá",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Macedonia", "gl" => "Tierra Verde",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Islas Faro",
"ac" => "Islas de la ascensión", "pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "Polinesia francesa",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Marruecos",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnia Herzegovina", "om" => "Oman",
"jo" => "Jordan", "ir" => "Iran",
"st" => "San Tome y Principe", "vi" => "Islas Vírgenes (US)",
"ci" => "Ivory Coast", "jm" => "Jamaica",
"li" => "Lichenstein", "ky" => "Islas Caimán",
"gp" => "Guadalupe", "mg" => "Madagascar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Samoa Americana", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Islas Heard and Mc Donald", "fm" => "Micronesia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Ruanda", "mq" => "Martinica",
"ai" => "Anguilla", "pg" => "Papua Nueva Guinea",
"bz" => "Belize", "sh" => "Santa Helena",
"aw" => "Aruba", "mv" => "Maldivas",
"nc" => "New Caledonia", "ag" => "Antigua and Barbuda",
"uz" => "Uzbekistan", "tj" => "Tajikistan",
"sb" => "Islas Salomón", "bf" => "Burkina Faso",
"kh" => "Cambodia", "tc" => "Islas Turks and Caicos",
"tf" => "Territorios del sur de francia", "az" => "acerbayán",
"dm" => "Dominica", "mz" => "Mozambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nigeria", "gf" => "Guinea francesa",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albania", "gh" => "Ghana",
"nf" => "Norfolk Island", "io" => "Territorio británico del oceano índico",
"gs" => "Sur de Georgia y islas Sandwich", "ye" => "Yemen",
"an" => "Antillas Holandesas", "aq" => "Antarctica",
"tn" => "Tunez", "ck" => "Islas Cook",
"ls" => "Lesotho", "et" => "Etiopia",
"ng" => "Nigeria", "sl" => "Sierra Leona",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Islas vírgenes(UK)", "vn" => "Vietnam",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Algeria",
"im" => "Isla de Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Gabón", "bs" => "Bahamas",
"va" => "Estado vaticano", "lc" => "Santa Lucia",
"cd" => "Congo", "gm" => "Gambia",
"mp" => "Islas Marianas del norte", "gw" => "Guinea-Bissau",
"cm" => "Camerún", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libia",
"cf" => "Republica centro africana", "mm" => "Myanmar",
"td" => "Chad", "iq" => "Irak",
"kn" => "San Kitts y Nevis", "sc" => "Seychelles",
"cg" => "Congo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afganistán",
"cv" => "Cape Verde", "mh" => "Islas Marshall",
"pm" => "San Pierre y Miquelon", "so" => "Somalia",
"vc" => "San Vincente y las Granadinas", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Islas Bouvet",
"fk" => "Islas Falkland", "gq" => "Guinea ecuatorial",
"sd" => "Sudan", "sj" => "islas Svalbard y Jan Mayen",
"sr" => "Suriname", "sy" => "Syria",
"tp" => "Timor este", "um" => "Islas menores de los estados unidos",
"wf" => "Wallis y islas Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Otras",
"misc_unknown" => "Desconocido",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Sitio principal",
"navbar_Configuration" => "Configuración",
"navbar_Global_Stats" => "Estadísticas globales",
"navbar_Detailed_Stats" => "Estadísticas detalladas",
"navbar_Time_Stats" => "Estadísiticas temporales",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tiempo",
"dstat_visits" => "Visitas",
"dstat_extension" => "Extension",
"dstat_dns" => "Hostname",
"dstat_from" => "proviniente de",
"dstat_os" => "S.O.",
"dstat_browser" => "Navegador",
"dstat_visible_rows" => "accesos visibles",
"dstat_green_rows" => "Filas verdes",
"dstat_blue_rows" => "Filas azules",
"dstat_red_rows" => "Filas rojas",
"dstat_last_visit" => "última visita",
"dstat_robots" => "robots",
"dstat_no_data" => "Ningunos datos disponibles",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Páginas",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Accesos",
"gstat_Total_visits" => "visitas totales",
"gstat_Total_unique" => "Totales únicas",
"gstat_Operating_systems" => "sistemas operativos",
"gstat_Browsers" => "Navegadores",
"gstat_extensions" => "%d primeras extensiones",
"gstat_Robots" => "Robots",
"gstat_pages" => "%d primeras páginas",
"gstat_origins" => "%d primeros origenes",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Total",
"gstat_Not_specified" => "sin especificar",

// Time stats words
"tstat_Su" => "Dom",
"tstat_Mo" => "Lun",
"tstat_Tu" => "Mar",
"tstat_We" => "Mie",
"tstat_Th" => "Jue",
"tstat_Fr" => "Vie",
"tstat_Sa" => "Sab",

"tstat_Jan" => "Ene",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Abr",
"tstat_May" => "May",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Ago",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Oct",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dic",

"tstat_last_day" => "último día",
"tstat_last_week" => "última semana",
"tstat_last_month" => "Último mes",
"tstat_last_year" => "Último año",

// Configuration page words and sentences
"config_Variable_name" => "nombre de la variable",
"config_Variable_value" => "Valor de la variable",
"config_Explanations" => "Explicaciones",

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
"The title of your stats pages.<br />
It will be displayed in the navigation bar of all BBClone pages<br />
The following macros are recognised:<br />
<ul>
<li>%SERVER: server name,</li>
<li>%DATE: current date.</li>
</ul>
HTML Tags are allowed.<br />
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