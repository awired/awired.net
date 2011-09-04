<?php
/*
 * @version $Id: install.sef.php,v 1.1 2005/01/21 01:17:51 marlboroman_2k Exp $
 *
 * 404 SEF for MOS 4.5.1 or Joomla 1.0x
 *
 * Author:	W.H.Welch <marlboroman_2k@yahoo.com>
 * Copyright:	2004 W.H.Welch
 * License:	GNU General Public License
 */

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

function com_install() {

	ob_start();

	echo '<div class="quote">';
	echo '<h1 align="center">404SEFx succesfully installed</h1>';
	echo '<h3 align="center">You must first edit the configuration, enable it and save before it will become active </h3>';
	$readdocs = '<p class="message">Please scroll down and read the Project Documentation.<br/>There is still extra configuration that you need to complete for ';
	if (!(strpos($_SERVER['SERVER_SOFTWARE'],"Microsoft-IIS") === false)) {
		echo $readdocs . 'IIS</p>';
	}else{
	  	$htaccess="
DirectoryIndex index.php
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*) index.php
	";
		if (substr(PHP_OS, 0, 3) == 'WIN') {
			echo '<p class="error">Found apache on windows, .htaccess is an illegal filename for this system.<br/>You must complete the rest of the configuration manually</p>';
			echo $readdocs."the apache .htaccess file</p>";
		}else{
			echo "<p>Checking for .htaccess in Joomla/Mambo root...";
			if(!file_exists($GLOBALS['mosConfig_absolute_path']."/.htaccess")){
				echo "not found.</p>";
				$file=fopen($GLOBALS['mosConfig_absolute_path']."/.htaccess", "w+");
				if(!$file){
					echo '<p class="error">Unable to create .htaccess file in your Joomla/Mambo root.  Please create this file yourself and add the following lines<br/><pre>'.$htaccess.'</pre>';
				}else{
					fwrite($file, $htaccess);
					fclose($file);
					echo "Successfully created .htaccess file in your Joomla/Mambo root with the following content:<br/><pre>$htaccess</pre>";
				}
			}else{
				echo '<font class="error">Found existing .htaccess in Joomla/Mambo root.</font></p>';
				echo $readdocs . 'the apache .htaccess file</p>';
			}
		}
		echo '<p align="center"><b>If this component is useful for you feel free to make a donation to paypal@whw3.com</b></p>';
		echo '</div>';
	}
	include($GLOBALS['mosConfig_absolute_path']."/administrator/components/com_sef/readme.inc");
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
?>