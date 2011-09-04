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

# Tableau des mois de l'année
for ($i=1;$i<=12;$i++) {
	$m = sprintf('%02d',$i);
	$arry_dt_m[dt::str('%B',strtotime('2000-'.$m.'-01'))] = $m;
}

# Les catégories du blog
$cat_id = (!empty($_GET['cat_id'])) ? $_GET['cat_id'] : '';

$rsCat = $blog->getCat();
while (!$rsCat->EOF())
{
	$arry_cat[$rsCat->f('cat_libelle')] = $rsCat->f('cat_id');
	$rsCat->moveNext();
}

# Valeurs par défaut
$err = '';
$titre = '';
$titre_url = '';
$cat_id = $_SESSION['sess_user_pref_cat'];
$dt_m = $dt_d = $dt_y = '';
$chapo = $preview_chapo = '';
$content = $preview_content = '';
$notes = '';
$is_editable = true;
$format = $_SESSION['sess_user_format'];
$etat = $_SESSION['sess_user_post_pub'];
$open_comment = 1;
$open_tb = 1;
$lang = DC_LANG;
$selected = 0;
$return_link = 'index.php';
$do_trackbacks = false;

$objWiki = new wiki2xhtml();
if (dc_encoding != 'UTF-8') {
	$objWiki->setOpt('active_fix_word_entities',1);
}

# Billet existant
if (!empty($_REQUEST['post_id']))
{
	$post = $blog->getPostById($_REQUEST['post_id']);
	if (!$post->isEmpty())
	{
		$post_id = $post->f('post_id');
		$titre = $post->f('post_titre');
		$titre_url = $post->f('post_titre_url');
		$cat_id = $post->f('cat_id');
		$format = $post->getFormat();
		$etat = (integer) $post->f('post_pub');
		$open_comment = (integer) $post->f('post_open_comment');
		$open_tb = (integer) $post->f('post_open_tb');
		$lang = $post->f('post_lang');
		$selected = $post->f('post_selected');
		$chapo = ($post->f('post_chapo_wiki') != '') ? $post->f('post_chapo_wiki') : $post->f('post_chapo');
		$preview_chapo = $post->f('post_chapo');
		$content = ($post->f('post_content_wiki') != '') ? $post->f('post_content_wiki') : $post->f('post_content');
		$notes = $post->f('post_notes');
		$preview_content = $post->f('post_content');
		$return_link = 'index.php?m='.$post->f('postyear').$post->f('postmonth').'#p'.$post_id;
		$post_ts = $post->getTS();
		$post_perm_url =  $post->getPermURL();
		$dt_y = date('Y',$post_ts);
		$dt_m = date('m',$post_ts);
		$dt_d = date('d',$post_ts);
		$dt_h = (string) date('H',$post_ts);
		$dt_i = (string) date('i',$post_ts);
		$dt_s = (string) date('s',$post_ts);
		
		$objWiki->setOpt('note_prefix','pnote-'.$post_id);
		
		$comments = $blog->getComments($post_id);
		
		# Le post n'est éditable que par un admin ou son rédacteur,
		# qu'on se le dise !
		if ($post->f('user_id') != $_SESSION['sess_user_id'] && $_SESSION['sess_user_level'] < 9) {
			$is_editable = false;
		}
		
		# Changement du status ou suppression d'un commentaire
		if (!empty($_GET['comment_id']))
		{
			if ($is_editable) {
				if (!empty($_GET['comment_del'])) {
					if ($blog->delComment($_GET['comment_id']) !== false) {
						header('Location: poster.php?post_id='.$post_id.'#comments');
						exit;
					} else {
						$err = $blog->error(1);
					}
				} else {				
					if ($blog->statusComment($_GET['comment_id']) !== false) {
						header('Location: poster.php?post_id='.$post_id.'#c'.$_GET['comment_id']);
						exit;
					} else {
						$err = $blog->error(1);
					}
				}
			} else {
				$err = '<ul><li>'.__('You are not allowed to edit a comment').'</li></ul>';
			}
		}
		
		# Ajout d'un commentaire
		if (!empty($_POST['add_comment']))
		{
               if ($blog->addComment($post_id,$_POST['com_nom'],
			$_POST['com_email'],$_POST['com_web'],$_POST['com_content']) !== false) {
				header('Location: poster.php?post_id='.$post_id.'#comments');
				exit;
			} else {
				$err = $blog->error(1);
			}
		}
		
		# Changement du status d'un billet
		if (!empty($_GET['cancel']) && $is_editable)
		{
			if ($blog->statusPost($post_id) !== false) {
				header('Location: '.$return_link);
				exit;
			} else {
				$err = $blog->error(1);
			}
		}
		
		# Suppression d'un billet
		if (!empty($_POST['delete']) && $is_editable)
		{
			if ($blog->delPost($post_id) !== false) {
				$msg = __('Entry successfully removed');
				header('Location: index.php?msg='.urlencode($msg));
				exit;
			} else {
				$err = $blog->error(1);
			}
		}
	}
}

# Valeurs pour la prévisualisation, la création ou la modification d'un billet
if (!empty($_POST['preview']) || !empty($_POST['publish']) || !empty($_POST['transform']))
{
	$titre = $_POST['p_titre'];
	$titre_url = $_POST['p_titre_url'];
	$cat_id = $_POST['p_cat'];
	$format = $_POST['p_format'];
	$etat = $_POST['p_etat'];
	$open_comment = $_POST['p_open_comment'];
	$open_tb = $_POST['p_open_tb'];
	$lang = $_POST['p_lang'];
	$selected = $_POST['p_selected'];
	$content = $_POST['p_content'];
	$notes = $_POST['p_notes'];
	$chapo = $_POST['p_chapo'];
	$do_trackbacks = !empty($_POST['p_do_trackbacks']) ? true : false;
	
	if (!empty($post_id))
	{
		$dt_y = (string) sprintf('%04d',$_POST['p_dt_y']);
		$dt_m = (string) sprintf('%02d',$_POST['p_dt_m']);
		$dt_d = (string) sprintf('%02d',$_POST['p_dt_d']);
		$dt_h = (string) sprintf('%02d',$_POST['p_dt_h']);
		$dt_i = (string) sprintf('%02d',$_POST['p_dt_i']);
		$dt_s = (string) sprintf('%02d',$_POST['p_dt_s']);
		
		# Corrections jour & heure
		if ($dt_d > 31 || $dt_d < 1) { $dt_d = '01'; }
		if ($dt_h > 23 || $dt_h < 0) { $dt_h = '00'; }
		if ($dt_i > 59 || $dt_i < 0) { $dt_i = '00'; }
		if ($dt_s > 59 || $dt_s < 0) { $dt_s = '00'; }
		
		$new_date = strtotime($dt_y.'-'.$dt_m.'-'.$dt_d.' '.$dt_h.':'.$dt_i.':'.$dt_s);
	}
	
	if (strpos($lang,'fr') === 0) {
		$objWiki->setOpt('active_fr_syntax',1);
	}
	
	if (!empty($_POST['transform'])) {
		$format = 'html';
		$content = $objWiki->transform($content);
		$chapo = $objWiki->transform($chapo);
	}
	
	if ($format == 'wiki') {
		$preview_content = $objWiki->transform($content);
		$preview_chapo = $objWiki->transform($chapo);
	} else {
		$preview_content = $content;
		$preview_chapo = $chapo;
	}
}

# Insertion ou modification d'un billet
if (!empty($_POST['publish']))
{
	# Insertion
	if (empty($post_id))
	{
		if (($post_id = $blog->addPost($_SESSION['sess_user_id'],$titre,$titre_url,$chapo,$content,
		$notes,$cat_id,$format,$etat,$open_comment,$open_tb,$lang,$selected,
		$_SESSION['sess_user_delta'])) !== false) {
			if ($do_trackbacks) {
				$return_link = 'trackback.php?post_id='.$post_id.'&auto=1';
			} else {
				$return_link = 'poster.php?post_id='.$post_id;
			}
			header('Location: '.$return_link);
			exit;
		} else {
			$err = $blog->error(1);
		}
	}
	else
	{
		if ($is_editable) {
			if ($blog->updPost($post_id,$titre,$titre_url,$chapo,$content,$notes,$cat_id,
			$format,$etat,$open_comment,$open_tb,$new_date,$lang,$selected,
			$_SESSION['sess_user_delta']) !== false ) {
				if ($do_trackbacks) {
					$return_link = 'trackback.php?post_id='.$post_id.'&auto=1';
				} else {
					$return_link = 'poster.php?post_id='.$post_id;
				}
				header('Location: '.$return_link);
				exit;
			} else {
				$err = $blog->error(1);
			}
		}
	}
}

# Création du sous-menu
$mySubMenu->addItem(__('Back to list of entries'),$return_link,'images/ico_retour.png',false);

if (!empty($content) && !empty($post_id) && 
empty($_POST['preview']) && empty($_POST['publish']) && $is_editable)
{
	$mySubMenu->addItem(
	__('New entry'),array('poster.php','accesskey="n"'),
	'images/ico_edit.png',false);
	
	$mySubMenu->addItem(
		__('XHTML validation'),
		array('validpost.php?post_id='.$post_id,'onclick="popup(this.href); return false;"'),
		'images/ico_ok.png',false);
	
	$mySubMenu->addItem(
		__('Trackbacks'),
		'trackback.php?post_id='.$post_id,
		'images/ico_link.png',false);
	
	$mySubMenu->addItem(
		__('View entry'),$post_perm_url,
		'images/ico_goto.png',false);
}


openPage(__('Entry'),
'<script type="text/javascript" src="js/form.js"></script>'."\n".
'<script type="text/javascript">'."\n".
"window.onload = function() {\n".
" openCloseOptions('moreOptions','dc_options');\n".
" getCurrentForms(); addFormsEvent();\n".
" closePagePrompt = '".str_replace("'","\'",__('You have unsaved changes.'))."';\n".
"}\n".
"window.onbeforeunload = confirmCloseForms;\n".
"</script>\n"
);

if ($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		$err.'</div>';
}

echo '<h2>'.__('Entry').'</h2>';

/* Entry preview
-------------------------------------------------------- */
if (!empty($content) && dc_show_previews)
{
	if (!empty($_POST['preview'])) {
		$preview_titre = htmlspecialchars($titre);
	} else {
		$preview_titre = $titre;
	}
	
	echo '<div class="cadre preview clear">'.
		'<h3>'.$titre.'</h3>'.
		((trim($preview_chapo) != '') ? $preview_chapo.'<hr class="thin" />' : '').
		$preview_content.'</div>';
	
	if (!empty($post_perm_url)) {
		echo '<p class="clear"><strong>'.
		__('Permanent link').'</strong>&nbsp;: '.
		util::getPageURL($post_perm_url).'</p>';
	}
}

if (!empty($_POST['preview'])) {
	$titre = htmlspecialchars($titre);
}

/* Valeurs pouvant être passées en URL par un bookmarklet
-------------------------------------------------------- */
if (!empty($_GET['dcb']))
{
	$purl = !empty($_GET['purl']) ? $_GET['purl'] : '';
	$ptitle = !empty($_GET['ptitle']) ? $_GET['ptitle'] : '';
	$ptext = !empty($_GET['ptext']) ? $_GET['ptext'] : '';
	
	$titre = $ptitle;
	
	if ($format == 'wiki') {
		$content = '['.$ptitle.'|'.$purl."]\n\n".$ptext;
	} else {
		$content = '<a href="'.$purl.'">'.$ptitle."</a>\n\n<p>".$ptext.'</p>';
	}
	
}


/* Entry form
-------------------------------------------------------- */
if ($is_editable)
{
	echo '<form action="poster.php" method="post" id="formPost">';
	
	echo '<table class="clear post-entry-info">';
	echo
	'<tr><td><label for="p_cat">'.
	__('Category').' '.helpLink('entry','category').'</label></td> '.
	'<td>'.form::combo('p_cat',$arry_cat,$cat_id,'','',1).'</td>';
	
	echo
	'<td><label for="p_format">'.
	__('Format').' '.helpLink('entry','format').'</label></td> '.
	'<td>'.form::combo('p_format',array('HTML'=>'html','Wiki'=>'wiki'),$format,'','',2).'</td>';
	
	echo
	'<td><label for="p_etat">'.
	__('Status').' '.helpLink('entry','status').'</label></td> '.
	'<td>'.form::combo('p_etat',array(__('Online')=>'1',__('Offline')=>'0'),$etat,'','',3).'</td></tr>';
	
	echo '</table>';
	
	echo
	'<p><label for="p_titre"><strong>'.__('Title').'</strong> '.
	helpLink('entry','title').'</label> '.
	form::field('p_titre',30,255,$titre,4,'class="max"').'</p>';
	
	echo
	'<p><label for="p_chapo">'.__('Abstract').' ('.__('optional').') '.
	helpLink('entry','abstract').'</label> '.
	form::textArea('p_chapo',60,4,htmlspecialchars($chapo),5,'class="max"').'</p>';
	
	echo
	'<p>'.
	'<label for="p_content"><strong>'.__('Entry').' '.helpLink('entry','entry').'</strong>'.
	' - '.helpLink('wiki2xhtml','',__('Wiki formatting rules')).'</label>'.
	'</p>'.
	
	'<p>'.form::textArea('p_content',60,$_SESSION['sess_user_edit_size'],
	htmlspecialchars($content),6,'class="max"').'</p>';
	
	# Toolbar
	echo
	'<script type="text/javascript" src="js/toolbar.js"></script>'.
	'<script type="text/javascript">'.
	"if (document.getElementById) {
		var tb = new dcToolBar(document.getElementById('p_content'),
		document.getElementById('p_format'),'images/');
		
		tb.btStrong('".str_replace("'","\'",__('Strong emphasis'))."');
		tb.btEm('".str_replace("'","\'",__('Emphasis'))."');
		tb.btIns('".str_replace("'","\'",__('Inserted'))."');
		tb.btDel('".str_replace("'","\'",__('Deleted'))."');
		tb.btQ('".str_replace("'","\'",__('Inline quote'))."');
		tb.btCode('".str_replace("'","\'",__('Code'))."');
		tb.addSpace(10);
		tb.btBr('".str_replace("'","\'",__('Line break'))."');
		tb.addSpace(10);
		tb.btBquote('".str_replace("'","\'",__('Blockquote'))."');
		tb.btPre('".str_replace("'","\'",__('Preformated text'))."');
		tb.btList('".str_replace("'","\'",__('Unordered list'))."','ul');
		tb.btList('".str_replace("'","\'",__('Ordered list'))."','ol');
		tb.addSpace(10);
		tb.btLink('".str_replace("'","\'",__('Link'))."',
			'".str_replace("'","\'",__('URL?'))."',
			'".str_replace("'","\'",__('Language?'))."',
			'".DC_LANG."');
		tb.btImgLink('".str_replace("'","\'",__('External image'))."',
			'".str_replace("'","\'",__('URL?'))."');
		tb.addSpace(10);
		tb.btImg('".str_replace("'","\'",__('Internal image'))."','images-popup.php');
		tb.draw('".str_replace("'","\'",__('You can use the following shortcuts to refine your layout.'))."');
	}
	</script>";
	# Fin toolbar
	
	echo
	'<h3 class="moreOptions">'.
	'<a href="#" onclick="openCloseOptions(\'moreOptions\',\'dc_options\',0); return false;">'.
	'<img src="images/plus.png" id="img_moreOptions" '.
	'alt="" /></a>'.
	' <a href="#" onclick="openCloseOptions(\'moreOptions\',\'dc_options\',0); return false;">'.
	__('More options').'</a></h3>';
	
	echo
	'<div id="moreOptions" class="moreOptions">'.
	'<p><label for="p_notes">'.__('Notepad').' '.helpLink('entry','notepad').'</label>'.
	form::textArea('p_notes',30,6,htmlspecialchars($notes),7,'class="max"').'</p>';
	
	echo
	'<p><label for="p_titre_url">'.__('URLed title').' '.
	helpLink('entry','title_url').
	' <a href="#" '.
	'onclick="document.forms[0].p_titre_url.value=str2url(document.forms[0].p_titre.value,\''.dc_encoding.'\'); return false;">'.
	__('Use').'</a></label> '.
	form::field('p_titre_url',30,255,htmlspecialchars($titre_url),8,'class="max"').'</p>';
	
	if (!empty($post_id))
	{
		echo
		'<p><label class="inline" for="p_dt_d">'.__('Date').'</label> '.
		form::field('p_dt_d',2,2,$dt_d,9).' '.
		form::combo('p_dt_m',$arry_dt_m,$dt_m,'','',10).' '.
		form::field('p_dt_y',4,4,$dt_y,11).' '.
		'<label class="inline" for="p_dt_h">'.__('Hour').'</label> '.
		form::field('p_dt_h',2,2,$dt_h,12).':'.
		form::field('p_dt_i',2,2,$dt_i,13).':'.
		form::field('p_dt_s',2,2,$dt_s,14).' '.
		"<a href=\"#\" onclick=\"setNow(); return false;\">".__('now').'</a> '.
		helpLink('entry','datetime').
		'</p>';
	}
	
	echo '<table class="clear post-entry-info">';
	
	echo
	'<tr><td><label for="p_lang">'.
	__('Language').' '.helpLink('entry','language').'</label></td> '.
	'<td>'.form::field('p_lang',5,5,$lang,15).'</td>';
	
	echo
	'<td><label for="p_selected">'.
	__('Selection').' '.helplink('entry','selected').'</label></td>'.
	'<td>'.form::combo('p_selected',array(__('yes')=>1,__('no')=>0),$selected,'','',16).'</td></tr>';
	
	echo
	'<tr><td><label for="p_open_comment">'.
	__('Comments').' '.helpLink('entry','comment').'</label></td> '.
	'<td>'.form::combo('p_open_comment',array(__('Open')=>'1',__('Closed')=>'0'),$open_comment,'','',17).'</td>';
	
	echo
	'<td><label for="p_open_tb">'.
	__('Trackbacks').' '.helpLink('entry','trackback').'</label></td>'.
	'<td>'.form::combo('p_open_tb',array(__('Open')=>'1',__('Closed')=>'0'),$open_tb,'','',18).'</td></tr>';
	echo '</table>';
	
	echo '</div>';
	
	$p_tb_checked = ($do_trackbacks) ? ' checked="checked"' : '';
	echo
	'<p><input type="checkbox" name="p_do_trackbacks" id="p_do_trackbacks" '.
	$p_tb_checked.' /> '.
	'<label class="inline" for="p_do_trackbacks">'.__('Ping URLs').'</label></p>';
	
	echo
	'<p>'.
	'<input name="preview" type="submit" class="submit" '.
	'value="'.__('preview').' [v]" accesskey="v" tabindex="20" />&nbsp; '.
	'<input name="publish" type="submit" class="submit" '.
	'value="'.__('save').' [s]" accesskey="s" tabindex="21" />';
	
	if (!empty($post_id) && $format == 'wiki') {
		echo
		'&nbsp;<input name="transform" type="submit" class="submit" '.
		'value="'.__('convert into XHTML').'" tabindex="22" />';
	}
	
	if (!empty($post_id)) {
		echo
		'&nbsp;<input name="delete" type="submit" class="submit" tabindex="23" '.
		'value="'.__('delete').'" onclick="return '.
		'window.confirm(\''.__('Are you sure you want to delete this entry?').'\')" />'.
		form::hidden('post_id',$post_id);
	}
	
	echo '</p>';
	echo '</form>';
}

/* Comments
-------------------------------------------------------- */
if (!empty($post_id))
{
	echo '<h2>'.__('Comments').'</h2>';
	
	if (isset($comments)) {
		$trackbacks = $comments->extractTrackbacks();
	}
	
	if (isset($trackbacks))
	{
		echo '<h3 id="trackbacks">'.__('Trackbacks list').'</h3>';
		if (!$trackbacks->isEmpty()) {
			showComments($trackbacks);
		} else {
			echo __('No trackback');
		}
	}
	
	if (isset($comments))
	{
		echo '<h3 id="comments">'.__('Comments list').'</h3>';
		if (!$comments->isEmpty()) {
			showComments($comments);
		} else {
			echo __('No comment');
		}
	}
	
	echo
	'<h3>'.__('Post a comment').'</h3>'.
	'<form action="poster.php" method="post">'.
	'<p class="field"><label class="float" for="com_nom"><strong>'.
	__('Name').'&nbsp;:</strong></label> '.
	form::field('com_nom',30,255,htmlspecialchars($_SESSION['sess_user_cn'])).
	'</p>';
	
	echo
	'<p class="field"><label class="float" for="com_email">'.
	__('Email').' ('.__('optional').')&nbsp;:</label> '.
	form::field('com_email',30,255,htmlspecialchars($_SESSION['sess_user_email'])).
	'</p>';
	
	echo
	'<p class="field"><label class="float" for="com_web">'.
	__('Site').' ('.__('optional').')&nbsp;:</label> '.
	form::field('com_web',30,255,'http://').'</p>';
	
	echo
	'<p class="field"><label for="com_content"><strong>'.
	__('Comment').'&nbsp;:</strong></label> '.
	form::textArea('com_content',40,10,'&lt;p&gt;&lt;/p&gt;','','class="max"').'</p>';
	
	echo
	'<p class="field"><input type="submit" class="submit" name="add_comment"
	value="'.__('save').'" />'.
	'<input type="hidden" name="post_id" value="'.$post_id.'" /></p>';
	
	echo '</form>';
	
	echo '<p><strong>'.__('Notice').'</strong> : '.__('This comment has to be in HTML format').'.</p>';
}

# Affichage de commentaires ou trackbacks
function showComments(&$rs)
{
	global $is_editable, $post_id;
	
	while(!$rs->EOF())
	{
		if ($rs->f('comment_pub')) {
			$com_style = '';
			$com_cancel = __('set offline');
		} else {
			$com_style = 'style="color:#999;"';
			$com_cancel = __('set online');
		}
		
		echo '<div class="ligne" '.$com_style.' id="c'.$rs->f('comment_id').'">';
		
		echo
		'<p>'.(($rs->f('comment_trackback')==1) ? '<strong>'.__('Trackback').'</strong><br />' : '').
		__('From').'&nbsp;: '.$rs->f('comment_auteur').'<br />'.
		dt::str(__('On %A %e %B %Y, %I:%M %p'),$rs->getTS()).'<br />'.
		__('Email').'&nbsp;: '.$rs->f('comment_email').'<br />'.
		__('Site').'&nbsp;: '.(($rs->f('comment_site')) ? 'http://'.$rs->f('comment_site') : '').'<br />'.
		'@IP : '.$rs->f('comment_ip').'</p>'.
		'<div>'.$rs->getContent().'</div>';
		
		if($is_editable)
		{
			echo
			'<p style="text-align:right">'.
			'<a href="poster.php?post_id='.$post_id.
			'&amp;comment_id='.$rs->f('comment_id').'">'.$com_cancel.'</a>'.
			' - <a href="comment.php?comment_id='.$rs->f('comment_id').'">'.__('edit').'</a>'.
			' - <a href="poster.php?post_id='.$post_id.
			'&amp;comment_id='.$rs->f('comment_id').'&amp;comment_del=1" '.
			'onclick="return window.confirm(\''.__('Are you sure you want to delete this comment?').'\');">'.__('delete').'</a>'.
			'</p>';
		}
		
		echo '</div>';
		
		$rs->moveNext();
	}
}

closePage();
?>