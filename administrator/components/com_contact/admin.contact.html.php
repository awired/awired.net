<?php
/**
* @version $Id: admin.contact.html.php 5948 2006-12-06 22:42:31Z facedancer $
* @package Joomla
* @subpackage Contact
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
* @subpackage Contact
*/
class HTML_contact {

	function showContacts( &$rows, &$pageNav, $search, $option, &$lists ) {
		global $my;

		mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			Gestionnaire de contacts
			</th>
			<td>
			Filtre:
			</td>
			<td>
			<input type="text" name="search" value="<?php echo htmlspecialchars( $search );?>" class="inputbox" onChange="document.adminForm.submit();" />
			</td>
			<td width="right">
			<?php echo $lists['catid'];?>
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="20">
			#
			</th>
			<th width="20" class="title">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" />
			</th>
			<th class="title">
			Nom
			</th>
			<th width="5%" class="title" nowrap="nowrap">
			Publi&eacute;
			</th>
			<th colspan="2" nowrap="nowrap" width="5%">
			R&eacute;organiser
			</th>
			<th width="15%" align="left">
			Cat&eacute;gorie
			</th>
			<th class="title" nowrap="nowrap" width="15%">
			Li&eacute; &agrave; l'utilisateur
			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count($rows); $i < $n; $i++) {
			$row = $rows[$i];
			mosMakeHtmlSafe($row);
			$link 	= 'index2.php?option=com_contact&task=editA&hidemainmenu=1&id='. $row->id;

			$img 	= $row->published ? 'tick.png' : 'publish_x.png';
			$task 	= $row->published ? 'unpublish' : 'publish';
			$alt 	= $row->published ? 'Publi&eacute;' : 'D&eacute;publi&eacute;';

			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );

			$row->cat_link 	= 'index2.php?option=com_categories&section=com_contact_details&task=editA&hidemainmenu=1&id='. $row->catid;
			$row->user_link	= 'index2.php?option=com_users&task=editA&hidemainmenu=1&id='. $row->user_id;
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
					echo $row->name;
				} else {
					?>
					<a href="<?php echo $link; ?>" title="Editer le contact">
					<?php echo $row->name; ?>
					</a>
					<?php
				}
				?>
				</td>
				<td align="center">
				<a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')">
				<img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
				</a>
				</td>
				<td>
				<?php echo $pageNav->orderUpIcon( $i, ( $row->catid == @$rows[$i-1]->catid ) ); ?>
				</td>
				<td>
				<?php echo $pageNav->orderDownIcon( $i, $n, ( $row->catid == @$rows[$i+1]->catid ) ); ?>
				</td>
				<td>
				<a href="<?php echo $row->cat_link; ?>" title="Editer la cat&eacute;gorie">
				<?php echo $row->category; ?>
				</a>
				</td>
				<td>
				<a href="<?php echo $row->user_link; ?>" title="Editer l'utilisateur">
				<?php echo $row->user; ?>
				</a>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>

		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0">
		</form>
		<?php
	}


	function editContact( &$row, &$lists, $option, &$params ) {
		global $mosConfig_live_site;

		if ($row->image == '') {
			$row->image = 'blank.png';
		}

		$tabs = new mosTabs(0);

		mosMakeHtmlSafe( $row, ENT_QUOTES, 'misc' );
		?>
		<script language="javascript" type="text/javascript">
		<!--
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if ( form.name.value == "" ) {
				alert( "Vous devez donner un nom." );
			} else if ( form.catid.value == 0 ) {
				alert( "Merci de sélectionner un catégorie." );
			} else {
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			Contact:
			<small>
			<?php echo $row->id ? 'Editer' : 'Nouveau';?>
			</small>
			</th>
		</tr>
		</table>

		<table width="100%">
		<tr>
			<td width="60%" valign="top">
				<table width="100%" class="adminform">
				<tr>
					<th colspan="2">
					D&eacute;tails du contact
					</th>
				<tr>
				<tr>
					<td width="20%" align="right">
					Cat&eacute;gorie:
					</td>
					<td width="40%">
					<?php echo $lists['catid'];?>
					</td>
				</tr>
				<tr>
					<td width="20%" align="right">
					Li&eacute; &agrave; l'utilisateur:
					</td>
					<td >
					<?php echo $lists['user_id'];?>
					</td>
				</tr>
				<tr>
					<td width="20%" align="right">
					Nom:
					</td>
					<td >
					<input class="inputbox" type="text" name="name" size="50" maxlength="100" value="<?php echo $row->name; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Fonction:
					</td>
					<td>
					<input class="inputbox" type="text" name="con_position" size="50" maxlength="50" value="<?php echo $row->con_position; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Email:					</td>
					<td>
					<input class="inputbox" type="text" name="email_to" size="50" maxlength="100" value="<?php echo $row->email_to; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Adresse:
					</td>
					<td>
					<input class="inputbox" type="text" name="address" size="50" value="<?php echo $row->address; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					CP:
					</td>
					<td>
					<input class="inputbox" type="text" name="postcode" size="25" maxlength="10" value="<?php echo $row->postcode; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Ville:
					</td>
					<td>
					<input class="inputbox" type="text" name="suburb" size="50" maxlength="50" value="<?php echo $row->suburb;?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Etat:
					</td>
					<td>
					<input class="inputbox" type="text" name="state" size="50" maxlength="20" value="<?php echo $row->state;?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Pays:
					</td>
					<td>
					<input class="inputbox" type="text" name="country" size="50" maxlength="50" value="<?php echo $row->country;?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					T&eacute;l&eacute;phone:
					</td>
					<td>
					<input class="inputbox" type="text" name="telephone" size="25" maxlength="25" value="<?php echo $row->telephone; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right">
					Fax:
					</td>
					<td>
					<input class="inputbox" type="text" name="fax" size="25" maxlength="25" value="<?php echo $row->fax; ?>" />
					</td>
				</tr>
				<tr>
					<td align="right" valign="top">
					Autres Informations:
					</td>
					<td>
					<textarea name="misc" rows="5" cols="50" class="inputbox"><?php echo $row->misc; ?></textarea>
					</td>
				</tr>
				</table>
			</td>
			<td width="40%" valign="top">
				<?php
				$tabs->startPane("content-pane");
				$tabs->startTab("Publication","publish-page");
				?>
				<table width="100%" class="adminform">
				<tr>
					<th colspan="2">
					Information de publication
					</th>
				<tr>
				<tr>
					<td valign="top" align="right">
					Publi&eacute;:
					</td>
					<td>
					<?php echo $lists['published']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Ordre:
					</td>
					<td>
					<?php echo $lists['ordering']; ?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="right">
					Acc&egrave;s:
					</td>
					<td>
					<?php echo $lists['access']; ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;

					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Images","images-page");
				?>
				<table width="100%" class="adminform">
				<tr>
					<th colspan="2">
					Information sur l'image
					</th>
				<tr>
				<tr>
					<td align="left" width="20%">
					Image:
					</td>
					<td align="left">
					<?php echo $lists['image']; ?>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
					<script language="javascript" type="text/javascript">
					if (document.forms[0].image.options.value!=''){
						jsimg='../images/stories/' + getSelectedValue( 'adminForm', 'image' );
					} else {
						jsimg='../images/M_images/blank.png';
					}
					document.write('<img src=' + jsimg + ' name="imagelib" width="100" height="100" border="2" alt="Aper&ccedil;u" />');
					</script>
					</td>
				</tr>
				</table>
				<?php
				$tabs->endTab();
				$tabs->startTab("Param&egrave;tres","params-page");
				?>
				<table class="adminform">
				<tr>
					<th>
					Param&egrave;tres
					</th>
				</tr>
				<tr>
					<td>
					* Ces param&egrave;tres contr&ocirc;lent seulement ce que vous voyez lorsque vous cliquez pour visualiser un contact *
					<br />
					<br />
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
				$tabs->endPane();
				?>
			</td>
		</tr>
		</table>

		<script language="Javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
	}
}
?>