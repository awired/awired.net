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

$err = '';
$is_editable = false;
$comment_id = '';
$comment_dt = '';
$comment_auteur = '';
$comment_email = '';
$comment_site = '';
$comment_content = '';
$comment_pub = '';
$comment_ip = '';
$post_titre = '';
$post_id = '';
$user_id = '';

if (!empty($_REQUEST['comment_id']))
{
	$comment = $blog->getComment($_REQUEST['comment_id']);
	
	if ($comment->isEmpty()) {
		$err = '<ul><li>'.__('No comment yet.').'</li></ul>';
	} else {
		$comment_id = $comment->f('comment_id');
		$comment_ldate = dt::str(__('On %A %e %B %Y, %I:%M %p'),$comment->getTS());
		$comment_auteur = $comment->f('comment_auteur');
		$comment_email = $comment->f('comment_email');
		$comment_site = $comment->f('comment_site');
		$comment_content = $comment->f('comment_content');
		$comment_pub = (integer) $comment->f('comment_pub');
		$comment_ip = $comment->f('comment_ip');
		$post_titre = $comment->f('post_titre');
		$post_id = $comment->f('post_id');
		
		if ($comment->f('user_id') == $_SESSION['sess_user_id'] || $_SESSION['sess_user_level'] == 9)
		{
			$is_editable = true;
		}
	}
}

# On arrête tout si le commentaire est pas éditable
if (!$is_editable)
{
	$err = '<ul><li>'.__('You are not allowed to edit a comment').'</li></ul>';
}

# Modification du commentaire
if (!empty($_POST['update']) && $is_editable)
{
	$comment_auteur = $_POST['c_auteur'];
	$comment_email = $_POST['c_email'];
	$comment_site = preg_replace('|^http://|','',$_POST['c_site']);
	$comment_content = $_POST['c_content'];
	$comment_pub = $_POST['c_pub'];
	
	if ($blog->updComment($comment_id,$comment_auteur,$comment_email,
	$comment_site,$comment_content,$comment_pub) !== false) {
		header('Location: poster.php?post_id='.$post_id.'#c'.$comment_id);
		exit;
	} else {
		$err = $blog->error(1);
	}	
}

# Suppression du commentaire
if (!empty($_POST['delete']) && $is_editable)
{
	if ($blog->delComment($comment_id) !== false) {
		header('Location: poster.php?post_id='.$post_id.'#comments');
		exit;
	} else {
		$err = $blog->error(1);
	}
}

if ($comment_id)
{
	$mySubMenu->addItem(
		__('XHTML validation'),
		array('validpost.php?co_id='.$comment_id,'onclick="popup(this.href); return false;"'),
		'images/ico_ok.png',false);
}

openPage(__('Comment'));

if ($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		$err.'</div>';
}

if ($is_editable)
{
?>

<h2><?php echo __('Edit a comment'); ?></h2>

<p><strong><?php echo __('Entry'); ?> :</strong>
<a href="poster.php?post_id=<?php echo $post_id; ?>"><?php echo $post_titre; ?></a></p>

<form action="comment.php" method="post">
<p class="field"><label class="float" for="c_auteur"><?php echo __('Name'); ?>&nbsp;:</label>
<?php echo form::field('c_auteur',30,255,htmlspecialchars($comment_auteur)); ?></p>

<p class="field"><label class="float" for="c_email"><?php echo __('Email'); ?>&nbsp;:</label>
<?php echo form::field('c_email',30,255,htmlspecialchars($comment_email)); ?></p>

<p class="field"><label class="float" for="c_site"><?php echo __('Site'); ?>&nbsp;:</label>
<?php echo form::field('c_site',30,255,'http://'.htmlspecialchars($comment_site)); ?></p>

<p class="field"><span class="label">@IP&nbsp;:</span>
<span><?php echo $comment_ip; ?></span></p>

<p class="field"><span class="label"><?php echo __('Date'); ?>&nbsp;:</span>
<span><?php echo $comment_ldate; ?></span></p>

<p class="field"><label class="float" for=""><?php echo __('Status'); ?>&nbsp;:</label>
<?php echo form::combo('c_pub',array(__('Online')=>'1',__('Offline')=>'0'),$comment_pub); ?>

<p class="field"><label for="c_content"><?php echo __('Comment'); ?>&nbsp;:</label>
<?php echo form::textArea('c_content',40,10,htmlspecialchars($comment_content),'','class="max"'); ?>
</p>

<p class="field"><input type="submit" class="submit" name="update" value="<?php echo __('save'); ?>" />&nbsp;
<input type="submit" class="submit" name="delete" value="<?php echo __('delete'); ?>"
onclick="return window.confirm('<?php echo __('Are you sure you want to delete this comment?'); ?>')" />
<input type="hidden" name="comment_id" id="comment_id"
value="<?php echo $comment_id; ?>" /></p>
</form>

<p><strong><?php echo __('Notice'); ?></strong>&nbsp;: 
<?php echo __('This comment has to be in HTML format'); ?></p>

<?php } ?>

<?php closePage(); ?>