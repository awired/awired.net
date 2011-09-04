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

if(function_exists('ini_set'))
{
	@ini_set('session.use_cookies','1');
	@ini_set('session.use_only_cookies','1');
	@ini_set('url_rewriter.tags','');
	@ini_set('session.use_trans_sid','0');
}

// NE PAS DECOMMENTER
//@ini_set('session.use_only_cookies','0');

$con = new connection(DB_USER,DB_PASS,DB_HOST,DB_DBASE);

$dc_session = new dbSession($con,DB_PREFIX.'session');

session_set_save_handler(
	array(&$dc_session, '_open'),
	array(&$dc_session, '_close'),
	array(&$dc_session, '_read'),
	array(&$dc_session, '_write'),
	array(&$dc_session, '_destroy'),
	array(&$dc_session, '_gc')
); 

session_name(DC_SESSION_NAME);
session_start();

class dbSession
{
	var $con;
	var $table;
	var $sess_ttl = '-120 minutes';
	
	function dbSession(&$con,$table)
	{
		$this->con = $con;
		$this->table = $table;
	}
	
	function _open($path,$name)
	{
		return true;
	}
	
	function _close()
	{
		$this->_gc();
		return true;
	}
	
	function _read($ses_id)
	{
		$strReq = 'SELECT * FROM '.$this->table.' '.
				'WHERE ses_id = \''.$this->con->escapeStr($ses_id).'\' ';
		
		$rs = $this->con->select($strReq);
		
		if ($rs == false || $rs->isEmpty()) {
			return '';
		} else {
			return $rs->f('ses_value');
		}
	}
	
	function _write($ses_id, $data)
	{
		$strReq = 'UPDATE '.$this->table.' SET '.
				'ses_time = \''.time().'\', '.
				'ses_value = \''.$this->con->escapeStr($data).'\' '.
				'WHERE ses_id = \''.$this->con->escapeStr($ses_id).'\' ';
		
		if ($this->con->execute($strReq) === false) {
			return false;
		}
		
		if ($this->con->rowCount() > 0) {
			return true;
		}
		
		$strReq = 'INSERT INTO '.$this->table.' '.
				' (ses_id, ses_time, ses_start, ses_value) VALUES ('.
				'\''.$this->con->escapeStr($ses_id).'\','.
				'\''.time().'\','.
				'\''.time().'\','.
				'\''.$this->con->escapeStr($data).'\') ';
				
		if ($this->con->execute($strReq) === false) {
			return false;
		}
		
		return true;
	}
	
	function _destroy($ses_id)
	{
		$strReq = 'DELETE FROM '.$this->table.' '.
				'WHERE ses_id = \''.$this->con->escapeStr($ses_id).'\' ';
		
		if ($this->con->execute($strReq) === false) {
			return false;
		} else {
			$this->_optimize();
			return true;
		}
	}
	
	function _gc()
	{
		$ses_life = strtotime($this->sess_ttl);
		
		$strReq = 'DELETE FROM '.$this->table.' '.
				'WHERE ses_time < '.$ses_life.' ';
		
		if ($this->con->execute($strReq) === false) {
			return false;
		}
		
		if ($this->con->rowCount() > 0) {
			$this->_optimize();
		}
		
		return true;
	}
	
	function _optimize()
	{
		$strReq = 'OPTIMIZE TABLE '.$this->table.' ';
		
		if ($this->con->execute($strReq) === false) {
			return false;
		} else {
			return true;
		}
	}
}
?>