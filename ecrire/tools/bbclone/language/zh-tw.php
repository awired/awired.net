<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/zh-tw.php,v 1.28 2004/08/10 19:22:54 joku Exp $
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
 * Translated by: Hu ChangSong <gugong_2002@yahoo.com.cn>
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "big5",

// Date format (used with date() )
"global_date_format" => "西元20y年m月d日",

// Global translation
"global_bbclone_copyright" => "The BBClone 團隊 -- 許可遵從:",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "是",
"global_no" => "否",

// The error messages
"error_cannot_see_config" =>
"這裏不允許查看本伺服器的 BBClone 配置。",

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
"misc_other" => "其 他",
"misc_unknown" => "未 知",
"misc_second_unit" => "秒",

// The Navigation Bar
"navbar_Main_Site" => "我的站點",
"navbar_Configuration" => "配置文件",
"navbar_Global_Stats" => "全 面",
"navbar_Detailed_Stats" => "細 節",
"navbar_Time_Stats" => "時 間",

// Detailed stats words
"dstat_id" => "號碼",
"dstat_time" => "時 間",
"dstat_visits" => "瀏覽",
"dstat_extension" => "擴 展",
"dstat_dns" => "IP 地 址",
"dstat_from" => "轉 自（域 名）",
"dstat_os" => "操 作 系 統",
"dstat_browser" => "瀏 覽 器",
"dstat_visible_rows" => "當前可以查看的訪問數",
"dstat_green_rows" => "綠色行",
"dstat_blue_rows" => "藍色行",
"dstat_red_rows" => "紅色行",
"dstat_last_visit" => "最後的訪問時間",
"dstat_robots" => "robots",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "存 取 記 錄",
"gstat_Total_visits" => "訪問總數",
"gstat_Total_unique" => "總的唯一的",
"gstat_Operating_systems" => "操 作 系 統",
"gstat_Browsers" => "瀏 覽 器",
"gstat_extensions" => "首 %d 範圍排列",
"gstat_Robots" => "Robots",
"gstat_pages" => "首 %d 頁面排列",
"gstat_origins" => "首 %d 來源排列",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "合 計",
"gstat_Not_specified" => "沒有詳細說明",

// Time stats words
"tstat_Su" => "星期天",
"tstat_Mo" => "星期一",
"tstat_Tu" => "星期二",
"tstat_We" => "星期三",
"tstat_Th" => "星期四",
"tstat_Fr" => "星期五",
"tstat_Sa" => "星期六",

"tstat_Jan" => "一月",
"tstat_Feb" => "二月",
"tstat_Mar" => "三月",
"tstat_Apr" => "四月",
"tstat_May" => "五月",
"tstat_Jun" => "六月",
"tstat_Jul" => "七月",
"tstat_Aug" => "八月",
"tstat_Sep" => "九月",
"tstat_Oct" => "十月",
"tstat_Nov" => "十一",
"tstat_Dec" => "十二",

"tstat_last_day" => "這一天",
"tstat_last_week" => "這一周",
"tstat_last_month" => "這一個月",
"tstat_last_year" => "這一年",

// Configuration page words and sentences
"config_Variable_name" => "變 量 名 稱",
"config_Variable_value" => "變 量 值",
"config_Explanations" => "詳 細 解 釋",

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
"這個標題的內容會在所有 BBClone 頁面的標題欄顯示出來。<br />
可以理解的宏有：<br />
<ul>
<li>%SERVER: 伺服器名字；</li>
<li>%DATE: 當前時間。</li>
</ul>
允許 HTML 標簽。<br />
Examples:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My stats from %DATE look like this:&quot;;
<br />",

"config_bbc_language" =>
"BBClone's default language, in case it hasn't been specified by the browser.
The following languages are supported:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, tr, zh-cn and zh-tw</p>",

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

"config_bbc_no_string" => "As default BBClone is writing a comment into the
HTML source to indicate its current state. This output, however, may negatively
affect some forums or content management systems. In case you are confronted
with a blank page, a couple of &quot;headers already sent by&quot; messages or
parts of your site not included in the statistics, you can set this option to
suppress the output and make your scripts working again.<br />
Examples:<br />
\$BBC_NO_STRING = 1;<br />
\$BBC_NO_STRING = &quot;&quot;;",

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