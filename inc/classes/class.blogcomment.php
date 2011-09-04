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

Cette classe d�finit un objet de type recordset en l'�tendant de nouvelles
fonctions. Elle dispose donc de toutes les fonctions d'un recordset en sus
des fonctions suivantes.

Cette classe doit �tre initialis�e avec la d�finition d'un objet de type
blog (� l'aide de la m�thode ''setBlog'').

@param	blog		blog			Objet de type blog
*/
class blogcomment extends recordset
{
	var $blog;
	
	/** @doc
	=== M�thodes === */
	
	/**
	@function setBlog
	
	D�fini l'objet de type blog qui sera pass� � la classe apr�s qu'il a �t�
	instanci�.
	
	@param	blog		blog			Objet de type blog
	*/
	function setBlog(&$blog)
	{
		$this->blog = $blog;
	}
	
	/**
	@function extractTrackbacks
	
	Cette m�thode s�pare les commentaires des trackbacks et renvoie un objet
	de type ''blogcomment'' contenant les trackbacks qui sont supprim�s de
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
	
	Renvoie la date du commentaire au format d�finit par la propri�t�
	''date_format'' de l'objet $blog d�finit pour l'objet courant.
	
	@return	string
	*/
	function getLDate()
	{
		return dt::str($this->blog->date_format,$this->getTS());
	}
	
	/**
	@function getLTime()
	
	Renvoie l'heure du commentaire au format d�finit par la propri�t�
	''time_format'' de l'objet $blog d�finit pour l'objet courant.
	
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
	
	Renvoie l'adresse email de l'auteur du commentaire sous forme encod�e mais
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
	
	Cette m�thode cr�e une liste des ID de chaque commentaire du recordset.
	Chaque entr�e peut �tre pr�c�d�e d'une �ventuelle cha�ne d�finie par $str.
	
	@param	string	str			Cha�ne pr�c�dant chaque ID
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
