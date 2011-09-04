<?php
/*
 * @version $Id: toolbar.sef.html.php,v 1.1 2005/01/21 01:17:51 marlboroman_2k Exp $
 *
 * 404 SEF for MOS 4.5.1
 *
 * Author:	W.H.Welch <marlboroman_2k@yahoo.com>
 * Copyright:	2004 W.H.Welch
 * License:	GNU General Public License
 */

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* @package Mambo_4.5.1
*/
class TOOLBAR_sef  {

	function _NEW() {
		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function _EDIT() {
		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function _INFO() {
		mosMenuBar::startTable();
		mosMenuBar::back();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::addNew();
		mosMenuBar::editList();
		mosMenuBar::deleteList();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
}
?>