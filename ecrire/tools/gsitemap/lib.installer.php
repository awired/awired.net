<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of Gsitemap, a plugin for DotClear.
# Copyright (c) 2005 Pep and contributors. All rights
# reserved.
#
# DotClear.
# Copyright (c) 2004 Olivier Meunier and contributors. All rights
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
#
# Contributor : Beno�t Clerc ( http://zeubeubeu.net/blog/ )
#
if (!class_exists('installer')) {
	/**
	 @class installer

	 */
	class installer {
		/**
		@function checkPluginShareDir

		 V�rifie l'existence d'un sous r�pertoire portant le nom du plugin
		 dans le dossier share/
		 Ce sous dossier sera utilis� pour stocker les �ventuelles informations
		 de configuration ou autres fichiers relatifs au plugin nomm�.

		 Si le dossier n'existe pas, cette m�thode essaiera de le cr�er et
		 d'y placer un fichier .htaccess

		 La fonction renvoie TRUE en cas de r�ussite (dossier existant ou
		 cr�� avec succ�s), FALSE sinon.

		 @param string	dirname	Le nom du sous dossier recherch�
		 @param boolean	protect	Flag pour prot�ger ou non l'acc�s par HTTP
		 						� ce r�pertoire

		 @return	boolean
		 */
		function checkPluginShareDir($protect = true)
		{
			global $my_name;

			if (empty($my_name)) return false;

			$my_share_dir = DC_SHARE_DIR.'/'.$my_name;
			$failed = false;

			if (!is_dir($my_share_dir)) {
				$failed = true;

				if (is_writeable(DC_SHARE_DIR)) {
					@umask(000);
					if (@mkdir($my_share_dir, 0777)) {
						$failed = false;

						// Creation d'un .htaccess dans le r�pertoire
						if ($fh = @fopen($my_share_dir.'/.htaccess', "w")) {
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

		 Si le fichier existe, cette m�thode utilise un appel � la m�thode
		 de classe iniFile::read() pour en lire le contenu et renvoyer la
		 configuration sous forme d'un tableau associatif (en cas de succ�s)
		 ou FALSE (en cas d'�chec).

		 Si le fichier n'existe pas, FALSE est retourn�.

		 (Cf. inc/classes/class.ini.file.php)

		 @param	string	plugin_name Le nom du plugin dont la configuration
		 				est souhait�e

		 @return	mixed
		 */
		function loadPluginConfig($return = true)
		{
			global $my_name;

			if (empty($my_name)) return false;
			$cfg_file = DC_SHARE_DIR.'/'.$my_name.'/'.$my_name.'.ini';

			if (@file_exists($cfg_file)) {
				return(iniFile::read($cfg_file, $return));
			} else {
				return(false);
			}
		}

		/**
		 @function savePluginConfig

		 Enregistre la configuration d'un plugin dans un fichier .ini associ�.

		 @param	string	plugin_name	Le nom du plugin concern�
		 @param	array	plugin_cfg	Les informations de configuration du
		 							plugin sous la forme d'un tableau associatif.

		 @return	boolean
		 */
		function savePluginConfig($plugin_cfg)
		{
			global $my_name;

			if (empty($my_name)) return false;

			$cfg_file = DC_SHARE_DIR.'/'.$my_name.'/'.$my_name.'.ini';
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