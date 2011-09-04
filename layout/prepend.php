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
require dirname(__FILE__).'/../inc/prepend.php';

# Si on a une session active
if (defined('DC_SESSION_NAME') && isset($_COOKIE[DC_SESSION_NAME])) {
	require dirname(__FILE__).'/../inc/session.php';
}

require dirname(__FILE__).'/lib.mod.php';
require dirname(__FILE__).'/lib.cache.php';

require dirname(__FILE__).'/class.xblog.php';
require dirname(__FILE__).'/class.xblogpost.php';
require dirname(__FILE__).'/class.xblogcomment.php';
require dirname(__FILE__).'/functions.php';

$mode = dcGetMod();
$year = $month = $day = NULL;
$post_id = (!empty($_GET['p'])) ? $_GET['p'] : NULL;
$cat_id = (!empty($_GET['cat'])) ? $_GET['cat'] : NULL;
$lang = (!empty($_GET['l'])) ? $_GET['l'] : NULL;

$mod_files = $mod_ts = array();

if (!empty($_GET['d'])) {
	$year = substr($_GET['d'],0,4);
	if (strlen($_GET['d']) >= 7) {
		$month = substr($_GET['d'],5,2);
		if (strlen($_GET['d']) == 10) {
			$day = substr($_GET['d'],8,2);
		}
	}
}

$err_msg = $form_err = $form_msg = '';

# Tableau des dates de modif
$arry_last_mod = array();

# Variables pour le formulaire
$c_nom = $c_mail = $c_content = '';
$c_site = 'http://';
$preview = false;

if (!empty($_COOKIE['comment_info'])) {
	$c_cookie = unserialize($_COOKIE['comment_info']);
	$c_nom = $c_cookie['c_nom'];
	$c_mail = $c_cookie['c_mail'];
	$c_site = $c_cookie['c_site'];
}


# Variable de conf
$theme_path = $blog_dc_path.'/themes/';
$theme_uri = dc_app_url.'/themes/';
$img_path = dc_img_url;

# Définition du thème et de la langue
$__theme = dc_theme;
$__lang = dc_default_lang;

# Ajout des functions.php des plugins
$objPlugins = new plugins(dirname(__FILE__).'/../'.DC_ECRIRE.'/tools/');
foreach ($objPlugins->getFunctions() as $pfunc) {
	require_once $pfunc;
}

# Définition du template
if (!is_dir($theme_path.$__theme)) {
	header('Content-type: text/plain');
	echo 'Le thème '.$__theme.' n\'existe pas';
	exit;
}

if (file_exists($theme_path.$__theme.'/template.php')) {
	$dc_template_file = $theme_path.$__theme.'/template.php';
} else {
	$dc_template_file = $theme_path.'default/template.php';
}

# Prepend du template s'il existe
if (file_exists(dirname($dc_template_file).'/prepend.php')) {
	require dirname($dc_template_file).'/prepend.php';
}

# Chargement des langues
if (dc_encoding == 'UTF-8') {
	l10n::set(dirname(__FILE__).'/../l10n/'.$__lang.'-utf8/date');
	l10n::set(dirname(__FILE__).'/../l10n/'.$__lang.'-utf8/messages');
} else {
	l10n::set(dirname(__FILE__).'/../l10n/'.$__lang.'/date');
	l10n::set(dirname(__FILE__).'/../l10n/'.$__lang.'/messages');
}

# Fichier de langue du template s'il existe
if (dc_encoding == 'UTF-8') {
	l10n::set(dirname($dc_template_file).'/l10n/'.$__lang.'-utf8/main');
} else {
	l10n::set(dirname($dc_template_file).'/l10n/'.$__lang.'/main');
}

/* Création du tableau des dates de modification de tous les fichiers
inclus. On ajoute aussi le fichier UPDATE, append.php, le template,
dotclear.ini et tous les fichiers de langue */
$mod_files = array_merge($mod_files,get_included_files(),$GLOBALS['__l10n_files']);
$mod_files[] = DC_UPDATE_FILE;
$mod_files[] = $dc_template_file;
$mod_files[] = $blog_dc_path.'/layout/append.php';
$mod_files[] = $blog_dc_path.'/conf/dotclear.ini';

# Cache HTTP
if (dc_http_cache && $mode != 'search' && empty($_POST) &&
defined('DC_UPDATE_FILE_W') && DC_UPDATE_FILE_W)
{
	cache::http($mod_files,$mod_ts);
}

# Connexion et création du blog
$con = new connection(DB_USER,DB_PASS,DB_HOST,DB_DBASE);

if($con->error()) {
	header('Content-Type: text/plain');
	echo 'MySQL Error : '.$con->error();
	exit;
}

$blog = new xblog($con,DB_PREFIX,1,dc_encoding);
$blog->rs_blogpost = 'xblogpost';
$blog->rs_blogcomment = 'xblogcomment';

$blog->setLang($lang);
$blog->setURL('post',dc_blog_url.dc_format_post_url);
$blog->setURL('cat',dc_blog_url.dc_format_cat_url);
$blog->setURL('archive',dc_blog_url.dc_format_archive_url);
$blog->setURL('day',dc_blog_url.dc_format_day_url);

$blog->setDateFormat(dc_date_format,dc_time_format);

$blog->setUseSmilies(dc_use_smilies);

if (is_dir($theme_path.$__theme.'/smilies/')) {
	$blog->setSmiliesPath($theme_path.$__theme.'/smilies/',$theme_uri.$__theme.'/smilies/');
} else {
	$blog->setSmiliesPath($theme_path.'default/smilies/',$theme_uri.'default/smilies/');
}

# postcon.php du template s'il existe
if (file_exists(dirname($dc_template_file).'/postcon.php')) {
	require dirname($dc_template_file).'/postcon.php';
}

# postcon.php des plugins
foreach ($objPlugins->getFunctions('postcon.php') as $pfunc) {
	require_once $pfunc;
}
# Catégories
$rs_cat = $blog->getCat();

# Mois pour les archives
$arry_months = $blog->getAllDates('m','','','',$cat_id);

# Les langues du blog
$rs_lang = $blog->getPostLanguages();

if(isset($news))
{
	# $news was defined by a plugin or the template.

	if ($news->isEmpty()) {
		$err_msg = '<p>'.__('No entry.').'</p>';
	}
}
elseif($mode == 'home' || ($mode == 'cat' && $cat_id) || $mode == 'year')
{
	# Dernières nouvelles
	$news = $blog->getLastNews(dc_nb_post_per_page,$cat_id,'post_dt DESC');
	
	if ($news->isEmpty()) {
		$err_msg = '<p>'.__('No entry.').'</p>';
	}
}
elseif($mode == 'day')
{
	$news = $blog->getPostByDate($year,$month,$day,$cat_id,'post_dt DESC');
	
	if ($news->isEmpty()) {
		$err_msg = '<p>'.__('No entry.').'</p>';
	}
}
elseif($mode == 'month')
{
	$news = $blog->getPostByDate($year,$month,'',$cat_id,'post_dt DESC');
	
	if ($news->isEmpty()) {
		$err_msg = '<p>'.__('No entry.').'</p>';
	}
}
elseif($mode == 'post' && $post_id)
{
	$news = $blog->getPostByID($post_id);
	
	if ($news->isEmpty())
	{
		$err_msg = '<p>'.__('No entry.').'</p>';
	}
	else
	{
		# Ajout d'un commentaire
		if (!empty($_POST['redir']) && $news->openComment())
		{
			$c_nom = trim($_POST['c_nom']);
			$c_mail = trim($_POST['c_mail']);
			$c_site = trim($_POST['c_site']);
			
			if (trim($_POST['c_content']) == '')
			{
				$in_content = $c_content = '';
			}
			else
			{
				$c_content = $_POST['c_content'];
				
				if (dc_wiki_comments)
				{
					$objWiki = new wiki2xhtmlComment();
					
					# Options wiki
					$objWiki->setOpt('active_fix_word_entities',(dc_encoding != 'UTF-8')); 
					$objWiki->setOpt('active_fr_syntax',(dc_default_lang == 'fr'));
					
					$in_content = $objWiki->transform($c_content);
				}
				else
				{
					$in_content = '<p>'.
					nl2br($blog->parseContent(htmlspecialchars($c_content))).'</p>';
				}
			}
			
			if (!empty($_POST['preview']))
			{
				$preview = true;
			}
			else
			{
				
				if ($blog->addComment($post_id,$c_nom,$c_mail,$c_site,
				$in_content,0,dc_time_delta,dc_comments_pub) === false)
				{
					$form_err = $blog->error(1,0);
				}
				else
				{
					if (!empty($_POST['c_remember']) || !empty($_COOKIE['comment_info']))
					{
						$c_cookie = array(
							'c_nom' => $c_nom,
							'c_mail' => $c_mail,
							'c_site' => $c_site
						);
						$c_cookie = serialize($c_cookie);
						setcookie('comment_info',$c_cookie,
							strtotime('+3 month'),'/',
							$_SERVER['HTTP_HOST']);
					}
					
					if (dc_comment_notification && $news->f('user_email') != ''
					&& $news->f('user_email') != $c_mail)
					{
						$n_titre = $blog->removeEntities($news->f('post_titre'));
						$n_mail = $news->f('user_email');
						$n_subject = util::mimeEncode('['.dc_blog_name.'] '.$n_titre,dc_encoding);
						
						$n_content =
						sprintf(__('Comment for entry %s'),$n_titre)."\n\n".
						sprintf(__('By: %s'),$c_nom.(($c_mail!='') ? ' <'.$c_mail.'>' : ''))."\n".
						sprintf(__('Website: %s'),$c_site)."\n".
						"\n".str_replace("\r",'',$c_content)."\n\n".
						"--\n".
						'http://'.$_SERVER['HTTP_HOST'].$news->getPermURL();
						
						if (isset($_SERVER['REMOTE_ADDR'])) {
							$client_ip = $_SERVER['REMOTE_ADDR'];
						} else {
							$client_ip = "unknown";
						}
						
						$n_headers =
						'From: '.$n_mail."\r\n".
						(($c_mail!='') ? 'Reply-To: '.$c_mail."\r\n" : '').
						'Content-Type: text/plain; charset='.dc_encoding.";\r\n".
						"X-Mailer: DotClear\r\n".
						'X-Blog: http://'.$_SERVER['HTTP_HOST'].dc_blog_url."\r\n".
						'X-Client: '.$client_ip."\r\n";
						
						@mail($n_mail,$n_subject,$n_content,$n_headers);
					}
					
					$redir = $_POST['redir'].(strpos($_POST['redir'],'?') ? '&' : '?').'cos=1';
					header('Location: '.$redir);
					exit;
				}
			}
		}
		
		# Message si modération
		if (!empty($_GET['cos']) && dc_comments_pub == 0) {
			$form_msg = __('Your comment has been sent '.
			'successfully. It will be online soon.');
		}
		
		$comments = $blog->getComments($post_id);
		$trackbacks = $comments->extractTrackbacks();
		
		$rs_prev = $blog->getNextID($news->getTS(),-1);
		$rs_next = $blog->getNextID($news->getTS(),1);
	}
}
elseif($mode == 'search')
{
	# Résultat de recherche
	$news = $blog->searchPost($_GET['q']);
	
	if ($news->isEmpty()) {
		$err_msg =
		'<p>'.
		sprintf(__('Search of %s doesn\'t give any result.'),
		'<em>'.htmlspecialchars($_GET['q']).'</em>').
		'</p>';
	}
}
?>