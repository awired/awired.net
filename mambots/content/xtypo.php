<?php
/**
* XTypo - Fully Configurable Web 2.0 CSS extras for your Joomla template
* @version 1.0
* @author Andy & Yose Sikumbang
* http://www.templateplazza.com
* Based on JW AllVideos Plugin by Joomlaworks.gr
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Icon http://www.famfamfam.com/lab/icons/silk/
**/

defined( '_VALID_MOS' ) or die( 'Restricted access' );


$_MAMBOTS->registerFunction( 'onPrepareContent', 'xtypoclass' );

function xtypoclass( $published, &$row, &$params, $page=0 ) {

// add parameters
global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_session_type, $mainframe, $database;
  $query = "SELECT id FROM #__mambots WHERE element = 'xtypo' AND folder = 'content'";
  $database->setQuery( $query );
  $id = $database->loadResult();
  $mambot = new mosMambot( $database );
  $mambot->load( $id );
  $param =& new mosParameters( $mambot->params );
  
  
 //bg image 
  $bgimgalert = $param->get('bgimgalert', 'alert.gif'); 
  $bgimginfo = $param->get('bgimginfo', 'info.gif'); 
  $bgimgwarning = $param->get('bgimgwarning', 'warning.gif');
  $bgimgsticky = $param->get('bgimgsticky', 'sun.gif'); 
  $bgimgquote1 = $param->get('bgimgquote1', 'quote1.gif'); 
  $bgimgquote2 = $param->get('bgimgquote2', 'quote2.gif'); 
  $bgimgfeed = $param->get('bgimgfeed', 'feed.gif'); 
  $bgimgdownload = $param->get('bgimgdownload', 'download.gif'); 
  $bgimgcode = $param->get('bgimgcode', '_no-image.gif');
  
 // bgcolor
  $bgcoloralert =$param->get('bgcoloralert', '#FFF6BF'); 
  $bgcolorinfo = $param->get('bgcolorinfo', '#F8FAFC'); 
  $bgcolorwarning =$param->get('bgcolorwarning', '#FBEEF1'); 
  $bgcolorsticky =$param->get('bgcolorsticky', '#E6FFE1'); ;
  $bgcolorfeed =$param->get('bgcolorfeed', '#E0E0E8'); 
  $bgcolordownload =$param->get('bgcolordownload', '#F0F0F0'); 
  $bgcolorquote =$param->get('bgcolorquote', '#FFFFFF'); 
  $bgcolorcode=$param->get('bgcolorcode', '#F0F0F0'); 
 
 // color
  $color_alert =$param->get('color_alert', '#996666');
  $color_info =$param->get('color_info', '#5E6273');
  $color_warning =$param->get('color_warning', '#8E6A64');
  $color_sticky =$param->get('color_sticky', '#48793F');
  $color_feed =$param->get('color_feed', '#333333');
  $color_download =$param->get('color_download', '#666666');
  $color_quote =$param->get('color_quote', '#999999');
  $color_code=$param->get('color_code', '#666666');
  
 // padding 
  $pt_alert =$param->get('pt_alert', '5px');
  $pr_alert =$param->get('pr_alert', '20px');
  $pb_alert =$param->get('pb_alert', '5px');
  $pl_alert =$param->get('pl_alert', '45px');
  
  $pt_info =$param->get('pt_info', '5px');
  $pr_info =$param->get('pr_info', '20px');
  $pb_info =$param->get('pb_info', '5px');
  $pl_info =$param->get('pl_info', '45px');
  
  $pt_warning =$param->get('pt_warning', '5px');
  $pr_warning =$param->get('pr_warning', '20px');
  $pb_warning =$param->get('pb_warning', '5px');
  $pl_warning =$param->get('pl_warning', '45px');
  
  $pt_sticky =$param->get('pt_sticky', '5px');
  $pr_sticky =$param->get('pr_sticky', '20px');
  $pb_sticky =$param->get('pb_sticky', '5px');
  $pl_sticky =$param->get('pl_sticky', '45px');
  
  $pt_sticky =$param->get('pt_sticky', '5px');
  $pr_sticky =$param->get('pr_sticky', '20px');
  $pb_sticky =$param->get('pb_sticky', '5px');
  $pl_sticky =$param->get('pl_sticky', '45px');
  
  $pt_feed =$param->get('pt_feed', '5px');
  $pr_feed =$param->get('pr_feed', '20px');
  $pb_feed =$param->get('pb_feed', '5px');
  $pl_feed =$param->get('pl_feed', '45px');
  
  $pt_download =$param->get('pt_download', '5px');
  $pr_download =$param->get('pr_download', '20px');
  $pb_download =$param->get('pb_download', '5px');
  $pl_download =$param->get('pl_download', '45px');
  
  $pt_code =$param->get('pt_code', '5px');
  $pr_code =$param->get('pr_code', '20px');
  $pb_code =$param->get('pb_code', '5px');
  $pl_code =$param->get('pl_code', '10px');
  
  $pt_quote =$param->get('pt_quote', '10px');
  $pr_quote =$param->get('pr_quote', '20px');
  $pb_quote =$param->get('pb_quote', '10px');
  $pl_quote =$param->get('pl_quote', '60px');
  

  
  // border
  $bordertopsize_alert = $param->get('bordertopsize_alert', '2px');  
  $bordertoptype_alert =  $param->get('bordertoptype_alert', 'solid');
  $bordertopcolor_alert =  $param->get('bordertopcolor_alert', '#ffd324');
  $borderbotsize_alert =  $param->get('borderbotsize_alert', '2px');
  $borderbottype_alert =  $param->get('borderbottype_alert', 'solid');
  $borderbotcolor_alert =  $param->get('borderbotcolor_alert', '#ffd324');
  
  $bordertopsize_info = $param->get('bordertopsize_info', '2px'); 
  $bordertoptype_info = $param->get('bordertoptype_info', 'solid'); 
  $bordertopcolor_info = $param->get('bordertopcolor_info', '#B5D4FE'); 
  $borderbotsize_info = $param->get('borderbotsize_info', '2px'); 
  $borderbottype_info = $param->get('borderbottype_info', 'solid'); 
  $borderbotcolor_info = $param->get('borderbotcolor_info', '#B5D4FE');
  
  $bordertopsize_warning = $param->get('bordertopsize_warning', '2px'); 
  $bordertoptype_warning = $param->get('bordertoptype_warning', 'solid'); 
  $bordertopcolor_warning = $param->get('bordertopcolor_warning', '#FEABB9');
  $borderbotsize_warning = $param->get('borderbotsize_warning', '2px'); 
  $borderbottype_warning = $param->get('borderbottype_warning', 'solid'); 
  $borderbotcolor_warning =  $param->get('borderbotcolor_warning', '#FEABB9'); 
  
  
  $bordertopsize_sticky =  $param->get('bordertopsize_sticky', '2px'); 
  $bordertoptype_sticky =  $param->get('bordertoptype_sticky', 'solid'); 
  $bordertopcolor_sticky =  $param->get('bordertopcolor_sticky', '#FEABB9'); 
  $borderbotsize_sticky =  $param->get('borderbotsize_sticky', '2px');
  $borderbottype_sticky =  $param->get('borderbottype_sticky', 'solid'); 
  $borderbotcolor_sticky =  $param->get('borderbotcolor_sticky', '#FEABB9'); 
  
  
  $bordertopsize_feed = $param->get('bordertopsize_feed', '2px'); 
  $bordertoptype_feed = $param->get('bordertoptype_feed', 'solid'); 
  $bordertopcolor_feed = $param->get('bordertopcolor_feed', '#85BBDB'); 
  $borderbotsize_feed = $param->get('borderbotsize_feed', '2px'); 
  $borderbottype_feed = $param->get('borderbottype_feed', 'solid'); 
  $borderbotcolor_feed = $param->get('borderbotcolor_feed', '#85BBDB'); 
  
  $bordertopsize_download =$param->get('bordertopsize_download', '2px'); 
  $bordertoptype_download =$param->get('bordertoptype_download', 'solid');
  $bordertopcolor_download =$param->get('bordertopcolor_download', '#c0c0c0');
  $borderbotsize_download =$param->get('borderbotsize_download', '2px'); 
  $borderbottype_download =$param->get('borderbottype_download', 'solid'); 
  $borderbotcolor_download =$param->get('borderbotcolor_download', '#c0c0c0');
  
    
  $bordertopsize_quote = $param->get('bordertopsize_quote', '2px'); 
  $bordertoptype_quote = $param->get('bordertoptype_quote', 'dotted');
  $bordertopcolor_quote = $param->get('bordertopcolor_quote', '#cccccc'); 
  $borderbotsize_quote =$param->get('borderbotsize_quote', '2px'); 
  $borderbottype_quote = $param->get('borderbottype_quote', 'dotted'); 
  $borderbotcolor_quote = $param->get('borderbotcolor_quote', '#cccccc'); 
  
  $bordersize_code = $param->get('bordersize_code', '5px'); 
  $bordertype_code =  $param->get('bordertype_code', 'solid'); 
  $bordercolor_code =  $param->get('bordercolor_code', '#C3D7EA'); 
  
  $dropcap_color =$param->get('dropcap_color', '#333333'); 
  $dropcap_fontsize =$param->get('dropcap_fontsize', '70px'); 
  $dropcap_fontfamily = $param->get('dropcap_fontfamily', 'Georgia, Times New Roman, Trebuchet MS');
  
  $quote_fontstyle = $param->get('quote_fontstyle', 'italic;'); 
  $quote_left_width = $param->get('quote_left_width', '200px;'); 
  $quote_right_width = $param->get('quote_right_width', '200px;'); 
  
// end parameters

$regex = array(

"xtypo_alert" => array("<p style=\"	background: url(mambots/content/xtypo/icon/".$bgimgalert.") center no-repeat;	background-color: ".$bgcoloralert."; background-position: 15px 50%;	text-align: left; padding: ".$pt_alert." ".$pr_alert." ".$pb_alert." ".$pl_alert.";	color:".$color_alert.";	border-top: ".$bordertopsize_alert." ".$bordertoptype_alert." ".$bordertopcolor_alert." ;	border-bottom: ".$borderbotsize_alert." ".$borderbottype_alert." ".$borderbotcolor_alert.";\">***code***</p>","#{xtypo_alert}(.*?){/xtypo_alert}#s") ,

"xtypo_info" => array("<p style=\"	background: url(mambots/content/xtypo/icon/".$bgimginfo.") center no-repeat; background-color:".$bgcolorinfo." ; background-position: 15px 50%; text-align: left; 	padding: ".$pt_info." ".$pr_info." ".$pb_info." ".$pl_info."; color:".$color_info."; border-top: ".$bordertopsize_info." ".$bordertoptype_info." ".$bordertopcolor_info." ; border-bottom: ".$borderbotsize_info." ".$borderbottype_info." ".$borderbotcolor_info.";\">
	***code***</p>","#{xtypo_info}(.*?){/xtypo_info}#s") ,

"xtypo_warning" => array("
<p style=\"	background: url(mambots/content/xtypo/icon/".$bgimgwarning.") center no-repeat; 	background-color: ".$bgcolorwarning."; background-position: 15px 50%; text-align: left;	padding: ".$pt_warning." ".$pr_warning." ".$pb_warning." ".$pl_warning."; color:".$color_warning."; 	border-top: ".$bordertopsize_warning." ".$bordertoptype_warning." ".$bordertopcolor_warning." ; 	border-bottom: ".$borderbotsize_warning." ".$borderbottype_warning." ".$borderbotcolor_warning.";\">
***code***</p>","#{xtypo_warning}(.*?){/xtypo_warning}#s") ,

"xtypo_sticky" => array("
<p style=\"background: url(mambots/content/xtypo/icon/".$bgimgsticky.") center no-repeat; background-color: ".$bgcolorsticky."; background-position: 15px 50%; text-align: left; padding: ".$pt_sticky." ".$pr_sticky." ".$pb_sticky." ".$pl_sticky."; color:".$color_sticky.";	border-top: ".$bordertopsize_sticky." ".$bordertoptype_sticky." ".$bordertopcolor_sticky." ; border-bottom: ".$borderbotsize_sticky." ".$borderbottype_sticky." ".$borderbotcolor_sticky.";\">
	***code***</p>","#{xtypo_sticky}(.*?){/xtypo_sticky}#s") ,

"xtypo_feed" => array("
<p style=\"background: url(mambots/content/xtypo/icon/".$bgimgfeed.") center no-repeat; 	background-color: ".$bgcolorfeed.";	background-position: 15px 50%; text-align: left; padding: ".$pt_feed." ".$pr_feed." ".$pb_feed." ".$pl_feed."; color:".$color_feed."; border-top: ".$bordertopsize_feed." ".$bordertoptype_feed." ".$bordertopcolor_feed." ; border-bottom: ".$borderbotsize_feed." ".$borderbottype_feed." ".$borderbotcolor_feed.";\">
	***code***</p>","#{xtypo_feed}(.*?){/xtypo_feed}#s") ,
	
"xtypo_download" => array("
<p style=\"background: url(mambots/content/xtypo/icon/".$bgimgdownload.") center no-repeat; 	background-color: ".$bgcolordownload.";	background-position: 15px 50%; text-align: left; padding: ".$pt_download." ".$pr_download." ".$pb_download." ".$pl_download."; color:".$color_download."; border-top: ".$bordertopsize_download." ".$bordertoptype_download." ".$bordertopcolor_download." ; border-bottom: ".$borderbotsize_download." ".$borderbottype_download." ".$borderbotcolor_download.";\">
	***code***</p>","#{xtypo_download}(.*?){/xtypo_download}#s") ,

"xtypo_quote" => array("
<blockquote style=\"margin: 15px 10px;background:".$bgcolorquote."  url(mambots/content/xtypo/icon/".$bgimgquote1.") top left no-repeat; padding:".$pt_quote." ".$pr_quote." ".$pb_quote." ".$pl_quote."; 	border-top: ".$bordertopsize_quote." ".$bordertoptype_quote." ".$bordertopcolor_quote." ; 	border-bottom: ".$borderbotsize_quote." ".$borderbottype_quote." ".$borderbotcolor_quote.";\"> <p style=\"background: url(mambots/content/xtypo/icon/".$bgimgquote2.") bottom right no-repeat; padding:10px 30px 15px 0px;font-size:110%; line-height:120%;	color:".$color_quote."; font-style:".$quote_fontstyle.";\">***code***</p></blockquote>","#{xtypo_quote}(.*?){/xtypo_quote}#s") ,

"xtypo_quote_left" => array("
<blockquote style=\"float:left; width: ".$quote_left_width."; margin: 15px 10px;background:".$bgcolorquote."  url(mambots/content/xtypo/icon/".$bgimgquote1.") top left no-repeat; padding:".$pt_quote." ".$pr_quote." ".$pb_quote." ".$pl_quote."; 	border-top: ".$bordertopsize_quote." ".$bordertoptype_quote." ".$bordertopcolor_quote." ; 	border-bottom: ".$borderbotsize_quote." ".$borderbottype_quote." ".$borderbotcolor_quote.";\"> <p style=\"background: url(mambots/content/xtypo/icon/".$bgimgquote2.") bottom right no-repeat; padding:10px 30px 15px 0px;font-size:110%; line-height:120%;	color:".$color_quote.";font-style:".$quote_fontstyle.";\">***code***</p></blockquote>","#{xtypo_quote_left}(.*?){/xtypo_quote_left}#s") ,

"xtypo_quote_right" => array("
<blockquote style=\"float:right; width: ".$quote_right_width."; margin: 15px 10px;background:".$bgcolorquote."  url(mambots/content/xtypo/icon/".$bgimgquote1.") top left no-repeat; padding:".$pt_quote." ".$pr_quote." ".$pb_quote." ".$pl_quote."; 	border-top: ".$bordertopsize_quote." ".$bordertoptype_quote." ".$bordertopcolor_quote." ; 	border-bottom: ".$borderbotsize_quote." ".$borderbottype_quote." ".$borderbotcolor_quote.";\"> <p style=\"background: url(mambots/content/xtypo/icon/".$bgimgquote2.") bottom right no-repeat; padding:10px 30px 15px 0px;font-size:110%; line-height:120%;	color:".$color_quote.";font-style:".$quote_fontstyle.";\">***code***</p></blockquote>","#{xtypo_quote_right}(.*?){/xtypo_quote_right}#s") ,

"xtypo_code" => array("
<p style=\"	background: ".$bgcolorcode." url(mambots/content/xtypo/icon/".$bgimgcode.") 10px 5px no-repeat; padding:".$pt_code." ".$pr_code." ".$pb_code." ".$pl_code."; font-family: Courier New, Courier, mono,times new roman;line-height:150%;	border-left: ".$bordersize_code." ".$bordertype_code." ".$bordercolor_code.";	 color:".$color_code.";\">***code***</p>", "#{xtypo_code}(.*?){/xtypo_code}#s") ,
		
"xtypo_dropcap" => array("
<div style=\"float: left; text-transform:uppercase; line-height:80%; padding:0px 8px 4px 0px; display: block;	color:".$dropcap_color."; font-size: ".$dropcap_fontsize."; font-family: ".$dropcap_fontfamily."; \">***code***</div>", "#{xtypo_dropcap}(.*?){/xtypo_dropcap}#s") 

);
	  
// prepend and append code
$startcode = "<!-- Xtypo - Extra Typografi For Joomla Template By http://www.templateplazza.com -->";
$endcode = "<!-- End Xtypo -->";
	    if ( !$published ) {		
		    foreach ($regex as $key => $value) {
		      $row->text = preg_replace( $regex[$key][1], '', $row->text );
		    }
		    return;
	    }		
	    foreach ($regex as $key => $value) {  // searching for marks     	    		    	
	    	if (preg_match_all($regex[$key][1], $row->text, $matches, PREG_PATTERN_ORDER) > 0) {      			 
	    		foreach ($matches[1] as $match) {	
				//$match = preg_replace("/{.+?}/", "", $match); 
				$code = str_replace("***code***", $match, $regex[$key][0] );

				$row->text = preg_replace("'{".preg_quote($key)."}".preg_quote($match)."{/".preg_quote($key)."}'s", $startcode.$code.$endcode , $row->text );
	    		}
	    	}	    	
	    }  
}
?>