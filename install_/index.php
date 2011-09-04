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

define('NOT_CHECK_CONFIG',true);

require dirname(__FILE__).'/prepend.php';

$installed = file_exists(dirname(__FILE__).'/../conf/config.php');

if (!$installed) {
	$ses->reg('step',2);
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('Welcome on DotClear installation').'</h2>';

echo '<p>'.__('You are about to install DotClear. Please choose your language and encoding.').'</p>';

# On tente de déterminer la première langue
$dlang = '';
if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
	$acclang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	$L = explode(';', $acclang[0]);
	$dlang = substr(trim($L[0]),0,2);
}

if(!$installed)
{
	echo
	'<form action="check.php" method="post">'.
	'<p class="field"><label class="float" for="lang">'.__('Language').' :</label> '.
	form::combo('lang',l10n::getISOcodes(1),$dlang).'</p>'.
	'<p class="field"><label class="float" for="encoding">'.__('Encoding').' :</label> '.
	form::combo('encoding',array('ISO-8859-1'=>'ISO-8859-1','UTF-8'=>'UTF-8'),'UTF-8').'</p>'.
	'</p>'.
	'<p><input type="submit" class="submit" value="'.__('Go').' &#187;" /></p>'.
	'</form>';
}
else
{
	echo
	'<p class="important">'.__('DotClear is still installed.').'</p>';
}

echo
'<p>'.__('Note: You must accept session cookies to use this installer.').'</p>';
?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
