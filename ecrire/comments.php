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
require dirname(__FILE__).'/../inc/classes/class.multipage.php';

$auth->check(1);

include dirname(__FILE__).'/inc/connexion.php';

# Mise hors ligne d'un commentaire
if (!empty($_GET['com_id']))
{
	$_GET['com_id'] = (integer)$_GET['com_id'];
	if (isset($_GET['cancel']))	{
		if ($blog->statusComment((integer)$_GET['com_id']) !== false)
		{
			$redir = 'comments.php';
			$redir .= (!empty($_GET['env'])) ? '?env='.(integer)$_GET['env'] : '';
			header('Location: '.$redir);
			exit;
		}
	}
}

$nb_per_page = 30;
$nb_comments = $blog->getNbComments();

$max_pages = ceil($nb_comments/$nb_per_page);
$env = (!empty($_GET['env']) && (integer)$_GET['env'] <= $max_pages) ? (integer)$_GET['env'] : 1;

$comments = $blog->getComments('','DESC',(($env-1)*$nb_per_page).','.$nb_per_page);

# Pour voir ou cacher les commentaires
$js_openCloseAll = $h_script = '';
if (!$comments->isEmpty())
{
	$h_script =
	'<script type="text/javascript">'."\n".
	"js_comments_ids = new Array('".implode("','",$comments->getIDs('comment'))."');\n".
	//"window.onload = function() { mOpenClose(js_comments_ids,-1); }\n".
	"</script>\n";
	
	$js_openCloseAll =
	'<p class="small"><a href="#" onclick="mOpenClose(js_comments_ids,1)">'.__('show all').'</a> - '.
	'<a href="#" onclick="mOpenClose(js_comments_ids,-1)">'.__('hide all').'</a></p>';
}

# Ligne pour afficher un commentaire
function ligne_comment($data,$i)
{
	$comment_id = $data['comment_id'];
	$comment_dt = $data['comment_dt'];
	$comment_auteur = $data['comment_auteur'];
	$comment_email = $data['comment_email'];
	$comment_site = $data['comment_site'];
	$comment_content = $data['comment_content'];
	$comment_pub = $data['comment_pub'];
	$comment_ip = $data['comment_ip'];
	$comment_trackback = $data['comment_trackback'];
	$post_titre = $data['post_titre'];
	$post_id = $data['post_id'];
	$comment_date = date('d/m/Y H:i',strtotime($comment_dt));
	
	if($comment_pub)
	{
		$com_cancel = __('set offline');
		$com_style = '';
		$com_img = '<img src="images/check_on.png" '.
				'alt="'.__('This comment is online').'" class="status" /> ';
		
	}
	else
	{
		$com_cancel = __('set online');
		$com_style = ' cancel';
		$com_img = '<img src="images/check_off.png" '.
				'alt="'.__('This comment is offline').'" class="status" /> ';
	}
	
	$str_tb = ($comment_trackback == 1) ? ' - <strong>trackback</strong>' : '';
	
	$cancel_url = htmlspecialchars($_SERVER['REQUEST_URI']);
	$cancel_url .= (strpos($cancel_url,'?') !== false) ? '&amp;' : '?';
	$cancel_url .= 'com_id='.$comment_id.'&amp;cancel=1';
	
	
	$res = '<div class="ligne'.$com_style.'">'.
		'<h3 class="ligneTitre">'.$com_img.
		'<a href="#" onclick="openClose(\'comment'.$comment_id.'\',0); return false;">'.
		'<img src="images/plus.png" id="img_comment'.$comment_id.'" '.
		'alt="'.__('show/hide').'" title="'.__('show/hide').'" /></a>&nbsp;&nbsp;'.
		'<a href="poster.php?post_id='.$post_id.'#c'.$comment_id.'">'.
		$post_titre.'</a>'.$str_tb.
		' - <a style="font-weight: normal;" href="'.$cancel_url.'">'.$com_cancel.'</a>'.
		'</h3>'.
		'<p class="ligneInfo">'.$comment_date.' - '.$comment_auteur.'</p>';
	
	$res .= '<div id="comment'.$comment_id.'" class="comment" style="display:none">'.
		$comment_content.'</div>';
	
	$res .= '</div>';
	
	return $res;
}

# Affichage
openPage(__('Comments'),$h_script);

echo '<h2>'.__('Comments').'</h2>';
echo '<p>'.__('Comments listed from most recent to oldest').'</p>';

$lum = new multipage($env,'ligne_comment',$comments->getData(),$nb_comments,$nb_per_page);

$lum->setOption('html_block','%s');
$lum->setOption('html_row','%s');
$lum->setOption('html_cell','%s');

$lum->setOption('html_links','<p>'.__('Page(s)').' : %s</p>');
$lum->setOption('html_cur_page','<strong>%s</strong>');

$lum->setOption('html_prev','&lt;'.__('prev. page'));
$lum->setOption('html_next',__('next page').'&gt;');
$lum->setOption('html_prev_grp','...');
$lum->setOption('html_next_grp','...');

$lum->setOption('html_empty','<p><strong>'.__('No comment yet').'</strong></p>');

echo $lum->getLinks();
echo $js_openCloseAll;
echo $lum->getPage();
echo $lum->getLinks();

closePage();
?>