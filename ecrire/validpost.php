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
require dirname(__FILE__).'/../inc/incutio/class.httpClient.php';
require dirname(__FILE__).'/../inc/libs/lib.validator.php';

$auth->check(1);

include dirname(__FILE__).'/inc/connexion.php';

openPopup(__('Entry validation'));

$post_id = (!empty($_GET['post_id'])) ? $_GET['post_id'] : '';
$co_id = (!empty($_GET['co_id'])) ? $_GET['co_id'] : '';

$is_post = $is_comment = false;

if ($post_id != '')
{
	$post = $blog->getPostByID($post_id);
	$is_post = true;
	echo '<h2>'.__('Entry validation').'</h2>';
}
elseif ($co_id != '')
{
	$comment = $blog->getComment($co_id);
	$is_comment = true;
	echo '<h2>'.__('Comment validation').'</h2>';
}



if ((empty($post) || $post->isEmpty()) && (empty($comment) || $comment->isEmpty()))
{
	echo
	'<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
	'<p>'.($is_post ? __('No entry') : __('No comment')).'</p></div>';
}
else
{
	flush();
	
	if ($post_id != '') {
		$content = $post->f('post_chapo')."\n".$post->f('post_content');
	} else {
		$content = $comment->f('comment_content');
	}
	
	if (($valid = validator::xhtml($content)) === false)
	{
		echo '<p>'.__('Cannot connect to server.').'</p>';
	}
	elseif ($valid['valid'] == true)
	{
		echo '<h3>'.($is_post ? __('Valid entry') : __('Valid comment')).'</h3>';
	}
	elseif ($valid['valid'] == false)
	{
		echo '<h3>'.($is_post ? __('Invalid entry') : __('Invalid comment')).'</h3>';
		
		if ($valid['errors'] != '')
		{
			echo '<p>'.__('Errors list').'&nbsp;:</p>';
			echo $valid['errors'];
		}
	}
	
	echo '<p class="small">'.sprintf(__('Validation done with %s'),'WDG HTML Validator').'<br />'.
	'http://www.htmlhelp.com/tools/validator/</p>';
	echo '<p><img src="images/wdglogo-small.gif" alt="" /></p>';
}

closePopup();
?>