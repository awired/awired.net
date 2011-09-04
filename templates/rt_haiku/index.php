<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = split( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
if ( $my->id ) {
	initEditor();
}
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<?php mosShowHead(); ?>
<link href="templates/<?php echo $mainframe->getTemplate(); ?>/css/template_css.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo $mosConfig_live_site;?>/images/favicon.ico" />
</head>
<body id="page_bg">
<a name="up" id="up"></a>

<div id="center">
	<div id="main_bg">
  	<div id="content_bg">
			<div id="header">
				<div id="newflash">
					<div>
						<?php mosLoadModules( 'top', -1); ?>
					</div>
				</div>
			</div>
			<div id="topmenu">
				<?php mosLoadModules( 'user3', -1); ?>
			</div>
			<div id="content">
				<div class="padding">
					<?php mosPathWay(); ?>
					<?php if (mosCountModules('user1')) { ?>
					<div class="highlight">
						<?php mosLoadModules( 'user1', -2); ?>
					</div>
					<?php } ?>
					<?php mosMainBody(); ?>
				</div>				
			</div>
			<div id="navigation">
				<div class="padding">
					<?php mosLoadModules( 'left', -2); ?>
					<?php mosLoadModules( 'user4', -2); ?>
					<?php mosLoadModules( 'user2', -2); ?>
					<?php mosLoadModules( 'right', -2); ?>
				</div>
			</div>
			<div id="footer">
				Designed by <a href="http://www.rockettheme.com">rockettheme.com</a>
			</div>
		</div>
 	</div>
</div>
<?php mosLoadModules( 'debug', -1 );?>
</body>
</html>
