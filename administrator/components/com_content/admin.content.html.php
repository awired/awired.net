<?php
/**
* @version $Id: admin.content.html.php 6070 2006-12-20 02:09:09Z robs $
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
class HTML_content {

	/**
	* Writes a list of the content items
	* @param array An array of content objects
	*/
	function showContent( &$rows, $section, &$lists, $search, $pageNav, $all=NULL, $redirect ) {
		global $my, $acl, $database, $mosConfig_offset;

		mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php?option=com_content" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="edit" rowspan="2" nowrap="nowrap">
			<?php
			if ( $all ) {
				?>
				Gestion des articles <small><small>[ Section: Tous ]</small></small>
				<?php
			} else {
				?>
				Gestion des articles <small><small>[ Section: <?php echo $section->title; ?> ]</small></small>
				<?php
			}
			?>
			</th>
			<?php
			if ( $all ) {
				?>
				<td align="right" rowspan="2" valign="top">
				<?php echo $lists['sectionid'];?>
				</td>
				<?php
			}
			?>
			<td align="right" valign="top">
			<?php echo $lists['catid'];?>
			</td>
			<td valign="top">
			<?php echo $lists['authorid'];?>
			</td>
		</tr>
		<tr>
			<td align="right">
			Filtre:
			</td>
			<td>
			<input type="text" name="search" value="<?php echo htmlspecialchars( $search );?>" class="text_area" onChange="document.adminForm.submit();" />
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="5">
			#
			</th>
			<th width="5">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			Titre
			</th>
			<th width="5%">
			Publi&eacute;
			</th>
			<th nowrap="nowrap" width="5%">
			Page d'accueil
			</th>
			<th colspan="2" align="center" width="5%">
			R&eacute;organiser
			</th>
			<th width="2%">
			Trier
			</th>
			<th width="1%">
			<a href="javascript: saveorder( <?php echo count( $rows )-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Sauver Tri" /></a>
			</th>
			<th >
			Acc&egrave;s
			</th>
			<th width="2%">
			ID
			</th>
			<?php
			if ( $all ) {
				?>
				<th align="left">
				Section
				</th>
				<?php
			}
			?>
			<th align="left">
			Cat&eacute;gorie
			</th>
			<th align="left">
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

			$link 	= 'index2.php?option=com_content&sectionid='. $redirect .'&task=edit&hidemainmenu=1&id='. $row->id;

			$row->sect_link = 'index2.php?option=com_sections&task=editA&hidemainmenu=1&id='. $row->sectionid;
			$row->cat_link 	= 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='. $row->catid;

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

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
					$author = '<a href="'. $linkA .'" title="Editer l\'utilisateur">'. $row->author .'</a>';
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->author;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );

			$access 	= mosCommonHTML::AccessProcessing( $row, $i );
			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td align="center">
				<?php echo $checked; ?>
				</td>
				<td>
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id )) {
					echo $row->title;
				} else {
					?>
					<a href="<?php echo $link; ?>" title="Editer Article">
					<?php echo $row->title; ?>
					</a>
					<?php
				}
				?>
				</td>
				<?php
				if ( $times ) {
					?>
					<td align="center">
					<a href="javascript: void(0);" onMouseOver="return overlib('<table><?php echo $times; ?></table>', CAPTION, 'Informations de publication', BELOW, RIGHT);" onMouseOut="return nd();" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? "unpublish" : "publish";?>')">
					<img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
					</a>
					</td>
					<?php
				}
				?>
				<td align="center">
				<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','toggle_frontpage')">
				<img src="images/<?php echo ( $row->frontpage ) ? 'tick.png' : 'publish_x.png';?>" width="12" height="12" border="0" alt="<?php echo ( $row->frontpage ) ? 'Oui' : 'Non';?>" />
				</a>
				</td>
				<td align="right">
				<?php echo $pageNav->orderUpIcon( $i, ($row->catid == @$rows[$i-1]->catid) ); ?>
				</td>
				<td align="left">
				<?php echo $pageNav->orderDownIcon( $i, $n, ($row->catid == @$rows[$i+1]->catid) ); ?>
				</td>
				<td align="center" colspan="2">
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="text_area" style="text-align: center" />
				</td>
				<td align="center">
				<?php echo $access;?>
				</td>
				<td align="left">
				<?php echo $row->id; ?>
				</td>
				<?php
				if ( $all ) {
					?>
					<td align="left">
					<a href="<?php echo $row->sect_link; ?>" title="Editer la section">
					<?php echo $row->section_name; ?>
					</a>
					</td>
					<?php
				}
				?>
				<td align="left">
				<a href="<?php echo $row->cat_link; ?>" title="Editer la cat&eacute;gorie">
				<?php echo $row->name; ?>
				</a>
				</td>
				<td align="left">
				<?php echo $author; ?>
				</td>
				<td align="left">
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

		<input type="hidden" name="option" value="com_content" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		</form>
		<?php
	}


	/**
	* Writes a list of the content items
	* @param array An array of content objects
	*/
	function showArchive( &$rows, $section, &$lists, $search, $pageNav, $option, $all=NULL, $redirect ) {
		global $my, $acl;

		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			if (pressbutton == 'remove') {
				if (document.adminForm.boxchecked.value == 0) {
					alert('Sélectionner un article à mettre à la corbeille');
				} else if ( confirm('Etes vous sûr de vouloir supprimer cet article? \nLes articles ne seront pas supprimés définitivement.')) {
					submitform('remove');
				}
			} else {
				submitform(pressbutton);
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">

		<table class="adminheading">
		<tr>
			<th class="edit" rowspan="2">
			<?php
			if ( $all ) {
				?>
				Gestion des Archives <small><small>[ Section: Tous ]</small></small>
				<?php
			} else {
				?>
				Gestion des Archives<small><small>[ Section: <?php echo $section->title; ?> ]</small></small>
				<?php
			}
			?>
			</th>
			<?php
			if ( $all ) {
				?>
				<td align="right" rowspan="2" valign="top">
				<?php echo $lists['sectionid'];?>
				</td>
				<?php
			}
			?>
			<td align="right" valign="top">
			<?php echo $lists['catid'];?>
			</td>
			<td valign="top">
			<?php echo $lists['authorid'];?>
			</td>
		</tr>
		<tr>
			<td align="right">
			Filtre:
			</td>
			<td>
			<input type="text" name="search" value="<?php echo htmlspecialchars( $search );?>" class="text_area" onChange="document.adminForm.submit();" />
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="5">
			#
			</th>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title">
			Titre
			</th>
			<th width="2%">
			Trier
			</th>
			<th width="1%">
			<a href="javascript: saveorder( <?php echo count( $rows )-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Sauver Tri" /></a>
			</th>
			<th width="15%" align="left">
			Cat&eacute;gorie
			</th>
			<th width="15%" align="left">
			Auteur
			</th>
			<th align="center" width="10">
			Date
			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];

			$row->cat_link 	= 'index2.php?option=com_categories&task=editA&hidemainmenu=1&id='. $row->catid;

			if ( $acl->acl_check( 'administration', 'manage', 'users', $my->usertype, 'components', 'com_users' ) ) {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$linkA 	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->created_by;
					$author = '<a href="'. $linkA .'" title="Editer Utilisateur">'. $row->author .'</a>';
				}
			} else {
				if ( $row->created_by_alias ) {
					$author = $row->created_by_alias;
				} else {
					$author = $row->author;
				}
			}

			$date = mosFormatDate( $row->created, '%x' );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td width="20">
				<?php echo mosHTML::idBox( $i, $row->id ); ?>
				</td>
				<td>
				<?php echo $row->title; ?>
				</td>
				<td align="center" colspan="2">
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="text_area" style="text-align: center" />
				</td>
				<td>
				<a href="<?php echo $row->cat_link; ?>" title="Edit Category">
				<?php echo $row->name; ?>
				</a>
				</td>
				<td>
				<?php echo $author; ?>
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

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $section->id;?>" />
		<input type="hidden" name="task" value="showarchive" />
		<input type="hidden" name="returntask" value="showarchive" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		</form>
		<?php
	}


	/**
	* Writes the edit form for new and existing content item
	*
	* A new record is defined when <var>$row</var> is passed with the <var>id</var>
	* property set to 0.
	* @param mosContent The category object
	* @param string The html for the groups select list
	*/
	function editContent( &$row, $section, &$lists, &$sectioncategories, &$images, &$params, $option, $redirect, &$menus ) {
		global $database;

		mosMakeHtmlSafe( $row );

		$nullDate 		= $database->getNullDate();
		$create_date = null;
		
		if ( $row->created != $nullDate ) {
			$create_date 	= mosFormatDate( $row->created, '%A, %d %B %Y %H:%M', '0' );
		}
		$mod_date = null;
		if ( $row->modified != $nullDate ) {
			$mod_date 		= mosFormatDate( $row->modified, '%A, %d %B %Y %H:%M', '0' );
		}
		
		$tabs = new mosTabs(1);

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
		<!--
		var sectioncategories = new Array;
		<?php
		$i = 0;
		foreach ($sectioncategories as $k=>$items) {
			foreach ($items as $v) {
				echo "sectioncategories[".$i++."] = new Array( '$k','".addslashes( $v->id )."','".addslashes( $v->name )."' );\t";
			}
		}
		?>

		var folderimages = new Array;
		<?php
		$i = 0;
		foreach ($images as $k=>$items) {
			foreach ($items as $v) {
				echo "folderimages[".$i++."] = new Array( '$k','".addslashes( ampReplace( $v->value ) )."','".addslashes( ampReplace( $v->text ) )."' );\t";
			}
		}
		?>

		function submitbutton(pressbutton) {
			var form = document.adminForm;

			if ( pressbutton == 'menulink' ) {
				if ( form.menuselect.value == "" ) {
					alert( "Veuillez sélectionner un menu" );
					return;
				} else if ( form.link_name.value == "" ) {
					alert( "Veuillez donner un nom à ce lien" );
					return;
				}
			}

			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			// assemble the images back into one field
			var temp = new Array;
			for (var i=0, n=form.imagelist.options.length; i < n; i++) {
				temp[i] = form.imagelist.options[i].value;
			}
			form.images.value = temp.join( '\n' );

			// do field validation
			if (form.title.value == ""){
				alert( "Cet article doit avoir un titre" );
			} else if (form.sectionid.value == "-1"){
				alert( "Vous devez sélectionner une section." );
			} else if (form.catid.value == "-1"){
				alert( "Vous devez sélectionner une catégorie." );
 			} else if (form.catid.value == ""){
 				alert( "Vous devez sélectionner une catégorie." );
			} else {
				<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
				<?php getEditorContents( 'editor2', 'fulltext' ) ; ?>
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="edit">
			Article:
			<small>
			<?php echo $row->id ? 'Editer' : 'Nouveau';?>
			</small>
			<?php
			if ( $row->id ) {
				?>
				<small><small>
				[ Section: <?php echo $section; ?> ]
				</small></small>
				<?php
			}
			?>
			</th>
		</tr>
		</table>

		<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="60%" valign="top">
				<table width="100%" class="adminform">
				<tr>
					<td width="100%">
						<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<th colspan="4">
							Détails de l'article
							</th>
						<tr>
						<tr>
							<td>
							Titre:
							</td>
							<td>
							<input class="text_area" type="text" name="title" size="30" maxlength="100" value="<?php echo $row->title; ?>" />
							</td>
							<td>
							Section:
							</td>
							<td>
							<?php echo $lists['sectionid']; ?>
							</td>
						</tr>
						<tr>
							<td>
							Alias du titre:
							</td>
							<td>
							<input name="title_alias" type="text" class="text_area" id="title_alias" value="<?php echo $row->title_alias; ?>" size="30" maxlength="100" />
							</td>
							<td>
							Catégorie:
							</td>
							<td>
							<?php echo $lists['catid']; ?>
							</td>
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="100%">
					Texte d'introduction: (obligatoire)
					<br /><?php
					// parameters : areaname, content, hidden field, width, height, rows, cols
					editorArea( 'editor1',  $row->introtext , 'introtext', '100%;', '350', '75', '20' ) ; ?>
					</td>
				</tr>
				<tr>
					<td width="100%">
					Texte principal: (facultatif)
					<br /><?php
					// parameters : areaname, content, hidden field, width, height, rows, cols
					editorArea( 'editor2',  $row->fulltext , 'fulltext', '100%;', '400', '75', '30' ) ; ?>
					</td>
				</tr>
				</table>
			</td>
			<td valign="top" width="40%">
				<?php
				$tabs->startPane("content-pane");
				$tabs->startTab("Publication","publish-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Information de publication
					</th>
				<tr>
				<tr>
					<td valign="top" align="right" width="120">
					Afficher en page d'acueil:
					</td>
					<td>
					<input type="checkbox" name="frontpage" value="1" <?php echo $row->frontpage ? 'checked="checked"' : ''; ?> />
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
					<input type="text" name="created_by_alias" size="30" maxlength="100" value="<?php echo $row->created_by_alias; ?>" class="text_area" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Changer le créateur:
					</td>
					<td>
					<?php echo $lists['created_by']; ?> 
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">Ordre:</td>
					<td>
					<?php echo $lists['ordering']; ?> 
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Date de création
					</td>
					<td>
					<input class="text_area" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $row->created; ?>" />
					<input name="reset" type="reset" class="button" onclick="return showCalendar('created', 'y-mm-dd');" value="..." />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Début de publication:
					</td>
					<td>
					<input class="text_area" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');" />
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Fin de publication:
					</td>
					<td>
					<input class="text_area" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
					<input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');" />
					</td>
				</tr>
				</table>
				<br />
				<table class="adminform">
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
					<strong>Etat:</strong>
					</td>
					<td>
					<?php echo $row->state > 0 ? 'Publié' : ($row->state < 0 ? 'Archived' : 'Brouillon non publié');?>
					</td>
				</tr>
				<tr >
					<td valign="top" align="right">
					<strong>
					Clics
					</strong>:
					</td>
					<td>
					<?php echo $row->hits;?>
					<div <?php echo $visibility; ?>>
					<input name="reset_hits" type="button" class="button" value="Réintialiser le compteur de clics" onclick="submitbutton('resethits');" />
					</div>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>
					R&eacute;vis&eacute;
					</strong>:
					</td>
					<td>
					<?php echo $row->version;?> fois
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>
					Cr&eacute;&eacute;
					</strong>
					</td>
					<td>
						<?php
						if ( !$create_date ) {
							?>
							Nouveau document
							<?php
						} else {
							echo $create_date;
						}
						?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					<strong>
					Derni&egrave;re modification
					</strong>
					</td>
					<td>
						<?php
						if ( !$mod_date ) {
							?>
							Non modifié
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
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Images","images-page");
				?>
				<table class="adminform" width="100%">
				<tr>
					<th colspan="2">
						Insertion d'image avec MOSImage
					</th>
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
								<input class="button" type="button" value=">>" onclick="addSelectedToList('adminForm','imagefiles','imagelist')" title="Ajouter"/>
								<br/>
								<input class="button" type="button" value="<<" onclick="delSelectedFromList('adminForm','imagelist')" title="Enlever"/>
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
						<div align="center">
							Prévisualisation de l'image:<br/>
							<img name="view_imagefiles" src="../images/M_images/blank.png" alt="Image Exemple" width="100" />
						</div>
					</td>
					<td valign="top">
						<div align="center">
							Image active:<br/>
							<img name="view_imagelist" src="../images/M_images/blank.png"alt="Image Active" width="100" />
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Editer l'image sélectionnée:
						<table>
						<tr>
							<td align="right">
							Source:
							</td>
							<td>
							<input class="text_area" type="text" name= "_source" value="" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Alignement de l'image:
							</td>
							<td>
							<?php echo $lists['_align']; ?>
							</td>
						</tr>
						<tr>
							<td align="right">
							Texte alternatif (Alt):
							</td>
							<td>
							<input class="text_area" type="text" name="_alt" value="" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Bordure:
							</td>
							<td>
							<input class="text_area" type="text" name="_border" value="" size="3" maxlength="1" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Légende de l'image:
							</td>
							<td>
							<input class="text_area" type="text" name="_caption" value="" size="30" />
							</td>
						</tr>
						<tr>
							<td align="right">
							Position de la légende:
							</td>
							<td>
							<?php echo $lists['_caption_position']; ?>
							</td>
						</tr>
						<tr>
							<td align="right">
							Alignement de la légende:
							</td>
							<td>
							<?php echo $lists['_caption_align']; ?>
							</td>
						</tr>
						<tr>
							<td align="right">
							Largeur de la légende:
							</td>
							<td>
							<input class="text_area" type="text" name="_width" value="" size="5" maxlength="5" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
							<input class="button" type="button" value="Appliquer" onclick="applyImageProps()" />
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Paramètres","params-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Paramètres d'affichage de l'article
					</th>
				<tr>
				<tr>
					<td>
					* Ces paramètres ne s'appliquent que lorsque l'article est vu en entier *
					<br /><br />
					</td>
				</tr>
				<tr>
					<td>
					<?php echo $params->render();?>
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Meta Info","metadata-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Métadonnées
					</th>
				<tr>
				<tr>
					<td>
					Description:
					<br />
					<textarea class="text_area" cols="30" rows="3" style="width:350px; height:50px" name="metadesc" ><?php echo str_replace('&','&amp;',$row->metadesc); ?></textarea>
					</td>
				</tr>
					<tr>
					<td>
					Mots clés:
					<br />
					<textarea class="text_area" cols="30" rows="3" style="width:350px; height:50px" name="metakey"><?php echo str_replace('&','&amp;',$row->metakey); ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
					<input type="button" class="button" value="Ajouter Sect/Cat/Titre" onclick="f=document.adminForm;f.metakey.value=document.adminForm.sectionid.options[document.adminForm.sectionid.selectedIndex].text+', '+getSelectedText('adminForm','catid')+', '+f.title.value+f.metakey.value;" />
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Créer un lien","link-page");
				?>
				<table class="adminform">
				<tr>
					<th colspan="2">
					Créer un lien vers l'article
					</th>
				</tr>
				<tr>
					<td colspan="2">
					Un lien de type 'Lien - Article' sera créé dans le menu sélectionné
					<br /><br />
					</td>
				</tr>
				<tr>
					<td valign="top" width="90">
					Sélectionner un menu
					</td>
					<td>
					<?php echo $lists['menuselect']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" width="90">
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
					<input name="menu_link" type="button" class="button" value="Créer le lien" onclick="submitbutton('menulink');" />
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

		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
		<input type="hidden" name="mask" value="0" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="images" value="" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php

	}


	/**
	* Form to select Section/Category to move item(s) to
	* @param array An array of selected objects
	* @param int The current section we are looking at
	* @param array The list of sections and categories to move to
	*/
	function moveSection( $cid, $sectCatList, $option, $sectionid, $items ) {
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "Veuillez sélectionner un article à déplacer" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>

		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="edit">
			Déplacer un article
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>
			<td align="left" valign="top" width="40%">
			<strong>D&eacute;placer vers Section/Cat&eacute;gorie:</strong>
			<br />
			<?php echo $sectCatList; ?>
			<br /><br />
			</td>
			<td align="left" valign="top">
			<strong>Articles &agrave; d&eacute;placer :</strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->title ."</li>";
			}
			echo "</ol>";
			?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach ($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}



	/**
	* Form to select Section/Category to copys item(s) to
	*/
	function copySection( $option, $cid, $sectCatList, $sectionid, $items  ) {
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (!getSelectedValue( 'adminForm', 'sectcat' )) {
				alert( "Veuillez sélectionner une Section/Catégorie de destination" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
		<form action="index2.php" method="post" name="adminForm">
		<br />
		<table class="adminheading">
		<tr>
			<th class="edit">
			Copier des articles
			</th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>
			<td align="left" valign="top" width="40%">
			<strong>Copier vers Section/Catégorie:</strong>
			<br />
			<?php echo $sectCatList; ?>
			<br /><br />
			</td>
			<td align="left" valign="top">
			<strong>Articles à copier:</strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->title ."</li>";
			}
			echo "</ol>";
			?>
			</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" />
		<input type="hidden" name="task" value="" />
		<?php
		foreach ($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}
}
?>
