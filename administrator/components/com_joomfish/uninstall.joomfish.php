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

function com_uninstall()
{
	global $database;
	
	// uninstall modules
	$database->setQuery( "DELETE FROM `#__modules` WHERE `module`= 'mod_jflanguageselection';");
	$database->query();
	@unlink( "$mosConfig_absolute_path/modules/mod_jflanguageselection.css" );
    @unlink( "$mosConfig_absolute_path/modules/mod_jflanguageselection.php" );
    @unlink( "$mosConfig_absolute_path/modules/mod_jflanguageselection.xml" );
    
    // uninstall bots
	$database->setQuery( "DELETE FROM `#__mambots` WHERE `element`= 'jfcontent.searchbot';");
	$database->query();
    @unlink( "$mosConfig_absolute_path/mambots/search/jfcontent.searchbot.php" );
    @unlink( "$mosConfig_absolute_path/mambots/search/jfcontent.searchbot.xml" );

    $database->setQuery( "DELETE FROM `#__mambots` WHERE `element`= 'jfdatabase.systembot';");
	$database->query();
    @unlink( "$mosConfig_absolute_path/mambots/system/jfdatabase.systembot.php" );
    @unlink( "$mosConfig_absolute_path/mambots/system/jfdatabase.systembot.xml" );

    // Uninstall icons
	@unlink( $mosConfig_absolute_path .'/includes/js/ThemeOffice/joomfish.png' );

	echo "<strong>Joom!Fish was uninstalled successfully.</strong></p>";
	echo "All Bot's are uninstalled";
}

?>