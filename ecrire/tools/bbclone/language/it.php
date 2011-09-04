<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/it.php,v 1.35 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Andreas Liebschner, fizban(at)slack-tux.org, Daniele.Raffo(at)inria.fr
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "iso-8859-15",

// Date format (used with date() )
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "Il team di BBClone - Distribuito sotto licenza ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "si",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"Non sei autorizzato a vedere la configurazione di BBClone su questo server.",

// Address Extensions
"numeric" => "Numerico", "com" => "Commerciale",
"net" => "Reti", "edu" => "Istituzioni educative",
"biz" => "Affari", "info" => "Informativo",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Giappone", "us" => "Stati Uniti",
"uk" => "Regno Unito", "de" => "Germania",
"mil" => "Esercito USA", "ca" => "Canada",
"it" => "Italia", "au" => "Australia",
"org" => "Organizzazioni", "nl" => "Olanda",
"fr" => "Francia", "tw" => "Taiwan",
"gov" => "Governo", "fi" => "Finlandia",
"br" => "Brasile", "se" => "Svezia",
"es" => "Spagna", "no" => "Norvegia",
"mx" => "Messico", "kr" => "Corea",
"ch" => "Svizzera", "dk" => "Danimarca",
"be" => "Belgio", "at" => "Austria",
"nz" => "Nuova Zelanda", "ru" => "Russia",
"pl" => "Polonia", "za" => "Sud Africa",
"unknown" => "Sconosciuto", "ar" => "Argentina",
"il" => "Israele", "sg" => "Singapore",
"arpa" => "Errori", "cz" => "Repubblica Ceca",
"hu" => "Ungheria", "hk" => "Hong Kong",
"pt" => "Portogallo", "tr" => "Turchia",
"gr" => "Grecia", "cn" => "Cina",
"ie" => "Irlanda", "my" => "Malesia",
"th" => "Thailandia", "cl" => "Cile",
"co" => "Colombia", "is" => "Islanda",
"uy" => "Uruguay", "ee" => "Estonia",
"in" => "India", "ua" => "Ucraina",
"sk" => "Slovacchia", "ro" => "Romania",
"ae" => "Emirati Arabi Uniti", "id" => "Indonesia",
"su" => "Unione Sovietica", "si" => "Slovenia",
"hr" => "Croazia", "ph" => "Filippine",
"lv" => "Lettonia", "ve" => "Venezuela",
"bg" => "Bulgaria", "lt" => "Lituania",
"yu" => "Serbia and Montenegro", "lu" => "Lussemburgo",
"nu" => "Niue", "pe" => "Perù",
"cr" => "Costa Rica", "int" => "Organizzazioni internazionali",
"do" => "Repubblica Dominicana", "cy" => "Cipro",
"pk" => "Pakistan", "cc" => "Isole Coco",
"tt" => "Trinidad e Tobago", "eg" => "Egitto",
"lb" => "Libano", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakistan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Arabia Saudita",
"zw" => "Zimbabwe", "kg" => "Kirghistan",
"cx" => "Isola di Natale", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Macedonia", "gl" => "Groenlandia",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldavia", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Isole Faroe",
"ac" => "Ascension", "pr" => "Porto Rico",
"am" => "Armenia", "pf" => "Polinesia Francese",
"ge" => "Georgia", "bh" => "Bahrein",
"ni" => "Nicaragua", "by" => "Bielorussia",
"sv" => "El Salvador", "ma" => "Marocco",
"ke" => "Kenia", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Butan", "sz" => "Swaziland",
"ba" => "Bosnia Erzegovina", "om" => "Oman",
"jo" => "Giordania", "ir" => "Iran",
"st" => "Sao Tomé e Principe", "vi" => "Isole Vergini Americane",
"ci" => "Costa d'Avorio", "jm" => "Giamaica",
"li" => "Liechtenstein", "ky" => "Isole Cayman",
"gp" => "Guadalupa", "mg" => "Madagascar",
"gi" => "Gibilterra", "sm" => "San Marino",
"as" => "Samoa Americana", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Isole Heard e Mc Donald", "fm" => "Micronesia",
"fj" => "Figi", "cu" => "Cuba",
"rw" => "Ruanda", "mq" => "Martinica",
"ai" => "Anguilla", "pg" => "Papua Nuova Guinea",
"bz" => "Belize", "sh" => "Sant'Elena",
"aw" => "Aruba", "mv" => "Maldive",
"nc" => "Nuova Caledonia", "ag" => "Antigua e Barbuda",
"uz" => "Uzbekistan", "tj" => "Tagikistan",
"sb" => "Isole Salomone", "bf" => "Burkina Faso",
"kh" => "Cambogia", "tc" => "Isole Turks e Caicos",
"tf" => "Territori Francesi del Sud-Est", "az" => "Azerbaigian",
"dm" => "Dominica", "mz" => "Mozambico",
"mo" => "Macao", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Nigeria", "gf" => "Guyana Francese",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albania", "gh" => "Ghana",
"nf" => "Isole Norfolk", "io" => "Territori Britannici nell'Oceano Indiano",
"gs" => "Isole Sandwich Meridionali e Georgia Meridionale", "ye" => "Yemen",
"an" => "Antille Olandesi", "aq" => "Antartide",
"tn" => "Tunisia", "ck" => "Isole Cook",
"ls" => "Lesotho", "et" => "Etiopia",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Isole Vergini Britanniche", "vn" => "Vietnam",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Gibuti",
"km" => "Comore", "dz" => "Algeria",
"im" => "Isola di Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "Gran Bretagna", "bs" => "Bahamas",
"va" => "Città del Vaticano", "lc" => "Santa Lucia",
"cd" => "Congo", "gm" => "Gambia",
"mp" => "Isole Marianne Settentrionali", "gw" => "Guinea Bissau",
"cm" => "Camerun", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libia",
"cf" => "Repubblica Centrafricana", "mm" => "Myanmar",
"td" => "Ciad", "iq" => "Iraq",
"kn" => "Saint Kitts e Nevis", "sc" => "Seychelles",
"cg" => "Congo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Capo Verde", "mh" => "Isole Marshall",
"pm" => "St. Pierre e Miquelon", "so" => "Somalia",
"vc" => "St. Vincent e Grenadines", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Isola Bouvet",
"fk" => "Isole Falkland", "gq" => "Guinea Equatoriale",
"sd" => "Sudan", "sj" => "Isole Svalbard e Jan Mayen",
"sr" => "Suriname", "sy" => "Siria",
"tp" => "Timor Est", "um" => "Isole Minori degli Stati Uniti",
"wf" => "Isole Wallis e Futuna", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneoux translations
"misc_other" => "Altro",
"misc_unknown" => "Sconosciuto",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Sito principale",
"navbar_Configuration" => "Configurazione",
"navbar_Global_Stats" => "Statistiche globali",
"navbar_Detailed_Stats" => "Statistiche dettagliate",
"navbar_Time_Stats" => "Statistiche temporali",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Data e ora",
"dstat_visits" => "Visite",
"dstat_extension" => "Estensione",
"dstat_dns" => "Nome host",
"dstat_from" => "Da",
"dstat_os" => "Sistema operativo",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Accessi visibili",
"dstat_green_rows" => "righe verdi",
"dstat_blue_rows" => "righe blu",
"dstat_red_rows" => "righe rosse",
"dstat_last_visit" => "ultima visita",
"dstat_robots" => "robot",
"dstat_no_data" => "Nessun dato disponibile",
"dstat_prx" => "Proxy server",
"dstat_ip" => "Indirizzo IP",
"dstat_user_agent" => "User agent",
"dstat_nr" => "N",
"dstat_pages" => "Pagine",
"dstat_visit_length" => "Lunghezza visita",
"dstat_reloads" => "Reload",

// Global stats words

"gstat_Accesses" => "Accessi",
"gstat_Total_visits" => "Visite totali",
"gstat_Total_unique" => "Totali unici",
"gstat_Operating_systems" => "%d primi sistemi operativi",
"gstat_Browsers" => "%d primi browser",
"gstat_extensions" => "%d prime estensioni",
"gstat_Robots" => "%d primi robot",
"gstat_pages" => "%d prime pagine",
"gstat_origins" => "%d primi referenti",
"gstat_hosts" => "%d primi host",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Totale",
"gstat_Not_specified" => "Non specificato",

// Time stats words
"tstat_Su" => "Dom",
"tstat_Mo" => "Lun",
"tstat_Tu" => "Mar",
"tstat_We" => "Mer",
"tstat_Th" => "Gio",
"tstat_Fr" => "Ven",
"tstat_Sa" => "Sab",

"tstat_Jan" => "Gen",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "Mag",
"tstat_Jun" => "Giu",
"tstat_Jul" => "Lug",
"tstat_Aug" => "Ago",
"tstat_Sep" => "Set",
"tstat_Oct" => "Ott",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dic",

"tstat_last_day" => "Ultimo giorno",
"tstat_last_week" => "Ultima settimana",
"tstat_last_month" => "Ultimo mese",
"tstat_last_year" => "Ultimo anno",

// Configuration page words and sentences

"config_Variable_name" => "Nome della variabile",
"config_Variable_value" => "Valore della variabile",
"config_Explanations" => "Spiegazioni",

"config_bbc_mainsite" =>
"Se questa variabile è impostata, verrà generato un link alla locazione specificata.
Il valore di default punta verso la directory genitore; nel caso il tuo sito principale si trovi da
un'altra parte, imposta questa variabile come necessario.<br />
Esempi:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Di default, la configurazione di BBClone è visibile. Per nasconderla, disattiva questa opzione.<br />
Esempi:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Il titolo che appare nella barra del titolo di tutte le pagine di BBClone.<br />
Le macro disponibili sono:<br />
<ul>
<li>%SERVER : il nome del server,
<li>%DATE : la data corrente.
</ul>
Sono consentite le tag HTML.<br />
Esempi:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Statistiche del server %SERVER generate in data %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Ecco qua i miei risultati del %DATE:&quot;;
<br />",

"config_bbc_language" =>
"La lingua di default di BBClone, nel caso non sia stata specificata dal browser.
Sono disponibili le lingue seguenti:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr e zh-cn</p>",

"config_bbc_maxtime" =>
"Questa variabile definisce la lunghezza di una unica visita, in secondi.
Tutti gli hit provenienti da uno stesso visitatore entro questo periodo sono considerati come
una unica visita, finchè due hit successivi non superano questo limite. Il valore di default
è 30 minuti (1800 secondi), che è lo standard Web de facto; tuttavia, se lo desideri,
puoi impostare un valore diverso.<br />
Esempi:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Quante entrate vuoi vedere nelle statistiche dettagliate? Il valore di default è 100.
Non impostare a un valore maggiore di 500 per evitare sovraccarichi.",

"config_bbc_detailed_stat_fields" =>
"La variabile \$BBC_DETAILED_STAT_FIELDS determina quali colonne saranno mostrate nelle statistiche
dettagliate. Le colonne disponibili sono:
<ul>
<li>id&nbsp;=&gt;&nbsp;Visitatore numero x dall'inizio del conteggio</li>
<li>time&nbsp;=&gt;&nbsp;Tempo di registrazione dell'ultimo hit</li>
<li>visits&nbsp;=&gt;&nbsp;Gli hit di un unico visitatore</li>
<li>dns&nbsp;=&gt;&nbsp;Nome host del visitatore</li>
<li>ip&nbsp;=&gt;&nbsp;Indirizzo IP del visitatore</li>
<li>os&nbsp;=&gt;&nbsp;Sistema operativo (se disponibile e/o non è un robot)</li>
<li>browser&nbsp;=&gt;&nbsp;Il software usato per la connessione
</li>
<li>ext&nbsp;=&gt;&nbsp;Nazione o estensione del visitatore</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
Le colonne saranno mostrate nello stesso ordine in cui sono state specificate.<br />
Esempi:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Nel caso che il tempo del server non corrisponda al tuo fuso orario locale, puoi correggere
la differenza impostando questa variabile (in minuti). Valori negativi riportano indietro
l'orario, valori positivi lo avanzano.<br />
Esempi:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Questa opzione stabilisce se gli indirizzi IP debbano essere o no tradotti in nomi host.
I nomi host sono molto più significativi degli indirizzi IP; tuttavia la traduzione potrebbe
rallentare parecchio il tuo sito, se i server DNS utilizzati sono lenti, limitati o inaffidabili.
Se hai questo problema, imposta questa opzione.<br />
Esempi:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Di default vengono mostrati gli hit nelle statistiche temporali, perché ciò rappresenta meglio il
carico attuale del server. Se invece desideri che le statistiche temporali siano basate sulle visite uniche, puoi
cambiare il sistema di conteggio impostando questa variabile.<br />
Esempi:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Puoi impostare questa opzione per escludere un determinato indirizzo IP (o una determinata gamma di indirizzi IP)
dal conteggio. Le espressioni, se più d'una, devono essere separate da una virgola.<br />
Esempi:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Se vuoi escludere determinati referenti dai visitatori elencati nella lista di primi referenti o
nelle statistiche dettagliate, imposta qui le parole chiave, separate da una virgola.
I referenti che contengono una di queste parole chiave verranno bloccati.<br />
Esempi:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"Questa opzione determina come vengono considerati i robot. Di default essi vengono inclusi in tutte le statistiche, eccetto la lista di primi host. Se vuoi ignorare completamente i robot imposta questa opzione a &quot;2&quot;, in questo caso verranno conteggiati solo i visitatori umani.<br />
Esempi:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Questa opzione definisce il modo in cui BBClone distingue i visitatori. Di default
viene utilizzato solo l'indirizzo IP, il che di solito è sufficiente.
Tuttavia, se spesso i tuoi visitatori sono nascosti dietro dei server proxy, disattiva questa
opzione per ottenere un quadro più realistico della situazione; così, infatti, un nuovo visitatore verrà
individuato da un cambiamento dell'user agent.<br />
Esempi:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Per azzerare le statistiche, imposta questa variabile (le statistiche saranno cancellate
alla visita immediatamente successiva). Non dimenticare di disattivarla subito dopo, o noterai
uno strano crollo del numero di visitatori!<br />
Esempi:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Le statistiche di host e referenti possono generare una enorme mole di dati, spesso relativi a dei visitatori che
hanno visitato il tuo sito una volta sola. Puoi impostare questa opzione per spurgare le statistiche da tali entrate.
Ciò ridurrà la dimensione del file access.php senza modificare la lista attuale di primi host e referenti;
gli hit andranno ad aggiungersi ai &quot;Non specificato&quot; per lasciare intatto il punteggio globale.<br />
Examples:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>