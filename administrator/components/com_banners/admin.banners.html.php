<?php
/**
* @version $Id: admin.banners.html.php 6070 2006-12-20 02:09:09Z robs $
* @package Joomla
* @subpackage Banners
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
* @subpackage Banners
*/
class HTML_banners {

	function showBanners( &$rows, &$pageNav, $option ) {
		global $my;

		mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			Gestionnaire de banni&egrave;res
			</th>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="20">
			#
			</th>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th align="left" nowrap="nowrap">
			Nom de la banni&egrave;re
			</th>
			<th width="10%" nowrap="nowrap">
			Publi&eacute;e
			</th>
			<th width="11%" nowrap="nowrap">
			Impressions effectu&eacute;es
			</th>
			<th width="11%" nowrap="nowrap">
			Impressions restantes
			</th>
			<th width="8%">
			Clics
			</th>
			<th width="8%" nowrap="nowrap">
			% Clics
			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);
			$row->id 	= $row->bid;
			$link 		= 'index2.php?option=com_banners&task=editA&hidemainmenu=1&id='. $row->id;

			$impleft 	= $row->imptotal - $row->impmade;
			if( $impleft < 0 ) {
				$impleft 	= "unlimited";
			}

			if ( $row->impmade != 0 ) {
				$percentClicks = substr(100 * $row->clicks/$row->impmade, 0, 5);
			} else {
				$percentClicks = 0;
			}

			$task 	= $row->showBanner ? 'unpublish' : 'publish';
			$img 	= $row->showBanner ? 'publish_g.png' : 'publish_x.png';
			$alt 	= $row->showBanner ? 'Publi�' : 'Non Publi�';

			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td align="center">
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td align="center">
				<?php echo $checked; ?>
				</td>
				<td align="left">
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->name;
				} else {
					?>
					<a href="<?php echo $link; ?>" title="Editer banni&egrave;re">
					<?php echo $row->name; ?>
					</a>
					<?php
				}
				?>
				</td>
				<td align="center">
				<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')">
				<img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="<?php echo $alt; ?>" />
				</a>
				</td>
				<td align="center">
				<?php echo $row->impmade;?>
				</td>
				<td align="center">
				<?php echo $impleft;?>
				</td>
				<td align="center">
				<?php echo $row->clicks;?>
				</td>
				<td align="center">
				<?php echo $percentClicks;?>
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
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function bannerForm( &$_row, &$lists, $_option ) {
		mosMakeHtmlSafe( $_row, ENT_QUOTES, 'custombannercode' );
		?>
		<script language="javascript" type="text/javascript">
		<!--
		function changeDisplayImage() {
			if (document.adminForm.imageurl.value !='') {
				document.adminForm.imagelib.src='../images/banners/' + document.adminForm.imageurl.value;
			} else {
				document.adminForm.imagelib.src='images/blank.png';
			}
		}
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			// do field validation
			if (form.name.value == "") {
				alert( "Vous devez saisir un nom de banni�re." );
			} else if (getSelectedValue('adminForm','cid') < 1) {
				alert( "Vous devez s�lectionner un nom de client." );
			} else if (!getSelectedValue('adminForm','imageurl')) {
				alert( "Vous devez s�lectionner une image." );
			} else if (form.clickurl.value == "") {
				alert( "Vous devez renseigner l\'URL de la banni�re." );
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
			Banni&egrave;re:
			<small>
			<?php echo $_row->cid ? 'Editer' : 'Nouveau';?>
			</small>
			</th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<th colspan="2">
			D&eacute;tails
			</th>
		</tr>
		<tr>
			<td width="20%">
			Nom de la banni&egrave;re:
			</td>
			<td width="80%">
			<input class="inputbox" type="text" name="name" value="<?php echo $_row->name;?>" />
			</td>
		</tr>
		<tr>
			<td>
			Nom du Client:
			</td>
			<td align="left">
			<?php echo $lists['cid']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Impressions achet&eacute;es:
			</td>
			<?php
			$unlimited = '';
			if ($_row->imptotal == 0) {
				$unlimited = 'checked="checked"';
				$_row->imptotal = '';
			}
			?>
			<td>
			<input class="inputbox" type="text" name="imptotal" size="12" maxlength="11" value="<?php echo $_row->imptotal;?>" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			Illimit&eacute;es 
			<input type="checkbox" name="unlimited" <?php echo $unlimited;?> />
			</td>
		</tr>
		<tr>
			<td>
			Afficher la banni&egrave;re :
			</td>
			<td>
			<?php echo $lists['showBanner']; ?>
			</td>
		</tr>
		<tr>
			<td>
			 URL du lien:			</td>
			<td>
			<input class="inputbox" type="text" name="clickurl" size="100" maxlength="200" value="<?php echo $_row->clickurl;?>" />
			</td>
		</tr>
		<tr >
			<td valign="top" align="right">
			Nombre de Clics
			</td>
			<td colspan="2">
			<?php echo $_row->clicks;?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input name="reset_hits" type="button" class="button" value="R�initialiser le compteur de clics" onclick="submitbutton('resethits');" />
			</td>
		</tr>
		<tr>
			<td valign="top">
			Code personnalis&eacute; de banni&egrave;re :
			</td>
			<td>
			<textarea class="inputbox" cols="70" rows="5" name="custombannercode"><?php echo $_row->custombannercode;?></textarea>
			</td>
		</tr>
		<tr>
			<td valign="top">
			S&eacute;lecteur d'image de banni&egrave;res:
			</td>
			<td align="left">
			<?php echo $lists['imageurl']; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">
			Image de banni&egrave;re:
			</td>
			<td valign="top">
			<?php
			if (eregi("swf", $_row->imageurl)) {
				?>
				<img src="images/blank.png" name="imagelib">
				<?php
			} elseif (eregi("gif|jpg|png", $_row->imageurl)) {
				?>
				<img src="../images/banners/<?php echo $_row->imageurl; ?>" name="imagelib" />
				<?php
			} else {
				?>
				<img src="images/blank.png" name="imagelib" />
				<?php
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
			</td>
		</tr>
		</table>

		<input type="hidden" name="option" value="<?php echo $_option; ?>" />
		<input type="hidden" name="bid" value="<?php echo $_row->bid; ?>" />
		<input type="hidden" name="clicks" value="<?php echo $_row->clicks; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="impmade" value="<?php echo $_row->impmade; ?>" />
		</form>
		<?php
	}
}

/**
* Banner clients
* @package Joomla
*/
class HTML_bannerClient {

	function showClients( &$rows, &$pageNav, $option ) {
		global $my;

		mosCommonHTML::loadOverlib();
		?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			Gestionnaire de clients
			</th>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="20">
			#
			</th>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th align="left" nowrap="nowrap">
			Nom du client			</th>
			<th align="left" nowrap="nowrap">
			Contact
			</th>
			<th align="center" nowrap="nowrap">
			Nb. de banni&egrave;res actives
			</th>
			<th align="center" nowrap="nowrap">
			Client ID
			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);
			$row->id 	= $row->cid;
			$link 		= 'index2.php?option=com_banners&task=editclientA&hidemainmenu=1&id='. $row->id;

			$checked 	= mosCommonHTML::CheckedOutProcessing( $row, $i );
			?>
			<tr class="<?php echo "row$k"; ?>">
				<td width="20" align="center">
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td width="20">
				<?php echo $checked; ?>
				</td>
				<td width="35%">
				<?php
				if ( $row->checked_out && ( $row->checked_out != $my->id ) ) {
					echo $row->name;
				} else {
					?>
					<a href="<?php echo $link; ?>" title="Edit Banner Client">
					<?php echo $row->name; ?>
					</a>
					<?php
				}
				?>
				</td>
				<td width="35%">
				<?php echo $row->contact;?>
				</td>
				<td width="15%" align="center">
				<?php echo $row->bid;?>
				</td>
				<td width="15%" align="center">
				<?php echo $row->cid; ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="listclients" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		</form>
		<?php
	}

	function bannerClientForm( &$row, $option ) {
		mosMakeHtmlSafe( $row, ENT_QUOTES, 'extrainfo' );
		?>
		<script language="javascript" type="text/javascript">
		<!--
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancelclient') {
				submitform( pressbutton );
				return;
			}
			// do field validation
			if (form.name.value == "") {
				alert( "Vous devez saisir un nom de client." );
			} else if (form.contact.value == "") {
				alert( "Vous devez un nom de contact." );
			} else if (form.email.value == "") {
				alert( "Vous devez saisir l\'email du contact." );
			} else {
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		<table class="adminheading">
		<tr>
			<th>Client de banni&egrave;res:
			<small>
			<?php echo $row->cid ? 'Editer' : 'Nouveau';?>
			</small>
			</th>
		</tr>
		</table>

		<form action="index2.php" method="post" name="adminForm">
		<table class="adminform">
		<tr>
			<th colspan="2">
			D&eacute;tails
			</th>
		</tr>
		<tr>
			<td width="10%">
			Nom du Client:
			</td>
			<td>
			<input class="inputbox" type="text" name="name" size="30" maxlength="60" valign="top" value="<?php echo $row->name; ?>" />
			</td>
		</tr>
		<tr>
			<td width="10%">
			Nom du Contact:			</td>
			<td>
			<input class="inputbox" type="text" name="contact" size="30" maxlength="60" value="<?php echo $row->contact; ?>" />
			</td>
		</tr>
		<tr>
			<td width="10%">
			Email du Contact:			</td>
			<td>
			<input class="inputbox" type="text" name="email" size="30" maxlength="60" value="<?php echo $row->email; ?>" />
			</td>
		</tr>
		<tr>
			<td valign="top">
			Informations Suppl&eacute;mentaires:			</td>
			<td>
			<textarea class="inputbox" name="extrainfo" cols="60" rows="10"><?php echo str_replace('&','&amp;',$row->extrainfo);?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="3">
			</td>
		</tr>
		</table>

		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="cid" value="<?php echo $row->cid; ?>" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
	}
}
?>