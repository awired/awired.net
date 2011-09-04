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

# Recherche d'un mode, des id, tout ça

# Fix a bug in PHP 4.1 with queries like ?arg (and no value)
function rebuildQuery()
{
	if (!empty($_SERVER['QUERY_STRING']))
	{
		$q = explode('&',$_SERVER['QUERY_STRING']);
		$T = array();
		foreach ($q as $v)
		{
			$t = explode('=',$v);
			if (empty($t[1])) {
				$t[1] = '0';
			}
			$T[] = $t[0].'='.$t[1];
		}
		return implode('&',$T);
	}
	return '';
}

function dcGetMod()
{
	$args = '';
	
	if (!empty($_GET['q'])) {
		return 'search';
	}
	
	# Méthode de scan des URL
	if (dc_url_scan == 'path_info') {
		if (preg_match('/^'.preg_quote(dc_blog_url,'/').'(.*)$/',$_SERVER['REQUEST_URI'],$match)) {
			$args = preg_replace('/^[\/]?(.*?)[\/]?$/','$1',$match[1]);
		}
	} elseif (dc_url_scan == 'query_string' && !empty($_SERVER['QUERY_STRING'])) {
		parse_str(rebuildQuery(),$qs);
		$qs = array_keys($qs);
		if ($_GET[$qs[0]] == '') {
			$args = $qs[0];
			unset($_GET[$qs[0]]);
			unset($_REQUEST[$qs[0]]);
		}
	} else {
		$args = '';
	}
	
	if ($args != '' && preg_match('!^([a-z]{2}(-[a-z]{2})?)(/(.*)|\z)$!',$args,$match)) {
		$_GET['l'] = $match[1];
		$args = (!empty($match[4])) ? $match[4] : '';
	}
	
	if($args != '')
	{
		if(preg_match('!^([0-9]{4}/[0-9]{2})(/|\z)!',$args,$match))
		{
			$_GET['d'] = $match[1];
			if(preg_match('!^([0-9]{4}/[0-9]{2}/[0-9]{2})(/|\z)!',$args,$match))
			{
				$_GET['d'] = $match[1];
				if(preg_match('!^[0-9]{4}/[0-9]{2}/[0-9]{2}/([0-9]+)!',$args,$match))
				{
					$_GET['p'] = $match[1];
				}
			}
		}
		elseif(preg_match('!^([A-Z][A-Za-z0-9_-]*)([^/]*)?(/|\z)!',$args,$match))
		{
			$_GET['cat'] = $match[1];
			if(preg_match('!^[A-Z][A-Za-z0-9_-]*([^/]*?)/([0-9]{4}/[0-9]{2})!',$args,$match))
			{
				$_GET['d'] = $match[2];
				if(preg_match('!^[A-Z][A-Za-z0-9_-]*([^/]*)?/([0-9]{4}/[0-9]{2}/[0-9]{2})!',$args,$match))
				{
					$_GET['d'] = $match[2];
				}
			}
		}
		
	}
	
	$GLOBALS['dc_args'] = $args;
	
	if (!empty($_GET['p'])) {
		return 'post';
	} elseif (!empty($_GET['d']) && strlen($_GET['d']) == 10) {
		return 'day';
	} elseif (!empty($_GET['d']) && strlen($_GET['d']) == 7) {
		return 'month';
	} elseif (!empty($_GET['cat'])) {
		return 'cat';
	} else {
		return 'home';
	}
}
?>