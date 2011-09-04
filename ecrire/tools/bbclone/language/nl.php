<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/nl.php,v 1.39 2004/10/17 14:08:40 olliver Exp $
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
"global_bbclone_copyright" => "Het BBClone team - licentie onder ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "ja",
"global_no" => "nee",

// The error messages
"error_cannot_see_config" => "Het is niet toegestaan om de BBClone configuratie
op deze server te zien.",

// Address Extensions
"numeric" => "Numeriek", "com" => "Commercieel",
"net" => "Netwerken", "edu" => "Educatie",
"biz" => "Zakelijk", "info" => "Informatie",
"name" => "Persoonlijk", "ps" => "Palestina",
"jp" => "Japan", "us" => "Verenigde Staten",
"uk" => "Groot Brittanië", "de" => "Duitsland",
"mil" => "VS Militair", "ca" => "Canada",
"it" => "Italië", "au" => "Australië",
"org" => "Organisaties", "nl" => "Nederland",
"fr" => "Frankrijk", "tw" => "Taiwan",
"gov" => "Regering", "fi" => "Finland",
"br" => "Brazilië", "se" => "Zweden",
"es" => "Spanje", "no" => "Noorwegen",
"mx" => "Mexico", "kr" => "Korea",
"ch" => "Zwitserland", "dk" => "Denemarken",
"be" => "België", "at" => "Oostenrijk",
"nz" => "Nieuw Zeeland", "ru" => "Russische Federatie",
"pl" => "Polen", "za" => "Zuid Afrika",
"unknown" => "Onbekend", "ar" => "Argentinië",
"il" => "Israël", "sg" => "Singapore",
"arpa" => "Fouten", "cz" => "Tsjechische Republiek",
"hu" => "Hongarije", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "Turkije",
"gr" => "Griekenland", "cn" => "China",
"ie" => "Ierland", "my" => "Maleisië",
"th" => "Thailand", "cl" => "Chili",
"co" => "Colombia", "is" => "IJsland",
"uy" => "Uruguay", "ee" => "Estland",
"in" => "India", "ua" => " Oekraïne",
"sk" => "Slowakije", "ro" => "Roemenië",
"ae" => "Verenigde Arabische Emiraten", "id" => "Indonesië",
"su" => "Sovjet Unie", "si" => "Slovenië",
"hr" => "Kroatië", "ph" => "Filippijnen",
"lv" => "Letland", "ve" => "Venezuela",
"bg" => "Bulgarije", "lt" => "Litanie",
"yu" => "Serbia and Montenegro", "lu" => "Luxemburg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "Internationale Organisatie",
"do" => "Dominicaanse Republiek", "cy" => "Cyprus",
"pk" => "Pakistan", "cc" => "Cocos Eilanden",
"tt" => "Trinidad en Tobago", "eg" => "Egypte",
"lb" => "Libanon", "kw" => "Koeweit",
"to" => "Tonga", "kz" => "Kazakstan",
"na" => "Namibië", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => " Saudi Arabië",
"zw" => "Zimbabwe", "kg" => " Kirgizië",
"cx" => "Christmas Eilanden", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Macedonië", "gl" => "Groenland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldavië", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Faroe Eilanden",
"ac" => "Ascension Eilanden", "pr" => "Puerto Rico",
"am" => "Armenië", "pf" => "Frans Polynesië",
"ge" => "Georgië", "bh" => "Bahrein",
"ni" => "Nicaragua", "by" => " Wit-rusland",
"sv" => "El Salvador", "ma" => "Marokko",
"ke" => "Kenia", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnië en Herzegovina", "om" => "Oman",
"jo" => "Jordanië", "ir" => "Iran",
"st" => "Sao Tome en Principe", "vi" => "Virgin Eilanden (VS)",
"ci" => "Ivoor Kust", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Kaaiman Eilanden",
"gp" => "Guadeloupe", "mg" => "Madagaskar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "Amerikaans Samoa", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Heard en Mc Donald Eilanden", "fm" => "Micronesië",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua Nieuw Guinea",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Malediven",
"nc" => "Nieuw Caledonie", "ag" => "Antigua en Barbuda",
"uz" => " Oezbekistan", "tj" => " Tadzjikistan",
"sb" => "Solomon Eilanden", "bf" => "Burkina Faso",
"kh" => "Cambodja", "tc" => "Turks en Caicos Eilanden",
"tf" => "Frans Zuidelijk Territorium", "az" => "Azerbeidjaan",
"dm" => "Dominica", "mz" => "Mozambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolië", "ug" => "Oeganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "Frans Guiana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albanië", "gh" => "Ghana",
"nf" => "Norfolk Eilanden", "io" => "Brits India Oceaan Territorium",
"gs" => "Zuid Georgie en de Zuid Sandwich Eilanden", "ye" => "Jemen",
"an" => "Nederlandse Antillen", "aq" => "Antarctica",
"tn" => "Tunesië", "ck" => "Cook Eilanden",
"ls" => "Lesotho", "et" => "Ethiopië",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Virgin Eilanden (UK)", "vn" => "Vietnam",
"mr" => "Mauritanië", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Algerije",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Engeland", "bs" => "Bahamas",
"va" => "Vaticaan Staat", "lc" => "Saint Lucia",
"cd" => "Kongo", "gm" => "Gambia",
"mp" => "Noordelijke Mariana Eilanden", "gw" => "Guinea-Bissau",
"cm" => "Kameroen", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libie",
"cf" => "Centraal Afrikaanse Republiek", "mm" => "Myanmar",
"td" => "Chad", "iq" => "Irak",
"kn" => "Saint Kitts en Nevis", "sc" => "Seychellen",
"cg" => "Kongo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Cape Verde", "mh" => "Marshall Eilanden",
"pm" => "St. Pierre en Miquelon", "so" => "Somalië",
"vc" => "St. Vincent en de Grenadines", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haïti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Eilanden",
"fk" => "Falkland Eilanden", "gq" => "Equatorial Guinea",
"sd" => "Soedan", "sj" => "Svalbard en Jan Mayen Eilanden",
"sr" => "Suriname", "sy" => "Syrië",
"tp" => "Oost Timor", "um" => "VS buitenste ondergeschikte Eilanden",
"wf" => "Wallis en Futuna Eilanden", "yt" => "Mayotte",
"zr" => "Zaïre",

// Miscellaneous translations
"misc_other" => "Anders",
"misc_unknown" => "Onbekende",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Hoofd Pagina",
"navbar_Configuration" => "Instellingen",
"navbar_Global_Stats" => "Globale Statistieken",
"navbar_Detailed_Stats" => "Gedetailleerde Statistieken",
"navbar_Time_Stats" => "Tijd Statistieken",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Datum en tijd",
"dstat_visits" => "Bezoeken",
"dstat_extension" => "Landen of Extensies",
"dstat_dns" => "Host namen",
"dstat_from" => "Kwam van",
"dstat_os" => "Besturingssystemen",
"dstat_browser" => "Browsers",
"dstat_visible_rows" => "Zichtbare bezoekers",
"dstat_green_rows" => "groen regels",
"dstat_blue_rows" => "blauwe regels",
"dstat_red_rows" => "rode regels",
"dstat_last_visit" => "laatste bezoekers",
"dstat_robots" => "robots",
"dstat_no_data" => "Geen data beschikbaar",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Adres",
"dstat_user_agent" => "Gebruikte browser",
"dstat_nr" => "Nr",
"dstat_pages" => " Pagina's",
"dstat_visit_length" => "Duur bezoek",
"dstat_reloads" => "Herladen",

// Global stats words
"gstat_Accesses" => "Bezoekers",
"gstat_Total_visits" => "Totaal bezoekers",
"gstat_Total_unique" => "Totaal unieke bezoekers",
"gstat_Operating_systems" => "Besturingssystemen: Top %d",
"gstat_Browsers" => "Browsers: Top %d",
"gstat_extensions" => "Landen of Extensies: Top %d",
"gstat_Robots" => "Robots: Top %d",
"gstat_pages" => "Bezochte Pagina's: Top %d",
"gstat_origins" => "Oorsprong: Top %d",
"gstat_hosts" => "Host namen: Top %d",
"gstat_keys" => "Sleutelwoorden: Top %d ",
"gstat_Total" => "Totaal",
"gstat_Not_specified" => "Niet gespecificeerd",

// Time stats words
"tstat_Su" => "Zon",
"tstat_Mo" => "Maan",
"tstat_Tu" => "Din",
"tstat_We" => "Woe",
"tstat_Th" => "Don",
"tstat_Fr" => "Vrij",
"tstat_Sa" => "Zat",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mrt",
"tstat_Apr" => "Apr",
"tstat_May" => "Mei",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Okt",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Afgelopen dag",
"tstat_last_week" => "Afgelopen week",
"tstat_last_month" => "Afgelopen maand",
"tstat_last_year" => "Afgelopen jaar",

// Configuration page words and sentences
"config_Variable_name" => "Variabele naam",
"config_Variable_value" => "Variabele waarde",
"config_Explanations" => "Uitleg",

"config_bbc_mainsite" =>
"Als deze variabele ingesteld is wordt er een koppeling naar de aangegeven
locatie gemaakt. De standaard waarde wijst naar de bovenliggende folder. Dus in
het geval dat de hoofd pagina zich niet direct in de bovenliggende folder bevind,
zal deze waarde ingesteld moeten worden met de actuele locatie van de hoofd
pagina.<br />
Voorbeeld:<br />
\$BBC_MAINSITE = &quot;http://www.mijn-server.nl/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"BBClone is standaard ingesteld om de instellingen van de statistieken weer te
kunnen geven. In het geval dit gedrag niet wenselijk is kan je de toegang tot
de instellingen ontzeggen door deze optie te activeren.<br />
Voorbeeld:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"De titel verschijnt in de titel balk van alle BBClone pagina's.<br />
Mogelijke macro's zijn:<br />
<ul>
<li>%SERVER: server naam,</li>
<li>%DATE: de huidig datum.</li>
</ul>
HTML opmaak is toegestaan.<br />
Voorbeeld:<br />
\$BBC_TITLEBAR = &quot;Statistiek voor %SERVER gegenereerd op %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;De statistieken van %DATE zien eruit als:&quot;;
<br />",

"config_bbc_language" =>
"BBClone's standaard taal indien deze niet wordt gespecificeerd door de browser.
De volgende talen worden ondersteund:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr en zh-cn</p>",

"config_bbc_maxtime" =>
"Deze variabele bepaalt de bezoek lengte van een unieke bezoeker in seconden.
Elk bezoek van dezelfde bezoeker binnen deze tijdsperiode zal gezien worden als
een enkele bezoeker, zolang de tussenliggende bezoeken niet langer zijn dan de
opgegeven limiet. Standaard waarde is 30 minuten (1800 seconden), maar
afhankelijk van wat wenselijk is kan de waarde worden aangepast.<br />
Voorbeeld:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Hoeveel regels moeten er worden afgebeeld in de gedetailleerde statistieken?
De standaardwaarde is 100. Geadviseerd wordt om geen hogere waarden dan 500 te
gebruiken om zo zware server belastingen te vermijden.",

"config_bbc_detailed_stat_fields" =>
"De variabele \$BBC_DETAILED_STAT_FIELDS bepaalt welke kolommen in de
gedetailleerde statistieken moeten worden afgebeeld. Mogelijke kolommen zijn:
<ul>
<li>id&nbsp;=&gt;&nbsp;De zoveelste bezoeker sinds het begin van tellen</li>
<li>time&nbsp;=&gt;&nbsp;Het tijdstip waarop het laatste bezoek geregistreerd is</li>
<li>visits&nbsp;=&gt;&nbsp;Aantal bezoeken van een unieke bezoeker</li>
<li>dns&nbsp;=&gt;&nbsp;Bezoekers host naam</li>
<li>ip&nbsp;=&gt;&nbsp;Bezoekers IP adres</li>
<li>os&nbsp;=&gt;&nbsp;het besturingssysteem (indien beschikbaar en anders naam robot)</li>
<li>browser&nbsp;=&gt;&nbsp;De software die gebruikt is om een connectie te maken
</li>
<li>ext&nbsp;=&gt;&nbsp;Bezoekers land of extensie</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
De kolommen zullen in dezelfde volgorde afgebeeld worden als opgegeven.<br />
Voorbeeld:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"In geval de server tijd niet gelijk is aan de locale tijdszone, kan via deze
variabele de tijd worden aangepast in minuten. Een negatieve waarde zal de tijd
terug zetten, een positieve waarde zal de tijd vooruit zetten.<br />
Voorbeeld:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Via deze optie kan men instellen of een host naam bij een IP adres moet worden
opgezocht. Hoewel een host naam meer verteld over de bezoeker, het opzoeken
ernaar kan vertraging veroorzaken bij het laden van de pagina als de gebruikte
DNS server(s) erg traag, onbetrouwbaar of gelimiteerd in capaciteit zijn. Het
activeren van deze variabele kan het eventuele vertragings probleem oplossen.<br />
Voorbeeld:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"BBClone laat standaard in de tijd statistieken alle bezoeken zien, want dit
geeft een vrij goede weergave van de server belasting. Echter als tijd
statistieken gebaseerd moeten worden op unieke bezoeken en er op een andere
mannier geteld moet worden, activeer dan deze variabele.<br />
Voorbeeld:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Deze optie kan worden gebruikt om bepaalte IP adressen of adres reeksen uit te
sluiten, zodat deze niet worden geteld. In geval van meerdere waardes, dien je
deze te scheiden met een komma.<br />
Voorbeeld:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"In geval dat bepaalte verwijzingen van de bezoekers lijst in de gedetailleerde
statistieken niet gewenst zijn, kunnen één of meerdere bepaalte woorden gebuikt
worden voor het blokkeren van de verwijzing als deze overeen komt. Bij gebruik
van meerdere woorden dienen deze te worden gescheiden door een komma.<br />
Voorbeeld:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"You can use this option to determine the treatment of robots. The default is
to ignore them in the top hosts ranking but leave them in the remaining
stats. If you don't want to see any robots at all you can set this option to
&quot;2&quot;, then only human visits will be taken into account.<br />
Voorbeeld:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Deze optie bepaalt hoe BBClone de ene bezoeker van de ander onderscheid.
Standaard wordt alleen het IP adres gebruikt, wat in de meeste gevallen een
realistisch beeld heeft. Echter als bezoekers zich schuil houden achter een
proxy server, zal het deactiveren van deze optie een beter realistisch beeld
geven gezien een nieuwe bezoeker pas verondersteld wordt door verandering van
tijd en gebruikte browser.<br />
Voorbeeld:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Wanneer het wenselijk is om de statistieken terug op nul te zetten, dient deze
optie te worden geactiveerd en zal uitgevoerd worden bij het eerst volgende
bezoek. Vergeet niet om achteraf deze optie te deactiveren, anders zal men
uitzonderlijk laag verkeer ondervinden ;).<br />
Voorbeeld:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Host namen en oorsprong in de globale statistieken kunnen grote hoeveelheid
data genereren, hoewel meestal veroorzaakt door eenmalige bezoeken.
Door het activeren van deze optie kun je de statistieken opschonen en de
grote van access.php aanzienlijk verkleinen zonder de actuele zichtbare
hostnamen en oorsprongen te beïnvloeden. De hoeveelheid eenmalige bezoeken
zullen worden toegevoegd aan de &quot;Niet gespecificeerd&quot; regel om zo
de totale score intact te houden.<br />
Voorbeeld:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>