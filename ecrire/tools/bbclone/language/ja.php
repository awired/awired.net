<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/ja.php,v 1.26 2004/10/17 14:08:40 olliver Exp $
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
 * Modified by mugen 2004.09.01 (mugen@guitar.jp)
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "euc-jp",

// Date format (used with date() )
"global_date_format" => "Y/m/d",

// Global translation
"global_bbclone_copyright" => "The BBClone team - Licensed under the",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "yes",
"global_no" => "no",

// The error messages
"error_cannot_see_config" =>
"���ʤ��Ϥ��Υ����С��� BBClone �򸫤뤳�Ȥ���Ĥ���Ƥ��ޤ���",

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
"misc_other" => "����¾",
"misc_unknown" => "����",
"misc_second_unit" => "��",

// The Navigation Bar
"navbar_Main_Site" => "�祵����",
"navbar_Configuration" => "����",
"navbar_Global_Stats" => "�����Х�����",
"navbar_Detailed_Stats" => "�ܺ�����",
"navbar_Time_Stats" => "����������",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "����",
"dstat_visits" => "ˬ��",
"dstat_extension" => "ʬ��",
"dstat_dns" => "�ۥ���̾",
"dstat_from" => "�ɤ������褿��",
"dstat_os" => "�ϣ�",
"dstat_browser" => "�֥饦��",
"dstat_visible_rows" => "����������",
"dstat_green_rows" => "��",
"dstat_blue_rows" => "��",
"dstat_red_rows" => "��",
"dstat_last_visit" => "�ǽ�ˬ��",
"dstat_robots" => "������ܥå�",
"dstat_no_data" => "�ǡ����ʤ�",
"dstat_prx" => "�ץ���",
"dstat_ip" => "IP���ɥ쥹",
"dstat_user_agent" => "�桼���������������",
"dstat_nr" => "�ֹ�",
"dstat_pages" => "��",
"dstat_visit_length" => "���߻���",
"dstat_reloads" => "�����",

// Global stats words

"gstat_Accesses" => "��������",
"gstat_Total_visits" => "���",
"gstat_Total_unique" => "��ͭ���",
"gstat_Operating_systems" => "OS�̾�� %d",
"gstat_Browsers" => " �֥饦���̾�� %d",
"gstat_extensions" => "�񥳡����̾�� %d",
"gstat_Robots" => "������ܥå��̾�� %d",
"gstat_pages" => "ˬ��ѥڡ������ %d",
"gstat_origins" => "��ե����� %d",
"gstat_hosts" => "�ۥ��Ⱦ�� %d",
"gstat_keys" => "������ɾ�� %d",
"gstat_Total" => "���",
"gstat_Not_specified" => "����",

// Time stats words
"tstat_Su" => "��",
"tstat_Mo" => "��",
"tstat_Tu" => "��",
"tstat_We" => "��",
"tstat_Th" => "��",
"tstat_Fr" => "��",
"tstat_Sa" => "��",

"tstat_Jan" => "1��",
"tstat_Feb" => "2��",
"tstat_Mar" => "3��",
"tstat_Apr" => "4��",
"tstat_May" => "5��",
"tstat_Jun" => "6��",
"tstat_Jul" => "7��",
"tstat_Aug" => "8��",
"tstat_Sep" => "9��",
"tstat_Oct" => "10��",
"tstat_Nov" => "11��",
"tstat_Dec" => "12��",

"tstat_last_day" => "����",
"tstat_last_week" => "�콵��",
"tstat_last_month" => "����",
"tstat_last_year" => "��ǯ��",

// Configuration page words and sentences

"config_Variable_name" => "�ѿ�̾",
"config_Variable_value" => "�ѿ�����",
"config_Explanations" => "����",

"config_bbc_mainsite" =>
"�����ѿ������åȤ��줿��硢����ΰ��֤إ�󥯤���������ޤ����ǥե���ȤϿƥǥ��쥯�ȥ�Ǥ������ʤ��μ祵���Ȥ�¾�ξ��˰��֤����硢����˹�碌���ͤ��ѹ����Ƥ�������<br />��:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"���פ������ɽ�����뤳�Ȥ�BBClone�Υǥե���ȤǤ���ɽ�����������ʤ����϶���ˤ��Ƥ�������<br />
��:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"���٤Ƥ� BBClone �ڡ����Υʥӥ��������С���ɽ������Ƥ��륿���ȥ�<br />
���Υޥ����Ȥ��ޤ�:<br />
<ul>
<li>%SERVER: �����С�̾</li>
<li>%DATE: ����</li>
</ul>
HTML������Ȥ��ޤ�<br />
��:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My stats from %DATE look like this:&quot;;
<br />",

"config_bbc_language" =>
"BBClone�Υǥե���ȸ������Ǥ����֥饦���ˤ�ä�����Ū�˻��̵꤬����硢���θ���򥵥ݡ��Ȥ��ޤ�:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"�����ѿ��ϡ�Ʊ�쥢�������ȸ��ʤ�Ĺ�����ä�������ޤ���2��Υ��������δֳ֤����ꤵ�줿�³���Ķ���ʤ��¤ꡢ���λ�����Ǥ�Ʊ�쥢��������1�ĤΥ��������ȸ��ʤ���ޤ����ǥե���Ȥ�30ʬ(1800��)�Ǥ����ۤʤ��ͤ������Ƥ뤳�Ȥ����ޤ�<br />
��:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"�ܺ٤����פ�ɽ�����륨��ȥ꡼�����ǥե���Ȥ�100�Ǥ���
500(��Ω���ʤ�)��ۤ�������Ϥ��ʤ��ǲ�������",

"config_bbc_detailed_stat_fields" =>
"�ѿ� \$BBC_DETAILED_STAT_FIELDS �Ͼܺ����פ�ɽ�����뤿��Υ�������ꤷ�ޤ���
���Ѳ�ǽ�ʥ����̾:
<ul>
<li>id&nbsp;=&gt;&nbsp;������ȳ��Ϥ��鲿���ܤ�ˬ��Ԥ�</li>
<li>time&nbsp;=&gt;&nbsp;�ǽ�ˬ�����</li>
<li>visits&nbsp;=&gt;&nbsp;Ʊ��ˬ��ԤΥ���������</li>
<li>dns&nbsp;=&gt;&nbsp;ˬ��ԤΥۥ���̾</li>
<li>ip&nbsp;=&gt;&nbsp;ˬ��Ԥ�IP���ɥ쥹</li>
<li>os&nbsp;=&gt;&nbsp;OS����(��ǽ�ʤ�и�����ܥåȤʤɤ�)</li>
<li>browser&nbsp;=&gt;&nbsp;��³�����Ѥ��줿���եȥ�����
</li>
<li>ext&nbsp;=&gt;&nbsp;ˬ��Ԥι��̥�����</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
�����򥢥�󥸤���̿���ɽ���Τ���ˤ���Ѥ���ޤ���<br />
��:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"�����С��λ��פ����ʤ����ϰ�Υ����ॾ����Ȱ��פ��ʤ���硢���Υ����å��λ��Ѥˤ���ñ�̤ǻ��֤�Ĵ�᤹�뤳�Ȥ��Ǥ��ޤ����ޥ��ʥ����ͤϻ��֤��ᤷ���ץ饹�Ͽʤ�ޤ���<br />
Examples:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"IP���ɥ쥹��ۥ���̾���Ѵ����뤫�ɤ����Υ��ץ���󡣻��Ѥ��Ƥ���DNS�����С����٤���������¤򤷤Ƥ��롢���Ͽ��������㤤��硢̾���β��Ϥ��ʤ������Ѥ��Ƥ��륵���С��ˤ���ô�򤫤��뤫�⤷��ޤ��󡣤����ѿ��Υ��åȤϤ���������褹�뤿��Τ�ΤǤ���<br />
��:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"�ºݤΥ����С����ѤˤȤä�ͭ�פǤ���Ȼפ��뤿�ᡢBBClone�Υǥե���Ȥϻ��������פ���ǥҥåȿ��򼨤��褦�ˤʤäƤ��ޤ��������������ʤ��λ��������Ѥ˥�ˡ�����ˬ�����Ѥ��������ɤ���С������ѿ��Υ��åȤˤ���������ˡ���ѹ����뤳�Ȥ��Ǥ��ޤ���<br />
��:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"���Υ��ץ��������̤�IP���ɥ쥹���뤤�ϥ��ɥ쥹���ϰϤ����פ���������뤿��˻��Ѥ��뤳�Ȥ��Ǥ��ޤ������ѥ졼�����Ȥ��ƥ���ޤ���ѽ���ޤ���<br />
��:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"���ʤ������פ�����Υ����Ȥ����褿���������ʥ�ե���ˤ�������뤳�Ȥ��Ǥ��ޤ���ʣ���Υ�����ɤ���Ѥ�����ϡ����ѥ졼�����Ȥ��ƥ���ޤ���Ѥ��Ƥ���������<br />
��:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"������ܥåȤ�ɤ��������뤫�Υ��ץ���󡣥ǥե���Ȥϡ��֥ȥåפΥۥ��Ƚ����Ǥ�̵�뤷������¾�����פ���ǤϻĤ��פǤ����ɤ�ʸ�����ܥåȤ⸫�����ʤ���С�&quot;2&quot;�Ǥ����ͤ�ˬ���������������Ȥ����Ǥ��礦��<br />
��:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"���Υ��ץ����ϡ�BBClone���ɤ���ä�1�ͤΥӥ���������̤��뤫������򤷤ޤ����ǥե���Ȥ�IP���ɥ쥹�Τ�(����ϤۤȤ�ɤξ�總��Ū)����Ѥ��뤳�ȤǤ����������ʤ��顢���ʤ��Υӥ�������Proxy�����С���Ȥä��ꤷ�Ƥ����硢���Υ��ץ����򥪥դˤ��뤳�Ȥˤ�äƤ�긽��Ū�����פ��󶡤��뤳�Ȥ��Ǥ��ޤ���<br />
��:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"���פ�ꥻ�åȤ��������ϡ����Υ����å��򥪥�ˤ������Υ��������ˤ�äƤ����������뤳�Ȥ��Ǥ��ޤ��������᤹����˺���ȡ����餯�۾���㤤�ȥ�ե��å���и�����Ǥ��礦;)
<br />
��:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"�ۥ��Ȥȥ�ե�������פ�1��Υӥ�������ˬ��ˤ�ä����̤Υǡ������������ޤ������Υ����å��򥪥�ˤ��뤳�Ȥˤ�äơ������Υ���ȥ꡼���������ʤ��μºݤΥۥ��Ȥ���ӥ�ե���Υ�󥭥󥰤˱ƶ������ˡ�access.php�Υ������򾮤������뤳�Ȥ��Ǥ��ޤ������Υҥå��̤�&quot;not_specified&quot;�����ɾ�������ˤ��Ƥ�������ȥ꡼�ˤ˲ä�����Ǥ��礦��<br />
��:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>