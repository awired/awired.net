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
"global_bbclone_copyright" => "Команда BBClone - Лицензия ",
"global_last_reset" => "Statistics last reset on",
"global_yes" => "Да",
"global_no" => "Нет",

// The error messages
"error_cannot_see_config" =>
"Просмотр настроек BBClone недоступен.",

// Address Extensions
"numeric" => "Числовой IP", "com" => "Коммерческие",
"net" => "Networks", "edu" => "Образовательные",
"biz" => "Коммерческие организации", "info" => "Информационные",
"name" => "Персональный", "ps" => "Палестина",
"jp" => "Япония", "us" => "США",
"uk" => "Англия", "de" => "Германия",
"mil" => "Армия США", "ca" => "Канада",
"it" => "Италия", "au" => "Австралия",
"org" => "Некоммерческие организации", "nl" => "Нидерланды",
"fr" => "Франция", "tw" => "Тайвань",
"gov" => "Правительственные", "fi" => "Финляндия",
"br" => "Brazil", "se" => "Швеция",
"es" => "Испания", "no" => "Норвегия",
"mx" => "Мексика", "kr" => "Корея",
"ch" => "Швейцария", "dk" => "Дания",
"be" => "Бельгия", "at" => "Австрия",
"nz" => "Новая Зеландия", "ru" => "РФ",
"pl" => "Польша", "za" => "ЮАР",
"unknown" => "Неизвестная", "ar" => "Аргентина",
"il" => "Израиль", "sg" => "Сингапур",
"arpa" => "Ошибки", "cz" => "Чешская республика",
"hu" => "Венгрия", "hk" => "Гонконг",
"pt" => "Португалия", "tr" => "Турция",
"gr" => "Греция", "cn" => "Китай",
"ie" => "Ирландия", "my" => "Малайзия",
"th" => "Таиланд", "cl" => "Чили",
"co" => "Колумбия", "is" => "Исландия",
"uy" => "Уругвай", "ee" => "Эстония",
"in" => "Индия", "ua" => "Украина",
"sk" => "Словакия", "ro" => "Румыния",
"ae" => "Объединенные Арабские Эмираты", "id" => "Индонезия",
"su" => "Бывший СССР", "si" => "Словения",
"hr" => "Хорватия", "ph" => "Филиппины",
"lv" => "Латвия", "ve" => "Венесуэла",
"bg" => "Болгария", "lt" => "Литва",
"yu" => "Serbia and Montenegro", "lu" => "Люксембург",
"nu" => "Niue", "pe" => "Перу",
"cr" => "Коста Рика", "int" => "Международная Организация",
"do" => "Доминиканская Республика", "cy" => "Кипр",
"pk" => "Пакистан", "cc" => "Кокосовые Острова",
"tt" => "Тринидад и Табаго", "eg" => "Египет",
"lb" => "Ливан", "kw" => "Кувейт",
"to" => "Tonga", "kz" => "Казахстан",
"na" => "Намибия", "mu" => "Маврикий",
"bm" => "Бермуды", "sa" => "Саудовская Аравия",
"zw" => "Зимбабве", "kg" => "Киргизстан",
"cx" => "Christmas Island", "pa" => "Панама",
"gt" => "Гватемала", "bw" => "Ботсвана",
"mk" => "Македония", "gl" => "Гренландия",
"ec" => "Эквадор", "lk" => "Шри Ланка",
"md" => "Молдова", "py" => "Парагвай",
"bo" => "Боливия", "bn" => "Бруней",
"mt" => "Мальта", "fo" => "Острова Фаро",
"ac" => "Ascension Island", "pr" => "Пуэрто Рико",
"am" => "Армения", "pf" => "Французская Полинезия",
"ge" => "Грузия", "bh" => "Бахрейн",
"ni" => "Никарагуа", "by" => "Беларусь",
"sv" => "Сальвадор", "ma" => "Марокко",
"ke" => "Кения", "ad" => "Андора",
"zm" => "Замбия", "np" => "Непал",
"bt" => "Бутан", "sz" => "Свазиленд",
"ba" => "Босния и Герцеговина", "om" => "Оман",
"jo" => "Иордания", "ir" => "Иран",
"st" => "Сан Томе и Принсипи", "vi" => "Острова Вирджин (США)",
"ci" => "Берег Слоновой Кости", "jm" => "Ямайка",
"li" => "Лихтенштейн", "ky" => "Каймановы Острова",
"gp" => "Гваделупа", "mg" => "Мадагаскар",
"gi" => "Гибралтар", "sm" => "Сан Марино",
"as" => "Американское Самоа", "tz" => "Танзания",
"ws" => "Самоа", "tm" => "Туркменистан",
"mc" => "Монако", "sn" => "Сенегал",
"hm" => "Острова Херда и МакДоналда", "fm" => "Микронезия",
"fj" => "Фиджи", "cu" => "Куба",
"rw" => "Руанда", "mq" => "Мартиника",
"ai" => "Anguilla", "pg" => "Папуа Новая Гвинея",
"bz" => "Белиз", "sh" => "Св. Елена",
"aw" => "Аруба", "mv" => "Мальдивы",
"nc" => "Новая Каледония", "ag" => "Антигуа и Барбуда",
"uz" => "Узбекистан", "tj" => "Таджикистан",
"sb" => "Соломоновы Острова", "bf" => "Буркина Фасо",
"kh" => "Камбоджа", "tc" => "Turks and Caicos Islands",
"tf" => "Южные Французские Территории", "az" => "Азербайджан",
"dm" => "Доминика", "mz" => "Мозамбик",
"mo" => "Макау", "vu" => "Вануату",
"mn" => "Монголия", "ug" => "Уганда",
"tg" => "Того", "ms" => "Монсеррат",
"ne" => "Нигер", "gf" => "Французская Гвиана",
"gu" => "Гуам", "hn" => "Гондурас",
"al" => "Албания", "gh" => "Гана",
"nf" => "Остров Норфолк", "io" => "British Indian Ocean Territory",
"gs" => "South Georgia and the South Sandwich Islands", "ye" => "Йемен",
"an" => "Нидерланды", "aq" => "Антарктида",
"tn" => "Тунис", "ck" => "Острова Кука",
"ls" => "Лесото", "et" => "Эфиопия",
"ng" => "Нигерия", "sl" => "Сьерра Леоне",
"bb" => "Барбадос", "je" => "Джерси",
"vg" => "Острова Вирджин (UK)", "vn" => "Вьетнам",
"mr" => "Мавритания", "gy" => "Гайана",
"ml" => "Мали", "ki" => "Кирибати",
"tv" => "Тувалу", "dj" => "Джибути",
"km" => "Коморские Острова", "dz" => "Алжир",
"im" => "Остров Мэн", "pn" => "Питкейрн",
"qa" => "Катар", "gg" => "Гуэрнси",
"bj" => "Бенин", "ga" => "Габон",
"gb" => "Великобритания", "bs" => "Багамские Острова",
"va" => "Ватикан", "lc" => "Санта Люсия",
"cd" => "Конго", "gm" => "Гамбия",
"mp" => "Northern Mariana Islands", "gw" => "Гвинея-Бисау",
"cm" => "Камерун", "ao" => "Ангола",
"er" => "Эритрея", "ly" => "Ливия",
"cf" => "Центрально-африканская республика", "mm" => "Мьянмар",
"td" => "Чад", "iq" => "Ирак",
"kn" => "Saint Kitts and Nevis", "sc" => "Сейшельские Острова",
"cg" => "Конго", "gd" => "Гренада",
"nr" => "Nauru", "af" => "Афганистан",
"cv" => "Cape Verde", "mh" => "Маршалловы Острова",
"pm" => "St. Pierre and Miquelon", "so" => "Сомали",
"vc" => "St. Vincent and the Grenadines", "bd" => "Бангладеш",
"gn" => "Гвинея", "ht" => "Гаити",
"la" => "Лаос", "lr" => "Либерия",
"mw" => "Малави", "pw" => "Палау",
"re" => "Реюнион", "tk" => "Токелау",
"bi" => "Бурунди", "bv" => "Острова Буве",
"fk" => "Фолклендские Острова", "gq" => "Экваториальная Гвинея",
"sd" => "Судан", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "Суринам", "sy" => "Сирия",
"tp" => "Восточный Тимор", "um" => "US Minor Outlying Islands",
"wf" => "Wallis and Futuna Islands", "yt" => "Mayotte",
"zr" => "Заир",

// Miscellaneous translations
"misc_other" => "Другой",
"misc_unknown" => "Неизвестный",
"misc_second_unit" => "сек.",

// The Navigation Bar
"navbar_Main_Site" => "Главный сайт",
"navbar_Configuration" => "Конфигурация",
"navbar_Global_Stats" => "Общая статистика",
"navbar_Detailed_Stats" => "Детальная статистика",
"navbar_Time_Stats" => "Статистика по времени",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Время",
"dstat_visits" => "Посещения",
"dstat_extension" => "Страна",
"dstat_dns" => "Адрес посетителя",
"dstat_from" => "По ссылке",
"dstat_os" => "ОС",
"dstat_browser" => "Браузер",
"dstat_visible_rows" => "Последних посещений",
"dstat_green_rows" => "зеленые строки",
"dstat_blue_rows" => "синие строки",
"dstat_red_rows" => "красные строки",
"dstat_last_visit" => "посетившие сайт",
"dstat_robots" => "роботы",
"dstat_no_data" => "Нет данных",
"dstat_prx" => "Прокси-сервер",
"dstat_ip" => "IP Адрес",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "№",
"dstat_pages" => "Страницы",
"dstat_visit_length" => "Длительность посещения",
"dstat_reloads" => "Загрузки страницы",

// Global stats words
"gstat_Accesses" => "Посетители",
"gstat_Total_visits" => "Всего посетителей",
"gstat_Total_unique" => "Всего уникальных",
"gstat_Operating_systems" => "Рейтинг %d ОС",
"gstat_Browsers" => "Рейтинг %d Браузеров",
"gstat_extensions" => "Рейтинг %d Доменов первого уровня",
"gstat_Robots" => "Рейтинг %d Роботов",
"gstat_pages" => "Рейтинг %d Посещенных страниц",
"gstat_origins" => "Рейтинг %d Источников",
"gstat_hosts" => "Рейтинг %d Хостов",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Всего",
"gstat_Not_specified" => "Не определено",

// Time stats words
"tstat_Su" => "Вс",
"tstat_Mo" => "Пн",
"tstat_Tu" => "Вт",
"tstat_We" => "Ср",
"tstat_Th" => "Чт",
"tstat_Fr" => "Пт",
"tstat_Sa" => "Сб",

"tstat_Jan" => "Янв",
"tstat_Feb" => "Фев",
"tstat_Mar" => "Мар",
"tstat_Apr" => "Апр",
"tstat_May" => "Май",
"tstat_Jun" => "Июн",
"tstat_Jul" => "Июл",
"tstat_Aug" => "Авг",
"tstat_Sep" => "Сен",
"tstat_Oct" => "Окт",
"tstat_Nov" => "Ноя",
"tstat_Dec" => "Дек",
"tstat_last_day" => "Сегодня",
"tstat_last_week" => "На этой неделе",
"tstat_last_month" => "В этом месяце",
"tstat_last_year" => "В этом году (помесячно)",

// Configuration page words and sentences
"config_Variable_name" => "Имя переменной",
"config_Variable_value" => "Значение переменной",
"config_Explanations" => "Пояснение",

"config_bbc_mainsite" =>
"Если эта переменная установлена, то будет создана ссылка на указанное место. Значение
по умолчанию указывает на родительскую директорию. Если Ваш сайт расположен где-то в другом месте,
Вы, вероятно, захотите изменить значение переменной на удовлетворяющее Вашим требованиям.
<br />
Примеры:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"По умолчанию BBClone показывает настройки сбора и отображения статистики.
В случае, если это поведение Вас не устраивает, Вы можете запретить просмотр настроек, деактивируя эту опцию.
<br />
Примеры:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Заголовок, который будет отображаться в навигационной полосе всех
страниц BBClone.<br />
Общеприняты нижеперечисленные макросы:<br />
<ul>
<li>%SERVER:&nbsp; имя сервера,</li>
<li>%DATE: текущая дата.</li>
</ul>
Тэги HTML тоже доступны.<br />
Examples:<br />
\$BBC_TITLEBAR = &quot;Statistics for %SERVER generated the %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;My stats from %DATE look like this:&quot;;
<br />",

"config_bbc_language" =>
"Язык BBClone по умолчанию в случае, если он не определен браузером автоматически.
Поддерживаются следующие языки:
<p>bg, ca, cs, da, de, el, en, es, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"Эта переменна определяет продолжительность каждого уникального посещения в
секундах. Каждый хит от одного и того же посетителя в течение этого периода
будет считаться за одно посещение до тех пор, пока пауза между двумя
последовательными хитами не превысит указанного значения. По умолчанию выставлен
стандарт de facto для web в 30 минут (1800 секунд), но, в зависимости от Ваших нужд,
Вы можете выставить другое значение.<br />
Примеры:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Сколько значений Вы хотите видеть в детальной статистике? По умолчанию - 100.
Не рекомендуется выставлять это значение больше 500 во избежание излишней нагрузки.",

"config_bbc_detailed_stat_fields" =>
"Переменная \$BBC_DETAILED_STAT_FIELDS определяет, какие колонки должны отображаться
в детальной статистике. Возможны следующие варианты:
<ul>
<li>id&nbsp;=&gt;&nbsp;Посетитель № X с момента установки BBclone</li>
<li>time&nbsp;=&gt;&nbsp;Время регистрации последнего хита</li>
<li>visits&nbsp;=&gt;&nbsp;Хиты уникального посетителя</li>
<li>dns&nbsp;=&gt;&nbsp;Хост посетителя</li>
<li>ip&nbsp;=&gt;&nbsp;IP адрес посетителя</li>
<li>os&nbsp;=&gt;&nbsp;Операционная Система (если доступно, или название робота)</li>
<li>browser&nbsp;=&gt;&nbsp;Програмное обеспечение, использованное для установления соединения</li>
<li>ext&nbsp;=&gt;&nbsp;Страна посетителя или корневое доменное имя</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
Столбцы будут отображаться в том порядке, в котором Вы укажете их названия.<br />
Примеры:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Если время сервера не совпадает с Вашим локальным временем, то с помощью этой опции Вы можете
установить нужное время. Отрицательные значения сдвинут время назад, положительные - вперед.<br />
Примеры:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Эта опция определяет, следует ли резолвить IP посетителей в хосты. И хотя
хосты говорят больше о посетителях, розолвинг может значительно замедлить
работу Вашего сайта, если используемый для резолвинга DNS сервер медленно
работает, ограничен в возможностях или ненадежен по другим причинам. Установка
значения для этой опции поможет решить проблему.<br />
Примеры:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"По умолчанию BBClone показывает хиты в статистике по времени, поскольку это дает полезное
представление о фактической загрузке сервера. Однако же, если Вы предпочтете считать
статистику по времени по уникальным посетителям, Вы можете изменить способ подсчета, установив
этоу переменную.<br />
Примеры:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Эта опция может быть использована, чтобы отключить сбор статистики для конкретных IP адресов
или диапазонов адресов. Для разделения нескольких записей используйте запятые.<br />
Примеры:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"В случае, если Вы не хотите, чтобы отдельные ссылающиеся страницы, с которых
пришлм Ваши посетители, были отображены в рейтинге или в детальной статистике,
Вы можете задать одно или несколько ключевых слов, по которым будет блокироваться
ссылающаяся страница. Если Вы хотите назначить несколько ключевых слов - разделяйте
их запятыми.<br />
Примеры:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"You can use this option to determine the treatment of robots. The default is
to ignore them in the top hosts ranking but leave them in the remaining
stats. If you don't want to see any robots at all you can set this option to
&quot;2&quot;, then only human visits will be taken into account.<br />
Примеры:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Эта опция определяет, как BBClone отличает одного посетителя от другого. По умолчанию используется IP
адрес. В большинстве случаев этого хватает для создания реалистичной картины. Однако, если зачастую
Ваши посетители скрываются за прокси-серверами, деактивация этой опции обеспечит лучшую картину, ибо
каждая смена user agent'а будет означать появление нового посетителя.<br />
Примеры:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"В случае, если Вы вдруг захотите сбросить всю статистику, установите значение этой опции, и при
следующем посещении сайта вся статистика сбросится. Не забудьте потом деактивировать эту опцию, иначе
статистика собираться не будет. ;)<br />
Примеры:<br />
\$BBC_KILL_STATS = 1;<br />
\$BBC_KILL_STATS = &quot;&quot;;",

"config_bbc_purge_single" =>
"Статистика по хостам и ссылающимся страницам может генерировать большое количество данных, в большинстве случаев причиной тому
единовременные посетители. Устанавив эту опцию, Вы можете очистить эти записи и существенно сократить размер access.php без вреда
видимой стаистике по хостам и ссылкам. Число хитов будет добавлено к записям &quot;not_specified&quot;, чтобы не нарушить общий счет.<br />
Примеры:<br />
\$BBC_PURGE_SINGLE = 1;<br />
\$BBC_PURGE_SINGLE = &quot;&quot;;"

);
?>