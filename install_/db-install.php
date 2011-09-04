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

define('STEP',4);

require dirname(__FILE__).'/prepend.php';

$con = new connection($ses->f('db_user'),$ses->f('db_pass'),
		$ses->f('db_host'),$ses->f('db_name'));

# On vérifie si les tables existent
$strReq = 'SHOW TABLES LIKE \''.$ses->f('db_prefix').'%s\' ';

$rs = $con->select(sprintf($strReq,'categorie'));
$installed['categorie'] = !$rs->isEmpty();

$rs = $con->select(sprintf($strReq,'comment'));
$installed['comment'] = !$rs->isEmpty();

$rs = $con->select(sprintf($strReq,'post'));
$installed['post'] = !$rs->isEmpty();

$rs = $con->select(sprintf($strReq,'user'));
$installed['user'] = !$rs->isEmpty();

$installed = $installed['categorie'] && $installed['comment'] && $installed['post'] && $installed['user'];

if ($installed)
{
	$ses->reg('step',20);
}
else
{
	$sql_check = new checklist();
	
	$xsql = new xmlsql($con,implode('',file(dirname(__FILE__).'/db-create.xml')));
	$xsql->replace('{{PREFIX}}',$ses->f('db_prefix'));
	$xsql->execute($sql_check);
	
	$con->close();
	
	if ($sql_check->checkAll()) {
		$ses->reg('step',5);
	}
}

require dirname(__FILE__).'/__top.php';

if ($installed)
{
	 echo
	'<p>'.__('DotClear seems to be present on your site. '.
	'You may want to upgrade.').'</p>'.
	'<p class="important">'.__('Don\'t forget to upload your old dotclear.ini '.
	'in conf/ directory before upgrade.').'</p>'.
	'<form action="upgrade.php" method="post">'.
	'<p><input type="submit" class="submit" value="'.__('Upgrade').' &#187;" /></p>'.
	'</form>';
	
}
else
{
	
	
	echo '<h2>'.__('Tables creation').'</h2>';
	
	echo $sql_check->getHTML($img_chk_on,$img_chk_off,$img_chk_wrn);
	
	if (!$sql_check->checkAll())
	{
		echo '<p class="important">'.
		__('Unable to create all tables. Please check if the tables don\'t exist yet.').'</p>';
	}
	else
	{
		echo '<p><strong>'.__('Tables successfully created.').'</strong></p>';
		if ($sql_check->checkWarnings()) {
			echo
			'<p>'.__('DotClear will run properly even if warnings are issued.').'</p>';
		}
		
		echo
		'<form action="db-user.php" method="post">'.
		'<p><input type="submit" class="submit" value="'.__('Create user').' &#187;" /></p>'.
		'</form>';
	}
}
?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
