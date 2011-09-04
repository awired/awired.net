<?php
/**
* @version $Id: admin.syndicate.html.php 2693 2006-03-07 18:13:12Z stingrey $
* @package Joomla
* @subpackage Syndicate
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
* @subpackage Syndicate
*/
class HTML_syndicate {

	function settings( $option, &$params, $id ) {
		global $mosConfig_live_site, $mosConfig_cachepath, $my;
		?>
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			Param&egrave;tres de syndication
			</th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<th>
			Param&egrave;tres
			</th>
		</tr>
		<tr>
			<td>
			<?php
			echo $params->render();
			?>
			</td>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<td>
				<table align="center">
				<?php
				$visible = 0;
				// check to hide certain paths if not super admin
				if ( $my->gid == 25 ) {
					$visible = 1;
				}
				mosHTML::writableCell( $mosConfig_cachepath, 0, '<strong>Cache Directory</strong> ', $visible );
				?>
				</table>
			</td>
		</tr>
		</table>

		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="name" value="Syndication" />
		<input type="hidden" name="admin_menu_link" value="option=com_syndicate" />
		<input type="hidden" name="admin_menu_alt" value="Param�tres de syndication" />
		<input type="hidden" name="option" value="com_syndicate" />
		<input type="hidden" name="admin_menu_img" value="js/ThemeOffice/component.png" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		</form>
		<script language="Javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
		<?php
	}
}
?>