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

# Reord
if (!empty($_GET['reord']))
{
	if ($blog->reordCats(false,true) === false) {
		$err = $blog->error(1);
	} else {
		header('Location: cat_list.php');
		exit;
	}
}

# Classic ord
if (isset($_POST['catOrd']) && is_array($_POST['catOrd']))
{
	if ($blog->ordCats($_POST['catOrd']) === false) {
		$err = $blog->error(1);
	} else {
		header('Location: cat_list.php');
		exit;
	}
}

# DragNdrop
if (!empty($_POST['dndSort']))
{
	$catOrd = array();
	foreach (explode(';',$_POST['dndSort']) as $k => $v) {
		$catOrd[substr($v,3)] = $k;
	}
	
	if ($blog->ordCats($catOrd) === false) {
		$err = $blog->error(1);
	} else {
		header('Location: cat_list.php');
		exit;
	}
}

$mySubMenu->addItem('<strong>'.__('New category').'</strong>','categorie.php','images/ico_new.png',false);

openPage(__('Categories list'),
'  <script type="text/javascript" src="js/drag.js"></script>'.
'  <script type="text/javascript" src="js/dragsort.js"></script>'.
'  <script type="text/javascript">'."\n".
'  if (document.getElementById) { '."\n".
'    window.onload = function() { '."\n".
'    dragSort.dest = document.getElementById(\'dndSort\');'."\n".
'    dragSort.makeElementSortable(document.getElementById(\'sortcat\'));'."\n".
'    };'."\n".
'  }'."\n".
'</script>');
?>
<h2><?php echo __('Categories list'); ?></h2>

<?php
if ($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		$err.'</div>';
}

$rsCat = $blog->getCat('','cat_ord');

if ($rsCat->isEmpty())
{
	echo '<p>'.__('No category yet').'</p>';
}
else
{
	echo '<p>'.__('Drag items to change their positions.').'</p>';
	echo '<form action="cat_list.php" method="post">';
	
	echo '<div id="sortcat">';
	while(!$rsCat->EOF())
	{
		$cat_id = $rsCat->field('cat_id');
		$cat_ord = $rsCat->field('cat_ord');
		$cat_libelle = $rsCat->field('cat_libelle');
		$cat_nb_post = (integer) $rsCat->field('nb_post');
		
		echo
		'<div class="sort" id="dnd'.$cat_id.'">'.
		'<p><strong><a href="categorie.php?cat_id='.$cat_id.'">'.
		$cat_libelle.'</a></strong> - ';
		
		if ($cat_nb_post > 0)
		{
			echo '<a href="index.php?cat_id='.$cat_id.'">'.
			(($cat_nb_post>1) ? sprintf(__('%d entries'),$cat_nb_post) : sprintf(__('%d entry'),$cat_nb_post)).
			'</a>';
		}
		else
		{
			echo '<a href="categorie.php?cat_id='.$cat_id.'&amp;del=1" '.
			' onclick="return window.confirm(\''.__('Are you sure you want to delete this category?').'\')">'.
			__('delete').'</a>';
		}
		
		echo
		'</p>'.
		'<p class="nojsfield"><label for="catOrd'.$cat_id.'" class="inline">'.__('Position').' : </label>'.
		form::field(array('catOrd['.$cat_id.']','catOrd'.$cat_id),3,3,$cat_ord).'</p>'.
		'</div>';
		
		$rsCat->moveNext();
	}
	
	echo
	'</div>'.
	'<p><input type="hidden" id="dndSort" name="dndSort" value="" />'.
	'<input type="submit" class="submit" value="'.__('save order').'" /></p>'.
	'</form>';
	
	echo '<p><a href="cat_list.php?reord=1">'.__('Reorder categories').'</a></p>';
}
?>
<?php closePage(); ?>
