<?php
/*
* @version $Id: sef404.php,v 1.13 2005/02/15 19:29:39 marlboroman_2k Exp $
* @package Mambo_4.5.1
* @copyright (C) 2004 - 2004 W.H.Welch
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
* Dit bestand wordt geinclude als de functie aanstaat
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

GLOBAL $database ,$URI, $my, $option;

$debug=0;

// Hack in mos database as required
if( !is_object( @$database ) )
$database = new database( $GLOBALS['mosConfig_host'], $GLOBALS['mosConfig_user'], $GLOBALS['mosConfig_password'], $GLOBALS['mosConfig_db'], $GLOBALS['mosConfig_dbprefix'] );


$REQUEST = $SRU = $_SERVER['REQUEST_URI'];
if ($debug){
	$GLOBALS['404SEF_DEBUG']['INDEX'] = $index;
	$GLOBALS['404SEF_DEBUG']['BASE'] = $base;
	$GLOBALS['404SEF_DEBUG']['QUERY_STRING'] = $QUERY_STRING;
	$GLOBALS['404SEF_DEBUG']['REQUEST'] = $REQUEST;
	$GLOBALS['404SEF_DEBUG']['URI'] = $URI;
}

// Lets some quick sanity checks
switch ($URI->path) {
	case $base:
	case $base.$index:
	$option = (isset($_GET['option'])) ? $_GET['option'] : (isset($_REQUEST['option'])) ? $_REQUEST['option'] : null;
	if (is_null($option)) {
		$GLOBALS['404SEF_DEBUG']['REDIRECT_INDEX'] = 0;
		// fix those funky polls by ensuring we have an Itemid for the homepage
		$query = "SELECT `id`,`link` FROM #__menu where ((`menutype`='mainmenu') AND (`published` > 0) AND (`ordering`='1') AND (`parent` = 0) AND (`access` >= '".(isset($my) ? (intval(@$my->id)) : 0)."'))";		/*Beat: strange rule, but sometimes my is not set here, so at least stop PHP error*/
		$database->setQuery($query);
		if ($row = $database->loadRow()){
			$GLOBALS['404SEF_DEBUG']['REDIRECT_INDEX'] = 1;
			$_GET['Itemid'] = $_REQUEST['Itemid'] = $Itemid = $row[0];
			$_SERVER['QUERY_STRING'] = $QUERY_STRING  = str_replace("index.php?","",$row[1])."&Itemid=$Itemid";
			$REQUEST_URI = $GLOBALS['mosConfig_live_site']."/index.php?".$QUERY_STRING;
			$_SERVER['REQUEST_URI'] = $REQUEST_URI;
			if (preg_match("/option=([a-zA-Z_0-9]+)/",$QUERY_STRING,$matches)) {
				$_GET['option'] = $_REQUEST['option'] = $option = $matches[1];
			}
			$GLOBALS['404SEF_DEBUG']['ROW'] = $row;
			$GLOBALS['404SEF_DEBUG']['QUERY_STRING'] = $QUERY_STRING;
			$GLOBALS['404SEF_DEBUG']['REQUEST_URI'] = $REQUEST_URI;
			unset($matches);
			if (!headers_sent()) {
				header('HTTP/1.0 200 OK');
			}else{
				$url = $GLOBALS['mosConfig_live_site'].$_SERVER['QUERY_STRING'];
				print_r($path_array);
				die("<br />Are we debugging???<br />Killed at line ".__LINE__." in ".basename(__FILE__).": HEADERS ALREADY SENT (200)<br />URL=".@$url.":<br />OPTION=".@$option.":");
			}
		}
	}
	break;
	case "":
	die(_COM_SEF_STRANGE." URI->path=".$URI->path.":<br />".basename(__FILE__)."-".__LINE__);
	default:
	// sanity check ok so process URI
	// strip out the base
	$path = preg_replace("/^".preg_quote($base,"/")."/","",$URI->path);
	$path_array = explode("/",$path);
	$ext = getExt($path_array);
	$sef_ext_class = "sef_".$ext['name'];
	if ($sef_ext_class != "sef_404") {
		//do our space conversion
		//then find our suffix (.html) and strip it off,
		//SEF Advance extensions don't want the suffix
		//and some them require the spaces
		$x=0;
		foreach ($path_array as $pathdata) {
			$path_array[$x] = $pathdata = str_replace($sefconfig->replacement," ",$pathdata);
			if (strpos($pathdata,$sefconfig->suffix) !== false)
			$path_array[$x] = str_replace($sefconfig->suffix,"",$pathdata);
			$x++;
		}
	}
	if ($debug){
		$GLOBALS['404SEF_DEBUG']['EXT'] = $ext;
		$GLOBALS['404SEF_DEBUG']['SEF_EXT'] = $sef_ext_class;
		$GLOBALS['404SEF_DEBUG']['PATH'] = $path;
	}
	//Dit is meestal sef_404 en anders heeft het te maken met sef advance
	require_once($ext['path']);
	eval("\$sef_ext = new $sef_ext_class;");
	$pos = 0;
	if (isset($_REQUEST['option'])) {
		$pos = array_search($_REQUEST['option'],$path_array);
	}
	if (!(($sef_ext_class == "sef_content")or($sef_ext_class == "sef_component"))) {
		if ($pos == 0) {
			array_unshift($path_array,"option");
		}
	}
	if ($debug) {
		$GLOBALS['404SEF_DEBUG']['POS'] = $pos;
		$GLOBALS['404SEF_DEBUG']['PATH_ARRAY'] = $path_array;
	}

	$_SEF_SPACE = $sefconfig->replacement;
	$QUERY_STRING  = $sef_ext->revert($path_array,$pos);
	//echo " :QUERY_STRING: ".$QUERY_STRING." :path_array: ".$path_array[0].$path_array[1].$path_array[2].$path_array[3]." :pos: ".$pos;
	if (is_valid($QUERY_STRING)) {
		if (isset($QS)) {			/*Beat: $QS is usually not set here (didn't find from where it would come!), so check before using...same 4 lines below*/
		$QS = ($QS) ? "&".$QS :"";
		}
		$anchor = ($URI->anchor) ? "#".$URI->anchor:"";
		$_SERVER['QUERY_STRING'] = $QUERY_STRING  = str_replace("&?","&",$QUERY_STRING.(isset($QS) ? $QS : "").$anchor);
		$REQUEST_URI = $GLOBALS['mosConfig_live_site']."/index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
		if (preg_match("/option=([a-zA-Z_0-9]+)/",$QUERY_STRING,$matches)) {
			$_GET['option'] = $_REQUEST['option'] = $option = $matches[1];
		}
		unset($matches);
		// Extract to globals
		if (isset($QS_VARS)) {		/*Beat: only if it exists (didn't find from where it would come!), otherwise it kills $_GET ! */
		$_GET = array_merge($_GET,$QS_VARS);
		}
		while(list($key,$value)=each($_GET)){
			//		 echo "<br>$key=$value:";
			$GLOBALS[$key]=$value;
		}
		// Don't allow config vars to be passed as global
		include( "configuration.php" );

		if (!headers_sent()) {
			header('HTTP/1.0 200 OK');
		}else{
			$url = $GLOBALS['mosConfig_live_site']."/index.php?".$_SERVER['QUERY_STRING'];
			print_r($path_array);
			die("<br />Are we debugging???<br />Killed at line ".__LINE__." in ".basename(__FILE__).": HEADERS ALREADY SENT (200)<br />URL=".@$url.":<br />OPTION=".@$option.":");
		}
	}else{
		// bad URL, so check to see if we've seen it before
		$query = "SELECT * FROM #__redirection WHERE oldurl = '".$path."'";
		$database->setQuery($query);
		$results=$database->loadObjectList();
		if ($results){
			// we have, so update counter
			$database->setQuery("UPDATE #__redirection SET cpt=(cpt+1) WHERE oldurl = '".$path."'");
			$database->query();
		}else{
			// record the bad URL
			$query = 'INSERT INTO `#__redirection` ( `cpt` , `oldurl` , `newurl` , `dateadd` ) '
			. ' VALUES ( \'1\', \''.$path.'\', \'\', CURDATE() );'
			. ' ';
			$database->setQuery($query);
			$database->query();
		}
		// redirect to the error page
		// You MUST create a static content page with the title 404 for this to work properly
		$mosmsg = "FILE NOT FOUND: ".$path;
		$_GET['mosmsg'] = $_REQUEST['mosmsg'] = $mosmsg;
		$option="com_content";
		$task="view";
		if ($sefconfig->page404 == "0") {
			$sql='SELECT id  FROM #__content WHERE `title`="404"';
			$database->setQuery( $sql );
			if ($id = $database->loadResult()){
			//die('aaaaaaghrtt');
				$Itemid = null; /*Beat: was wrong: =$id : the $Itemid represents the menuId, and $id the contentId ! */
				$_SERVER['QUERY_STRING'] = "option=com_content&task=view&id=$id&Itemid=$id&mosmsg=$mosmsg";
				$_SERVER['REQUEST_URI'] = $GLOBALS['mosConfig_live_site']."/index.php?".$_SERVER['QUERY_STRING'];
				$_GET['option'] = $_REQUEST['option'] = $option;
				$_GET['task'] = $_REQUEST['task'] = $task;
				/*Beat: was wrong: $_GET['Itemid'] = $_REQUEST['Itemid'] = $Itemid; */
				unset($_GET['Itemid']);
				unset($_REQUEST['Itemid']);
				$_GET['id'] = $_REQUEST['id'] = $id;
			}else{
				die(_COM_SEF_DEF_404_MSG.$mosmsg."<br>URI:".$_SERVER['REQUEST_URI']);
			}
		}elseif ($sefconfig->page404 == "9999999") {
			//redirect to frontpage
			$Front404 = 1;
		}else{
			$id = $Itemid  = $sefconfig->page404;
			$_SERVER['QUERY_STRING'] = "option=com_content&task=view&id=$id&Itemid=$id&mosmsg=$mosmsg";
			$_SERVER['REQUEST_URI'] = $GLOBALS['mosConfig_live_site']."/index.php?".$_SERVER['QUERY_STRING'];
			$_GET['option'] = $_REQUEST['option'] = $option;
			$_GET['task'] = $_REQUEST['task'] = $task;
			$_GET['Itemid'] = $_REQUEST['Itemid'] = $Itemid;
			$_GET['id'] = $_REQUEST['id'] = $id;
		}
		if (!headers_sent()) {
			header('HTTP/1.0 404 NOT FOUND');
			if ($Front404) mosRedirect( $GLOBALS['mosConfig_live_site'] );
		}else{
			$url = sefRelToAbs($GLOBALS['mosConfig_live_site']."/index.php?".$_SERVER['QUERY_STRING']);
			print_r($path_array);
			die("<br />Are we debugging???<br />Killed at line ".__LINE__." in ".basename(__FILE__).": HEADERS ALREADY SENT (404)<br />URL=".@$url.":<br />OPTION=".@$option.":");
			mosRedirect( $url );
		}
	} //end bad url
}//

if ($debug){
	$GLOBALS['404SEF_DEBUG']['SERVER_QUERY_STRING'] = $_SERVER['QUERY_STRING'];
	$GLOBALS['404SEF_DEBUG']['SERVER_REQUEST_URI'] = $_SERVER['REQUEST_URI'];
}
/*
* 404SEF SUPPORT FUNCTIONS
*/

function sef_ext_exists($this_name){
	GLOBAL $database, $sefconfig;

	$debug=0;

	// check for sef_ext
	$this_name = str_replace($sefconfig->replacement," ",$this_name);
	$sql = "SELECT `id`,`link` FROM #__menu  WHERE ((`name` LIKE '%".$this_name."%') AND (`published` > 0))";
	$database->setQuery($sql);
	$rows = @$database->loadObjectList( );
	if ($database->getErrorNum()) {
		die( $database->stderr() );
	}
	if ($debug) {
		$GLOBALS['404SEF_DEBUG']['SEF_EXT_EXISTS']['THIS_NAME'] = $this_name;
		$GLOBALS['404SEF_DEBUG']['SEF_EXT_EXISTS']['ROWS'] = $rows;
	}
	if( @count( $rows ) > 0 ){
		$option = str_replace("index.php?option=","",$rows[0]->link);
		if (file_exists($GLOBALS['mosConfig_absolute_path']."/components/$option/sef_ext.php")){
			if ($debug) { $GLOBALS['404SEF_DEBUG']['SEF_EXT_EXISTS']['FOUND']=1;}
			return @$rows[0];
		}else{
			if ($debug) { $GLOBALS['404SEF_DEBUG']['SEF_EXT_EXISTS']['FOUND']=0;}
			unset($rows);
		}
	}
	return null;	/*Beat: because rows is not always defined*/
}

function getExt(&$URL_ARRAY){
	GLOBAL $database, $sefconfig;

	$ext = array();
	$row = sef_ext_exists($URL_ARRAY[0]);
	$ext['path'] = $GLOBALS['mosConfig_absolute_path']."/components/com_sef/sef_ext.php";
	if (is_object($row) ){
		$_GET['option'] = $_REQUEST['option'] = $option = str_replace("index.php?option=","",$row->link);
		$_GET['Itemid'] = $_REQUEST['Itemid'] = $row->id;
		$ext['path'] = $GLOBALS['mosConfig_absolute_path']."/components/$option/sef_ext.php";
	}elseif ((strpos($URL_ARRAY[0],"com_") !== false) or ($URL_ARRAY[0] == "component")){
		$_GET['option'] = $_REQUEST['option'] = $option = "com_component";
	}elseif($URL_ARRAY[0] == 'content'){
		$_GET['option'] = $_REQUEST['option'] = $option = "com_content";
	}else{
		$option = "404";
	}
	$ext['name'] = str_replace("com_","",$option);
	return $ext;
}

function is_valid( $string ) {
	GLOBAL  $base,$index;

	if (($string == $index )|($string ==  $base.$index )) {
		$state = true ;
	}else{
		$state = false;
		require_once($GLOBALS['mosConfig_absolute_path']."/components/com_sef/sef_ext.php");
		$sef_ext = new sef_404;
		$option = (isset($_GET['option'])) ? $_GET['option'] : (isset($_REQUSET['option'])) ? $_REQUEST['option'] : null;
		if (is_null($option)) {
			parse_str($string,$vars);
			if (isset($vars['option'])) {
				$option = $vars['option'];
			}
		}
		switch ($option) {
			case is_null($option):
			break;
			case "login":		/*Beat: makes this also compatible with CommunityBuilder login module*/
			case "logout":
			$state = true;
			break;
			default:
			if (is_valid_component($option)){
				if ((!($option == "com_content"))|(!($option == "content"))) {
					$state = true;
				}else{
					$title=$sef_ext->getContentTitles($_REQUEST['task'],$_REQUEST['id']);
					//die(count($title));
					if (count($title) > 0) {
						$state = true;
					}
				}
			}
		}
	}
	return $state;
}

function is_valid_component($this) {

	$state = false;
	$path = $GLOBALS['mosConfig_absolute_path'] ."/components/";

	if(is_dir($path)) {
		if($contents = opendir($path)) {
			while(($node = readdir($contents)) !== false) {
				if($node!="." && $node!="..") {
					if ((is_dir($path."/".$node)) && ($this == $node)){
						$state=true;
						break;
					}
				}
			}
		}
	}
	return $state;
}

function sefRelToAbs( $string ) {
	GLOBAL $database, $sefconfig, $_SEF_SPACE;

	$debug=0;

	if (($string == $GLOBALS['mosConfig_live_site'])
	|| ($string == $GLOBALS['mosConfig_live_site']."/")
	|| ($string == $GLOBALS['mosConfig_live_site']."/index.php")) return $string;

	$newstring = str_replace($GLOBALS['mosConfig_live_site']."/","",$string);

	if ((!strcasecmp(substr($newstring,0,9),"index.php"))
	&& !eregi("^(([^:/?#]+):)",$newstring)
	&& !eregi("this\.options\[selectedIndex\]\.value",$newstring) )
	{

		$string = str_replace("&amp;","&",$newstring);
		$URI = new Net_URL($string);

		if (count($URI->querystring)>0) {
			extract($URI->querystring,EXTR_REFS);
		}else{
			return $URI->url;
		}

		// is there a named anchor attached to $string? If so, strip it off, we'll put it back later.
		if ($URI->anchor) $string = str_replace("#$URI->anchor","",$string);

		if ($debug){
			$GLOBALS['404SEF_DEBUG']['sefRelToAbs'][$string]= $URI;
			$debug_string = $string;
		}

		//Predefined is bepaald in het configbestand
		//Skip is bepaald in de backend
		//Waarom geen nieuw en edit?
		//if (   !(  (isset($task) ? ((@$task == "new")|(@$task == "edit")) : false)  )    && isset($option)   ) {
		if (isset($option) && $task != 'edit') {
			/*Beat: sometimes task is not set, e.g. when $string = "index.php?option=com_frontpage&Itemid=1" */
			switch ($option) {
				case (in_array($option,$sefconfig->skip)):
				$sefstring = $string;
				break;
				case (in_array($option,$sefconfig->nocache)):
				$sefstring = 'component/';
				foreach($URI->querystring as $key => $value) {
					$sefstring .= "$key,$value/";
				}
				$sefstring = str_replace( 'option/', '', $sefstring );
				break;
				default:
				//Dit is dus alleen voor components die nog niet bepaald zijn
				if (file_exists($GLOBALS['mosConfig_absolute_path']."/components/$option/sef_ext.php")){
					//Heeft de component zelf een sef extentie?
					require_once($GLOBALS['mosConfig_absolute_path']."/components/$option/sef_ext.php");
					$_SEF_SPACE = $sefconfig->replacement;
					$longurl = ($sefconfig->UseAlias == 1);
					$lowercase = $sefconfig->LowerCase;
					$comp_name = str_replace("com_","",$option);
					eval("\$sef_ext = new sef_$comp_name;");
					$title[] = getMenuTitle($option,null);
					$string = str_replace("&","&amp;",$string);
					$sefstring = $sef_ext->create($string);
					if ($sefstring == $string) {
						return $string;
					}else{
						$sefstring = str_replace(" ",$_SEF_SPACE,$sefstring);
						$sefstring = str_replace(" ","",titleToLocation($title[0])."/".$sefstring.(($sefstring !="") ? $sefconfig->suffix : ""));
						$sefstring = str_replace("/".$sefconfig->suffix,$sefconfig->suffix,$sefstring);
					}
				}else{
					// De component heeft geen sef extentie
					// Component has no sef extension

					//Ervoor zorgen dat de sessionid wordt verwijderd:
					//Ensure that the session ids are removed

					if (isset($sid)) $string = str_replace("sid=$sid", '', $string);
					$string = trim($string, "&?");

					//Checken of de url al in de database staat
					//Check if the url is saved in the database
					If (!$sefstring = getSefUrlFromDatabase($string)) {
						require_once($GLOBALS['mosConfig_absolute_path']."/components/com_sef/sef_ext.php");
						$sef_ext = new sef_404;
						//Hier wordt de url gemaakt
						//where the url is made
						$sefstring = $sef_ext->create($string,$URI->querystring);
					}
					//Reconect the sid to the url
					if (isset($sid)) {
						$sefstring .= '?sid=' . $sid;
					}
				}
			}
			if ($debug){ $GLOBALS['404SEF_DEBUG']['sefRelToAbs']['SEF_EXT'][$debug_string] = $sef_ext;}
			if (isset($sef_ext)) unset($sef_ext);

			$string =  $GLOBALS['mosConfig_live_site']."/".$sefstring.(($URI->anchor)?"#".$URI->anchor:"");
		}
		$ret = (($sefconfig->LowerCase) ? strtolower($string) : $string);
		$ret = str_replace('itemid', 'Itemid', $ret);
	}
	if (!isset($ret)) $ret = $string;
	if ($debug){ $GLOBALS['404SEF_DEBUG']['sefRelToAbs']['RET'][$debug_string] = $ret;}
	return $ret;
}

function titleToLocation(&$title) {
	global $sefconfig;

	// remove accented characters
	$title = strtr($title, "ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");

	// remove quotes, spaces, and other illegal characters
	$title = preg_replace(array("/'/","/[^a-zA-Z0-9\-!.,+]+/","/(^_|_$)/"),array("",$sefconfig->replacement,""),$title);

	return (($sefconfig->LowerCase) ? strtolower($title) : $title);
}

function getMenuTitle($option, $task, $id = null, $string = null){
	GLOBAL $database;

	$debug=0;
	if (isset($string)) {
		$sql = "SELECT name FROM #__menu WHERE link = '$string'";
	}
	elseif (isset($id) && $id != 0) {
		$sql = "SELECT name FROM #__menu WHERE id = '".$id."'";
	}else{
		$sql = "SELECT name FROM #__menu WHERE link = 'index.php?option=".$option."'";
	}
	$database->setQuery($sql);
	$rows = @$database->loadObjectList( );
	if ($debug){
		$GLOBALS['404SEF_DEBUG']['getMenuTitle']['ROWS-'.$option."-".$task] = $rows;
		echo"</pre>";
	}
	if ($database->getErrorNum()) {
		die( $database->stderr() );
	}elseif( @count( $rows ) > 0 ){
		if( !empty( $rows[0]->name ) ){
			$title = strtolower($rows[0]->name);
		}
	}else{
		$title=str_replace("com_","",$option);
	}
	return $title;
}

function getSefUrlFromDatabase($url) {
	global $database;

	/*$query = "
	SELECT oldurl
	FROM #__redirection
	WHERE newurl LIKE '".$url."'";*/
	$query = "
	SELECT oldurl
	FROM #__redirection
	WHERE newurl = '".$url."'";
	$database->setQuery($query);
	$result = $database->loadresult();

	if (!empty($result)) {
		return $result;
	}
	else {
		return false;
	}
}
?>