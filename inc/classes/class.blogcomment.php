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
@class blogcomment

Cette classe définit un objet de type recordset en l'étendant de nouvelles
fonctions. Elle dispose donc de toutes les fonctions d'un recordset en sus
des fonctions suivantes.

Cette classe doit être initialisée avec la définition d'un objet de type
blog (à l'aide de la méthode ''setBlog'').

@param	blog		blog			Objet de type blog
*/
class blogcomment extends recordset
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
	@function extractTrackbacks
	
	Cette méthode sépare les commentaires des trackbacks et renvoie un objet
	de type ''blogcomment'' contenant les trackbacks qui sont supprimés de
	l'objet courant.
	
	@return	blogcomment
	*/
	function extractTrackbacks()
	{
		$res = array();
		foreach ($this->arry_data as $k => $v)
		{
			if ($v['comment_trackback'] == 1) {
				$res[] = $v;
				unset($this->arry_data[$k]);
			}
		}
		$this->recordSet(array_values($this->arry_data));
		
		$rs = new blogcomment($res);
		$rs->setBlog($this->blog);
		return $rs;
	}
	
	/**
	@function getTS
	
	Renvoie le timestamp UNIX du commentaire.
	
	@return	string
	*/
	function getTS()
	{
		return strtotime($this->f('comment_dt'));
	}
	
	/**
	@function getLDate()
	
	Renvoie la date du commentaire au format définit par la propriété
	''date_format'' de l'objet $blog définit pour l'objet courant.
	
	@return	string
	*/
	function getLDate()
	{
		return dt::str($this->blog->date_format,$this->getTS());
	}
	
	/**
	@function getLTime()
	
	Renvoie l'heure du commentaire au format définit par la propriété
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
	@function getContent
	
	Renvoie le contenu du commentaire.
	
	@return	string
	*/
	function getContent()
	{
		return $this->f('comment_content');
	}
	
	/**
	@function getEncodMail
	
	Renvoie l'adresse email de l'auteur du commentaire sous forme encodée mais
	lisible par un navigateur.
	
	@return	string
	*/
	function getEncodMail()
	{
		return strtr($this->f('comment_email'),array('@'=>'%40','.'=>'%2e'));
	}
	
	/**
	@function getPermURL
	
	Renvoie le lien permanent vers le commentaire.
	
	@return	string
	*/
	function getPermURL()
	{
		$post_titre_url = $this->f('post_titre_url');
		
		$url = sprintf($this->blog->front_url['post'],$this->f('postyear'),
					$this->f('postmonth'),$this->f('postday'),
					$this->f('post_id'),$post_titre_url);
		
		return $url.'#c'.$this->f('comment_id');
	}
	
	/**
	@function getIDs
	
	Cette méthode crée une liste des ID de chaque commentaire du recordset.
	Chaque entrée peut être précédée d'une éventuelle chaîne définie par $str.
	
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
			$res[] = $str.$this->f('comment_id');
			$this->moveNext();
		}
		$this->move($index);
		return $res;
	}
}
?>
