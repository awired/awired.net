<?php
/**
* mosauthorxtd.php 2.0
* Mambot creating an individual "author-line"
* FOR Joomla! 1.0.x
* author Thomas Kahl (aka ZorkHH) email: tk@thomas-kahl.net
* web: www.joomlaexpert.com
* USAGE: Install with Joomla/Mambo-Admin.
* 		Set the parameters in the mambot administration
*		DON'T FORGET TO PUBLISH THE MAMBOT!
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$_MAMBOTS->registerFunction( 'onPrepareContent', 'botauthorxtd' );

function botauthorxtd( $published, &$row, &$params, $page=0 ) {
	global $database, $mainframe, $task, $mosConfig_live_site, $mosConfig_absolute_path;
	if (!$published || !$row->created_by) return true;

	// Get Settings from Parameter-System
	$query = "SELECT id FROM #__mambots WHERE element = 'mosauthorxtd' AND folder = 'content'";
	$database->setQuery( $query );
	$id = $database->loadResult();
	$mambot = new mosMambot( $database );
	$mambot->load( $id );
	$params =& new mosParameters( $mambot->params );
	$MOSCSS=$params->get('textcss','');
	$poscnt=4;
	for ($i = 1; $i <= $poscnt; $i++) {
		$MOSCONTENTSTRING[$i]=$params->get('textcontent'.$i,'');
		$MOSCONTENTWHERE[$i]=$params->get('wheretoshow'.$i,'0');
	}
	$MOSMAILTO=$params->get('mailto','1');
	$MOSDISPLAY=$params->get('wheretoshow','0');
	$MOSPOSITION=99;
	// Check, if mambot is in content
	if (strpos(strtolower($row->text),"{mosauthorxtd") > 0) {
		// if found, extract the complete tag
		$botname=substr($row->text,strpos(strtolower($row->text),"{mosauthorxtd"));
		$botname=substr($botname,0,strpos(strtolower($botname),"}")+1);
		// If parameters are in the tag
		if (strpos($botname,"/")){
			// Extract parameters from tag
			$aparameters=explode(" /",substr($botname,15,strlen($botname)-16));
			// Replace the "global" parameters with the individual
			foreach ($aparameters as $mosparam) {
				if (strtolower(substr($mosparam,0,5))=="text:") $MOSCONTENTSTRING[1]=substr($mosparam,strpos($mosparam,":")+1);
				if (strtolower(substr($mosparam,0,5))=="mail:") $MOSMAILTO=substr($mosparam,strpos($mosparam,":")+1);
				if (strtolower(substr($mosparam,0,4))=="pos:") $MOSPOSITION=substr($mosparam,strpos($mosparam,":")+1);
				if (strtolower(substr($mosparam,0,4))=="css:") $MOSCSS=substr($mosparam,strpos($mosparam,":")+1);
			}
		}
		// delete mambot from text
		$row->text=str_replace($botname,"",$row->text);
		if (strpos($botname,"noshow")) {
			return true;
		}
	} else {
		// If setting is "only when mambot exists"
		if ($MOSDISPLAY=="3") {
			$row->author="";
			$row->created_by_alias="";
			return true;
		}
	}
	// If setting is "only in blog"
	if ($task=="view" && $MOSDISPLAY=="1") {
		$row->author="";
		$row->created_by_alias="";
		return true;
	}
	// If setting is "only in full view"
	if ($task<>"view" && $MOSDISPLAY=="2") {
		$row->author="";
		$row->created_by_alias="";
		return true;
	}
	// If Mailto-Link is selected
/*	if ($MOSMAILTO==1) {
		$database->setQuery( "SELECT email FROM #__users where id=".$row->created_by);
		$database->query();
		$mailadress = $database->loadResult();
	}
*/
	//if (in_array("#categorylink#",$MOSCONTENTSTRING))

	if ($row->created_by_alias) {
		$authorstring=$row->created_by_alias;
		$lastauthorstring=$row->created_by_alias;
	} else {
		$authorstring=$row->author;
		$lastauthorstring=$row->author;
		$query="SELECT a.name, a.email, a.usertype, a.registerDate, a.lastvisitDate, b.name as cname, b.con_position, b.image, b.misc FROM #__users as a left outer join #__contact_details as b on b.user_id=a.id WHERE a.id=".$row->created_by;
		$database->setQuery( $query );
		$extauthorinfo=$database->loadObjectList();
	}

	if ($row->modified_by) {
		$query="SELECT a.name FROM #__users as a WHERE a.id=".$row->modified_by;
		$database->setQuery( $query );
		$modifiedname=$database->loadResult();
		$lastauthorstring=$modifiedname;
	}

	if (!isset($row->hits)) {
		$query = "SELECT hits FROM #__content WHERE id =".$row->id;
		$database->setQuery( $query );
		$hits = $database->loadResult();
	} else {
		if (!$row->hits) {
			$query = "SELECT hits FROM #__content WHERE id =".$row->id;
			$database->setQuery( $query );
			$hits = $database->loadResult();
		} else {
			$hits=$row->hits;
		}
	}
	for ($i = 1; $i <= $poscnt; $i++) {
		if ($MOSCONTENTWHERE[$i]=="0" || ($MOSCONTENTWHERE[$i]=="2" && $task=="view") || ($MOSCONTENTWHERE[$i]=="3" && $task!="view") || ($MOSCONTENTWHERE[$i]=="4" && strpos(strtolower($row->text),"{mosauthorxtd")===false)) {
			$MOSCONTENTSTRING[$i]="";
		} else {
			// Replace placeholders
			if ($MOSMAILTO==1 && $i<3 ) {
				$MOSCONTENTSTRING[$i]=str_replace('#author#','<a href="mailto:'.$extauthorinfo[0]->email.'">'.$authorstring.'</a>',$MOSCONTENTSTRING[$i]);
			} else {
				$MOSCONTENTSTRING[$i]=str_replace("#author#",$authorstring,$MOSCONTENTSTRING[$i]);
			}
			$MOSCONTENTSTRING[$i]=str_replace("#created#",mosFormatDate($row->created),$MOSCONTENTSTRING[$i]);
			$MOSCONTENTSTRING[$i]=str_replace("#modified#",mosFormatDate($row->modified),$MOSCONTENTSTRING[$i]);
			$MOSCONTENTSTRING[$i]=str_replace("#hits#",$hits,$MOSCONTENTSTRING[$i]);
			$MOSCONTENTSTRING[$i]=str_replace("#lastauthor#",$lastauthorstring,$MOSCONTENTSTRING[$i]);
			$MOSCONTENTSTRING[$i]=str_replace("#modifiedname#",$modifiedname,$MOSCONTENTSTRING[$i]);
			if ($row->created_by_alias) {
				$MOSCONTENTSTRING[$i]=str_replace("#authorid#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorname#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorcname#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authoremail#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorregdate#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorlastdate#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorposition#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorinfo#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorimage#","",$MOSCONTENTSTRING[$i]);
			} else {
				$MOSCONTENTSTRING[$i]=str_replace("#authorid#",$row->created_by,$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorname#",$extauthorinfo[0]->name,$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorcname#",$extauthorinfo[0]->cname,$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authoremail#",$extauthorinfo[0]->email,$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorregdate#",mosFormatDate($extauthorinfo[0]->registerDate),$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorlastdate#",mosFormatDate($extauthorinfo[0]->lastvisitDate),$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorposition#",$extauthorinfo[0]->con_position,$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#authorinfo#",$extauthorinfo[0]->misc,$MOSCONTENTSTRING[$i]);
				if ($extauthorinfo[0]->image && $mosConfig_absolute_path.'/images/stories/'.$extauthorinfo[0]->image){
					$MOSCONTENTSTRING[$i]=str_replace("#authorimage#",'<img src="'.$mosConfig_live_site.'/images/stories/'.$extauthorinfo[0]->image.'" border="0">',$MOSCONTENTSTRING[$i]);
				} else {
					$MOSCONTENTSTRING[$i]=str_replace("#authorimage#","",$MOSCONTENTSTRING[$i]);
				}
			}
			if ($i<3 ) {
				$MOSCONTENTSTRING[$i]=str_replace("#sectionlink#","<a href=\"".sefRelToAbs($mosConfig_live_site."/index.php?option=com_content&task=blogsection&id=".$row->sectionid)."\">".$row->section."</a>",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#categorylink#","<a href=\"".sefRelToAbs($mosConfig_live_site."/index.php?option=com_content&task=blogcategory&id=".$row->catid)."\">".$row->category."</a>",$MOSCONTENTSTRING[$i]);
			} else {
				$MOSCONTENTSTRING[$i]=str_replace("#sectionlink#","",$MOSCONTENTSTRING[$i]);
				$MOSCONTENTSTRING[$i]=str_replace("#categorylink#","",$MOSCONTENTSTRING[$i]);
			}
			$MOSCONTENTSTRING[$i]=str_replace("#section#",$row->section,$MOSCONTENTSTRING[$i]);
			$MOSCONTENTSTRING[$i]=str_replace("#category#",$row->category,$MOSCONTENTSTRING[$i]);
			$MOSCONTENTSTRING[$i]=str_replace("#usertype#",$row->usertype,$MOSCONTENTSTRING[$i]);
			// Add CSS-Class, only when not in title or in orig. position
			if ($MOSCSS && $i<3 && $MOSCONTENTSTRING[$i]) $MOSCONTENTSTRING[$i]='<span class="'.$MOSCSS.'">'.$MOSCONTENTSTRING[$i].'</span>';
		}
	}

	if ($MOSPOSITION<>99) { // mambot in content
		// Choose Position
		switch ($MOSPOSITION) {
			case 2:
				$row->text=$row->text."<br />".$MOSCONTENTSTRING[1];
				break;
			case 3:
				$row->title.=" ".$MOSCONTENTSTRING[1];
				break;
			case 4:
				// Replace author OR alias
				if ($row->created_by_alias) {
					$row->created_by_alias=$MOSCONTENTSTRING[1];
				} else {
					$row->author=$MOSCONTENTSTRING[1];
				}
				break;
			default:
				$row->text=$MOSCONTENTSTRING[1]."<br />".$row->text;
				break;
		}
	} else {
		if ($MOSCONTENTSTRING[1]) $row->text=$MOSCONTENTSTRING[1]."<br />".$row->text;
		if ($MOSCONTENTSTRING[2]) $row->text=$row->text."<br />".$MOSCONTENTSTRING[2];
		if ($MOSCONTENTSTRING[3]) $row->title.=" ".$MOSCONTENTSTRING[3];
		if ($MOSCONTENTSTRING[4]) {
			// Replace author OR alias
			if ($row->created_by_alias) {
				$row->created_by_alias=$MOSCONTENTSTRING[4];
			} else {
				$row->author=$MOSCONTENTSTRING[4];
			}
		}
	}
	return true;
}
?>
