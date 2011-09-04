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

/*
Classe Menu
*/

class menu
{
	function menu($id,$imgSpace='',$itemSpace='')
	{
		$this->id = $id;
		$this->imgSpace = $imgSpace;
		$this->itemSpace = $itemSpace;
		$this->items = array();
	}
	
	function addItem($title,$url,$img,$active,$show=true,$id=NULL)
	{
		if($show)
		{
			if (is_array($url)) {
				$link = $url[0];
				$ahtml = (!empty($url[1])) ? ' '.$url[1] : '';
			} else {
				$link = $url;
				$ahtml = '';
			}
			
			$this->items[] =
			'<li'.(($active) ? ' class="actif"' : '').
			(($id) ? ' id="'.$id.'"' : '').
			'>'.
			(($img) ? '<img src="'.$img.'" alt="" />'.$this->imgSpace : '').
			'<a href="'.$link.'"'.$ahtml.'>'.$title.'</a></li>'."\n";
		}
	}
	
	function draw()
	{
		$res = '<ul id="'.$this->id.'">'."\n";
		
		if (count($this->items) > 0) {
			for ($i=0; $i<count($this->items); $i++)
			{
				if ($i+1 < count($this->items) && $this->itemSpace != '') {
					$res .= preg_replace('|</li>$|',$this->itemSpace.'</li>',$this->items[$i]);
					$res .= "\n";
				} else {
					$res .= $this->items[$i]."\n";
				}
			}
		} else {
			$res .= '<li>&nbsp;</li>';
		}
		
		$res .= '</ul>'."\n";
		
		return $res;
	}
}
?>