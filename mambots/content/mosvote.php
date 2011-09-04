<?php
/**
* @version $Id: mosvote.php 3500 2006-05-15 04:31:11Z stingrey $
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

$_MAMBOTS->registerFunction( 'onBeforeDisplayContent', 'botVoting' );

function botVoting( &$row, &$params, $page=0 ) {
	global $Itemid, $task;

	$id 	= $row->id;
	$option = 'com_content';

	$html = '';
	if ($params->get( 'rating' ) && !$params->get( 'popup' )){
		$img = '';

		// look for images in template if available
		$starImageOn 	= mosAdminMenus::ImageCheck( 'rating_star.png', '/images/M_images/' );
		$starImageOff 	= mosAdminMenus::ImageCheck( 'rating_star_blank.png', '/images/M_images/' );

		for ($i=0; $i < $row->rating; $i++) {
			$img .= $starImageOn;
		}
		for ($i=$row->rating; $i < 5; $i++) {
			$img .= $starImageOff;
		}
		$html .= '<span class="content_rating">';
		$html .= '<form method="post" action="' . sefRelToAbs( 'index.php' ) . '" style="display:inline">';
		$html .= $img;
		//$html .= intval( $row->rating_count );
		$html .= "";
		$url = @$_SERVER['REQUEST_URI'];
		$url = ampReplace( $url );

		if (!$params->get( 'intro_only' ) && $task != "blogsection") {
			$html .= '</span><span class="content_vote">';
			$html .= _VOTE_POOR;
			$html .= '<input type="radio" alt="vote 1 star" name="user_rating" value="1" />';
			$html .= '<input type="radio" alt="vote 2 star" name="user_rating" value="2" />';
			$html .= '<input type="radio" alt="vote 3 star" name="user_rating" value="3" />';
			$html .= '<input type="radio" alt="vote 4 star" name="user_rating" value="4" />';
			$html .= '<input type="radio" alt="vote 5 star" name="user_rating" value="5" checked="checked" />';
			$html .= _VOTE_BEST;
			$html .= '&nbsp;<input class="button" type="submit" name="submit_vote" value="'. _RATE_BUTTON .'" />';
			$html .= '<input type="hidden" name="task" value="vote" />';
			$html .= '<input type="hidden" name="pop" value="0" />';
			$html .= '<input type="hidden" name="option" value="com_content" />';
			$html .= '<input type="hidden" name="Itemid" value="'. $Itemid .'" />';
			$html .= '<input type="hidden" name="cid" value="'. $id .'" />';
			$html .= '<input type="hidden" name="url" value="'. $url .'" />';
			$html .= '</span>';
		}
		$html .= '</form></span>';
	}
	return $html;
}
?>