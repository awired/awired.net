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

# Utilisateur MySQL
define('DB_USER','awired');

# Mot de passe MySQL
define('DB_PASS','trustno1');

# Nom de machine MySQL (généralement localhost)
define('DB_HOST','localhost');

# Nom de la base de données
define('DB_DBASE','awired');

# Préfixe à ajouter devant le nom de chaque table
define('DB_PREFIX','dc_');

# If your web hosting does not provide a valid DOCUMENT_ROOT you may
# overide it here. DOCUMENT_ROOT will be relative of this file's path.
# Current line is ok if you put dotclear in a folder in DOCUMENT_ROOT
#
#$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__).'/../../../';

# You may have to overide HTTP_HOST too, do it here
#
#$_SERVER['HTTP_HOST'] = myhost.tld;


/* --------------------------------------------------------
        Do not change anything below this line          
          Ne rien changer après cette ligne
-------------------------------------------------------- */











if (!defined('CONF_ONLY')) {
	require_once dirname(__FILE__).'/../inc/post_config.php';
}
?>
