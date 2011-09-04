<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/el.php,v 1.15 2004/10/17 14:08:39 olliver Exp $
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
"global_charset" => "iso-8859-7",

// Date format (used with date())
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensed under the",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "yes",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"��� ���������� �� ����� ��� ��������� ��� BBClone �� ����� �� server.",

// Address Extensions
"numeric" => "�������", "com" => "��������",
"net" => "������", "edu" => "������������",
"biz" => "�������������", "info" => "������������",
"name" => "����������", "ps" => "�������������",
"jp" => "�������", "us" => "�.�.�.",
"uk" => "�.��������", "de" => "��������",
"mil" => "������� ���", "ca" => "�������",
"it" => "������", "au" => "���������",
"org" => "����������", "nl" => "��������",
"fr" => "������", "tw" => "������",
"gov" => "��������� ���", "fi" => "��������",
"br" => "��������", "se" => "�������",
"es" => "�������", "no" => "��������",
"mx" => "������", "kr" => "�����",
"ch" => "�������", "dk" => "�����",
"be" => "������", "at" => "�������",
"nz" => "��� ��������", "ru" => "�����",
"pl" => "�������", "za" => "����� ������",
"unknown" => "A������", "ar" => "���������",
"il" => "������", "sg" => "�����������",
"arpa" => "Arpa", "cz" => "������",
"hu" => "��������", "hk" => "����� �����",
"pt" => "����������", "tr" => "�������",
"gr" => "������", "cn" => "����",
"ie" => "��������", "my" => "��������",
"th" => "��������", "cl" => "����",
"co" => "��������", "is" => "��������",
"uy" => "����������", "ee" => "�������",
"in" => "�����", "ua" => "��������",
"sk" => "��������", "ro" => "��������",
"ae" => "������� ������� �������", "id" => "���������",
"su" => "��������� �����", "si" => "��������",
"hr" => "�������", "ph" => "����������",
"lv" => "�������", "ve" => "����������",
"bg" => "���������", "lt" => "���������",
"yu" => "Serbia and Montenegro", "lu" => "������������",
"nu" => "Niue", "pe" => "�����",
"cr" => "����� ����", "int" => "�������� ����������",
"do" => "���������� ����������", "cy" => "������",
"pk" => "��������", "cc" => "����� Coco",
"tt" => "�������� ��� ��������", "eg" => "��������",
"lb" => "�������", "kw" => "�������",
"to" => "������", "kz" => "���������",
"na" => "��������", "mu" => "���������",
"bm" => "���������", "sa" => "�������� ������",
"zw" => "����������", "kg" => "Kyrgyzstan",
"cx" => "Christmas Island", "pa" => "�������",
"gt" => "����������", "bw" => "����������",
"mk" => "��������� (�.�.�.�.)", "gl" => "Greenland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Faroe Islands",
"ac" => "Ascension Island", "pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "French Polynesia",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "����������", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Morocco",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnia and Herzegovina", "om" => "Oman",
"jo" => "Jordan", "ir" => "Iran",
"st" => "Sao Tome and Principe", "vi" => "Virgin Islands (US)",
"ci" => "Ivory Coast", "jm" => "��������",
"li" => "Liechtenstein", "ky" => "Cayman Islands",
"gp" => "Guadeloupe", "mg" => "Madagascar",
"gi" => "���������", "sm" => "San Marino",
"as" => "American Samoa", "tz" => "��������",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "������", "sn" => "Senegal",
"hm" => "Heard and Mc Donald Islands", "fm" => "Micronesia",
"fj" => "�����", "cu" => "�����",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua New Guinea",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldives",
"nc" => "New Caledonia", "ag" => "Antigua and Barbuda",
"uz" => "������������", "tj" => "Tajikistan",
"sb" => "Solomon Islands", "bf" => "��������� ����",
"kh" => "Cambodia", "tc" => "Turks and Caicos Islands",
"tf" => "French Southern Territories", "az" => "Azerbaijan",
"dm" => "Dominica", "mz" => "Mozambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "��������",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "�������", "gf" => "French Guiana",
"gu" => "Guam", "hn" => "��������",
"al" => "�������", "gh" => "�����",
"nf" => "Norfolk Island", "io" => "UK Indian Ocean Territory",
"gs" => "South Georgia and the South Sandwich Islands", "ye" => "������",
"an" => "Netherlands Antilles", "aq" => "����������",
"tn" => "Tunisia", "ck" => "����� Cook",
"ls" => "Lesotho", "et" => "Ethiopia",
"ng" => "�������", "sl" => "������ �����",
"bb" => "�����������", "je" => "Jersey",
"vg" => "Virgin Islands (UK)", "vn" => "�������",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "�������",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "�����", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "�������",
"gb" => "United Kingdom", "bs" => "Bahamas",
"va" => "Vatican State", "lc" => "Saint Lucia",
"cd" => "������", "gm" => "�������",
"mp" => "Northern Mariana Islands", "gw" => "Guinea-Bissau",
"cm" => "��������", "ao" => "�������",
"er" => "Eritrea", "ly" => "Libya",
"cf" => "Central African Republic", "mm" => "Myanmar",
"td" => "Chad", "iq" => "����",
"kn" => "Saint Kitts and Nevis", "sc" => "Seychelles",
"cg" => "������", "gd" => "�������",
"nr" => "Nauru", "af" => "����������",
"cv" => "Cape Verde", "mh" => "Marshall Islands",
"pm" => "St. Pierre and Miquelon", "so" => "�������",
"vc" => "St. Vincent and the Grenadines", "bd" => "Bangladesh",
"gn" => "�������", "ht" => "����",
"la" => "����", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "����� Falkland", "gq" => "Equatorial Guinea",
"sd" => "������", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "��������", "sy" => "�����",
"tp" => "��������� �����", "um" => "US Minor Outlying Islands",
"wf" => "Wallis and Futuna Islands", "yt" => "Mayotte",
"zr" => "����",

// Miscellaneous translations
"misc_other" => "����",
"misc_unknown" => "�������",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "�������� ������",
"navbar_Configuration" => "���������",
"navbar_Global_Stats" => "�������� ����������",
"navbar_Detailed_Stats" => "��������� ����������",
"navbar_Time_Stats" => "������� ����������",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "������",
"dstat_visits" => "����������",
"dstat_extension" => "��������",
"dstat_dns" => "Hostname",
"dstat_from" => "���",
"dstat_os" => "����������� �������",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "���������� ��� ������������",
"dstat_green_rows" => "�������� �������",
"dstat_blue_rows" => "���� �������",
"dstat_red_rows" => "�������� �������",
"dstat_last_visit" => "��������� ��������",
"dstat_robots" => "Robots",
"dstat_no_data" => "��� �������� ��������",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP ���������",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "�������",
"dstat_visit_length" => "�������� ���������",
"dstat_reloads" => "����������",

// Global stats words
"gstat_Accesses" => "����������",
"gstat_Total_visits" => "��������� ����������",
"gstat_Total_unique" => "��������� ���������",
"gstat_Operating_systems" => "����� %d ����������� ���������",
"gstat_Browsers" => "������ %d Browsers",
"gstat_extensions" => "������ %d ����������",
"gstat_Robots" => "����� %d Robots",
"gstat_pages" => "������ %d �������",
"gstat_origins" => "������ %d �����������",
"gstat_hosts" => "������ %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "��������",
"gstat_Not_specified" => "��� ��������������",

// Time stats words
"tstat_Su" => "���",
"tstat_Mo" => "���",
"tstat_Tu" => "���",
"tstat_We" => "���",
"tstat_Th" => "���",
"tstat_Fr" => "���",
"tstat_Sa" => "���",

"tstat_Jan" => "���",
"tstat_Feb" => "���",
"tstat_Mar" => "���",
"tstat_Apr" => "���",
"tstat_May" => "���",
"tstat_Jun" => "����",
"tstat_Jul" => "����",
"tstat_Aug" => "���",
"tstat_Sep" => "���",
"tstat_Oct" => "���",
"tstat_Nov" => "���",
"tstat_Dec" => "���",

"tstat_last_day" => "��������� ����",
"tstat_last_week" => "��������� ��������",
"tstat_last_month" => "���������� �����",
"tstat_last_year" => "���������� ������",

// Configuration page words and sentences
"config_Variable_name" => "����� ����������",
"config_Variable_value" => "����� ����������",
"config_Explanations" => "�������",

"config_bbc_mainsite" =>
"�� ���� � ��������� ���� �����, ��� link ��� ������������ ��������� �� ��������. � default ���� '�������' ��� parent directory. ���� ��������� ��� �� �������� site ��������� �����, ������ ���������� �� �������� ��� ���� ��� ���� �� ��������� ���� ������� ���.<br />
������������:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"�� BBClone ����� ��� default ��� �������� ��� ��������� ��� �����������. �� ��� ���������� ����� �� ����������� �������� �� ��������� ��� �������� ���������������� ��� �������.<br />
������������:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"� ������ ��� ������� ��� �������.<br />
�� �������� ��� ����� ��������� ���� ��� ������� ��� BBClopne<br />
�� �������� macros ��������������:<br />
<ul>
<li>%SERVER: ����� server,</li>
<li>%DATE: �������� ����������.</li>
</ul>
�� HTML Tags ������������.<br />
������������:<br />
\$BBC_TITLEBAR = &quot;���������� ��� �� %SERVER ���� %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;�� ���������� ��� ��� ��� %DATE ����� ����� ����:&quot;;
<br />",

"config_bbc_language" =>
"� default ������ ��� BBClone, �� ��������� ��� ��� ���������� ��� �� browser.
�� �������� ������� ��������������:
<p>bg, ca, cs, da, de, el, en, es, el, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"���� � ��������� ������������ �� �������� ���� ��������� ��������� �� ������������. ���� �������� ��� ��� ���� ��������� ���� �� ����� ��� ������� �� ��������� ��� ��������, ��� ��� ����������� ���������� ��� �� ��������� �� ����������� ����. Default ����� �� de facto
web standard ��� 30 ������ (1800 ������������), ���� ��������� ��� ��� ������� ��� �������� �� ������ ����������� ����.<br />
������������:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"����� ������������ ������ �� ���������� ��� ��������� ����������; � default ���� ����� 100. ����������� �� ��� �� ������ ����������� ��� 500 ��� �� ���������� �� ���� ���� �������.",

"config_bbc_detailed_stat_fields" =>
"� ��������� \$BBC_DETAILED_STAT_FIELDS ��������� ��� ������ ��� �� ���������� ��� ��������� ����������. ������� ������ �����:
<ul>
<li>id&nbsp;=&gt;&nbsp;� x-�� ���������� ��� ��� ��� ��� ���������� �� �������</li>
<li>time&nbsp;=&gt;&nbsp;� ������ ���� ��� ����� ����������� � ��������� ��������</li>
<li>visits&nbsp;=&gt;&nbsp;�� ��������� ���� ��������� ���������</li>
<li>dns&nbsp;=&gt;&nbsp;�� hostname ��� ���������</li>
<li>ip&nbsp;=&gt;&nbsp;� IP ��������� ��� ���������</li>
<li>os&nbsp;=&gt;&nbsp;�� ����������� ������� (�� ����� ��������� ��� ��� robot)</li>
<li>browser&nbsp;=&gt;&nbsp;�� ��������� ��� ��������������� ��� �� �������
</li>
<li>ext&nbsp;=&gt;&nbsp;� ���� � � �������� ��� ���������</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
� ����� ������ ��� ����� ��������� ��� ������ �� �������������� ��� ��� ��� �������.<br />
������������:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"���� ��������� ��� � ��� ��� server ��� ��������� �� ��� ������ ���, �������� �� ��������� �� ����� �� ����� ��������������� ����� �� ��������. ��������� ����� �� �������� ���� �� �����, ������� �� ��� ���� �������.<br />
������������:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"���� � ������� ���������, �� �� ����������� IP �� ��������� �� hostnames � ���. ��� �� hostnames ���� ����������� ��� ��� ���������, � ������� ���� ������ �� ������������ ��������� �� site , �� �� DNS servers ��� ���������������� ����� �����, ������������� ������������� � ���������� ������������. � ������� ����� ��� ���������� ������ �� ����� �� ��������.<br />
������������:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"�� default ��� BBClone ����� �� ������� �� hits ��� ������� ����������, ����� ����� ��� ������� �������� ��� �� ����� �������� ��� server. ��, ���'��� ���� ��������� �� �������������� ��������� ���������� ��� ���� ��� �� ������� ����������, �������� �� �������� ��� ����� �������� �������� ����� �� ���������.<br />
������������:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"���� � ������� ������ �� �������������� ��� ��� ���������� ������������� ����������� IP � ����� ����� ��� ��� �����������. ���� ��������� ��� ���������� ���� ��� ���, ������� ��� �� �����. <br />
������������:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"�� ��������� ��� ��� ������ �� ����� ������������� '����������� �������' ��� ���� ���������� ��� �� ��������� ��� ��������� ����������, �������� �� ������������� ��� � ������������ ������-������� ��� ���������������� ��� �� ������������ � ���������� '����������� ������. �� ��������������� �������� ��� ��� ������-�������, ������� ��� �� �����.<br />
Examples:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"You can use this option to determine the treatment of robots. The default is
to ignore them in the top hosts ranking but leave them in the remaining
stats. If you don't want to see any robots at all you can set this option to
&quot;2&quot;, then only human visits will be taken into account.<br />
������������:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"���� � ������� ��������� ��� �� BBClone ��������� ��� ��� ��������� ��� ��� ����. Default ����� � ������������� ���� ��� ���������� IP, ��� ��������� ��������� ������� ���� ������������ �����������. �� ���' ��� ����, �� ���������� ����� ����� ��������� ���� ��� proxy servers, � �������������� ����� ��� �������� �� ��������� ��� ���������� �������, ������ ���� ���� ���������� �� ��������� ���� ���� ��� ������� � user agent.<br />
������������:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"����� ������ �� ������������� �� ���������� ������� �� �������������� ���� �� �������� ��� �� ���������� �� ��� ������� ��������. ��� �������� �� ��� ���������������� ����, ������ �� ������������ ���������� ������ ������ ��� site ;).<br />
������������:<br />
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