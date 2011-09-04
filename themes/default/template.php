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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php dcInfo('lang'); ?>"
lang="<?php dcInfo('lang'); ?>">
<head>
	<script type="text/javascript" src="<?php echo dc_app_url; ?>/share/shoutbox/prototype.js"></script>
	<script type="text/javascript" src="<?php echo dc_app_url; ?>/share/shoutbox/shoutbox.js"></script>
	<meta http-equiv="Content-Type"
	content="text/html; charset=<?php dcInfo('encoding'); ?>" />
	<meta name="MSSmartTagsPreventParsing" content="TRUE" />
	<?php dcHeadLinks(); ?>
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php dcInfo('rss'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom" href="<?php dcInfo('atom'); ?>" />
	<meta name="DC.title" content="<?php dcInfo(); ?>" />
	<title><?php dcSinglePostTitle('%s - '); dcSingleCatTitle('%s - ');
	dcSingleMonthTitle('%s - '); dcCustomTitle('%s - '); dcInfo(); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="http://awired.net/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php dcInfo('theme'); ?>/style.css" media="screen" />
	<?php dcPostTrackbackAutoDiscovery(); ?>
</head>

<body>

<div id="page">

<div id="top">
	<h1><a href="<?php dcInfo('url'); ?>"><img src="/themes/default/img/logo.png" width="600" height="120" alt="<?php dcInfo(); ?>" class="png" /></a></h1>
</div>

<div id="main">
	<div id="content">
	<?php if ($err_msg != '') : /* Si on a une quelconque erreur, on l'affiche */?>
		<div class="error"><strong>Erreur : </strong>
		<?php echo $err_msg; ?></div>
	
	<?php elseif ($preview) : /* Si on demande la prévisualisation d'un commentaire */?>
		<h3>Commentaire pour <?php dcPostTitle(); ?></h3>
		<div id="comment-preview">
			<blockquote>
			<?php dcCommentPreview(); ?>
			</blockquote>
		</div>
		
		<h3>Changer le commentaire</h3>
		<?php include dirname(__FILE__).'/form.php'; ?>
		
	<?php elseif ($mode != 'post') : /* Si aucune erreur et mode != post on affiche une liste de billets */?>
		<?php # Phrase affiché en cas de recherche (%s est le mot cherché)
		dcSearchString('
		<div class="upperleft-add_digg">
		<div class="upperright">
		<div class="lowerleft">
		<div class="lowerright">
		R&eacute;sultats de votre recherche sur "<em><strong>%s</strong></em>".
		</div>
		</div>
		</div>
		</div>	
		<div id="blanc">&nbsp;</div>
		');
		?>
		
		<?php include dirname(__FILE__).'/list.php'; ?>
		
	<?php else : /* Sinon, mode = post, donc billet unique (avec commentaires et tout le reste)*/?>
		<?php include dirname(__FILE__).'/post.php'; ?>
	<?php endif; ?>
	
	</div>
</div>

<div id="sidebar">
	
	<div id="search">
		<form action="<?php dcInfo('search'); ?>" method="get">
		
			<h2><label for="q">Rechercher</label></h2>
			<p class="field"><input name="q" id="q" type="text" size="10"
			value="<?php dcSearchString(); ?>" accesskey="4" />
			<input type="submit" class="submit" value="ok" /></p>
		
		</form>
	</div>
	
	<?php /* Affichage du blog "selection uniquement si des billets sont
		présents */ ?>
	<?php dcSelection('<div id="selection"><h2>&Agrave; retenir</h2><ul>%s</ul></div>'); ?>
	
	<?php dcLangList('<div id="languages"><h2>Langues</h2><ul>%s</ul></div>'); ?>
	
	
	
	<div id="categories">
		<h2>Cat&eacute;gories</h2>
		<?php dcCatList(); ?>
	</div>
	
	<div id="archives">
		<h2>Archives</h2>
		<?php dcMonthsList(); ?>
	</div>
	
	<div id="links">
		<h2>Liens</h2>
		<?php dcBlogroll::linkList(); ?>
	</div>
	
	<div id="syndicate">
	<h2>Syndication</h2>
	<ul>
		<li><a href="<?php dcInfo('rss'); ?>" target="_blank"><img src="/images/syndication/rss-post.png" height="15" width="80" alt="Flux RSS des articles" /></a> <a href="<?php dcInfo('atom'); ?>" target="_blank"><img src="/images/syndication/atom-post.png" height="15" width="80" alt="Flux ATOM des articles" /></a></li>
		<li><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="/images/syndication/valid-xhtml10.png" alt="Valid XHTML 1.0 Strict" height="15" width="80" /></a> <a href="http://www.google.com/ig/add?feedurl=http://awired.net<?php dcInfo('rss'); ?>"><img src="/images/syndication/addtogoogle.png" height="15" width="80" alt="Ajouter Awired a votre page d'accueil Google" /></a></li>
		<li><a href="http://www.pagerank.fr/" title="Mon PageRank"><img src="http://www.pagerank.fr/pagerank-actuel.gif" style="border: none;" alt="PageRank Actuel"/></a> 

<a target="_blank" href="http://ziki.com/companies/awired"><img src="http://ziki.com/images/button/gif/72x20_4.gif?1155466615" border="0"></a>
</li>
	</ul>
	</div>
	
	<div id="affiliation">
	<h2>L'equipe les utilises </h2>
	<ul>
		<li><a href="http://www.mozilla-europe.org/fr/products/firefox/" target="_blank"><img src="/images/syndication/firefox.gif" height="15" width="80" alt="Vive FireFox !" /></a> <a href="" target="_blank"><img src="/images/syndication/" height="15" width="80" alt="" /></a></li>
		<li><a href="http://www.dotclear.net/" target="_blank"><img src="/images/dotclear_pw.png" height="15" width="80" alt="Dotclear : Script de Blog en PHP" /></a>				<a href="http://www.phpmyadmin.net/" target="_blank"><img src="/images/syndication/phpmyadmin.png" height="15" width="80" alt="Phpmyadmin : Script de gestion de base de donnée Mysql via PHP" /></a></li>
		<li><a href="http://www-fr.mysql.com/" target="_blank"><img src="/images/syndication/mysql.gif" height="15" width="80" alt="Mysql : System de base de donnée libre" /></a> 		<a href="http://php.net" target="_blank"><img src="/images/syndication/php_powered.png" height="15" width="80" alt="PHP: Hypertext Preprocessor" /></a></li>
		<li><a href="http://www.postgresql.org/" target="_blank"><img src="/images/syndication/postgresql.png" height="15" width="80" alt="PostgGesql : System de base de donnée libre" /></a> <a href="http://www.gnu.org/software/emacs/" target="_blank"><img src="/images/syndication/emacs.png" height="15" width="80" alt="Emacs Source Editor" /></a></li>
		<li><a href="http://www.linux.org/" target="_blank"><img src="/images/syndication/linux.png" height="15" width="80" alt="Linux Sytem" /></a> 			<a href="http://www.fr.redhat.com/" target="_blank"><img src="/images/syndication/redhat.gif" height="15" width="80" alt="Redhat distibution professionel Linux" /></a></li>
		<li><a href="http://subversion.tigris.org/" target="_blank"><img src="/images/syndication/svn.png" height="15" width="80" alt="SVN Subversion" /></a> 	<a href="http://www.apache.org/" target="_blank"><img src="/images/syndication/apache.png" height="15" width="80" alt="Apache Server Web" /></a></li>
	
	</ul>
	</div>
	
	<div id="Fortune">
		<h2><label for="q">Citation</label></h2>
		<?php dcFortune::afficher() ?>
	</div>
	
</div>

<p id="footer"></p>

</div> <!-- end #page -->


<div id="copy">
<table width="760" align="center" border="0">
	<tr>
		<td align="left">Copyright &copy; 2006 Awired.net</td>
		<td align="right">Actuellement <?php dcConnected::showConnected(true,"une personne connect&eacute;e","%s personnes connect&eacute;es",240); ?> / <?php echo GStat::BBCtotalvisits()  ?> visites</td>
	</tr>
</table>

</div>


</body>
</html>
<?php require( bbclone::counter() );?>
