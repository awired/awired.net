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

/**
* Joom fish frontend component
* @package joomfish.classes
* @copyright 2003-2006 Think Network GmbH
* @license http://www.gnu.org/copyleft/gpl.html GNU Public License
* @version 1.0, 2003-10-16 $Revision: 1.4 $
* @author Alex Kempkens <joomla@thinkmatrix.net>
*/
global $mosConfig_absolute_path, $mosConfig_lang, $_JOOMFISH_MANAGER;

if (file_exists('components/com_joomfish/language/'.$mosConfig_lang.'.php')) {
	include_once ('components/com_joomfish/language/'.$mosConfig_lang.'.php');
} else {
	include_once ('components/com_joomfish/language/english.php');
}
$adminPath = $mosConfig_absolute_path . '/administrator';
if (isset ($mosConfig_admin_path)) {
	$adminPath = $mosConfig_admin_path;
}
$adminPath = $adminPath . '/components/com_joomfish';

if( !class_exists( 'JoomFishManager' ) ) {
	require_once( "$adminPath/joomfish.class.php" );
}

require_once( $mainframe->getPath( 'front_html' ) );

//HTML_joomfish::showLanguages($_JOOMFISH_MANAGER);
?>
