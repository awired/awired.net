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
* @french translation by joomlafacile.com (Joomla official translation partner)
*/

if( !defined( '_JF_LANG_INCLUDED') ) {	

define('_JOOMFISH_TITLE', 'Joom!Fish');															// @since 1.7
define('_JOOMFISH_HEADER','Multilingual Content Manager for Joomla! ');							// @since 1.7

// Control panel
define('_JOOMFISH_ADMIN_FRONTEND', 'Interface publique');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Langues');
define('_JOOMFISH_ADMIN_HELP', 'Aide &amp; How To\'s');											// @since 1.7
define('_JOOMFISH_ADMIN_CHECK', 'V�rifier le composant');												// @since 1.7
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Configuration');										// @since 1.7
define('_JOOMFISH_ADMIN_CREDITS', 'Cr�dits');													// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Etat du composant');									// @since 1.7
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Etat des traductions');								// @since 1.7
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'Etat bot syst�me');									// @since 1.7
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Etat bot de recherche');									// @since 1.7
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Etat bot module');										// @since 1.7



define ('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Gestionnaire de langues Joom!Fish');							// @since 1.7
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Langue par d�faut du site:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'La langue par d�faut est d�finie dans la <a href="javascript:submitbutton( \'site_config\' );">configuration du site</a>.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'S�lectionner les langues utilis�es sur votre site.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'S�lectionner les langues du site:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Veuillez nommer et activer les langues que vous souhaitez utiliser sur votre site.<br>Le nom de langue choisi sera affich� dans le s�lecteur de langue que verront vos visiteurs.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Nom');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Auteur');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Version');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Description');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Titre original');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Langues');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Traduction');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Derni�re modification');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Etat');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Publi�');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Type d\'�l�ments � traduire');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Liste #');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'Activer');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Nom du fichier de langue');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Nom du fichier image');												//new 1.1
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Ordre');													//new 1.1

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Configuration');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'DB Reference');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Donn�es d\'exemple');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Information g�n�rale');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Information sur les tables de la base de donn�es');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Table de la base de donn�es');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'La r�f�rence � cette table dans la base de donn�es (sans le pr�fixe!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Champs base de donn�es');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definition des champs en relation dans la base de donn�es.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Nom');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Type');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Label');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Traduire');

define('_JOOMFISH_SET_DEFAULTTEXT', 'D�finir le texte par d�faut');												// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Passer en Complet');														// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'Toutes les langues');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Aucune traduction');
define('_JOOMFISH_NOTRANSLATIONYET', '(aucune traduction)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Veuillez s�lectionner');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Veuillez s�lectionner l\'article dont vous souhaiter v�rifier les traductions.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', 'Traduction');
define('_JOOMFISH_ITEM_INFO', 'Publication');
define('_JOOMFISH_STATE_NOTEXISTING', 'Non traduit');
define('_JOOMFISH_STATE_CHANGED', 'Original modifi�');
define('_JOOMFISH_STATE_OK', 'Statut de la traduction OK');

define('_JOOMFISH_COPY', 'Copier');
define('_JOOMFISH_CLEAR', 'Effacer');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'La traduction est <u>� jour</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'Traduction <u>incompl�te</u> ou original <u>modifi�</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', '<u>Non</u> traduit');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'Traduction <u>publi�e</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'Traduction <u>non</u> publi�e');
define('_JOOMFISH_STATE_TOGGLE', '(Cliquer sur l\'ic�ne pour permuter l\'�tat.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Vous devez choisir une langue');
define('_JOOMFISH_CONFIG_SAVED', 'Param�tres sauvegard�s.');																// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Probl�mes lors de la sauvegarde de la configuration!');		// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Probl�mes lors de l\'enregistrement des information de langue!');		// New 1.1

define ('_JOOMFISH_ADMIN_CATEGORY','Filtre Cat�gories');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Toutes les Cat�gories');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Filtre Auteur');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Tous les Auteurs');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Filtre Mots Cl�s');													// New 1.7
define ('_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED','Translation Published');								// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE','Menu Filter');														// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE_ALL','All Menus');													// New 1.7

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','original value has been copied to the clipboard.\nNow paste in your editor as html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','press ctl-C or command-C to copy original value to the clipboard.\nThen paste in your editor as html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','your browser does not support copying to the clipboard.\nSelect the original by hand and copy and paste');     // New 1.7

define( '_JOOMFISH_NO_TRANSLATION_AVAILABLE', 'There is no translation avialable, please select a different language.');		// Changed 1.7

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Nom des langues affich�s dans l interface utilisateur');
define ('_JOOMFISH_TT_TITLE_ISO','Code ISO officiel de la langue, il vaut mieux utiliser le code d�fini par le navigateur.</strong>');
define ('_JOOMFISH_TT_IMAGES_DIR','Pour utiliser les drapeaux par d�faut, laissez ces champs vides. Pour utiliser des drapeaux diff�rents, sp�cifier le chemin relatif du fichier image par rapport � la racine de votre site Joomla.');
define ('_JOOMFISH_TT_TITLE_ORDER','Ordre d affichage dans l interface utilisateur');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Texte personnalis�. Si vous laissez le champ vierge la valeur de la constante <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong> sera affich�e.');
define ('_JOOMFISH_TT_SPACER','S�parateur pour l affichage des langues dans le s�lecteur de langues en mode liste texte horizontale.<br /><strong>Astuce</strong>: si le champ n est pas renseign� mais que l mode horizontal est s�lectionn�, le s�parateur par d�faut est: | (avec espace avant et apr�s).<br />L espace avant sera toujours utilis�.');

// errors
define ('_JOOMFISH_ERROR','Erreur:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','L\'article [ %s ] est actuellement ouvert par un autre administrateur'); // %s=$actContentObject->title
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Fichier de configuration non modifiable!');
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','La mambot Multi lingual abstraction layer mambot n\'est pas install� ou publi� - Joomfish ne fonctionnera pas dans cet �tat!');

// preferences
define ('_JOOMFISH_ADMIN_PREF_TITLE','Pr�f�rences du composant Joom!Fish');								// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Pr�f�rences d\'acc�s');										// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Qui peut publier depuis l\'interface publique?');											// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Publishers et au-dessus');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','Personne');																// @since 1.7
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Qui peut publier les traductions directement depuis l interface publique?');	// @since 1.7

define('_JOOMFISH_ADMIN_SHOWIF', 'Quoi afficher si ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'aucune traduction n\'est disponible?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', 'Ce remplacement s applique UNIQUEMENT aux articles marqu�s comme reference.type=content!');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'Le contenu original');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'Le contenu original avec une information');


define('_JOOMFISH_ADMIN_PLACEHOLDER', 'Texte par d�faut');													// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_VIEW', 'Apparence dans l\'interface publique');											// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Liste de liens texte (horizontale)');										// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'ComboBox');													// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Liste d\images (horizontale)');									// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Veuillez sp�cifier le type d affichage du s�lecteur de langue que verront vos visiteurs<br>Si vous s�lectionner une &quot;liste d images&quot;, les chemin doit �tre vide ou relatif � la racine de votre site Joomla.');							// @deprcated from 1.7


define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Non publi�');
define ('_JOOMFISH_NAME_MISSING','Vous devez saisir un nom');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','Vous devez saisir le nom Joomla correspondant');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','Une langue utilise d�j� ce nom, veuillez r�essayer');
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'Liste verticale de liens texte');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'Liste verticale d\'image)');
define ('_JOOMFISH_SPACER','S�parateur pour les liste texte');

// upgrade
define('_JOOMFISH_UPGRADE', 'Upgrade');																	// @since 1.7
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Upgrading from MambelFish to Joom!Fish requires to <span style="font-weight:bold; color:red">DELETE</span> all existing translations and languages within your Joom!Fish tables!<br />You need to confirm this!');										// @since 1.7
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Backup Joom!Fish tables?');									// @since 1.7
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'Confirm to DELETE Joom!Fish tables');						// @since 1.7
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Rename old tables after upgrade?');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">You need to confirm that the actual tables can be DELETED!</span>');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'An error occoured during upgrade, please see logs and detail information');							// @since 1.7

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Upgrade sucessful</span>');											// @since 1.7
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Upgrade failure</span>');													// @since 1.7

define('_JOOMFISH_MBFBOT', 'Mambelfish bot');															// @since 1.7
define('_JOOMFISH_MBFMODULE', 'Mambelfish module');														// @since 1.7
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">unpublished</span>' );											// @since 1.7
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">could NOT be unpublished!</span>' );							// @since 1.7

define('_JOOMFISH_CONTENT_BACKUP', 'Joom!Fish tables backup');											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful into table #__jf_content_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to create backup table #__jf_content_bak</span>' );			// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful into table #__jf_languages_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to create backup table #__jf_languages_bak</span>' );			// @since 1.7

define('_JOOMFISH_CONTENT_TABLES', 'Joom!Fish content tables');											// @since 1.7
define('_JOOMFISH_LANGUAGE_TABLES', 'Joom!Fish language tables');											// @since 1.7
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful deleted</span>' );											// @since 1.7
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to delete actual Joom!Fish table</span>' );					// @since 1.7
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful copied</span>' );											// @since 1.7
define('_JOOMFISH_COPY_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to delete actual Joom!Fish table</span>' );					// @since 1.7

// credits
define('_JOOMFISH_CREDITS','Credits and the rest of the universe');								// @since 1.7

define( "_JF_LANG_INCLUDED", true );
}
?>
