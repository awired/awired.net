<?php
/**
* Joomla Community Builder
* @version $Id: comprofiler.php 604 2006-11-23 13:49:26Z beat $
* @package Community Builder
* @subpackage comprofiler.php
* @author JoomlaJoe and Beat
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $mosConfig_debug, $mosConfig_lang, $mosConfig_emailpass, $option, $task;

if($mosConfig_debug) {
	ini_set('display_errors',true);
	error_reporting(E_ALL);
}

/** @global mosMainFrame $mainframe
 *  @global mosUser $my
 *  @global gacl_api $acl
 *  @global stdClass $access
 */
global $access, $mainframe, $my, $acl;
$access = new stdClass();
$access->canEdit = $acl->acl_check( 'action', 'edit', 'users', $my->usertype, 'content', 'all' );
$access->canEditOwn = $acl->acl_check( 'action', 'edit', 'users', $my->usertype, 'content', 'own' );

require_once ( $mainframe->getPath( 'front_html' ) );
/** @global string $_CB_adminpath
 *  @global string $_CB_joomla_adminpath
 *  @global array $ueConfig
 */
global $_CB_joomla_adminpath, $_CB_adminpath, $ueConfig;
$_CB_joomla_adminpath = $mainframe->getCfg( 'absolute_path' ). "/administrator";
$_CB_adminpath = $_CB_joomla_adminpath. "/components/com_comprofiler";
include_once($_CB_adminpath."/ue_config.php" );
include_once($_CB_adminpath."/plugin.class.php");
include_once($_CB_adminpath."/comprofiler.class.php");
include_once($_CB_adminpath."/imgToolbox.class.php");

$UElanguagePath=$mainframe->getCfg( 'absolute_path' ).'/components/com_comprofiler/plugin/language';
if (file_exists($UElanguagePath.'/'.$mosConfig_lang.'/'.$mosConfig_lang.'.php')) {
  include_once($UElanguagePath.'/'.$mosConfig_lang.'/'.$mosConfig_lang.'.php');
} else include_once($UElanguagePath.'/default_language/default_language.php');


$form	=	mosGetParam( $_REQUEST, 'reportform', 1 );
$uid	=	mosGetParam( $_REQUEST, 'uid', 0 );
$act	=	mosGetParam( $_REQUEST, 'act', 1 );

if(!isset($mosConfig_emailpass) || is_null($mosConfig_emailpass)) $mosConfig_emailpass=0;

$oldignoreuserabort = null;

switch( $task ) {

	case "userDetails":
	case "userdetails":
	userEdit( $option, $my->id, _UE_UPDATE );
	break;

	case "saveUserEdit":
	case "saveuseredit":
	$oldignoreuserabort = ignore_user_abort(true);
	userSave( $option, $my->id );
	break;
	
	case "userProfile":
	case "userprofile":
	userProfile($option, $my->id, _UE_UPDATE);
	break;

	case "usersList":
	case "userslist":
	usersList($my->id);
	break;

	case "userAvatar":
	case "useravatar":
	userAvatar($option, $my->id, _UE_UPDATE);
	break;

	case "lostPassword":
	case "lostpassword":
	lostPassForm( $option );
	break;

	case "sendNewPass":
	case "sendnewpass":
	$oldignoreuserabort = ignore_user_abort(true);
	sendNewPass( $option );
	break;

	case "registers":
	registerForm( $option, $mosConfig_emailpass );
	break;

	case "saveregisters":
	$oldignoreuserabort = ignore_user_abort(true);
	saveRegistration( $option );
	break;

	case "login":
	$oldignoreuserabort = ignore_user_abort(true);
	login();
	break;
	
	case "logout":
	$oldignoreuserabort = ignore_user_abort(true);
	logout();
	break;

	case "confirm":
	$oldignoreuserabort = ignore_user_abort(true);
	// confirm( mosGetParam( $_GET, 'confirmcode', "1" ) );		// mambo 4.5.3h braindead: does intval of octal from hex in mosGetParam...
	if (isset($_GET['confirmcode'])) $confirmcode = cbGetEscaped($_GET['confirmcode']);
	else $confirmcode = "1";
	confirm($confirmcode);
	break;

	case "moderateImages":
	case "moderateimages":
	$oldignoreuserabort = ignore_user_abort(true);
	moderateImages($option);
	break;

	case "moderateReports":
	case "moderatereports":
	$oldignoreuserabort = ignore_user_abort(true);
	moderateReports($option);
	break;

	case "moderateBans":
	case "moderatebans":
	$oldignoreuserabort = ignore_user_abort(true);
	moderateBans($option);
	break;

	case "approveImage":
	case "approveimage":
	$oldignoreuserabort = ignore_user_abort(true);
	approveImage();
	break;

	case "reportUser":
	case "reportuser":
	$oldignoreuserabort = ignore_user_abort(true);
	reportUser($option,$form,$uid);
	break;

	case "processReports":
	case "processreports":
	$oldignoreuserabort = ignore_user_abort(true);
	processReports();
	break;

	case "banProfile":
	case "banprofile":
	$oldignoreuserabort = ignore_user_abort(true);
	banUser($option,$uid,$form,$act);
	break;

	case "viewReports":
	case "viewreports":
	viewReports($option,$uid);
	break;

	case "emailUser":
	case "emailuser":
	emailUser($option,$uid);
	break;

	case "pendingApprovalUser":
	case "pendingapprovaluser":
	pendingApprovalUsers($option);
	break;

	case "approveUser":
	case "approveuser":
	$oldignoreuserabort = ignore_user_abort(true);
	approveUser(mosGetParam($_POST,'uids'));
	break;

	case "rejectUser":
	case "rejectuser":
	$oldignoreuserabort = ignore_user_abort(true);
	rejectUser(mosGetParam($_POST,'uids'));
	break;

	case "sendUserEmail":
	case "senduseremail":
	$oldignoreuserabort = ignore_user_abort(true);
	sendUserEmail(mosGetParam($_POST,'toID'),mosGetParam($_POST,'fromID'),mosGetParam($_POST,'emailSubject'),mosGetParam($_POST,'emailBody'));
	break;

	case "addConnection":
	case "addconnection":
	$oldignoreuserabort = ignore_user_abort(true);
	addConnection($my->id,mosGetParam($_REQUEST,'connectionid'),((isset($_POST['message'])) ? mosGetParam($_POST,'message') : ""));
	break;

	case "removeConnection":
	case "removeconnection":
	$oldignoreuserabort = ignore_user_abort(true);
	removeConnection($my->id,mosGetParam($_REQUEST,'connectionid'));
	break;

	case "denyConnection":
	case "denyconnection":
	$oldignoreuserabort = ignore_user_abort(true);
	denyConnection($my->id,mosGetParam($_REQUEST,'connectionid'));
	break;	

	case "acceptConnection":
	case "acceptconnection":
	$oldignoreuserabort = ignore_user_abort(true);
	acceptConnection($my->id,mosGetParam($_REQUEST,'connectionid'));
	break;

	case "manageConnections":
	case "manageconnections":
	manageConnections($my->id);
	break;

	case "saveConnections":
	case "saveconnections":
	$oldignoreuserabort = ignore_user_abort(true);
	saveConnections(mosGetParam($_POST,'uid'));
	break;

	case "processConnectionActions":
	case "processconnectionactions":
	$oldignoreuserabort = ignore_user_abort(true);
	processConnectionActions(mosGetParam($_POST,'uid'));
	break;

	case "teamCredits":
	case "teamcredits":
	teamCredits(1);
	break;

	case "tabclass":
	tabClass($option, $my->id);
	break;

	case "done":
	break;
	
	default:
	userProfile($option, $my->id, _UE_UPDATE);
	break;
}
if (!is_null($oldignoreuserabort)) ignore_user_abort($oldignoreuserabort);

function sendUserEmail($toid,$fromid,$subject,$message) {
	global $ueConfig,$my, $database, $_POST, $_PLUGINS;;
	
	// simple spoof check security
	cbSpoofCheck();
	cbAntiSpamCheck();

	if (($my->id == 0) || ($my->id != $fromid) || ($ueConfig['allow_email_display']!=1 && $ueConfig['allow_email_display']!=3)) {
		mosNotAuth();
		return;
	}

	$spamCheck = cbSpamProtect( $my->id, true );
	if ( $spamCheck ) {
		echo $spamCheck;
		return;
	}

	$rowFrom = new mosUser( $database );
	$rowFrom->load( (int) $fromid );
	
	$rowTo = new mosUser( $database );
	$rowTo->load( (int) $toid );
		
	if (isset($_POST["protect"])
		&& $_POST["protect"] == md5("hash".$rowTo->id.$rowTo->password.$rowTo->lastvisitDate.$rowFrom->password.$rowFrom->lastvisitDate) ) {
		
		$_PLUGINS->loadPluginGroup('user');
		$results = $_PLUGINS->trigger( 'onBeforeEmailUser', array( &$rowFrom, &$rowTo, 1 ));	//$ui=1
		if ($_PLUGINS->is_errors()) {
			echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
			exit();
		}
		if (is_array($results)) {
			echo implode( "<br />", $results );
		}

		$cbNotification = new cbNotification();
		$res=$cbNotification->sendUserEmail($toid,$fromid,$subject,$message, true);
	
		if ($res) echo _UE_SENTEMAILSUCCESS;
		else echo _UE_SENTEMAILFAILED;
	} else {
		echo _UE_SESSIONTIMEOUT." "._UE_SENTEMAILFAILED;
	}
}

function emailUser($option,$uid) {
	global $database,$ueConfig,$my;
	if (($my->id == 0) || ($ueConfig['allow_email_display']!=1 && $ueConfig['allow_email_display']!=3)) {
		mosNotAuth();
		return;
	}
	
	$spamCheck = cbSpamProtect( $my->id, false );
	if ( $spamCheck ) {
		echo $spamCheck;
		return;
	}
	$rowFrom = new mosUser( $database );
	$rowFrom->load( $my->id );
	
	$rowTo = new mosUser( $database );
	$rowTo->load( (int) $uid );	
	HTML_comprofiler::emailUser($option,$rowFrom,$rowTo);
}

function userEdit( $option, $uid, $submitvalue, $regErrorMSG=null ) {
	global $database, $ueConfig, $_POST;
	if ($uid == 0) {
		mosNotAuth();
		return;
	}

	$database->setQuery( "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id=".(int) $uid);
	$users = $database->loadObjectList();
	$user = $users[0];

	if($regErrorMSG!==null) {
		// simple spoof check security
		//cbSpoofCheck();	Already done in UserSave()
		if (isset($_POST['firstname']))		$user->firstname	= cbGetUnEscaped($_POST['firstname']);
		if (isset($_POST['middlename']))	$user->middlename	= cbGetUnEscaped($_POST['middlename']);
		if (isset($_POST['lastname']))		$user->lastname		= cbGetUnEscaped($_POST['lastname']);
		if (isset($_POST['name']))			$user->name			= cbGetUnEscaped($_POST['name']);
		if (isset($_POST['username']))		$user->username		= cbGetUnEscaped($_POST['username']);
		if (isset($_POST['email']))			$user->email		= cbGetUnEscaped($_POST['email']);
		
		$database->setQuery( "SELECT f.* FROM #__comprofiler_fields f, #__comprofiler_tabs t"
						. "\n WHERE f.published=1 and f.tabid = t.tabid AND t.enabled=1 and f.readonly=0" );
		$rowFields = $database->loadObjectList();
		$cbFields=new cbFields();
		for ($i=0, $n=is_array($rowFields) ? count( $rowFields ) : 0; $i < $n; $i++) {
			$field=cbGetEscaped($rowFields[$i]->name);
			$value=null;
			if(isset($_POST[$rowFields[$i]->name])) {
				$value = $_POST[$rowFields[$i]->name];
			}
			$user->$field = $cbFields->prepareFieldDataSave( $rowFields[$i]->fieldid, $rowFields[$i]->type, $rowFields[$i]->name, $value );
		}
		// save user params
		$params = mosGetParam( $_POST, 'cbparams', null );
		//echo "params:".print_r($params);
		if($params != null) {
			if (is_array( $params )) {
				$txt = array();
				foreach ( $params as $k=>$v) {
					$txt[] = "$k=$v";
				}
				$user->params = implode( "\n", $txt );
			}
		}
	}
	
	HTML_comprofiler::userEdit( $user, $option, $submitvalue, $regErrorMSG );
}

function userAvatar( $option, $uid, $submitvalue) {
	global $database;
	if ($uid == 0) {
		mosNotAuth();
		return;
	}
	$row = new mosUser( $database );
	$row->load( (int) $uid );
	$row->orig_password = $row->password;
	HTML_comprofiler::userAvatar( $row, $option, $submitvalue);
}

function setUserDBrequest( $uid ) {
	global $database, $_REQUEST;
	
	if (!isset($_REQUEST['user'])) {
		if (!$uid) {
			return false;
		}
		$database->setQuery( "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id=".(int) $uid);
	} else {
		$userReq = urldecode(cbGetUnEscaped($_REQUEST['user']));
		$len = strlen($userReq);
		if (($len > 2) && (substr($userReq, 0, 1) == "'") && (substr($userReq, $len-1, 1) == "'")) {
			$userReq = substr($userReq, 1, $len-2);
			$database->setQuery( "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND u.username='".cbGetEscaped(utf8ToISO($userReq))."'");
		} else {
			$database->setQuery( "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id=".(int) $_REQUEST['user']);
		}
	}
	return true;
}

function userProfile( $option, $uid, $submitvalue) {
	global $database, $_REQUEST, $ueConfig,$my;
	if (isset($_REQUEST['user'])) {
		if (!allowAccess( $ueConfig['allow_profileviewbyGID'],'RECURSE', userGID($my->id))) {
			echo _UE_NOT_AUTHORIZED;
			return;
		}
	} else {
		if ($uid==0) {
			echo _UE_REGISTERFORPROFILE;
			return;
		}
	}
	$users=array();
	if (setUserDBrequest($uid)) {
		$users = $database->loadObjectList();
	}
	if (count($users)==0) { 
		echo _UE_NOSUCHPROFILE; 
		return; 
	}

	$user = $users[0];

	HTML_comprofiler::userProfile( $user, $option, $submitvalue);
}

function tabClass( $option, $uid ) {
	global $database, $ueConfig,$my;

	$users=array();
	if (setUserDBrequest($uid)) {
		$users = $database->loadObjectList();
	}

	if (count($users)==0) { 
		$user = null;
	} else {
		$user = $users[0];
	}
	HTML_comprofiler::tabClass( $user, $option );
}

function usersList($uid) {
	global $database,$my,$ueConfig,$_POST,$_REQUEST;

	$database->setQuery("SELECT listid, title FROM #__comprofiler_lists WHERE published=1 AND useraccessgroupid IN (".implode(',',getChildGIDS(userGID($uid))).") ORDER BY ordering");
	$plists = $database->loadObjectList();
	//print $database->getQuery();
	$lists = array();
	$publishedlists = array();

	for ($i=0, $n=count( $plists ); $i < $n; $i++) {
		$plist =& $plists[$i];
	   	$publishedlists[] = mosHTML::makeOption( $plist->listid, getLangDefinition($plist->title) );
	}

	if(!isset($_POST['listid']) && !isset($_GET['listid'])) {
		$database->setQuery( "SELECT listid FROM #__comprofiler_lists "
		. "\n WHERE `default`=1 AND published=1" );
		$listid = (int) $database->loadresult();
	} else {
		if(isset($_POST['listid'])) {
			$listid = (int) cbGetEscaped($_POST['listid']);
		} else {
			$listid = (int) cbGetEscaped($_GET['listid']);
		}
	}
	if(!($listid > 0)) {
		echo _UE_NOLISTFOUND;
		return;
	}
	if (count($plists)>1) {
		$lists['plists'] = mosHTML::selectList( $publishedlists, 'listid', 'class="inputbox" size="1" onchange="this.form.submit();"', 'value', 'text', $listid );
	} else {
		$lists['plists'] = "&nbsp;";
	}
	
	$database->setQuery( "SELECT l.* FROM #__comprofiler_lists l"
	. "\n WHERE l.listid=".(int) $listid." AND l.published=1" );
	$row = $database->loadObjectList();
	
	if (!(is_array($row))) {
		echo _UE_LIST_DOES_NOT_EXIST;
		return;
	}
	if (!allowAccess( $row[0]->useraccessgroupid,'RECURSE', userGID($uid))) {
		echo _UE_NOT_AUTHORIZED;
		return;
	}
	
	$option_itemid = (isset($_REQUEST['Itemid'])) ? "&amp;Itemid=".cbGetEscaped($_REQUEST['Itemid']) : getCBprofileItemid(true);
	
	
	$col=$row[0]->col1fields;
	$col=explode('|*|',$col);
	$lfields="";	
	for ($i=0, $n=count( $col ); $i < $n; $i++) {
		if($i==0) $lfields .= "<td valign='top'>\n";
		else $lfields .= "<br/>\n";			
		if($col[$i]!='' && $col[$i]!=null) {
			$database->setQuery( "SELECT f.name, f.title, f.type "
				. "\nFROM #__comprofiler_fields AS f"
				. "\nWHERE f.published = 1 AND f.fieldid=".(int) $col[$i]);
			if ($cfield = $database->loadObjectList()) {
				$cfield = $cfield[0];
				if($row[0]->col1captions==1)  $oTitle =  str_replace("'","\\'",getLangDefinition($cfield->title)).": ";
				else $oTitle='';
				// $lfields .=  " \".getFieldValue('".$cfield->type."',\$user->".$cfield->name.",\$user,'".$oTitle."').\"";
				$lfields .=  " \".getFieldValue('".$cfield->type."',\$user->".$cfield->name.",\$user,'".$oTitle."'".($cfield->type=="predefined" ? ",0, sefRelToAbs(\"index.php?option=com_comprofiler&amp;task=userProfile&amp;user=\".\$user->id.\"$option_itemid\")" : "").").\"";
			}
		}
	}
	$lfields .= "</td>\n";
	if($row[0]->col2enabled) {
		$col=$row[0]->col2fields;
		$col=explode('|*|',$col);	
		for ($i=0, $n=count( $col ); $i < $n; $i++) {
			if($i==0) $lfields .= "<td valign='top'>\n";
			else $lfields .= "<br/>\n";
			if($col[$i]!='' && $col[$i]!=null) {
				$database->setQuery( "SELECT f.name, f.title, f.type "
					. "\nFROM #__comprofiler_fields AS f"
					. "\nWHERE f.published = 1 AND f.fieldid=".(int) $col[$i]);
				if ($cfield = $database->loadObjectList()) {
					$cfield = $cfield[0];
					if($row[0]->col2captions==1) $oTitle =  str_replace("'","\\'",getLangDefinition($cfield->title)).": ";
					else $oTitle='';
					$lfields .=  " \".getFieldValue('".$cfield->type."',\$user->".$cfield->name.",\$user,'".$oTitle."'".($cfield->type=="predefined" ? ",0, sefRelToAbs(\"index.php?option=com_comprofiler&amp;task=userProfile&amp;user=\".\$user->id.\"$option_itemid\")" : "").").\"";
				}
			}
		}
		$lfields .= "</td>\n";
	}
	if($row[0]->col3enabled) {
		$col=$row[0]->col3fields;
		$col=explode('|*|',$col);	
		for ($i=0, $n=count( $col ); $i < $n; $i++) {
			if($i==0) $lfields .= "<td valign='top'>\n";
			else $lfields .= "<br/>\n";
			if($col[$i]!='' && $col[$i]!=null) {
				$database->setQuery( "SELECT f.name, f.title, f.type "
					. "\nFROM #__comprofiler_fields AS f"
					. "\nWHERE f.published = 1 AND f.fieldid=".(int) $col[$i]);
				if ($cfield = $database->loadObjectList()) {
					$cfield = $cfield[0];
					if($row[0]->col3captions==1) $oTitle =  str_replace("'","\\'",getLangDefinition($cfield->title)).": ";
					else $oTitle='';
					$lfields .=  " \".getFieldValue('".$cfield->type."',\$user->".$cfield->name.",\$user,'".$oTitle."'".($cfield->type=="predefined" ? ",0, sefRelToAbs(\"index.php?option=com_comprofiler&amp;task=userProfile&amp;user=\".\$user->id.\"$option_itemid\")" : "").").\"";
				}
			}
		}
		$lfields .= "</td>\n";
	}
	if($row[0]->col4enabled) {
		$col=$row[0]->col4fields;
		$col=explode('|*|',$col);	
		for ($i=0, $n=count( $col ); $i < $n; $i++) {
			if($i==0) $lfields .= "<td valign='top'>\n";
			else $lfields .= "<br/>\n";
			if($col[$i]!='' && $col[$i]!=null) {
				$database->setQuery( "SELECT f.name, f.title, f.type "
					. "\nFROM #__comprofiler_fields AS f"
					. "\nWHERE f.published = 1 AND f.fieldid=".(int) $col[$i]);
				if ($cfield = $database->loadObjectList()) {
					$cfield = $cfield[0];
					if($row[0]->col4captions==1)  $oTitle =  str_replace("'","\\'",getLangDefinition($cfield->title)).": ";
					else $oTitle='';
					$lfields .=  " \".getFieldValue('".$cfield->type."',\$user->".$cfield->name.",\$user,'".$oTitle."'".($cfield->type=="predefined" ? ",0, sefRelToAbs(\"index.php?option=com_comprofiler&amp;task=userProfile&amp;user=\".\$user->id.\"$option_itemid\")" : "").").\"";
				}
			}		

		}
		$lfields .= "</td>\n";
	}
	$row=$row[0];
	HTML_comprofiler::usersList($row,$lfields,$lists,$listid);
}

function userSave($option, $uid) {
	global $database, $ueConfig, $_POST, $_PLUGINS, $mainframe;

	// simple spoof check security
	cbSpoofCheck();

	$user_id = intval( mosGetParam( $_POST, 'id', 0 ));
	if ($uid == 0 || $user_id == 0 || $user_id <> $uid) {
		mosNotAuth();
		return;
	}
	$row = new mosUser( $database );
	$row->load( $user_id );
	$row->orig_password = $row->password;


	if (!$row->bind( $_POST )) {
		echo "<script type=\"text/javascript\"> alert('".unhtmlentities($row->getError())."');</script>\n";
		userEdit($option, $user_id, _UE_UPDATE, $row->getError() );
		return;

	}

	if ( in_array( $ueConfig['name_style'], array( 2, 3 ) ) ) {
		$firstname = cbGetUnEscaped( isset( $_POST['firstname'] ) ? trim( $_POST['firstname'] ) : "");
		$lastname  = cbGetUnEscaped( isset( $_POST['lastname'] )  ? trim( $_POST['lastname']  ) : "");
	}
	switch ( $ueConfig['name_style'] ) {
		case 2:
			$row->name = $firstname . ' ' . $lastname;
		break;
		case 3:
			$middlename  = cbGetUnEscaped( isset( $_POST['middlename'] )  ? trim( $_POST['middlename']  ) : "");
			$row->name = $firstname . ' ' . ( $middlename ? ( $middlename . ' ' ) : '' ) . $lastname;
		break;
		default:
		break;
	}
	
	$row->username	= trim ( $row->username );
	$row->email		= trim ( $row->email );

	mosMakeHtmlSafe($row);


	if(isset($_POST["password"]) && $_POST["password"] != "") {
		if(isset($_POST["verifyPass"]) && ($_POST["verifyPass"] == $_POST["password"])) {
			$row->password = md5($row->password);
		} else {
			echo "<script type=\"text/javascript\"> alert(\""._PASS_MATCH."\");</script>\n";
			userEdit($option, $user_id, _UE_UPDATE, _PASS_MATCH );
			return;

		}
	} else {
		// Restore 'original password'
		$row->password = $row->orig_password;
	}
	if (!$row->check()) {
		echo "<script type=\"text/javascript\"> alert('".unhtmlentities($row->getError())."');</script>\n";
		userEdit($option, $user_id, _UE_UPDATE, $row->getError() );
		return;
	}

	unset($row->orig_password); // prevent DB error!!
	
	

	$database->setQuery( "SELECT f.* FROM #__comprofiler_fields f, #__comprofiler_tabs t"
	. "\n WHERE f.published=1 and f.tabid = t.tabid AND t.enabled=1 and f.readonly=0" );
	$rowFields = $database->loadObjectList();

	$reqErrors = array();

	$cbFields=new cbFields();
	$rowExtras = new moscomprofiler($database);
	for($i=0, $n=is_array($rowFields) ? count( $rowFields ) : 0; $i < $n; $i++) {
		$field=cbGetEscaped($rowFields[$i]->name);
		$value=null;
		if(isset($_POST[$rowFields[$i]->name])) {
			$value = $_POST[$rowFields[$i]->name];
		}
		$rowExtras->$field = $cbFields->prepareFieldDataSave( $rowFields[$i]->fieldid, $rowFields[$i]->type, $rowFields[$i]->name, $value );
		if ($rowExtras->$field == "" && $rowFields[$i]->required == 1 && !in_array($rowFields[$i]->type, array("delimiter", "hidden"))) {
			$reqErrors[] = getLangDefinition($rowFields[$i]->title) . " : " . unHtmlspecialchars(_UE_REQUIRED_ERROR);
		}
	}
	
	$rowExtras->id				= $user_id;
	$rowExtras->user_id			= $user_id;
	$rowExtras->lastupdatedate	= date('Y-m-d\TH:i:s');
	$rowExtras->firstname		= cbGetUnEscaped((isset($_POST['firstname'])  ? trim( $_POST['firstname']  ) : ""));
	$rowExtras->middlename		= cbGetUnEscaped((isset($_POST['middlename']) ? trim( $_POST['middlename'] ) : ""));
	$rowExtras->lastname		= cbGetUnEscaped((isset($_POST['lastname'])   ? trim( $_POST['lastname']   ) : ""));

	if (in_array($mainframe->getCfg("frontend_userparams"), array('1', null))) {
		// save user params
		$params = mosGetParam( $_POST, 'cbparams', null );
		if($params != null) {
			if (is_array( $params )) {
				$txt = array();
				foreach ( $params as $k=>$v) {
					$txt[] = "$k=$v";
				}
				$row->params = implode( "\n", $txt );
			}
		}
	}
	
	// check server-side the JS front-end checks:
	switch( $ueConfig['name_style'] ) {
		case 2:
		case 3:
			if ($rowExtras->firstname == "") {
				$reqErrors[] = _UE_YOUR_FNAME . " : " . unHtmlspecialchars(_UE_REQUIRED_ERROR);
			}
			if ($rowExtras->lastname == "") {
				$reqErrors[] = _UE_YOUR_LNAME . " : " . unHtmlspecialchars(_UE_REQUIRED_ERROR);
			}
		break;
		default:
		break;
	}
	if (strlen($row->username) < 3) {
		$reqErrors[] = sprintf( unHtmlspecialchars(_VALID_AZ09), unHtmlspecialchars(_PROMPT_UNAME), 2 );
	}
	if(isset($_POST["password"]) && $_POST["password"] != "") {
		if (strlen(cbGetUnEscaped($_POST["password"])) < 6) {
			$reqErrors[] = sprintf( unHtmlspecialchars(_VALID_AZ09), unHtmlspecialchars(_REGISTER_PASS), 6 );
		} elseif (isset($_POST["verifyPass"]) && ($_POST["verifyPass"] != $_POST["password"])) {
			$reqErrors[] = unHtmlspecialchars(_REGWARN_VPASS2);
		}
	}
	if (count($reqErrors) > 0) {
		echo "<script type=\"text/javascript\">alert(\"".implode('\n',$reqErrors)."\"); </script>\n";
		userEdit($option, $user_id, _UE_UPDATE, implode("<br />",$reqErrors)."<br />" );
		return;
	}

	$_PLUGINS->loadPluginGroup('user');
	$_PLUGINS->trigger( 'onBeforeUserUpdate', array(&$row,&$rowExtras));
	if($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); </script>\n";
		userEdit($option, $user_id, _UE_UPDATE, $_PLUGINS->getErrorMSG("<br />") );
		return;
	}

	$userComplete =& moscomprofiler::dbObjectsMerge($row, $rowExtras);
	$tabs = new cbTabs( 0, 1);
	$tabs->savePluginTabs($userComplete, $_POST);		// this changes $row and $rowExtras by reference in $userComplete
	
	if (!$row->store()) {
		echo "<script type=\"text/javascript\"> alert('store:".unhtmlentities($row->getError())."');</script>\n";
		userEdit($option, $user_id, _UE_UPDATE, $row->getError() );
		return;
	}
	
	if($database->updateObject( '#__comprofiler', $rowExtras, 'id', false)) {
		echo "<script type=\"text/javascript\"> alert('store:".unhtmlentities($database->stderr(true))."'); window.history.go(-1); </script>\n";
	}

	$_PLUGINS->trigger( 'onAfterUserUpdate', array($row, $rowExtras, true));

	mosRedirect(sefRelToAbs("index.php?option=com_comprofiler".getCBprofileItemid()), _USER_DETAILS_SAVE);		// ."&task=userDetails"
}

function lostPassForm( $option ) {
	global $mainframe;
	
	if (method_exists($mainframe, "SetPageTitle")) $mainframe->SetPageTitle(_PROMPT_PASSWORD);
	HTML_comprofiler::lostPassForm($option);
}

function sendNewPass( $option ) {
	global $database, $Itemid;
	global $ueConfig,$_PLUGINS;
	// for _NEWPASS_MSG and _NEWPASS_SUB :
	global $mosConfig_live_site, $mosConfig_sitename;
	
	// simple spoof check security
	cbSpoofCheck();

	// ensure no malicous sql gets past
	$checkusername = trim( mosGetParam( $_POST, 'checkusername', '') );
	$confirmEmail = trim( mosGetParam( $_POST, 'confirmEmail', '') );

	// these two are used by _NEWPASS_SUB message below:
	$_live_site = $mosConfig_live_site;
	$_sitename = "";	// sitename already added in subject by cbNotification class. was = $mosConfig_sitename;

	$database->setQuery( "SELECT id FROM #__users"
	. "\nWHERE username='$checkusername' AND email='$confirmEmail'"
	);

	if (!($user_id = $database->loadResult()) || !$checkusername || !$confirmEmail) {
		mosRedirect(sefRelToAbs("index.php?option=$option&task=lostPassword".($Itemid ? "&Itemid=".$Itemid : "")),_ERROR_PASS );
	}

	$newpass = makePass();
	$message = _NEWPASS_MSG;
	eval ("\$message = \"$message\";");
	$subject = _NEWPASS_SUB;
	eval ("\$subject = \"$subject\";");

	$_PLUGINS->loadPluginGroup('user');
	$_PLUGINS->trigger( 'onBeforeNewPassword', array( $user_id, &$newpass, &$subject, &$message ));
	if ($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
		exit();
	}

	$cbNotification = new cbNotification();
	$res=$cbNotification->sendFromSystem($user_id,$subject,$message);
	
	
	if ($res) {
		$_PLUGINS->trigger( 'onNewPassword', array($user_id,$newpass));

		$newpass = md5( $newpass );
		$sql = "UPDATE #__users SET password='$newpass' WHERE id = " . (int) $user_id;
		$database->setQuery( $sql );
		if (!$database->query()) {
			die("SQL error" . $database->stderr(true));
		}

	 	mosRedirect(sefRelToAbs("index.php?option=$option&task=done".($Itemid ? "&Itemid=".$Itemid : "")),_NEWPASS_SENT );
	 } else { 
		mosRedirect(sefRelToAbs("index.php?option=$option&task=done".($Itemid ? "&Itemid=".$Itemid : "")),_UE_NEWPASS_FAILED );
	}
}

function makePass(){
	$makepass="";
	$salt = "abchefghjkmnpqrstuvwxyz0123456789";
	srand((double)microtime()*1000000);
	$i = 0;
	while ($i <= 7) {
		$num = rand() % 33;
		$tmp = substr($salt, $num, 1);
		$makepass = $makepass . $tmp;
		$i++;
	}
	return ($makepass);
}

function registerForm( $option, $emailpass,$regErrorMSG=null ) {
	global $mosConfig_allowUserRegistration, $ueConfig, $database, $my, $_POST, $_PLUGINS;

	if ( ( ( $mosConfig_allowUserRegistration == '0' )
		   && ( ( ! isset($ueConfig['reg_admin_allowcbregistration']) ) || $ueConfig['reg_admin_allowcbregistration'] != '1' ) )
		 || $my->id ) {
		mosNotAuth();
		return;
	}

	$fieldsQuery = "SELECT f.* FROM #__comprofiler_fields f, #__comprofiler_tabs t"
			. "\n WHERE t.tabid = f.tabid AND f.published=1 AND f.registration=1 AND t.enabled=1"
			. "\n ORDER BY t.position, t.ordering, f.ordering";

	$_PLUGINS->loadPluginGroup('user');
	$results = $_PLUGINS->trigger( 'onBeforeRegisterForm', array( $option, $emailpass, &$regErrorMSG, &$fieldsQuery ) );
	if($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); </script>\n";
		echo htmlspecialchars( $_PLUGINS->getErrorMSG("<br />") );
		return;
	}
	if ( implode( $results ) != "" ) {
		$allResults = implode( "</div><div>", $results );
		echo "<div>" . $allResults . "</div>";
		return;
	}

	$database->setQuery( $fieldsQuery );
	$rowFields = $database->loadObjectList();
	$rowFieldValues=array();
	for ($i=0, $n=is_array($rowFields) ? count( $rowFields ) : 0; $i < $n; $i++) {
		$rowFields[$i]->readonly = 0;		// read-only setting must be ignored at registration, as it's for profile only.
		$k="";
		if ($regErrorMSG!==null) {
			if (isset($_POST[$rowFields[$i]->name]) || ($rowFields[$i]->type=='webaddress' && $rowFields[$i]->rows==2 && isset($_POST[$rowFields[$i]->name."Text"]))) {
				if (is_array($_POST[$rowFields[$i]->name])) $k = implode("|*|",$_POST[$rowFields[$i]->name]);
				else $k=$_POST[$rowFields[$i]->name];
				$k=htmlspecialchars(cbGetUnEscaped($k));
			}
		} else {
			$_POST[$rowFields[$i]->name] = ((get_magic_quotes_gpc()==1) ? addslashes($rowFields[$i]->default) : $rowFields[$i]->default);
			$k=htmlspecialchars($rowFields[$i]->default);
		}
		$database->setQuery( "SELECT fieldtitle FROM #__comprofiler_field_values"
		. "\n WHERE fieldid = ".(int) $rowFields[$i]->fieldid
		. "\n ORDER BY ordering" );
		$Values = $database->loadObjectList();
		if(count($Values) > 0) {
			$multi = ($rowFields[$i]->type=='multiselect') ? 'multiple="multiple"' : '';
			$vardisabled = ($rowFields[$i]->readonly > 0) ? ' disabled="disabled"' : '';
			if($rowFields[$i]->type=='radio') {
				$rowFieldValues['lst_'.$rowFields[$i]->name] = moscomprofilerHTML::radioListTable( $Values, $rowFields[$i]->name, 
					'class="inputbox" size="1" '.$vardisabled.'mosReq="'.$rowFields[$i]->required.'" mosLabel="'.getLangDefinition($rowFields[$i]->title).'"', 
					'fieldtitle', 'fieldtitle', $k, $rowFields[$i]->cols, $rowFields[$i]->rows, $rowFields[$i]->size, $rowFields[$i]->required);
			} else {
				$ks=explode("|*|",$k);
				$k = array();
				foreach($ks as $kv) {
					$k[]->fieldtitle=$kv;
				}
				if($rowFields[$i]->type=='multicheckbox') {
					$rowFieldValues['lst_'.$rowFields[$i]->name] = moscomprofilerHTML::checkboxListTable( $Values, $rowFields[$i]->name."[]", 
						'class="inputbox" size="'.$rowFields[$i]->size.'" '.$multi.$vardisabled.' mosLabel="'.getLangDefinition($rowFields[$i]->title).'"', 
						'fieldtitle', 'fieldtitle', $k, $rowFields[$i]->cols, $rowFields[$i]->rows, $rowFields[$i]->size, $rowFields[$i]->required);
				} else {
					$rowFieldValues['lst_'.$rowFields[$i]->name] = moscomprofilerHTML::selectList( $Values, $rowFields[$i]->name."[]", 
						'class="inputbox" size="'.$rowFields[$i]->size.'" '.$multi.$vardisabled.' mosReq="'.$rowFields[$i]->required.'" mosLabel="'.getLangDefinition($rowFields[$i]->title).'"', 
						'fieldtitle', 'fieldtitle', $k);
				}
			}
		}
	}
	if ($regErrorMSG===null) {
		$regErrorMSG = "";			// So that default values are displayed
		$_POST['firstname'] = "";
		$_POST['middlename'] = "";
		$_POST['lastname'] = "";
		$_POST['name'] = "";
		$_POST['username'] = "";
		$_POST['email'] = "";	
	}

	HTML_comprofiler::registerForm($option, $emailpass, $rowFields, $rowFieldValues,$regErrorMSG);
}

function saveRegistration( $option ) {
	global $database, $my, $acl, $ueConfig, $mainframe, $_POST;
	global $mosConfig_emailpass, $mosConfig_allowUserRegistration, $_PLUGINS;

	// simple spoof check security
	cbSpoofCheck();
	cbRegAntiSpamCheck();

	if ( ( ( $mosConfig_allowUserRegistration == '0' )
		   && ( ( ! isset($ueConfig['reg_admin_allowcbregistration']) ) || $ueConfig['reg_admin_allowcbregistration'] != '1' ) )
		 || $my->id ) {
		mosNotAuth();
		return;
	}

	// $database->setQuery("SELECT id FROM #__users WHERE email = '".cbGetEscaped( $_POST['email'] )."' AND username='0'"); 
	// $uid = $database->loadResult();
	// if($uid >0 ) $_POST['id'] = $uid;

	$row = new mosUser( $database );
	
	if (!$row->bind( $_POST )) {
		echo "<script type=\"text/javascript\"> alert('".unhtmlentities($row->getError())."');</script>\n";
		registerForm( $option, $mosConfig_emailpass,$row->getError() );
		return;
	}

	if ( in_array( $ueConfig['name_style'], array( 2, 3 ) ) ) {
		$error = null;
		if ( isset( $_POST['firstname'] ) ) {
			$firstname = cbGetUnEscaped( trim( $_POST['firstname'] ) );
		} else {
			$error = _UE_YOUR_FNAME . ": " . _UE_REQUIRED_ERROR;
		}
		if ( isset( $_POST['lastname'] ) ) {
			$lastname = cbGetUnEscaped( trim( $_POST['lastname'] ) );
		} else {
			$error = _UE_YOUR_LNAME . ": " . _UE_REQUIRED_ERROR;
		}
		if ( $error ) {
			echo "<script type=\"text/javascript\"> alert('".unhtmlentities($error)."');</script>\n";
			registerForm( $option, $mosConfig_emailpass,$error );
			return;
		}
	}
	switch ( $ueConfig['name_style'] ) {
		case 2:
			$row->name = $firstname . ' ' . $lastname;
		break;
		case 3:
			$middlename  = cbGetUnEscaped( isset( $_POST['middlename'] )  ? trim( $_POST['middlename']  ) : "");
			$row->name = $firstname . ' ' . ( $middlename ? ( $middlename . ' ' ) : '' ) . $lastname;
		break;
		default:
		break;
	}
	
	mosMakeHtmlSafe($row);
	$row->id 		= 0;
	$row->gid		= $acl->get_group_id('Registered','ARO');
	$row->usertype	= 'Registered';
	
	$row->username	= trim ( $row->username );
	$row->email		= trim ( $row->email );

	if (!$row->password) {
		$row->password = makePass();
		$generatedPassword = true;
	} else {
		$generatedPassword = false;
	}

	$row->registerDate = date("Y-m-d\TH:i:s");

	if (!$row->check()) {
		echo "<script type=\"text/javascript\"> alert('".unhtmlentities($row->getError())."');</script>\n";
		registerForm( $option, $mosConfig_emailpass,$row->getError() );
		return;
	}

	if ($ueConfig['reg_admin_approval']=="0") {
		$approved	= "1";
	} else {
		$approved	= "0";
		$row->block	= '1';
	} 
	if ($ueConfig['reg_confirmation']=="0") {
		$confirmed	= "1";
	} else {
		$confirmed	= "0";
		$row->block = '1';
	} 
	if ( isset( $_POST['acceptedterms'] ) ) {
		$acceptedterms = cbGetUnEscaped( $_POST['acceptedterms'] );
	} else {
		$acceptedterms = null;
	}

	$database->setQuery( "SELECT f.* FROM #__comprofiler_fields f, #__comprofiler_tabs t"
	. "\n WHERE t.tabid = f.tabid AND f.published=1 AND f.registration=1 AND t.enabled=1"
	);
	$rowFields = $database->loadObjectList();

	$reqErrors = array();

	$notallowed = array("http:", "https:", "mailto:", "//", "[url]", "<a", "</a>", "&#");
	$cbFields  = new cbFields();
	$badHtmlFilter	  = & $cbFields->getInputFilter( array (), array (), 1, 1 );
	$badNonHtmlFilter = & $cbFields->getInputFilter();
	$rowExtras = new moscomprofiler($database);
	for($i=0, $n=is_array($rowFields) ? count( $rowFields ) : 0; $i < $n; $i++) {
		$field=cbGetEscaped($rowFields[$i]->name);
		$value=null;
		if(isset($_POST[$rowFields[$i]->name])) {
			$value = $_POST[$rowFields[$i]->name];
		}
		$rowExtras->$field = $cbFields->prepareFieldDataSave( $rowFields[$i]->fieldid, $rowFields[$i]->type, $rowFields[$i]->name, $value );
		if ($rowExtras->$field == "" && $rowFields[$i]->required == 1 && !in_array($rowFields[$i]->type, array("delimiter", "hidden"))) {
			$reqErrors[] = getLangDefinition($rowFields[$i]->title) . " : " . unHtmlspecialchars(_UE_REQUIRED_ERROR);
		}
		// some registration anti-spam measures:
		if ( is_array( $value ) && in_array( $rowFields[$i]->type, array('multiselect', 'multicheckbox', 'select' ) ) ) {
			// values check already done in prepareFieldDataSave()
		} elseif ( is_array( $value ) ) {
			if ( ! defined('_UE_INPUT_VALUE_NOT_ALLOWED') ) DEFINE('_UE_INPUT_VALUE_NOT_ALLOWED','This input value is not authorized.');
			$reqErrors[] = getLangDefinition($rowFields[$i]->title) . " : " . unHtmlspecialchars(_UE_INPUT_VALUE_NOT_ALLOWED);
		} else {
			$value = cbGetUnEscaped( $value );
			switch ( $rowFields[$i]->type ) {
				case "webaddress":
					$value = str_replace( array( 'http://','https://' ), '', $value );
					break;
				case 'emailaddress': 
					$value = str_replace( 'mailto:', '', $value );
					break;		
				default:
					break;
			}
			if ( $rowFields[$i]->type == "editorta") {
				$filteredValue = $cbFields->clean( $badHtmlFilter, $value );
			} else {
				$filteredValue = $cbFields->clean( $badNonHtmlFilter, str_replace( $notallowed, "", $value ) );
			}
			if ( $value !== $filteredValue ) {
				if ( ! defined('_UE_INPUT_VALUE_NOT_ALLOWED') ) DEFINE('_UE_INPUT_VALUE_NOT_ALLOWED','This input value is not authorized.');
				$reqErrors[] = getLangDefinition($rowFields[$i]->title) . " : " . unHtmlspecialchars(_UE_INPUT_VALUE_NOT_ALLOWED);
			}
		}
	}
	
	$rowExtras->id				= null;
	$rowExtras->user_id			= null;
	$rowExtras->firstname		= cbGetUnEscaped((isset($_POST['firstname'])  ? trim( $_POST['firstname']  ) : ""));
	$rowExtras->middlename		= cbGetUnEscaped((isset($_POST['middlename']) ? trim( $_POST['middlename'] ) : ""));
	$rowExtras->lastname		= cbGetUnEscaped((isset($_POST['lastname'])   ? trim( $_POST['lastname']   ) : ""));
	$rowExtras->acceptedterms	= $acceptedterms;
	$rowExtras->approved		= $approved;
	$rowExtras->confirmed		= $confirmed;
	$rowExtras->registeripaddr	= cbGetIPlist();

	// some more registration anti-spam measures:
	$testfields = array( '_REGISTER_UNAME' => $row->username,
						 '_REGISTER_EMAIL' => $row->email,
						 '_UE_YOUR_NAME'   => $row->name, 
						 '_UE_YOUR_FNAME'  => $rowExtras->firstname,
						 '_UE_YOUR_MNAME'  => $rowExtras->middlename,
						 '_UE_YOUR_LNAME'  => $rowExtras->lastname );
	foreach ( $testfields as $k => $v ) {
		$filteredValue = $cbFields->clean( $badNonHtmlFilter, str_replace( $notallowed, "", $v ) );
		if ( $filteredValue != $v ) {
			if ( ! defined('_UE_INPUT_VALUE_NOT_ALLOWED') ) DEFINE('_UE_INPUT_VALUE_NOT_ALLOWED','This input value is not authorized.');
			$reqErrors[] = getLangDefinition($k) . " : " . unHtmlspecialchars(_UE_INPUT_VALUE_NOT_ALLOWED);			
		}
	}

	switch( $ueConfig['name_style'] ) {
		case 2:
		case 3:
			if ($rowExtras->firstname == "") {
				$reqErrors[] = _UE_YOUR_FNAME . " : " . unHtmlspecialchars(_UE_REQUIRED_ERROR);
			}
			if ($rowExtras->lastname == "") {
				$reqErrors[] = _UE_YOUR_LNAME . " : " . unHtmlspecialchars(_UE_REQUIRED_ERROR);
			}
		break;
		default:
		break;
	}
	if (strlen($row->username) < 3) {
		$reqErrors[] = sprintf( unHtmlspecialchars(_VALID_AZ09), unHtmlspecialchars(_PROMPT_UNAME), 2 );
	}
	if ($mosConfig_emailpass != "1") {
		if ($generatedPassword || strlen($row->password) < 6) {
			$reqErrors[] = sprintf( unHtmlspecialchars(_VALID_AZ09), unHtmlspecialchars(_REGISTER_PASS), 6 );
		} elseif (isset($_POST["verifyPass"]) && ($_POST["verifyPass"] != $_POST["password"])) {
			$reqErrors[] = unHtmlspecialchars(_REGWARN_VPASS2);
		}
	}
	if($ueConfig['reg_enable_toc']) {
		if ($rowExtras->acceptedterms == "") {
			$reqErrors[] = _UE_TOC_REQUIRED;
		}
	}
	if (count($reqErrors) > 0) {
		echo "<script type=\"text/javascript\">alert(\"".implode('\n',$reqErrors)."\"); </script>\n";
		registerForm( $option, $mosConfig_emailpass,implode("<br />",$reqErrors)."<br />" );
		return;
	}

	$_PLUGINS->loadPluginGroup('user');
	$_PLUGINS->trigger( 'onBeforeUserRegistration', array(&$row,&$rowExtras));
	if($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); </script>\n";
		registerForm( $option, $mosConfig_emailpass,$_PLUGINS->getErrorMSG("<br />") );
		return;
	}
	$approved	= $rowExtras->approved;		// in case changed by onBeforeUserRegistration trigger
	$confirmed	= $rowExtras->confirmed;

	$pwd = $row->password;
	$row->password = md5( $row->password );

	if (!$row->store()) {		// first store to get new user id if id is not set (needed for savePluginTabs)
		echo "<script type=\"text/javascript\"> alert('store:".unhtmlentities($row->getError())."'); </script>\n";
		registerForm( $option, $mosConfig_emailpass,$row->getError() );
		return;
	}

	if ( $row->id == 0 ) {
		$database->setQuery("SELECT id FROM #__users WHERE username = '".cbGetEscaped( $_POST['username'] )."'");
		$uid = $database->loadResult();
		$row->id=$uid;		// this is only for mambo 4.5.0 backwards compatibility. 4.5.2.3 $row->store() updates id on insert
	}	
	$rowExtras->id = $row->id;
	$rowExtras->user_id = $row->id;
	
	$row->password = $pwd;
	
	if ( $confirmed == '0' ) {
		$randomHash		= md5( mosMakePassword() );
		$scrambleSeed	= (int) hexdec(substr( md5 ( $mainframe->getCfg( 'secret' ) . $mainframe->getCfg( 'db' ) ), 0, 7));
		$scrambledId	= $scrambleSeed ^ ( (int) $row->id );
		$rowExtras->cbactivation = "reg" . $randomHash . sprintf( "%08x", $scrambledId );
	}

	$userComplete =& moscomprofiler::dbObjectsMerge($row, $rowExtras);
	$tabs = new cbTabs( 0, 1);
	$results_save_tabs = $tabs->saveRegistrationPluginTabs($userComplete, $_POST);
	$pwd = $row->password;
	$row->password = md5( $row->password );

	if (!$row->store()) {
		echo "<script type=\"text/javascript\"> alert('".unhtmlentities($row->getError())."'); </script>\n";
		registerForm( $option, $mosConfig_emailpass,$row->getError() );
		return;
	}

	if(!$database->insertObject( '#__comprofiler', $rowExtras)) {
		// added this help error message at 1.0.2, since this is the place where rows using new columns registeripaddr and cbactivation are inserted first:
		echo "comprofiler store error (did you apply all database changes ? try reapplying all SQL queries described in experts upgrade instructions in README.txt):<br />"
		. $database->stderr(true) . "\n";
		exit();
	}

	$row->password = $pwd;
	$_PLUGINS->trigger( 'onAfterUserRegistration', array($row, $rowExtras, true));

	$query = "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id =" . (int) $row->id;
	$database->setQuery($query);
	$user = $database->loadObjectList();
	
	$pwd_md5 = $user[0]->password;
	$user[0]->password = $pwd;
	
	$cbNotification = new cbNotification();
	$modSub=null;
	$modMSG=null;
	if($confirmed==0) { 
		$cbNotification->sendFromSystem($user[0],getLangDefinition(stripslashes($ueConfig['reg_pend_appr_sub'])),getLangDefinition(stripslashes($ueConfig['reg_pend_appr_msg'])));
 	} elseif($approved==0 && $confirmed==1) {
		$cbNotification->sendFromSystem($user[0],getLangDefinition(stripslashes($ueConfig['reg_pend_appr_sub'])),getLangDefinition(stripslashes($ueConfig['reg_pend_appr_msg'])));
		$modSub=_UE_REG_ADMIN_PA_SUB;
		$modMSG=_UE_REG_ADMIN_PA_MSG;
 	} else {
		// done in activateUser() below: $cbNotification->sendFromSystem($user[0],getLangDefinition(stripslashes($ueConfig['reg_welcome_sub'])),getLangDefinition(stripslashes($ueConfig['reg_welcome_msg'])));
		$modSub=_UE_REG_ADMIN_SUB;
		$modMSG=_UE_REG_ADMIN_MSG;
		activateUser($user[0], 1, "UserRegistration", false);
	}
	$user[0]->password = $pwd_md5;
	if($modSub!=null) {
		if($ueConfig['moderatorEmail']) {
			$cbNotification->sendToModerators($modSub,$cbNotification->_replaceVariables($modMSG,$user[0]));
		}
	}

	if ($mosConfig_emailpass == "1" && $ueConfig['reg_admin_approval']=="1" && $ueConfig['reg_confirmation']=="0"){
		$messagesToUser = _UE_REG_COMPLETE_NOPASS_NOAPPR;
	} elseif ($mosConfig_emailpass == "1" && $ueConfig['reg_admin_approval']=="1" && $ueConfig['reg_confirmation']=="1") {
		$messagesToUser = _UE_REG_COMPLETE_NOPASS_NOAPPR_CONF;
	} elseif ($mosConfig_emailpass == "1" && $ueConfig['reg_admin_approval']=="0" && $ueConfig['reg_confirmation']=="0") {
		$messagesToUser = _UE_REG_COMPLETE_NOPASS;
	} elseif ($mosConfig_emailpass == "1" && $ueConfig['reg_admin_approval']=="0" && $ueConfig['reg_confirmation']=="1") {
		$messagesToUser = _UE_REG_COMPLETE_NOPASS_CONF;
	} elseif ($mosConfig_emailpass == "0" && $ueConfig['reg_admin_approval']=="1" && $ueConfig['reg_confirmation']=="0") {
		$messagesToUser = _UE_REG_COMPLETE_NOAPPR;
	} elseif ($mosConfig_emailpass == "0" && $ueConfig['reg_admin_approval']=="1" && $ueConfig['reg_confirmation']=="1") {
		$messagesToUser = _UE_REG_COMPLETE_NOAPPR_CONF;
	} elseif ($mosConfig_emailpass == "0" && $ueConfig['reg_admin_approval']=="0" && $ueConfig['reg_confirmation']=="1") {
		$messagesToUser = _UE_REG_COMPLETE_CONF;
	} else {
		$messagesToUser = _UE_REG_COMPLETE;
	}

	foreach ($results_save_tabs as $res) {
		if ($res) $messagesToUser .= "<br />".$res;
	}

	$_PLUGINS->trigger( 'onAfterUserRegistrationMailsSent', array($row, $rowExtras, &$messagesToUser, $ueConfig['reg_confirmation'], $ueConfig['reg_admin_approval'], true));
	if($_PLUGINS->is_errors()) {
		echo $_PLUGINS->getErrorMSG();
		return;
	}

	echo $messagesToUser;
}


function login( $username=null,$passwd=null ) {
    global $acl, $database, $_COOKIE, $_GET, $_POST, $mainframe, $ueConfig, $_PLUGINS;

	// simple spoof check security (login module does it only with Joomla functions, no cb.class inclusion)
	if ( is_callable("josSpoofCheck")) {
		josSpoofCheck(1);
	}

    $resultError = null;
    // $usercookie = mosGetParam( $_COOKIE, 'usercookie', '' );
    // $sessioncookie = mosGetParam( $_COOKIE, 'sessioncookie', '' );
    if (!$username || !$passwd) {
            $username = trim( mosGetParam( $_POST, 'username', '' ) );
            $passwd = trim( mosGetParam( $_POST, 'passwd', '' ) );
            //$passwd = md5( $passwd2 );
    }
	$return = trim( mosGetParam( $_POST, 'return', null ) );
	$message = trim( mosGetParam( $_POST, 'message', 0 ) );
	//print "message:".$message;
    // $remember = trim( mosGetParam( $_POST, 'remember', '' ) );
	// $lang = trim( mosGetParam( $_POST, 'lang', '' ) );

	if (!$username || !$passwd) {
		$resultError = _LOGIN_INCOMPLETE;
	} else {
		$_PLUGINS->loadPluginGroup('user');
		$_PLUGINS->trigger( 'onBeforeLogin', array($username, $passwd2));
		//print_r($results);
		if($_PLUGINS->is_errors()) {
			$resultError = $_PLUGINS->getErrorMSG();
		} else {
			// Doesn't work any more, the maintainer should really update this instead of advising reversal of installs
			/*$database->setQuery( "SELECT * "
			. "\nFROM #__users u, "
			. "\n #__comprofiler ue "
			. "\nWHERE u.username='".$username."' AND u.password='".$passwd."' AND u.id = ue.id"
			);
			$row = null;
			if ($database->loadObject( $row )) {*/
			// Lets borrow from Joomla! shall we?
			// query used for login via login module
			$query = "SELECT *"
			. "\n FROM #__users u,"
			. "\n #__comprofiler ue "
			. "\n WHERE u.username = ". $database->Quote( $username ) . " AND u.id = ue.id"
			;

			$database->setQuery( $query );
			$database->loadObject( $row );

			if (is_object($row)) {
				// user blocked from login
				if ($row->block == 1) {
					mosErrorAlert(_LOGIN_BLOCKED);
				}

				if (!$valid_remember) {
					// Conversion to new type
					if ((strpos($row->password, ':') === false) && $row->password == md5($passwd)) {
						// Old password hash storage but authentic ... lets convert it
						$salt = mosMakePassword(16);
						$crypt = md5($passwd.$salt);
						$row->password = $crypt.':'.$salt;

						// Now lets store it in the database
						$query	= 'UPDATE #__users'
								. ' SET password = '.$database->Quote($row->password)
								. ' WHERE id = '.(int)$row->id;
						$database->setQuery($query);
						if (!$database->query()) {
							// This is an error but not sure what to do with it ... we'll still work for now
						}
					}
					list($hash, $salt) = explode(':', $row->password);
					$cryptpass = md5($passwd.$salt);
					if ($hash != $cryptpass) {
						if ( $bypost ) {
							mosErrorAlert(_LOGIN_INCORRECT);
						} else {
die('I like pie'. $cryptpass);
							$mainframe->logout();
							mosRedirect('index.php');
						}
						exit();
					}
				}

				if ($row->approved == 2){
					$resultError = _LOGIN_REJECTED;
				}
				else if ($row->confirmed != 1){
					$cbNotification = new cbNotification();
					$cbNotification->sendFromSystem($row->id,getLangDefinition(stripslashes($ueConfig['reg_pend_appr_sub'])),getLangDefinition(stripslashes($ueConfig['reg_pend_appr_msg'])));
					$resultError = _LOGIN_NOT_CONFIRMED;
				}
				else if ($row->approved == 0){
					$resultError = _LOGIN_NOT_APPROVED;
				}
				else if ($row->block == 1) {
					$resultError = _LOGIN_BLOCKED;
				}
				else if ($row->lastvisitDate == '0000-00-00 00:00:00') {
					$_PLUGINS->trigger( 'onBeforeFirstLogin', array( &$row, $username, $passwd2 ));
					if ($_PLUGINS->is_errors()) {
						$resultError = $_PLUGINS->getErrorMSG( "<br />" );
					}					
					if (isset($ueConfig['reg_first_visit_url']) and ($ueConfig['reg_first_visit_url'] != "")) {
						$return = sefRelToAbs($ueConfig['reg_first_visit_url']);
					}
				}
			} else {
				$resultError = _LOGIN_INCORRECT;
			}
		}

		$returnURL = null;
		if ($resultError) {
			$alertmessage = $resultError;
		} else {
			if (checkJversion() == 0) {
				$mainframe->login($username,$passwd);
			} else {
				$mainframe->login($username,$passwd2);
			}
			$_PLUGINS->trigger( 'onAfterLogin', array($row, true));
			$alertmessage = $message ? _LOGIN_SUCCESS : null;
			
			if ( $return && !( strpos( $return, 'com_comprofiler') && ( strpos( $return, 'login') || strpos( $return, 'registers' ) ) ) ) {
			// checks for the presence of a return url
			// and ensures that this url is not the registration or login pages
				$returnURL = (strncasecmp($return, "http:", 5)||strncasecmp($return, "https:", 6)) ? $return : sefRelToAbs($return);
			} else {
				$returnURL = sefRelToAbs('index.php');
			}
		}
		// JS Popup message
		if ( $alertmessage ) {
			echo '<script type="text/javascript"><!--//'."\n";
			echo 'alert( "' . str_replace( "<br />", "  ", $alertmessage ) . '" );';
			if ( $returnURL ) {
				echo "window.location = '" . $returnURL . "';";
			}
			echo "\n//-->\n</script>\n";
			/*
			**not sure if this is the best case but the 
			**reason why we weren't seeing the login message was
			**because we are immediately redirecting to another page
			**so if we flush out the contents to the browser then we get the alert.
			*/
			if (!$resultError && function_exists("ob_flush")) {
				ob_flush();			// warning: this makes mosRedirect fail in IE6, as headers are already sent...JS redirect will work.
			}
		}
	}
	if ($resultError) {
		echo "<div class=\"message\">".$resultError."</div>";
		return;
	} else {
		mosRedirect( $returnURL );
	}
}
function logout() {
	global $_POST, $mainframe, $my, $database, $_PLUGINS;
	
	$return = trim( mosGetParam( $_POST, 'return', null ) );
	$message = trim( mosGetParam( $_POST, 'message', 0 ) );
	
	if ($return || $message) {
		// simple spoof check security (login module does it only with Joomla functions, no cb.class inclusion)
		if ( is_callable("josSpoofCheck")) {
			josSpoofCheck(1);
		}
	}
	
	$database->setQuery( "SELECT * "
	. "\nFROM #__users u, "
	. "\n#__comprofiler ue"
	. "\nWHERE u.id=".$my->id." AND u.id = ue.id"
	);
	$row = null;
	$database->loadObject( $row );
	$_PLUGINS->loadPluginGroup('user');
	$_PLUGINS->trigger( 'onBeforeLogout', array($row));
	if($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\");</script>\n";
		echo "<div class=\"message\">".$_PLUGINS->getErrorMSG()."</div>";;
		return;
	}
	$mainframe->logout();
	$_PLUGINS->trigger( 'onAfterLogout', array($row, true));

	// JS Popup message
	if ( $message ) {
		?>
		<script type="text/javascript"> 
		<!--//
		alert( "<?php echo _LOGOUT_SUCCESS; ?>" ); 
		//-->
		</script>
		<?php
		/*
		**not sure if this is the best case but the 
		**reason why we weren't seeing the logout message was
		**because we are immediately redirecting to another page
		**so if we flush out the contents to the browser then we get the alert.
		*/
		if (function_exists("ob_flush")) {
			ob_flush();
		}
	}

	if ($return) {
		mosRedirect( (strncasecmp($return, "http:", 5)||strncasecmp($return, "https:", 6)) ? $return : sefRelToAbs($return));
	} else {
		mosRedirect(sefRelToAbs('index.php'));
	}
}
function confirm($confirmcode){
	global $database, $mainframe, $my, $ueConfig, $_PLUGINS;
	
	if($my->id < 1) {
		$lengthConfirmcode = strlen($confirmcode);
		if ($lengthConfirmcode == ( 3+32+8 ) ) {
			$scrambleSeed	= (int) hexdec(substr( md5 ( $mainframe->getCfg( 'secret' ) . $mainframe->getCfg( 'db' ) ), 0, 7));
			$unscrambledId	= $scrambleSeed ^ ( (int) hexdec(substr( $confirmcode, 3+32 ) ) );
			$query = "SELECT * FROM #__comprofiler c, #__users u "
					. " WHERE c.id = " . (int) $unscrambledId . " AND c.cbactivation = '" . cbGetEscaped($confirmcode) . "' AND c.id=u.id";
		} elseif ($lengthConfirmcode == 32) {	//BBTODO: this is for confirmation links previous to CB 1.0.2: remove after CB 1.0.2:
			$query = "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND md5(c.id) = '" . cbGetEscaped($confirmcode) . "'";
		} else {
			mosNotAuth();
			return;			
		}
		$database->setQuery($query);
		$user = $database->loadObjectList();	

		if ( ( $user === null ) || ( count( $user ) == 0 ) || ( ($lengthConfirmcode == 32) && isset($user[0]->cbactivation ) && $user[0]->cbactivation ) ) {
			$query = "SELECT * FROM #__comprofiler c, #__users u "
					. " WHERE c.id = " . (int) $unscrambledId . " AND c.id=u.id";
			$database->setQuery($query);
			$user = $database->loadObjectList();
			if ( ( $user === null ) || ( count( $user ) == 0 ) || ($user[0]->confirmed == 0) ) {
				mosNotAuth();
			} else {
				if ($user[0]->approved == 0) {
					echo _UE_USER_CONFIRMED_NEEDAPPR . "<br />";
				} else {
					echo _UE_USER_CONFIRMED . "<br>";
				}
			}
			return;
		}

		$_PLUGINS->loadPluginGroup('user');		
		$_PLUGINS->trigger( 'onBeforeUserConfirm', array($user[0]));
		if($_PLUGINS->is_errors()) {
				echo $_PLUGINS->getErrorMSG("<br />");
				exit();
		}

		$query = "UPDATE #__comprofiler SET confirmed = 1 WHERE id=" . (int) $user[0]->id;
		$database->setQuery($query);
		$database->query();
		
		

		if($user[0]->confirmed == 1) {
			if ($user[0]->approved == 0) {
				echo _UE_USER_CONFIRMED_NEEDAPPR . "<br />";
			} else {
				echo _UE_USER_CONFIRMED . "<br>";
			}
		} else {
			$_PLUGINS->trigger( 'onAfterUserConfirm', array($user[0],true));
			$cbNotification = new cbNotification();
			if($user[0]->approved == 0) {
				if($ueConfig['moderatorEmail']==1) {
					$cbNotification->sendToModerators(_UE_REG_ADMIN_PA_SUB,$cbNotification->_replaceVariables(_UE_REG_ADMIN_PA_MSG,$user[0]));
				}
				echo _UE_USER_CONFIRMED_NEEDAPPR . "<br />";

			} else {
				activateUser($user[0], 1, "UserConfirmation");
				echo _UE_USER_CONFIRMED . "<br>";
			}
			//$tabs = new cbTabs( 0, 1);
			//$tabs->confirmRegistrationPluginTabs($user[0]);
		}


	} else {
//		mosRedirect(sefRelToAbs('index.php?option=com_comprofiler'.getCBprofileItemid()));
//		mosNotAuth(); :
		echo _NOT_AUTH." :<br /><br />"._BUTTON_LOGOUT." !<br />";
		return;
	}

}


function approveImage() {
	global $database, $_POST, $_REQUEST, $_SERVER, $mainframe, $my, $ueConfig;

	$andItemid = getCBprofileItemid();

	// simple spoof check security for posts (menus do gets):
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		cbSpoofCheck();
	}
	$isModerator=isModerator($my->id);
	if (!$isModerator) {
		mosNotAuth();
		return;
	}
	$avatars=array();
	if(isset($_POST['avatar'])) $avatars=$_POST['avatar'];
	else $avatars[] = $_REQUEST['avatars'];
	if(isset($_POST['act'])) $act=$_POST['act'];
	else $act = $_REQUEST['flag'];
	$cbNotification = new cbNotification();
	if($act=='1') {
		foreach ($avatars AS $avatar) {
			$query = "UPDATE #__comprofiler SET avatarapproved = 1, lastupdatedate='".date('Y-m-d\TH:i:s')."' WHERE id = " . (int) $avatar;
			$database->setQuery($query);
			$database->query();
			$cbNotification->sendFromSystem($avatar,_UE_IMAGEAPPROVED_SUB,_UE_IMAGEAPPROVED_MSG);
			//createEmail($row,'imageApproved',$ueConfig);
		}
	} else {
		foreach ($avatars AS $avatar) {
			$query = "SELECT avatar FROM #__comprofiler WHERE id = " . (int) $avatar;
			$database->setQuery($query);
			$file = $database->loadResult();
		   	if(eregi("gallery/",$file)==false && is_file($mainframe->getCfg('absolute_path')."/images/comprofiler/".$file)) {
				unlink($mainframe->getCfg('absolute_path')."/images/comprofiler/".$file);
				if(is_file($mainframe->getCfg('absolute_path')."/images/comprofiler/tn".$file)) unlink($mainframe->getCfg('absolute_path')."/images/comprofiler/tn".$file);
			}
			$query = "UPDATE #__comprofiler SET avatarapproved = 1, avatar=null WHERE id = " . (int) $avatar;
			$database->setQuery($query);
			$database->query();
			$cbNotification->sendFromSystem($avatar,_UE_IMAGEREJECTED_SUB,_UE_IMAGEREJECTED_MSG);
			//createEmail($row,'imageRejected',$ueConfig);
		}

	}
	mosRedirect(sefRelToAbs( 'index.php?option=com_comprofiler&task=moderateImages' . $andItemid ), _UE_USERIMAGEMODERATED_SUCCESSFUL);
}

function isModerator($oID){
  	global $ueConfig;
	if($oID && in_array(userGID($oID), getParentGIDS($ueConfig['imageApproverGid']))) return true;
	else return false;
}

function userGID($oID){
  	global $database,$ueConfig;
	if($oID > 0) {
	$query = "SELECT gid FROM #__users WHERE id = ".(int) $oID;
	$database->setQuery($query);
	$gid = $database->loadResult();
	return $gid;
	}
	else return 0;
}

function reportUser($option,$form=1,$uid=0) {
	global $database,$ueConfig,$_POST,$my;
	
	if($ueConfig['allowUserReports']==0) {
			echo _UE_FUNCTIONALITY_DISABLED;
			exit();
	}
	if (!allowAccess( $ueConfig['allow_profileviewbyGID'],'RECURSE', userGID($my->id))) {
		echo _UE_NOT_AUTHORIZED;
		return;
	}
	if($form==1) {
		HTML_comprofiler::reportUserForm($option,$uid);
	} else {
		// simple spoof check security
		cbSpoofCheck();
		
		$row = new moscomprofilerUserReport( $database );
		
		if (!$row->bind( $_POST )) {
			echo "<script type=\"text/javascript\"> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
	
		mosMakeHtmlSafe($row);
	
		$row->reportedondate = date("Y-m-d\TH:i:s");
	
		if (!$row->check()) {
			echo "<script type=\"text/javascript\"> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
	
		if (!$row->store()) {
			echo "<script type=\"text/javascript\"> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
			exit();
		}
		if($ueConfig['moderatorEmail']==1) {
			$cbNotification = new cbNotification();
			$cbNotification->sendToModerators(_UE_USERREPORT_SUB,_UE_USERREPORT_MSG);
		}
		echo _UE_USERREPORT_SUCCESSFUL;
	}
}

function banUser( $option, $uid, $form=1, $act=1 ) {
	global $database, $ueConfig, $_POST, $my;
	
	$isModerator=isModerator($my->id);
	if( $ueConfig['allowUserBanning'] == 0 ) {
			echo _UE_FUNCTIONALITY_DISABLED;
			exit();
	}
	if( $form == 1 ) {
		$database->setQuery( "SELECT bannedreason FROM #__comprofiler WHERE id = " . (int) $uid );
		$orgbannedreason=$database->loadresult();
		HTML_comprofiler::banUserForm($option,$uid,$act,$orgbannedreason);
	} else {
		$cbNotification=new cbNotification();
		if($act==1) {
			if ((!$isModerator) || ($my->id != $_POST['bannedby'])) {
				mosNotAuth();
				return;
			}
			// simple spoof check security
			cbSpoofCheck();

			$sql="UPDATE #__comprofiler SET banned=1, bannedby=" . (int) $_POST['bannedby'] . ", banneddate='".date('Y-m-d\TH:i:s')."', bannedreason='<b>".cbGetEscaped(htmlspecialchars("["._UE_MODERATORBANRESPONSE."]"))."</b>\n".cbGetEscaped(htmlspecialchars($_POST['bannedreason']))."' WHERE id=". (int) $uid;
			$database->SetQuery($sql);
			$database->query();

			$cbNotification->sendFromSystem($uid,_UE_BANUSER_SUB,_UE_BANUSER_MSG);
			//createEmail($row,'banUser',$ueConfig);
			echo _UE_USERBAN_SUCCESSFUL;
		} elseif($act==0) {
			if (!$isModerator){
				mosNotAuth();
				return;
			}
			$sql="UPDATE #__comprofiler SET banned=0, bannedby=null, banneddate=null, bannedreason=null WHERE id=".(int) $uid;
			$database->SetQuery($sql);
			$database->query();

			//createEmail($row,'unbanUser',$ueConfig);
			
			$cbNotification->sendFromSystem($uid,_UE_UNBANUSER_SUB,_UE_UNBANUSER_MSG);

			echo _UE_USERUNBAN_SUCCESSFUL;
		}elseif($act==2) {
			if ($my->id!=$uid){
				mosNotAuth();
				return;
			}
			$bannedreason = "<b>".htmlspecialchars("["._UE_USERBANRESPONSE."]")."</b>\n".$_POST['bannedreason']."\n".$_POST['orgbannedreason'];
			$sql="UPDATE #__comprofiler SET banned=2, bannedreason='".cbGetEscaped($bannedreason)."' WHERE id=" . (int) $uid;
			$database->SetQuery($sql);
			$database->query();
		if($ueConfig['moderatorEmail']==1) {
			$cbNotification->sendToModerators(_UE_UNBANUSERREQUEST_SUB,_UE_UNBANUSERREQUEST_MSG);
			//createEmail($row,'unbanAdmin',$ueConfig,$rowAdmin);
		}
			echo _UE_USERUNBANREQUEST_SUCCESSFUL;

		}
	}
}

function processReports(){
	global $database, $_POST, $my;

	$andItemid = getCBprofileItemid();

	// simple spoof check security
	cbSpoofCheck();

	$isModerator=isModerator($my->id);
	if (!$isModerator) {
		mosNotAuth();
		return;
	}
	$reports=array();
	$reports=$_POST['reports'];
		foreach ($reports AS $report) {
			$query = "UPDATE #__comprofiler_userreports SET reportedstatus = 1 WHERE reportid = " . (int) $report;
			$database->setQuery($query);
			$database->query();
		}
	mosRedirect(sefRelToAbs( 'index.php?option=com_comprofiler&task=moderateReports' . $andItemid ), _UE_USERREPORTMODERATED_SUCCESSFUL);
}

function moderator(){
  global $database, $_POST, $my;
	$isModerator=isModerator($my->id);
	if (!$isModerator) {
		mosNotAuth();
		return;
	}
	$query = "SELECT count(*) FROM #__comprofiler  WHERE avatarapproved=0 AND approved=1 AND confirmed=1 AND banned=0";
	if(!$database->setQuery($query)) print $database->getErrorMsg();
	$totalimages = $database->loadResult();

	$query = "SELECT count(*) FROM #__comprofiler_userreports  WHERE reportedstatus=0 ";
	if(!$database->setQuery($query)) print $database->getErrorMsg();
	$totaluserreports = $database->loadResult();

	$query = "SELECT count(*) FROM #__comprofiler WHERE banned=2 AND approved=1 AND confirmed=1";
	if(!$database->setQuery($query)) print $database->getErrorMsg();
	$totalunban = $database->loadResult();

	if($totalunban > 0 || $totaluserreports > 0 || $totalimages > 0) {
		if($totalunban > 0) echo "<div>".$totalunban._UE_UNBANREQUIREACTION."</div>";
		if($totaluserreports > 0) echo "<div>".$totaluserreports._UE_USERREPORTSREQUIREACTION."</div>";
		if($totalimages > 0) echo "<div>".$totalimages._UE_IMAGESREQUIREACTION."</div>";


	} else {
		echo _UE_NOACTIONREQUIRED;

	}

}


function approveUser($uids) {
	global $database, $ueConfig, $_POST, $my, $mosConfig_emailpass, $_PLUGINS;

	$andItemid = getCBprofileItemid();

	// simple spoof check security
	cbSpoofCheck();

	if($ueConfig['allowModUserApproval']==0) {
			echo _UE_FUNCTIONALITY_DISABLED;
			exit();
	}

	$isModerator=isModerator($my->id);
	if (!$isModerator){
		mosNotAuth();
		return;
	}

	//$tabs = new cbTabs( 0, 1);

	foreach($uids AS $uid) {
		$query = "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id = " . (int) $uid;
		$database->setQuery($query);
		$user = $database->loadObjectList();
		$row = $user[0];
		if ( $mosConfig_emailpass == "1" ) {
			$pwd = makePass();
			$row->password = $pwd;
			$pwd = ", password='".md5( $pwd )."' ";
		} else {
			$pwd = "";
		}
		$_PLUGINS->loadPluginGroup('user');
		$_PLUGINS->trigger( 'onBeforeUserApproval', array($row,true));
		if($_PLUGINS->is_errors()) {
			echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
			exit();
		}
		$sql="UPDATE #__comprofiler SET approved='1'".$pwd." WHERE id=" . (int) $uid;
		$database->SetQuery($sql);
		$database->query();
		$_PLUGINS->trigger( 'onAfterUserApproval', array($row,true,true));
		activateUser($row, 1, "UserApproval", false);
	}
	mosRedirect(sefRelToAbs( 'index.php?option=com_comprofiler&task=pendingApprovalUser' . $andItemid ),(count($uids))?count($uids)." "._UE_USERAPPROVAL_SUCCESSFUL:"");

}

function rejectUser($uids) {
	global $database, $ueConfig, $_POST, $my, $mosConfig_emailpass, $_PLUGINS, $mosConfig_sitename;

	$andItemid = getCBprofileItemid();

	// simple spoof check security
	cbSpoofCheck();

	if($ueConfig['allowModUserApproval']==0) {
			echo _UE_FUNCTIONALITY_DISABLED;
			exit();
	}
	
	$isModerator=isModerator($my->id);
	if (!$isModerator){
		mosNotAuth();
		return;
	}
	
	$cbNotification= new cbNotification();
	foreach($uids AS $uid) {
		$query = "SELECT * FROM #__comprofiler c, #__users u WHERE c.id=u.id AND c.id = " . (int) $uid;
		$database->setQuery($query);
		$user = $database->loadObjectList();
		$row = $user[0];
		$_PLUGINS->loadPluginGroup('user');
		$_PLUGINS->trigger( 'onBeforeUserApproval', array($row,false));
		if($_PLUGINS->is_errors()) {
			echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
			exit();
		}
		$sql="UPDATE #__comprofiler SET approved=2 WHERE id=" . (int) $uid;
		$database->SetQuery($sql);
		$database->query();
		$_PLUGINS->trigger( 'onAfterUserApproval', array($row,false,true));
		$cbNotification->sendFromSystem(cbGetEscaped($uid),_UE_REG_REJECT_SUB,sprintf(_UE_USERREJECT_MSG,$mosConfig_sitename,cbGetUnEscaped($_POST['comment'.$uid])));
		//createEmail($row,'rejectUser',$ueConfig,$_POST['comment'.$uid],$mosConfig_emailpass);
	}
	mosRedirect(sefRelToAbs( 'index.php?option=com_comprofiler&task=pendingApprovalUser' . $andItemid ),(count($uids))?count($uids)." "._UE_USERREJECT_SUCCESSFUL:"");

}

function pendingApprovalUsers($option) {
	global $database,$ueConfig,$_POST,$my,$mosConfig_emailpass;
	$isModerator=isModerator($my->id);
	if($ueConfig['allowModUserApproval']==0) {
			echo _UE_FUNCTIONALITY_DISABLED;
			exit();
	}
	if (!$isModerator){
		mosNotAuth();
		return;
	}

	$database->setQuery( "SELECT u.id, u.name, u.username, u.email, u.registerDate "
	."\n FROM #__users u, #__comprofiler c "
	."\n WHERE u.id=c.id AND c.approved=0 AND c.confirmed=1" );
	$rows = $database->loadObjectList();
	
	HTML_comprofiler::pendingApprovalUsers($option, $rows);	
}

//Connections

function addConnection($userid,$connectionid,$umsg=null) {
	global $database, $ueConfig, $my;

	$andItemid = getCBprofileItemid(true);
		
	if(!$ueConfig['allowConnections']) {
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if (!$my->id > 0) {
		mosNotAuth();
		return;
	}
	$cbCon=new cbConnection($userid);
	$cbCon->addConnection($connectionid,stripcslashes($umsg));
	$url=sefRelToAbs( "index.php?option=com_comprofiler&amp;task=userProfile&amp;user=" . $connectionid . $andItemid );
	echo "<script type=\"text/javascript\"> alert('".addslashes(htmlspecialchars($cbCon->getUserMSG()))."'); document.location.href='".unHtmlspecialchars($url)."'; </script>\n";
}

function removeConnection($userid,$connectionid) {
	global $database, $ueConfig, $my;

	$andItemid = getCBprofileItemid(true);

	if(!$ueConfig['allowConnections']) {
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if (!$my->id > 0) {
		mosNotAuth();
		return;
	}
	$cbCon=new cbConnection($userid);
	if(!$cbCon->removeConnection($userid,$connectionid)) $msg=$cbCon->getErrorMSG(); 
	else $msg = $cbCon->getUserMSG();

	// $url=sefRelToAbs("index.php?option=com_comprofiler&task=manageConnections");
	$url=sefRelToAbs( "index.php?option=com_comprofiler&amp;tab=getConnectionTab" . $andItemid );
	echo "<script type=\"text/javascript\"> alert('".$msg."'); document.location.href='".unHtmlspecialchars($url)."'; </script>\n";

}

function denyConnection($userid,$connectionid) {
	global $database,$ueConfig,$my;

	if(!$ueConfig['allowConnections']) {
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if (!$my->id > 0) {
		mosNotAuth();
		return;
	}

	$cbCon=new cbConnection($userid);
	$cbCon->denyConnection($userid,$connectionid);

	echo "<script type=\"text/javascript\"> alert('".$cbCon->getUserMSG()."'); window.history.go(-1); </script>\n";

}

function acceptConnection($userid,$connectionid) {
	global $database,$ueConfig,$my;
	
	if(!$ueConfig['allowConnections']) {			// do not test, needed if rules changed! || !$ueConfig['useMutualConnections']
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if (!$my->id > 0) {
		mosNotAuth();
		return;
	}
	
	$cbCon=new cbConnection($userid);
	$cbCon->acceptConnection($userid,$connectionid);
	
	echo "<script type=\"text/javascript\"> alert('".$cbCon->getUserMSG()."'); window.history.go(-1); </script>\n";
}


function manageConnections($userid) {
	global $database,$ueConfig,$my;

	if(!$ueConfig['allowConnections']) {
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if ($my->id!=$userid || $my->id==0) {
		mosNotAuth();
		return;
	}
	
	$cbCon=new cbConnection($userid);
	
	$connections=$cbCon->getActiveConnections($userid);

	$actions = $cbCon->getPendingConnections($userid);

	$connecteds = $cbCon->getConnectedToMe($userid);

	HTML_comprofiler::manageConnections($connections,$actions,$connecteds);	
}

function saveConnections($connectionids) {
	global $database, $ueConfig, $my, $_POST;
	
	$andItemid = getCBprofileItemid();
	
	// simple spoof check security
	cbSpoofCheck();

	if(!$ueConfig['allowConnections']) {
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if (!$my->id > 0) {
		mosNotAuth();
		return;
	}
	$cbCon=new cbConnection($my->id);
	if (is_array($connectionids)) {
		foreach($connectionids AS $cid) {
			$cbCon->saveConnection($cid,$_POST[$cid.'description'],isset($_POST[$cid.'connectiontype']) && is_array($_POST[$cid.'connectiontype']) ? implode("|*|",$_POST[$cid.'connectiontype']) : "");		
		}
	}
	mosRedirect(sefRelToAbs( 'index.php?option=com_comprofiler&task=manageConnections&tab=1' . $andItemid ),
							(is_array($connectionids)) ? _UE_CONNECTIONSUPDATEDSUCCESSFULL : null);

}

function processConnectionActions($connectionids) {
	global $database, $ueConfig, $my, $_POST;

	$andItemid = getCBprofileItemid();

	// simple spoof check security
	cbSpoofCheck();

	if(!$ueConfig['allowConnections']) {
		echo _UE_FUNCTIONALITY_DISABLED;
		return;
	}
	if (!$my->id > 0) {
		mosNotAuth();
		return;
	}
	$cbCon=new cbConnection($my->id);
	
	if (is_array($connectionids)) {
		foreach($connectionids AS $cid) {
			if ($_POST[$cid."action"]=='d') {
				$cbCon->denyConnection($my->id,$cid);
			} elseif ($_POST[$cid."action"]=='a') {
				$cbCon->acceptConnection($my->id,$cid);
			}
		}
	}
	mosRedirect(sefRelToAbs( 'index.php?option=com_comprofiler&task=manageConnections' . $andItemid ),
							(is_array($connectionids)) ? _UE_CONNECTIONACTIONSSUCCESSFULL : null);
	return;
}

function getConnectionTypes($types) {
	$typelist=null;
	$types=explode("|*|",$types);
	foreach($types AS $type) {
		if($typelist==null) $typelist = getLangDefinition($type);
		else $typelist .= ", ".getLangDefinition($type);	
	}
	return $typelist;
}

?>
