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

$strReq = 'SELECT link_id, label, href, title, lang, rel '.
		'FROM '.$blogroll->table.' '.
		'WHERE link_id = '.$id; 
$rs = $con->select($strReq);

$l_label = $rs->f('label');
$l_href = $rs->f('href');
$l_title = $rs->f('title');
$l_lang = $rs->f('lang');
$l_rel = $rs->f('rel');

if (!$rs->isEmpty() && $action == 'edit_link')
{
	$l_label = trim($_POST['l_label']);
	$l_title = trim($_POST['l_title']);
	$l_href = trim($_POST['l_href']);
	$l_lang = trim($_POST['l_lang']);
	
	if (!$l_label || !$l_href)
	{
		$err = __('You must provide at least a label and an URL');
	}
	else
	{

		$rel = '';
		
		if (isSet($_POST['identity']))
			$rel .= $_POST['identity'];

		else {
			if(isSet($_POST['friendship']))		$rel .= ' '.$_POST['friendship'];
			if(isSet($_POST['physical']))		$rel .= ' met';
			if(isSet($_POST['professional']))	$rel .= ' '.implode(' ',$_POST['professional']);
			if(isSet($_POST['geographical']))	$rel .= ' '.$_POST['geographical'];
			if(isSet($_POST['family']))			$rel .= ' '.$_POST['family'];
			if(isSet($_POST['romantic']))		$rel .= ' '.implode(' ',$_POST['romantic']);
		}

		if ($blogroll->updLink($id,$l_label,$l_href,$l_title,$l_lang, $rel) == false) {
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

buffer::str('<h2>'.__('Edit link').'</h2>');

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
	'<fieldset><legend>'.__('Edit link').'</legend>'.
	'<p class="field"><strong>'.
	'<label for="l_label" class="float">'.__('Label').' : </label></strong>'.
	form::field('l_label',40,255,htmlspecialchars($l_label)).'</p>'.
	
	'<p class="field"><strong>'.
	'<label for="l_href" class="float">'.__('URL').' : </label></strong>'.
	form::field('l_href',40,255,htmlspecialchars($l_href)).'</p>'.
	
	'<p class="field">'.
	'<label for="l_title" class="float">'.__('Description').' ('.__('optional').') : </label>'.
	form::field('l_title',40,255,htmlspecialchars($l_title)).'</p>'.
	
	'<p class="field">'.
	'<label for="l_lang" class="float">'.__('Language').' ('.__('optional').') : </label>'.
	form::field('l_lang',2,2,htmlspecialchars($l_lang)) . '</p>'.
	
	'<p>'.form::hidden('action','edit_link').
	form::hidden('page','edit_link').
	form::hidden('id',$id).
	'<input type="submit" class="submit" value="'.__('save').'"/></p>'.
	'</fieldset>'.

	'<fieldset><legend>'.__('XFN').'</legend>'.

	'<p class="field">'.
	'<label class="float">'.__('Me').'</label>'.
	form::checkbox('identity', 'me', ($l_rel == 'me')).__('Another link for myself').'</p>'.
	
	'<p class="field">'.
	'<label class="float">'.__('Friendship').'</label>'.
	form::radio('friendship', 'contact', (strpos($l_rel, 'contact'))).__('Contact').
	form::radio('friendship', 'acquaintance', (strpos($l_rel, 'acquaintance'))).__('Acquaintance').
	form::radio('friendship', 'friend', (strpos($l_rel, 'friend'))).__('Friend').
	form::radio('friendship', '').__('None').
	'</p>'.

	'<p class="field">'.
	'<label class="float">'.__('Physical').'</label>'.
	form::checkbox('physical', 'met', (strpos($l_rel, 'met'))).__('Met').
	'</p>'.

	'<p class="field">'.
	'<label class="float">'.__('Professional').'</label>'.
	form::checkbox('professional[1]', 'co-worker', (strpos($l_rel, 'co-worker'))).__('Co-worker').
	form::checkbox('professional[2]', 'colleague', (strpos($l_rel, 'colleague'))).__('Colleague').
	'</p>'.

	'<p class="field">'.
	'<label class="float">'.__('Geographical').'</label>'.
	form::radio('geographical', 'co-resident', (strpos($l_rel, 'co-resident'))).__('Co-resident').
	form::radio('geographical', 'neighbor', (strpos($l_rel, 'neighbor'))).__('Neighbor').
	form::radio('geographical', '').__('None').
	'</p>'.

	'<p class="field">'.
	'<label class="float">'.__('Family').'</label>'.
	form::radio('family', 'child', (strpos($l_rel, 'child'))).__('Child').
	form::radio('family', 'parent', (strpos($l_rel, 'parent'))).__('Parent').
	form::radio('family', 'sibling', (strpos($l_rel, 'sibling'))).__('Sibling').
	form::radio('family', 'spouse', (strpos($l_rel, 'spouse'))).__('Spouse').
	form::radio('family', 'kin', (strpos($l_rel, 'kin'))).__('Kin').
	form::radio('family', '').__('None').
	'</p>'.

	'<p class="field">'.
	'<label class="float">'.__('Romantic').'</label>'.
	form::checkbox('romantic[1]', 'muse', (strpos($l_rel, 'muse'))).__('Muse').
	form::checkbox('romantic[2]', 'crush', (strpos($l_rel, 'crush'))).__('Crush').
	form::checkbox('romantic[3]', 'date', (strpos($l_rel, 'date'))).__('Date').
	form::checkbox('romantic[4]', 'sweetheart', (strpos($l_rel, 'sweetheart'))).__('Sweetheart').
	'</p>'.
	'</fieldset>'.

	'</form>'
	);
}

?>
