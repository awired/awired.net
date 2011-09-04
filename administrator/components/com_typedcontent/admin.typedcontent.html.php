<?php
/**
* @version $Id: admin.typedcontent.html.php 5948 2006-12-06 22:42:31Z facedancer $
* @package Joomla
* @subpackage Content
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
* @subpackage Content
*/
class HTML_typedcontent {

	/**
	* Writes a list of the content items
	* @param array An array of content objects
	*/
	function showContent( &$rows, &$pageNav, $option, $search, &$lists ) {
		global $my, $acl, $database;

		mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="edit">
			Gestion
			des articles statiques </th>
			<td>
			Filtre:&nbsp;
			</td>
			<td>
			<input type="text" name="search" value="<?php echo htmlspecialchars( $search );?>" class="text_area" onChange="document.adminForm.submit();" />
			</td>
			<td>
			&nbsp;&nbsp;&nbsp;Ordre:&nbsp;
			</td>
			<td>
			<?php echo $lists['order']; ?>
			</td>
			<td width="right">
			<?php echo $lists['authorid'];?>
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="5">
			#
			</th>
			<th width="5px">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			Titre
			</th>
			<th width="5%">
			Publi&eacute;
			</th>
			<th width="2%">
			Trier
			</th>
			<th width="1%">
			<a href="javascript: saveorder( <?php echo count( $rows )-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Sauver Tri" /></a>
			</th>
			<th width="10%">
			Acc&egrave;s
			</th>
			<th width="5%">
			ID
			</th>
			<th width="1%" align="left">
			Liens
			</th>
			<th width="20%" align="left">
			Auteur
			</th>
			<th align="center" width="10">
			Date
			</th>
		</tr>
		<?php
		$k = 0;
		$nullDate = $database->getNullDate();
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);

			$now = _CURRENT_SERVER_TIME;
			if ( $now <= $row->publish_up && $row->state == 1 ) {
			// Published
				$img = 'publish_y.png';
				$alt = 'Publié';
			} else if ( ( $now <= $row->publish_down || $row->publish_down == $nullDate ) && $row->state == 1 ) {
			// Pending
				$img = 'publish_g.png';
				$alt = 'Publié';
			} else if ( $now > $row->publish_down && $row->state == 1 ) {
			// Expired
				$img = 'publish_r.png';
				$alt = 'Expiré';
			} elseif ( $row->state == 0 ) {
			// Unpublished
				$img = 'publish_x.png';
				$alt = 'Non Publié';
			}
			
			// correct times to include server offset info
			$row->publish_up 	= mosFormatDate( $row->publish_up, _CURRENT_SERVER_TIME_FORMAT );
			if (trim( $row->publish_down ) == $nullDate || trim( $row->publish_down ) == '' || trim( $row->publish_down ) == '-' ) {
				$row->publish_down = 'Never';
			}
			$row->publish_down 	= mosFormatDate( $row->publish_down, _CURRENT_SERVER_TIME_FORMAT );

			$times = '';
				if ($row->publish_up == $nullDate) {
					$times .= "<tr><td>Commence: Toujours</td></tr>";
				} else {
					$times .= "<tr><td>Commence: $row->publish_up</td></tr>";
				}
			if ($row->publish_down == $nullDate || $row->publish_down == 'Jamais') {
					$times .= "<tr><td>Expire: Jamais</td></tr>";
				} else {
					$times .= "<tr><td>Expire: $row->publish_down</td></tr>";
				}

			if ( !$row->access ) {
				$color_access = 'style="color: green;"';
				$task_access = 'accessregistered';
			} else if ( $row->access == 1 ) {
				$color_access = 'style="color: red;"';
				$task_access = 'accessspecial';
			} else {
				$color_access = 'style="color: black;"';
				$task_access = 'accesspublic';
			}

			$link 		= 'index2.php?option=com_typedcontent&task=edit&hidemainmenu=1&id='. $row->id;

			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
					$author = '<a href="'. $linkA .'" title="Editer Utilisateur">'. $row->creator .'</a>';
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->creator;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td>
				<?php echo $checked; ?>
				</td>
				<td>
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->title;
					if ( $row->title_alias ) {
						echo ' (<i>'. $row->title_alias .'</i>)';
					}
				} else {
					?>
					<a href="<?php echo $link; ?>" title="Editer Article Statique">
					<?php
					echo $row->title;
					if ( $row->title_alias ) {
						echo ' (<i>'. $row->title_alias .'</i>)';
					}
					?>
					</a>
					<?php
				}
				?>
				</td>
				<?php
				if ( $times ) {
					?>
					<td align="center">
					<a href="javascript: void(0);" onMouseOver="return overlib('<table><?php echo $times; ?></table>', CAPTION, 'Information de Publication', BELOW, RIGHT);" onMouseOut="return nd();" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? "unpublish" : "publish";?>')">
					<img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
					</a>
					</td>
					<?php
				}
				?>
				<td align="center" colspan="2">
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="text_area" style="text-align: center" />
				</td>
				<td align="center">
				<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $task_access;?>')" <?php echo $color_access; ?>>
				<?php echo $row->groupname;?>
				</a>
				</td>
				<td align="center">
				<?php echo $row->id;?>
				</td>
				<td align="center">
				<?php echo $row->links;?>
				</td>
				<td align="left">
				<?php echo $author;?>
				</td>
				<td>
				<?php echo $date; ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>

		<?php echo $pageNav->getListFooter(); ?>
		<?php mosCommonHTML::ContentLegend(); ?>

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function edit( &$row, &$images, &$lists, &$params, $option, &$menus ) {
		global $database;
		
		mosMakeHtmlSafe( $row );

		$create_date 	= null;
		$mod_date 		= null;
		$nullDate 		= $database->getNullDate();
		
		if ( $row->created != $nullDate ) {
			$create_date 	= mosFormatDate( $row->created, '%A, %d %B %Y %H:%M', '0' );
		}
		if ( $row->modified != $nullDate ) {
			$mod_date 		= mosFormatDate( $row->modified, '%A, %d %B %Y %H:%M', '0' );
		}
		
		$tabs = new mosTabs( 1 );
		// used to hide "Reset Hits" when hits = 0
		if ( !$row->hits ) {
			$visibility = "style='display: none; visibility: hidden;'";
		} else {
			$visibility = "";
		}

		mosCommonHTML::loadOverlib();
		mosCommonHTML::loadCalendar();
		?>
		<script language="javascript" type="text/javascript">
		var folderimages = new Array;
		<?php
		$i = 0;
		foreach ($images as $k=>$items) {
			foreach ($items as $v) {
				echo "folderimages[".$i++."] = new Array( '$k','".addslashes( $v->value )."','".addslashes( $v->text )."' );\t";
			}
		}
		?>
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			if ( pressbutton ==' resethits' ) {
				if (confirm('Etes vous certain de vouloir réintialiser le compteur de clics à zéro? \nLes changements non sauvegardés pour cet article seront perdus.')){
					submitform( pressbutton );
					return;
				} else {
					return;
				}
			}

			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == "" ) {
					alert( "Vous devez sélectionner un menu" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "Vous devez saisir un nom pour cet élément de menu" );
					return;
				}
			}

			var temp = new Array;
			for (var i=0, n=form.imagelist.options.length; i < n; i++) {
				temp[i] = form.imagelist.options[i].value;
			}
			form.images.value = temp.join( '\n' );

			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			if (trim(form.title.value) == ""){
				alert( "Vous devez donner un titre à l'\article" );
			} else if (trim(form.name.value) == ""){
				alert( "L\article doit avoir un nom" );
			} else {
				if ( form.reset_hits.checked ) {
					form.hits.value = 0;
				} else {
				}
				<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
				submitform( pressbutton );
			}
		}
		</script>

		<table class="adminheading">
		<tr>
			<th class="edit">
			Article statique:
			<small>
			<?php echo $row->id ? 'Editer' : 'Nouveau';?>
			</small>
			</th>
		</tr>
		</table>

		<form action="index2.php" method="post" name="adminForm">

		<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td width="60%" valign="top">
				<table class="adminform">
				<tr>
					<th colspan="3">
					Propri&eacute;t&eacute;s de l'Article
					</th>
				</tr>
				<tr>
					<td align="left">
					Titre:
					</td>
					<td>
					<input class="inputbox" type="text" name="title" size="30" maxlength="100" value="<?php echo $row->title; ?>" />
					</td>
				</tr>
				<tr>
					<td align="left">
					Alias de titre:					</td>
					<td>
					<input class="inputbox" type="text" name="title_alias" size="30" maxlength="100" value="<?php echo $row->title_alias; ?>" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="left" colspan="2">
					Texte: (obligatoire)<br />
					<?php
					// parameters : areaname, content, hidden field, width, height, rows, cols
					editorArea( 'editor1',  $row->introtext, 'introtext', '100%;', '500', '75', '50' );
					?>
					</td>
				</tr>
				</table>
			</td>
			<td width="40%" valign="top">
				<?php
				$tabs->startPane("content-pane");
				$tabs->startTab("Publication","publish-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Informations de Publication
					</th>
				</tr>
				<tr>
					<td valign="top" align="right" width="120">
					Statut:
					</td>
					<td>
					<?php echo $row->state > 0 ? 'Publié' : 'Non Publié'; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Publi&eacute;:
					</td>
					<td>
					<input type="checkbox" name="published" value="1" <?php echo $row->state ? 'checked="checked"' : ''; ?> />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Niveau d'acc&egrave;s:
					</td>
					<td>
					<?php echo $lists['access']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Alias de l'auteur:
					</td>
					<td>
					<input type="text" name="created_by_alias" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="inputbox" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
Changer l'auteur:					
</td>
					<td>
					<?php echo $lists['created_by']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
Modifier la date de cr&eacute;ation
</td>
					<td>
					<input class="inputbox" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $row->created; ?>" />
					<input name="reset" type="reset" class="button" onClick="return showCalendar('created', 'y-mm-dd');" value="...">
					</td>
				</tr>
				<tr>
					<td align="right">
D&eacute;but de publication:					
</td>
					<td>
					<input class="inputbox" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');">
					</td>
				</tr>
				<tr>
					<td align="right">
Fin de publication:					
</td>
					<td>
					<input class="inputbox" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');">
					</td>
				</tr>
				</table>
				<br />
				<table class="adminform" width="100%">
				<?php
				if ( $row->id ) {
					?>
					<tr>
						<td>
						<strong>ID de l'article:</strong>
						</td>
						<td>
						<?php echo $row->id; ?>
						</td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td width="120" valign="top" align="right">
					<strong>Statut</strong>
					</td>
					<td>
					<?php echo $row->state > 0 ? 'Publié' : ($row->state < 0 ? 'Archivé' : 'Non Publié');?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>Hits</strong>
					</td>
					<td>
					<?php echo $row->hits;?>
					<div <?php echo $visibility; ?>>
					<input name="reset_hits" type="button" class="button" value="R&eacute;initialiser le compteur de clics" onClick="submitbutton('resethits');">
					</div>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>R&eacute;vis&eacute;</strong>
					</td>
					<td>
					<?php echo $row->version;?> fois
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>Cr&eacute;&eacute; le </strong>
					</td>
					<td>
						<?php
						if ( !$create_date ) {
							?>
							Nouveau Document
							<?php
						} else {
							echo $create_date;
						}
						?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right"><strong>Derni&egrave;re modification le</strong></td>
					<td>
						<?php
						if ( !$mod_date ) {
							?>
							Non modifi&eacute;
							<?php
						} else {
							echo $mod_date;
							?>
							<br />
							<?php
							echo $row->modifier;
						}
						?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>Expiration</strong>
					</td>
					<td>
					<?php echo "$row->publish_down";?>
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Images","images-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">Insertion d'image avec MOSImage</th>
				</tr>
				<tr>
					<td colspan="2">
						<table width="100%">
						<tr>
							<td width="48%" valign="top">
								<div align="center">
									Galerie d'images:
									<br />
									<?php echo $lists['imagefiles'];?>
								</div>
							</td>
							<td width="2%">
								<input class="button" type="button" value=">>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" title="Add"/>
								<br/>
								<input class="button" type="button" value="<<" onclick="delSelectedFromList('adminForm','imagelist')" title="Remove"/>
							</td>
							<td width="48%">
								<div align="center">
									Images de l'article:
									<br />
									<?php echo $lists['imagelist'];?>
									<br />
									<input class="button" type="button" value="Haut" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,-1)" />
									<input class="button" type="button" value="Bas" onclick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,+1)" />
							  </div>
							</td>
						</tr>
						</table>
						Sous-répertoire: <?php echo $lists['folders'];?>
					</td>
				</tr>
				<tr valign="top">
					<td>
						<div align="center">Pr&eacute;visualisation de l'image:<br/>
							<img name="view_imagefiles" src="../images/M_images/blank.png" width="100" />
					  </div>
					</td>
					<td valign="top">
						<div align="center">Image active:<br/>
							<img name="view_imagelist" src="../images/M_images/blank.png" width="100" />
					  </div>
					</td>
				</tr>
				<tr>
					<td>
					Editer l'image s&eacute;lectionn&eacute;e:
					  <table>
					    <tr>
					      <td align="right">
					        Source
				          </td>
						  <td>
							    <input type="text" name= "_source" value="" />
					      </td>
					    </tr>
					    <tr>
					      <td align="right">Alignement de l'image</td>
							  <td>
							    <?php echo $lists['_align']; ?>
					      </td>
					    </tr>
					    <tr>
					      <td align="right">Texte alternatif (Alt)</td>
							  <td>
							    <input type="text" name="_alt" value="" />
					      </td>
					    </tr>
					    <tr>
					      <td align="right">
					        Bordure
				          </td>
							  <td>
							    <input type="text" name="_border" value="" size="3" maxlength="1" />
					      </td>
					    </tr>
					    <tr>
					      <td align="right">L&eacute;gende de l'image:				          </td>
							  <td>
							    <input class="text_area" type="text" name="_caption" value="" size="30" />
					      </td>
					    </tr>
					    <tr>
					      <td align="right">Position de la l&eacute;gende:				          </td>
							  <td>
							    <?php echo $lists['_caption_position']; ?>
					      </td>
					    </tr>
					    <tr>
					      <td align="right">Alignement de la l&eacute;gende:				          </td>
							  <td>
							    <?php echo $lists['_caption_align']; ?>
					      </td>
					    </tr>
					    <tr>
					      <td align="right">
					        Largeur:
				          </td>
							  <td>
							    <input class="text_area" type="text" name="_width" value="" size="5" maxlength="5" />
					      </td>
					    </tr>
					    <tr>
					      <td colspan="2">
					        <input class="button" type="button" value="Appliquer" onClick="applyImageProps()" />
				          </td>
					    </tr>
				      </table>
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Param&egrave;tres","params-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Param&egrave;tres d'affichage de l'article
					</th>
				</tr>
				<tr>
					<td>
					<?php echo $params->render();?>
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Metas","metadata-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Meta Donn&eacute;es
					</th>
				</tr>
				<tr>
					<td align="left">
					Description:<br />
					<textarea class="inputbox" cols="40" rows="5" name="metadesc" style="width:300px"><?php echo str_replace('&','&amp;',$row->metadesc); ?></textarea>
					</td>
				</tr>
				<tr>
					<td align="left">
					Mots cl&eacute;s:<br />
					<textarea class="inputbox" cols="40" rows="5" name="metakey" style="width:300px"><?php echo str_replace('&','&amp;',$row->metakey); ?></textarea>
				  </td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Liens","link-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Cr&eacute;er un lien vers l'article
					</th>
				</tr>
				<tr>
					<td colspan="2">
					Un lien de type 'Lien - Article statique' sera cr&eacute;&eacute; dans le menu s&eacute;lectionn&eacute;
					<br /><br />
					</td>
				</tr>
				<tr>
					<td valign="top" width="90px">
					S&eacute;lectionner un menu
				  </td>
					<td>
					<?php echo $lists['menuselect']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" width="90px">
					Nom du lien
					</td>
					<td>
					<input type="text" name="link_name" class="inputbox" value="" size="30" />
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
					<input name="menu_link" type="button" class="button" value="Cr&eacute;er le lien" onClick="submitbutton('menulink');" />
					</td>
				</tr>
				<tr>
					<th colspan="2">
					Liens existants
					</th>
				</tr>
				<?php
				if ( $menus == NULL ) {
					?>
					<tr>
						<td colspan="2">
						Aucun
						</td>
					</tr>
					<?php
				} else {
					mosCommonHTML::menuLinksContent( $menus );
				}
				?>
				<tr>
					<td colspan="2">
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->endPane();
				?>
			</td>
		</tr>
		</table>

		<input type="hidden" name="images" value="" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="hits" value="<?php echo $row->hits; ?>" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
	}
}
?>