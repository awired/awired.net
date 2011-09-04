<?php
/**
*
* Module ac_lastcomments for AkoComment Tweaked Special Edition
* www.visualclinic.fr
* Licence GNU/GPL
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

global $mainframe;

$count 		         = intval( $params->get( 'count', 5 ) );
$show_title_item     = intval( $params->get( 'show_title_item', 1 ) );
$limittexttitle	     = intval( $params->get( 'limittexttitle', 20 ) );
$limittextcomment	 = intval( $params->get( 'limittextcomment', 35 ) );
$show_title_comment  = intval( $params->get( 'show_title_comment', 1 ) );
$show_author_comment = intval( $params->get( 'show_author_comment', 1 ) );
$link_author_cb 	 = intval( $params->get( 'link_author_cb', 0 ) );
$show_date_comment   = intval( $params->get( 'show_date_comment', 1 ) );
$thedateformat       = $params->get( 'thedateformat', '%d/%m/%y %H:%M' );
$label4more          = $params->get( 'label4more', 'More...' );
$label4author        = $params->get( 'label4author', 'By' );
$label4nocomment     = $params->get( 'label4nocomment', 'No comment...' );

$query = "SELECT lc.id AS idcomment, lc.contentid, lc.title AS titlecomment, lc.comment AS lastcomment, lc.date AS lastpost, lc.name AS authorcomment, lc.iduser AS userId, c.id AS id, c.title AS title, c.sectionid AS id_section" 
		."\nFROM #__akocomment AS lc, #__content AS c"
		."\nWHERE c.id = lc.contentid AND lc.published='1'"
		."\nORDER BY lc.id DESC"
		."\nLIMIT $count"
		;			
$database->setQuery( $query );
$rows = $database->loadObjectList();

if ( $rows ) {
	foreach ($rows as $row) {
	
		if ( $row->id_section ) {
			$bs 	= $mainframe->getBlogSectionCount();
			$bc 	= $mainframe->getBlogCategoryCount();
			$gbs 	= $mainframe->getGlobalBlogSectionCount();
			$Itemid = $mainframe->getItemid( $row->contentid, 0, 0, $bs, $bc, $gbs );
		} else {
			$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE type = 'content_typed'"
			. "\n AND componentid = $row->contentid"
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
	
		$link = sefRelToAbs( 'index.php?option=com_content&amp;task=view&amp;id='. $row->contentid . $Itemid . "#akocomment" . $row->idcomment );
		?>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
			<?php if ( $show_title_item ) { ?>
              <tr>
                <td>
				<a href="<?php echo $link; ?>">
				<?php echo cut_short_last_comment( stripslashes($row->title), $limittexttitle ); ?></a>
				</td>
              </tr>
			  <?php } ?>
              <tr>
                <td>				
				<?php
				 if ( $show_title_comment && trim($row->titlecomment)!='') {
					 //$row->lastcomment = "<strong>" . stripslashes($row->titlecomment) . "</strong><br />" . $row->lastcomment;
					 echo "<strong>" . stripslashes($row->titlecomment) . "</strong><br />";
				 }
				 echo cut_short_last_comment( stripslashes($row->lastcomment), $limittextcomment );				
				 ?>				 
				</td>
              </tr>
              <tr>
                <td class="small">		
				<?php if ( $show_date_comment ){ 
					echo mosFormatDate( $row->lastpost, $thedateformat );
				 } 
				 ?>
				<a href="<?php echo $link; ?>">
				<?php echo $label4more ; ?></a>
				</td>
              </tr>
			  <?php if ( $show_author_comment ){ ?>
				  <tr>
					<td class="small">
					<?php 
					$author = $row->authorcomment;
					if( $link_author_cb ) {
						// Check if CB component exist
						$pathFileCB = "components/com_comprofiler/comprofiler.php";		
						if ( file_exists( $pathFileCB ) ) {
							$akoCheckCBcomponent = 1;	
						} else $akoCheckCBcomponent = 0;	
						
						// Link to CB profile
						if( $akoCheckCBcomponent && $row->userId ){
							$author = "<a href=\""  
							. sefRelToAbs( 'index.php?option=com_comprofiler&amp;task=userProfile&amp;user=' . $row->userId . AkoCBAuthorItemidLastComment() )
							. "\">"
							. $author
							. "</a>";
						}	
					}	
					echo $label4author . " " . $author ; 
					?>
					</td>
				  </tr>
			  <?php } ?>
            </table>
            <br />
		<?php
	}	
} else echo $label4nocomment;

function cut_short_last_comment ( $string, $max_length = 255 ) {
	if (strlen($string) > $max_length) {
		$string = substr($string, 0, $max_length) . '...';
	}
	return $string;
} 

function AkoCBAuthorItemidLastComment() {
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