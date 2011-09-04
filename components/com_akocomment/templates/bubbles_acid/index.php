<?php
# Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$akocomments .= "<div id='commentbubble'>" ;
$akocomments .= "<div id='commentheader'>" ;
if ( $shownumber ) {
	$akocomments .= "<span class='commentnumber'>{$i}. </span>" ;
}
$akocomments .= "{$date}</div>" ;
$akocomments .= "<div id='commentbody$linecolor'>" ;
if ( $title ) { 
	$akocomments .= "<div id='commenttitle'>{$title}</div>" ;
}
$akocomments .= "<div id='comment'>{$parsedcomment}</div>" ;
if ( $web ) {
	$akocomments .= "<div id='commentweb'>{$web}</div>" ;
}
if ( $showIP ) {
	$akocomments .= "<div id='commentip'>{$showIP}</div>" ;
}
if ( $statutUser ) {
	$akocomments .= "<div id='commentusertype'>{$type_user}</div>" ;
}
if ( $report ) {
	$akocomments .= "<div id='commentreport'>{$report}</div>" ;
}
$akocomments .= "</div>" ;
$akocomments .= "<div id='commentfooter$linecolor'>{$name}</div>" ;
$akocomments .= "</div>" ;
?>