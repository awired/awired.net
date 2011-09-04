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
require dirname(__FILE__).'/../inc/classes/class.dc.autodiscovery.php';

$auth->check(1);

include dirname(__FILE__).'/inc/connexion.php';

$list_url = (!empty($_POST['list_url'])) ? $_POST['list_url'] : '';
$tb_content = (!empty($_POST['tb_content'])) ? util::cutString($_POST['tb_content'],255) : '';
$is_editable = false;
$ping_res = array();

$post_id = (!empty($_REQUEST['post_id'])) ? $_REQUEST['post_id'] : '';

# Vérifications d'usage
if ($post_id != '') {
	$post = $blog->getPostByID($post_id);
	
	if (!$post->isEmpty())
	{
		# Post éditable que par un admin ou son créateur
		if ($post->f('user_id') == $_SESSION['sess_user_id'] || $_SESSION['sess_user_level'] >= 9) {
			$is_editable = true;
		}
	}
}

# Création des trackback
if ($is_editable && $list_url != '')
{
	$list_url = str_replace("\r",'',$list_url);
	$turi = array_unique(explode("\n",$list_url));
	
	foreach ($turi as $uri)
	{
		if ($blog->postTbPingURL($post_id,$uri,dc_blog_name,$tb_content) !== false) {
			$ping_res[$uri]['status'] = true;
		} else {
			$ping_error = $blog->error();
			$ping_res[$uri]['status'] = false;
			$ping_res[$uri]['error'] = $ping_error[0][1];
			$blog->resetError();
		}
	}
}

# Sous menu
$mySubMenu->addItem(
	__('Back to entry'),'poster.php?post_id='.$post_id,
	'images/ico_retour.png',false);

openPage(__('Pings'));
?>

<h2><?php echo __('Pings'); ?></h2>

<?php
if (!$is_editable)
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		'<p>'.__('No entry').'</p></div>';
}
else
{
	$chapo = $post->f('post_chapo');
	$content = $post->f('post_content');
	
	if ($tb_content == '') {
		$tb_content = util::cutString(strip_tags($post->f('post_content')),252).'...';
	}
	
	echo '<div class="cadre preview clear">'.
		'<h3>'.$post->f('post_titre').'</h3>'.
		(($chapo != '') ? $chapo.'<hr class="thin" />' : '').
		$content.'</div>';
	
	if (!empty($_GET['auto']) && $_GET['auto'] == 1)
	{
		$autodisc = new autodiscover();
		$list_url = implode("\n",$autodisc->autoDiscovery($chapo."\n".$content));
	}
	
	if (empty($_GET['auto'])) {
		echo '<p><a href="trackback.php?post_id='.$post_id.'&auto=1">'.
			__('Auto discovery of ping URLs').'</a></p>';
	}
	
	echo '<form action="trackback.php" method="post">'.
		'<p><label for="list_url">'.__('Insert here URLs to ping').' :</label>'.
		form::textArea('list_url',30,5,
		htmlspecialchars($list_url),'','class="max"').
		'</p>'.
		'<p><label for="tb_content">'.__('Summary to send').'&nbsp;:</label>'.
		form::textArea('tb_content',30,3,
		$tb_content,'','class="max" '.
		'onkeypress="limitArea(this,255);" onkeyup="limitArea(this,255);"').
		'</p>'.
		'<p><input type="submit" class="submit" value="'.__('Ping URLs').'" /> '.
		form::hidden('post_id',$post_id).
		'</p>'.
		'</form>';
	
	if (!empty($_POST['list_url']))
	{
		echo '<h3>'.__('Result').'</h3>';
		
		foreach ($ping_res as $k => $v)
		{
			if ($v['status']) {
				$img = '<img src="images/check_on.png" alt="OK" />';
			} else {
				$img = '<img src="images/check_off.png" alt="ERROR" />';
			}
			
			echo '<p>'.$img.' '.$k.'<br />'.
			'<strong>'.((!$v['status']) ? $v['error'] : 'Ping OK').'</strong>';
			'</p>';
		}
	}
	
	echo '<h3>'.__('Previous pings sent').'</h3>';
	
	$rs = $blog->postGetPings($post_id);
	
	if ($rs->isEmpty()) {
		echo '<p>'.__('No ping yet').'</p>';
	} else {
		echo '<ul>';
		while (!$rs->EOF())
		{
			echo '<li>'.
				'['.date('d/m/Y @ H:i:s',strtotime($rs->f('ping_dt'))).'] '.
				'<strong>'.$rs->f('ping_url').'</strong>'.
				'</li>';
			$rs->moveNext();
		}
		echo '</ul>';
	}
}

closePage();
?>