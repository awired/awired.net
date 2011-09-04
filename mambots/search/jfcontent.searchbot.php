<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2005 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multi lingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 *
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$_MAMBOTS->registerFunction( 'onSearch', 'botSearchJFContent' );

/**
* Search method
*
* The sql must return the following fields that are used in a common display
* routine: href, title, section, created, text, browsernav
* @param string Target search string
* @param integer The state to search for -1=archived, 0=unpublished, 1=published [default]
* @param string A prefix for the section label, eg, 'Archived '
*/
function botSearchJFContent( $text, $phrase='', $ordering='' ) {
	global $my, $database,$_MAMBOTS;
	global $mosConfig_abolute_path, $mosConfig_lang, $mosConfig_offset;
	$_SESSION['searchword'] = $text;
	
	// check if param query has previously been processed
	if ( !isset($_MAMBOTS->_search_mambot_params['jfcontent']) ) {
		// load mambot params info
		$query = "SELECT params"
		. "\n FROM #__mambots"
		. "\n WHERE element = 'jfcontent.searchbot'"
		. "\n AND folder = 'search'"
		;
		$database->setQuery( $query );
		$database->loadObject($mambot);	
		
		// save query to class variable
		$_MAMBOTS->_search_mambot_params['jfcontent'] = $mambot;
	}
	
	// pull query data from class variable
	$mambot = $_MAMBOTS->_search_mambot_params['jfcontent'];	
	
	$botParams = new mosParameters( $mambot->params );
	$limit 		= $botParams->def( 'search_limit', 50 );
	$nonmenu	= $botParams->def( 'nonmenu', 1 );
	$activeLang = $botParams->def( 'active_language_only', 0);
	
	$nullDate 	= $database->getNullDate();
	$now 		= defined("_CURRENT_SERVER_TIME")?constant("_CURRENT_SERVER_TIME"):date( 'Y-m-d H:i', time() );

	$text = trim( $text );
	if ($text == '') {
		return array();
	}

	$wheres = array();
	switch ($phrase) {
		case 'exact':
			$where = "LOWER(jfc.value) LIKE '%$text%'";
			break;
		case 'all':
		case 'any':
		default:
			$words = explode( ' ', $text );
			$wheres = array();
			foreach ($words as $word) {
				$wheres[] = "LOWER(jfc.value) LIKE '%$word%'";
			}
			$where = '(' . implode( ($phrase == 'all' ? ') AND (' : ') OR ('), $wheres ) . ')';
			break;
	}

	$morder = '';
	switch ($ordering) {
		case 'newest':
		default:
			$order = 'a.created DESC';
			break;
		case 'oldest':
			$order = 'a.created ASC';
			break;
		case 'popular':
			$order = 'a.hits DESC';
			break;
		case 'alpha':
			$order = 'a.title ASC';
			break;
		case 'category':
			$order = 'b.title ASC, a.title ASC';
			$morder = 'a.title ASC';
			break;
	}

	$database->setQuery( "SELECT DISTINCT a.id, a.title AS title,"
	. "\n a.created AS created,"
	. "\n a.introtext,"
	. "\n CONCAT( CONCAT_WS( '/', u.title, b.title ), ' - ', jfl.name) AS section,"
	. "\n CONCAT( 'index.php?option=com_content&amp;task=view&amp;lang=', jfl.iso, '&amp;id=', a.id  ) AS href,"
	. "\n '2' AS browsernav,"
	. "\n a.id as id, jfl.code as jflang"
	. "\n FROM #__content AS a"
	. "\n INNER JOIN #__categories AS b ON b.id=a.catid AND b.access <= '$my->gid'"
	. "\n INNER JOIN #__sections AS u ON u.id = a.sectionid"
	. "\n LEFT JOIN #__jf_content as jfc ON reference_id = a.id"
	. "\n LEFT JOIN #__languages as jfl ON jfc.language_id = jfl.id"
	. "\n WHERE ( $where )"
	. "\n AND a.state = 1"
	. "\n AND u.published = 1"
	. "\n AND b.published = 1"
	. "\n AND a.access <= $my->gid"
	. "\n AND b.access <= $my->gid"
	. "\n AND u.access <= $my->gid"
	. "\n AND ( publish_up = '$nullDate' OR publish_up <= '$now' )"
	. "\n AND ( publish_down = '$nullDate' OR publish_down >= '$now' )"
	. "\n AND jfc.reference_table = 'content'"
	. ( $activeLang ? "\n AND jfl.code = '$mosConfig_lang'" : '')
	. "\n ORDER BY $order", 0, $limit );
	$result1 = $database->loadObjectList();
	
	// search static content
	$sc = defined('_STATIC_CONTENT')?constant("_STATIC_CONTENT"):'Static Content';
	$database->setQuery( "SELECT  DISTINCT a.id, a.title AS title, a.created AS created,"
	. "\n a.introtext,"
	. "\n CONCAT( 'index.php?option=com_content&amp;task=view&amp;lang=', jfl.iso, '&amp;id=', a.id, '&amp;Itemid=', m.id ) AS href,"
	. "\n '2' as browsernav, '". $sc ."' AS section,"
	. "\n a.id, jfl.code as jflang"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__menu AS m ON m.componentid = a.id"
	. "\n LEFT JOIN #__jf_content as jfc ON reference_id = a.id"
	. "\n LEFT JOIN #__languages as jfl ON jfc.language_id = jfl.id"
	. "\n WHERE ( $where )"
	. "\n AND a.state = '1' AND a.access <= '$my->gid'"
	. "\n AND m.type = 'content_typed'"
	. "\n AND ( publish_up = '$nullDate' OR publish_up <= '$now' )"
	. "\n AND ( publish_down = '$nullDate' OR publish_down >= '$now' )"
	. "\n AND jfc.reference_table = 'content'"
	. ( $activeLang ? "\n AND jfl.code = '$mosConfig_lang'" : '')
	. "\n ORDER BY $order", 0, $limit );
	$result2 = $database->loadObjectList();

	// check if search of nonmenu linked static content is allowed
	if ($nonmenu) {
		// collect ids of static content items linked to menu items
		// so they can be removed from query that follows
		$ids = null;
		if(count($result2)) {
			foreach($result2 as $static) {
				$ids[] = $static->id;
			}
			$ids = implode( '\',\'', $ids );
		}
	
		// search static content not connected to a menu
		$query = "SELECT DISTINCT  a.id, a.title AS title, a.created AS created,"
		. "\n a.introtext AS text,"
		. "\n CONCAT( 'index.php?option=com_content&amp;task=view&amp;lang=', jfl.iso, '&amp;id=', a.id ) AS href,"
		. "\n '2' as browsernav, '". $sc ."' AS section,"
		. "\n a.id, jfl.code as jflang"
		. "\n FROM #__content AS a"
		. "\n LEFT JOIN #__menu AS m ON m.componentid = a.id"
		. "\n LEFT JOIN #__jf_content as jfc ON reference_id = a.id"
		. "\n LEFT JOIN #__languages as jfl ON jfc.language_id = jfl.id"
		. "\n WHERE ($where)"
		. "\n AND a.id NOT IN ( '$ids' )"
		. "\n AND a.state = 1"
		. "\n AND a.access <= $my->gid"
		. "\n AND a.sectionid = 0"
		. "\n AND ( a.publish_up = '$nullDate' OR a.publish_up <= '$now' )"
		. "\n AND ( a.publish_down = '$nullDate' OR a.publish_down >= '$now' )"
		. "\n AND jfc.reference_table = 'content'"
		. ( $activeLang ? "\n AND jfl.code = '$mosConfig_lang'" : '')
		. "\n ORDER BY $order"
		;
		$database->setQuery( $query, 0, $limit );
		$result3 = $database->loadObjectList();
	} else {
		$result3 = array();
	}	

	
	$rows = array_merge( $result1, $result2, $result3 );
	
	// In order to make the output syntax conform with the search fields we have to adjust the
	// object attributes. It is necessary to do this later because of the content translation
	for( $i=0; $i<count($rows); $i++ ) {
		$row =& $rows[$i];
		if (isset($row->introtext)) $row->text = $row->introtext;
	}
	
	return $rows;
}
?>
