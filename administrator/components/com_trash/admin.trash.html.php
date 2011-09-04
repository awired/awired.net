<?php
/**
* @version $Id: admin.trash.html.php 5830 2006-11-21 18:59:45Z Saka $
* @package Joomla
* @subpackage Trash
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
* HTML class for all trash component output
* @package Joomla
* @subpackage Trash
*/
class HTML_trash {
	/**
	* Writes a list of the Trash items
	*/
	function showList( $option, $content, $pageNav, $list, $catid ) {
		global $my;
		?>
		<script language="javascript" type="text/javascript">
		/**
		* Toggles the check state of a group of boxes
		*
		* Checkboxes must have an id attribute in the form cb0, cb1...
		* @param The number of box to 'check'
		*/
		function checkAll_xtd ( n ) {
			var f = document.adminForm;
			var c = f.toggle1.checked;
			var n2 = 0;
			for ( i=0; i < n; i++ ) {
				cb = eval( 'f.cb1' + i );
				if (cb) {
					cb.checked = c;
					n2++;
				}
			}
			if (c) {
				document.adminForm.boxchecked.value = n2;
			} else {
				document.adminForm.boxchecked.value = 0;
			}
		}
		</script>
		<form action="index2.php?option=com_trash" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="trash">Gestionnaire de Corbeille</th>
			<td width="right">
				<?php echo $list; ?>
			</td>
		</tr>
		</table>

		<table class="adminlist" width="90%">
		<tr>
			<th width="20">#</th>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $content );?>);" />
			</th>
			<th width="20px">&nbsp;</th>
			<th class="title">
			Titre
			</th>
			<th>
			<?php echo ($catid=="content") ? "Section" : "Menu"; ?>
			</th>
			<th>
			<?php echo ($catid=="content") ? "Cat&eacute;gorie" : "Type"; ?>
			</th>
			<th width="70px">
			ID
			</th>
		</tr>
		<?php
		$k = 0;
		$i = 0;
		$n = count( $content );

		foreach ( $content as $row ) {
			?>
			<tr class="<?php echo "row". $k; ?>">
				<td align="center" width="30px">
				<?php echo $i + 1 + $pageNav->limitstart;?>
				</td>
				<td width="20px" align="center"><?php
				if ($catid=="content") {
					echo mosHTML::idBox( $i, $row->id );
				} else {
					echo "<input type=\"checkbox\" id=\"cb$i\" name=\"mid[]\" value=\"$row->id\" onclick=\"isChecked(this.checked);\" />";
				}
				?></td>
				<td width="20px"></td>
				<td nowrap="nowrap">
				<?php
				echo $row->title;
				?>
				</td>
				<td align="center" width="20%">
				<?php
				echo $row->sectname;
				?>
				</td>
				<td align="center" width="20%">
				<?php
				echo $row->catname;
				?>
				</td>
				<td align="center">
				<?php
				echo $row->id;
				?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
			$i++;
		}
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>

		<input type="hidden" name="option" value="com_trash" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		</form>
		<?php
	}


	/**
	* A delete confirmation page
	* Writes list of the items that have been selected for deletion
	*/
	function showDelete( $option, $cid, $items, $type ) {
	?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>Supprimer les &eacute;l&eacute;ments </th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>
			<td width="3%"></td>
			<td align="left" valign="top" width="20%">
			<strong>Nombre d'&eacute;l&eacute;ments :</strong>
			<br />
			<font color="#000066"><strong><?php echo count( $cid ); ?></strong></font>
			<br /><br />
			</td>
			<td align="left" valign="top" width="25%">
			<strong>El&eacute;ment &agrave; supprimer :</strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->name ."</li>";
			}
			echo "</ol>";
			?>
			</td>
			 <td valign="top">
			* Ces &eacute;l&eacute;ments seront <strong><font color="#FF0000">supprim&eacute;s d&eacute;finitivement</font></strong>
			de la base *
			<br />
			<br /><br />
			<div style="border: 1px dotted gray; width: 70px; padding: 10px; margin-left: 50px;">
			<a class="toolbar" href="javascript:if (confirm('Etes vous s�r de vouloir supprimer ces �l�ments? \nCes �l�ments seront supprim�s d�finitivement de la base.')){ submitbutton('delete');}" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('remove','','images/delete_f2.png',1);">
			<img name="remove" src="images/delete.png" alt="Supprimer" border="0" align="middle" />
			Supprimer
			</a>
			</div>
		  </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="1" />
		<input type="hidden" name="type" value="<?php echo $type; ?>" />
		<?php
		foreach ($cid as $id) {
			echo "\n<input type=\"hidden\" name=\"cid[]\" value=\"$id\" />";
		}
		?>
		</form>
		<?php
	}


	/**
	* A restore confirmation page
	* Writes list of the items that have been selected for restore
	*/
	function showRestore( $option, $cid, $items, $type ) {
	?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>Restaurer les &eacute;l&eacute;ments </th>
		</tr>
		</table>

		<br />
		<table class="adminform">
		<tr>
			<td width="3%"></td>
			<td align="left" valign="top" width="20%">
			<strong>Nombre d'&eacute;l&eacute;ments :</strong>
			<br />
			<font color="#000066"><strong><?php echo count( $cid ); ?></strong></font>
			<br /><br />
			</td>
			<td align="left" valign="top" width="25%">
			<strong>El&eacute;ment &agrave; restaurer :</strong>
			<br />
			<?php
			echo "<ol>";
			foreach ( $items as $item ) {
				echo "<li>". $item->name ."</li>";
			}
			echo "</ol>";
			?>
			</td>
			 <td valign="top">
			* Ceci <strong><font color="#FF0000">restaurera</font></strong> ces &eacute;l&eacute;ments &agrave; leur emplacement d'origine comme non publi&eacute;s*
			<br />
			<br /><br />
			<div style="border: 1px dotted gray; width: 80px; padding: 10px; margin-left: 50px;">
			<a class="toolbar" href="javascript:if (confirm('Etes vous certain de vouloir restaurer les �l�ments list�s?.')){ submitbutton('restore');}" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('restore','','images/restore_f2.png',1);">
			<img name="restore" src="images/restore.png" alt="Restaurer" border="0" align="middle" />
			Restaurer
			</a>
			</div>
		  </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		</table>
		<br /><br />

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="1" />
		<input type="hidden" name="type" value="<?php echo $type; ?>" />
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