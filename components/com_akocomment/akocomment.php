<?php
/**
* AkoComment - A User Comments Component
* @version 2.0 (v1.13) security fix BEAT
* @package AkoComment
* Tweaked version Modified by Artistworks.net
* Removed alert message by Artistworks.net
* Hacks by - Benjamin Samson - www.bpixel.com
* Spamfix by Dominik Paulus  - www.dpaulus.de
* Wrong Security code by Mike H - //forum.joomla.org/index.php/topic,28644.120.html
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

# Don't allow direct linking
  defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

# Get the right language if it exists
  if (file_exists($mosConfig_absolute_path.'/components/com_akocomment/languages/'.$mosConfig_lang.'.php')) {
    include($mosConfig_absolute_path.'/components/com_akocomment/languages/'.$mosConfig_lang.'.php');
  } else {
    include($mosConfig_absolute_path.'/components/com_akocomment/languages/english.php');
  }

$limitmore = intval( mosGetParam( $_GET, "limit", 30 ));
$fid = intval( mosGetParam( $_GET, "favid", 0 ));
$id = intval( mosGetParam( $_GET, "id", 0 ));
$cid = intval( mosGetParam( $_GET, "cid", 0 ));

switch ($task) {

	case "quote":
		showQuote( $option ) ;
		break;

	case 'feed':
		loadFeed( $option ) ;
		break;

	case 'favoured':
		saveFavoured( $option ) ;
		break;

	case 'removefav':
		removeFavoured( $option, $fid ) ;
		break;

	case 'myfavoured':
		myFavoured ( $option, $limitmore ) ;
		break;

	case 'morefav':
		// Call by module "ac_mostfavoured" or by menu link url : ex. index.php?option=akocomment&task=morefav
		moreFavoured ( $option, $limitmore ) ;
		break;

	case 'report':
		report( $option, $id, $cid ) ;
		break;

	default:
		comment( $option );
		break;

}

function comment($option){
global $database, $mosConfig_live_site, $mosConfig_absolute_path, $mosConfig_fromname, $my, $mainframe;

  //BBTEMPFIX:
  $acitemid = intval( mosGetParam( $_POST, 'acitemid', 999999 ) );
  $contentid = intval( mosGetParam( $_POST, 'contentid', 0 ) );
  $title = mosGetParam( $_POST, 'title' );
  $comment = mosGetParam( $_POST, 'comment', '' );
  $acname = mosGetParam( $_POST, 'acname' );
  $email = mosGetParam( $_POST, 'email', '' );
  $web = trim( mosGetParam( $_POST, 'web', '' ) );
  $func = trim( mosGetParam( $_POST, 'func', '' ) );

  $subscribe = intval( mosGetParam( $_POST, 'subscribe', 0 ) );

  //$acname 	= $database->getEscaped( trim( $acname ) );
  //$title 	= $database->getEscaped( trim( $title ) );
  $web 	    = $database->getEscaped( trim( strtolower( $web ) ) );
  $email 	= $database->getEscaped( trim( strtolower( $email ) ) );
  $iduser   = (int) mosGetParam( $_POST, "iduser", '0' );

  # Added following one extra line to make the security images solution by DPaulus to work - Reind Dooyeweerd
  $akocode = mosGetParam( $_POST, "akocode" );
  //end of BBTEMPFIX

# Variables - Don't change anything here!!!
  require_once($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");

# Check if email adress is right
  function is_email($email){
    $rBool=false;
    if(preg_match("/[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}/", $email)) {
      $rBool=true;
    }
    return $rBool;
  }

# Check for Editor rights
  $is_editor = (strtolower($my->usertype) == 'editor' || strtolower($my->usertype) == 'publisher' || strtolower($my->usertype) == 'manager' || strtolower($my->usertype) == 'administrator' || strtolower($my->usertype) == 'super administrator' );
  $is_user   = (strtolower($my->usertype) <> '');

# Spamfix session
	session_start('akocomcode');
	$_SESSION['akocomment'] = $comment;

# Spamfix: check for cookie and right code
	if( (isset($_SESSION['code']) && ($_SESSION['code'] != "") && ($_SESSION['code'] == $akocode)) || $ac_disable_securitycode=='1' ) {

	 # Check if timeout
		$ac_timeout = ($ac_timeout=='') ? 0 : intval($ac_timeout);
		if ( $ac_timeout > 0 ){
			$date = date( "Y-m-d H:i:s" );
			$ts = strtotime( $date );
			$ip = getenv('REMOTE_ADDR');
			$query = ("SELECT ip, date FROM #__akocomment WHERE ip='$ip' ORDER BY date DESC LIMIT 1");
			$database->setQuery( $query );
			$rows = $database->loadObjectList();
			if ( $rows ) {
				$row = $rows[0];
				$lasttime = strtotime($row->date) + $ac_timeout;
				if ( $lasttime > $ts ){
					$rest = $lasttime - $ts;
					echo "<script> alert('Wait... ".$rest." seconds'); history.back();</script>";
					exit();
				}
			}
		}

	# Check if Registered Users only
	  if ( $ac_anonentry=='0' && $is_user=='' ) {
		echo "<script>alert('"._AKOCOMMENT_ONLYREGISTERED."'); document.location.href='".sefRelToAbs("index.php?option=content&task=view&id=$contentid")."';</script>";
	  } else {

		if (!ereg('http://', $web) && $web!=''){
			$web = 'http://'.$web;
		}

		# Send out admin mail
		if ($ac_notify && is_email($ac_notify_email) ) {

		  $query1 = ("SELECT title FROM #__content WHERE id='$contentid'");
		  $database->setQuery( $query1 );
		  $rowTitle = $database->loadResult();

		  $articlelink = sefRelToAbs($mosConfig_live_site.'/index.php?option=com_content&task=view&id='.$contentid.'&Itemid='.$acitemid);
		  $acmailtext = _AKOCOMMENT_ADMINMAIL . '<br/><br/>';
		  $acmailtext .= '<b>'._AKOCOMMENT_ENTERNAME.': </b>'.$acname.'<br/>';
		  if ($email != '') 	$acmailtext .= '<b>'._AKOCOMMENT_ENTERMAIL.': </b><a href="mailto:'.$email.'">'.$email.'</a><br/>';
		  if ($web != '') 		$acmailtext .= '<b>Web: </b><a href="'.$web.'">'.$web.'</a><br/>';
		  $acmailtext .= '<b>' . _AKOCOMMENT_ENTERTITLE . ' </b>'.$title.'<br/>';
		  $acmailtext .= '<b>' ._AKOCOMMENT_ENTERTEXT . ' </b>'.$comment.'<br/><br/>';
		  $acmailtext .= '<b>' . $rowTitle . ' </b><br/>';
		  $acmailtext .= '<a href="' . $articlelink.'">' . $articlelink . '</a><br/><br/>';
		  $acmailtext .= _AKOCOMMENT_ADMINMAILFOOTER;

		  $headers  = 'MIME-Version: 1.0' . '\n';
		  //$headers .= 'Content-type: text/html; charset=iso-8859-1' . '\n';
		  $headers .= 'Content-type: text/html; ' . _ISO . '\n';
		  $headers .= 'From: ' . $ac_notify_email;
		  mail($ac_notify_email,_AKOCOMMENT_ADMINMAILHEADER,$acmailtext,$headers);
		}

		# Clear any HTML and SQL injections
		$title   = strip_tags($title);
		$comment = strip_tags($comment);
		$title   = mysql_escape_string($title);
		$comment = mysql_escape_string($comment);

		# Perform database query
		$date      = date( "Y-m-d H:i:s" );
		$ip        = getenv('REMOTE_ADDR');
		$query2 = "INSERT INTO #__akocomment SET contentid='$contentid', ip='$ip', name='$acname', web='$web', email='$email', title='$title', comment='$comment', date='$date', published='$ac_autopublish', iduser='$iduser', subscribe='$subscribe';"; // modify by bpixel (add "web='$web', email='$email'," ) Modified by visualclinic.fr (add ", iduser='$iduser', subscribe='$subscribe'")
		$database->setQuery( $query2 );
		$database->query();

		unset($_SESSION['akocomment']);

		if ( $ac_displaycheckboxcontact ){
			// SUBSCRIBES ALERT NEW COMMENT /////////////////////////////////////////////////
			// Check if item article have comments with alert mail
			$query = "SELECT DISTINCTROW email FROM #__akocomment WHERE contentid = '$contentid ' AND subscribe='1' AND email <> '$email' ORDER BY date DESC";
			$database->setQuery( $query );
			$rows = $database->loadObjectList();
			if ( $rows ){
			  // build mail
			  $acmailtext = "";
			  $acmailtext = _AKOCOMMENT_SUBSCRIBEMAILHEADER . "<br />" ;
			  $articlelink = sefRelToAbs($mosConfig_live_site.'/index.php?option=com_content&task=view&id='.$contentid.'&Itemid='.$acitemid);
			  $acmailtext .= '<a href="'.$articlelink.'">'.$articlelink.'</a><br/><br/>';
			  $acmailtext .= _AKOCOMMENT_SUBSCRIBEMAILFOOTER;

			  $headers  = 'MIME-Version: 1.0' . "\n";
			  //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
			  $headers .= 'Content-type: text/html; ' . _ISO . '\n';
			  $headers .= 'From: ' . $ac_notify_email; //$mosConfig_fromname;

				foreach ( $rows as $row ) {
					 // send email
					 mail( $row->email, _AKOCOMMENT_SUBSCRIBEMAILHEADER, $acmailtext, $headers );
				}
			}
		}
		# Check if new window or not
		$msg = ( $ac_autopublish ) ? _AKOCOMMENT_SAVED : _AKOCOMMENT_SAVED4UNPUBLISHED ;

		mosCache::cleanCache( "com_content" );
		mosCache::cleanCache( "com_alphacontent" );

		if ( $ac_openingmode ){
			mosRedirect("index2.php?option=com_content&task=view&id=$contentid&pop=1&page=0", $msg );
		} else {
			mosRedirect("index.php?option=com_content&task=view&id=$contentid&Itemid=$acitemid", $msg );
		}
	  }
	# Spamfix: wrong code
	}else {
		echo "<script> alert('"._AKOCOMMENT_CODEWRONG."'); history.back();</script>";
	}
}


// Add by visualclinic.fr
function showquote( $option ){
	global $database, $mosConfig_live_site, $mosConfig_sitename, $mainframe, $Itemid, $_VERSION;

	$id = trim( mosGetParam( $_REQUEST, 'id', 0 ) );
	$thequote = sefRelToAbs("index.php?option=com_content&task=view&id=$id&Itemid=$Itemid");
	$copyNow = date('Y');

	$query = "SELECT title FROM #__content WHERE id = '$id'";
	$database->setQuery( $query );
	$title = $database->loadResult();

	// look for images in template if available
	$img = "";
	if ( $_VERSION->PRODUCT == 'Joomla!' ){
		$ImageArrow = mosAdminMenus::ImageCheck( 'arrow.png', '/images/M_images/' );
	}else{
		// FOR COMPLIANCE WITH MAMBO
		$ImageArrow = $mainframe->ImageCheck( 'arrow.png', '/images/M_images/' );
	}
	$img .= $ImageArrow;

	$ac_style4quote = "<style type=\"text/css\">"
	."\n<!--"
	."\n.quote {width:350px; padding: 6px; border: solid 1px #456B8F; font: 10px helvetica, verdana, sans-serif; color: #222222; background-color: #ffffff}"
	."\n.quote a {font: 13px arial, serif; color: #003399; text-decoration: underline}"
	."\n.quote a:hover {color: #FF9900; }"
	."\n-->"
	."\n</style>";

	echo _AKOCOMMENT_QUOTETHISARTICLE;
	echo "<br /><br />";
	echo "<div class='contentheading'>".$title."</div>";
	echo "<br />";
	echo "<strong>"._AKOCOMMENT_CREATELINK."</strong>";
	echo "<br /><br />";
	?>
    <textarea name="textarea" cols="60" rows="6"><?php echo $ac_style4quote; ?><div class="quote"><a href="<?php echo $thequote; ?>" target="_blank"><?php echo $title; ?></a><br /><?php echo $mosConfig_sitename; ?> - <?php echo mosCurrentDate(); ?><br /><div align="right">&copy; <a href="<?php echo $mosConfig_live_site; ?>" target="_blank"><?php echo $mosConfig_sitename; ?></a></div></div>
	</textarea>
	  <?php
	echo "<br /><br />";
	echo _AKOCOMMENT_PREVIEWQUOTE;
	echo "<br /><br />";
	$thedate = mosCurrentDate();
	echo $ac_style4quote;
	echo "\n<div class=\"quote\"><a href=\"$thequote\" target=\"_blank\">$title</a>"
	."\n<br />$mosConfig_sitename - $thedate<br />"
	."\n<div align=\"right\">$copyNow &copy; <a href=\"$mosConfig_live_site\" target=\"_blank\">$mosConfig_sitename</a></div></div>";
	echo "<br />";
	echo $img;
	echo " <a href=\"javascript:onclick=history.back();\" >" . _AKOCOMMENT_GOBACKITEM . "</a>";
}

// Add by visualclinic.fr
function saveFavoured( $option ){
	global $database, $mosConfig_live_site, $mosConfig_sitename, $mosConfig_absolute_path, $mainframe, $my, $limitmore, $Itemid, $_VERSION;

    require_once($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");

	$is_user   = (strtolower($my->usertype) <> '');

	$id          = intval( mosGetParam( $_REQUEST, 'id', 0 ) );
	$goItem      = sefRelToAbs("index.php?option=com_content&task=view&id=");
	$ip          = getenv('REMOTE_ADDR');

	// Check already favoured
	$query = "SELECT * FROM #__akocomment_favoured WHERE id_content = '$id' AND ip='$ip'";
	$database->setQuery( $query );
	$alreadyfav = $database->loadResult();

	if ( $alreadyfav ) {
		$msg = _AKOCOMMENT_YOUHAVEFAVOUREDTHISARTICLE;
	} elseif ( $ac_favoured_user=='1' && $is_user=='' ) {
		$msg = _AKOCOMMENT_FAVOUREDONLYREGISTERED;
	} else {
		$id_user   = $my->id;
		$date      = date( "Y-m-d H:i:s" );
		$query     = "INSERT INTO #__akocomment_favoured SET id_content='$id', id_user='$id_user', ip='$ip', date='$date'";
		$database->setQuery( $query );
		$database->query();
		$msg = _AKOCOMMENT_THANKFAVOURED;
	}

	// look for images in template if available
	$img = "";
	if ( $_VERSION->PRODUCT == 'Joomla!' ){
		$ImageArrow = mosAdminMenus::ImageCheck( 'arrow.png', '/images/M_images/' );
	}else{
		// FOR COMPLIANCE WITH MAMBO
		$ImageArrow = $mainframe->ImageCheck( 'arrow.png', '/images/M_images/' );
	}
	$img .= $ImageArrow;

	// DISPLAY FAVOURED
	echo "<div class='contentheading'>".$msg ."</div>";
	echo "<br />";
	echo _AKOCOMMENT_WHATYOUWANT;
	echo "<br /><br />";
	echo $img;
	echo " <a href=\"javascript:onclick=history.back();\" >" . _AKOCOMMENT_GOBACKITEM . "</a>";
	echo "<br />";
	echo $img;
	echo " <a href=\"index.php\" >" . _AKOCOMMENT_GOHOME . "</a>";
	echo "<br /><br />";
	echo _AKOCOMMENT_YOURFAVOURED;
	echo "<br />";

	$query = "SELECT COUNT(af.id) AS favourite, af.id_content, c.title AS title, c.sectionid AS sectionid FROM #__akocomment_favoured AS af, #__content AS c WHERE c.id = af.id_content AND (c.state = '1' OR c.state = '-1') GROUP BY af.id_content ORDER BY favourite DESC LIMIT $ac_numfavoured";
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	if ( count($rows) ){
		foreach ( $rows as $row ) {
			# Get Itemid
			if ( $row->sectionid ) {
				$bs 	= $mainframe->getBlogSectionCount();
				$bc 	= $mainframe->getBlogCategoryCount();
				$gbs 	= $mainframe->getGlobalBlogSectionCount();
				$Itemid = $mainframe->getItemid( $row->id_content, 0, 0, $bs, $bc, $gbs );
			} else {
				$query = "SELECT id"
				. "\n FROM #__menu"
				. "\n WHERE type = 'content_typed'"
				. "\n AND componentid = $row->id_content"
				;
				$database->setQuery( $query );
				$Itemid = $database->loadResult();
			}
			// Blank itemid checker for SEF
			if ($Itemid == NULL) {
				$Itemid = '';
			} else {
				$Itemid = '&amp;Itemid='. $Itemid;
			}
			echo "<br />";
			echo $img;
			echo " <a href='".$goItem.$row->id_content.$Itemid."'>".$row->title."</a>";
		}
	}

	if ( $my->id ) {
		# Get Itemid for my favourites
		$database->setQuery("SELECT id FROM #__menu"
			.	"\nWHERE link='index.php?option=com_akocomment&task=myfavoured'"
			.	"\nAND type='url'"
			.	"\nAND published='1'"
			.	"\nLIMIT 1");
		$Itemid = $database->loadResult();
		// Blank itemid checker for SEF
		if ($Itemid == NULL) {
			$Itemid = '';
		} else {
			$Itemid = '&amp;Itemid='. $Itemid;
		}
		echo "<br /><br />";
		echo _AKOCOMMENT_YOURFAVOUREDUSER . " ( <a href='index.php?option=com_akocomment&task=myfavoured$Itemid'>" . $my->name . "</a> )";
	}

}

// Add by visualclinic.fr
// Call by module  "ac_mostfavoured" or by menu url : ex. index.php?option=akocomment&task=morefav
function moreFavoured( $option, $limitmore ){
	global $database, $mosConfig_live_site, $mosConfig_sitename, $mosConfig_absolute_path, $mainframe, $my, $Itemid, $_VERSION;

    require_once($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");

	//$goItem = sefRelToAbs("index.php?option=com_content&task=view&id=");
	$goItem = "index.php?option=com_content&task=view&id=";

	// look for images in template if available
	$img = "";
	if ( $_VERSION->PRODUCT == 'Joomla!' ){
		$ImageArrow = mosAdminMenus::ImageCheck( 'arrow.png', '/images/M_images/' );
	}else{
		// FOR COMPLIANCE WITH MAMBO
		$ImageArrow = $mainframe->ImageCheck( 'arrow.png', '/images/M_images/' );
	}
	$img .= $ImageArrow;

	// DISPLAY MORE FAVOURED
	echo "<div class='contentheading'>" . _AKOCOMMENT_YOURFAVOURED . "</div>";
	echo "<br />";

	$query = "SELECT COUNT(af.id) AS favourite, af.id_content, c.title AS title, c.sectionid AS sectionid FROM #__akocomment_favoured AS af, #__content AS c WHERE c.id = af.id_content AND (c.state = '1' OR c.state = '-1') GROUP BY af.id_content ORDER BY favourite DESC LIMIT $limitmore";
	$database->setQuery( $query );
	$rows = $database->loadObjectList();
	if ( count($rows) ){
		foreach ( $rows as $row ) {
			# Get Itemid
			if ( $row->sectionid ) {
				$bs 	= $mainframe->getBlogSectionCount();
				$bc 	= $mainframe->getBlogCategoryCount();
				$gbs 	= $mainframe->getGlobalBlogSectionCount();
				$Itemid = $mainframe->getItemid( $row->id_content, 0, 0, $bs, $bc, $gbs );
			} else {
				$query = "SELECT id"
				. "\n FROM #__menu"
				. "\n WHERE type = 'content_typed'"
				. "\n AND componentid = $row->id_content"
				;
				$database->setQuery( $query );
				$Itemid = $database->loadResult();
			}
			// Blank itemid checker for SEF
			if ($Itemid == NULL) {
				$Itemid = '';
			} else {
				$Itemid = '&amp;Itemid='. $Itemid;
			}
			echo $img;
			echo " <a href='".sefRelToAbs($goItem.$row->id_content.$Itemid)."'>".$row->title."</a><br />";
		}
	}

	if ( $my->id ) {
		# Get Itemid for my favourites
		$database->setQuery("SELECT id FROM #__menu"
			.	"\nWHERE link='index.php?option=com_akocomment&task=myfavoured'"
			.	"\nAND type='url'"
			.	"\nAND published='1'"
			.	"\nLIMIT 1");
		$Itemid = $database->loadResult();
		// Blank itemid checker for SEF
		if ($Itemid == NULL) {
			$Itemid = '';
		} else {
			$Itemid = '&amp;Itemid='. $Itemid;
		}
		echo "<br /><br />";
		echo _AKOCOMMENT_YOURFAVOUREDUSER . " ( <a href='index.php?option=com_akocomment&task=myfavoured$Itemid'>" . $my->name . "</a> )";
	}

}

// Add by visualclinic.fr
function myFavoured( $option, $limitmore ){
	global $database, $mosConfig_live_site, $mosConfig_sitename, $mosConfig_absolute_path, $mainframe, $my, $Itemid, $_VERSION;

    require_once($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");
	$Itemid4myfavoured = $Itemid;

	// Call menu url : ex. index.php?option=akocomment&task=myfavoured

	// DISPLAY MY FAVOURED
	echo "<div class='contentheading'>" . _AKOCOMMENT_YOURFAVOUREDUSER . "</div>";
	echo "<br />";

	if ( $my->id ) {
		//$goItem = sefRelToAbs("index.php?option=com_content&task=view&id=");
		$goItem = "index.php?option=com_content&task=view&id=";

		// look for images in template if available
		$img = "";
		if ( $_VERSION->PRODUCT == 'Joomla!' ){
			$ImageArrow = mosAdminMenus::ImageCheck( 'arrow.png', '/images/M_images/' );
		}else{
			// FOR COMPLIANCE WITH MAMBO
			$ImageArrow = $mainframe->ImageCheck( 'arrow.png', '/images/M_images/' );
		}
		$img .= $ImageArrow;

		$query = "SELECT af.id AS favid, af.id_content, c.title AS title, c.sectionid AS sectionid FROM #__akocomment_favoured AS af, #__content AS c WHERE c.id = af.id_content AND af.id_user = '$my->id' AND (c.state = '1' OR c.state = '-1') ORDER BY date DESC";
		$database->setQuery( $query );
		$rows = $database->loadObjectList();
		if ( count($rows) ) {
			foreach ( $rows as $row )
			{
				# Get Itemid
				if ( $row->sectionid ) {
					$bs 	= $mainframe->getBlogSectionCount();
					$bc 	= $mainframe->getBlogCategoryCount();
					$gbs 	= $mainframe->getGlobalBlogSectionCount();
					$Itemid = $mainframe->getItemid( $row->id_content, 0, 0, $bs, $bc, $gbs );
				} else {
					$query = "SELECT id"
					. "\n FROM #__menu"
					. "\n WHERE type = 'content_typed'"
					. "\n AND componentid = $row->id_content"
					;
					$database->setQuery( $query );
					$Itemid = $database->loadResult();
				}
				// Blank itemid checker for SEF
				if ($Itemid == NULL) {
					$Itemid = '';
				} else {
					$Itemid = '&amp;Itemid='. $Itemid;
				}

				echo $img;
				echo " <a href='".sefRelToAbs($goItem.$row->id_content.$Itemid)."'>".$row->title."</a> (<a href='index.php?option=com_akocomment&task=removefav&favid=".$row->favid."&Itemid=$Itemid4myfavoured'>"._AKOCOMMENT_FAVOUREDREMOVE."</a>)<br />";
			}
		}else{
			echo _AKOCOMMENT_NOFAVOURED;
		}
	} else {
		// if menu url... and not login
		echo _AKOCOMMENT_FAVOUREDUSERMUSTLOGIN;
	}
}

// Add by visualclinic.fr
function removeFavoured( $option, $fid ){
	global $database, $Itemid;

	$query = "DELETE FROM #__akocomment_favoured"
	. "\n WHERE id = '$fid'"
	;
	$database->setQuery( $query );
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}

	mosRedirect( "index.php?option=$option&task=myfavoured&Itemid=$Itemid" );

}

// Add by visualclinic.fr
function loadFeed( $option ){
	global $database, $mosConfig_live_site, $mosConfig_absolute_path, $mosConfig_sitename, $mosConfig_cachepath, $mosConfig_MetaDesc, $mainframe;

	// Load feed creator class
	require_once( $mosConfig_absolute_path .'/includes/feedcreator.class.php' );
	// Load variables
	require_once($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");

	$iso = split( '=', _ISO );

	$rssfile = $mosConfig_cachepath .'/comments.xml';

    $rss = new UniversalFeedCreator();
    $rss->title = $mosConfig_sitename . " - " . _AKOCOMMENT_RSS_LASTCOMMENTS;
    $rss->description = $mosConfig_MetaDesc;
    $rss->link = htmlspecialchars( $mosConfig_live_site );
    $rss->syndicationURL = htmlspecialchars( $mosConfig_live_site );
    $rss->cssStyleSheet = NULL;
	$rss->encoding = $iso[1];

	$database->setQuery( "SELECT ak.*, UNIX_TIMESTAMP( ak.date ) AS created_ts, c.id AS id_content, c.title AS titlearticle, c.sectionid AS sectionid"
		. "\nFROM #__akocomment AS ak"
		. "\nLEFT JOIN #__content AS c ON c.id = ak.contentid"
		. "\nWHERE ak.published='1'"
		. "\nORDER BY ak.id DESC"
		. "\nLIMIT $ac_numrssfeed"
	);

	$rows = $database->loadObjectList();

    foreach ( $rows as $row ) {
		if ( $row->sectionid ) {
			$bs 	= $mainframe->getBlogSectionCount();
			$bc 	= $mainframe->getBlogCategoryCount();
			$gbs 	= $mainframe->getGlobalBlogSectionCount();
			$Itemid = $mainframe->getItemid( $row->id_content, 0, 0, $bs, $bc, $gbs );
		} else {
			$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE type = 'content_typed'"
			. "\n AND componentid = $row->id_content"
			;
			$database->setQuery( $query );
			$Itemid = $database->loadResult();
		}
		// Blank itemid checker for SEF
		if ($Itemid == NULL) {
			$Itemid = '';
		} else {
			$Itemid = '&amp;Itemid='. $Itemid;
		}
        $item = new FeedItem();
        $item->title = htmlspecialchars( $row->titlearticle );
		$item->title = html_entity_decode( $item->title );
		$item->title = _AKOCOMMENT_RSS_COMMENTON . " " . $item->title . " (" . _AKOCOMMENT_WRITTENBY . " " . $row->name . ")";
    	$item->link = sefRelToAbs("index.php?option=com_content&task=view&id=$row->contentid$Itemid#akocomment$row->id");
		$item->description = ( $row->title!='' ) ? $row->title : $row->comment ;
		$item->description = mosHTML::cleanText( $item->description );
		$item->description = html_entity_decode( $item->description );
		// limits description text to 10 words
		$item_description_array = split( ' ', $item->description );
		$count = count( $item_description_array );
		if ( $count > 10 ){
			$item->description = '';
			for ( $a = 0; $a < $info[ 'text_length' ]; $a++ ) {
				$item->description .= $item_description_array[$a]. ' ';
			}
			$item->description = trim( $item->description );
			$item->description .= '...';
		}
		$item->description = $row->name . " > " . $item->description . " <a href='". sefRelToAbs("index.php?option=com_content&task=view&id=$row->contentid$Itemid#akocomment$row->id")."'>" . _AKOCOMMENT_RSS_VIEWCOMMENT . "</a>";
        $item->date = date( 'r', $row->created_ts );
    	$item->source = htmlspecialchars( $mosConfig_live_site );

    	$rss->addItem($item);
    }
	// save feed file
	$rss->saveFeed('RSS2.0', $rssfile, 1);
}

// Add by visualclinic.fr
function report( $option, $id, $cid ){
	global $database, $mosConfig_live_site, $mosConfig_absolute_path, $mainframe, $Itemid;

	# Variables - Don't change anything here!!!
	 require_once($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");

	# Check if email adress is right
	  function is_email($email){
		$rBool=false;
		if(preg_match("/[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}/", $email)) {
		  $rBool=true;
		}
		return $rBool;
	  }

	if ( $_POST ){
		$reportname = mosGetParam( $_POST, 'reportname' );
		$reportemail = mosGetParam( $_POST, 'reportemail', '' );
		$reason = mosGetParam( $_POST, 'reason' );
		if ( is_email( $ac_report_email ) ){
			// send email to administrator
			$articlelink = $mosConfig_live_site.'/index.php?option=com_content&task=view&id='.$id.'&Itemid='.$Itemid.'#akocomment'.$cid;
			$acmailtext =_AKOCOMMENT_REPORTADMINEMAIL.'<br/><br/>';
			if ($reportname != '')     $acmailtext .= '<b>'._AKOCOMMENT_ENTERNAME.': </b>'.$reportname.'<br/>';
			if ($reportemail != '') 	$acmailtext .= '<b>'._AKOCOMMENT_ENTERMAIL.': </b><a href="mailto:'.$reportemail.'">'.$reportemail.'</a><br/>';
			$acmailtext .= '<b>'._AKOCOMMENT_REASON_REPORT.': </b>'.$reason.'<br/><br/>';
			$acmailtext .= '<b>Article: </b><a href="'.$articlelink.'">'.$articlelink.'</a><br/><br/>';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'Content-type: text/html; ' . _ISO . '\n';
			$headers .= 'From: ' . $ac_report_email;

			mail ( $ac_report_email, _AKOCOMMENT_REPORTONCOMMENT, $acmailtext, $headers );
		}
		echo "<div class='contentheading'>"._AKOCOMMENT_REPORTACOMMENT."</div><br />";
		echo _AKOCOMMENT_THANKS4UREPORT ."<br /><br />";
		$gobackitem = sefRelToAbs("index.php?option=com_content&task=view&id=$id&Itemid=$Itemid#akocomment$cid");
		echo "<a href='$gobackitem'>". _AKOCOMMENT_GOBACKITEM . "</a>";
	}else{
	?>
	<script language="JavaScript" type="text/JavaScript">
	function validate(){
		if (document.akocommentformreport.reason.value==''){
				alert("<?php echo _AKOCOMMENT_FORMREPORTVALIDATE; ?>");
			} else {
				document.akocommentformreport.submit();
			}
	}
	</script>
	<div class="contentheading"><?php echo _AKOCOMMENT_REPORTACOMMENT; ?></div><br />
	<?php echo _AKOCOMMENT_REPORTINTRO; ?><br />
	<?php echo _AKOCOMMENT_REPORTINTRO2; ?><br /><br />
	  <form name="akocommentformreport" method="post" action="">
	    <table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="420"><div align="right"><?php echo _AKOCOMMENT_ENTERNAME; ?></div></td>
            <td width="32">&nbsp;</td>
            <td width="785"><input type="text" name="reportname" class="inputbox"></td>
          </tr>
          <tr>
            <td><div align="right"><?php echo _AKOCOMMENT_ENTERMAIL; ?></div></td>
            <td>&nbsp;</td>
            <td><input type="text" name="reportemail" class="inputbox"></td>
          </tr>
          <tr>
            <td valign="top"><div align="right"><?php echo _AKOCOMMENT_REASON_REPORT; ?></div></td>
            <td>&nbsp;</td>
            <td><textarea name="reason" cols="30" rows="5" class="inputbox"></textarea></td>
          </tr>
          <tr>
            <td><div align="right"></div></td>
            <td>&nbsp;</td>
            <td><input type="hidden" name="task" value="report">
            <input type="hidden" name="cid" value="<?php echo $cid; ?>"></td>
          </tr>
          <tr>
            <td><div align="right"></div></td>
            <td>&nbsp;</td>
            <td><input type="button" name="Submit" value="<?php echo _AKOCOMMENT_BUTTON_REPORT; ?>" class="button" onClick="validate()"></td>
          </tr>
        </table>
     </form>
		<?php
		# Load function library
		require_once($mosConfig_absolute_path.'/components/com_akocomment/functions.akocomment.php');
		# Prepare smiley array
		$smiley[':)']     = "sm_smile.gif";    $smiley[':grin']  = "sm_biggrin.gif";
		$smiley[';)']     = "sm_wink.gif";     $smiley['8)']     = "sm_cool.gif";
		$smiley[':p']     = "sm_razz.gif";     $smiley[':roll']  = "sm_rolleyes.gif";
		$smiley[':eek']   = "sm_bigeek.gif";   $smiley[':upset'] = "sm_upset.gif";
		$smiley[':zzz']   = "sm_sleep.gif";    $smiley[':sigh']  = "sm_sigh.gif";
		$smiley[':?']     = "sm_confused.gif"; $smiley[':cry']   = "sm_cry.gif";
		$smiley[':(']     = "sm_mad.gif";      $smiley[':x']     = "sm_dead.gif";

		$query = "SELECT * FROM #__akocomment WHERE id = '$cid'";
		$database->setQuery( $query );
		$rows = $database->loadObjectList();


		echo "<br /><b>"._AKOCOMMENT_COMMENTINQUESTION."</b>";

		if ( $ac_showsinfieldset == '0' || $ac_showsinfieldset == '1' ) {
			$fieldset = "";
			$endfieldset = "";
			$theclass = "sectiontableentry1";
			$linktoreport = "";
			foreach ( $rows as $row ) {
				  // if show in fieldset...
				  if ( $ac_showsinfieldset ) {
					  $fieldset = "<fieldset>";
					  $endfieldset = "</fieldset>";
					  $theclass = "";
				  }
				  $akocomments .= "<table width='100%' border='0' cellspacing='3' cellpadding='3'>";
				  $akocomments .= "<tr class='".$theclass."'><td valign='top'>".$fieldset;

				  if ($row->title) {
					$row->title = stripslashes($row->title);
					$akocomments .= "<b>$row->title</b><br />";
				  }
				  $name = stripslashes($row->name);
					  // check if comment has an email
					  if ($row->email != ''){
						$name = "<a href=\"mailto:".$row->email."NOSPAM! \">".$name."</a>";
					  }
					  // check if comment has a website
					  if ($row->web != ''){
						$name .= " <a href='".$row->web."' target='_blank'><img src='components/com_akocomment/images/home.gif' style='vertical-align:middle;' border='0' alt='website' /></a>";
					  }
				  $showIP = ( $ac_showip ) ? ", IP: $row->ip"  : "" ;

				  $akocomments .= "<span class='small'>"._AKOCOMMENT_WRITTENBY." <b>".$name."</b>, "._AKOCOMMENT_ON." " . mosFormatDate( $row->date, $ac_fdate ) . " " . $showIP . "</span><br />";
				  $parsedcomment= AkoParse($row->comment, $smiley, $ac_bbcodesupport, $ac_picsupport, $ac_smiliesupport, $mosConfig_live_site);
				  $parsedcomment= textwrap($parsedcomment, $width = 60);
				  $akocomments .= "$parsedcomment";
				  $akocomments .= $endfieldset."</td></tr></table>";
				  echo $akocomments;
			}

		} else {

		 	foreach ( $rows as $row ) {
				// show comments in template
				// CSS
				echo "<link href='$mosConfig_live_site/components/com_akocomment/templates/$ac_showsinfieldset/css/template_css.css' rel='stylesheet' type='text/css' />";
				$web = "";
				$showIP = "";
				$type_user = "";
				$type_user = ( $row->iduser ) ? _AKOCOMMENT_REGISTERED : _AKOCOMMENT_GUEST ;
				$shownumber = 0;
				$statutUser = $ac_statutUser;
				$date = mosFormatDate( $row->date, $ac_fdate );
				$linecolor = 1;
				$parsedcomment = AkoParse($row->comment, $smiley, $ac_bbcodesupport, $ac_picsupport, $ac_smiliesupport, $mosConfig_live_site);
				$parsedcomment = textwrap($parsedcomment, $width = 60);
				if ($row->title) {
					$title = stripslashes($row->title);
				}
				$name = stripslashes($row->name);
				if ($row->email != ''){
					$name = "<a href=\"mailto:".$row->email."NOSPAM! \">".$name."</a>";
				}
				if ($row->web != ''){
					$web = " <a href='".$row->web."' target='_blank'>".$row->web."</a>";
				}
				$showIP = ( $ac_showip ) ? "IP: $row->ip" : "" ;
				$report = "" ;
				$akocomments = "";
				// include template
				require($mosConfig_absolute_path."/components/com_akocomment/templates/$ac_showsinfieldset/index.php");
				echo $akocomments;
			}
		}
	}
}

?>