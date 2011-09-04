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
"Δεν επιτρέπετε να δείτε τις ρυθμίσεις του BBClone σε αυτόν το server.",

// Address Extensions
"numeric" => "Αριθμός", "com" => "Εμπορική",
"net" => "Δίκτυα", "edu" => "Εκπαιδευτική",
"biz" => "ΕΠαγγελματικό", "info" => "Πληροφοριακή",
"name" => "Προσωπιπκό", "ps" => "Παλαιστινιακή",
"jp" => "Ιαπωνία", "us" => "Η.Π.Α.",
"uk" => "Μ.ΒΡετανία", "de" => "Γερμανία",
"mil" => "Στρατός ΗΠΑ", "ca" => "Καναδάς",
"it" => "Ιταλία", "au" => "Αυστραλία",
"org" => "Οργανισμοί", "nl" => "Ολλανδία",
"fr" => "Γαλλία", "tw" => "Ταϊβάν",
"gov" => "Κυβέρνηση ΗΠΑ", "fi" => "Φιλανδία",
"br" => "Βραζιλία", "se" => "Σουηδία",
"es" => "Ισπανία", "no" => "Νορβηγία",
"mx" => "Μεξικό", "kr" => "Κορέα",
"ch" => "Ελβετία", "dk" => "Δανία",
"be" => "Βέλγιο", "at" => "Αυστρία",
"nz" => "Νέα Ζηλανδία", "ru" => "Ρωσία",
"pl" => "Πολωνία", "za" => "Νότια Αφρική",
"unknown" => "Aγνωστη", "ar" => "Αργεντινή",
"il" => "Ισραήλ", "sg" => "Σινγκαπούρη",
"arpa" => "Arpa", "cz" => "Τσεχία",
"hu" => "Ουγγαρία", "hk" => "Χονγκ Κονγκ",
"pt" => "Πορτογαλία", "tr" => "Τουρκία",
"gr" => "Ελλάδα", "cn" => "Κίνα",
"ie" => "Ιρλανδία", "my" => "Μαλαισία",
"th" => "Ταϊλάνδη", "cl" => "Χιλή",
"co" => "Κολομβία", "is" => "Ισλανδία",
"uy" => "Ουρουγουάη", "ee" => "Εσθονία",
"in" => "Ινδία", "ua" => "Ουκρανία",
"sk" => "Σλοβακία", "ro" => "Ρουμανία",
"ae" => "Ηνωμένα Αραβικά Εμιράτα", "id" => "Ινδονησία",
"su" => "Σοβιετική Ένωση", "si" => "Σλοβενία",
"hr" => "Κροατία", "ph" => "Φιλλιπίνες",
"lv" => "Λετονία", "ve" => "Βενεζουέλα",
"bg" => "Βουλγαρία", "lt" => "Λιθουανία",
"yu" => "Serbia and Montenegro", "lu" => "Λουξεμβούργο",
"nu" => "Niue", "pe" => "Περού",
"cr" => "Κόστα Ρίκα", "int" => "Δειθνείς Οργανισμοί",
"do" => "Δομινικανή Δημοκρατία", "cy" => "Κύπρος",
"pk" => "Πακιστάν", "cc" => "Νησιά Coco",
"tt" => "Τρινιδάδ και Τομπάγκο", "eg" => "Αίγυπτος",
"lb" => "Λίβανος", "kw" => "Κουβέιτ",
"to" => "Τόνγκα", "kz" => "Καζακστάν",
"na" => "Ναμίμπια", "mu" => "Μαυρίκιος",
"bm" => "Βερμούδες", "sa" => "Σαουδική Αραβία",
"zw" => "Ζιμπάμπουε", "kg" => "Kyrgyzstan",
"cx" => "Christmas Island", "pa" => "Παναμάς",
"gt" => "Γουατεμάλα", "bw" => "Μποτσουάνα",
"mk" => "Μακεδονία (Π.Γ.Δ.Μ.)", "gl" => "Greenland",
"ec" => "Ecuador", "lk" => "Sri Lanka",
"md" => "Moldova", "py" => "Paraguay",
"bo" => "Bolivia", "bn" => "Brunei",
"mt" => "Malta", "fo" => "Faroe Islands",
"ac" => "Ascension Island", "pr" => "Puerto Rico",
"am" => "Armenia", "pf" => "French Polynesia",
"ge" => "Georgia", "bh" => "Bahrain",
"ni" => "Νικαράγουα", "by" => "Belarus",
"sv" => "El Salvador", "ma" => "Morocco",
"ke" => "Kenya", "ad" => "Andorra",
"zm" => "Zambia", "np" => "Nepal",
"bt" => "Bhutan", "sz" => "Swaziland",
"ba" => "Bosnia and Herzegovina", "om" => "Oman",
"jo" => "Jordan", "ir" => "Iran",
"st" => "Sao Tome and Principe", "vi" => "Virgin Islands (US)",
"ci" => "Ivory Coast", "jm" => "Τζαμάικα",
"li" => "Liechtenstein", "ky" => "Cayman Islands",
"gp" => "Guadeloupe", "mg" => "Madagascar",
"gi" => "Γιβραλτάρ", "sm" => "San Marino",
"as" => "American Samoa", "tz" => "Τανζανία",
"ws" => "Samoa", "tm" => "Turkmenistan",
"mc" => "Μονακό", "sn" => "Senegal",
"hm" => "Heard and Mc Donald Islands", "fm" => "Micronesia",
"fj" => "Φίτζι", "cu" => "Κούβα",
"rw" => "Rwanda", "mq" => "Martinique",
"ai" => "Anguilla", "pg" => "Papua New Guinea",
"bz" => "Belize", "sh" => "St. Helena",
"aw" => "Aruba", "mv" => "Maldives",
"nc" => "New Caledonia", "ag" => "Antigua and Barbuda",
"uz" => "Ουζμπεκιστάν", "tj" => "Tajikistan",
"sb" => "Solomon Islands", "bf" => "Μπουρκίνα Φάσο",
"kh" => "Cambodia", "tc" => "Turks and Caicos Islands",
"tf" => "French Southern Territories", "az" => "Azerbaijan",
"dm" => "Dominica", "mz" => "Mozambique",
"mo" => "Macau", "vu" => "Vanuatu",
"mn" => "Mongolia", "ug" => "Ουγκάντα",
"tg" => "Togo", "ms" => "Montserrat",
"ne" => "Νίγηρας", "gf" => "French Guiana",
"gu" => "Guam", "hn" => "Ονδούρες",
"al" => "Αλβανία", "gh" => "Γκάνα",
"nf" => "Norfolk Island", "io" => "UK Indian Ocean Territory",
"gs" => "South Georgia and the South Sandwich Islands", "ye" => "Υεμένη",
"an" => "Netherlands Antilles", "aq" => "Ανταρκτική",
"tn" => "Tunisia", "ck" => "Νησιά Cook",
"ls" => "Lesotho", "et" => "Ethiopia",
"ng" => "Νιγηρία", "sl" => "Σιέρρα Λεόνε",
"bb" => "Μπαρμπάντος", "je" => "Jersey",
"vg" => "Virgin Islands (UK)", "vn" => "Βιετνάμ",
"mr" => "Mauritania", "gy" => "Guyana",
"ml" => "Mali", "ki" => "Kiribati",
"tv" => "Tuvalu", "dj" => "Djibouti",
"km" => "Comoros", "dz" => "Αλγερία",
"im" => "Isle of Man", "pn" => "Pitcairn",
"qa" => "Κατάρ", "gg" => "Guernsey",
"bj" => "Benin", "ga" => "Γκαμπόν",
"gb" => "United Kingdom", "bs" => "Bahamas",
"va" => "Vatican State", "lc" => "Saint Lucia",
"cd" => "Κόνγκο", "gm" => "Γκάμπια",
"mp" => "Northern Mariana Islands", "gw" => "Guinea-Bissau",
"cm" => "Καμερούν", "ao" => "Ανγκόλα",
"er" => "Eritrea", "ly" => "Libya",
"cf" => "Central African Republic", "mm" => "Myanmar",
"td" => "Chad", "iq" => "Ιράκ",
"kn" => "Saint Kitts and Nevis", "sc" => "Seychelles",
"cg" => "Κονγκό", "gd" => "Γρενάδα",
"nr" => "Nauru", "af" => "Αφγανιστάν",
"cv" => "Cape Verde", "mh" => "Marshall Islands",
"pm" => "St. Pierre and Miquelon", "so" => "Σομαλία",
"vc" => "St. Vincent and the Grenadines", "bd" => "Bangladesh",
"gn" => "Γουινέα", "ht" => "Αϊτή",
"la" => "Λάος", "lr" => "Liberia",
"mw" => "Malawi", "pw" => "Palau",
"re" => "Reunion", "tk" => "Tokelau",
"bi" => "Burundi", "bv" => "Bouvet Island",
"fk" => "Νησιά Falkland", "gq" => "Equatorial Guinea",
"sd" => "Σουδάν", "sj" => "Svalbard and Jan Mayen Islands",
"sr" => "Σουρινάμ", "sy" => "Συρία",
"tp" => "Ανατολικό Τιμόρ", "um" => "US Minor Outlying Islands",
"wf" => "Wallis and Futuna Islands", "yt" => "Mayotte",
"zr" => "Ζαϊρ",

// Miscellaneous translations
"misc_other" => "’λλο",
"misc_unknown" => "’γνωστο",
"misc_second_unit" => "s",

// The Navigation Bar
"navbar_Main_Site" => "Κεντρική σελίδα",
"navbar_Configuration" => "Ρυθμίσεις",
"navbar_Global_Stats" => "Συνολικά στατιστικά",
"navbar_Detailed_Stats" => "Λεπτομερή στατιστικά",
"navbar_Time_Stats" => "Χρονικά Στατιστικά",

// Detailed stats words
"dstat_id" => "ID",
"dstat_time" => "Χρόνος",
"dstat_visits" => "Επισκέψεις",
"dstat_extension" => "Επέκταση",
"dstat_dns" => "Hostname",
"dstat_from" => "Από",
"dstat_os" => "Λειτουργικό Σύστημα",
"dstat_browser" => "Browser",
"dstat_visible_rows" => "Επισκέψεις που εμφανίζονται",
"dstat_green_rows" => "Πράσινες γραμμές",
"dstat_blue_rows" => "Μπλε γραμμές",
"dstat_red_rows" => "Κόκκινες γραμμές",
"dstat_last_visit" => "Τελευταία Επίσκεψη",
"dstat_robots" => "Robots",
"dstat_no_data" => "Δεν υπάρχουν δεδομένα",
"dstat_prx" => "Proxy Server",
"dstat_ip" => "IP Διεύθυνση",
"dstat_user_agent" => "User Agent",
"dstat_nr" => "Nr",
"dstat_pages" => "Σελίδες",
"dstat_visit_length" => "Διάρκεια Επίσκεψης",
"dstat_reloads" => "Ανανεώσεις",

// Global stats words
"gstat_Accesses" => "Επισκέψεις",
"gstat_Total_visits" => "Συνολικές Επισκέψεις",
"gstat_Total_unique" => "Συνολικές Μοναδικές",
"gstat_Operating_systems" => "Πρώτα %d Λειτουργικά Συστήματα",
"gstat_Browsers" => "Πρώτοι %d Browsers",
"gstat_extensions" => "Πρώτες %d Επεκτάσεις",
"gstat_Robots" => "Πρώτα %d Robots",
"gstat_pages" => "Πρώτες %d σελίδες",
"gstat_origins" => "Πρώτες %d Προελεύσεις",
"gstat_hosts" => "Πρώτοι %d Hosts",
"gstat_keys" => "Top %d Keywords",
"gstat_Total" => "Συνολικά",
"gstat_Not_specified" => "Δεν διευκρινίζεται",

// Time stats words
"tstat_Su" => "Κυρ",
"tstat_Mo" => "Δευ",
"tstat_Tu" => "Τρι",
"tstat_We" => "Τετ",
"tstat_Th" => "Πεμ",
"tstat_Fr" => "Παρ",
"tstat_Sa" => "Σαβ",

"tstat_Jan" => "Ιαν",
"tstat_Feb" => "Φεβ",
"tstat_Mar" => "Μαρ",
"tstat_Apr" => "Απρ",
"tstat_May" => "Μαι",
"tstat_Jun" => "Ιουν",
"tstat_Jul" => "Ιουλ",
"tstat_Aug" => "Αυγ",
"tstat_Sep" => "Σεπ",
"tstat_Oct" => "Οκτ",
"tstat_Nov" => "Νοβ",
"tstat_Dec" => "Δεκ",

"tstat_last_day" => "Τελευταία μέρα",
"tstat_last_week" => "Τελευταία εβδομάδα",
"tstat_last_month" => "Τελευταίος μήνας",
"tstat_last_year" => "Τελευταίος χρόνος",

// Configuration page words and sentences
"config_Variable_name" => "Όνομα μεταβλητής",
"config_Variable_value" => "Όνομα μεταβλητής",
"config_Explanations" => "Εξήγηση",

"config_bbc_mainsite" =>
"Αν αυτή η μεταβλητή έχει τεθεί, ένα link στη συγκεκριμένη τοποθεσία θα παραχθεί. Η default αξία 'δείχνει' στο parent directory. Στην περίπτωση που το κεντρικό site βρίσκεται αλλού, πρέπει πιθανότατα να ρυθμίστε την αξία της ώστε να ταιριάζει στις ανάγκες σας.<br />
Παραδείγματα:<br />
\$BBC_MAINSITE = &quot;http://www.myserver.com/&quot;<br />
\$BBC_MAINSITE = &quot;..&quot;<br />
\$BBC_MAINSITE = &quot;&quot;;",

"config_bbc_show_config" =>
"Το BBClone έχειο σαν default την εμφάνιση των ρυθμίσεων των στατιστικών. Αν δεν επιθυμείτε αυτήν τη συμπεριφορά μπορείτε να αρνηθείτε την πρόσβαση απενεργοποιώντας την επιλογή.<br />
Παραδείγματα:<br />
\$BBC_SHOW_CONFIG = 1;<br />
\$BBC_SHOW_CONFIG = &quot;&quot;;",

"config_bbc_titlebar" =>
"Ο τίτλος των αρχικών σας σελίδων.<br />
Θα φαίνεται στη μπάρα πλοήγησης όλων των σελίδων του BBClopne<br />
Οι παρακάτω macros αναγνωρίζονται:<br />
<ul>
<li>%SERVER: όνομα server,</li>
<li>%DATE: τρέχουσα ημερομηνία.</li>
</ul>
Τα HTML Tags επιτρέπονται.<br />
Παραδείγματα:<br />
\$BBC_TITLEBAR = &quot;Στατιστικά για το %SERVER στις %DATE&quot;;<br />
\$BBC_TITLEBAR = &quot;Τα στατιστικά μου για την %DATE είναι κάπως έτσι:&quot;;
<br />",

"config_bbc_language" =>
"Η default γλώσσα του BBClone, σε περίπτωση που δεν ρυθμίζεται από το browser.
Οι παρακάτω γλώσσες υποστηρίζονται:
<p>bg, ca, cs, da, de, el, en, es, el, fi, fr, hu, it, ja, lt, nb, nl, pl, pt-br, ro, ru,
se, sl, tr and zh-cn</p>",

"config_bbc_maxtime" =>
"Αυτή η μεταβλητή προσδιορίζει τη διάρκεια μιας μοναδικής επίσκεψης σε δευτερόλεπτα. Κάθε επίσκεψη από τον ίδιο επισκέπτη μέσα σε αυτήν την περίοδο θα θεωρείται μία επίσκεψη, όσο δύο συνεχόμενες επισκέψεις δεν θα ξεπερνούν το καθορισμένο όριο. Default είναι το de facto
web standard των 30 λεπτών (1800 δευτερόλεπτα), αλλά εξαρτάται από τις ανάγκες σας μπορείτε να βάλετε διαφορετική αξία.<br />
Παραδείγματα:<br />
\$BBC_MAXTIME = 0;<br />
\$BBC_MAXTIME = 1800;",

"config_bbc_maxvisible" =>
"Πόσες καταχωρήσεις θέλετε να βρίσκοτναι στα λεπτομερή στατιστικά; Η default αξία είναι 100. Προτείνεται να μην το θέσετε περισσότερο από 500 για να αποφύγεται το πολύ βαρύ φόρτωμα.",

"config_bbc_detailed_stat_fields" =>
"Η μεταβλητή \$BBC_DETAILED_STAT_FIELDS καθορίζει της στήλες που θα φαίντονται στα λεπτομερή στατιστικά. Πιθανές στήλες είναι:
<ul>
<li>id&nbsp;=&gt;&nbsp;Ο x-ος επισκέπτης από την ώρα που ξεκινήσατε να μετράτε</li>
<li>time&nbsp;=&gt;&nbsp;Ο χρόνος κατά τον οποίο καταγράφηκε η τελευταία επίσκεψη</li>
<li>visits&nbsp;=&gt;&nbsp;Τα χτυπήματα ενός μοναδικού επισκέπτη</li>
<li>dns&nbsp;=&gt;&nbsp;Το hostname του επισκέπτη</li>
<li>ip&nbsp;=&gt;&nbsp;Η IP διεύθυνση του επισκέπτη</li>
<li>os&nbsp;=&gt;&nbsp;Το λειτουργικό σύστημα (αν είναι διαθέσιμο και όχι robot)</li>
<li>browser&nbsp;=&gt;&nbsp;Το λογισμικό που χρησιμοποιήθηκε για τη σύνδεση
</li>
<li>ext&nbsp;=&gt;&nbsp;Η χώρα ή η επέκταση του επισκέπτη</li>
<li>referer&nbsp;=&gt;&nbsp;The link from which a visitor came (if available)
</li>
</ul>
Ο ίδιος τρόπος που έχετε καθορίσει της στήλες θα χρησιμοποιηθεί και για την προβολή.<br />
Παραδείγματα:<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;id, time, visits, ip, ext, os, browser&quot;;
<br />
\$BBC_DETAILED_STAT_FIELDS = &quot;date, ext, browser, os, ip&quot;;<br />",

"config_bbc_time_offset" =>
"Στην περίπτωση που η ώρα του server δεν ταιριάζει με την τοπική ώρα, μπορείτε να ρυθμίσετε το χρόνο σε λεπτά χρησιμοποιώντας αυτόν το διακόπτη. Αρνητικές αξίες θα γυρίσουν πίσω το χρόνο, θετικές θα τον πάνε μπροστά.<br />
Παραδείγματα:<br />
\$BBC_TIME_OFFSET = 300;<br />
\$BBC_TIME_OFFSET = -300;<br />
\$BBC_TIME_OFFSET = 0;",

"config_bbc_no_dns" =>
"Αυτή η επιλογή καθορίζει, αν οι διευθύνσεις IP θα ανάγονται σε hostnames ή όχι. Ενώ τα hostnames λένε περισσότερα για τον επισκέπτη, η αναγωγή τους μπορεί να καθυστερήσει σημαντικά το site , αν οι DNS servers που χρησιμοποιήθηκαν είναι αργοί, περιορισμένης χωρητικότητας ή γενικότερα αναξιόπιστοι. Η ρύθμιση αυτής της μεταβλητής μπορεί να λύσει το πρόβλημα.<br />
Παραδείγματα:<br />
\$BBC_NO_DNS = 1;<br />
\$BBC_NO_DNS = &quot;&quot;;",

"config_bbc_no_hits" =>
"Το default του BBClone είναι να δείχνει τα hits στα χρονικά στατιστικά, γιατί δίνει μια χρήσιμη εντύπωση για το φόρτο εργασίας του server. Αν, παρ'όλα αυτά προτιμάτε να χρησιμοποιείτε μοναδικές επισκέψεις σαν βάση για τα χρονικά στατιστικά, μπορείτε να αλλάξετε τον τρόπο μέτρησης θέτοντας αυτήν τη μεταβλητή.<br />
Παραδείγματα:<br />
\$BBC_NO_HITS = 1;<br />
\$BBC_NO_HITS = &quot;&quot;;",

"config_bbc_ignore_ip" =>
"Αυτή η επιλογή μπορεί να χρησιμοποιηθεί για τον αποκλεισμό συγκεκριμένων διευθύνσεων IP ή εύρος αυτών από την καταμέτρηση. Στην περίπτωση που προσθέσετε πάνω από μία, χωρίστε τες με κόμμα. <br />
Παραδείγματα:<br />
\$BBC_IGNORE_IP = &quot;127., 192.168.&quot;;<br />
\$BBC_IGNORE_IP = &quot;&quot;;",

"config_bbc_ignore_refer" =>
"Σε περίπτωση που δεν θέλετε να έχετε συγκεκριμένες 'προηγούμενς σελίδες' από τους επισκέπτες σας να φαίνονται σατ λεπτομερή στατιστικά, μπορείτε να σιευκρινίσετε μία ή περισσότερες λέξεις-κλειδιά που χρησιμοποιούνται για να μπλοκαριστεί ή αντίστοιχη 'προηγούμενη σελίδα΄. Αν χρησιμοποιήσετε παραπάνω από μία λέξεις-κλειδιά, χωρίστε τες με κόμμα.<br />
Examples:<br />
\$BBC_IGNORE_REFER = &quot;spambot.org, .escort.&quot;;<br />
\$BBC_IGNORE_REFER = &quot;&quot;;",

"config_bbc_ignore_bots" =>
"You can use this option to determine the treatment of robots. The default is
to ignore them in the top hosts ranking but leave them in the remaining
stats. If you don't want to see any robots at all you can set this option to
&quot;2&quot;, then only human visits will be taken into account.<br />
Παραδείγματα:<br />
\$BBC_IGNORE_BOTS = 2;<br />
\$BBC_IGNORE_BOTS = 1;<br />
\$BBC_IGNORE_BOTS = &quot;&quot;;",

"config_bbc_ignore_agent" =>
"Αυτή η επιλογή καθορίζει πως το BBClone ξεχωρίζει τον ένα επισκέπτη από τον άλλο. Default είναι η χρησιμοποίηση μόνο της διεύθυνσης IP, που προβάλλει ρεαλστικά νούμερα στις περισσότερες περιπτώσεις. Αν παρ' όλα αυτά, οι επισκέπτες είναι συχνά κρυμμένοι πίσω από proxy servers, η απενεργοποίηση αυτής της επιλογής θα προβάλλει πιο ρεαλιστικά νούμερα, εφόσον ένας νέος επισκέπτης θα θεωρείται κάθε φορά που αλλάζει ο user agent.<br />
Παραδείγματα:<br />
\$BBC_IGNORE_AGENT = 1;<br />
\$BBC_IGNORE_AGENT = &quot;&quot;;",

"config_bbc_kill_stats" =>
"Όποτε θέλεις να επανεκινήσεις τα στατιστικά μπορείς να ενεργοποιήσεις αυτό το διακόπτη και θα διαγραφούν με την επόμενη επίσκεψη. Μην ξεχάσεις να τον απενεργοποιήσεις μετά, αλλιώς θα παρατηρήσεις ασυνήθιστα χαμηλή κίνηση στο site ;).<br />
Παραδείγματα:<br />
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