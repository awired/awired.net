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

define('STEP',5);
require dirname(__FILE__).'/prepend.php';

# Ajout du fichier de langue principal pour les erreurs et champs 
l10n::set(dirname(__FILE__).'/../l10n/'.$ses->f('lang').LANG_PREFIX.'/main');

$p_name = '';
$p_fname = '';
$p_login = '';
$p_pwd = '';

$created = false;
$err = '';

if (!empty($_POST['create']))
{
	$con = new connection($ses->f('db_user'),$ses->f('db_pass'),
		$ses->f('db_host'),$ses->f('db_name'));
	$blog = new blog($con,$ses->f('db_prefix'),NULL);
	
	$p_name = $_POST['p_name'];
	$p_fname = $_POST['p_fname'];
	$p_login = $_POST['p_login'];
	$p_pwd =  $_POST['p_pwd'];
	
	if ($blog->addUser($p_login,9,$p_pwd,$p_name,$p_fname,'','',
	'wiki',10,1,$ses->f('lang'),0) === false) {
		$err = $blog->error(1,0);
	} else {
		$created = true;
		$ses->reg('user_id',$p_login);
		$ses->reg('user_pwd',$p_pwd);
		$ses->reg('step',6);
	}
	
	$con->close();
	
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('Creation of first user').'</h2>';

if ($created)
{
	$user_check = new checkList();
	$user_check->addItem('user',true,__('User successfully created'),'');
	echo $user_check->getHTML($img_chk_on,$img_chk_off,$img_chk_wrn);
	
	echo
	'<form action="ini-file.php" method="post">'.
	'<p><input type="submit" class="submit" value="'.__('Next step').' &#187;" /></p>'.
	'</form>';
}
else
{
	echo
	'<p>'.__('You are about to create the first user of your blog. This user '.
	'will be administrator.').'</p>';
	
	if ($err != '') {
		echo
		'<div><p class="important">'.__('Error(s)').' :</p>'.
		$err.'</div>';
	}
	
	echo
	'<form action="db-user.php" method="post">'.
	'<p class="field"><label class="float" for="p_name">'.__('Name').'* :</label> '.
	form::field('p_name',30,255,$p_name).'</p>'.
	'<p class="field"><label class="float" for="p_fname">'.__('Firstname').' :</label> '.
	form::field('p_fname',30,255,$p_fname).'</p>'.
	'<p class="field"><label class="float" for="p_login">'.__('Login').'* :</label> '.
	form::field('p_login',30,255,$p_login).'</p>'.
	'<p class="field"><label class="float" for="p_pwd">'.__('Password').'* :</label> '.
	form::field('p_pwd',30,255,$p_pwd).'</p>'.
	'<p class="field"><input type="submit" class="submit" value="'.__('Create user').' &#187;" />'.
	form::hidden('create','1').'</p>'.
	'</form>';
}

?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
