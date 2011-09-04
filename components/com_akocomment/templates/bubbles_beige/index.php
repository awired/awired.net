<?php
# Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$akocomments .= "<div id='commentbubble'>\n" ;
$akocomments .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
$akocomments .= "<tr>\n";
$akocomments .= "<td width=\"24\"><img name=\"ang_h_g$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/ang_h_g$linecolor.gif\" width=\"24\" height=\"28\" border=\"0\" alt=\"\" /></td>\n";
$akocomments .= "<td colspan=\"2\" background=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/top_center$linecolor.gif\">\n";
$akocomments .= "<div id='commentheader'><div>\n";
if ( $shownumber ) {
	$akocomments .= "<span class='commentnumber'>{$i}. </span>" ;
}
$akocomments .= "{$date}\n" ;
$akocomments .= "</td>\n";
$akocomments .= "<td width=\"24\"><img name=\"ang_h_d$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/ang_h_d$linecolor.gif\" width=\"24\" height=\"28\" border=\"0\" alt=\"\"></td>\n";
$akocomments .= "</tr>\n";
$akocomments .= "<tr>\n";
$akocomments .= "<td background=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/left$linecolor.gif\">&nbsp;</td>\n";
$akocomments .= "<td colspan=\"2\">\n";
$akocomments .= "<div id='commentbody$linecolor'>\n" ;
if ( $title ) { 
	$akocomments .= "<div id='commenttitle'>{$title}</div>\n" ;
}
$akocomments .= "<div id='comment'>{$parsedcomment}</div>\n" ;
if ( $web ) {
	$akocomments .= "<div id='commentweb'>{$web}</div>\n" ;
}
if ( $showIP ) {
	$akocomments .= "<div id='commentip'>{$showIP}</div>\n" ;
}
if ( $statutUser ) {
	$akocomments .= "<div id='commentusertype'>{$type_user}</div>\n" ;
}
if ( $report ) {
	$akocomments .= "<div id='commentreport'>{$report}</div>\n" ;
}
$akocomments .= "</div>\n" ;
$akocomments .= "</td>\n";
$akocomments .= "<td background=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/right$linecolor.gif\">&nbsp;</td>\n";
$akocomments .= "</tr>\n";
$akocomments .= "</table>\n";
$akocomments .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
$akocomments .= "<tr>\n";
$akocomments .= "<td width=\"24\"><img name=\"ang_b_g$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/ang_b_g$linecolor.gif\" width=\"24\" height=\"50\" border=\"0\" alt=\"\" /></td>\n";
if ( $linecolor== '1' ) {
	$akocomments .= "<td background=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/bottom_center$linecolor.gif\"><div id='commentfooter$linecolor'>{$name}</div></td>\n";
	$akocomments .= "<td width=\"64\"><img name=\"bubble$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/bubble$linecolor.gif\" width=\"64\" height=\"50\" border=\"0\" alt=\"\" /></td>\n";
}else{
	$akocomments .= "<td width=\"64\"><img name=\"bubble$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/bubble$linecolor.gif\" width=\"64\" height=\"50\" border=\"0\" alt=\"\" /></td>\n";
	$akocomments .= "<td background=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/bottom_center$linecolor.gif\"><div id='commentfooter$linecolor'>{$name}</div></td>\n";
}
$akocomments .= "<td width=\"24\"><img name=\"ang_b_d$linecolor\" src=\"$mosConfig_live_site/components/com_akocomment/templates/bubbles_beige/images/ang_b_d$linecolor.gif\" width=\"24\" height=\"50\" border=\"0\" alt=\"\" /></td>\n";
$akocomments .= "</tr>\n";
$akocomments .= "</table>\n";
$akocomments .= "</div>\n" ;
?>
