<?php
function prix2oo($float)
{
	$test_oo = explode(".", $float);
	if(strlen($test_oo[1]) < 1){  $float =  $float.".00"; }
	if(strlen($test_oo[1]) == 1){  $float =  $float."0"; }
	
	return 	$float;
}

?>