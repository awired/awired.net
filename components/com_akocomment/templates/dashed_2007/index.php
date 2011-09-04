<?php
# Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$akocomments .= "<div id='commentbubble'>" ;
$akocomments .= "<div id='commentheader'>" ;
if ( $shownumber ) {
	$akocomments .= "<span class='commentnumber'>{$i}. </span>" ;
}
$akocomments .= "{$date}</div>" ;
$akocomments .= "<div id='commentbody'>" ;
if ( $title ) { 
	$akocomments .= "<div id='commenttitle'>{$title}</div>" ;
}
$akocomments .= "<div id='comment'>{$parsedcomment}</div>" ;
if ( $web ) {
	$akocomments .= "<div id='commentweb'>{$web}</div>" ;
}
$akocomments .= "</div>" ;
$akocomments .= "</div>" ;
$akocomments .= "<div id='commentfooter'>" . _AKOCOMMENT_WRITTENBY . " {$name}";
if ( $showIP ) {
	$akocomments .= "<span class='commentip'> ({$showIP})</span>" ;
}
if ( $statutUser ) {
	$akocomments .= "<span class='commentusertype'> ({$type_user})</span>" ;
}
if ( $report ) {
	$akocomments .= "<div class='commentreport'> {$report}</div>" ;
}
$akocomments .= "</div>" ;

?>