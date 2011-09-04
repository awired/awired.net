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

class auth
{
	var $con;
	var $failed_redirect;
	
	function auth(&$con,$failed_redirect='auth.php')
	{
		$this->con = $con;
		$this->failed_redirect = $failed_redirect;
	}
	
	function check($level)
	{
		$failed = true;
		
		if (empty($_SESSION['sess_user_id']))
		{
			if (!empty($_COOKIE['dc_admin']))
			{
				$cookie = unserialize($_COOKIE['dc_admin']);
				
				$failed = !$this->perform($cookie['user_id'],
							$cookie['user_pwd'],$level,false,$cookie['remember']);
				
				if (!$failed) {
					$_SESSION['sess_user_id'] = $cookie['user_id'];
				}
			}
			else
			{
				$failed = true;
				$_SESSION['sess_auth_from'] = $_SERVER['REQUEST_URI'];
			}
		}
		else
		{
			$blog = new blog($this->con,DB_PREFIX,NULL,dc_encoding);
					
			$failed = !$blog->checkUser($_SESSION['sess_user_id'],NULL,$level);
			
			unset($blog);
		}
		
		if ($failed) {
			header('Location: '.$this->failed_redirect);
			exit;
		}
	}
	
	function perform($user_id,$user_pwd,$level,$md5=true,$remember=false)
	{
		$blog = new blog($this->con,DB_PREFIX,NULL,dc_encoding);
		
		$res = false;
		
		if($blog->checkUser($user_id,$user_pwd,$level,$md5) !== false)
		{
			$rs = $blog->getUser($user_id);
			
			$_SESSION['sess_user_level'] = $rs->f('user_level');
			$_SESSION['sess_user_format']= $rs->f('user_post_format');
			$_SESSION['sess_user_nom'] = $rs->f('user_nom');
			$_SESSION['sess_user_prenom'] = $rs->f('user_prenom');
			$_SESSION['sess_user_pseudo'] = $rs->f('user_pseudo');
			$_SESSION['sess_user_email'] = $rs->f('user_email');
			$_SESSION['sess_user_edit_size'] = $rs->f('user_edit_size');
			$_SESSION['sess_user_pref_cat'] = (integer) $rs->f('user_pref_cat');
			$_SESSION['sess_user_lang'] = $rs->f('user_lang');
			$_SESSION['sess_user_delta'] = $rs->f('user_delta');
			$_SESSION['sess_user_post_pub'] = $rs->f('user_post_pub');
			
			if($_SESSION['sess_user_pseudo'] != '')
				$_SESSION['sess_user_cn'] = $_SESSION['sess_user_pseudo'];
			else
				$_SESSION['sess_user_cn'] = trim($_SESSION['sess_user_prenom'].' '.$_SESSION['sess_user_nom']);
			
			# Création du cookie (10 jours)
			$user_pwd = ($md5) ? md5($user_pwd) : $user_pwd;
			$cookie = array('user_id' => $user_id, 'user_pwd' => $user_pwd, 'remember' => $remember);
			$cookie_ttl = ($remember) ? strtotime('+15 days') : 0;
			setcookie('dc_admin',serialize($cookie),$cookie_ttl,dc_app_url);
			
			$res = true;
			
			$blog->tiggerLog('','','Login',$rs->f('user_id'));
		}
		
		unset($blog);
		
		return $res;
	}
	
	function userLevel($level)
	{
		return $_SESSION['sess_user_level'] >= $level;
	}
}
?>
