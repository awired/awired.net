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

class blogroll
{
	var $con;
	var $blog;
	var $table;
	
	function blogroll(&$blog,$prefix)
	{
		$this->con = $blog->con;
		$this->blog = $blog;
		$this->table = $prefix.'link';
	}
	
	function addLink($label,$href,$title='',$lang='')
	{
		$strReq = 'SELECT MAX(position) '.
				'FROM '.$this->table;
			
		if (($rs = $this->con->select($strReq)) === false) {
			return false;
		}
		
		$position = $rs->f(0);
	
		$insReq = 'INSERT INTO '.$this->table.' '.
				'(label, href, title, lang, position) VALUES '.
				'(\''.$this->con->escapeStr($label).'\', '.
				'\''.$this->con->escapeStr($href).'\', '.
				'\''.$this->con->escapeStr($title).'\', '.
				'\''.$this->con->escapeStr($lang).'\', '.
				'\''.(integer) $position.'\')';
		
		if ($this->con->execute($insReq) === false) {
			return false;
		}
		
		$this->blog->triggerMassUpd();
		return true;
	}
	
	function updLink($link_id,$label,$href,$title='',$lang='', $rel='')
	{
		$updReq = 'UPDATE '.$this->table.' SET '.
				'label = \''.$this->con->escapeStr($label).'\','.
				'href = \''.$this->con->escapeStr($href).'\','.
				'title = \''.$this->con->escapeStr($title).'\','.
				'lang = \'' . $this->con->escapeStr($lang).'\','.
				'rel = \'' . $this->con->escapeStr($rel).'\''.
				'WHERE link_id = '.$link_id;
		
		if ($this->con->execute($updReq) === false) {
			return false;
		}
		
		$this->blog->triggerMassUpd();
		return true;
	}
	
	# Suppression (lien ou catégorie)
	function delEntry($link_id)
	{
		$delReq = 'DELETE FROM '.$this->table.' '.
				'WHERE link_id = '.$link_id;
		
		if ($this->con->execute($delReq) === false) {
			return false;
		}
		
		$this->blog->triggerMassUpd();
		return true;
	}
	
	# Création de catégorie
	function addCat($title)
	{
		return $this->addLink('','',$title,'');
	}
	
	# Modification de catégories
	function updCat($id,$title)
	{
		return $this->updLink($id,'','',$title,'');
	}
	
	# Ordonner les entrées
	function ordEntries($ord)
	{
		if (!is_array($ord)) {
			return false;
		}
		
		foreach ($ord as $k => $v)
		{
			$updReq = 'UPDATE '.$this->table.' SET '.
					'position = '.(integer) $v.' '.
					'WHERE link_id = '.(integer) $k;
			
			if (!$this->con->execute($updReq)) {
				return false;
			}
		}
		
		$this->blog->triggerMassUpd();
		return true;
	}
}
?>
