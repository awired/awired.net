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
# Initial developer of this file is Nicky Duong

class autodiscover
{
	var $url;
	
	function autoDiscovery($text)
	{
		$uriArray = $this->__getPermaLinksFromText($text);
		$res = array();
		
		for ($i=0;$i<count($uriArray);$i++)
		{
			if (($infoRDF = $this->__getRDFFromLink($uriArray[$i])) !== false)
			{
				if (($tburi = $this->__getPingURL($infoRDF)) !== false)
				{
					$res[] = $tburi;
				}
			}
		}
		
		return $res;
	}
	
	/*
	 * Produit un tableau contenant la liste des permaliens contenus dans un texte.
	 *
	 * @param	String		$text	texte le texte à parser.
	 * @return	String[]			tableaux contenant la liste des URI contenues dans le texte.
	 */
	function __getPermaLinksFromText($text)
	{
		$linkArray = array();
		
		# Attributs href des liens
		if (preg_match_all('/<a ([^>]+)>/ms', $text, $array, PREG_SET_ORDER))
		{
			for ($i = 0; $i<count($array); $i++)
			{
				if (preg_match('/href="http:\/\/([^"]+)"/ms', $array[$i][1], $matches)) {
					$linkArray[$matches[1]] = 1;
				}
			}
		}
		unset($array);
		# Attributs cite sur blockquote et q
		if (preg_match_all('/<(blockquote|q) ([^>]+)>/ms', $text, $array, PREG_SET_ORDER))
		{
			for ($i = 0; $i<count($array); $i++)
			{
				if (preg_match('/cite="http:\/\/([^"]+)"/ms', $array[$i][2], $matches)) {
					$linkArray[$matches[1]] = 1;
				}
			}
		}
		
		return array_keys($linkArray);
	}

	/*
	 * Cherche, si il y en a un, le RDF lié à une URI.
	 *
	 * @param	String	$link	Permalien
	 * @return	String			Informations RDF
	 */
	function __getRDFFromLink($link)
	{
		$pageContents = HttpClient::quickGet('http://'.$link);
		preg_match_all('/(<rdf:RDF.*?<\/rdf:RDF>)/sm', $pageContents, $rdf_all, PREG_SET_ORDER);
		
		for ($i=0; $i<count($rdf_all); $i++)
		{
			if (preg_match('|dc:identifier="http://'.preg_quote($link).'"|ms',$rdf_all[$i][1]))
			{
				$encoding = $this->__discoverCharset($pageContents);
				$rdf = '<?xml version="1.0" encoding="'.$encoding.'"?>'."\n".$rdf_all[$i][1];
				return array('rdf' => $rdf, 'encoding' => $encoding);
			}
		}
		return false;
	}
	
	function __discoverCharset($str)
	{
		# Recherche du prologue
		if (preg_match('/^\s*<?xml[^>]*encoding="(.+)"/',$str,$matches)) {
			return $matches[1];
		} elseif (preg_match('/<meta[^>]+content="[^"]*charset=([a-zA-Z0-9-]+)/m',$str,$matches)) {
			return $matches[1];
		} else {
			return 'iso-8859-1';
		}
	}
	
	function __getPingURL($xml)
	{
		$this->url = '';
		
		$xp = xml_parser_create($xml['encoding']);
		xml_parser_set_option($xp,XML_OPTION_CASE_FOLDING,false);
		xml_set_object($xp,$this);
		xml_set_element_handler($xp,'__openTag','__closeTag');
		xml_parse($xp,$xml['rdf']);
		xml_parser_free($xp);
		
		return ($this->url != '') ? $this->url : false;
	}
	
	function __openTag($p,$tag,$attr='')
	{
		if ($tag == 'rdf:Description' && !empty($attr['trackback:ping'])) {
			$this->url = $attr['trackback:ping'];
		}
	}
		
	
	function __closeTag($p,$tag)
	{
	}
}
?>