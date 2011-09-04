<?
//debut session php4
session_start($PHPSESSID) ;

//permet de déctecter le repertoir racine !
if(empty($dir))
{
	$i = 1;
	$dir_int = 3;
	$dir = "";
	$dir_count = count(explode ( "/", $PHP_SELF))-$dir_int	;
	if($dir_count != 0)
	{
		do{ 
			$dir .="../"; 
			$i++;
		}while($i <= $dir_count);
	}	
}
	
//index des function PHP
$url2func1 = $dir."admin/script/func.php"; 
$fopen_func1 = @fopen( $url2func1, "r");

//repertoire des fichier func
$url2func2 = $dir."admin/fichiers/config.inc.php"; 
$fopen_func2 = @fopen( $url2func2, "r");

$df = round(disk_free_space("/")/(1024*1024),2)."mo";

//include
if(!$fopen_func1 || !$fopen_func2)
{
	echo "<b>Erreur System</b><br>";
	echo "Index de function PHP4 introuvable.";
	exit;
}

//include
include_once ($url2func1);
include_once ($url2func2);

if( !@mysql_select_db( $mysql_base ) ) //verification de la connection
{
	echo "<b>Erreur System</b><br>";
	echo "Erreur connexion mysql !";
	exit;
}

//getion de la langue
if(isset($cl))
{
	session_unregister( "lang" ) ;
	$lang = $cl;
	session_register( "lang" ) ;
	header("Location: $HTTP_REFERER");
}

?>