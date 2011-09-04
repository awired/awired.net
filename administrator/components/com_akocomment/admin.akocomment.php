<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

/**
*
* AkoComment Tweaked Special Edition - by visualclinic.fr
* ADD : 
* - RSS on comments
* - Quote this article by copy/paste code
* - some features for layout
* - Favoured
*
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
require_once( $mosConfig_absolute_path."/administrator/components/com_akocomment/class.akocomment.php");
require_once( $mainframe->getPath( 'admin_html' ) );
require( $mosConfig_absolute_path.'/administrator/components/com_akocomment/version.php' );

$act = mosGetParam($_POST, 'act', '');
$cid = mosGetParam($_REQUEST, 'cid', '');

switch ($task) {
  case "new":
    editComment( $option, 0 );
    break;

  case "edit":
    editComment( $option, $cid[0] );
    break;

  case "save":
    saveComment( $option );
    break;

  case "remove":
    removeComments( $cid, $option );
    break;

  case "publish":
    publishComments( $cid, 1, $option );
    break;

  case "unpublish":
    publishComments( $cid, 0, $option );
    break;

  ##############################################

  case "about":
    showAbout();
    break;

  ##############################################

  case "settings":
    showConfig( $option );
    break;

  case "savesettings":
    $ac_sectionlist   = implode(',',$acselections);
	saveConfig ( $option );
    //saveConfig ($option, $ac_autopublish, $ac_anonentry, $ac_sorting, $ac_bbcodesupport, $ac_picsupport, $ac_smiliesupport, $ac_notify, $ac_notify_email, $ac_openingmode, $ac_pagination, $ac_perpage, $ac_formposition, $ac_regedit, $ac_mainmode, $ac_sectionlist);
    break;

  ##############################################

  case "language":
    showLanguage($option);
    break;

  case "savefile":
    saveLanguage($file, $filecontent, $option);
    break;

  ##############################################

  default:
    showComments( $option );
    break;
}
// modified place by visualclinic.fr ( see below )
// echo "<p><font class='smalldark'><b>AkoComment V2.0</b> - &copy Copyright 2004 by Arthur Konze - <a href='http://www.mamboportal.com/' target='_blank'>www.mamboportal.com</a></font></p>";
?>




<div align="center" class="footer">
	<table width="99%" border="0">
	<tr>
		<td align="center">
			<div align="center">
				<?php echo "AkoComment Tweaked <b>Special Edition</b> <a href='http://www.visualclinic.fr/' target='_blank'>www.visualclinic.fr</a> v."._AKOCOMMENT_TW_SE_VERSION; ?>
			</div>
			<div align="center" class="smallgrey">
				<!-- New place for original copyright by Arthur Konze -->
				<?php echo "Based on AkoComment v.2 &copy Copyright 2004 by Arthur Konze - <a href='http://www.mamboportal.com/' target='_blank'>www.mamboportal.com</a>"; ?>
			</div>			
		</td>
	</tr>
	</table>
</div>
<?php
############################################################################

function showComments ( $option ) {
  global $database, $mainframe;

  $limit      = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
  $limitstart = $mainframe->getUserStateFromRequest( "view{$option}limitstart", 'limitstart', 0 );
  $search     = $mainframe->getUserStateFromRequest( "search{$option}", 'search', '' );
  $search     = $database->getEscaped( trim( strtolower( $search ) ) );

  $where = array();
  if ($search) {
    $where[] = "LOWER(comment) LIKE '%$search%'";
  }

  $database->setQuery( "SELECT count(*) FROM #__akocomment AS a" . (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "") );
  $total = $database->loadResult();
  echo $database->getErrorMsg();
  include_once( "includes/pageNavigation.php" );
  $pageNav = new mosPageNav( $total, $limitstart, $limit  );

  $database->setQuery( "SELECT * FROM #__akocomment"
    . (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
    . "\nORDER BY id DESC"
    . "\nLIMIT $pageNav->limitstart,$pageNav->limit"
  );
  $rows = $database->loadObjectList();
  if ($database->getErrorNum()) {
    echo $database->stderr();
    return false;
  }

  HTML_comment::showComments( $option, $rows, $search, $pageNav );
}

############################################################################

function editComment( $option, $uid ) {
  global $database, $my;

  $row = new mosAkocomment( $database );
  $row->load( $uid );

  #Get list of Content
  $contentitem[] = mosHTML::makeOption( '0', 'Select Content Item' );
  $database->setQuery( "SELECT id AS value, title AS text FROM #__content ORDER BY title" );
  $contentitem = array_merge( $contentitem, $database->loadObjectList() );
  if (count( $contentitem ) < 1) {
    mosRedirect( "index2.php?option=com_sections&scope=content", 'You must add content first.' );
  }
  $clist = mosHTML::selectList( $contentitem, 'contentid', 'class="inputbox" size="1"', 'value', 'text', intval( $row->contentid ) );

  # Check if new or edit
  if ($uid) {
    $row->checkout( $my->id );
  } else {
    $row->published = 0;
  }

  # Prepare Ordering box
  $order = mosGetOrderingList( "SELECT ordering AS value, title AS text FROM #__akocomment"
    . "\nWHERE contentid='$row->contentid' ORDER BY ordering" );
  $olist = mosHTML::selectList( $order, 'ordering', 'class="inputbox" size="1"', 'value', 'text', intval( $row->ordering ) );

  # Build up published box
  $publist = mosHTML::yesnoRadioList( 'published', 'class="inputbox"', $row->published );

  HTML_comment::editComment( $option, $row, $clist, $olist, $publist );
}

############################################################################

function saveComment( $option ) {
  global $database;
  $row = new mosAkocomment( $database );
  if (!$row->bind( $_POST )) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  $row->date = date( "Y-m-d H:i:s" );
  $row->ip   = getenv('REMOTE_ADDR');
  if (!$row->store()) {
    echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
    exit();
  }
  $row->updateOrder( "contentid='$row->contentid'" );
  mosRedirect( "index2.php?option=$option" );
}

############################################################################

function publishComments( $cid=null, $publish=1,  $option ) {
  global $database;
  if (!is_array( $cid ) || count( $cid ) < 1) {
    $action = $publish ? 'publish' : 'unpublish';
    echo "<script> alert('Select an item to $action'); window.history.go(-1);</script>\n";
    exit;
  }
  $cids = implode( ',', $cid );
  $database->setQuery( "UPDATE #__akocomment SET published='$publish' WHERE id IN ($cids)" );
  if (!$database->query()) {
    echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    exit();
  }
  mosRedirect( "index2.php?option=$option" );
}

############################################################################

function showAbout() {
  HTML_comment::showAbout();
}

############################################################################

function showConfig( $option ) {
  global $mosConfig_live_site, $mosConfig_absolute_path, $database;
  require($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");
?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
      }
      if (form.ac_autopublish.value == ""){
        alert( "Please choose publish mode." );
      } else {
        submitform( pressbutton );
      }
    }
    </script>

  <form action="index2.php" method="POST" name="adminForm">
  <table width="29%" class="adminheading">
	<tr>
	<td width="100%">
	<img src="components/com_akocomment/images/logo.png">
	</td>
	</tr>
  </table>  
  <table cellpadding="4" cellspacing="0" border="0" width="100%" >
  <tr>
  <td width="100%">
  <?php
  $akogbtabs = new mosTabs( 0 );
  $akogbtabs->startPane( "ako_comment" );
  $akogbtabs->startTab("General","General-page");
  ?>
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong>Main Operating Mode :</strong></td>
      <td width="22%" align="left" valign="top">
      <?php
        $acmainmode[] = mosHTML::makeOption( '0', 'Use individual botcommand' );
        $acmainmode[] = mosHTML::makeOption( '1', 'Choose from sections below' );
        $mc_ac_mainmode = mosHTML::selectList( $acmainmode, 'ac_mainmode', 'class="inputbox" size="2"', 'value', 'text', $ac_mainmode );
        echo $mc_ac_mainmode;
      ?>
      </td>
      <td align="left" valign="top" width="50%">With individual botcommand <font color="green">{moscomment}</font> you can choose wether to allow comments or not
      for every content item individually. Using the second option allows you to turn comments on/off for complete sections.</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Sections available :</strong></td>
      <td align="left" valign="top"><select size="5" name="acselections[]" class="inputbox" multiple="multiple">
      <?php
        $seclistarray = explode (",", $ac_sectionlist);
        $database -> setQuery("SELECT id,title FROM #__sections WHERE published='1' ORDER BY title ASC");
        $dbsectionlist = $database -> loadObjectList();
        foreach ($dbsectionlist as $slrow){
          echo "<option value='$slrow->id' ";
          if (in_array ($slrow->id, $seclistarray)) echo "selected";
          echo ">$slrow->title</option>";
        }
      ?>
        </select>
      </td>
      <td align="left" valign="top">If you use second operating mode, you can choose here which sections should use comment system. Multiple selections
      are possible.</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Autopublish Comments:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_autopublish', 'class="inputbox"', $ac_autopublish );
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Automatically publish new comments?" ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Anonymous Comments:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_anonentry', 'class="inputbox"', $ac_anonentry );
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Allow unregistered users to post comments?" ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>For registered users: show name or username ? </strong></td>
      <td align="left" valign="top">
        <?php
			//Build  box
			$confshowusername[] = mosHTML::makeOption( '1', 'Name' );
			$confshowusername[] = mosHTML::makeOption( '0', 'Username' );		
			$listshowusername = mosHTML::selectList( $confshowusername, 'ac_use_name', 'size="2"', 'value', 'text', $ac_use_name );
		  	echo $listshowusername;		
		?>
      </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Comment Window :</strong></td>
      <td align="left" valign="top">
        <?php
        $acopeningmode[] = mosHTML::makeOption( '0', 'Open in same window' );
        $acopeningmode[] = mosHTML::makeOption( '1', 'Open in new window' );
        $mc_ac_openingmode = mosHTML::selectList( $acopeningmode, 'ac_openingmode', 'class="inputbox" size="2"', 'value', 'text', $ac_openingmode );
        echo $mc_ac_openingmode;
      ?>
      </td>
      <td align="left" valign="top">Choose where to open the comments.</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show comments on Archives :</strong></td>
      <td align="left" valign="top">
        <?php
        echo mosHTML::yesnoRadioList( 'ac_showonarchives', 'class="inputbox"', $ac_showonarchives );
      ?>
      </td>
      <td align="left" valign="top"><input type="checkbox" name="ac_addonarchives" id="ac_addonarchives" value="1"<?php echo $ac_addonarchives ? ' checked="checked"' : ''; ?> />
    enabled add new comment on archive item</td>
    </tr>
  </table>
  <?php
    $akogbtabs->endTab();
    $akogbtabs->startTab("Layout","Layout-page");
  ?>  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong>Comments Sorting :</strong></td>
      <td width="22%" align="left" valign="top">
      <?php
        $acsorting[] = mosHTML::makeOption( 'DESC', 'New entries first' );
        $acsorting[] = mosHTML::makeOption( 'ASC', 'New entries last' );
        $mc_ac_sorting = mosHTML::selectList( $acsorting, 'ac_sorting', 'class="inputbox" size="1"', 'value', 'text', $ac_sorting );
        echo $mc_ac_sorting;
      ?>
      </td>
      <td align="left" valign="top" width="50%">Sorting of new comments.</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Autolimit num of comments to display : </strong></td>
      <td align="left" valign="top"><?php
			//Build  box
			$confnbtotalcomment[] = mosHTML::makeOption( '5', '5' );
			$confnbtotalcomment[] = mosHTML::makeOption( '10', '10' );	
			$confnbtotalcomment[] = mosHTML::makeOption( '20', '20' );	
			$confnbtotalcomment[] = mosHTML::makeOption( '30', '30' );	
			$confnbtotalcomment[] = mosHTML::makeOption( '40', '40' );	
			$confnbtotalcomment[] = mosHTML::makeOption( '50', '50' );	
			$confnbtotalcomment[] = mosHTML::makeOption( '100', '100' );
			$confnbtotalcomment[] = mosHTML::makeOption( '150', '150' );
			$confnbtotalcomment[] = mosHTML::makeOption( '200', '200' );
			$confnbtotalcomment[] = mosHTML::makeOption( '300', '300' );
			$confnbtotalcomment[] = mosHTML::makeOption( '400', '400' );
			$confnbtotalcomment[] = mosHTML::makeOption( '500', '500' );
			$confnbtotalcomment[] = mosHTML::makeOption( '1000', '1000' );
			$confnbtotalcomment[] = mosHTML::makeOption( '0', 'Unlimited' );
			$listnbtotalcomment = mosHTML::selectList( $confnbtotalcomment, 'ac_numautolimit', 'size="1"', 'value', 'text', $ac_numautolimit );
		  	echo $listnbtotalcomment;		
		?></td>
      <td align="left" valign="top"><input type="checkbox" name="ac_autolimit4add" id="ac_autolimit4add" value="1"<?php echo $ac_autolimit4add ? ' checked="checked"' : ''; ?> /> 
        Disabled add form 


 beyond the limit (block add new comment) </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Num of comments per page : </strong></td>
      <td align="left" valign="top">
	  <?php
			//Build  box
			$confnbcomments[] = mosHTML::makeOption( '5', '5' );
			$confnbcomments[] = mosHTML::makeOption( '10', '10' );		
			$confnbcomments[] = mosHTML::makeOption( '15', '15' );	
			$confnbcomments[] = mosHTML::makeOption( '20', '20' );	
			$confnbcomments[] = mosHTML::makeOption( '25', '25' );	
			$confnbcomments[] = mosHTML::makeOption( '30', '30' );	
			$confnbcomments[] = mosHTML::makeOption( '40', '40' );	
			$confnbcomments[] = mosHTML::makeOption( '50', '50' );
			$confnbcomments[] = mosHTML::makeOption( '100', '100' );		
			$listnbcomments = mosHTML::selectList( $confnbcomments, 'ac_numcomments', 'size="1"', 'value', 'text', $ac_numcomments );
		  	echo $listnbcomments;		
		?>
	  </td>
      <td align="left" valign="top">&nbsp;        </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show favoured link :</strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showfavouredlink', 'class="inputbox"', $ac_showfavouredlink );
        ?></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show quote this article in website link :</strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showquotelink', 'class="inputbox"', $ac_showquotelink );
        ?></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show hits/views :</strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showhits', 'class="inputbox"', $ac_showhits );
        ?></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show print link :</strong></td>
      <td align="left" valign="top">
        <?php		
		  echo mosHTML::yesnoRadioList( 'ac_showprintlink', 'class="inputbox"', $ac_showprintlink );
        ?>
      </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show send Email link :</strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showsendemaillink', 'class="inputbox"', $ac_showsendemaillink );
        ?>
      </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Show read more link :</strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showreadmorelink', 'class="inputbox"', $ac_showreadmorelink );
        ?>
      </td>
      <td align="left" valign="top"><input type="checkbox" name="ac_show_commentreadmore" id="ac_show_commentreadmore" value="1"<?php echo $ac_show_commentreadmore ? ' checked="checked"' : ''; ?> />
    No comment after content item ( On read more link actived) </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Character to separate each link : </strong></td>
      <td align="left" valign="top"><input name="ac_character_separate" type="text" value="<?php echo "$ac_character_separate"; ?>" size="5"></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
    <?php
    $akogbtabs->endTab();
    $akogbtabs->startTab("Posting","Posting-page");
    ?>
<SCRIPT LANGUAGE="Javascript" SRC="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/js/ColorPicker2.js"></SCRIPT>
<SCRIPT LANGUAGE="Javascript" SRC="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/js/AnchorPosition.js"></SCRIPT>
<SCRIPT LANGUAGE="Javascript" SRC="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/js/PopupWindow.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
var cp = new ColorPicker('window'); // Popup Color Picker window
</SCRIPT>	
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Time out </strong>:</td>
      <td align="left" valign="top"><input name="ac_timeout" type="text" value="<?php echo $ac_timeout ; ?>" size="8" maxlength="5"></td>
      <td align="left" valign="top">Time before post a new comment by the same user (seconds) </td>
    </tr>
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong><?php echo "BB Code Support:" ?></strong></td>
      <td width="22%" align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_bbcodesupport', 'class="inputbox"', $ac_bbcodesupport );
      ?>
      </td>
      <td align="left" valign="top" width="50%"><?php echo "Allow the use of BB Codes?" ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong><?php echo "Picture Support:" ?></strong></td>
      <td align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_picsupport', 'class="inputbox"', $ac_picsupport );
      ?>
      </td>
      <td align="left" valign="top"><?php echo "Allow the use of pictures in comments?" ?></td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Smilie Support :</strong></td>
      <td align="left" valign="top">
        <?php
        echo mosHTML::yesnoRadioList( 'ac_smiliesupport', 'class="inputbox"', $ac_smiliesupport );
      ?>
      </td>
      <td align="left" valign="top">Allow the use of Smilies in comments?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display field email : </strong></td>
      <td align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_displayfieldmail', 'class="inputbox"', $ac_displayfieldmail );
      ?>
	  </td>
      <td align="left" valign="top">Allow the use a field email author in header comments?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display field web :</strong></td>
      <td align="left" valign="top">
        <?php
        echo mosHTML::yesnoRadioList( 'ac_displayfieldweb', 'class="inputbox"', $ac_displayfieldweb );
      ?>
      </td>
      <td align="left" valign="top">Allow the use a field web in header comments?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display field Title :</strong></td>
      <td align="left" valign="top">
        <?php
        echo mosHTML::yesnoRadioList( 'ac_displayfieldtitle', 'class="inputbox"', $ac_displayfieldtitle );
      ?>
      </td>
      <td align="left" valign="top">Allow the use a field title in header comments?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display checkbox for contacted : </strong></td>
      <td align="left" valign="top"><?php
        echo mosHTML::yesnoRadioList( 'ac_displaycheckboxcontact', 'class="inputbox"', $ac_displaycheckboxcontact );
      ?></td>
      <td align="left" valign="top">Show &quot;I wish to be contacted by email regarding additional comments&quot; </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><font style="color:red !important"><strong>Disabled security code :</strong></font></td>
      <td align="left" valign="top">
        <?php
        echo mosHTML::yesnoRadioList( 'ac_disable_securitycode', 'class="inputbox"', $ac_disable_securitycode );
      ?>
      </td>
      <td align="left" valign="top">Not recommended to change this option (protect comments from spammers!)</td>
    </tr>
    <tr class="row0">
      <td><strong>Background color security code :</strong></td>
      <td><input name="ac_bgcolor_code" type="text" value="<?php echo $ac_bgcolor_code ; ?>" size="8"></td>
      <td><img src="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/images/color.gif" width="21" height="20" border="0" align="absmiddle" onClick="cp.select(document.adminForm.ac_bgcolor_code,'pick');return false;" style="cursor:pointer;" name="pick" id="pick"> </td>
    </tr>
    <tr class="row0">
      <td><strong>Font color security code :</strong></td>
      <td><input name="ac_fontcolor_code" type="text" value="<?php echo $ac_fontcolor_code ; ?>" size="8"></td>
      <td><img src="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/images/color.gif" width="21" height="20" border="0" align="absmiddle" onClick="cp.select(document.adminForm.ac_fontcolor_code,'pick');return false;" style="cursor:pointer;" name="pick" id="pick"> </td>
    </tr>
    <tr class="row0">
      <td><strong>Line color security code :</strong></td>
      <td><input name="ac_linecolor_code" type="text" value="<?php echo $ac_linecolor_code ; ?>" size="8"></td>
      <td><img src="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/images/color.gif" width="21" height="20" border="0" align="absmiddle" onClick="cp.select(document.adminForm.ac_linecolor_code,'pick');return false;" style="cursor:pointer;" name="pick" id="pick"> </td>
    </tr>
    <tr class="row0">
      <td><strong>Border color security code :</strong></td>
      <td><input name="ac_bordercolor_code" type="text" value="<?php echo $ac_bordercolor_code ; ?>" size="8"></td>
      <td><img src="<?php echo $mosConfig_live_site."/administrator/components/com_akocomment" ?>/images/color.gif" width="21" height="20" border="0" align="absmiddle" onClick="cp.select(document.adminForm.ac_bordercolor_code,'pick');return false;" style="cursor:pointer;" name="pick" id="pick"> </td>
    </tr>
    <tr class="row0">
      <td><strong>Preview image security code : </strong></td>
      <td>
		<img src='<?php echo $mosConfig_live_site; ?>/components/com_akocomment/img.php?bgc=<?php echo $ac_bgcolor_code; ?>&fc=<?php echo $ac_fontcolor_code; ?>&lc=<?php echo $ac_linecolor_code; ?>&bc=<?php echo $ac_bordercolor_code; ?>' border='0' alt='Code' style='vertical-align:middle'/>	  </td>
      <td>Save settings for refresh image</td>
    </tr>
  </table>
  <?php
    $akogbtabs->endTab();
    $akogbtabs->startTab("Notification","Notification-page");
  ?>
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong>Notify Admin :</strong></td>
      <td width="22%" align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_notify', 'class="inputbox"', $ac_notify );
      ?>
      </td>
      <td align="left" valign="top" width="50%">Notify an administrator by email?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Admin's Email for new comment :</strong></td>
      <td align="left" valign="top"><input type="text" name="ac_notify_email" value="<?php echo "$ac_notify_email"; ?>"></td>
      <td align="left" valign="top">Mail notification to which email address?</td>
    </tr>
  </table>
  <?php
  $akogbtabs->endTab();
    $akogbtabs->startTab("Reports","Reporting-page");
  ?>
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong>Report a comment :</strong></td>
      <td width="22%" align="left" valign="top">
      <?php
        echo mosHTML::yesnoRadioList( 'ac_report', 'class="inputbox"', $ac_report );
      ?>
      </td>
      <td align="left" valign="top" width="50%">Users can report a comment to administrator by email?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Admin's Email for report :</strong></td>
      <td align="left" valign="top"><input type="text" name="ac_report_email" value="<?php echo "$ac_report_email"; ?>"></td>
      <td align="left" valign="top">Mail report to which email address?</td>
    </tr>
  </table>
  <?php
  $akogbtabs->endTab();
  $akogbtabs->startTab("Favoured","Favoured-page");
  ?>  
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong>Users  :</strong></td>
      <td width="22%" align="left" valign="top">
        <?php
        $favoured_user[] = mosHTML::makeOption( '1', 'registered only' );
        $favoured_user[] = mosHTML::makeOption( '0', 'All users' );
        $list_favoured_user = mosHTML::selectList( $favoured_user, 'ac_favoured_user', 'class="inputbox" size="2"', 'value', 'text', $ac_favoured_user );
        echo $list_favoured_user;
      ?>
      </td>
      <td align="left" valign="top" width="50%">Choose who can favoured an article</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Number of favourites : </strong></td>
      <td align="left" valign="top"><?php
			//Build  box
			$confnbfavoured[] = mosHTML::makeOption( '3', '3' );
			$confnbfavoured[] = mosHTML::makeOption( '5', '5' );
			$confnbfavoured[] = mosHTML::makeOption( '6', '6' );
			$confnbfavoured[] = mosHTML::makeOption( '10', '10' );		
			$confnbfavoured[] = mosHTML::makeOption( '15', '15' );	
			$confnbfavoured[] = mosHTML::makeOption( '20', '20' );	
			$confnbfavoured[] = mosHTML::makeOption( '25', '25' );	
			$confnbfavoured[] = mosHTML::makeOption( '30', '30' );	
			$confnbfavoured[] = mosHTML::makeOption( '50', '50' );
			$listnbfavoured = mosHTML::selectList( $confnbfavoured, 'ac_numfavoured', 'size="1"', 'value', 'text', $ac_numfavoured );
		  	echo $listnbfavoured;		
		?></td>
      <td align="left" valign="top">Choose how much to display links favoured articles  after voting</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td colspan="3" align="left" valign="top"> <strong>How create a menu for display &quot;favourites of the readers

&quot; ?</strong><br>
        <br>
        - go to Menu &gt; mainmenu &gt; then select New
        <br>
- Choose type " Link - URL " then write the URL to be : <br>
 &nbsp;&nbsp;index.php?option=com_akocomment&amp;task=morefav </td>
      </tr>
    <tr align="center" valign="middle">
      <td colspan="3" align="left" valign="top"><strong><br>
        How create a menu for display &quot;my favourites&quot; for registered users?</strong><br>
        <br>
- go to Menu &gt; usermenu &gt; then select New <br>
- Choose type " Link - URL " then write the URL to be : <br>
&nbsp;&nbsp;index.php?option=com_akocomment&amp;task=myfavoured</td>
      </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
  <?php
  $akogbtabs->endTab();
   $akogbtabs->startTab("Template","Template-page");
  ?>
  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
    <tr align="center" valign="middle">
      <td width="28%" align="left" valign="top"><strong>Style comment :</strong></td>
      <td width="22%" align="left" valign="top"><?php	
			//Build  box
			$conftemplate[] = mosHTML::makeOption( '0', 'Table with alternate color' );
			$conftemplate[] = mosHTML::makeOption( '1', 'Fieldset' );		
			
			$directorytpl = opendir( $mosConfig_absolute_path."/components/com_akocomment/templates" );
			while( FALSE !== ($entryname = readdir($directorytpl))){
				if( $entryname!='.' && $entryname!='..' && $entryname!='' && is_dir($mosConfig_absolute_path."/components/com_akocomment/templates/".$entryname)==true ){
					$conftemplate[] = mosHTML::makeOption( $entryname, 'Template '.str_replace("_", " ", $entryname) );	
				}
			}
			closedir($directorytpl);  
			
			//$conftemplate[] = mosHTML::makeOption( '2', 'Bubble with alternate color' );	
			$listtemplate = mosHTML::selectList( $conftemplate, 'ac_showsinfieldset', 'size="1"', 'value', 'text', $ac_showsinfieldset );
		  	echo $listtemplate;		
		  //echo mosHTML::yesnoRadioList( 'ac_showsinfieldset', 'class="inputbox"', $ac_showsinfieldset );
		  
        ?></td>
      <td width="50%" align="left" valign="top">Choose template or show each comment in fieldset or alternate color in table</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Form Position :</strong></td>
      <td align="left" valign="top">
        <?php
        $acformpos[] = mosHTML::makeOption( '0', 'Behind Comments' );
        $acformpos[] = mosHTML::makeOption( '1', 'Above Comments' );
        $mc_ac_formposition = mosHTML::selectList( $acformpos, 'ac_formposition', 'class="inputbox" size="1"', 'value', 'text', $ac_formposition );
        echo $mc_ac_formposition;
      ?>
      </td>
      <td align="left" valign="top">Where should the form be displayed?</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display RSS Feed <img src="<?php echo $mosConfig_live_site ; ?>/components/com_akocomment/images/rss.gif" width="29" height="15" align="absmiddle" alt="" /> : </strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showrssfeed', 'class="inputbox"', $ac_showrssfeed );
        ?></td>
      <td align="left" valign="top">
        <?php
			//Build  box
			$confnbrss[] = mosHTML::makeOption( '5', '5 links' );
			$confnbrss[] = mosHTML::makeOption( '10', '10 links' );		
			$confnbrss[] = mosHTML::makeOption( '15', '15 links' );
			$confnbrss[] = mosHTML::makeOption( '20', '20 links' );
			$listnbrss = mosHTML::selectList( $confnbrss, 'ac_numrssfeed', 'size="1"', 'value', 'text', $ac_numrssfeed );
		  	echo $listnbrss;		
		?>
      </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display comment's number :</strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showcommentnumber', 'class="inputbox"', $ac_showcommentnumber );
        ?>
      </td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display IP comment's author : </strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_showip', 'class="inputbox"', $ac_showip );
        ?></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Display statut comment's author : </strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_statutUser', 'class="inputbox"', $ac_statutUser );
        ?></td>
      <td align="left" valign="top">display statut guest or registered</td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Link author to CB profile </strong></td>
      <td align="left" valign="top"><?php		
		  echo mosHTML::yesnoRadioList( 'ac_LinkCBProfile', 'class="inputbox"', $ac_LinkCBProfile );
        ?></td>
      <td align="left" valign="top">Link author to Community Builder Profile (replace email link by link to CB) </td>
    </tr>
    <tr align="center" valign="middle">
      <td align="left" valign="top"><strong>Date format :</strong></td>
      <td align="left" valign="top">
        <input name="ac_fdate" type="text" id="ac_fdate" value="<?php echo $ac_fdate; ?>">
      </td>
      <td align="left" valign="top">Specific <strong><em>strftime</em></strong> format date (example : <strong><font color="green">%d-%m-%Y %H:%M </font></strong>)</td>
    </tr>
  </table>
  <?php
  $akogbtabs->endTab();
  $akogbtabs->endPane();
  ?>
  <input type="hidden" name="option" value="<?php echo $option; ?>">
  <input type="hidden" name="act" value="<?php echo $act; ?>">
  <input type="hidden" name="task" value="">
  <input type="hidden" name="boxchecked" value="0">
 </td>
</tr>
</table>
</form>
<?php
}

############################################################################

/* new save config ( modified by visualclinic.fr )*/
function saveConfig ( $option ) {	

  $configfile = "components/com_akocomment/config.akocomment.php";
  @chmod ($configfile, 0766);
  $permission = is_writable($configfile);
  if (!$permission) {
    $mosmsg = "Config file not writeable!";
    mosRedirect("index2.php?option=$option&act=config",$mosmsg);
    break;
  }

  $ac_sectionlist = implode(",", mosGetParam( $_POST, 'acselections', 0 ));	
  
  // checked box
  $ac_show_commentreadmore 	= intval( mosGetParam( $_POST, 'ac_show_commentreadmore', 0 ));  
  $ac_addonarchives = intval( mosGetParam( $_POST, 'ac_addonarchives', 0 ));
  $ac_autolimit4add = intval( mosGetParam( $_POST, 'ac_autolimit4add', 0 ));
  
  // color img security code
  $ac_bgcolor_code = trim( mosGetParam( $_POST, 'ac_bgcolor_code', '' ));
  $ac_fontcolor_code = trim( mosGetParam( $_POST, 'ac_fontcolor_code', '' ));
  $ac_linecolor_code = trim( mosGetParam( $_POST, 'ac_linecolor_code', '' ));
  $ac_bordercolor_code = trim( mosGetParam( $_POST, 'ac_bordercolor_code', '' ));  
  if ( $ac_bgcolor_code=='' ) {$ac_bgcolor_code="#FFF4EA";}
  if ( $ac_fontcolor_code=='' ) {$ac_fontcolor_code="#FF8000";}
  if ( $ac_linecolor_code=='' ) {$ac_linecolor_code="#FFC896";}
  if ( $ac_bordercolor_code=='' ) {$ac_bordercolor_code="#FF8000";}
  if (substr($ac_bgcolor_code,0,1)=="#") $ac_bgcolor_code=substr($ac_bgcolor_code,1,6);
  if (substr($ac_fontcolor_code,0,1)=="#") $ac_fontcolor_code=substr($ac_fontcolor_code,1,6);
  if (substr($ac_linecolor_code,0,1)=="#") $ac_linecolor_code=substr($ac_linecolor_code,1,6);
  if (substr($ac_bordercolor_code,0,1)=="#") $ac_bordercolor_code=substr($ac_bordercolor_code,1,6);	

  $config  = "<?php\n"; 
  $config .= "\$ac_show_commentreadmore = \"" .$ac_show_commentreadmore ."\";\n"; 
  $config .= "\$ac_addonarchives = \"" .$ac_addonarchives ."\";\n"; 
  $config .= "\$ac_sectionlist = \"" .$ac_sectionlist ."\";\n"; 
  $config .= "\$ac_autolimit4add = \"" .$ac_autolimit4add ."\";\n"; 
  $config .= "\$ac_bgcolor_code = \"" .$ac_bgcolor_code ."\";\n"; 
  $config .= "\$ac_fontcolor_code = \"" .$ac_fontcolor_code ."\";\n"; 
  $config .= "\$ac_linecolor_code = \"" .$ac_linecolor_code ."\";\n"; 
  $config .= "\$ac_bordercolor_code = \"" .$ac_bordercolor_code ."\";\n"; 
  
  foreach ( $_POST as $k=>$v ) {
	 if ( $k!='option' && $k!='act' && $k!='task' && $k!='boxchecked' && $k!='acselections' && $k!='ac_show_commentreadmore' && $k!='ac_addonarchives' && $k!='ac_autolimit4add' && $k!='ac_bgcolor_code' && $k!='ac_fontcolor_code' && $k!='ac_linecolor_code' && $k!='ac_bordercolor_code' ){ 
		$config .= "$".$k." = \"".$v."\";\n";
	 }
  }	  
  $config .= "?>";

  if ($fp = fopen("$configfile", "w")) {
    fputs($fp, $config, strlen($config));
    fclose ($fp);
  }
  mosRedirect("index2.php?option=$option&task=settings", "Settings saved");
}

############################################################################

function removeComments( $cid, $option ) {
  global $database;
  if (count( $cid )) {
    $cids = implode( ',', $cid );
    $database->setQuery( "DELETE FROM #__akocomment WHERE id IN ($cids)" );
    if (!$database->query()) {
      echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
    }
  }
  mosRedirect( "index2.php?option=$option" );
}

############################################################################

function showLanguage($option) {

  global $mosConfig_absolute_path, $mosConfig_lang;

  if (file_exists($mosConfig_absolute_path.'/components/com_akocomment/languages/'.$mosConfig_lang.'.php')) {
    $file = $mosConfig_absolute_path.'/components/com_akocomment/languages/'.$mosConfig_lang.'.php';
  } else {
    $file = $mosConfig_absolute_path.'/components/com_akocomment/languages/english.php';
  }
  @chmod ($file, 0766);
  $permission = is_writable($file);
  if (!$permission) {
    echo "<center><h1><font color=red>Warning...</FONT></h1><BR>";
    echo "<B>You need to chmod the file to 766 in order to save your updates.</B></center><BR />";
  }

  HTML_comment::showFile($file,$option);
}

function saveLanguage($file, $filecontent, $option) {

  @chmod ($file, 0766);
  $permission = is_writable($file);
  if (!$permission) {
    mosRedirect("index2.php?option=$option&task=language", "File not writeable!");
    break;
  }

  if ($fp = fopen( $file, "w")) {
    fputs($fp,stripslashes($filecontent));
    fclose($fp);
    mosRedirect( "index2.php?option=$option&task=language", "Language file saved" );
  }
}