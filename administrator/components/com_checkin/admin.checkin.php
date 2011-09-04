<?php
/**
* @version $Id: admin.checkin.php 5028 2006-09-14 00:03:34Z friesengeist $
* @package Joomla
* @subpackage Checkin
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

if (!$acl->acl_check( 'administration', 'config', 'users', $my->usertype )) {
	mosRedirect( 'index2.php?', _NOT_AUTH );
}
$nullDate = $database->getNullDate();
?>
<table class="adminheading">
	<tr>
		<th class="checkin">
			Validation globale
		</th>
	</tr>
</table>
<table class="adminform">
	<tr>
		<th class="title">
			Tables de la base
		</th>
		<th class="title">
			# d'&eacute;l&eacute;ments
		</th>
		<th class="title">
			Valid&eacute;s
		</th>
		<th class="title">
		</th>
	</tr>
<?php
$tables = $database->getTableList();
$k = 0;
foreach ($tables as $tn) {
	// make sure we get the right tables based on prefix
	if (!preg_match( "/^".$mosConfig_dbprefix."/i", $tn )) {
		continue;
	}
	$fields = $database->getTableFields( array( $tn ) );

	$foundCO = false;
	$foundCOT = false;
	$foundE = false;

	$foundCO	= isset( $fields[$tn]['checked_out'] );
	$foundCOT	= isset( $fields[$tn]['checked_out_time'] );
	$foundE		= isset( $fields[$tn]['editor'] );

	if ($foundCO && $foundCOT) {
		if ($foundE) {
			$query = "SELECT checked_out, editor"
			. "\n FROM $tn"
			. "\n WHERE checked_out > 0"
			;
		} else {
			$query = "SELECT checked_out"
			. "\n FROM $tn"
			. "\n WHERE checked_out > 0"
			;
		}
		$database->setQuery( $query );
		$res = $database->query();
		$num = $database->getNumRows( $res );

		if ($foundE) {
			$query = "UPDATE $tn"
			. "\n SET checked_out = 0, checked_out_time = " . $database->Quote( $nullDate ) . ", editor = NULL"
			. "\n WHERE checked_out > 0"
			;
		} else {
			$query = "UPDATE $tn"
			. "\n SET checked_out = 0, checked_out_time = " . $database->Quote( $nullDate )
			. "\n WHERE checked_out > 0"
			;
		}
		$database->setQuery( $query );
		$res = $database->query();

		if ($res == 1) {
			if ($num > 0) {
				echo "<tr class=\"row$k\">";
				echo "\n	<td width=\"350\">V&eacute;rification de la table - $tn</td>";
				echo "\n	<td width=\"150\"><b>$num</b> &eacute;l&eacute;ments d&eacute;verrouill&eacute;s</td>";
				echo "\n	<td width=\"100\" align=\"center\"><img src=\"images/tick.png\" border=\"0\" alt=\"tick\" /></td>";
				echo "\n	<td>&nbsp;</td>";
				echo "\n</tr>";
			} else {
				echo "<tr class=\"row$k\">";
				echo "\n	<td width=\"350\">V&eacute;rification de la table - $tn</td>";
				echo "\n	<td width=\"150\"><b>$num</b> &eacute;l&eacute;ments d&eacute;verrouill&eacute;s</td>";
				echo "\n	<td width=\"100\">&nbsp;</td>";
				echo "\n	<td>&nbsp;</td>";
				echo "\n</tr>";
			}
			$k = 1 - $k;
		}
	}
}
?>
	<tr>
		<td colspan="4">
			<strong>Les &eacute;l&eacute;ments verrouill&eacute;s ont tous &eacute;t&eacute; d&eacute;verrouill&eacute;s </strong>
		</td>
	</tr>
</table>