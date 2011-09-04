<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of Gsitemap, a plugin for DotClear.
# Copyright (c) 2005 Pep and contributors. All rights
# reserved.
#
# DotClear.
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
include_once(dirname(__FILE__).'/lib.installer.php');

$my_name = (!empty($p))?$p:'gsitemap';
$url = 'tools.php?p='.$my_name;

$periods = array(
		__('undefined') => 0,
		__('always')    => 1,
		__('hourly')    => 2,
		__('daily')     => 3,
		__('weekly')    => 4,
		__('monthly')   => 5,
		__('never')     => 6
	);

$gsmap_url =
	'http://'.$_SERVER['HTTP_HOST'].dc_blog_url.
	(dc_url_scan == 'query_string' ? '?' : '').'gsitemap';

buffer::str('<h2>'.__('Gsitemap').'</h2>');

// Traitement des modifications de la configuration
if (isset($_POST['submit']))
{
 	$my_config = array();

	$cfg_params = array(
			'active','home','home_pr','home_pd',
			'feeds','feeds_pr','feeds_pd','posts','posts_pr','posts_pd',
			'cats','cats_pr','cats_pd','related','related_pr','related_pd'
		);

	foreach($cfg_params as $key) {
		if (empty($_POST[$key])) {
			$my_config['dc_gsitemap_'.$key] = '0';
		} elseif (preg_match('/_pr$/', $key)) {
			$my_config['dc_gsitemap_'.$key] = min(abs((float)$_POST[$key]),1);
		} elseif (preg_match('/_pd$/', $key)){
			$my_config['dc_gsitemap_'.$key] = min(abs(intval($_POST[$key])),6);
		} else {
			$my_config['dc_gsitemap_'.$key] = (boolean)$_POST[$key];
		}
	}

	// Ecriture de la nouvelle configuration
	if (installer::savePluginConfig($my_config)) {
		$res = __('New configuration saved.');
	} else {
		$res = __('Unable to save configuration');
	}
}
// Déclenchement d'un ping vers Google Sitemaps pour un re-submit
elseif (isset($_POST['ping']))
{
	require_once(dirname(__FILE__).'/../../../inc/incutio/class.httpClient.php');

	$img_check_on = '<img src="images/check_on.png" alt="ok" />';
	$img_check_off = '<img src="images/check_off.png" alt="failed" />';

	$client = new HttpClient('www.google.com',80);
	$client->setUserAgent('DotClear HTTP Client');
	$client->setPersistReferers(false);
	$client->setDebug(false);

	if ($client->get('/webmasters/sitemaps/ping', array('sitemap' => $gsmap_url)))
	{
		if ($client->getStatus() != '200') {
			$ping_result['error']   = true;
			$ping_result['message'] = __('Submit failed - HTTP Response code :').' '.$client->getStatus();
		} else {
			$ping_result['error'] = false;
			$ping_result['message'] = __('Your sitemap has been resubmitted correctly');
		}
	}
	else
	{
		$ping_result['error'] = true;
		$ping_result['message'] = $client->getError();
	}

}
// Vérification de l'installation et récupération de la configuration
else
{
	if (($err = installer::checkPluginShareDir())) {
		buffer::str(
		'<div class="erreur"><p><strong>'.
		sprintf(__('Unavailable %s/ directory in share/. You may create it manually.'),$my_name).
		'</strong></p>'.
		'</div>'
		);
	}
}

// Chargement de la configuration
$saved_config = installer::loadPluginConfig();
$default_config = array(
		'dc_gsitemap_active'     => 0,
		'dc_gsitemap_home'       => 1,
		'dc_gsitemap_feeds'      => 1,
		'dc_gsitemap_posts'      => 1,
		'dc_gsitemap_cats'       => 1,
		'dc_gsitemap_related'    => 1,
		'dc_gsitemap_home_pr'    => 1,
		'dc_gsitemap_feeds_pr'   => 1,
		'dc_gsitemap_posts_pr'   => 1,
		'dc_gsitemap_cats_pr'    => 0.6,
		'dc_gsitemap_related_pr' => 0.5,
		'dc_gsitemap_home_pd'    => 3,
		'dc_gsitemap_feeds_pd'   => 2,
		'dc_gsitemap_posts_pd'   => 3,
		'dc_gsitemap_cats_pd'    => 4,
		'dc_gsitemap_related_pd' => 0
	);
$my_config = array_merge($default_config, $saved_config);

// Traitement après chargement
// (soucis avec conversion automatique de 0 en false et 1 en true par iniFile:read)
foreach ($my_config as $key => $value) {
	if (preg_match('/_pr$/', $key)) {
		$my_config[$key] = min(abs((float)$value),1);
	} elseif (preg_match('/_pd$/', $key)){
		$my_config[$key] = min(abs(intval($value)),6);
	} else {
		$my_config[$key] = (boolean)$value;
	}
}

if (empty($saved_config)) {
	installer::savePluginConfig($my_config);
}


// Affichage d'un message d'erreur ou d'état si défini.
if (!empty($res)) {
	buffer::str('<div class="erreur"><p>'.$res.'</p></div>');
} elseif (!empty($ping_result)) {
	$img_status = 'img_check_'.(($ping_result['error'])?'off':'on');
	buffer::str(
		'<div class="erreur"><p>'.$$img_status.' '.$ping_result['message'].'</p></div>'
	);
}


// Affichage du formulaire de modification des paramètres de configuration
buffer::str(
	'<h3>'.__('Configuration').'</h3>'."\n".
	'<form method="post" action="'.$url.'">'."\n".
	'<fieldset>'."\n".
	'<legend>'.__('Plugin activation').'</legend>'."\n".
	'<p class="field">'."\n".
	'<label class="float" for="active">'.__('Enable Gsitemap').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'activation').'</label>'.
	form::checkbox('active', 1, !empty($my_config['dc_gsitemap_active'])?'checked':'').
	'</p>'."\n".
	'</fieldset>'."\n"
	);


buffer::str(
	'<h3 class="moreOptions">'.
	'<a href="#" onclick="openCloseOptions(\'moreOptions\',\'dc_gsitemap_options\',0); return false;">'.
	'<img src="images/plus.png" id="img_moreOptions" '.
	'alt="" /></a>'.
	' <a href="#" onclick="openCloseOptions(\'moreOptions\',\'dc_gsitemap_options\',0); return false;">'.
	__('Advanced configuration').'</a></h3>'."\n".

	'<div id="moreOptions" class="moreOptions">'."\n".
	'<fieldset>'."\n".
	'<legend style="background:transparent;">'.__('Elements to integrate').'</legend>'."\n".

	'<p class="field">'."\n".
	'<label class="float" for="home">'.__('Homepage').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'home').'</label>'.
	form::checkbox('home', 1, !empty($my_config['dc_gsitemap_home'])?'checked':'','float')."\n".
	'<label class="float" for="home_pr">'.__('Priority').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'priority').'</label>'.
	form::field('home_pr', 4, 4, $my_config['dc_gsitemap_home_pr'],'',' class="float"')."\n".
	'<label class="float" for="home_pd">'.__('Periodicity').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'periodicity').'</label>'.
	form::combo('home_pd', $periods, $my_config['dc_gsitemap_home_pd'])."\n".
	'</p>'."\n".

	'<p class="field">'."\n".
	'<label class="float" for="feeds">'.__('Main feeds').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'feeds').'</label>'.
	form::checkbox('feeds', 1, !empty($my_config['dc_gsitemap_feeds'])?'checked':'','float')."\n".
	'<label class="float" for="feeds_pr">'.__('Priority').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'priority').'</label>'.
	form::field('feeds_pr', 4, 4, $my_config['dc_gsitemap_feeds_pr'],'',' class="float"')."\n".
	'<label class="float" for="feeds_pd">'.__('Periodicity').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'periodicity').'</label>'.
	form::combo('feeds_pd', $periods, $my_config['dc_gsitemap_feeds_pd'])."\n".
	'</p>'."\n".

	'<p class="field">'."\n".
	'<label class="float" for="posts">'.__('Posts').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'posts').'</label>'.
	form::checkbox('posts', 1, !empty($my_config['dc_gsitemap_posts'])?'checked':'','float')."\n".
	'<label class="float" for="posts_pr">'.__('Priority').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'priority').'</label>'.
	form::field('posts_pr', 4, 4, $my_config['dc_gsitemap_posts_pr'],'',' class="float"')."\n".
	'<label class="float" for="posts_pd">'.__('Periodicity').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'periodicity').'</label>'.
	form::combo('posts_pd', $periods, $my_config['dc_gsitemap_posts_pd'])."\n".
	'</p>'."\n".

	'<p class="field">'."\n".
	'<label class="float" for="cats">'.__('Categories').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'cats').'</label>'.
	form::checkbox('cats', 1, !empty($my_config['dc_gsitemap_cats'])?'checked':'','float')."\n".
	'<label class="float" for="cats_pr">'.__('Priority').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'priority').'</label>'.
	form::field('cats_pr', 4, 4, $my_config['dc_gsitemap_cats_pr'],'',' class="float"')."\n".
	'<label class="float" for="cats_pd">'.__('Periodicity').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'periodicity').'</label>'.
	form::combo('cats_pd', $periods, $my_config['dc_gsitemap_cats_pd'])."\n".
	'</p>'."\n".

	'<p class="field">'."\n".
	'<label class="float" for="related">'.__('Related pages').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'related').'</label>'.
	form::checkbox('related', 1, !empty($my_config['dc_gsitemap_related'])?'checked':'','float')."\n".
	'<label class="float" for="related_pr">'.__('Priority').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'priority').'</label>'.
	form::field('related_pr', 4, 4, $my_config['dc_gsitemap_related_pr'],'',' class="float"')."\n".
	'<label class="float" for="related_pd">'.__('Periodicity').'&nbsp;'.helpLink('index&amp;plugin='.$my_name,'periodicity').'</label>'.
	form::combo('related_pd', $periods, $my_config['dc_gsitemap_related_pd'])."\n".
	'</p>'."\n".

	'</fieldset>'."\n".
	'</div>'
	);


buffer::str(
	'<p><input class="submit" type="submit" name="submit" value="'.__('Save changes').'" /> '
	);
if ($my_config['dc_gsitemap_active']) {
	buffer::str(
		' <input class="submit" type="submit" name="ping" value="'.__('Ping Google').'" />'
		);
}
buffer::str(
	'</p>'.
	'</form>'
	);


// Notes rapides pour une utilisation basique
buffer::str(
	'<h3>'.__('Usage').'</h3>'.
	'<p>'.
	__('Simply check the box to activate the plugin.').
	'</p>'.
	'<p>'.
	__("Don't forget you have to manually submit your sitemap to Google for first time use.").'<br />'.
	__('URL to submit is :').' <a href="'.$gsmap_url.'">'.$gsmap_url.'</a></p>'.
	'<p>'.__('Please, check Google Sitemaps FAQ for more details.').'</p>'
	);

buffer::str(
	'<h3>'.__('More about Google Sitemaps').'</h3>'.
	'<ul>'.
	'<li><a href="https://www.google.com/accounts/NewAccount">'.__('Create a Google account').'</a></li>'.
	'<li><a href="http://www.google.com/webmasters/sitemaps/docs/en/protocol.html" hreflang="en">'.__('Google Sitemaps XML specifications').'</a></li>'.
	'<li><a href="http://www.google.com/webmasters/sitemaps/docs/en/faq.html" hreflang="en">'.__('Google Sitemaps FAQ').'</a></li>'.
	'</ul>'."\n"
	);

$PLUGIN_HEAD =
	'<script type="text/javascript">'."\n".
	"window.onload = function() {\n".
	" openCloseOptions('moreOptions','dc_gsitemap_options');\n".
	"}\n".
	"</script>\n".
	'<style type="text/css">'.
	'input[type=checkbox].float { margin-right:5%; float:left; }'."\n".
	'input[type=text].float { width:5%; margin-right:5%;  float:left; }'."\n".
	'label.float { width:20%; float:left; }'."\n".
	'</style>'."\n";
?>