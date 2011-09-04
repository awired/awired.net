<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
$iso = split( '=', _ISO );
$jc_template_path = $mosConfig_live_site.'/templates/'.$mainframe->getTemplate();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script src="<?php echo $jc_template_path; ?>/sifr.js" type="text/javascript"></script>
<?php mosShowHead(); ?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="<?php echo $jc_template_path;?>/css/template_css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jc_template_path;?>/css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jc_template_path;?>/css/modules_css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jc_template_path;?>/css/mainmenu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $jc_template_path;?>/css/sIFR-screen.css" rel="stylesheet" type="text/css" />


<?php
if ( $my->id ) { initEditor(); } 
?>

</head>
<body>
<div id="wrapper">
		<div id="logoParent">
			<div id="logo"></div>
		</div>
		<div style="clear:both;"></div>
		<div id="navAndContent">
			<div id="navigation">
				<?php mosLoadModules('right', -2); ?>
			</div>
			<div id="content">
				<?php mosMainBody(); ?>
			</div>
		</div>
</div>
<div style="clear:both;"></div>
					<div id="footerThings">
							<div id="copyRight">
								<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/templates/' . $mainframe->getTemplate() . '/footer.php' ); ?>
							</div>
					</div>
					

<script type="text/javascript">
/* Replacement calls. Please see documentation for more information. */

if(typeof sIFR == "function"){


    sIFR.bHideBrowserText = false;
    sIFR.setup();

	sIFR.replaceElement("#content .contentheading", named({sFlashSrc: "<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/componentheading.swf", sColor: "#3141BB", sHoverColor: "#333333", sWmode: "transparent"}));
	sIFR.replaceElement("#content .componentheading", named({sFlashSrc: "<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/componentheading.swf", sColor: "#990000", sHoverColor: "#612E00", sWmode: "transparent"}));};
	sIFR.replaceElement("#navigation div.moduletable h3", named({sFlashSrc: "<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/h3.swf", sColor: "#666666", sHoverColor: "#333333", sWmode: "transparent"}));
	sIFR.replaceElement(".small", named({sFlashSrc: "<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/smalltext.swf", sColor: "#666666", sHoverColor: "#333333", sWmode: "transparent"}));
</script>
</body>
</html>