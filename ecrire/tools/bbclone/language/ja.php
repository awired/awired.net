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
"あなたはこのサーバーの BBClone を見ることを許可されていません",

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
"misc_other" => "その他",
"misc_unknown" => "不明",
"misc_second_unit" => "秒",

// The Navigation Bar
"navbar_Main_Site" => "主サイト",
"navbar_Configuration" => "設定",
"navbar_Global_Stats" => "グローバル統計",
"navbar_Detailed_Stats" => "詳細統計",
"navbar_Time_Stats" => "時間別統計",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "時間",
"dstat_visits" => "訪問",
"dstat_extension" => "分類",
"dstat_dns" => "ホスト名",
"dstat_from" => "どこから来たか",
"dstat_os" => "ＯＳ",
"dstat_browser" => "ブラウザ",
"dstat_visible_rows" => "アクセス数",
"dstat_green_rows" => "緑",
"dstat_blue_rows" => "青",
"dstat_red_rows" => "赤",
"dstat_last_visit" => "最終訪問",
"dstat_robots" => "検索ロボット",
"dstat_no_data" => "データなし",
"dstat_prx" => "プロキシ",
"dstat_ip" => "IPアドレス",
"dstat_user_agent" => "ユーザーエージェント",
"dstat_nr" => "番号",
"dstat_pages" => "頁",
"dstat_visit_length" => "滯在時間",
"dstat_reloads" => "リロード",

// Global stats words

"gstat_Accesses" => "アクセス",
"gstat_Total_visits" => "合計",
"gstat_Total_unique" => "固有合計",
"gstat_Operating_systems" => "OS別上位 %d",
"gstat_Browsers" => " ブラウザ別上位 %d",
"gstat_extensions" => "国コード別上位 %d",
"gstat_Robots" => "検索ロボット別上位 %d",
"gstat_pages" => "訪問済ページ上位 %d",
"gstat_origins" => "リファラ上位 %d",
"gstat_hosts" => "ホスト上位 %d",
"gstat_keys" => "キーワード上位 %d",
"gstat_Total" => "合計",
"gstat_Not_specified" => "不明",

// Time stats words
"tstat_Su" => "日",
"tstat_Mo" => "月",
"tstat_Tu" => "火",
"tstat_We" => "水",
"tstat_Th" => "木",
"tstat_Fr" => "金",
"tstat_Sa" => "土",

"tstat_Jan" => "1月",
"tstat_Feb" => "2月",
"tstat_Mar" => "3月",
"tstat_Apr" => "4月",
"tstat_May" => "5月",
"tstat_Jun" => "6月",
"tstat_Jul" => "7月",
"tstat_Aug" => "8月",
"tstat_Sep" => "9月",
"tstat_Oct" => "10月",
"tstat_Nov" => "11月",
"tstat_Dec" => "12月",

"tstat_last_day" => "一日",
"tstat_last_week" => "一週間",
"tstat_last_month" => "一月間",
"tstat_last_year" => "一年間",

// Configuration page words and sentences

"config_Variable_name" => "変数名",
"config_Variable_value" => "変数の値",
"config_Explanations" => "説明",

"config_bbc_mainsite" =>
"この変数がセットされた場合、指定の位置へリンクが生成されます。デフォルトは親ディレクトリです。あなたの主サイトが他の場所に位置する場合、それに合わせて値を変更してください<br />例:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"統計の設定を表示することがBBCloneのデフォルトです。表示させたくない場合は空白にしてください<br />
例:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"すべての BBClone ページのナビゲーションバーに表示されているタイトル<br />
次のマクロが使えます:<br />
<ul>
<li>%SERVER: サーバー名</li>
<li>%DATE: 日付</li>
</ul>
HTMLタグも使えます<br />
例:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My stats from %DATE look like this:&quot;;
<br />",

"config_bbc_language" =>
"BBCloneのデフォルト言語指定です。ブラウザによって明示的に指定が無い場合、次の言語をサポートします:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"この変数は、同一アクセスと見なす長さを秒で定義します。2回のアクセスの間隔が指定された限界を超えない限り、この時間内での同一アクセスは1つのアクセスと見なされます。デフォルトは30分(1800秒)です。異なる値を割り当てることも出来ます<br />
例:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"詳細な統計で表示するエントリー数。デフォルトは100です。
500(役立たない)を越えた設定はしないで下さい。",

"config_bbc_detailed_stat_fields" =>
"変数 \$BBC_DETAILED_STAT_FIELDS は詳細統計に表示するためのカラムを決定します。
利用可能なカラム名:
<ul>
<li>id&nbsp;=&gt;&nbsp;カウント開始から何番目の訪問者か</li>
<li>time&nbsp;=&gt;&nbsp;最終訪問時間</li>
<li>visits&nbsp;=&gt;&nbsp;同一訪問者のアクセス数</li>
<li>dns&nbsp;=&gt;&nbsp;訪問者のホスト名</li>
<li>ip&nbsp;=&gt;&nbsp;訪問者のIPアドレス</li>
<li>os&nbsp;=&gt;&nbsp;OS種別(可能ならば検索ロボットなども)</li>
<li>browser&nbsp;=&gt;&nbsp;接続に利用されたソフトウェア
</li>
<li>ext&nbsp;=&gt;&nbsp;訪問者の国別コード</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
カラムをアレンジした命令は表示のためにも使用されます。<br />
例:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"サーバーの時計があなたの地域のタイムゾーンと一致しない場合、このスイッチの使用により数単位で時間を調節することができます。マイナスの値は時間を戻し、プラスは進めます。<br />
Examples:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"IPアドレスをホスト名に変換するかどうかのオプション。使用しているDNSサーバーが遅い、負荷制限をしている、又は信頼性の低い場合、名前の解決はあなたの利用しているサーバーにに負担をかけるかもしれません。この変数のセットはその問題を解決するためのものです。<br />
例:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"実際のサーバー運用にとって有益であると思われるため、BBCloneのデフォルトは時間別統計の中でヒット数を示すようになっています。しかし、あなたの時間統計用にユニークな訪問を使用する方が良ければ、この変数のセットにより数える方法を変更することができます。<br />
例:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"このオプションは特別のIPアドレスあるいはアドレスの範囲を統計から除外するために使用することができます。セパレーターとしてコンマを使用出来ます。<br />
例:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"あなたの統計に特定のサイトから来たアクセス（リファラ）を除外することができます。複数のキーワードを使用する場合は、セパレーターとしてコンマを使用してください。<br />
例:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"検索ロボットをどう処理するかのオプション。デフォルトは、「トップのホスト順位中では無視し、その他の統計の中では残す」です。どんな検索ロボットも見たくなければ、&quot;2&quot;です。人の訪問だけが、カウントされるでしょう。<br />
例:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"このオプションは、BBCloneがどうやって1人のビジターを区別するかの定義をします。デフォルトはIPアドレスのみ(それはほとんどの場合現実的)を使用することです。しかしながら、あなたのビジターがProxyサーバーを使ったりしている場合、このオプションをオフにすることによってより現実的な統計を提供することができます。<br />
例:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"統計をリセットしたい場合は、このスイッチをオンにし、次のアクセスによってそれらを削除することができます。元に戻す事を忘れると、恐らく異常に低いトラフィックを経験するでしょう;)
<br />
例:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"ホストとリファラの統計は1回のビジターの訪問によって大量のデータを生成します。このスイッチをオンにすることによって、これらのエントリーを除去し、あなたの実際のホストおよびリファラのランキングに影響せずに、access.phpのサイズを小さくすることができます。このヒット量は&quot;not_specified&quot;（総合評点を完全にしておくエントリー）に加えられるでしょう。<br />
例:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>