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

class xmlsql
{
	var $job = array();
	var $xml;
	var $con;
	var $_action;
	var $_current_tag_cdata;
	
	var $_subtable = array(
		'test' => array(
			'sql' => NULL,
			'eq' => 'eq',
			'value' => NULL,
			'label' => NULL,
			'string' => NULL,
			'type' => 'err'
		),
		'request' => array(
			'label' => NULL,
			'string' => NULL,
			'type' => NULL,
			'sql' => NULL
		)
	);
	
	function xmlsql(&$con,$xml)
	{
		$this->xml = $xml;
		$this->con = $con;
		$this->_current_tag_cdata = '';
	}
	
	function replace($needle,$str)
	{
		$this->xml = str_replace($needle,$str,$this->xml);
	}
	
	function execute(&$checklist)
	{
		$this->_parse();
		
		$test = true;
		
		foreach ($this->job as $k => $v)
		{
			if ($test === NULL) { $test = true; }
			
			$ok = $err = '';
			$silent = false;
			
			# Si $test n'est pas faux et qu'on a un test SQL et une action non silencieuse 
			if ($test !== false && $v['test']['sql'] != NULL
			&& $v['test']['value'] != NULL && $v['request']['type'] != 'silent')
			{
				$req = $v['test']['sql'];
				$err = sprintf($v['test']['label'],$v['test']['string']);
				
				if (($rs = $this->con->select($req)) === false)
				{
					$test = false;
					$err = $this->con->error();
				}
				else
				{
					if ($v['test']['eq'] == 'neq') {
						$test = $rs->f(0) != $v['test']['value'];
					} else {
						$test = $rs->f(0) == $v['test']['value'];
					}
					
					if ($test == false && $v['test']['type'] == 'wrn') {
						$test = NULL;
					}
				}
			}
			
			# Si le test est passé, on tente la requête
			if ($test === true)
			{
				$ok = sprintf($v['request']['label'],$v['request']['string']);
				
				$req = $v['request']['sql'];
				
				if ($this->con->execute($req) === false) {
					$test = false;
					$err = sprintf($v['request']['label'],
						$v['request']['string']).' - '.
						$this->con->error();
				} else {
					$test = true;
				}
				
				if ($v['request']['type'] == 'silent') {
					$silent = true;
					$test = true;
					$ok = $err = '';
				}
			}
			elseif ($err == '')
			{
				$err = sprintf($v['request']['label'],$v['request']['string']);
			}
			
			if (!$silent) {
				$checklist->addItem($k,$test,$ok,$err);
			}
		}
	}
	
	function _parse()
	{
		$xp = xml_parser_create('ISO-8859-1');
		xml_parser_set_option($xp, XML_OPTION_CASE_FOLDING, false);
		xml_set_object($xp,$this);
		xml_set_element_handler($xp,'_openTag','_closeTag');
		xml_set_character_data_handler($xp, '_cdata');
		xml_parse($xp,$this->xml);
		xml_parser_free($xp);
	}
	
	function _openTag($p,$tag,$attr)
	{
		if ($tag == 'action' && !empty($attr['id']))
		{
			$id = $this->_action = $attr['id'];
			$this->job[$id] = $this->_subtable;
			
			if (!empty($attr['label'])) {
				$this->job[$id]['request']['label'] = __($attr['label']);
			}
			if (!empty($attr['string'])) {
				$this->job[$id]['request']['string'] = $attr['string'];
			}
			if (!empty($attr['type'])) {
				$this->job[$id]['request']['type'] = $attr['type'];
			}
		}
		elseif($tag == 'test')
		{
			$id = $this->_action;
			
			if (!empty($attr['eq'])) {
				$this->job[$id]['test']['eq'] = $attr['eq'];
			}
			if (!empty($attr['value'])) {
				$this->job[$id]['test']['value'] = $attr['value'];
			}
			if (!empty($attr['label'])) {
				$this->job[$id]['test']['label'] = __($attr['label']);
			}
			if (!empty($attr['string'])) {
				$this->job[$id]['test']['string'] = $attr['string'];
			}
			if (!empty($attr['type'])) {
				$this->job[$id]['test']['type'] = $attr['type'];
			}
		}
	}
	
	function _closeTag($p,$tag)
	{
		if ($tag == 'action') {
			$this->job[$this->_action]['request']['sql'] = trim($this->_current_tag_cdata);
		}
		elseif ($tag == 'test') {
			$this->job[$this->_action]['test']['sql'] = trim($this->_current_tag_cdata);
		}
		$this->_current_tag_cdata = '';
	}
	
	function _cdata($p,$cdata)
	{
		$this->_current_tag_cdata .= $cdata;
	}
}

?>
