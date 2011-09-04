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

require dirname(__FILE__).'/inc/prepend.php';
require_once dirname(__FILE__).'/../inc/classes/class.imgmanager.php';
require_once dirname(__FILE__).'/../inc/libs/lib.image.php';

$auth->check(5);

include dirname(__FILE__).'/inc/connexion.php';

$page_title = __('Manage images');

$img_p = dc_img_root;
$img_p = path::real($img_p);
$p = !empty($_REQUEST['p']) ? $_REQUEST['p'] : '';
$mode = !isset($mode) ? '' : $mode;

$pscript = ($mode == 'popup') ? 'images-popup.php' : 'images.php';

$imgM = new imgmanager($img_p,$p,dc_img_url,$pscript);

$err = '';

# Upload d'image
if (!$imgM->isExclude() && $imgM->isWritable() && !empty($_FILES['up_img']))
{
	$tmp_file = $_FILES['up_img']['tmp_name'];
	$img_name = $_FILES['up_img']['name'];
	$up_dir = $imgM->root.'/'.$imgM->base_path;
	
	if (version_compare(phpversion(),'4.2.0','>=')) {
		$upd_error = $_FILES['up_img']['error'];
	} else {
		$upd_error = 0;
	}
	
	if($upd_error != 0)
	{
		switch ($upd_error) {
			case 1:
			case 2:
				$err .= '<li>'.__('File size exceeds the authorized limit').'</li>';
				break;
			case 3:
				$err .= '<li>'.__('File was only partially uploaded').'</li>';
				break;
			case 4:
				$err .= '<li>'.__('No file').'</li>';
				break; 
		}
	}
	elseif(@move_uploaded_file($tmp_file,$up_dir.'/'.$img_name))
	{
		$dest_img = $up_dir.'/'.$img_name;
		
		if(filesize($dest_img) > dc_upload_size)
		{
			$err .= '<li>'.__('File size exceeds the authorized limit').'</li>'; 
		}
		else
		{	
			if(($img_size = @getimagesize($dest_img)) === false)
			{
				$err .= '<li>'.sprintf(__('The file %s is not an image'),
				'<strong>'.$img_name.'</strong>').'</li>';
			}
			else
			{
				$max_s = explode('x',dc_max_img_size);
				$max_w = (int) $max_s[0];
				$max_h = isset($max_s[1]) ? (int) $max_s[1] : 0;
				
				if ($max_w > 0 && $img_size[0] > $max_w)
				{
					$err .= '<li>'.__('Image is too large').'</li>';
				}
				elseif ($max_h > 0 && $img_size[1] > $max_h)
				{
					$err .= '<li>'.__('Image is too large').'</li>';
				}
			}
		}
		
		if ($err != '')
		{
			unlink($dest_img);
		}
		else
		{
			chmod($up_dir.'/'.$img_name,fileperms($up_dir) & ~0111);
			# On fait le thumbnail
			if (($img_type = images::type($dest_img)) !== false)
			{
				$tn_file = preg_replace('/^(.*)([.]\\w+)$/','$1.TN__$2',$up_dir.'/'.$img_name);
				images::cropImg($dest_img,$tn_file,$img_type,140,140);
			}
			
			$msg = __('Image uploaded');
			header('Location: '.$pscript.'?p='.$p.'&msg='.rawurlencode($msg));
			exit();
		}
	}
	else
	{
		$err .= '<li>'.__('An error occured while uploading the image').'</li>';
	}
}

# Création d'une miniature
if (!$imgM->isExclude() && $imgM->isImg() && isset($_GET['tn']))
{
	$type = $imgM->getImgType();
	
	if ($type != 'png' && $type != 'jpeg')
	{
		$err .= '<li>'.__('Wrong image type').'</li>';
	}
	elseif (!$imgM->isParentWritable())
	{
		$err .= '<li>'.__('This folder is not writable.').'</li>';
	}
	else
	{
		$img_file = $imgM->root.'/'.$imgM->base_path;
		$tn_file = preg_replace('/^(.*)([.]\\w+)$/','$1.TN__$2',$img_file);
		
		if (images::cropImg($img_file,$tn_file,$type,140,140) !== false) {
			header('Location: '.$pscript.'?p='.dirname($p));
			exit;
		}
	}
}

# Suppression
if (!$imgM->isExclude() && $imgM->isDeletable() && isset($_GET['del']))
{
	if ($imgM->isImg()) {
		$img_tn = $imgM->getThumb(NULL,true);
	}
	if ($imgM->delete() === false) {
		$err .= '<li>'.__('Cannot delete.').'</li>';
	} else {
		if (!empty($img_tn)) {
			@unlink($img_tn);
		}
		header('Location: '.$pscript.'?p='.dirname($p));
		exit;
	}
}

# Création d'un répertoire
if (!$imgM->isExclude() && $imgM->isWritable() && !empty($_POST['new_dir']))
{
	if ($imgM->newDir($_POST['new_dir']) !== false) {
		header('Location: '.$pscript.'?p='.$p);
		exit;
	} else {
		$err = '<li>'.__('Cannot create this directory.').'</li>';
	}
}

# Affichage
if ($mode == 'popup') {
	openPopup($page_title);
	echo '<script type="text/javascript" src="js/toolbar.js"></script>';
	echo
	'<script type="text/javascript">'.
	"if (document.getElementById) {
		var tbImg = new dcToolBar(window.opener.document.getElementById('p_content'),
		window.opener.document.getElementById('p_format'),'images/');
	}
	</script>";
	
} else {
	# Sous menu
	$mySubMenu->addItem(
		__('Back to list of entries'),'index.php','images/ico_retour.png',false);
	
	openPage($page_title);
}


echo '<h2>'.$page_title.'</h2>';

if ($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		'<ul>'.$err.'</ul></div>';
}

echo '<h3>'.__('Your images').'</h3>';

echo '<p>'.$imgM->getNavBar().'</p>';

# Affichage des image
if (!$imgM->isExclude() && $imgM->isDir() && ($f_list = $imgM->getDir()) !== false)
{
	$redir_link = ''.$pscript.'?p='.$imgM->base_path;
	
	foreach ($f_list['dirs'] as $k => $v)
	{
		$action = '';
		
		if ($v['del']) {
			$action .= '<a href="'.$redir_link.'/%2$s&amp;del=1" '.
			'onclick="return window.confirm(\''.
			addslashes(sprintf(__('Are you sure you want to delete this %s?'),__('directory'))).'\');">'.
			'<img src="images/delete.png" alt="'.__('delete').'" '.
			'title="'.__('delete').'"/></a>';
		}
		
		$action = '<p class="action">'.$action.'</p>';
		
		$dir_link =
		'<div class="imgBrowsedir">'.
		'<p class="thumbnail small">'.
		'<a href="%1$s">'.
		'<img src="images/directory.png" alt="" /></a>'.
		'<a href="%1$s">%2$s</a></p>'.
		$action.
		'</div>';
		
		echo $imgM->listDir($k,$v,$dir_link);
	}
	
	foreach ($f_list['files'] as $k => $v)
	{
		$action = '';
		
		if ($v['del']) {
			$action .= '<a href="'.$redir_link.'/%2$s&amp;del=1" '.
			'onclick="return window.confirm(\''.
			addslashes(sprintf(__('Are you sure you want to delete this %s?'),__('file'))).'\');">'.
			'<img src="images/delete.png" alt="'.__('delete').'" '.
			'title="'.__('delete').'"/></a>';
		}
		
		$action = '<p class="action">'.$action.'</p>';
		
		if ($mode != 'popup') {
			$img_href = '%1$s';
		} else {
			$img_href = '%1$s" '.
			'onclick="tbImg.insImg(\'%4$s\'); '.
			'window.close(); return false;';
		}
		
		$img_link =
		'<div class="imgBrowse">'.
		'<p class="thumbnail small">'.
		'<br /><a href="'.$img_href.'">%2$s</a>'.
		'<br /><br /> <a href="'.$pscript.'?p='.$imgM->base_path.'/%2$s&amp;tn=1">'.
		__('Try to create thumbnail').'</a></p>'.
		$action.
		'</div>';
		
		$img_link_tn =
		'<div class="imgBrowse">'.
		'<p class="thumbnail small">'.
		'<a href="'.$img_href.'"><img src="%3$s" alt="%2$s" /></a>'.
		'<a href="'.$img_href.'">%2$s</a></p>'.
		$action.
		'</div>';
		
		if (!preg_match('/TN__[.]\w+$/',$k))
		{
			# Thumbnail ?
			if (($tn_url = $imgM->getThumb($k)) !== false) {
				echo $imgM->listImg($k,$v,$img_link_tn);
			} else {
				echo $imgM->listImg($k,$v,$img_link);
			}
		}
	}
}

# Formulaire

if ($imgM->isWritable())
{
	echo
	'<form enctype="multipart/form-data" action="'.$pscript.'" method="post">'.
	'<fieldset class="clear"><legend>'.__('Upload an image').'</legend>'.
	'<p><label for="up_img">'.
	sprintf(__('Choose a file (max size %s)'),files::size(dc_upload_size)).'&nbsp;: </label>'.
	'<input name="up_img" id="up_img" type="file" />'.
	'<input type="hidden" name="MAX_FILE_SIZE" value="'.dc_upload_size.'" />'.
	'<input type="hidden" name="mode" value="'.$mode.'" />'.
	'<input type="hidden" name="p" value="'.$p.'" />'.
	'&nbsp;<input class="submit" type="submit" value="'.__('send').'" /></p>'.
	'</fieldset>'.
	'</form>';
	
	echo
	'<form action="'.$pscript.'" method="post">'.
	'<fieldset><legend>'.__('New directory').'</legend>'.
	'<p><label for="new_dir">'.__('Name').' : </label>'.
	form::field('new_dir',20,255,'').
	'<input type="hidden" name="mode" value="'.$mode.'" />'.
	'<input type="hidden" name="p" value="'.$p.'" />'.
	'&nbsp;<input class="submit" type="submit" value="'.__('save').'" /></p>'.
	'</fieldset>'.
	'</form>';
}

if ($mode == 'popup') {
	closePopup();
} else {
	closePage();
}
?>
