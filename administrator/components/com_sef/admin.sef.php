	<?php
/*
 * @version $Id: admin.sef.php,v 1.3 2005/02/01 14:48:48 marlboroman_2k Exp $
 *
 * 404 SEF for MOS 4.5.1
 *
 * Author:	W.H.Welch <marlboroman_2k@yahoo.com>
 * Copyright:	2004 W.H.Welch
 * License:	GNU General Public License
 */

 defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_sef' ))) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}
//Get right Language file
if(file_exists($GLOBALS['mosConfig_absolute_path'].'/administrator/components/com_sef/language/'.$mosConfig_lang.'.php')){
  include($GLOBALS['mosConfig_absolute_path'].'/administrator/components/com_sef/language/'.$mosConfig_lang.'.php');
} else {
  include($GLOBALS['mosConfig_absolute_path'].'/administrator/components/com_sef/language/english.php');
}
// setup paths
$sef_config_file = $GLOBALS['mosConfig_absolute_path']."/administrator/components/com_sef/config.sef.php";

require_once( $mainframe->getPath( 'admin_html' ) );
require_once( $mainframe->getPath( 'class' ) );

$cid = mosGetParam( $_REQUEST, 'cid', array(0) );
$sortby = mosGetParam( $_REQUEST, 'sortby', 0 );

$sefconfig = new SEF_config ;

if (!is_array( $cid )) {
	$cid = array(0);
}

switch ($task) {
	case "cancel":
		cancelSEF( $option );
		break;

	case "edit":
		editSEF( $cid[0], $option );
		break;

	case "help":
		HTML_sef::help();
		break;

	case "info":
		include "components/com_sef/readme.inc";
		break;

	case "new":
		editSEF( 0, $option );
		break;

	case "purge":
		purge($option, $ViewModeId);
		break;

	case "remove":
		removeSEF( $cid, $option );
		break;

	case "save":
		if ($section == "config") {
			saveConfig();
		}else{
			saveSEF( $option );
		}
		break;

	case "saveconfig":
		saveConfig();
		break;

	case "showconfig":
		showConfig ($option);
		break;

	case "view":
		viewSEF($option, $ViewModeId);
		break;

	case "import_export":
		HTML_sef::import_export();
		break;

	case "import":
		$userfile = mosGetParam( $_FILES, 'userfile', null );
		if (!$userfile) {
			echo '<p class="error">ERROR UPLOADING FILE</p>';
			exit();
		}else{
			import_custom($userfile);
			break;
		}

	case "export":
		export_custom('404SEFx_custom_urls.sql');
		break;

	case "dwnld":
  		$data =  $sefconfig->saveConfig(1);
  		$trans_tbl = get_html_translation_table(HTML_ENTITIES);
		$trans_tbl = array_flip($trans_tbl);
		$data =strtr($data, $trans_tbl);
		output_attachment('config.sef.php',$data);
     	die();

	default:
		include_once( "components/com_sef/404SEF_cpanel.php" );
		break;
}

/**
* List the records
* @param string The current GET/POST option
* @param int The mode of view 0=
*/
function viewSEF( $option, $ViewModeId=0  ) {
	global $database, $mainframe, $mosConfig_list_limit;

	$catid = $mainframe->getUserStateFromRequest( "catid{$option}", 'catid', 0 );
	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', $mosConfig_list_limit );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
	$ViewModeId = $mainframe->getUserStateFromRequest( "viewmode{$option}", 'viewmode', 0 );
	$SortById = $mainframe->getUserStateFromRequest( "SortBy{$option}", 'sortby', 0 );

	if ($ViewModeId == 1) {
		$where = "`dateadd` > '0000-00-00' and `newurl` = '' ";
	}elseif ( $ViewModeId == 2 ) {
		$where = "`dateadd` > '0000-00-00' and `newurl` != '' ";
	}else{
		$where = "`dateadd` = '0000-00-00'";
	}

	// make the select list for the filter
	$viewmode[] = mosHTML::makeOption( '0', _COM_SEF_SHOW0 );
	$viewmode[] = mosHTML::makeOption( '1', _COM_SEF_SHOW1 );
  	$viewmode[] = mosHTML::makeOption( '2', _COM_SEF_SHOW2 );
  	$lists['viewmode'] = mosHTML::selectList( $viewmode, 'viewmode', "class=\"inputbox\"  onchange=\"document.adminForm.submit();\" size=\"1\"" ,
  	'value', 'text', $ViewModeId );

	// make the select list for the filter
	$orderby[] = mosHTML::makeOption( '0', _COM_SEF_SEFURL._COM_SEF_ASC);
	$orderby[] = mosHTML::makeOption( '1', _COM_SEF_SEFURL._COM_SEF_DESC );
	if ($is404mode != true) {
	  	$orderby[] = mosHTML::makeOption( '2', _COM_SEF_REALURL._COM_SEF_ASC );
	  	$orderby[] = mosHTML::makeOption( '3', _COM_SEF_REALURL._COM_SEF_DESC );
	}
  	$orderby[] = mosHTML::makeOption( '4', _COM_SEF_HITS._COM_SEF_ASC );
  	$orderby[] = mosHTML::makeOption( '5', _COM_SEF_HITS._COM_SEF_DESC );

  	$lists['sortby'] = mosHTML::selectList( $orderby, 'sortby', "class=\"inputbox\"  onchange=\"document.adminForm.submit();\" size=\"1\"" ,
  	'value', 'text', $SortById );

	switch ($SortById){
		case 1 :
			$sort = "`oldurl` DESC";
			break;
		case 2 :
			$sort = "`newurl`";
			break;
		case 3 :
			$sort = "`newurl` DESC";
			break;
		case 4 :
			$sort = "`cpt`";
			break;
		case 5 :
			$sort = "`cpt` DESC";
			break;
		default :
			$sort = "`oldurl`";
			break;
	}
	// get the total number of records
	$query = "SELECT count(*) FROM #__redirection WHERE ".$where;
	$database->setQuery( $query );
	$total = $database->loadResult();

	require_once( $GLOBALS['mosConfig_absolute_path'] . '/administrator/includes/pageNavigation.php' );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	// get the subset (based on limits) of required records
	$query = "SELECT * FROM #__redirection WHERE ".$where." ORDER BY ".$sort.
		" LIMIT $pageNav->limitstart,$pageNav->limit";
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}
	HTML_sef::viewSEF( $rows, $lists, $pageNav, $option, $ViewModeId );
}

/**
* Creates a new or edits and existing user record
* @param int The id of the user, 0 if a new entry
* @param string The current GET/POST option
*/
function editSEF( $id, $option ) {
	global $database, $my, $mainframe;

	$LinkTypeId = $mainframe->getUserStateFromRequest( "linktype{$option}", 'linktype', 0 );
	$SectionId = $mainframe->getUserStateFromRequest( "sectionid{$option}", 'sectionid', 0 );
	$CategoryId = $mainframe->getUserStateFromRequest( "categoryid{$option}", 'categoryid', 0 );
	$ContentId = $mainframe->getUserStateFromRequest( "contentid{$option}", 'contentid', 0 );

	$row = new mosSEF( $database );
	// load the row from the db table
	$row->load( $id );

	if ($id) {
		// do stuff for existing records
		if ($row->dateadd != "0000-00-00" ) $row->dateadd = date("Y-m-d");
	} else {
		// do stuff for new records
		$row->dateadd = date("Y-m-d");
	}
	$linktype[] = mosHTML::makeOption( '0', 'Content' );
	$linktype[] = mosHTML::makeOption( '1', 'Component' );
	$lists['linktype'] = mosHTML::selectList( $linktype, 'linktype', "class=\"inputbox\"  onchange=\"document.buildLinkForm.submit();\" size=\"1\"" ,
  	'value', 'text', $LinkTypeId );
	$lists['linktype'] = mosHTML::selectList( $linktype, 'linktype', "class=\"inputbox\"  onchange=\"document.buildLinkForm.submit();\" size=\"1\"" ,
  	'value', 'text', $LinkTypeId );
  	switch ($LinkTypeId){
  		case 0: // content
  			// build section list
  			$database->setQuery( "SELECT `id`,`title` FROM #__sections");
  			$sections = $database->loadObjectList();
  			$options = array(  mosHTML::makeOption( 0, "(static content)"));
  			foreach($sections as $section)
  				$options[] = mosHTML::makeOption( $section->id, $section->title );
  			$lists['sections'] = mosHTML::selectList( $options, 'sectionid', 'class="inputbox" onchange="document.buildLinkForm.submit();" size="1"', 'value', 'text', $SectionId );
  			// build category list
  			if ($SectionId) {
  				$database->setQuery( "SELECT `id`,`title` FROM #__categories WHERE `section`='".$SectionId."'");
  				$cats = $database->loadObjectList();
  				$options = array(  mosHTML::makeOption( 0, "(NONE)")  );
	  			$options[] =  mosHTML::makeOption( -1, "(section)");
	  			$options[] =  mosHTML::makeOption( -2, "(blog section)");
	  			foreach($cats as $cat)
	  				$options[] = mosHTML::makeOption( $cat->id, $cat->title );
  				$lists['cats'] = mosHTML::selectList( $options, 'categoryid', 'class="inputbox" onchange="document.buildLinkForm.submit();" size="1"', 'value', 'text', $CategoryId );
  			}else{
  				$CategoryId = 0;
  			}
  			$sql = "SELECT `id`,`title` FROM #__content WHERE ((`sectionid`='".$SectionId."') AND (`catid`='".$CategoryId."'))";
  			$database->setQuery($sql);
  			$items = $database->loadObjectList();
  			$options = array(  mosHTML::makeOption( 0, "(NONE)")  );
  			if ($SectionId) {
	  			$options[] = mosHTML::makeOption( "-1", "(category)");
	  			$options[] = mosHTML::makeOption( "-2", "(blog category)");
	  		}
  			foreach($items as $item)
  				$options[] = mosHTML::makeOption( $item->id, $item->title );
  			$lists['content'] = mosHTML::selectList( $options, 'contentid', 'class="inputbox" onchange="document.buildLinkForm.submit();" size="1"', 'value', 'text', $ContentId );
  			$database->setQuery( $sql );
  			// needed to reduce queries used by getItemid
			$bs = $mainframe->getBlogSectionCount();
			$bc = $mainframe->getBlogCategoryCount();
			$gbs = $mainframe->getGlobalBlogSectionCount();
			$Itemid = $mainframe->getItemid( $ContentId, ($SectionId == 0), 0, $bs, $bc, $gbs );
			$this_link = "index.php?option=com_content&task=";
			$lists['msg']='';
			switch ($CategoryId) {
				case -2:
					$this_link .= "blogsection&id=$SectionId";
					break;
				case -1:
					$this_link .= "section&id=$SectionId";
		  			$database->setQuery("SELECT `id` FROM #__menu WHERE (`link` like '%".$this_link."%')");
		  			$result = $database->loadResult();
		  			if (is_numeric($result)){
		  				$this_link .= "&Itemid=$result";
		  			}else{
						$this_link .= "&Itemid=$Itemid";
						$lists['msg'] = _COM_SEF_INVALID_URL;
					}
					break;
				default:
					switch ($ContentId) {
						case -2:
							$this_link .= "blogsection&id=$SectionId";
							break;
						case -1:
				  			$database->setQuery("SELECT `id` FROM #__menu WHERE (`link` like '%".$this_link."section&id=$SectionId%')");
				  			$result = $database->loadResult();
				  			$this_link .= "category&sectionid=$SectionId&id=$CategoryId";
				  			if (is_numeric($result)){
				  				$this_link .= "&Itemid=$result";
				  			}else{
								$this_link .= "&Itemid=$Itemid";
								$lists['msg'] = _COM_SEF_INVALID_URL;
							}

							break;
						default:
							$this_link = "index.php?option=com_content&task=view&id=$ContentId&Itemid=$Itemid";
					}
			}
  			$lists['this_link'] = $this_link;
  			break;
  		case 1: // component
  			break;

  	}
	HTML_sef::editSEF( $row, $lists, $option );
}

/**
* Saves the record from an edit form submit
* @param string The current GET/POST option
*/
function saveSEF( $option ) {
	global $database, $my;

	$row = new mosSEF( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// pre-save checks
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	// save the changes
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	mosRedirect( 'index2.php?option='.$option.'&task=view' );
}


/**
* Removes records
* @param array An array of id keys to remove
* @param string The current GET/POST option
*/
function removeSEF( &$cid, $option ) {
	global $database;

	if (!is_array( $cid ) || count( $cid ) < 1) {
		echo "<script> alert('"._COM_SEF_SELECT_DELETE."'); window.history.go(-1);</script>\n";
		exit;
	}
	if (count( $cid )) {
		$cids = implode( ',', $cid );
		$query = "DELETE FROM #__redirection"
		. "\n WHERE id IN ($cids)"
		;
		$database->setQuery( $query );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}

	mosRedirect( 'index2.php?option='.$option.'&task=view' );
}

/**
* Cancels an edit operation
* @param string The current GET/POST option
*/
function cancelSEF( $option ) {
	global $database;
	if ($_POST['section'] == "config") {
		mosRedirect( 'index2.php?option='.$option );
	}else{
		mosRedirect( 'index2.php?option='.$option.'&task=view' );
	}
}
function showConfig($option) {
	global $sefconfig, $sef_config_file;
	global $database;

	$std_opt = 'class="inputbox" size="2"';

	$lists['enabled'] =  mosHTML::yesnoRadioList('Enabled', $std_opt, $sefconfig->Enabled );
	$lists['lowercase'] =  mosHTML::yesnoRadioList('LowerCase', $std_opt, $sefconfig->LowerCase );
	$lists['showsection'] =  mosHTML::yesnoRadioList('ShowSection', $std_opt, $sefconfig->ShowSection );
	$lists['showcat'] =  mosHTML::yesnoRadioList('ShowCat', $std_opt, $sefconfig->ShowCat );
	//$lists['usealias'] =  mosHTML::yesnoRadioList('UseAlias', $std_opt, $sefconfig->UseAlias );
	 if ($sefconfig->UseAlias == 0) {
	 	$fulltitle = 'checked="checked"';
	 	$titlealias = '';
	 }
	 else {
	 	$titlealias = 'checked="checked"';
	 	$fulltitle = '';
	 }
	$lists['usealias'] =  '
		<input type="radio" name="UseAlias" value="0" class="inputbox"' . $fulltitle . 'size="2" />' . _FULL_TITLE . '
		<input type="radio" name="UseAlias" value="1" class="inputbox"' . $titlealias . 'size="2" />' . _TITLE_ALIAS . '
	';



	// get a list of the static content items for 404 page
	$query = "SELECT id, title"
		. "\n FROM #__content"
		. "\n WHERE sectionid = 0 AND title != '404'"
		. "\n AND catid = 0"
		. "\n ORDER BY ordering"
		;
	$database->setQuery( $query );
	$items = $database->loadObjectList();

	$options = array(  mosHTML::makeOption( 0, "("._COM_SEF_DEF_404_PAGE.")")  );
	$options[] = mosHTML::makeOption( 9999999, "(Front Page)" );
	// assemble menu items to the array
	foreach ( $items as $item ) {
		$options[] = mosHTML::makeOption( $item->id, $item->title );
	}
	$lists['page404'] = mosHTML::selectList( $options, 'page404', 'class="inputbox" size="1"', 'value', 'text', $sefconfig->page404 );
	$sql='SELECT id,introtext FROM #__content WHERE `title`="404"';
	$row = null;
	$database->setQuery($sql);
	$database->loadObject( $row );
	if ($row->introtext)
		$txt404 = $row->introtext;
	else
		$txt404 = _COM_SEF_DEF_404_MSG;

	// get list of installed components for advanced config
	$installed_components = $undefined_components = array();
	$sql='SELECT SUBSTRING(link,8) AS name FROM #__components WHERE CHAR_LENGTH(link) > 0 ORDER BY name';
	$database->setQuery($sql);
	$installed_components = $database->loadResultArray();
	$undefined_components= array_values(array_diff($installed_components,array_intersect($sefconfig->predefined, $installed_components)));

	//build mode list and create the list
	$mode = array();
	$mode[] = mosHTML::makeOption( 0, _COM_SEF_USE_DEFAULT);
	$mode[] = mosHTML::makeOption( 1, _COM_SEF_NOCACHE);
	$mode[] = mosHTML::makeOption( 2, _COM_SEF_SKIP);
	while (list($index, $name) = each($undefined_components)){
		$selectedmode = ((in_array($name,$sefconfig->nocache))*1)+((in_array($name,$sefconfig->skip))*2);
		$lists['adv_config'][$name] = mosHTML::selectList( $mode, $name, 'class="inputbox" size="1"', 'value', 'text',$selectedmode);
	}
//	echo "<pre>";
//	print_r($undefined_components);
//	print_r($lists);
//	echo "</pre>";

   	HTML_sef::configuration($lists, $txt404);
}
function advancedConfig($key,$value){
	GLOBAL $sefconfig;

	$debug = 0;

	if ((strpos($key,"com_")) !== false) {
		if ($debug) echo "<p class='error'>FOUND COMPONENT:$key</p>";
		switch ($value) {
		case 1 :
			array_push($sefconfig->nocache,$key);
			break;
		case 2 :
			array_push($sefconfig->skip,$key);
			break;
		}
	}
	if ($debug) echo "<br>KEY=$key:VALUE=$value:";
}
function saveConfig() {
	global $database,$sefconfig,$sef_config_file;

	$debug = 0;

	//set skip and nocache arrays
	$sefconfig->skip = array();
	$sefconfig->nocache = array();
	foreach($_POST as $key => $value) {
		$sefconfig->set($key, $value);
		advancedConfig($key, $value);
	}

	$sql='SELECT id  FROM #__content WHERE `title`="404"';
	$database->setQuery( $sql );
	if ($id = $database->loadResult()){
		$sql = 'UPDATE #__content SET introtext="'.addslashes($_POST['introtext']).'",  modified ="'.date("Y-m-d H:i:s").'" WHERE `id` = "'.$id.'";';
	}else{
		$sql='SELECT MAX(id)  FROM #__content';
		$database->setQuery( $sql );
		if ($max = $database->loadResult()){
			$max++;
			$sql = 'INSERT INTO #__content VALUES( "'.$max.'", "404", "404", "'.addslashes($_POST['introtext']).'", "", "1", "0", "0", "0", "2004-11-11 12:44:38", "62", "", "'.date("Y-m-d H:i:s").'", "0", "62", "2004-11-11 12:45:09", "2004-10-17 00:00:00", "0000-00-00 00:00:00", "", "", "menu_image=-1\nitem_title=0\npageclass_sfx=\nback_button=\nrating=0\nauthor=0\ncreatedate=0\nmodifydate=0\npdf=0\nprint=0\nemail=0", "1", "0", "0", "", "", "0", "750");';
		}
	}

	$database->setQuery( $sql );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}
	if (is_writable($sef_config_file)) {
		$config_written = $sefconfig->saveConfig();
		//die("config_written:$config_written");
	  	if($config_written != 0) {
	  		if ($debug) {
		  		echo"<div align='left'><pre>CONFIG:";
		  		print_r($sefconfig);
		  		echo "<br />POST:";
		  		print_r($_POST);
		  		die("</pre></div>");
	  		}
	  		mosRedirect( "index2.php?option=com_sef&task=showconfig", _COM_SEF_CONFIG_UPDATED );
	  	}else mosRedirect( "index2.php?option=com_sef&task=dwnld", _COM_SEF_WRITE_ERROR);
 	}else mosRedirect( "index2.php?option=com_sef&task=dwnld", _COM_SEF_WRITE_ERROR);

}
function purge($option, $ViewModeId=0  ) {
	GLOBAL $database, $mainframe;

 	$ViewModeId = $mainframe->getUserStateFromRequest( "viewmode{$option}", 'viewmode', 0 );
	$SortById = $mainframe->getUserStateFromRequest( "SortBy{$option}", 'sortby', 0 );
	$confirmed = mosGetParam( $_REQUEST, 'confirmed', 0 );

	switch ($ViewModeId) {
		case '1':
			$where = "`dateadd` > '0000-00-00' and `newurl` = '' ";
			break;
		case '2':
			$where = "`dateadd` > '0000-00-00' and `newurl` != '' ";
			break;
		default:
			$where = "`dateadd` = '0000-00-00'";
			break;
	}
	if ( $confirmed == "Proceed"){
		$query = "DELETE FROM #__redirection WHERE ".$where;
		$database->setQuery( $query );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}else{
			$message = _COM_SEF_SUCCESSPURGE;
		}
	}else{
		// get the total number of records
		$query = "SELECT count(*) FROM #__redirection WHERE ".$where;
		$database->setQuery( $query );
		$total = $database->loadResult();
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
		switch ($total) {
			case '0';
				$message = _COM_SEF_NORECORDS;
				break;
			case '1';
				$message = _COM_SEF_WARNDELETE.$total._COM_SEF_RECORD;
				break;
			default:
				$message = _COM_SEF_WARNDELETE.$total._COM_SEF_RECORDS;
			}
	}
	HTML_sef::purge($option, $message, $confirmed);
}
function backup_custom(){
	GLOBAL $database;

	$SQL = array();

	$table = $GLOBALS['mosConfig_dbprefix']."redirection";
	$query ="SELECT * FROM `$table` WHERE (`dateadd` > '0000-00-00' and `newurl` != '' )";
	$database->setQuery( $query );
	if ($rows = $database->loadRowList()) {
		foreach ($rows as $row) {
			$SQL[] = "INSERT INTO `$table` VALUES('','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."');\n";
		}
	}else{
		die(_COM_SEF_NOACCESS.$table);
	}
	return $SQL;
}
function output_attachment($filename,&$data){
		if (!headers_sent()) {
			header ('Expires: 0');
			header ('Last-Modified: '.gmdate ('D, d M Y H:i:s', time()) . ' GMT');
			header ('Pragma: public');
			header ('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header ('Accept-Ranges: bytes');
			header ('Content-Length: ' . strlen($data));
			header ('Content-Type: Application/octet-stream');
			header ('Content-Disposition: attachment; filename="' . $filename . '"');
			header ('Connection: close');
			ob_end_clean(); //flush the mambo stuff from the ouput buffer
			print $data; // and send the sql
			die();
		}else{
			die(_COM_SEF_FATAL_ERROR_HEADERS);
		}
}
function export_custom($filename){
	GLOBAL $database;

	$sql_data = backup_custom();
	$sql_data = implode("\r", $sql_data);
	if (!headers_sent()) {
		while (ob_get_level() > 0) {
			ob_end_clean(); //flush the mambo stuff from the ouput buffer
		}
		// Determine Browser
		if (ereg( 'MSIE ([0-9].[0-9]{1,2})',$_SERVER["HTTP_USER_AGENT"],$log_version)) {
		    $BROWSER_VER=$log_version[1];
		    $BROWSER_AGENT='IE';
		} elseif (ereg( 'Opera ([0-9].[0-9]{1,2})',$_SERVER["HTTP_USER_AGENT"],$log_version)) {
		    $BROWSER_VER=$log_version[1];
		    $BROWSER_AGENT='OPERA';
		} elseif (ereg( 'Mozilla/([0-9].[0-9]{1,2})',$_SERVER["HTTP_USER_AGENT"],$log_version)) {
		    $BROWSER_VER=$log_version[1];
		    $BROWSER_AGENT='MOZILLA';
		} else {
		    $BROWSER_VER=0;
		    $BROWSER_AGENT='OTHER';
		}
		ob_start();
		header ('Expires: 0');
		header ('Last-Modified: '.gmdate ('D, d M Y H:i:s', time()) . ' GMT');
		header ('Pragma: public');
		header ('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header ('Accept-Ranges: bytes');
		header ('Content-Length: ' . strlen($sql_data));
		header ('Content-Type: Application/octet-stream');
		header ('Content-Disposition: attachment; filename="' . $filename . '"');
		header ('Connection: close');
		/*
		if ($BROWSER_AGENT == 'IE') {
			header('Content-Disposition: inline; filename="'.$filename.'";');
			header('Pragma: cache');
			header('Cache-Control: public, must-revalidate, max-age=0');
			header('Connection: close');
			header("Expires: ".gmdate("D, d M Y H:i:s", time()+60)." GMT");
			header("Last-Modified: ".gmdate("D, d M Y H:i:s", time())." GMT");
		}else{
			$header="Content-Disposition: attachment; filename=".$filename.";";
			header($header );
			header("Content-Length: ".strlen($sql_data));
		}
		*/
		echo($sql_data);
		ob_end_flush();
		die();
	}else{
		echo "Error! Not Good!";
		die(""._COM_SEF_FATAL_ERROR_HEADERS);
	}
}

function import_custom($userfile){
	GLOBAL $database;
	$uploaddir = $GLOBALS['mosConfig_absolute_path'].'/media/';
	$uploadfile = $uploaddir . basename($userfile['name']);
	if (move_uploaded_file($userfile['tmp_name'], $uploadfile)) {
		echo '<p class="message">'._COM_SEF_UPLOAD_OK.'</p>';
		$results = true;
		$lines = file($uploadfile);
//		echo "<pre>";
//		print_r($lines);
//		echo "</pre>";
		foreach ($lines as $line){
			$line = trim($line);
			if( substr($line,0,40) == "INSERT INTO `".$GLOBALS['mosConfig_dbprefix']."redirection` VALUES('',"){
				$database->setQuery( $line );
				if (! $database->query()){
					echo "<p class='error'>"._COM_SEF_ERROR_IMPORT."<pre>$line</pre></p>";
					$results = false;
				}
			}else{
				die("<p class='error'>"._COM_SEF_INVALID_SQL.substr($line,0,40)."</p>");
			}
		}
		unlink($uploadfile) OR DIE("<p class='error'>"._COM_SEF_NO_UNLINK."</p>");
		if ($results) echo '<p class="message">'._COM_SEF_IMPORT_OK.'</p>';
		?>
		<form><input type="button" value="<?php echo _COM_SEF_PROCEED; ?>" onClick="javascript:location.href='index2.php?option=com_sef&task=view&viewmode=2'"></form>
		<?php
	}else{
		echo "<p class='error'>"._COM_SEF_WRITE_FAILED."</p>";
		$results = false;
	}
	return $result;
}

?>