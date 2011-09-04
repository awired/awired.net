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
<form action="<?php dcPostUrl(); ?>" method="post" id="comment-form">
<fieldset>
	<?php dcCommentFormError('<div class="error"><strong>Erreurs :</strong><br /> %s</div>'); ?>
	<?php dcCommentFormMsg('<p class="msg"><strong>%s</strong></p>'); ?>
	<p class="field"><label for="c_nom">Nom ou pseudo&nbsp;:</label>
	<input name="c_nom" id="c_nom" type="text" size="30" maxlength="255"
	value="<?php dcCommentFormValue('c_nom'); ?>" />
	</p>

	<p class="field"><label for="c_mail">Email (facultatif)&nbsp;:</label>
	<input name="c_mail" id="c_mail" type="text" size="30" maxlength="255"
	value="<?php dcCommentFormValue('c_mail'); ?>" />
	</p>

	<p class="field"><label for="c_site">Site Web (facultatif)&nbsp;:</label>
	<input name="c_site" id="c_site" type="text" size="30" maxlength="255"
	value="<?php dcCommentFormValue('c_site'); ?>" />
	</p>
	
	<p class="field"><label for="c_content">Commentaire&nbsp;:</label>
	<textarea name="c_content" id="c_content" cols="35" rows="7"><?php
	dcCommentFormValue('c_content');
	?></textarea>
	</p>
</fieldset>

<p class="form-help">Le code HTML dans le commentaire sera affich&eacute; comme du texte,
les adresses internet seront converties automatiquement.</p>

<fieldset>	
	<p><input type="checkbox" id="c_remember" name="c_remember" />
	<label for="c_remember">Se souvenir de mes informations</label>
	</p>
	<p><input type="submit" class="preview" name="preview" value="pr&eacute;visualiser" />
	<input type="submit" class="submit" value="envoyer" />
	<input type="hidden" name="redir" value="<?php dcCommentFormRedir(); ?>" /></p>
</fieldset>

</form>
