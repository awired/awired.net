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

$auth->check(1);

include dirname(__FILE__).'/inc/connexion.php';

$p = (!empty($_GET['p'])) ? $_GET['p'] : 'index';
$p = preg_replace('/[.]{2,}/','',$p);

$plugin = (!empty($_GET['plugin'])) ? $_GET['plugin'] : '';
$plugin = preg_replace('/[.]{2,}/','',$plugin);

if ($plugin != '' && is_dir(dirname(__FILE__).'/tools/'.$plugin)) {
	$plugin = '/tools/'.$plugin;
} else {
	$plugin = '';
}

$page_title = '';
$page_content = '<p>No file</p>';

$help_path = dirname(__FILE__).$plugin.'/help/';
$content = l10n::getHtmlFile($help_path,$p.'.html',DC_LANG,dc_encoding);

if (preg_match('|<title[^>]*?>(.*?)</title>.*<body[^>]*?>(.*?)</body>|ms',
	$content,$matches)) {
	$page_title = $matches[1];
	$page_content = $matches[2];
}

openPopup($page_title.' - '.__('help'));

echo $page_content;

closePopup();
?>