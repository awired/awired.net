<?php
/**
* @version $Id: admin.categories.php 5874 2006-11-29 00:21:35Z facedancer $
* @package Joomla
* @subpackage Categories
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

define( 'COM_IMAGE_BASE', $mosConfig_absolute_path . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'stories' );

// get parameters from the URL or submitted form
$section 	= stripslashes( strval( mosGetParam( $_REQUEST, 'section', 'content' ) ) );

$cid 		= josGetArrayInts( 'cid' );

switch ($task) {
	case 'new':
		editCategory( 0, $section );
		break;

	case 'edit':
		editCategory( intval( $cid[0] ) );
		break;

	case 'editA':
		editCategory( intval( $id ) );
		break;

	case 'moveselect':
		moveCategorySelect( $option, $cid, $section );
		break;

	case 'movesave':
		moveCategorySave( $cid, $section );
		break;

	case 'copyselect':
		copyCategorySelect( $option, $cid, $section );
		break;

	case 'copysave':
		copyCategorySave( $cid, $section );
		break;

	case 'go2menu':
	case 'go2menuitem':
	case 'menulink':
	case 'save':
	case 'apply':
		saveCategory( $task );
		break;

	case 'remove':
		removeCategories( $section, $cid );
		break;

	case 'publish':
		publishCategories( $section, $id, $cid, 1 );
		break;

	case 'unpublish':
		publishCategories( $section, $id, $cid, 0 );
		break;

	case 'cancel':
		cancelCategory();
		break;

	case 'orderup':
		orderCategory( intval( $cid[0] ), -1 );
		break;

	case 'orderdown':
		orderCategory( intval( $cid[0] ), 1 );
		break;

	case 'accesspublic':
		accessMenu( intval( $cid[0] ), 0, $section );
		break;

	case 'accessregistered':
		accessMenu( intval( $cid[0] ), 1, $section );
		break;

	case 'accessspecial':
		accessMenu( intval( $cid[0] ), 2, $section );
		break;

	case 'saveorder':
		saveOrder( $cid, $section );
		break;

	default:
		showCategories( $section, $option );
		break;
}

/**
* Compiles a list of categories for a section
* @param string The name of the category section
*/
function showCategories( $section, $option ) {
	global $database, $mainframe, $mosConfig_list_limit, $mosConfig_absolute_path, $mosConfig_dbprefix;

	$sectionid 		= intval( $mainframe->getUserStateFromRequest( "sectionid{$option}{$section}", 'sectionid', 0 ) );
	$limit 			= intval( $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit ) );
	$limitstart 	= intval( $mainframe->getUserStateFromRequest( "view{$section}limitstart", 'limitstart', 0 ) );

	$section_name 	= '';
	$content_add 	= '';
	$content_join 	= '';
	$order 			= "\n ORDER BY c.ordering, c.name";
	if (intval( $section ) > 0) {
		$table = 'content';

		$query = "SELECT name"
		. "\n FROM #__sections"
		. "\n WHERE id = " . (int) $section
		;
		$database->setQuery( $query );
		$section_name = $database->loadResult();
		$section_name = 'Content: '. $section_name;
		$where 	= "\n WHERE c.section = " . $database->Quote( $section );
		$type 	= 'content';
	} else if (strpos( $section, 'com_' ) === 0) {
		$table = substr( $section, 4 );

		$query = "SELECT name"
		. "\n FROM #__components"
		. "\n WHERE link = 'option=" . $database->getEscaped( $section ) . "'"
		;
		$database->setQuery( $query );
		$section_name = $database->loadResult();
		$where 	= "\n WHERE c.section = " . $database->Quote( $section );
		$type 	= 'other';
		// special handling for contact component
		if ( $section == 'com_contact_details' ) {
			$section_name 	= 'Contact';
		}
		$section_name = 'Component: '. $section_name;
	} else {
		$table 	= $section;
		$where 	= "\n WHERE c.section = " . $database->Quote( $section );
		$type 	= 'other';
	}

	// get the total number of records
	$query = "SELECT COUNT(*)"
	. "\n FROM #__categories"
	. "\n WHERE section = " . $database->Quote( $section )
	;
	$database->setQuery( $query );
	$total = $database->loadResult();
	
	// allows for viweing of all content categories
	if ( $section == 'content' ) {
		$table 			= 'content';
		$content_add 	= "\n , z.title AS section_name";
		$content_join 	= "\n LEFT JOIN #__sections AS z ON z.id = c.section";
		//$where = "\n WHERE s1.catid = c.id";
		$where 			= "\n WHERE c.section NOT LIKE '%com_%'";
		$order 			= "\n ORDER BY c.section, c.ordering, c.name";
		$section_name 	= 'All Content';
		// get the total number of records
		$query = "SELECT COUNT(*)"
		. "\n FROM #__categories"
		. "\n INNER JOIN #__sections AS s ON s.id = section";
		if ( $sectionid > 0 ) {
			$query .= "\n WHERE section = " . $database->Quote( $sectionid );
		}
		$database->setQuery( $query );
		$total = $database->loadResult();
		$type 			= 'content';
	}

	// used by filter
	if ( $sectionid > 0 ) {
		$filter = "\n AND c.section = " . $database->Quote( $sectionid );
	} else {
		$filter = '';
	}

	require_once( $mosConfig_absolute_path . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	$tablesAllowed = $database->getTableList();
	if (!in_array( $mosConfig_dbprefix . $table, $tablesAllowed )) {
		$table = 'content';
	}
	$query = "SELECT  c.*, c.checked_out as checked_out_contact_category, g.name AS groupname, u.name AS editor,"
	. "COUNT( DISTINCT s2.checked_out ) AS checked_out"
	. $content_add
	. "\n FROM #__categories AS c"
	. "\n LEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\n LEFT JOIN #__groups AS g ON g.id = c.access"
	. "\n LEFT JOIN `#__$table` AS s2 ON s2.catid = c.id AND s2.checked_out > 0"
	. $content_join
	. $where
	. $filter
	. "\n AND c.published != -2"
	. "\n GROUP BY c.id"
	. $order
	;
	$database->setQuery( $query, $pageNav->limitstart, $pageNav->limit );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return;
	}

	$count = count( $rows );
	// number of Active Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__content AS a"
		. "\n WHERE a.catid = " . (int) $rows[$i]->id
		. "\n AND a.state != -2"
		;
		$database->setQuery( $query );
		$active = $database->loadResult();
		$rows[$i]->active = $active;
	}
	// number of Trashed Items
	for ( $i = 0; $i < $count; $i++ ) {
		$query = "SELECT COUNT( a.id )"
		. "\n FROM #__content AS a"
		. "\n WHERE a.catid = " . (int) $rows[$i]->id
		. "\n AND a.state = -2"
		;
		$database->setQuery( $query );
		$trash = $database->loadResult();
		$rows[$i]->trash = $trash;
	}

	// get list of sections for dropdown filter
	$javascript = 'onchange="document.adminForm.submit();"';
	$lists['sectionid']	= mosAdminMenus::SelectSection( 'sectionid', $sectionid, $javascript );

	categories_html::show( $rows, $section, $section_name, $pageNav, $lists, $type );
}

/**
* Compiles information to add or edit a category
* @param string The name of the category section
* @param integer The unique id of the category to edit (0 if new)
* @param string The name of the current user
*/
function editCategory( $uid=0, $section='' ) {
	global $database, $my, $mainframe;

	$type 		= strval( mosGetParam( $_REQUEST, 'type', '' ) );
	$redirect 	= strval( mosGetParam( $_REQUEST, 'section', 'content' ) );

	// check for existance of any sections
	$query = "SELECT COUNT( id )"
	. "\n FROM #__sections"
	. "\n WHERE scope = 'content'"
	;
	$database->setQuery( $query );
	$sections = $database->loadResult();
	if (!$sections && $type != 'other') {
		echo "<script> alert('Vous devez avoir au moins une section pour pouvoir c�er un cat�gorie'); window.history.go(-1); </script>\n";
		exit();
	}

	$row = new mosCategory( $database );
	// load the row from the db table
	$row->load( (int)$uid );

	// fail if checked out not by 'me'
	if ($row->checked_out && $row->checked_out != $my->id) {
		mosRedirect( 'index2.php?option=categories&section='. $row->section, 'La cat�gorie '. $row->title .' est actuellement �dit�e par un autre administrateur' );
	}

	$lists['links']		= 0;
	$menus 				= NULL;
	$selected_folders	= NULL;
	if ( $uid ) {
		// existing record
		$row->checkout( $my->id );

		// code for Link Menu
		switch ( $row->section ) {
			case 'com_weblinks':
				$and 	= "\n AND type = 'weblink_category_table'";
				$link 	= 'Tableau - Cat�gorie de liens web';
				break;
			
			case 'com_newsfeeds':
				$and 	= "\n AND type = 'newsfeed_category_table'";
				$link 	= 'Tableau - Cat�gorie de lux RSS';
				break;

			case 'com_contact_details':
				$and 	= "\n AND type = 'contact_category_table'";
				$link 	= 'Tableau - Cat�gorie de contacts';
				break;
			
			default:
				$and  = '';
				$link = '';
				break;
		}
		
		// content
		if ( $row->section > 0 ) {
			$query = "SELECT *"
			. "\n FROM #__menu"
			. "\n WHERE componentid = " . (int) $row->id
			. "\n AND ( type = 'content_archive_category' OR type = 'content_blog_category' OR type = 'content_category' )"
			;
			$database->setQuery( $query );
			$menus = $database->loadObjectList();
			
			$count = count( $menus );
			for( $i = 0; $i < $count; $i++ ) {
				switch ( $menus[$i]->type ) {
					case 'content_category':
					$menus[$i]->type = 'Tableau - Cat�gorie de contenu';
					break;

					case 'content_blog_category':
					$menus[$i]->type = 'Blog - Cat�gorie de contenu';
					break;

					case 'content_archive_category':
					$menus[$i]->type = 'Blog - Archive de cat�gorie';
					break;
				}
			}
			$lists['links']	= 1;
			
			// handling for MOSImage directories
			if ( trim( $row->params ) ) {
				// get params definitions
				$params = new mosParameters( $row->params, $mainframe->getPath( 'com_xml', 'com_categories' ), 'component' );
				$temps 	= $params->get( 'imagefolders', '' );
				
				$temps 	= explode( ',', $temps );
				foreach( $temps as $temp ) {
					$selected_folders[] = mosHTML::makeOption( $temp, $temp );
				}
			} else {
				$selected_folders[] = mosHTML::makeOption( '*2*' );
			}			
		} else {
			$query = "SELECT *"
			. "\n FROM #__menu"
			. "\n WHERE componentid = " . (int) $row->id
			. $and
			;
			$database->setQuery( $query );
			$menus = $database->loadObjectList();
			
			$count = count( $menus );
			for( $i = 0; $i < $count; $i++ ) {
				$menus[$i]->type = $link;
			}
			$lists['links']	= 1;
		}	
	} else {
		// new record
		$row->section 		= $section;
		$row->published 	= 1;
		$menus 				= NULL;

		// handling for MOSImage directories
		if ( $row->section == 'content' ) {
			$selected_folders[]	= mosHTML::makeOption( '*2*' );
		}
	}

	// make order list
	$order = array();
	$query = "SELECT COUNT(*)"
	. "\n FROM #__categories"
	. "\n WHERE section = " . $database->Quote( $row->section )
	;
	$database->setQuery( $query );
	$max = intval( $database->loadResult() ) + 1;

	for ($i=1; $i < $max; $i++) {
		$order[] = mosHTML::makeOption( $i );
	}

	// build the html select list for sections
	if ( $section == 'content' ) {
		$query = "SELECT s.id AS value, s.title AS text"
		. "\n FROM #__sections AS s"
		. "\n ORDER BY s.ordering"
		;
		$database->setQuery( $query );
		$sections = $database->loadObjectList();
		$lists['section'] = mosHTML::selectList( $sections, 'section', 'class="inputbox" size="1"', 'value', 'text' );;
	} else {
		if ( $type == 'other' ) {
			$section_name = 'N/A';
		} else {
			$temp = new mosSection( $database );
			$temp->load( $row->section );
			$section_name = $temp->name;
		}
		$lists['section'] = '<input type="hidden" name="section" value="'. $row->section .'" />'. $section_name;
	}

	// build the html select list for category types
	$types[] = mosHTML::makeOption( '', 'Selectionner Type' );
	if ($row->section == 'com_contact_details') {
		$types[] = mosHTML::makeOption( 'contact_category_table', 'Tableau - Cat�gorie de contacts' );
	} else
	if ($row->section == 'com_newsfeeds') {
		$types[] = mosHTML::makeOption( 'newsfeed_category_table', 'Tableau - Cat�gorie de flux RSS' );
	} else
	if ($row->section == 'com_weblinks') {
		$types[] = mosHTML::makeOption( 'weblink_category_table', 'Tableau - Cat�gorie de liens web' );
	} else {
		$types[] = mosHTML::makeOption( 'content_category', 'Tableau - Cat�gorie de contenu' );
		$types[] = mosHTML::makeOption( 'content_blog_category', 'Blog - Cat�gorie de contenu' );
		$types[] = mosHTML::makeOption( 'content_archive_category', 'Blog - Archive de Cat�gorie' );
	} // if
	$lists['link_type'] 		= mosHTML::selectList( $types, 'link_type', 'class="inputbox" size="1"', 'value', 'text' );

	// build the html select list for ordering
	$query = "SELECT ordering AS value, title AS text"
	. "\n FROM #__categories"
	. "\n WHERE section = " . $database->Quote( $row->section )
	. "\n ORDER BY ordering"
	;
	$lists['ordering'] 			= stripslashes( mosAdminMenus::SpecificOrdering( $row, $uid, $query ));

	// build the select list for the image positions
	$active =  ( $row->image_position ? $row->image_position : 'left' );
	$lists['image_position'] 	= mosAdminMenus::Positions( 'image_position', $active, NULL, 0, 0 );
	// Imagelist
	$lists['image'] 			= mosAdminMenus::Images( 'image', $row->image );
	// build the html select list for the group access
	$lists['access'] 			= mosAdminMenus::Access( $row );
	// build the html radio buttons for published
	$lists['published'] 		= mosHTML::yesnoRadioList( 'published', 'class="inputbox"', $row->published );
	// build the html select list for menu selection
	$lists['menuselect']		= mosAdminMenus::MenuSelect( );

	// handling for MOSImage directories
	if ( $row->section > 0 || $row->section == 'content' ) {
		// list of folders in images/stories/
		$imgFiles 	= recursive_listdir( COM_IMAGE_BASE );
		$len 		= strlen( COM_IMAGE_BASE );
		
		$folders[] 	= mosHTML::makeOption( '*2*', 'Utiliser les param�tres de la section'  );
		$folders[] 	= mosHTML::makeOption( '*#*', '---------------------' );
		$folders[] 	= mosHTML::makeOption( '*1*', 'Tous'  );
		$folders[] 	= mosHTML::makeOption( '*0*', 'Aucun' );
		$folders[] 	= mosHTML::makeOption( '*#*', '---------------------' );
		$folders[] 	= mosHTML::makeOption( '/' );
		foreach ($imgFiles as $file) {
			$folders[] = mosHTML::makeOption( substr( $file, $len ) );
		}
		
		$lists['folders'] = mosHTML::selectList( $folders, 'folders[]', 'class="inputbox" size="17" multiple="multiple"', 'value', 'text', $selected_folders );
	}
	
 	categories_html::edit( $row, $lists, $redirect, $menus );
}

/**
* Saves the catefory after an edit form submit
* @param string The name of the category section
*/
function saveCategory( $task ) {
	global $database;

	$menu 		= strval( mosGetParam( $_POST, 'menu', 'mainmenu' ) );
	$menuid		= intval( mosGetParam( $_POST, 'menuid', 0 ) );
	$redirect 	= strval( mosGetParam( $_POST, 'redirect', '' ) );
	$oldtitle 	= stripslashes( strval( mosGetParam( $_POST, 'oldtitle', null ) ) );

	$row = new mosCategory( $database );
	if (!$row->bind( $_POST, 'folders' )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->title 	= addslashes( $row->title );
	$row->name		= addslashes( $row->name );
	
	// handling for MOSImage directories
	if ( $row->section > 0 ) {
		$folders 		= mosGetParam( $_POST, 'folders', array() );
		$folders 		= implode( ',', $folders );
			
		if ( strpos( $folders, '*2*' ) !== false  ) {
			$folders 	= '*2*';
		} else if ( strpos( $folders, '*1*' ) !== false  ) {
			$folders 	= '*1*';
		} else if ( strpos( $folders, '*0*' ) !== false ) {
			$folders	= '*0*';
		} else if ( strpos( $folders, ',*#*' ) !== false ) {
			$folders 	= str_replace( ',*#*', '', $folders );
		} else if ( strpos( $folders, '*#*,' ) !== false ) {
			$folders 	= str_replace( '*#*,', '', $folders );
		} else if ( strpos( $folders, '*#*' ) !== false ) {
			$folders 	= str_replace( '*#*', '', $folders );
		} 
		
		$row->params	= 'imagefolders='. $folders;
	}
	
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	$row->checkin();
	$row->updateOrder( "section = " . $database->Quote( $row->section ) );

	if ( $oldtitle ) {
		if ($oldtitle != $row->title) {
			$query = "UPDATE #__menu"
			. "\n SET name = " . $database->Quote( $row->title )
			. "\n WHERE name = " . $database->Quote( $oldtitle )
			. "\n AND type = 'content_category'"
			;
			$database->setQuery( $query );
			$database->query();
		}
	}

	// Update Section Count
	if ($row->section != 'com_contact_details' &&
		$row->section != 'com_newsfeeds' &&
		$row->section != 'com_weblinks') {
		$query = "UPDATE #__sections SET count=count+1"
		. "\n WHERE id = " . $database->Quote( $row->section )
		;
		$database->setQuery( $query );
	}
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if ($redirect == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}	
	
	switch ( $task ) {
		case 'go2menu':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu );
			break;

		case 'go2menuitem':
			mosRedirect( 'index2.php?option=com_menus&menutype='. $menu .'&task=edit&hidemainmenu=1&id='. $menuid );
			break;

		case 'menulink':
			menuLink( $row->id );
			break;

		case 'apply':
			$msg = 'Modifications � la cat�gorie appliqu�es';
			mosRedirect( 'index2.php?option=com_categories&section='. $redirect .'&task=editA&hidemainmenu=1&id='. $row->id, $msg );
			break;

		case 'save':
		default:
			$msg = 'Cat�gorie sauvegard�e';
			mosRedirect( 'index2.php?option=com_categories&section='. $redirect, $msg );
			break;
	}
}

/**
* Deletes one or more categories from the categories table
* @param string The name of the category section
* @param array An array of unique category id numbers
*/
function removeCategories( $section, $cid ) {
	global $database, $mosConfig_dbprefix;

	if (count( $cid ) < 1) {
		echo "<script> alert('S�lectionner une cat�gorie � supprimer'); window.history.go(-1);</script>\n";
		exit;
	}

	if (intval( $section ) > 0) {
		$table = 'content';
	} else if (strpos( $section, 'com_' ) === 0) {
		$table = substr( $section, 4 );
	} else {
		$table = $section;
	}

	$tablesAllowed = $database->getTableList();
	if (!in_array( $mosConfig_dbprefix . $table, $tablesAllowed )) {
		$table = 'content';
	}
	mosArrayToInts( $cid );
	$cids = 'c.id=' . implode( ' OR c.id=', $cid );
	$query = "SELECT c.id, c.name, COUNT( s.catid ) AS numcat"
	. "\n FROM #__categories AS c"
	. "\n LEFT JOIN `#__$table` AS s ON s.catid = c.id"
	. "\n WHERE ( $cids )"
	. "\n GROUP BY c.id"
	;
	$database->setQuery( $query );

	if (!($rows = $database->loadObjectList())) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}

	$err = array();
	$cid = array();
	foreach ($rows as $row) {
		if ($row->numcat == 0) {
			$cid[] = $row->id;
		} else {
			$err[] = $row->name;
		}
	}

	if (count( $cid )) {
		mosArrayToInts( $cid );
		$cids = 'id=' . implode( ' OR id=', $cid );
		$query = "DELETE FROM #__categories"
		. "\n WHERE ( $cids )"
		;
		$database->setQuery( $query );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}
	
	if ($section == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}	
	
	if (count( $err )) {
		$cids = implode( "\', \'", $err );
		$msg = 'Les cat�gories: '. $cids .' ne peuvent �tre supprim�es tant qu\'elles contiennent des articles';
		mosRedirect( 'index2.php?option=com_categories&section='. $section .'&mosmsg='. $msg );
	}

	mosRedirect( 'index2.php?option=com_categories&section='. $section );
}

/**
* Publishes or Unpublishes one or more categories
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function publishCategories( $section, $categoryid=null, $cid=null, $publish=1 ) {
	global $database, $my;

	if (!is_array( $cid )) {
		$cid = array();
	}
	if ($categoryid) {
		$cid[] = $categoryid;
	}

	if (count( $cid ) < 1) {
		$action = $publish ? 'publish' : 'unpublish';
		echo "<script> alert('Select a category to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );

	$query = "UPDATE #__categories"
	. "\n SET published = " . (int) $publish
	. "\n WHERE ( $cids )"
	. "\n AND ( checked_out = 0 OR ( checked_out = " . (int) $my->id . " ) )"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if (count( $cid ) == 1) {
		$row = new mosCategory( $database );
		$row->checkin( $cid[0] );
	}

	if ($section == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}		
	
	mosRedirect( 'index2.php?option=com_categories&section='. $section );
}

/**
* Cancels an edit operation
* @param string The name of the category section
* @param integer A unique category id
*/
function cancelCategory() {
	global $database;

	$redirect = strval( mosGetParam( $_POST, 'redirect', '' ) );

	$row = new mosCategory( $database );
	$row->bind( $_POST );
	$row->checkin();

	mosRedirect( 'index2.php?option=com_categories&section='. $redirect );
}

/**
* Moves the order of a record
* @param integer The increment to reorder by
*/
function orderCategory( $uid, $inc ) {
	global $database;

	$row = new mosCategory( $database );
	$row->load( (int)$uid );
	$row->move( $inc, "section = " . $database->Quote( $row->section ) );

	// clean any existing cache files
	mosCache::cleanCache( 'com_content' );

	mosRedirect( 'index2.php?option=com_categories&section='. $row->section );
}

/**
* Form for moving item(s) to a specific menu
*/
function moveCategorySelect( $option, $cid, $sectionOld ) {
	global $database;

	$redirect = mosGetParam( $_POST, 'section', 'content' );;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	## query to list selected categories
	mosArrayToInts( $cid );
	$cids = 'a.id=' . implode( ' OR a.id=', $cid );
	$query = "SELECT a.name, a.section"
	. "\n FROM #__categories AS a"
	. "\n WHERE ( $cids )"
	;
	$database->setQuery( $query );
	$items = $database->loadObjectList();

	## query to list items from categories
	// mosArrayToInts( $cid ); // Just done a few lines earlier
	$cids = 'a.catid=' . implode( ' OR a.catid=', $cid );
	$query = "SELECT a.title"
	. "\n FROM #__content AS a"
	. "\n WHERE ( $cids )"
	. "\n ORDER BY a.catid, a.title"
	;
	$database->setQuery( $query );
	$contents = $database->loadObjectList();

	## query to choose section to move to
	$query = "SELECT a.name AS text, a.id AS value"
	. "\n FROM #__sections AS a"
	. "\n WHERE a.published = 1"
	. "\n ORDER BY a.name"
	;
	$database->setQuery( $query );
	$sections = $database->loadObjectList();

	// build the html select list
	$SectionList = mosHTML::selectList( $sections, 'sectionmove', 'class="inputbox" size="10"', 'value', 'text', null );

	categories_html::moveCategorySelect( $option, $cid, $SectionList, $items, $sectionOld, $contents, $redirect );
}


/**
* Save the item(s) to the menu selected
*/
function moveCategorySave( $cid, $sectionOld ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('S�lectionnez un �l�ment � d�placer'); window.history.go(-1);</script>\n";
		exit;
	}

	$sectionMove 	= intval( mosGetParam( $_REQUEST, 'sectionmove', '' ) );
	if ( !$sectionMove ) {
		mosRedirect( 'index.php?option=com_categories&mosmsg=Erreur' );
	}

	$total = count( $cid );

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "UPDATE #__categories"
	. "\n SET section = " . $sectionMove
	. "\n WHERE ( $cids )"
	;
	$database->setQuery( $query );
	if ( !$database->query() ) {
		echo "<script> alert('". $database->getErrorMsg() ."'); window.history.go(-1); </script>\n";
		exit();
	}
	// mosArrayToInts( $cid ); // Just done a few lines earlier
	$cids = 'catid=' . implode( ' OR catid=', $cid );
	$query = "UPDATE #__content"
	. "\n SET sectionid = " . $sectionMove
	. "\n WHERE ( $cids )"
	;
	$database->setQuery( $query );
	if ( !$database->query() ) {
		echo "<script> alert('". $database->getErrorMsg() ."'); window.history.go(-1); </script>\n";
		exit();
	}
	$sectionNew = new mosSection ( $database );
	$sectionNew->load( $sectionMove );
	
	if ($sectionOld == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}

	$msg = ( (count($cid) - 1) ? 'Cat�gories' : 'Cat�gorie' ) .' deplac�e(s) vers '. $sectionNew->name;
	mosRedirect( 'index2.php?option=com_categories&section='. $sectionOld .'&mosmsg='. $msg );
}

/**
* Form for copying item(s) to a specific menu
*/
function copyCategorySelect( $option, $cid, $sectionOld ) {
	global $database;

	$redirect = mosGetParam( $_POST, 'section', 'content' );;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('Select an item to move'); window.history.go(-1);</script>\n";
		exit;
	}

	## query to list selected categories
	mosArrayToInts( $cid );
	$cids = 'a.id=' . implode( ' OR a.id=', $cid );
	$query = "SELECT a.name, a.section"
	. "\n FROM #__categories AS a"
	. "\n WHERE ( $cids )"
	;
	$database->setQuery( $query );
	$items = $database->loadObjectList();

	## query to list items from categories
	// mosArrayToInts( $cid ); // Just done a few lines earlier
	$cids = 'a.catid=' . implode( ' OR a.catid=', $cid );
	$query = "SELECT a.title, a.id"
	. "\n FROM #__content AS a"
	. "\n WHERE ( $cids )"
	. "\n ORDER BY a.catid, a.title"
	;
	$database->setQuery( $query );
	$contents = $database->loadObjectList();

	## query to choose section to move to
	$query = "SELECT a.name AS `text`, a.id AS `value`"
	. "\n FROM #__sections AS a"
	. "\n WHERE a.published = 1"
	. "\n ORDER BY a.name"
	;
	$database->setQuery( $query );
	$sections = $database->loadObjectList();

	// build the html select list
	$SectionList = mosHTML::selectList( $sections, 'sectionmove', 'class="inputbox" size="10"', 'value', 'text', null );

	categories_html::copyCategorySelect( $option, $cid, $SectionList, $items, $sectionOld, $contents, $redirect );
}


/**
* Save the item(s) to the menu selected
*/
function copyCategorySave( $cid, $sectionOld ) {
	global $database;

	$sectionMove 	= intval( mosGetParam( $_REQUEST, 'sectionmove', '' ) );
	if ( !$sectionMove ) {
		mosRedirect( 'index.php?option=com_categories&mosmsg=Erreur' );
	}

	$contentid		= josGetArrayInts( 'item', $_REQUEST );
	$total 			= count( $contentid  );

	$category = new mosCategory ( $database );
	foreach( $cid as $id ) {
		$category->load( (int)$id );
		$category->id 		= NULL;
		$category->title 	= 'Copy of '. $category->title;
		$category->name 	= 'Copy of '. $category->name;
		$category->section 	= $sectionMove;
		if (!$category->check()) {
			echo "<script> alert('".$category->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if (!$category->store()) {
			echo "<script> alert('".$category->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$category->checkin();
		// stores original catid
		$newcatids[]["old"] = $id;
		// pulls new catid
		$newcatids[]["new"] = $category->id;
	}

	$content = new mosContent ( $database );
	foreach( $contentid as $id) {
		$content->load( (int)$id );
		$content->id 		= NULL;
		$content->sectionid = $sectionMove;
		$content->hits 		= 0;
		foreach( $newcatids as $newcatid ) {
			if ( $content->catid == $newcatid['old'] ) {
				$content->catid = $newcatid['new'];
			}
		}
		if (!$content->check()) {
			echo "<script> alert('".$content->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}

		if (!$content->store()) {
			echo "<script> alert('".$content->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		$content->checkin();
	}

	$sectionNew = new mosSection ( $database );
	$sectionNew->load( $sectionMove );
	
	if ($sectionOld == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}

	$msg = ( (count($cid) - 1) ? 'Cat�gories' : 'Cat�gorie' ) .' copi�e(s) vers '. $sectionNew->name;
	mosRedirect( 'index2.php?option=com_categories&section='. $sectionOld .'&mosmsg='. $msg );
}

/**
* changes the access level of a record
* @param integer The increment to reorder by
*/
function accessMenu( $uid, $access, $section ) {
	global $database;

	$row = new mosCategory( $database );
	$row->load( (int)$uid );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}
	
	if ($section == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}

	mosRedirect( 'index2.php?option=com_categories&section='. $section );
}

function menuLink( $id ) {
	global $database;

	$category = new mosCategory( $database );
	$category->bind( $_POST );
	$category->checkin();

	$redirect	= strval( mosGetParam( $_POST, 'redirect', '' ) );
	$menu 		= stripslashes( strval( mosGetParam( $_POST, 'menuselect', '' ) ) );
	$name 		= strval( mosGetParam( $_POST, 'link_name', '' ) );
	$sectionid	= mosGetParam( $_POST, 'sectionid', '' );
	$type 		= strval( mosGetParam( $_POST, 'link_type', '' ) );

	$name		= stripslashes( ampReplace($name) );
	
	switch ( $type ) {
		case 'content_category':
			$link 		= 'index.php?option=com_content&task=category&sectionid='. $sectionid .'&id='. $id;
			$menutype	= 'Tableau - Cat�gorie de contenu';
			break;

		case 'content_blog_category':
			$link 		= 'index.php?option=com_content&task=blogcategory&id='. $id;
			$menutype	= 'Blog - Cat�gorie de contenu';
			break;

		case 'content_archive_category':
			$link 		= 'index.php?option=com_content&task=archivecategory&id='. $id;
			$menutype	= 'Blog - Archive de cat�gorie';
			break;

		case 'contact_category_table':
			$link 		= 'index.php?option=com_contact&catid='. $id;
			$menutype	= 'Tableau - Cat�gorie de contacts';
			break;

		case 'newsfeed_category_table':
			$link 		= 'index.php?option=com_newsfeeds&catid='. $id;
			$menutype	= 'Tableau - Cat�gorie de flux RSS ';
			break;

		case 'weblink_category_table':
			$link 		= 'index.php?option=com_weblinks&catid='. $id;
			$menutype	= 'Tableau - Cat�gories de liens web';
			break;
	}

	$row 				= new mosMenu( $database );
	$row->menutype 		= $menu;
	$row->name 			= $name;
	$row->type 			= $type;
	$row->published		= 1;
	$row->componentid	= $id;
	$row->link			= $link;
	$row->ordering		= 9999;
	
	if ( $type == 'content_blog_category' ) {
		$row->params = 'categoryid='. $id;
	}

	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "menutype = " . $database->Quote( $menu ) );

	if ($redirect == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}
	
	$msg = $name .' ( '. $menutype .' ) in menu: '. $menu .' successfully created';
	mosRedirect( 'index2.php?option=com_categories&section='. $redirect .'&task=editA&hidemainmenu=1&id='. $id, $msg );
}

function saveOrder( &$cid, $section ) {
	global $database;

	$total		= count( $cid );
	$order 		= josGetArrayInts( 'order' );

	$row		= new mosCategory( $database );
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
			$condition = "section=" . $database->Quote( $row->section );
			$found = false;
			foreach ( $conditions as $cond )
				if ($cond[1]==$condition) {
					$found = true;
					break;
				} // if
			if (!$found)
			{
				$conditions[] = array( $row->id, $condition);
			}
				
		} // if
	} // for

	// execute updateOrder for each group
	foreach ( $conditions as $cond ) {
		$row->load( $cond[0] );
		$row->updateOrder( $cond[1] );
	} // foreach

	if ($section == 'content') {
		// clean any existing cache files
		mosCache::cleanCache( 'com_content' );
	}
	
	$msg 	= 'Nouveau tri enregistr�';
	mosRedirect( 'index2.php?option=com_categories&section='. $section, $msg );
} // saveOrder

function recursive_listdir( $base ) {
	static $filelist = array();
	static $dirlist = array();
	
	if(is_dir($base)) {
		$dh = opendir($base);
		while (false !== ($dir = readdir($dh))) {
			if ($dir !== '.' && $dir !== '..' && is_dir($base .'/'. $dir) && strtolower($dir) !== 'cvs' && strtolower($dir) !== '.svn') {
				$subbase = $base .'/'. $dir;
				$dirlist[] = $subbase;
				$subdirlist = recursive_listdir($subbase);
			}
		}
		closedir($dh);
	}
	return $dirlist;
}
?>