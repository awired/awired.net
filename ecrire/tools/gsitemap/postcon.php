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
$cfg_file = DC_SHARE_DIR.'/gsitemap/gsitemap.ini';
$gsmap_active = false;

if (@file_exists($cfg_file)) {
	$gsmap_config = iniFile::read($cfg_file, true);
	$gsmap_active = $gsmap_config['dc_gsitemap_active'];
}

// On ne lance le traitement que si le plugin est activé.
if ($gsmap_active && $mode == 'home' && !empty($dc_args)) {
	$tab_query = array_filter(explode('/',$dc_args),'strlen');
	if ($tab_query[0] == 'gsitemap')
	{
		require_once(dirname(__FILE__).'/lib.gsitemap.php');
		if ($out = gsitemap::build()) {
			header('Content-type: text/xml', true);
			print($out);
		} else {
			print('<p><strong>Sitemap error</strong></p>');
		}
		$con->close();
		exit;
	}
}
?>