<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
if ( $my->id ) {
	initEditor();
}
mosShowHead();
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/template_css.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 6]>
<link href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/template_ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="shortcut icon" href="<?php echo $mosConfig_live_site;?>/images/favicon.ico" />
</head>
<body id="page_bg">
	<div id="wrapper">
		<div id="header">
			<div class="rk-1">
				<div class="rk-2">
					<a href="<?php echo $mosConfig_live_site;?>" class="nounder"><img src="<?php echo $mosConfig_live_site;?>/images/blank.png" border="0" alt="" id="logo" /></a>
					<div id="top">
						<div class="padding">
							<?php mosLoadModules('top', -1); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="horiz-menu">
			<?php mosLoadModules('user3', -1); ?>	
		</div>
		<div id="mainbody">
			<table class="mainbody" cellspacing="0" cellpadding="0">
				<tr valign="top">
					<td class="mainbody">
						
						<?php if(mosCountModules('user1') or mosCountModules('user2')) : ?>
						<table class="usermodules" cellspacing="15">
							<tr valign="top">
								<?php if(mosCountModules('user1')) : ?>
								<td class="usermodules">
									<?php mosLoadModules('user1', -2); ?>
								</td>
								<?php endif; ?>
								<?php if(mosCountModules('user2')) : ?>
								<td class="usermodules">
									<?php mosLoadModules('user2', -2); ?>
								</td>
								<?php endif; ?>
							</tr>
						</table>
						<?php endif; ?>
						<div class="padding">
							<?php mosPathway(); ?>
							<?php mosMainbody(); ?>
							<?php mosLoadModules('inset', -2); ?>
						</div>
					</td>
					<?php if(mosCountModules('right')) : ?>
					<td class="right">
						<div class="padding">
							<?php mosLoadModules('right', -2); ?>
						</div>
					</td>
					<?php endif; ?>
				</tr>
			</table>
		</div>
		<div id="bottom">
			<?php if(mosCountModules('user4') or mosCountModules('user5') or mosCountModules('user6')) : ?>
			<table class="usermodules" cellspacing="15">
				<tr valign="top">
					<?php if(mosCountModules('user4')) : ?>
					<td class="usermodules">
						<?php mosLoadModules('user4', -2); ?>
					</td>
					<?php endif; ?>
					<?php if(mosCountModules('user5')) : ?>
					<td class="usermodules">
						<?php mosLoadModules('user5', -2); ?>
					</td>
					<?php endif; ?>
					<?php if(mosCountModules('user6')) : ?>
					<td class="usermodules">
						<?php mosLoadModules('user6', -2); ?>
					</td>
					<?php endif; ?>
				</tr>
			</table>
			<?php endif; ?>	
		</div>
		<div id="footer">
			<div class="rk-1">
				<div class="rk-2">
					<div id="the-footer">
						<a href="http://www.rockettheme.com/" title="RocketTheme Joomla Template Club" class="nounder"><img src="<?php echo $mosConfig_live_site;?>/images/blank.png" border="0" alt="RocketTheme Joomla Templates" id="rocket" /></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php mosLoadModules( 'debug', -1 );?>
</body>
</html>