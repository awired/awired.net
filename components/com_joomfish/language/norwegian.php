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
* @translation Rune Rasmussen <nospam@syntaxerror.no>
*/

if( !defined( '_JF_LANG_INCLUDED') ) {

define('_JOOMFISH_TITLE', 'Joom!Fish');
define('_JOOMFISH_HEADER','Flerspråklig innholdsbehandler for Joomla!');

// Control panel
define('_JOOMFISH_ADMIN_FRONTEND', 'Forside');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Språk');
define('_JOOMFISH_ADMIN_HELP', 'Hjelp og veiledninger');
define('_JOOMFISH_ADMIN_CPANEL', 'Cpanel');
define('_JOOMFISH_ADMIN_CHECK', 'Sjekk komponent');
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Konfigurasjon');
define('_JOOMFISH_ADMIN_CREDITS', 'Bidragsytere');
define('_JOOMFISH_E_STATE', 'Status');
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Komponentstatus');
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Oversettelsestatus');
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'Systembot-status');
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Søkebot-status');
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Modulstatus');
define('_JOOMFISH_CMN_PUBLISHED', '<span style="font-weight:bold; color:green">Publisert</span>' );
define('_JOOMFISH_CMN_UNPUBLISHED', '<span style="font-weight:bold; color:red">Upublisert</span>' );
define('_JOOMFISH_ADMIN_MAMBELFISH_INSTALL', 'MambelFish-installasjon');
define('_JOOMFISH_ADMIN_INSTAL_UPGRADED', '<span style="font-weight:bold; color:green">oppgradering av gammel installasjon</span>');
define('_JOOMFISH_ADMIN_INSTAL_NOT_UPGRADED', '<span style="font-weight:bold; color:red">gammel installasjon er ikke oppdatert</span>');
define('_JOOMFISH_INSTALL_UPGRADE', 'Oppgradering av installasjon');

define('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Joom!Fish språkbehandler');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Sidens standardspråk:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'Dette språket er valgt i <a href="javascript:submitbutton( \'site_config\' );">nettstedets konfigurasjon</a>.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Velg brukte språk på siden.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Velg sidespråk:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Navngi og aktiver språkene du vil bruke til oversettelser.<br>Navnet vil bli vist på forsiden også.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Navn');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Opphav');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Versjon');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Beskrivelse');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Originaltittel');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Språk');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Oversettelser');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Sist endret');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Status');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Publisert');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Innholdsdefinisjoner');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Vis nr.');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'aktiv');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Joomla!-filnavn');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Filnavn bilde');
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Rekkefølge');

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Konfigurasjon');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'Databasereferanse');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Eksempeldata');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Generel informasjon');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Informasjon om databasetabelen');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Databasetabel');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'Referansen til tabelen i din database (uten prefiks!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Databasefelt');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definisjon av de tilhørende feltene i databasen din.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Navn');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Type');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Merking');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Oversette');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Angistandard tekst');
define('_JOOMFISH_SET_COMPLETE', 'Angi som komplett');
define('_JOOMFISH_SELECT_LANGUAGES', 'Alle språk');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Ingen oversettelse');
define('_JOOMFISH_NOTRANSLATIONYET', '(ingen oversettelse)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Velg');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Velg innhold hvor du vil sjekke oversettelse.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', 'Oversettelse');
define('_JOOMFISH_ITEM_INFO', 'Publisering');
define('_JOOMFISH_STATE_NOTEXISTING', 'Ingen oversettelse eksisterer');
define('_JOOMFISH_STATE_CHANGED', 'Original endret');
define('_JOOMFISH_STATE_OK', 'Status for oversettelse ok');

define('_JOOMFISH_COPY', 'Kopier');
define('_JOOMFISH_CLEAR', 'Slett');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'Oversettelse er <u>oppdatert</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'Oversettelse <u>ufullstendig</u>, eller original <u>endret</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', 'Oversettelse finnes <u>ikke</u>');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'Oversettelse er <u>publisert</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'Oversettelse er <u>ikke</u> publisert');
define('_JOOMFISH_STATE_TOGGLE', '(Klikk på ikonet for å sjekke status.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Du må velge et språk');
define('_JOOMFISH_CONFIG_SAVED', 'Innstillinger lagret.');
define('_JOOMFISH_CONFIG_PROBLEMS', 'Problemer med å lagre konfigurasjonen!');
define('_JOOMFISH_LANG_PROBLEMS', 'Problemer med å lagre språkinformasjonen!');

define ('_JOOMFISH_ADMIN_CATEGORY','Kategori');
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Alle kategorier');
define ('_JOOMFISH_ADMIN_AUTHOR','Skribent');
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Alle skribenter');
define ('_JOOMFISH_ADMIN_KEYWORD','Nøkkelord');
define ('_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED','Oversettelse publisert');
define ('_JOOMFISH_ADMIN_MENUTYPE','Menyer');
define ('_JOOMFISH_ADMIN_MENUTYPE_ALL','Alle menyer');

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','original verdi er blitt kopiert til utklippstavlen.\nLim det nå inn i din tekstbehandler som html.');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','press Ctrl-C eller command-C for å kopiere original verdi til utklippstavlen.\nLim det så inn i din tekstbehandler som html.');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','din nettleser støtter ikke kopiering til utklippstavlen.\nVelg original manuelt for å kopier og lime.');

define( "_JOOMFISH_NO_TRANSLATION_AVAILABLE",'Det finnes ingen oversettelse tilgjengelig, velg et annet språk.');

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Definer her hvordan navnene skal vises på forsiden');
define ('_JOOMFISH_TT_TITLE_ISO','Språkkoder med <strong>2 tegn</strong>, f.eks. de for tysk, en for engelsk og no for Norsk');
define ('_JOOMFISH_TT_IMAGES_DIR','Ikke fyll inn noe om du ønsker å bruke standard flaggikoner.<br>For egne flaggikoner bruk relativ sti ut fra din Joomla!-bildemappe.');
define ('_JOOMFISH_TT_TITLE_ORDER','Rekkefølge for visning på forsiden.<br />Første språk gis verdien 0 (null), så 1 (en) osv.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Fyll bare inn en tekst her om </strong>egendefinert tekst</strong> skal vises.<br />Hvis ikke skal feltet v&aelig;re tomt, Joomla vil bruke definasjonen fra språkfilen : <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong>');
define ('_JOOMFISH_TT_SPACER','Skilletegn når språkvalg vises i horisontal tekstvisning.<br /><strong>Tips</strong>: Om ingenting fylles inn her, og horisontal visning er valgt, vil et skilletegn bli vist av Joomla som: | (med mellomrom før og etter).<br />Mellomrom før og etter vil alltid bli brukt.');

// errors
define ('_JOOMFISH_ERROR','Feil:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','Dette innholdet [ %s ] blir redigert av en annen administrator nå'); // %s=$actContentObject->title
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Konfigurasjonsfilen er ikke skrivbar!');
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','Flerspråklig mambot er ikke installert eller publisert - Joomfish vil ikke virke uten denne!');

// preferences
define ('_JOOMFISH_ADMIN_PREF_TITLE','Joom!Fish konfigurasjon');
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Tilgangsvalg');
define ('_JOOMFISH_FRONTEND_PUBLISH','Publiser fra forsiden?');
define ('_JOOMFISH_ADMIN_PUBLISHERS','Publisher eller høyere');
define ('_JOOMFISH_ADMIN_NOONE','Ingen');
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Hvem kan publisere oversettelser direkte fra forsiden?');

define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION', 'Konfigurasjon av komponenten');
define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION_HELP', 'Språk for administrasjonen til Joom!Fish');
define('_JOOMFISH_ADMIN_COMPONENT_LANGUAGE', 'Komponentens admin-språk');
define('_JOOMFISH_ADMIN_SHOWIF', 'Hva vises når ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'ingen oversettelse er tilgjengelig?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', 'Denne erstattningen vises bare på innholdsellementer som er merket reference.type=content!');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'Originalt innhold');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'Originalt innhold med informasjon');

define('_JOOMFISH_ADMIN_PLACEHOLDER', 'Egendefinert tekst');
define('_JOOMFISH_ADMIN_FRONTEND_VIEW', 'Forsidevisning');
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Linkliste (horisontal)');
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'Kombinasjonsboks');
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Bildeliste (horisontal)');
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Velg hvordan komponenten skal vises på forsiden<br>Når du velger bildeliste må bildesti være tom, eller ha en gyldig sti basert på rotmappen for Joomla!');

define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Upublisert');
define ('_JOOMFISH_NAME_MISSING','Du må fylle inn et navn');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','Du må bruke et tilsvarende navn');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','Det er allerede et språk med det navnet, forsøk på nytt');
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'Liste med navn (vertikal)');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'Liste med ikoner (vertikal)');
define ('_JOOMFISH_SPACER','Skilletegn ved tekstvisning');

// upgrade
define('_JOOMFISH_UPGRADE', 'Oppgrader');
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Oppgradering fra MambelFish til Joom!Fish krever at alle dine oversettelser og språk <span style="font-weight:bold; color:red">SLETTES</span> fra dine Joom!Fish-tabeller!<br />Du må bekrefte dette!');
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Sikkerhetskopier Joom!Fish-tabellene?');
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'Bekreft SLETTING av Joom!Fish-tabellene');
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Gi nytt navn til gamle tabeller etter oppgradering?');
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">Du må bekrefte at nåværende tabeller kan bli SLETTET!</span>');
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'En feil oppstod under oppgradering, se logg og detaljert informasjon');

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Oppgradering velykket</span>');
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Oppgradering feilet</span>');

define('_JOOMFISH_MBFBOT', 'Mambelfish-bot');
define('_JOOMFISH_MBFMODULE', 'Mambelfish-modul');
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">upublisert</span>' );
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">kunne IKKE avpubliseres!</span>' );

define('_JOOMFISH_CONTENT_BACKUP', 'Joom!Fish-tabellkopiering');
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">velykket inn i tabell #__jf_content_bak</span>' );
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">Kunne IKKE opprette sikkerhetskopi-tabell #__jf_content_bak</span>' );
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">velykket inn i tabell #__jf_languages_bak</span>' );
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">Kunne IKKE opprette sikkerhetskopi-tabell #__jf_languages_bak</span>' );

define('_JOOMFISH_CONTENT_TABLES', 'Joom!Fish-innholdstabeller');
define('_JOOMFISH_LANGUAGE_TABLES', 'Joom!Fish-språktabeller');
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">vellykket slettet</span>' );
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">Kunne IKKE slette gjeldende Joom!Fish-tabell</span>' );
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">velykket kopiert</span>' );
define('_JOOMFISH_COYP_FAILURE', '<span style="font-weight:bold; color:red">Kunne IKKE slette gjeldende Joom!Fish-tabell</span>' );

// credits
define('_JOOMFISH_CREDITS','Bidragsytere og resten av universet');

define ( "_JF_LANG_INCLUDED", true );
}
?>