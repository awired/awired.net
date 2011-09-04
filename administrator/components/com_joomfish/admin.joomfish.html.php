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
$adminPath = dirname( __FILE__);

if (isset($joomFishManager)) $short_loc = $joomFishManager->getCfg( 'componentAdminLang' );
else $short_loc ="english";

if( file_exists( $adminPath . '/joomfish.help.inc_' . $short_loc . '.php' ) ){
        require_once( $adminPath . '/joomfish.help.inc_' . $short_loc . '.php' );
}else require_once( "$adminPath/joomfish.help.inc.php" );

class HTML_joomfish {

	function showWelcome() {
		HTML_joomfish_help::showWelcome();
	}		
	
	
	function showDinnermenu() {
		HTML_joomfish_help::showDinnermenu();
	}

	function showPostInstall() {
		HTML_joomfish_help::showPostInstall();
	}

	function showInformation( $fileCode='TN' ) {
		global $act, $task, $option, $mosConfig_absolute_path, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( 'Joom!Fish documentation', 'credits', '' );
		?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<h2>PREAMBLE</h2>
		The JoomFish is an extention for the open source CMS Joomla!.<br />
		Joomla! is Copyright (C) 2005 Open Source Matters. All rights reserved.<br />
		license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php<br />
		Joomla! is free software. This version may have been modified pursuant<br />
		to the GNU General Public License, and as distributed it includes or<br />
		is derivative of works licensed under the GNU General Public License or<br />
		other free or open source software licenses.<br />
		See /COPYRIGHT.php for copyright notices and details.<br />
		&nbsp;<br />
		Within this license the "product" refers to the name "Joom!Fish" or "Mambel Fish".<br />
		Also the term "Joom!Fish - Joomla! Babel Fish" must not be used by any derived software.
		
					<?php
			switch ( $fileCode ) {
				case "changelog":
					?>
					<h2>Changelog</h2>
					<?php
					echo nl2br(file_get_contents(dirname( __FILE__) ."/documentation/CHANGELOG.php"));
					break;
				
				case "license":
					?>
					<h2>Think Network Open Source License</h2>
					<?php
					echo nl2br(file_get_contents(dirname( __FILE__) ."/documentation/LICENSE.php"));
					break;
				
				case "readme":
				default:
					?>
					<h2>Read ME</h2>
					<?php
					echo nl2br(file_get_contents(dirname( __FILE__) ."/documentation/ReadMe.php"));
					break;
			}
			?>
		</td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
	</tr>
		<?php
		HTML_joomfish::_footer($act, $option);
  }		
	

	function showComponentConfiguration( $joomfishManager, $languageList) {
		global $act, $task, $option, $database, $mosConfig_lang, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_ADMIN_PREF_TITLE, 'config');
		?>
	    <tr>
	      <th colspan="3"><?php echo _JOOMFISH_ADMIN_COMPONENT_CONFIGURATION;?></th>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_COMPONENT_LANGUAGE;?></strong></td>
	      <td width="20%" align="left" valign="top">
	      <?php
	        $frmField = mosHTML::selectList( $languageList, 'frmComponentAdminLanguage', 'class="inputbox" size="1"', 'value', 'text', $joomfishManager->getCfg( 'componentAdminLang' ) );
	        echo $frmField;
	      ?>
			  </td>
		  <td align="left" valign="top">
		  	<?php $tip = _JOOMFISH_ADMIN_COMPONENT_CONFIGURATION_HELP;
			echo mosToolTip( $tip );
			?>
		  </td>
	    </tr>
	    <tr>
	      <th colspan="3"><?php echo _JOOMFISH_ADMIN_SHOWIF;?></th>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_NOTRANSLATION;?></strong></td>
	      <td width="20%" align="left" valign="top">
	      <?php
	        $options[] = mosHTML::makeOption( '0', _JOOMFISH_ADMIN_ORIGINAL_CONTENT );
	        $options[] = mosHTML::makeOption( '1', _JOOMFISH_ADMIN_PLACEHOLDER );
	        $options[] = mosHTML::makeOption( '2', _JOOMFISH_ADMIN_ORIGINAL_WITH_INFO ); // activated mic
	        $frmField = mosHTML::selectList( $options, 'frmTranslationMode', 'class="inputbox" size="1"', 'value', 'text', $joomfishManager->getCfg( 'noTranslation' ) );
	        echo $frmField;
	      ?>
			  </td>
		  <td align="left" valign="top">
		  	<?php $tip = _JOOMFISH_ADMIN_NOTRANSLATION_HELP;
			echo mosToolTip( $tip );
			?>
		  </td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_PLACEHOLDER;?></strong></td>
	      <td width="20%" align="left" valign="top">
	      <input type="text" name="frmTranslationDefaultText" size="75" value="<?php echo $joomfishManager->getCfg('defaultText');?>" />
		  </td>
		  <td align="left">
		  	<?php
			$tip = _JOOMFISH_TT_TRANS_DEFAULT;
			echo mosToolTip( $tip );
			?>
		  </td>
	    </tr>

	    <tr>
	      <th colspan="3"><?php echo _JOOMFISH_ADMIN_ACCESS_PREFERENCES;?></th>
	    </tr>
		<tr>
	      <td width="20%" align="left" valign="top"><strong><?php echo _JOOMFISH_FRONTEND_PUBLISH;?></strong></td>
	      <td width="20%" align="left" valign="top">
	      <?php
			$options = array();
	        $options[] = mosHTML::makeOption( '0', _JOOMFISH_ADMIN_NOONE);
	        $options[] = mosHTML::makeOption( '1', _JOOMFISH_ADMIN_PUBLISHERS );
	        $frmField = mosHTML::selectList( $options, 'frmPublish', 'class="inputbox" size="1"', 'value', 'text', $joomfishManager->getCfg( 'frontEndPublish' ) );
	        echo $frmField;
	      ?>
		 </td>
		  <td align="left" valign="top">	<?php
			$tip = _JOOMFISH_ADMIN_FEPUBLISH_HELP;
			echo mosToolTip( $tip );
			?>
		</tr>	    
		<?php
		HTML_joomfish::_JoomlaFooter($act, $option);
  }

 	function showLanguageConfiguration( $joomfishManager, $languageList) {
		global $act, $task, $option, $database, $mosConfig_lang, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_ADMIN_LANGUAGE_TITLE, 'langmanager' );
		?>
	    <tr>
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_DEFAULT_LANGUAGE;?></strong></td>
	      <td align="left" valign="top"><strong style="color: red;"><?php echo $mosConfig_lang . '</strong> ( ' . _JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP . ' )'; ?></td>
	    </tr>
	    <tr>
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_LANGUAGE;?></strong></td>
	      <td><?php echo _JOOMFISH_ADMIN_LANGUAGE_HELP;?></td>
	    <tr>
	      <td align="center" valign="top" colspan="2">
				  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
				    <tr>
					<th class="title" width="20%" align="left">
						<?php echo _JOOMFISH_ADMIN_TITLE_NAME;?>
						&nbsp;
				    	<?php
				    	$tip = _JOOMFISH_TT_TITLE_NAME;
						echo mosToolTip( $tip );
				    	?>
					</th>
				    <th width="5%" align="left"><?php echo _JOOMFISH_ADMIN_TITLE_ACTIVE;?></th>
				    <th width="10%" nowrap="nowrap" align="left">
				    	<?php echo _JOOMFISH_ADMIN_TITLE_ISO;?>
				    	&nbsp;
				    	<?php
				    	$tip = _JOOMFISH_TT_TITLE_ISO;
						echo mosToolTip( $tip );
				    	?>
				    </th>
				    <th width="15%" nowrap="nowrap" align="left"><?php echo _JOOMFISH_ADMIN_TITLE_JOOMLA;?></th>
				    <th width="30%" nowrap="nowrap" align="left">
				    	<?php echo _JOOMFISH_ADMIN_TITLE_IMAGE; ?>
				    	&nbsp;
				    	<?php
				    	$tip = _JOOMFISH_TT_IMAGES_DIR;
						echo mosToolTip( $tip );
				    	?>
				    </th>
				    <th nowrap="nowrap" align="left">
				    	<?php echo _JOOMFISH_ADMIN_TITLE_ORDER;?>
				    	&nbsp;
				    	<?php
				    	$tip = _JOOMFISH_TT_TITLE_ORDER;
						echo mosToolTip( $tip );
				    	?>
				    </th>
				    </tr>
				    <?php
							$k=0;
							$i=0;
							reset($languageList);
				foreach ($languageList as $language ) { ?>
					<tr class="<?php echo 'row' . $k; ?>">
				      <td>
				        <input type="hidden" name="frmLanguageID[]" value="<?php echo $language->id; ?>" />
				        	<input type="text" name="frmLanguageName[]" value="<?php echo $language->name; ?>" size="30" maxlength="100" />
							</td>
				      	<td align="center"><input type="checkbox" name="frmLanguageActive[]"<?php echo $language->active==1 ? ' checked' : ''; ?> value="<?php echo $language->id; ?>" /></td>
				      <td><input type="text" name="frmLanguageISO[]" value="<?php echo $language->iso; ?>" size="10" maxlength="10" /></td>
				      	<td><input type="text" name="frmLanguageCode[]" value="<?php echo $language->code; ?>" size="20" maxlength="20" /></td>
				      	<td><input type="text" name="frmLanguageImage[]" value="<?php echo $language->image; ?>" size="50" maxlength="100" /></td>
				      <td><input type="text" name="frmLanguageOrder[]" value="<?php echo $language->ordering; ?>" size="5" maxlength="5" /></td>
								<?php
								$k = 1 - $k;
								$i++;
							}
						?>
						</tr>
					</table>
			  </td>
	    </tr>
		<?php
		HTML_joomfish::_JoomlaFooter($act, $option);
  }
 
	function showElementOverview( $joomfishManager, $option, $search, $pageNav ) {
		global $my, $act, $task, $database, $option, $mosConfig_live_site;
		$filterOptions = '';
		$filterOptions .= '<td  nowrap align="center">' ._JOOMFISH_ADMIN_TITLE_DISPLAY. ':<br/>' .$pageNav->getLimitBox(). '</td>';
		$filterOptions .= '<td  nowrap align="center">' ._E_M_KEY. ':<br/><input type="text" name="search" value="' .$search. '" class="inputbox" onChange="document.adminForm.submit();" /></td>';
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS, 'joomfish', $filterOptions );
	?>
	</table>
		
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20" nowrap>&nbsp;</th>
      <th class="title" width="35%" align="left"><?php echo _JOOMFISH_ADMIN_TITLE_NAME;?></th>
      <th width="15%" align="left"><?php echo _JOOMFISH_ADMIN_TITLE_AUTHOR;?></th>
      <th width="15%" nowrap="nowrap" align="left"><?php echo _JOOMFISH_ADMIN_TITLE_VERSION;?></th>
      <th nowrap="nowrap" align="left"><?php echo _JOOMFISH_ADMIN_TITLE_DESCRIPTION;?></th>
    </tr>
    <?php
			$elements = $joomfishManager->getContentElements();
			$k=0;
			$i=0;
			foreach (array_values($elements) as $element ) {
				$key = $element->referenceInformation['tablename'];
				?>
    <tr class="<?php echo "row$k"; ?>">
      <td width="20">
        <?php		if ($element->checked_out && $element->checked_out != $my->id) { ?>
        &nbsp;
        <?php		} else { ?>
        <input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $key; ?>" onclick="isChecked(this.checked);" />
        <?php		} ?>
      </td>
      <td>
      	<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')"><?php echo $element->Name; ?></a>
			</td>
      <td><?php echo $element->Author ? $element->Author : '&nbsp;'; ?></td>
      <td><?php echo $element->Version ? $element->Version : '&nbsp;'; ?></td>
      <td><?php echo $element->Description ? $element->Description : '&nbsp;'; ?></td>
				<?php
				$k = 1 - $k;
				$i++;
			}
		?>
	</tr>
    <tr>
      <th align="center" colspan="5"><?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="center" colspan="5"><?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
	</table>
	<?php
		HTML_joomfish::_JoomlaFooter($act, $option);
	}

	function showElementConfiguration( $joomfishManager, $id ) {
		global $my, $act, $task, $database, $option, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS, 'joomfish', '', false );
		$contentElement = $joomfishManager->getContentElement( $id );
	?>
    <table class="adminform">
	  <tr>
	    <td width="100%">
		<?php
		$tabs = new mosTabs(0);
		$tabs->startPane("contentelements");
		$tabs->startTab(_JOOMFISH_ADMIN_ELEMENT_CONFIG,"ElementConfig-page");
		?>
	  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
	    <tr>
	      <td class="sectionname" colspan="3"><h3><?php echo _JOOMFISH_ADMIN_COMMONINFORMATION;?></h3></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_TITLE_NAME;?></strong></td>
	      <td width="20%" align="left" valign="top"><?php echo $contentElement->Name;?></td>
			  <td align="left"></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_TITLE_AUTHOR;?></strong></td>
	      <td width="20%" align="left" valign="top"><?php echo $contentElement->Author;?></td>
			  <td align="left"></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_TITLE_VERSION;?></strong></td>
	      <td width="20%" align="left" valign="top"><?php echo $contentElement->Version;?></td>
			  <td align="left"></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_TITLE_DESCRIPTION;?></strong></td>
	      <td width="20%" align="left" valign="top"><?php echo $contentElement->Description;?></td>
			  <td align="left"></td>
	    </tr>
	  </table>
	  	<?php
	  	$tabs->endTab();
		$tabs->startTab(_JOOMFISH_ADMIN_ELEMENT_REFERENCE,"ElementReference-page");

		$contentTable = $contentElement->getTable();
		?>
	  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
	    <tr>
	      <td class="sectionname" colspan="2"><h3><?php echo _JOOMFISH_ADMIN_DATABASEINFORMATION;?></h3></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="15%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_DATABASETABLE;?></strong><br /><?php echo _JOOMFISH_ADMIN_DATABASETABLE_HELP;?></td>
	      <td width="60%" align="left" valign="top"><?php echo $contentTable->Name;?></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="15%" align="left" valign="top"><strong><?php echo _JOOMFISH_ADMIN_DATABASEFIELDS;?></strong><br /><?php echo _JOOMFISH_ADMIN_DATABASEFIELDS_HELP;?></td>
	      <td width="60%" align="left" valign="top">
			  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
				<tr>
					<th><?php echo _JOOMFISH_ADMIN_DBFIELDNAME;?></th>
					<th><?php echo _JOOMFISH_ADMIN_DBFIELDTYPE;?></th>
					<th><?php echo _JOOMFISH_ADMIN_DBFIELDLABLE;?></th>
					<th><?php echo _JOOMFISH_ADMIN_TRANSLATE;?></th>
				</tr>
				<?php
				$k=0;
				foreach( $contentTable->Fields as $tableField ) {
					?>
			  <tr class="<?php echo "row$k"; ?>">
					<td><?php echo $tableField->Name ? $tableField->Name : "&nbsp;";?></td>
					<td><?php echo $tableField->Type ? $tableField->Type : "&nbsp;";?></td>
					<td><?php echo $tableField->Lable ? $tableField->Lable : "&nbsp;";?></td>
					<td><?php echo $tableField->Translate ? _CMN_YES : _CMN_NO;?></td>
				</tr>
					<?php
					$k=1-$k;
				}
				?>
				</table>
				<?php 
				?>
				</td>
	    </tr>
	  </table>
	  	<?php
	  	$tabs->endTab();
		$tabs->startTab(_JOOMFISH_ADMIN_ELEMENT_SAMPLES,"ElementSamples-page");
		$contentTable = $contentElement->getTable();
		?>
	  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
	    <tr>
	      <td class="sectionname"><h3><?php echo _JOOMFISH_ADMIN_ELEMENT_SAMPLES;?></h3></td>
	    </tr>
	    <tr align="center" valign="middle">
	      <td width="100%" align="center" valign="top">
			  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
				<tr>
				<?php
				$sqlFields = "";
				foreach( $contentTable->Fields as $tableField ) {
					if( $sqlFields!='' ) $sqlFields .= ',';
					$sqlFields .= '`' .$tableField->Name. '`';
					?>
					<th nowrap><?php echo $tableField->Lable;?></th>
					<?php
				}
				?>
				</tr>
				<?php
				$k=0;
    			$idname = $joomfishManager->getPrimaryKey($contentTable->Name);
				$sql = "SELECT $sqlFields"
					. "\nFROM #__" .$contentTable->Name
					. "\nORDER BY $idname limit 0,10";
				$database->setQuery( $sql	);
				$rows = $database->loadObjectList();
				foreach ($rows as $row) {
					?>
			  <tr class="<?php echo "row$k"; ?>">
				<?php
				foreach( $contentTable->Fields as $tableField ) {
					$fieldName = $tableField->Name;
					$fieldValue = $row->$fieldName;
					if( $tableField->Type='htmltext' ) {
						$fieldValue = htmlspecialchars( $fieldValue );
					}
					
					if( $fieldValue=='' ) $fieldValue="&nbsp;";
					if( strlen($fieldValue) > 97 ) {
						$fieldValue = substr( $fieldValue, 0, 100) . '...';
					}
					
					?>
					<td valign="top"><?php echo $fieldValue;?></td>
					<?php
				}
				?>
				</tr>
					<?php
					$k=1-$k;
				}
				?>
				</table>
				<?php 
				?>
				</td>
	    </tr>
	  </table>
	<?php
	  	$tabs->endTab();
		$tabs->endPane();
		?>
	</td></tr>
	</table>
		<?php
		HTML_joomfish::_JoomlaFooter($act, $option);
	}


	function showTranslationOverview( $rows, $search, $pageNav, $langlist, $clist, $catid , $filterlist=array()) {
		global $my, $act, $task, $database, $option, $mosConfig_live_site;
		$filterOptions = '<td align="right"><table><tr>';
		$filterOptions .= '<td  nowrap align="center">' ._JOOMFISH_ADMIN_TITLE_DISPLAY. ':<br/>' .$pageNav->getLimitBox(). '</td>';
		$filterOptions .= '<td  nowrap align="center">' ._JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS. ':<br/>' .$clist. '</td>';
		$filterOptions .= '</tr></table>';
		$filterOptions .= '<table><tr>';
		$filterOptions .= '<td  nowrap align="center">' ._JOOMFISH_ADMIN_TITLE_LANGUAGE. ':<br/>' .$langlist. '</td>';

		if (isset($filterlist) && count($filterlist)>0){
	     	foreach ($filterlist as $fl){
	     		if (is_array($fl))		$filterOptions .= "<td nowrap align='center'>".$fl["title"].":<br/>".$fl["html"]."</td>";    	
	     	}
	    }
		$filterOptions .= '</tr></table>';
		
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_ADMIN_TITLE_TRANSLATION, 'joomfish', $filterOptions );
	?>
  </table>
	
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" /></th>
      <th class="title" width="20%" align="left"  nowrap="nowrap"><?php echo _JOOMFISH_ADMIN_TITLE_TITLE;?></th>
      <th width="10%" align="left" nowrap="nowrap"><?php echo _JOOMFISH_ADMIN_TITLE_LANGUAGE;?></th>
      <th width="20%" align="left" nowrap="nowrap"><?php echo _JOOMFISH_ADMIN_TITLE_TRANSLATION;?></th>
      <th width="15%" align="left" nowrap="nowrap"><?php echo _JOOMFISH_ADMIN_TITLE_DATECHANGED;?></th>
      <th width="15%" nowrap="nowrap" align="center"><?php echo _JOOMFISH_ADMIN_TITLE_STATE;?></th>
      <th nowrap="nowrap" align="center" nowrap="nowrap"><?php echo _JOOMFISH_ADMIN_TITLE_PUBLISHED;?></th>
    </tr>
	<?php
	if( !isset($catid) || $catid == "" ) {
		?>
  <tr><td colspan="8"><p><?php echo _JOOMFISH_NOELEMENT_SELECTED;?></p></td></tr>
		<?php
	}
	else {
		?>
    <?php
			$k=0;
			$i=0;
			foreach ($rows as $row ) {
				?>
    <tr class="<?php echo "row$k"; ?>">
      <td width="20">
        <?php		if ($row->checked_out && $row->checked_out != $my->id) { ?>
        &nbsp;
        <?php		} else { ?>
        <input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id; ?>|<?php echo $row->language_id; ?>" onclick="isChecked(this.checked);" />
        <?php		} ?>
      </td>
      <td>
      	<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')"><?php echo $row->title; ?></a>
			</td>
      <td nowrap><?php echo $row->language ? $row->language : _JOOMFISH_NOTRANSLATIONYET; ?></td>
      <td><?php echo $row->titleTranslation ? $row->titleTranslation : '&nbsp;'; ?></td>
	  <td><?php echo $row->lastchanged ? strftime("%A, %d %B %Y %H:%M",strtotime($row->lastchanged)):"";?></td>      
				<?php
				switch( $row->state ) {
					case 1:
						$img = 'status_g.png';
						break;
					case 0:
						$img = 'status_y.png';
						break;
					case -1:
					default:
						$img = 'status_r.png';
						break;
				}
				?>
      <td align="center"><img src="components/com_joomfish/images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></td>
				<?php
				if (isset($row->published) && $row->published) {
					$img = 'publish_g.png';
				} else {
					$img = 'publish_x.png';
				}
				
				$href='';
				if( $row->state>=0 ) {
					$href = '<a href="javascript: void(0);" ';
					$href .= 'onClick="return listItemTask(\'cb' .$i. '\',\'' .($row->published ? 'unpublish' : 'publish'). '\')">';
					$href .= '<img src="images/' .$img. '" width="12" height="12" border="0" alt="" />';
					$href .= '</a>';
				}
				else {
					$href = '<img src="images/' .$img. '" width="12" height="12" border="0" alt="" />';
				}
				?>
      <td align="center"><?php echo $href;?></td>
				<?php
				$k = 1 - $k;
				$i++;
			}
		?>
	</tr>
    <tr>
      <th align="center" colspan="10"> <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="center" colspan="10"> <?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
	</table>
<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">
  <tr align="center">
    <td> <img src="components/com_joomfish/images/status_g.png" width="12" height="12" border=0 alt="<?php echo _JOOMFISH_STATE_OK;?>" />
    </td>
    <td> <?php echo _JOOMFISH_TRANSLATION_UPTODATE;?> |</td>
    <td> <img src="components/com_joomfish/images/status_y.png" width="12" height="12" border=0 alt="<?php echo _JOOMFISH_STATE_CHANGED;?>" />
    </td>
    <td> <?php echo _JOOMFISH_TRANSLATION_INCOMPLETE;?> |</td>
    <td> <img src="components/com_joomfish/images/status_r.png" width="12" height="12" border=0 alt="<?php echo _JOOMFISH_STATE_NOTEXISTING;?>" />
    </td>
    <td> <?php echo _JOOMFISH_TRANSLATION_NOT_EXISTING;?></td>
  </tr>
  <tr align="center">
    <td> <img src="images/publish_g.png" width="12" height="12" border=0 alt="Translation visible" />
    </td>
    <td> <?php echo _JOOMFISH_TRANSLATION_PUBLISHED;?> |</td>
    <td> <img src="images/publish_x.png" width="12" height="12" border=0 alt="Finished" />
    </td>
    <td> <?php echo _JOOMFISH_TRANSLATION_NOT_PUBLISHED;?> </td>
    <td> &nbsp;
    </td>
    <td> <?php echo _JOOMFISH_STATE_TOGGLE;?> </td>
  </tr>
<?php } ?>
</table>
	<?php
		HTML_joomfish::_JoomlaFooter($act, $option);
	}

	/**
	* @return void
	* @param object $actContentObject
	* @param array $langlist
	* @param string $catid
	* @desc Shows the dialog for the content translation
	*/
	function showTranslation( $actContentObject, $langlist, $catid , $select_id , $tranFilters) {
		global $my, $act, $task, $database, $option, $select_language_id, $mosConfig_live_site;
		$elementTable = $actContentObject->getTable();
		
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_ADMIN_TITLE_TRANSLATION, 'joomfish', '', false );
		
		$editorFields=null;
		foreach ($tranFilters as $filter) {
			echo "<input type='hidden' name='".$filter->filterType."_filter_value' value='".$filter->filter_value."'/>";		
		}
    
	// check system and user editor and load appropriate copying script
	global $mosConfig_editor, $adminPath, $my;
	// Per User Editor selection
	$editorParams = new mosParameters( $my->params );
	$editor = $editorParams->get( 'editor', '' );
	if (!$editor) {
		$editor = $mosConfig_editor;
	}
	echo "\n<!-- editor is $editor //-->\n";
	$editorFile = $adminPath."/editors/".strtolower($editor).".php";
   	if (file_exists($editorFile)){
		require_once($editorFile);
   	}
   	else {
	?>

	<script language="javascript" type="text/javascript">
	function copyToClipboard(value,action) {
		try {
			if (document.getElementById) {
				innerHTML="";
				if (action=="copy") {
					srcEl = document.getElementById("original_value_"+value);
					innerHTML = srcEl.innerHTML;
				}
				if (window.clipboardData){
					window.clipboardData.setData("Text",innerHTML);
					alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_COPIED?>");
				}
				else {
					srcEl = document.getElementById("text_origText_"+value);
   	       			srcEl.value = innerHTML;
       	   			srcEl.select();
					alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_COPY?>");
				}
			}
		}
		catch(e){
			alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT?>");
		}
	}
    </script>
    <?php } ?>
    
   	<table width="100%">
	  <tr>
	    <td>
		<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
			<?php
				$k=1;
				for( $i=0; $i<count($elementTable->Fields); $i++ ) {
					$field =& $elementTable->Fields[$i];
					$originalValue = $field->originalValue;
					
					if( $field->Translate ) {
						$translationContent = $field->translationContent;
						
						// This causes problems in Japanese/Russian etc.
						mosMakeHtmlSafe( $translationContent );
				?>
		    <tr class="<?php echo "row$k"; ?>">
		      <th colspan="3"><?php echo _JOOMFISH_ADMIN_DBFIELDLABLE .': '. $field->Lable;?></td>
		    </tr>
		    <tr class="<?php echo "row$k"; ?>">
		      <td align="left" valign="top"><?php echo _JOOMFISH_ORIGINAL; ?></td>
		      <td align="left" valign="top" id="original_value_<?php echo $field->Name.'">'.$field->originalValue;?></td>
			  <td valign="top">
				<input type="hidden" name="origValue_<?php echo $field->Name;?>" value='<?php echo md5( $field->originalValue );?>' />
				<?php if( strtolower($field->Type)!='htmltext' ) {?>
					<input type="hidden" name="origText_<?php echo $field->Name;?>" value='<?php echo $field->originalValue;?>' />
					<a class="toolbar" onclick="document.adminForm.refField_<?php echo $field->Name;?>.value = document.adminForm.origText_<?php echo $field->Name;?>.value;" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('copy_<?php echo $field->Name;?>','','images/copy_f2.png',1);"><img src="images/copy.png" alt="<?php echo _JOOMFISH_COPY;?>" border="0" name="copy_<?php echo $field->Name;?>" align="middle" /></a>
				<?php }	else { ?>
					<input type="text" id="text_origText_<?php echo $field->Name;?>" value='' style="position:absolute;left:-999px;top:-999px"/>
					<a class="toolbar" onclick="copyToClipboard('<?php echo $field->Name;?>','copy');" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('copy_<?php echo $field->Name;?>','','images/copy_f2.png',1);"><img src="images/copy.png" alt="<?php echo _JOOMFISH_COPY;?>" border="0" name="copy_<?php echo $field->Name;?>" align="middle" /></a>
				<?php  }?>
			  </td>
		    </tr>
		    <tr class="<?php echo "row$k"; ?>">
		      <td align="left" valign="top"><?php echo _JOOMFISH_TRANSLATION; ?></td>
		      <td align="left" valign="top">
					  <input type="hidden" name="id_<?php echo $field->Name;?>" value="<?php echo $translationContent->id;?>" />
						<?php
						if( strtolower($field->Type)=='text' || strtolower($field->Type)=='titletext' ) {
							?>
							<input class="inputbox" type="text" name="refField_<?php echo $field->Name;?>" size="60" maxlength="100" value="<?php echo $translationContent->value; ?>" />
							
							<?php
						} else if( strtolower($field->Type)=='textarea' ) {
							?>
							<textarea name="refField_<?php echo $field->Name;?>" rows="15" cols="30"><?php echo $translationContent->value; ?></textarea>
							<?php
						} else if( strtolower($field->Type)=='htmltext' ) {
							?>
							<?php
								$editorFields[] = array( "editor_".$field->Name, "refField_".$field->Name );
								// parameters : areaname, content, hidden field, width, height, rows, cols
								editorArea( "editor_".$field->Name,  $translationContent->value , "refField_".$field->Name, '100%;', '300', '70', '15' ) ;
							}
						?>
				</td>
				<td valign="top">
					<?php if( strtolower($field->Type)!='htmltext' ) {?>
						<a class="toolbar" onclick="document.adminForm.refField_<?php echo $field->Name;?>.value = '';" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','images/delete_f2.png',1);"><img src="images/delete.png" alt="<?php echo _JOOMFISH_CLEAR;?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" /></a>
					<?php } else {?>
					<!-- ToDo
						<a class="toolbar" onclick="editor_setHTML('refField_<?php echo $field->Name;?>', ''); document.adminForm.refField_<?php echo $field->Name;?>.value = '';" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','images/delete_f2.png',1);"><img src="images/delete.png" alt="<?php echo _JOOMFISH_CLEAR;?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" /></a>
					-->
					<a class="toolbar" onclick="copyToClipboard('<?php echo $field->Name;?>','clear');" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','images/delete_f2.png',1);"><img src="images/delete.png" alt="<?php echo _JOOMFISH_CLEAR;?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" /></a>
					
					<?php }?>
					</td>
		    </tr>
				<?php
					}
					$k=1-$k;
				}
				?>
		</table>
	  </td>
	  <td valign="top" width="30%">
		<?php
		$tabs = new mosTabs(0);
		$tabs->startPane("translation");
		$tabs->startTab(_JOOMFISH_ITEM_INFO,"ItemInfo-page");
	  ?>
  	<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
      <tr>
        <td width="34%"><strong><?php echo _JOOMFISH_ADMIN_TITLE_STATE;?>:</strong></td>
        <td width="50%"><?php echo $actContentObject->state > 0 ? _JOOMFISH_STATE_OK : ($actContentObject->state < 0 ? _JOOMFISH_STATE_NOTEXISTING : _JOOMFISH_STATE_CHANGED);?></td>
      </tr>
      <tr>
        <td><strong><?php echo _JOOMFISH_ADMIN_TITLE_LANGUAGE;?>:</strong></td>
        <td><?php echo $langlist;?></td>
      </tr>
      <tr>
        <td><strong><?php echo _JOOMFISH_ADMIN_TITLE_PUBLISHED;?>:</strong></td>
        <td><input type="checkbox" name="published" value="1" <?php echo $actContentObject->published&0x0001 ? 'checked="checked"' : ''; ?> /></td>
      </tr>
      <tr>
        <td><strong><?php echo _JOOMFISH_ADMIN_TITLE_DATECHANGED;?>:</strong></td>
        <td><?php echo strftime("%A, %d %B %Y %H:%M",strtotime(isset($actContentObject->lastchanged)?$actContentObject->lastchanged:0));?></td>
      </tr>
	  </table>
	  <?php
	  	$tabs->endTab();
		$tabs->endPane();
		?>
	  <input type="hidden" name="select_language_id" value="<?php echo $select_language_id;?>" />
	  <input type="hidden" name="reference_id" value="<?php echo $actContentObject->id;?>" />
	  <input type="hidden" name="reference_table" value="<?php echo (isset($elementTable->name) ? $elementTable->name : '');?>" />
	  <input type="hidden" name="catid" value="<?php echo $catid;?>" />
	</td></tr>
	</table>
	<?php
		HTML_joomfish::_JoomlaFooter($act, $option, $editorFields);
	}

	/**
	 * Show the upgrade dialog
	 *
	 */
	function showUpgradeInstall( $joomFishManager, $upgradeSucessful, $upgradeDone, $lists ) {
		global $act, $task, $option, $mosConfig_absolute_path, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_INSTALL_UPGRADE, 'upgrade' );
		
		if( !$upgradeSucessful && !$upgradeDone ) {
		?>
	    <tr>
	      <td width="30%" align="left" valign="top">&nbsp;</td>
	      <td align="left" valign="top"><?php echo _JOOMFISH_ADMIN_UPGRADE_INFO;?></td>
	    </tr>
	    <tr>
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_UPGRADE_DELETE_TABLES;?></strong></td>
	      <td><?php echo mosHTML::yesnoRadioList( 'confirmDelete', '', $lists['confirmDelete'] );?></td>
	    <tr>
	    <tr><td colspan="2">&nbsp;</td></tr>
	    <tr>
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_UPGRADE_BACKUP_TABLES;?></strong></td>
	      <td><?php echo mosHTML::yesnoRadioList( 'backupTables', '', $lists['backupTables'] );?></td>
	    <tr>
	    <tr>
	      <td width="30%" align="left" valign="top"><strong><?php echo _JOOMFISH_UPGRADE_RENAME_TABLES;?></strong></td>
	      <td><?php echo mosHTML::yesnoRadioList( 'renameTables', '', $lists['renameTables'] );?></td>
	    <tr>
	    <?php
		} else {
			$summary = $lists['summary'];
		?>
		<tr>
			<th>&nbsp;</th>
			<th colspan="2"><?php echo _JOOMFISH_E_STATE;?></th>
		</tr>
		<tr>
			<td width="30%"><?php echo _JOOMFISH_E_STATE;?>:</td>
			<td width="30%"><?php echo ($summary['state'] ? _JOOMFISH_UPGRADE_SUCCESSFUL : _JOOMFISH_UPGRADE_FAILURE);?></td>
			<td><?php if( key_exists( 'message', $summary ) ) echo $summary['message'];?></td>
		</tr>
		<tr>
			<td><?php echo _JOOMFISH_MBFBOT;?>:</td>
			<td><?php echo ($summary['mbf_bot_unpublished'] ? _JOOMFISH_MBF_UNPUBLISHED : _JOOMFISH_MBF_NOTUNPUBLISHED);?></td>
			<td>
			<?php echo ($summary['mbf_bot_unpublished'] ? '' : $summary['mbf_bot_unpublished_error']);?>
			</td>
		</tr>
		<tr>
			<td><?php echo _JOOMFISH_MBFMODULE;?>:</td>
			<td><?php echo ($summary['mbf_module_unpublished'] ? _JOOMFISH_MBF_UNPUBLISHED : _JOOMFISH_MBF_NOTUNPUBLISHED);?></td>
			<td>
			<?php echo ($summary['mbf_module_unpublished'] ? '' : $summary['mbf_module_unpublished_error']);?>
			</td>
		</tr>
		<tr><td>&nbsp;</tr>
		<?php if( $lists['backupTables'] ) { ?>
		<tr>
			<td><?php echo _JOOMFISH_CONTENT_BACKUP;?>:</td>
			<td>
			<?php echo ($summary['jf_content_backup'] ? _JOOMFISH_BAK_CONTENT_SUCESSFUL : _JOOMFISH_BAK_CONTENT_FAILURE);?><br />
			<?php echo ($summary['jf_languages_backup'] ? _JOOMFISH_BAK_LANGUAGES_SUCESSFUL : _JOOMFISH_BAK_LANGUAGES_FAILURE);?>
			</td>
			<td>
			<?php echo ($summary['jf_content_backup'] ? '' : $summary['jf_languages_backup_error']);?>
			<?php echo ($summary['jf_languages_backup'] ? '' : $summary['jf_languages_backup_error']);?>
			</td>
		</tr>
		<tr><td>&nbsp;</tr>
		<?php } ?>
		<tr>
			<td><?php echo _JOOMFISH_CONTENT_TABLES;?>:</td>
			<td>
				<?php echo ($summary['jf_content_deleted'] ? _JOOMFISH_DEL_SUCESSFUL : _JOOMFISH_DEL_FAILURE);?><br />
				<?php echo ($summary['jf_content_copied'] ? _JOOMFISH_COPY_SUCESSFUL : _JOOMFISH_COPY_FAILURE);?>
			</td>
			<td>
			<?php echo ($summary['jf_content_deleted'] ? '' : $summary['jf_content_deleted_error']);?>
			<?php echo ($summary['jf_content_copied'] ? '' : $summary['jf_content_copied_error']);?>
			</td>
		</tr>
		<tr>
			<td><?php echo _JOOMFISH_LANGUAGE_TABLES;?>:</td>
			<td>
				<?php echo ($summary['jf_languages_deleted'] ? _JOOMFISH_DEL_SUCESSFUL : _JOOMFISH_DEL_FAILURE);?><br />
				<?php echo ($summary['jf_languages_copied'] ? _JOOMFISH_COPY_SUCESSFUL : _JOOMFISH_COPY_FAILURE);?>
			</td>
			<td>
			<?php echo ($summary['jf_languages_deleted'] ? '' : $summary['jf_languages_deleted_error']);?>
			<?php echo ($summary['jf_languages_copied'] ? '' : $summary['jf_languages_copied_error']);?>
			</td>
		</tr>		
		<?php
		}
		
		HTML_joomfish::_JoomlaFooter( $act, $option );
	}
	
	/**
	 * Show the side menu
	 *
	 */
  function _sideMenu() {
  	global $mosConfig_live_site;
  	?>
		<img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_joomfish/images/joomfish_slogan.png" border="0" alt="<?php echo _JOOMFISH_ADMIN_LANGUAGE_TITLE;?>"  />
		<p><span class="contentheading">Related topics:</span>
		<ul>
			<li><a href="index2.php?option=com_joomfish&amp;act=credits">Joom!Fish help, credits and the rest of the universe</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=dinnermenu">The dinner menu <b>(The Documentation)</b></a></li>
			<li><a href="http://www.joomfish.net" target="_blank">Official Project WebSite</a></li>
			<li><a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">Official Project Forum</a></li>
			<li><a href="http://forge.joomla.org/sf/tracker/do/listArtifacts/projects.joomfish/tracker.bugs" target="_blank">Bugtracker</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Documentation & Tutorials:</span>
		<ul>
			<li><a href="http://forge.joomla.org/sf/wiki/do/viewPage/projects.joomfish/wiki/HomePage" target="_blank">Project Documentation Site</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=readme">Installation notes (ReadMe)</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=changelog">Changelog</a></li>
			<li><a href="http://www.joomfish.net" target="_blank">Official Project WebSite</a></li>
			<li><a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">Official Project Forum</a></li>
			<li><a href="http://forge.joomla.org/sf/tracker/do/listArtifacts/projects.joomfish/tracker.bugs" target="_blank">Bugtracker</a></li>
		</ul>
		</p>
		<p><span class="contentheading">License:</span>
		<ul>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license">Think Network Open Source license</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Additional Sites:</span>
		<ul>
			<li><a href="http://www.joomla.org" target="_blank">Joomla!</a></li>
		</ul>
		</p>
  	<?php
  }

		
  function _header() {
  	global $mosConfig_live_site;
	?>
	<link rel="stylesheet" href="components/com_joomfish/css/joomfish.css" type="text/css" />
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
      } else {
        submitform( pressbutton );
      }
    }
    </script>
	<div id="joomfish">
    <form action="index2.php" method="post" name="adminForm">
	<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminheading">
	<tr><th width="100%" class="cpanel" align="left" colspan="2">
		<?php echo _JOOMFISH_HEADER; ?>
	</th></tr>
	</table>
	<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
	<?php
  }
  
	function _footer($act, $option) {
	?>
    </tr>
  </table>

	  <input type="hidden" name="task" value="" />
	  <input type="hidden" name="act" value="<?php echo $act; ?>" />
	  <input type="hidden" name="option" value="<?php echo $option; ?>" />
    </form>
    </div>
	<?php
	}


  function _JoomlaHeader( $title, $title_class='', $headingOptions= 'fish', $adminform = true ) {
	?>
	<link rel="stylesheet" href="components/com_joomfish/css/joomfish.css" type="text/css" />
    <div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
    <div id="joomfish">
    <form action="index2.php" method="post" name="adminForm">
    <?php HTML_joomfish::_JAdminHeading( $title, $title_class, $headingOptions );?>
	<?php
	if ( $adminform ) {
		HTML_joomfish::_openAdminForm();
	}
  }
  
  function _JAdminHeading( $title, $title_class, $headingOptions = 'fish' ) {
		global $mosConfig_live_site;
  	?>
	<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminheading">
		<tr>
			<th width="100%" class="<?php echo $title_class;?>" align="left" colspan="2"><?php echo $title;?></th>
			<?php if( $headingOptions == 'fish' ) { ?>
		    <td><img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_joomfish/images/fishl.png" border="0" /></td>
		    <?php
			} elseif ( $headingOptions != '' ) {
		    	echo $headingOptions;
		    }
		    ?></tr>
	</table>
	<?php
  }
  
  function _openAdminForm() {
  	?>
	<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
  	<?php
  }

	function _JoomlaFooter($act, $option, $editorFields=null) {
		global $mosConfig_live_site;
	?>
	  <input type="hidden" name="boxchecked" value="0" />
	  <input type="hidden" name="task" value="" />
	  <input type="hidden" name="act" value="<?php echo $act; ?>" />
	  <input type="hidden" name="option" value="<?php echo $option; ?>" />
    </form>
	<script  type="text/javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/overlib_mini.js"></script>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
			<?
			if( isset($editorFields) && is_array($editorFields) ) {
				foreach ($editorFields as $editor) {
						// Where editor[0] = your areaname and editor[1] = the field name
						getEditorContents( $editor[0], $editor[1]) ;
				}
			}
			?>
      if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
      } else {
        submitform( pressbutton );
      }
    }
    </script>
    </table>
    <table width="100%" border="0">
	<tr>
	  <td width="99%" align="right" valign="top">
		<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;
		?><div align="center"><span class="smallgrey">Joom!Fish Version <?php echo JoomFishManager::getVersionFooter();?>, &copy; 2003-2006 Copyright by <a href="http://www.ThinkNetwork.com" target="_blank" class="smallgrey">Think Network</a> under <a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license" class="smallgrey">Open Source License.</a> Contact: <?php echo mosHTML::emailCloaking( $mail, 0);?></span></div>
	  </td>
	  </tr>
	</table>
	</div>
	<?php
	}
		
	function _creditsCopyright() {
		?>
		<p>
		<span class="smallgrey"><strong>Credits:</strong></span><br />
		<span class="smallgrey">To all the people of the JoomFish community!<br />
		Present development team:
		<ul>
			<li>Alex Kempkens (<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;
			
			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Geraint Edwards (<?php
			$x = "@";
			$y="joomfish.credits";
			$z="copyn.plus.com";
			$mail=$y.$x.$z;
			
			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Ivo Apostolov (<?php
			$x = "@";
			$y="joomfish";
			$z="unwe.net";
			$mail=$y.$x.$z;
			
			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Lévis Bisson</li>
			<li>Robin Muilwijk</li>
		</ul>
		<br />
		
		Logo design by:
		<ul>
			<li>Tommy White (<?php
			$x = "@";
			$y="tommy";
			$z="tommywhite.com";
			$mail=$y.$x.$z;
			
			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
		</ul>
		
		&nbsp;<br />
		Special thank's for testing, good suggestions & translations to:<br />
		Bernhard, Michael, Luc, Olivier, Robin, Rune</span><br />
		
		&nbsp;<br />
		<span class="smallgrey"><strong>Contact:</strong></span><br />
		<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;
			
			echo '<span class="smallgrey">' .mosHTML::emailCloaking( $mail, 1,  $mail) .'</span>';
		?>
		<br />
		&nbsp;<br />
		<span class="smallgrey"><strong>Version:</strong></span><br />
		<span class="smallgrey"><?php echo JoomFishManager::getVersion();?></span><br />
		&nbsp;<br />
		<span class="smallgrey"><strong>Copyright:</strong></span><br />
		<span class="smallgrey">&copy; 2003-2006 </span><a href="http://www.ThinkNetwork.com" target="_blank" class="smallgrey"><span class="smallgrey">Think Network, Munich</span></a><br />
		<a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license" class="smallgrey"><span class="smallgrey">Open Source License.</span></a>
		</p>
		<?php
	}

	/**
	 * Creates the CPanel for the Joom!Fish component
	 *
	 */
	function showCPanel( $panelStates ) {
		global $act, $task, $option, $mosConfig_absolute_path, $mosConfig_live_site;
		HTML_joomfish::_header()
		?>
		<tr>
			<td width="55%" valign="top">
				<div id="cpanel">
				<?php
				$link = 'index2.php?option=com_joomfish&amp;act=translate';
				HTML_joomfish::_quickiconButton( $link, 'fish.png', _JOOMFISH_ADMIN_TITLE_TRANSLATION, '/administrator/components/com_joomfish/images/' );
			
				$link = 'index2.php?option=com_joomfish&amp;act=dinnermenu';
				HTML_joomfish::_quickiconButton( $link, 'support.png', _JOOMFISH_ADMIN_HELP );
				
				$link = 'index2.php?option=com_joomfish&amp;act=credits';
				HTML_joomfish::_quickiconButton( $link, 'credits.png', _JOOMFISH_ADMIN_CREDITS );

				echo '<div style="clear: both;" />';
			
				$link = 'index2.php?option=com_joomfish&amp;act=config_component&hidemainmenu=1';
				HTML_joomfish::_quickiconButton( $link, 'config.png', _JOOMFISH_ADMIN_CONFIGURATION );
			
				$link = 'index2.php?option=com_joomfish&amp;act=config_language&hidemainmenu=1';
				HTML_joomfish::_quickiconButton( $link, 'langmanager.png', _JOOMFISH_ADMIN_TITLE_LANGUAGE );
			
//				$link = 'index2.php?option=com_joomfish&amp;act=check';
//				HTML_joomfish::_quickiconButton( $link, 'checkin.png', _JOOMFISH_ADMIN_CHECK );
				$link = 'index2.php?option=com_joomfish&amp;act=config_elements';
				HTML_joomfish::_quickiconButton( $link, 'cpanel.png', _JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS );
			
				?>
			</div>
			</td>
			<td width="45%" valign="top">
				<div style="width: 100%;">
					<form action="index2.php" method="post" name="adminForm">
					<?php
					
					// Prepare formating for the output of the state
					
					foreach ($panelStates as $key => $state ) {
						if( ereg( 'bot', $key ) || ereg( 'module', $key ) ) {
							if( $state ) {
								$panelStates[ $key . '_text' ] = _JOOMFISH_CMN_PUBLISHED;
							} else {
								$panelStates[ $key . '_text' ] = _JOOMFISH_CMN_UNPUBLISHED;
							}
						} elseif ( ereg( 'mbf', $key )) {
							if( $state == 2 ) {
								$panelStates [ $key . '_href' ] = "";
								$panelStates[ $key . '_text' ] = _JOOMFISH_ADMIN_INSTAL_UPGRADED;
							} else {
								$panelStates[ $key . '_href' ] = "$mosConfig_live_site/administrator/index2.php?option=com_joomfish&act=upgrade_install&hidemainmenu=1";
								$panelStates[ $key . '_text' ] = _JOOMFISH_ADMIN_INSTAL_NOT_UPGRADED;
							}
						}
						
					}
					
					// Tabs
					$tabs = new mosTabs(1);
					$tabs->startPane( 'modules-jfcpane' );

					$tabs->startTab( _JOOMFISH_E_STATE, 'jfstatus' );
					?>
					<table class="adminlist">
						<tr>
							<th colspan="3">
							<?php echo _JOOMFISH_ADMIN_COMPONENT_STATE;?>
							</th>
						</tr>
						<tr class="row0">
							<td><?php echo _JOOMFISH_ADMIN_SYSTEM_BOT_STATE;?></td>
							<td><?php echo $panelStates['system_bot_text' ];?></td>
							<td><?php
								$href = "$mosConfig_live_site/administrator/index2.php?option=com_mambots&client=&task=editA&hidemainmenu=1&id=" .$panelStates[ 'system_bot' ];
							?><a href="<?php echo $href;?>"><img src="<?php echo $mosConfig_live_site;?>/images/M_images/edit.png" border="0" alt="<?php echo _E_EDIT;?>" /></a></td>
						</tr>
						<tr class="row1">
							<td><?php echo _JOOMFISH_ADMIN_SEARCH_BOT_STATE;?></td>
							<td><?php echo $panelStates['search_bot_text' ];?></td>
							<td><?php
								$href = "$mosConfig_live_site/administrator/index2.php?option=com_mambots&client=&task=editA&hidemainmenu=1&id=" .$panelStates[ 'search_bot' ];
							?><a href="<?php echo $href;?>"><img src="<?php echo $mosConfig_live_site;?>/images/M_images/edit.png" border="0" alt="<?php echo _E_EDIT;?>" /></a></td>
						</tr>
						<tr class="row0">
							<td><?php echo _JOOMFISH_ADMIN_MODULE_STATE;?></td>
							<td><?php echo $panelStates['module_text' ];?></td>
							<td><?php
								$href = "$mosConfig_live_site/administrator/index2.php?option=com_modules&client=&task=editA&hidemainmenu=1&id=" .$panelStates[ 'module' ];
							?><a href="<?php echo $href;?>"><img src="<?php echo $mosConfig_live_site;?>/images/M_images/edit.png" border="0" alt="<?php echo _E_EDIT;?>" /></a></td>
						</tr>
						<?php if( key_exists( 'mbfInstall', $panelStates ) && $panelStates['mbfInstall'] != 0 ) { ?>
						<tr>
							<th colspan="3">
							<?php echo _JOOMFISH_ADMIN_TRANSLATION_STATE;?>
							</th>
						</tr>
						<tr class="row0">
							<td><?php echo _JOOMFISH_ADMIN_MAMBELFISH_INSTALL;?></td>
							<td><?php echo $panelStates['mbfInstall_text' ];?></td>
							<td><?php
							if( $panelStates[ 'mbfInstall_href' ] != "" ) {
							?><a href="<?php echo $panelStates[ 'mbfInstall_href' ];?>"><img src="<?php echo $mosConfig_live_site;?>/administrator/images/dbrestore.png" border="0" alt="<?php echo _JOOMFISH_INSTALL_UPGRADE;?>" /></a></td>
							<?php
							}
							?>
						</tr>
						<?php } ?>
					</table>
					<?php
					$tabs->endTab();

					$tabs->endPane();
					?>
					</form>
				</div>
			</td>
		</tr>
		<?php
		HTML_joomfish::_JoomlaFooter( $act, $option );
	}
	
		/**
	 * This method creates a standard cpanel button
	 *
	 * @param unknown_type $link
	 * @param unknown_type $image
	 * @param unknown_type $text
	 */
	function _quickiconButton( $link, $image, $text, $path='/administrator/images/' ) {
		?>
		<div style="float:left;">
			<div class="icon">
				<a href="<?php echo $link; ?>">
					<?php echo mosAdminMenus::imageCheckAdmin( $image, $path, NULL, NULL, $text ); ?>
					<span><?php echo $text; ?></span>
				</a>
			</div>
		</div>
		<?php
	}
	
}
?>
