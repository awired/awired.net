<?php
/**
* @version $Id: language.php 328 2005-10-02 15:39:51Z Jinx $
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

// ensure user has access to this function
if ( !$acl->acl_check( 'administration', 'install', 'users', $my->usertype, $element . 's', 'all' ) ) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}

$backlink = '<a href="index2.php?option=com_languages">Retour au gestionnaire de langues</a>';
HTML_installer::showInstallForm( 'Installer une nouvelle langue - Site', $option, 'language', '', dirname(__FILE__), $backlink );
?>
<table class="content">
<?php
writableCell( 'media' );
writableCell( 'language' );
?>
</table>