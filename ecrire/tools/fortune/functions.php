<?php
# Plug-in Fortune pour Dotclear
# Copyright (C) 2004 Alexandre PASSANT <alex@passant.org>
# Realeased under GPL version 2 or later, see LICENSE file
# or <http://www.gnu.org/copyleft/gpl.html>

define('EXTENSION', '.dat');
define('PATH', dirname(__FILE__).'/var/');

class dcFortune {

	// Affichage d'une fortune sur le template
	function afficher() {
		include dirname(__FILE__).'/fortune.php';
		$fortune = new Fortune();
		echo '<cite>'.$fortune->quoteFromDir(PATH).'</cite>';
	}
	
	// Ajout d'un fichier de fortunes
	function addFortune($file) {
		ob_start();
		include dirname(__FILE__).'/fortune.php';
		ob_end_clean();
		$fortune_file = PATH.$file['name'];
		if(move_uploaded_file($file['tmp_name'], $fortune_file)) {
			$fortune = new Fortune();
			$fortune->createIndexFile($fortune_file);
			return true;
		}
		return false;
	}

	// Liste des fichiers fortunes 
	function getAllFortunes() {
		$fortunes = array();
		$handle = opendir(PATH);
		// On récupère uniquement les .dat
		while (false !== ($file = readdir($handle))) {
			if (substr($file,-4) == EXTENSION) {
				$fortunes[] = substr($file,0,-4);
			}
		}
		return $fortunes;
	}
	
	// Suppression d'un fichier fortunes
	function delFortune($fortune) {
		// Suppression du .dat et du fichier fortune
		return (@unlink(PATH.$fortune) && @unlink(PATH.$fortune.EXTENSION));
	}
	
}
?>
