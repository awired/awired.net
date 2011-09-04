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

class dcBlogroll
{
	/*
	Cette fonction affiche la liste des liens (blogroll)
	
	@proto function dcLinkList
	@param string  block Chaine de substitution pour pour la liste ('<ul>%s</ul>')
	@param string  item  Chaine de substitution pour un élément ('<li>%s</li>')
	*/
	function linkList($category='<h3>%s</h3>',$block='<ul>%s</ul>',$item='<li>%s</li>')
	{
		global $con, $blog;
	
		if (($rs_link = $con->select(
			' SELECT label, href, title, lang, rel FROM ' . $blog->t_link
			. '  ORDER BY position')) !== false) {
			$res = '';
			
			while (!$rs_link->EOF()) {
				$label = $rs_link->f('label');
				$href  = $rs_link->f('href');
				$title = $rs_link->f('title');
				$lang  = $rs_link->f('lang');
				$rel = $rs_link->f('rel');
				
				if (! $label && ! $href) {
					if ('' != $res) {
						printf($block,$res);
					}
					printf($category, $title);
					$res = ''; 
				} else {
					
					$link =
					'<a href="'.htmlspecialchars($href).'"'.
					((!$lang) ? '' : ' hreflang="'.htmlspecialchars($lang).'"').
					((!$title) ? '' : ' title="'.htmlspecialchars($title).'"').
					((!$rel) ? '' : ' rel="'.htmlspecialchars($rel).'"').
					'>'.
					htmlspecialchars($label).
					'</a>';
					
					$res .= sprintf($item,$link);
				}
				$rs_link->moveNext();
			}
			if ('' != $res) {
				printf($block,$res);
			}
		}
	}
}
?>
