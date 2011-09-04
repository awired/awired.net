<?

// debut variable

 	//mysql 
	$mysql_host = "localhost";
 	$mysql_user = "root";
 	$mysql_pass = "";
 	$mysql_base = "awired";
 	$mysql_link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);

	//autre variable
	$error_reporting = 1;
	$repertoire_int = 3;
	$default_lang = 1;
	
	//niveau d'erreur & execution default
	error_reporting($error_reporting);	
	if(empty($lang)){ $lang = $default_lang; }
	
// recup info en [champ]
	/*
	$sql = "" ;
	$resultat = mysql_query( $sql );
	$result = mysql_fetch_array( $resultat ) ;
	$test = $result[0];
	*/
	
	// recup info en [champ] + while !
	/*
	$sql = "";
	$result = mysql_query( $sql );
	while ($resultat = mysql_fetch_array($result)) 
	{
		echo $resultat[0];
	}
*/	
	
?>