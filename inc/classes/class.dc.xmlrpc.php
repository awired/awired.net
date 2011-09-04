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

require dirname(__FILE__).'/../incutio/class.IXR_Library.php';

class DotClearRPC extends IXR_IntrospectionServer
{
	var $blog;
	var $blog_url;
	var $blog_name;
	
	var $debug = false;
	var $raw_debug = false;
	var $debug_file ='/tmp/dotclear-xmlrpc.log';
	
	function DotClearRPC(&$blog)
	{
		$this->IXR_IntrospectionServer();
		
		$this->blog = $blog;
		
		$this->blog_url = '';
		$this->blog_name = '';
		
		# Méthodes blogger
		$this->addCallback('blogger.newPost','this:blogger_newPost',
			array('string','string','string','string','string','string','integer'),
			'New post');
		
		$this->addCallback('blogger.editPost','this:blogger_editPost',
			array('boolean','string','string','string','string','string','integer'),
			'Edit a post');
		
		$this->addCallback('blogger.deletePost','this:blogger_deletePost',
			array('string','string','string','string','string','integer'),
			'Delete a post');
		
		$this->addCallback('blogger.getRecentPosts','this:blogger_getRecentPosts',
			array('array','string','string','string','string','integer'),
			'Return a list of recent posts');
		
		$this->addCallback('blogger.getPost','this:blogger_getPost',
			array('struct','string','integer','string','string'),
			'Return a posts by ID');
		
		$this->addCallback('blogger.getUsersBlogs','this:blogger_getUserBlogs',
			array('struct','string','string','string'),
			'Return user\'s blog');
		
		$this->addCallback('blogger.getUserInfo','this:blogger_getUserInfo',
			array('struct','string','string','string'),
			'Return User Info');
		
		
		# Méthode metaWeblog
		$this->addCallback('metaWeblog.newPost','this:mw_newPost',
			array('string','string','string','string','struct','boolean'),
			'Creates a new post, and optionnaly publishes it.');
		
		$this->addCallback('metaWeblog.getRecentPosts','this:mw_getRecentPosts',
			array('array','string','string','string','integer'),
			'List of most recent posts in the system');
		
		$this->addCallback('metaWeblog.getPost','this:mw_getPost',
			array('struct','string','string','string'),
			'Returns information about a specific post');
		
		$this->addCallback('metaWeblog.editPost','this:mw_editPost',
			array('boolean','string','string','string','struct','boolean'),
			'Updates information about an existing entry');
		
		
		# Méthodes mt
		$this->addCallback('mt.getRecentPostTitles','this:mt_getRecentPostTitles',
			array('array','string','string','string','integer'),
			'List of most recent posts in the system');
		
		$this->addCallback('mt.getCategoryList','this:mt_getCategoryList',
			array('array','string','string','string'),
			'List of all categories defined in the weblog');
		
		$this->addCallback('mt.getPostCategories','this:mt_getPostCategories',
			array('array','string','string','string'),
			'List of all categories to which the post is assigned');
		
		$this->addCallback('mt.setPostCategories','this:mt_setPostCategories',
			array('boolean','string','string','string','array'),
			'Sets the categories for a post');
		
		$this->addCallback('mt.supportedMethods','this:listMethods',
			array(),'Retrieve information about the XML-RPC methods supported by the server.');
	}
	
	function serve($encoding)
	{
		if ($this->raw_debug && !empty($GLOBALS['HTTP_RAW_POST_DATA'])) {
			$this->__debugTrace('XML/RPC',$GLOBALS['HTTP_RAW_POST_DATA']);
		}
		
		parent::serve(false,$encoding);
	}
	
	function setBlogName($name)
	{
		$this->blog_name = $name;
	}
	
	function setBlogUrl($url)
	{
		$this->blog_url = $url;
	}
	
	function __debugTrace($function,$msg)
	{
		if ($this->debug)
		{
			if (($fp = @fopen($this->debug_file,'a')) !== false)
			{
				if (is_array($msg)) {
					$msg = implode(' : ',$msg);
				}
				
				fwrite($fp,'['.date('r').']'.' '.$function.' - '.$msg."\n");
				fclose($fp);
			}
		}
	}
	
	
	/* Méthodes blogger
	--------------------------------------------------- */
	function blogger_getUserInfo($args)
	{
		$this->__debugTrace('blogger.getUserInfo',$args);
		return $this->_getUserInfo($args[1],$args[2]);
	}
	
	function blogger_getUserBlogs($args)
	{
		$this->__debugTrace('blogger.getUsersBlogs',$args);
		return $this->_getUserBlogs($args[1],$args[2]);
	}
	
	function blogger_getPost($args)
	{
		$this->__debugTrace('blogger.getPost',$args);
		return $this->_getPost($args[2],$args[3],$args[1],'blogger');
	}
	
	function blogger_getRecentPosts($args)
	{
		$this->__debugTrace('blogger.getRecentPosts',$args);
		return $this->_getRecentPosts($args[2],$args[3],$args[4],'blogger');
	}
	
	function blogger_newPost($args)
	{
		$this->__debugTrace('blogger.newPost',$args);
		return $this->_newPost($args[2],$args[3],$args[4],array(),$args[5]);
	}
	
	function blogger_editPost($args)
	{
		$this->__debugTrace('blogger.editPost',$args);
		return $this->_editPost($args[2],$args[3],$args[1],$args[4],array(),$args[5]);
	}
	
	function blogger_deletePost($args)
	{
		$this->__debugTrace('blogger.deletePost',$args);
		return $this->_deletePost($args[2],$args[3],$args[1],1);
	}
	
	
	/* Méthode MT
	--------------------------------------------------- */
	function mt_getRecentPostTitles($args)
	{
		$this->__debugTrace('mt.getRecentPostTitles',$args);
		return $this->_getRecentPosts($args[1],$args[2],$args[3],'mt');
	}
	
	function mt_getCategoryList($args)
	{
		$this->__debugTrace('mt.getCategoryList',$args);
		return $this->_getCategories($args[1],$args[2]);
	}
	
	function mt_getPostCategories($args)
	{
		$this->__debugTrace('mt.getCategoryList',$args);
		return $this->_getPostCat($args[1],$args[2],$args[0]);
	}
	
	function mt_setPostCategories($args)
	{
		$this->__debugTrace('mt.setPostCategories',$args);
		return $this->_setPostCat($args[1],$args[2],$args[0],$args[3]);
	}
	
	
	/* Méthode meatWeblog
	--------------------------------------------------- */
	function mw_newPost($args)
	{
		$this->__debugTrace('metaWeblog.newPost',$args);
		return $this->_newPost($args[1],$args[2],'',$args[3],$args[4]);
	}
	
	function mw_getRecentPosts($args)
	{
		$this->__debugTrace('metaWeblog.getRecentPosts',$args);
		return $this->_getRecentPosts($args[1],$args[2],$args[3],'mw');
	}
	
	function mw_getPost($args)
	{
		$this->__debugTrace('metaWeblog.getPost',$args);
		return $this->_getPost($args[1],$args[2],$args[0],'mw');
	}
	
	function mw_editPost($args)
	{
		$this->__debugTrace('metaWeblog.editPost',$args);
		return $this->_editPost($args[1],$args[2],$args[0],'',$args[3],$args[4]);
	}
	
	
	/* Fonctions génériques
	--------------------------------------------------- */
	function _getUserInfo($user,$pwd)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Login error : '.$user);
		}
		
		if (($rs = $this->blog->getUser($user)) === false)
		{
			return new IXR_Error(801,'Login error : '.$user);
		}
		else
		{
			return array(
				'userid' => $rs->f('user_id'),
				'firstname' => $rs->f('user_prenom'),
				'lastname' => $rs->f('user_nom'),
				'nickname' => $rs->f('user_pseudo'),
				'email' => $rs->f('user_email'),
				'url' => $this->blog_url
				);
		}
	}
	
	function _getUserBlogs($user,$pwd)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false)
		{
			return new IXR_Error(801,'Erreur de login');
		}
		else
		{
			return array(array(
				'url' => $this->blog_url,
				'blogid' => '1',
				'blogName' => $this->blog_name
				));
		}
	}
	
	function _getCategories($user,$pwd)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		if (($rs = $this->blog->getCat()) === false)
		{
			return new IXR_Error(802,'Erreur SQL');
		}
		else
		{
			$res = array();
			while (!$rs->EOF())
			{
				$res[] = array(
					'categoryId' => $rs->f('cat_id'),
					'categoryName' => $rs->f('cat_libelle')
					);
				$rs->moveNext();
			}
			return $res;
		}
	}
	
	function _getPostCat($user,$pwd,$postid)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		if(empty($postid)) {
			return new IXR_Error(806,'Pas de billet pour cet ID');
		}
		
		$rs = $this->blog->getPostByID($postid);
		
		if($rs->isEmpty()) {
			return new IXR_Error(806,'Pas de billet pour cet ID');
		}
		
		$res[0]['categoryName'] = $rs->f('cat_libelle');
		$res[0]['categoryId'] = $rs->f('cat_id');
		$res[0]['isPrimary'] = true;
		
		return $res;
	}
	
	function _getPost($user,$pwd,$postid,$type='blogger')
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		if(empty($postid)) {
			return new IXR_Error(806,'Pas de billet pour cet ID');
		}
		
		$rs = $this->blog->getPostByID($postid);
		
		if($rs->isEmpty()) {
			return new IXR_Error(806,'Pas de billet pour cet ID');
		}
		
		$content = $rs->f('post_content');
		$chapo = $rs->f('post_chapo');
		$titre = $rs->f('post_titre');
		$post_ts = $rs->getTS();
		$open_tb = $rs->f('post_open_tb');
		$open_comment = $rs->f('post_open_comment');
		$perm_url = $rs->getPermURL();
		
		$res['dateCreated'] = new IXR_Date($post_ts);
		$res['userid'] = $rs->f('user_id');
		
		if ($type == 'blogger') {
			$res['content'] = $content;
		}
		
		if ($type == 'mw') {
			$res['postid'] = $postid;
			$res['title'] = $titre;
			$res['description'] = $content;
			$res['link'] = $res['permalink'] = $perm_url;
			$res['mt_excerpt'] = $chapo;
			$res['mt_text_more'] = '';
			$res['mt_allow_comments'] = (integer) $open_comment;
			$res['mt_allow_pings'] = (integer) $open_tb;
			$res['mt_convert_breaks'] = '';
			$res['mt_keywords'] = '';
		}
		
		return $res;
	}
	
	function _getRecentPosts($user,$pwd,$numberofposts,$type='blogger')
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		if($numberofposts > 40) {
			return new IXR_Error(805,'Ne peut obtenir plus de 40 billets');
		}
		
		$this->blog->setUser($user);
		
		if (($news = $this->blog->getLastNews($numberofposts)) === false)
		{
			return new IXR_Error(802,'Erreur MySQL');
		}
		else
		{
			$res = array();
			while (!$news->EOF())
			{
				$content = $news->f('post_content');
				$chapo = $news->f('post_chapo');
				$titre = $news->f('post_titre');
				$post_ts = $news->getTS();
				$open_tb = $news->f('post_open_tb');
				$open_comment = $news->f('post_open_comment');
				$perm_url = $news->getPermURL();
				
				$tres['dateCreated'] = new IXR_Date($post_ts);
				$tres['userid'] = $news->f('user_id');
				$tres['postid'] = $news->f('post_id');
				
				if ($type == 'blogger') {
					$tres['content'] = $content;
				}
				
				if ($type == 'mt' || $type == 'mw') {
					$tres['title'] = $titre;
				}
				
				if ($type == 'mw') {
					$tres['description'] = $content;
					$tres['link'] = $tres['permalink'] = $perm_url;
					$tres['mt_excerpt'] = $chapo;
					$tres['mt_text_more'] = '';
					$tres['mt_allow_comments'] = (integer) $open_comment;
					$tres['mt_allow_pings'] = (integer) $open_tb;
					$tres['mt_convert_breaks'] = '';
					$tres['mt_keywords'] = '';
				}
				
				$res[] = $tres;
				unset($tres);
				$news->moveNext();
			}
			return $res;
		}
	}
	
	function _newPost($user,$pwd,$content,$struct=array(),$publish=true)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		$title = (!empty($struct['title'])) ? $struct['title'] : '-';
		$description = (!empty($struct['description'])) ? $struct['description'] : NULL;
		$open_comment = (isset($struct['mt_allow_comments'])) ? $struct['mt_allow_comments'] : 1;
		$open_tb = (isset($struct['mt_allow_pings'])) ? $struct['mt_allow_pings'] : 1;
		$chapo = (!empty($struct['mt_excerpt'])) ? $struct['mt_excerpt'] : '';
		
		if ($description !== NULL) {
			$content = $description;
		}
		
		if (empty($content)) {
			return new IXR_Error(804,'Impossible de créer un billet vide');
		}
		
		$rsUser = $this->blog->getUser($user);
		$cat_id = $rsUser->f('user_pref_cat');
		$user_lang = $rsUser->f('user_lang');
		
		$publish = (boolean) $publish;
		
		if (($post_id = $this->blog->addPost($user,$title,'',$chapo,$content,'',
		$cat_id,'html',$publish,$open_comment,$open_tb,$user_lang,false,
		$rsUser->f('user_delta'))) !== false) {
			return (string) $post_id;
		} else {
			return new IXR_Error(802,'Erreur MySQL');
		}
	}
	
	function _editPost($user,$pwd,$postid,$content,$struct=array(),$publish=true)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		$title = (!empty($struct['title'])) ? $struct['title'] : NULL;
		$description = (!empty($struct['description'])) ? $struct['description'] : NULL;
		$post_dt = (!empty($struct['dateCreated'])) ? strtotime($struct['dateCreated']) : '';
		$open_comment = (isset($struct['mt_allow_comments'])) ? $struct['mt_allow_comments'] : NULL;
		$open_tb = (isset($struct['mt_allow_pings'])) ? $struct['mt_allow_pings'] : NULL;
		$chapo = (!empty($struct['mt_excerpt'])) ? $struct['mt_excerpt'] : '';
		
		if (!$post_dt) {
			$post_dt = '';
		}
		
		if ($description !== NULL) {
			$content = $description;
		}
		
		if (empty($content)) {
			return new IXR_Error(804,'Impossible de créer un billet vide');
		}
		
		$rsUser = $this->blog->getUser($user);
		
		$rsPost = $this->blog->getPostByID($postid);
		
		if ($user != $rsPost->f('user_id') && $rsUser->f('user_level') < 9) {
			return new IXR_Error(807,'Permissions insuffisantes');
		}
		
		if ($open_comment === NULL) {
			$open_comment = $rsPost->f('post_open_comment');
		}
		if ($open_tb === NULL) {
			$open_tb = $rsPost->f('post_open_tb');
		}
		
		$publish = (boolean) $publish;
		
		$cat_id = $rsPost->f('cat_id');
		
		if ($title == NULL) {
			$title = $rsPost->f('post_titre');
		}
		
		$post_lang = $rsPost->f('post_lang');
		$post_selected = $rsPost->f('post_selected');
		
		if ($this->blog->updPost($postid,$title,'',$chapo,$content,'',$cat_id,
		'html',$publish,$open_comment,$open_tb,$post_dt,$post_lang,$post_selected) !== false) {
			return true;
		} else {
			$this->__debugTrace('_editPost','Erreur: '.$this->blog->error(true));
			return new IXR_Error(802,'Erreur MySQL');
		}
	}
	
	function _deletePost($user,$pwd,$postid,$publish)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		$rsUser = $this->blog->getUser($user);
		
		$rsPost = $this->blog->getPostByID($postid);
		
		if ($user != $rsPost->f('user_id') && $rsUser->f('user_level') < 9) {
			return new IXR_Error(807,'Permissions insuffisantes');
		}
		
		if ($publish) {
			if ($this->blog->delPost($postid) !== false) {
				return true;
			} else {
				return new IXR_Error(802,'Erreur MySQL');
			}
		}
	}
	
	function _setPostCat($user,$pwd,$postid,$cats)
	{
		if ($this->blog->checkUser($user,$pwd,1) === false) {
			return new IXR_Error(801,'Erreur de login');
		}
		
		$cat_id = (!empty($cats[0]['categoryId'])) ? $cats[0]['categoryId'] : NULL;
		
		foreach($cats as $v)
		{
			if (isset($v['isPrimary']) && $v['isPrimary']) {
				$cat_id = $v['categoryId'];
				break;
			}
		}
		
		if ($cat_id !== NULL) {
			if ($this->blog->updPostCat($postid,$cat_id) !== false) {
				return true;
			} else {
				return new IXR_Error(802,'Erreur MySQL');
			}
		}
	}
}
?>