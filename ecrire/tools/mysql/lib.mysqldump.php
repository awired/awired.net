<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
# Copyright (c) 2004-2005 Olivier Meunier and contributors. All rights
# reserved.
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****
/**
 * @class dbdump
 *
 */
class dbdump {
	/**
	@function _getDCTablesList

	Création d'un tableau contenant la listes des tables DC à sauvegarder.
	Les tables 'log' et 'session' sont ignorées et les éventuelles tables
	de plugins ajoutées, si elles sont correctement préfixées.

	@return	array
	*/
	function _getDCTablesList()
	{
		global $con;

		// D'emblée, on précise les tables "natives" dans l'ordre d'importance
		// pour sécuriser au mieux la remontée.
		// NB : on ignore les tables 'log' et 'session'
		$dc_dump_tables =
			array(
				DB_PREFIX.'user',
				DB_PREFIX.'categorie',
				DB_PREFIX.'post',
				DB_PREFIX.'comment',
				DB_PREFIX.'ping',
				DB_PREFIX.'link'
			);

		// Récupération auprès de MySQL de la liste des tables préfixées
		// pour le DC courant
		$dc_tables = $con->select("SHOW TABLES LIKE '".DB_PREFIX."%'");

		// Maintenant on consolide le tout...
		while ($dc_tables->fetch()) {
			$dc_table = $dc_tables->f(0);

			// S'il s'agit de la table 'log' ou 'session', on écarte...
			if ($dc_table == DB_PREFIX.'log' ||
				$dc_table == DB_PREFIX.'session') {
				continue;
			}

			// On n'ajoute que les tables supplémentaires susceptibles
			// d'alimenter des plugins.
			if (in_array($dc_table, $dc_dump_tables)) {
				continue;
			} else {
				$dc_dump_tables[] = $dc_table;
			}
		}

		return($dc_dump_tables);
	}


	/**
	 @function getDump

	 Effectue un dump des tables DotClear sous forme d'un fichier SQL standard.

	 L'export se compose pour chacune des tables :
	    - d'une instruction conditionnelle DROP TABLE
	    - de la clause complète CREATE TABLE (clés comprises)
	    - des clauses INSERT nécessaires à la restauration des données.

	 NB : Les noms des colonnes sont "backquotés".

	 @return string La chaine représentant le dump.
	 */
	function getDump()
	{
		global $con;

		$dc_tables = dbdump::_getDCTablesList();

		// On précise à MySQL qu'il doit "quoter" les résultats des
		// requêtes SHOW CREATE TABLE qui vont suivre.
		$con->execute("SET SQL_QUOTE_SHOW_CREATE = 1");

		// Récupération de la version du serveur MySQL
		$rs = $con->select("SELECT REPLACE(VERSION(),'-log','')");
		$mysql_version = 'unknown';
		if ($rs) $mysql_version = $rs->f(0);

		// Une entête pour mettre quelques infos (in)utiles
		$dump_str =
			"#-------------------------------------------------------------------\n".
			"# Dump MySQL\n".
			"#\n".
			"# Blog     : ". dc_blog_name ."\n".
			"# DotClear : ". DC_VERSION ."\n".
			"# Serveur  : ". DB_HOST ." (MySQL v ". $mysql_version .")\n".
			"# Base     : ". DB_DBASE ."\n".
			"# Date     : ". date("d/m/Y H:i") ."\n".
			"#-------------------------------------------------------------------\n".
			"\n";

		// C'est parti !
		foreach ($dc_tables as $dc_table) {
			$rs = $con->select("SHOW CREATE TABLE $dc_table");
			while($rs->fetch()) {

				// Dump de la clause CREATE TABLE
				$dump_str .=
					"#-------------------------------------------------------------------\n".
					"# Structure de la table $dc_table\n".
					"#-------------------------------------------------------------------\n".
					"DROP TABLE IF EXISTS `$dc_table`;\n".
					str_replace("\n","",$rs->f(1)).";".
					"\n\n";

				// Dump des clauses INSERT
				$dump_str .=
					"#-------------------------------------------------------------------\n".
					"# Données de la table $dc_table\n".
					"#-------------------------------------------------------------------\n";
				$col_rs = $con->select("SELECT * FROM $dc_table");
				while($col_rs->fetch()) {
					$values = array();
					for ($i = 0; $i < $col_rs->int_col_count; $i++) {
						$values[] = $con->escapeStr($col_rs->f($i));
					}
					$dump_str .= "INSERT INTO `$dc_table` VALUES ( '". implode("', '",$values) ."' );\n";
				}
				$dump_str .= "\n";
			}
		}
		$dump_str .= "#-- EOF --\n";

		return($dump_str);
	}


	/**
	 @function saveDump

	 Enregistre un fichier de dump des tables DotClear.
	 Avec les paramètres par défaut, un fichier gzippé dump-YYYYMMDD.sql.gz est
	 créé dans le répertoire share/mysql/ de l'installation DotClear.

	 @param	boolean	transmit	indicateur d'envoi du fichier de dump (false)
	 @param string	path		le chemin d'enregistrement ('')
	 @param string	name		le nom du fichier cible ('')
	 @param boolean	compressed	indicateur de compression ou non (true)

	 @return mixed Retourne une chaine représentant le nom du fichier dans lequel
	               le dump a été sauvegardé. Retourne un boolean à false en cas
	               de problème sinon.

	 @see dbdump::getDump
	 */
	function saveDump($transmit = false, $path = '', $name = '', $compressed = true)
	{
		if ($compressed && !function_exists('gzencode')) {
			return(false);
		}
		if (!empty($path) && is_dir($path) && is_writable($path)) {
			$trg_path = $path;
		} else {
			$trg_path = DC_SHARE_DIR.'/mysql';
		}
		if (!empty($name)) {
			$trg_name = $name;
		} else {
			$trg_name = 'dbdump-'.date("Ymd").'.sql';
		}
		$dump = dbdump::getDump();
		if ($compressed) {
			$dump = gzencode($dump);
			$trg_name .= '.gz';
		}
		if ($transmit) {
			header('Content-Type: application/x-gzip');
			header('Content-Disposition: attachment; filename='.$trg_name);
			echo $dump;
			exit;
		} else {
			$trg_fullname = $trg_path.'/'.$trg_name;
			if ($fh = fopen($trg_fullname,"wb")) {
				fwrite($fh, $dump);
				fclose($fh);
			} else {
				return(false);
			}
			return($trg_name);
		}
	}


	/**
	 @function restoreDump

	 Restaure des tables DotClear depuis un fichier de dump précédemment créé
	 par l'opération de sauvegarde.

	 @param string	src_file	le chemin du fichier de dump à restaurer
	 @param boolean	compressed	indicateur de compression ou non (true)

	 @return mixed Retourne une chaine indiquant que l'opération s'est correctement
	               déroulée. Retourne un boolean à false en cas de problème sinon.

	 @see dbdump::saveDump
	 */
	function restoreDump($src_file, $compressed = true)
	{
		global $con;

		// Pour un fichier compressé, on crée un version décompressée
		// temporaire dans le répertoire share/mysql/
		$chrono_start = dbdump::_getChrono();
		if ($compressed) {
			if (!$fh = fopen($src_file, "rb")) {
				return(false);
			}
			$tmp_dump = fread($fh, filesize($src_file));
			fclose($fh);
  			if (!$dump = gzinflate(substr($tmp_dump, 10))) {
  				return(false);
  			}
  			unset($tmp_dump);
  			$tmp_file = DC_SHARE_DIR.'/mysql/_'.basename($src_file);
			if (!$fh = fopen($tmp_file, "wb")) {
				return(false);
			}
			fwrite($fh, $dump);
			fclose($fh);
			unlink($src_file);
			unset($dump);
			$src_file = $tmp_file;
 		}

		// Parsing "simpliste" du fichier dump pour la remontée en base.
		// Seules les requêtes DROP TABLE, CREATE TABLE et INSERT seront
		// traitées.
		$scan = file($src_file);
		$token = $sql = '';
		foreach ($scan as $line) {
			$line = rtrim($line);
			if (empty($line) || strpos(ltrim($line), "#") === 0) continue;
			$token .= $line;
			if (preg_match("/^((DROP|CREATE) TABLE .*);$/", $token, $matches) ||
				preg_match("/^(INSERT INTO (.*)'\s\));$/", $token, $matches)) {
				$sql = $matches[1];
				if (!empty($sql)) {
					$res = $con->execute($sql);
					if ($res === false) {
						unlink($src_file);
						return(false);
					}
				}
				$token = $sql = '';
			}
		}

		unlink($src_file);
		$chrono_end = dbdump::_getChrono();
		buffer::str(sprintf("(%.2f sec.)",$chrono_end - $chrono_start));
		return(__('Dump has been restored'));
	}


	/**
	@function _getChrono

	@return	float
	*/
	function _getChrono()
	{
	   list($usec, $sec) = explode(" ", microtime());
	   return ((float)$usec + (float)$sec);
	}
}
?>