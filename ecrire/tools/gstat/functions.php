<?php
/*  GStat 0.4.5 for DotClear
 *  Copyright (C) 2005 Lisaraël (v0.3 and followed), 
 *  And Alexandre Glouzouic and contributors (v0.1 to 0.2.1).
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

class GStat 
{
	#Retourne le nombre total de visiteurs
	function BBCtotalcount()
	{
		global $access;
		require dirname(__FILE__).'/../bbclone/var/access.php';
		if (!is_numeric($access['stat']['totalcount']))
		 $access['stat']['totalcount'] = 0;
		return $access['stat']['totalcount'];
	}
	
	#Retourne le nombre total de pages visitées
	function BBCtotalvisits()
	{
		global $access;
		require dirname(__FILE__).'/../bbclone/var/access.php';
		if (!is_numeric($access['stat']['totalvisits']))
		 $access['stat']['totalvisits'] = 0;
		return $access['stat']['totalvisits'];
	}
	
	#Retourne le nombre total de pages visitées aujourd'hui
	function BBCdayvisits()
	{
		global $access;
		require dirname(__FILE__).'/../bbclone/var/access.php';
		if (!is_numeric($access['time']['wday'][date("w")]))
		 $access['time']['wday'][date("w")] = 0;
		return $access['time']['wday'][date("w")]+1;
	}
	
	// nouveautés de la version 0.3
	
	#Retourne le nombre total de visiteurs, robots non compris
	function BBCtotalhuman()
	{
		global $access;
		require dirname(__FILE__).'/../bbclone/var/access.php';
		if (!is_numeric($access['stat']['totalcount']))
		 $access['stat']['totalcount'] = 0;
		$robot = GStat::BBCtotalrobots();
		return $access['stat']['totalcount'] - $robot;
	}
		
	#Retourne le nombre total de robots
	function BBCtotalrobots()
	{
		global $access;
		require dirname(__FILE__).'/../bbclone/var/access.php';
		if( !isset($access['stat']['robot']) ) { return 0; }
		$table = $access['stat']['robot'];
		return array_sum($table);		
	}
	
	#Retourne, selon paramètre, une liste ou un tableau des n premiers navigateurs
	#Paramètres: $topX: nombre de navigateurs à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list"
	function BBCtopbrowsers($returnType='list', $topX=10) {
		global $access, $browser, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/lib/browser.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($access['stat']['browser']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$browserArray = $access['stat']['browser'];
		$browserListStock = array();
		$browserTableStock = array();
		arsort($browserArray);
		foreach($browserArray as $browserName=>$value) {
			foreach($browser as $browserRef=>$refVal) {		
				if($browserName == $browserRef) {
					$brName = $browser["$browserRef"]["title"];
					if($browserName == "other") {$brName = $_["misc_other"];}
					$brIcon = dc_app_url. '/ecrire/tools/bbclone/images/browser_'.$browser["$browserRef"]["icon"].'.png';
					$robots = GStat::BBCtotalrobots();
					$brPourcent = round(100 * ($value / ($access['stat']['totalcount'] - $robots)), 2);
					$browserListStock[] = '<li><img alt="'.$brName.'" src="'.$brIcon.'" class="statIcon" /> '.$brName.' ('.$value.')</li>';
					$browserTableStock[] = '<tr><td><img alt="'.$brName.'" src="'.$brIcon.'" class="statIcon" /></td><td>'.$brName.'</td><td>'.$value.'</td><td>'.$brPourcent.'%</td></tr>';
				}		
			}
		}
		for($i=0; $i<(count($browserArray) - $topX);$i++) {
			array_pop($browserListStock);
			array_pop($browserTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n",$browserTableStock)."\n</table>";
		}
		else {
			return "<ol class=\"statList\">\n".implode("\n",$browserListStock)."\n</ol>";
		}
	}
	
	#Retourne, selon paramètre, une liste ou un tableau des n premiers systemes d'exploitation
	#Paramètres: $topX: nombre de systèmes d'exploitation à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list"
	function BBCtopos($returnType='list', $topX=10) {
		global $access, $os, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/lib/os.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($access['stat']['os']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$osArray = $access['stat']['os'];
		$osListStock = array();
		$osTableStock = array();
		arsort($osArray);
		foreach($osArray as $osName=>$value) {
			foreach($os as $osRef=>$refVal) {		
				if($osName == $osRef) {
					$oName = $os["$osRef"]["title"];
					if($osName == "other") {$oName = $_["misc_other"];}
					$oIcon = dc_app_url. '/ecrire/tools/bbclone/images/os_'.$os["$osRef"]["icon"].'.png';
					$robots = GStat::BBCtotalrobots();
					$oPourcent = round(100 * ($value / ($access['stat']['totalcount'] - $robots)), 2);
					$osListStock[] = '<li><img alt="'.$oName.'" src="'.$oIcon.'" class="statIcon" /> '.$oName.' ('.$value.')</li>';
					$osTableStock[] = '<tr><td><img alt="'.$oName.'" src="'.$oIcon.'" class="statIcon" /></td><td>'.$oName.'</td><td>'.$value.'</td><td>'.$oPourcent.'%</td></tr>';
				}		
			}
		}
		for($i=0; $i<(count($osArray) - $topX);$i++) {
			array_pop($osListStock);
			array_pop($osTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n",$osTableStock)."\n</table>";
		}
		else {
			return "<ol class=\"statList\">\n".implode("\n",$osListStock)."\n</ol>";
		}
	}
	
	#Retourne, selon paramètre, une liste ou un tableau des n premiers robots
	#Paramètres: $topX: nombre de robots à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list"
	function BBCtoprobots($returnType='list', $topX=10) {
		global $access, $robot, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/lib/robot.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($access['stat']['robot']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$robotArray = $access['stat']['robot'];
		$robotListStock = array();
		$robotTableStock = array();
		arsort($robotArray);
		foreach($robotArray as $robotName=>$value) {
			foreach($robot as $robotRef=>$refVal) {		
				if($robotName == $robotRef) {
					$robName = $robot["$robotRef"]["title"];
					if($robotName == "other") {$robName = $_["misc_other"];}
					$robIcon = dc_app_url. '/ecrire/tools/bbclone/images/robot_'.$robot["$robotRef"]["icon"].'.png';
					$robPourcent = round(100 * ($value / (array_sum($access['stat']['robot']))), 2);
					$robotListStock[] = '<li><img alt="'.$robName.'" src="'.$robIcon.'" class="statIcon" /> '.$robName.' ('.$value.')</li>';
					$robotTableStock[] = '<tr><td><img alt="'.$robName.'" src="'.$robIcon.'" class="statIcon" /></td><td>'.$robName.'</td><td>'.$value.'</td><td>'.$robPourcent.'%</td></tr>';
				}		
			}
		}
		for($i=0; $i<(count($robotArray) - $topX); $i++) {
			array_pop($robotListStock);
			array_pop($robotTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n", $robotTableStock)."\n</table>";
		}
		else {
			return "<ol class=\"statList\">\n".implode("\n", $robotListStock)."\n</ol>";
		}
	}
	
	#Retourne, selon paramètre, une liste ou un tableau des n premiers pays d'origine
	#Paramètres: $topX: nombre de pays à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list"
	function BBCtoplands($returnType='list', $topX=10) {
		global $access, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($access['stat']['ext']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$ext = $_;
		$extArray = $access['stat']['ext'];
		$extListStock = array();
		$extTableStock = array();
		arsort($extArray);
		foreach($extArray as $extName=>$value) {
			foreach($ext as $extRef=>$refVal) {		
				if($extName == $extRef) {
					$exName = $ext["$extRef"];
					$exIcon = dc_app_url. '/ecrire/tools/bbclone/images/ext_'.$extRef.'.png';
					$exPourcent = round(100 * ($value / $access['stat']['totalcount']), 2);
					$extListStock[] = '<li><img alt="'.$exName.'" src="'.$exIcon.'" class="statIcon" /> '.$exName.' ('.$value.')</li>';
					$extTableStock[] = '<tr><td><img alt="'.$exName.'" src="'.$exIcon.'" class="statIcon" /></td><td>'.$exName.'</td><td>'.$value.'</td><td>'.$exPourcent.'%</td></tr>';
				}		
			}
		}
		for($i=0; $i<(count($extArray) - $topX); $i++) {
			array_pop($extListStock);
			array_pop($extTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n", $extTableStock)."\n</table>";
		}
		else {
			return "<ol class=\"statList\">\n".implode("\n", $extListStock)."\n</ol>";
		}
	}
	
	#Retourne, selon paramètre, une liste ou un tableau des n premières pages
	#Paramètres: $topX: nombre de pages à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list"
	# utilise la fonction de tri pageCount(), hors classe, déclarée en bas du fichier.
	function BBCtoppages($returnType='list', $topX=10) {
		global $access;
		require dirname(__FILE__).'/../bbclone/var/access.php';
		if( !isset($access['page']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$pageArray = $access['page'];
		$pageListStock = array();
		$pageTableStock = array();
		uasort($pageArray, "pageCount");
		foreach($pageArray as $pageName=>$value) {
			$pageLink = $pageArray["$pageName"]["uri"];
			$pageValue = $pageArray["$pageName"]["count"];
			$pagePourcent = round(100 * ($pageArray["$pageName"]["count"] / $access['stat']['totalvisits']), 2);
			if($pageName == "dc_index") {	$pageName = dc_blog_name;	}
			$pageListStock[] = '<li><a href="'.$pageLink.'">'.$pageName.'</a> ('.$pageValue.')</li>';
			$pageTableStock[] = '<tr><td><a href="'.$pageLink.'">'.$pageName.'</a></td><td>'.$pageValue.'</td><td>'.$pagePourcent.'%</td></tr>';
		}
		for($i=0; $i<(count($pageArray) - $topX); $i++) {
			array_pop($pageListStock);
			array_pop($pageTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n", $pageTableStock)."\n</table>";
		}
		else {
			return "<ol class=\"statList\">\n".implode("\n", $pageListStock)."\n</ol>";
		}
	}
	
	#Retourne un tableau des pages visitées dans la semaine
	function BBCweekvisits() {
		global $access, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($access['time']['wday']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$weekArray = $access['time']['wday'];
		$weekLang = $_;
		$weekTable = '<table class="statTable" border="1">'.
								 '<tr>'.
								 '<th>'.$weekLang['tstat_Su'].'</th>'.
								 '<th>'.$weekLang['tstat_Mo'].'</th>'.
								 '<th>'.$weekLang['tstat_Tu'].'</th>'.
								 '<th>'.$weekLang['tstat_We'].'</th>'.
								 '<th>'.$weekLang['tstat_Th'].'</th>'.
								 '<th>'.$weekLang['tstat_Fr'].'</th>'.
								 '<th>'.$weekLang['tstat_Sa'].'</th>'.
								 '</tr>'.
								 '<tr>'.
								 '<td>'.$access['time']['wday'][0].'</td>'.
								 '<td>'.$access['time']['wday'][1].'</td>'.
								 '<td>'.$access['time']['wday'][2].'</td>'.
								 '<td>'.$access['time']['wday'][3].'</td>'.
								 '<td>'.$access['time']['wday'][4].'</td>'.
								 '<td>'.$access['time']['wday'][5].'</td>'.
								 '<td>'.$access['time']['wday'][6].'</td>'.
								 '</tr>'.
								 '</table>';	
		return $weekTable;
	}
	
	#Retourne un tableau des pages visitées dans l'année
	function BBCyearvisits() {
		global $access, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($access['time']['month']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$yearArray = $access['time']['month'];
		$yearLang = $_;
		$yearTable = '<table class="statTable" border="1">'.
								 '<tr>'.
								 '<th>'.$yearLang['tstat_Jan'].'</th>'.
								 '<th>'.$yearLang['tstat_Feb'].'</th>'.
								 '<th>'.$yearLang['tstat_Mar'].'</th>'.
								 '<th>'.$yearLang['tstat_Apr'].'</th>'.
								 '<th>'.$yearLang['tstat_May'].'</th>'.
								 '<th>'.$yearLang['tstat_Jun'].'</th>'.
								 '<th>'.$yearLang['tstat_Jul'].'</th>'.
								 '<th>'.$yearLang['tstat_Aug'].'</th>'.
								 '<th>'.$yearLang['tstat_Sep'].'</th>'.
								 '<th>'.$yearLang['tstat_Oct'].'</th>'.
								 '<th>'.$yearLang['tstat_Nov'].'</th>'.
								 '<th>'.$yearLang['tstat_Dec'].'</th>'.
								 '</tr>'.
								 '<tr>'.
								 '<td>'.$access['time']['month'][0].'</td>'.
								 '<td>'.$access['time']['month'][1].'</td>'.
								 '<td>'.$access['time']['month'][2].'</td>'.
								 '<td>'.$access['time']['month'][3].'</td>'.
								 '<td>'.$access['time']['month'][4].'</td>'.
								 '<td>'.$access['time']['month'][5].'</td>'.
								 '<td>'.$access['time']['month'][6].'</td>'.
								 '<td>'.$access['time']['month'][7].'</td>'.
								 '<td>'.$access['time']['month'][8].'</td>'.
								 '<td>'.$access['time']['month'][9].'</td>'.
								 '<td>'.$access['time']['month'][10].'</td>'.
								 '<td>'.$access['time']['month'][11].'</td>'.
								 '</tr>'.
								 '</table>';	
		return $yearTable;
	}

// nouveautés de la version 0.4

	#Retourne, selon paramètre, une liste ou un tableau des détails des n derniers visiteurs
	#Paramètres: $topX: nombre de visiteurs à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list" (non-ordered list, pour cette fonction)
	#						 $seeRobots: décide ou non d'inclure les robots dans les résultats, par défaut à "yes", valeurs possibles: "yes", "only" (robots uniquement) et "no"
	function BBClastvisitors($returnType='list', $topX=10, $seeRobots="yes") {
		global $access, $_, $BBC_LANGUAGE, $robot, $browser, $os, $last;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/last.php';
		require dirname(__FILE__).'/../bbclone/lib/browser.php';
		require dirname(__FILE__).'/../bbclone/lib/os.php';
		require dirname(__FILE__).'/../bbclone/lib/robot.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		if( !isset($last['traffic'][0]["time"]) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$extArray = $_;
		$lastVisitListStock = array();
		$lastVisitTableStock = array();
		$incrementor = 0;
		$trafficArray = array_reverse($last['traffic']);
		foreach($trafficArray as $trafficStat) {
			if( is_array($trafficStat) ){
				$incrementor++;
				$visitorMonth = date("M", $trafficStat["time"]);
				$visitorTranslatedMonth = $extArray["tstat_$visitorMonth"];
				$visitorDay = date("j", $trafficStat["time"]);
				$visitorDate = "".$visitorDay." ".$visitorTranslatedMonth.", ".date("H:i", $trafficStat["time"])."";
				$visitorLand = $trafficStat["ext"];
				$visitorLandIcon = dc_app_url. '/ecrire/tools/bbclone/images/ext_'.$visitorLand.'.png';
				$visitorLandName = $extArray["$visitorLand"];
				if( isset($trafficStat["browser"]) && $seeRobots != "only" ) { // nous avons affaire à un visiteur humain et ne sommes pas en cas de "see robots only"
					$visitorBrowser = $trafficStat["browser"];
					$visitorBrowserName = $browser["$visitorBrowser"]["title"];
					$visitorBrowserAgent = $trafficStat["browser_note"];
					$visitorBrowserIcon = dc_app_url. '/ecrire/tools/bbclone/images/browser_'.$browser["$visitorBrowser"]["icon"].'.png';
					$visitorOs = $trafficStat["os"];
					$visitorOsName = $os["$visitorOs"]["title"];
					$visitorOsIcon = dc_app_url. '/ecrire/tools/bbclone/images/os_'.$os["$visitorOs"]["icon"].'.png';
					$lastVisitListStock[] = '<li><strong>'.$visitorDate.'</strong> <img class="statIcon" src="'.$visitorLandIcon.'" alt="'.$visitorLandName.'" title="'.$visitorLandName.'" /> <img class="statIcon" src="'.$visitorOsIcon.'" alt="'.$visitorOsName.'" title="'.$visitorOsName.'" /> <img class="statIcon" src="'.$visitorBrowserIcon.'" alt="'.$visitorBrowserName.' '.$visitorBrowserAgent.'" title="'.$visitorBrowserName.' '.$visitorBrowserAgent.'" /></li>';
					$lastVisitTableStock[] = '<tr><td>'.$visitorDate.'</td><td><img class="statIcon" src="'.$visitorLandIcon.'" alt="'.$visitorLandName.'" title="'.$visitorLandName.'" /> '.$visitorLandName.'</td><td><img class="statIcon" src="'.$visitorOsIcon.'" alt="'.$visitorOsName.'" title="'.$visitorOsName.'" /> '.$visitorOsName.'</td><td><img class="statIcon" src="'.$visitorBrowserIcon.'" alt="'.$visitorBrowserName.' '.$visitorBrowserAgent.'" title="'.$visitorBrowserName.' '.$visitorBrowserAgent.'" /> '.$visitorBrowserName.' '.$visitorBrowserAgent.'</td></tr>';
				}
				elseif( isset($trafficStat["robot"]) && $seeRobots == "yes" ) { // nous avons affaire à un robot et nous voulons les inclure dans notre affichage
					$visitorRobot = $trafficStat["robot"];
					$visitorRobotName = $robot["$visitorRobot"]["title"];
					$visitorRobotIcon = dc_app_url. '/ecrire/tools/bbclone/images/robot_'.$robot["$visitorRobot"]["icon"].'.png';
					$lastVisitListStock[] = '<li><strong>'.$visitorDate.'</strong> <img class="statIcon" src="'.$visitorLandIcon.'" alt="'.$visitorLandName.'" title="'.$visitorLandName.'" /> <img class="statIcon" src="'.$visitorRobotIcon.'" alt="'.$visitorRobotName.'" title="'.$visitorRobotName.'" /></li>';
					$lastVisitTableStock[] = '<tr><td>'.$visitorDate.'</td><td><img class="statIcon" src="'.$visitorLandIcon.'" alt="'.$visitorLandName.'" title="'.$visitorLandName.'" /> '.$visitorLandName.'</td><td colspan="2"><img class="statIcon" src="'.$visitorRobotIcon.'" alt="'.$visitorRobotName.'" title="'.$visitorRobotName.'" /> '.$visitorRobotName.'</td></tr>';
				}
			}
		}
		for($i=0; $i<($incrementor - $topX); $i++) {
			array_pop($lastVisitListStock);
			array_pop($lastVisitTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n", $lastVisitTableStock)."\n</table>";
		}
		else {
			return "<ul class=\"statList\">\n".implode("\n", $lastVisitListStock)."\n</ul>";
		}
	}

// Nouveautés de la version 0.4.5

	#Retourne, selon paramètre, une liste ou un tableau des n premières pages
	#Paramètres: $topX: nombre de pages à afficher, par défaut, 10
	#						 $returnType: décide du format de sortie, table ou list, par défaut "list"
	function BBCtopreferers($returnType='list', $topX=10) {
		global $access, $_, $BBC_LANGUAGE;
		require dirname(__FILE__).'/../bbclone/conf/config.php';
		require dirname(__FILE__).'/../bbclone/var/access.php';
		require dirname(__FILE__).'/../bbclone/language/'.$BBC_LANGUAGE.'.php';
		$extArray = $_;
		if( !isset($access['referer']) ) { return "<p class=\"statNoData\">".$_['dstat_no_data']."</p>"; }
		$refererArray = $access['referer'];
		$refererListStock = array();
		$refererTableStock = array();
		arsort($refererArray);
		foreach($refererArray as $refererName=>$value) {
			$refererLink = "http://".$refererName;
			$refererValue = $refererArray["$refererName"];
			$refererPourcent = round(100 * ($refererArray["$refererName"] / $access['stat']['totalcount']), 2);
			if($refererName == "not_specified") {	
				$refererListStock[] = '<li>'.$extArray["misc_unknown"].' ('.$refererValue.')</li>';
				$refererTableStock[] = '<tr><td>'.$extArray["misc_unknown"].'</td><td>'.$refererValue.'</td><td>'.$refererPourcent.'%</td></tr>';
			} else {
				$refererListStock[] = '<li><a href="'.$refererLink.'">'.$refererName.'</a> ('.$refererValue.')</li>';
				$refererTableStock[] = '<tr><td><a href="'.$refererLink.'">'.$refererName.'</a></td><td>'.$refererValue.'</td><td>'.$refererPourcent.'%</td></tr>';
			}
		}
		for($i=0; $i<(count($refererArray) - $topX); $i++) {
			array_pop($refererListStock);
			array_pop($refererTableStock);
		}
		if($returnType == 'table') {
			return "<table class=\"statTable\" border=\"1\">\n".implode("\n", $refererTableStock)."\n</table>";
		}
		else {
			return "<ol class=\"statList\">\n".implode("\n", $refererListStock)."\n</ol>";
		}
	}

}

// Fonction de classement pour uasort - ajoutée en correction d'un bug - v0.4.1
function pageCount($page_a, $page_b) {
	if ($page_a['count'] == $page_b['count']) return 0;
	return ($page_a['count'] > $page_b['count']) ? -1 : 1;
}


 ?>
