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


// Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );


/**
 * The JoomFishManager controls all important configuration and information
 * of the content elements. These information might be cached in the session
 * settings if necessary in furture.
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
*/
class JoomFishManager {
	/** Array of all known content elements and the reference to the XML file */
	var $_contentElements;
	
	/** Path to the administration dir of the component */
	var $_adminPath='';
	
	/** string Content type which can use default values */
	var $DEFAULT_CONTENTTYPE="content";
	
	/** @var config Configuration of the map */
	var $_config=null;

	/**	PrimaryKey Data */
	var $_primaryKeys = null;
	
	/** Standard constructor */
	function JoomFishManager($adminPath=null) {
		global $mosConfig_absolute_path, $mosConfig_admin_path;
		if( $adminPath===null ) {
			$adminPath = dirname( __FILE__ );
		}
		$this->_adminPath = $adminPath;
		
		$this->_loadConfiguration( $adminPath );
		//$this->_loadContentElements( $adminPath );
		$this->_loadPrimaryKeyData();
	}
	
	/** Loading of component configuration
	*/
	function _loadConfiguration() {
		$this->_config = new stdClass();
		require( "$this->_adminPath/config.joomfish.php" );
		$this->_config->componentAdminLang = $joomfish_componentAdminLang;
		$this->_config->noTranslation = $joomfish_noTranslation;
		$this->_config->defaultText = $joomfish_defaultText;
		$this->_config->frontEndPublish = $joomfish_frontEndPublish;
		$this->_config->mbfupgradeDone = $joomfish_mbfupgradeDone;
	}

	/**
	 * Load Primary key data from database
	 *
	 */
	function _loadPrimaryKeyData() {
		if ($this->_primaryKeys==null){
			global $database;
			$database->setQuery( "SELECT joomlatablename,tablepkID FROM `#__jf_tableinfo`");
			$rows = $database->loadObjectList();
			$this->_primaryKeys = array();
			if( $rows ) {
				foreach ($rows as $row) {
					$this->_primaryKeys[$row->joomlatablename]=$row->tablepkID;
				}
			}

		}
	}
	
	/**
	 * Get primary key given table name
	 *
	 * @param string $tablename
	 * @return string primarykey
	 */
	function getPrimaryKey($tablename){
		if ($this->_primaryKeys==null) $this->_loadPrimaryKeyData();		
		if (array_key_exists($tablename,$this->_primaryKeys)) return $this->_primaryKeys[$tablename];
		else return "id";
	}
	
	/**
	 * Saving of the file based configurations
	 */
	function saveConfiguration () {
		global $option;
		
		$configfile = "$this->_adminPath/config.joomfish.php";
		@chmod ($configfile, 0766);
		$permission = is_writable($configfile);
		if (!$permission) {
			$mosmsg = _JOOMFISH_CONFIG_WRITE_ERROR;
			return false;
		}
		
		$config = "<?php\n";
		$config .= '$joomfish_componentAdminLang =   "' .$this->_config->componentAdminLang. '";			// Which language the component admini should have' ."\n";
		$config .= '$joomfish_noTranslation = ' .$this->_config->noTranslation. ';			// What to show when no translation available' ."\n";
		$config .= '$joomfish_defaultText = "' .$this->_config->defaultText. '";		// Standard text if no translation - only for certain content elements!' ."\n";
		$config .= '$joomfish_frontEndPublish = "' .$this->_config->frontEndPublish. '";			// Whether publishers and above can publish from the frontend' ."\n";
		$config .= '$joomfish_mbfupgradeDone = "' .$this->_config->mbfupgradeDone. '";			// Flag showing if the upgrade was done already. modify manually if you need to do the upgrade again' ."\n";
		$config .= "?>";
		
		if ($fp = fopen("$configfile", "w")) {
			fputs($fp, $config, strlen($config));
			fclose ($fp);
		}
		$this->_loadConfiguration( $this->_adminPath );
		
		return true;
	}
		
	/** Loading of related XML files
	*/
	function _loadContentElements() {
		// XML library
		global $mosConfig_absolute_path;
		require_once( $mosConfig_absolute_path . "/includes/domit/xml_domit_lite_include.php" );
		
		// Try to find the XML file
		$filesindir = mosReadDirectory($this->_adminPath ."/contentelements" ,".xml");
		if(count($filesindir) > 0)
		{
			foreach($filesindir as $file)
			{
				$xmlDoc =& new DOMIT_Lite_Document();
				$xmlDoc->resolveErrors( true );
				if ($xmlDoc->loadXML( $this->_adminPath . "/contentelements/" . $file, false, true )) {
					$element = &$xmlDoc->documentElement;
					if ($element->getTagName() == 'joomfish') {
						if ( $element->getAttribute('type')=='contentelement' ) {
							$nameElements =& $element->getElementsByTagName('name', 1);
							$nameElement =& $nameElements->item(0);
							$name = strtolower( trim($nameElement->getText()) );
							$contentElement =& new ContentElement( $xmlDoc );
							$this->_contentElements[$contentElement->getTableName()] =& $contentElement;
						}
					}
				}
			}
		}
	}

	function getContentElements() {
		if( !isset( $this->_contentElements ) ) {
			$this->_loadContentElements();
		}
		return $this->_contentElements;
	}
	
	/** gives you one content element
	 * @param	key 	of the element
	*/
	function getContentElement( $key ) {
		if( !isset($this->_contentElements) ) {
			$this->_loadContentElements();
		}

		$element = null;
		if( array_key_exists( strtolower($key), $this->_contentElements ) ) {
			$element = $this->_contentElements[ strtolower($key) ];
		}
		return $element;
	}
	
	/**
	* @param string The name of the variable (from configuration.php)
	* @return mixed The value of the configuration variable or null if not found
	*/
	function getCfg( $varname ) {
		if (isset( $this->_config->$varname )) {
			return $this->_config->$varname;
		} else {
			return null;
		}
	}
	
	/**
	* @param string The name of the variable (from configuration.php)
	* @param mixed The value of the configuration variable
	*/
	function setCfg( $varname, $newValue ) {
		if (isset( $this->_config->$varname )) {
			$this->_config->$varname = get_magic_quotes_gpc() ? stripslashes($newValue) : $newValue;
		}
	}
	
	/** Creates an array with all the active languages for the JoomFish
	 *
	 * @return	Array of languages
	 */
	function getActiveLanguages() {
		global $database;
		$langActive=null;
		
		$database->setQuery( 'SELECT * FROM #__languages WHERE active=1 order by ordering' );
		$rows = $database->loadObjectList('id',false);
		if( $rows ) {
			foreach ($rows as $row) {
				$lang = new jfLanguage($database);
				$lang->bind($row);
				
				$langActive[] = $lang;
			}
		}
		
		return $langActive;
	}
	
	/** Retrieves the language ID from the given language name
	 *
	 * @param	string	Code language name (normally $mosConfig_lang
	 * @return	int 	Database id of this language
	 */
	function getLanguageID( $codeLangName="" ) {
		global $database;
		$langID = -1;
		if ($codeLangName != "" ) {
			$database->setQuery( "SELECT id FROM #__languages WHERE active=1 and code = '$codeLangName'order by ordering" );
			$langID = $database->loadResult(false);
		}
		return $langID;
	}
	
	
	/** Delivers the actual version of the component
	*/
	function getVersion() {
		return "V1.7 (2006-05-01)";
	}
	
	function getVersionFooter() {
		return "1.7";
	}

}

/**
 * Content element class based on the xml file
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
 */
class ContentElement extends StdClass {
	var $_xmlFile;
	var $checked_out=false;
	var $Name='';
	var $Author='';
	var $Version='';
	var $Description='';
	var $PrimaryKey = "id";
	
	var $referenceInformation;

	/**	field (if any) that keyword	filters apply to*/
	var $_keywordFilter=null;
	var $_categoryFilter=null;
	var $_authorFilter=null;
	
	
	/** Standard constructor, which loads already standard information
	 * for easy and direct access
	*/
	function ContentElement ( $xmlDoc ) {
		$this->_xmlFile = $xmlDoc;
		
		if( isset($this->_xmlFile) ) {
			$valueElement = $this->_xmlFile->getElementsByPath('name', 1);
			$this->Name = trim($valueElement->getText());
			
			$valueElement = $this->_xmlFile->getElementsByPath('author', 1);
			$this->Author = trim($valueElement->getText());
			
			$valueElement = $this->_xmlFile->getElementsByPath('version', 1);
			$this->Version = trim($valueElement->getText());
			
			$valueElement = $this->_xmlFile->getElementsByPath('description', 1);
			$this->Description = trim($valueElement->getText());
		}
	}
	
	/** Type of reference
	*/
	function getReferenceType() {
		if( !isset($this->referenceInformation["type"]) && isset($this->_xmlFile) ) {
			$tableElement = $this->_xmlFile->getElementsByPath('reference', 1);
			$tableName = trim($tableElement->getAttribute( 'type' ));
			$this->referenceInformation["type"] = $tableName;
		}
		
		return $this->referenceInformation["type"];
	}

	/**
	 * Public function to return array of filters included in contentelement file
	 */
	function getAllFilters(){
		$allFilters = array();
		if(isset($this->_xmlFile) ) {
			$fElement = $this->_xmlFile->getElementsByPath('translationfilters', 1);
			if (!isset($fElement) || !$fElement->hasChildNodes()){
				return $allFilters;			
			}			
			foreach ($fElement->childNodes as $child){
				$type = $child->nodeName;
				$filter = "_$type"."Filter";
				$this->$filter=$child->getText();
				$allFilters[$type]=trim($this->$filter);
			}
		}
		return $allFilters;			
		
	}

	/**
	 * function that returns filter string and handles getting filter info from xmlfile if needed
	 *
	 */
	function getFilter($type){
		$filter = "_$type"."Filter";
		if( !isset($this->$filter) && isset($this->_xmlFile) ) {
			$fElement = $this->_xmlFile->getElementsByPath('translationfilters/'.$type, 1);
			if (!isset($fElement)){
				$this->$filter=false;
				return $this->$filter;			
			}			
			$this->$filter=trim($fElement->getText());
		}
		return $this->$filter;
		
	}
	
	/**
	 * returns translation filter keyword field (if any)
	 */
	function getKeywordFilter() {
		return $this->_getFilter("keyword");
	}
	
	/**
	 *  returns category filter fieldname (if any)
	 */
	function getCategoryFilter() {
		return $this->_getFilter("category");			
	}
	
	/**
	 *  returns author filter fieldname (if any)
	 */
	function getAuthorFilter() {
		return $this->_getFilter("author");				
	}

	/** Name of the refering table
	*/
	function getTableName() {
		if( !isset($this->referenceInformation["tablename"]) && isset($this->_xmlFile) ) {
			$tableElement = $this->_xmlFile->getElementsByPath('reference/table', 1);
			$tableName = trim($tableElement->getAttribute( 'name' ));
			$this->referenceInformation["tablename"] = $tableName;
		}
		
		return $this->referenceInformation["tablename"];
	}

	/**
	 * Name of reference id (in other words the primary key)
	 */
	function getReferenceId() {
		if( isset($this->referenceInformation["tablename"]) && isset($this->_xmlFile) ) {
			$tableElement = $this->_xmlFile->getElementsByPath('reference/table', 1);
			$tableFields = $tableElement->getElementsByTagName('field');
			$tableFields = $tableFields->toArray();

			foreach ($tableFields as $field) {
				if (trim($field->getAttribute('type'))=="referenceid") {
					$refid = trim($field->getAttribute('name'));
					if ($refid!=null) return $refid;
					else return "id";
				}
			}
		}
		return "id";	
	}
	
	
	/** Array of the field elements in the table
	*/
	function & getTable() {
		if( !isset($this->referenceInformation["table"]) && isset($this->_xmlFile) ) {
			$tableElement = $this->_xmlFile->getElementsByPath('reference/table', 1);
			
			$this->referenceInformation["table"] = new ContentElementTable( $tableElement );
		}
		
		return $this->referenceInformation["table"];
	}
	
	/** Generating the sql statement to retrieve the information
	 * from the database
	 */
	function createContentSQL( $idLanguage=-1, $contentid=null, $limitStart=-1, $maxRows=-1 , $filters=array()) {
		$sqlFields=null;
		$where=array();
		$order=null;
		$join=null;
		$contentTable = $this->getTable();
		foreach ($filters as $filter) {
			$sqlFilter= $filter->_createFilter($this);
			if ($sqlFilter!="") $where[]=$sqlFilter;
		}
		foreach( $contentTable->Fields as $tableField ) {
			// Based on the types we might want to have special names ;-)
			switch ($tableField->Type) {
				case "referenceid":
					$contentid_exist = (isset($contentid) && $contentid!=-1 ); 
					if( strtolower($tableField->Name) != "id" ) {
						$sqlFields[] = 'c.' .$tableField->Name. ' as id';
						if( $contentid_exist) $where[] = 'c.' .$tableField->Name. '=' .$contentid ;
					}
					else {
						if( $contentid_exist ) $where[] = 'c.id=' .$contentid ; 
					}
					$join[] = 'c.' .$tableField->Name. '=jfc.reference_id';
					break;
				case "titletext":
					if( strtolower($tableField->Name) != "title" ) {
						$sqlFields[] = 'c.' .$tableField->Name. ' as title';
					}
					$join[] = "jfc.reference_field='" .$tableField->Name. "'";
					$order[] = 'c.' .$tableField->Name;
					break;
				case "modified_date":
					if( strtolower($tableField->Name) != "modified_date" ) {
						$sqlFields[] = 'c.' .$tableField->Name. ' as modified_date';
					}
					break;
				case "checked_out_by":
					if( strtolower($tableField->Name) != "check_out" ) {
						$sqlFields[] = 'c.' .$tableField->Name. ' as check_out';
					}
					break;
			}

			// I want to have each field with his original name in the select
			// so the special fields will be only addon's!
			// Reason: To grap the data later it's more easy to refer to the original names of the XML file
			$sqlFields[] = 'c.' .$tableField->Name. '';
		}
		
		$sqlFields[] = "jfc.id as jfc_id";
		$sqlFields[] = "jfc.value as titleTranslation";
		$sqlFields[] = "jfc.modified as lastchanged";
		$sqlFields[] = 'jfc.published as published';
		$sqlFields[] = 'jfc.language_id';
		$sqlFields[] = 'jfl.name as language';
		$join[] = "jfc.reference_table='$contentTable->Name'";
		// Now redundant
		/*
		if( isset($contentid) && $contentid!=-1 ) {
			$where[] = 'c.id=' .$contentid;
		}
		*/
		if( isset($idLanguage) && $idLanguage!="" && $idLanguage!=-1 ) {
			if( $idLanguage=="NULL" ) {
				$where[] = "jfc.language_id IS NULL";
			} else {
				$join[] = "jfc.language_id=$idLanguage";
			}
		}

		if( $contentTable->Filter != '' ) {
			$where[] = $contentTable->Filter;
		}
		
		
		$sql = "SELECT " .implode( ', ', $sqlFields )
			. "\nFROM #__" .$contentTable->Name. ' as c'
			. "\nLEFT JOIN #__jf_content as jfc ON " .implode( ' AND ', $join )
			. "\nLEFT JOIN #__languages as jfl ON jfc.language_id=jfl.id"
			. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
			. (count( $order ) ? "\nORDER BY " . implode( ', ', $order ) : "");
		
		if( $limitStart!=-1 ) {
			$sql .= "\nLIMIT $limitStart, $maxRows";
		}
//echo "sql = >$sql<<br />";
		
		return $sql;
	}

	/** Generating the sql statement to count the information
	 */
	function countContentSQL($idLanguage=-1) {
		$contentTable = $this->getTable();
		$join=null;
		$where=null;
		$order=null;
		$group=null;
		
		foreach( $contentTable->Fields as $tableField ) {
			// Based on the types we might want to have special names ;-)
			if ( $tableField->Type == "referenceid" ) {
					$join[] = 'c.' .$tableField->Name. '=jfc.reference_id';
					$group[] = 'c.' .$tableField->Name;
					$group[] = "jfc.language_id";
			}
		}

		$sqlFields[] = "c.*, jfc.language_id";
		$join[] = "jfc.reference_table='$contentTable->Name'";
		if( isset($idLanguage) && $idLanguage!=-1 ) {
			if( $idLanguage=='NULL' ) {
				$where[] = "jfc.language_id IS NULL";
			} else {
				$join[] = "jfc.language_id=$idLanguage";
			}
		}
		
		if( $contentTable->Filter != '' ) {
			$where[] = $contentTable->Filter;
		}
		
		$sql = "SELECT " .implode( ', ', $sqlFields )
			. "\nFROM #__" .$contentTable->Name. ' as c'
			. "\nLEFT JOIN #__jf_content as jfc ON " .implode( ' AND ', $join )
			. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
			. (count( $group ) ? "\nGROUP BY " . implode( ', ', $group ) : "")
			. (count( $order ) ? "\nORDER BY " . implode( ', ', $order ) : "");

		return $sql;
	}
}

/**
 * Description of a content element table.
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
 */
class ContentElementTable {
	var $Name;
	var $Fields;
	var $Filter;
	
	/** Standard constructor
	*/
	function ContentElementTable( $tableElement ) {
		$this->Name = trim( $tableElement->getAttribute( 'name' ) );
		
		$tableFields = $tableElement->getElementsByTagName( 'field' );
		$tableFields = $tableFields->toArray();
		$this->Fields = null;
		foreach( $tableFields as $tablefieldElement ) {
			$this->Fields[] = new ContentElementTablefield( $tablefieldElement );
		}

		$filterElement = $tableElement->getElementsByPath('filter', 1);
		if( $filterElement ) {
			$this->Filter = $filterElement->getText();
		}
	}
	
	/** Retrieves one field based on the name
	 * @param	string	Fieldname
	 * @return	object	field
	 */
	function getField( $name ) {
		$ret_field = null;
		foreach( $this->Fields  as $field ) {
			if ($field->Name == $name ) {
				$ret_field = $field;
				break;
			}
		}
				
		return $ret_field;	
	}
}

/**
 * Description of a table field
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
 */
class ContentElementTablefield {
	var $Type='';
	var $Name='';
	var $Lable='';
	var $Translate=false;
	var $Option='';
	
	/** originalValue value of the corresponding content table */
	var $originalValue;

	/** translationContent reference to the actual translation db object */
	var $translationContent;

	/** changed Flag that says if a field is changed or not */
	var $changed=false;

	/** this Flag explains if the original is empty or not */
	var $originalEmpty=false;	

	/** Standard constructur
	*/
	function ContentElementTablefield( $tablefieldElement ) {
		$this->Type = trim( $tablefieldElement->getAttribute( 'type' ) );
		$this->Name = trim( $tablefieldElement->getAttribute( 'name' ) );
		$this->Lable = trim( $tablefieldElement->getText() );
		$this->Translate = trim( $tablefieldElement->getAttribute( 'translate' ) );
		$this->Option = trim( $tablefieldElement->getAttribute( 'option' ) );
	}
}

/**
 * Representation of one content with his translation.
 * The object includes information from the original object and
 * the refering translation. Based on that information it is
 * able to handle all necessary interactions with the tranlsation.
 * Each instance of this object represents only one translation in
 * on specified language, but it handles all the fields within the
 * ContentElement.
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
 */
class ContentObject {
	/** _contentElement Reference to the ContentElement definition of the instance */
	var $_contentElement;
	
	/** id ID of the based content */
	var $id;
	
	/** checked_out User who checked out this content if any */
	var $checked_out;
	
	/** title Title of the object; used from the field configured as titletext */
	var $title;
	
	/** titleTranslation the actual translation of the title */
	var $titleTranslation;
	
	/** language_id language for the translation */
	var $language_id;
	
	/** language Language name of the content */
	var $language;
	
	/** lastchanged Date when the translation was last modified */
	var $lastchanged;
	
	/** modified_date Date of the last modification of the content - if existing */
	var $modified_date;
	
	/** state State of the translation
	 * -1 := for at least one field of the content the translation is missing
	 *  0 := the translation exists but the original content was changed
	 *  1 := the translation is valid
	 */
	var $state=-1;
	
	/** @var int Number of changed fields */
	var $_numChangedFields=0;	
	/** @var int Number of new fields, with an original other than NULL */
	var $_numNewAndNotNullFields=0;	
	/** @var int Number for fields unchanged */
	var $_numUnchangedFields=0;
	
	/** published Flag if the translation is published or not */
	var $published=false;

	/** Standard constructor
	 *
	 * @param	languageID		ID of the associated language
	 * @param	elementTable	Reference to the ContentElementTable object
	 */
	function ContentObject( $languageID,& $contentElement, $id=-1 ) {
		global $database;
		
		if($id>0) $this->id = $id;
		$this->language_id = $languageID;
		$lang = new jfLanguage($database);
		$lang->load( $languageID );
		$this->language = $lang->name;
		$this->_contentElement = $contentElement;
	}
	
	/** Loads the information based on a certain content ID
	 */
	function loadFromContentID( $id=null ) {
		global $database;
		if( $id!=null ) {
			$database->setQuery( $this->_contentElement->createContentSQL( $this->language_id, $id ) );
			$row=null;
			$database->loadObject( $row );
			$this->id = $id;
			$this->readFromRow( $row );
		}
	}
	
	/** Reads the information from the values of the form
	 * The content element will be loaded first and then the values of the override
	 * what is actually in the element
	 * 
	 * @param	array	The values which should be bound to the object
	 * @param	string	The field prefix
	 * @param	string	An optional field 
	 */
	function bind( $formArray, $prefix="", $suffix="", $tryBind=true ) {
		global $my, $database;
		if( $tryBind ) {
			mosBindArrayToObject( $formArray, $this );
		}
		if( $this->published=="" ) $this->published=0;

		// Go thru all the fields of the element and try to copy the content values
		$elementTable =& $this->_contentElement->getTable();
		
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldName=$field->Name;
			if( isset($formArray[$prefix ."refField_". $fieldName .$suffix]) ) {
				$translationValue = $formArray[$prefix ."refField_". $fieldName .$suffix];
				$originalValue = $formArray[$prefix ."origValue_". $fieldName .$suffix];
				$fieldContent = new jfContent($database);
				mosBindArrayToObject( $formArray, $fieldContent );
				
				
				// code cleaner for xhtml transitional compliance
				if( $field->Type == 'titletext' || $field->Type == 'text') {
					$translationValue = ampReplace( $translationValue );
				}
				if( $field->Type == 'htmltext' ) {
					$translationValue = str_replace( '<br>', '<br />', $translationValue );

				 	// remove <br /> take being automatically added to empty fulltext
				 	$length	= strlen( $translationValue ) < 9;
				 	$search = strstr( $translationValue, '<br />');
				 	if ( $length && $search ) {
				 		$translationValue = NULL;
				 	}
				}
	
				
				$fieldContent->id=$formArray[$prefix . "id_" .$fieldName .$suffix];
				$fieldContent->reference_id = (intval($formArray[$prefix . "reference_id" .$suffix]) > 0) ? intval($formArray[$prefix . "reference_id" .$suffix]) : $this->id;
				$fieldContent->language_id = $this->language_id;
				$fieldContent->reference_table= $database->getEscaped( $elementTable->Name );
				$fieldContent->reference_field= $database->getEscaped( $fieldName );
				$fieldContent->value = (get_magic_quotes_gpc()) ? mosStripslashes( $translationValue ) : $translationValue;
				//$fieldContent->original_value = (get_magic_quotes_gpc()) ? stripslashes( $originalValue ) : $originalValue;
				// original value will be already md5 encoded - based on that any encoding isn't needed!
				$fieldContent->original_value = $originalValue;
				$fieldContent->modified = date( "Y-m-d H:i:s" );
				$fieldContent->modified_by = $my->id;
				$fieldContent->published=$this->published;
				$field->translationContent = $fieldContent;
			}
		}
	}
	
	/** Reads the information out of an existing mosDBTable object into the contentObject.
	 *
	 * @param	object	instance of an mosDBTable object
	 */
	function updateMLContent( &$dbObject ) {
		global $database, $my;
		if( $dbObject === null ) return;
		
		if( $this->published=="" ) $this->published=0;
		
		// retriev the original untranslated object for references
		// this MUST be copied by value and not by reference!
		$origObject = clone($dbObject);
		$key = $dbObject->get( '_tbl_key' );
		$database->setQuery( "SELECT * FROM " .$dbObject->get('_tbl'). " WHERE " .$key. "='" .$dbObject->$key. "'" );
		$database->loadObject( $origObject, false );
						
		// Go thru all the fields of the element and try to copy the content values
		$elementTable =& $this->_contentElement->getTable();
		
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldName=$field->Name;
			if( isset($dbObject->$fieldName) && $field->Translate ) {

				
				$translationValue = $dbObject->$fieldName;
				$fieldContent =& $field->translationContent;
				
				$fieldContent->value = $translationValue;
				$dbObject->$fieldName = $origObject->$fieldName;
				$fieldContent->original_value = md5( $origObject->$fieldName );

				$fieldContent->modified = date( "Y-m-d H:i:s" );
				$fieldContent->modified_by = $my->id;
			}
		}
	}
	
	/** Reads some of the information from the overview row
	 */
	function readFromRow( $row ) {
		$this->id = $row->id;
		$this->title = $row->title;
		$this->titleTranslation = $row->titleTranslation;
		if( !isset($this->language_id) || $this->language_id == -1 ) {
			$this->language_id = $row->language_id;
			$this->language = $row->language;
		}
		$this->lastchanged = $row->lastchanged;
		$this->published = $row->published;
		if( isset($row->modified_date) ) $this->modified_date = $row->modified_date;
		if( isset($row->checked_out) ) $this->checked_out = $row->checked_out;
		
		// Go thru all the fields of the element and try to copy the content values
		$elementTable =& $this->_contentElement->getTable();
		$fieldContent = new jfContent($database);
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldName = $field->Name;
			if( isset($row->$fieldName) ) {
				$field->originalValue = $row->$fieldName;
			}
		}
		
		
		$this->_loadContent();
	}
	
	/** Reads all translation information from the database
	 *
	 */
	function _loadContent() {
		global $database;
		
		$elementTable = $this->getTable();
		$sql = "select * "
				."\n  from #__jf_content"
				."\n where reference_id=" .$this->id
				."\n   and reference_table='" .$elementTable->Name. "'";
		if( isset($this->language_id) && $this->language_id!="" ) {
			$sql .= "\n   and language_id=" .$this->language_id;
		}
		
//echo "load sql=>$sql<<br />";
		$database->setQuery( $sql );
		$rows = $database->loadObjectList(false);
		echo $database->getErrorMsg();
		
		$translationFields=null;
		if( count($rows) > 0 ) {
			foreach( $rows as $row ) {
				$fieldContent = new jfContent($database);
				if( !$fieldContent->bind( $row ) ) {
					echo $fieldContent->getError();
				}
				$translationFields[$fieldContent->reference_field] = $fieldContent;
			}
		}
				
		// Check fields and their state
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			if( isset($translationFields[$field->Name]) ) {
				$fieldContent = $translationFields[$field->Name];
			} else {
				$fieldContent = null;
			}

			if( $field->Translate) {
				if(isset($fieldContent) ) {
					$field->changed= (md5($field->originalValue) != $fieldContent->original_value);
					if( $field->changed ) {
						$this->_numChangedFields ++;
					}
					else $this->_numUnchangedFields++;
				}
				else{
					$fieldContent = new jfContent($database);
					$fieldContent->reference_id = $this->id;
					$fieldContent->reference_table = $elementTable->Name;
					$fieldContent->reference_field = $field->Name;
					$fieldContent->language_id = $this->language_id;
					$fieldContent->original_value = $field->originalValue;
					$field->changed =false;
					if ( $field->originalValue != '' ) {
						$this->_numNewAndNotNullFields ++;
					}
				}
			}
			$field->translationContent = $fieldContent;
		}
		
		// Checking the record state based on the fields. If one field is changed the record is modifed
		if( $this->_numChangedFields == 0 && $this->_numNewAndNotNullFields == 0 ) {
			$this->state = 1;
		} elseif ( $this->_numChangedFields == 0 && $this->_numNewAndNotNullFields > 0 && $this->_numUnchangedFields==0) {
			$this->state = -1;
		} else {
			$this->state = 0;
		}
	}

	/** Returns the content element fields which are text and can be translated
	 *
	 * @param	boolean	onle translateable fields?
	 * @return	array	of fieldnames
	 */
	function getTextFields( $translation = true ) {
		$elementTable =& $this->_contentElement->getTable();
		$textFields = null;
		
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldType = $field->Type;
			if( $field->Translate == $translation && ($fieldType=="htmltext" || $fieldType=="text") ) {
				$textFields[] = $field->Name;
			}
		}
		
		return $textFields;
	}
	
	/**
	 * Returns the field type of a field
	 *
	 * @param string $fieldname
	 */
	function getFieldType($fieldname){
		$elementTable =& $this->_contentElement->getTable();
		$textFields = null;
		
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			if ($elementTable->Fields[$i]->Name == $fieldname) return $elementTable->Fields[$i]->Type;
		}		
		return "text";
	}
	
	/** Sets all fields of this content object to a certain published state
	*/
	function setPublished( $published ) {
		$elementTable =& $this->_contentElement->getTable();
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldContent =& $field->translationContent;
			$fieldContent->published = $published;
		}
	}
	
	/** Updates the reference id of all included fields. This
	 * Happens e.g when the reference object was created new
	 *
	 * @param	referenceID		new reference id
	 */
	function updateReferenceID( $referenceID ) {
		if( intval($referenceID) <= 0 ) return;
		
		$elementTable =& $this->_contentElement->getTable();
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldContent =& $field->translationContent;
			$fieldContent->reference_id = $referenceID;
		}
	}
	
	/** Stores all fields of the content element
	 */
	function store() {
		$elementTable =& $this->_contentElement->getTable();
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldContent =& $field->translationContent;
			
			if( $field->Translate ) {
				if( isset($fieldContent->reference_id) ) {
					if ( isset($fieldContent->value) && $fieldContent->value!='' ) {
						$fieldContent->store();
					} else {
						$fieldContent->delete();
					}
				}
			}
		}
	}
	
	/** Checkouts all fields of this content element
	*/
	function checkout( $who, $oid=null ) {
		$elementTable =& $this->_contentElement->getTable();
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldContent =& $field->translationContent;
			
			if( $field->Translate ) {
				if( isset($fieldContent->reference_id) ) {
					$fieldContent->checkout( $who, $oid );
					echo $fieldContent->getError();
				}
			}
		}
	}
	
	/** Checkouts all fields of this content element
	*/
	function checkin( $oid=null ) {
		$elementTable =& $this->_contentElement->getTable();
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldContent =& $field->translationContent;
			
			if( $field->Translate ) {
				if( isset($fieldContent->reference_id) ) {
					$fieldContent->checkin( $oid );
					echo $fieldContent->getError();
				}
			}
		}
	}
	
	/** Delets all translations (fields) of this content element
	*/
	function delete( $oid=null ) {
		$elementTable =& $this->_contentElement->getTable();
		for( $i=0; $i<count($elementTable->Fields); $i++ ) {
			$field =& $elementTable->Fields[$i];
			$fieldContent =& $field->translationContent;
			if( $field->Translate ) {
				if( isset($fieldContent->reference_id) ) {
					if( !$fieldContent->delete( $oid ) ) {
						echo $fieldContent->getError() ."<br />";
					}
				}
			}
		}
	}	
	/** Returns the content element table this content is based on
	 */
	function  getTable() {
		return $this->_contentElement->getTable();
	}
}



/**
 * Database class for handling the mambe fish contents
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
 */
class jfContent extends mosDBTable {
/** @var int Primary ke */
	var $id=null;
/** @var int Reference id for the language */
	var $language_id=null;
/** @var int Reference id for the original content */
	var $reference_id=null;
/** @var int Reference table of the original content */
	var $reference_table=null;
/** @var int Reference field of the original content */
	var $reference_field=null;
/** @var string translated value*/
	var $value=null;
/** @var string original value for equals check*/
	var $original_value=null;
/** @var int user that checked out the jfContent*/
//	var $checked_out=null;					// not yet supported
/** @var datetime time when the checkout was done*/
//	var $checked_out_time=null;			// not yet supported
/** @var date Date of last modification*/
	var $modified=null;
/** @var string Last translator*/
	var $modified_by=null;
/** @var boolean Flag of the translation publishing status*/
	var $published=false;

	/** Standard constructur
	*/
	function jfContent( &$db ) {
		$this->mosDBTable( '#__jf_content', 'id', $db );
	}
	
	/**
	 * Bind the content of the newValues to the object. Overwrite to make it possible
	 * to use also objects here
	 */
	function bind( $newValues ) {
		if (is_array( $newValues )) {
			return parent::bind( $newValues );
		} else {
			foreach (get_object_vars($this) as $k => $v) {
				if ( isset($newValues->$k) ) {
					$this->$k = $newValues->$k;
				}
			}
		}
		return true;
	}

	
	/**
	 * Validate language information
	 * Name and Code name are mandatory
	 * activated will automatically set to false if not set
	 */
	function check() {
		if (trim( $this->language_id ) == '') {
			$this->_error = _JOOMFISH_DBERR_NO_LANGUAGE;
			return false;
		}
		
		return true;
	}
	
	function toString() {
		$retString = "<p>content field:<br />";
		$retString .= "id=$this->id; language_id=$this->language_id<br>";
		$retString .= "reference_id=$this->reference_id, reference_table=$this->reference_table, reference_field=$this->reference_field<br>";
		$retString .= "value=>" .htmlspecialchars($this->value). "<<br />";
		$retString .= "original_value=>" .htmlspecialchars($this->original_value). "<<br />";
		$retString .="modified=$this->modified, modified_by=$this->modified_by, published=$this->published</p>";
		
		return $retString;
	}
}
/**
 * Database class for handling the languages within the component
 *
 * @package joomfish
 * @copyright 2003-2006 Think Network GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @version 1.0, 2003-10-16 $Revision: 1.6 $
 * @author Alex Kempkens <joomfish@thinknetwork.com>
 */
class jfLanguage extends mosDBTable {
/** @var int Primary key */
	var $id=null;
/** @var string The full name of the language*/
	var $name=null;
/** @var int Flag if the language is activated for this site*/
	var $active=false;
/** @var string iso name of the language*/
	var $iso=null;
/** @var string The name Joomla is using for this language*/
	var $code=null;
/** @var string Order of the languages within the lists*/
	var $ordering=0;
/** @var string Image reference if there is any*/
	var $image="";

	/** Standard constructur
	*/
	function jfLanguage( &$db ) {
		$this->mosDBTable( '#__languages', 'id', $db );
	}
	
	/**
	 *	Loads the language by it's iso name
	 *	@param string $iso iso name of the language
	 *	@return any result from the database operation
	 */
	function loadByJoomla( $code=null ) {
		$k = $this->_tbl_key;
		if ($code === null) {
			return false;
		}
		$this->_db->setQuery( "SELECT * FROM $this->_tbl WHERE code='$code'" );
		return $this->_db->loadObject( $this );
	}
	
	/**
	 *	Loads the language by it's iso name
	 *	@param string $iso iso name of the language
	 *	@return any result from the database operation
	 */
	function loadByISO( $iso=null ) {
		$k = $this->_tbl_key;
		if ($iso === null) {
			return false;
		}
		$this->_db->setQuery( "SELECT * FROM $this->_tbl WHERE iso='$iso'" );
		return $this->_db->loadObject( $this );
	}
	
	/**
	 * Validate language information
	 * Name and Code name are mandatory
	 * activated will automatically set to false if not set
	 */
	function check() {
		if (trim( $this->name ) == '') {
			$this->_error = "You must enter a name.";
			return false;
		}

		if (trim( $this->code ) == '') {
			$this->_error = "You must enter a corresponding language code.";
			return false;
		}

		// check for existing language code
		$this->_db->setQuery( "SELECT id FROM #__languages "
			. "\nWHERE code='$this->code' AND id!='$this->id'"
		);

		$xid = intval( $this->_db->loadResult() );
		if ($xid && $xid != intval( $this->id )) {
			$this->_error = "There is already a language with the code you provided, please try again.";
			return false;
		}
		
		return true;
	}

	/**
	 * Bind the content of the newValues to the object. Overwrite to make it possible
	 * to use also objects here
	 */
	function bind( $newValues ) {
		if (is_array( $newValues )) {
			return parent::bind( $newValues );
		} else {
			foreach (get_object_vars($this) as $k => $v) {
				if ( isset($newValues->$k) ) {
					$this->$k = $newValues->$k;
				}
			}
		}
		return true;
	}
}


function getTranslationFilters($catid, $contentElement)
{
	$filterNames=$contentElement->getAllFilters();
	$filters=array();
	foreach ($filterNames as $key=>$value){
		$filterType = "translation".ucfirst(strtolower($key))."Filter" ;
		global $mosConfig_absolute_path;
		$classFile = $mosConfig_absolute_path . "/administrator/components/com_joomfish/contentelements/$filterType.php" ;		
		if (!class_exists($filterType)){
			if (file_exists($classFile )) include_once($classFile);			
			if (!class_exists($filterType)) continue;
		}
		$filters[] =  new $filterType($contentElement);
	}
	return $filters;
}


class translationFilter
{
	var $filterNullValue;
	var $filterType;
	var $filter_value;
	var $filterField = false;
	var $tableName = "";
	var $filterHTML="";
	
	function translationFilter($contentElement){
		$this->filter_value = mosGetParam( $_REQUEST, $this->filterType.'_filter_value', $this->filterNullValue );		
		$this->tableName = $contentElement->getTableName();
	}
	
	function _createFilter(){
		if (!$this->filterField ) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
			$filter = "c.".$this->filterField."=$this->filter_value";
		}
		return $filter;
	}

	function _createfilterHTML(){ return "";}
}

class translationCategoryFilter extends translationFilter
{
	function translationCategoryFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="category";
		$this->filterField = $contentElement->getFilter("category");
		parent::translationFilter($contentElement);
	}
	

	/**
 * Creates category filter 
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		global $database;

		if (!$this->filterField) return "";
		$categoryOptions=array();
		$categoryOptions[] = mosHTML::makeOption( '-1',_JOOMFISH_ADMIN_CATEGORY_ALL );

		//	$sql = "SELECT c.id, c.title FROM #__categories as c ORDER BY c.title";
		$sql = "SELECT DISTINCT cat.id, cat.title FROM #__categories as cat, #__".$this->tableName." as c
			WHERE c.".$this->filterField."=cat.id ORDER BY cat.title";
		$database->setQuery($sql);
		$cats = $database->loadObjectList();
		$catcount=0;
		foreach($cats as $cat){
			$categoryOptions[] = mosHTML::makeOption( $cat->id,$cat->title);
			$catcount++;
		}
		$categoryList=array();
		$categoryList["title"]=_JOOMFISH_ADMIN_CATEGORY;
		$categoryList["html"] = mosHTML::selectList( $categoryOptions, 'category_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $categoryList;

	}

}

class translationAuthorFilter extends translationFilter
{
	function translationAuthorFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="author";
		$this->filterField = $contentElement->getFilter("author");
		parent::translationFilter($contentElement);
	}
	

	function _createfilterHTML(){
		global $database;

		if (!$this->filterField) return "";
		$AuthorOptions=array();
		$AuthorOptions[] = mosHTML::makeOption( '-1',_JOOMFISH_ADMIN_AUTHOR_ALL );

		//	$sql = "SELECT c.id, c.title FROM #__categories as c ORDER BY c.title";
		$sql = "SELECT DISTINCT auth.id, auth.username FROM #__users as auth, #__".$this->tableName." as c
			WHERE c.".$this->filterField."=auth.id ORDER BY auth.username";
		$database->setQuery($sql);
		$cats = $database->loadObjectList();
		$catcount=0;
		foreach($cats as $cat){
			$AuthorOptions[] = mosHTML::makeOption( $cat->id,$cat->username);
			$catcount++;
		}
		$Authorlist=array();
		$Authorlist["title"]=_JOOMFISH_ADMIN_AUTHOR;
		$Authorlist["html"] = mosHTML::selectList( $AuthorOptions, 'author_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $Authorlist;

	}

}


class translationKeywordFilter extends translationFilter
{
	function translationKeywordFilter($contentElement){
		$this->filterNullValue="";
		$this->filterType="keyword";
		$this->filterField = $contentElement->getFilter("keyword");
		parent::translationFilter($contentElement);
	}
	

	function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=""){
			$filter =  "LOWER(c.".$this->filterField." ) LIKE '%".$this->filter_value."%'";
		}
		return $filter;
	}

	/**
 * Creates Keyword filter 
 *
 * @param unknown_type $filtertype
 * @param unknown_type $contentElement
 * @return unknown
 */
	function _createfilterHTML(){
		global $database;

		if (!$this->filterField) return "";
		$Keywordlist=array();
		$Keywordlist["title"]=_JOOMFISH_ADMIN_KEYWORD;
		$Keywordlist["html"] = 	'<input type="text" name="keyword_filter_value" value="'.$this->filter_value.'" class="text_area" onChange="document.adminForm.submit();" />';

		return $Keywordlist;

	}

}

class translationModuleFilter  extends translationFilter
{
	function translationModuleFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="module";
		$this->filterField = $contentElement->getFilter("module");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		$filter = "c.".$this->filterField."<99";
		return $filter;
	}
	
	function _createfilterHTML(){
		return "";
	}	
}

class translationMenutypeFilter  extends translationFilter
{
	function translationMenutypeFilter ($contentElement){
		$this->filterNullValue="-+-+";
		$this->filterType="menutype";
		$this->filterField = $contentElement->getFilter("menutype");
		parent::translationFilter($contentElement);
	}

	function _createFilter(){
		if (!$this->filterField ) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue){
			$filter = "c.".$this->filterField."='".$this->filter_value."'";
		}
		return $filter;
	}

	function _createfilterHTML(){
		global $database;

		if (!$this->filterField) return "";
		$MenutypeOptions=array();
		$MenutypeOptions[] = mosHTML::makeOption( $this->filterNullValue,_JOOMFISH_ADMIN_MENUTYPE_ALL );

		$sql = "SELECT DISTINCT mt.menutype FROM #__menu as mt";
		$database->setQuery($sql);
		$cats = $database->loadObjectList();
		$catcount=0;		
		foreach($cats as $cat){
			$MenutypeOptions[] = mosHTML::makeOption( $cat->menutype,$cat->menutype);
			$catcount++;
		}
		$Menutypelist=array();
		$Menutypelist["title"]=_JOOMFISH_ADMIN_MENUTYPE;
		$Menutypelist["html"] = mosHTML::selectList( $MenutypeOptions, 'menutype_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $Menutypelist;

	}
}

/**
 * Look for unpublished translations - i.e. no translation or translation is unpublished 
 * Really only makes sense with a specific language selected
 *
 */

class translationPublishedFilter extends translationFilter
{
	function translationPublishedFilter ($contentElement){
		$this->filterNullValue=-1;
		$this->filterType="published";
		$this->filterField = $contentElement->getFilter("published");
		parent::translationFilter($contentElement);
	}
	
	function _createFilter(){
		if (!$this->filterField) return "";
		$filter="";
		if ($this->filter_value!=$this->filterNullValue && $this->filter_value==1){		
			$filter = "jfc.".$this->filterField."=$this->filter_value";
		}
		else if ($this->filter_value!=$this->filterNullValue){			
			$filter = " ( jfc.".$this->filterField."=$this->filter_value OR jfc.reference_field IS NULL ) ";
		}

		return $filter;
	}

	function _createfilterHTML(){
		global $database;

		if (!$this->filterField) return "";
		
		$PublishedOptions=array();
		$PublishedOptions[] = mosHTML::makeOption( -1,"both");
		$PublishedOptions[] = mosHTML::makeOption( 1,"published");
		$PublishedOptions[] = mosHTML::makeOption( 0,"unpublished");

		$publishedList=array();
		$publishedList["title"]=_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED;
		$publishedList["html"] = mosHTML::selectList( $PublishedOptions, 'published_filter_value', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->filter_value );

		return $publishedList;

	}

}

?>
