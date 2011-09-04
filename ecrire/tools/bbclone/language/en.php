<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/en.php,v 1.35 2004/10/17 14:08:40 olliver Exp $
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

// Date format (used with date())
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensed under the",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "yes",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"You are not allowed to see the BBClone configuration on this server.",

// Address Extensions
"numeric" => "Numeric", "com" => "Commercial",
"net" => "Networks", "edu" => "Educational",
"biz" => "Business", "info" => "Information",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Japan", "us" => "United States",
"uk" => "United Kingdom", "de" => "Germany",
"mil" => "US Military", "ca" => "Canada",
"it" => "Italy", "au" => "Australia",
"org" => "Organizations", "nl" => "Netherlands",
"fr" => "France", "tw" => "Taiwan",
"gov" => "US Government", "fi" => "Finland",
"br" => "Brazil", "se" => "Sweden",
"es" => "Spain", "no" => "Norway",
"mx" => "Mexico", "kr" => "Korea",
"ch" => "Switzerland", "dk" => "Denmark",
"be" => "Belgium", "at" => "Austria",
"nz" => "New Zealand", "ru" => "Russia",
"pl" => "Poland", "za" => "South Africa",
"unknown" => "Unknown", "ar" => "Argentina",
"il" => "Israel", "sg" => "Singapore",
"arpa" => "Arpa", "cz" => "Czech Republic",
"hu" => "Hungary", "hk" => "Hong Kong",
"pt" => "Portugal", "tr" => "Turkey",
"gr" => "Greece", "cn" => "China",
"ie" => "Ireland", "my" => "Malaysia",
"th" => "Thailand", "cl" => "Chile",
"co" => "Colombia", "is" => "Iceland",
"uy" => "Uruguay", "ee" => "Estonia",
"in" => "India", "ua" => "Ukraine",
"sk" => "Slovakia", "ro" => "Romania",
"ae" => "United Arab Emirates", "id" => "Indonesia",
"su" => "Soviet Union", "si" => "Slovenia",
"hr" => "Croatia", "ph" => "Philippines",
"lv" => "Latvia", "ve" => "Venezuela",
"bg" => "Bulgaria", "lt" => "Lithuania",
"yu" => "Serbia and Montenegro", "lu" => "Luxembourg",
"nu" => "Niue", "pe" => "Peru",
"cr" => "Costa Rica", "int" => "International Organizations",
"do" => "Dominican Republic", "cy" => "Cyprus",
"pk" => "Pakistan", "cc" => "Cocos Islands",
"tt" => "Trinidad and Tobago", "eg" => "Egypt",
"lb" => "Lebanon", "kw" => "Kuwait",
"to" => "Tonga", "kz" => "Kazakhstan",
"na" => "Namibia", "mu" => "Mauritius",
"bm" => "Bermuda", "sa" => "Saudi Arabia",
"zw" => "Zimbabwe", "kg" => "Kyrgyzstan",
"cx" => "Christmas Island", "pa" => "Panama",
"gt" => "Guatemala", "bw" => "Botswana",
"mk" => "Macedonia", "gl" => "Greenland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Faroe Islands",
"ac" => "Ascension Island", "pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "French Polynesia",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Nicaragua", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Morocco",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnia and Herzegovina", "om" => "Oman",
"jo" => "Jordan", "ir" => "Iran",
"st" => "Sao Tome and Principe", "vi" => "Virgin Islands (US)",
"ci" => "Ivory Coast", "jm" => "Jamaica",
"li" => "Liechtenstein", "ky" => "Cayman Islands",
"gp" => "Guadeloupe", "mg" => "Madagascar",
"gi" => "Gibraltar", "sm" => "San Marino",
"as" => "American Samoa", "tz" => "Tanzania",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Monaco", "sn" => "Senegal",
"hm" => "Heard and Mc Donald Islands", "fm" => "Micronesia",
"fj" => "Fiji", "cu" => "Cuba",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua New Guinea",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldives",
"nc" => "New Caledonia", "ag" => "Antigua and Barbuda",
"uz" => "Uzbekistan", "tj" => "Tajikistan",
"sb" => "Solomon Islands", "bf" => "Burkina Faso",
"kh" => "Cambodia", "tc" => "Turks and Caicos Islands",
"tf" => "French Southern Territories", "az" => "Azerbaijan",
"dm" => "Dominica", "mz" => "Mozambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Uganda",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Niger", "gf" => "French Guiana",
"gu" => "Guam", "hn" => "Honduras",
"al" => "Albania", "gh" => "Ghana",
"nf" => "Norfolk Island", "io" => "UK Indian Ocean Territory",
"gs" => "South Georgia and the South Sandwich Islands", "ye" => "Yemen",
"an" => "Netherlands Antilles", "aq" => "Antarctica",
"tn" => "Tunisia", "ck" => "Cook Islands",
"ls" => "Lesotho", "et" => "Ethiopia",
"ng" => "Nigeria", "sl" => "Sierra Leone",
"bb" => "Barbados", "je" => "Jersey",
"vg" => "Virgin Islands (UK)", "vn" => "Vietnam",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Algeria",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "Qatar", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Gabon",
"gb" => "United Kingdom", "bs" => "Bahamas",
"va" => "Vatican State", "lc" => "Saint Lucia",
"cd" => "Congo", "gm" => "Gambia",
"mp" => "Northern Mariana Islands", "gw" => "Guinea-Bissau",
"cm" => "Cameroon", "ao" => "Angola",
"er" => "Eritrea", "ly" => "Libya",
"cf" => "Central African Republic", "mm" => "Myanmar",
"td" => "Chad", "iq" => "Iraq",
"kn" => "Saint Kitts and Nevis", "sc" => "Seychelles",
"cg" => "Congo", "gd" => "Grenada",
"nr" => "Nauru", "af" => "Afghanistan",
"cv" => "Cape Verde", "mh" => "Marshall Islands",
"pm" => "St. Pierre and Miquelon", "so" => "Somalia",
"vc" => "St. Vincent and the Grenadines", "bd" => "Bangladesh",
"gn" => "Guinea", "ht" => "Haiti",
"la" => "Laos", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "Falkland Islands", "gq" => "Equatorial Guinea",
"sd" => "Sudan", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "Suriname", "sy" => "Syria",
"tp" => "East Timor", "um" => "US Minor Outlying Islands",
"wf" => "Wallis and Futuna Islands", "yt" => "Mayotte",
"zr" => "Zaire",

// Miscellaneous translations
"misc_other" => "Other",
"misc_unknown" => "Unknown",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Main Site",
"navbar_Configuration" => "Configuration",
"navbar_Global_Stats" => "Global Stats",
"navbar_Detailed_Stats" => "Detailed Stats",
"navbar_Time_Stats" => "Time Stats",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Time",
"dstat_visits" => "Visits",
"dstat_extension" => "Extension",
"dstat_dns" => "Hostname",
"dstat_from" => "From",
"dstat_os" => "OS",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Visible accesses",
"dstat_green_rows" => "green rows",
"dstat_blue_rows" => "blue rows",
"dstat_red_rows" => "red rows",
"dstat_last_visit" => "last visit",
"dstat_robots" => "Robots",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Accesses",
"gstat_Total_visits" => "Total Visits",
"gstat_Total_unique" => "Total Unique",
"gstat_Operating_systems" => "Top %d Operating Systems",
"gstat_Browsers" => "Top %d Browsers",
"gstat_extensions" => "Top %d Extensions",
"gstat_Robots" => "Top %d Robots",
"gstat_pages" => "Top %d Visited Pages",
"gstat_origins" => "Top %d Origins",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Total",
"gstat_Not_specified" => "Not specified",

// Time stats words
"tstat_Su" => "Sun",
"tstat_Mo" => "Mon",
"tstat_Tu" => "Tue",
"tstat_We" => "Wed",
"tstat_Th" => "Thu",
"tstat_Fr" => "Fri",
"tstat_Sa" => "Sat",

"tstat_Jan" => "Jan",
"tstat_Feb" => "Feb",
"tstat_Mar" => "Mar",
"tstat_Apr" => "Apr",
"tstat_May" => "May",
"tstat_Jun" => "Jun",
"tstat_Jul" => "Jul",
"tstat_Aug" => "Aug",
"tstat_Sep" => "Sep",
"tstat_Oct" => "Oct",
"tstat_Nov" => "Nov",
"tstat_Dec" => "Dec",

"tstat_last_day" => "Past day",
"tstat_last_week" => "Past week",
"tstat_last_month" => "Past month",
"tstat_last_year" => "Past year",

// Configuration page words and sentences
"config_Variable_name" => "Variable's name",
"config_Variable_value" => "Variable's value",
"config_Explanations" => "Explanation",

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
<li>os&nbsp;=&gt;&nbsp;The operating system (if available and/or no robot)</li>
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