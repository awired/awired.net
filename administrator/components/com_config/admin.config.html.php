<?php
/**
* @version $Id: admin.config.html.php 6070 2006-12-20 02:09:09Z robs $
* @package Joomla
* @subpackage Config
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

/**
* @package Joomla
* @subpackage Config
*/
class HTML_config {

	function showconfig( &$row, &$lists, $option) {
		global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_session_type, $mainframe;
		
		$tabs = new mosTabs(0);
		?>
		<script type="text/javascript">
		<!--
		function saveFilePerms() {
			var f = document.adminForm;
			if (f.filePermsMode0.checked)
				f.config_fileperms.value = '';
			else {
				var perms = 0;
				if (f.filePermsUserRead.checked) perms += 400;
				if (f.filePermsUserWrite.checked) perms += 200;
				if (f.filePermsUserExecute.checked) perms += 100;
				if (f.filePermsGroupRead.checked) perms += 40;
				if (f.filePermsGroupWrite.checked) perms += 20;
				if (f.filePermsGroupExecute.checked) perms += 10;
				if (f.filePermsWorldRead.checked) perms += 4;
				if (f.filePermsWorldWrite.checked) perms += 2;
				if (f.filePermsWorldExecute.checked) perms += 1;
				f.config_fileperms.value = '0'+''+perms;
			}
		}
		function changeFilePermsMode(mode) {
			if(document.getElementById) {
				switch (mode) {
					case 0:
						document.getElementById('filePermsValue').style.display = 'none';
						document.getElementById('filePermsTooltip').style.display = '';
						document.getElementById('filePermsFlags').style.display = 'none';
						break;
					default:
						document.getElementById('filePermsValue').style.display = '';
						document.getElementById('filePermsTooltip').style.display = 'none';
						document.getElementById('filePermsFlags').style.display = '';
				} // switch
			} // if
			saveFilePerms();
		}
		function saveDirPerms() {
			var f = document.adminForm;
			if (f.dirPermsMode0.checked)
				f.config_dirperms.value = '';
			else {
				var perms = 0;
				if (f.dirPermsUserRead.checked) perms += 400;
				if (f.dirPermsUserWrite.checked) perms += 200;
				if (f.dirPermsUserSearch.checked) perms += 100;
				if (f.dirPermsGroupRead.checked) perms += 40;
				if (f.dirPermsGroupWrite.checked) perms += 20;
				if (f.dirPermsGroupSearch.checked) perms += 10;
				if (f.dirPermsWorldRead.checked) perms += 4;
				if (f.dirPermsWorldWrite.checked) perms += 2;
				if (f.dirPermsWorldSearch.checked) perms += 1;
				f.config_dirperms.value = '0'+''+perms;
			}
		}
		function changeDirPermsMode(mode) 	{
			if(document.getElementById) {
				switch (mode) {
					case 0:
						document.getElementById('dirPermsValue').style.display = 'none';
						document.getElementById('dirPermsTooltip').style.display = '';
						document.getElementById('dirPermsFlags').style.display = 'none';
						break;
					default:
						document.getElementById('dirPermsValue').style.display = '';
						document.getElementById('dirPermsTooltip').style.display = 'none';
						document.getElementById('dirPermsFlags').style.display = '';
				} // switch
			} // if
			saveDirPerms();
		}
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			
			// do field validation
			if (form.config_session_type.value != <?php echo $row->config_session_type; ?> ){
				if ( confirm('Etes vous certain de vouloir changer la `Méthode d\'Authentification de Session`? \n\n Toutes les sessions existantes sur le site public seront supprimées !! \n\n') ) {
					submitform( pressbutton );
				} else {
					return;
				}
			} else {
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
		<table cellpadding="1" cellspacing="1" border="0" width="100%">
		<tr>
			<td width="250"><table class="adminheading"><tr><th nowrap="nowrap" class="config">Configuration Globale</th></tr></table></td>
			<td width="270">
				<span class="componentheading">configuration.php est :
				<?php echo is_writable( '../configuration.php' ) ? '<b><font color="green"> Modifiable</font></b>' : '<b><font color="red"> Non modifiable</font></b>' ?>
				</span>
			</td>
			<?php
			if (mosIsChmodable('../configuration.php')) {
				if (is_writable('../configuration.php')) {
					?>
					<td>
						<input type="checkbox" id="disable_write" name="disable_write" value="1"/>
						<label for="disable_write">Rendre non modifiable apr&egrave;s la sauvegarde</label>
					</td>
					<?php
				} else {
					?>
					<td>
						<input type="checkbox" id="enable_write" name="enable_write" value="1"/>
						<label for="enable_write">Override write protection while saving</label>
					</td>
				<?php
				} // if
			} // if
			?>
		</tr>
		</table>
			<?php
		$tabs->startPane("configPane");
		$tabs->startTab("Site","site-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185">Site hors ligne:</td>
				<td><?php echo $lists['offline']; ?></td>
			</tr>
			<tr>
				<td valign="top">Message site hors ligne:</td>
				<td><textarea class="text_area" cols="60" rows="2" style="width:500px; height:40px" name="config_offline_message"><?php echo $row->config_offline_message ; ?></textarea><?php
					$tip = 'Message affich&eacute; lorsque le site est hors ligne';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td valign="top">Message erreur syst&egrave;me:</td>
				<td><textarea class="text_area" cols="60" rows="2" style="width:500px; height:40px" name="config_error_message"><?php echo $row->config_error_message; ?></textarea><?php
					$tip = 'Message affich&eacute; lorsque Joomla! ne parvient pas &agrave; se connecter &agrave; la base de donn&eacute;es';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Nom du site:</td>
				<td><input class="text_area" type="text" name="config_sitename" size="50" value="<?php echo $row->config_sitename; ?>"/></td>
			</tr>
			<tr>
				<td>Afficher les liens non autoris&eacute;s:</td>
				<td><?php echo $lists['shownoauth']; ?><?php
					$tip = 'Si oui, les liens vers les articles non publics seront visibles par les utilisateurs non logu&eacute;s.  L utilisateur devra se loguer pour voir l article en entier.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Enregistrement des utilisateurs:</td>
				<td><?php echo $lists['allowUserRegistration']; ?><?php
					$tip = 'Si oui, les utilisateurs sont autoris&eacute;s &agrave; cr&eacute;er un compte sur votre site';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Forcer l'activation des comptes:</td>
				<td><?php echo $lists['useractivation']; ?>
				<?php
					$tip = 'Si oui, le nouvel inscrit recevra par mail un lien pour activer son compte.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Requiert un email unique:</td>
				<td><?php echo $lists['uniquemail']; ?><?php
					$tip = 'si oui, les utilisateurs ne pourront pas partager le m&ecirc;me email.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Authentification sur le site:</td>
				<td>
					<?php echo $lists['frontend_login']; ?>
					<?php
					$tip = 'Si `Non` est s&eacute;lectionn&eacute;, les utilisateurs ne pourront pas s`authentifier sur le site. Ce param&egrave;tre d&eacute;sactive également l`enregistrement des nouveaux utilisateurs';
					echo mosToolTip( $tip );
					?>
				</td>
			</tr>
			<tr>	
				<td>Paramètres utilisateur en Frontend:</td>
				<td>
					<?php echo $lists['frontend_userparams']; ?>
					<?php
					$tip = 'Si `Non` est s&eacute;lectionn&eacute;, l`utilisateur ne pourra pas modifier ses paramètres dans son profil';
					echo mosToolTip( $tip );
					?>
				</td>
			</tr>
			<tr>
				<td>Debug du Site:</td>
				<td>
					<?php echo $lists['debug']; ?>
					<?php
					$tip = 'Si oui, des informations de diagnostic seront affich&eacute;es ainsi que les erreurs SQL, si elles sont pr&eacute;sentes';
					echo mosToolTip( $tip );
					?>
				</td>
			</tr>
			<tr>
				<td>Editeur WYSIWYG par d&eacute;faut:</td>
				<td><?php echo $lists['editor']; ?></td>
			</tr>
			<tr>
				<td>Longueur des listes:</td>
				<td>
				<?php echo $lists['list_limit']; ?>
				<?php
					$tip = 'Longueur par d&eacute;faut des listes pour tous les utilisateurs du backend';
					echo mosToolTip( $tip );
					?>
				</td>
			</tr>
			<tr>
				<td>Ic&ocirc;ne "Favori" du site:</td>
				<td>
				<input class="text_area" type="text" name="config_favicon" size="20" value="<?php echo $row->config_favicon; ?>"/>
				<?php
				$tip = 'Si non d&eacute;fini ou si le fichier ne peut &ecirc;tre trouv&eacute;, le fichier favicon.ico par d&eacute;faut sera utilis&eacute;.';
				echo mosToolTip( $tip, 'Favourite Icon' );
				?>			
				</td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Localisation","Locale-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185">Langue:</td>
				<td><?php echo $lists['lang']; ?></td>
			</tr>
			<tr>
				<td width="185">Fuseau horaire:</td>
				<td>
				<?php echo $lists['offset']; ?>
				<?php
				$tip = "Date/heure courante &agrave; afficher: " . mosCurrentDate(_DATE_FORMAT_LC2);
				echo mosToolTip($tip);
				?>			
				</td>
			</tr>
			<tr>
				<td width="185">Fuseau horaire du serveur:</td>
				<td>
				<input class="text_area" type="text" name="config_offset" size="15" value="<?php echo $row->config_offset; ?>" disabled="disabled" />
				</td>
			</tr>
			<tr>
				<td width="185">Code langue:</td>
				<td>
				<input class="text_area" type="text" name="config_locale" size="15" value="<?php echo $row->config_locale; ?>"/>
				</td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Contenu","content-page");
			?>
			<table class="adminform">
			<tr>
				<td colspan="3">* Ces param&egrave;tres pilotent le format d'affichage du contenu *<br/><br/></td>
			</tr>
			<tr>
				<td width="200">Titres cliquables:</td>
				<td width="130"><?php echo $lists['link_titles']; ?></td>
				<td><?php
					$tip = 'Si oui, le titre de l article sera cliquable et renverra vers l article';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td width="200">Lien "Lire la suite":</td>
				<td width="130"><?php echo $lists['readmore']; ?></td>
				<td><?php
					$tip = 'Si Afficher est s&eacute;lectionn&eacute;, le lien Lire la suite sera affich&eacute; si un texte principal a &eacute;t&eacute; saisi pour un article donn&eacute;';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Evaluation/Vote des articles:</td>
				<td><?php echo $lists['vote']; ?></td>
				<td><?php
					$tip = 'Si Afficher est s&eacute;lectionn&eacute;, le syst&egrave;me de vote est activ&eacute; pour les articles';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Nom de l'auteur:</td>
				<td><?php echo $lists['hideAuthor']; ?></td>
				<td><?php
					$tip = 'Si Afficher est s&eacute;lectionn&eacute;, le nom de l auteur sera affich&eacute;. Ce param&egrave;tre global peut-&ecirc;tre modifi&eacute; dans les param&egrave;tres de l article.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Date/Heure de cr&eacute;ation:</td>
				<td><?php echo $lists['hideCreateDate']; ?></td>
				<td><?php
					$tip = 'Si Afficher est s&eacute;lectionn&eacute;, la date et l heure de cr&eacute;ation d un article sera affich&eacute;e. Ce param&egrave;tre global peut-&ecirc;tre modifi&eacute; dans les param&egrave;tres de l article.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Date/Heure de modification:</td>
				<td><?php echo $lists['hideModifyDate']; ?></td>
				<td><?php
					$tip = 'Si Afficher est s&eacute;lectionn&eacute;, la date et l heure de modification d un article sera affich&eacute;e. Ce param&egrave;tre global peut-&ecirc;tre modifi&eacute; dans les param&egrave;tres de l article.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Clics:</td>
				<td><?php echo $lists['hits']; ?></td>
				<td><?php
					$tip = 'Si Afficher est s&eacute;lectionn&eacute;, le nombre de clics sur les articles sera affich&eacute;. Ce param&egrave;tre global peut-&ecirc;tre modifi&eacute; dans les param&egrave;tres de l article.';
					echo mosToolTip( $tip );
				?></td>
			</tr>
			<tr>
				<td>Ic&ocirc;ne PDF:</td>
				<td><?php echo $lists['hidePdf']; ?></td>
				<?php
				if (!is_writable( "$mosConfig_absolute_path/media/" )) {
					echo "<td align=\"left\">";
					echo mosToolTip('Option non disponible si le r&eacute;pertoire /media est non modifiable');
					echo "</td>";
				} else {
					?>				
					<td>&nbsp;</td>
					<?php
				}
				?>		
			</tr>
			<tr>
				<td>Ic&ocirc;ne Print:</td>
				<td><?php echo $lists['hidePrint']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Ic&ocirc;ne Email:</td>
				<td><?php echo $lists['hideEmail']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Ic&ocirc;nes:</td>
				<td><?php echo $lists['icons']; ?></td>
				<td><?php echo mosToolTip('Si Afficher est s&eacute;lectionn&eacute;, les ic&ocirc;nes Print, PDF et Email seront affich&eacute;es'); ?></td>
			</tr>
			<tr>
				<td>Sommaire pour les articles multi-pages:</td>
				<td><?php echo $lists['multipage_toc']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Bouton "Retour":</td>
				<td><?php echo $lists['back_button']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Navigation entre les articles:</td>
				<td><?php echo $lists['item_navigation']; ?></td>
				<td>&nbsp;</td>
			</tr>
			</table>
			<input type="hidden" name="config_multilingual_support" value="<?php echo $row->config_multilingual_support?>">
			<?php
		$tabs->endTab();
		$tabs->startTab("Database","db-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185">Hostname:</td>
				<td><input class="text_area" type="text" name="config_host" size="25" value="<?php echo $row->config_host; ?>"/></td>
			</tr>
			<tr>
				<td>MySQL Username:</td>
				<td><input class="text_area" type="text" name="config_user" size="25" value="<?php echo $row->config_user; ?>"/></td>
			</tr>
			<tr>
				<td>MySQL Database:</td>
				<td><input class="text_area" type="text" name="config_db" size="25" value="<?php echo $row->config_db; ?>"/></td>
			</tr>
			<tr>
				<td>MySQL Database Prefix:</td>
				<td>
				<input class="text_area" type="text" name="config_dbprefix" size="10" value="<?php echo $row->config_dbprefix; ?>"/>
				&nbsp;<?php echo mosWarning('!! NE LE CHANGEZ PAS SI VOUS N ETES PAS CERTAIN DE CE QUE VOUS FAITES !!'); ?>
				</td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Serveur","server-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185">Chemin absolu:</td>
				<td width="450"><strong><?php echo $row->config_absolute_path; ?></strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>URL du Site:</td>
				<td><strong><?php echo $row->config_live_site; ?></strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Mot secret:</td>
				<td><strong><?php echo $row->config_secret; ?></strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Compression GZIP des pages:</td>
				<td>
				<?php echo $lists['gzip']; ?>
				<?php echo mosToolTip('*Compress buffered output* si support&eacute;'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Durée de vie des sessions du site:</td>
				<td>
				<input class="text_area" type="text" name="config_lifetime" size="10" value="<?php echo $row->config_lifetime; ?>"/>
				&nbsp;seconds&nbsp;
				<?php echo mosWarning('D&eacute;connexion automatique apr&egrave;s la dur&eacute;e d inactivit&eacute; d&eacute;finie pour les utilisateurs du <strong>site/frontend</strong>. Plus cette valeur est &eacute;lev&eacute;e plus le risque de s&eacute;curit&eacute; est grand!'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Durée de vie des sessions de l'admin:</td>
				<td>
				<input class="text_area" type="text" name="config_session_life_admin" size="10" value="<?php echo $row->config_session_life_admin; ?>"/>
				&nbsp;seconds&nbsp;
				<?php echo mosWarning('D&eacute;connexion automatique apr&egrave;s la dur&eacute;e d inactivit&eacute; d&eacute;finie pour les utilisateurs <strong>admin/backend</strong>. Plus cette valeur est &eacute;lev&eacute;e plus le risque de s&eacute;curit&eacute; est grand!'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Se rappeler de la page o&ugrave; la session a expir&eacute;:</td>
				<td>
				<?php echo $lists['admin_expired']; ?>
				<?php echo mosToolTip('Si la session expire et vous reconnectez dans les 10 minutes, vous serez redirigé vers la page à laquelle vous tentiez d accèder lorsque vous avez été déconnecté.'); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>M&eacute;thode d'authentification de session:</td>
				<td>
				<?php echo $lists['session_type']; ?>
				&nbsp;&nbsp;
				<?php echo mosWarning(' NE CHANGEZ PAS CETTE VALEUR SI VOUS N ETES PAS CERTAIN DE CE QUE VOUS FAITES!<br /><br /> Si vous avez des visiteurs utilisant AOL ou un Proxy, vous devrez peut-&ecirc;tre passer au Level 2' ); ?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Rapport d'erreurs:</td>
				<td><?php echo $lists['error_reporting']; ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Serveur d'Aide:</td>
				<td><input class="text_area" type="text" name="config_helpurl" size="50" value="<?php echo $row->config_helpurl; ?>"/></td>
			</tr>
			<tr>
				<?php
				$mode = 0;
				$flags = 0644;
				if ($row->config_fileperms!='') {
					$mode = 1;
					$flags = octdec($row->config_fileperms);
				} // if
				?>
				<td valign="top">Création de fichier:</td>
				<td>
					<fieldset><legend>Permissions des fichiers</legend>
						<table cellpadding="1" cellspacing="1" border="0">
							<tr>
								<td><input type="radio" id="filePermsMode0" name="filePermsMode" value="0" onclick="changeFilePermsMode(0)"<?php if (!$mode) echo ' checked="checked"'; ?>/></td>
								<td><label for="filePermsMode0">Ne pas CHMODer les nouveaux fichiers (utiliser les param&egrave;tres du serveur)</label></td>
							</tr>
							<tr>
								<td><input type="radio" id="filePermsMode1" name="filePermsMode" value="1" onclick="changeFilePermsMode(1)"<?php if ($mode) echo ' checked="checked"'; ?>/></td>
								<td>
									<label for="filePermsMode1">CHMODer les nouveaux fichiers</label>
									<span id="filePermsValue"<?php if (!$mode) echo ' style="display:none"'; ?>>
									en:	<input class="text_area" type="text" readonly="readonly" name="config_fileperms" size="4" value="<?php echo $row->config_fileperms; ?>"/>
									</span>
									<span id="filePermsTooltip"<?php if ($mode) echo ' style="display:none"'; ?>>
									&nbsp;<?php echo mosToolTip('S&eacute;lectionner cette option pour définir les permissions sur les nouveaux fichiers'); ?>
									</span>
								</td>
							</tr>
							<tr id="filePermsFlags"<?php if (!$mode) echo ' style="display:none"'; ?>>
								<td>&nbsp;</td>
								<td>
									<table cellpadding="0" cellspacing="1" border="0">
										<tr>
											<td style="padding:0px">Utilisateur:</td>
											<td style="padding:0px"><input type="checkbox" id="filePermsUserRead" name="filePermsUserRead" value="1" onclick="saveFilePerms()"<?php if ($flags & 0400) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="filePermsUserRead">lecture</label></td>
											<td style="padding:0px"><input type="checkbox" id="filePermsUserWrite" name="filePermsUserWrite" value="1" onclick="saveFilePerms()"<?php if ($flags & 0200) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="filePermsUserWrite">ecriture</label></td>
											<td style="padding:0px"><input type="checkbox" id="filePermsUserExecute" name="filePermsUserExecute" value="1" onclick="saveFilePerms()"<?php if ($flags & 0100) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px" colspan="3"><label for="filePermsUserExecute">execution</label></td>
										</tr>
										<tr>
											<td style="padding:0px">Groupe:</td>
											<td style="padding:0px"><input type="checkbox" id="filePermsGroupRead" name="filePermsGroupRead" value="1" onclick="saveFilePerms()"<?php if ($flags & 040) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="filePermsGroupRead">lecture</label></td>
											<td style="padding:0px"><input type="checkbox" id="filePermsGroupWrite" name="filePermsGroupWrite" value="1" onclick="saveFilePerms()"<?php if ($flags & 020) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="filePermsGroupWrite">ecriture</label></td>
											<td style="padding:0px"><input type="checkbox" id="filePermsGroupExecute" name="filePermsGroupExecute" value="1" onclick="saveFilePerms()"<?php if ($flags & 010) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px" width="70"><label for="filePermsGroupExecute">execution</label></td>
											<td><input type="checkbox" id="applyFilePerms" name="applyFilePerms" value="1"/></td>
											<td nowrap="nowrap">
												<label for="applyFilePerms">
													Appliquer aux fichiers existants
													&nbsp;<?php
													echo mosWarning(
														'Ces param&egrave;tres vont s appliquer à <em>tous les fichiers existants</em> du site.<br/>'.
														'<b>UNE UTILISATION INAPPROPRIEE DE CETTE OPTION PEUT RENDRE LE SITE INUTILISABLE!</b>'
													);?>
												</label>
											</td>
										</tr>
										<tr>
											<td style="padding:0px">Public:</td>
											<td style="padding:0px"><input type="checkbox" id="filePermsWorldRead" name="filePermsWorldRead" value="1" onclick="saveFilePerms()"<?php if ($flags & 04) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="filePermsWorldRead">lecture</label></td>
											<td style="padding:0px"><input type="checkbox" id="filePermsWorldWrite" name="filePermsWorldWrite" value="1" onclick="saveFilePerms()"<?php if ($flags & 02) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="filePermsWorldWrite">ecriture</label></td>
											<td style="padding:0px"><input type="checkbox" id="filePermsWorldExecute" name="filePermsWorldExecute" value="1" onclick="saveFilePerms()"<?php if ($flags & 01) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px" colspan="4"><label for="filePermsWorldExecute">execution</label></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<?php
				$mode = 0;
				$flags = 0755;
				if ($row->config_dirperms!='') {
					$mode = 1;
					$flags = octdec($row->config_dirperms);
				} // if
				?>
				<td valign="top">Création de dossier:</td>
				<td>
					<fieldset><legend>Permissions des dossiers</legend>
						<table cellpadding="1" cellspacing="1" border="0">
							<tr>
								<td><input type="radio" id="dirPermsMode0" name="dirPermsMode" value="0" onclick="changeDirPermsMode(0)"<?php if (!$mode) echo ' checked="checked"'; ?>/></td>
								<td><label for="dirPermsMode0">Ne pas CHMODer les nouveaux fichiers (utiliser les param&egrave;tres du serveur)</label></td>
							</tr>
							<tr>
								<td><input type="radio" id="dirPermsMode1" name="dirPermsMode" value="1" onclick="changeDirPermsMode(1)"<?php if ($mode) echo ' checked="checked"'; ?>/></td>
								<td>
									<label for="dirPermsMode1">CHMODer les nouveaux dossiers</label>
									<span id="dirPermsValue"<?php if (!$mode) echo ' style="display:none"'; ?>>
									en: <input class="text_area" type="text" readonly="readonly" name="config_dirperms" size="4" value="<?php echo $row->config_dirperms; ?>"/>
									</span>
									<span id="dirPermsTooltip"<?php if ($mode) echo ' style="display:none"'; ?>>
									&nbsp;<?php echo mosToolTip('S&eacute;lectionner cette option pour définir les permissions sur les nouveaux dossiers'); ?>
									</span>
								</td>
							</tr>
							<tr id="dirPermsFlags"<?php if (!$mode) echo ' style="display:none"'; ?>>
								<td>&nbsp;</td>
								<td>
									<table cellpadding="1" cellspacing="0" border="0">
										<tr>
											<td style="padding:0px">Utilisateur:</td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsUserRead" name="dirPermsUserRead" value="1" onclick="saveDirPerms()"<?php if ($flags & 0400) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="dirPermsUserRead">lecture</label></td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsUserWrite" name="dirPermsUserWrite" value="1" onclick="saveDirPerms()"<?php if ($flags & 0200) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="dirPermsUserWrite">ecriture</label></td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsUserSearch" name="dirPermsUserSearch" value="1" onclick="saveDirPerms()"<?php if ($flags & 0100) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px" colspan="3"><label for="dirPermsUserSearch">recherche</label></td>
										</tr>
										<tr>
											<td style="padding:0px">Groupe:</td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsGroupRead" name="dirPermsGroupRead" value="1" onclick="saveDirPerms()"<?php if ($flags & 040) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="dirPermsGroupRead">lecture</label></td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsGroupWrite" name="dirPermsGroupWrite" value="1" onclick="saveDirPerms()"<?php if ($flags & 020) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="dirPermsGroupWrite">ecriture</label></td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsGroupSearch" name="dirPermsGroupSearch" value="1" onclick="saveDirPerms()"<?php if ($flags & 010) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px" width="70"><label for="dirPermsGroupSearch">recherche</label></td>
											<td><input type="checkbox" id="applyDirPerms" name="applyDirPerms" value="1"/></td>
											<td nowrap="nowrap">
												<label for="applyDirPerms">
													Appliquer aux dossiers existants
													&nbsp;<?php
													echo mosWarning(
														'Ces param&egrave;tres vont s appliquer à <em>tous les dossiers existants</em> du site.<br/>'.
														'<b>UNE UTILISATION INAPPROPRIEE DE CETTE OPTION PEUT RENDRE LE SITE INUTILISABLE!</b>'
													);?>
												</label>
											</td>
										</tr>
										<tr>
											<td style="padding:0px">Public:</td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsWorldRead" name="dirPermsWorldRead" value="1" onclick="saveDirPerms()"<?php if ($flags & 04) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="dirPermsWorldRead">lecture</label></td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsWorldWrite" name="dirPermsWorldWrite" value="1" onclick="saveDirPerms()"<?php if ($flags & 02) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px"><label for="dirPermsWorldWrite">ecriture</label></td>
											<td style="padding:0px"><input type="checkbox" id="dirPermsWorldSearch" name="dirPermsWorldSearch" value="1" onclick="saveDirPerms()"<?php if ($flags & 01) echo ' checked="checked"'; ?>/></td>
											<td style="padding:0px" colspan="3"><label for="dirPermsWorldSearch">recherche</label></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
				<td>&nbsp;</td>
			  </tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Metadata","metadata-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185" valign="top">Description Meta pour tout le site:</td>
				<td><textarea class="text_area" cols="50" rows="3" style="width:500px; height:50px" name="config_MetaDesc"><?php echo $row->config_MetaDesc; ?></textarea></td>
			</tr>
			<tr>
				<td valign="top">Mots clés Meta pour tout le site:</td>
				<td><textarea class="text_area" cols="50" rows="3" style="width:500px; height:50px" name="config_MetaKeys"><?php echo $row->config_MetaKeys; ?></textarea></td>
			</tr>
			<tr>
				<td valign="top">Afficher le Meta Tag Titre:</td>
				<td>
				<?php echo $lists['MetaTitle']; ?>
				&nbsp;&nbsp;&nbsp;
				<?php echo mosToolTip('Montre le meta tag Titre à l affichage des articles'); ?>
				</td>
			  	</tr>
			<tr>
				<td valign="top">Afficher le Meta Tag Auteur:</td>
				<td>
				<?php echo $lists['MetaAuthor']; ?>
				&nbsp;&nbsp;&nbsp;
				<?php echo mosToolTip('Montre le meta tag Auteur à l affichage des articles'); ?>
				</td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Mail","mail-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185">Mailer:</td>
				<td><?php echo $lists['mailer']; ?></td>
			</tr>
			<tr>
				<td>Mail de:</td>
				<td><input class="text_area" type="text" name="config_mailfrom" size="50" value="<?php echo $row->config_mailfrom; ?>"/></td>
			</tr>
			<tr>
				<td>Nom de l'exp&eacute;diteur:</td>
				<td><input class="text_area" type="text" name="config_fromname" size="50" value="<?php echo $row->config_fromname; ?>"/></td>
			</tr>
			<tr>
				<td>Sendmail Path:</td>
				<td><input class="text_area" type="text" name="config_sendmail" size="50" value="<?php echo $row->config_sendmail; ?>"/></td>
			</tr>
			<tr>
				<td>SMTP Auth:</td>
				<td><?php echo $lists['smtpauth']; ?></td>
			</tr>
			<tr>
				<td>SMTP User:</td>
				<td><input class="text_area" type="text" name="config_smtpuser" size="50" value="<?php echo $row->config_smtpuser; ?>"/></td>
			</tr>
			<tr>
				<td>SMTP Pass:</td>
				<td><input class="text_area" type="text" name="config_smtppass" size="50" value="<?php echo $row->config_smtppass; ?>"/></td>
			</tr>
			<tr>
				<td>SMTP Host:</td>
				<td><input class="text_area" type="text" name="config_smtphost" size="50" value="<?php echo $row->config_smtphost; ?>"/></td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Cache","cache-page");
			?>
			<table class="adminform" border="0">
			<?php
			if (is_writeable($row->config_cachepath)) {
				?>
				<tr>
					<td width="185">Activer le Cache:</td>
					<td width="500"><?php echo $lists['caching']; ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td>Dossier du Cache:</td>
				<td>
				<input class="text_area" type="text" name="config_cachepath" size="50" value="<?php echo $row->config_cachepath; ?>"/>
				<?php
				if (is_writeable($row->config_cachepath)) {
					echo mosToolTip('Le dossier du cache est <b>Modifiable</b>');
				} else {
					echo mosWarning('Le dossier du cache n est pas MODIFIABLE - veuillez le CHMODer en 755 avant d activer le Cache');
				}
				?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Dur&eacute;e de vie du Cache:</td>
				<td><input class="text_area" type="text" name="config_cachetime" size="5" value="<?php echo $row->config_cachetime; ?>"/> secondes</td>
				<td>&nbsp;</td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("Statistiques","stats-page");
			?>
			<table class="adminform">
			<tr>
				<td width="185">Statistiques:</td>
				<td width="100"><?php echo $lists['enable_stats']; ?></td>
				<td><?php echo mostooltip('Active/d&eacute;sactive la collecte des statistiques du site'); ?></td>
			</tr>
			<tr>
				<td>Journaliser les clics du contenu par date:</td>
				<td><?php echo $lists['log_items']; ?></td>
				<td><span class="error"><?php echo mosWarning('ATTENTION : un grande quantit&eacute; de donn&eacute;es sera collect&eacute;e'); ?></span></td>
			</tr>
			<tr>
				<td>Journaliser les mots recherch&eacute;s:</td>
				<td><?php echo $lists['log_searches']; ?></td>
				<td>&nbsp;</td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->startTab("SEO","seo-page");
			?>
			<table class="adminform">
			<tr>
				<td width="200"><strong>Optimisation pour les moteurs de recherche</strong></td>
				<td width="100">&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>URLs explicites (SEF):</td>
				<td><?php echo $lists['sef']; ?>&nbsp;</td>
				<td><span class="error"><?php echo mosWarning('Apache seulement! Renommer htaccess.txt en .htaccess avant activation'); ?></span></td>
			</tr>
			<tr>
				<td>Titres Dynamiques des pages:</td>
				<td><?php echo $lists['pagetitles']; ?></td>
				<td><?php echo mosToolTip('Change dynamiquement le titre des pages pour refl&eacute;ter l article visit&eacute;'); ?></td>
			</tr>
			</table>
			<?php
		$tabs->endTab();
		$tabs->endPane();

		// show security setting check
		josSecurityCheck();
		?>
		
		<input type="hidden" name="option" value="<?php echo $option; ?>"/>
		<input type="hidden" name="config_absolute_path" value="<?php echo $row->config_absolute_path; ?>"/>
		<input type="hidden" name="config_live_site" value="<?php echo $row->config_live_site; ?>"/>
		<input type="hidden" name="config_secret" value="<?php echo $row->config_secret; ?>"/>
	  	<input type="hidden" name="task" value=""/>
		</form>
		<script  type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<?php
	}

}
?>