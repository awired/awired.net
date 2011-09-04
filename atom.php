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

# Chemin vers la racine de l'application (si vous changer le fichier de place)
$app_path = '/';

# Si par exemple vous mettez rss.php à la racine de votre site et que DotClear
# se trouve dans /dotclear vous pouvez décommenter cette ligne :
//$app_path = '/dotclear/';

# NE RIEN CHANGER APRES CETTE LIGNE

$blog_dc_path = dirname(__FILE__).$app_path;

require $blog_dc_path.'/inc/prepend.php';
require $blog_dc_path.'/layout/lib.cache.php';

require $blog_dc_path.'/layout/class.xblog.php';
require $blog_dc_path.'/layout/class.xblogpost.php';
require $blog_dc_path.'/layout/class.xblogcomment.php';

$type = (!empty($_GET['type']) && $_GET['type'] == 'co') ? 'co' : 'blog';
$cat = (!empty($_GET['cat'])) ? $_GET['cat'] : '';
$lang = (!empty($_GET['lang'])) ? $_GET['lang'] : '';

# Cache HTTP
if (dc_http_cache && defined('DC_UPDATE_FILE_W') && DC_UPDATE_FILE_W)
{
	$mod_files = get_included_files();
	$mod_files[] = DC_UPDATE_FILE;
	$mod_files[] = $blog_dc_path.'/conf/dotclear.ini';

	cache::http($mod_files);
}

# Connexion MySQL
$con = new Connection(DB_USER,DB_PASS,DB_HOST,DB_DBASE);

if ($con->error()) { exit; }

# Création de l'objet de type weblog avec uniquement les billets
# publiés
$blog = new xblog($con,DB_PREFIX,1,dc_encoding);
$blog->rs_blogpost = 'xblogpost';
$blog->rs_blogcomment = 'xblogcomment';

$blog->setURL('post',util::getHost().dc_blog_url.dc_format_post_url);

# Si type = co on fait un fil des commentaires
if ($type == 'co')
{
	if (!empty($_GET['post'])) {
		$comments = $blog->getComments($_GET['post'],'DESC');
	} else {
		$comments = $blog->getComments('','DESC',20);
	}
	
	$title = dc_blog_name.' - Commentaires';
	$ts = time();
	$items = $seq = '';
}
else
{
	# Dernières nouvelles
	$news = $blog->getLastNews(10,$cat,'post_dt DESC',false,$lang);
	
	$ts = strtotime($blog->getEarlierDate());
	$title = dc_blog_name;
}

header('Content-Type: application/atom+xml; charset='.dc_encoding);
echo '<?xml version="1.0" encoding="'.dc_encoding.'" ?>'."\n";
/*
echo '<?xml-stylesheet href="'.$rss_css.'" type="text/css"?>'."\n";
//*/
?>
<feed xmlns="http://www.w3.org/2005/Atom"
	  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	  xml:lang="<?php echo DC_LANG; ?>">
  <title><?php echo $blog->toXML($title); ?></title>
  <link rel="alternate" type="text/html" href="<?php echo util::getHost().dc_blog_url; ?>"/>
  <link rel="self" href="<?php echo util::getPageURL(); ?>"/>
<?php if (dc_blog_desc != '') : ?>
  <subtitle type="text"><?php echo htmlspecialchars(dc_blog_desc); ?></subtitle>
<?php endif; ?>
  <id><?php echo $blog->getAtomID(dc_blog_url); ?></id>

  <updated><?php echo dt::iso8601($ts); ?></updated>
  <generator version="<?php echo DC_VERSION; ?>" uri="http://www.dotclear.net/">DotClear</generator>

  <sy:updatePeriod>daily</sy:updatePeriod>
  <sy:updateFrequency>1</sy:updateFrequency>
  <sy:updateBase><?php echo dt::iso8601($ts); ?></sy:updateBase>

<?php
if ($type == 'co')
{
	while(!$comments->EOF()) {
		echo $comments->getAtomEntry(dc_short_feeds);
		$comments->moveNext();
	}
}
else
{
	while(!$news->EOF()) {
		echo $news->getAtomEntry(dc_short_feeds);
		$news->moveNext();
	}
}

$con->close();
?>
</feed>