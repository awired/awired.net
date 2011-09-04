<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/pt-br.php,v 1.32 2004/10/17 14:08:40 olliver Exp $
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
"global_bbclone_copyright" => "O time BBClone - Distribu�do sob a Licen�a",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "sim",
"global_no" => "n�o",

// The error messages
"error_cannot_see_config" =>
"N�o � permitido ver a configura��o do BBClone configuration neste servidor.",

// Address Extensions
"numeric" => "Num�rico", "com" => "Comercial",
"net" => "Redes", "edu" => "Educacional",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Jap�o", "us" => "Estados Unidos",
"uk" => "Reino Unido", "de" => "Alemanha",
"mil" => "Militar dos EUA", "ca" => "Canad�",
"it" => "Italia", "au" => "Australia",
"org" => "Organiza��es", "nl" => "Holanda",
"fr" => "Fran�a", "tw" => "Taiwan",
"gov" => "Governo", "fi" => "Finl�ndia",
"br" => "Brasil", "se" => "Su�cia",
"es" => "Espanha", "no" => "Noruega",
"mx" => "M�xico", "kr" => "Cor�ia",
"ch" => "Su�ca", "dk" => "Dinamarca",
"be" => "Belgica", "at" => "�ustria",
"nz" => "Nova Zelandia", "ru" => "Federa��o Russa",
"pl" => "Pol�nia", "za" => "�frica do Sul",
"unknown" => "Desconhecido", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapura",
"arpa" => "Enganos", "cz" => "Rep�blica Czech",
"hu" => "Hungria", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "Turquia",
"gr" => "Grecia", "cn" => "China",
"ie" => "Irlanda", "my" => "Malasia",
"th" => "Tail�ndia", "cl" => "Chile",
"co" => "Col�mbia", "is" => "Iceland",
"uy" => "Uruguai", "ee" => "Est�nia",
"in" => "�ndia", "ua" => "Ucr�nia",
"sk" => "Eslov�quia", "ro" => "Rom�nia",
"ae" => "Emirados �rabes Unidos", "id" => "Indon�sia",
"su" => "Uni�o Sovi�tica", "si" => "Eslov�nia",
"hr" => "Cro�cia", "ph" => "Filipinas",
"lv" => "Latvia", "ve" => "Venezuela",
"bg" => "Bulg�ria", "lt" => "Lit�nia",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburgo",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Organiza��es Internacionais",
"do" => "Rep�blica Dominicana", "cy" => "Chipre",
"pk" => "Paquist�o", "cc" => "Ilhas Cocos",
"tt" => "Trinidad e Tobago", "eg" => "Egito",
"lb" => "L�bano", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Casaquist�o",
"na" => "Nam�bia", "mu" => "Mauritania",
"bm" => "Bermuda", "sa" => "Ar�bia Saudita",
"zw" => "Zimb�bue", "kg" => "Quirguiquist�o",
"cx" => "Ilhas Natal", "pa" => "Panam�",
"gt" => "Guatemala", "bw" => "Botsuana",
"mk" => "Maced�nia", "gl" => "Groel�ndia",
"ec" => "Equador", "lk" => "Sri Lanka",
"md" => "Mold�via", "py" => "Paraguai",
"bo" => "Bol�via", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Ilhas Faroe",
"ac" => "Ilha Ascen��o", "pr" => "Porto Rico",
"am" => "Arm�nia", "pf" => "Polin�sia Francesa",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicar�gua", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Morrocos",
"ke" => "Qu�nia", "ad" => "Andorra",
"zm" => "Z�mbia", "np" => "Nepal",
"bt" => "But�o", "sz" => "Suazilandia",
"ba" => "Bosnia e Herzegovina", "om" => "Om�",
"jo" => "Jord�nia", "ir" => "Ir�",
"st" => "S�o Tom� e Pr�ncipe", "vi" => "Ilhas Virgens (EUA)",
"ci" => "Costa do Marfim", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Ilhas Caimam",
"gp" => "Guadalupe", "mg" => "Madagascar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Samoa Americana", "tz" => "Tanz�nia",
"ws" => "Samoa", "tm" => "Turcomenist�o",
"mc" => "M�naco", "sn" => "Senegal",
"hm" => "Ilhas Heard e Mc Donald", "fm" => "Micronesia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Ruanda", "mq" => "Martinica",
"ai" => "Anguilla", "pg" => "Papua Nova Guin�",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldivas",
"nc" => "Nova Caledonia", "ag" => "Ant�gua and Barbuda",
"uz" => "Usbequist�o", "tj" => "Tajiquist�o",
"sb" => "Ilhas Salom�o", "bf" => "Burkina Faso",
"kh" => "Cambodja", "tc" => "Ilhas Turks e Caicos",
"tf" => "Territ�rio do Sul da Fran�a", "az" => "Azerbaij�o",
"dm" => "Dominica", "mz" => "Mo�ambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mong�lia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "N�ger", "gf" => "Guiana Francesa",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Alb�nia", "gh" => "Gana",
"nf" => "Ilha Norfolk", "io" => "Territ�rio Brit�nico no Oceano �ndico",
"gs" => "Ilhas Sul Georgia e Ilhas Sul Sandwich", "ye" => "I�men",
"an" => "Antilhas Holandesas", "aq" => "Antarctica",
"tn" => "Tun�sia", "ck" => "Ilhas Cook",
"ls" => "Lesoto", "et" => "Eti�pia",
"ng" => "Nigeria", "sl" => "Serra Leoa",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Ilhas Virges (UK)", "vn" => "Vietn�",
"mr" => "Mauritania", "gy" => "Guiana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibuti",
"km" => "Comoros", "dz" => "Alg�ria",
"im" => "Ilha do Homem", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gab�o",
"gb" => "Gr�-Bretanha", "bs" => "Bahamas",
"va" => "Estado do Vaticano", "lc" => "Santa L�cia",
"cd" => "Congo", "gm" => "G�mbia",
"mp" => "Ilhas Mariana do Norte", "gw" => "Guin�-Bissau",
"cm" => "Camar�es", "ao" => "Angola",
"er" => "Eritr�a", "ly" => "L�bia",
"cf" => "Republica da �frica Central", "mm" => "Myanmar",
"td" => "Chade", "iq" => "Iraque",
"kn" => "Saint Kitts and Nevis", "sc" => "Seycheles",
"cg" => "Congo", "gd" => "Granada",
"nr" => "Nauru", "af" => "Afeganist�o",
"cv" => "Cabo Verde", "mh" => "Ilhas Marshall",
"pm" => "St. Pierre e Miquelon", "so" => "Som�lia",
"vc" => "St. Vincent e Grenadines", "bd" => "Bangladesh",
"gn" => "Guin�", "ht" => "Haiti",
"la" => "Laos", "lr" => "Lib�ria",
"mw" => "Malau�", "pw" => "Palau",
"re" => "Reuni�o", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Ilha Bouvet",
"fk" => "Ilhas Falkland", "gq" => "Guin� Equatorial",
"sd" => "Sud�o", "sj" => "Ilhas Svalbard e Jan Mayen",
"sr" => "Suriname", "sy" => "S�ria",
"tp" => "Timor Leste", "um" => "Ilhas menores dos EUA",
"wf" => "Ilhas Wallis e Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Outro",
"misc_unknown" => "Desconhecido",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "P�gina Principal",
"navbar_Configuration" => "Configura��o",
"navbar_Global_Stats" => "Estat�sticas Globais",
"navbar_Detailed_Stats" => "Estat�sticas Detalhadas",
"navbar_Time_Stats" => "Estat�sticas Cronol�gicas",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tempo",
"dstat_visits" => "Visitas",
"dstat_extension" => "Extens�o",
"dstat_dns" => "Hostname",
"dstat_from" => "De",
"dstat_os" => "OS",
"dstat_browser" => "Navegador",
"dstat_visible_rows" => "Acessos vis�veis",
"dstat_green_rows" => "linhas verdes",
"dstat_blue_rows" => "linhas azuis",
"dstat_red_rows" => "linhas vermelhas",
"dstat_last_visit" => "�ltima visita",
"dstat_robots" => "rob�s",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words

"gstat_Accesses" => "Acessos",
"gstat_Total_visits" => "Total visitas",
"gstat_Total_unique" => "Total �nicas",
"gstat_Operating_systems" => "Sistemas operacionais: %d Mais",
"gstat_Browsers" => "Navegadores: %d Mais",
"gstat_extensions" => "Extens�es: %d Mais",
"gstat_Robots" => "Rob�s: %d Mais",
"gstat_pages" => "P�ginas Visitadas: %d Mais",
"gstat_origins" => "Origens: %d Mais",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Total",
"gstat_Not_specified" => "N�o especificado",

// Time stats words
"tstat_Su" => "Dom",
"tstat_Mo" => "Seg",
"tstat_Tu" => "Ter",
"tstat_We" => "Qua",
"tstat_Th" => "Qui",
"tstat_Fr" => "Sex",
"tstat_Sa" => "S�b",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Abr",
"tstat_May" => "Mai",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Ago",
"tstat_Sep" => "Set",
"tstat_Oct" => "Out",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dez",

"tstat_last_day" => "�ltimo dia",
"tstat_last_week" => "�ltima semana",
"tstat_last_month" => "�ltimo m�s",
"tstat_last_year" => "�ltimo ano",

// Configuration page words and sentences

"config_Variable_name" => "Nome da Vari�vel",
"config_Variable_value" => "Valor da Vari�vel",
"config_Explanations" => "Explana��es",

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
"O t�tulo aparecendo dentro da barra de t�tulo presente em todas p�ginas do BBClone.<br />
Vari�veis reconhec�veis s�o:<br />
<ul>
<li>%SERVER: nome do servidor,</li>
<li>%DATE: a data corrente.</li>
</ul>
HTML tags s�o tamb�m permitidas.<br />
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