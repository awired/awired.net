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

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* Joom fish frontend component
* @package joomfish.classes
* @copyright 2003-2006 Think Network GmbH
* @license http://www.gnu.org/copyleft/gpl.html GNU Public License
* @version 1.0, 2003-10-16 $Revision: 1.5 $
* @author Alex Kempkens <joomla@thinkmatrix.net>
*/

/**
* Utility class for writing the HTML code of the site map
*/
class HTML_joomfish {
/* @var mambelFishManager	Reference to my Manager for config and so on */
	var $_mambelFishManager=null;

	/** Default constructor
	 */
	function HTML_joomfish ($joomFishManager) {
		$this->_mambelFishManager = $joomFishManager;
	}
	
	/**
	 * Displays a language selector - the style is configured
	 *
	 * @param	sitemapManager	Reference to my manager
	 */
	function showLanguages($joomFishManager) {
		global $mosConfig_live_site, $mosConfig_absolute_path, $mosConfig_lang, $iso_client_lang, $Itemid;
		$htmlJoomFish = new HTML_joomfish($joomFishManager);
		
		$htmlJoomFish->_header();
		$langActive = $joomFishManager->getActiveLanguages();
		if( !isset( $langActive ) ) {
			// No active languages => nothing to show :-(
			return;
		}
		$outString = '';
		// check for spacer and fallback
		if( $joomFishManager->getCfg( 'textSpacer' ) ) $mbfSpacer = '&nbsp;' . $joomFishManager->getCfg( 'textSpacer' ) . '&nbsp;'; else $mbfSpacer = '&nbsp;|&nbsp;';
		
		if( $joomFishManager->getCfg( 'frontendMode' ) == 'vlist' || $joomFishManager->getCfg( 'frontendMode' ) == 'vimage' ){
			$mbf_space = '';
			$mbf_nl = '<br />';
			$mbfSpacer = '';
		}else{
			$mbf_space = '&nbsp;';
			$mbf_nl = '';
		}
		// end mic
		
		switch( $joomFishManager->getCfg( 'frontendMode' ) ) {

			case 'vlist':
			case 'hlist':
					foreach( $langActive as $language )
					{
						$href = HTML_joomfish::_createHRef ($language->iso);
						if( $outString != '' ) $outString .= $mbfSpacer; // changed by mic
						$outString .= '<a href="' .$href. '">' .$language->name. '</a>';
						$outString .= $mbf_nl; // new by mic
					}
				break;
				
			case 'vimage':
			case 'himage':
					foreach( $langActive as $language )
					{
						$href = HTML_joomfish::_createHRef ($language->iso);
						if( $outString != '' ) $outString .= $mbf_nl;
						
						if( isset($language->image) && $language->image!="" ) {  
							$langImg = '/images/' .$language->image;
						} else {
							$langImg = '/components/com_joomfish/images/flags/' .$language->iso .".gif";
						}

						if( file_exists( $mosConfig_absolute_path . $langImg ) ) {
							$outString .= '<a href="' .$href. '"><img src="' .$mosConfig_live_site . $langImg. '" alt="' .$language->name. '" border="0"></a>';
						} else {
							$outString .= '<a href="' .$href. '">' .$language->name. '</a>';
						}
					}
				break;
				
			default:
				if ( count($langActive)>0 ) {
					foreach( $langActive as $language )
					{
						$langOptions[] = mosHTML::makeOption( $language->iso, $language->name );
					}
				}
				$href = HTML_joomfish::_createHRef (null);
				$langlist = mosHTML::selectList( $langOptions, 'lang', 'class="inputbox" size="1" onchange="document.location.replace(\'' .$href.'&lang=\' +this.value);"', 'value', 'text', $iso_client_lang );
				$outString = $langlist;
				break;
		}
		echo $outString;
		$htmlJoomFish->_footer();
	}

	/**
	 * internal function to generate a new href link
	 * @param	string	iso_code of the wanted language
	 * @return	string	new href string
	 */
	function _createHRef( $iso ) {
		$href= "index.php";
		$vars = explode( "&", $_SERVER['QUERY_STRING'] );
		$hrefVars = '';
		if( count($vars) > 0 && $_SERVER['QUERY_STRING']) {
			foreach ($vars as $var) {
				if( eregi('=', $var ) ) {
					list($key, $value) = explode( "=", $var);
					if( $key != "lang" ) {
						if( $hrefVars != "" ) $hrefVars .= "&";
						$hrefVars .= "$key=$value";
					}
				}
			}
		}
		
		if( $iso != null ) {
			if( $hrefVars != "" ) $hrefVars .= "&";
			$hrefVars .= "lang=$iso";
		}
		
		if( $hrefVars != "" ) {
			$href .= "?$hrefVars";
		}
		return sefRelToAbs( $href );
	}

	/**
	 * Function to write the header
	 */
	function _header() {
	}
	
	/** 
	
	/**
	 * Function to write the footer
	 */
	function _footer() {
	?>
<!--Joom fish <?php echo JoomFishManager::getVersion();?>-->
<!-- &copy; 2003 Think Network, released under the GPL. -->
<!-- More information: at http://forge.joomla.org/sf/sfmain/do/viewProject/projects.joomfish -->
	<?php
	}
}	
?>
