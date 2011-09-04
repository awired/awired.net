<?php
$title[] = 'banners';
$title[] = '/';
$title[] = $task . $bid . $sefconfig->suffix;

if (count($title) > 0) $string = sef_404::sefGetLocation($string, $title,@$this_task);
if ($debug) { $GLOBALS['404SEF_DEBUG']['CLASS_SEF_404'][$debug_string]['STRING'] = $string; }
?>