<?php
/**
* @version $Id: tinymce.php 5989 2006-12-12 19:59:11Z friesengeist $
* @package Joomla
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

$_MAMBOTS->registerFunction( 'onInitEditor', 'botTinymceEditorInit' );
$_MAMBOTS->registerFunction( 'onGetEditorContents', 'botTinymceEditorGetContents' );
$_MAMBOTS->registerFunction( 'onEditorArea', 'botTinymceEditorEditorArea' );

/**
* TinyMCE WYSIWYG Editor - javascript initialisation
*/
function botTinymceEditorInit() {
	global $mosConfig_live_site, $database, $mosConfig_absolute_path, $mainframe;

	// load tinymce info
	$query = "SELECT params"
	. "\n FROM #__mambots"
	. "\n WHERE element = 'tinymce'"
	. "\n AND folder = 'editors'"
	;
	$database->setQuery( $query );
	$database->loadObject($mambot);
	
	$params = new mosParameters( $mambot->params );

	$theme = $params->get( 'theme', 'advanced' );
	// handling for former default option
	if ($theme == 'default' ) {
		$theme = 'advanced';
	}
	
	$toolbar 			= $params->def( 'toolbar', 				'top' );
	$html_height		= $params->def( 'html_height', 			'550' );
	$html_width			= $params->def( 'html_width', 			'750' );
	$text_direction		= $params->def( 'text_direction', 		'ltr' );
	$content_css		= $params->def( 'content_css', 			1 );
	$content_css_custom	= $params->def( 'content_css_custom', 	'' );
	$invalid_elements	= $params->def( 'invalid_elements', 	'script,applet,iframe' );
	$newlines			= $params->def( 'newlines', 			0 );
	$cleanup			= $params->def( 'cleanup', 				1 );
	$cleanup_startup	= $params->set( 'cleanup_startup', 		0 ); // Currently disabled due to bugs in TinyMCE
	$compressed			= $params->def( 'compressed', 			0 );
	$relative_urls		= $params->def( 'relative_urls', 		0 );
	
	// Plugins
	// preview
	$preview			= $params->def( 'preview', 				1 );
	$preview_height		= $params->def( 'preview_height', 		'550' );
	$preview_width		= $params->def( 'preview_width', 		'750' );
	// insert date
	$insertdate			= $params->def( 'insertdate', 			1 );
	$format_date		= $params->def( 'format_date', 			'%Y-%m-%d' );
	// insert time
	$inserttime			= $params->def( 'inserttime', 			1 );
	$format_time		= $params->def( 'format_time', 			'%H:%M:%S' );
	// search & replace
	$searchreplace		=  $params->def( 'searchreplace', 		1 );
	// emotions
	$smilies			=  $params->def( 'smilies', 			1 );
	// flash
	$flash				=  $params->def( 'flash', 				1 );
	// table
	$table				=  $params->def( 'table', 				1 );
	// horizontal line
	$hr					=  $params->def( 'hr', 					1 );
	// fullscreen
	$fullscreen			=  $params->def( 'fullscreen', 			1 );
	// autosave
	$autosave			= $params->def( 'autosave', 			0 );
	// layer
	$layer				= $params->def( 'layer', 				1 );
	// style
	$style				= $params->def( 'style', 				1 );
	// visualchars
	$visualchars		= $params->def( 'visualchars', 			1 );
	// media
	$media				= $params->def( 'media', 				1 );
	// nonbreaking
	$nonbreaking		= $params->def( 'nonbreaking', 			1 );

	if ( $relative_urls ) {
		$relative_urls = 'true';
	} else {
		$relative_urls = 'false';
	}
	
	if ( $content_css_custom ) {
		$content_css = 'content_css : "'. $content_css_custom .'", ';
	} else {
		$query = "SELECT template"
		. "\n FROM #__templates_menu"
		. "\n WHERE client_id = 0"
		. "\n AND menuid = 0"
		;
		$database->setQuery( $query );
		$template = $database->loadResult();
		
		$file_path = $mosConfig_absolute_path .'/templates/'. $template .'/css/';
		if ( $content_css ) {			
			$file = 'template.css';
		} else {
			$file = 'editor_content.css';
		}
		
		$content_css = 'content_css : "'. $mosConfig_live_site .'/templates/'. $template .'/css/';
		
		if ( file_exists( $file_path .'/'. $file ) ) {
			$content_css = $content_css . $file .'", ';
		} else {
			$content_css = $content_css . 'template_css.css", ';
		}
	}

	$plugins[] 	= '';
	$buttons2[]	= '';
	$buttons3[]	= '';
	$elements[]	= '';

	if ( $cleanup ) {
		$cleanup = 'true';
	} else {
		$cleanup = 'false';
	}
	
	if ( $cleanup_startup ) {
		$cleanup_startup = 'true';
	} else {
		$cleanup_startup = 'false';
	}	

	if ( $newlines ) {
		$br_newlines	= 'true';
		$p_newlines     = 'false';
	} else {
		$br_newlines	= 'false';
		$p_newlines     = 'true';
	}
	
	// Tiny Compressed mode
	if ( $compressed ) {		
		$load 				= '<script type="text/javascript" src="'. $mosConfig_live_site .'/mambots/editors/tinymce/jscripts/tiny_mce/tiny_mce_gzip.js"></script>';
		$load_init 			= '
		<script type="text/javascript">
		tinyMCE_GZ.init({
			plugins : \'style,layer,table,save,advhr,advimage,advlink,emotions,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking\',
			themes : \'simple,advanced\',
			languages : \'en\',
			disk_cache : true,
			debug : false
		});
		</script>';
	} else {
		$load 				= '<script type="text/javascript" src="'. $mosConfig_live_site .'/mambots/editors/tinymce/jscripts/tiny_mce/tiny_mce_src.js"></script>';
		$load_init 			= '';
	}

	// preview
	if ( $preview ) {
		$plugins[]	= 'preview';
		$buttons2[]	= 'preview';
	}
	// search & replace
	if ( $searchreplace ) {
		$plugins[]	= 'searchreplace';
		$buttons2[]	= 'search,replace';
	}
	
	$plugins[]	= 'insertdatetime';	
	// insert date
	if ( $insertdate ) {
		$buttons2[]	= 'insertdate';
	}
	
	// insert time
	if ( $inserttime ) {
		$buttons2[]	= 'inserttime';
	}
	// emotions
	if ( $smilies ) {
		$plugins[]	= 'emotions';
		$buttons2[]	= 'emotions';
	}

	// horizontal line
	if ( $hr ) {
		$plugins[]	= 'advhr';
		$elements[] = 'hr[class|width|size|noshade]';
		$buttons3[]	= 'advhr';
	}
	// flash
	if ( $flash ) {
		$plugins[]	= 'flash';
		$buttons3[]	= 'flash';
	}
	// table
	if ( $table ) {
		$plugins[]	= 'table';
		$buttons3[]	= 'tablecontrols';
	}
	// fullscreen
	if ( $fullscreen ) {
		$plugins[]	= 'fullscreen';
		$buttons3[]	= 'fullscreen';
	}
	// autosave
	if ( $autosave ) {
		$plugins[]	= 'autosave';
	}
	// layer
	if ( $layer ) {
		$plugins[]	= 'layer';
		$buttons2[]	= 'insertlayer';
		$buttons2[]	= 'moveforward';
		$buttons2[]	= 'movebackward';
		$buttons2[]	= 'absolute';
	}
	// style
	if ( $style ) {
		$plugins[]	= 'style';
		$buttons3[]	= 'styleprops';
	}
	// visualchars
	if ( $visualchars ) {
		$plugins[]	= 'visualchars';
		$buttons3[]	= 'visualchars';
	}
	// media
	if ( $media ) {
		$plugins[]	= 'media';
		$buttons3[]	= 'media';
	}
	// nonbreaking
	if ( $nonbreaking ) {
		$plugins[]			= 'nonbreaking';
		$buttons3[]			= 'nonbreaking';
	}

	$buttons2 	= implode( ', ', $buttons2 );
	$buttons3 	= implode( ', ', $buttons3 );
	$plugins 	= implode( ', ', $plugins );
	$elements 	= implode( ', ', $elements );
	
return <<<EOD
	$load	
	$load_init	
	<script type="text/javascript">
	tinyMCE.init({
		theme : "$theme",
		language : "en",
		mode : "specific_textareas",
		document_base_url : "$mosConfig_live_site/",
		relative_urls : $relative_urls,
		remove_script_host : false,
		save_callback : "TinyMCE_Save",
		invalid_elements : "$invalid_elements",
		theme_advanced_toolbar_location : "$toolbar",
		theme_advanced_source_editor_height : "$html_height",
		theme_advanced_source_editor_width : "$html_width",
		directionality: "$text_direction",
		force_br_newlines : "$br_newlines",
		force_p_newlines : "$p_newlines",
		$content_css
		debug : false,
		cleanup : $cleanup,
		cleanup_on_startup : $cleanup_startup,
		safari_warning : false,
		plugins : "advlink, advimage, $plugins",
		theme_advanced_buttons2_add : "$buttons2",
		theme_advanced_buttons3_add : "$buttons3",
		plugin_insertdate_dateFormat : "$format_date",
		plugin_insertdate_timeFormat : "$format_time",
		plugin_preview_width : "$preview_width",
		plugin_preview_height : "$preview_height",
		extended_valid_elements : "a[name|href|target|title|onclick], img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name], $elements",
		disk_cache : true,
		debug : false,	
		fullscreen_settings : {
			theme_advanced_path_location : "top"
		}
	});
	function TinyMCE_Save(editor_id, content, node)
	{
		base_url = tinyMCE.settings['document_base_url'];
		var vHTML = content;
		if (true == true){
			vHTML = tinyMCE.regexpReplace(vHTML, 'href\s*=\s*"?'+base_url+'', 'href="', 'gi');
			vHTML = tinyMCE.regexpReplace(vHTML, 'src\s*=\s*"?'+base_url+'', 'src="', 'gi');
			vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_src\s*=\s*"?', '', 'gi');
			vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_href\s*=\s*"?', '', 'gi');
		}
		return vHTML;
	}	
</script>
EOD;
}
/**
* TinyMCE WYSIWYG Editor - copy editor contents to form field
* @param string The name of the editor area
* @param string The name of the form field
*/
function botTinymceEditorGetContents( $editorArea, $hiddenField ) {
	return <<<EOD

		tinyMCE.triggerSave();
EOD;
}
/**
* TinyMCE WYSIWYG Editor - display the editor
* @param string The name of the editor area
* @param string The content of the field
* @param string The name of the form field
* @param string The width of the editor area
* @param string The height of the editor area
* @param int The number of columns for the editor area
* @param int The number of rows for the editor area
*/
function botTinymceEditorEditorArea( $name, $content, $hiddenField, $width, $height, $col, $row ) {
	global $mosConfig_live_site, $_MAMBOTS;

	$results = $_MAMBOTS->trigger( 'onCustomEditorButton' );
	$buttons = array();
	foreach ($results as $result) {
		if ( $result[0] ) {
			$buttons[] = '<img src="'.$mosConfig_live_site.'/mambots/editors-xtd/'.$result[0].'" onclick="tinyMCE.execCommand(\'mceInsertContent\',false,\''.$result[1].'\')" alt="'.$result[1].'" />';
		}
	}
	$buttons = implode( "", $buttons );

	return <<<EOD

<textarea id="$hiddenField" name="$hiddenField" cols="$col" rows="$row" style="width:{$width}px; height:{$height}px;" mce_editable="true">$content</textarea>
<br />$buttons
EOD;
}
?>