<?php
/**
* @version $Id: admin.content.php 6019 2006-12-18 19:50:34Z friesengeist $
* @package Joomla
* @subpackage Content
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

require_once( $mainframe->getPath( 'admin_html' ) );

$sectionid 	= intval( mosGetParam( $_REQUEST, 'sectionid', 0 ) );

$cid 		= josGetArrayInts( 'cid' );

switch ($task) {
	case 'new':
		editContent( 0, $sectionid, $option );
		break;

	case 'edit':
		editContent( $id, $sectionid, $option );
		break;

	case 'editA':
		editContent( intval( $cid[0] ), '', $option );
		break;

	case 'go2menu':
	case 'go2menuitem':
	case 'resethits':
	case 'menulink':
	case 'apply':
	case 'save':
		saveContent( $sectionid, $task );
		break;

	case 'remove':
		removeContent( $cid, $sectionid, $option );
		break;

	case 'publish':
		changeContent( $cid, 1, $option );
		break;

	case 'unpublish':
		changeContent( $cid, 0, $option );
		break;

	case 'toggle_frontpage':
		toggleFrontPage( $cid, $sectionid, $option );
		break;

	case 'archive':
		changeContent( $cid, -1, $option );
		break;

	case 'unarchive':
		changeContent( $cid, 0, $option );
		break;

	case 'cancel':
		cancelContent();
		break;

	case 'orderup':
		orderContent( intval( $cid[0] ), -1, $option );
		break;

	case 'orderdown':
		orderContent( intval( $cid[0] ), 1, $option );
		break;

	case 'showarchive':
		viewArchive( $sectionid, $option );
		break;

	case 'movesect':
		moveSection( $cid, $sectionid, $option );
		break;

	case 'movesectsave':
		moveSectionSave( $cid, $sectionid, $option );
		break;

	case 'copy':
		copyItem( $cid, $sectionid, $option );
		break;

	case 'copysave':
		copyItemSave( $cid, $sectionid, $option );
		break;

	case 'accesspublic':
		accessMenu( intval( $cid[0] ), 0, $option );
		break;

	case 'accessregistered':
		accessMenu( intval( $cid[0] ), 1, $option );
		break;

	case 'accessspecial':
		accessMenu( intval( $cid[0] ), 2, $option );
		break;

	case 'saveorder':
		saveOrder( $cid );
		break;

	default:
		viewContent( $sectionid, $option );
		break;
}

/**
* Compiles a list of installed or defined modules
* @param database A database connector object
*/
function viewContent( $sectionid, $option ) {
	global $database, $mainframe, $mosConfig_list_limit;

	$catid 				= intval( $mainframe->getUserStateFromRequest( "catid{$option}{$sectionid}", 'catid', 0 ) );
	$filter_authorid 	= intval( $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 ) );
	$filter_sectionid 	= intval( $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 ) );
	$limit 				= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 		= intval( $mainframe->getUserStateFromRequest( "view{$option}{$sectionid}limitstart", 'limitstart', 0 ) );
	$search 			= $mainframe->getUserStateFromRequest( "search{$option}{$sectionid}", 'search', '' );
	if (get_magic_quotes_gpc()) {
		$search			= stripslashes( $search );
	}
	$redirect 			= $sectionid;
	$filter 			= ''; //getting a undefined variable error

	if ( $sectionid == 0 ) {
		// used to show All content items
		$where = array(
		"c.state 	>= 0",
		"c.catid 	= cc.id",
		"cc.section = s.id",
		"s.scope	= 'content'",
		);
		$order = "\n ORDER BY s.title, c.catid, cc.ordering, cc.title, c.ordering";
		$all = 1;
		//$filter = "\n , #__sections AS s WHERE s.id = c.section";

		if ($filter_sectionid > 0) {
			$filter = "\n WHERE cc.section = '" . (int) $filter_sectionid . "'";
		}
		$section->title = 'Tous les articles';
		$section->id = 0;
	} else {
		$where = array(
		"c.state 	>= 0",
		"c.catid 	= cc.id",
		"cc.section = s.id",
		"s.scope 	= 'content'",
		"c.sectionid = " . (int) $sectionid
		);
		$order 		= "\n ORDER BY cc.ordering, cc.title, c.ordering";
		$all 		= NULL;
		$filter 	= "\n WHERE cc.section = '" . (int) $sectionid . "'";
		$section 	= new mosSection( $database );
		$section->load( (int)$sectionid );
	}

	// used by filter
	if ( $filter_sectionid > 0 ) {
		$where[] = "c.sectionid = " . (int) $filter_sectionid;
	}
	if ( $catid > 0 ) {
		$where[] = "c.catid = " . (int) $catid;
	}
	if ( $filter_authorid > 0 ) {
		$where[] = "c.created_by = " . (int) $filter_authorid;
	}

	if ( $search ) {
		$where[] = "LOWER( c.title ) LIKE '%" . $database->getEscaped( trim( strtolower( $search ) ) ) . "%'";
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__content AS c"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "" )
	;
	$database->setQuery( $query );
	$total = $database->loadResult();
	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$query = "SELECT c.*, g.name AS groupname, cc.name, u.name AS editor, f.content_id AS frontpage, s.title AS section_name, v.name AS author"
	. "\n FROM #__content AS c"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__users AS v ON v.id = c.created_by"
	. "\n LEFT JOIN #__content_frontpage AS f ON f.content_id = c.id"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
	. $order
	;
	$database->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $database->loadObjectList();

	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	// get list of categories for dropdown filter
	$query = "SELECT cc.id AS value, cc.title AS text, section"
	. "\n FROM #__categories AS cc"
	. "\n INNER JOIN #__sections AS s ON s.id = cc.section "
	. $filter
	. "\n ORDER BY s.ordering, cc.ordering"
	;
	$lists['catid'] 	= filterCategory( $query, $catid );

	// get list of sections for dropdown filter
	$javascript = 'onchange="document.adminForm.submit();"';
	$lists['sectionid']	= mosAdminMenus::SelectSection( 'filter_sectionid', $filter_sectionid, $javascript );

	// get list of Authors for dropdown filter
	$query = "SELECT c.created_by, u.name"
	. "\n FROM #__content AS c"
	. "\n INNER JOIN #__sections AS s ON s.id = c.sectionid"
	. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
	. "\n WHERE c.state != -1"
	. "\n AND c.state != -2"
	. "\n GROUP BY u.name"
	. "\n ORDER BY u.name"
	;
	$authors[] = mosHTML::makeOption( '0', _SEL_AUTHOR, 'created_by', 'name' );
	$database->setQuery( $query );
	$authors = array_merge( $authors, $database->loadObjectList() );
	$lists['authorid']	= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid );

	HTML_content::showContent( $rows, $section, $lists, $search, $pageNav, $all, $redirect );
}

/**
* Shows a list of archived content items
* @param int The section id
*/
function viewArchive( $sectionid, $option ) {
	global $database, $mainframe, $mosConfig_list_limit;

	$catid 				= intval( $mainframe->getUserStateFromRequest( "catidarc{$option}{$sectionid}", 'catid', 0 ) );
	$limit 				= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 		= intval( $mainframe->getUserStateFromRequest( "viewarc{$option}{$sectionid}limitstart", 'limitstart', 0 ) );
	$filter_authorid 	= intval( $mainframe->getUserStateFromRequest( "filter_authorid{$option}{$sectionid}", 'filter_authorid', 0 ) );
	$filter_sectionid 	= intval( $mainframe->getUserStateFromRequest( "filter_sectionid{$option}{$sectionid}", 'filter_sectionid', 0 ) );
	$search 			= $mainframe->getUserStateFromRequest( "searcharc{$option}{$sectionid}", 'search', '' );
	if (get_magic_quotes_gpc()) {
		$search			= stripslashes( $search );
	}
	$redirect 			= $sectionid;

	if ( $sectionid == 0 ) {
		$where = array(
		"c.state 	= -1",
		"c.catid	= cc.id",
		"cc.section = s.id",
		"s.scope  	= 'content'"
		);
		$filter = "\n , #__sections AS s WHERE s.id = c.section";
		$all = 1;
	} else {
		$where = array(
		"c.state 	= -1",
		"c.catid	= cc.id",
		"cc.section	= s.id",
		"s.scope	= 'content'",
		"c.sectionid= " . (int) $sectionid
		);
		$filter = "\n WHERE section = '" . (int) $sectionid . "'";
		$all = NULL;
	}

	// used by filter
	if ( $filter_sectionid > 0 ) {
		$where[] = "c.sectionid = " . (int) $filter_sectionid;
	}
	if ( $filter_authorid > 0 ) {
		$where[] = "c.created_by = " . (int) $filter_authorid;
	}
	if ($catid > 0) {
		$where[] = "c.catid = " . (int) $catid;
	}
	if ($search) {
		$where[] = "LOWER( c.title ) LIKE '%" . $database->getEscaped( trim( strtolower( $search ) ) ) . "%'";
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__content AS c"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
	;
	$database->setQuery( $query );
	$total = $database->loadResult();

	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit  );

	$query = "SELECT c.*, g.name AS groupname, cc.name, v.name AS author"
	. "\n FROM #__content AS c"
	. "\n LEFT JOIN #__categories AS cc ON cc.id = c.catid"
	. "\n LEFT JOIN #__sections AS s ON s.id = c.sectionid"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN #__users AS v ON v.id = c.created_by"
	. ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
	. "\n ORDER BY c.catid, c.ordering"
	;
	$database->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return;
	}

	// get list of categories for dropdown filter
	$query = "SELECT c.id AS value, c.title AS text"
	. "\n FROM #__categories AS c"
	. $filter
	. "\n ORDER BY c.ordering"
	;
	$lists['catid'] 			= filterCategory( $query, $catid );

	// get list of sections for dropdown filter
	$javascript = 'onchange="document.adminForm.submit();"';
	$lists['sectionid']		= mosAdminMenus::SelectSection( 'filter_sectionid', $filter_sectionid, $javascript );

	$section = new mosSection( $database );
	$section->load( (int)$sectionid );

	// get list of Authors for dropdown filter
	$query = "SELECT c.created_by, u.name"
	. "\n FROM #__content AS c"
	. "\n INNER JOIN #__sections AS s ON s.id = c.sectionid"
	. "\n LEFT JOIN #__users AS u ON u.id = c.created_by"
	. "\n WHERE c.state = -1"
	. "\n GROUP BY u.name"
	. "\n ORDER BY u.name"
	;
	$authors[] = mosHTML::makeOption( '0', _SEL_AUTHOR, 'created_by', 'name' );
	$database->setQuery( $query );
	$authors = array_merge( $authors, $database->loadObjectList() );
	$lists['authorid']	= mosHTML::selectList( $authors, 'filter_authorid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'created_by', 'name', $filter_authorid );

	HTML_content::showArchive( $rows, $section, $lists, $search, $pageNav, $option, $all, $redirect );
}

/**
* Compiles information to add or edit the record
* @param database A database connector object
* @param integer The unique id of the record to edit (0 if new)
* @param integer The id of the content section
*/
function editContent( $uid=0, $sectionid=0, $option ) {
	global $database, $my, $mainframe;
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_offset;

	$redirect = strval( mosGetParam( $_POST, 'redirect', '' ) );
	$nullDate = $database->getNullDate();

	if ( !$redirect ) {
		$redirect = $sectionid;
	}

	// load the row from the db table
	$row = new mosContent( $database );
	$row->load( (int)$uid );

	if ($uid) {
		$sectionid = $row->sectionid;
		if ($row->state < 0) {
			mosRedirect( 'index2.php?option=com_content&sectionid='. $row->sectionid, 'You cannot edit an archived item' );
		}
	}

	// fail if checked out not by 'me'
	if ($row->checked_out && $row->checked_out != $my->id) {
		mosRedirect( 'index2.php?option=com_content', 'Le module '. $row->title .' est actuellement �dit� par un autre administrateur' );
	}

	$selected_folders = NULL;
	if ($uid) {
		$row->checkout( $my->id );
		
		if (trim( $row->images )) {
			$row->images = explode( "\n", $row->images );
		} else {
			$row->images = array();
		}

 		$row->created 		= mosFormatDate( $row->created, _CURRENT_SERVER_TIME_FORMAT );
		$row->modified 		= $row->modified == $nullDate ? '' : mosFormatDate( $row->modified, _CURRENT_SERVER_TIME_FORMAT );
		$row->publish_up 	= mosFormatDate( $row->publish_up, _CURRENT_SERVER_TIME_FORMAT );

 		if (trim( $row->publish_down ) == $nullDate || trim( $row->publish_down ) == '' || trim( $row->publish_down ) == '-' ) {
			$row->publish_down = 'Jamais';
		}
		$row->publish_down 	= mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT );

		$query = "SELECT name"
		. "\n FROM #__users"
		. "\n WHERE id = " . (int) $row->created_by
		;
		$database->setQuery( $query );
		$row->creator = $database->loadResult();

		// test to reduce unneeded query
		if ( $row->created_by == $row->modified_by ) {
			$row->modifier = $row->creator;
		} else {
			$query = "SELECT name"
			. "\n FROM #__users"
			. "\n WHERE id = " . (int) $row->modified_by
			;
			$database->setQuery( $query );
			$row->modifier = $database->loadResult();
		}

		$query = "SELECT content_id"
		. "\n FROM #__content_frontpage"
		. "\n WHERE content_id = " . (int) $row->id
		;
		$database->setQuery( $query );
		$row->frontpage = $database->loadResult();

		// get list of links to this item
		$and = "\n AND componentid = " . (int) $row->id;
		$menus = mosAdminMenus::Links2Menu( 'content_item_link', $and );
	} else {
		if ( !$sectionid && @$_POST['filter_sectionid'] ) {
			$sectionid = $_POST['filter_sectionid'];
		}
		if ( @$_POST['catid'] ) {
			$row->catid 	= (int)$_POST['catid'];
			$category = new mosCategory( $database );
			$category->load( (int)$_POST['catid'] );
			$sectionid = $category->section;
		} else {
			$row->catid 	= 0;
		}
		
		$row->sectionid 	= $sectionid;
		$row->version 		= 0;
		$row->state 		= 1;
		$row->ordering 		= 0;
		$row->images 		= array();
		$row->publish_up 	= date( 'Y-m-d H:i:s', time() + ( $mosConfig_offset * 60 * 60 ) );
		$row->publish_down 	= 'Jamais';
		$row->creator 		= '';
		$row->modified 		= $nullDate;
		$row->modifier 		= '';
		$row->frontpage 	= 0;
		$menus = array();
	}

	$javascript = "onchange=\"changeDynaList( 'catid', sectioncategories, document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].value, 0, 0);\"";

	$query = "SELECT s.id, s.title"
	. "\n FROM #__sections AS s"
	. "\n ORDER BY s.ordering";
	$database->setQuery( $query );
	if ( $sectionid == 0 ) {
		$sections[] = mosHTML::makeOption( '-1', 'S�lectionner Section', 'id', 'title' );
		$sections = array_merge( $sections, $database->loadObjectList() );
		$lists['sectionid'] = mosHTML::selectList( $sections, 'sectionid', 'class="inputbox" size="1" '. $javascript, 'id', 'title' );
	} else {
		$sections = $database->loadObjectList();
		$lists['sectionid'] = mosHTML::selectList( $sections, 'sectionid', 'class="inputbox" size="1" '. $javascript, 'id', 'title', intval( $row->sectionid ) );
	}
	
	$contentSection = '';
	foreach($sections as $section) {
		$section_list[] = $section->id;
		// get the type name - which is a special category
		if ($row->sectionid){
			if ( $section->id == $row->sectionid ) {
				$contentSection = $section->title;
			}
		} else {
			if ( $section->id == $sectionid ) {
				$contentSection = $section->title;
			}
		}		
	}

	$sectioncategories 			= array();
	$sectioncategories[-1] 		= array();
	$sectioncategories[-1][] 	= mosHTML::makeOption( '-1', 'S�lectionner Cat�gorie', 'id', 'name' );
	mosArrayToInts( $section_list );
	$section_list 				= 'section=' . implode( ' OR section=', $section_list );

	$query = "SELECT id, name, section"
	. "\n FROM #__categories"
	. "\n WHERE ( $section_list )"
	. "\n ORDER BY ordering"
	;
	$database->setQuery( $query );
	$cat_list = $database->loadObjectList();
	foreach($sections as $section) {
		$sectioncategories[$section->id] = array();
		$rows2 = array();
		foreach($cat_list as $cat) {
			if ($cat->section == $section->id) {
				$rows2[] = $cat;
			}
		}
		foreach($rows2 as $row2) {
			$sectioncategories[$section->id][] = mosHTML::makeOption( $row2->id, $row2->name, 'id', 'name' );
		}
	}	

 	// get list of categories
  	if ( !$row->catid && !$row->sectionid ) {
 		$categories[] 		= mosHTML::makeOption( '-1', 'S�lectionner Cat�gorie', 'id', 'name' );
 		$lists['catid'] 	= mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1"', 'id', 'name' );
  	} else {
		$categoriesA = array();
		if ( $sectionid == 0 ) {
			//$where = "\n WHERE section NOT LIKE '%com_%'";
			foreach($cat_list as $cat) {		
				$categoriesA[] = $cat;
			}
		} else {
			//$where = "\n WHERE section = '$sectionid'";
			foreach($cat_list as $cat) {		
				if ($cat->section == $sectionid) {
					$categoriesA[] = $cat;
				}
			}
		}		
		$categories[] 		= mosHTML::makeOption( '-1', 'S�lectionner Cat�gorie', 'id', 'name' );
		$categories 		= array_merge( $categories, $categoriesA );
 		$lists['catid'] 	= mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1"', 'id', 'name', intval( $row->catid ) );
  	}

	// build the html select list for ordering
	$query = "SELECT ordering AS value, title AS text"
	. "\n FROM #__content"
	. "\n WHERE catid = " . (int) $row->catid
	. "\n AND state >= 0"
	. "\n ORDER BY ordering"
	;
	$lists['ordering'] = mosAdminMenus::SpecificOrdering( $row, $uid, $query, 1 );

	// pull param column from category info
	$query = "SELECT params"
	. "\n FROM #__categories"
	. "\n WHERE id = " . (int) $row->catid
	;
	$database->setQuery( $query );
	$categoryParam = $database->loadResult();	
	
	$paramsCat = new mosParameters( $categoryParam, $mainframe->getPath( 'com_xml', 'com_categories' ), 'component' );
	$selected_folders = $paramsCat->get( 'imagefolders', '' );

	if ( !$selected_folders ) {
		$selected_folders = '*2*';
	}
	
	// check if images utilizes settings from section		
	if ( strpos( $selected_folders, '*2*' ) !== false ) {
		unset( $selected_folders );
		// load param column from section info
		$query = "SELECT params"
		. "\n FROM #__sections"
		. "\n WHERE id = " . (int) $row->sectionid
		;
		$database->setQuery( $query );		
		$sectionParam = $database->loadResult();			
		
		$paramsSec = new mosParameters( $sectionParam, $mainframe->getPath( 'com_xml', 'com_sections' ), 'component' );
		$selected_folders = $paramsSec->get( 'imagefolders', '' );
	}
	
	if ( trim( $selected_folders ) ) {
		$temps = explode( ',', $selected_folders );
		foreach( $temps as $temp ) {
			$temp 		= ampReplace( $temp);
			$folders[] 	= mosHTML::makeOption( $temp, $temp );
		}
	} else {
		$folders[] = mosHTML::makeOption( '*1*' );
	}	

	// calls function to read image from directory
	$pathA 		= $mosConfig_absolute_path .'/images/stories';
	$pathL 		= $mosConfig_live_site .'/images/stories';
	$images 	= array();
	
	if ( $folders[0]->value == '*1*' ) {
		$folders 	= array();
		$folders[] 	= mosHTML::makeOption( '/' );
		mosAdminMenus::ReadImages( $pathA, '/', $folders, $images );
	} else {
		mosAdminMenus::ReadImagesX( $folders, $images );
	}

	// list of folders in images/stories/
	$lists['folders'] 			= mosAdminMenus::GetImageFolders( $folders, $pathL );
	// list of images in specfic folder in images/stories/
	$lists['imagefiles']		= mosAdminMenus::GetImages( $images, $pathL, $folders );
	// list of saved images
	$lists['imagelist'] 		= mosAdminMenus::GetSavedImages( $row, $pathL );

	// build list of users
	$active = ( intval( $row->created_by ) ? intval( $row->created_by ) : $my->id );
	$lists['created_by'] 		= mosAdminMenus::UserSelect( 'created_by', $active );
	// build the select list for the image position alignment
	$lists['_align'] 			= mosAdminMenus::Positions( '_align' );
	// build the select list for the image caption alignment
	$lists['_caption_align'] 	= mosAdminMenus::Positions( '_caption_align' );
	// build the html select list for the group access
	$lists['access'] 			= mosAdminMenus::Access( $row );
	// build the html select list for menu selection
	$lists['menuselect']		= mosAdminMenus::MenuSelect( );

	// build the select list for the image caption position
	$pos[] = mosHTML::makeOption( 'bottom', _CMN_BOTTOM );
	$pos[] = mosHTML::makeOption( 'top', _CMN_TOP );
	$lists['_caption_position'] = mosHTML::selectList( $pos, '_caption_position', 'class="inputbox" size="1"', 'value', 'text' );

	// get params definitions
	$params = new mosParameters( $row->attribs, $mainframe->getPath( 'com_xml', 'com_content' ), 'component' );

	HTML_content::editContent( $row, $contentSection, $lists, $sectioncategories, $images, $params, $option, $redirect, $menus );
}

/**
* Saves the content item an edit form submit
* @param database A database connector object
*/
function saveContent( $sectionid, $task ) {
	global $database, $my, $mainframe, $mosConfig_offset;

	$menu 		= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$menuid		= intval( mosGetParam( $_POST, 'menuid', 0 ) );
	$nullDate 	= $database->getNullDate();

	$row = new mosContent( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// sanitise id field
	$row->id = (int) $row->id;

	if ($row->id) {
		$row->modified 		= date( 'Y-m-d H:i:s' );
		$row->modified_by 	= $my->id;
	}

	$row->created_by 	= $row->created_by ? $row->created_by : $my->id;
	
	if ($row->created && strlen(trim( $row->created )) <= 10) {
		$row->created 	.= ' 00:00:00';
	}
	$row->created 		= $row->created ? mosFormatDate( $row->created, '%Y-%m-%d %H:%M:%S', -$mosConfig_offset ) : date( 'Y-m-d H:i:s' );
	
	if (strlen(trim( $row->publish_up )) <= 10) {
		$row->publish_up .= ' 00:00:00';
 	}
	$row->publish_up = mosFormatDate( $row->publish_up, _CURRENT_SERVER_TIME_FORMAT, -$mosConfig_offset );

	if (trim( $row->publish_down ) == 'Never' || trim( $row->publish_down ) == '') {
		$row->publish_down = $nullDate;
	} else {
		if (strlen(trim( $row->publish_down )) <= 10) {
			$row->publish_down .= ' 00:00:00';
		}
		$row->publish_down = mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT, -$mosConfig_offset );
	}

	$row->state = intval( mosGetParam( $_REQUEST, 'published', 0 ) );

	$params = mosGetParam( $_POST, 'params', '' );
	if (is_array( $params )) {
		$txt = array();
		foreach ( $params as $k=>$v) {
			if (get_magic_quotes_gpc()) {
				$v = stripslashes( $v );
			}
			$txt[] = "$k=$v";
		}
		$row->attribs = implode( "\n", $txt );
	}

	// code cleaner for xhtml transitional compliance
	$row->introtext = str_replace( '<br>', '<br />', $row->introtext );
	$row->fulltext 	= str_replace( '<br>', '<br />', $row->fulltext );

 	// remove <br /> take being automatically added to empty fulltext
 	$length	= strlen( $row->fulltext ) < 9;
 	$search = strstr( $row->fulltext, '<br />');
 	if ( $length && $search ) {
 		$row->fulltext = NULL;
 	}
	
	$row->title = ampReplace( $row->title );

 	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	$row->version++;
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// manage frontpage items
	require_once( $mainframe->getPath( 'class', 'com_frontpage' ) );
	$fp = new mosFrontPage( $database );

	if (intval( mosGetParam( $_REQUEST, 'frontpage', 0 ) )) {

		// toggles go to first place
		if (!$fp->load( (int)$row->id )) {
			// new entry
			$query = "INSERT INTO #__content_frontpage"
			. "\n VALUES ( " . (int) $row->id . ", 1 )"
			;
			$database->setQuery( $query );
			if (!$database->query()) {
				echo "<script> alert('".$database->stderr()."');</script>\n";
				exit();
			}
			$fp->ordering = 1;
		}
	} else {
		// no frontpage mask
		if (!$fp->delete( (int)$row->id )) {
			$msg .= $fp->stderr();
		}
		$fp->ordering = 0;
	}
	$fp->updateOrder();

	$row->checkin();
	$row->updateOrder( "catid = " . (int) $row->catid . " AND state >= 0" );

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );
	
	$redirect = mosGetParam( $_POST, 'redirect', $sectionid );
	switch ( $task ) {
		case 'go2menu':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
			break;

		case 'go2menuitem':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
			break;

		case 'menulink':
			menuLink( $redirect, $row->id );
			break;

		case 'resethits':
			resethits( $redirect, $row->id );
			break;

		case 'apply':
			$msg = 'Modifications appliqu�es pour: '. $row->title;
			mosRedirect( 'index2.php?option=com_content&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $row->id, $msg );
			break;

		case 'save':
		default:
			$msg = 'Modifications enregistr�es pour: '. $row->title;
			mosRedirect( 'index2.php?option=com_content&sectionid='. $redirect, $msg );

			break;
	}
}

/**
* Changes the state of one or more content pages
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function changeContent( $cid=null, $state=0, $option ) {
	global $database, $my, $task;
	
	if (count( $cid ) < 1) {
		$action = $state == 1 ? 'publish' : ($state == -1 ? 'archive' : 'unpublish');
		echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$total = count ( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );

	$query = "UPDATE #__content"
	. "\n SET state = " . (int) $state . ", modified = " . $database->Quote( date( 'Y-m-d H:i:s' ) )
	. "\n WHERE ( $cids ) AND ( checked_out = 0 OR (checked_out = " . (int) $my->id . ") )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosContent( $database );
		$row->checkin( $cid[0] );
	}

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );
	
	switch ( $state ) {
		case -1:				
			$msg = $total .' article(s) archiv�';
			break;
		
		case 1:				
			$msg = $total .' article(s) publi�';
			break;
			
		case 0:				
		default:
			if ( $task == 'unarchive' ) {
				$msg = $total .' article(s) d�sarchiv�';
			} else {
				$msg = $total .' article(s) d�publi�';
			}
			break;
	}

	$redirect 	= mosGetParam( $_POST, 'redirect', $row->sectionid );
	$rtask 		= strval( mosGetParam( $_POST, 'returntask', '' ) );
	if ( $rtask ) {
		$rtask = '&task='. $rtask;
	} else {
		$rtask = '';
	}

	mosRedirect( 'index2.php?option='. $option . $rtask .'&sectionid='. $redirect .'&mosmsg='. $msg );
}

/**
* Changes the state of one or more content pages
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function toggleFrontPage( $cid, $section, $option ) {
	global $database, $mainframe;

	if (count( $cid ) < 1) {
		echo "<script> alert('Select an item to toggle'); window.history.go(-1);</script>\n";
		exit;
	}

	$msg = '';
	require_once( $mainframe->getPath( 'class', 'com_frontpage' ) );

	$fp = new mosFrontPage( $database );
	foreach ($cid as $id) {
		// toggles go to first place
		if ($fp->load( $id )) {
			if (!$fp->delete( $id )) {
				$msg .= $fp->stderr();
			}
			$fp->ordering = 0;
		} else {
			// new entry
			$query = "INSERT INTO #__content_frontpage"
			. "\n VALUES ( " . (int) $id . ", 0 )"
			;
			$database->setQuery( $query );
			if (!$database->query()) {
				echo "<script> alert('".$database->stderr()."');</script>\n";
				exit();
			}
			$fp->ordering = 0;
		}
		$fp->updateOrder();
	}
	
	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	mosRedirect( 'index2.php?option='. $option .'&sectionid='. $section, $msg );
}

function removeContent( &$cid, $sectionid, $option ) {
	global $database;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Select an item to delete'); window.history.go(-1);</script>\n";
		exit;
	}

	$state = '-2';
	$ordering = '0';
	//seperate contentids
	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "UPDATE #__content"
	. "\n SET state = " . (int) $state . ", ordering = " . (int) $ordering
	. "\n WHERE ( $cids )"
	;
	$database->setQuery( $query );
	if ( !$database->query() ) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );
	
	$msg = $total ." Article(s) envoy�(s) � la corbeille";
	$return = strval( mosGetParam( $_POST, 'returntask', '' ) );
	mosRedirect( 'index2.php?option='. $option .'&task='. $return .'&sectionid='. $sectionid, $msg );
}

/**
* Cancels an edit operation
*/
function cancelContent( ) {
	global $database;

	$row = new mosContent( $database );
	$row->bind( $_POST );
	$row->checkin();

	$redirect = mosGetParam( $_POST, 'redirect', 0 );
	mosRedirect( 'index2.php?option=com_content&sectionid='. $redirect );
}

/**
* Moves the order of a record
* @param integer The increment to reorder by
*/
function orderContent( $uid, $inc, $option ) {
	global $database;

	$row = new mosContent( $database );
	$row->load( (int)$uid );
	$row->move( $inc, "catid = " . (int) $row->catid . " AND state >= 0" );

	$redirect = mosGetParam( $_POST, 'redirect', $row->sectionid );
	
	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	mosRedirect( 'index2.php?option='. $option .'&sectionid='. $redirect );
}

/**
* Form for moving item(s) to a different section and category
*/
function moveSection( $cid, $sectionid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	//seperate contentids
	mosArrayToInts( $cids );
	$cids = 'a.id=' . implode( ' OR a.id=', $cid );
	// Content Items query
	$query = 	"SELECT a.title"
	. "\n FROM #__content AS a"
	. "\n WHERE ( $cids )"
	. "\n ORDER BY a.title"
	;
	$database->setQuery( $query );
	$items = $database->loadObjectList();

	$database->setQuery(
	$query = 	"SELECT CONCAT_WS( ', ', s.id, c.id ) AS `value`, CONCAT_WS( '/', s.name, c.name ) AS `text`"
	. "\n FROM #__sections AS s"
	. "\n INNER JOIN #__categories AS c ON c.section = s.id"
	. "\n WHERE s.scope = 'content'"
	. "\n ORDER BY s.name, c.name"
	);
	$rows = $database->loadObjectList();
	// build the html select list
	$sectCatList = mosHTML::selectList( $rows, 'sectcat', 'class="inputbox" size="8"', 'value', 'text', null );

	HTML_content::moveSection( $cid, $sectCatList, $option, $sectionid, $items );
}

/**
* Save the changes to move item(s) to a different section and category
*/
function moveSectionSave( &$cid, $sectionid, $option ) {
	global $database, $my;

	$sectcat 	= mosGetParam( $_POST, 'sectcat', '' );
	list( $newsect, $newcat ) = explode( ',', $sectcat );
	// ensure values are integers
	$newsect 	= intval( $newsect );
	$newcat 	= intval( $newcat );

	if (!$newsect && !$newcat ) {
		mosRedirect( "index.php?option=com_content&sectionid=$sectionid&mosmsg=An error has occurred" );
	}

	// find section name
	$query = "SELECT a.name"
	. "\n FROM #__sections AS a"
	. "\n WHERE a.id = " . (int) $newsect
	;
	$database->setQuery( $query );
	$section = $database->loadResult();

	// find category name
	$query = "SELECT  a.name"
	. "\n FROM #__categories AS a"
	. "\n WHERE a.id = " . (int) $newcat
	;
	$database->setQuery( $query );
	$category = $database->loadResult();

	$total = count( $cid );

	$row = new mosContent( $database );
	// update old orders - put existing items in last place
	foreach ($cid as $id) {
		$row->load( intval( $id ) );
		$row->ordering = 0;
		$row->store();
		$row->updateOrder( "catid = " . (int) $row->catid . " AND state >= 0" );
	}

	mosArrayToInts( $cids );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "UPDATE #__content SET sectionid = " . (int) $newsect . ", catid = " . (int) $newcat
	. "\n WHERE ( $cids )"
	. "\n AND ( checked_out = 0 OR ( checked_out = " . (int) $my->id . " ) )"
	;
	$database->setQuery( $query );
	if ( !$database->query() ) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// update new orders - put items in last place
	foreach ($cid as $id) {
		$row->load( intval( $id ) );
		$row->ordering = 0;
		$row->store();
		$row->updateOrder( "catid = " . (int) $row->catid . " AND state >= 0" );
	}
	
	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	$msg = $total. ' Item(s) successfully moved to Section: '. $section .', Category: '. $category;
	mosRedirect( 'index2.php?option='. $option .'&sectionid='. $sectionid .'&mosmsg='. $msg );
}


/**
* Form for copying item(s)
**/
function copyItem( $cid, $sectionid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	//seperate contentids
	mosArrayToInts( $cids );
	$cids = 'a.id=' . implode( ' OR a.id=', $cid );
	## Content Items query
	$query = "SELECT a.title"
	. "\n FROM #__content AS a"
	. "\n WHERE ( $cids )"
	. "\n ORDER BY a.title"
	;
	$database->setQuery( $query );
	$items = $database->loadObjectList();

	## Section & Category query
	$query = 	"SELECT CONCAT_WS(',',s.id,c.id) AS `value`, CONCAT_WS(' // ', s.name, c.name) AS `text`"
	. "\n FROM #__sections AS s"
	. "\n INNER JOIN #__categories AS c ON c.section = s.id"
	. "\n WHERE s.scope = 'content'"
	. "\n ORDER BY s.name, c.name"
	;
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	// build the html select list
	$sectCatList = mosHTML::selectList( $rows, 'sectcat', 'class="inputbox" size="10"', 'value', 'text', NULL );

	HTML_content::copySection( $option, $cid, $sectCatList, $sectionid, $items );
}


/**
* saves Copies of items
**/
function copyItemSave( $cid, $sectionid, $option ) {
	global $database;

	$sectcat 	= mosGetParam( $_POST, 'sectcat', '' );
	//seperate sections and categories from selection
	$sectcat 	= explode( ',', $sectcat );
	list( $newsect, $newcat ) = $sectcat;

	if ( !$newsect && !$newcat ) {
		mosRedirect( 'index.php?option=com_content&sectionid='. $sectionid .'&mosmsg=An error has occurred' );
	}

	// find section name
	$query = "SELECT a.name"
	. "\n FROM #__sections AS a"
	. "\n WHERE a.id = " . (int) $newsect
	;
	$database->setQuery( $query );
	$section = $database->loadResult();

	// find category name
	$query = "SELECT a.name"
	. "\n FROM #__categories AS a"
	. "\n WHERE a.id = " . (int) $newcat
	;
	$database->setQuery( $query );
	$category = $database->loadResult();

	$total = count( $cid );
	for ( $i = 0; $i < $total; $i++ ) {
		$row = new mosContent( $database );

		// main query
		$query = "SELECT a.*"
		. "\n FROM #__content AS a"
		. "\n WHERE a.id = " . (int) $cid[$i]
		;
		$database->setQuery( $query );
		$item = $database->loadObjectList();

		// values loaded into array set for store
		$row->id 				= NULL;
		$row->sectionid 		= $newsect;
		$row->catid 			= $newcat;
		$row->hits 				= '0';
		$row->ordering			= '0';
		$row->title 			= $item[0]->title;
		$row->title_alias 		= $item[0]->title_alias;
		$row->introtext 		= $item[0]->introtext;
		$row->fulltext 			= $item[0]->fulltext;
		$row->state 			= $item[0]->state;
		$row->mask 				= $item[0]->mask;
		$row->created 			= $item[0]->created;
		$row->created_by 		= $item[0]->created_by;
		$row->created_by_alias 	= $item[0]->created_by_alias;
		$row->modified 			= $item[0]->modified;
		$row->modified_by 		= $item[0]->modified_by;
		$row->checked_out 		= $item[0]->checked_out;
		$row->checked_out_time 	= $item[0]->checked_out_time;
		$row->publish_up 		= $item[0]->publish_up;
		$row->publish_down 		= $item[0]->publish_down;
		$row->images 			= $item[0]->images;
		$row->attribs 			= $item[0]->attribs;
		$row->version 			= $item[0]->parentid;
		$row->parentid 			= $item[0]->parentid;
		$row->metakey 			= $item[0]->metakey;
		$row->metadesc 			= $item[0]->metadesc;
		$row->access 			= $item[0]->access;

		if (!$row->check()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$row->updateOrder( "catid='". (int) $row->catid ."' AND state >= 0" );
	}

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	$msg = $total. ' �l�ment(s) copi�(s) avec succ�s vers la Section: '. $section .', Cat�gorie: '. $category;
	mosRedirect( 'index2.php?option='. $option .'&sectionid='. $sectionid .'&mosmsg='. $msg );
}

/**
* Function to reset Hit count of a content item
* PT
*/
function resethits( $redirect, $id ) {
	global $database;

	$row = new mosContent($database);
	$row->Load((int)$id);
	$row->hits = 0;
	$row->store();
	$row->checkin();

	$msg = 'Compteur de hits remis � z�ro avec succ�s';
	mosRedirect( 'index2.php?option=com_content&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $id, $msg );
}

/**
* @param integer The id of the content item
* @param integer The new access level
* @param string The URL option
*/
function accessMenu( $uid, $access, $option ) {
	global $database;

	$row = new mosContent( $database );
	$row->load( (int)$uid );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}

	$redirect = mosGetParam( $_POST, 'redirect', $row->sectionid );

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );
	
	mosRedirect( 'index2.php?option='. $option .'&sectionid='. $redirect );
}

function filterCategory( $query, $active=NULL ) {
	global $database;

	$categories[] = mosHTML::makeOption( '0', _SEL_CATEGORY );
	$database->setQuery( $query );
	$categories = array_merge( $categories, $database->loadObjectList() );

	$category = mosHTML::selectList( $categories, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $active );

	return $category;
}

function menuLink( $redirect, $id ) {
	global $database;

	$menu = strval( mosGetParam( $_POST, 'menuselect', '' ) );
	$link = strval( mosGetParam( $_POST, 'link_name', '' ) );

	$link	= stripslashes( ampReplace($link) );
	
	$row = new mosMenu( $database );
	$row->menutype 		= $menu;
	$row->name 			= $link;
	$row->type 			= 'content_item_link';
	$row->published		= 1;
	$row->componentid	= $id;
	$row->link			= 'index.php?option=com_content&task=view&id='. $id;
	$row->ordering		= 9999;

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "menutype = " . $database->Quote( $row->menutype ) . " AND parent = " . (int) $row->parent );
	
	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	$msg = $link .' (Lien - Article) dans le menu: '. $menu .' cr�� avec succ�s';
	mosRedirect( 'index2.php?option=com_content&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $id, $msg );
}

function go2menu() {
	$menu = strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );

	mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
}

function go2menuitem() {
	$menu 	= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$id		= intval( mosGetParam( $_POST, 'menuid', 0 ) );

	mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $id );
}

function saveOrder( &$cid ) {
	global $database;

	$total		= count( $cid );
	$redirect 	= mosGetParam( $_POST, 'redirect', 0 );
	$rettask	= strval( mosGetParam( $_POST, 'returntask', '' ) );
	
	$order 		= josGetArrayInts( 'order' );
	
	$row 		= new mosContent( $database );
	$conditions = array();

	// update ordering values
	for( $i=0; $i < $total; $i++ ) {
		$row->load( (int) $cid[$i] );
		if ($row->ordering != $order[$i]) {
			$row->ordering = $order[$i];
			if (!$row->store()) {
				echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
				exit();
			} // if
			// remember to updateOrder this group
			$condition = "catid = " . (int) $row->catid . " AND state >= 0";
			$found = false;
			foreach ( $conditions as $cond )
				if ($cond[1]==$condition) {
					$found = true;
					break;
				} // if
			if (!$found) $conditions[] = array($row->id, $condition);
		} // if
	} // for

	// execute updateOrder for each group
	foreach ( $conditions as $cond ) {
		$row->load( $cond[0] );
		$row->updateOrder( $cond[1] );
	} // foreach

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	$msg 	= 'Nouveau tri enregistr�';
	switch ( $rettask ) {
		case 'showarchive':
			mosRedirect( 'index2.php?option=com_content&task=showarchive&sectionid='. $redirect, $msg );
			break;

		default:
			mosRedirect( 'index2.php?option=com_content&sectionid='. $redirect, $msg );
			break;
	} // switch
} // saveOrder
?>