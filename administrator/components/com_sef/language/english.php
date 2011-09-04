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
// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// admin interface
DEFINE('_COM_SEF_CONFIG','404SEFx<br/>Configuration');
DEFINE('_COM_SEF_CONFIGDESC','Configure all 404SEFx functionality');
DEFINE('_COM_SEF_HELP','404SEFx<br/>Support');
DEFINE('_COM_SEF_HELPDESC','Need help with 404SEFx?');
DEFINE('_COM_SEF_INFO','404SEFx<br/>Documentation');
DEFINE('_COM_SEF_INFODESC','View 404SEFx Project Summary and Documentation');
DEFINE('_COM_SEF_VIEWURL','View/Edit<br/>SEF Urls');
DEFINE('_COM_SEF_VIEWURLDESC','View/Edit SEF Urls');
DEFINE('_COM_SEF_VIEW404','View/Edit<br/>404 Logs');
DEFINE('_COM_SEF_VIEW404DESC','View/Edit 404 Logs');
DEFINE('_COM_SEF_VIEWCUSTOM','View/Edit<br/>Custom Redirects');
DEFINE('_COM_SEF_VIEWCUSTOMDESC','View/Edit Custom Redirects');
DEFINE('_COM_SEF_SUPPORT','Support<br/>WebSite');
DEFINE('_COM_SEF_SUPPORTDESC','Connect to the 404SEFx website (new window)');
DEFINE('_COM_SEF_BACK','Back to 404SEFx Control Panel');
DEFINE('_COM_SEF_PURGEURL','Purge<br/>SEF Urls');
DEFINE('_COM_SEF_PURGEURLDESC','Purge SEF Urls');
DEFINE('_COM_SEF_PURGE404','Purge<br/>404 Logs');
DEFINE('_COM_SEF_PURGE404DESC','Purge 404 Logs');
DEFINE('_COM_SEF_PURGECUSTOM','Purge<br/>Custom Redirects');
DEFINE('_COM_SEF_PURGECUSTOMDESC','Purge Custom Redirects');
DEFINE('_COM_SEF_WARNDELETE','WARNING!!!<br/>You are about to delete ');
DEFINE('_COM_SEF_RECORD',' record');
DEFINE('_COM_SEF_RECORDS',' records');
DEFINE('_COM_SEF_NORECORDS','No records found.');
DEFINE('_COM_SEF_PROCEED',' Proceed ');
DEFINE('_COM_SEF_OK',' OK ');
DEFINE('_COM_SEF_SUCCESSPURGE','Successfully purged records');
DEFINE('_PREVIEW_CLOSE','Close this window');
DEFINE('_COM_SEF_EMPTYURL','You must provide a URL for the redirection.');
DEFINE('_COM_SEF_NOLEADSLASH','The should be NO LEADING SLASH on the New SEF URL');
DEFINE('_COM_SEF_BADURL','The Old Non-SEF Url must begin with index.php');
DEFINE('_COM_SEF_URLEXIST','This URL already exists in the database!');
DEFINE('_COM_SEF_SHOW0','Show SEF Urls');
DEFINE('_COM_SEF_SHOW1','Show 404 Log');
DEFINE('_COM_SEF_SHOW2','Show Custom Redirects');
DEFINE('_COM_SEF_INVALID_URL','INVALID URL: this link requires a valid Itemid, but one was not found.<br/>SOLUTION: Create a menuitem for this item. You do not have to publish it, just create it.');
DEFINE('_COM_SEF_DEF_404_MSG','<h1>404: Not Found</h1><h4>Sorry, but the content you requested could not be found</h4>');
DEFINE('_COM_SEF_SELECT_DELETE','Select an item to delete');
DEFINE('_COM_SEF_ASC',' (asc) ');
DEFINE('_COM_SEF_DESC',' (desc) ');
DEFINE('_COM_SEF_WRITEABLE',' <b><font color="green">Writeable</font></b>');
DEFINE('_COM_SEF_UNWRITEABLE',' <b><font color="red">Unwriteable</font></b>');
DEFINE('_COM_SEF_USING_DEFAULT',' <b><font color="red">Using Default Values</font></b>');
DEFINE('_COM_SEF_DISABLED',"<p class='error'>NOTE: SEF support in Joomla/Mambo is currently disabled. To use SEF, please enable it from the <a href='".
	$GLOBALS['mosConfig_live_site']."/administrator/index2.php?option=com_config'>Global Configuration</a> SEO page.</p>");
DEFINE('_COM_SEF_TITLE_CONFIG','404SEFx Configuration');
DEFINE('_COM_SEF_TITLE_BASIC','Basic Configuration');
DEFINE('_COM_SEF_ENABLED','Enabled');
DEFINE('_COM_SEF_TT_ENABLED','If set to No the default SEF for Joomla/Mambo will be used');
DEFINE('_COM_SEF_DEF_404_PAGE','Default 404 Page');
DEFINE('_COM_SEF_REPLACE_CHAR','Replacement character');
DEFINE('_COM_SEF_TT_REPLACE_CHAR','Character to use to replace unknown characters in URL');
DEFINE('_COM_SEF_PAGEREP_CHAR','Page spacer character');
DEFINE('_COM_SEF_TT_PAGEREP_CHAR','Character to use to space page numbers away from the rest of the URL');
DEFINE('_COM_SEF_STRIP_CHAR','Strip characters');
DEFINE('_COM_SEF_TT_STRIP_CHAR','Characters to strip from the URL, separate with |');
DEFINE('_COM_SEF_FRIENDTRIM_CHAR','Trim friendly characters');
DEFINE('_COM_SEF_TT_FRIENDTRIM_CHAR','Characters to trim from around the URL, separate with |');
DEFINE('_COM_SEF_USE_ALIAS','Use Title Alias');
DEFINE('_COM_SEF_TT_USE_ALIAS','Set to yes to use the title_alias instead of title in the URL');
DEFINE('_COM_SEF_SUFFIX','File suffix');
DEFINE('_COM_SEF_TT_SUFFIX','Extension to use for \\\'files\\\'. Leave blank to disable. A common entry here is \\\'html\\\'.');
DEFINE('_COM_SEF_ADDFILE','Default index file.');
DEFINE('_COM_SEF_TT_ADDFILE','File name to place after a blank url / when no file exists.  Useful for bots that crawl your site looking for a specific file in that place but returns a 404 because there is none there.');
DEFINE('_COM_SEF_PAGETEXT','Page text');
DEFINE('_COM_SEF_TT_PAGETEXT','Text to append to url for multiple pages. Use %s to insert page number, by default it will be at end. If a suffix is defined, it will be added to the end of this string.');
DEFINE('_COM_SEF_LOWER','All lowercase');
DEFINE('_COM_SEF_TT_LOWER','Convert all characters to lowercase characters in the URL','All lowercase');
DEFINE('_COM_SEF_SHOW_SECT','Show Section');
DEFINE('_COM_SEF_TT_SHOW_SECT','Set to yes to include the section name in url');
DEFINE('_COM_SEF_HIDE_CAT','Hide Category');
DEFINE('_COM_SEF_TT_HIDE_CAT','Set to yes to exclude the category name in url');
DEFINE('_COM_SEF_404PAGE','404 Page');
DEFINE('_COM_SEF_TT_404PAGE','Static content page to use for 404 Not Found errors (published state does not matter)');
DEFINE('_COM_SEF_TITLE_ADV','Advanced Component Configuration');
DEFINE('_COM_SEF_TT_ADV','<b>use default handler</b><br/>process normally, if an SEF Advanced extension is present it will be used instead. <br/><b>nocache</b><br/>do not store in DB and create old style SEF URLs<br/><b>skip</b><br/>do not make SEF urls for this component<br/>');
DEFINE('_COM_SEF_TT_ADV4','Advanced Options for ');
DEFINE('_COM_SEF_TITLE_MANAGER','404SEFx URL Manager');
DEFINE('_COM_SEF_VIEWMODE','ViewMode:');
DEFINE('_COM_SEF_SORTBY','Sort by:');
DEFINE('_COM_SEF_HITS','Hits');
DEFINE('_COM_SEF_DATEADD','Date Added');
DEFINE('_COM_SEF_SEFURL','SEF Url');
DEFINE('_COM_SEF_URL','Url');
DEFINE('_COM_SEF_REALURL','Real Url');
DEFINE('_COM_SEF_EDIT','Edit');
DEFINE('_COM_SEF_ADD','Add');
DEFINE('_COM_SEF_NEWURL','New SEF URL');
DEFINE('_COM_SEF_TT_NEWURL','Only relative redirection from the Joomla/Mambo root <i>without</i> a the leading slash');
DEFINE('_COM_SEF_OLDURL','Old Non-SEF Url');
DEFINE('_COM_SEF_TT_OLDURL','This URL must begin with index.php');
DEFINE('_COM_SEF_SAVEAS','Save as Custom Redirect');
DEFINE('_COM_SEF_TITLE_SUPPORT','404SEFx Support');
DEFINE('_COM_SEF_HELPVIA','<b>Help is availible via the following forums:</b>');
DEFINE('_COM_SEF_OFFICIAL','Official Project Forum');
DEFINE('_COM_SEF_MAMBERS','Mambers Forum');
DEFINE('_COM_SEF_TITLE_PURGE','404SEFx Purge Database');
DEFINE('_COM_SEF_USE_DEFAULT','(use default handler)');
DEFINE('_COM_SEF_NOCACHE','nocache');
DEFINE('_COM_SEF_SKIP','skip');
DEFINE('_COM_SEF_INSTALLED_VERS','Installed version:');
DEFINE('_COM_SEF_COPYRIGHT','Copyright');
DEFINE('_COM_SEF_LICENSE','License');
DEFINE('_COM_SEF_SUPPORT_404SEF','Support 404SEF');
DEFINE('_COM_SEF_CONFIG_UPDATED','Configuration updated');
DEFINE('_COM_SEF_WRITE_ERROR','Error writing config');
DEFINE('_COM_SEF_NOACCESS','Unable to access');
DEFINE('_COM_SEF_FATAL_ERROR_HEADERS','FATAL ERRPR: HEADER ALREADY SENT');
DEFINE('_COM_SEF_UPLOAD_OK','File was successfully uploaded');
DEFINE('_COM_SEF_ERROR_IMPORT','Error while importing:');
DEFINE('_COM_SEF_INVALID_SQL','INVALID DATA IN SQL FILE :');
DEFINE('_COM_SEF_NO_UNLINK','Unable to remove uploaded file from media directory');
DEFINE('_COM_SEF_IMPORT_OK','Custom URLS were successfully imported!');
DEFINE('_COM_SEF_WRITE_FAILED','Unable to write uploaded file to media directory');
DEFINE('_COM_SEF_EXPORT_FAILED','EXPORT FAILED!!!');
DEFINE('_COM_SEF_IMPORT_EXPORT','Import/Export Custom URLS');
DEFINE('_COM_SEF_SELECT_FILE','Please select a file first');
DEFINE('_COM_SEF_IMPORT','Import Custom URLS');
DEFINE('_COM_SEF_EXPORT','Backup Custom URLS');

// component interface
DEFINE('_COM_SEF_NOREAD','FATAL ERROR: Unable to read file ');
DEFINE('_COM_SEF_CHK_PERMS','Please check your file permissions and ensure that that this file can be read.');
DEFINE('_COM_SEF_DEBUG_DATA_DUMP','DEBUG DATA DUMP COMPLETE: Page Load Terminated');
DEFINE('_COM_SEF_STRANGE','Something strange has occured. This should not happen<br />');

//Added by Leon
define('_FULL_TITLE', 'Full Title');
define('_TITLE_ALIAS', 'Title Alias');
define('_COM_SEF_SHOW_CAT', 'Show Category');

?>