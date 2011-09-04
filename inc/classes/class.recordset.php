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

/**
@class recordset

Cette classe permet de manipuler des données entrées dans un tableaux multilignes
et multicolonnes. La classe ''connection'' renvoie des recordsets comme résultat
de requêtes.

@param	array	arry_data		Tableau contenant les données
@param	integer	int_index		Emplacement du curseur
@param	integer	int_row_count	Nombre d'enregistrements
@param	integer	int_col_count	Nombre de colonnes
@param	integer	fetch_index	Indice de déplacement utilisé localement
*/

class recordset
{
	var $arry_data;
	var $int_index;
	
	var $int_row_count;
	var $int_col_count;
	var $fetch_index;
	
	/** @doc
	=== Méthodes === */
	
	/**
	@function recordset
	
	'''Constructeur'''. Cette méthode initialise le recordset. $data est un
	tableau de plusieurs lignes et colones.
	
	Par exemple :
	
	{{{
	#!php
	<?php
	$d = array(
		array('f1' => 'v01', 'f2' => 'v02'),
		array('f1' => 'v11', 'f2' => 'v12'),
		array('f1' => 'v21', 'f2' => 'v22')
	);
	$rs = new recordset($d);
	
	while ($rs->fetch()) {
		echo $rs->f('f1').' - '.$rs->f('f2').'<br />';
	}
	?>
	}}}
	
	
	@param	array	data			Tableau contenant les données
	*/
	function recordset($data)
	{
		$this->int_index = 0;
		$this->fetch_index = NULL;
		
		if(is_array($data))
		{
			$this->arry_data = $data;
			
			$this->int_row_count = count($this->arry_data);
			
			if ($this->int_row_count == 0)
			{
				$this->int_col_count = 0;
			}
			else
			{
				$this->int_col_count = count($this->arry_data[0]);
			}
		}
	}
	
	/**
	@function field
	
	Renvoie la valeur d'un champ donné, pour la ligne courante.
	
	@param	mixed	c			Nom ou numéro du champ
	@return	string
	*/
	function field($c)
	{
		if(!empty($this->arry_data))
		{
			if(is_integer($c))
			{
				$T = array_values($this->arry_data[$this->int_index]);
				return (isset($T[($c)])) ? $T[($c)] : false;
			}
			else
			{
				$c = strtolower($c);
				if(isset($this->arry_data[$this->int_index][$c]))
				{
					if (!is_array($this->arry_data[$this->int_index][$c])) {
						return trim($this->arry_data[$this->int_index][$c]);
					} else {
						return $this->arry_data[$this->int_index][$c];
					}
				}
				else
				{
					return false;
				}
			}
		}
	}
	
	/**
	@function f
	
	Alias de la méthode ''field''.
	
	@param	mixed	c			Nom ou numéro du champ
	@return	string
	*/
	function f($c)
	{
		return $this->field($c);
	}
	
	/**
	@function setField
	
	Change la valeur d'un champ donné à la ligne courante.
	
	@param	string	c			Nom du champ
	@param	string	v			Valeur du champ
	*/
	function setField($c,$v)
	{
		$c = strtolower($c);
		$this->arry_data[$this->int_index][$c] = $v;
	}
	
	/**
	@function moveStart
	
	Remet le curseur à la première ligne des données et renvoie vrai.
	
	@return	boolean
	*/
	function moveStart()
	{
		$this->int_index = 0;
		return true;
	}
	
	/**
	@function moveEnd
	
	Positionne le curseur à la dernière ligne des données et renvoie vrai.
	
	@return	boolean
	*/
	function moveEnd()
	{
		$this->int_index = ($this->int_row_count-1);
		return true;
	}
	
	/**
	@function moveNext
	
	Déplace le curseur d'un cran si possible et renvoie vrai. Si le curseur
	est à la fin du tableau, renvoie false.
	
	@return	boolean
	*/
	function moveNext()
	{
		if (!empty($this->arry_data) && !$this->EOF()) {
	 		$this->int_index++;
			return true;
		} else {
			return false;
		}
	}
	
	/**
	@function movePrev
	
	Déplace le curseur d'un cran dans le sens inverse si possible et renvoie
	vrai. Si le curseur	est au début du tableau, renvoie false.
	
	@return	boolean
	*/
	function movePrev()
	{
		if (!empty($this->arry_data) && $this->int_index > 0) {
			$this->int_index--;
			return true;
		} else {
			return false;
		}
	}
	
	/**
	@function move
	
	Positionne le curseur à l'indice donné par $index. Si l'indice n'existe
	pas, renvoie false.
	
	@param	integer	index		Indice
	@return	boolean
	*/
	function move($index)
	{
		if (!empty($this->arry_data) && $this->int_index >= 0 && $index < $this->int_row_count) {
			$this->int_index = $index;
			return true;
		} else {
			return false;
		}
	}
	
	/**
	@function fetch
	
	Déplace le cuseur d'un cran et renvoie vrai tant que celui ci n'est pas
	positionné à la fin du tableau. La fonction démarre toujours du premier
	élément du tableau. Elle a pour vocation à être utilisée dans une boucle
	de type while (voir le premier exemple).
	
	@return	boolean
	*/
	function fetch()
	{
		if ($this->fetch_index === NULL) {
			$this->fetch_index = 0;
			$this->int_index = -1;
		}
		
		if ($this->fetch_index+1 > $this->int_row_count) {
			$this->fetch_index = NULL;
			$this->int_index = 0;
			return false;
		}
		
		$this->fetch_index++;
		$this->int_index++;
		
		return true;
	}
	
	/**
	@function BOF
	
	Indique si le curseur est au début du tableau.
	
	@return	boolean
	*/
	function BOF()
	{
		return ($this->int_index == -1 || $this->int_row_count == 0);
	}
	
	/**
	@function EOF
	
	Indique si le curseur est à la fin du tableau.
	
	@return	boolean
	*/
	function EOF()
	{
		return ($this->int_index == $this->int_row_count);
	}
	
	/**
	@function isEmpty
	
	Indique si le tableau de données est vide.
	
	@return	boolean
	*/
	function isEmpty()
	{
		return ($this->int_row_count == 0);
	}
	
	/**
	@function getData
	
	Renvoie le tableau de données.
	
	@return	array
	*/
	function getData()
	{
		return $this->arry_data;
	}
	
	/**
	@function nbRow
	
	Renvoie le nombre de lignes du tableau.
	
	@return	integer
	*/
	function nbRow()
	{
		return $this->int_row_count;
	}
}
?>