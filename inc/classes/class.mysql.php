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

# Classe de connexion MySQL

require_once dirname(__FILE__).'/class.recordset.php';

/**
@class connection

@param	ressource	con_id		Identifiant de connexion
@param	string	error		Derni�re erreur de la base de donn�es
@param	integer	errorno		Num�ro de la derni�re erreur
*/

class connection
{
	var $con_id;
	var $error;
	var $errno;
	
	/** @doc
	=== M�thodes === */
	
	/**
	@function connection
	
	'''Constructeur'''. Initialise la connection � la base de donn�es.
	
	@param	string	user			ID de l'utilisateur
	@param	string	pwd			Mot de passe
	@param	string	alias		Serveur auquel se connecter
	@param	string	dbname		Nom de la base de donn�es
	*/
	function connection($user, $pwd , $alias='', $dbname)
	{
		$this->error = '';
		
		$this->con_id = @mysql_connect($alias, $user, $pwd);
		
		if (!$this->con_id) {
			$this->setError();
		} else {
			$this->database($dbname);
		}
	}
	
	/**
	@function database
	
	Change de base de donn�es. Renvoie vrai en cas de succ�s.
	
	@param	string	dbname		Nom de la base de donn�es
	@return	boolean
	*/
	function database($dbname)
	{
		$db = @mysql_select_db($dbname);
		if(!$db) {
			$this->setError();
			return false;
		} else {
			return true;
		}
	}
	
	/**
	@function close
	
	Ferme la connection � la base de donn�es et renvoie vrai en cas de succ�s.
	
	@return	boolean
	*/
	function close()
	{
		if ($this->con_id) {
			mysql_close($this->con_id);
			return true;
		} else {
			return false;
		}
	}
	
	/**
	@function select
	
	Execute une requ�te SQL et renvoie le resultat dans une instance de l'objet
	dont le type est d�fini par $class. Le type d'objet par d�faut est un
	recordset.
	
	N'importe quel objet peut-�tre utilis� � la place du recordset du moment
	qu'il prend un tableau multidimmensionel comme premier argument de son
	constructeur.
	
	Cette m�thode renvoie false en cas d'erreur.
	
	@param	string	query		Requ�te SQL
	@param	string	class		Type d'objet � renvoyer ('recordset')
	@return	recordset
	*/
	function select($query,$class='recordset')
	{
		if (!$this->con_id) {
			return false;
		}
		
		if ($class == '' || !class_exists($class)) {
			$class = 'recordset';
		}
		
		$cur = mysql_unbuffered_query($query, $this->con_id);
		
		if ($cur)
		{
			# Insertion dans le reccordset
			$i = 0;
			$arryRes = array();
			while($res = mysql_fetch_row($cur))
			{
				for($j=0; $j<count($res); $j++)
				{
					$arryRes[$i][strtolower(mysql_field_name($cur, $j))] = $res[$j];		
				}
				$i++;
			}
			
			return new $class($arryRes);
		}
		else
		{
			$this->setError();
			return false;
		}
	}
	
	/**
	@function execute
	
	Cette m�thode ex�cute la requ�te $query et renvoi vrai si aucune erreur
	ne s'est produite, faux dans le cas contraire.
	
	@param	string	query		Requ�te SQL
	@return	boolean
	*/
	function execute($query)
	{
		if (!$this->con_id) {
			return false;
		}
		
		$cur = mysql_query($query, $this->con_id);
		
		if (!$cur) {
			$this->setError();
			return false;
		} else {
			return true;
		}
		
	}
	
	/**
	@function getLastID
	
	Cette m�thode renvoie le dernier ID ins�r� et cr�� par auto
	incr�mentation.
	
	@return	string
	*/
	function getLastID()
	{
		if ($this->con_id) {
			return mysql_insert_id($this->con_id);
		} else {
			return false;
		}
	}
	
	/**
	@function rowCount
	
	Cette m�thode indique le nombre de lignes affect�es par la derni�re
	op�ration en DELETE, INSERT, UPDATE.
	
	@return	integer
	*/
	function rowCount()
	{
		if ($this->con_id) {
			return mysql_affected_rows($this->con_id);
		} else {
			return false;
		}
	}
	
	/**
	@function setError
	
	Cette m�thode r�f�rence la derni�re erreur du moteur de base de donn�es
	dans les propri�t�s '''error''' et '''errorno'''.
	
	Le r�sultat de cette m�thode priv�e est exploitable par la m�thode
	''error''.
	*/
	function setError()
	{
		if ($this->con_id) {
			$this->error = mysql_error($this->con_id);
			$this->errno = mysql_errno($this->con_id);
		} else {
			$this->error = (mysql_error() !== false) ? mysql_error() : 'Unknown error';
			$this->errno = (mysql_errno() !== false) ? mysql_errno() : 0;
		}
	}
	
	/**
	@function error
	
	Renvoie la derni�re erreur de la base de donn�es dans le format
	''num�ro'' - ''erreur''. Renvoie faux si aucune erreur.
	
	@return string
	*/
	function error()
	{
		if ($this->error != '') {
			return $this->errno.' - '.$this->error;
		} else {
			return false;
		}
	}
	
	/**
	@function escapeStr
	
	Cette m�thode formate une cha�ne de caract�res pour la prot�ger lors de
	son insertion dans une requ�te SQL.
	
	@param	string	str			Cha�ne � prot�ger
	@return	string
	*/
	function escapeStr($str)
	{
		return mysql_escape_string($str);
	}
}

?>
