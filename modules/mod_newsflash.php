<?php
/**
* @version $Id: mod_newsflash.php 5069 2006-09-15 16:16:55Z friesengeist $
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

require_once( $mainframe->getPath( 'front_html', 'com_content') );

if (!defined( '_JOS_NEWSFLASH_MODULE' )) {
	/** ensure that functions are declared only once */
	define( '_JOS_NEWSFLASH_MODULE', 1 );
	
	function output_newsflash( &$row, &$params, &$access ) {	
		global $mainframe;
		
		$row->text 		= $row->introtext;
		$row->groups 	= '';
		$row->readmore 	= (trim( $row->fulltext ) != '');		
		$row->metadesc 	= '';
		$row->metakey 	= '';
		$row->access 	= '';
		$row->created 	= '';
		$row->modified 	= '';	

		HTML_content::show( $row, $params, $access, 0 );
	}
}

global $my, $mosConfig_shownoauth, $mosConfig_offset, $mosConfig_link_titles, $acl;

// Disable edit ability icon
$access = new stdClass();
$access->canEdit 	= 0;
$access->canEditOwn = 0;
$access->canPublish = 0;

$now 				= _CURRENT_SERVER_TIME;
$noauth 			= !$mainframe->getCfg( 'shownoauth' );
$nullDate 			= $database->getNullDate();

$catid 				= intval( $params->get( 'catid' ) );
$items 				= intval( $params->get( 'items', 0 ) );
$style 				= $params->get( 'style', 'flash' );
$moduleclass_sfx    = $params->get( 'moduleclass_sfx' );
$link_titles		= $params->get( 'link_titles', $mosConfig_link_titles );

$params->set( 'intro_only', 		1 );
$params->set( 'hide_author', 		1 );
$params->set( 'hide_createdate', 	0 );
$params->set( 'hide_modifydate', 	1 );
$params->set( 'link_titles', 		$link_titles );

// query to determine article count
$query = "SELECT a.id, a.introtext, a.fulltext , a.images, a.attribs, a.title, a.state"
."\n FROM #__content AS a"
."\n INNER JOIN #__categories AS cc ON cc.id = a.catid"
."\n INNER JOIN #__sections AS s ON s.id = a.sectionid"
."\n WHERE a.state = 1"
. ( $noauth ? "\n AND a.access <= " . (int) $my->gid . " AND cc.access <= " . (int) $my->gid . " AND s.access <= " . (int) $my->gid : '' )
."\n AND (a.publish_up = " . $database->Quote( $nullDate ) . " OR a.publish_up <= " . $database->Quote( $now ) . " ) "
."\n AND (a.publish_down = " . $database->Quote( $nullDate ) . " OR a.publish_down >= " . $database->Quote( $now ) . " )"
."\n AND a.catid = " . (int) $catid
."\n AND cc.published = 1"
."\n AND s.published = 1"
."\n ORDER BY a.ordering"
;
$database->setQuery( $query, 0, $items );
$rows = $database->loadObjectList();

$numrows = count( $rows );

// check if any results returned
if ( $numrows ) {
	switch ($style) {
		case 'horiz':
			echo '<table class="moduletable' . $moduleclass_sfx .'">';
			echo '<tr>';
			foreach ($rows as $row) {
				echo '<td>';			
				output_newsflash( $row, $params, $access );			
				echo '</td>';
			}
			echo '</tr></table>';
			break;
	
		case 'vert':
			foreach ($rows as $row) {
				output_newsflash( $row, $params, $access );
			}
			break;
	
		case 'flash':
		default:
			srand ((double) microtime() * 1000000);
			$flashnum = rand( 0, $numrows-1 );
			$row = $rows[$flashnum];
			
			output_newsflash( $row, $params, $access );
			break;
	}
}
?>