<?php
if ((empty($this_task)) && (@$task == "view")) {
	$query = 'SELECT title FROM #__weblinks WHERE id = "'.$id.'"';
	$database->setQuery($query);
	$rows = $database->loadObjectList( );
	if ($debug){$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string][$option] = $rows;}
	if ($database->getErrorNum()) {
		die( $database->stderr());
	}elseif( @count( $rows ) > 0 ){
		if( !empty( $rows[0]->title ) ){
			$this_task =  titleToLocation($rows[0]->title);
		}
	}
}
$title = array();
$title[] = getMenuTitle($option, @$this_task);
$title[] = '/';
$arg2 = array();
$arg2[] = sef_404::getcategories($catid);
$title = array_merge($title, $arg2);

if ($task == 'new') {
	$title[] = 'new' . $sefconfig->suffix;
}

//$this_task wordt hier meegenomen, maar ik snap niet hoe het werkt
//Even aan Adam vragen
//Title zijn de menuitem, categorie, enz...
//String = url
if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title,@$this_task);
if ($debug) { $GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['STRING'] = $string; }
?>