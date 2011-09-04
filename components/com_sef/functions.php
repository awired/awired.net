<?php

//Stolen from 'includes/sef.php'

function decodeurls_mambo () {
	$_SERVER['REQUEST_URI'] = trim($_SERVER['REQUEST_URI'], "&");
	$url_array = explode("/", $_SERVER['REQUEST_URI']);
	/**
	* Content
	* http://www.domain.com/$option/$task/$sectionid/$id/$Itemid/$limit/$limitstart
	*/
	if (in_array("content", $url_array)) {

		$uri = explode("content/", $_SERVER['REQUEST_URI']);
		$option = "com_content";
		$_GET['option'] = $option;
		$_REQUEST['option'] = $option;
		$pos = array_search ("content", $url_array);

		// language hook for content
		$lang = "";
		foreach($url_array as $key=>$value) {
			if ( !strcasecmp(substr($value,0,5),"lang,") ) {
				$temp = explode(",", $value);
				if (isset($temp[0]) && $temp[0]!="" && isset($temp[1]) && $temp[1]!="") {
					$_GET['lang'] = $temp[1];
					$_REQUEST['lang'] = $temp[1];
					$lang = $temp[1];
				}
				unset($url_array[$key]);
			}
		}

		// $option/$task/$sectionid/$id/$Itemid/$limit/$limitstart
		if (isset($url_array[$pos+6]) && $url_array[$pos+6]!="") {
			$task = $url_array[$pos+1];
			$sectionid = $url_array[$pos+2];
			$id = $url_array[$pos+3];
			$Itemid = $url_array[$pos+4];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&task=$task&sectionid=$sectionid&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
			// $option/$task/$id/$Itemid/$limit/$limitstart
		} else if (isset($url_array[$pos+5]) && $url_array[$pos+5]!="") {
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$Itemid = $url_array[$pos+3];
			$limit = $url_array[$pos+4];
			$limitstart = $url_array[$pos+5];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
			// $option/$task/$sectionid/$id/$Itemid
		} else if (!(isset($url_array[$pos+5]) && $url_array[$pos+5]!="") && isset($url_array[$pos+4]) && $url_array[$pos+4]!="") {
			$task = $url_array[$pos+1];
			$sectionid = $url_array[$pos+2];
			$id = $url_array[$pos+3];
			$Itemid = $url_array[$pos+4];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&task=$task&sectionid=$sectionid&id=$id&Itemid=$Itemid";
			// $option/$task/$id/$Itemid
		} else if (!(isset($url_array[$pos+4]) && $url_array[$pos+4]!="") && (isset($url_array[$pos+3]) && $url_array[$pos+3]!="")) {
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$Itemid = $url_array[$pos+3];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid";
			// $option/$task/$id
		} else if (!(isset($url_array[$pos+3]) && $url_array[$pos+3]!="") && (isset($url_array[$pos+2]) && $url_array[$pos+2]!="")) {
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$QUERY_STRING = "option=com_content&task=$task&id=$id";
			// $option/$task
		} else if (!(isset($url_array[$pos+2]) && $url_array[$pos+2]!="") && (isset($url_array[$pos+1]) && $url_array[$pos+1]!="")) {
			$task = $url_array[$pos+1];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$QUERY_STRING = "option=com_content&task=$task";
		}

		if ($lang!="") {
			$QUERY_STRING .= "&lang=$lang";
		}

		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0]."index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	}

	/*
	Components
	http://www.domain.com/component/$name,$value
	*/
	if (in_array("component", $url_array)) {

		$uri = explode("component/", $_SERVER['REQUEST_URI']);
		$uri_array = explode("/", $uri[1]);
		$QUERY_STRING = "";

		foreach($uri_array as $value) {
			$temp = explode(",", $value);
			if (isset($temp[0]) && $temp[0]!="" && isset($temp[1]) && $temp[1]!="") {
				$_GET[$temp[0]] = $temp[1];
				$_REQUEST[$temp[0]] = $temp[1];
				$QUERY_STRING .= $temp[0]=="option" ? "$temp[0]=$temp[1]" : "&$temp[0]=$temp[1]";
			}
		}

		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0]."index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	}
	// Extract to globals
	while(list($key,$value)=each($_GET)) $GLOBALS[$key]=$value;
	// Don't allow config vars to be passed as global
}

function decodeurls_tim() {

	$url_array = explode("/", $_SERVER['REQUEST_URI']);

	if (in_array("view", $url_array)) {

		$uri = explode("view/", $_SERVER['REQUEST_URI']);
		$option = "com_content";
		$_GET['option'] = $option;
		$_REQUEST['option'] = $option;
		$pos = array_search ("view", $url_array);
		//view/$hoofdmenuitem/$menuitem,$titel,$titelalias/$limit/$limitstart
		if (isset($url_array[$pos+4]) && $url_array[$pos+4]!="") {
			$task = "view";

			$data = getId($url_array[$pos+1], $url_array[$pos+2], 'view');

			$id = $data['id'];
			$Itemid = $data['Itemid'];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
		} else if (isset($url_array[$pos+3]) && $url_array[$pos+3]!="") {
			//view/$hoofdmenuitem/$menuitem,$titel,$titelalias/$limit
			$task = "view";

			$data = getId($url_array[$pos+1], $url_array[$pos+2], 'view');

			$id = $data['id'];
			$Itemid = $data['Itemid'];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid&limit=$limit";
		} else if (isset($url_array[$pos+2]) && $url_array[$pos+2]!="") {
			//view/$hoofdmenuitem/$menuitem,$titel,$titelalias
			$task = "view";

			$data = getId($url_array[$pos+1], $url_array[$pos+2], 'view');

			$id = $data['id'];
			$Itemid = $data['Itemid'];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid";
		}

		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0]."index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	}



	//index.php/blogcategorie/hoofdmenuitem/categorietitel,categorietitelalias

	if (in_array("blogcategory", $url_array)) {

		$uri = explode("blogcategory/", $_SERVER['REQUEST_URI']);
		$option = "com_content";
		$_GET['option'] = $option;
		$_REQUEST['option'] = $option;
		$pos = array_search ("blogcategory", $url_array);
		//blogcategorie/$hoofdmenuitem/$menuitem/$limit/$limitstart
		if (isset($url_array[$pos+4]) && $url_array[$pos+4]!="") {
			$task = "blogcategory";

			$data = getId($url_array[$pos+1], $url_array[$pos+2], 'blogcategory');

			$id = $data['id'];
			$Itemid = $data['Itemid'];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
		} else if (isset($url_array[$pos+3]) && $url_array[$pos+3]!="") {
			//blogcategorie/$hoofdmenuitem/$menuitem/$limit/$limitstart
			$task = "blogcategory";

			$data = getId($url_array[$pos+1], $url_array[$pos+2], 'blogcategory');

			$id = $data['id'];
			$Itemid = $data['Itemid'];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid&limit=$limit";
		} else if (isset($url_array[$pos+2]) && $url_array[$pos+2]!="") {
			//blogcategorie/$hoofdmenuitem/$menuitem/$limit/$limitstart
			$task = "blogcategory";

			$data = getId($url_array[$pos+1], $url_array[$pos+2], 'blogcategory');

			$id = $data['id'];
			$Itemid = $data['Itemid'];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid";
		}

		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0]."index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	}


	/**
	* Content
	* http://www.domain.com/$option/$task/$sectionid/$id/$Itemid/$limit/$limitstart
	*/
	if (in_array("content", $url_array)) {

		$uri = explode("content/", $_SERVER['REQUEST_URI']);
		$option = "com_content";
		$_GET['option'] = $option;
		$_REQUEST['option'] = $option;
		$pos = array_search ("content", $url_array);

		// $option/$task/$sectionid/$id/$Itemid/$limit/$limitstart
		if (isset($url_array[$pos+6]) && $url_array[$pos+6]!="") {
			$task = $url_array[$pos+1];
			$sectionid = $url_array[$pos+2];
			$id = $url_array[$pos+3];
			$Itemid = $url_array[$pos+4];
			$limit = $url_array[$pos+5];
			$limitstart = $url_array[$pos+6];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&task=$task&sectionid=$sectionid&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
			// $option/$task/$id/$Itemid/$limit/$limitstart
		} else if (isset($url_array[$pos+5]) && $url_array[$pos+5]!="") {
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$Itemid = $url_array[$pos+3];
			$limit = $url_array[$pos+4];
			$limitstart = $url_array[$pos+5];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$_GET['limit'] = $limit;
			$_REQUEST['limit'] = $limit;
			$_GET['limitstart'] = $limitstart;
			$_REQUEST['limitstart'] = $limitstart;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid&limit=$limit&limitstart=$limitstart";
			// $option/$task/$sectionid/$id/$Itemid
		} else if (!(isset($url_array[$pos+5]) && $url_array[$pos+5]!="") && isset($url_array[$pos+4]) && $url_array[$pos+4]!="") {
			$task = $url_array[$pos+1];
			$sectionid = $url_array[$pos+2];
			$id = $url_array[$pos+3];
			$Itemid = $url_array[$pos+4];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['sectionid'] = $sectionid;
			$_REQUEST['sectionid'] = $sectionid;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&task=$task&sectionid=$sectionid&id=$id&Itemid=$Itemid";
			// $option/$task/$id/$Itemid
		} else if (!(isset($url_array[$pos+4]) && $url_array[$pos+4]!="") && (isset($url_array[$pos+3]) && $url_array[$pos+3]!="")) {
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$Itemid = $url_array[$pos+3];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$_GET['Itemid'] = $Itemid;
			$_REQUEST['Itemid'] = $Itemid;
			$QUERY_STRING = "option=com_content&task=$task&id=$id&Itemid=$Itemid";
			// $option/$task/$id
		} else if (!(isset($url_array[$pos+3]) && $url_array[$pos+3]!="") && (isset($url_array[$pos+2]) && $url_array[$pos+2]!="")) {
			$task = $url_array[$pos+1];
			$id = $url_array[$pos+2];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$_GET['id'] = $id;
			$_REQUEST['id'] = $id;
			$QUERY_STRING = "option=com_content&task=$task&id=$id";
			// $option/$task
		} else if (!(isset($url_array[$pos+2]) && $url_array[$pos+2]!="") && (isset($url_array[$pos+1]) && $url_array[$pos+1]!="")) {
			$task = $url_array[$pos+1];
			$_GET['task'] = $task;
			$_REQUEST['task'] = $task;
			$QUERY_STRING = "option=com_content&task=$task";
		}
		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0]."index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	}

	/*
	Components
	http://www.domain.com/component/$name,$value
	*/
	if (in_array("component", $url_array)) {

		$uri = explode("component/", $_SERVER['REQUEST_URI']);
		$uri_array = explode("/", $uri[1]);
		$QUERY_STRING = "";

		foreach($uri_array as $value) {
			$temp = explode(",", $value);
			if (isset($temp[0]) && $temp[0]!="" && isset($temp[1]) && $temp[1]!="") {
				$_GET[$temp[0]] = $temp[1];
				$_REQUEST[$temp[0]] = $temp[1];
				$QUERY_STRING .= $temp[0]=="option" ? "$temp[0]=$temp[1]" : "&$temp[0]=$temp[1]";
			}
		}

		$_SERVER['QUERY_STRING'] = $QUERY_STRING;
		$REQUEST_URI = $uri[0]."index.php?".$QUERY_STRING;
		$_SERVER['REQUEST_URI'] = $REQUEST_URI;
	}

	//echo "|" . $QUERY_STRING . "|";
	//var_dump($_SERVER['REQUEST_URI']);

}




//Nog nodig voor dingen

function getId($hoofdmenuitem, $titel_alias, $task){
  global $database;
  if($task == 'view'){
    //index.php/view/hoofdmenuitem/menuname,titel,titelalias
    $hoofdmenuitem = str_replace("-", " ", $hoofdmenuitem);
    $titel = explode(",", $titel_alias);

    $titel[0] = str_replace("-", " ", $titel[0]);
    $titel[1] = str_replace("-", " ", $titel[1]);
    $titel[2] = str_replace("-", " ", $titel[2]);

    $query = "SELECT id FROM #__menu WHERE name = '" . $hoofdmenuitem . "'";
    $database->setQuery($query);
    $database->loadObject($parent);

    $query = "SELECT id FROM #__menu WHERE name = '" . $titel[0] . "' AND parent = ". intval($parent->id);
    $database->setQuery($query);
    $database->loadObject($menu);
    if($menu->id == 0){
      $menu->id = $parent->id;
    }

    $query = "SELECT id FROM #__content WHERE title = '" . $titel[1] . "' AND title_alias = '" . $titel[2] . "'";
    $database->setQuery($query);
    $database->loadObject($content);
  }
  else if($task == "blogcategory"){
    //index.php/blogcategory/hoofdmenuitem/categorietitel
    $hoofdmenuitem = str_replace("-", " ", $hoofdmenuitem);
    $titel = explode(",", $titel_alias);

    $titel[0] = str_replace("-", " ", $titel[0]);
    $titel[1] = str_replace("-", " ", $titel[1]);
    $titel[2] = str_replace("-", " ", $titel[2]);

    $query = "SELECT id FROM #__menu WHERE name = '" . $hoofdmenuitem . "'";
    $database->setQuery($query);
    $database->loadObject($parent);

    $query = "SELECT id FROM #__menu WHERE name = '" . $titel[0] . "' AND parent = ". intval($parent->id);
    $database->setQuery($query);
    $database->loadObject($menu);
    if($menu->id == 0){
      $menu->id = $parent->id;
    }

    $query = "SELECT id FROM #__categories WHERE title = '" . $titel[1] . "'";
    $database->setQuery($query);
    $database->loadObject($content);
  }

  return array('id' => $content->id, 'Itemid' => $menu->id);
}
?>