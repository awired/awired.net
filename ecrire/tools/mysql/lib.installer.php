<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is a contributed part of DotClear.
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
if (!class_exists('installer')) {
	/**
	@class installer
	*/
	class installer {
		/**
		@function checkPluginShareDir

		 Vérifie l'existence d'un sous répertoire portant le nom du plugin
		 dans le dossier share/
		 Ce sous dossier sera utilisé pour stocker les éventuelles informations
		 de configuration ou autres fichiers relatifs au plugin nommé.

		 Si le dossier n'existe pas, cette méthode essaiera de le créer et
		 d'y placer un fichier .htaccess

		 La fonction renvoie TRUE en cas de réussite (dossier existant ou
		 créé avec succès), FALSE sinon.

		 @param string	dirname	Le nom du sous dossier recherché
		 @param boolean	protect	Flag pour protéger ou non l'accès par HTTP
		 						à ce répertoire

		 @return	boolean
		 */
		function checkPluginShareDir($dirname,$protect = true)
		{
			$my_share_dir = DC_SHARE_DIR.'/'.$dirname;
			$failed = false;

			if (!is_dir($my_share_dir)) {
				$failed = true;

				// Si PHP en safe_mode, on laisse l'utilisateur créer
				// manuellement le sous répertoire dans share/
				if (ini_get('safe_mode') != false) return($failed);

				if (is_writeable(DC_SHARE_DIR)) {
					@umask(000);
					if (@mkdir($my_share_dir, 0777)) {
						$failed = false;

						// Creation d'un .htaccess dans le répertoire
						if ($fh = @fopen($my_share_dir.'/.htaccess', "wb")) {
							$deny_str = $protect?'':'#';
							$deny_str .= "Deny from all\n";
							fwrite($fh,
								"# Comment/uncomment the lines below depending of your needs\n".
								"# To deny any access to this directory\n".
								$deny_str
								);
							fclose($fh);
						}
					}
				}

			}
			return($failed);
		}


		/**
		 @function loadPluginConfig

		 Lit le fichier de configuration (.ini) d'un plugin.

		 Si le fichier existe, cette méthode utilise un appel à la méthode
		 de classe iniFile::read() pour en lire le contenu et renvoyer la
		 configuration sous forme d'un tableau associatif (en cas de succès)
		 ou FALSE (en cas d'échec).

		 Si le fichier n'existe pas, FALSE est retourné.

		 (Cf. inc/classes/class.ini.file.php)

		 @param	string	plugin_name Le nom du plugin dont la configuration
		 				est souhaitée

		 @return	mixed
		 */
		function loadPluginConfig($plugin_name)
		{
			$cfg_file = DC_SHARE_DIR.'/'.$plugin_name.'/'.$plugin_name.'.ini';

			if (@file_exists($cfg_file)) {
				return(iniFile::read($cfg_file, true));
			} else {
				return(false);
			}
		}


		/**
		 @function savePluginConfig

		 Enregistre la configuration d'un plugin dans un fichier .ini associé.

		 @param	string	plugin_name	Le nom du plugin concerné
		 @param	array	plugin_cfg	Les informations de configuration du
		 							plugin sous la forme d'un tableau associatif.

		 @return	boolean
		 */
		function savePluginConfig($plugin_name, $plugin_cfg)
		{
			$cfg_file = DC_SHARE_DIR.'/'.$plugin_name.'/'.$plugin_name.'.ini';
			if (!@file_exists($cfg_file)) {
				@umask(000);
				if (@touch($cfg_file)) {
					@chmod($cfg_file, 0664);
				}
			}

			$ini_file = new iniFile($cfg_file);

			if (!empty($plugin_cfg) && is_array($plugin_cfg)) {
				foreach ($plugin_cfg as $key => $value) {
					$ini_file->editVar($key, $value);
				}
				$ini_file->saveFile();
				if ($ini_file->file && defined('DC_UPDATE_FILE_W') && DC_UPDATE_FILE_W) {
						files::touch(DC_UPDATE_FILE,time());
				}
			}
			return($ini_file->file);
		}
	}
}
?>