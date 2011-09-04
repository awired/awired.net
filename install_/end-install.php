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

define('STEP',7);
require dirname(__FILE__).'/prepend.php';

$end_check = new checkList();

# Création du premier billet
$con = new connection($ses->f('db_user'),$ses->f('db_pass'),
		$ses->f('db_host'),$ses->f('db_name'));
$blog = new blog($con,$ses->f('db_prefix'),NULL);

if ($blog->addPost($ses->f('user_id'),__('First post'),'first-post','',
'<p>'.__('This is the first post. Please edit it.').'</p>','',1,
'html',true,true,true,$ses->f('lang'),false) == false)
{
	$first_post = false;
} else {
	$first_post = true;
}

$end_check->addItem('first',$first_post,
__('Creation of first entry.'),
__('Creation of first entry failed.')
);


# Création du fichier de configuration
$configfile = dirname(__FILE__).'/../conf/config.php';
$config = implode('',file($configfile.'.in'));

$config = str_replace('%%DB_USER%%',$ses->f('db_user'),$config);
$config = str_replace('%%DB_PASS%%',$ses->f('db_pass'),$config);
$config = str_replace('%%DB_HOST%%',$ses->f('db_host'),$config);
$config = str_replace('%%DB_BASE%%',$ses->f('db_name'),$config);
$config = str_replace('%%DB_PREFIX%%',$ses->f('db_prefix'),$config);

if (($fp = @fopen($configfile,'w')) !== false) {
	fwrite($fp,$config,strlen($config));
	fclose($fp);
	$wconf = true;
	files::secureFile($configfile);
} else {
	$wconf = false;
}

$end_check->addItem('conf',$wconf,
__('Creation of config file.'),
__('Creation of config file failed.')
);

$user_id = $ses->f('user_id');
$user_pwd = $ses->f('user_pwd');

if ($end_check->checkAll()) {
	$ses->destroy();
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('End of installation').'</h2>';

echo $end_check->getHTML($img_chk_on,$img_chk_off,$img_chk_wrn);

if (!$end_check->checkAll()) {
	echo
	'<p class="important">'.__('An error occured while finishing installation.').'</p>';
} else {
	@unlink($configfile.'.in');
	
	echo
	'<h3>'.__('Congratulations!').'</h3>'.
	'<p>'.__('You successfully installed DotClear. Have fun.').'</p>';
	
	echo
	'<form action="../'.DC_ECRIRE.'/auth.php" method="post">'.
	'<p><input type="submit" class="submit" value="'.__('Manage your blog').' &#187;" />'.
	form::hidden('user_id',$user_id).
	form::hidden('user_pwd',$user_pwd).
	'</p>'.
	'</form>';
}

$con->close();
?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
