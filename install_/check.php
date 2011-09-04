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

define('STEP',2);

require dirname(__FILE__).'/prepend.php';

$php_check = new checkList();

# Vérification de la version PHP
$php_check->addItem('php',version_compare(phpversion(),'4.1','>='),
sprintf(__('PHP version is %s.'),phpversion()),
sprintf(__('PHP version is %s. Version 4.1 or better is required.'),phpversion())
);

# Vérification de la présence des fonctions MySQL
$php_check->addItem('mysql',function_exists('mysql_connect'),
sprintf(__('%s module is present.'),'MySQL'),
sprintf(__('%s module is not present.'),'MySQL')
);

# Vérification de la présence du module XML
$php_check->addItem('xml',function_exists('xml_parser_create'),
sprintf(__('%s module is present.'),'XML'),
sprintf(__('%s module is not present.'),'XML')
);


$files_check = new checkList();

# Vérification des droits sur /conf
$files_check->addItem('conf',is_writable(dirname(__FILE__).'/../conf'),
sprintf(__('%s is writable.'),'conf/'),
sprintf(__('%s is not writable. Please change its permissions to install.'),'conf/')
);

if ($php_check->checkAll() && $files_check->checkAll()) {
	$ses->reg('step',3);
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('Checking your configuration').'</h2>';


echo '<h3>'.__('PHP version and modules').'</h3>';
echo $php_check->getHTML($img_chk_on,$img_chk_off,$img_chk_wrn);

echo '<h3>'.__('Files permissions').'</h3>';
echo $files_check->getHTML($img_chk_on,$img_chk_off,$img_chk_wrn);

if ($php_check->checkAll() && $files_check->checkAll())
{
	echo
	'<p><strong>'.__('DotClear can be installed on your site.').'</strong></p>';
	
	echo
	'<form action="db-pref.php" method="post">'.
	'<p><input type="submit" class="submit" value="'.__('Next step').' &#187;" /></p>'.
	'</form>';
}
else
{
	echo
	'<p class="important">'.
	__('DotClear cannot be installed.').
	'</p>';
	if (!$php_check->checkAll()) {
		echo
		'<p>'.__('Your PHP configuration is not valid. '.
		'Please contact your Web host to solve this problem.').'</p>';
	}
	if (!$files_check->checkAll()) {
		echo
		'<p>'.__('Some files or directories are not writable. Please '.
		'change their permissions to install DotClear.').'</p>';
	}
}

?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
