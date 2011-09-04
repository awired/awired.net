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

/*DEBUG_FLAG
define('DEBUG',1);
//*/

# If you rename "ecrire" folder, change this const
# You'll have to rename it in install/prepend.php too
#
if (!defined('DC_ECRIRE')) {
	define('DC_ECRIRE','ecrire');
}

if (defined('DEBUG') && DEBUG == 1) {
	@ini_set('display_errors','on');
	error_reporting(E_ALL);
}

if (!file_exists(dirname(__FILE__).'/../conf/config.php') ||
!file_exists(dirname(__FILE__).'/../conf/dotclear.ini')) {
	header('Content-Type: text/plain');
	echo 'Weblog not configured yet';
	exit;
}

require_once dirname(__FILE__).'/magic_strip.php';

require_once dirname(__FILE__).'/classes/class.mysql.php';
require_once dirname(__FILE__).'/classes/class.blog.php';
require_once dirname(__FILE__).'/classes/class.wiki2xhtml.php';
require_once dirname(__FILE__).'/classes/class.plugins.php';
require_once dirname(__FILE__).'/libs/lib.compat.php';
require_once dirname(__FILE__).'/libs/lib.form.php';
require_once dirname(__FILE__).'/libs/lib.util.php';
require_once dirname(__FILE__).'/libs/lib.files.php';
require_once dirname(__FILE__).'/libs/lib.date.php';

require dirname(__FILE__).'/../conf/config.php';
?>