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
require dirname(__FILE__).'/../inc/libs/lib.buffer.php';

if (!empty($_GET['logout'])) {
	$_SESSION = array();
}

$auth->check(9);

include dirname(__FILE__).'/inc/connexion.php';

$plugins_root = dirname(__FILE__).'/tools/';

$plugins = new plugins($plugins_root);
$plugins->getPlugins(true);
$plugins_list = $plugins->getPluginsList();

$PLUGIN_HEAD = '';
$PLUGIN_BODY = '';

if ((!empty($_REQUEST['p']) && !empty($plugins_list[$_REQUEST['p']])
&& $plugins_list[$_REQUEST['p']]['active']))
{
	$p = $_REQUEST['p'];
	$plugins->loadl10n($p);
	buffer::init();
	include $plugins_root.$p.'/index.php';
	$PLUGIN_BODY = buffer::getContent();
	buffer::clean();
	
	$mySubMenu->addItem(__('Back to tools'),'tools.php',
	'images/ico_retour.png',false);
}

openPage(__('Tools'),$PLUGIN_HEAD);
if ($PLUGIN_BODY != '')
{
	echo $PLUGIN_BODY;
}
else
{
	echo '<h2>'.__('Tools').'</h2>';

	if (count($plugins_list) == 0)
	{
		echo '<p>Aucun outil n\'est disponible ou actif</p>';
	}
	else
	{
		# Traduction des plugins
		foreach ($plugins_list as $k => $v)
		{
			$plugins->loadl10n($k);
			
			$plugins_list[$k]['label'] = __($v['label']);
			$plugins_list[$k]['desc'] = __($v['desc']);
		}
		
		# Tri des plugins par leur nom
		uasort($plugins_list,create_function('$a,$b','return strcmp($a["label"],$b["label"]);'));
		
		# Liste des plugins
		echo '<dl class="plugin-list">';
		foreach ($plugins_list as $k => $v)
		{
			$plink = '<a href="tools.php?p='.$k.'">%s</a>';
			$plabel = (!empty($v['label'])) ? $v['label'] : $v['name'];
			
			echo '<dt>';
			if (file_exists($plugins_root.$k.'/icon.png')) {
				printf($plink,'<img alt="" src="tools/'.$k.'/icon.png" />');
				echo ' ';
			}
			
			printf($plink,$plabel);
			echo '</dt>';
			
			echo '<dd>'.$v['desc'].'</dd>';
		}
		echo '</dl>';
	}
}
closePage();
?>
