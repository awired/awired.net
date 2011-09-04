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

$id = $_REQUEST['id'];

$strReq = 'SELECT title '.
		'FROM '.$blogroll->table.' '.
		'WHERE link_id = '.$id; 
$rs = $con->select($strReq);

$c_title = $rs->f('title');

if (!$rs->isEmpty() && $action == 'edit_cat')
{
	$c_title = trim($_POST['l_title']);
	
	if ($c_title)
	{
		if ($blogroll->updCat($id,$c_title) == false) {
			$err = $blogroll->con->error();
		} else {
			header('Location: '.$url);
			exit;
		}
	}
}

# Affichage
$mySubMenu->addItem(
	'<strong>'.__('Back').'</strong>',array($url),$icon,false);


buffer::str('<h2>'.__('Edit rubric').'</h2>');

if ($err != '') {
	buffer::str(
	'<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
	'<p>'.$err.'</p>'.
	'</div>'
	);
}

if ($rs->isEmpty())
{
	buffer::str('<p>'.__('No link').'</p>');
}
else
{
	buffer::str(
	'<form action="'.$url.'" method="post">'.
	'<fieldset><legend>'.__('Edit rubric').'</legend>'.
	
	'<p class="field"><strong>'.
	'<label for="l_title" class="float">'.__('Title').' : </label></strong>'.
	form::field('l_title',40,255,htmlspecialchars($c_title)).'</p>'.
	
	
	'<p>'.form::hidden('action','edit_cat').
	form::hidden('page','edit_cat').
	form::hidden('id',$id).
	'<input type="submit" class="submit" value="'.__('save').'"/></p>'.
	'</fieldset>'.
	'</form>'
	);
}

?>
