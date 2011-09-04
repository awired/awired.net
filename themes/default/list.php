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
?>


<!-- Boucle sur la liste de billets -->
<?php while ($news->fetch()) : ?>
	<div class="post">
		<?php dcDayDate('<p class="day-date">%s</p>'); ?>
		
		<h2 id="p<?php dcPostID(); ?>" class="post-title"><a
		href="<?php dcPostURL(); ?>"><?php dcPostTitle(); ?></a></h2>
		
		<p class="post-info">
		<a href="<?php dcPostCatURL(); ?>"><?php dcPostCatTitle(); ?> >
		Par <?php dcPostAuthor(); ?>,
		<?php dcPostDate(); ?> &agrave; <?php dcPostTime(); ?>
		</a>
		</p>
		
		<div class="post-content" <?php dcPostLang(); ?>>
			<?php dcPostAbstract('%s','<p><a href="%s" title="Lire %s">Lire la suite</a></p>'); ?>
		</div>
		
		<p class="post-info-co"><a href="<?php dcPostURL(); ?>#co"
		title="commentaires pour : <?php dcPostTitle(); ?>"><?php
		dcPostNbComments('aucun commentaire','un commentaire','%s commentaires');
		?></a>
		<span>::</span> <a href="<?php dcPostURL(); ?>#tb"
		title="trackbacks pour : <?php dcPostTitle(); ?>"><?php
		dcPostNbTrackbacks('aucun trackback','un trackback','%s trackbacks');
		?></a></p>
	</div>
<?php endwhile; ?>
