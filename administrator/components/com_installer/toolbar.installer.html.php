<?php
/**
* @version $Id: toolbar.installer.html.php 4675 2006-08-23 16:55:24Z stingrey $
* @package Joomla
* @subpackage Installer
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

/**
* @package Joomla
* @subpackage Installer
*/
class TOOLBAR_installer
{
	function _DEFAULT()	{
		mosMenuBar::startTable();
		mosMenuBar::help( 'screen.installer' );
		mosMenuBar::endTable();
	}

	function _DEFAULT2()	{
		mosMenuBar::startTable();
		mosMenuBar::deleteList( '', 'remove', 'D&eacute;sinstaller' );
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.installer2' );
		mosMenuBar::endTable();
	}

	function _NEW()	{
		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::endTable();
	}
}
?>