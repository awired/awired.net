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
define('DC_START_SESSION',1);

require_once dirname(__FILE__).'/../../inc/prepend.php';

if (dc_encoding == 'UTF-8') {
	l10n::set(dirname(__FILE__).'/../../l10n/'.DC_LANG.'-utf8/main');
	l10n::set(dirname(__FILE__).'/../../l10n/'.DC_LANG.'-utf8/date');
	l10n::set(dirname(__FILE__).'/../../l10n/'.DC_LANG.'-utf8/messages');
} else {
	l10n::set(dirname(__FILE__).'/../../l10n/'.DC_LANG.'/main');
	l10n::set(dirname(__FILE__).'/../../l10n/'.DC_LANG.'/date');
	l10n::set(dirname(__FILE__).'/../../l10n/'.DC_LANG.'/messages');
}

require_once dirname(__FILE__).'/../../inc/classes/class.menu.php';
require_once dirname(__FILE__).'/../../inc/classes/class.auth.php';

$auth = new auth($con,'auth.php');

require_once dirname(__FILE__).'/model.inc.php';

# Création des menu
$myMenu = new menu('menu');
$mySubMenu = new menu('submenu',' ',' | ');

?>
