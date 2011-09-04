<?php
/*
* @version $Id: sef_ext.php,v 1.4 2005/01/23 18:12:24 marlboroman_2k Exp $
* @package Mambo_4.5.1
* @copyright (C) 2004 - 2004 W.H.Welch
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
* Sef_component en sef_content komen bijna nooit voor, meestal is het alleen
$ Sef_404
*/

global $_SEF_SPACE, $lowercase;
class sef_component {
	function revert (&$url_array, $pos) {
		global $_SEF_SPACE;

		$QUERY_STRING = "";

		if (strcspn ( $url_array[1], "," ) == strlen($url_array[1])) {
			// This is a nocache url
			$x = 0;
			$c = count($url_array);
			while ( $x < $c ) {
				if (isset($url_array[$x]) && $url_array[$x]!="" && isset($url_array[$x + 1]) && $url_array[$x + 1]!="") {
					$_GET[$url_array[$x]] = $_REQUEST[$url_array[$x]] = $url_array[$x + 1];
					$QUERY_STRING .= "&".$url_array[$x]."=".$url_array[$x + 1];
				}
				$x++;$x++;
			}
		}else{
			//This is a default mambo SEF url for a component
			foreach($url_array as $value) {
				$temp = explode(",", $value);
				if (isset($temp[0]) && $temp[0]!="" && isset($temp[1]) && $temp[1]!="") {
					$_GET[$temp[0]] = $_REQUEST[$temp[0]] = $temp[1];
					$QUERY_STRING .= "&$temp[0]=$temp[1]";
				}
			}
		}
		return str_replace("&option","option",$QUERY_STRING);
	}
}
class sef_content {
	function revert (&$url_array, $pos) {
		$_GET['option'] = $_REQUEST['option'] = $option = "com_content";
		$c=count(array_filter($url_array)) - strval($pos);

		switch ($c){
			//$option/$task/$sectionid/$id/$Itemid/$limit/$limitstart
			case 7:
			$task = $url_array[$pos+1];
			$sectionid = $url_array[$pos+2];
			$id = $url_array[$pos+3];
			$Itemid = $url_array[$pos+4];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			break;
			// $option/$task/$id/$Itemid/$limit/$limitstart
			case 6:
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$Itemid = $url_array[$pos+3];
			$limit = $url_array[$pos+4];
			$limitstart = $url_array[$pos+5];
			break;
			// $option/$task/$sectionid/$id/$Itemid
			case 5:
			$task = $url_array[$pos+1];
			$sectionid = $url_array[$pos+2];
			$id = $url_array[$pos+3];
			$Itemid = $url_array[$pos+4];
			break;
			// $option/$task/$id/$Itemid
			case 4:
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$Itemid = $url_array[$pos+3];
			break;
			// $option/$task/$id
			case 3:
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			break;
			// $option/$task
			case 2:
			$task = $url_array[$pos+1];
		}
		//$QUERY_STRING = "option=com_content&task=$task&sectionid=$sectionid&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
		$_GET['task'] = $_REQUEST['task'] = $task;
		$QUERY_STRING = "option=com_content&task=$task";
		if (@$sectionid) {
			$_GET['sectionid'] = $_REQUEST['sectionid'] = $sectionid;
			$QUERY_STRING .= "&sectionid=$sectionid";
		}
		if (@$id) {
			$_GET['id'] = $_REQUEST['id'] = $id;
			$QUERY_STRING .= "&id=$id";
		}
		if (@$Itemid) {
			$_GET['Itemid'] = $_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING .= "&Itemid=$Itemid";
		}
		if (@$limit) {
			$_GET['limit'] = $_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING .= "&limit=$limit&limitstart=$limitstart";
		}
		return $QUERY_STRING;
	}
}
class sef_404 {
	function create ($string, &$vars) {
		global $database, $sefconfig;

		$debug=0;

		$index = str_replace($GLOBALS['mosConfig_live_site'],"",$_SERVER['PHP_SELF']);
		$base = dirname($index);
		$base .= (($base == "/") ? "" :"/");
		//In vars zitten de $option enzo
		extract($vars);
		if ($debug) {
			$debug_string = $string;
			$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['VARS']= $vars;
		}

		//Plugin system
		if (file_exists($GLOBALS['mosConfig_absolute_path'] . '/components/com_sef/sef_ext/' . $option . '.php')) {
			include($GLOBALS['mosConfig_absolute_path'] . '/components/com_sef/sef_ext/' . $option . '.php');
		}
		else {
			$title[] = getMenuTitle($option, (isset($task) ? @$task : null) );
			$title[] = '/';
			if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title, (isset($task) ? @$task : null), (isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null) );
		}
		return $string;
	}

	function revert (&$url_array, $pos) {
		GLOBAL $database, $sefconfig;

		$debug=0;

		$QUERY_STRING ="";

		$req = str_replace("option/","",implode("/",$url_array));
		if ($debug) {$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404']['INITIAL_REQ']=$req;}

		// verify trailing slash and default filename if there is one

		if(!eregi($sefconfig->addFile."$",$req) && !eregi($sefconfig->suffix."$",$req)){
			//if there should be a filename add it on
			$req = $req.$sefconfig->addFile;
		}
		if(!eregi("/".$sefconfig->addFile."$",$req) && !eregi($sefconfig->suffix."$",$req)){
			//no suffix or filename entered so make sure there is a slash
			if(eregi($sefconfig->addFile."$",$req)) $req = substr($req,0,strlen($req)-strlen($sefconfig->addFile))."/".$sefconfig->addFile;
		}

		$req = str_replace("//","/",$req);

		if ($debug) {$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404']['REQ']=$req;}
		//$sql="SELECT oldurl, newurl FROM #__redirection WHERE oldurl LIKE '".$req."' LIMIT 1";
		$sql="SELECT oldurl, newurl FROM #__redirection WHERE oldurl = '".$req."' LIMIT 1";
		$database->setQuery($sql);

		if ($database->loadObject($row)) {
			// use the cached url
			$string = $row->newurl;
			// update the count
			//$database->setQuery("UPDATE #__redirection SET cpt=(cpt+1) WHERE `newurl` LIKE '".$row->newurl."'");
			$database->setQuery("UPDATE #__redirection SET cpt=(cpt+1) WHERE `newurl` = '".$row->newurl."'");
			$database->query();
			$string = str_replace( '&amp;', '&', $string );
			$QUERY_STRING= str_replace("index.php?","",$string);
			parse_str($QUERY_STRING,$vars);
			//			$QUERY_STRING = str_replace( '&', '&amp;', $QUERY_STRING);
			if ($debug) {
				$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404']['QUERY_STRING'] = $QUERY_STRING;
				$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404']['VARS']= $vars;
			}
			$_GET = array_merge($_GET,$vars);
			$_REQUEST = array_merge($_REQUEST,$vars);
		}
		return $QUERY_STRING;
	}
	function getContentTitles($task,$id){
		GLOBAL $database, $sefconfig;

		$title = array();

		switch ($task) {
			case 'section':
			case 'blogsection':
				if (isset($id)){
					$sql = "SELECT title AS section FROM #__sections WHERE id=$id";
				}
				break;
			case 'category':
			case 'blogcategory':
				if (isset($id)){
					if (($sefconfig->ShowSection == true)||($sefconfig->ShowCat == false)) {
						$sql = "SELECT s.title AS section ".(($sefconfig->ShowCat == false) ? "":", c.title AS category" )." FROM #__categories as c ".
							"LEFT JOIN #__sections AS s ".
							"ON c.section=s.id ".
							"WHERE c.id=$id";
					}else{
						$sql = "SELECT title AS category FROM #__categories WHERE id=$id";
					}
				}
				break;
			case 'view':
				if (isset($id)){
					if ($sefconfig->UseAlias == true) {
						// verify title alias is not empty
						$database->setQuery("SELECT title_alias FROM #__content WHERE id=$id");
						if ($ta = $database->loadResult())
							$title_field = "title_alias";
						else
							$title_field = "title";
					}else{
						$title_field = "title";
					}
					if (($sefconfig->ShowSection == true)||($sefconfig->ShowCat == false)) {
						$sql ="SELECT ".(($sefconfig->ShowSection == true) ? "s.title AS section,":"" )." ".
						(($sefconfig->ShowCat == false) ? "":"c.title AS category," )." a.".$title_field." AS title FROM #__content as a ".
							"LEFT JOIN #__sections AS s ".
							"ON a.sectionid=s.id ".
							"LEFT JOIN #__categories AS c ".
							"ON a.catid=c.id ".
							"WHERE a.id=$id";
					}else{
						$sql ="SELECT ".(($sefconfig->ShowCat == false) ? "":"c.title AS category," )." a.".$title_field." AS title FROM #__content as a ".
							"LEFT JOIN #__categories AS c ".
							"ON a.catid=c.id ".
							"WHERE a.id=$id";
					}
				}
				break;
			default :
				$sql ='';
		}
		if ($sql) {
			$row = null;
			$database->setQuery($sql);
			$database->loadObject( $row );
			if (isset($row->section)) {
				$title[] = $row->section;
				if ($task == "section") $title[] = "/";
			}
			if (isset($row->category)) {
				$title[] = $row->category;
				if ($task == "category") $title[] = "/";
			}
			if (isset($row->title)) $title[] = $row->title;
		}
		return $title;
	}

	/**
	 * Vul in de array $title de onderdelen waaruit de link moet bestaan
	 * Bijvoorbeeld: menuitem, categorie, itemnaam
	 * Deze functie last de boel aan elkaar
	 *
	 * @param string $url
	 * @param array $title
	 * @param unknown_type $task
	 * @param unknown_type $limit
	 * @param unknown_type $limitstart
	 * @return sefurl
	 */
	function sefGetLocation($url, &$title, $task = null, $limit = null, $limitstart = null) {

		GLOBAL $database, $sefconfig;

		$debug=0;

		//shorten the url for storage and for consistancy
		$url = str_replace( '&amp;', '&', $url );

		// get all the titles ready for urls
		$location = array();
		foreach(array_filter($title) as $titlestring) {
			$location[] = titleToLocation($titlestring);
		}

		//remove unwanted characters - Ryan
		$finalstrip = explode("|",$sefconfig->stripthese);
		$takethese = str_replace("|", "", $sefconfig->friendlytrim);

		$imptrim = implode("/",$location);

		if(isset($task)){
			$task = str_replace($sefconfig->replacement."-".$sefconfig->replacement, $sefconfig->replacement, $task);
			$task =  str_replace($finalstrip, "", $task);
			$task = trim($task,$takethese);

		}

		$imptrim = str_replace($sefconfig->replacement."-".$sefconfig->replacement, $sefconfig->replacement, $imptrim);
		$suffixthere = 0;
		if (eregi($sefconfig->suffix."$",$imptrim)) {
			$suffixthere = strlen($sefconfig->suffix);
		}

		$imptrim = str_replace($finalstrip, $sefconfig->replacement, substr($imptrim,0,strlen($imptrim)-$suffixthere));
		$imptrim = str_replace($sefconfig->replacement.$sefconfig->replacement, $sefconfig->replacement, ((strlen($imptrim)>100-strlen($sefconfig->suffix)-strlen($GLOBALS['mosConfig_live_site'])) ? substr($imptrim,0,strlen($imptrim)-$suffixthere) : $imptrim));

		$suffixthere = 0;
		if (eregi($sefconfig->suffix."$",$imptrim)) {
			$suffixthere = strlen($sefconfig->suffix);
		}

		$imptrim = trim(substr($imptrim,0,strlen($imptrim)-$suffixthere),$takethese);

		$location = str_replace("//","/",$imptrim.((isset($task)) ? "/".$task.$sefconfig->suffix : ""));
		$location = str_replace("//","/",str_replace("/".$sefconfig->replacement,"/",$location));

		if ($debug) $GLOBALS['404SEF_DEBUG']['CLASS_SEF_404']['sefGetLocation'][$url] = $location;

		// attempt to intelligently detect page 0 of multi-page urls
		// they don't really need to be added.
//	they do need to be for me or the template doesnt load -Ryan
//		if (isset($limitstart)){
//			if ($limitstart == 0) {
//				$url = preg_replace("/\&limit=[0-9]+\&limitstart=0/","",$url);
//			}
//		}

		//check for non-sef url first and avoid repeative lookups
		//we only want to look for title variations when adding new
		//this should also help eliminate duplicates.
		$query = "SELECT oldurl FROM #__redirection WHERE newurl = '".$url."'";
		$database->setQuery($query);

		if ($realloc = $database->loadResult()) {
			// found a match, so we aredone
			//Dat betekent dus, dat de functie create(), slecht gekozen is
			die('regel292 in sef_ext.php');
		}else{
			// this is new, so we need to insert the new title.
			//Hier worden eindelijk de nieuwe links gemaakt
			$iteration = 0;
			$realloc = false;

			do {

				//Hier begint de loop met het toevoegen van de component/nummer.html
				// temploc is $location, unless we're on a second or greater iteration,
				// then its $location.$iteration
				// section reworked by Ryan

				if (eregi("\/$",$location)) {
					if ($iteration == 0) $iteration++;
					if ($sefconfig->pagetext){
						if (isset($limit)) {
							$pagenum = $limitstart/$limit;
							$pagenum++;
						}else{
							$pagenum = $iteration;
						}
						if (false !== strpos($sefconfig->pagetext,"%s")){
							$page = preg_replace("/\%s/",$pagenum,$sefconfig->pagetext).$sefconfig->suffix;
						}else{
							$page = $sefconfig->pagetext.$sefconfig->pagerep.$pagenum.$sefconfig->suffix;
						}
						$temploc = $location.(($iteration == 1) ? "" : $page);
					}else{
						$temploc = $location.(($iteration == 1) ? "" : $sefconfig->pagerep.$iteration.$sefconfig->suffix);
					}

				}elseif ($sefconfig->suffix) {
					if  ($sefconfig->suffix != "/") {
						if ($iteration == 0) $iteration++;
						if (eregi($sefconfig->suffix,$location)) {
							$temploc = preg_replace("/".$sefconfig->suffix."/","",$location).(($iteration == 1) ? $sefconfig->suffix : $sefconfig->pagerep.$iteration.$sefconfig->suffix);
						}else{
							$temploc = $location .(($iteration == 1) ? $sefconfig->suffix : $sefconfig->pagerep.$iteration.$sefconfig->suffix);
						}
					}else{
						$temploc = $location.(($iteration < 2) ? $sefconfig->suffix : $sefconfig->pagerep.$iteration.$sefconfig->suffix);
					}
				}else{
					$temploc = $location.(($iteration == 0) ? "" : $sefconfig->pagerep.$iteration);
				}

				if ($sefconfig->addFile){
					if (!eregi($sefconfig->suffix."$",$temploc) && eregi("\/$",$temploc)) $temploc .= $sefconfig->addFile;
				}

				// see if we have a result for this location
				if ($sefconfig->LowerCase) $temploc = strtolower($temploc);
				//$sql = "SELECT newurl FROM #__redirection WHERE oldurl LIKE '".$temploc."'";
				$sql = "SELECT newurl FROM #__redirection WHERE oldurl = '".$temploc."'";
				$database->setQuery($sql);
				if ($iteration == 9999) {
					var_dump($sql);
					die('Too many pages.');
				}
				if ($dburl = $database->loadResult()) {
					if ($dburl == $url) {
						// found the matching object
						// it probably should have been found sooner
						// but is checked again here just for CYA purposes
						// and to end the loop
						$realloc = $temploc;
					}
					// else, didn't find it, increment and try again
				} else {
					//title not found, checken op 404's
					$query = "SELECT `id` FROM #__redirection
					WHERE `oldurl` = '$temploc' AND `newurl` = ''";
					$database->setQuery($query);
					$id = $database->loadResult();

					if (!empty($id)) {
						//Er bestaat een 404 pagina voor die geupdate moet worden
						//Dat komt omdat je op deze pagina bent begonnen terwijl en nog geen sef urls waren
						$query = "UPDATE #__redirection SET `newurl` = '".addslashes(urldecode($url))."'
						WHERE `id` = '$id'";
						$database->setQuery($query);
						if (!$database->query()) {
							var_dump($query);
						}
					}
					else {

						/* put it in the database */
						$query = "INSERT INTO #__redirection (oldurl, newurl) ".
						"VALUES ('".$temploc."', '".addslashes(urldecode($url))."')";
						$database->setQuery($query);
						if (!$database->query()) {
							var_dump($query);
						}
					}
					$realloc = $temploc;
				}
				$iteration++;
			} while (!$realloc);
		}
		return $realloc;
	}
	function getcategories($catid) {
		global $debug, $GLOBALS, $database;

		if (empty($cat_table)) $cat_table = "#__categories";
		if ($debug){$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['THIS_TASK'] = $this_task; }

		//Als er een categorie in de link staat wordt deze aan title toegevoegd zodat deze
		//In de url wordt opgenomen
		if (isset($catid) && $catid != 0){
			if ($debug){
				$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['CAT_TABLE'] = $cat_table;
				$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['CATID'] = $catid;
			}
			$query = 'SELECT name FROM '.$cat_table.' WHERE id = "'.$catid.'"';
			$database->setQuery($query);
			$rows = $database->loadObjectList( );
			if ($debug){$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string][$option] = $rows;}
			if ($database->getErrorNum()) {
				die( $database->stderr());
			}elseif( @count( $rows ) > 0 ){
				if( !empty( $rows[0]->name ) ){
					$title = $rows[0]->name;
				}
			}
		}
		return $title;
	}
}


?>