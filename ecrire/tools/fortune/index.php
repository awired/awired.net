<?php
# Plug-in Fortune pour Dotclear
# Copyright (C) 2004 Alexandre PASSANT <alex@passant.org>
# Realeased under GPL version 2 or later, see LICENSE file
# or <http://www.gnu.org/copyleft/gpl.html>

require dirname(__FILE__) . '/functions.php';

buffer::str("<h2>Fortune</h2>");

// Ajout d'un fichier fortune
if ($_FILES)
{
	$add = dcFortune::addFortune($_FILES['fortune']);
	if ($add)
	{
		buffer::str('<h4>'.__('Inserted!').'</h4>');
	}
	else
	{
		buffer::str('<h4>'.__('Error while adding the fortune file:').' '.$con->error().'</h4>');
	}
}

// Suppression d'un fichier fortune
elseif (isset($_GET['del']))
{
	if (dcFortune::delFortune($_GET['del']))
	{
		buffer::str('<h4>'.__('Deleted!').'</h4>');
	}
	else
	{
		buffer::str('<h4>'.__('Error while deleting the fortune file:').' '.$con->error().'</h4>');
	}
}

// Affichage et lien de suppression
$fortunes = dcFortune::getAllFortunes();
buffer::str('<h3>'.__('Fortunes list').' ('.count($fortunes).')</h3>
<ul>');
foreach ($fortunes as $fortune)
{
	buffer::str(' <li>'.$fortune.' [<a href="tools.php?p=fortune&amp;del='.$fortune.'">'.__('delete').'</a>]</li>');
}
buffer::str('</ul>');

// Formulaire d'ajout
buffer::str('<h3 id="new">'.__('Add a fortune file').'</h3>
<form action="tools.php?p=fortune" method="post" enctype="multipart/form-data"> 
 <p>
  <label for="attribution" style="display: inline; font-weight: bold; margin-right: 5px;">'.__('File').':</label>
  <input type="file" name="fortune" id="fortune"/>
 </p>
 <p style="text-align: left"><input type="submit" name="add" value="'.__('Add').'" /></p>
</form>');

// Droits d'accès
buffer::str('<h3>'.__('Files informations').'</h3>');
$img_check = '<img src="images/check_%s.png" alt="" />';
if (is_writable(PATH))
{
	buffer::str('<p>'.sprintf($img_check,'on').' '.
	sprintf(__('Directory %s is writable.'), DC_ECRIRE.'/tools/fortune/var/').
	'</p>');
} 
else 
{
	buffer::str('<p>'.sprintf($img_check,'off').' '.
	sprintf(__('Directory %s is not writable.'), DC_ECRIRE.'/tools/fortune/var/').
	'</p>');
}

// Utilisation
buffer::str('<h3>'.__('Usage').'</h3>
<p>'.__('The template function to display a random quote from the database is:').' <code>dcFortune::afficher()</code>.</p>');
																								
?>
