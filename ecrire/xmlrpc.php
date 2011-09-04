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

define('DC_NO_SESSION',1);

require dirname(__FILE__).'/inc/prepend.php';
require dirname(__FILE__).'/../inc/classes/class.dc.xmlrpc.php';

$con = new connection(DB_USER,DB_PASS,DB_HOST,DB_DBASE);

if($con->error()) {
	header('Content-Type: text/plain');
	echo 'Erreur MySQL : '.$con->error();
	exit;
}

$blog = new blog($con,DB_PREFIX,NULL,dc_encoding);
$blog->setURL('post',dc_blog_url.dc_format_post_url);

$server = new DotClearRPC($blog);
$server->setBlogName(dc_blog_name);
$server->setBlogUrl('http://'.$_SERVER['HTTP_HOST'].dc_blog_url);


$server->serve(dc_encoding);

$con->close();
?>
