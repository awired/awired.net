<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* Tweaked version Modified by Artistworks.net
* Hacks by - Benjamin Samson - www.bpixel.com
* Hacks by Arnaud Bonneville - www.baccoubonneville.com
* Spamfix & Pagination by Dominik Paulus  - www.dpaulus.de
* Wrong Security code by Mike H - //forum.joomla.org/index.php/topic,28644.120.html* Hack by Raffie - Updated code to work properly in Joomla 1.1.10 - http://www.mawajiz.com
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
*
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $_MAMBOTS;

$_MAMBOTS->registerFunction( 'onPrepareContent', 'botAkoComment' );

function botAkoComment( $published, &$row, &$params, $page=0 ) {

   if (@$row->content){
      return;
  }

  if (!$published) {
    $row->text = str_replace( "{moscomment}", "", $row->text );
    return;
  }

  # Variables - Don't change anything here!!!
  global $database, $mainframe, $option, $task, $mosConfig_lang, $mosConfig_absolute_path, $mosConfig_live_site, $my;

	# Get the right language if it exists
	if (file_exists($mosConfig_absolute_path.'/components/com_akocomment/languages/'.$mosConfig_lang.'.php')) {
	  include_once($mosConfig_absolute_path.'/components/com_akocomment/languages/'.$mosConfig_lang.'.php');
	} else {
	  include_once($mosConfig_absolute_path.'/components/com_akocomment/languages/english.php');
	}

  # Load configuration file
  require($mosConfig_absolute_path."/administrator/components/com_akocomment/config.akocomment.php");
  require( $mosConfig_absolute_path."/administrator/components/com_akocomment/version.php" );

    # Get Itemid
	if ( $row->sectionid ) {
		$bs 	= $mainframe->getBlogSectionCount();
		$bc 	= $mainframe->getBlogCategoryCount();
		$gbs 	= $mainframe->getGlobalBlogSectionCount();
		$Itemid = $mainframe->getItemid( $row->id, 0, 0, $bs, $bc, $gbs );
	} else {
		$query = "SELECT id"
		. "\n FROM #__menu"
		. "\n WHERE type = 'content_typed'"
		. "\n AND componentid = $row->id"
		;
		$database->setQuery( $query );
		$Itemid = $database->loadResult();
	}
	// Blank itemid checker for SEF
	if ($Itemid == NULL) {
		$Itemid = '';
		$uniqItemid = '';
	} else {
		$uniqItemid = $Itemid;
		$Itemid = '&amp;Itemid='. $Itemid;

	}

  # STOP! THE REMOVAL OF THE POWERED BY LINE IS NOT ALLOWED.
  # IF YOU WANT TO REMOVE IT, CONTACT ME AT www.konze.de FOR DETAILS!
  $akocpversion = "<p align='center'><span class='small'>Powered by AkoComment Tweaked <a href='http://www.visualclinic.fr' target='_blank' >Special Edition</a> v." . _AKOCOMMENT_TW_SE_VERSION;
  $akocpversion .= "<br/>AkoComment &copy; Copyright 2004 by Arthur Konze - <a href='http://www.mamboportal.com/' target='_blank'>www.mamboportal.com</a><br/>All right reserved</span></p>";
  $akocpversion = '';

  $seclistarray = explode (",", $ac_sectionlist);

  $ac = trim( mosGetParam( $_REQUEST, 'ac', 0 ) );
  $ac_numcomments = ( $ac_numcomments!='' && $ac_numcomments*0 == 0 ) ? $ac_numcomments  : '10' ;
  $ac_fdate = ( $ac_fdate!='' ) ? $ac_fdate  : _DATE_FORMAT_LC2 ;

  // prepare show link print, send email, read more...
  // ADDING OPTIONS BY Bernard Gilly - Visualclinic.fr
  $ac_character = ( $ac_character_separate!='' ) ? " ".$ac_character_separate." " : "  ";
  $showextralinks = "";
  if ($ac_showfavouredlink){
	$query = "SELECT COUNT(*) AS favourite FROM #__akocomment_favoured WHERE id_content = '".$row->id."'";
	$database->setQuery( $query );
	$favorite = $database->loadResult();
	$showextralinks .= $ac_character."<img src='".$mosConfig_live_site."/components/com_akocomment/images/favoured.gif' hspace='2' style='vertical-align:middle;' alt='' />";
	$showextralinks .= "<a class=\"\" href=\"".sefRelToAbs("index.php?option=com_akocomment&task=favoured&id=$row->id$Itemid")."\">". _AKOCOMMENT_ADDFAVOURED . "</a> (".$favorite.")";
  }
  if ($ac_showquotelink){
	$showextralinks .= $ac_character."<img src='".$mosConfig_live_site."/components/com_akocomment/images/quotethis.gif' hspace='2' style='vertical-align:middle;' alt='' />";
	$showextralinks .= "<a class=\"\" href=\"".sefRelToAbs("index.php?option=com_akocomment&task=quote&id=$row->id$Itemid")."\">". _AKOCOMMENT_QUOTETHISARTICLE . "</a>";
  }
  if ($ac_showhits){
	$query = "SELECT hits FROM #__content WHERE id = '".$row->id."'";
	$database->setQuery( $query );
	$numhits = $database->loadResult();
	$showextralinks .= $ac_character . _AKOCOMMENT_HITS_VIEWS . $numhits;
  }
  if ($ac_showprintlink){
	$showextralinks .= $ac_character."<a class=\"\" href=\"javascript:void window.open('".sefRelToAbs("index2.php?option=com_content&task=view&id=$row->id&pop=1&page=0&ac=1")."', 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');\">" . _CMN_PRINT . "</a>";
  }
  if ($ac_showsendemaillink){
	$showextralinks .= $ac_character."<a class=\"\" href=\"javascript:void window.open('".sefRelToAbs("index2.php?option=com_content&task=emailform&id=$row->id")."', 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=400,height=280,directories=no,location=no');\">" . _CMN_EMAIL . "</a>";
  }
  if ($ac_showreadmorelink && !( ( $option=='com_content' || $option=='com_alphacontent' ) && $task=='view') ){
	$showextralinks .= $ac_character."<a class=\"\" href=\"".sefRelToAbs("index.php?option=com_content&task=view&id=$row->id&ac=$ac_show_commentreadmore$Itemid")."\">" . _READ_MORE . "</a>";
  }


  if ( $row->state =='1' || ( $row->state=='-1' && $ac_showonarchives=='1') ) {

	  if ((($ac_mainmode == "0") && (strpos($row->text, "{moscomment}") !== false) && $ac!='1' ) || (($ac_mainmode == "1") && (in_array (isset($row->sectionid), $seclistarray)) && $ac!='1' )) {


		# Prepare smiley array
		$smiley[':)']     = "sm_smile.gif";    $smiley[':grin']  = "sm_biggrin.gif";
		$smiley[';)']     = "sm_wink.gif";     $smiley['8)']     = "sm_cool.gif";
		$smiley[':p']     = "sm_razz.gif";     $smiley[':roll']  = "sm_rolleyes.gif";
		$smiley[':eek']   = "sm_bigeek.gif";   $smiley[':upset'] = "sm_upset.gif";
		$smiley[':zzz']   = "sm_sleep.gif";    $smiley[':sigh']  = "sm_sigh.gif";
		$smiley[':?']     = "sm_confused.gif"; $smiley[':cry']   = "sm_cry.gif";
		$smiley[':(']     = "sm_mad.gif";      $smiley[':x']     = "sm_dead.gif";


		# Load function library
		require_once($mosConfig_absolute_path.'/components/com_akocomment/functions.akocomment.php');

		$limitout = ( $ac_numautolimit > 0 ) ? "LIMIT $ac_numautolimit" : "" ;

		# Check number of comments
		$database->setQuery( "SELECT count(*) FROM #__akocomment WHERE contentid='$row->id' AND published='1'" );
		$total = $database->loadResult();

		if ( $ac_numautolimit ) {
			if ( $total > $ac_numautolimit ) { $total = $ac_numautolimit; }
		}

		echo $database->getErrorMsg();
		if ( ( $option=='com_content' || $option=='com_alphacontent' ) && $task=='view') {

		  # Check for Editor rights
		  $is_editor = (strtolower($my->usertype) == 'editor' || strtolower($my->usertype) == 'publisher' || strtolower($my->usertype) == 'manager' || strtolower($my->usertype) == 'administrator' || strtolower($my->usertype) == 'super administrator' );
		  $is_user   = (strtolower($my->usertype) <> '');

		  $len_character = ($ac_character);
		  $deb = $len_character + 2;
		  $showextralinks = substr($showextralinks, $deb);
		  $akocomments = "<br />".$showextralinks."<br />";

		  $showrssfeed = ( $ac_showrssfeed ) ? "<a href='index.php?option=com_akocomment&task=feed'><img src='$mosConfig_live_site/components/com_akocomment/images/rss.gif' border='0' style='vertical-align:middle;' alt='"._AKOCOMMENT_RSS."' /></a>" : "" ;
		  $quotesimgtop = ( $ac_showsinfieldset == '0' || $ac_showsinfieldset == '1' ) ? "<img src=\"$mosConfig_live_site/components/com_akocomment/images/quotetop.gif\" align=\"baseline\" alt=\"\" />&nbsp;&nbsp;" : "";
		  $quotesimgbottom = ( $ac_showsinfieldset == '0' || $ac_showsinfieldset == '1' ) ? "<img src=\"$mosConfig_live_site/components/com_akocomment/images/quotebottom.gif\" alt=\"\" />" : "";

		  // Bug fix CSS if num comment = 0
		  if ( $ac_showsinfieldset != '0' && $ac_showsinfieldset != '1' ) {
		  	echo "<link href='$mosConfig_live_site/components/com_akocomment/templates/$ac_showsinfieldset/css/template_css.css' rel='stylesheet' type='text/css' />";
		  }

		  if ($total>0) {
			# Show Comments if exist
			$akocomments .= "<br /><table width='100%' border='0' cellspacing='0' cellpadding='0'>";
			$akocomments .= "<tr><td><div align='left' class='commenttop'>$quotesimgtop"._AKOCOMMENT_COMMENTS." (".$total.")</div></td>";
			$akocomments .= "<td><div align='right' >" . $showrssfeed . "</div></td></tr>";
			$akocomments .= "</table>";

			$line=1;
			$database->setQuery( "SELECT id as acid, contentid as contentid, title as actitle, email as email, web as web, name as acname, date as acdate, ip as ip, comment as accomment, iduser as iduser FROM #__akocomment WHERE contentid='$row->id' AND published='1' ORDER BY id $ac_sorting $limitout" ); // added by bpixel - modified by visualclinic.fr
			$acrows = $database->loadObjectList();
			if ($database->getErrorNum()) {
			  echo $database->stderr();
			  return false;
			}

			$fieldset = "";
			$endfieldset = "";

			if ( $ac_showsinfieldset == '0' || $ac_showsinfieldset == '1' ) {

				for ($i=1, $n=count( $acrows ); $i <= $n; $i++) {
				  $acrow = &$acrows[$i-1];
				  $linecolor = ($line % 2) + 1;
				  $theclass = "sectiontableentry".$linecolor;
				  // if report
				  if ( $ac_report ) {
					  $link4report = "index.php?option=com_akocomment&task=report&id=$acrow->contentid&cid=$acrow->acid$Itemid";
					  $linktoreport = "<a href='".sefRelToAbs($link4report)."'>" . _AKOCOMMENT_REPORT . "</a>";
				  }else{ $linktoreport=""; }

				  // if show in fieldset...
				  if ( $ac_showsinfieldset ) {
					  $fieldset = "<fieldset>";
					  if ( $ac_showcommentnumber ) {
						$fieldset .= "<legend>&nbsp;". ($i). "&nbsp;</legend>";
					  }
					  $endfieldset = "</fieldset>";
					  $linecolor = "3";
					  $theclass = "";
				  }
				  $akocomments .= "<a name='akocomment".$acrow->acid."'></a>";
				  $akocomments .= "<table width='100%' border='0' cellspacing='3' cellpadding='3'>";
				  $akocomments .= "<tr class='".$theclass."'><td valign='top'>".$fieldset;
				  if ( $ac_showsinfieldset=='0' && $ac_showcommentnumber=='1' ) {
					$akocomments .= "<b>".($i).". </b>";
				  }
				  if ($acrow->actitle) {
					$acrow->actitle = stripslashes($acrow->actitle);
					$akocomments .= "<b>$acrow->actitle</b><br />";
				  }
				  $name = stripslashes($acrow->acname);

				  // *** begin hack by bpixel
					  // check if comment has an email
					  if ( $acrow->email != '' ){
						$name = "<a href=\"mailto:".$acrow->email."NOSPAM! \">".$name."</a>"; //NoSpam Mail Hack added by MartinCZ
					  }

					  if ( $ac_LinkCBProfile ) {
						// Check if CB component exist
						$pathFileCB = $mosConfig_absolute_path . "/components/com_comprofiler/comprofiler.php";
						if ( file_exists( $pathFileCB ) ) {
							$akoBotCheckCBcomponent = 1;
						} else $akoBotCheckCBcomponent = 0;

						// Link to CB profile
						if( $akoBotCheckCBcomponent && $acrow->iduser ){
							$name = "<a href=\""
							. sefRelToAbs( 'index.php?option=com_comprofiler&amp;task=userProfile&amp;user=' . $acrow->iduser . AkoCBAuthorItemidBot() )
							. "\">"
							. stripslashes($acrow->acname)
							. "</a>";
						}
					  }
					  // check if comment has a website
					  if ( $acrow->web != '' ){
						$name .= " <a href='".$acrow->web."' target='_blank'><img src='components/com_akocomment/images/home.gif' style='vertical-align:middle;' border='0' alt='website' /></a>";
					  }
				  // *** end hack by bpixel

				  //Show IP of User Hack added by MartinCZ  - Modified by visualclinic.fr
				  $showIP = ( $ac_showip ) ? ", IP: $acrow->ip"  : "" ;

				  $akocomments .= "<span class='small'>"._AKOCOMMENT_WRITTENBY." <b>".$name."</b>, "._AKOCOMMENT_ON." " . mosFormatDate( $acrow->acdate, $ac_fdate ) . " " . $showIP . "</span><br />";
				  $parsedcomment= AkoParse($acrow->accomment, $smiley, $ac_bbcodesupport, $ac_picsupport, $ac_smiliesupport, $mosConfig_live_site);
				  $parsedcomment= textwrap($parsedcomment, $width = 60);
				  $akocomments .= "$parsedcomment";

				  // if report
				  if ( $ac_report ) {
					  $akocomments .= "<br />";
					  $akocomments .= "<div align='right'>$linktoreport</div>";
				  }

				  /* AkoComment Pagination by Dominik Paulus - modified by Bernard Gilly */
				  // 10 comments per page by default
				  if(($i%($ac_numcomments)) == 0 && $i != $n ) {
						  $akocomments .= $endfieldset."</td></tr></table>";
						  $akocomments .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>";
						  $akocomments .= "<div align=\"right\" class='commentbottom'>$quotesimgbottom";
						  $akocomments .= "</div></td></tr></table>";
						  $akocomments .= "{mospagebreak}";
						  $akocomments .= str_replace( "{moscomment}", "", $row->text );
						  $akocomments .= "<br />".$showextralinks."<br />";
						  $akocomments .= "<br /><table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						  $akocomments .= "<tr><td><div align='left' class='commenttop'>$quotesimgtop"._AKOCOMMENT_COMMENTS." (".$total.")</div></td>";
						  $akocomments .= "<td><div align='right' >" . $showrssfeed . "</div></td></tr></table>";
						  $line=0;
				  }else {
					  $akocomments .= $endfieldset."</td></tr></table>";
				  }
				  $line++;
				}
			} else {
				// show comments in template
				// CSS
				//echo "<link href='$mosConfig_live_site/components/com_akocomment/templates/$ac_showsinfieldset/css/template_css.css' rel='stylesheet' type='text/css' />";

				for ($i=1, $n=count( $acrows ); $i <= $n; $i++) {
				  $acrow = &$acrows[$i-1];
				  // if report
				  if ( $ac_report ) {
					  $link4report = "index.php?option=com_akocomment&task=report&id=$acrow->contentid&cid=$acrow->acid$Itemid";
					  $linktoreport = "<a href='".sefRelToAbs($link4report)."'>" . _AKOCOMMENT_REPORT . "</a>";
				  } else { $linktoreport = ""; }
				  $web = "";
				  $showIP = "";
				  $type_user = "";
				  $report = "";
				  $type_user = ( $acrow->iduser ) ? _AKOCOMMENT_REGISTERED : _AKOCOMMENT_GUEST ;
				  $shownumber = $ac_showcommentnumber;
				  $statutUser = $ac_statutUser;
				  $date = mosFormatDate( $acrow->acdate, $ac_fdate );
				  $linecolor = ($line % 2) + 1;
				  $parsedcomment = AkoParse($acrow->accomment, $smiley, $ac_bbcodesupport, $ac_picsupport, $ac_smiliesupport, $mosConfig_live_site);
				  $parsedcomment = textwrap($parsedcomment, $width = 60);
				  if ($acrow->actitle) {
					$title = stripslashes($acrow->actitle);
				  }
				  $name = stripslashes($acrow->acname);
				  if ($acrow->email != ''){
					$name = "<a href=\"mailto:".$acrow->email."NOSPAM! \">".$name."</a>"; //NoSpam Mail Hack added by MartinCZ
				  }
				  if ( $ac_LinkCBProfile ) {
					// Check if CB component exist
					$pathFileCB = $mosConfig_absolute_path . "/components/com_comprofiler/comprofiler.php";
					if ( file_exists( $pathFileCB ) ) {
						$akoBotCheckCBcomponent = 1;
					} else $akoBotCheckCBcomponent = 0;

					// Link to CB profile
					if( $akoBotCheckCBcomponent && $acrow->iduser ){
						$name = "<a href=\""
						. sefRelToAbs( 'index.php?option=com_comprofiler&amp;task=userProfile&amp;user=' . $acrow->iduser . AkoCBAuthorItemidBot() )
						. "\">"
						. stripslashes($acrow->acname)
						. "</a>";
					}
				  }
				  if ($acrow->web != ''){
					$web = " <a href='".$acrow->web."' target='_blank'>".$acrow->web."</a>";
				  }
				  $showIP = ( $ac_showip ) ? "IP: $acrow->ip" : "" ;
				  // if report
				  if ( $ac_report ) {
					  $report = $linktoreport ;
				  }
				  // anchor
				  $akocomments .= "<a name='akocomment$acrow->acid'></a>" ;

				  // include template
				  require($mosConfig_absolute_path."/components/com_akocomment/templates/$ac_showsinfieldset/index.php");

				  /* AkoComment Pagination by Dominik Paulus - modified by Bernard Gilly */
				  // 10 comments per page by default
				  if(($i%($ac_numcomments)) == 0 && $i != $n ) {
						  $akocomments .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>";
						  $akocomments .= "<div align=\"right\" class='commentbottom'>$quotesimgbottom";
						  $akocomments .= "</div></td></tr></table>";
						  $akocomments .= "{mospagebreak}";
						  $akocomments .= str_replace( "{moscomment}", "", $row->text );
						  $akocomments .= "<br />".$showextralinks."<br />";
						  $akocomments .= "<br /><table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						  $akocomments .= "<tr><td><div align='left' class='commenttop'>$quotesimgtop"._AKOCOMMENT_COMMENTS." (".$total.")</div></td>";
						  $akocomments .= "<td><div align='right' >" . $showrssfeed . "</div></td></tr></table>";
						  $line=0;
				  }
				  $line++;
				}
			}

			$akocomments .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>";
			$akocomments .= "<div align=\"right\" class='commentbottom'>$quotesimgbottom";
			$akocomments .= "</div></td></tr></table>";

		  }else{
			$akocomments .= "<br /><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>";
			$akocomments .= "<div align=\"left\" class='commenttop'>$quotesimgtop"._AKOCOMMENT_WRITEFIRSTCOMMENT;
			$akocomments .= "</div></td><td><div align='right' >" . $showrssfeed . "</div></td></tr></table>";
			$akocomments .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>";
			$akocomments .= "<div align=\"right\" class='commentbottom'>$quotesimgbottom";
			$akocomments .= "</div></td></tr></table>";
		  }

		  $akoinputforum = "";

		  if ( $row->state =='1' || ( $row->state=='-1' && $ac_showonarchives=='1' && $ac_addonarchives=='1' ) ) {

			  # Check if Registered Users only
			  if (!$ac_anonentry && !$is_user) {
				$akoinputforum = "<p>"._AKOCOMMENT_ONLYREGISTERED."</p>";
			  } else {
				# Javascript for Form Check
				$akoinputforum = "<p>";
				$akoinputforum .= "<script language=\"Javascript\">";
				$akoinputforum .= "  function x () {";
				$akoinputforum .= "    return;";
				$akoinputforum .= "  }";
				$akoinputforum .= "  function ac_smilie(thesmile) {";
				$akoinputforum .= "    document.akocommentform.comment.value += \" \"+thesmile+\" \";";
				$akoinputforum .= "    document.akocommentform.comment.focus();";
				$akoinputforum .= "  }";
				$akoinputforum .= "  function validate(){";
				$akoinputforum .= "    if (document.akocommentform.comment.value==''){";
				$akoinputforum .= "      alert(\""._AKOCOMMENT_FORMVALIDATE."\");";
				$akoinputforum .= "    } else if (document.akocommentform.acname.value==''){";	// added by bpixel
				$akoinputforum .= "      alert(\""._AKOCOMMENT_FORMVALIDATENAME."\");";		    // added by bpixel
				$akoinputforum .= " 	 }else {";
				$akoinputforum .= "      document.akocommentform.action = 'index.php';";
				$akoinputforum .= "      document.akocommentform.submit();";
				$akoinputforum .= "    }";
				$akoinputforum .= "  }";
				if ($ac_bbcodesupport) {
				  $akoinputforum .= "function DoPrompt(action) {";
				  $akoinputforum .= "  var revisedMessage;";
				  $akoinputforum .= "  var currentMessage = document.akocommentform.comment.value;";
				  $akoinputforum .= "  if (action == \"url\") {";
				  $akoinputforum .= "    var thisURL = prompt(\"Enter the URL for the link you want to add.\", \"http://\");";
				  $akoinputforum .= "    var thisTitle = prompt(\"Enter the web site title\", \"Page Title\");";
				  $akoinputforum .= "    var urlBBCode = \"[URL=\"+thisURL+\"]\"+thisTitle+\"[/URL]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+urlBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"email\") {";
				  $akoinputforum .= "    var thisEmail = prompt(\"Enter the email address you want to add.\", \"\");";
				  $akoinputforum .= "    var emailBBCode = \"[EMAIL]\"+thisEmail+\"[/EMAIL]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+emailBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"bold\") {";
				  $akoinputforum .= "    var thisBold = prompt(\"Enter the text that you want to make bold.\", \"\");";
				  $akoinputforum .= "    var boldBBCode = \"[B]\"+thisBold+\"[/B]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+boldBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"italic\") {";
				  $akoinputforum .= "    var thisItal = prompt(\"Enter the text that you want to make italic.\", \"\");";
				  $akoinputforum .= "    var italBBCode = \"[I]\"+thisItal+\"[/I]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+italBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"underline\") {";
				  $akoinputforum .= "    var thisUndl = prompt(\"Enter the text that you want to be undelined.\", \"\");";
				  $akoinputforum .= "    var undlBBCode = \"[U]\"+thisUndl+\"[/U]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+undlBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"image\") {";
				  $akoinputforum .= "    var thisImage = prompt(\"Enter the URL for the image you want to display.\", \"http://\");";
				  $akoinputforum .= "    var imageBBCode = \"[img]\"+thisImage+\"[/img]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+imageBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"quote\") {";
				  $akoinputforum .= "    var quoteBBCode = \"[QUOTE]  [/QUOTE]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+quoteBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"code\") {";
				  $akoinputforum .= "    var codeBBCode = \"[CODE]  [/CODE]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+codeBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"listopen\") {";
				  $akoinputforum .= "    var liststartBBCode = \"[LIST]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+liststartBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"listclose\") {";
				  $akoinputforum .= "    var listendBBCode = \"[/LIST]\";";
				  $akoinputforum .= "    revisedMessage = currentMessage+listendBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "  if (action == \"listitem\") {";
				  $akoinputforum .= "    var thisItem = prompt(\"Enter the new list item. Note that each list group must be preceeded by a List Close and must be ended with List Close.\", \"\");";
				  $akoinputforum .= "    var itemBBCode = \"[*]\"+thisItem;";
				  $akoinputforum .= "    revisedMessage = currentMessage+itemBBCode;";
				  $akoinputforum .= "    document.akocommentform.comment.value=revisedMessage;";
				  $akoinputforum .= "    document.akocommentform.comment.focus();";
				  $akoinputforum .= "    return;";
				  $akoinputforum .= "  }";
				  $akoinputforum .= "}";
				}
			    $akoinputforum .= "</script>";

			    $contentid = $row->id;
			    $the_username = ( $ac_use_name ) ? $my->name : $my->username ;


			    if ( $ac_showsinfieldset != '0' && $ac_showsinfieldset != '1' ) {  // if show in template...
					$akoinputforum .= "<div id='commentform'>";
					$akoinputforum .= "<div id='writecomment'>"._AKOCOMMENT_WRITECOMMENT."</div>";
				}

			   	//startform
				$akoinputforum .= "<table align='center' width='100%' cellpadding='2' cellspacing='0' border='0'>";
				if ( $ac_showsinfieldset == '0' || $ac_showsinfieldset == '1' ) {
					$akoinputforum .= "<tr><td colspan='2' class='sectiontableheader'>"._AKOCOMMENT_WRITECOMMENT."</td></tr>";
				}
				if ( _AKOCOMMENT_WRITEPOLICY !='' && 0){
					$akoinputforum .= "<tr><td colspan='2'>"._AKOCOMMENT_WRITEPOLICY."</td></tr>";
				}
				$akoinputforum .= "<form name='akocommentform' action='index.php' target=_top method='post'>";
				$akoinputforum .= "<input type='hidden' name='option' value='com_akocomment'>";
				$akoinputforum .= "<input type='hidden' name='acitemid' value='$uniqItemid'>";
				$akoinputforum .= "<input type='hidden' name='contentid' value='$row->id'>";
				$akoinputforum .= "<input type='hidden' name='func' value='entry'>";
				$akoinputforum .= "<tr><td>"._AKOCOMMENT_ENTERNAME."</td><td>";
				if ($my->username) {
				  $akoinputforum .= "$the_username<input type='hidden' name='acname' value='$the_username'>";
				} else {
				  //$akoinputforum .= _AKOCOMMENT_GUESTNAME."<input type='hidden' name='acname' value='"._AKOCOMMENT_GUESTNAME."'>";  // comment by bpixel
				  $akoinputforum .= "<input type='text' name='acname' style='width:75%;' class='inputbox' value='' alt='"._AKOCOMMENT_ENTERNAME."' title='"._AKOCOMMENT_ENTERNAME."' >";		// added by bpixel
				}
				$akoinputforum .= "<input type='hidden' name='iduser' value='$my->id'>"; // added by visualclinic.fr
				$akoinputforum .= "</td></tr>";

				if ( $ac_displayfieldmail ) {
					$akoinputforum .= "<tr><td>"._AKOCOMMENT_ENTERMAIL."</td><td><input type='text' name='email' style='width:75%;' class='inputbox' alt='"._AKOCOMMENT_ENTERMAIL."' title='"._AKOCOMMENT_ENTERMAIL."' ></td></tr>"; 	// added by bpixel
				}else echo "<input type='hidden' name='email' id='email' value=''>";

				if ( $ac_displayfieldweb ) {
					$akoinputforum .= "<tr><td>"._AKOCOMMENT_ENTERSITE."</td><td><input type='text' name='web' style='width:75%;' class='inputbox' alt='"._AKOCOMMENT_ENTERSITE."' title='"._AKOCOMMENT_ENTERSITE."' ></td></tr>";		// added by bpixel
				}else echo "<input type='hidden' name='web' value=''>";

				if ( $ac_displayfieldtitle ) {
					$akoinputforum .= "<tr><td>"._AKOCOMMENT_ENTERTITLE."</td><td><input type='text' name='title' style='width:75%;' class='inputbox' alt='"._AKOCOMMENT_ENTERTITLE."' title='"._AKOCOMMENT_ENTERTITLE."' ></td></tr>";
				}else echo "<input type='hidden' name='title' value=''>";

				# Switch for BB Code support
				if ($ac_bbcodesupport) {
				  $akoinputforum .= "<tr><td>BBCode:</td><td>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"url\");'><img src='components/com_akocomment/images/bburl.gif' hspace='1' border='0' alt='Web Address' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"email\");'><img src='components/com_akocomment/images/bbemail.gif' hspace='1' border='0' alt='Email Address' /></a>";
				  if ($ac_picsupport) $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"image\");'><img src='components/com_akocomment/images/bbimgsrc.gif' hspace='1' border='0' alt='Load Image from Web' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"bold\");'><img src='components/com_akocomment/images/bbbold.gif' hspace='1' border='0' alt='Bold Text' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"italic\");'><img src='components/com_akocomment/images/bbitalic.gif' hspace='1' border='0' alt='Italic Text' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"underline\");'><img src='components/com_akocomment/images/bbunderline.gif' hspace='1' border='0' alt='Underlined Text' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"quote\");'><img src='components/com_akocomment/images/bbquote.gif' hspace='1' border='0' alt='Quote' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"code\");'><img src='components/com_akocomment/images/bbcode.gif' hspace='1' border='0' alt='Code' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"listopen\");'><img src='components/com_akocomment/images/bblistopen.gif' hspace='1' border='0' alt='Open List' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"listitem\");'><img src='components/com_akocomment/images/bblistitem.gif' hspace='1' border='0' alt='List Item' /></a>";
				  $akoinputforum .= "<a href='javascript: x()' onClick='DoPrompt(\"listclose\");'><img src='components/com_akocomment/images/bblistclose.gif' hspace='1' border='0' alt='Close List' /></a>";
				  $akoinputforum .= "</td></tr>";
				}
				$akoinputforum .= "<tr><td valign='top'>"._AKOCOMMENT_ENTERTEXT."<br /><br />";
				# Switch for Smilie Support
				  if ($ac_smiliesupport) {
				  	//echo "<table align=\"center\"><tr><td>";
					$count=1;
					foreach ($smiley as $i=>$sm) {
					  $akoinputforum .= "<a href=\"javascript:ac_smilie('$i')\" title='$i'><img src='$mosConfig_live_site/components/com_akocomment/images/$sm' border='0' /></a> ";
					  if ($count%5==0) $akoinputforum .= "<br>";
					  $count++;
					}
					//echo "<td><tr></table>";
				  }
				$akoinputforum .= "</td><td valign='top'><textarea style='width:75%;' rows='8' name='comment' class='inputbox' wrap='virtual' title='"._AKOCOMMENT_ENTERTEXT."'>";
				@session_start();
				if(isset($_SESSION['akocomment'])) {
				$akoinputforum .= $_SESSION['akocomment'];
				}
				$akoinputforum .= "</textarea></td></tr>";

				# Spamfix: codefield
				if ( $ac_disable_securitycode=='0' ) {
					$akoinputforum .= "<tr><td width='125' align='left'>"._AKOCOMMENT_ENTERCODE."<span class='small'>*</span></td><td valign='absmiddle' style='vertical-align:middle'><input type='text' name='akocode' maxlength='5' style='width:60px;vertical-align:middle;' class='inputbox' alt='"._AKOCOMMENT_CODEDESCRIPTION."' title='"._AKOCOMMENT_CODEDESCRIPTION."' > <img src='./components/com_akocomment/img.php?bgc=".$ac_bgcolor_code."&fc=".$ac_fontcolor_code."&lc=".$ac_linecolor_code."&bc=".$ac_bordercolor_code."' border='0' title='"._AKOCOMMENT_CODEIMAGE."' alt='Code' style='vertical-align:middle'/></td></tr>";
				}
				if ( $ac_displaycheckboxcontact=='1' ) {
					$akoinputforum .= "<tr><td></td><td align='left' class='small'><input type='checkbox' name='subscribe' id='subscribe' class='inputbox' value='1' /> "._AKOCOMMENT_MAILMENEWADDCOMMENT."</td></tr>";
				}
				$akoinputforum .= "<tr><td>";
				if ( $ac_displaycheckboxcontact=='0' ) {
					$akoinputforum .= "<input type='hidden' name='subscribe' id='subscribe' value='0'>";
				}
				$akoinputforum .= "</td><td align='left'><input type='button' name='send' value='"._AKOCOMMENT_SENDFORM."' class='button' onClick='validate()' alt='"._AKOCOMMENT_SENDFORM."' title='"._AKOCOMMENT_SENDFORM."' ></td></tr></form></table>";
				$akoinputforum .= "</p>";
			  }

		  } // end if add comment on archives

		  // if show in template...
		  if ( $ac_showsinfieldset != '0' && $ac_showsinfieldset != '1' ) {
		  	  $akoinputforum .= "<div id='footerform'></div>";
			  $akoinputforum .= "</div>";
		  }

		  // autolimit for add
		  if ( ( $total == $ac_numautolimit ) && $ac_autolimit4add == '1' ) { $akoinputforum = "" ; }

		  # Check for right placement
		  if ($ac_formposition) {
			$akocomreplace = "$akoinputforum$akocomments$akocpversion";
		  } else {
			$akocomreplace = "$akocomments$akoinputforum$akocpversion";
		  }

		  if ($ac_mainmode == "0") {
			$row->text = str_replace( "{moscomment}", $akocomreplace, $row->text );
		  } elseif (in_array ($row->sectionid, $seclistarray)) {
			$row->text = str_replace( "{moscomment}", "", $row->text );
			$row->text = $row->text.$akocomreplace;
		  }

		# If we are not on the content page
		} else {
		  $replacementlink = ($ac_openingmode) ? "<a class=\"\" href=\"javascript:void window.open('".sefRelToAbs("index2.php?option=com_content&task=view&id=$row->id&pop=1&page=0")."', 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');\">" : "<a class=\"\" href='".sefRelToAbs("index.php?option=com_content&task=view&id=$row->id$Itemid")."'>";

		/////////******************************************///////////
		  if ($ac_mainmode == "0") {
			$row->text = str_replace( "{moscomment}", "<p><img src='".$mosConfig_live_site."/components/com_akocomment/images/comment.gif' hspace='2' style='vertical-align:middle;' alt='' />$replacementlink"._AKOCOMMENT_COMMENTS." ($total)</a>".$showextralinks."</p>", $row->text );
		  } elseif (in_array ($row->sectionid, $seclistarray)) {
			$row->text = str_replace( "{moscomment}", "", $row->text );
			// Changed by Arnaud Bonneville, 25/08/2005
			// If Zero comments are posted we dont show "0 comments"
			//if ($total>0) {
			//echo 'dd';
			 //$row->text = $row->text."<p> $total $replacementlink"._AKOCOMMENT_COMMENTS."</a>";
			 //$row->text = $row->text."($replacementlink".$total."</a>)";
			 $row->text = $row->text."<br> (".$total.")";
			//} else {
			// $row->text = $row->text."<p><img src='".$mosConfig_live_site."/components/com_akocomment/images/comment.gif' hspace='2' style='vertical-align:middle;' alt='' />$replacementlink"._AKOCOMMENT_WRITEFIRSTCOMMENT."</a>";
			//}
			// End of change

			// END ADDING OPTIONS BY Bernard Gilly
			$row->text .= $showextralinks."";
		  }
		}

	  }

	} // if state

  return true;
}

function AkoCBAuthorItemidBot() {
	global $_CBAuthorbot__Cache_ProfileItemid, $database;

	if ( !$_CBAuthorbot__Cache_ProfileItemid ) {
		if ( !isset( $_REQUEST['Itemid'] ) ) {
			$database->setQuery( "SELECT id FROM #__menu WHERE link = 'index.php?option=com_comprofiler' AND published=1" );
			$Itemid = (int) $database->loadResult();
		} else {
			$Itemid = (int) $_REQUEST['Itemid'];
		}
		if ( ! $Itemid ) {
			$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE menutype = 'mainmenu'"
			. "\n AND published = 1"
			. "\n ORDER BY parent, ordering"
			. "\n LIMIT 1"
			;
			$database->setQuery( $query );
			$Itemid = (int) $database->loadResult();
		}
		$_CBAuthorbot__Cache_ProfileItemid = $Itemid;
	}
	if ($_CBAuthorbot__Cache_ProfileItemid) {
		return "&amp;Itemid=" . $_CBAuthorbot__Cache_ProfileItemid;
	} else {
		return null;
	}
}
?>