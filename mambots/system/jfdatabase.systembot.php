<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2006 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multi lingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 *
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$_MAMBOTS->registerFunction( 'onStart', 'botJFDatabase' );
$_MAMBOTS->registerFunction( 'onAfterStart', 'botJFDiscoverLanguage' );
$_MAMBOTS->registerFunction( 'onAfterStart', 'botJFInitialize' );

if (file_exists( 'components/com_joomfish/joomfish.php' )) {
	require_once( $mosConfig_absolute_path . '/administrator/components/com_joomfish/mldatabase.class.php' );
	require_once( $mosConfig_absolute_path . '/administrator/components/com_joomfish/joomfish.class.php' );
	//require_once( $mosConfig_absolute_path '/components/com_joomfish/includes/joomfish.class.php' );
}

/**
* Exchange of the database abstraction layer for multi lingual translations.
*/
function botJFDatabase() {
	global $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix,$mosConfig_debug;
	
	$GLOBALS[ 'mosConfig_mbf_content' ] = '1';			// ToDo: Might need correction!!
	$GLOBALS[ 'mosConfig_multilingual_support' ] = 1;
	$database = new mlDatabase( $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix );
	$database->debug( $mosConfig_debug );
	$GLOBALS['database'] = $database;
	
}

/** The function finds the language which is to be used for the user/session
 * 
 * It is possible to choose the language based on the client browsers configuration,
 * the activated language of the configuration and the language a user has choosen in
 * the past. The decision of this order is done in the JoomFish configuration.
 * 
 * The other topic while choosing the language is to change the $mosConfig_lang var 
 * for the other CMT's and same this for the user in the session or cockie.
 */
function botJFDiscoverLanguage ( ) {
	global $mosConfig_lang, $database,$_MAMBOTS;
	$GLOBALS['mosConfig_defaultLang'] = $mosConfig_lang;        // Save the default language of the site
	
	// check if param query has previously been processed
	if ( !isset($_MAMBOTS->_system_mambot_params['jfSystembot']) ) {
		// load mambot params info
		$query = "SELECT params"
		. "\n FROM #__mambots"
		. "\n WHERE element = 'jfdatabase.systembot'"
		. "\n AND folder = 'system'"
		;
		$database->setQuery( $query );
		$database->loadObject($mambot);	
		
		// save query to class variable
		$_MAMBOTS->_system_mambot_params['jfSystembot'] = $mambot;
	}
	
	// pull query data from class variable
	$mambot = $_MAMBOTS->_system_mambot_params['jfSystembot'];	
	
	$botParams = new mosParameters( $mambot->params );
	$determitLanguage 		= $botParams->def( 'determitLanguage', 1 );
	$newVisitorAction		= $botParams->def( 'newVisitorAction', "browser" );
	
	// if the language determination isn't enabled - skip this event
	if( !$determitLanguage ) {
		$GLOBALS['iso_client_lang'] = $GLOBALS['mosConfig_locale'];
		return;
	}
	
	$mbfcookie = mosGetParam( $_COOKIE, 'mbfcookie', null );
	if (isset($mbfcookie["lang"]) && $mbfcookie["lang"] != "") {
		$client_lang = $mbfcookie["lang"];
	} else {
		$client_lang = '';
	}
	
	// lang from URI should always overrule everything!
	$lang = mosGetParam( $_GET, 'lang', '' );
	if( $lang != '' ) {
		$client_lang = $lang;
	}
	 
	// if we have no language from cookie or query lang value then resort to joomfish settings
	if ($client_lang==''){	
		if ($newVisitorAction=="browser" && $_SERVER["HTTP_ACCEPT_LANGUAGE"] != "" ) {
			// no language chooses - assume from browser configuration
			// language negotiation by Kochin Chang, June 16, 2004
			// retrieve active languages from database
			$active_lang = null;
			$activeLanguages = JoomFishManager::getActiveLanguages();
			if( count( $activeLanguages ) == 0 ) {
				return $mosConfig_lang;
			}

			foreach ($activeLanguages as $lang) {
				$active_lang[] = $lang->iso;
			}

			// figure out which language to use
			$browserLang = explode(',', $_SERVER["HTTP_ACCEPT_LANGUAGE"]);

			foreach( $browserLang as $lang ) {
				$shortLang = substr( $lang, 0, 2 );

				if( in_array($lang, $active_lang) ) {
					$client_lang = $lang;
					break;
				}

				if ( in_array($shortLang, $active_lang) ) {
					$client_lang = $shortLang;
					break;
				}
			}
			// if language is still blank then use first active language!
			if ($client_lang==""){
				$client_lang = $activeLanguages[0]->iso;
			}
		}
		elseif ($newVisitorAction=="joomfish"){
			// This list is ordered already!
			$activeLanguages = JoomFishManager::getActiveLanguages();
			if( count( $activeLanguages ) == 0 ) {
				return $mosConfig_lang;
			}
			else {
				$client_lang = $activeLanguages[0]->iso;				
			}
			
		}
		// otherwise default use site default language
		else {
			$activeLanguages = JoomFishManager::getActiveLanguages();
			if( count( $activeLanguages ) == 0 ) {
				return $mosConfig_lang;
			}
			foreach ($activeLanguages as $lang) {
				if ($lang->code==$mosConfig_lang){
					$client_lang = $lang->iso;
					break;
				}
			}			
			// if language is still blank then use first active language!
			if ($client_lang==""){
				$client_lang = $activeLanguages[0]->iso;
			}
		}

	}
	
	// get the name of the language file for joomla
	$mbfLang = new jfLanguage($database);
	$mbfLang->loadByISO( $client_lang );
	
	if( isset($mbfLang) && $mbfLang->code != "" & $mbfLang->active) {
		$mosConfig_lang = $mbfLang->code;
	} else {
		$mbfLang->loadByJoomla( $mosConfig_lang );
		$client_lang = $mbfLang->iso;
	}
	
	// set locale for this ISO code
	setlocale(LC_ALL, $client_lang);
	
	setcookie( "lang", "", time() - 1800, "/" );
	setcookie( "mbfcookie", "", time() - 1800, "/" );
	setcookie( "mbfcookie[lang]", $client_lang, time()+24*3600, '/' );
	$GLOBALS['iso_client_lang'] = $client_lang;
}

/** This function initialize the Joom!Fish manager in order to have
 * easy access and prepare certain information.
 */
function botJFInitialize ( ) {
	$GLOBALS[ '_JOOMFISH_MANAGER'] = new JoomFishManager();

}
?>