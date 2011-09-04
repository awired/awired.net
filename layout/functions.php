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

/**
@doc

== Fonctionnement des gabarits ==

=== Introduction ===

Le système de modèle de page de DotClear n'est pas ce qui se fait de plus
simple à l'usage mais reste abordable pour peu de bien lire la
documentation.

Le fonctionnement est très simple, il s'agit de fonctions PHP qui se
chargent d'afficher l'information qu'on leur demande.

Parfois un motif est utilisé pour formater l'information affichée. Ce motif
constitue une marque de substitution, généralement identifiée par %s. Pour de
plus amples détails, suivre la documentation de la fonction
PHP|PHP Hypertext Processor,
[http://fr2.php.net/manual/fr/function.sprintf.php sprintf].
Pour chaque fonction utilisant un motif, nous expliquerons comment le remplir.
*/

/**
@doc

=== Les fonctions informatives ===

Les fonctions suivantes permettent d'afficher des renseignements divers sur
le blog ou les billets.
*/


/**
@function dcInfo

Fonction affichant une information sur le blog.
La propriété '''name''' peut prendre les valeurs suivantes :

 * name : non du weblogue
 * theme : chemin vers le répertoire du thème
 * img : chemin vers les images
 * url : URL de la home page du blog
 * rss : chemin vers le fil RSS
 * atom : chemin vers le fil Atom
 * search : chemin de l'action pour le moteur de rechercher
 * logo : chemin vers l'image du logo
 * encoding : Encodage des caractères
 * lang : langue principale du weblogue

Exemple :

{{{
#!php
<h1><?php dcInfo(); ?></h1>

<a href="<?php dcInfo('rss'); ?>">fil rss</a>
}}}

Note : vous pouvez faire un lien vers le fil RSS ou Atom d'une catégorie
très facilement en ajoutant l'identifiant de la catégorie à l'URL, comme
ceci par exemple :

{{{
#!php
<a href="<?php dcInfo('rss'); ?>?cat=General">RSS général</a>
}}}

@param 	string name 	Nom de la propriété à afficher 	('name')
*/
function dcInfo($name='name')
{
	switch ($name)
	{
		case 'theme' : echo $GLOBALS['theme_uri'].$GLOBALS['__theme']; break;
		case 'img' : echo $GLOBALS['img_path']; break;
		case 'url' : echo dc_blog_url; break;
		case 'rss' : echo dc_blog_rss; break;
		case 'atom' : echo dc_blog_atom; break;
		case 'search' : echo dc_blog_url; break;
		case 'logo' : echo $GLOBALS['img_path'].'/dotclear_pw.png'; break;
		case 'encoding' : echo dc_encoding; break;
		case 'lang' : echo dc_default_lang; break;
		default : echo dc_blog_name;
	}
}

/**
@function dcDayDate

Cette fonction affiche la date du jour. Elle est utilisée dans la boucle
des billets et n'affiche la date que lors du premier billet du jour. Cela
permet d'afficher la date du jour au dessus de plusieurs billets du même
jour.

On peut entourer la date de marqueur ou de texte grâce à la chaîne
de substitution '''s''' passée en argument. Par exemple:

{{{
#!php
<?php dcDayDate('<h2>%s</h2>'); ?>
}}}

@param string s Chaine de substition ('%s')
*/
function dcDayDate($s='%s')
{
	if ($GLOBALS['news']->firstPostOfDay())
	{
		printf($s,$GLOBALS['news']->getLDate());
	}
}

/**
@function dcCalendar

Cette fonction affiche un calendrier contextuel (mois, année, jour).
Le calendrier est un tableau dans une balise <div> dont la classe
CSS|Cascading Style Sheet est ''cal''. Les nom des jours sont indiqués avec des
cellules d'en-tête (th) et le titre avec (caption).

Exemple d'utilisation :

{{{
#!php
<?php dcCalendar(); ?>
}}}

@param string  block Chaine de substitution pour pour le tableau ('<div class="cal"><table summary="calendrier">%s</table></div>')
*/
function dcCalendar($block='<div class="cal"><table summary="calendrier">%s</table></div>')
{
	global $year,$month,$day,$cat_id,$lang;
	
	echo $GLOBALS['blog']->xCalendar($year,$month,$day,$cat_id,$lang,$block);
}

/**
@function dcHeadLinks

Cette fonction affiche les liens (link) dans l'en-tête du fichier HTML.
Elle génère automatiquement les liens de navigation dans le blog. Il
suffit de la placer dans l'en-tête du document :

{{{
#!php
<head>
<?php dcHeadLinks(); ?>
</head>
}}}
*/
function dcHeadLinks()
{
	global $blog, $cat_id, $rs_cat;
	
	echo dcPostNext(1,'<link rel="next" href="%3$s" title="%2$s" />'."\n");
	echo dcPostNext(-1,'<link rel="previous" href="%3$s" title="%2$s" />'."\n");
	
	if (!$rs_cat->isEmpty() && !$cat_id)
	{
		while (!$rs_cat->EOF())
		{
			if ($rs_cat->f('nb_post') > 0)
			{
				$id = $rs_cat->f('cat_libelle_url');
				$libelle = $rs_cat->f('cat_libelle');
				$lien = sprintf($blog->front_url['cat'],$id);
				
				echo '<link rel="section" href="'.$lien.'" title="'.$libelle.'" />'."\n";
			}
			$rs_cat->moveNext();
		}
		$rs_cat->moveStart();
	}
	
	$arry_months = $GLOBALS['arry_months'];
	$comp_url = '';
	if ($cat_id) {
		$comp_url = $cat_id.'/';
	}
	foreach ($arry_months as $ts => $d)
	{
		$titre = dt::str('%B %Y',$ts);
		$url = sprintf($blog->front_url['archive'],$comp_url.date('Y',$ts),date('m',$ts));
		echo '<link rel="archive" href="'.$url.'" title="'.$titre.'" />'."\n";
	}
	
	if ($GLOBALS['mode'] == 'home')
	{
		echo $GLOBALS['news']->getHeadLinks();
	}
}

/**
@function dcSinglePostTitle

Cette fonction affiche le titre d'un billet si on est sur une page présentant
un billet (/blog/yyyy/mm/dd/titre par exemple).

On l'utilisera dans la balise <title> du document. Par exemple:

{{{
#!php
<title><?php dcSinglePostTitle(); ?></title>
}}}

@param string s Chaîne de substitution ('%s - ')
*/
function dcSinglePostTitle($s='%s - ')
{
	if ($GLOBALS['mode'] == 'post') {
		printf($s,$GLOBALS['news']->f('post_titre'));
	}
}

/**
@function dcSingleCatTitle

Cette fonction affiche le nom de la catégorie s'il y a lieu de l'afficher. On peut
l'utiliser dans le titre, comme '''dcSinglePostTitle'''.

@param string s Chaîne de substitution ('%s - ')
*/
function dcSingleCatTitle($s='%s - ')
{
	if ($GLOBALS['cat_id'] != '') {
		printf($s,$GLOBALS['news']->f('cat_libelle'));
	}
}

/**
@function dcSingleMonthTitle

Cette fonction affiche le mois et l'année en cours s'il y a lieu de l'afficher.
S'utilise aussi dans le titre comme '''dcSinglePostTitle'''.

@param string s Chaîne de substitution ('%s - ')
*/
function dcSingleMonthTitle($s='%s - ')
{
	if ($GLOBALS['mode'] == 'month') {
		$ts = strtotime($GLOBALS['year'].'-'.$GLOBALS['month'].'-01 00:00');
		printf($s,dt::str('%B %Y',$ts));
	}
}

/**
@function dcCustomTitle

Cette fonction affiche le contenu de la variable globale $dc_custom_title.
Cette variable peut-être assignée par un plugin.

@param string s Chaîne de substitution ('%s - ')
*/
function dcCustomTitle($s='%s - ')
{
	if (!empty($GLOBALS['dc_custom_title'])) {
		printf($s,$GLOBALS['dc_custom_title']);
	}
}

/**
@doc

==== Exemples d'usage des fonctions pour la balise <title> ====

Voici un exemple de commun de balise <title> à partir des fonctions précédentes :

{{{
#!php
<title><?php dcSinglePostTitle('%s - '); dcSingleCatTitle('%s - ');
dcSingleMonthTitle('%s - '); dcCustomTitle('%s - '); dcInfo(); ?></title>
}}}
*/

/**
@function dcLangList

Cette fonction affiche une liste des langues définies dans les billets. Les
langues s'affichent uniquement si au moins deux langues différentes existent.
Ceci permet d'offrir une navigation par langue dans le weblogue.

@param string  block Chaine de substitution pour pour la liste ('<ul>%s</ul>')
@param string  item  Chaine de substitution pour un élément ('<li>%s</li>')
*/
function dcLangList($block='<ul>%s</ul>',$item='<li>%s</li>')
{
	global $rs_lang,$lang,$blog;
	
	if ($rs_lang->nbRow() > 1)
	{
		$res = '';
		while ($rs_lang->fetch())
		{
			$lien = '<a href="'.
			sprintf($blog->front_url['cat'],$rs_lang->f(0)).'">'.
			$rs_lang->f(0).'</a>';
			
			if ($lang == $rs_lang->f(0)) {
				$lien = '<strong>'.$lien.'</strong>';
			}
			
			$res .= sprintf($item,$lien);
		}
		
		printf($block,$res);
	}
}

/**
@function dcCatList

Cette fonction affiche une liste des catégories avec les liens pour y
accéder. La liste générée est une liste non ordonnée (<ul>), il est donc
très simple de la mettre en forme par la suite.

@param string  block Chaine de substitution pour pour la liste ('<ul>%s</ul>')
@param string  item  Chaine de substitution pour un élément ('<li>%s</li>')
*/
function dcCatList($block='<ul>%s</ul>',$item='<li>%s</li>')
{
	global $rs_cat, $cat_id, $lang, $blog;
	
	$comp_url = '';
	
	if ($lang) {
		$comp_url = $lang.'/';
	}
	
	if (!$rs_cat->isEmpty())
	{
		$res = '';
		
		while (!$rs_cat->EOF())
		{
			if ($rs_cat->f('nb_post') > 0)
			{
				$id = $rs_cat->f('cat_libelle_url');
				$libelle = $rs_cat->f('cat_libelle');
				
				$lien = '<a href="'.
				sprintf($blog->front_url['cat'],$comp_url.$id).
				'">'.$libelle.'</a>';
				
				if ($cat_id == $id) {
					$lien = '<strong>'.$lien.'</strong>';
				}
				
				$res .= sprintf($item,$lien);
			}
			$rs_cat->moveNext();
		}
		$rs_cat->moveStart();
		
		printf($block,$res);
	}
}

/**
@function dcMonthsList

Cette fonction affiche la liste des mois contenant les archives.
Si on se trouve dans une catégorie, seuls les mois de cette catégorie
seront affichés.

@param string  block Chaine de substitution pour pour la liste ('<ul>%s</ul>')
@param string  item  Chaine de substitution pour un élément ('<li>%s</li>')
*/
function dcMonthsList($block='<ul>%s</ul>',$item='<li>%s</li>')
{
	global $arry_months, $month, $year, $cat_id, $lang, $blog;
	
	$comp_url = '';
	
	if ($lang) {
		$comp_url .= $lang.'/';
	}
	
	if($cat_id) {
		$comp_url .= $cat_id.'/';
	}
	
	$res = '';
	
	foreach($arry_months as $ts => $d)
	{
		$titre = dt::str('%B %Y',$ts);
		
		$url = sprintf($blog->front_url['archive'],$comp_url.date('Y',$ts),date('m',$ts));
		$lien = '<a href="'.$url.'">%s</a>';
		
		$liClass = '';
		
		if($year == date('Y',$ts) && $month == date('m',$ts)) {
			$lien = '<strong>'.$lien.'</strong>';
		}
		
		$res .= sprintf($item,sprintf($lien,$titre));
	}
	
	if (count($arry_months) > 0) {
		printf($block,$res);
	}
}

/**
@function dcSelection

Cette fonction affiche une liste des billets sélectionnés, avec simplement
le titre et un lien vers le billet. L'affichage par défaut produira une liste,
vous pouvez l'appeler tout simplement par '''dcSelection()'''.


@param string  block Chaine de substitution pour pour la liste ('<ul>%s</ul>')
@param string  item  Chaine de substitution pour un élément ('<li><a href="%2$s">%1$s</a></li>')
@param integer limit Nombre de titres à afficher (ilimité)
*/
function dcSelection($block='<ul>%s</ul>',$item='<li><a href="%2$s">%1$s</a></li>',$limit=NULL)
{
	global $blog;
	
	$rs = $blog->getLastNews($limit,'','post_dt DESC',true);
	
	if (!$rs->isEmpty()) {
		$res = '';
		while (!$rs->EOF()) {
			$res .= sprintf($item,$rs->f('post_titre'),$rs->getPermURL());
			$rs->moveNext();
		}
		printf($block,$res);
	}
}

/**
@function dcSearchString

Cette fonction affiche la chaîne de recherche lorsque qu'une recherche vient d'être
effectuée.

@param string s Chaîne de substitution ('%s')
*/
function dcSearchString($s='%s')
{
	if(!empty($_GET['q'])) {
		printf($s,htmlspecialchars(stripslashes($_GET['q'])));
	}
}

/**
@function dcAdminLink

Cette fonction affiche un lien vers l'espace d'administration du blog dans le
cas ou une session d'administration est ouverte (et seulement dans ce cas).

@param string s Chaine de substitution ('<ul><li><a href="%s">admin</a></li></ul>')
*/
function dcAdminLink($s='<ul><li><a href="%s">admin</a></li></ul>')
{
	if (isset($_SESSION['sess_user_id']) && defined('DC_ECRIRE')) {
		$url = dc_app_url.'/'.DC_ECRIRE.'/index.php';
		printf($s,$url);
	}
}


# Billets #################################################
/**
@doc

=== Traitement des billets. ===

Les fonctions suivantes doivent être utilisées uniquement dans un
contexte de billet. Cela signifie qu'on l'utilisera si '''$mode'''
vaut 'post' ou dans une boucle de billet. Exemple:

{{{
#!php
<?php if ($mode == 'post') : ?>
 on peut utiliser les fonctions.
<?php endif; ?>
}}}

L'affichage des listes de billets est géré par une boucle très simple
à mettre en place. Voici un exemple qui affiche le titre des billets :

{{{
#!php
<?php while ($news->fetch()) : ?>
 <h3><?php dcPostTitle(); ?></h3>
<?php endwhile; ?>
}}}
*/

/**
@function dcPostURL

Cette fonction affiche l'URI du billet, son permalien. On l'utilisera dans
l'affichage d'un billet (boucle ou pas). Par exemple:

{{{
#!php
<a href="<?php dcPostURL(); ?>">lien permanent</a>
}}}
*/
function dcPostURL()
{
	echo $GLOBALS['news']->getPermURL();
}

/**
@function dcPostID

Cette fonction affiche l'ID du billet (son numéro identifiant unique).
*/
function dcPostID()
{
	echo $GLOBALS['news']->f('post_id');
}

/**
@function dcPostTitle

Cette fonction affiche le titre d'un billet, avec chaîne de substitution
possible. Exemple:

{{{
#!php
<h2><?php dcPostTitle(); ?></h2>
}}}
*/
function dcPostTitle($s='%s')
{
	printf($s,$GLOBALS['news']->f('post_titre'));
}

/**
@function dcPostCatTitle

Dans le contexte du billet, cette fonction affiche le nom de la catégorie
du billet.
*/
function dcPostCatTitle()
{
	echo $GLOBALS['news']->f('cat_libelle');
}

/**
@function dcPostCatURL

Cette fonction affiche l'URL de la catégorie d'un billet. Ne s'utilise que dans
le contexte d'un billet. Par exemple:

{{{
#!php
<a href="<?php dcPostCarURL(); ?>"><?php dcPostCatTitle(); ?></a>
}}}
*/
function dcPostCatURL()
{
	echo $GLOBALS['news']->getCatURL();
}

/**
@function dcPostContent

Cette fonction affiche le contenu d'un billet (sans son chapô). On peut
limiter le nombre de mots affichés avec le paramère '''part'''.
Si '''part''' vaut 0 alors on affiche tout le billet.

@param integer part Nombre de mots à afficher
*/
function dcPostContent($part=0)
{
	global $news;
		
	if ($part > 0) {
		echo $news->blog->getPart($news->f('post_content'),$part);
	} else {
		echo $news->getContent();
	}
}

/**
@function dcPostChapo

Cette fonction affiche le chapô d'un billet s'il existe, sinon elle
n'affiche rien. Le paramètre '''s''' permet d'ajouter des information lors
de l'affichage du chapô. Exemple:

{{{
#!php
<?php dcPostChapo('<h3>Chapô</h3> %s'); ?>
}}}

@param string s Chaine de substitution ('%s <hr />')
*/
function dcPostChapo($s='%s <hr />')
{
	printf($s,$GLOBALS['news']->getChapo());
}

/**
@function dcPostAbstract

Cette fonction affiche le chapô du billet s'il y en a un sinon elle affiche
le contenu du billet. Si elle affiche le chapô, le paramètre '''l''' permet
de définir un texte à afficher après le chapô. Dans le paramètre '''l''' la
première chaîne %s indique le lien vers le billet et la seconde le titre
du billet. On pourra donc par exemple faire ceci :

{{{
#!php
<?php dcPostAbstract('%s','<p><a href="%s" title="Lire %s">Lire la suite</a></p>'); ?>
}}}

On notera que cette fonction trouve sa place dans un affichage de liste de
billets, plutôt que dans l'affichage d'un seul billet.

@param string s Chaîne de substitution du chapô ('%s')
@param string l Chaîne affichée après le chapô ('<p><a href="%s" title="%s">Read next</a></p>')
*/
function dcPostAbstract($s='%s',$l='<p><a href="%s" title="Read %s">Read next</a></p>')
{
	global $news;
		
	if ($news->f('post_chapo') != '') {
		printf($s,$news->getChapo());
		printf($l,$news->getPermURL(),$news->f('post_titre'));
	} else {
		echo $news->getContent();
	}
}

/**
@function dcPostAuthor

Cette fonction affiche le nom canonique de l'auteur du billet. Le nom canonique
est défini en fonction des informations données par le rédacteur. Si un pseudo
est présent, il sera utilisé, sinon, le prénom et le nom seront utilisés.
*/
function dcPostAuthor()
{
	echo $GLOBALS['news']->getUserCN();
}

/**
@function dcPostDate

Cette fonction affiche la date d'un billet. On peut changer le formatage
de la date en changeant le paramètre '''format'''. Par défaut, ce paramètre
utilisera le format donné dans la configuration du blog.

Voir [http://fr2.php.net/manual/fr/function.strftime.php strftime] pour les
formats possible de date.

@param string format Masque de formatage de la date ('')
*/
function dcPostDate($format='')
{
	if ($format) {
		echo dt::str($format,strtotime($GLOBALS['news']->f('post_dt')));
	} else {
		echo $GLOBALS['news']->getLDate();
	}
}

/**
@function dcPostTime

Cette fonction affiche l'heure d'un billet en utilisant le format donné dans la
configuration du blog.
*/
function dcPostTime($format='')
{
	echo $GLOBALS['news']->getLTime();
}

/**
@function dcPostLang

Cette fonction affiche l'attribut lang="" pour un billet. Vous pouvez le
positionner dans n'importe quel marqueur. Rien n'est affiché si la langue
n'est pas présente.
*/
function dcPostLang()
{
	$lang = $GLOBALS['news']->f('post_lang');
	if ($lang != '') {
		echo 'lang="'.$lang.'"';
	}
}

/**
@function dcPostNbComments

Cette fonction affiche le nombre de commentaires d'un billet.
Les trois arguments permettent de définir le texte affiché pour
respectivement aucun, un ou plusieurs commentaires. Par exemple:

{{{
#!php
<?php dcPostNbComments('aucun commentaire','un commentaire',
'%s commentaires'); ?>
}}}

@param string zero Texte affiché pour 0 commentaire
@param string one Texte affiché pour 1 commentaire
@param string more Texte affiché plusieurs commentaires
*/
function dcPostNbComments($zero,$one,$more)
{
	$nb = $GLOBALS['news']->f('nb_comment');
	
	if($nb == 0) {
		echo $zero;
	} elseif($nb == 1) {
		echo $one;
	} elseif($nb > 1) {
		printf($more,$nb);
	}
}

/**
@function dcPostNbTrackbacks

Cette fonction affiche le nombre de trackbacks d'un billet.
Les trois arguments permettent de définir le texte affiché pour
respectivement aucun, un ou plusieurs trackbacks. Par exemple:

{{{
#!php
<?php dcPostNbTrackbacks('aucun trackback','un trackback',
'%s trackbacks'); ?>

@param string zero Texte affiché pour 0 trackback
@param string one Texte affiché pour 1 trackback
@param string more Texte affiché plusieurs trackbacks
*/
function dcPostNbTrackbacks($zero,$one,$more)
{
	$nb = $GLOBALS['news']->f('nb_trackback');
	
	if($nb == 0) {
		echo $zero;
	} elseif($nb == 1) {
		echo $one;
	} elseif($nb > 1) {
		printf($more,$nb);
	}
}

/**
@function dcPostNext

Cette fonction permet d'afficher une information sur le billet suivant ou
précédent. Le paramètre '''dir''' indique la direction dans laquelle chercher
le billet (1 pour suivant, -1 pour précédent). Le paramètre '''s''' est une
chaîne de substitution permettant de formater l'affichage des informations
concernant le billet. Il y a trois paramètres à cette chaîne, donnant
respectivement l'ID, le titre et l'url du billet suivant ou précédent. Cette
fonction n'affiche rien si elle ne trouve pas de billet.

On peut l'utiliser pour l'affichage individuel des billets, par exemple:

{{{
#!php
<?php dcPostNext(1,'<a href="%3$s" title="%2$s">Billet suivant</a>'); ?>
}}}

Ceci affichera un lien vers le billet suivant s'il existe et ayant pour titre le
titre du billet.

@param integer dir Direction (1)
@param string s Chaîne de substitution ('%1$s %2$s %3$s')
*/
function dcPostNext($dir,$s='%1$s %2$s %3$s')
{
	global $blog;
	
	if ($dir > 0 && (empty($GLOBALS['rs_next'])) || empty($GLOBALS['rs_prev'])) {
		return false;
	}
	
	$rs = ($dir > 0) ? $GLOBALS['rs_next'] : $GLOBALS['rs_prev'];
	
	if (!$rs->isEmpty())
	{
		$id = $rs->f('post_id');
		$titre = $rs->f('post_titre');
		$date = $rs->f('post_dt');
		
		$ts = strtotime($date);
		
		$url = sprintf($blog->front_url['post'],date('Y',$ts),
		date('m',$ts),date('d',$ts),$id,$blog->str2url($titre));
	
		printf($s,$id,$titre,$url);
	}
}

/**
@function dcPostOpenComments

Cette fonction indique si les commentaires sont autorisés pour un billet.
On peut l'utiliser dans un test par exemple.

@return boolean
*/
function dcPostOpenComments()
{
	return (boolean) $GLOBALS['news']->openComment();
}

/**
@function dcPostOpenTrackbacks

Cette fonction indique si les trackbacks sont autorisés pour un billet.
On peut l'utiliser dans un test par exemple.

@return boolean
*/
function dcPostOpenTrackbacks()
{
	return (boolean) $GLOBALS['news']->openTb();
}

/**
@function dcPostTrackbackURI

Cette fonction affiche l'URI à pinger pour faire un trackback sur un billet.
*/
function dcPostTrackbackURI()
{	
	echo
	'http://'.$_SERVER['HTTP_HOST'].
	dc_trackback_uri.'?id='.$GLOBALS['news']->f('post_id');
}

/**
@function dcPostTrackbackAutoDiscovery

Cette fonction affiche le commentaire HTML contenant les informations
RDF permettant de réaliser la découverte automatique de l'URL de trackback.
On l'utilisera dans l'en-tête du document de préférence.
*/
function dcPostTrackbackAutoDiscovery()
{	
	if ($GLOBALS['mode'] == 'post' && $GLOBALS['news']->openTb())
	{
		$tb_url = 'http://'.$_SERVER['HTTP_HOST'].
		dc_trackback_uri.'?id='.$GLOBALS['news']->f('post_id');
		
		echo '<!--'."\n".
		'<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"'."\n".
		'  xmlns:dc="http://purl.org/dc/elements/1.1/"'."\n".
		'  xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">'."\n".
		'<rdf:Description'."\n".
		'  rdf:about="http://'.$_SERVER['HTTP_HOST'].$GLOBALS['news']->getPermURL().'"'."\n".
		'  dc:identifier="http://'.$_SERVER['HTTP_HOST'].$GLOBALS['news']->getPermURL().'"'."\n".
		'  dc:title="'.$GLOBALS['news']->f('post_titre').'"'."\n".
		'  trackback:ping="'.$tb_url.'" />'."\n".
		'</rdf:RDF>'."\n".
		'-->'."\n";
	}
}

# Commentaires ############################################
/**
@doc

=== Traitement des commentaires ===

Le traitement des commentaires est régis par la même système de boucle
que les billets. Les fonctions suivantes ne s'utilisent que dans une
boucle de commentaires sauf '''dcCommentFormError''' et '''dcCommentFormValue'''
qui peuvent être utilisés partout.

Exemple d'une boucle de commentaires affichant son contenu

{{{
#!php
<?php while ($comments->fetch()) : ?>
 <?php dcCommentContent(); ?>
<?php endwhile; ?>
}}}
*/

/**
@function dcCommentContent

Cette fonction affiche le contenu d'un commentaire.
*/
function dcCommentContent()
{
	echo $GLOBALS['comments']->xGetContent();
}

/**
@function dcCommentContentTransform

Cette fonction affiche un commentaire de type trackback avec le lien vers
l'article dans le corps du commentaire (autour du titre). Sinon, il affiche
que le commentaire comme dcCommentContent().
*/
function dcCommentContentTransform()
{
	dcCommentContent();
}

/**
@function dcCommentDate

Cette fonction affiche la date d'un commentaire. On peut changer le formatage
de la date en changeant le paramètre '''format'''. Par défaut, ce paramètre
utilisera le format donné dans la configuration du blog.

Voir [http://fr2.php.net/manual/fr/function.strftime.php strftime] pour les
formats possibles de date.

@param string format Masque de formatage de la date ('')
*/
function dcCommentDate($format='')
{
	 if ($format) {
		echo dt::str($format,strtotime($GLOBALS['comments']->f('comment_dt')));
	} else {
		echo $GLOBALS['comments']->getLDate();
	}
}

/**
@function dcCommentTime

Cette fonction affiche l'heure d'un commentaire en utilisant le format donné
dans la configuration du blog.
*/
function dcCommentTime()
{
	echo $GLOBALS['comments']->getLTime();
}

/**
@function dcCommentAuthor

Cette fonction affiche le pseudo de l'auteur d'un commentaire. Avec un lien si
l'auteur a laissé une URL

@param string s Chaîne de substitution, uniquement si l'auteur a laissé une URL
*/
function dcCommentAuthor($s='<a href="%1$s">%2$s</a>')
{
	if (($link = $GLOBALS['comments']->auteurSite()) !== false) {
		printf($s,$link,$GLOBALS['comments']->f('comment_auteur'));
	} else {
		echo $GLOBALS['comments']->f('comment_auteur');
	}
}

/**
@function dcCommentID

Cette fonction affiche l'ID d'un commentaire
*/
function dcCommentID()
{
	echo $GLOBALS['comments']->f('comment_id');
}

/**
@function dcCommentAuthorLink

Cette fonction affiche le nom de l'auteur avec un lien
vers son adresse email s'il en a laissé une.

@param string s Chaîne de substitution
*/
function dcCommentAuthorLink($s='%s')
{
	if (($link = $GLOBALS['comments']->auteurLink()) !== false) {
		printf($s,$link);
	}
}

/**
@function dcCommentAuthorSite

Cette fonction affiche un lien vers le site de l'auteur d'un commentaire
s'il en a laissé un.

@param string s Chaîne de substitution
*/
function dcCommentAuthorSite($s='%s')
{
	if (($link = $GLOBALS['comments']->auteurSite()) !== false) {
		printf($s,$link);
	}
}

/**
@function dcCommentPreview

Cette fonction affiche la prévisualisation d'un commentaire. Elle affiche les
émoticones et le formatage tel qu'il sera affiché.
*/
function dcCommentPreview()
{
	if (!empty($GLOBALS['in_content'])) {
		if (dc_use_smilies) {
			echo $GLOBALS['blog']->addSmilies($GLOBALS['in_content']);
		} else {
			echo $GLOBALS['in_content'];
		}
	}
}

/**
@function dcCommentFormError

Cette fonction affiche les erreurs qui ont pu se produire lors de la soumission
d'un commentaire. Il est conseillé de la laisser.

@param string s Chaîne de substitution
*/
function dcCommentFormError($s='%s')
{
	if (!empty($GLOBALS['form_err'])) {
		printf($s,$GLOBALS['form_err']);
	}
}

/**
@function dcCommentFormMsg

Cette fonction affiche un message après la soumission d'un commentaire. Le seul
message actuellement est la confirmation de la réception du commentaire quand
ceux-ci sont modérés. Si vous ne modérez pas les commentaires, cette fonction
peut ne pas être utilisée.

@param string s Chaîne de substitution
*/
function dcCommentFormMsg($s='%s')
{
	if (!empty($GLOBALS['form_msg'])) {
		printf($s,$GLOBALS['form_msg']);
	}
}

/**
@function dcCommentFormValue

Cette fonction affiche la valeur d'une variable pour le formulaire de
commentaire. Elle permet par exemple de rappeler les valeurs en cas d'erreur.
Les valeurs possibles de '''var''' sont :

 * c_nom : nom
 * c_mail : adresse email
 * c_site : site web
 * c_content : contenu du commentaire

On pourra utiliser par exemple:

{{{
#!php
<input name="c_nom" id="c_nom" type="text" size="30" maxlength="255"
value="<?php dcCommentFormValue('c_nom'); ?>" />
}}}

@param string var Nom de la variable à afficher
*/
function dcCommentFormValue($var)
{
	echo htmlspecialchars($GLOBALS[$var]);
}

/**
@function dcCommentFormRedir

Cette fonction donne l'url vers laquelle on redirige le client une fois
le commentaire posté.
*/
function dcCommentFormRedir()
{
	echo util::getPageURL();
}

/**
@function dcCommentIsTrackBack

Cette fonction indique si un commentaire est un trackback.

@return boolean 
*/
function dcCommentIsTrackBack()
{
	return (boolean) $GLOBALS['comments']->f('comment_trackback');
}

/**
@function dcCommentTrackBackURL

Cette fonction retourne l'URL du trackback. Il s'agit en fait de l'URL
du site dans le commentaire. Elle fait simplement un test supplémentaire
pour vérifier que le commentaire est bien un trackback.
*/
function dcCommentTrackBackURL($s='%s')
{
	if ($GLOBALS['comments']->f('comment_trackback') == 1)
	{
		printf($s,$GLOBALS['comments']->f('comment_site'));
	}
}

# Trackbacks ##############################################
/**
@doc

=== Traitement des trackbacks ===

Le traitement des trackbacks suit le même fonctionnement que les
commentaires. Les fonctions suivantes ne s'utilisent que dans une
boucle de trackbacks.

Exemple d'une boucle de trackbacks affichant son contenu

{{{
#!php
<?php while ($trackbacks->fetch()) : ?>
 <?php dcTBContent(); ?>
<?php endwhile; ?>
}}}
*/

/**
@function dcTBContent

Cette fonction affiche un trackback avec le lien vers
l'article dans le corps du commentaire (autour du titre).
*/
function dcTBContent()
{
	$content = $GLOBALS['trackbacks']->xGetContent();
	$link = '<a href="'.$GLOBALS['trackbacks']->auteurSite().'" rel="nofollow">$2</a>';
	
	echo preg_replace('|(<p><strong>)(.*)(</strong></p>)|msU','$1'.$link.'$3',$content);
}

/**
@function dcTBDate

Cette fonction affiche la date d'un trackback. On peut changer le formatage
de la date en changeant le paramètre '''format'''. Par défaut, ce paramètre
utilisera le format donné dans la configuration du blog.

Voir [http://fr2.php.net/manual/fr/function.strftime.php strftime] pour les
formats possibles de date.

@param string format Masque de formatage de la date ('')
*/
function dcTBDate($format='')
{
	 if ($format) {
		echo dt::str($format,strtotime($GLOBALS['trackbacks']->f('comment_dt')));
	} else {
		echo $GLOBALS['trackbacks']->getLDate();
	}
}

/**
@function dcTBTime

Cette fonction affiche l'heure d'un trackback en utilisant le format donné
dans la configuration du blog.
*/
function dcTBTime()
{
	echo $GLOBALS['trackbacks']->getLTime();
}

/**
@function dcTBAuthor

Cette fonction affiche le nom de l'auteur d'un trackback.
*/
function dcTBAuthor()
{
	echo $GLOBALS['trackbacks']->f('comment_auteur');
}

/**
@function dcTBID

Cette fonction affiche l'ID d'un trackback
*/
function dcTBID()
{
	echo $GLOBALS['trackbacks']->f('comment_id');
}
?>
