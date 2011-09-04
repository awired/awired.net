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

define('STEP',6);
require dirname(__FILE__).'/prepend.php';

$p_location = preg_replace('|/install/ini-file.php$|','',$_SERVER['REQUEST_URI']);
$p_blog_name = __('My first weblog');
$p_url_scan = 'query_string';

# Liste des url_scan
$url_scan_list = array(
	'Query string' => 'query_string',
	'Path info' => 'path_info'
);

$done = false;
$err = '';

if (!empty($_POST['inifile'])) {
	$p_location = trim($_POST['p_location']);
	$p_blog_name = trim($_POST['p_blog_name']);
	$p_url_scan = trim($_POST['p_url_scan']);
	
	# Création de conf/dotclear.ini
	$ini_file = dirname(__FILE__).'/../conf/dotclear.ini';
	copy($ini_file.'.in',$ini_file);
	@unlink($ini_file.'.in');
	chmod($ini_file,0666);
	
	$objIni = new iniFile(dirname(__FILE__).'/../conf/dotclear.ini');
	
	if ($p_url_scan == 'path_info') {
		$objIni->editVar('dc_blog_url',$p_location.'/index.php/');
	} else {
		$objIni->editVar('dc_blog_url',$p_location.'/index.php');
	}
	
	$objIni->editVar('dc_app_url',$p_location);
	$objIni->editVar('dc_blog_rss',$p_location.'/rss.php');
	$objIni->editVar('dc_blog_atom',$p_location.'/atom.php');
	$objIni->editVar('dc_trackback_uri',$p_location.'/tb.php');
	$objIni->editVar('dc_img_url',$p_location.'/images/');
	
	$objIni->editVar('dc_blog_name',$p_blog_name);
	$objIni->editVar('dc_url_scan',$p_url_scan);
	$objIni->editVar('dc_encoding',ENCODING);
	
	if ($objIni->saveFile() === false) {
		$err = '<p class="important">'.__('Unable to write dotclear.ini').'</p>';
	} else {
		$done = true;
		$ses->reg('step',7);
	}
}

require dirname(__FILE__).'/__top.php';

echo '<h2>'.__('Blog configuration').'</h2>';

echo $err;

if ($done)
{
	echo '<p>'.__('Weblog successfully configured').'</p>';
	echo
	'<form action="end-install.php" method="post">'.
	'<p><input type="submit" class="submit" value="'.__('End installation').' &#187;" /></p>'.
	'</form>';
}
else
{
	echo
	'<form action="ini-file.php" method="post">'.
	'<p>'.sprintf(__('DotClear needs to know in which directory it has been '.
	'installed. For example, if DotClear has been installed in %s/dotclear, '.
	'then please type "/dotclear" in the field below:'),$_SERVER['HTTP_HOST']).'</p>'.
	'<p class="field"><label class="float" for="p_location">'.__('DotClear location').' :</label> '.
	form::field('p_location',30,512,$p_location).'</p>'.
	
	'<p class="field"><label class="float" for="p_blog_name">'.__('Your blog\'s name').' :</label> '.
	form::field('p_blog_name',30,255,$p_blog_name).'</p>'.
	
	'<p class="field">'.__('Your blog archive addresses (permalinks) may be '.
	'displayed in various formats. The "Query string" URLs will be displayed '.
	'as "index.php?/2002/04". The "Path info" URLs will be displayed as '.
	'"index.php/2002/04" (preferred method for search engine optimization). '.
	'And the "Get" URLs will be displayed as "index.php?d=2002/04" (only for '.
	'mod_rewrite fans).').'</p>'.
	'<p>'.__('Please note that "Path info" type could be broken on some Web '.
	'hosting configurations.').'</p>'.
	'<p class="field"><label class="float" for="p_url_scan">'.__('URLs format').' :</label> '.
	form::combo('p_url_scan',$url_scan_list,$p_url_scan).'</p>'.
	'<p><input type="submit" class="submit" value="'.__('Save').' &#187;" />'.
	form::hidden('inifile',1).'</p>'.
	'</form>';
}
?>

<?php require dirname(__FILE__).'/__bottom.php'; ?>