<?php
/**
* @version $Id: admin.media.php 5874 2006-11-29 00:21:35Z facedancer $
* @package Joomla
* @subpackage Massmail
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

// ensure user has access to this function
if (!($acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'all' )
		| $acl->acl_check( 'administration', 'edit', 'users', $my->usertype, 'components', 'com_media' ))) {
	mosRedirect( 'index2.php', _NOT_AUTH );
}

require_once( $mainframe->getPath( 'admin_html' ) );

/**
 * Makes file name safe to use
 * Temporary function for 1.0.x only
 * @param string The name of the file (not full path)
 * @return string The sanitised string
 */
function makeSafe( $file ) {
	return str_replace( '..', '', urldecode( $file ) );
}

$cid 		= josGetArrayInts( 'cid' );

$listdir 	= makeSafe( mosGetParam( $_REQUEST, 'listdir', '' ) );
$dirPath 	= makeSafe( mosGetParam( $_POST, 'dirPath', '' ) );

if (is_int(strpos ($listdir, "..")) && $listdir != '') {
	mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "NO HACKING PLEASE - PAS DE HACKING SVP" );
}

define( 'COM_MEDIA_BASE', $mosConfig_absolute_path . DIRECTORY_SEPARATOR . 'images' );
define( 'COM_MEDIA_BASEURL', $mosConfig_live_site . '/images' );

switch ($task) {

	case 'upload':
		upload();
		showMedia( $dirPath );
		break;

	case 'newdir':
		if (ini_get('safe_mode')=='On') {
			mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "Cr�ation de r�pertoire interdite en SAFE MODE car cela peut engendrer des probl�mes." );
		} else {
			create_folder( $dirPath );
		}
		showMedia( $dirPath );
		break;

	case 'delete':
		delete_file( $listdir );
		showMedia( $listdir );
		break;

	case 'deletefolder':
		delete_folder( $listdir );
		showMedia( $listdir );
		break;

	case 'list':
		listImages( $listdir );
		break;

	case 'cancel':
		mosRedirect( 'index2.php' );
		break;
	
	default:
		showMedia( $listdir );
		break;
}

/**
 * Deletes a file
 * @param string The relative folder path to the file
 */
function delete_file( $listdir ) {
	$delFile = makeSafe( mosGetParam( $_REQUEST, 'delFile', '' ) );
	$fullPath = COM_MEDIA_BASE . $listdir . DIRECTORY_SEPARATOR . stripslashes( $delFile );

	if (file_exists( $fullPath )) {
		unlink( $fullPath );
	}
}

function create_folder($dirPath) {
	$folder_name = mosGetParam( $_POST, 'foldername', '' );

	if(strlen($folder_name) >0) {
		if (eregi("[^0-9a-zA-Z_]", $folder_name)) {
			mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "Le nom des r�pertoires ne doit contenir que des caract�res alphanum�riques et aucun espace." );
		}
		$folder = COM_MEDIA_BASE . $dirPath . DIRECTORY_SEPARATOR . $folder_name;
		if(!is_dir( $folder ) && !is_file( $folder )) {
			mosMakePath( $folder );
			$fp = fopen( $folder . "/index.html", "w" );
			fwrite( $fp, "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>" );
			fclose( $fp );
			mosChmod( $folder."/index.html" );
			$refresh_dirs = true;
		}
	}
}

function delete_folder($listdir) {
	$delFolder = mosGetParam( $_REQUEST, 'delFolder', '' );

	$del_html 	= COM_MEDIA_BASE . $listdir . $delFolder . DIRECTORY_SEPARATOR . 'index.html';
	$del_folder = COM_MEDIA_BASE . $listdir . $delFolder;

	$entry_count = 0;
	$dir = opendir( $del_folder );
	while ($entry = readdir( $dir )) {
		if( $entry != "." & $entry != ".." & strtolower($entry) != "index.html" )
		$entry_count++;
	}
	closedir( $dir );

	if ($entry_count < 1) {
		@unlink( $del_html );
		rmdir( $del_folder );
	} else {
		echo '<font color="red">Impossible de supprimer : non vide!</font>';
	}
}

function upload() {
	if (isset($_FILES['upload']) && is_array($_FILES['upload']) && isset($_POST['dirPath'])) {
		$dirPathPost 	= $_POST['dirPath'];
		$file 			= $_FILES['upload'];
		
		if (strlen($dirPathPost) > 0) {
			if (substr($dirPathPost,0,1) == '/') {
				$IMG_ROOT .= $dirPathPost;
			} else {
				$IMG_ROOT = $dirPathPost;
			}
		}

		if (strrpos( $IMG_ROOT, '/' ) != strlen( $IMG_ROOT )-1) {
			$IMG_ROOT .= '/';
		}

		do_upload( $file, COM_MEDIA_BASE . $dirPathPost . '/' );
	}
}

function do_upload($file, $dest_dir) {
	global $clearUploads;

	if (empty($file['name'])) {
		mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "Aucun fichier s�lectionn�" );
	}
	if (file_exists($dest_dir.$file['name'])) {
		mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "ECHEC. Le fichier existe d�j�" );
	}

	$format = substr( $file['name'], -3 );

	$allowable = array (
		'bmp',
		'csv',
		'doc',
		'epg',
		'gif',
		'ico',
		'jpg',
		'odg',
		'odp',
		'ods',
		'odt',
		'pdf',
		'png',
		'ppt',
		'swf',
		'txt',
		'xcf',
		'xls'
	);

    $noMatch = 0;
	foreach( $allowable as $ext ) {
		if ( strcasecmp( $format, $ext ) == 0 ) {
			$noMatch = 1;
		}
		}
        if(!$noMatch){
			mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], 'Type de fichier non support�' );
        }

		if (!move_uploaded_file($file['tmp_name'], $dest_dir.strtolower($file['name']))){
			mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "ECHEC Upload" );
	} else {
			mosChmod($dest_dir.strtolower($file['name']));
			mosRedirect( "index2.php?option=com_media&listdir=".$_POST['dirPath'], "Upload termin�" );
		}

	$clearUploads = true;
}

function recursive_listdir( $base ) {
	static $filelist = array();
	static $dirlist = array();

	if(is_dir($base)) {
		$dh = opendir($base);
		while (false !== ($dir = readdir($dh))) {
			if ($dir !== '.' && $dir !== '..' && is_dir($base .'/'. $dir) && strtolower($dir) !== 'cvs' && strtolower($dir) !== '.svn') {
				$subbase = $base .'/'. $dir;
				$dirlist[] = $subbase;
				$subdirlist = recursive_listdir($subbase);
			}
		}
		closedir($dh);
	}
	return $dirlist;
 }


/**
* Show media manager
* @param string The image directory to display
*/
function showMedia( $listdir ) {
	global $mosConfig_live_site;

	// get list of directories
	$imgFiles 	= recursive_listdir( COM_MEDIA_BASE );
	$images 	= array();
	$folders 	= array();
	$folders[] 	= mosHTML::makeOption( "/" );

	$len = strlen( COM_MEDIA_BASE );
	foreach ($imgFiles as $file) {
		$folders[] = mosHTML::makeOption( substr( $file, $len ) );
	}
	if (is_array( $folders )) {
		sort( $folders );
	}
	// create folder selectlist
	$dirPath = mosHTML::selectList( $folders, 'dirPath', "class=\"inputbox\" size=\"1\" onchange=\"goUpDir()\" ", 'value', 'text', $listdir );

	HTML_Media::showMedia( $dirPath, $listdir );
}


/**
* Build imagelist
* @param string The image directory to display
*/
function listImages($listdir) {
	global $mosConfig_live_site;

	// get list of images
	$d = @dir( COM_MEDIA_BASE . DIRECTORY_SEPARATOR .$listdir);

	if($d) {
		//var_dump($d);
		$images 	= array();
		$folders 	= array();
		$docs 		= array();
		$allowable 	= '\.xcf$|\.odg$|\.gif$|\.jpg$|\.png$|\.bmp$';

		while (false !== ($entry = $d->read())) {
			$img_file = $entry;
			if(is_file( COM_MEDIA_BASE .$listdir.'/'.$img_file) && substr($entry,0,1) != '.' && strtolower($entry) !== 'index.html' ) {
				if (eregi( $allowable, $img_file )) {
					$image_info 				= @getimagesize( COM_MEDIA_BASE ."/".$listdir.'/'.$img_file);
					$file_details['file'] 		= COM_MEDIA_BASE . $listdir."/".$img_file;
					$file_details['img_info'] 	= $image_info;
					$file_details['size'] 		= filesize( COM_MEDIA_BASE .$listdir."/".$img_file);
					$images[$entry] 			= $file_details;
				} else {
					// file is document
					$file_details['size'] 	= filesize( COM_MEDIA_BASE .$listdir."/".$img_file);
					$file_details['file'] 	= COM_MEDIA_BASE .$listdir."/".$img_file;
					$docs[$entry] 			= $file_details;
				}
			} else if(is_dir( COM_MEDIA_BASE .'/'.$listdir.'/'.$img_file) && substr($entry,0,1) != '.' && strtolower($entry) !== 'cvs') {
				$folders[$entry] = $img_file;
			}
		}
		$d->close();

		HTML_Media::imageStyle($listdir);

		if(count($images) > 0 || count($folders) > 0 || count($docs) > 0) {
			//now sort the folders and images by name.
			ksort($images);
			ksort($folders);
			ksort($docs);


			HTML_Media::draw_table_header();

			for($i=0; $i<count($folders); $i++) {
				$folder_name = key($folders);
				HTML_Media::show_dir('/'.$folders[$folder_name], $folder_name,$listdir);
				next($folders);
			}

			for($i=0; $i<count($docs); $i++) {
				$doc_name = key($docs);
				$iconfile= $GLOBALS['mosConfig_absolute_path'].'/administrator/components/com_media/images/'.substr($doc_name,-3).'_16.png';
				if (file_exists($iconfile))	{
					$icon = 'components/com_media/images/'.(substr($doc_name,-3)).'_16.png'	;
				} else {
					$icon = 'components/com_media/images/con_info.png';
				}
				HTML_Media::show_doc($doc_name, $docs[$doc_name]['size'],$listdir, $icon);
				next($docs);
			}

			for($i=0; $i<count($images); $i++) {
				$image_name = key($images);
				HTML_Media::show_image($images[$image_name]['file'], $image_name, $images[$image_name]['img_info'], $images[$image_name]['size'],$listdir);
				next($images);
			}

			HTML_Media::draw_table_footer();
		} else {
			HTML_Media::draw_no_results();
		}
	} else {
		HTML_Media::draw_no_dir();
	}
}

function rm_all_dir($dir) {
	if(is_dir($dir)) {
		$d = @dir($dir);

		while ( false !== ( $entry = $d->read() ) ) {
			if($entry != '.' && $entry != '..') {
				$node = $dir.'/'.$entry;
				if(is_file($node)) {
					unlink($node);
				} else if(is_dir($node)) {
					rm_all_dir($node);
				}
			}
		}
		$d->close();

		rmdir($dir);
	}
}
?>