<?php

function key2txt($key, $lang, $default_lang)
{
	$sql = "SELECT txt_texte FROM tbl_site_txt WHERE txt_key = '$key' AND txt_lang = '$lang'" ;
	$resultat = mysql_query( $sql );
	$result = mysql_fetch_array( $resultat ) ;
	$txt_texte = $result[txt_texte];
	
	if(strlen($txt_texte) < 1 AND $default_lang != $lang)
	{
		$sql = "SELECT txt_texte FROM tbl_site_txt WHERE txt_key = '$key' AND txt_lang = '$default_lang'" ;
		$resultat = mysql_query( $sql );
		$result = mysql_fetch_array( $resultat ) ;
		$txt_texte = $result[txt_texte];
	}
	
	if(strlen($txt_texte) < 1)
	{
		$sql = "SELECT langue_erreur FROM tbl_site_langue WHERE langue_reference = '$lang'" ;
		$resultat = mysql_query( $sql );
		$result = mysql_fetch_array( $resultat ) ;
		$txt_texte = $result[langue_erreur];
	}
	
	return $txt_texte;
}

?>