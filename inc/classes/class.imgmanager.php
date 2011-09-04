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

require_once dirname(__FILE__).'/class.filemanager.php';

class imgmanager extends filemanager
{
	var $p_url;
	var $img_url;
	
	function imgmanager($root_path,$base_path,$img_url,$p_url)
	{
		parent::filemanager($root_path,$base_path);
		$this->p_url = $p_url;
		$this->img_url = $img_url;
	}
	
	function getNavBar($link='<a href="%1$s">%2$s</a>')
	{
		
		$f = '';
		$res = '&#187; '.sprintf($link,$this->p_url,__('images'));
		
		if (file_exists($this->root.$this->base_path))
		{
			$r = explode('/',$this->base_path);
			for ($i=1; $i<count($r); $i++) {
				$f .= '/'.$r[$i];
				$res .= '/'.sprintf($link,$this->p_url.'?p='.$f,$r[$i]);
			}
		}
		return $res;
	}
	
	function listDir($k,$v,$link='<a href="%1$s">%2$s</a>')
	{
		if ($v['d'] && $v['jail'] && $v['r'] && $v['x'] && $k != '.' && $k != '..') {
			return sprintf($link,$this->p_url.'?p='.$v['l'],$k);
		}
	}
	
	function listImg($k,$v,$link='<a href="%1$s"><img src="%1$s" alt="%2$s" /></a>')
	{
		$type = $this->__getType($this->root.'/'.$this->base_path.'/'.$k);
		$url = $this->__cleanPath($this->img_url.'/'.$this->base_path.'/'.$k);
		
		if ($type == 'img' && $v['jail'] && $v['r']) {
			return sprintf($link,$url,$k,$this->getThumb($k),addslashes($url));
		}
	}
	
	function getThumb($k=NULL,$absolute=false)
	{
		if ($k === NULL) {
			$img = $this->base_path;
		} else {
			$img = $this->base_path.'/'.$k;
		}
		
		$root = !$absolute ? $this->img_url : $this->root;
		
		$tn = $this->root.'/'.preg_replace('/^(.*)([.]\\w+)$/','$1.TN__$2',$img);
		
		if (file_exists($tn)) {
			return $this->__cleanPath($root.'/'.dirname($img).'/'.basename($tn));
		} else {
			return false;
		}
	}
	
	
	function isImg()
	{
		if ($this->getImgType() === false) {
			return false;
		}
		
		return true;
	}
	
	function getImgType()
	{
		return images::type($this->root.$this->base_path);
	}
}
?>