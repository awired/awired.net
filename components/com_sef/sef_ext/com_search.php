<?php
if (! (isset($task) ? @$task : null)) {
	$title[] = getMenuTitle($option, (isset($task) ? @$task : null));
	if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title);
}
?>