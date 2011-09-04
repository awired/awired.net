<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

require_once( $mainframe->getPath( 'toolbar_html' ) );
require_once( $mainframe->getPath( 'toolbar_default' ) );

switch ($task) {
  case "new":
    menuakocomment::FILE_MENU();
    break;

  case "edit":
    menuakocomment::FILE_MENU();
    break;

  case "language":
    menuakocomment::LANG_MENU();
    break;

  case "about":
    menuakocomment::ABOUT_MENU();
    break;

  case "settings":
    menuakocomment::CONFIG_MENU();
    break;

  default:
    $MENU_Default = new MENU_Default;
    break;
}
?>