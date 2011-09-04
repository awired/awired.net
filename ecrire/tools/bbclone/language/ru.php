<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/ru.php,v 1.25 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Alexey Rozenvaser alexroz@mailru.com,
 * Vladislav V. Korotkov cepesh@cepesh.ru, http://www.scientific-library.net
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "windows-1251",

// Date format (used with date() )
"global_date_format" => "d/m/Y",

// Global translation
"global_bbclone_copyright" => "������� BBClone - �������� ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "��",
"global_no" => "���",

// The error messages
"error_cannot_see_config" =>
"�������� �������� BBClone ����������.",

// Address Extensions
"numeric" => "�������� IP", "com" => "������������",
"net" => "Networks", "edu" => "���������������",
"biz" => "������������ �����������", "info" => "��������������",
"name" => "������������", "ps" => "���������",
"jp" => "������", "us" => "���",
"uk" => "������", "de" => "��������",
"mil" => "����� ���", "ca" => "������",
"it" => "������", "au" => "���������",
"org" => "�������������� �����������", "nl" => "����������",
"fr" => "�������", "tw" => "�������",
"gov" => "�����������������", "fi" => "���������",
"br" => "Brazil", "se" => "������",
"es" => "�������", "no" => "��������",
"mx" => "�������", "kr" => "�����",
"ch" => "���������", "dk" => "�����",
"be" => "�������", "at" => "�������",
"nz" => "����� ��������", "ru" => "��",
"pl" => "������", "za" => "���",
"unknown" => "�����������", "ar" => "���������",
"il" => "�������", "sg" => "��������",
"arpa" => "������", "cz" => "������� ����������",
"hu" => "�������", "hk" => "�������",
"pt" => "����������", "tr" => "������",
"gr" => "������", "cn" => "�����",
"ie" => "��������", "my" => "��������",
"th" => "�������", "cl" => "����",
"co" => "��������", "is" => "��������",
"uy" => "�������", "ee" => "�������",
"in" => "�����", "ua" => "�������",
"sk" => "��������", "ro" => "�������",
"ae" => "������������ �������� �������", "id" => "���������",
"su" => "������ ����", "si" => "��������",
"hr" => "��������", "ph" => "���������",
"lv" => "������", "ve" => "���������",
"bg" => "��������", "lt" => "�����",
"yu" => "Serbia and Montenegro", "lu" => "����������",
"nu" => "Niue", "pe" => "����",
"cr" => "����� ����", "int" => "������������� �����������",
"do" => "������������� ����������", "cy" => "����",
"pk" => "��������", "cc" => "��������� �������",
"tt" => "�������� � ������", "eg" => "������",
"lb" => "�����", "kw" => "������",
"to" => "Tonga", "kz" => "���������",
"na" => "�������", "mu" => "��������",
"bm" => "�������", "sa" => "���������� ������",
"zw" => "��������", "kg" => "����������",
"cx" => "Christmas Island", "pa" => "������",
"gt" => "���������", "bw" => "��������",
"mk" => "���������", "gl" => "����������",
"ec" => "�������", "lk" => "��� �����",
"md" => "�������", "py" => "��������",
"bo" => "�������", "bn" => "������",
"mt" => "������", "fo" => "������� ����",
"ac" => "Ascension Island", "pr" => "������ ����",
"am" => "�������", "pf" => "����������� ���������",
"ge" => "������", "bh" => "�������",
"ni" => "���������", "by" => "��������",
"sv" => "���������", "ma" => "�������",
"ke" => "�����", "ad" => "������",
"zm" => "������", "np" => "�����",
"bt" => "�����", "sz" => "���������",
"ba" => "������ � �����������", "om" => "����",
"jo" => "��������", "ir" => "����",
"st" => "��� ���� � ��������", "vi" => "������� ������� (���)",
"ci" => "����� �������� �����", "jm" => "������",
"li" => "�����������", "ky" => "��������� �������",
"gp" => "���������", "mg" => "����������",
"gi" => "���������", "sm" => "��� ������",
"as" => "������������ �����", "tz" => "��������",
"ws" => "�����", "tm" => "������������",
"mc" => "������", "sn" => "�������",
"hm" => "������� ����� � ����������", "fm" => "����������",
"fj" => "�����", "cu" => "����",
"rw" => "������", "mq" => "���������",
"ai" => "Anguilla", "pg" => "����� ����� ������",
"bz" => "�����", "sh" => "��. �����",
"aw" => "�����", "mv" => "��������",
"nc" => "����� ���������", "ag" => "������� � �������",
"uz" => "����������", "tj" => "�����������",
"sb" => "���������� �������", "bf" => "������� ����",
"kh" => "��������", "tc" => "Turks and Caicos Islands",
"tf" => "����� ����������� ����������", "az" => "�����������",
"dm" => "��������", "mz" => "��������",
"mo" => "�����", "vu" => "�������",
"mn" => "��������", "ug" => "������",
"tg" => "����", "ms" => "���������",
"ne" => "�����", "gf" => "����������� ������",
"gu" => "����", "hn" => "��������",
"al" => "�������", "gh" => "����",
"nf" => "������ �������", "io" => "British Indian Ocean Territory",
"gs" => "South Georgia and the South Sandwich Islands", "ye" => "�����",
"an" => "����������", "aq" => "����������",
"tn" => "�����", "ck" => "������� ����",
"ls" => "������", "et" => "�������",
"ng" => "�������", "sl" => "������ �����",
"bb" => "��������", "je" => "������",
"vg" => "������� ������� (UK)", "vn" => "�������",
"mr" => "����������", "gy" => "������",
"ml" => "����", "ki" => "��������",
"tv" => "������", "dj" => "�������",
"km" => "��������� �������", "dz" => "�����",
"im" => "������ ���", "pn" => "��������",
"qa" => "�����", "gg" => "�������",
"bj" => "�����", "ga" => "�����",
"gb" => "��������������", "bs" => "��������� �������",
"va" => "�������", "lc" => "����� �����",
"cd" => "�����", "gm" => "������",
"mp" => "Northern Mariana Islands", "gw" => "������-�����",
"cm" => "�������", "ao" => "������",
"er" => "�������", "ly" => "�����",
"cf" => "����������-����������� ����������", "mm" => "�������",
"td" => "���", "iq" => "����",
"kn" => "Saint Kitts and Nevis", "sc" => "����������� �������",
"cg" => "�����", "gd" => "�������",
"nr" => "Nauru", "af" => "����������",
"cv" => "Cape Verde", "mh" => "���������� �������",
"pm" => "St. Pierre and Miquelon", "so" => "������",
"vc" => "St. Vincent and the Grenadines", "bd" => "���������",
"gn" => "������", "ht" => "�����",
"la" => "����", "lr" => "�������",
"mw" => "������", "pw" => "�����",
"re" => "�������", "tk" => "�������",
"bi" => "�������", "bv" => "������� ����",
"fk" => "������������ �������", "gq" => "�������������� ������",
"sd" => "�����", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "�������", "sy" => "�����",
"tp" => "��������� �����", "um" => "US Minor Outlying Islands",
"wf" => "Wallis and Futuna Islands", "yt" => "Mayotte",
"zr" => "����",

// Miscellaneous translations
"misc_other" => "������",
"misc_unknown" => "�����������",
"misc_second_unit" => "���.",

// The Navigation Bar
"navbar_Main_Site" => "������� ����",
"navbar_Configuration" => "������������",
"navbar_Global_Stats" => "����� ����������",
"navbar_Detailed_Stats" => "��������� ����������",
"navbar_Time_Stats" => "���������� �� �������",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "�����",
"dstat_visits" => "���������",
"dstat_extension" => "������",
"dstat_dns" => "����� ����������",
"dstat_from" => "�� ������",
"dstat_os" => "��",
"dstat_browser" => "�������",
"dstat_visible_rows" => "��������� ���������",
"dstat_green_rows" => "������� ������",
"dstat_blue_rows" => "����� ������",
"dstat_red_rows" => "������� ������",
"dstat_last_visit" => "���������� ����",
"dstat_robots" => "������",
"dstat_no_data" => "��� ������",
"dstat_prx" => "������-������",
"dstat_ip" => "IP �����",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "�",
"dstat_pages" => "��������",
"dstat_visit_length" => "������������ ���������",
"dstat_reloads" => "�������� ��������",

// Global stats words
"gstat_Accesses" => "����������",
"gstat_Total_visits" => "����� �����������",
"gstat_Total_unique" => "����� ����������",
"gstat_Operating_systems" => "������� %d ��",
"gstat_Browsers" => "������� %d ���������",
"gstat_extensions" => "������� %d ������� ������� ������",
"gstat_Robots" => "������� %d �������",
"gstat_pages" => "������� %d ���������� �������",
"gstat_origins" => "������� %d ����������",
"gstat_hosts" => "������� %d ������",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "�����",
"gstat_Not_specified" => "�� ����������",

// Time stats words
"tstat_Su" => "��",
"tstat_Mo" => "��",
"tstat_Tu" => "��",
"tstat_We" => "��",
"tstat_Th" => "��",
"tstat_Fr" => "��",
"tstat_Sa" => "��",

"tstat_Jan" => "���",
"tstat_Feb" => "���",
"tstat_Mar" => "���",
"tstat_Apr" => "���",
"tstat_May" => "���",
"tstat_Jun" => "���",
"tstat_Jul" => "���",
"tstat_Aug" => "���",
"tstat_Sep" => "���",
"tstat_Oct" => "���",
"tstat_Nov" => "���",
"tstat_Dec" => "���",
"tstat_last_day" => "�������",
"tstat_last_week" => "�� ���� ������",
"tstat_last_month" => "� ���� ������",
"tstat_last_year" => "� ���� ���� (���������)",

// Configuration page words and sentences
"config_Variable_name" => "��� ����������",
"config_Variable_value" => "�������� ����������",
"config_Explanations" => "���������",

"config_bbc_mainsite" =>
"���� ��� ���������� �����������, �� ����� ������� ������ �� ��������� �����. ��������
�� ��������� ��������� �� ������������ ����������. ���� ��� ���� ���������� ���-�� � ������ �����,
��, ��������, �������� �������� �������� ���������� �� ��������������� ����� �����������.
<br />
�������:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"�� ��������� BBClone ���������� ��������� ����� � ����������� ����������.
� ������, ���� ��� ��������� ��� �� ����������, �� ������ ��������� �������� ��������, ����������� ��� �����.
<br />
�������:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"���������, ������� ����� ������������ � ������������� ������ ����
������� BBClone.<br />
����������� ����������������� �������:<br />
<ul>
<li>%SERVER:&nbsp; ��� �������,</li>
<li>%DATE: ������� ����.</li>
</ul>
���� HTML ���� ��������.<br />
Examples:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My stats from %DATE look like this:&quot;;
<br />",

"config_bbc_language" =>
"���� BBClone �� ��������� � ������, ���� �� �� ��������� ��������� �������������.
�������������� ��������� �����:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"��� ��������� ���������� ����������������� ������� ����������� ��������� �
��������. ������ ��� �� ������ � ���� �� ���������� � ������� ����� �������
����� ��������� �� ���� ��������� �� ��� ���, ���� ����� ����� �����
����������������� ������ �� �������� ���������� ��������. �� ��������� ���������
�������� de facto ��� web � 30 ����� (1800 ������), ��, � ����������� �� ����� ����,
�� ������ ��������� ������ ��������.<br />
�������:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"������� �������� �� ������ ������ � ��������� ����������? �� ��������� - 100.
�� ������������� ���������� ��� �������� ������ 500 �� ��������� �������� ��������.",

"config_bbc_detailed_stat_fields" =>
"���������� \$BBC_DETAILED_STAT_FIELDS ����������, ����� ������� ������ ������������
� ��������� ����������. �������� ��������� ��������:
<ul>
<li>id&nbsp;=&gt;&nbsp;���������� � X � ������� ��������� BBclone</li>
<li>time&nbsp;=&gt;&nbsp;����� ����������� ���������� ����</li>
<li>visits&nbsp;=&gt;&nbsp;���� ����������� ����������</li>
<li>dns&nbsp;=&gt;&nbsp;���� ����������</li>
<li>ip&nbsp;=&gt;&nbsp;IP ����� ����������</li>
<li>os&nbsp;=&gt;&nbsp;������������ ������� (���� ��������, ��� �������� ������)</li>
<li>browser&nbsp;=&gt;&nbsp;���������� �����������, �������������� ��� ������������ ����������</li>
<li>ext&nbsp;=&gt;&nbsp;������ ���������� ��� �������� �������� ���</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
������� ����� ������������ � ��� �������, � ������� �� ������� �� ��������.<br />
�������:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"���� ����� ������� �� ��������� � ����� ��������� ��������, �� � ������� ���� ����� �� ������
���������� ������ �����. ������������� �������� ������� ����� �����, ������������� - ������.<br />
�������:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"��� ����� ����������, ������� �� ��������� IP ����������� � �����. � ����
����� ������� ������ � �����������, ��������� ����� ����������� ���������
������ ������ �����, ���� ������������ ��� ���������� DNS ������ ��������
��������, ��������� � ������������ ��� ��������� �� ������ ��������. ���������
�������� ��� ���� ����� ������� ������ ��������.<br />
�������:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"�� ��������� BBClone ���������� ���� � ���������� �� �������, ��������� ��� ���� ��������
������������� � ����������� �������� �������. ������ ��, ���� �� ����������� �������
���������� �� ������� �� ���������� �����������, �� ������ �������� ������ ��������, ���������
���� ����������.<br />
�������:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"��� ����� ����� ���� ������������, ����� ��������� ���� ���������� ��� ���������� IP �������
��� ���������� �������. ��� ���������� ���������� ������� ����������� �������.<br />
�������:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"� ������, ���� �� �� ������, ����� ��������� ����������� ��������, � �������
������ ���� ����������, ���� ���������� � �������� ��� � ��������� ����������,
�� ������ ������ ���� ��� ��������� �������� ����, �� ������� ����� �������������
����������� ��������. ���� �� ������ ��������� ��������� �������� ���� - ����������
�� ��������.<br />
�������:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"You can use this option to determine the treatment of robots. The default is
to ignore them in the top hosts ranking but leave them in the remaining
stats. If you don't want to see any robots at all you can set this option to
&quot;2&quot;, then only human visits will be taken into account.<br />
�������:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"��� ����� ����������, ��� BBClone �������� ������ ���������� �� �������. �� ��������� ������������ IP
�����. � ����������� ������� ����� ������� ��� �������� ������������ �������. ������, ���� ��������
���� ���������� ���������� �� ������-���������, ����������� ���� ����� ��������� ������ �������, ���
������ ����� user agent'� ����� �������� ��������� ������ ����������.<br />
�������:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"� ������, ���� �� ����� �������� �������� ��� ����������, ���������� �������� ���� �����, � ���
��������� ��������� ����� ��� ���������� ���������. �� �������� ����� �������������� ��� �����, �����
���������� ���������� �� �����. ;)<br />
�������:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"���������� �� ������ � ����������� ��������� ����� ������������ ������� ���������� ������, � ����������� ������� �������� ����
�������������� ����������. ��������� ��� �����, �� ������ �������� ��� ������ � ����������� ��������� ������ access.php ��� �����
������� ��������� �� ������ � �������. ����� ����� ����� ��������� � ������� &quot;not_specified&quot;, ����� �� �������� ����� ����.<br />
�������:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>