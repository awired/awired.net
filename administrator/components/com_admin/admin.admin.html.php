<?php
/**
* @version $Id: admin.admin.html.php 5612 2006-11-01 05:01:48Z Saka $
* @package Joomla
* @subpackage Admin
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

/**
* @package Joomla
* @subpackage Admin
*/
class HTML_admin_misc {

	/**
	* Control panel
	*/
	function controlPanel() {
		global $mosConfig_absolute_path, $mainframe;
		?>
		<table class="adminheading" border="0">
		<tr>
			<th class="cpanel">
			Panneau de contr&ocirc;le
			</th>
		</tr>
		</table>
		<?php
		$path = $mosConfig_absolute_path . '/administrator/templates/' . $mainframe->getTemplate() . '/cpanel.php';
		if (file_exists( $path )) {
			require $path;
		} else {
			echo '<br />';
			mosLoadAdminModules( 'cpanel', 1 );
		}
	}

	function get_php_setting($val, $colour=0, $yn=1) {
		$r =  (ini_get($val) == '1' ? 1 : 0);

		if ($colour) {
			if ($yn) {
				$r = $r ? '<span style="color: green;">ON</span>' : '<span style="color: red;">OFF</span>';
			} else {
				$r = $r ? '<span style="color: red;">ON</span>' : '<span style="color: green;">OFF</span>';
			}

			return $r;
		} else {
			return $r ? 'ON' : 'OFF';
		}
	}

	function get_server_software() {
		if (isset($_SERVER['SERVER_SOFTWARE'])) {
			return $_SERVER['SERVER_SOFTWARE'];
		} else if (($sf = phpversion() <= '4.2.1' ? getenv('SERVER_SOFTWARE') : $_SERVER['SERVER_SOFTWARE'])) {
			return $sf;
		} else {
			return 'n/a';
		}
	}

	function system_info( $version ) {
		global $mosConfig_absolute_path, $database, $mosConfig_cachepath, $mainframe;

		$width 	= 400;	// width of 100%
		$tabs 	= new mosTabs(0);
		?>

		<table class="adminheading">
		<tr>
			<th class="info">
				Information
			</th>
		</tr>
		</table>

		<?php
		$tabs->startPane("sysinfo");
		$tabs->startTab("Info. Syst&egrave;me","system-page");
		?>
			<table class="adminform">
			<tr>
				<th colspan="2">
					Information	Syst&egrave;me			</th>
			</tr>
			<tr>
				<td colspan="2">
					<?php
					// show security setting check
					josSecurityCheck();
					?>
				</td>
			</tr>
			<tr>
				<td valign="top" width="250">
					<strong>PHP h&eacute;berg&eacute; sur:</strong>
				</td>
				<td>
					<?php echo php_uname(); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Version Base de donn&eacute;es:</strong>
				</td>
				<td>
					<?php echo $database->getVersion(); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Version PHP:</strong>
				</td>
				<td>
					<?php echo phpversion(); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Serveur Web:</strong>
				</td>
				<td>
					<?php echo HTML_admin_misc::get_server_software(); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Interface serveur Web vers PHP:</strong>
				</td>
				<td>
					<?php echo php_sapi_name(); ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Version Joomla!:</strong>
				</td>
				<td>
					<?php echo $version; ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Navigateur:</strong>
				</td>
				<td>
					<?php echo phpversion() <= '4.2.1' ? getenv( 'HTTP_USER_AGENT' ) : $_SERVER['HTTP_USER_AGENT'];?>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="height: 10px;">
				</td>
			</tr>
			<tr>
				<td valign="top">
					<strong>Principaux param&egrave;trages PHP:</strong>
				</td>
				<td>
					<table cellspacing="1" cellpadding="1" border="0">
					<tr>
						<td width="250">
							Joomla! Emulation de Register Globals :
						</td>
						<td style="font-weight: bold;" width="50">
							<?php echo ((RG_EMULATION) ? '<span style="color: red;">ON</span>' : '<span style="color: green;">OFF</span>'); ?>
						</td>
						<td>
							<?php $img = ((RG_EMULATION) ? 'publish_x.png' : 'tick.png'); ?>
							<img src="../images/<?php echo $img; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Register Globals:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('register_globals',1,0); ?>
						</td>
						<td>
							<?php $img = ((ini_get('register_globals')) ? 'publish_x.png' : 'tick.png'); ?>
							<img src="../images/<?php echo $img; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Magic Quotes:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('magic_quotes_gpc',1,1); ?>
						</td>
						<td>
							<?php $img = (!(ini_get('magic_quotes_gpc')) ? 'publish_x.png' : 'tick.png'); ?>
							<img src="../images/<?php echo $img; ?>" />
						</td>
					</tr>
					<tr>					
						<td>
							Safe Mode:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('safe_mode',1,0); ?>
						</td>
						<td>
							<?php $img = ((ini_get('safe_mode')) ? 'publish_x.png' : 'tick.png'); ?>
							<img src="../images/<?php echo $img; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							File Uploads:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('file_uploads',1,1); ?>
						</td>
						<td>
							<?php $img = ((!ini_get('file_uploads')) ? 'publish_x.png' : 'tick.png'); ?>
							<img src="../images/<?php echo $img; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Session auto start:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('session.auto_start',1,0); ?>
						</td>
						<td>
							<?php $img = ((ini_get('session.auto_start')) ? 'publish_x.png' : 'tick.png'); ?>
							<img src="../images/<?php echo $img; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Chemin sauvergarde session:
						</td>
						<td style="font-weight: bold;" colspan="2">
							<?php echo (($sp=ini_get('session.save_path'))?$sp:'none'); ?>
						</td>
					</tr>
					<tr>
						<td>
							Short Open Tags:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('short_open_tag'); ?>
						</td>
						<td>
						</td>
					</tr>
					<tr>
						<td>
							Output Buffering:
						</td>
						<td style="font-weight: bold;">
							<?php echo HTML_admin_misc::get_php_setting('output_buffering'); ?>
						</td>
						<td>
						</td>
					</tr>
					<tr>
						<td>
							Open basedir:
						</td>
						<td style="font-weight: bold;" colspan="2">
							<?php echo (($ob = ini_get('open_basedir')) ? $ob : 'none'); ?>
						</td>
					</tr>
					<tr>
						<td>
							Affichage des erreurs:
						</td>
						<td style="font-weight: bold;" colspan="2">
							<?php echo HTML_admin_misc::get_php_setting('display_errors'); ?>
						</td>
					</tr>
					<tr>
						<td>
							XML enabled:
						</td>
						<td style="font-weight: bold;" colspan="2">
						<?php echo extension_loaded('xml')?'Yes':'No'; ?>
						</td>
					</tr>
					<tr>
						<td>
							Zlib enabled:
						</td>
						<td style="font-weight: bold;" colspan="2">
							<?php echo extension_loaded('zlib')?'Yes':'No'; ?>
						</td>
					</tr>
					<tr>
						<td>
							Disabled Functions:
						</td>
						<td style="font-weight: bold;" colspan="2">
							<?php echo (($df=ini_get('disable_functions'))?$df:'none'); ?>
						</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="height: 10px;">
				</td>
			</tr>			
			<tr>
				<td valign="top">
					<strong>Fichier de Configuration:</strong>
				</td>
				<td>
				<?php
				$cf = file( $mosConfig_absolute_path . '/configuration.php' );
				foreach ($cf as $k=>$v) {
					if (eregi( 'mosConfig_host', $v)) {
						$cf[$k] = '$mosConfig_host = \'xxxxxx\'';
					} else if (eregi( 'mosConfig_user', $v)) {
						$cf[$k] = '$mosConfig_user = \'xxxxxx\'';
					} else if (eregi( 'mosConfig_password', $v)) {
						$cf[$k] = '$mosConfig_password = \'xxxxxx\'';
					} else if (eregi( 'mosConfig_db ', $v)) {
						$cf[$k] = '$mosConfig_db = \'xxxxxx\'';
					} else if (eregi( '<?php', $v)) {
						$cf[$k] = '&lt;?php';
					}
				}
				echo implode( "<br />", $cf );
				?>
				</td>
			</tr>
			</table>
		<?php
		$tabs->endTab();
		$tabs->startTab("PHP Info","php-page");
		?>
			<table class="adminform">
			<tr>
				<th colspan="2">
					Information PHP
				</th>
			</tr>
			<tr>
				<td>
				<?php
				ob_start();
				phpinfo(INFO_GENERAL | INFO_CONFIGURATION | INFO_MODULES);
				$phpinfo = ob_get_contents();
				ob_end_clean();
				preg_match_all('#<body[^>]*>(.*)</body>#siU', $phpinfo, $output);
				$output = preg_replace('#<table#', '<table class="adminlist" align="center"', $output[1][0]);
				$output = preg_replace('#(\w),(\w)#', '\1, \2', $output);
				$output = preg_replace('#border="0" cellpadding="3" width="600"#', 'border="0" cellspacing="1" cellpadding="4" width="95%"', $output);
				$output = preg_replace('#<hr />#', '', $output);
				echo $output;
				?>
				</td>
			</tr>
			</table>
		<?php
		$tabs->endTab();
		$tabs->startTab('Permissions','perms');
		?>
			<table class="adminform">
			<tr>
				<th colspan="2">
					Autorisations R&eacute;pertoires
				</th>
			</tr>
			<tr>
				<td>
					<strong>For all Joomla! functions and features to work ALL of the following directories should be writeable:</strong>
					<?php
					$sp = ini_get('session.save_path');
										
					mosHTML::writableCell( 'administrator/backups' );
					mosHTML::writableCell( 'administrator/components' );
					mosHTML::writableCell( 'administrator/modules' );
					mosHTML::writableCell( 'administrator/templates' );
					mosHTML::writableCell( 'components' );
					mosHTML::writableCell( 'images' );
					mosHTML::writableCell( 'images/banners' );
					mosHTML::writableCell( 'images/stories' );
					mosHTML::writableCell( 'language' );
					mosHTML::writableCell( 'mambots' );
					mosHTML::writableCell( 'mambots/content' );
					mosHTML::writableCell( 'mambots/editors' );
					mosHTML::writableCell( 'mambots/editors-xtd' );
					mosHTML::writableCell( 'mambots/search' );
					mosHTML::writableCell( 'mambots/system' );
					mosHTML::writableCell( 'media' );
					mosHTML::writableCell( 'modules' );
					mosHTML::writableCell( 'templates' );
					mosHTML::writableCell( $mosConfig_cachepath, 0, '<strong>Cache Directory</strong> ' );
					mosHTML::writableCell( $sp, 0, '<strong>Session Directory</strong> ' );
					?>					
				</td>
			</tr>
			</table>
		<?php
		$tabs->endTab();
		$tabs->endPane();
		?>
		<?php
	}

	function ListComponents() {
		global $database;
		
		$query = "SELECT params"
		. "\n FROM #__modules "
		. "\n WHERE module = 'mod_components'"
		;
		$database->setQuery( $query );
		$row = $database->loadResult();
		$params = new mosParameters( $row );
		
		mosLoadAdminModule( 'components', $params );
	}

	/**
	 * Display Help Page
	 */
	function help() {
		global $mosConfig_live_site;
		$helpurl 	= strval( mosGetParam( $GLOBALS, 'mosConfig_helpurl', '' ) );
		
		if ( $helpurl == 'http://help.mamboserver.com' ) {
			$helpurl = 'http://help.joomla.org';
		}
		
		$fullhelpurl = $helpurl . '/index2.php?option=com_content&amp;task=findkey&pop=1&keyref=';

		$helpsearch = strval( mosGetParam( $_REQUEST, 'helpsearch', '' ) );
		$helpsearch = addslashes(htmlspecialchars($helpsearch));

		$page 		= strval( mosGetParam( $_REQUEST, 'page', 'joomla.whatsnew100.html' ) );
		$toc 		= getHelpToc( $helpsearch );
		if (!eregi( '\.html$', $page )) {
			$page .= '.xml';
		}
		
		echo $helpsearch;
		?>
		<style type="text/css">
		.helpIndex {
			border: 0px;
			width: 95%;
			height: 100%;
			padding: 0px 5px 0px 10px;
			overflow: auto;
		}
		.helpFrame {
			border-left: 0px solid #222;
			border-right: none;
			border-top: none;
			border-bottom: none;
			width: 100%;
			height: 700px;
			padding: 0px 5px 0px 10px;
		}
		</style>
		<form name="adminForm">
		<table class="adminform" border="1">
			<tr>
				<th colspan="2" class="title">
					Aide (en Anglais)
				</th>
			</tr>
			<tr>
			<td colspan="2">
				<table width="100%">
					<tr>
						<td>
							<strong>Rechercher:</strong>
							<input class="text_area" type="hidden" name="option" value="com_admin" />
							<input type="text" name="helpsearch" value="<?php echo $helpsearch;?>" class="inputbox" />
							<input type="submit" value="Chercher" class="button" />
							<input type="button" value="Effacer Resultats" class="button" onclick="f=document.adminForm;f.helpsearch.value='';f.submit()" />
					  </td>
							<td style="text-align:right">
							<?php
							if ($helpurl) {
							?>
							<a href="<?php echo $fullhelpurl;?>joomla.glossary" target="helpFrame">
								Glossaire</a>
							|
							<a href="<?php echo $fullhelpurl;?>joomla.credits" target="helpFrame">
								Cr&eacute;dits</a>
							|
							<a href="<?php echo $fullhelpurl;?>joomla.support" target="helpFrame">
								Support</a>
							<?php
							} else {
							?>
							<a href="<?php echo $mosConfig_live_site;?>/help/joomla.glossary.html" target="helpFrame">
								Glossaire</a>
							|
							<a href="<?php echo $mosConfig_live_site;?>/help/joomla.credits.html" target="helpFrame">
								Cr&eacute;dits</a>
							|
							<a href="<?php echo $mosConfig_live_site;?>/help/joomla.support.html" target="helpFrame">
								Support</a>
							<?php
							}
							?>
							|
							<a href="http://www.gnu.org/copyleft/gpl.html" target="helpFrame">
								Licence</a>
							|
							<a href="http://help.joomla.org" target="_blank">
								help.joomla.org</a>
							|
							<a href="<?php echo $mosConfig_live_site;?>/administrator/index3.php?option=com_admin&task=changelog" target="helpFrame">
								Changelog</a>
							|
							<a href="<?php echo $mosConfig_live_site;?>/administrator/index3.php?option=com_admin&task=sysinfo" target="helpFrame">
								Infos&nbsp;Syst&egrave;me</a>
							|
							<a href="http://www.joomla.org/latest10" target="_blank">
								Derni&egrave;re&nbsp;Version</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr valign="top">
			<td width="20%" valign="top">
				<strong>Index</strong>
				<div class="helpIndex">
				<?php
				foreach ($toc as $k=>$v) {
					if ($helpurl) {
						echo '<br /><a href="' . $fullhelpurl . urlencode( $k ) . '" target="helpFrame">' . $v . '</a>';
					} else {
						echo '<br /><a href="' . $mosConfig_live_site . '/help/' . $k . '" target="helpFrame">' . $v . '</a>';
					}
				}
				?>
				</div>
			</td>
			<td valign="top">
				<iframe name="helpFrame" src="<?php echo $mosConfig_live_site . '/help/' . $page;?>" class="helpFrame" frameborder="0" /></iframe>
			</td>
		</tr>
		</table>

		<input type="hidden" name="task" value="help" />
		</form>
		<?php
	}

	/**
	* Preview site
	*/
	function preview( $tp=0 ) {
		global $mosConfig_live_site;
		$tp = intval( $tp );
		?>
		<style type="text/css">
		.previewFrame {
			border: none;
			width: 95%;
			height: 600px;
			padding: 0px 5px 0px 10px;
		}
		</style>
		<table class="adminform">
		<tr>
			<th width="50%" class="title">
			Pr&eacute;visualisation du site
			</th>
			<th width="50%" style="text-align:right">
			<a href="<?php echo $mosConfig_live_site . '/index.php?tp=' . $tp;?>" target="_blank">
			Ouvrir dans une nouvelle fen&ecirc;tre
			</a>
			</th>
		</tr>
		<tr>
			<td width="100%" valign="top" colspan="2">
			<iframe name="previewFrame" src="<?php echo $mosConfig_live_site . '/index.php?tp=' . $tp;?>" class="previewFrame" /></iframe>
			</td>
		</tr>
		</table>
		<?php
	}

	/*
	* Displays contents of Changelog.php file
	*/
	function changelog() {
		?>
		<pre>
			<?php
			readfile( $GLOBALS['mosConfig_absolute_path'].'/CHANGELOG.php' );
			?>
		</pre>
		<?php
	}
}

/**
 * Compiles the help table of contents
 * @param string A specific keyword on which to filter the resulting list
 */
function getHelpTOC( $helpsearch ) {
	global $mosConfig_absolute_path;
	$helpurl = strval( mosGetParam( $GLOBALS, 'mosConfig_helpurl', '' ) );

	$files = mosReadDirectory( $mosConfig_absolute_path . '/help/', '\.xml$|\.html$' );

	require_once( $mosConfig_absolute_path . '/includes/domit/xml_domit_lite_include.php' );

	$toc = array();
	foreach ($files as $file) {
		$buffer = file_get_contents( $mosConfig_absolute_path . '/help/' . $file );
		if (preg_match( '#<title>(.*?)</title>#', $buffer, $m )) {
			$title = trim( $m[1] );
			if ($title) {
				if ($helpurl) {
					// strip the extension
					$file = preg_replace( '#\.xml$|\.html$#', '', $file );
				}
				if ($helpsearch) {
					if (strpos( strip_tags( $buffer ), $helpsearch ) !== false) {
						$toc[$file] = $title;
					}
				} else {
					$toc[$file] = $title;
				}
			}
		}
	}
	asort( $toc );
	return $toc;
}
?>