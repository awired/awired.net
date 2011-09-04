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
class gsitemap {
	function build()
	{
		global $gsmap_config;

		if (empty($gsmap_config)) return false;
		$sitemap_xml =
			'<?xml version="1.0" encoding="UTF-8"?>'."\n".
			'<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">'."\n";
		foreach (array('home','feeds','posts','cats','related') as $what) {
			if ($gsmap_config['dc_gsitemap_'.$what]) {
				$fn = 'include'.ucfirst($what);
				$sitemap_xml .= gsitemap::$fn($gsmap_config['dc_gsitemap_'.$what.'_pr'],$gsmap_config['dc_gsitemap_'.$what.'_pd']);
			}
		}
		$sitemap_xml .= '</urlset>';
		return($sitemap_xml);
	}


	function setPriority($priority)
	{
		return(
			sprintf(
				'<priority>%.1f</priority>',
				min(abs((float)$priority),1)
			)
		);
	}

	function setFrequency($frequency)
	{
		$freqs = array('','always','hourly','daily','weekly','monthly','never');
		$frequency = min(abs(intval($frequency)),6);
		$res = ($frequency > 0)?'<changefreq>'.$freqs[$frequency].'</changefreq>':'';
		return($res);
	}


	function includeHome($priority,$frequency)
	{
		return(
			'<!-- Homepage -->'."\n".
			'<url>'.
			'<loc>http://'.$_SERVER['HTTP_HOST'].dc_blog_url.'</loc>'.
			gsitemap::setPriority($priority).
			gsitemap::setFrequency($frequency).
			'</url>'."\n"
		);
	}

	function includeFeeds($priority,$frequency)
	{
		return(
			'<!-- Main syndication feeds -->'."\n".
			'<url>'.
			'<loc>http://'.$_SERVER['HTTP_HOST'].dc_blog_rss.'</loc>'.
			gsitemap::setPriority($priority).
			gsitemap::setFrequency($frequency).
			'</url>'.
			'<url>'.
			'<loc>http://'.$_SERVER['HTTP_HOST'].dc_blog_atom.'</loc>'.
			gsitemap::setPriority($priority).
			gsitemap::setFrequency($frequency).
			'</url>'."\n"
		);
	}


	function includePosts($priority,$frequency)
	{
		global $blog;

		$posts = $blog->getLastNews('','','post_dt DESC',false,'');
		$res = '';
		while ($posts->fetch()) {
			$res .=
				'<url>'.
				'<loc>http://'.$_SERVER['HTTP_HOST'].$posts->getPermURL().'</loc>'.
				'<lastmod>'.$posts->getIsoDate().'</lastmod>'.
				gsitemap::setPriority($priority).
				gsitemap::setFrequency($frequency).
				'</url>'."\n";
		}
		return((!empty($res))?'<!-- Posts -->'."\n".$res:$res);
	}


	function includeCats($priority,$frequency)
	{
		global $blog;

		$cats = $blog->getCat('','cat_ord');
		$res = '';
		while($cats->fetch()) {
			$res .=
				'<url>'.
				'<loc>http://'.$_SERVER['HTTP_HOST'].sprintf($blog->front_url['cat'],$cats->f('cat_libelle_url')).'</loc>'.
				gsitemap::setPriority($priority).
				gsitemap::setFrequency($frequency).
				'</url>'."\n";
		}
		return((!empty($res))?'<!-- Categories -->'."\n".$res:$res);
	}


	function includeRelated($priority,$frequency)
	{
		global $blog;

		$res = '';
		if (is_callable(array('dcRelatedPages','relatedIniToArray'))) {
			$priority = min(abs((float)$priority),1);
			$rel_pages = dcRelatedPages::relatedIniToArray();
			foreach ($rel_pages as $url => $v) {
				$res .=
					'<url>'.
					'<loc>http://'.$_SERVER['HTTP_HOST'].dc_blog_url.(dc_url_scan == 'query_string' ? '?' : '').$url.'</loc>'.
					gsitemap::setPriority($priority).
					gsitemap::setFrequency($frequency).
					'</url>'."\n";
			}
		}
		return((!empty($res))?'<!-- Related pages -->'."\n".$res:$res);
	}
}
?>