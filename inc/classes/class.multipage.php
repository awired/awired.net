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
# Contributor(s):
# Kevyn Lebouille

/**
Classe d'affichage d'éléments sur plusieurs pages
*/

class multipage
{
	var $options;
	var $data;
	var $func_name;
	var $var_page;
	
	var $virtual;
	var $nb_elements;
	var $nb_pages;
	var $nb_groups;
	var $env;
	var $index_start;
	var $index_end;
	var $env_group;
	var $index_group_start;
	var $index_group_end;
	
	function multipage($env,$func_name=NULL,$data,$virtual=0,$nb_per_page='',$nb_pages_per_group='',$nb_cols='')
	{
		# Initialisation
		$this->virtual = $virtual;
		
		$this->_init();
		
		$this->_setData($data);
		$this->_setFunction($func_name);
		
		if($nb_per_page != '') {
			$this->setOption('nb_per_page',$nb_per_page);
		}
		
		if($nb_pages_per_group != '') {
			$this->setOption('nb_pages_per_group',$nb_pages_per_group);
		}
		
		if($nb_cols != "") {
			$this->setOption('nb_cols',$nb_cols);
		}
		
		# Calcul des données
		#
		
		# Nombre d'éléments
		if (!$this->virtual) {
			$this->nb_elements = count($this->data);
		} else {
			$this->nb_elements = $this->virtual;
		}
		
		# Nombre de pages possibles
		$this->nb_pages = ceil($this->nb_elements/$this->options['nb_per_page']);
		
		
		# On vérifie que env ne sort pas du nombre de pages
		if ($env <= $this->nb_pages && $env != "") {
			$this->env = (integer)$env;
		} else {
			$this->env = 1;
		}
		
		# Nombre de groupes
		$this->nb_groups = (integer) ceil($this->nb_pages/$this->options['nb_pages_per_group']);
		
		# Index de début de page
		$this->index_start = ($this->env-1)*$this->options['nb_per_page'];
		
		# Index de fin de page
		$this->index_end = $this->index_start+$this->options['nb_per_page']-1;
		if($this->index_end >= $this->nb_elements) {
			$this->index_end = $this->nb_elements-1;
		}
		
		# Index du groupe en cours
		$this->env_group = (integer) ceil($this->env/$this->options['nb_pages_per_group']);
		
		# Index de la première page du groupe
		$this->index_group_start = ($this->env_group-1)*$this->options['nb_pages_per_group']+1;
		
		# Index de la dernière page du groupe
		$this->index_group_end = $this->index_group_start+$this->options['nb_pages_per_group']-1;
		if($this->index_group_end > $this->nb_pages) {
			$this->index_group_end = $this->nb_pages;
		}
	}
	
	function setOption($name,$value)
	{
		if (!in_array($name,array_keys($this->options))) {
			trigger_error('Multipage: '.sprintf(_rc_undefined_option,$name),E_USER_NOTICE);
			return false;
		}
		
		$this->options[$name] = $value;
	}
	
	function getPage()
	{
		$res = '';
		$nb_elements = $this->index_end-$this->index_start+1;
		$i = ($this->virtual==0) ? $this->index_start : 0;
		$end = ($this->virtual==0) ? $this->index_end : $i+count($this->data)-1;
		$function = $this->func_name;
		
		if ($this->_emptyData())
		{
			return $this->options['html_empty'];
		}
		else
		{
			while ($i<=$end)
			{
				$tmp_res = '';
				for ($j=0;$j<$this->options['nb_cols'];$j++)
				{
					if ($i<=$end) {
						$tmp_res .= sprintf($this->options['html_cell'],$function($this->data[$i],$i));
					} elseif ($this->options['draw_empty_cells']) {
						$tmp_res .= sprintf($this->options['html_cell'],$this->options['html_empty_cell']);
					}
					$i++;
				}
				
				$res .= sprintf($this->options['html_row'],$tmp_res);
			}
			return sprintf($this->options['html_block'],$res);
		}
	}
	
	function getLinks()
	{
		# Création des liens
		$htmlLinks = '';
		$htmlPrev = '';
		$htmlNext = '';
		$htmlPrevGrp = '';
		$htmlNextGrp = '';
		
		for($i=$this->index_group_start; $i<=$this->index_group_end; $i++)
		{
			if($i == $this->env) {
				$htmlLinks .= sprintf($this->options['html_cur_page'],$i);
			} else {
				$htmlLinks .= '<a href="'.$this->_setURL($i).'">'.$i.'</a>';
			}
			
			if($i != $this->index_group_end) {
				$htmlLinks .= $this->options['html_links_sep'];
			}
		}
		
		# Page précédente
		if($this->env != 1) {
			$htmlPrev = '<a href="'.$this->_setURL($this->env-1).'">'.
			$htmlPrev .= $this->options['html_prev'].'</a>&nbsp;';
		}
		
		# Page suivante
		if($this->env != $this->nb_pages) {
			$htmlNext = '&nbsp;<a href="'.$this->_setURL($this->env+1).'">';
			$htmlNext .= $this->options['html_next'].'</a>';
		}
		
		//Groupe précédent
		if($this->env_group != 1) {
			$htmlPrevGrp = '&nbsp;<a href="'.$this->_setURL($this->index_group_start - $this->options['nb_pages_per_group']).'">';
			$htmlPrevGrp .= $this->options['html_prev_grp'].'</a>&nbsp;';
		}
		
		if($this->env_group != $this->nb_groups) {
			$htmlNextGrp = '&nbsp;<a href="'.$this->_setURL($this->index_group_end+1).'">';
			$htmlNextGrp .= $this->options['html_next_grp'].'</a>&nbsp;';
		}
		
		$res =	$htmlPrev.
				$htmlPrevGrp.
				$htmlLinks.
				$htmlNextGrp.
				$htmlNext;
				
		
		if (count($this->data)>0) {
			return sprintf($this->options['html_links'],$res);
		}
	}
	
	function _setURL($pageNum)
	{
		$strLink = $_SERVER['REQUEST_URI'];
		
		# Suppression de l'information de session
		if(ereg(session_name().'='.session_id().'([&]){1}',$strLink)) {
			$strLink = ereg_replace(session_name()."=".session_id().'([&]){1}','',$strLink);
		} else {
			$strLink = ereg_replace('([?&]){1}'.session_name().'='.session_id(),'',$strLink);
		}
		
		if(ereg('([?&]){1}'.$this->var_page.'=([0-9])+',$strLink)) {
			$strLink = ereg_replace('([?&]){1}'.$this->var_page.'=([0-9])+', '\\1'.$this->var_page.'='.$pageNum, $strLink);
		} else {
			if(ereg('\?',$strLink)) {
				$strLink = $strLink.'&'.$this->var_page.'='.$pageNum;
			} else {
				$strLink = $strLink.'?'.$this->var_page.'='.$pageNum;
			}
		}
		return htmlspecialchars($strLink);
	}
	
	function _setData($data)
	{
		$this->data = $data;
	}
	
	function _emptyData()
	{
		return (count($this->data) > 0) ? false : true;
	}
	
	function _setFunction($str)
	{
		if (!function_exists($str)) {
			trigger_error('Multipage: '.sprintf(_rc_undefined_function,$str),E_USER_ERROR);
			return false;
		}
		$this->func_name = $str;
	}
	
	function _setVarPage($str)
	{
		$this->var_page = $str;
	}
	
	function _init()
	{
		$this->_setData(array());
		$this->_setVarPage('env');
		
		$this->options = array(
			# Comptage
			'nb_per_page'		=> 15,
			'nb_pages_per_group'=> 10,
			'nb_cols'			=> 1,
			'draw_empty_cells'	=> true,
			
			# Formatage HTML
			'html_block'		=> '<table>%s</table>',
			'html_row'		=> '<tr>%s</tr>'."\n",
			'html_cell'		=> '<td>%s</td>'."\n",
			'html_empty_cell'	=> '&nbsp;',
			
			'html_links'		=> '<p>Page(s)&nbsp;: %s</p>',
			'html_links_sep'	=> '-',
			'html_cur_page'	=> '<strong>%s</strong>',
			'html_prev'		=> '&#171;prev.',
			'html_next'		=> 'next&#187;',
			'html_prev_grp'	=> '...',
			'html_next_grp'	=> '...',
			
			'html_empty'		=> '<p><strong>No result</strong></p>'
		);
	}
	
	function _debug()
	{
		return '<pre>'.
		"Nombre d'éléments par page ........... ".$this->options['nb_per_page']."\n".
		'Nombre de pages par groupe ........... '.$this->options['nb_pages_per_group']."\n".
		'Nombre de colonnes ....................'.$this->options['nb_cols']."\n".
		"Nombre d'éléments .................... ".$this->nb_elements."\n".
		'Nombre de pages ...................... '.$this->nb_pages."\n".
		'Nombre de groupes .................... '.$this->nb_groups."\n\n".
		'Page en cour ..........................'.$this->env."\n".
		'Index de départ ...................... '.$this->index_start."\n".
		'Index de fin ......................... '.$this->index_end."\n".
		'Groupe en cours ...................... '.$this->env_group."\n".
		'Index de la première page du groupe .. '.$this->index_group_start."\n".
		'Index de la dernière page du groupe .. '.$this->index_group_end."\n".
		'</pre>';
	}
}
?>