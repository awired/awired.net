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

# Récupération de l'utilisateur
$rs = $blog->getUser($_SESSION['sess_user_id']);

$user_nom = $rs->f('user_nom');
$user_prenom = $rs->f('user_prenom');
$user_pseudo = $rs->f('user_pseudo');
$user_email = $rs->f('user_email');
$user_pwd = '';
$user_post_format = $rs->f('user_post_format');
$user_edit_size = $rs->f('user_edit_size');
$user_pref_cat = $rs->f('user_pref_cat');
$user_lang = $rs->f('user_lang');
$user_delta = $rs->f('user_delta');
$user_post_pub = $rs->f('user_post_pub');

# Mise à jour des préférences
if(!empty($_POST))
{
	$user_prenom = $_POST['user_prenom'];
	$user_nom = $_POST['user_nom'];
	$user_pseudo = $_POST['user_pseudo'];
	$user_email = $_POST['user_email'];
	$user_pwd = trim($_POST['user_pwd']);
	$user_post_format = $_POST['user_post_format'];
	$user_edit_size = $_POST['user_edit_size'];
	$user_pref_cat = $_POST['user_pref_cat'];
	$user_lang = $_POST['user_lang'];
	$user_delta = $_POST['user_delta'];
	$user_post_pub = $_POST['user_post_pub'];
	
	if($blog->updUser($_SESSION['sess_user_id'],$_SESSION['sess_user_id'],
	$rs->f('user_level'),$user_pwd,$user_nom,$user_prenom,$user_pseudo,
	$user_email,$user_post_format,$user_edit_size,$user_pref_cat,$user_lang,
	$user_delta,$user_post_pub) !== false)
	{
		# On update la session pour que les modifs soient prises en compte
		# tout de suite
		$_SESSION['sess_user_nom'] = $user_nom;
		$_SESSION['sess_user_prenom'] = $user_prenom;
		$_SESSION['sess_user_pseudo'] = $user_pseudo;
		$_SESSION['sess_user_email'] = $user_email;
		$_SESSION['sess_user_format'] = $user_post_format;
		$_SESSION['sess_user_edit_size'] = $user_edit_size;
		$_SESSION['sess_user_pref_cat'] = $user_pref_cat;
		$_SESSION['sess_user_lang'] = $user_lang;
		$_SESSION['sess_user_delta'] = $user_delta;
		$_SESSION['sess_user_post_pub'] = $user_post_pub;
		
		if($_SESSION['sess_user_pseudo'] != '')
			$_SESSION['sess_user_cn'] = $_SESSION['sess_user_pseudo'];
		else
			$_SESSION['sess_user_cn'] = trim($_SESSION['sess_user_prenom'].' '.$_SESSION['sess_user_nom']);
		
		$msg = __('Editor updated');
		header('Location: user_prefs.php?msg='.rawurlencode($msg));
		exit;
	} else {
		$err = $blog->error(1);
	}
}

# Sous menu
openPage(__('User preferences'));

if($err != '')
{
	echo '<div class="erreur"><p><strong>'.__('Error(s)').' :</strong></p>'.$err.'</div>';
}
?>

<h2><?php echo __('User preferences'); ?></h2>

<form action="user_prefs.php" method="post" class="clear">

<p class="field"><label class="float" for="user_prenom"><?php
echo __('Firstname'); ?> (<?php echo __('optional'); ?>)&nbsp;:
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
<?php echo form::field('user_pwd',30,255); ?>
<br />(<?php echo __('Leave empty to keep password intact'); ?>)</p>

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

<p class="field"><label class="float" for="user_lang"><strong><?php
echo __('Language'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_lang'); ?></label>
<?php echo form::combo('user_lang',l10n::getISOcodes(1),$user_lang); ?></p>

<p class="field"><label class="float" for="user_delta"><strong><?php
echo __('Number of hours between user\'s local time and the server time'); ?>&nbsp;:</strong>
<?php echo helpLink('user','user_delta'); ?></label>
<?php echo form::combo('user_delta',$arry_delta_time,$user_delta); ?>
 (<?php echo sprintf(__('Server time is %s'),date('Y-m-d H:i')); ?>)</p>

<p class="field"><input class="submit" type="submit" value="<?php echo __('save'); ?>" /></p>
</form>

<?php closePage(); ?>