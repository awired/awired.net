<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class menuakocomment {
  function CONFIG_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save( 'savesettings', 'Save' );
	mosMenuBar::spacer();
    mosMenuBar::back();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }
   function FILE_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save();
	mosMenuBar::spacer();
    mosMenuBar::cancel();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }
   function LANG_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::save( 'savefile', 'Save File' );
	mosMenuBar::spacer();
    mosMenuBar::cancel();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }
  function ABOUT_MENU() {
    mosMenuBar::startTable();
    mosMenuBar::back();
    mosMenuBar::spacer();
    mosMenuBar::endTable();
  }
}
?>