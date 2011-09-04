<?php
if (empty($cat_table)) $cat_table = "#__categories";
if ((empty($this_task)) && (@$task == "view")) {
	$database->setQuery('SELECT name FROM #__newsfeeds WHERE id = "'.$feedid.'"' );
	$rows = $database->loadObjectList( );
	if ($debug){$GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string][$option] = $rows;}
	if ($database->getErrorNum()) {
		die( $database->stderr());
	}elseif( @count( $rows ) > 0 ){
		if( !empty( $rows[0]->name ) ){
			$this_task =  titleToLocation($rows[0]->name);
		}
	}
}
$title[] = getMenuTitle($option, @$this_task);
$title[] = sef_404::getcategories($catid);
$title[] = '/';

if ($task == 'new') {
	$title[] = 'new' . $sefconfig->suffix;
}

//$this_task wordt hier meegenomen, maar ik snap niet hoe het werkt
//Even aan Adam vragen
//Title zijn de menuitem, categorie, enz...
//String = url
//var_dump($title);
if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title,@$this_task);
if ($debug) { $GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['STRING'] = $string; }
?>