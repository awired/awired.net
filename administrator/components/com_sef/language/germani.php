<?php
//
// Copyright (C) 2004 W.H.Welch
// All rights reserved.
//
// This source file is part of the 404SEF Component, a Mambo 4.5.1
// custom Component By W.H.Welch - http://sef404.sourceforge.net/
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// Please note that the GPL states that any headers in files and
// Copyright notices as well as credits in headers, source files
// and output (screens, prints, etc.) can not be removed.
// You can extend them with your own credits, though...
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// German Translation by M. Stenzel - mastergizmo@arcor.de
//
// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// admin interface
DEFINE('_COM_SEF_CONFIG','404SEFx<br/>Konfiguration');
DEFINE('_COM_SEF_CONFIGDESC','Konfiguriere alle 404SEFx Einstellungen');
DEFINE('_COM_SEF_HELP','404SEFx<br/>Hilfe');
DEFINE('_COM_SEF_HELPDESC','Brauchst du Hilfe mit 404SEFx?');
DEFINE('_COM_SEF_INFO','404SEFx<br/>Dokumentation');
DEFINE('_COM_SEF_INFODESC','Betrachte 404SEF Projekt Zusammenfassung und Dokumentation');
DEFINE('_COM_SEF_VIEWURL','Ansehen/Bearbeiten<br/> der SEF Urls');
DEFINE('_COM_SEF_VIEWURLDESC','Ansehen/Bearbeiten der SEF Urls');
DEFINE('_COM_SEF_VIEW404','Ansehen/Bearbeiten<br/>der 404 Logs');
DEFINE('_COM_SEF_VIEW404DESC','Ansehen/Bearbeiten der 404 Logs');
DEFINE('_COM_SEF_VIEWCUSTOM','Ansehen/Bearbeiten<br/>Eigener Umleitungen(Redirects)');
DEFINE('_COM_SEF_VIEWCUSTOMDESC','Ansehen/Bearbeiten Eigener Umleitungen(Redirects)');
DEFINE('_COM_SEF_SUPPORT','Support<br/>Homepage');
DEFINE('_COM_SEF_SUPPORTDESC','Verbinde dich zur 404SEFx Homepage (neues Fenster)');
DEFINE('_COM_SEF_BACK','Zur&uuml;ck zur 404SEFx Konfigurations&uuml;bersicht');
DEFINE('_COM_SEF_PURGEURL','SEF Urls<br/>l&ouml;schen');
DEFINE('_COM_SEF_PURGEURLDESC','SEF Urls l&ouml;schen');
DEFINE('_COM_SEF_PURGE404','404 Logs <br/>l&ouml;schen');
DEFINE('_COM_SEF_PURGE404DESC','404 Logs l&ouml;schen');
DEFINE('_COM_SEF_PURGECUSTOM','Eigene Umleitungen<br/>l&ouml;schen');
DEFINE('_COM_SEF_PURGECUSTOMDESC','Eigene Umleitungen l&ouml;schen');
DEFINE('_COM_SEF_WARNDELETE','Achtung!!!<br/>Du bist dabei etwas zu l&ouml;schen: ');
DEFINE('_COM_SEF_RECORD',' Eintrag');
DEFINE('_COM_SEF_RECORDS',' Eintr&auml;ge');
DEFINE('_COM_SEF_NORECORDS','Keine Eintr&auml;ge gefunden.');
DEFINE('_COM_SEF_PROCEED',' Vorgang Starten ');
DEFINE('_COM_SEF_OK',' OK ');
DEFINE('_COM_SEF_SUCCESSPURGE','Eintr&auml;ge erfolgreich gel&ouml;scht');
DEFINE('_PREVIEW_CLOSE','Fenster Schliessen');
DEFINE('_COM_SEF_EMPTYURL','Du musst eine URL f&uuml;er die Umleitung angeben.');
DEFINE('_COM_SEF_NOLEADSLASH','Da sollte kein vorangehender "SLASH" an der neuen SEF URL sein');
DEFINE('_COM_SEF_BADURL','Die alte Nicht-SEF Url muss mit index.php beginnen');
DEFINE('_COM_SEF_URLEXIST','Diese URL existiert bereits in der Datenbank!');
DEFINE('_COM_SEF_SHOW0','Zeige SEF Urls');
DEFINE('_COM_SEF_SHOW1','Zeige 404 Logs');
DEFINE('_COM_SEF_SHOW2','Zeige Eigene Umleitungen');
DEFINE('_COM_SEF_INVALID_URL','INVALIDE URL: dieser Link ben&ouml;tigt ein valides Itemid,aber es wurde keins gefunden.<br/>L&ouml;sung: Erstelle einen Men&uuml;eintrag f&uuml; diesen Artikel. Du brauchst ihn nicht zu ver&ouml;ffentlichen, es reicht dass der Eintrag existiert.');
DEFINE('_COM_SEF_DEF_404_MSG','<h1>404: Nicht gefunden</h1><h4>Entschuldigung, aber die angeforderte Seite konnte nicht gefunden werden.</h4>');
DEFINE('_COM_SEF_SELECT_DELETE','Bitte etwas zum l&ouml;schen ausw&auml;hlen');
DEFINE('_COM_SEF_ASC',' (aufsteigend) ');
DEFINE('_COM_SEF_DESC',' (absteigend) ');
DEFINE('_COM_SEF_WRITEABLE',' <b><font color="green">Beschreibbar</font></b>');
DEFINE('_COM_SEF_UNWRITEABLE',' <b><font color="red">Nicht beschreibbar</font></b>');
DEFINE('_COM_SEF_USING_DEFAULT',' <b><font color="red">Benutze Standard Werte</font></b>');
DEFINE('_COM_SEF_DISABLED',"<p class='error'>NOTIZ: Die SEF Unterst&uuml;tzung in Joomla/Mambo ist momentan deaktiviert. Um SEF zu benutzen, aktiviere es bitte in der <a href='".
	$GLOBALS['mosConfig_live_site']."/administrator/index2.php?option=com_config'>Globalen Konfiguration</a> auf der SEO Seite.</p>");
DEFINE('_COM_SEF_TITLE_CONFIG','404SEFx Konfiguration');
DEFINE('_COM_SEF_TITLE_BASIC','Standard Konfiguration');
DEFINE('_COM_SEF_ENABLED','Aktiviert');
DEFINE('_COM_SEF_TT_ENABLED','Wenn auf NEIN wird Standard Joomla/Mambo SEF benutzt');
DEFINE('_COM_SEF_DEF_404_PAGE','<b>Standard 404 Seite</b><br>');
DEFINE('_COM_SEF_REPLACE_CHAR','Ersetzungs Zeichen');
DEFINE('_COM_SEF_TT_REPLACE_CHAR','Zeichen um unbekannte Zeichen in der URL zu ersetzen');
DEFINE('_COM_SEF_PAGEREP_CHAR','Page spacer character');
DEFINE('_COM_SEF_TT_PAGEREP_CHAR','Character to use to space page numbers away from the rest of the URL');
DEFINE('_COM_SEF_STRIP_CHAR','Strip characters');
DEFINE('_COM_SEF_TT_STRIP_CHAR','Characters to strip from the URL, separate with |');
DEFINE('_COM_SEF_FRIENDTRIM_CHAR','Trim friendly characters');
DEFINE('_COM_SEF_TT_FRIENDTRIM_CHAR','Characters to trim from around the URL, separate with |');
DEFINE('_COM_SEF_USE_ALIAS','Benutze Titel Alias');
DEFINE('_COM_SEF_TT_USE_ALIAS','Auf Ja stellen, um den Titel-Alias anstatt des richtigen Titels in der URL zu verwenden');
DEFINE('_COM_SEF_SUFFIX','Dateiendung');
DEFINE('_COM_SEF_TT_SUFFIX','Erweiterung f&uuml;r \\\'Dateien\\\'. Leer lassen um es zu deaktivieren. Ein h&auml;ufiger Eintrag ist z.B. \\\'.html\\\'.');
DEFINE('_COM_SEF_ADDFILE','Default index file.');
DEFINE('_COM_SEF_TT_ADDFILE','File name to place after a blank url / when no file exists.  Useful for bots that crawl your site looking for a specific file in that place but returns a 404 because there is none there.');
DEFINE('_COM_SEF_PAGETEXT','Seiten Text');
DEFINE('_COM_SEF_TT_PAGETEXT','Text der an die URL angehangen wird bei mehrseitigen Dokumenten. Die Seitennummer wird duch %s dargestellt.');
DEFINE('_COM_SEF_LOWER','Nur Kleinbuchstaben');
DEFINE('_COM_SEF_TT_LOWER','Konvertiert alle Zeichen zu Kleinbuchstaben in der URL','Nur Kleinbuchstaben');
DEFINE('_COM_SEF_SHOW_SECT','Zeige Sektion');
DEFINE('_COM_SEF_TT_SHOW_SECT','Auf Ja stellen um den Sektions-Namen in die URL mit aufzunehmen');
DEFINE('_COM_SEF_HIDE_CAT','Kategorie verbergen');
DEFINE('_COM_SEF_TT_HIDE_CAT','Auf Ja stellen um den Kategorie-Namen aus der URL zu entfernen');
DEFINE('_COM_SEF_404PAGE','404 Seite');
DEFINE('_COM_SEF_TT_404PAGE','Statische Content Seite die beim Fehler 404 Nicht gefunden angezeigt wird (published Status ist egal)');
DEFINE('_COM_SEF_TITLE_ADV','Erweiterte Komponenten Konfiguration');
DEFINE('_COM_SEF_TT_ADV','<b>use default handler</b><br/>Die Seite wird normal bearbeitet. <br/><b>nocache</b><br/>Wird nicht in der DB gesichert, verwendet Joomla/Mambos Standard SEF<br/><b>Skip</b><br/>Keine SEF Urls f&uuml;r diese Komponente<br/>');
DEFINE('_COM_SEF_TT_ADV4','Erweiterte Optionen f&uuml;r ');
DEFINE('_COM_SEF_TITLE_MANAGER','404 SEF URL Manager');
DEFINE('_COM_SEF_VIEWMODE','Ansichtsmodus:');
DEFINE('_COM_SEF_SORTBY','Sortieren nach:');
DEFINE('_COM_SEF_HITS','Zugriffe');
DEFINE('_COM_SEF_DATEADD','Datum hinzugef&uuml;gt');
DEFINE('_COM_SEF_SEFURL','SEF Url');
DEFINE('_COM_SEF_URL','Url');
DEFINE('_COM_SEF_REALURL','Reale Url');
DEFINE('_COM_SEF_EDIT','Bearbeiten');
DEFINE('_COM_SEF_ADD','Hinzuf&uuml;gen');
DEFINE('_COM_SEF_NEWURL','Neue SEF URL');
DEFINE('_COM_SEF_TT_NEWURL','Nur Relative Umleitung vom Joomla/Mambo Root Verzeichnis <i>ohne</i> vorangehenden SLASH');
DEFINE('_COM_SEF_OLDURL','Alte Nicht-SEF Url');
DEFINE('_COM_SEF_TT_OLDURL','Diese URL muss mit index.php beginnen');
DEFINE('_COM_SEF_SAVEAS','als Eigene Umleitung speichern');
DEFINE('_COM_SEF_TITLE_SUPPORT','404 SEF Hilfe');
DEFINE('_COM_SEF_HELPVIA','<b>In den folgenden Foren gibt es Hilfe:</b>');
DEFINE('_COM_SEF_OFFICIAL','Offizielles Projekt Forum');
DEFINE('_COM_SEF_MAMBERS','Mambers Forum');
DEFINE('_COM_SEF_TITLE_PURGE','404 SEF Databank l&ouml;schen');

// component interface
DEFINE('_COM_SEF_NOREAD','FATALER FEHLER: Datei kann nicht gelesen werden ');
DEFINE('_COM_SEF_CHK_PERMS','Bitte &uuml;berpruefe die Datei Berechtigungen und stelle sicher, dass auf die Datei zugegriffen werden kann.');
DEFINE('_COM_SEF_DEBUG_DATA_DUMP','DEBUG DATA DUMP COMPLETE: Laden der Seite abgebrochen');
DEFINE('_COM_SEF_STRANGE','Etwas seltsames ist passiert. Das sollte nicht vorkommen<br />');

?>
