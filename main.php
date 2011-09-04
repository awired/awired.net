<?php if (isset($DOKU_TPL)==FALSE) $DOKU_TPL = DOKU_TPL; if (isset($DOKU_TPLINC)==FALSE) $DOKU_TPLINC = DOKU_TPLINC; ?>
<?php if (file_exists(DOKU_PLUGIN.'displaywikipage/code.php')) include_once(DOKU_PLUGIN.'displaywikipage/code.php'); ?>
<?php if (file_exists(DOKU_PLUGIN.'referrers/code.php')) include_once(DOKU_PLUGIN.'referrers/code.php'); ?>
<?php
@include(dirname(__FILE__).'/string_fn.php');
@include(dirname(__FILE__).'/lang/en/lang.php'); if ( $conf['lang'] && $conf['lang'] != 'en' ) @include(dirname(__FILE__).'/lang/'.$conf['lang'].'/lang.php');
@include(dirname(__FILE__).'/context.php');

if (beginsWith(getenv(HTTP_USER_AGENT), 'NG/'))
{
    echo "<html><body><h3>You have been temporarily blocked from this server.</h3></body></html>";
} else
if (beginsWith(getenv(HTTP_USER_AGENT), 'Java'))
{
    echo "<html><body><h3>You have been temporarily blocked from this server.</h3></body></html>";
} else
if (beginsWith(getenv(HTTP_USER_AGENT), 'libwww-perl'))
{
    echo "<html><body><h3>You have been temporarily blocked from this server.</h3></body></html>";
} else
if (beginsWith(getenv(REMOTE_ADDR), '59.95.'))
{
    echo "<html><body><h3>You have been temporarily blocked from this server.</h3></body></html>";
} else
if (beginsWith(getenv(REMOTE_ADDR), '217.16.'))
{
    echo "<html><body><h3>You have been temporarily blocked from this server.</h3></body></html>";
} else
if (beginsWith(getenv(HTTP_USER_AGENT), 'StackRambler')) {
    echo "<html><body><h3>You have been temporarily blocked from this server.</h3></body></html>";
} else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
	<head>
		<?php if (function_exists('re_log_referrers')) re_log_referrers(); ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php tpl_metaheaders()?>
		<title><?php tpl_pagetitle()?> - <?php echo hsc($conf['title'])?></title>
		<?php if (file_exists(dirname(__FILE__).'/user/favicon.ico')) { ?>
			<link rel="shortcut icon" href="/favicon.ico" />
		<?php } ?>
		<style type="text/css" media="screen,projection">/*<![CDATA[*/ @import "<?php echo $DOKU_TPL?>monobook/main.css"; /*]]>*/</style>

		<link rel="stylesheet" type="text/css" <?php if ($_REQUEST['mbdo'] != 'print') { echo 'media="print"'; } ?> href="<?php echo $DOKU_TPL?>common/commonPrint.css" />
		<link rel="stylesheet" type="text/css" <?php if ($_REQUEST['mbdo'] != 'print') { echo 'media="print"'; } ?> href="<?php echo $DOKU_TPL?>common/print.css" />
<?php if ($lang['direction'] == 'rtl') { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $DOKU_TPL?>common/common_rtl.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $DOKU_TPL?>monobook/rtl.css" />
<?php } ?>

		<script type="text/javascript" src="<?php echo $DOKU_TPL?>common/wikibits.js"></script>
		<style type="text/css" media="screen,projection">/*<![CDATA[*/
<?php if (file_exists(dirname(__FILE__).'/wikipedia/'.$conf['lang'].'/Common.css')) { ?>
		@import "<?php echo $DOKU_TPL?>wikipedia/<?php echo $conf['lang']?>/Common.css";
		@import "<?php echo $DOKU_TPL?>wikipedia/<?php echo $conf['lang']?>/Monobook.css";
<?php } else { ?>
		@import "<?php echo $DOKU_TPL?>wikipedia/en/Common.css";
		@import "<?php echo $DOKU_TPL?>wikipedia/en/Monobook.css";
<?php } ?>
		@import "<?php echo $DOKU_TPL?>dokuwiki/doku.css";
		@import "<?php echo $DOKU_TPL?>lang/<?php echo $conf['lang'];?>/lang.css";
		@import "<?php echo $DOKU_TPL?>user/Common.css";
		@import "<?php echo $DOKU_TPL?>user/Monobook.css";
		/*]]>*/</style>
    <!--[if lt IE 5.5000]><style type="text/css">@import "<?php echo $DOKU_TPL?>monobook/IE50Fixes.css";</style><![endif]-->
    <!--[if IE 5.5000]><style type="text/css">@import "<?php echo $DOKU_TPL?>monobook/IE55Fixes.css";</style><![endif]-->
    <!--[if IE 6]><style type="text/css">@import "<?php echo $DOKU_TPL?>monobook/IE60Fixes.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css">@import "<?php echo $DOKU_TPL?>monobook/IE70Fixes.css";</style><![endif]-->
    <!--[if lt IE 7]><script type="text/javascript" src="<?php echo $DOKU_TPL?>common/IEFixes.js"></script>

    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->
<?php
if (file_exists(DOKU_PLUGIN.'googleanalytics/code.php')) include_once(DOKU_PLUGIN.'googleanalytics/code.php');
if (function_exists('ga_google_analytics_code')) ga_google_analytics_code();
?>
	</head>
	<body class="<?php echo $monobook['nsclass']; ?>">


    <div id="globalWrapper2">
		<div id="globalWrapper">
			<div id="column-content">
				<div id="content">
					<a name="top" id="top"></a>
					
					<?php if (tpl_getConf('mb_use_sitenotice')) { ?><div id="siteNotice"><?php if (function_exists('dwp_display_wiki_page')) dwp_display_wiki_page(tpl_getConf('mb_sitenotice_location')); ?></div><?php } ?>

					<div id="bodyContent">
						<div class="dokuwiki">
							<!-- start content -->
							<?php html_msgarea()?>
<?php if ($_REQUEST['mbdo'] == 'cite')
@include(dirname(__FILE__).'/do_cite.php');
else if ($_REQUEST['mbdo'] == 'detail')
@include(dirname(__FILE__).'/do_detail.php');
else if ($_REQUEST['mbdo'] == 'media')
@include(dirname(__FILE__).'/do_media.php');
else
tpl_content();
?>
<br/>
							<?php if (tpl_getConf('mb_bc_loc') == 'bottom')  { if ($conf['breadcrumbs']) { ?><div id="catlinks"><p class="catlinks"><?php tpl_breadcrumbs(); ?></p></div><?php } } ?>
							<?php if (tpl_getConf('mb_hbc_loc') == 'bottom') { if ($conf['youarehere']) { ?><div id="catlinks"><p class="catlinks"><?php tpl_youarehere(); ?></p></div><?php } } ?>
							<!-- end content -->
							<div class="visualClear"></div>
						</div>
					</div>
				</div>
			</div>

			<div id="column-one">
				<div class="portlet" id="p-logo">
					<a style="background-image: url(<?php echo $DOKU_TPL?>images/awired.png);"
						href="<?php echo DOKU_BASE?>" accesskey="h" title="[ALT+H]">
					</a>
				</div>

				<?php writeMBPortlet($monobook['content_actions'], 'p-cactions', $lang['monobook_bar_views'], 'ca', '1'); ?>
<?php if (tpl_getConf('mb_use_navigation')) { ?>
<div id="p-x-navigation" class="portlet"> <h5><?php echo $lang['monobook_bar_navigation']; ?></h5><div class="pBody">
<?php if (function_exists('dwp_display_wiki_page')) dwp_display_wiki_page(tpl_getConf('mb_navigation_location')); ?>
</div></div>
<?php } ?>

<div id="p-articles" class="portlet"> <h5>Articles et Tutoriaux</h5><div class="pBody">
<?php if (function_exists('dwp_display_wiki_page')) dwp_display_wiki_page(":wiki:tpl:articles"); ?>
</div></div>


<div id="p-articles" class="portlet"> <h5>Projets</h5><div class="pBody">
<?php if (function_exists('dwp_display_wiki_page')) dwp_display_wiki_page(":wiki:tpl:projets"); ?>
</div></div>

<?php 
writeMBPortlet($monobook['personal'], 'p-personal', $lang['monobook_bar_personnaltools'], 'pt'); 
?>

<?php if (tpl_getConf('mb_use_search')) { ?>
<div id="p-search">
        <form action="<?php echo DOKU_BASE.DOKU_SCRIPT;?>" accept-charset="utf-8" id="dw__search" name="search">
            <input type="hidden" name="do" value="search" />
            <input id="qsearch__in" name="id" type="text" accesskey="f" value="" />
            <!--input type='button' class="searchButton" id="searchGoButton" value="<?php echo $lang['monobook_btn_go']?>" onclick="document.location.href='<?php echo DOKU_BASE?>' + document.search.qsearch__in.value;" /-->
            <input type='submit' name="fulltext" class="searchButton" value="<?php echo $lang['monobook_btn_search']?>" />
            &nbsp;&nbsp;
        </form>
</div>
<?php } ?>


<div id="p-youare">
<?php if (tpl_getConf('mb_bc_loc') == 'top')  { if ($conf['breadcrumbs']) { ?><p class="catlinks"><?php tpl_breadcrumbs(); ?></p><?php } } ?>
<?php if (tpl_getConf('mb_hbc_loc') == 'top') { if ($conf['youarehere']) { ?><p class="catlinks"><?php tpl_youarehere(); ?></p><?php } } ?>
</div>

<div id="qsearch__out" class="ajax_qsearch JSpopup"></div>

<div id="topgrey"><!-- --></div>

<?php if (tpl_getConf('mb_use_toolbox')) { ?>
<?php if (tpl_getConf('mb_use_defaulttoolbox')) { ?>
<?php writeMBPortlet($monobook['defaulttoolbox'], 'p-tb', $lang['monobook_bar_toolbox'], 'tb'); ?>
<?php } else { ?>
<div id="p-tb" class="portlet"> <h5><?php echo $lang['monobook_bar_toolbox']; ?></h5><div class="pBody">
<?php if (function_exists('dwp_display_wiki_page')) dwp_display_wiki_page(tpl_getConf('mb_toolbox_location')); ?>
</div></div>
<?php } ?>
<?php } ?>





<!--
<div id="p-tb" class="portlet"> <h5><div class="pBody">
<?php
$translation = &plugin_load('syntax','translation');
echo $translation->_showTranslations();
?></div></div>
-->



			</div>
			<!-- end of the left (by default at least) column -->
			<div class="visualClear"></div>

</div>
</div>

<div id="footer">
    <ul id="f-list">
        <li id="lastmod" style="float:left"><a href="<?php echo DOKU_BASE.DOKU_SCRIPT."?id=".$ID."&amp;do=revisions"; ?>"><?php tpl_pageinfo()?></a></li>
        <li id="copyright"  style="float:right"><?php if (tpl_getConf('mb_use_copyright')) { ?>
        		<?php if (function_exists('dwp_display_wiki_page')) dwp_display_wiki_page(tpl_getConf('mb_copyright_location'), "inline"); ?>
        	<?php } ?></li>
    </ul>
</div>




		<!--
style="visibility:hidden;"
<?php tpl_indexerWebBug(); ?>
-->
<a href="<?php echo DOKU_BASE.DOKU_SCRIPT;?>?do=recent" accesskey="r" style="display:none"  rel="nofollow">&nbsp;YOPLA</a>

	</body>
</html>
<?php } ?>