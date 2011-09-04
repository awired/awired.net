<?php
##########################################
# AkoComment - A User Comments Component #
# (C)opyright  2004  by  Arthur  Konze   #
# Homepage : www.mamboportal.com         #
# Version  : 1.0 beta 1                  #
# License  : Copyright, don't distribute #
##########################################
# Translation: Joern Gerken              #
# Homepage   : www.joomladijoomlada.com  #
##########################################

// no direct access
defined( '_VALID_MOS' ) or die( 'Beschr&auml;nkter Zugang.' );

// Header language definitions
DEFINE("_AKOCOMMENT_WRITECOMMENT","Kommentar schreiben");
DEFINE("_AKOCOMMENT_WRITEFIRSTCOMMENT","Artikel kommentieren");
DEFINE("_AKOCOMMENT_QUOTETHISARTICLE","Artikel zitieren");
DEFINE("_AKOCOMMENT_CREATELINK","Um einen Link zu diesem Artikel zu setzen,<br />kopiere bitte den folgenden Code in den HTML-Code Deiner Seite oder Deines Artikels.");
DEFINE("_AKOCOMMENT_PREVIEWQUOTE","Vorschau :");
DEFINE("_AKOCOMMENT_GOBACKITEM","Zur&uuml;ck zum Artikel");
DEFINE("_AKOCOMMENT_RSS","RSS Kommentare");
DEFINE("_AKOCOMMENT_RSS_LASTCOMMENTS","Letzte Kommentare");
DEFINE("_AKOCOMMENT_RSS_COMMENTON","Kommentieren");
DEFINE("_AKOCOMMENT_RSS_VIEWCOMMENT","Kommentare zeigen");
DEFINE("_AKOCOMMENT_SAVED4UNPUBLISHED","Dein Kommentar wurde gespeichert und einem Administrator zugestellt. Bei Regelverst&ouml;ssen erfolgt keine Ver&ouml;ffentlichung.");
DEFINE("_AKOCOMMENT_GOHOME","Zur Homepage");
DEFINE("_AKOCOMMENT_YOURFAVOURED","Deine Favoriten");
DEFINE("_AKOCOMMENT_YOURFAVOUREDUSER","Deine favorisierten Artikel");
DEFINE("_AKOCOMMENT_FAVOUREDUSERMUSTLOGIN","Nur registrierte Benutzer k&ouml;nnen Favoriten hinzuf&uuml;gen.<br />Bitte melde Dich an oder registriere Dich.");
DEFINE("_AKOCOMMENT_FAVOURED","Favorisiert");
DEFINE("_AKOCOMMENT_ADDFAVOURED","Zu Favoriten hinzuf&uuml;gen");
DEFINE("_AKOCOMMENT_RECOMMENDTHISARTICLE","Artikel favorisiert.");
DEFINE("_AKOCOMMENT_YOUHAVEFAVOUREDTHISARTICLE","Du hast diesen Artikel bereits zu Deinen Favoriten hinzugef&uuml;gt.");
DEFINE("_AKOCOMMENT_THANKFAVOURED","Danke f&uuml;r Deine Favorisierung.");
DEFINE("_AKOCOMMENT_FAVOUREDREMOVE","L&ouml;schen");
DEFINE("_AKOCOMMENT_NOFAVOURED","Keine Favoriten");
DEFINE("_AKOCOMMENT_WHATYOUWANT","Was m&ouml;chtest Du tun ?");
DEFINE("_AKOCOMMENT_FAVOUREDONLYREGISTERED","Nur registrierte Benutzer k&ouml;nnen favorisieren. <br />Bitte melde Dich an oder registriere Dich.");
DEFINE("_AKOCOMMENT_MAILMENEWADDCOMMENT","Ich m&ouml;chte NICHT per e-Mail &uuml;ber weitere Kommentare zu diesem Artikel informiert werden.");
DEFINE("_AKOCOMMENT_REGISTERED","Registriert");
DEFINE("_AKOCOMMENT_GUEST","Gast");
DEFINE("_AKOCOMMENT_HITS_VIEWS","Aufgerufen: ");
DEFINE("_AKOCOMMENT_REPORT","Melden");
DEFINE("_AKOCOMMENT_REPORTACOMMENT","Einen Kommentar melden");
DEFINE("_AKOCOMMENT_REPORTINTRO","Danke, da&szlig; Du Dir die Zeit genommen haben, diesen Kommentar an den Administrator dieser Seite zu melden.");
DEFINE("_AKOCOMMENT_REPORTINTRO2","Bitte vervollst&auml;ndige dieses Formular und klicke anschlie&szlig;end auf den Senden Button, um Deine Meldung abzuschlie&szlig;en.");
DEFINE("_AKOCOMMENT_REASON_REPORT","Grund f&uuml;r Deine Meldung");
DEFINE("_AKOCOMMENT_COMMENTINQUESTION","Fragen oder Hinweise zum Kommentar");
DEFINE("_AKOCOMMENT_THANKS4UREPORT","Danke. Deine Meldung wurde an den Administrator dieser Seite weitergeleitet.");
DEFINE("_AKOCOMMENT_BUTTON_REPORT","Senden");
DEFINE("_AKOCOMMENT_REPORTONCOMMENT","Kommentarmeldung");
DEFINE("_AKOCOMMENT_REPORTADMINEMAIL","ein Benutzer hat den folgenden Kommentar gemeldet:");
DEFINE("_AKOCOMMENT_FORMREPORTVALIDATE","Bitte gebe einen Grund f&uuml;r die Meldung des Kommentars an.");

// Email language definitions for subscribe new comment
DEFINE("_AKOCOMMENT_SUBSCRIBEMAILHEADER","Neuer Kommentar");
DEFINE("_AKOCOMMENT_SUBSCRIBEMAIL","Hallo,\n\nein Benutzer hat einen neuen Kommentar zu einem Artikel hinzugef&uuml;gt. Du findest den Artikel auf $mosConfig_live_site:\n");
DEFINE("_AKOCOMMENT_SUBSCRIBEMAILFOOTER","Bitte antworte nicht auf diese Nachricht. Sie wurde automatisch generiert und dient ausschlie&szlig;lich zu Deiner Information.\n");

DEFINE("_AKOCOMMENT_WRITEPOLICY","<ul><li>Bitte orientiere Deinen Kommentar am Thema des Beitrages.</li><li>Pers&ouml;nliche Angriffe und/oder Diffamierungen werden gel&ouml;scht.</li><li>Das Benutzen der Kommentarfunktion f&uuml;r Werbezwecke ist nicht gestattet. Entsprechende Kommentare werden gel&ouml;scht.</li><li>Bei Fehleingaben lade diese Seite bitte neu, damit ein neuer Sicherheitscode generiert werden kann. Erst dann klicke bitte auf den 'Senden' Button.</li><li>Der vorgenannte Schritt ist nur erforderlich, wenn Sie einen falschen Sicherheitscode eingegeben haben.</li></ul>");
DEFINE("_AKOCOMMENT_COMMENTS","Kommentare");
DEFINE("_AKOCOMMENT_ONLYREGISTERED","Nur registrierte Benutzer k&ouml;nnen Kommentare schreiben.<br />Bitte melde Dich an oder registriere Dich.");

// Comment language definitions
DEFINE("_AKOCOMMENT_WRITTENBY","Geschrieben von:");
DEFINE("_AKOCOMMENT_ON","am");

// Form language definitions
DEFINE("_AKOCOMMENT_GUESTNAME","Gast");
DEFINE("_AKOCOMMENT_ENTERNAME","Name:");
define('_AKOCOMMENT_ENTERMAIL', 'e-mail'); 
define('_AKOCOMMENT_ENTERSITE', 'Homepage'); 
DEFINE("_AKOCOMMENT_ENTERTITLE","Titel:");
DEFINE("_AKOCOMMENT_ENTERTEXT","Kommentar:");
DEFINE("_AKOCOMMENT_SENDFORM","Senden");
DEFINE("_AKOCOMMENT_CLEARFORM","L&ouml;schen");
DEFINE("_AKOCOMMENT_FORMVALIDATE","Bitte gebe einen Kommentar ein!");
DEFINE("_AKOCOMMENT_FORMVALIDATENAME","Bitte gebe einen Namen ein!");

// Spamfix definitions
DEFINE("_AKOCOMMENT_ENTERCODE","Sicherheitscode:");
DEFINE("_AKOCOMMENT_CODEDESCRIPTION","Bitte den angezeigten Code eingeben.");
DEFINE("_AKOCOMMENT_CODEIMAGE","Bitte diesen Sicherheitscode in dem linken Feld eingeben.");
DEFINE("_AKOCOMMENT_CODEWRONG","Falscher Sicherheitscode!");

// Save language definitions
DEFINE("_AKOCOMMENT_SAVED","Dein Kommentar zu dem Artikel wurde gespeichert! Wenn Dein Kommentar nicht in Zusammenhang mit dem obigen Artikel steht, wird er gel&ouml;scht.");

// Email language definitions
DEFINE("_AKOCOMMENT_ADMINMAILHEADER","Neuer Kommentar");
DEFINE("_AKOCOMMENT_ADMINMAIL","Hallo Admin,\n\nein Benutzer hat gerade einen Kommentar zu einem Artikel auf $mosConfig_live_site:\n eingef&uuml;gt.");
DEFINE("_AKOCOMMENT_ADMINMAILFOOTER","Bitte antworte nicht auf diese Nachricht. Sie wurde automatisch generiert und dient ausschlie&szlig;lich zu Deiner Information.\n");

?>