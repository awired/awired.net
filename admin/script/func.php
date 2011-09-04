<?php
//error_reporting(0);

$dir_func = dir($dir."admin/script/functions/");
while($entry=$dir_func->read()) 
{   
	if($entry != ".." AND $entry != ".")
	{
		//echo $entry."<br>";
		include($dir."admin/script/functions/".$entry);
	}
}	
$dir_func->close();
				
?>