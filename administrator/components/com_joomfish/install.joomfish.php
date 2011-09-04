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

// Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $mosConfig_absolute_path;

function com_install()
{
	global $_VERSION, $database, $mosConfig_absolute_path;

	if (!is_writable("$mosConfig_absolute_path/mambots/system/")){
		$adminDir = dirname(__FILE__);
		require( $adminDir . "/joomfish.class.php");
		require( $adminDir . "/admin.joomfish.html.php");
		HTML_joomfish_help::showMambotWarning();	
		return false;			
	}
	
	// Insert default language
	$database->setQuery( "SELECT id FROM `#__languages` where `code` = 'english';");
	$id = $database->loadResult();
	if( empty( $id ) ) {
		$database->setQuery( "INSERT INTO `#__languages` (`name`, `active`, `iso`, `code`, `image`, `ordering`) VALUES ('English', 1, 'en', 'english', '', 1);");
		$database->query();	
	}
	
	// Modify the admin icons
	$database->setQuery( "SELECT id FROM #__components WHERE name= 'Joom!Fish'" );
	$id = $database->loadResult();
	
	//add new admin menu images
	@copy($mosConfig_absolute_path .'/components/com_joomfish/images/joomfish_icon.png', $mosConfig_absolute_path .'/includes/js/ThemeOffice/joomfish.png');
	$database->setQuery( "UPDATE #__components SET name= 'Joom!Fish', admin_menu_img = 'js/ThemeOffice/joomfish.png' WHERE id='$id'");
	$database->query();
	$database->setQuery( "UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/content.png', name = '<b>Translation</b>' WHERE parent='$id' AND name = 'Translation'");
	$database->query();
	$database->setQuery( "UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/config.png', name = '<b>Configuration</b>' WHERE parent='$id' AND name = 'Configuration'");
	$database->query();
	$database->setQuery( "UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/language.png', name = '> Languages' WHERE parent='$id' AND name = 'Languages'");
	$database->query();
	$database->setQuery( "UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/controlpanel.png', name = '> Content elements'  WHERE parent='$id' AND name = 'Content elements'");
	$database->query();
	$database->setQuery( "UPDATE #__components SET admin_menu_img = 'js/ThemeOffice/credits.png' WHERE parent='$id' AND name = 'About'");
	$database->query();

	// Add module and bot
	$database->setQuery( "INSERT INTO `#__modules` (`title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`) VALUES ('JoomFish language selection', '', 2, 'user3', 0, '0000-00-00 00:00:00', 1, 'mod_jflanguageselection', 0, 0, 0, '', 0, 0);");
	$database->query();
	$moduleID = $database->insertid();
	$database->setQuery( "INSERT INTO `#__modules_menu` (`moduleid`, `menuid`) VALUES ($moduleID, 0);");
	$database->query();
	$database->setQuery( "INSERT INTO `#__mambots` (`name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES ('multi lingual content searchbot', 'jfcontent.searchbot', 'search', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '');");
	$database->query();
	$database->setQuery( "INSERT INTO `#__mambots` (`name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES ('Multi lingual abstraction layer bot', 'jfdatabase.systembot', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '');");
	$database->query();

	$adminDir = dirname(__FILE__);
    @rename( $adminDir. "/mambots/search/jfcontent.searchbot.php", "$mosConfig_absolute_path/mambots/search/jfcontent.searchbot.php");
    @rename( $adminDir. "/mambots/search/jfcontent.searchbot.xml", "$mosConfig_absolute_path/mambots/search/jfcontent.searchbot.xml");
    @rename( $adminDir. "/mambots/system/jfdatabase.systembot.php", "$mosConfig_absolute_path/mambots/system/jfdatabase.systembot.php");
    @rename( $adminDir. "/mambots/system/jfdatabase.systembot.xml", "$mosConfig_absolute_path/mambots/system/jfdatabase.systembot.xml");

    @rename( $adminDir. "/modules/mod_jflanguageselection.css", "$mosConfig_absolute_path/modules/mod_jflanguageselection.css");
    @rename( $adminDir. "/modules/mod_jflanguageselection.php", "$mosConfig_absolute_path/modules/mod_jflanguageselection.php");
    @rename( $adminDir. "/modules/mod_jflanguageselection.xml", "$mosConfig_absolute_path/modules/mod_jflanguageselection.xml");
	
    // Information text
	require_once( $adminDir . "/joomfish.class.php");
	$joomFishManager = new JoomFishManager( dirname( __FILE__ ) );
	
	require_once ($mosConfig_absolute_path .'/components/com_joomfish/language/english.php');
	require_once( $adminDir . "/admin.joomfish.html.php");
	HTML_joomfish_help::showPostInstall();
	
	return;
}


?>