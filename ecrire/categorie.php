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

$auth->check(5);

include dirname(__FILE__).'/inc/connexion.php';

$err = '';
$cat_libelle = '';
$cat_libelle_url = '';
$cat_desc = '';

# Edition d'une catégorie
if (!empty($_REQUEST['cat_id']))
{
	$rsCat = $blog->getCat($_REQUEST['cat_id']);
	
	$cat_libelle = $rsCat->field('cat_libelle');
	$cat_libelle_url = $rsCat->field('cat_libelle_url');
	$cat_desc = $rsCat->field('cat_desc');
	$cat_id = $rsCat->field('cat_id');
	
	# Suppression
	if (!empty($_GET['del']))
	{
		if ($blog->delCat($cat_id) !== false) {
			$msg = __('Category has been deleted');
			header('Location: cat_list.php?msg='.rawurlencode($msg));
			exit;
		} else {
			$msg = __('Cannot delete category');
			header('Location: cat_list.php?msg='.rawurlencode($msg));
		}
	}
	
	# Modification
	if (!empty($_POST['submit']) && $cat_id)
	{
		$cat_libelle = $_POST['cat_libelle'];
		$cat_libelle_url = $_POST['cat_libelle_url'];
		$cat_desc = $_POST['cat_desc'];
		
		if ($blog->updCat($cat_id,$cat_libelle,$cat_desc,$cat_libelle_url) !== false) {
			$msg = __('Category has been updated');
			header('Location: cat_list.php?msg='.rawurlencode($msg));
			exit;
		} else {
			$err = $blog->error(1);
		}
	}
}
# Ajout d'une catégorie
elseif (!empty($_POST['submit']))
{
	$cat_libelle = $_POST['cat_libelle'];
	$cat_libelle_url = $_POST['cat_libelle_url'];
	$cat_desc = $_POST['cat_desc'];
	
	if ($blog->addCat($cat_libelle,$cat_desc,$cat_libelle_url) !== false) {
			$msg = __('Category has been created');
			header('Location: cat_list.php?msg='.rawurlencode($msg));
			exit;
		} else {
			$err = $blog->error(1);
		}
}

openPage(__('Category'));

if ($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		$err.'</div>';
}

echo
'<p><strong><a href="cat_list.php">'.__('Back').'</a></strong></p>'.
'<h2>'.__('Category').'</h2>'.

'<form action="categorie.php" method="post">'.
'<p><label for="cat_libelle"><strong>'.__('Title').'&nbsp;: </strong> '.
helpLink('category','title').'</label>'.
form::field('cat_libelle',40,255,$cat_libelle,'','class="max"').'</p>'.

'<p><label for="cat_libelle_url"><strong>'.__('URLed title').'</strong>&nbsp;: '.
helpLink('category','title_url').' <a href="#" '.
'onclick="document.forms[0].cat_libelle_url.value=str2url(document.forms[0].cat_libelle.value,\''.dc_encoding.'\',1); return false;">'.
__('Use').'</a></label>'.
form::field('cat_libelle_url',40,255,$cat_libelle_url,'','class="max"').'</p>'.

'<p><label for="cat_desc">'.__('Description').' ('.__('optional').')&nbsp;: '.
helpLink('category','description').'</label>'.
form::textArea('cat_desc',60,8,htmlspecialchars($cat_desc),'','class="max"').
'</p>'.

'<p><input class="submit" type="submit" name="submit" value="'.__('save').'" />'.
((!empty($cat_id)) ? form::hidden('cat_id',$cat_id) : '').
'</p>'.
'</form>';

closePage(); ?>