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

# Création du haut de la page du backend
function openPage($title='',$head='')
{
	global $myMenu, $mySubMenu, $auth;
	
	commonHeaders();
	
	echo
	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" '.
	' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n".
	'<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.DC_LANG.'" lang="'.DC_LANG.'">'."\n".
	"<head>\n".
	'  <title>'.$title.' - '.dc_blog_name.' - DotClear '.DC_VERSION.'</title>'."\n".
	'  <style type="text/css">'."\n". 
     '  @import "style/default.css";'."\n".
	"  </style>\n".
	'  <script type="text/javascript" src="js/tools.js"></script>'."\n".
	$head.
	"</head>\n".
	"<body>\n";
	
	$myMenu->addItem(
		__('Entries'),'index.php','',
		(preg_match('/^index.php|poster.php|images.php|trackback.php$/',basename($_SERVER['PHP_SELF']))),
		true,'menuBillets');
		
	$myMenu->addItem(
		__('Comments'),'comments.php','',
		(preg_match('/^comment/',basename($_SERVER['PHP_SELF']))),
		true,'menuComments');
		
	$myMenu->addItem(
		__('Categories'),'cat_list.php','',
		(preg_match('/^cat/',basename($_SERVER['PHP_SELF']))),
		$auth->userLevel(5),'menuCategories');
	
	$myMenu->addItem(
		__('Editors'),'redac_list.php','',
		(preg_match('/^redac/',basename($_SERVER['PHP_SELF']))),
		$auth->userLevel(9),'menuUsers');
	
	$myMenu->addItem(
		__('Preferences'),'user_prefs.php','',
		(basename($_SERVER['PHP_SELF']) == 'user_prefs.php'),
		true,'menuPref');
	
	$myMenu->addItem(
		__('Tools'),'tools.php','',
		(basename($_SERVER['PHP_SELF']) == 'tools.php'),
		$auth->userLevel(9),'menuTools');
	
	echo
	'<div id="header">'."\n".
	$myMenu->draw()."\n".
	'</div>'."\n".
	'<div id="main">'."\n".
	$mySubMenu->draw()."\n".
	'<div id="content">'."\n".
	'<ul class="user-info">'.
		'<li class="ui-name">'.$_SESSION['sess_user_cn'].'</li>'.
		'<li class="ui-logout"><a href="index.php?logout=1">'.__('logout').'</a></li>'.
	'</ul>'.
	"\n";
	
	if(!empty($_GET['msg']))
	{
		echo '<p class="message">'.strip_tags($_GET['msg']).'</p>';
	}
}

function closePage()
{
	global $con;
	
	echo
	"</div>\n".
	'<hr class="hidden clear" />'."\n".
	"</div>\n".
	'<p id="footer"><a href="http://www.dotclear.net/"><img '.
	'src="images/dotclear_pw.png" alt="dotclear blog" /></a></p>'."\n";
	
	# URL de la page avec sessions
	/*
	if (defined('DEBUG') && DEBUG)
	{
		$page_uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$valid_separator = (strpos($page_uri,'?')) ? '&' : '?';
		
		$page_uri = $t_uri = $page_uri.$valid_separator.session_name().'='.session_id();
		$page_uri = htmlspecialchars('http://'.$page_uri);
		
		echo '<p>'.$page_uri.'</p>';
	}
	//*/

	
	echo '</body></html>';
	
	if (isset($_SESSION)) {
		session_write_close();
	}
	if (!empty($con) && is_object($con)) {
		$con->close();
	}
}

/*
Popup
*/
function openPopup($title='',$encoding='')
{
	commonHeaders($encoding);
	
	echo
	'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" '.
	' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n".
	'<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.DC_LANG.'" lang="'.DC_LANG.'">'."\n".
	"<head>\n".
	'<title>'.$title.' - DotClear</title>'."\n".
	'<link rel="stylesheet" type="text/css" href="style/default.css" />'."\n".
	'<script type="text/javascript" src="js/tools.js"> </script>'."\n".
	"</head>\n".
	'<body class="popup">'."\n".
	'<div id="main">'."\n".
	'<div id="content">'."\n";
}

function closePopup()
{
	global $con;
	
	echo
	"</div>\n".
	'<p class="small center clear"><a href="#" onclick="window.close();">'.__('Close this window').'</a></p>'."\n".
	"</div>\n".
	'<div id="footer"><img src="images/dotclear_pw.png" alt="dotclear blog" /></div>'."\n".
	"</body>\n".
	"</html>\n";
	
	# Fermeture de la connexion
	if (isset($_SESSION)) {
		session_write_close();
	}
	if (!empty($con) && is_object($con)) {
		$con->close();
	}
}

function commonHeaders($encoding='')
{
	if ($encoding == '') {
		$encoding = dc_encoding;
	}
	
	header('Content-Type: text/html; charset='.$encoding);
	header('Content-Script-Type: text/javascript');
	header('Content-Style-Type: text/css');
	header('Content-Language: '.DC_LANG);
}

function helpLink($section,$id='',$str='<img src="images/ico_help.png" alt="(?)"/>')
{
	$id = (trim($id)!='') ? '#'.$id : '';
	
	return
	'<a href="popuphelp.php?p='.$section.$id.'" onclick="popup(this.href); '.
	'return false;">'.$str.'</a>';
}
?>