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

$auth->check(9);

include dirname(__FILE__).'/inc/connexion.php';

$mySubMenu->addItem('<strong>'.__('New editor').'</strong>','redacteur.php','images/ico_new.png',false);

openPage(__('List of editors'));

echo '<h2>'.__('List of editors').'</h2>';

$rsUser = $blog->getUser();

while(!$rsUser->EOF())
{
	$user_level = $rsUser->field('user_level');
	$user_nb_post = $rsUser->field('nb_post');
		
	if ($user_level == 9) {
		$user_level = __('administrator');
	} elseif ($user_level == 5) {
		$user_level = __('advanced editor');
	} elseif ($user_level == 1) {
		$user_level = __('editor');
	} elseif ($user_level == 0) {
		$user_level = __('inactive');
	}
	
	$style = ($rsUser->f('user_level') == 0) ? ' style="color:#999;"' : '';
	
	echo '<div class="ligne clear"'.$style.'>'.
		'<h3 class="ligneTitre">'.$rsUser->field('user_id').'</h3>'.
		'<p class="semi">'.
		$rsUser->field('user_prenom').' '.$rsUser->field('user_nom').
		' ('.$user_level.')'.
		' [ <strong><a href="redacteur.php?id='.rawurlencode($rsUser->field('user_id')).'">'.
		__('edit').'</a></strong> - ';
	
	if ($user_nb_post > 0) {
		echo $user_nb_post.' billet';
		echo ($user_nb_post > 1) ? 's' : '';
	} else {
		echo '<a href="redacteur.php?id='.rawurlencode($rsUser->field('user_id')).'&amp;del=1"'.
		'onclick="return window.confirm(\''.__('Are you sure you want to delete this editor?').'\')">'.
		__('delete').'</a>';
	}
	
	echo ' ]</p></div>';
	
	$rsUser->moveNext();
}

closePage();
?>