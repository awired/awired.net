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

define('STEP',20);

require dirname(__FILE__).'/prepend.php';

$con = new connection($ses->f('db_user'),$ses->f('db_pass'),
		$ses->f('db_host'),$ses->f('db_name'));

$sql_check = new checklist();

$xsql = new xmlsql($con,implode('',file(dirname(__FILE__).'/db-upgrade.xml')));
$xsql->replace('{{PREFIX}}',$ses->f('db_prefix'));
$xsql->execute($sql_check);

if ($sql_check->checkAll())
{
	$blog = new blog($con,$ses->f('db_prefix'),NULL);
	
	# Mise à jour de la table post (titre_url)
	if ($sql_check->checkItem('post_titre_url') === true)
	{
		$rs = $con->select('SELECT post_id, post_titre FROM '.$ses->f('db_prefix').'post');
		$up_t_url = true;
		$up_t_url_msg = $up_t_url_err = __('Update URLed titles');
		while (!$rs->EOF()) {
			if ($rs->f('post_titre_url') == '') {
				$updReq = 'UPDATE '.$ses->f('db_prefix').'post SET '.
						'post_titre_url = \''.$con->escapeStr($blog->str2url($rs->f('post_titre'))).'\' '.
						'WHERE post_id = '.$rs->f('post_id').' ';
				if ($con->execute($updReq) === false) {
					$up_t_url = false;
					$up_t_url_err .= ' failed - '.$con->error();
					break(1);
				}
			}
			$rs->moveNext();
		}
		$sql_check->addItem('up_t_url',$up_t_url,$up_t_url_msg,$up_t_url_err); 
	}
	
	# Réordonne les catégories
	$sql_check->addItem('reord_cat',$blog->reordCats(true),
	__('Reord categories'),__('Reord categories failed')
	);
	
	# Mise à jour du fichier dotclear.ini
	$ini_file = dirname(__FILE__).'/../conf/dotclear.ini';
	
	if (!file_exists($ini_file))
	{
		copy($ini_file.'.in',$ini_file);
		@unlink($ini_file.'.in');
		chmod($ini_file,0666);
		$sql_check->addItem('ini_file',true,
		__('Update of dotclear.ini'),'');
	}
	else
	{
		$objIni = new iniFile(dirname(__FILE__).'/../conf/dotclear.ini');
		
		$objIni->createVar('dc_comments_ttl',0,
		'Temps de vie (en jours) des commentaires et trackbacks (0 = infini)');
		$objIni->createVar('dc_upload_size',251200,
		"Format maximum d'une image largeur x hauteur\nexemples : 600x600, 600, 600x, x600");
		$objIni->createVar('dc_time_delta',0,
		"Décalage horaire global (entre -12 et 12)");
		$objIni->createVar('dc_blog_desc','',
		'Description courte du weblog (pour les fils RSS et Atom');
		$objIni->createVar('dc_comments_pub',1,
		'Publier directement les nouveaux commentaires');
		$objIni->createVar('dc_short_feeds',0,
		'Flux RSS et Atom au format court');
		
		$sql_check->addItem('ini_file',$objIni->saveFile(),
		__('Update of dotclear.ini'),__('Update of dotclear.ini failed')
		);
	}
	
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
	
	$sql_check->addItem('conf',$wconf,
	__('Creation of config file.'),
	__('Creation of config file failed.')
	);
	
	# On recompte tout
	$blog->countAll();
}

$con->close();

if ($sql_check->checkAll()) {
	$ses->destroy();
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('Upgrade DotClear').'</h2>';

echo $sql_check->getHTML($img_chk_on,$img_chk_off,$img_chk_wrn);

if ($sql_check->checkAll()) {
	echo '<p><strong>'.__('DotClear successfully upgraded.').'</strong></p>';
	echo '<p><a href="../'.DC_ECRIRE.'/">'.__('Log in').'</a></p>';
	if ($sql_check->checkWarnings()) {
		echo
		'<p><strong>'.__('Note:').'</strong> '.
		__('DotClear will run properly even if warnings are issued.').'</p>';
	}
} else {
	echo '<p class="important">Unable to upgrade DotClear</p>';
}


?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>
