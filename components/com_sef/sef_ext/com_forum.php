<?php
//	var_dump($string);
//	var_dump($title);

/**
* Toevoegen:
* * viewforum en viewtopic weghalen?
* * support voor: index.php?option=com_forum&Itemid=26&c=1
**/

extract($vars);
$categorytitle = true;
$forumtitle = true;
$topictitle = true;

//Er zou geen sessieid meer in mogen voorkomen
if (strstr($string, 'sid=')) {
	die('Sessionid excists in the url, that should not be!');
}

global $table_prefix;
if ($forumtitle == true || $topictitle == true || $categorytitle == true) {
	if (file_exists($GLOBALS['mosConfig_absolute_path'] . '/components/com_forum/config.php')) {
		require_once $GLOBALS['mosConfig_absolute_path'] . '/components/com_forum/config.php';
	}
	global $table_prefix;
	if ($categorytitle == true && !empty($c)) {
		$query = "
		SELECT `cat_title`
		FROM `".$table_prefix . categories."`
		WHERE `cat_id` = '$c'
		";
		$database->setQuery($query);
		$c = $database->loadResult();
	}
	elseif ($forumtitle == true && !empty($f)) {
		$query = "
		SELECT `forum_name`
		FROM `".$table_prefix . forums."`
		WHERE `forum_id` = '$f'
		";
		$database->setQuery($query);
		$f = $database->loadResult();
	}
	elseif ($topictitle == true && !empty($t)) {
		$query = "
		SELECT `topic_title`
		FROM `".$table_prefix . topics."`
		WHERE `topic_id` = '$t'
		";
		$database->setQuery($query);
		$t = $database->loadResult();
	}
}

//Eerste subdir
if (!empty($option)) {
	$title[] = getMenuTitle($option, @$this_task);
	$title[] = '/';
	unset($vars['option']);
	if (empty($title)) {
		$comp_name = str_replace('com_', '', $option);
		$title = $comp_name;
	}
}

//Ik unset alle variabelen zodat ik later makkelijk op kan vragen welke nog niet
//gebruikt zijn
//De page
if (!empty($page)) {
	$title[] = $page;
	$title[] = '/';
	unset($vars['page']);
}

//De mode
if (!empty($mode)) {
	$title[] = $mode;
	$title[] = '/';
	unset($vars['mode']);
}

//search
if (!empty($search_id)) {
	$title[] = $search_id;
	$title[] = '/';
	unset($vars['search_id']);
}

//Categorie
if (!empty($c)) {
	$title[] = $c;
	unset($vars['c']);
}

//User
if (!empty($u)) {
	$title[] = $u . $sefconfig->suffix;
	unset($vars['u']);
}

//Forum
if (!empty($f)) {
	$title[] = $f;
	unset($vars['f']);
}

//Topic
if (!empty($t)) {
	$title[] = $t . $sefconfig->suffix;
	unset($vars['t']);
}

//Mark
if (!empty($mark)) {
	$title[] = 'mark';
	$title[] = '/';
	$title[] = $mark . $sefconfig->suffix;
	unset($vars['mark']);
}

//if (!empty($f)) {
//	var_dump($title);
//	die;
//}

if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title, null, (isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null));

?>