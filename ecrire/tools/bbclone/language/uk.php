<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/language/uk.php,v 1.22 2004/10/17 14:08:40 olliver Exp $
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
 * Translated by: Taras Pavliv taras@pavliv.com
 */

// The main array ($_ is for doing short in its call)
$_ = array(
// Specific charset
"global_charset" => "windows-1251",

// Date format (used with date())
"global_date_format" => "d.m.Y",

// Global translation
"global_bbclone_copyright" => "Команда BBClone - Ліцензія ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "Так",
"global_no" => "Ні",

// The error messages
"error_cannot_see_config" =>
"Перегляд налаштувань BBClone недоступний.",

// Address Extensions
"numeric" => "Числовий IP", "com" => "Комерційні",
"net" => "Networks", "edu" => "Освітні",
"biz" => "Комерційні організації", "info" => "Інформаційні",
"name" => "Personal", "ps" => "Palestina",
"jp" => "Японія", "us" => "США",
"uk" => "Англія", "de" => "Німеччина",
"mil" => "США військові", "ca" => "Канада",
"it" => "Італія", "au" => "Австралія",
"org" => "Некомерційні організації", "nl" => "Нідерланди",
"fr" => "Франція", "tw" => "Тайвань",
"gov" => "Урядові", "fi" => "Фінляндія",
"br" => "Бразилія", "se" => "Швеція",
"es" => "Іспанія", "no" => "Норвегія",
"mx" => "Мексика", "kr" => "Корея",
"ch" => "Швейцарія", "dk" => "Данія",
"be" => "Бельгія", "at" => "Австрія",
"nz" => "Новая Зеландія", "ru" => "Росія",
"pl" => "Польща", "za" => "ПАР",
"unknown" => "Невідома", "ar" => "Аргентина",
"il" => "Ізраїль", "sg" => "Сингапур",
"arpa" => "Помилки", "cz" => "Чеська республіка",
"hu" => "Угорщина", "hk" => "Гонконг",
"pt" => "Португалія", "tr" => "Туреччина",
"gr" => "Греція", "cn" => "Китай",
"ie" => "Ирландія", "my" => "Малайзія",
"th" => "Тайланд", "cl" => "Чилі",
"co" => "Колумбія", "is" => "Ісландія",
"uy" => "Уругвай", "ee" => "Естонія",
"in" => "Індія", "ua" => "Україна",
"sk" => "Словакія", "ro" => "Румунія",
"ae" => "ОАЕ", "id" => "Індонезія",
"su" => "СРСР", "si" => "Словенія",
"hr" => "Хорватія", "ph" => "Філіппіни",
"lv" => "Латвія", "ve" => "Венесуела",
"bg" => "Болгарія", "lt" => "Литва",
"yu" => "Serbia and Montenegro", "lu" => "Люксембург",
"nu" => "Niue", "pe" => "Перу",
"cr" => "Коста Ріка", "int" => "Міжнародна",
"do" => "Домініканська Республіка", "cy" => "Кіпр",
"pk" => "Пакистан", "cc" => "Кокосові Острови",
"tt" => "Тринідад и Тобаго", "eg" => "Єгипет",
"lb" => "Ліван", "kw" => "Кувейт",
"to" => "Тонга", "kz" => "Казахстан",
"na" => "Намібія", "mu" => "Маврикій",
"bm" => "Бермуди", "sa" => "Саудівска Аравія",
"zw" => "Зімбабве", "kg" => "Киргизстан",
"cx" => "Різдвяні Острови", "pa" => "Панама",
"gt" => "Гватемала", "bw" => "Ботсвана",
"mk" => "Македонія", "gl" => "Гренландія",
"ec" => "Еквадор", "lk" => "Шрі Ланка",
"md" => "Молдова", "py" => "Парагвай",
"bo" => "Болівія", "bn" => "Бруней",
"mt" => "Мальта", "fo" => "Острови Фарое",
"ac" => "Ascension Island", "pr" => "Пуерто Ріко",
"am" => "Вірменія", "pf" => "Французька Полінезія",
"ge" => "Грузія", "bh" => "Бахрейн",
"ni" => "Нікарагуа", "by" => "Біларусь",
"sv" => "Сальвадор", "ma" => "Мароко",
"ke" => "Кенія", "ad" => "Андора",
"zm" => "Замбія", "np" => "Непал",
"bt" => "Бутан", "sz" => "Свазіленд",
"ba" => "Боснія і Герцеговина", "om" => "Оман",
"jo" => "Йорданія", "ir" => "Іран",
"st" => "Сан Томе і Принципе", "vi" => "Віргінські Острови",
"ci" => "Ivory Coast", "jm" => "Ямайка",
"li" => "Ліхтенштейн", "ky" => "Кайманові Острови",
"gp" => "Гваделупа", "mg" => "Мадагаскар",
"gi" => "Гібралтар", "sm" => "Сан Маріно",
"as" => "Американські Самоа", "tz" => "Танзанія",
"ws" => "Самоа", "tm" => "Туркменістан",
"mc" => "Монако", "sn" => "Сенегал",
"hm" => "Heard and Mc Donald Islands", "fm" => "Мікронезія",
"fj" => "Фіджі", "cu" => "Куба",
"rw" => "Руанда", "mq" => "Мартіника",
"ai" => "Антикіла", "pg" => "Папуа Нова Гвінея",
"bz" => "Беліз", "sh" => "St. Helena",
"aw" => "Аруба", "mv" => "Мальдиви",
"nc" => "Нова Каледонія", "ag" => "Антигуа і Барбуда",
"uz" => "Узбекістан", "tj" => "Таджикістан",
"sb" => "Соломонові Острови", "bf" => "Буркіна Фасо",
"kh" => "Камбоджа", "tc" => "Turks and Caicos Islands",
"tf" => "French Southern Territories", "az" => "Азербайджан",
"dm" => "Домініка", "mz" => "Мозамбік",
"mo" => "Макау", "vu" => "Вануату",
"mn" => "Монголія", "ug" => "Уганда",
"tg" => "Того", "ms" => "Монтсерат",
"ne" => "Нігер", "gf" => "Французька Гвіана",
"gu" => "Гуам", "hn" => "Гондурас",
"al" => "Албанія", "gh" => "Гана",
"nf" => "Норфолкові Острови", "io" => "Британська територія Індії",
"gs" => "South Georgia and the South Sandwich Islands", "ye" => "Йемен",
"an" => "Ндіерланди", "aq" => "Антарктида",
"tn" => "Туніс", "ck" => "Острови Кука",
"ls" => "Лесото", "et" => "Ефиіпія",
"ng" => "Нігерія", "sl" => "Сьера Леоне",
"bb" => "Барбадос", "je" => "Джерсі",
"vg" => "Вірджінські Острови", "vn" => "В'єтнам",
"mr" => "Мавританія", "gy" => "Гайана",
"ml" => "Малі", "ki" => "Кирибаті",
"tv" => "Тувалу", "dj" => "Джибуті",
"km" => "Коморскі Острови", "dz" => "Алжир",
"im" => "Isle of Man", "pn" => "Піктаірн",
"qa" => "Катар", "gg" => "Гуернесі",
"bj" => "Бенін", "ga" => "Габон",
"gb" => "Об'єднане Королівство", "bs" => "Багамскі Острови",
"va" => "Ватикан", "lc" => "Свята Лючія",
"cd" => "Конго", "gm" => "Гамбія",
"mp" => "Північні острови Маріана", "gw" => "Гвінея-Бісау",
"cm" => "Камерун", "ao" => "Ангола",
"er" => "Еритрея", "ly" => "Лівія",
"cf" => "ЦАР", "mm" => "Миянмар",
"td" => "Чад", "iq" => "Ірак",
"kn" => "Saint Kitts and Nevis", "sc" => "Сейшельскі Острови",
"cg" => "Конго", "gd" => "Гренада",
"nr" => "Науру", "af" => "Афганістан",
"cv" => "Капе Верде", "mh" => "Маршаллові Острови",
"pm" => "St. Pierre and Miquelon", "so" => "Сомалі",
"vc" => "St. Vincent and the Grenadines", "bd" => "Бангладеш",
"gn" => "Гвінея", "ht" => "Гаїті",
"la" => "Лаос", "lr" => "Либерія",
"mw" => "Малаві", "pw" => "Палау",
"re" => "Reunion", "tk" => "Токелау",
"bi" => "Бурунді", "bv" => "Bouvet Island",
"fk" => "Фолклендські Острови", "gq" => "Екваторіальна Гвінея",
"sd" => "Судан", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "Сурінам", "sy" => "Сирія",
"tp" => "Східний Тимор", "um" => "US Minor Outlying Islands",
"wf" => "Wallis and Futuna Islands", "yt" => "Mayotte",
"zr" => "Заїр",

// Miscellaneous translations
"misc_other" => "Інший",
"misc_unknown" => "Невідомий",
"misc_second_unit" => "сек.",

// The Navigation Bar
"navbar_Main_Site" => "Головний сайт",
"navbar_Configuration" => "Конфігурація",
"navbar_Global_Stats" => "Загальна статистика",
"navbar_Detailed_Stats" => "Детальна статистика",
"navbar_Time_Stats" => "Статистика за часом",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Час",
"dstat_visits" => "К-сть",
"dstat_extension" => "Зона",
"dstat_dns" => "Адреса відвідувача",
"dstat_from" => "За посиланням",
"dstat_os" => "ОС",
"dstat_browser" => "Браузер",
"dstat_visible_rows" => "Останніх відвідувань",
"dstat_green_rows" => "зелені рядки",
"dstat_blue_rows" => "сині рядки",
"dstat_red_rows" => "червоні рядки",
"dstat_last_visit" => "останні відвідування",
"dstat_robots" => "роботи",
"dstat_no_data" => "No data available",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Address",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Pages",
"dstat_visit_length" => "Visit Length",
"dstat_reloads" => "Reloads",

// Global stats words
"gstat_Accesses" => "Відвідувачі",
"gstat_Total_visits" => "Всього відвідувачів",
"gstat_Total_unique" => "Всього унікальних",
"gstat_Operating_systems" => "Рейтинг %d ОС",
"gstat_Browsers" => "Рейтинг %d браузерів",
"gstat_extensions" => "Рейтинг %d доменів першого рівня",
"gstat_Robots" => "Рейтинг %d роботів",
"gstat_pages" => "Рейтинг %d відвіданих сторінок",
"gstat_origins" => "Рейтинг %d джереш",
"gstat_hosts" => "Top %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Вього",
"gstat_Not_specified" => "Не визначено",

// Time stats words
"tstat_Su" => "Нд",
"tstat_Mo" => "Пн",
"tstat_Tu" => "Вт",
"tstat_We" => "Ср",
"tstat_Th" => "Чт",
"tstat_Fr" => "Пт",
"tstat_Sa" => "Сб",

"tstat_Jan" => "Січ",
"tstat_Feb" => "Лют",
"tstat_Mar" => "Бер",
"tstat_Apr" => "Кві",
"tstat_May" => "Тра",
"tstat_Jun" => "Чер",
"tstat_Jul" => "Лип",
"tstat_Aug" => "Сер",
"tstat_Sep" => "Вер",
"tstat_Oct" => "Жов",
"tstat_Nov" => "Лис",
"tstat_Dec" => "Гру",
"tstat_last_day" => "Сьогодні",
"tstat_last_week" => "На цьому тижні",
"tstat_last_month" => "В цьому місяці",
"tstat_last_year" => "В цьому році (помісячно)",

// Configuration page words and sentences
"config_Variable_name" => "Ім'я змінної",
"config_Variable_value" => "Значення змінної",
"config_Explanations" => "Поясненння",

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
"Заголовок, котрий буде відображатись в навігаційній полосі всіх сторінок bbclone.<br />
Прийняті такі макроси:<br />
<ul>
<li>%SERVER:&nbsp; ім'я сервера,</li>
<li>%DATE: поточна дата.</li>
</ul>
Теги HTML також доступні.<br />
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