<?php
/**
* @version $Id: toolbar.menus.php 5045 2006-09-14 13:49:01Z friesengeist $
* @package Joomla
* @subpackage Menus
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

switch ($task) {
	case 'new':
		TOOLBAR_menus::_NEW();
		break;

	case 'movemenu':
		TOOLBAR_menus::_MOVEMENU();
		break;

	case 'copymenu':
		TOOLBAR_menus::_COPYMENU();
		break;

	case 'edit':
		$cid 	= josGetArrayInts( 'cid' );
		$path 	= $mosConfig_absolute_path .'/administrator/components/com_menus/';

		if ( $cid[0] ) {
			$query = "SELECT type"
			. "\n FROM #__menu"
			. "\n WHERE id = " . (int) $cid[0]
			;
			$database->setQuery( $query );
			$type = $database->loadResult();
			$item_path  = $path . $type .'/'. $type .'.menubar.php';

			if ( $type ) {
				if ( file_exists( $item_path  ) ) {
					require_once( $item_path  );
				} else {
					TOOLBAR_menus::_EDIT();
				}
			} else {
				echo $database->stderr();
			}
		} else {
			$type 		= strval( mosGetParam( $_REQUEST, 'type', null ) );
			$item_path  = $path . $type .'/'. $type .'.menubar.php';

			if ( $type ) {
				if ( file_exists( $item_path ) ) {
					require_once( $item_path  );
				} else {
					TOOLBAR_menus::_EDIT();
				}
			} else {
				TOOLBAR_menus::_EDIT();
			}
		}
		break;

	default:
		$type 		= strval( mosGetParam( $_REQUEST, 'type' ) );
		$item_path  = $path . $type .'/'. $type .'.menubar.php';

		if ( $type ) {
			if ( file_exists( $item_path ) ) {
				require_once( $item_path );
			} else {
				TOOLBAR_menus::_DEFAULT();
			}
		} else {
			TOOLBAR_menus::_DEFAULT();
		}
		break;
}
?>