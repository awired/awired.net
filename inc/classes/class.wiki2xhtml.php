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

require dirname(__FILE__).'/class.wiki2xhtml.basic.php';

class wiki2xhtml extends wiki2xhtmlBasic
{
	function wiki2xhtml()
	{
		parent::wiki2xhtml();
		
		# Mise en place des options
		$this->setOpt('active_title',1);
		$this->setOpt('active_setext_title',0);
		$this->setOpt('active_hr',1);
		$this->setOpt('active_lists',1);
		$this->setOpt('active_quote',1);
		$this->setOpt('active_pre',1);
		$this->setOpt('active_empty',1);
		$this->setOpt('active_auto_urls',0);
		$this->setOpt('active_urls',1);
		$this->setOpt('active_auto_img',0);
		$this->setOpt('active_img',1);
		$this->setOpt('active_anchor',1);
		$this->setOpt('active_em',1);
		$this->setOpt('active_strong',1);
		$this->setOpt('active_br',1);
		$this->setOpt('active_q',1);
		$this->setOpt('active_code',1);
		$this->setOpt('active_acronym',1);
		$this->setOpt('active_ins',1);
		$this->setOpt('active_del',1);
		$this->setOpt('active_footnotes',1);
		$this->setOpt('active_wikiwords',0);
		$this->setOpt('active_macros',1);

		$this->setOpt('parse_pre',1);
		
		$this->setOpt('active_fix_word_entities',0);
		$this->setOpt('active_fr_syntax',0);
		
		$this->setOpt('first_title_level',3);
		
		$this->setOpt('note_prefix','wiki-footnote');
		$this->setOpt('note_str','<div class="footnotes"><h4>Notes</h4>%s</div>');
		$this->setOpt('words_pattern','((?<![A-Za-z0-9µÀ-ÖØ-öø-ÿ])([A-ZÀ-ÖØ-Þ][a-zµß-öø-ÿ]+){2,}(?![A-Za-z0-9µÀ-ÖØ-öø-ÿ]))');
		
		$this->foot_notes = array();
		
		$share_dir = dirname(__FILE__).'/../../share/';
		$acro_file = $share_dir.'wiki-acronyms.txt';
		$acro_user = $share_dir.'wiki-acronyms-user.txt';
		
		
		if (file_exists($acro_user)) {
			$acro_file = $acro_user;
		}
		
		$this->setOpt('acronyms_file',$acro_file);
		
		$this->acro_table = $this->__getAcronyms();
		
		$this->registerFunction('url:post',array('wiki2xhtml','postLink'));
	}
	
	function postLink($url,$content)
	{
		if (!isset($GLOBALS['blog'])) {
			return null;
		}
		
		$id = substr($url,5);
		
		$post = $GLOBALS['blog']->getPostByID($id);
		
		if ($post === false || $post->isEmpty()) {
			return false;
		}
		
		$res['url'] = $post->getPermURL();
		
		if ($url == $content) {
			$res['content'] = $post->f('post_titre');
		} else {
			$res['content'] = $content;
			$res['title'] = $post->f('post_titre');
		}
		
		if ($post->f('post_lang')) {
			$res['lang'] = $post->f('post_lang');
		}
		
		return $res;
	}
}

# Wiki2xhtml pour les commentaires
class wiki2xhtmlComment extends wiki2xhtmlBasic
{
	function wiki2xhtmlComment()
	{
		parent::wiki2xhtml();
		
		$this->setOpt('active_title',0);
		$this->setOpt('active_setext_title',0);
		$this->setOpt('active_hr',0);
		$this->setOpt('active_lists',1);
		$this->setOpt('active_quote',0);
		$this->setOpt('active_pre',1);
		$this->setOpt('active_empty',0);
		$this->setOpt('active_auto_urls',0);
		$this->setOpt('active_urls',1);
		$this->setOpt('active_auto_img',0);
		$this->setOpt('active_img',0);
		$this->setOpt('active_anchor',0);
		$this->setOpt('active_em',1);
		$this->setOpt('active_strong',1);
		$this->setOpt('active_br',1);
		$this->setOpt('active_q',1);
		$this->setOpt('active_code',1);
		$this->setOpt('active_acronym',1);
		$this->setOpt('active_ins',1);
		$this->setOpt('active_del',1);
		$this->setOpt('active_footnotes',0);
		$this->setOpt('active_wikiwords',0);
		$this->setOpt('active_macros',0);
		$this->setOpt('parse_pre',0);
		$this->setOpt('active_fix_word_entities',0); 
		$this->setOpt('active_fr_syntax',0);
	}
}

?>