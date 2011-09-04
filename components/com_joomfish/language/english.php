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

// Check if the file is included - please do not translate
if( !defined( '_JF_LANG_INCLUDED') ) {	

define('_JOOMFISH_TITLE', 'Joom!Fish');															// @since 1.7
define('_JOOMFISH_HEADER','Multilingual Content Manager for Joomla! ');							// @since 1.7

// Control panel
define('_JOOMFISH_ADMIN_FRONTEND', 'Frontend');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Languages');
define('_JOOMFISH_ADMIN_HELP', 'Help &amp; How To\'s');											// @since 1.7
define('_JOOMFISH_ADMIN_CPANEL', 'CPanel');														// @since 1.7
define('_JOOMFISH_ADMIN_CHECK', 'Check component');												// @since 1.7
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Configuration');										// @since 1.7
define('_JOOMFISH_ADMIN_CREDITS', 'Credits');													// @since 1.7
define( '_JOOMFISH_E_STATE', 'State');															// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Component State');									// @since 1.7
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Translations State');								// @since 1.7
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'System bot State');									// @since 1.7
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Search bot State');									// @since 1.7
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Module State');											// @since 1.7
define('_JOOMFISH_CMN_PUBLISHED', '<span style="font-weight:bold; color:green">Published</span>' );											// @since 1.7
define('_JOOMFISH_CMN_UNPUBLISHED', '<span style="font-weight:bold; color:red">Unpublished</span>' );										// @since 1.7
define('_JOOMFISH_ADMIN_MAMBELFISH_INSTALL', 'MambelFish installation');																	// @since 1.7
define('_JOOMFISH_ADMIN_INSTAL_UPGRADED', '<span style="font-weight:bold; color:green">old installation upgraded</span>');					// @since 1.7
define('_JOOMFISH_ADMIN_INSTAL_NOT_UPGRADED', '<span style="font-weight:bold; color:red">old installation not upgraded</span>');			// @since 1.7
define('_JOOMFISH_INSTALL_UPGRADE', 'Upgrade installation');																				// @since 1.7

define('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Joom!Fish Language Manager');							// @since 1.7
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Sites default language:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'This language is configured in your <a href="javascript:submitbutton( \'site_config\' );">site configuration</a>.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Select used languages in your site.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Select site languages:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Please name and activate the languages you want to use on your site.<br>The name will be used in the frontend display as well.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Name');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Author');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Version');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Description');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Original title');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Languages');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Translation');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Last modified');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'State');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Published');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Content elements');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Display #');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'active');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Joomla filename');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Image filename');											//new 1.1
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Ordering');													//new 1.1

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Configuration');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'DB Reference');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Sample data');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'General information');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Information about the database table');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Database table');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'The reference to the table in your database (without the prefix!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Database fields');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definition of the related fields in your database.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Name');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Type');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Lable');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Translate');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Set default text');												// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Set complete');														// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'All languages');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'No translation');
define('_JOOMFISH_NOTRANSLATIONYET', '(no translation)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Please select');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Please select the content elements for which you want to check the translations from the drop-down menu.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', 'Translation');
define('_JOOMFISH_ITEM_INFO', 'Publishing');
define('_JOOMFISH_STATE_NOTEXISTING', 'No translation exists');
define('_JOOMFISH_STATE_CHANGED', 'Original changed');
define('_JOOMFISH_STATE_OK', 'Translation status OK');

define('_JOOMFISH_COPY', 'Copy');
define('_JOOMFISH_CLEAR', 'Clear');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'Translation is <u>up to date</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'Translation <u>incomplete</u> or original <u>changed</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', 'Translation does <u>not</u> exist');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'Translation is <u>published</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'Translation <u>Not</u> Published');
define('_JOOMFISH_STATE_TOGGLE', '(Click on icon to toggle state.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'You must choose a language');
define('_JOOMFISH_CONFIG_SAVED', 'Settings saved.');																// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Problems while saving the configuration!');		// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Problems storing the language information!');		// New 1.1

define ('_JOOMFISH_ADMIN_CATEGORY','Category Filter');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','All Categories');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Author Filter');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','All Authors');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Keyword Filter');													// New 1.7
define ('_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED','Translation Published');								// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE','Menu Filter');														// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE_ALL','All Menus');													// New 1.7

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','original value has been copied to the clipboard.\nNow paste in your editor as html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','press ctl-C or command-C to copy original value to the clipboard.\nThen paste in your editor as html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','your browser does not support copying to the clipboard.\nSelect the original by hand and copy and paste');     // New 1.7

define( '_JOOMFISH_NO_TRANSLATION_AVAILABLE', 'There is no translation available, please select a different language.');		// Changed 1.7

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Displayname of the language');
define ('_JOOMFISH_TT_TITLE_ISO','Official ISO codes of the language, best use browser definitions.<strong>Attention for the default flags those codes need to match the file names!</strong>');
define ('_JOOMFISH_TT_IMAGES_DIR','To use the default flags leave empty. For individual flags use the relative path based on your Joomla image directory.');
define ('_JOOMFISH_TT_TITLE_ORDER','Ordering in the frontend.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Use for individual fixed text. To use language depended information leave empty and use the <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong> constant defined in the Joom!Fish language files.');
define ('_JOOMFISH_TT_SPACER','Spacer for displaying language selector in textmode when in horizontal mode.<br /><strong>Hint</strong>: If nothing is filled here in, but horizontal mode is selected, usually a spacer will be defined by Joomla as: | (with space before and after).<br />Space before and after will be used always.');

// errors
define ('_JOOMFISH_ERROR','Error:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','The content item [ %s ] is currently being edited by another administrator'); // %s=$actContentObject->title
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Config file not writeable!');
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','Multi lingual abstraction layer mambot is not installed or published - Joomfish will not work in this state!');

// preferences
define ('_JOOMFISH_ADMIN_PREF_TITLE','Joom!Fish Component Preferences');								// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Access Preferences');										// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Publish from frontend?');											// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Publishers and above');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','No-one');																// @since 1.7
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Who can publish translations directly from the frontend?');	// @since 1.7

define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION', 'Component Configuration');							// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION_HELP', 'Language of the Administrative Interface');		// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_LANGUAGE', 'Component Admin Language');								// @since 1.7
define('_JOOMFISH_ADMIN_SHOWIF', 'What to show if ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'no translation is available?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', 'This replacement applies ONLY to content elements which are marked reference.type=content!');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'The original content');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'The original content with information');

define('_JOOMFISH_ADMIN_PLACEHOLDER', 'Default Text');													// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_VIEW', 'Frontend appearance');											// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Link list (horizontal)');										// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'ComboBox');													// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Image list (horizontal)');									// @deprcated from 1.7
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Please define how the component should be displayed in the frontend<br>When you select &quot;Image List&quot;, the image path must be empty or valid based on the Joomla root dir.');							// @deprcated from 1.7

define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Unpublished');
define ('_JOOMFISH_NAME_MISSING','You must enter a name');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','You must enter a corresponding Joomla name');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','There is a language already with that Joomla name, please try again');
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'List of names (vertical)');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'List of images (vertical)');
define ('_JOOMFISH_SPACER','Spacer at display as text');

// upgrade
define('_JOOMFISH_UPGRADE', 'Upgrade');																	// @since 1.7
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Upgrading from MambelFish to Joom!Fish requires to <span style="font-weight:bold; color:red">DELETE</span> all existing translations and languages within your Joom!Fish tables!<br />You need to confirm this!');										// @since 1.7
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Backup Joom!Fish tables?');									// @since 1.7
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'Confirm to DELETE Joom!Fish tables');						// @since 1.7
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Rename old tables after upgrade?');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">You need to confirm that the actual tables can be DELETED!</span>');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'An error occurred during upgrade, please see logs and detail information');							// @since 1.7

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Upgrade sucessful</span>');											// @since 1.7
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Upgrade failure</span>');													// @since 1.7

define('_JOOMFISH_MBFBOT', 'Mambelfish bot');															// @since 1.7
define('_JOOMFISH_MBFMODULE', 'Mambelfish module');														// @since 1.7
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">unpublished</span>' );											// @since 1.7
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">could NOT be unpublished!</span>' );							// @since 1.7

define('_JOOMFISH_CONTENT_BACKUP', 'Joom!Fish tables backup');											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">successfully into table #__jf_content_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">FAILURE to create backup table #__jf_content_bak</span>' );			// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">successfully into table #__jf_languages_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">FAILURE to create backup table #__jf_languages_bak</span>' );			// @since 1.7

define('_JOOMFISH_CONTENT_TABLES', 'Joom!Fish content tables');											// @since 1.7
define('_JOOMFISH_LANGUAGE_TABLES', 'Joom!Fish language tables');											// @since 1.7
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">successfully deleted</span>' );											// @since 1.7
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">FAILURE to delete actual Joom!Fish table</span>' );					// @since 1.7
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">successfully copied</span>' );											// @since 1.7
define('_JOOMFISH_COPY_FAILURE', '<span style="font-weight:bold; color:red">FAILURE to delete actual Joom!Fish table</span>' );					// @since 1.7

// credits
define('_JOOMFISH_CREDITS','Credits and the rest of the universe');								// @since 1.7

// Check if the file is included - please do not translate
define( "_JF_LANG_INCLUDED", true );
}
?>