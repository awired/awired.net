<?php
# ***** BEGIN LICENSE BLOCK *****
# Connected for DotClear.
# Copyright (c) 2005 Antoine Libert. All rights
# reserved.
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****

class dcConnected
{
	/*
	@function showConnected

	Fonction qui affiche le nombre d'utilisateurs connectés

  @param boolean active le mode détaillé ou non
	@param string phrase à afficher pour UNE personne connectée
	@param string phrase à afficher pour PLUSIEURS personnes connectées
	@param integer temps avant que l'ip du visiteur soit supprimée de la bdd (def 240)
	*/
	function showConnected($detail=false,$one="%d personne connect&eacute;e",$more="%d personnes connect&eacute;es",$timetoexpire=240) {
		global $con, $blog;

		$ip = $_SERVER['REMOTE_ADDR'];
		$time = time();
    $ttl = $time - $timetoexpire;
		
		// Suppresion des IP périmées
		$rs = $con->execute('DELETE FROM '.DB_PREFIX.'connected WHERE time < \''.(integer) $ttl.'\' OR ip = \''.$con->escapeStr($ip).'\'');
		
		// Capture du nom de la page en cours
		if ($GLOBALS['mode'] == 'post') {
			$GLOBALS['news']->movePrev();
			$currentpage ='[ '. __('Ticket') .' ] '. $GLOBALS['news']->f('post_titre');
		} else if ($GLOBALS['cat_id'] != '') {
			$currentpage = '[ '. __('Category') .' ] '. $GLOBALS['news']->f('cat_libelle');
		} else if (isset($GLOBALS['related_title'])) {
			$currentpage = '[ '. __('Related') .' ] '. $GLOBALS['related_title'];
		} else {
			$currentpage = '[ '. __('Home page') .' ] ';
		}
		
		// Si le mode détaillée est actif
		if ($detail) {
      if (!empty($_COOKIE['comment_info'])) {
        $cookie = unserialize($_COOKIE['comment_info']);
      }
      if (!empty($cookie['c_nom'])) {
        $nick = htmlentities($cookie['c_nom']);
      } else if (!empty($_POST['tribnick'])) {
        $nick = htmlentities($_POST['tribnick']);
      } else {
        $nick = '';
      }
      
      // Insertion de l'ip
      $rs = $con->execute('INSERT INTO '.DB_PREFIX.'connected (ip, time, current_page, nick) VALUES (\''.$con->escapeStr($ip).'\',\''.(integer) $time.'\',\''.addslashes($currentpage).'\', \''.$con->escapeStr($nick).'\')');
      // Comptage nombre de connectés
      $rs = $con->select('SELECT COUNT(ip) AS total FROM '.DB_PREFIX.'connected');
      // Listing des connectés
      $rs2 = $con->select('SELECT nick FROM '.DB_PREFIX.'connected WHERE nick != \'\' ORDER BY nick ASC LIMIT 0,10');
      
      // Variable contenant le nombre de connectés  
      $rs = $rs->arry_data[0]['total'];
      
      if (!$rs2->isEmpty()) {
  		  $nicks_list = '';
  		  
  		  while ($rs2->fetch()) {
          $nicks_list .= $rs2->f('nick');
          if (next($rs2->arry_data)) {
            $nicks_list .= ', ';
          }
  			}
  			
  			if (($left = $rs - $rs2->int_row_count) > 0) {
  			 $nicks_list .= ' et '.$left.' invit&eacute;(s)';
  			}
  		
      } else {
        $nicks_list = $rs.' invit&eacute;s(s)';
      }
    
      if ($rs <= 1) {
        printf("<acronym title=\"Connect&eacute;(s) : %s\">".$one."</acronym>",$nicks_list,$rs);
      } else {
        printf("<acronym title=\"Connect&eacute;(s) : %s\">".$more."</acronym>",$nicks_list,$rs);
      }
      
    } else {
		// Insertion de l'ip
		$rs = $con->execute('INSERT INTO '.DB_PREFIX.'connected (ip, time, current_page) VALUES (\''.$con->escapeStr($ip).'\',\''.(integer) $time.'\',\''.addslashes($currentpage).'\')');
		// Comptage nombre de connectés
    $rs = $con->select('SELECT COUNT(ip) AS total FROM '.DB_PREFIX.'connected');
		$rs = $rs->arry_data[0]['total'];
    if ($rs <= 1) {
      printf($one,$rs);
    } else {
      printf($more,$rs);
      }
  	}
  }
}

?>