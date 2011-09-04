<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

function com_install() {
  global $database, $mosConfig_absolute_path;
  
  require( $mosConfig_absolute_path.'/administrator/components/com_akocomment/version.php' );

  # Show installation result to user
  ?>
  <center>
  <table width="100%" border="0">
    <tr>
      <td><img src="components/com_akocomment/images/logo.png"></td>
      <td>
        <strong>AkoComment - A Mambo User Comments Component</strong><br/>
        <font class="small">&copy; Copyright 2004 by Arthur Konze<br/>
        This component is copyrighted software. Distribution is prohibited.</font><br/>
      </td>
    </tr>
    <tr>
      <td background="F0F0F0" colspan="2"><br />
      <code>Installation Process :<br />
        <?php

          # Set up new icons for admin menu
          echo "Start correcting icons in administration backend.<br />";
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/edit.png' WHERE admin_menu_link='option=com_akocomment&task=comments'");
          $iconresult[0] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/config.png' WHERE admin_menu_link='option=com_akocomment&task=settings'");
          $iconresult[1] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/user.png' WHERE admin_menu_link='option=com_akocomment&task=language'");
          $iconresult[2] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/credits.png' WHERE admin_menu_link='option=com_akocomment&task=about'");
          $iconresult[3] = $database->query();
          foreach ($iconresult as $i=>$icresult) {
				if ($icresult) {
				  echo "<font color='green'>FINISHED:</font> Image of menu entry $i has been corrected.<br />";
				} else {
				  echo "<font color='red'>ERROR:</font> Image of menu entry $i could not be corrected.<br />";
				}
          }		  
		
		// Upgrade last Akocomment Plus Edition 1.1.7
		$AKOupgrades[0]['test'] = "SELECT `web` FROM #__akocomment";
		$AKOupgrades[0]['updates'][0] = "ALTER TABLE #__akocomment ADD `web` VARCHAR( 255 ) DEFAULT '' NOT NULL AFTER `name`";
		$AKOupgrades[0]['message'] = "Akocomment plus 1.1.7 to Akocomment Tweaked Special Edition 1.2";
		
		// Upgrade last Akocomment Plus Edition 1.1.7
		$AKOupgrades[1]['test'] = "SELECT `email` FROM #__akocomment";
		$AKOupgrades[1]['updates'][0] = "ALTER TABLE #__akocomment ADD `email` VARCHAR( 255 ) DEFAULT '' NOT NULL AFTER `web`";
		$AKOupgrades[1]['message'] = "Akocomment plus 1.1.7 to Akocomment Tweaked Special Edition 1.2";
		  
		// Upgrade last Akocomment Tweaked Special Edition 1.2 OR Akocomment Tweaked 1.2
		$AKOupgrades[2]['test'] = "SELECT `iduser` FROM #__akocomment";
		$AKOupgrades[2]['updates'][0] = "ALTER TABLE #__akocomment ADD `iduser` INT( 11 ) DEFAULT '0' NOT NULL AFTER `ordering`";
		$AKOupgrades[2]['message'] = "Tweaked 1.2 or Tweaked Special Edition 1.2 to Akocomment Tweaked Special Edition 1.3";
		
		// Upgrade last Akocomment Tweaked Special Edition 1.3
		$AKOupgrades[3]['test'] = "SELECT `subscribe` FROM #__akocomment";
		$AKOupgrades[3]['updates'][0] = "ALTER TABLE #__akocomment ADD `subscribe` TINYINT( 1 ) DEFAULT '0' NOT NULL AFTER `iduser`";
		$AKOupgrades[3]['message'] = "Tweaked Special Edition 1.3 to Akocomment Tweaked Special Edition 1.4";
  
		//Apply Upgrades
		foreach ($AKOupgrades AS $AKOupgrade) {
			$database->setQuery($AKOupgrade['test']);
			//if it fails test then apply upgrade
			if (!$database->query()) {
				foreach($AKOupgrade['updates'] as $AKOScript) {
					$database->setQuery($AKOScript);
					if(!$database->query()) {
						//Upgrade failed
						echo("<font color='red'>".$AKOupgrade['message']." failed! SQL error:" . $database->stderr(true)."</font><br />");
						// return;
					}
				}
				//Upgrade was successful
				echo "<font color='green'>".$AKOupgrade['message']." Upgrade Applied Successfully!</font><br />";
			} 
		}
		//detects if image library is available
		//function detect(){
			$GDfuncList = get_extension_funcs('gd');
			ob_start();
			@phpinfo(INFO_MODULES);
			$output=ob_get_contents();
			ob_end_clean();
			$matches[1]='';
			if(preg_match("/GD Version[ \t]*(<[^>]+>[ \t]*)+([^<>]+)/s",$output,$matches)){
				$gdversion = $matches[2];
			}
			if( $GDfuncList ){
				if( in_array('imagegd2',$GDfuncList) ){
					echo "<font color='green'>GD2 " . $gdversion . " installed</font><br />";
				}
				else{
				    echo "<font color='green'>GD1 " . $gdversion . " installed</font><br />";
				}
			}
			else echo "<font color='red'>Not library GD installed ! Library GD is required for displaying security code image.</font><br />";
        ?>
        <font color="green"><b>Installation finished.</b></font><br /><br />
        Version AkoComment Tweaked Special Edition : <b><?php echo _AKOCOMMENT_TW_SE_VERSION ; ?></b><br /> 
        </code>
      </td>
    </tr>
  </table>
  </center>
  <?php
}
?>