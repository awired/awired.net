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

class checkList
{
	var $check = array();
	
	function checkList()
	{
		
	}
	
	function addItem($name,$test,$on,$off)
	{
		$this->check[$name] = array(
			'test' => (($test === NULL) ? NULL : (boolean) $test),
			'on' => $on,
			'off' => $off
		);
	}
	
	function checkAll()
	{
		foreach ($this->check as $v) {
			if ($v['test'] === false) {
				return false;
			}
		}
		return true;
	}
	
	function checkItem($name)
	{
		if (!empty($this->check[$name])) {
			return $this->check[$name]['test'];
		} else {
			return false;
		}
	}
	
	function checkWarnings()
	{
		foreach ($this->check as $v) {
			if ($v['test'] === NULL) {
				return true;
			}
		}
		return false;
	}
	
	function getHTML($img_on='',$img_off='',$img_wrn='')
	{
		$img_on = '<img src="'.$img_on.'" alt="ok" />';
		$img_off = '<img src="'.$img_off.'" alt="error" />';
		$img_wrn = '<img src="'.$img_wrn.'" alt="warning" />';
		
		$res = '<table summary="Checklist" class="install">';
		
		foreach ($this->check as $k => $v)
		{
			$ok = $v['test'];
			if ($ok === NULL) {
				$img = $img_wrn;
				$str = $v['off'];
			} elseif ($ok == false) {
				$img = $img_off;
				$str = $v['off'];
			} elseif ($ok) {
				$img = $img_on;
				$str = $v['on'];
			}
			
			$res .=
			'<tr>'.
			'<td valign="top">'.$img.'</td>'.
			'<td valign="top">'.$str.'</td>'.
			'</tr>';
		}
		
		$res .= '</table>';
		return $res;
	}
}
?>
