<?php
/*
 * This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/nb.php,v 1.11 2004/10/17 14:08:40 olliver Exp $
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
 * translated by: hans Fredrik Nordhaug, hans(at)nordhaug.priv.no
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d-m-Y",

// Global translation
"global_bbclone_copyright" => "BBClone-laget - lisensiert under ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "ja",
"global_no" => "nei",

// The error messages
"error_cannot_see_config" =>
"Du har ikke tillatelse til &aring; se BBClone konfigurasjonen p&aring; denne serveren.",

// Address Extensions
"numeric" => "numeric", "com" => "Kommersiell",
"net" => "Nettverk","edu" => "Utdannelse",
"biz" => "Business","info" => "Informasjon",
"jp" => "Japan", "us" => "De forente stater",
"uk" => "Storbritannia","de" => "Tyskland",
"name" => "Personal", "ps" => "Palestina",
"mil" => "De forente staters milit&aelig;re", "ca" => "Canada",
"it" => "Italia", "au" => "Australia",
"org" => "Organisationer", "nl" => "Nederland",
"fr" => "Frankrig", "tw" => "Taiwan",
"gov" => "De forente staters regering", "fi" => "Finland",
"br" => "Brasil","se" => "Sverige",
"es" => "Spania", "no" => "Norge",
"mx" => "Mexico", "kr" => "Korea",
"ch" => "Schweiz", "dk" => "Danmark",
"be" => "Belgia", "at" => "&Oslash;sterrike",
"nz" => "New Zealand","ru" => "Russland",
"pl" => "Polen", "za" => "S&oslash;rafrika",
"unknown" => "Ukjent", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapore",
"arpa" => "Feil", "cz" => "Tsjekkia",
"hu" => "Ungarn", "hk" => "Hongkong",
"pt" => "Portugal", "tr" => "Tyrkia",
"gr" => "Hellea","cn" => "Kina",
"ie" => "Irland", "my" => "Malaysia",
"th" => "Thailand", "cl" => "Chile",
"co" => "Colombia", "is" => "Island",
"uy" => "Uruguay", "ee" => "Estland",
"in" => "India", "ua" => "Ukraina",
"sk" => "Slovakia","ro" => "Romania",
"ae" => "De forente arabiske emirater", "id" => "Indonesia",
"su" => "Sovjetunionen", "si" => "Slovenia",
"hr" => "Kroatia", "ph" => "Filippinene",
"lv" => "Letland", "ve" => "Venezuela",
"bg" => "Bulgaria","lt" => "Litauen",
"yu" => "Serbia and Montenegro","lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica","int" => "Internasjonale organisaajoner",
"do" => "Dominikanske republik", "cy" => "Kypros",
"pk" => "Pakistan", "cc" => "Kokos&oslash;yene",
"tt" => "Trinidad og Tobago", "eg" => "Egypt",
"lb" => "Libanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kasakhstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Saudi-Arabien",
"zw" => "Zimbabwe", "kg" => "Kirgizistan",
"cx" => "Christmas&oslash;ya","pa" => "Panama",
"gt" => "Guatemala","bw" => "Botswana",
"mk" => "Makedonia","gl" => "Gr&oslash;nnland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "F&aelig;r&oslash;yene",
"ac" => "Ascenci&oacute;n","pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "Fransk Polynesia",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicaragua","by" => "Hviterussland",
"sv" => "El Salvador","ma" => "Marokko",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnia-Hercegovina", "om" => "Oman",
"jo" => "Jordan", "ir" => "Iran",
"st" => "Sao Tomé og Príncipe", "vi" => "Jomfru&oslash;yene (USA)",
"ci" => "Elfenbenskysten","jm" => "Jamaica",
"li" => "Liechtenstein","ky" => "Cayman&oslash;yene",
"gp" => "Guadeloupe","mg" => "Madagaskar",
"gi" => "Gibraltar","sm" => "San Marino",
"as" => "Amerikansk Samoa","tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Heard- og McDonald&oslash;yene", "fm" => "Mikronesia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua Ny-Guinea",
"bz" => "Belize", "sh" => "Saint Helena",
"aw" => "Aruba", "mv" => "Maldivene",
"nc" => "Ny Caledonien","ag" => "Antigua og Barbuda",
"uz" => "Usbekistan","tj" => "Tadsjikistan",
"sb" => "Salomon&oslash;yene", "bf" => "Burkina Faso",
"kh" => "Cambodia", "tc" => "Turks- og Caicos&oslash;yene",
"tf" => "Franske s&oslash;rlige territorier", "az" => "Aserbajdsjan",
"dm" => "Dominica", "mz" => "Moçambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia","ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Fransk Guyana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albanien", "gh" => "Ghana",
"nf" => "Norfolk &oslash;en", "io" => "British Indian Ocean Territory",
"gs" => "S&oslash;r-Georgia og de s&oslash;rlige Sandwich&oslash;yene", "ye" => "Yemen",
"an" => "De nederlandske Antillene", "aq" => "Antarktis",
"tn" => "Tunisia", "ck" => "Cook&oslash;yene",
"ls" => "Lesotho", "et" => "Etiopia",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Jomfru&oslash;yene (Storbritannia)", "vn" => "Vietnam",
"mr" => "Mauritania","gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Komorene","dz" => "Algerie",
"im" => "Isle of Man","pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Storbritannia","bs" => "Bahamas",
"va" => "Vatikanstaten","lc" => "Saint Lucia",
"cd" => "Kongo", "gm" => "Gambia",
"mp" => "Nord-Marianene", "gw" => "Guinea-Bissau",
"cm" => "Cameroun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libyen",
"cf" => "Den sentralafrikanske republikken", "mm" => "Myanmar",
"td" => "Tchad", "iq" => "Irak",
"kn" => "Saint Christopher og Nevis", "sc" => "Seychellene",
"cg" => "Congo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Kap Verde","mh" => "Marshall&oslash;yene",
"pm" => "Saint Pierre og Miquelon", "so" => "Somalia",
"vc" => "Saint Vincent og Grenadinerne", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "R&eacute;union", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet&oslash;ya",
"fk" => "Falklands&oslash;yene", "gq" => "Ekvatorial-Guinea",
"sd" => "Sudan", "sj" => "Svalbard og Jan Mayen",
"sr" => "Surinam", "sy" => "Syria",
"tp" => "&Oslash;ttimor", "um" => "US mindre &oslash;yer i Oceania og Vestindia",
"wf" => "Wallis- og Futuna&oslash;yene", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneoux translations
"misc_other" => "Andre",
"misc_unknown" => "Ukjent",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Hovedside",
"navbar_Configuration" => "Konfigurasjon",
"navbar_Global_Stats" => "Generell statistikk",
"navbar_Detailed_Stats" => "Detaljert statistikk",
"navbar_Time_Stats" => "Historikk",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Tidspunkt",
"dstat_visits" => "Bes&oslash;k",
"dstat_extension" => "Toppdomene",
"dstat_dns" => "Vertsnavn",
"dstat_from" => "Fra",
"dstat_os" => "OS",
"dstat_browser" => "Nettleser",
"dstat_visible_rows" => "Synlige bes&oslash;k",
"dstat_green_rows" => "gr&oslash;nne rekker",
"dstat_blue_rows" => "bl&aring; rekker",
"dstat_red_rows" => "r&oslash;de rekker",
"dstat_last_visit" => "seneste bes&oslash;k",
"dstat_robots" => "roboter",
"dstat_no_data" => "Ingen data tiljgjengelig",
"dstat_prx" => "Proxytjener",
"dstat_ip" => "IP-adresser",
"dstat_user_agent" => "Brukeragent",
"dstat_nr" => "Nr",
"dstat_pages" => "Sider",
"dstat_visit_length" => "Bes&oslash;klengde",
"dstat_reloads" => "Oppdateringer",

// Global stats words
"gstat_Accesses" => "Bes&oslash;kende",
"gstat_Total_visits" => "Samlede treff",
"gstat_Total_unique" => "Samlede unike treff",
"gstat_Operating_systems" => "Topp %d operativsystem",
"gstat_Browsers" => "Topp %d nettlesere",
"gstat_extensions" => "Topp %d toppdomener",
"gstat_Robots" => "Topp %d roboter",
"gstat_pages" => "Topp %d bes&oslash;kte sider",
"gstat_origins" => "Topp %d opprinnelser",
"gstat_hosts" => "Topp %d tjenere",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "I alt",
"gstat_Not_specified" => "Ikke spesifisert",

// Time stats words
"tstat_Su" => "S&oslash;n",
"tstat_Mo" => "Man",
"tstat_Tu" => "Tir",
"tstat_We" => "Ons",
"tstat_Th" => "Tor",
"tstat_Fr" => "Fri",
"tstat_Sa" => "L&oslash;r",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "Mai",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Des",

"tstat_last_day" => "Siste d&oslash;gn",
"tstat_last_week" => "Siste uke",
"tstat_last_month" => "Siste m&aring;ned",
"tstat_last_year" => "Siste &aring;r",

// Configuration page words and sentences
"config_Variable_name" => "Variabelnavn",
"config_Variable_value" => "Variabelverdi",
"config_Explanations" => "Forklaring",

"config_bbc_mainsite" =>
"Hvis denne variablen er satt, vil en lenke til den oppgitte siden bli generert.
Standardverdien er foreldrekategorien. Hvis din hovedside er plassert et annet sted,
s&aring; vil du sannsynligvis justere verdien.<br />
Eksempler:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone tillater visning av innstillinger som standard. I tilfellet dette ikke er
&oslash;nsket, kan du hindre visning ved &aring; sl&aring; av denne opsjonen.<br />
Eksempler:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Tittelen p&aring; alle BBClone sidene.<br />
F&oslash;lgende makroer kan brukes:<br />
<ul>
<li>%SERVER: servernavn,</li>
<li>%DATE: n&aring;v&aelig;rende dato.</li>
</ul>
HTML-tagger kan ogs&aring; brukes.<br />
Eksempler:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My Statistics from %DATE look like this:&quot;;<br />",

"config_bbc_language" =>
"Standard spr&aring;k i BBclone, hvis det ikke har blitt spesifisert av nettleseren.
F&oslash;lgende spr&aring;k er st&oslash;ttet:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro,
ru, se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"Denne variabelen definerer varigheten for et unikt bes&oslash;k i sekunder.
Hvert treff fra den samme bes&oslash;kende vil bli betraktet som et
bes&oslash;k s&aring; lenge perioden mellom to p&aring;f&oslash;lgende treff
ikke overg&aring;r denne grensen. Standardverdien er de facto nettstandard
p&aring; 30 minutter (1800 sekunder), men avhengig av dine behov kan du endre
verdien.<br />
Eksempler:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Hvor mange oppf&oslash;ringer du vil ha listet i den detaljerte statistikken.
Standardverdien er 100. Det er ikke anbefalt &aring; sette verdien
h&oslash;yere enn 500 for &aring; unng&aring; for tung last p&aring;
netttjeneren.",

"config_bbc_detailed_stat_fields" =>
"Variablen \$BBC_DETAILED_STAT_FIELDS bestemmer hvilke kolonner som skal
vises i den detaljerte statistikken. Mulige kolonner er:

<ul>
<li>id&nbsp;=&gt;&nbsp;Den x-te bes&oslash;kende siden du startet &aring; telle</li>
<li>time&nbsp;=&gt;&nbsp;Tidspunktet det siste treffet ble registrert</li>
<li>visits&nbsp;=&gt;&nbsp;Treff for en unik bes&oslash;kende</li>
<li>dns&nbsp;=&gt;&nbsp;Tjernernavn for bes&oslash;kende</li>
<li>ip&nbsp;=&gt;&nbsp;IP-adresse for den bes&oslash;kende</li>
<li>os&nbsp;=&gt;&nbsp;Operativsystemet (hvis tilgjengelig og/eller ikke en robot)</li>
<li>browser&nbsp;=&gt;&nbsp;Programvaren brukt for &aring; opprette forbindelsen, vanligvis en nettleser</li>
<li>ext&nbsp;=&gt;&nbsp;Land (eller extension) for den bes&oslash;kende</li>
<li>referer&nbsp;=&gt;&nbsp;Lenken til der den bes&oslash;kende kom fra (hvis tilgjengelig)</li>
</ul>
Rekkef&oslash;lgen du oppgir kolonnene i, vil bli brukt ved visning.<br />
Eksempler:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"I tilfellet tjeneren ikke har samme tidssone som deg, kan du tilpasse tiden i
minutter ved hjelp av denne opsjonen. Negative verdier vil stille tiden tilbake,
positive vil stille den frem.<br />
Eksempler:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Denne opsjonen bestemmer om tjenernavnet for IP-adresser skal finnes eller ei.
Tjenernavn forteller mye mer om den bes&oslash;kende, men leting etter
tjenernavn kan senke hastigheten p&aring; nettstedet ditt hvis DNS-tjenerne som
blir brukt er trege.  Ved &aring; sl&aring; p&aring; denne variabelen kan
eventuelle hastighetsproblemer bli l&oslash;st.<br />
Eksempler:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"BBClone sin standard er &aring; vise treff i tidsstatistikken fordi det gir en
ganske god formening om den faktiske lasten p&aring; tjeneren. Hvis du heller
fortrekker &aring; bruke unike treff som basis for din tidsstatistikken, kan du
sl&aring; p&aring; denne opsjonen.<br />
Eksempler:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Denne opsjonen kan brukes til &aring; ekskludere enkelte IP-adresser eller
adresseomr&aring;der fra &aring; bli telt. Du kan legge til flere uttrykk ved
&aring; bruke komma som skilletegn.<br />
Eksempler:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Hvis du ikke vil at enkelte referrers fra dine bes&oslash;kende skal listes i
rankingen eller den detaljerte statistikken, kan du oppgi en eller flere
n&oslash;kkelord brukt for &aring; blokkere referrers som inneholder
n&oslash;kkelordene. Bruk komma mellom n&oslash;kkelordene.<br />
Eksempler:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Du kan bruke denne opsjonen til &aring; eksludere tjenernavn fra roboter i din
tjener-ranking for &aring; f&aring; et bedre bilde av trafikken p&aring; sidene
dine.<br />
Eksempler:<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Denne opsjonen bestemmer hvordan BBClone skiller en bes&oslash;kende fra en
annen. Standard er &aring; bruke IP-adressen som gir realistiske tall i de
fleste tilfeller. Hvis dine bes&oslash;kende often er gjemt bak proxytjenere,
kan du oppn&aring; mer realistiske tall ved &aring; sl&aring; av denne
opsjonen, siden da vil en ny bes&oslash;kende bli anta hver gang user agent har
blitt skiftet.<br />
Eksempler:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Sl&aring; p&aring; denne opsjonen for &aring; nullstille dine statistikker.
Ikke glem &aring; sl&aring; den av igjen etterp&aring; hvis ikke vil du
sannsynligvis oppleve uvanlig liten trafikk ;).<br />
Eksempler:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Tjener og referrer statistikk kan generere store mengder data - vanligvis
for&aring;rsaket av engangsbes&oslash;kende. Ved &aring; sl&aring; p&aring;
denne opsjonen kan du slette disse oppf&oslash;ringene og vesentlig redusere
st&oslash;rrelsen p&aring; access.php (som inneholder all statistikken for
nettsidene dine) uten &aring; p&aring;virke den faktisk synlig tjener og
referrer rankingen. Antall treff vil bli lagt til
&quot;not_specified&quot;-oppf&oslash;ringene for &aring; bevare det totale
antall treff intakt.<br />
Eksempler:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>