<?php
/**
* @version $Id: content.searchbot.php 5484 2006-10-16 12:14:56Z akede $
* @package Joomla
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

$_MAMBOTS->registerFunction( 'onSearch', 'botSearchContent' );

/**
* Content Search method
*
* The sql must return the following fields that are used in a common display
* routine: href, title, section, created, text, browsernav
* @param string Target search string
* @param string mathcing option, exact|any|all
* @param string ordering option, newest|oldest|popular|alpha|category
*/
function botSearchContent( $text, $phrase='', $ordering='' ) {
	global $database, $my, $_MAMBOTS;

	// check if param query has previously been processed
	if ( !isset($_MAMBOTS->_search_mambot_params['content']) ) {
		// load mambot params info
		$query = "SELECT params"
		. "\n FROM #__mambots"
		. "\n WHERE element = 'content.searchbot'"
		. "\n AND folder = 'search'"
		;
		$database->setQuery( $query );
		$database->loadObject($mambot);

		// save query to class variable
		$_MAMBOTS->_search_mambot_params['content'] = $mambot;
	}

	// pull query data from class variable
	$mambot = $_MAMBOTS->_search_mambot_params['content'];

	$botParams = new mosParameters( $mambot->params );

	$limit 		= $botParams->def( 'search_limit', 50 );
	$nonmenu	= $botParams->def( 'nonmenu', 1 );

	$nullDate 	= $database->getNullDate();
	$now 		= _CURRENT_SERVER_TIME;

	$text = trim( $text );
	if ($text == '') {
		return array();
	}

	$wheres = array();
	switch ($phrase) {
		case 'exact':
			$wheres2 	= array();
			$wheres2[] 	= "LOWER(a.title) LIKE LOWER('%$text%')";
			$wheres2[] 	= "LOWER(a.introtext) LIKE LOWER('%$text%')";
			$wheres2[] 	= "LOWER(a.fulltext) LIKE LOWER('%$text%')";
			$wheres2[] 	= "LOWER(a.metakey) LIKE LOWER('%$text%')";
			$wheres2[] 	= "LOWER(a.metadesc) LIKE LOWER('%$text%')";
			$where 		= '(' . implode( ') OR (', $wheres2 ) . ')';
			break;

		case 'all':
		case 'any':
		default:
			$words = explode( ' ', $text );
			$wheres = array();
			foreach ($words as $word) {
				$wheres2 	= array();
				$wheres2[] 	= "LOWER(a.title) LIKE LOWER('%$word%')";
				$wheres2[] 	= "LOWER(a.introtext) LIKE LOWER('%$word%')";
				$wheres2[] 	= "LOWER(a.fulltext) LIKE LOWER('%$word%')";
				$wheres2[] 	= "LOWER(a.metakey) LIKE LOWER('%$word%')";
				$wheres2[] 	= "LOWER(a.metadesc) LIKE LOWER('%$word%')";
				$wheres[] 	= implode( ' OR ', $wheres2 );
			}
			$where = '(' . implode( ($phrase == 'all' ? ') AND (' : ') OR ('), $wheres ) . ')';
			break;
	}

	$morder = '';
	switch ($ordering) {
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

		case 'newest':
		default:
			$order = 'a.created DESC';
			break;
	}

	// search content items
	$query = "SELECT a.title AS title,"
	. "\n a.created AS created,"
	. "\n CONCAT(a.introtext, a.fulltext) AS text,"
	. "\n CONCAT_WS( '/', u.title, b.title ) AS section,"
	. "\n CONCAT( 'index.php?option=com_content&task=view&id=', a.id ) AS href,"
	. "\n '2' AS browsernav,"
	. "\n 'content' AS type"
 	. "\n, u.id AS sec_id, b.id as cat_id"
 	. "\n FROM #__content AS a"
	. "\n INNER JOIN #__categories AS b ON b.id=a.catid"
	. "\n INNER JOIN #__sections AS u ON u.id = a.sectionid"
	. "\n WHERE ( $where )"
	. "\n AND a.state = 1"
	. "\n AND u.published = 1"
	. "\n AND b.published = 1"
	. "\n AND a.access <= " . (int) $my->gid
	. "\n AND b.access <= " . (int) $my->gid
	. "\n AND u.access <= " . (int) $my->gid
	. "\n AND ( a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " )"
	. "\n AND ( a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"
	. "\n GROUP BY a.id"
	. "\n ORDER BY $order"
	;
	$database->setQuery( $query, 0, $limit );
	$list = $database->loadObjectList();

	// search static content
	$query = "SELECT a.title AS title,"
	. "\n a.created AS created,"
	. "\n a.introtext AS text,"
	. "\n " . $database->Quote( _STATIC_CONTENT ) . " AS section,"
	. "\n CONCAT( 'index.php?option=com_content&task=view&id=', a.id, '&Itemid=', m.id ) AS href,"
	. "\n '2' AS browsernav,"
	. "\n a.id"
	. "\n FROM #__content AS a"
	. "\n LEFT JOIN #__menu AS m ON m.componentid = a.id"
	. "\n WHERE ($where)"
	. "\n AND a.state = 1"
	. "\n AND a.access <= " . (int) $my->gid
	. "\n AND m.type = 'content_typed'"
	. "\n AND ( a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " )"
	. "\n AND ( a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"
	. "\n GROUP BY a.id"
	. "\n ORDER BY ". ($morder ? $morder : $order)
	;
	$database->setQuery( $query, 0, $limit );
	$list2 = $database->loadObjectList();

	// search archived content
	$query = "SELECT a.title AS title,"
	. "\n a.created AS created,"
	. "\n a.introtext AS text,"
	. "\n CONCAT_WS( '/', " . $database->Quote( _SEARCH_ARCHIVED ) . ", u.title, b.title ) AS section,"
	. "\n CONCAT('index.php?option=com_content&task=view&id=',a.id) AS href,"
	. "\n '2' AS browsernav,"
	. "\n 'content' AS type"
	. "\n FROM #__content AS a"
	. "\n INNER JOIN #__categories AS b ON b.id=a.catid"
	. "\n INNER JOIN #__sections AS u ON u.id = a.sectionid"
	. "\n WHERE ( $where )"
	. "\n AND a.state = -1"
	. "\n AND u.published = 1"
	. "\n AND b.published = 1"
	. "\n AND a.access <= " . (int) $my->gid
	. "\n AND b.access <= " . (int) $my->gid
	. "\n AND u.access <= " . (int) $my->gid
	. "\n AND ( a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " )"
	. "\n AND ( a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"
	. "\n ORDER BY $order"
	;
	$database->setQuery( $query, 0, $limit );
	$list3 = $database->loadObjectList();

	// check if search of nonmenu linked static content is allowed
	if ($nonmenu) {
		// collect ids of static content items linked to menu items
		// so they can be removed from query that follows
		$ids = null;
		if(count($list2)) {
			foreach($list2 as $static) {
				$ids[] = (int) $static->id;
			}
			$ids = "a.id != " . implode( " OR a.id != ", $ids );
		}

		// search static content not connected to a menu
		$query = "SELECT a.title AS title,"
		. "\n a.created AS created,"
		. "\n a.introtext AS text,"
		. "\n '2' as browsernav, " . $database->Quote( _STATIC_CONTENT ) . " AS section,"
		. "\n CONCAT( 'index.php?option=com_content&task=view&id=', a.id ) AS href,"
		. "\n a.id"
		. "\n FROM #__content AS a"
		. "\n WHERE ($where)"
		. (($ids) ? "\n AND ( $ids )" : '')
		. "\n AND a.state = 1"
		. "\n AND a.access <= " . (int) $my->gid
		. "\n AND a.sectionid = 0"
		. "\n AND ( a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " )"
		. "\n AND ( a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"
		. "\n ORDER BY ". ($morder ? $morder : $order)
		;
		$database->setQuery( $query, 0, $limit );
		$list4 = $database->loadObjectList();
	} else {
		$list4 = array();
	}

	return array_merge( $list, $list2, $list3, (array)$list4 );
}
?>