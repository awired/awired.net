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

require_once( $mainframe->getPath( 'class' ) );
$joomFishManager = new JoomFishManager( dirname( __FILE__ ) );

require_once( $mainframe->getPath( 'admin_html' ) );


if (file_exists($mosConfig_absolute_path .'/components/com_joomfish/language/'.$joomFishManager->getCfg( 'componentAdminLang' ).'.php')) {
	require_once ($mosConfig_absolute_path .'/components/com_joomfish/language/'.$joomFishManager->getCfg( 'componentAdminLang' ).'.php');
} else {
	require_once ($mosConfig_absolute_path .'/components/com_joomfish/language/english.php');
}

$act = mosGetParam( $_REQUEST, 'act', '' );
$task = mosGetParam( $_REQUEST, 'task', array(0) );

if($mosConfig_debug) {
	reset ($_POST);
	while (list ($key, $val) = each ($_POST)) {
   	echo "$key => $val<br />\n";
	}
}

// Setting default values if variables are not defined
$select_language_id = mosGetParam( $_REQUEST, 'select_language_id', -1 );
$catid = mosGetParam( $_REQUEST, 'catid', '' );
$option = mosGetParam( $_REQUEST, 'option', 'com_joomfish' );
$language_id = mosGetParam( $_REQUEST, 'language_id', $select_language_id );
$contentid = mosGetParam( $_REQUEST, 'contentid', null );
$mbfc_id  = mosGetParam( $_REQUEST, 'mbfc_id ', null );


/**
 * The JoomFish Tasker manages the general tasks within the Joom!Fish admin interface
 *
 */
class joomfishTasker extends mosAbstractTasker {
	
	/** @var string		sub-action within the task */
	var $act=null;
	
	/** @var array		int or array with the choosen list id */
	var $cid=null;
	
	/** @var string		file code */
	var $fileCode = null;
	
	/**
	 * PHP 4 constructor for the tasker
	 *
	 * @return joomfishTasker
	 */
	function joomfishTasker( ){
		parent::mosAbstractTasker( 'showCPanel' );

		$this->act = mosGetParam( $_REQUEST, 'act', '' );
		$this->task = mosGetParam( $_REQUEST, 'task', '' );
		$this->cid = mosGetParam( $_REQUEST, 'cid', array(0) );
		if (!is_array( $this->cid )) {
			$this->cid = array(0);
		}
		$this->fileCode = mosGetParam( $_REQUEST, 'fileCode', '' );
		
		$this->registerTask( 'translate', 'showTranslate' );
		$this->registerTask( 'dinnermenu', 'showDinnermenu' );
		$this->registerTask( 'credits', 'showCredits' );
		$this->registerTask( 'check', 'showCredits' );
		$this->registerTask( 'config_component', 'showComponentConfig' );
		$this->registerTask( 'config_language', 'showLanguageConfig' );
		$this->registerTask( 'config_elements', 'showCElementConfig' );
		$this->registerTask( 'upgrade_install', 'showUpgrade');
	}
	
	function  showCPanel() {
		$panelStates = array();
		$panelStates['system_bot'] = $this->_testSystemBotState();
		$panelStates['search_bot'] = $this->_testSearchBotState();
		$panelStates['module'] = $this->_testModuleState();
		$panelStates['mbfInstall'] = $this->_testOldInstall();
		
		HTML_joomfish::showCPanel( $panelStates );
	}
	
	function showTranslate() {
		global $joomFishManager, $language_id, $select_language_id, $catid, $contentid, $mbfc_id, $option;
		
		setupContentElementCache();
		if( !$this->_testSystemBotState() ) {;
			echo "<div style='font-size:16px;font-weight:bold;color:red'>"._JOOMFISH_ADMIN_MAMBOT_ERROR."</div>";
		}
		
		switch ($this->task) {
			case "save":
				saveTranslation( $joomFishManager, $language_id, $catid, $contentid, $mbfc_id );
				showTranslationOverview( $joomFishManager, $select_language_id, $catid );
				break;
				
			case "edit":
				list($content_id, $language_id) = explode('|', $this->cid[0]);
				editTranslation( $joomFishManager, $language_id, $catid, $content_id, $select_language_id );
				break;
			
			case "unpublish":
			case "publish":
				$publish = $this->task=="publish" ? 1 : 0;
				publishTranslation( $joomFishManager, $catid, $this->cid, $publish );
				showTranslationOverview( $joomFishManager, $select_language_id, $catid );
				break;
			
			case "remove":
				removeTranslation( $joomFishManager, $catid, $this->cid );
				showTranslationOverview( $joomFishManager, $select_language_id, $catid );
				break;
			
			case "cpanel":
				$this->_redirect = "index2.php?option=com_joomfish";
				break;
				
			default:
				showTranslationOverview( $joomFishManager, $select_language_id, $catid );
				break;
		}
	}
	
	function showDinnermenu() {
		if( $this->task == "cpanel" ) {
			$this->_redirect = "index2.php?option=com_joomfish";
			return;
		}
				
		HTML_joomfish::showDinnermenu();
	}
	
	function showCredits() {
		if( $this->task == "cpanel" ) {
			$this->_redirect = "index2.php?option=com_joomfish";
			return;
		}

		HTML_joomfish_help::showWelcome();		
	}

	function showInformation() {
		if( $this->task == "cpanel" ) {
			$this->_redirect = "index2.php?option=com_joomfish";
			return;
		}

		HTML_joomfish::showInformation( $this->fileCode );
	}
	
	function showComponentConfig() {
		global $joomFishManager, $option;
		
		if($this->task == 'save' || $this->task == 'apply') {
			$joomFishManager->setCfg( 'componentAdminLang' , mosGetParam( $_REQUEST, 'frmComponentAdminLanguage', 'english' ) );
			$joomFishManager->setCfg( 'noTranslation' , mosGetParam( $_REQUEST, 'frmTranslationMode', 0 ) );
			$joomFishManager->setCfg( 'defaultText', mosGetParam( $_REQUEST, 'frmTranslationDefaultText', "" ) );
			$joomFishManager->setCfg( 'frontEndPublish' , mosGetParam( $_REQUEST, 'frmPublish',1));
			
			$configSaved = $joomFishManager->saveConfiguration();

			if( $configSaved ) {
				if( $this->task == 'save' ) {
					$this->_redirect = "index2.php?option=$option&hidemainmenu=0";
				} else {
				$this->_redirect = "index2.php?option=$option&act=config_component&hidemainmenu=1";
				}
				$this->_message = _JOOMFISH_CONFIG_SAVED;
			} else {
				$this->_redirect = "index2.php?option=$option&act=config_component";
				$this->_message = _JOOMFISH_CONFIG_PROBLEMS;
			}
			
		} elseif ( $this->task == 'cancel' ) {
			$this->_redirect = "index2.php?option=$option&hidemainmenu=0";
		} else {
			showComponentConfiguration( $joomFishManager );
		}
	}
	
	function showCElementConfig() {
		global $joomFishManager, $mosConfig_absolute_path, $database, $option;
		setupContentElementCache();
		switch ($this->task) {
			case "edit":
				showElementConfiguration( $joomFishManager, $this->cid[0] );
				break;
				
			case "cpanel":
				$this->_redirect = "index2.php?option=com_joomfish";
				break;
				
			default:
				showElementOverview( $joomFishManager, $option );
				break;
		}
	}
	
	function showLanguageConfig() {
		global $joomFishManager, $mosConfig_absolute_path, $database, $option;

		if($this->task == 'save' || $this->task == 'apply') {
			$languagesSaved=false;
			
			$frmLanguageID = mosGetParam( $_REQUEST, 'frmLanguageID', '' );
			$frmLanguageName = mosGetParam( $_REQUEST, 'frmLanguageName', '' );
			$frmLanguageActive = mosGetParam( $_REQUEST, 'frmLanguageActive', '' );
			$frmLanguageISO = mosGetParam( $_REQUEST, 'frmLanguageISO', '' );
			$frmLanguageCode = mosGetParam( $_REQUEST, 'frmLanguageCode', '' );
			$frmLanguageImage = mosGetParam( $_REQUEST, 'frmLanguageImage', '' );
			$frmLanguageOrder = mosGetParam( $_REQUEST, 'frmLanguageOrder', '' );
			
			
			if( is_array($frmLanguageID) ) {
				$languagesSaved = true;
				for ($i=0; $i<count($frmLanguageID); $i++) {
					$mbfLang = new jfLanguage($database);
					$mbfLang->id =$frmLanguageID[$i];
					$mbfLang->name = $frmLanguageName[$i];
					
					// The checkbox is only filled when it was active - so we have to check if
					// one box is fitting to your language
					if( isset($frmLanguageActive) ) {
						foreach( $frmLanguageActive as $langid ) {
							if( $langid == $mbfLang->id ) {
								$mbfLang->active = true;
								break;
							}
						}
					}
					$mbfLang->iso = $frmLanguageISO[$i];
					$mbfLang->code = $frmLanguageCode[$i];
					$mbfLang->image = $frmLanguageImage[$i];
					$mbfLang->ordering = $frmLanguageOrder[$i];

					if( !$mbfLang->store() ) {
						echo "Error: ".$mbfLang->getError()."<br />";
						$languagesSaved=false;
					}
				}
			}

			if( $languagesSaved ) {
				if( $this->task == 'save' ) {
					$this->_redirect = "index2.php?option=$option&hidemainmenu=0";
				} else {
					$this->_redirect = "index2.php?option=$option&act=" .$this->act. "&hidemainmenu=1";
				}
				$this->_message = _JOOMFISH_CONFIG_SAVED;
			} else {
				$this->_redirect = "index2.php?option=$option&act=" .$this->act;
				$this->_message = _JOOMFISH_CONFIG_PROBLEMS;
			}
			
		} elseif ( $this->task == 'cancel' ) {
			$this->_redirect = "index2.php?option=$option&hidemainmenu=0";
		} elseif ( $this->task == 'site_config' ) {
			$this->_redirect = "index2.php?option=com_config&hidemainmenu=1";
		} else {
		
			// 1. read all known languages from the database
			$languages=null;
			$database->setQuery( "SELECT l.*"
				. "\nFROM #__languages AS l"
				. "\nORDER BY l.active desc, l.ordering, l.name"
			);
			$languages = $database->loadObjectList();
			
			// Read the languages dir to find new installed languages
			$languageBaseDir = mosPathName(mosPathName($mosConfig_absolute_path) . "language");
			$xmlFilesInDir = mosReadDirectory($languageBaseDir,".xml");
		
			$dirName = $languageBaseDir;
			$activeFiles = null;

			// XML library
			global $mosConfig_absolute_path;
			require_once( $mosConfig_absolute_path . "/includes/domit/xml_domit_lite_include.php" );
		
			//mosDebugVar($xmlFilesInDir);
			foreach($xmlFilesInDir as $xmlfile) {
				// Read the file to see if it's a valid template XML file
				$xmlDoc =& new DOMIT_Lite_Document();
				$xmlDoc->resolveErrors( true );
				if (!$xmlDoc->loadXML( $dirName . $xmlfile, false, true )) {
					continue;
				}
		
				$element = &$xmlDoc->documentElement;
		
				if ($element->getTagName() != 'mosinstall') {
					continue;
				}
				if ($element->getAttribute( "type" ) != "language") {
					continue;
				}
		
				$language = getLanguageFromXML( $xmlfile );
				// Let's see if we find the language already
				$languageFound=false;
				foreach($languages as $dbLang) {
					if ($dbLang->code == $language->code) {
						$languageFound=true;
						break;
					}
				}
				
				if( !$languageFound ) {
					$languages[] = $language;
				}
			}
			
			/*elseif (!$languagesSaved) {
					$this->_redirect = "index2.php?option=$option&act=config_component";
					$this->_message = _JOOMFISH_CONFIG_PROBLEMS;
					mosRedirect("index2.php?option=$option&act=config_component", _JOOMFISH_LANG_PROBLEMS ." - " .$mbfLang->getError());
				}*/
			
			HTML_joomfish::showLanguageConfiguration( $joomFishManager, $languages );
		}
	}

	/**
	 * Provides a basic upgrade functionallity based
	 */
	function showUpgrade() {
		global $joomFishManager;
		$upgradeSucessful = false;
		$upgradeDone = $joomFishManager->getCfg( 'mbfupgradeDone' );
		
		$lists = array();
		$lists['confirmDelete'] = mosGetParam( $_REQUEST, 'confirmDelete', 0 );
		$lists['backupTables'] = mosGetParam( $_REQUEST, 'backupTables', 1 );
		$lists['renameTables'] = mosGetParam( $_REQUEST, 'renameTables', 1 );
		
		
		switch ( $this->task ) {
			case 'upgrade':
				if( !$lists [ 'confirmDelete'] ) {
					$this->_message = _JOOMFISH_UPGRADE_ERROR_CONFIRM;
					$this->_redirect = "index2.php?option=com_joomfish&act=upgrade_install";
				} else {
					$summary = $this->_upgradeInstallation( $lists['backupTables'], $lists['renameTables'] );
					if( !$summary['state'] ) {
						$upgradeSucessful = false;
						$upgradeDone = 1;
						$summary['message'] = _JOOMFISH_UPGRADE_ERROR_UPGRADE;
						$this->_message = _JOOMFISH_UPGRADE_ERROR_UPGRADE;
						$lists['summary'] = $summary;
					} else {
						$upgradeSucessful = true;
						$upgradeDone = 1;
						$joomFishManager->setCfg( 'mbfupgradeDone', $upgradeDone );
						$joomFishManager->saveConfiguration();
						$lists['summary'] = $summary;
					}
				}
				break;
			
			case "cpanel":
				$this->_redirect = "index2.php?option=com_joomfish";
				break;
				
			default:
				break;
		}
			
		HTML_joomfish::showUpgradeInstall( $joomFishManager, $upgradeSucessful, $upgradeDone, $lists );
	}

	
	
	/**
	 * Testing state of the system bot
	 *
	 */
	function _testSystemBotState()
	{
		global $database;
		$botState = false;
		
		$database->setQuery( "SELECT * FROM #__mambots WHERE element='jfdatabase.systembot'");
		$database->query();
		$database->loadObject($mambot);
		if ($mambot != null && $mambot->published == "1") {
			$botState = $mambot->id;
		}
		return $botState;
	}

	/**
	 * Testing state of the system bot
	 *
	 */
	function _testSearchBotState()
	{
		global $database;
		$botState = false;
		
		$database->setQuery( "SELECT * FROM #__mambots WHERE element='jfcontent.searchbot'");
		$database->query();
		$database->loadObject($mambot);
		if ($mambot != null && $mambot->published == "1") {
			$botState = $mambot->id;
		}
		return $botState;
	}

	/**
	 * Testing state of the system bot
	 *
	 */
	function _testModuleState()
	{
		global $database;
		$moduleState = false;
		
		$database->setQuery( "SELECT * FROM #__modules WHERE module='mod_jflanguageselection'");
		$database->query();
		$database->loadObject($module);
		if ($module != null && $module->published == "1") {
			$moduleState = $module->id;
		}
		return $moduleState;
	}

	/**
	 * Testing if old installation is found and upgraded?
	 * @return int		0 := component not installed, 1 := installed but not upgraded, 2 := installed and upgraded
	 */
	function _testOldInstall()
	{
		global $database, $joomFishManager;
		$oldInstall = 0;
		
		$database->setQuery( "SHOW TABLES LIKE '%mbf_%'" );
		$database->query();
		$rows = $database->loadResultArray();
		foreach ($rows as $row) {
			if( ereg( 'mbf_content', $row ) ) {
				$oldInstall = 1;
				break;
			}
		}
		
		if( $oldInstall == 1 && $joomFishManager->getCfg( 'mbfupgradeDone' ) ) {
			$oldInstall = 2;
		}
		
		return $oldInstall;
	}
	
	/**
	 * Upgrades the database tables from one version to another
	 *
	 * @param int $backupTables
	 * @param int $renameTables
	 * @return array	sumamry Information
	 * 
	 */
	function _upgradeInstallation( $backupTables, $renameTables ) {
		global $database;
		
		$summary = array();
		$summary['state'] = false;
		// Default values
		$summary['mbf_module_unpublished'] = false;
		$summary['mbf_module_unpublished_error'] = '';
		$summary['mbf_bot_unpublished'] = false;
		$summary['mbf_bot_unpublished_error'] = '';
		$summary['jf_content_backup'] = false;
		$summary['jf_content_backup_error'] = '';
		$summary['jf_languages_backup'] = false;
		$summary['jf_languages_backup_error'] = '';
		$summary['jf_content_deleted'] = false;
		$summary['jf_content_deleted_error'] = '';
		$summary['jf_content_copied'] = false;
		$summary['jf_content_copied_error'] = '';
		$summary['jf_languages_deleted'] = false;
		$summary['jf_languages_deleted_error'] = '';
		$summary['jf_languages_copied'] = false;
		$summary['jf_languages_copied_error'] = '';
		
		// unpublish mambelfish mambots and modules
		$database->setQuery( "UPDATE #__modules SET published = 0 WHERE LOWER(module) = 'mod_mambelfish'");
		if( !$summary['mbf_module_unpublished'] = $database->query() ) {
			$summary['mbf_module_unpublished_error'] = $database->getErrorMsg();
			return $summary;
		}
		$database->setQuery( "UPDATE #__mambots SET published = 0 WHERE LOWER(element) = 'mbfcontent.searchbot'");
		if( !$summary['mbf_bot_unpublished'] = $database->query() ) {
			$summary['mbf_bot_unpublished_error'] = $database->getErrorMsg();
			return $summary;
		}

		
		if( $backupTables ) {
			// renaming existing JoomFish tables
			$database->setQuery( 'DROP TABLE IF EXISTS #__jf_content_bak;');
			$database->query();
			
			$sql = "CREATE TABLE `#__jf_content_bak` ("
				. "\n `id` int( 10 ) unsigned NOT NULL AUTO_INCREMENT ,"
				. "\n `language_id` int( 11 ) NOT NULL default '0',"
				. "\n `reference_id` int( 11 ) NOT NULL default '0',"
				. "\n `reference_table` varchar( 100 ) NOT NULL default '',"
				. "\n `reference_field` varchar( 100 ) NOT NULL default '',"
				. "\n `value` text NOT NULL ,"
				. "\n `original_value` varchar( 255 ) default NULL ,"
				. "\n `modified` datetime NOT NULL default '0000-00-00 00:00:00',"
				. "\n `modified_by` int( 11 ) unsigned NOT NULL default '0',"
				. "\n `published` tinyint( 1 ) unsigned NOT NULL default '0',"
				. "\n PRIMARY KEY ( `id` )"
				. "\n )";
			$database->setQuery( $sql );
			if( !$summary['jf_content_backup'] = $database->query() ) {
				$summary[ 'jf_content_backup_error' ] = $database->getErrorMsg();
				return $summary;
			}
			
			$sql = "INSERT INTO `#__jf_content_bak` SELECT * FROM `#__jf_content`";
			$database->setQuery( $sql );
			if( !$summary['jf_content_backup'] = $database->query() ) {
				$summary[ 'jf_content_backup_error' ] = $database->getErrorMsg();
				return $summary;
			}

			// language table update
			$database->setQuery( 'DROP TABLE IF EXISTS #__languages_bak;');
			$database->query();
			
			$sql = "CREATE TABLE `#__languages_bak` ("
				. "\n `id` int(11) NOT NULL auto_increment,"
				. "\n `name` varchar(100) NOT NULL default '',"
				. "\n `active` tinyint(1) NOT NULL default '0',"
				. "\n `iso` varchar(10) default NULL,"
				. "\n `code` varchar(20) NOT NULL default '',"
				. "\n `image` varchar(100) default NULL,"
				. "\n `ordering` int(11) NOT NULL default '0',"
				. "\n PRIMARY KEY ( `id` )"
				. "\n )";
			$database->setQuery( $sql );
			if( !$summary['jf_languages_backup'] = $database->query() ) {
				$summary[ 'jf_languages_backup_error' ] = $database->getErrorMsg();
				return $summary;
			}
			
			$sql = "INSERT INTO `#__languages_bak` SELECT * FROM `#__languages`";
			$database->setQuery( $sql );
			if( !$summary['jf_languages_backup'] = $database->query() ) {
				$summary[ 'jf_languages_backup_error' ] = $database->getErrorMsg();
				return $summary;
			}
		}
		
		$database->setQuery( "SHOW TABLES LIKE '%mbf_%'" );
		$database->query();
		$rows = $database->loadResultArray();
		$oldContentTable = '';
		$oldLanguageTable = '';
		foreach ($rows as $row) {
			if( ereg( 'mbf_content', $row ) ) {
				$oldContentTable = $row;
			} elseif ( ereg( 'mbf_language', $row ) ) {
				$oldLanguageTable = $row;
			}
		}
		
		if( $oldContentTable != '' ) {
			// Delete existing records
			$database->setQuery( 'DELETE FROM #__jf_content');
			if( !$summary['jf_content_deleted'] = $database->query() ) {
				$summary[ 'jf_content_deleted_error' ] = $database->getErrorMsg();
				return $summary;
			}
			
	         // copy data over (doing md5 at the same time!)
			$database->setQuery( "INSERT INTO #__jf_content "
				. "\n(id, language_id, reference_id, reference_table, reference_field, value, original_value, modified, modified_by, published)"
				. "\n SELECT id, language_id, reference_id,  reference_table, reference_field, value, md5(original_value), modified, modified_by, published"
				. "\nFROM " .$oldContentTable );
			if( !$summary['jf_content_copied'] = $database->query() ) {
				$summary[ 'jf_content_copied_error' ] = $database->getErrorMsg();
				return $summary;
			}

			$summary['state'] = true;
		}
		
		if( $oldLanguageTable != '' ) {
			// Delete existing records
			$database->setQuery( 'DELETE FROM #__languages');
			if( !$summary['jf_languages_deleted'] = $database->query() ) {
				$summary[ 'jf_languages_deleted_error' ] = $database->getErrorMsg();
				return $summary;
			}
			
	         // copy data over (doing md5 at the same time!)
			$database->setQuery( "INSERT INTO #__languages "
				. "\n(`id`, `name`, `active`, `iso`, `code`, `image`, `ordering`)"
				. "\n SELECT `id`, `name`, `active`, `iso`, `mambo`, `image`, `ordering`"
				. "\nFROM " .$oldLanguageTable );
			if( !$summary['jf_languages_copied'] = $database->query() ) {
				$summary[ 'jf_languages_copied_error' ] = $database->getErrorMsg();
				return $summary;
			}

			$summary['state'] = true;
		}		
		return $summary;
	}
}


$tasker =& new joomfishTasker();
$tasker->performTask( mosGetParam( $_REQUEST, 'act', '') );
$tasker->redirect();


/**
 * Preparation for the component configuration
 */
function showComponentConfiguration( $joomFishManager ) {
	global $mosConfig_absolute_path, $database;
	
	// Read the languages dir to find new installed languages
	$languageBaseDir = mosPathName(mosPathName($mosConfig_absolute_path) . "language");
	$xmlFilesInDir = mosReadDirectory($languageBaseDir,".xml");

	$dirName = $languageBaseDir;
	$activeFiles = null;

	// XML library
	global $mosConfig_absolute_path;
	require_once( $mosConfig_absolute_path . "/includes/domit/xml_domit_lite_include.php" );
	
	//mosDebugVar($xmlFilesInDir);
	foreach($xmlFilesInDir as $xmlfile) {
		// Read the file to see if it's a valid template XML file
		$xmlDoc =& new DOMIT_Lite_Document();
		$xmlDoc->resolveErrors( true );
		if (!$xmlDoc->loadXML( $dirName . $xmlfile, false, true )) {
			continue;
		}

		$element = &$xmlDoc->documentElement;

		if ($element->getTagName() != 'mosinstall') {
			continue;
		}
		if ($element->getAttribute( "type" ) != "language") {
			continue;
		}

		$languages = array();
		$langFiles = mosReadDirectory( $mosConfig_absolute_path . '/components/com_joomfish/language/' );
		foreach($langFiles as $file ) {
			if( $pos = strpos( $file, '.php') ) {
				$langName = substr( $file, 0, $pos );
				$languages[] = mosHTML::makeOption( $langName, ucfirst( $langName ) );
			}
		}
	}
	
	HTML_joomfish::showComponentConfiguration( $joomFishManager, $languages);
}

/**
 * Helperfunction to retriev the language information from the XML files
 */
function getLanguageFromXML( $xmlfile ) {
	global $mosConfig_absolute_path, $database;

	// Read the language dir to find languages
	$languageBaseDir = mosPathName(mosPathName($mosConfig_absolute_path) . "language");
	$dirName = $languageBaseDir;

	// XML library
	require_once( $mosConfig_absolute_path . "/includes/domit/xml_domit_lite_include.php" );
	
	$xmlDoc =& new DOMIT_Lite_Document();
	$xmlDoc->resolveErrors( true );
	if ($xmlDoc->loadXML( $dirName . $xmlfile, false, true )) {
		$lang = new jfLanguage($database);
		$lang->code = substr($xmlfile,0,-4);
		$element = &$xmlDoc->getElementsByPath('name', 1);
		$lang->name = $element->getText();
		$lang->active=false;
	}
	return $lang;
}

/** Presentation of the content element list
 */
function showElementOverview( $joomFishManager, $option ) {
	global $database, $mainframe, $joomFishManager;

	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
	$search = $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
	$search = $database->getEscaped( trim( strtolower( $search ) ) );

	require_once("includes/pageNavigation.php");
	$total=count($joomFishManager->getContentElements());
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	HTML_joomfish::showElementOverview( $joomFishManager, $option, $search, $pageNav );
}

/** Detailinformation about one specific content element */
function showElementConfiguration( $joomFishManager, $id ) {
	global $database, $mainframe, $joomFishManager;

	HTML_joomfish::showElementConfiguration( $joomFishManager, $id );
}

/** Presentation of the content's that must be translated
 */
function showTranslationOverview( $joomFishManager, $language_id, $catid ) {
	global $database, $mainframe, $option;

	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
	$search = $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
	$search = $database->getEscaped( trim( strtolower( $search ) ) );

	// Build up the rows for the table
	$rows=null;
	$total=0;
	$filterHTML=array();
	if( isset($catid) && $catid!="" ) {
		$contentElement = $joomFishManager->getContentElement( $catid );
		$tranFilters = getTranslationFilters($catid,$contentElement);

		$database->setQuery( $contentElement->createContentSQL( $language_id, null, -1, -1, $tranFilters ) );
		$result = $database->loadObjectList();
		echo $database->getErrorMsg();		
		$total = count( $result );		
		
		$database->setQuery( $contentElement->createContentSQL( $language_id, null, $limitstart, $limit,$tranFilters ) );
		$rows = $database->loadObjectList();
		if ($database->getErrorNum()) {
			echo $database->stderr();
			return false;
		}
		//$total = count($rows);
		
		/*
		$database->setQuery( $contentElement->countContentSQL($language_id) );
		$result = $database->loadObjectList();
		echo $database->getErrorMsg();		
		$total = count( $result );
		*/
		
		// Manipulation of result based on further information
		for( $i=0; $i<count($rows); $i++ ) {
			$contentObject = new ContentObject( $language_id, $contentElement );
			$contentObject->readFromRow( $rows[$i] );
			$rows[$i] = $contentObject;
		}

		foreach ($tranFilters as $tranFilter){
			$afilterHTML=$tranFilter->_createFilterHTML();
			if (isset($afilterHTML)) $filterHTML[] = $afilterHTML;
		}

	}
	
	require_once("includes/pageNavigation.php");
	$pageNav = new mosPageNav( $total, $limitstart, $limit );
	
	// get list of active languages
	$langOptions[] = mosHTML::makeOption( '-1', _JOOMFISH_SELECT_LANGUAGES );
	$langOptions[] = mosHTML::makeOption( 'NULL', _JOOMFISH_SELECT_NOTRANSLATION );
	
	$langActive = $joomFishManager->getActiveLanguages();
	
	if ( count($langActive)>0 ) {
		foreach( $langActive as $language )
		{
			$langOptions[] = mosHTML::makeOption( $language->id, $language->name );
		}
	}
	$langlist = mosHTML::selectList( $langOptions, 'select_language_id', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $language_id );

	// get list of element names
	$elementNames[] = mosHTML::makeOption( '', _JOOMFISH_SELECT_ELEMENTS );
	//$elementNames[] = mosHTML::makeOption( '-1', '- All Content elements' );
	$elements = $joomFishManager->getContentElements();
	foreach( $elements as $key => $element )
	{
		$elementNames[] = mosHTML::makeOption( $key, $element->Name );
	}
	$clist = mosHTML::selectList( $elementNames, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $catid );
	
	HTML_joomfish::showTranslationOverview( $rows, $search, $pageNav, $langlist, $clist, $catid ,$filterHTML );
}

/** Details of one content for translation
 */
function editTranslation( $joomFishManager, $language_id, $catid, $contentid, $select_language_id ) {
	global $database, $mainframe, $my,$mosConfig_live_site;
	$actContentObject=null;
	
	if( isset($catid) && $catid!="" ) {
		$contentElement = $joomFishManager->getContentElement( $catid );
		$actContentObject = new ContentObject( $language_id, $contentElement );
		$actContentObject->loadFromContentID( $contentid );
	}

	// fail if checked out not by 'me'
	if ($actContentObject->checked_out && $actContentObject->checked_out <> $my->id) {
		mosRedirect( "index2.php?option=option=com_joomfish&act=translate",
		"The content item $actContentObject->title is currently being edited by another administrator" );
	}
	
	// get list of active languages
	$langOptions[] = mosHTML::makeOption( 'NULL', _JOOMFISH_SELECT_NOTRANSLATION );
	
	$langActive = $joomFishManager->getActiveLanguages();
	
	if ( count($langActive)>0 ) {
		foreach( $langActive as $language )
		{
			$langOptions[] = mosHTML::makeOption( $language->id, $language->name );
		}
	}
	$langlist = mosHTML::selectList( $langOptions, 'language_id', 'class="inputbox" size="1"', 'value', 'text', $actContentObject->language_id );

	// get existing filters so I can remember them!
	$tranFilters = getTranslationFilters($catid,$contentElement);
	
	HTML_joomfish::showTranslation( $actContentObject, $langlist, $catid, $select_language_id , $tranFilters);
}

/** Saves the information of one translation
 */
function saveTranslation( $joomFishManager, $language_id, $catid, $id, $mbfc_id ) {
	global $database, $mainframe;
	$actContentObject=null;
	
	if( isset($catid) && $catid!="" ) {
		$contentElement = $joomFishManager->getContentElement( $catid );
		$actContentObject = new ContentObject( $language_id, $contentElement );
		$actContentObject->bind( $_POST );
		$actContentObject->store();
	}
}

/**
 * Reload all translations and publish/unpublish them
 */
function publishTranslation( $joomFishManager, $catid, $cid, $publish ) {
	foreach( $cid as $cid_row ) {
		list($contentid, $language_id) = explode('|', $cid_row);
		
		$contentElement = $joomFishManager->getContentElement( $catid );
		$actContentObject = new ContentObject( $language_id, $contentElement );
		$actContentObject->loadFromContentID( $contentid );
		if( $actContentObject->state>=0 ) {
			$actContentObject->setPublished($publish);
			$actContentObject->store();
		}
	}
}

/**
 * Deletes the selected translations (only the translations of course)
 */
function removeTranslation( $joomFishManager, $catid, $cid ) {
	foreach( $cid as $cid_row ) {
		list($contentid, $language_id) = explode('|', $cid_row);

		$contentElement = $joomFishManager->getContentElement( $catid );
		$actContentObject = new ContentObject( $language_id, $contentElement );
		$actContentObject->loadFromContentID( $contentid );
		$actContentObject->delete();
	}
}

/**
 * Sets up ContentElement Cache - mainly used for data to determine primary key id for tablenames ( and for
 * future use to allow tables to be dropped from translation even if contentelements are installed )
 */
function setupContentElementCache()
{
	global $database,$joomFishManager ;
	// Make usre table exists otherwise create it.
	$database->setQuery( "CREATE TABLE IF NOT EXISTS `#__jf_tableinfo` ( `id` int(11) NOT NULL auto_increment, `joomlatablename` varchar(100) NOT NULL default '',  `tablepkID`  varchar(100) NOT NULL default '', PRIMARY KEY (`id`)) TYPE=MyISAM");
	$database->query();
	// clear out existing data
	$database->setQuery( "DELETE FROM `#__jf_tableinfo`");
	$database->query();	
	$contentElements = $joomFishManager->getContentElements();
	$sql = "INSERT INTO `#__jf_tableinfo` (joomlatablename,tablepkID) VALUES ";
	$firstTime = true;
	foreach ($contentElements as $contentElement){
		$tablename = $contentElement->getTableName();
		$refId = $contentElement->getReferenceID();
		$sql .= $firstTime?"":",";
		$sql .= " ('".$tablename."', '".$refId."')";
		$firstTime = false;
	}
	
	$database->setQuery( $sql);
	$database->query();

}
?>
