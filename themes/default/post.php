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

<div class="post">
	<h2 class="post-title"><?php dcPostTitle(); ?></h2>
	<p class="post-info">
	<a href="<?php dcPostCatURL(); ?>"><?php dcPostCatTitle(); ?></a> > Par <?php dcPostAuthor(); ?>,
	<?php dcPostDate(); ?> &agrave; <?php dcPostTime(); ?>
	</p>
	<?php dcPostChapo('<div class="post-chapo">%s</div>'); ?>
	<div class="post-content"><?php dcPostContent(); ?></div>
</div>

<?php if (dcPostOpenTrackbacks() && dc_allow_trackbacks) : ?>
<div id="diggLike">
	<h3 id="tb">Promouvoir cet article</h3>
	<div class="upperleft-add_digg">
		<div class="upperright">
		<div class="lowerleft">
		<div class="lowerright">
		<? dcDiggLike::dcSubmitToDigg(1,''); ?>
		<? dcDiggLike::dcSubmitToDelicious(1,''); ?>
		<? dcDiggLike::dcSubmitToBlogmarks(1,''); ?>
		<? dcDiggLike::dcSubmitToScoopeo(1,''); ?>
		<? dcDiggLike::dcSubmitToFuzz(1,''); ?>
		<? dcDiggLike::dcSubmitToAllactu(1,''); ?>
		<? dcDiggLike::dcSubmitToNuouz(1,''); ?>	
		</div>
		</div>
		</div>
		</div>	
		<div id="blanc">&nbsp;</div>
</div>
<?php else: ?>
<?php endif; ?>

<?php
/*
<div id="trackbacks">
	<h3 id="tb">Trackbacks</h3>
	<?php if ($trackbacks->isEmpty()) : /* Message si aucune trackback ?>
		<p>Aucun trackback.</p>
	<?php endif; ?>
	
	<?php while ($trackbacks->fetch()) : /* Liste des trackbacks 
		// On met le numéro du trackback dans une variable
		$tb_num = $trackbacks->int_index+1;
	?>
		<p id="c<?php dcTBID(); ?>" class="comment-info">
		<span class="comment-number"><a href="#c<?php dcTBID(); ?>"><?php echo $tb_num; ?>.</a></span>
		Le <?php dcTBDate(); ?> &agrave;
		<?php dcTBTime(); ?>, de
		<strong><?php dcTBAuthor(); ?></strong></p>
		
		<?php /* on affiche le trackback  ?>
		<blockquote>
		<?php dcTBContent(); ?>
		</blockquote>
	<?php endwhile; ?>
	
	
	<?php /*Le lien pour ajouter un trackback si ceux-ci sont autorisés ?>
	<?php if (dcPostOpenTrackbacks() && dc_allow_trackbacks) : ?>
		<p>Pour faire un trackback sur ce billet&nbsp;:
		<?php echo dcPostTrackBackURI(); ?></p>
	<?php else: ?>
		<p>Les trackbacks pour ce billet sont ferm&eacute;s.</p>
	<?php endif; ?>
</div>

*/
?>	

<div id="comments">
	<h3 id="co">Commentaires</h3>
	<?php if ($comments->isEmpty()) : /* Message si aucune commentaire */	?>
		<div class="upperleft-comment">
		<div class="upperright">
		<div class="lowerleft">
		<div class="lowerright">
		Aucun commentaire pour le moment.
		</div>
		</div>
		</div>
		</div>	
		<div id="blanc">&nbsp;</div>
	<?php endif; ?>
	
	<?php while ($comments->fetch()) : /* Boucle de commentaires */
		// On met le numéro du commentaire dans une variable
		$co_num = $comments->int_index+1;
	?>
	
		<div class="upperleft-comment">
		<div class="upperright">
		<div class="lowerleft">
		<div class="lowerright">
		
		<span class="comment-number"><a href="#c<?php dcCommentID(); ?>"><?php echo $co_num; ?>.</a></span>
		Le <?php dcCommentDate(); ?> &agrave;
		<?php dcCommentTime(); ?>, par
		<strong><?php dcCommentAuthor(); ?></strong>
		
		<?php /* on affiche le commentaire */ ?>
		<?php dcCommentContent(); ?>
		
		</div>
		</div>
		</div>
		</div>	
		<div id="blanc">&nbsp;</div>
 	
	<?php endwhile; ?>
	<h3>Ajouter un commentaire</h3>
	
	<div class="upperleft-add_comment">
		<div class="upperright">
		<div class="lowerleft">
		<div class="lowerright">
			
		<?php if (dcPostOpenComments() && dc_allow_comments) : /* Si les commentaires sont permis */?>
			<?php if (dc_allow_comments) : /* Si les commentaires sont permis */?>
				<?php include dirname(__FILE__).'/form.php'; ?>
			<?php endif; ?>
		<?php else : ?>
			Les commentaires pour ce billet sont ferm&eacute;s.
		<?php endif; ?>
		</div>
		</div>
		</div>
		</div>	
	<div id="blanc">&nbsp;</div>
</div>
