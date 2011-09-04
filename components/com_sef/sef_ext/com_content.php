<?php
//Limitstart, limit nog toevoegen

switch ($task) {
	case 'archivecategory':
	case 'archivesection' :
		if (eregi($task.".*id=".$id,$_SERVER['REQUEST_URI']))
		break;
	case 'new' :
	/*
	$title[] = getMenuTitle($option,$task,$Itemid, $string);
	$title[] = 'new' . $sefconfig->suffix;
	*/
	break;
	default:
		//$title = array_merge($title, sef_404::getContentTitles($task,$id));
		$title = sef_404::getContentTitles($task,$id);
		if (count($title) === 0) $title[] = getMenuTitle($option,$task,$Itemid);
//		if ((@$task == "view") && isset($sefconfig->suffix)) {
//			// throw the suffix on the last item
//			if ($sefconfig->suffix == "/") {
//				$title[] = "/";
//			}else{
//				$title[count($title)-1] .= $title[count($title)-1].$sefconfig->suffix;
//			}
//		}
			if ((@$task == "view") && isset($sefconfig->suffix)) {
				$title[count($title)-1] .= $sefconfig->suffix;
			}
			else {
				$title[] = '/';
			}
	}
	if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title, null, (isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null));
?>