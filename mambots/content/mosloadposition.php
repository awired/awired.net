<?php
/**
* @version $Id: mosloadposition.php 5873 2006-11-28 23:31:00Z facedancer $
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

$_MAMBOTS->registerFunction( 'onPrepareContent', 'botMosLoadPosition' );

/**
* Mambot that loads module positions within content
*/
function botMosLoadPosition( $published, &$row, &$params, $page=0 ) {
	global $database, $_MAMBOTS;

	// simple performance check to determine whether bot should process further
	if ( strpos( $row->text, 'mosloadposition' ) === false ) {
		return true;
	}

 	// expression to search for
 	$regex = '/{mosloadposition\s*.*?}/i';

 	// check whether mambot has been unpublished
	if ( !$published ) {
		$row->text = preg_replace( $regex, '', $row->text );
		return true;
	}

	// find all instances of mambot and put in $matches
	preg_match_all( $regex, $row->text, $matches );

	// Number of mambots
 	$count = count( $matches[0] );

 	// mambot only processes if there are any instances of the mambot in the text
 	if ( $count ) {
		// check if param query has previously been processed
		if ( !isset($_MAMBOTS->_content_mambot_params['mosloadposition']) ) {
			// load mambot params info
			$query = "SELECT params"
			. "\n FROM #__mambots"
			. "\n WHERE element = 'mosloadposition'"
			. "\n AND folder = 'content'"
			;
			$database->setQuery( $query );
			$database->loadObject($mambot);

			// save query to class variable
			$_MAMBOTS->_content_mambot_params['mosloadposition'] = $mambot;
		}

		// pull query data from class variable
		$mambot = $_MAMBOTS->_content_mambot_params['mosloadposition'];

	 	$botParams = new mosParameters( $mambot->params );

	 	$style	= $botParams->def( 'style', -2 );

 		processPositions( $row, $matches, $count, $regex, $style );
	}
}

function processPositions ( &$row, &$matches, $count, $regex, $style ) {
	global $database;

	$query = "SELECT position"
	. "\n FROM #__template_positions"
	. "\n ORDER BY position"
	;
	$database->setQuery( $query );
 	$positions 	= $database->loadResultArray();

 	for ( $i=0; $i < $count; $i++ ) {
 		$load = str_replace( 'mosloadposition', '', $matches[0][$i] );
 		$load = str_replace( '{', '', $load );
 		$load = str_replace( '}', '', $load );
 		$load = trim( $load );

		foreach ( $positions as $position ) {
	 		if ( $position == @$load ) {
				$modules	= loadPosition( $load, $style );
				$row->text 	= str_replace($matches[0][$i], $modules, $row->text);
				break;
	 		}
 		}
 	}

  	// removes tags without matching module positions
	$row->text = preg_replace( $regex, '', $row->text );
}

function loadPosition( $position, $style=-2 ) {
	$modules = '';
	if ( mosCountModules( $position ) ) {
		ob_start();
		mosLoadModules ( $position, $style );
		$modules = ob_get_contents();
		ob_end_clean();
	}

	return $modules;
}
?>