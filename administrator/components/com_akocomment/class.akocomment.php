<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* Tweaked version Modified by Artistworks.net
* Hacks by - Benjamin Samson - www.bpixel.com 
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class mosAkocomment extends mosDBTable {
  var $id=null;
  var $parentid=null;
  var $status=null;
  var $contentid=null;
  var $ip=null;
  var $name=null;
  var $web=null;	// added by bpixel
  var $email=null;	// added by bpixel
  var $title=null;
  var $comment=null;
  var $date=null;
  var $published=null;
  var $ordering=null;
  var $iduser=null; // added by visualclinic.fr
  var $subscribe=null; // added by visualclinic.fr
  
  function mosAkocomment( &$db ) {
    $this->mosDBTable( '#__akocomment', 'id', $db );
  }
}
class mosAkoFavoured extends mosDBTable {
  var $id=null;
  var $id_content=null;
  var $id_user=null;
  var $ip=null;
  var $date=null;

  function mosAkoFavoured( &$db ) {
    $this->mosDBTable( '#__akocomment_favoured', 'id', $db );
  }
}


?>