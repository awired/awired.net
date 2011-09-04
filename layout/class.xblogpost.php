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

#
#  Extension de la classe blogpost
#

class xblogpost extends blogpost
{
	# Contenu (avec ou sans smilies)
	function getContent()
	{
		if ($this->blog->use_smilies)	{
			return $this->blog->addSmilies($this->f('post_content'));
		} else {
			return $this->f('post_content');
		}
	}
	
	function getChapo()
	{
		if ($this->blog->use_smilies)	{
			return $this->blog->addSmilies($this->f('post_chapo'));
		} else {
			return $this->f('post_chapo');
		}
	}
	
	
	function openComment()
	{
		return (
			dc_allow_comments && $this->f('post_open_comment') &&
			(dc_comments_ttl == 0 ||
			time()-(dc_comments_ttl*86400) < $this->getTS())
			);
	}
	
	function openTb()
	{
		return (
			dc_allow_trackbacks && $this->f('post_open_tb') &&
			(dc_comments_ttl == 0 ||
			time()-(dc_comments_ttl*86400) < $this->getTS())
			);
	}
	
	# Liens vers tous les billets pour l'en tête
	function getHeadLinks()
	{
		$res = '';
		
		$index = $this->int_index;
		$this->moveStart();
		
		while (!$this->EOF())
		{
			$res .= '<link rel="chapter" href="'.$this->getPermURL().'" '.
			'title="'.$this->f('post_titre').'" />'."\n";
			$this->moveNext();
		}
		$this->move($index);
		
		return $res;
	}
	
	function nbComments($zero,$one,$more)
	{
		$nb = $this->f('nb_comment');
		
		if($nb == 0) {
			return $zero;
		} elseif($nb == 1) {
			return $one;
		} elseif($nb > 1) {
			return sprintf($more,$nb);
		}
	}
	
	function firstPostOfDay()
	{
		$prev_dt = NULL;
		if($this->movePrev()) {
			$prev_dt = $this->getLDate();
			$this->moveNext();
		}
		
		if($prev_dt == NULL || $prev_dt != $this->getLDate()) {
			return true;
		} else {
			return false;
		}
	}
	
	function getRSSSeq()
	{
		return '  <rdf:li rdf:resource="'.$this->getPermURL().'" />'."\n";
	}
	
	function getRSSItem($short=false)
	{
		if ($this->f('post_chapo') != '') {
			$desc = strip_tags($this->f('post_chapo'));
		} else {
			$desc = util::cutString(strip_tags($this->f('post_content')),300).'...';
		}
		
		if ($short) {
			$content = $desc;
		} else {
			$content = $this->f('post_chapo').' '.$this->f('post_content');
		}
		
		return
		'<item rdf:about="'.$this->getPermURL().'">'."\n".
		'  <title>'.$this->blog->toXML($this->f('post_titre'))."</title>\n".
		'  <link>'.$this->getPermURL()."</link>\n".
		'  <dc:date>'.$this->getIsoDate()."</dc:date>\n".
		(($this->f('post_lang')) ? '  <dc:language>'.$this->f('post_lang')."</dc:language>\n" : '').
		'  <dc:creator>'.htmlspecialchars($this->getUserCN())."</dc:creator>\n".
		'  <dc:subject>'.htmlspecialchars($this->f('cat_libelle'))."</dc:subject>\n".
		'  <description>'.$this->blog->toXML($desc)."</description>\n".
		'  <content:encoded><![CDATA['.$content."]]></content:encoded>\n".
		'</item>'."\n";
	}
	
	function getAtomEntry($short=false)
	{
		if ($this->f('post_chapo') != '') {
			$desc = strip_tags($this->f('post_chapo'));
		} else {
			$desc = util::cutString(strip_tags($this->f('post_content')),300).'...';
		}
		
		if ($short) {
			$content = $desc;
		} else {
			$content = $this->f('post_chapo').' '.$this->f('post_content');
		}
		
		$id = 'tag:'.htmlspecialchars($_SERVER['HTTP_HOST']).','.date('Y-m-d',$this->getTS()).
				':'.dc_app_url.'/'.$this->f('post_id');
		
		return
		'<entry' .
		(($this->f('post_lang')) ? ' xml:lang="'.$this->f('post_lang').'"' : '').
		'>'."\n".
		'  <title>'.$this->blog->toXML($this->f('post_titre'))."</title>\n".
		'  <link rel="alternate" type="text/html" href="'.$this->getPermURL().'" />'."\n".
		'  <updated>'.$this->getIsoDate()."</updated>\n".
		'  <id>'.$id."</id>\n".
		'  <author><name>'.htmlspecialchars($this->getUserCN())."</name></author>\n".
		'  <category term="'.$this->f('cat_libelle_url').'" label="'.$this->blog->toXML($this->f('cat_libelle')).'"'."/>\n".
		'  <summary>'.$this->blog->toXML($desc)."</summary>\n".
		'  <content type="html">'.htmlspecialchars($content)."</content>\n".
		'</entry>'."\n";
	}
}
?>
