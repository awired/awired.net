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

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $mosConfig_lang;

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );
require_once( $mainframe->getPath( 'class' ) );
/*if( !defined( '_JF_LANG_INCLUDED') ) {
	if (file_exists($mosConfig_absolute_path .'/components/com_joomfish/language/'.$mosConfig_lang.'.php')) {
		require_once ($mosConfig_absolute_path .'/components/com_joomfish/language/'.$mosConfig_lang.'.php');
	} else {
		require_once ($mosConfig_absolute_path .'/components/com_joomfish/language/english.php');
	}
	define( "_JF_LANG_INCLUDED", true );
}*/

$task = mosGetParam ($_REQUEST, 'task', '' );
$act = mosGetParam ($_REQUEST, 'act', '' );
$joomFishManager = new JoomFishManager( dirname( __FILE__ ) );
if( count($joomFishManager->getActiveLanguages()) == 0 ) {
	$act = "config_component";
}

switch ($act) {
	case "config_component":
	case "config_language":
		MENU_joomfish::CONFIG_MENU();
		break;
		
	case "config_elements":
		if ($task=="") {
			MENU_joomfish::EDIT_MENU();
		}
		else {
			MENU_joomfish::DEFAULT_MENU();
		}
		break;
	
	case "translate":
		if( $task=="edit" ) {
			MENU_joomfish::TRANSLATE_MENU();
		} else {
			MENU_joomfish::TRANSLATION_OVERVIEW_MENU();
		}
		break;
	
	case "upgrade_install":
		if( $task=="upgrade" ) {
			MENU_joomfish::DEFAULT_MENU();
		} else {
			MENU_joomfish::UPGRADE_MENU();
		}
		break;
		
	default:
		MENU_joomfish::DEFAULT_MENU();
		break;
}
?>