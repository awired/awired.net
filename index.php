<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
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

# Chemin vers la racine de l'application (si vous changer le fichier de place)
$app_path = '/';

# Si par exemple vous mettez blog.php à la racine de votre site et que DotClear
# se trouve dans /dotclear vous pouvez décommenter cette ligne :
//$app_path = '/dotclear/';

# NE RIEN CHANGER APRES CETTE LIGNE

$blog_file_path = __FILE__;
$blog_dc_path = dirname(__FILE__).$app_path;

require $blog_dc_path.'/layout/prepend.php';

# En-têtes et prologue
# Envoie des en-tête HTTP
$accept_xml =
	!empty($_SERVER['HTTP_ACCEPT']) &&
	strpos($_SERVER['HTTP_ACCEPT'],'application/xhtml+xml') !== false;

if (dc_send_real_xml && $accept_xml) {
	header('Content-Type: application/xhtml+xml');
} else {
	header('Content-Type: text/html; charset='.dc_encoding);
}

if ($accept_xml) {
	echo '<?xml version="1.0" encoding="'.dc_encoding.'"?>'."\n";
}

# Affichage de la page
//if (function_exists('ob_start')) {
//	ob_start();
//}

//if (defined('DC_CACHE_CONTENT')) {
//	echo DC_CACHE_CONTENT;
//} else {
	include $dc_template_file;
//}

require $blog_dc_path.'/layout/append.php';

//if (function_exists('ob_start')) {
//	$p_content = ob_get_contents();
//	ob_end_clean();
//	
//	echo $p_content;
//	
//	if (defined('DC_CACHE_FILE')) {
//		cache::writeFile(DC_CACHE_FILE,$p_content);
//	}
//}
?>