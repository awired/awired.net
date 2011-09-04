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
"global_bbclone_copyright" => "O time BBClone - Distribuído sob a Licença",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "sim",
"global_no" => "não",

// The error messages
"error_cannot_see_config" =>
"Não é permitido ver a configuração do BBClone configuration neste servidor.",

// Address Extensions
"numeric" => "Numérico", "com" => "Comercial",
"net" => "Redes", "edu" => "Educacional",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japão", "us" => "Estados Unidos",
"uk" => "Reino Unido", "de" => "Alemanha",
"mil" => "Militar dos EUA", "ca" => "Canadá",
"it" => "Italia", "au" => "Australia",
"org" => "Organizações", "nl" => "Holanda",
"fr" => "França", "tw" => "Taiwan",
"gov" => "Governo", "fi" => "Finlândia",
"br" => "Brasil", "se" => "Suécia",
"es" => "Espanha", "no" => "Noruega",
"mx" => "México", "kr" => "Coréia",
"ch" => "Suíca", "dk" => "Dinamarca",
"be" => "Belgica", "at" => "Áustria",
"nz" => "Nova Zelandia", "ru" => "Federação Russa",
"pl" => "Polônia", "za" => "África do Sul",
"unknown" => "Desconhecido", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapura",
"arpa" => "Enganos", "cz" => "República Czech",
"hu" => "Hungria", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "Turquia",
"gr" => "Grecia", "cn" => "China",
"ie" => "Irlanda", "my" => "Malasia",
"th" => "Tailândia", "cl" => "Chile",
"co" => "Colômbia", "is" => "Iceland",
"uy" => "Uruguai", "ee" => "Estônia",
"in" => "Índia", "ua" => "Ucrânia",
"sk" => "Eslováquia", "ro" => "Romênia",
"ae" => "Emirados Árabes Unidos", "id" => "Indonésia",
"su" => "União Soviética", "si" => "Eslovênia",
"hr" => "Croácia", "ph" => "Filipinas",
"lv" => "Latvia", "ve" => "Venezuela",
"bg" => "Bulgária", "lt" => "Litônia",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburgo",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Organizações Internacionais",
"do" => "República Dominicana", "cy" => "Chipre",
"pk" => "Paquistão", "cc" => "Ilhas Cocos",
"tt" => "Trinidad e Tobago", "eg" => "Egito",
"lb" => "Líbano", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Casaquistão",
"na" => "Namíbia", "mu" => "Mauritania",
"bm" => "Bermuda", "sa" => "Arábia Saudita",
"zw" => "Zimbábue", "kg" => "Quirguiquistão",
"cx" => "Ilhas Natal", "pa" => "Panamá",
"gt" => "Guatemala", "bw" => "Botsuana",
"mk" => "Macedônia", "gl" => "Groelândia",
"ec" => "Equador", "lk" => "Sri Lanka",
"md" => "Moldávia", "py" => "Paraguai",
"bo" => "Bolívia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Ilhas Faroe",
"ac" => "Ilha Ascenção", "pr" => "Porto Rico",
"am" => "Armênia", "pf" => "Polinésia Francesa",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicarágua", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Morrocos",
"ke" => "Quênia", "ad" => "Andorra",
"zm" => "Zâmbia", "np" => "Nepal",
"bt" => "Butão", "sz" => "Suazilandia",
"ba" => "Bosnia e Herzegovina", "om" => "Omã",
"jo" => "Jordânia", "ir" => "Irã",
"st" => "São Tomé e Préncipe", "vi" => "Ilhas Virgens (EUA)",
"ci" => "Costa do Marfim", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Ilhas Caimam",
"gp" => "Guadalupe", "mg" => "Madagascar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Samoa Americana", "tz" => "Tanzânia",
"ws" => "Samoa", "tm" => "Turcomenistão",
"mc" => "Mônaco", "sn" => "Senegal",
"hm" => "Ilhas Heard e Mc Donald", "fm" => "Micronesia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Ruanda", "mq" => "Martinica",
"ai" => "Anguilla", "pg" => "Papua Nova Guiné",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldivas",
"nc" => "Nova Caledonia", "ag" => "Antígua and Barbuda",
"uz" => "Usbequistão", "tj" => "Tajiquistão",
"sb" => "Ilhas Salomão", "bf" => "Burkina Faso",
"kh" => "Cambodja", "tc" => "Ilhas Turks e Caicos",
"tf" => "Território do Sul da França", "az" => "Azerbaijão",
"dm" => "Dominica", "mz" => "Moçambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongólia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Níger", "gf" => "Guiana Francesa",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albânia", "gh" => "Gana",
"nf" => "Ilha Norfolk", "io" => "Território Britânico no Oceano Índico",
"gs" => "Ilhas Sul Georgia e Ilhas Sul Sandwich", "ye" => "Iêmen",
"an" => "Antilhas Holandesas", "aq" => "Antarctica",
"tn" => "Tunísia", "ck" => "Ilhas Cook",
"ls" => "Lesoto", "et" => "Etiópia",
"ng" => "Nigeria", "sl" => "Serra Leoa",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Ilhas Virges (UK)", "vn" => "Vietnã",
"mr" => "Mauritania", "gy" => "Guiana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibuti",
"km" => "Comoros", "dz" => "Algéria",
"im" => "Ilha do Homem", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabão",
"gb" => "Grã-Bretanha", "bs" => "Bahamas",
"va" => "Estado do Vaticano", "lc" => "Santa Lúcia",
"cd" => "Congo", "gm" => "Gâmbia",
"mp" => "Ilhas Mariana do Norte", "gw" => "Guiné-Bissau",
"cm" => "Camarões", "ao" => "Angola",
"er" => "Eritréa", "ly" => "Líbia",
"cf" => "Republica da África Central", "mm" => "Myanmar",
"td" => "Chade", "iq" => "Iraque",
"kn" => "Saint Kitts and Nevis", "sc" => "Seycheles",
"cg" => "Congo", "gd" => "Granada",
"nr" => "Nauru", "af" => "Afeganistão",
"cv" => "Cabo Verde", "mh" => "Ilhas Marshall",
"pm" => "St. Pierre e Miquelon", "so" => "Somália",
"vc" => "St. Vincent e Grenadines", "bd" => "Bangladesh",
"gn" => "Guiné", "ht" => "Haiti",
"la" => "Laos", "lr" => "Libéria",
"mw" => "Malauí", "pw" => "Palau",
"re" => "Reunião", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Ilha Bouvet",
"fk" => "Ilhas Falkland", "gq" => "Guiné Equatorial",
"sd" => "Sudão", "sj" => "Ilhas Svalbard e Jan Mayen",
"sr" => "Suriname", "sy" => "Síria",
"tp" => "Timor Leste", "um" => "Ilhas menores dos EUA",
"wf" => "Ilhas Wallis e Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Outro",
"misc_unknown" => "Desconhecido",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Página Principal",
"navbar_Configuration" => "Configuração",
"navbar_Global_Stats" => "Estatísticas Globais",
"navbar_Detailed_Stats" => "Estatísticas Detalhadas",
"navbar_Time_Stats" => "Estatísticas Cronológicas",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tempo",
"dstat_visits" => "Visitas",
"dstat_extension" => "Extensão",
"dstat_dns" => "Hostname",
"dstat_from" => "De",
"dstat_os" => "OS",
"dstat_browser" => "Navegador",
"dstat_visible_rows" => "Acessos visíveis",
"dstat_green_rows" => "linhas verdes",
"dstat_blue_rows" => "linhas azuis",
"dstat_red_rows" => "linhas vermelhas",
"dstat_last_visit" => "última visita",
"dstat_robots" => "robôs",
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
"gstat_Total_unique" => "Total únicas",
"gstat_Operating_systems" => "Sistemas operacionais: %d Mais",
"gstat_Browsers" => "Navegadores: %d Mais",
"gstat_extensions" => "Extensões: %d Mais",
"gstat_Robots" => "Robôs: %d Mais",
"gstat_pages" => "Páginas Visitadas: %d Mais",
"gstat_origins" => "Origens: %d Mais",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Total",
"gstat_Not_specified" => "Não especificado",

// Time stats words
"tstat_Su" => "Dom",
"tstat_Mo" => "Seg",
"tstat_Tu" => "Ter",
"tstat_We" => "Qua",
"tstat_Th" => "Qui",
"tstat_Fr" => "Sex",
"tstat_Sa" => "Sáb",

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

"tstat_last_day" => "Último dia",
"tstat_last_week" => "Última semana",
"tstat_last_month" => "Último mês",
"tstat_last_year" => "Último ano",

// Configuration page words and sentences

"config_Variable_name" => "Nome da Variável",
"config_Variable_value" => "Valor da Variável",
"config_Explanations" => "Explanações",

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
"O título aparecendo dentro da barra de título presente em todas páginas do BBClone.<br />
Variáveis reconhecíveis são:<br />
<ul>
<li>%SERVER: nome do servidor,</li>
<li>%DATE: a data corrente.</li>
</ul>
HTML tags são também permitidas.<br />
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