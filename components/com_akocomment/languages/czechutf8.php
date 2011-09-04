<?php
##########################################
# AkoComment - A User Comments Component #
# (C)opyright  2004  by  Arthur  Konze   #
# Homepage : www.mamboportal.com         #
# Version  : 1.0 beta 1                  #
# License  : Copyright, don't distribute #
##########################################
# Translation: MartinCZ - Martin Petrasek#
# Homepage   : www.petrasek.info         #
##########################################

// Header language definitions
DEFINE("_AKOCOMMENT_WRITECOMMENT","<br>Přidat komentář");
DEFINE("_AKOCOMMENT_WRITEFIRSTCOMMENT","Napište první komentář");
DEFINE("_AKOCOMMENT_QUOTETHISARTICLE","Citujte tento článek na svých webovkách");
DEFINE("_AKOCOMMENT_CREATELINK","Abyste vytvořili odkaz na tento článek na svých www stránkách,<br />okopírujte tento html kód na vaše stránky.");
DEFINE("_AKOCOMMENT_PREVIEWQUOTE","Náhled :");
DEFINE("_AKOCOMMENT_GOBACKITEM","Zpět na článek");
DEFINE("_AKOCOMMENT_RSS","RSS komentáře");
DEFINE("_AKOCOMMENT_RSS_LASTCOMMENTS","poslední komentáře");
DEFINE("_AKOCOMMENT_RSS_COMMENTON","Komentováno");
DEFINE("_AKOCOMMENT_RSS_VIEWCOMMENT","prohlédnout komentář");
DEFINE("_AKOCOMMENT_SAVED4UNPUBLISHED","Komentář uložen. Komentář bude možná publikován až po prohlédnutí správcem.");
DEFINE("_AKOCOMMENT_GOHOME","Na domácí stránku");
DEFINE("_AKOCOMMENT_YOURFAVOURED","Oblíbené");
DEFINE("_AKOCOMMENT_YOURFAVOUREDUSER","Vaše oblíbené články");
DEFINE("_AKOCOMMENT_FAVOUREDUSERMUSTLOGIN","Jen registrovaní mohou označit komentáře jako oblíbené.<br />Přihlaste se nebo rgistrujte.");
DEFINE("_AKOCOMMENT_FAVOURED","Oblíbený");
DEFINE("_AKOCOMMENT_ADDFAVOURED","Přidat jako oblíbený");
DEFINE("_AKOCOMMENT_RECOMMENDTHISARTICLE","Doporučit článek");
DEFINE("_AKOCOMMENT_YOUHAVEFAVOUREDTHISARTICLE","Již jej máte jako oblíbený");
DEFINE("_AKOCOMMENT_THANKFAVOURED","Děkujeme za vaše doporučení");
DEFINE("_AKOCOMMENT_FAVOUREDREMOVE","Odstranit");
DEFINE("_AKOCOMMENT_NOFAVOURED","žádný oblíbený");
DEFINE("_AKOCOMMENT_WHATYOUWANT","Co byste chtěli ?");
DEFINE("_AKOCOMMENT_FAVOUREDONLYREGISTERED","Jen registrovaná mohou označit jako oblíbený. Přihlašte se nebo registrujte.");
DEFINE("_AKOCOMMENT_MAILMENEWADDCOMMENT","Chci být informován emailem o budoucích komentářích");
DEFINE("_AKOCOMMENT_REGISTERED","Registrovaný");
DEFINE("_AKOCOMMENT_GUEST","Host");
DEFINE("_AKOCOMMENT_HITS_VIEWS","Shlédnutí: ");
DEFINE("_AKOCOMMENT_REPORT","Stížnost");
DEFINE("_AKOCOMMENT_REPORTACOMMENT","Stížnost na obsah komentáře");
DEFINE("_AKOCOMMENT_REPORTINTRO","Děkujeme za váš čas věnovaný oznámení tohoto komentáře administrátorovi.");
DEFINE("_AKOCOMMENT_REPORTINTRO2","Prosím vyplňte tento krátký formulář a po té jej odešlete přímo admnistrátorovi.");
DEFINE("_AKOCOMMENT_REASON_REPORT","Důvod stížnosti na komentář");
DEFINE("_AKOCOMMENT_COMMENTINQUESTION","Ohlašovaný komentář");
DEFINE("_AKOCOMMENT_THANKS4UREPORT","Děkujeme, zpráva byla odeslána administrátorovi.");
DEFINE("_AKOCOMMENT_BUTTON_REPORT","Odeslat");
DEFINE("_AKOCOMMENT_REPORTONCOMMENT","Stiznosti na komentar");
DEFINE("_AKOCOMMENT_REPORTADMINEMAIL","Uzivatel si stezoval na nasledujici komentar:");
DEFINE("_AKOCOMMENT_FORMREPORTVALIDATE","Prosím napište důvod své stížnosti.");

// Email language definitions for subscribe new comment
DEFINE("_AKOCOMMENT_SUBSCRIBEMAILHEADER","Novy komentar");
DEFINE("_AKOCOMMENT_SUBSCRIBEMAIL","Dobra den,\n\nNejaky uzivatel komentoval clanek na serveru $mosConfig_live_site:\n");
DEFINE("_AKOCOMMENT_SUBSCRIBEMAILFOOTER","Na tento email prosim neodpovidejte, nebot je generovan automaticky.\n");

DEFINE("_AKOCOMMENT_WRITEPOLICY","<ul><li>Komentujte prosím relevantě k obsahu článku.</li><li>Vyplnění položek označených hvězdičkou je povinné.</li></ul>");
DEFINE("_AKOCOMMENT_COMMENTS","Komentáře");
DEFINE("_AKOCOMMENT_ONLYREGISTERED","Pouze registrovaní uživatelé mohou přidat komentář.<br />Prosím přihlašte se nebo se zaregistrujte..");

// Comment language definitions
DEFINE("_AKOCOMMENT_WRITTENBY","Přidal");
DEFINE("_AKOCOMMENT_ON"," ");

// Form language definitions
DEFINE("_AKOCOMMENT_GUESTNAME","Host");
DEFINE("_AKOCOMMENT_ENTERNAME","Jméno:*");
DEFINE('_AKOCOMMENT_ENTERMAIL', 'E-mail:'); 
DEFINE('_AKOCOMMENT_ENTERSITE', 'WWW:'); 
DEFINE("_AKOCOMMENT_ENTERTITLE","Předmět:");
DEFINE("_AKOCOMMENT_ENTERTEXT","Komentář:*");
DEFINE("_AKOCOMMENT_SENDFORM","Odeslat");
DEFINE("_AKOCOMMENT_CLEARFORM","Vymazat");
DEFINE("_AKOCOMMENT_FORMVALIDATE","Napište prosím komentář!");
DEFINE("_AKOCOMMENT_FORMVALIDATENAME","Vyplňte prosím jméno!");

// Spamfix definitions
DEFINE("_AKOCOMMENT_ENTERCODE","Kód:*");
DEFINE("_AKOCOMMENT_CODEDESCRIPTION","Napište zobrazený kód");
DEFINE("_AKOCOMMENT_CODEIMAGE","Napište tento kód do levého pole");
DEFINE("_AKOCOMMENT_CODEWRONG","Špatný bezpečnostní kód!");

// Save language definitions
DEFINE("_AKOCOMMENT_SAVED","Komentář byl uložen! Pokud komentář nesouvisí s předmětem článku, bude vymazán");

// Email language definitions
DEFINE("_AKOCOMMENT_ADMINMAILHEADER","Novy komentar");
DEFINE("_AKOCOMMENT_ADMINMAIL","Dobry den,\n\nNejaky uzivatel komentoval clanek na $mosConfig_live_site:\n");
DEFINE("_AKOCOMMENT_ADMINMAILFOOTER","Neodpovidejte prosim na tento email, je automaticky generovan.\n");

?>
