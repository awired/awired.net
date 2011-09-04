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
define('_JOOMFISH_HEADER','Joomla menadžer višejeziènih sadržaja! ');							// @since 1.7

// Control panel
define('_JOOMFISH_ADMIN_FRONTEND', 'Frontend');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Jezici');
define('_JOOMFISH_ADMIN_HELP', 'Pomoæ');											// @since 1.7
define('_JOOMFISH_ADMIN_CPANEL', 'Kontrolni panel');														// @since 1.7
define('_JOOMFISH_ADMIN_CHECK', 'Provjeri komponentu');												// @since 1.7
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Konfiguracija');										// @since 1.7
define('_JOOMFISH_ADMIN_CREDITS', 'Informacije');													// @since 1.7
define( '_JOOMFISH_E_STATE', 'Status');															// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Status komponente');									// @since 1.7
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Status prijevoda');								// @since 1.7
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'System bot status');									// @since 1.7
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Search bot status');									// @since 1.7
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Status modula');											// @since 1.7
define('_JOOMFISH_CMN_PUBLISHED', '<span style="font-weight:bold; color:green">Objavljeno</span>' );											// @since 1.7
define('_JOOMFISH_CMN_UNPUBLISHED', '<span style="font-weight:bold; color:red">Neobjavljeno</span>' );										// @since 1.7
define('_JOOMFISH_ADMIN_MAMBELFISH_INSTALL', 'MambelFish instalacija');																	// @since 1.7
define('_JOOMFISH_ADMIN_INSTAL_UPGRADED', '<span style="font-weight:bold; color:green">prethodna instalacija ažurirana</span>');					// @since 1.7
define('_JOOMFISH_ADMIN_INSTAL_NOT_UPGRADED', '<span style="font-weight:bold; color:red">prethodna instalacija nije ažurirana</span>');			// @since 1.7
define('_JOOMFISH_INSTALL_UPGRADE', 'Nadogradnja instalacije');																				// @since 1.7

define('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Joom!Fish menadžer jezika');							// @since 1.7
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Standardni jezik stranica:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'Ovaj jezik konfiguriran je u vašoj <a href="javascript:submitbutton( \'site_config\' );">konfiguraciji stranica</a>.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Izaberite jezike koji æe se koristiti na web stranici.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Izaberite jezike za stranice:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Odredite nazive jezika koje æe se koristiti na vašim stranicama i aktivirajte te jezike.<br>Postavljeni nazivi jezika koristiti æe se i u frontendu.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Ime');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Autor');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Verzija');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Opis');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Izvorni naziv');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Jezici');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Prijevod');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Posljednje izmjene');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Status');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Objavljeno');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Elementi sadržaja');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Prikaži #');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'aktivan');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Joomla naziv datoteke');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Naziv datoteke slikovnih podataka');											//new 1.1
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Poredak');													//new 1.1

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Konfiguracija');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'DB Referenca');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Uzorak podataka');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Opæe informacije');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Informacije o tablici baze podataka');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Tablica baze podataka');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'Referenca tablice u vašoj bazi podataka (bez prefiksa!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Polja baze podataka');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definicija povezanih polja u vašoj bazi podataka.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Naziv');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Vrsta');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Oznaka');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Prevedi');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Postavite standardni tekst');												// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Postavljanje završeno');														// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'Svi jezici');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Bez prijevoda');
define('_JOOMFISH_NOTRANSLATIONYET', '(bez prijevoda)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Izaberite');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Izaberite element sadržaja èiji prijevod želite provjeriti.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', 'Prijevod');
define('_JOOMFISH_ITEM_INFO', 'Objavljivanje');
define('_JOOMFISH_STATE_NOTEXISTING', 'Prijevod ne postoji');
define('_JOOMFISH_STATE_CHANGED', 'Original promijenjen');
define('_JOOMFISH_STATE_OK', 'Status prijevoda OK');

define('_JOOMFISH_COPY', 'Kopiraj');
define('_JOOMFISH_CLEAR', 'Izbriši');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'Prijevod <u>ažuran</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'Prijevod <u>nepotpun</u> ili original <u>promijenjen</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', 'Prijevod <u>ne</u> postoji');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'Prijevod <u>objavljen</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'Prijevod <u>nije</u> objavljen');
define('_JOOMFISH_STATE_TOGGLE', '(Klikni na ikonu za toggle state.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Trebate izabrati jezik');
define('_JOOMFISH_CONFIG_SAVED', 'Postavke spremljene.');																// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Problemi sa spremanjem konfiguracije!');		// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Problemi sa spremanjem informacija o jeziku!');		// New 1.1

define ('_JOOMFISH_ADMIN_CATEGORY','Filter kategorija');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Sve kategorije');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Filter autora');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Svi autori');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Filter kljuènih rijeèi');													// New 1.7
define ('_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED','Prijevod objavljen');								// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE','Filter izbornika');														// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE_ALL','Svi izbornici');													// New 1.7

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','original kopiran na clipboard.\nPaste/ubacite ga u svoj ureðivaè teksta kao html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','pritisnite ctl-C ili command-C za kopiranje originala na clipboard.\nZatim ga paste/ubacite u svoj ureðivaè teksta kao html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','vaš preglednik/browser ne podržava kopiranje na clipboard.\nRuèno oznaèite original pa ga kopirajte i ubacite/paste');     // New 1.7

define( '_JOOMFISH_NO_TRANSLATION_AVAILABLE', 'There is no translation avialable, please select a different language.');		// Changed 1.7

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Prikazani naziv jezika');
define ('_JOOMFISH_TT_TITLE_ISO','Službeni ISO kodovi jezika, najbolje je da koristite definicije preglednika.</strong>');
define ('_JOOMFISH_TT_IMAGES_DIR','Ostavite prazno ako želite koristiti standardne zastavice. Za svaku zastavicu koristite relativnu putanju u odnosu na vaš Joomla direktorij slikovnih podataka.');
define ('_JOOMFISH_TT_TITLE_ORDER','Poredak u frontendu.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Koristite za pojedini tekst. Da bi ste koristili informacije koje ovise o jeziku, ostavite prazno i koristite <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong> konstantu definiranu u Joom!Fish jeziènim datotekama.');
define ('_JOOMFISH_TT_SPACER','Razmak za prikazivanje vodoravnog izbora jezika u tekstovnom obliku.<br /><strong>Savjet</strong>: Ako ovdje ne upišete ništa, a izaberete vodoravni naèin prikazivanja, Joomla æe oznaèiti razmak kao: | (s razmakom prije i poslije oznake).<br />Uvijek æe se primjeniti razmak prije i poslije izabrane oznake razmaka.');

// errors
define ('_JOOMFISH_ERROR','Greška:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','Sadržaj [ %s ] trenutaèno ureðuje drugi administrator'); // %s=$actContentObject->title
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Config datoteka nije writeable!');
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','Mambot za višejeziènost nije instaliran ili objavljen - Joomfish ne može raditi u takvim uvjetima!');

// preferences
define ('_JOOMFISH_ADMIN_PREF_TITLE','Joom!Fish odrednice');								// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Odrednice pristupa');										// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Objavi iz frontenda?');											// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Izdavaèi i iznad');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','Nitko');																// @since 1.7
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Tko može objaviti prijevode direktno iz frontenda?');	// @since 1.7

define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION', 'Konfiguracija komponente');							// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION_HELP', 'Jezik za administrativno suèelje');		// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_LANGUAGE', 'Jezik za administratora');								// @since 1.7
define('_JOOMFISH_ADMIN_SHOWIF', 'Što prikazati ako ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'nema prijevoda?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', 'Ova zamjena vrijedi SAMO za elemente sadržaja oznaèene sa reference.type=content!');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'Originalni sadržaj');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'Originalni sadržaj s informacijom');

define('_JOOMFISH_ADMIN_PLACEHOLDER', 'Standardni tekst');													// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_VIEW', 'Izgled Frontenda');											// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Popis linkova (vodoravno)');										// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'ComboBox');													// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Slike (vodoravno)');									// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Definirajte kako æe se komponenta prikazati u frontendu<br>Kada izaberete  &quot;Slike&quot;, putanja slike mora biti prazna ili valjana u odnosu na Joomla root direktorij.');							// @deprcated from 1.7

define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Neobjavljeno');
define ('_JOOMFISH_NAME_MISSING','Trebate upisati naziv');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','Trebate upisati odgovarajuæi Joomla naziv');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','Veæ postoji jezik s tim Joomla nazivom, pokušajte ponovno');
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'Popis naziva (okomito)');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'Slike (okomito)');
define ('_JOOMFISH_SPACER','Razmak za tekstovni popis');

// upgrade
define('_JOOMFISH_UPGRADE', 'Nadogradnja');																	// @since 1.7
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Nadogradnja od MambelFish u Joom!Fish zahtijeva <span style="font-weight:bold; color:red">BRISANJE</span> svih postojeæih prijevoda i jezika iz vaših Joom!Fish tablica!<br />Trebate potvrditi ovaj postupak!');										// @since 1.7
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Backup Joom!Fish tablice?');									// @since 1.7
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'Potvrdite BRISANJE Joom!Fish tablica');						// @since 1.7
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Preimenovati stare tablice nakon nadogradnje?');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">Trebate potvrditi BRISANJE svih sadašnjih tablica!</span>');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'Došlo je do greške tijekom nadogradnje, molimo vas da pregledate logs i detaljne informacije');							// @since 1.7

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Nadogradnja uspješna</span>');											// @since 1.7
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Nadogradnja nije uspjela</span>');													// @since 1.7

define('_JOOMFISH_MBFBOT', 'Mambelfish bot');															// @since 1.7
define('_JOOMFISH_MBFMODULE', 'Mambelfish modul');														// @since 1.7
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">neobjavljeno</span>' );											// @since 1.7
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">NIJE bilo moguæe poništiti objavljivanje!</span>' );							// @since 1.7

define('_JOOMFISH_CONTENT_BACKUP', 'Backup Joom!Fish tablica');											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">uspjeh za tablicu #__jf_content_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">NEUSPJELO kreiranje backup tablice #__jf_content_bak</span>' );			// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">uspjeh za tablicu #__jf_languages_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">NEUSPJELO kreiranje backup tablice #__jf_languages_bak</span>' );			// @since 1.7

define('_JOOMFISH_CONTENT_TABLES', 'Joom!Fish tablice sadržaja');											// @since 1.7
define('_JOOMFISH_LANGUAGE_TABLES', 'Joom!Fish tablice jezika');											// @since 1.7
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">uspješno izbrisano</span>' );											// @since 1.7
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">NEUSPJELO brisanje sadašnje Joom!Fish tablice</span>' );					// @since 1.7
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">Kopiranje uspješno</span>' );											// @since 1.7
define('_JOOMFISH_COPY_FAILURE', '<span style="font-weight:bold; color:red">NEUSPJELO brisanje sadašnje Joom!Fish tablice</span>' );					// @since 1.7

// credits
define('_JOOMFISH_CREDITS','Informacije');								// @since 1.7

define( "_JF_LANG_INCLUDED", true );
}
?>

