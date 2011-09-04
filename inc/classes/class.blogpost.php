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
@class blogpost

Cette classe définit un objet de type recordset en l'étendant de nouvelles
fonctions. Elle dispose donc de toutes les fonctions d'un recordset en sus
des fonctions suivantes.

Cette classe doit être initialisée avec la définition d'un objet de type
blog (à l'aide de la méthode ''setBlog'').

@param	blog		blog			Objet de type blog
*/
class blogpost extends recordset
{
	var $blog;
	
	/** @doc
	=== Méthodes === */
	
	/**
	@function setBlog
	
	Défini l'objet de type blog qui sera passé à la classe après qu'il a été
	instancié.
	
	@param	blog		blog			Objet de type blog
	*/
	function setBlog(&$blog)
	{
		$this->blog = $blog;
	}
	
	/**
	@function getFormat
	
	Renvoie le format du billet (''wiki'' ou ''html'')
	
	@return	string
	*/
	function getFormat()
	{
		return ($this->f('post_content_wiki') != '') ? 'wiki' : 'html';
	}
	
	/**
	@function getNbComments
	
	Renvoie le nombre de commentaires d'un billet.
	
	@return	integer
	*/
	function getNbComments()
	{
		return (integer) $this->blog->getNbComments($this->f('post_id'));
	}
	
	/**
	@function getNbTrackbacks
	
	Renvoie le nombre de trackback d'un billet.
	
	@return	integer
	*/
	function getNbTrackbacks()
	{
		return (integer) $this->blog->getNbTrackbacks($this->f('post_id'));
	}
	
	/**
	@function getTS
	
	Renvoie le timestamp UNIX du billet.
	
	@return	string
	*/
	function getTS()
	{
		return strtotime($this->f('post_dt'));
	}
	
	/**
	@function getLDate()
	
	Renvoie la date du billet au format définit par la propriété
	''date_format'' de l'objet $blog définit pour l'objet courant.
	
	@return	string
	*/
	function getLDate()
	{
		return dt::str($this->blog->date_format,$this->getTS());
	}
	
	/**
	@function getLTime()
	
	Renvoie l'heure du billet au format définit par la propriété
	''time_format'' de l'objet $blog définit pour l'objet courant.
	
	@return	string
	*/
	function getLTime()
	{
		return dt::str($this->blog->time_format,$this->getTS());
	}
	
	/**
	@function getIsoDate
	
	Renvoie la date du billet au format ISO.
	
	@return string
	*/
	function getIsoDate()
	{
		return dt::iso8601($this->getTS());
	}
	
	/**
	@function getUserCN
	
	Renvoie le ''common name'' de l'auteur du billet. Si ce dernier a un
	pseudo, alors le pseudo sera utilisé, sinon, le prénom suivit du nom.
	
	@return	string
	*/
	function getUserCN()
	{
		if($this->f('user_pseudo') != '') {
			return $this->f('user_pseudo');
		} else {
			return trim($this->f('user_prenom').' '.$this->f('user_nom'));
		}
	}
	
	/**
	@function getPermURL
	
	Renvoie l'URL permanente du billet.
	
	@return	string
	*/
	function getPermURL()
	{
		return sprintf($this->blog->front_url['post'],$this->f('postyear'),
					$this->f('postmonth'),$this->f('postday'),
					$this->f('post_id'),$this->f('post_titre_url'));
	}
	
	/**
	@function getCatURL
	
	Renvoir l'URL vers la catégorie du billet.
	
	@return	string
	*/
	function getCatURL()
	{
		return sprintf($this->blog->front_url['cat'],$this->f('cat_libelle_url'));
	}
	
	/**
	@function getIDs
	
	Cette méthode crée une liste des ID de chaque billet du recordset. Chaque
	entrée peut être précédée d'une éventuelle chaîne définie par $str.
	
	@param	string	str			Chaîne précédant chaque ID
	@return	array
	*/
	function getIDs($str='')
	{
		$res = array();
		
		$index = $this->int_index;
		$this->moveStart();
		
		while (!$this->EOF())
		{
			$res[] = $str.$this->f('post_id');
			$this->moveNext();
		}
		$this->move($index);
		return $res;
	}
}
?>