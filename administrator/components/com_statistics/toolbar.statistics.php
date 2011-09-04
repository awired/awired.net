<?php
/**
* @version $Id: toolbar.statistics.php 2760 2006-03-12 18:42:18Z stingrey $
* @package Joomla
* @subpackage Statistics
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

switch ($task) {
	case 'searches':
	case 'searchesresults':
		TOOLBAR_statistics::_SEARCHES();
		break;

}
?>