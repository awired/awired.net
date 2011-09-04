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

$auth->check(9);

include dirname(__FILE__).'/inc/connexion.php';

$id = (!empty($_REQUEST['id'])) ? $_REQUEST['id'] : NULL;

$page_titre = __('Editor creation');

$err = '';
$alert = '';

$user_id = '';
$user_nom = '';
$user_prenom = '';
$user_pseudo = '';
$user_email = '';
$user_pwd = '';
$user_level = 1;
$user_lang = DC_LANG;
$user_post_format = 'wiki';
$user_edit_size = 10;
$user_pref_cat = '';
$user_delta = 0;
$user_post_pub = 1;

$arry_levels = array(__('inactive') => 0,
				__('editor') => 1,
				__('advanced editor') => 5,
				__('administrator') => 9);

# Tableau des formats
$arry_format = array('HTML' => 'html', 'Wiki' => 'wiki');

# Tableau des publication
$arry_post_pub = array(__('Online') => 1, __('Offline') => 0);

# Tableau des décalages
for ($i=-24; $i<=24; $i++) {
	$arry_delta_time[(string) $i] = (string) $i;
}

# Récupération des catégories
$rsCat = $blog->getCat();

$arry_cat = array();
if ($rsCat->isEmpty()) {
	$arry_cat[''] = 0;
} else {
	while ($rsCat->fetch()) {
		$arry_cat[$rsCat->f('cat_libelle')] = $rsCat->f('cat_id');
	}
}


if (!empty($id) || !empty($_POST['user_id']))
{
	if (!empty($id))
	{
		$rsUser = $blog->getUser($id);
		
		if (!$rsUser->isEmpty()) {
			$user_id = $rsUser->f('user_id');
			$user_nom = $rsUser->f('user_nom');
			$user_prenom = $rsUser->f('user_prenom');
			$user_pseudo = $rsUser->f('user_pseudo');
			$user_email = $rsUser->f('user_email');
			$user_level = $rsUser->f('user_level');
			$user_lang = $rsUser->f('user_lang');
			$user_post_format = $rsUser->f('user_post_format');
			$user_edit_size = $rsUser->f('user_edit_size');
			$user_pref_cat = $rsUser->f('user_pref_cat');
			$user_delta = $rsUser->f('user_delta');
			$user_post_pub = $rsUser->f('user_post_pub');
			
			$page_titre = sprintf(__('Update of editor %s'),$user_id);
			
			if($user_id == $_SESSION['sess_user_id']) {
				$alert = __('You are about to update you own profile. You will be disconnected after changes.');
			}
			
			# Suppresion d'un rédacteur
			if(!empty($_GET['del']))
			{
				if ($blog->delUser($user_id) !== false) {
					$msg = __('Editor deleted');
					header('Location: redac_list.php?msg='.rawurlencode($msg));
					exit;
				} else {
					$err = $blog->error(1);
				}
			}
			
			# Mise à jour d'un rédacteur
			if(!empty($_POST['user_id']))
			{
				$new_user_id = $_POST['user_id'];
				$user_nom = $_POST['user_nom'];
				$user_prenom = $_POST['user_prenom'];
				$user_email = $_POST['user_email'];
				$user_level = $_POST['user_level'];
				$user_pwd = $_POST['user_pwd'];
				$user_pseudo = $_POST['user_pseudo'];
				$user_post_format = $_POST['user_post_format'];
				$user_edit_size = $_POST['user_edit_size'];
				$user_pref_cat = $_POST['user_pref_cat'];
				$user_lang = $_POST['user_lang'];
				$user_delta = $_POST['user_delta'];
				$user_post_pub = $_POST['user_post_pub'];
				
				if($blog->updUser($user_id,$new_user_id,$user_level,$user_pwd,
				$user_nom,$user_prenom,$user_pseudo,$user_email,
				$user_post_format,$user_edit_size,$user_pref_cat,$user_lang,
				$user_delta,$user_post_pub) !== false)
				{				
					if($user_id == $_SESSION['sess_user_id']) {
						header('Location: index.php?logout=1');
						exit;
					}
					
					$msg = __('Editor updated');
					header('Location: redac_list.php?msg='.rawurlencode($msg));
					exit;
				} else {
					$err = $blog->error(1);
				}
				
			}
		}
	}
	elseif(!empty($_POST['user_id']))
	{
		# Création d'un rédacteur
		$user_id = $_POST['user_id'];
		$user_nom = $_POST['user_nom'];
		$user_prenom = $_POST['user_prenom'];
		$user_pseudo = $_POST['user_pseudo'];
		$user_email = $_POST['user_email'];
		$user_level = $_POST['user_level'];
		$user_pwd = $_POST['user_pwd'];
		$user_lang = $_POST['user_lang'];
		$user_post_format = $_POST['user_post_format'];
		$user_edit_size = $_POST['user_edit_size'];
		$user_pref_cat = $_POST['user_pref_cat'];
		$user_delta = $_POST['user_delta'];
		$user_post_pub = $_POST['user_post_pub'];
		
		if ($blog->addUser($user_id,$user_level,$user_pwd,$user_nom,$user_prenom,
		$user_pseudo,$user_email,$user_post_format,$user_edit_size,
		$user_pref_cat,$user_lang,$user_delta,$user_post_pub) !== false ) {
			$msg = __('Editor created');
			header('Location: redac_list.php?msg='.rawurlencode($msg));
			exit;
		} else {
			$err = $blog->error(1);
		}
	}
}

openPage($page_titre);

if($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.
		$err.'</div>';
}
?>


<p><strong><a href="redac_list.php"><?php echo __('Back'); ?></a></strong></p>
<h2><?php echo $page_titre; ?></h2>

<?php
if ($alert != '') {
	echo '<p class="message">'.$alert.'</p>';
}
?>

<form action="redacteur.php" method="post">

<p><?php echo __('Note: Login must be letters or numbers.'); ?></p>

<p class="field"><label class="float" for="user_id"><strong><?php
echo __('Login'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_id'); ?></label>
<?php echo form::field('user_id',30,32,$user_id); ?>
</p>

<p class="field"><label class="float" for="user_prenom"><?php
echo __ ('Firstname'); ?> (<?php echo __('optional'); ?>)&nbsp;:
<?php echo helpLink('user','user_prenom'); ?></label>
<?php echo form::field('user_prenom',30,255,$user_prenom); ?>
</p>

<p class="field"><label class="float" for="user_nom"><strong><?php
echo __('Name'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_nom'); ?></label>
<?php echo form::field('user_nom',30,255,$user_nom); ?>
</p>

<p class="field"><label class="float" for="user_pseudo"><?php
echo __('Nickname'); ?> (<?php echo __('optional'); ?>)&nbsp;:
<?php echo helpLink('user','user_pseudo'); ?></label>
<?php echo form::field('user_pseudo',30,255,$user_pseudo); ?>
</p>

<p class="field"><label class="float" for="user_email"><?php
echo __('Email'); ?> (<?php echo __('optional'); ?>)&nbsp;:
<?php echo helpLink('user','user_email'); ?></label>
<?php echo form::field('user_email',30,255,$user_email); ?>
</p>

<p class="field"><label class="float" for="user_pwd"><?php
echo __('Password'); ?>&nbsp;:
<?php echo helpLink('user','user_pwd'); ?></label>
<?php echo form::field('user_pwd',30,255,'');
if ($user_id) { echo '<br />('.__('Leave empty to keep password intact').')'; }
?></p>

<p class="field"><label class="float" for="user_level"><strong><?php
echo __('Level'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_level'); ?></label>
<?php echo form::combo('user_level',$arry_levels,$user_level); ?>
</p>

<p class="field"><label class="float" for="user_lang"><strong><?php
echo __('Language'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_lang'); ?></label>
<?php echo form::combo('user_lang',l10n::getISOcodes(1),$user_lang); ?></p>

<p class="field"><label class="float" for="user_post_format"><strong><?php
echo __('Prefered edit format'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_post_format'); ?></label>
<?php echo form::combo('user_post_format',$arry_format,$user_post_format); ?>
</p>

<p class="field"><label class="float" for="user_post_pub"><strong><?php
echo __('Default publication status'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_post_pub'); ?></label>
<?php echo form::combo('user_post_pub',$arry_post_pub,$user_post_pub); ?>
</p>

<p class="field"><label class="float" for="user_pref_cat"><strong><?php
echo __('Prefered category'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_pref_cat'); ?></label>
<?php echo form::combo('user_pref_cat',$arry_cat,$user_pref_cat); ?>
</p>

<p class="field"><label class="float" for="user_edit_size"><strong><?php
echo __('Entry edit field height'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_edit_size'); ?></label>
<?php echo form::field('user_edit_size',2,3,$user_edit_size); ?>
</p>

<p class="field"><label class="float" for="user_delta"><strong><?php
echo __('Number of hours between user\'s local time and the server time'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_delta'); ?></label>
<?php echo form::combo('user_delta',$arry_delta_time,$user_delta); ?>
 (<?php echo sprintf(__('Server time is %s'),date('Y-m-d H:i')); ?>)</p>

<p class="field"><input class="submit" type="submit" value="<?php echo __('save'); ?>" />
<?php
echo (!empty($id)) ? '<input type="hidden" name="id" value="'.htmlspecialchars($id).'" />' : '';
?></p>
</form>

<?php closePage(); ?>