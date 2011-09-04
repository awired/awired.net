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

# Chemin vers la racine de l'application (si vous changer le fichier de place)
$app_path = '/';
require dirname(__FILE__).$app_path.'/inc/prepend.php';


# Si on est là, alors on a un _POST
# Connexion et création du blog
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="'.dc_encoding.'"?>'."\n";
echo '<response>'."\n";

$content = '';

if (empty($_GET['id']))
{
	$content = '<error>1</error>'."\n".
	'<message>No ID.</message>';
}
else
{
	$id = $_GET['id'];
	
	$con = new Connection(DB_USER,DB_PASS,DB_HOST,DB_DBASE);
	
	if($con->error())
	{
		$content = '<error>1</error>'."\n".
		'<message>MySQL connection error : '.$con->error().'</message>';
	}
	else
	{
		$blog = new blog($con,DB_PREFIX,1,dc_encoding);
		
		$blog->setURL('post',dc_blog_url.dc_format_post_url);
		
		$post = $blog->getPostByID($id);
		
		if ($post->isEmpty())
		{
			$content = '<error>1</error>'."\n".
			'<message>No post for this ID.</message>';
		}
		elseif (!dc_allow_trackbacks || !$post->f('post_open_tb')
		|| (dc_comments_ttl!=0 && time()-(dc_comments_ttl*86400) > $post->getTS()))
		{
			$content = '<error>1</error>'."\n".
			'<message>Trackbacks are not allowed for this post or weblog.</message>';
		}
		elseif (isset($_REQUEST['__info']))
		{
			$content =
			'<error>0</error>'."\n".
			'<engine>DotClear</engine>'."\n".
			'<version>'.DC_VERSION.'</version>'."\n".
			'<encoding>'.dc_encoding.'</encoding>'."\n";
		}
		elseif (!empty($_REQUEST['__mode']) && $_REQUEST['__mode'] == 'rss')
		{
			$tb_url = 'http://'.$_SERVER['HTTP_HOST'].dc_trackback_uri.'&amp;id='.$id;
			
			if ($post->f('post_chapo') != '') {
				$post_excerpt = $post->f('post_chapo');
			} else {
				$post_excerpt = $post->f('post_content');
			}
			$post_excerpt = util::cutString(strip_tags($post_excerpt),255);
			
			$content =
			'<error>0</error>'."\n".
			'<rss version="0.91"><channel>'."\n".
			'<title>'.dc_blog_name.' - Trackback</title>'."\n".
			'<link>'.$tb_url.'</link>'."\n".
			'<description>TrackBack item for this blog</description>'."\n".
			'<language>fr</language>'."\n".
			'<item>'."\n".
			'<title>'.$blog->toXML($post->f('post_titre'),0).'</title>'."\n".
			'<link>'.util::getHost().$post->getPermURL().'</link>'."\n".
			'<description>'.$post_excerpt.'</description>'."\n".
			'</item>'."\n".
			'</channel>'."\n".
			'</rss>';
		}
		elseif (empty($_REQUEST['url']))
		{
			$content =
			'<error>1</error>'."\n".
			'<message>URL parameter is requiered.</message>';
		}
		else
		{
			$url = $_REQUEST['url'];
			$title = (!empty($_REQUEST['title'])) ? $_REQUEST['title'] : $url;
			$excerpt = (!empty($_REQUEST['excerpt'])) ? $_REQUEST['excerpt'] : '';
			$blog_name = (!empty($_REQUEST['blog_name'])) ? $_REQUEST['blog_name'] : '';
			
			$title = strip_tags(trim($title));
			$excerpt = strip_tags($excerpt);
			$blog_name = strip_tags($blog_name);
			
			if ($title == '') {
				$title = $url;
			}
			
			if (strlen($excerpt) > 255) {
				$excerpt = util::cutString($excerpt,252).'...';
			}
			
			$is_utf8 = util::isUTF8($title) || util::isUTF8($excerpt) || util::isUTF8($blog_name);
			
			if (dc_encoding != 'UTF-8' && $is_utf8)
			{
				$title = utf8_decode($title);
				$excerpt = utf8_decode($excerpt);
				$blog_name = utf8_decode($blog_name);
			}
			elseif (dc_encoding == 'UTF-8' && !$is_utf8)
			{
				$title = utf8_encode($title);
				$excerpt = utf8_encode($excerpt);
				$blog_name = utf8_encode($blog_name);
			}
			
			$comment = '<!-- TB -->'."\n".
					'<p><strong>'.$title.'</strong></p>'."\n".
					'<p>'.$excerpt.'</p>';
			
			if ($blog->addComment($id,$blog_name,'',$url,$comment,true) !== false)
			{
				$content = '<error>0</error>';
				
				if (dc_comment_notification && $post->f('user_email') != '')
				{
					$n_titre = $blog->removeEntities($post->f('post_titre'));
					$n_mail = $post->f('user_email');
					$n_subject = util::mimeEncode('['.dc_blog_name.'] '.$n_titre,dc_encoding);
					
					$n_content =
					sprintf(__('Trackback for entry %s'),$n_titre)."\n\n".
					sprintf(__('By: %s'),$blog_name)."\n".
					sprintf(__('Website: %s'),$url)."\n".
					"\n".$title."\n\n".$excerpt."\n".
					"--\n".
					util::getHost().$post->getPermURL();
					
					$n_headers =
					'From: '.$n_mail."\r\n".
					'Content-Type: text/plain; charset='.dc_encoding.";\r\n".
					"X-Mailer: DotClear\r\n".
					'X-Blog: '.util::getHost().dc_blog_url;
					
					@mail($n_mail,$n_subject,$n_content,$n_headers);
				}
			}
			else
			{
				$err = $blog->error(0);
				$content =
				'<error>1</error>'."\n".
				'<message>'.$err[0][1].'</message>';
			}
		}
		
		$con->close();
	}
}

echo $content."\n";
echo '</response>';
?>
