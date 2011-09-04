<?php
/*
 * @version $Id: toolbar.sef.php,v 1.1 2005/01/21 01:17:51 marlboroman_2k Exp $
 *
 * 404 SEF for MOS 4.5.1
 *
 * Author:	W.H.Welch <marlboroman_2k@yahoo.com>
 * Copyright:	2004 W.H.Welch
 * License:	GNU General Public License
 */

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

switch ( $task ) {
	case 'view':
		if (@$_GET['section'] == "config")
			TOOLBAR_sef::_NEW();	
		else
			TOOLBAR_sef::_DEFAULT();
		break;
	case 'showconfig':
	case 'edit':
		TOOLBAR_sef::_EDIT();
		break;
	case 'new':
		TOOLBAR_sef::_NEW();
		break;
	default:
		TOOLBAR_sef::_INFO();
		break;
}
?>