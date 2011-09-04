<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2006 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multi lingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 *
*/

/**
* @package joomfish.language
* @copyright 2003-2006 Think Network GmbH
* @license http://www.gnu.org/copyleft/gpl.html GNU Public License
* @version 1.0, 2003-10-16 $Revision: 1.4 $
* @author Alex Kempkens <JoomFish@ThinkNetwork.com>
*/

if( !defined( '_JF_LANG_INCLUDED') ) {	

define('_JOOMFISH_TITLE', 'Joom!Fish');															// @since 1.7
define('_JOOMFISH_HEADER','Mehrsprachiger Content Manager f&uuml;r Joomla! ');					// @since 1.7

// Control panel
define('_JOOMFISH_ADMIN_FRONTEND', 'Frontend');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Sprachen');
define('_JOOMFISH_ADMIN_HELP', 'Hilfe &amp; How To\'s');										// @since 1.7
define('_JOOMFISH_ADMIN_CPANEL', 'CPanel');														// @since 1.7
define('_JOOMFISH_ADMIN_CHECK', 'Komponentenpr&uuml;fung');										// @since 1.7
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Konfiguration');										// @since 1.7
define('_JOOMFISH_ADMIN_CREDITS', 'Danksagung');												// @since 1.7
define( '_JOOMFISH_E_STATE', 'Status');															// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Komponenten-Status');								// @since 1.7
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', '&Uuml;bersertzungsstatus');						// @since 1.7
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'Systembot-Status');									// @since 1.7
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Suchbot-Status');									// @since 1.7
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Modul-Status');											// @since 1.7
define('_JOOMFISH_CMN_PUBLISHED', '<span style="font-weight:bold; color:green">Ver&ouml;ffentlicht</span>' );								// @since 1.7
define('_JOOMFISH_CMN_UNPUBLISHED', '<span style="font-weight:bold; color:red">Unver&ouml;ffentlicht</span>' );								// @since 1.7
define('_JOOMFISH_ADMIN_MAMBELFISH_INSTALL', 'MambelFish Installation');																	// @since 1.7
define('_JOOMFISH_ADMIN_INSTAL_UPGRADED', '<span style="font-weight:bold; color:green">Alte Version aktualisiert</span>');					// @since 1.7
define('_JOOMFISH_ADMIN_INSTAL_NOT_UPGRADED', '<span style="font-weight:bold; color:red">Alte Version NICHT aktualisiert</span>');			// @since 1.7
define('_JOOMFISH_INSTALL_UPGRADE', 'Installation Aktualisieren');																			// @since 1.7

define('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Joom!Fish Language Manager');							// @since 1.7
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Standardsprache der Site:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'Diese Sprache ist in der Site-Konfiguration eingestellt.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Sprachen, die in der Site genutzt werden sollen.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Site Sprachen ausw&auml;hlen:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Bitte aktivieren Sie hier die f&uuml;r Ihre Site nutzbaren Sprachen.<br>Der Name wird auch im Frontend genutzt.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Name');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Autor');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Version');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Beschreibung');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Originaltitel');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Sprache');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', '&Uuml;bersetzung');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Zuletzt ge&auml;ndert');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Status');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Ver&ouml;ffentlicht');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Inhaltselemente');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Anzeige #');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'aktiv');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Joomla Dateiname');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Bilddatei');													//new 1.1
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Sortierung');												//new 1.1

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Konfiguration');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'DB Referenz');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Beispieldaten');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Allgemeine Informationen');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Information &uuml;ber die Datenbanktabellen');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Datenbanktabelle');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'Die Referenz zu der Datenbanktabelle (ohne Prefix!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Datenbankfelder');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definition der referenzierten Felder.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Name');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Type');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Lable');
define('_JOOMFISH_ADMIN_TRANSLATE', '&Uuml;bersetzbar');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Standardtext setzen');												// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Vollst&auml;ndig');													// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'Alle Sprachen');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Ohne &Uuml;bersetzung');
define('_JOOMFISH_NOTRANSLATIONYET', '(keine &Uuml;bersetzung)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Bitte ausw&auml;hlen');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Bitte w&auml;hle ein Inhaltselement f&uuml;r welches Du &Uuml;bersetzungen verwalten willst.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', '&Uuml;bersetzung');
define('_JOOMFISH_ITEM_INFO', 'Information');
define('_JOOMFISH_STATE_NOTEXISTING', 'Keine &Uuml;bersetzung');
define('_JOOMFISH_STATE_CHANGED', 'ge&auml;ndert');
define('_JOOMFISH_STATE_OK', 'ok');

define('_JOOMFISH_COPY', 'Kopieren');
define('_JOOMFISH_CLEAR', 'L&ouml;schen');
define('_JOOMFISH_TRANSLATION_UPTODATE', '&Uuml;bersetzung <u>nicht</u> aktuell');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', '&Uuml;bersetzung <u>unvollst&auml;ndig</u> oder das Original ist <u>ge&auml;ndert</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', '&Uuml;bersetzung existiert <u>nicht</u>');
define('_JOOMFISH_TRANSLATION_PUBLISHED', '&Uuml;bersetzung ist <u>ver&ouml;ffentlicht</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', '&Uuml;bersetzung <u>nicht</u> ver&ouml;ffentlicht');
define('_JOOMFISH_STATE_TOGGLE', '(Bitte auf das Icon clicken um den Status zu &auml;ndern.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Du musst eine Sprache ausw&auml;hlen!');
define('_JOOMFISH_CONFIG_SAVED', 'Einstellungen gespeichert.');											// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Probleme beim Speichern der Konfiguration!');	// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Probleme beim Speichern der Sprachen!');					// New 1.1

define ('_JOOMFISH_ADMIN_CATEGORY','Kategorie');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Alle Kategorien');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Autor');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Alle Autoren');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Schl&uuml;sselwort');													// New 1.7
define ('_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED','&Uuml;bersetzung ver&ouml;ffentlicht');								// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE','Menu');														// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE_ALL','Alle Menus');													// New 1.7

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','Originalwert wurde in die Zwischenablage kopiert.\nKopieren Sie es nun in Ihren Editor (HTML mode!)');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','Dr&uuml;cken Sie Str-C oder Steuerung-C um den Originalwert in die Zwischenablage zu kopieren.\nDann f&uuml;hgen Sie es in Ihren Editor ein (HTML Mode).');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','Ihr Browser unterst&uuml;tzt das Kopieren in die Zwischenablage nicht..\nNutzen Sie das ausgegebene Original zum Kopieren.');     // New 1.7

define( '_JOOMFISH_NO_TRANSLATION_AVAILABLE', 'Keine &Uuml;bersetzung bekannt. Bitte w&auml;hlen Sie eine andere Sprache.');		// Changed 1.7

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Darzustellender Name der Sprache');
define ('_JOOMFISH_TT_TITLE_ISO','Offizielle ISO Schl&uuml;ssel der Sprache. Geeignet z.B. die Werte der Browser.');
define ('_JOOMFISH_TT_IMAGES_DIR','Um die Standardflaggen zu verwenden bitte leer lassen. F&uuml;r individuelle Bilder bitte vollst&aendigen Pfad ab Joomla Images-Verzeichnis angeben.');
define ('_JOOMFISH_TT_TITLE_ORDER','Reihenfolge der Sprachen f&uur die Auswahl.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Eingabe f&uur einen einheitlichen Defaulttext. Wenn sprachabh&auml;nige Texte verwendet werden, dann bitte die Konstate <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong> in den JoomFish Sprachdateien anpassen und das Feld leer lassen.');
define ('_JOOMFISH_TT_SPACER','Trennzeichen f&uuml;r die Textdarstellung im horizontalen Modus.<br /><strong>Hinweis</strong>: Wird hier nichts eingetragen, jedoch horizontale Darstellung gew&auml;hlt, wird ein Trennzeichen wie folgt aufgebaut: | (mit Leerraum davor und danach).<br />Leerzeichen werden immer davor und danach eingesetzt.');

// errors
define ('_JOOMFISH_ERROR','Fehler:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','Der Inhalt [ %s ] wird gerade von einem anderen Administrator bearbeitet'); // %s=$actContentObject->title // The content item [ %s ] is currently being edited by another administrator
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Konfigurationsdatei nicht beschreibbar!'); // Config file not writeable!
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','Der Bot f?r die Mehrsprachigkeit ist nicht ver&ouml;ffentlicht - Joom!Fish kann nicht in diesem Status ausgef&uuml;hrt werden!');

// preferences
define ('_JOOMFISH_ADMIN_PREF_TITLE','Joom!Fish Komponenten-Einstellungen');								// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Zugriffskontrolle');										// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Ver&ouml;ffentlichen im Frontend?');											// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Publishers und dar&uuml;ber');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','Niemand');																// @since 1.7
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Wer kann die &Uuml;bersetzungen im Frontend ver&ouml;ffentlichen?');	// @since 1.7

define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION', 'Komponenten-Konfiguration');							// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION_HELP', 'Sprache des Admin-Interface');		// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_LANGUAGE', 'Sprache in der Administration');								// @since 1.7
define('_JOOMFISH_ADMIN_SHOWIF', 'Was anzeigen wenn ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'keine &Uuml;bersetzung existiert?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', '');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'Original Inhalt');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'Original Inhalt mit Information');

define('_JOOMFISH_ADMIN_PLACEHOLDER', 'Einen Ersatztext');
define('_JOOMFISH_ADMIN_FRONTEND_VIEW', 'Frontend Darstellung');									//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Liste mit Namen (horizontal)');		//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'Dropdownliste');									//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Bilderliste (horizontal)');				//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Bitte definiere Sie hier wie die Sprachenauswahl f&uuml;r den User im Frontend angezeigt werden soll.<br>Ist <strong>Bilderleiste</strong> ausgew&auml;hlt, muss entweder der Pfad ab dem Joomla root-Verzeichnis angegeben sein, oder die leer um die Defaultbilder zu nutzen.');

define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Unver&ouml;ffentlicht'); // Unpublished
define ('_JOOMFISH_NAME_MISSING','Ein Name muss angegeben werden!'); // You must enter a name
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','Es muss ein entsprechender Name eingetragen werden!'); // You must enter a corresponding Joomla name
define ('_JOOMFISH_LANG_ALREADY_EXISTS','Eine Sprache mit diesem Namen existiert bereits, bitte anderen verwenden!'); // There is a language already with that Joomla name, please try again
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'Liste mit Namen (Vertikal)');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'Bilderliste (Vertikal)');
define ('_JOOMFISH_SPACER','Trennzeichen bei Textdarstellung');

// upgrade
define('_JOOMFISH_UPGRADE', 'Aktualisierung');																	// @since 1.7
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Die Aktualisierung von MambelFish nach Joom!Fish erfordert alle &Uuml;bersetzungen und Sprachen zu <span style="font-weight:bold; color:red">L&Ouml;SCHT</span>.<br />Bitte best&auml;tigen Sie das!');										// @since 1.7
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Sicherung der Joom!Fish Tabellen?');									// @since 1.7
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'BEstätigung, dass die Joom!Fish Tabellen gelöscht werden d&uuml;rfen');				// @since 1.7
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Alte Tabellen nach dem Upgrade umbenennen?');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">Sie M&Uuml;SSEN das L&ouml;schen der Tabellen best&auml;tigen!</span>');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'W&auml;hrend der Aktualisierung ist ein Fehler aufgetreten. Bitte pr&uuml;fen Sie das Log.');							// @since 1.7

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Aktualisierung erfolgreich</span>');											// @since 1.7
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Fehler bei der Aktualisierung</span>');													// @since 1.7

define('_JOOMFISH_MBFBOT', 'Mambelfish Bot');															// @since 1.7
define('_JOOMFISH_MBFMODULE', 'Mambelfish Module');														// @since 1.7
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">Unver&ouml;ffentlicht</span>' );											// @since 1.7
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">konnte nicht unver&ouml;ffentlicht werden!</span>' );							// @since 1.7

define('_JOOMFISH_CONTENT_BACKUP', 'Joom!Fish tables backup');											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">erfolgreich in Tabelle #__jf_content_bak kopiert</span>' );											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">FEHLER konnte Tabelle #__jf_content_bak nicht erstellen/kopieren.</span>' );			// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">erfolgreich in Tabelle #__jf_languages_bak kopiert</span>' );											// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">FEHLER konnte Tabelle #__jf_languages_bak nicht erstellen/kopieren.</span>' );			// @since 1.7

define('_JOOMFISH_CONTENT_TABLES', 'Joom!Fish Inhaltstabellen');											// @since 1.7
define('_JOOMFISH_LANGUAGE_TABLES', 'Joom!Fish Sprachtabellen');											// @since 1.7
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">erfolgreich gelöscht</span>' );											// @since 1.7
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">FEHLER konnte aktuelle Inhalte nicht löschen</span>' );					// @since 1.7
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">erfolgreich kopiert</span>' );											// @since 1.7
define('_JOOMFISH_COPY_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE konnte aktuelle Inhalte nicht kopieren</span>' );					// @since 1.7

// credits
define('_JOOMFISH_CREDITS','Credits and the rest of the universe');								// @since 1.7

define( "_JF_LANG_INCLUDED", true );
}
?>