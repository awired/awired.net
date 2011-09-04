<?php
/**
* @version $Id: toolbar.media.html.php 181 2005-09-19 01:01:12Z stingrey $
* @package Joomla
* @subpackage Massmail
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
* @subpackage Massmail
*/
class TOOLBAR_media {
	/**
	* Draws the menu for a New Media
	*/

	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::custom('upload','upload.png','upload_f2.png','Upload',false);
		mosMenuBar::spacer();
		mosMenuBar::custom('newdir','new.png','new_f2.png','Cr&eacute;er' ,false);
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.mediamanager' );
		mosMenuBar::endTable();
	}
}
?>