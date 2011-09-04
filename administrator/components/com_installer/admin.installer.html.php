<?php
/**
* @version $Id: admin.installer.html.php 5992 2006-12-13 00:18:18Z friesengeist $
* @package Joomla
* @subpackage Installer
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

function writableCell( $folder ) {
	echo '<tr>';
	echo '<td class="item">' . $folder . '/</td>';
	echo '<td align="left">';
	echo is_writable( $GLOBALS['mosConfig_absolute_path'] . '/' . $folder ) ? '<b><font color="green">Modifiable</font></b>' : '<b><font color="red">Non modifiable</font></b>' . '</td>';
	echo '</tr>';
}

/**
* @package Joomla
*/
class HTML_installer {

	function showInstallForm( $title, $option, $element, $client = "", $p_startdir = "", $backLink="" ) {
		if (!defined( '_INSTALL_3PD_WARN' )) {
			define( '_INSTALL_3PD_WARN', 'ATTENTION: Installer des extensions tierces peut compromettre la sécurité de votre serveur. La mise à jour de Joomla! n\'entraîne pas la mise à jour des extensions tierces installées sur votre site.<br />Pour plus d\'informations sur la sécurisation de votre site, veuillez consulter le <a href="http://forum.joomlafacile.com/showthread.php?t=22432" target="_blank" style="color: blue; text-decoration: underline;"> forum Joomla.fr</a>.<br /><br />La liste des extensions vulnérables est consultable à <a href="http://forum.joomlafacile.com/showthread.php?t=23533" target="_blank" style="color: blue; text-decoration: underline;"> cette adresse</a>.' );
		}
		?>
		<div style="margin: 10px 0px; padding: 5px 15px 5px 35px; min-height: 25px; border: 1px solid #cc0000; background: #ffffcc; text-align: left; color: red; font-weight: bold; background-image: url(../includes/js/ThemeOffice/warning.png); background-repeat: no-repeat; background-position: 10px 50%;">
			<?php echo _INSTALL_3PD_WARN; ?>
		</div>
		<script language="javascript" type="text/javascript">
		function submitbutton3(pressbutton) {
			var form = document.adminForm_dir;

			// do field validation
			if (form.userfile.value == ""){
				alert( "Vous devez sélectionner un répertoire" );
			} else {
				form.submit();
			}
		}
		</script>
		<form enctype="multipart/form-data" action="index2.php" method="post" name="filename">
		<table class="adminheading">
		<tr>
			<th class="install">
			<?php echo $title;?>
			</th>
			<td align="right" nowrap="nowrap">
			<?php echo $backLink;?>
			</td>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<th>
			Upload du fichier package
			</th>
		</tr>
		<tr>
			<td align="left">
			Fichier Package:
			  <input class="text_area" name="userfile" type="file" size="70"/>
			<input class="button" type="submit" value="Installer" />
		  </td>
		</tr>
		</table>

		<input type="hidden" name="task" value="uploadfile"/>
		<input type="hidden" name="option" value="<?php echo $option;?>"/>
		<input type="hidden" name="element" value="<?php echo $element;?>"/>
		<input type="hidden" name="client" value="<?php echo $client;?>"/>
		</form>
		<br />

		<form enctype="multipart/form-data" action="index2.php" method="post" name="adminForm_dir">
		<table class="adminform">
		<tr>
			<th>
			Installer depuis le r&eacute;pertoire
			</th>
		</tr>
		<tr>
			<td align="left">
			R&eacute;pertoire d'installation:&nbsp;
			<input type="text" name="userfile" class="text_area" size="65" value="<?php echo $p_startdir; ?>"/>&nbsp;
			<input type="button" class="button" value="Installer" onclick="submitbutton3()" />
		  </td>
		</tr>
		</table>

		<input type="hidden" name="task" value="installfromdir" />
		<input type="hidden" name="option" value="<?php echo $option;?>"/>
		<input type="hidden" name="element" value="<?php echo $element;?>"/>
		<input type="hidden" name="client" value="<?php echo $client;?>"/>
		</form>
		<?php
	}

	/**
	* @param string
	* @param string
	* @param string
	* @param string
	*/
	function showInstallMessage( $message, $title, $url ) {
		global $PHP_SELF;
		?>
		<table class="adminheading">
		<tr>
			<th class="install">
			<?php echo $title; ?>
			</th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<td align="left">
			<strong><?php echo $message; ?></strong>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			[&nbsp;<a href="<?php echo $url;?>" style="font-size: 16px; font-weight: bold">Continuer ...</a>&nbsp;]
			</td>
		</tr>
		</table>
		<?php
	}
}
?>
