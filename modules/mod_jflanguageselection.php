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

/**
* @package mod_jflanguageselection
* @copyright 2003-2006 Think Network GmbH
* @license http://www.gnu.org/copyleft/lgpl.html GNU Lesser Public License
* @version 1.7 - $Revision: 14 $
* @author Alex Kempkens <joomla@thinkmatrix.net>
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$inc_jf_css	= intval( $params->get( 'inc_jf_css', 1 ));
$cache 		= intval( $params->get( 'cache', 0 ) );
$type 		= trim( $params->get( 'type', 'dropdown' ));
$show_acitve= intval( $params->get( 'show_acitve', 1 ) );
$spacer		= trim( $params->get( 'spacer', '&nbsp;' ) );

		
global $_JOOMFISH_MANAGER;
global $mosConfig_live_site, $mosConfig_absolute_path, $mosConfig_lang, $iso_client_lang;

$langActive = $_JOOMFISH_MANAGER->getActiveLanguages();
if( !isset( $langActive ) ) {
	// No active languages => nothing to show :-(
	return;
}

switch ( $type ) {
	default:
	case 'dropdown':			// drop down of names
		if ( count($langActive)>0 ) {
			$langOptions=array();
			foreach( $langActive as $language )
			{
				$href = JFModuleHTML::_createHRef ($language->iso);
				if( $language->code == $mosConfig_lang && !$show_acitve ) {
					continue;		// Not showing the active language
				}
				if ($language->code == $mosConfig_lang ) $activehref=$href;
				
				$langOptions[] = mosHTML::makeOption( $href, $language->name );
			}
			
			if( count( $langOptions ) > 1 ) {
				$href = JFModuleHTML::_createHRef (null);
				$langlist = mosHTML::selectList( $langOptions, 'lang', 'id="jflanguageselection" class="jflanguageselection" size="1" onchange="document.location.replace(this.value);"', 'value', 'text', $activehref);
				$outString = '<label for="jflanguageselection" class="jflanguageselection">' ._CMN_SELECT. '</label>';
				$outString .= $langlist;
			} else {
				$outString = '<div class="jflanguageselection"><a href="' .$langOptions[0]->value. '"><span lang="' .$langOptions[0]->value. '" xml:lang="' .$langOptions[0]->value. '">' .$langOptions[0]->text. '</a></div>';
			}
		}
		break;
		
	case 'names':
		$outString = '<ul class="jflanguageselection">';
		foreach( $langActive as $language )
		{
			if( $language->code == $mosConfig_lang && !$show_acitve ) {
				continue;		// Not showing the active language
			}
			
			$href = JFModuleHTML::_createHRef ($language->iso);
			$outString .= '<li><a href="' .$href. '"><span lang="' .$language->iso. '" xml:lang="' .$language->iso. '">' .$language->name. '</span></a></li>';
		}
		$outString .= '</ul>';
		break;
			
	case 'images':
		$outString = '<ul class="jflanguageselection">';
		foreach( $langActive as $language )
		{
			if( $language->code == $mosConfig_lang && !$show_acitve ) {
				continue;		// Not showing the active language
			}
			
			$href = JFModuleHTML::_createHRef ($language->iso);
			
			if( isset($language->image) && $language->image!="" ) {  
				$langImg = '/images/' .$language->image;
			} else {
				$langImg = '/components/com_joomfish/images/flags/' .$language->iso .".gif";
			}

			if( file_exists( $mosConfig_absolute_path . $langImg ) ) {
				$outString .= '<li><a href="' .$href. '"><img src="' .$mosConfig_live_site . $langImg. '" alt="' .$language->name. '" /></a></li>';
			} else {
				$outString .= '<li><a href="' .$href. '">' .$language->name. '</a></li>';
			}
		}
		$outString .= '</ul>';
		break;
}


if( $inc_jf_css && file_exists( $mosConfig_absolute_path. '/modules/mod_jflanguageselection.css' ) ) {
	?>
<link href="<?php echo $mosConfig_live_site;?>/modules/mod_jflanguageselection.css" rel="stylesheet" type="text/css"/>
	<?php
}
?>
<?php echo $outString;?>
<!--Joom!fish <?php echo JoomFishManager::getVersion();?>-->
<!-- &copy; 2003-2006 Think Network, released under the LGPL. -->
<!-- More information: at http://forge.joomla.org/sf/sfmain/do/viewProject/projects.joomfish -->
<?php
class JFModuleHTML {
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
						if( $hrefVars != "" ) $hrefVars .= "&amp;";
						$hrefVars .= "$key=$value";
					}
				}
			}
		}
		
		// Add the existing variables
		if( $hrefVars != "" ) {
			$href .= '?' .$hrefVars;
		}

		if( $iso != null ) {
			$lang = 'lang=' .$iso;
		} else {
			// it's important that we add at least the basic parameter - as of the sef is adding the actual otherwise!
			$lang = 'lang=';
		}
		
		// if there are other vars we need to add a & otherwiese ?
		if( $hrefVars == '' ) {
			$href .= '?' . $lang;
		} else {
			$href .= '&amp;' . $lang;
		}
		
		return sefRelToAbs( $href );
	}
}
?>