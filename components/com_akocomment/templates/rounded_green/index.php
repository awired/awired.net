<?php
# Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
if ($linecolor == 1) {
	$bgcolortd = "#BDD2BD";
} elseif( $linecolor == 2 ){ 
	$bgcolortd = "#669966";
}
$akocomments .= "<div id='commentbubble'>\n" ;
$akocomments .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
$akocomments .= "<tr>\n";
$akocomments .= "<td width=\"11\"><img name=\"ang_h_g$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/rounded_green/images/ang_h_g$linecolor.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"\" /></td>\n";
$akocomments .= "<td colspan=\"2\" bgcolor=\"$bgcolortd\">\n";
$akocomments .= "<div id='commentheader'>\n";
if ( $shownumber ) {
	$akocomments .= "<span class='commentnumber'>{$i}. </span>" ;
}
$akocomments .=  _AKOCOMMENT_WRITTENBY . " <strong>{$name}</strong> " . _AKOCOMMENT_ON . " {$date}" ;
if ( $statutUser ) {
	$akocomments .= " - {$type_user}" ;
	if ( $showIP ) {
		$akocomments .= " - {$showIP}" ;
	}
}
if ( $showIP && $statutUser=='0') {
	$akocomments .= " - {$showIP}" ;
}
$akocomments .= "\n</div></td>\n";
$akocomments .= "<td width=\"11\"><img name=\"ang_h_d$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/rounded_green/images/ang_h_d$linecolor.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"\"></td>\n";
$akocomments .= "</tr>\n";
$akocomments .= "<tr>\n";
$akocomments .= "<td bgcolor=\"$bgcolortd\">&nbsp;</td>\n";
$akocomments .= "<td colspan=\"2\">\n";
$akocomments .= "<div id='separate$linecolor'>&nbsp;</div>\n";
$akocomments .= "<div id='commentbody$linecolor'>\n" ;
if ( $title ) { 
	$akocomments .= "<div id='commenttitle'>{$title}</div>\n" ;
}
$akocomments .= "<div id='comment'>{$parsedcomment}</div>\n" ;
if ( $web ) {
	$akocomments .= "<div id='commentweb'>{$web}</div>\n" ;
}
if ( $report ) {
	$akocomments .= "<div id='commentreport'>{$report}</div>\n" ;
}
$akocomments .= "</div>\n" ;
$akocomments .= "</td>\n";
$akocomments .= "<td bgcolor=\"$bgcolortd\">&nbsp;</td>\n";
$akocomments .= "</tr>\n";
$akocomments .= "</table>\n";
$akocomments .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
$akocomments .= "<tr>\n";
$akocomments .= "<td width=\"11\"><img name=\"ang_b_g$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/rounded_green/images/ang_b_g$linecolor.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"\" /></td>\n";
$akocomments .= "<td colspan=\"2\" bgcolor=\"$bgcolortd\">\n";
$akocomments .= "<td width=\"11\"><img name=\"ang_b_d$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/rounded_green/images/ang_b_d$linecolor.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"\" /></td>\n";
$akocomments .= "</tr>\n";
$akocomments .= "</table>\n";
$akocomments .= "</div>\n" ;
?>
