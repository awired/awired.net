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

define('STEP',3);

require dirname(__FILE__).'/prepend.php';

$db_host = '';
$db_user = '';
$db_pass = '';
$db_name = '';
$db_prefix = 'dc_';

$err = '';

if (!empty($_POST['check']))
{
	$db_host = trim($_POST['db_host']);
	$db_user = trim($_POST['db_user']);
	$db_pass = trim($_POST['db_pass']);
	$db_name = trim($_POST['db_name']);
	$db_prefix = trim($_POST['db_prefix']);
	
	if (!preg_match('/^[A-Za-z_]+$/',$db_prefix)) {
		$err = __('Invalid tables prefix. It can contain only letters or "_".');
	}
	
	# On tente une connexion
	if ($err == '')
	{
		$con = new connection($db_user,$db_pass,$db_host,$db_name);
		if ($con->error()) {
			$err = $con->error();
		} else {
			$ses->reg('db_host',$db_host);
			$ses->reg('db_user',$db_user);
			$ses->reg('db_pass',$db_pass);
			$ses->reg('db_name',$db_name);
			$ses->reg('db_prefix',$db_prefix);
			
			$ses->reg('step',4);
			header('Location: db-install.php');
			exit;
		}
	}
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('Database parameters').'</h2>';

if ($err != '') {
	echo
	'<p><strong>'.__('Error, check your parameters.').'</strong></p>'.
	'<p class="important">'.$err.'</p>';
}

echo
'<form action="db-pref.php" method="post">'.
'<p class="field"><label for="db_host" class="float">'.__('Server address').' :</label>'.
form::field('db_host',30,255,$db_host).'</p>'.
'<p class="field"><label for="db_user" class="float">'.__('User ID').' :</label>'.
form::field('db_user',30,255,$db_user).'</p>'.
'<p class="field"><label for="db_pass" class="float">'.__('Password').' :</label>'.
form::field('db_pass',30,255,$db_pass).'</p>'.
'<p class="field"><label for="db_name" class="float">'.__('Database name').' :</label>'.
form::field('db_name',30,255,$db_name).'</p>'.
'<p class="field"><label for="db_prefix" class="float">'.__('Tables prefix').' :</label>'.
form::field('db_prefix',30,255,$db_prefix).'</p>'.
'<p class="field"><input type="submit" class="submit" value="'.__('Create tables').' &#187;" />'.
form::hidden('check','1').'</p>';
'</form>';

?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
