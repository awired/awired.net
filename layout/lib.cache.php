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

class cache
{
	# Envoyer les en-têtes de cache HTTP en fonction d'une liste de fichiers
	function http($files,$mod_ts=array())
	{
		if (empty($files) || !is_array($files)) {
			return false;
		}
		
		array_walk($files,create_function('&$v','$v = filemtime($v);'));
		
		$array_ts = array_merge($mod_ts,$files);
		
		rsort($array_ts);
		$ts = $array_ts[0];
		
		$since = NULL;
		if (!empty($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
			$since = $_SERVER['HTTP_IF_MODIFIED_SINCE'];
			$since = preg_replace ('/^(.*)(Mon|Tue|Wed|Thu|Fri|Sat|Sun)(.*)(GMT)(.*)/', '$2$3 GMT', $since);
			$since = strtotime($since);
		}
		
		$status_mode = preg_match('/cgi/',php_sapi_name());
		
		# Listes des en-têtes communs
		$headers[] = 'Last-Modified: '.gmdate('D, d M Y H:i:s',$ts).' GMT';
		$headers[] = 'Cache-Control: must-revalidate, max-age=0';
		$headers[] = 'Pragma:';
		
		if ($since >= $ts)
		{
			if ($status_mode) {
				header("Status: 304 Not Modified");
			} else {
				if (version_compare(phpversion(),'4.3.0','>=')) {
					header('Not Modified', TRUE, 304);
				} else {
					header('HTTP/1.x 304 Not Modified');
				}
			}
			foreach ($headers as $v) {
				header($v);
			}
			exit;
		}
		else
		{
			header('Date: '.gmdate('D, d M Y H:i:s').' GMT');
			foreach ($headers as $v) {
				header($v);
			}
		}
	}
	
	
	# écriture d'un fichier de cache
	function writeFile($file,$content)
	{
		$w = false;
		if (file_exists($file)) {
			$w = is_writable($file);
		} else {
			$w = is_writable(dirname($file));
		}
		
		if (!$w) {
			return false;
		}
		
		if (($fp = @fopen($file,'w')) !== false) {
			fwrite($fp,$content,strlen($content));
			fclose($fp);
		}
	}
	
	# Récupération d'un fichier en fonction d'une liste de fichiers
	function getFile($file,$files)
	{
		if (empty($files) || !is_array($files) || !file_exists($file)) {
			return false;
		}
		
		array_walk($files,create_function('&$v','$v = filemtime($v);'));
		rsort($files);
		$ts = $files[0];
		
		$ftime = filemtime($file);
		
		if ($ts <= $ftime) {
			define('DC_CACHE_CONTENT',implode('',file($file)));
		}
	}
}
?>
