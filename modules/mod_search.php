<?php
/**
* @version $Id: mod_search.php 3112 2006-04-14 03:47:46Z stingrey $
* @package Joomla
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

$button			= $params->get( 'button', '' );
$button_pos		= $params->get( 'button_pos', 'left' );
$button_text	= $params->get( 'button_text', _SEARCH_TITLE );
$width 			= intval( $params->get( 'width', 20 ) );
$text 			= $params->get( 'text', _SEARCH_BOX );
$set_Itemid		= intval( $params->get( 'set_itemid', 0 ) );

$output = '<input name="searchword" id="mod_search_searchword" maxlength="20" alt="search" class="inputbox'. $moduleclass_sfx .'" type="text" size="'. $width .'" value="'. $text .'"  onblur="if(this.value==\'\') this.value=\''. $text .'\';" onfocus="if(this.value==\''. $text .'\') this.value=\'\';" />';

if ( $button ) {
	$button = '<input type="submit" value="'. $button_text .'" class="button'. $moduleclass_sfx .'"/>';
}

switch ( $button_pos ) {
	case 'top':
		$button = $button .'<br/>';
		$output = $button . $output;
		break;

	case 'bottom':
		$button =  '<br/>'. $button;
		$output = $output . $button;
		break;

	case 'right':
		$output = $output . $button;
		break;

	case 'left':
	default:
		$output = $button . $output;
		break;
}

// set Itemid id for links
if ( $set_Itemid ) {
	// use param setting
	$_Itemid	= $set_Itemid;
	$link 		= 'index.php?option=com_search&amp;Itemid='. $set_Itemid;
} else {
	$query = "SELECT id"
	. "\n FROM #__menu"
	. "\n WHERE link = 'index.php?option=com_search'"
	. "\n AND published = 1"
	;
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	
	// try to auto detect search component Itemid
	if ( count( $rows ) ) {
		$_Itemid	= $rows[0]->id;
		$link 		= 'index.php?option=com_search&amp;Itemid='. $_Itemid;
	} else {
	// Assign no Itemid
		$_Itemid 	= '';
		$link 		= 'index.php?option=com_search';	
	}
}
?>

<form action="<?php echo $link; ?>" method="get">
	<div class="search<?php echo $moduleclass_sfx; ?>">
		<?php echo $output; ?>
	</div>

	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $_Itemid; ?>" />	
</form>