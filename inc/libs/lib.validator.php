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

class validator
{
	function xhtml($input,$charset='UTF-8')
	{
		$res = array('valid' => NULL, 'errors' => '');
		$content = validator::__getContent($input);
		
		$http = new HttpClient('www.htmlhelp.com',80);
		$http->setUserAgent('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.3a) Gecko/20021207');
		$http->useGzip(false);
		$http->setPersistReferers(false);
		
		$params = array('area' => $content,'charset' => $charset);
		
		if ($http->post('/cgi-bin/validate.cgi',$params) !== false)
		{
			$result = $http->getContent();
		
			if (strpos($result,'<p class=congratulations><strong>Congratulations, no errors!</strong></p>'))
			{
				$res['valid'] = true;
			}
			else
			{
				$res['valid'] = false;
				if ($errors = preg_match('#<h2>Errors</h2>[\s]*(<ul>.*</ul>)#msU',$result,$matches))
				{
					$res['errors'] = strip_tags($matches[1],'<ul><li><pre><b>');
				}
			}
			
			return $res;
		}
		
		return false;
	}
	
	function __getContent($input)
	{
		return
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" '.
		'"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n".
		'<html xmlns="http://www.w3.org/1999/xhtml">'."\n".
		'<head>'."\n".
		'<title>validation</title>'."\n".
		'</head>'."\n".
		'<body>'."\n".
		$input."\n".
		'</body>'."\n".
		'</html>';
	}
}
?>
