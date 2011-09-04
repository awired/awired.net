<?php
/*
 * @version $Id: admin.sef.html.php,v 1.6 2005/02/01 14:48:48 marlboroman_2k Exp $
 *
 * 404 SEF for MOS 4.5.1
 *
 * Author:	W.H.Welch <marlboroman_2k@yahoo.com>
 * Copyright:	2004 W.H.Welch
 * License:	GNU General Public License
 */


/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* @package Mambo_4.5.1
*/
class HTML_sef {
	function configuration(&$lists, $txt404) {
	global $sefconfig, $sef_config_file;
	?>
		<table class="adminheading">
		<tr><th>
		<?php
		echo _COM_SEF_TITLE_CONFIG.((file_exists( $sef_config_file )) ? ((is_writable( $sef_config_file )) ? _COM_SEF_WRITEABLE : _COM_SEF_UNWRITEABLE ) : _COM_SEF_USING_DEFAULT)
		?>
		<br/><font class="small" align="left"><a href="index2.php?option=com_sef"><?php echo _COM_SEF_BACK?></a></font>
		</th></tr>
		</table>
		<?php if (!$GLOBALS['mosConfig_sef']) {
	               	echo _COM_SEF_DISABLED;
	       	}
	       	$x=0;
	       	?>
	        <div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
	        <script language="Javascript" src="<?php echo $GLOBALS['mosConfig_live_site']; ?>/includes/js/overlib_mini.js"></script>

	        <script language="Javascript">
				    function submitbutton(pressbutton) {

							<?php getEditorContents( 'editor1', 'introtext' ) ; ?>
							submitform( pressbutton );
					}
					//-->
					</script>

	        <form action="index2.php?option=com_sef&task=saveconfig" method="post" name="adminForm" id="adminForm">

        <table class="adminform">
	        <tr>
	            <th colspan="4"><?php echo _COM_SEF_TITLE_BASIC; ?></th>
	        </tr>
	        <?php //Dit zit hier niet goed; ?>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_ENABLED;?>?</td>
	            <td width="100"><?php echo $lists['enabled'];?></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_ENABLED,_COM_SEF_ENABLED);?></td>
	            <td rowspan="9" valign="top" align="right"><b>
	             <?php echo _COM_SEF_DEF_404_PAGE;?></b><br/><br/>
			<?php
			// parameters : areaname, content, hidden field, width, height, cols, rows
			editorArea( 'editor1',  $txt404, 'introtext','450','150','50','11' );
			?>
	            </td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_REPLACE_CHAR;?></td>
	            <td width="100"><input type="text" name="replacement" value="<?php echo $sefconfig->replacement;?>" size="1" maxlength="1"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_REPLACE_CHAR,_COM_SEF_REPLACE_CHAR);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_PAGEREP_CHAR;?></td>
	            <td width="100"><input type="text" name="pagerep" value="<?php echo $sefconfig->pagerep;?>" size="1" maxlength="1"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_PAGEREP_CHAR,_COM_SEF_PAGEREP_CHAR);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_STRIP_CHAR;?></td>
	            <td width="100"><input type="text" name="stripthese" value="<?php echo $sefconfig->stripthese;?>" size="60" maxlength="255"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_STRIP_CHAR,_COM_SEF_STRIP_CHAR);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_FRIENDTRIM_CHAR;?></td>
	            <td width="100"><input type="text" name="friendlytrim" value="<?php echo $sefconfig->friendlytrim;?>" size="60" maxlength="255"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_FRIENDTRIM_CHAR,_COM_SEF_FRIENDTRIM_CHAR);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_USE_ALIAS;?>?</td>
	            <td width="100"><?php echo $lists['usealias'];?></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_USE_ALIAS,_COM_SEF_USE_ALIAS);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_SUFFIX;?></td>
	            <td width="100"><input type="text" name="suffix" value="<?php echo $sefconfig->suffix; ?>" size="6" maxlength="6"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_SUFFIX,_COM_SEF_SUFFIX);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_ADDFILE;?></td>
	            <td width="100"><input type="text" name="addFile" value="<?php echo $sefconfig->addFile; ?>" size="60" maxlength="60"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_ADDFILE,_COM_SEF_ADDFILE);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_PAGETEXT;?></td>
	            <td width="100"><input type="text" name="pagetext" value="<?php echo $sefconfig->pagetext; ?>" size="10" maxlength="20"></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_PAGETEXT,_COM_SEF_PAGETEXT);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_LOWER;?>?</td>
	            <td width="100"><?php echo $lists['lowercase'];?></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_LOWER,_COM_SEF_LOWER);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_SHOW_SECT;?>?</td>
	            <td width="100"><?php echo $lists['showsection'];?></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_SHOW_SECT,_COM_SEF_SHOW_SECT);?></td>
	        </tr>
	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_SHOW_CAT;?>?</td>
	            <td width="100"><?php echo $lists['showcat'];?></td>
	            <td><?php echo mosToolTip(_COM_SEF_TT_HIDE_CAT,_COM_SEF_SHOW_CAT);?></td>
	        </tr>

	        <tr<?php $x++; echo (($x % 2) ? '':' class="row1"' );?>>
	            <td width="200"><?php echo _COM_SEF_404PAGE;?></td>
	            <td width="100"><?php echo $lists['page404'];?></td>
	            <td>
	            <?php echo mosToolTip(_COM_SEF_TT_404PAGE,_COM_SEF_404PAGE);?>
	            </td>
	        </tr>
	        <tr>
	            <th colspan="4"><?php echo _COM_SEF_TITLE_ADV;?></th>
	        </tr>
	<?php
		foreach($lists['adv_config'] as $key=>$option) {
			$x++;
			echo '<tr'.(($x % 2) ? '':' class="row1"' ).">\n";
			echo '<td width="200">'.$key."</td>\n";
			echo '<td width="100">'.$option."</td>\n";
			echo "<td>".mosToolTip(_COM_SEF_TT_ADV,_COM_SEF_TT_ADV4.$key)."</td>\n";
			echo "<td></td>\n";
	        	echo "</tr>\n";
		}
	?>
	        <tr>
	            <th colspan="4"></th>
	        </tr>
	        <input type="hidden" name="id" value="">
	        <input type="hidden" name="task" value="saveconfig">
	        <input type="hidden" name="option" value="com_sef">
	        <input type="hidden" name="section" value="config">
	    </form>
    <?php
	}
	function viewSEF( &$rows, &$lists, $pageNav, $option, $viewmode=0 ) {
	global $my;
		?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			<?php echo _COM_SEF_TITLE_MANAGER;?>
			<br/><font class="small" align="left"><a href="index2.php?option=com_sef"><?php echo _COM_SEF_BACK?></a></font>
			</th>
			<td nowrap >
			<?php
			if ($viewmode == 2) {
			?><br/>
			<a href="index2.php?option=<?php echo $option; ?>&task=import_export"><?php echo _COM_SEF_IMPORT_EXPORT; ?></a>&nbsp;&nbsp;
			<?php }else{
			?>
			&nbsp;
			</td>
			<?php }
			?>
			<td width="right">
			<?php echo _COM_SEF_VIEWMODE.$lists['viewmode'];?>
			</td>
			<td width="right">
			<?php echo _COM_SEF_SORTBY.$lists['sortby'];?>
			</td>
		</tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="20px">
			#
			</th>
			<th width="20px">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			<th class="title" width="50px">
			<?php echo _COM_SEF_HITS;?>
			</th>
			<th class="title">
			<?php echo (($viewmode == 1) ? _COM_SEF_DATEADD: _COM_SEF_SEFURL) ?>
			</th>
			<th>
			<?php echo (($viewmode == 1) ? _COM_SEF_URL:_COM_SEF_REALURL ) ?>
			</th>
		</tr>
		<?php
		$k = 0;
		//for ($i=0, $n=count( $rows ); $i < $n; $i++) {
		foreach (array_keys($rows) as $i) {
			$row = &$rows[$i];
			?>
			<tr class="<?php echo 'row'. $k; ?>">
				<td align="center">
				<?php echo $pageNav->rowNumber( $i ); ?>
				</td>
				<td>
				<?php echo mosHTML::idBox( $i, $row->id, false ); ?>
				</td>
				<td>
				<?php echo $row->cpt; ?>
				</td>
				<td style="text-align:left;">
				<?php if ($viewmode == 1) {?>
					<?php echo $row->dateadd;?>
				<?php }else{ ?>
					<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')">
					<?php echo $row->oldurl;?>
					</a>
				<?php } ?>
				</td>
				<td style="text-align:left;" width="80%">
				<?php if ($viewmode == 1) {?>
					<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')">
					<?php echo $row->oldurl;?>
					</a>
				<?php }else echo $row->newurl;?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		}
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>

		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="view" />
		<input type="hidden" name="boxchecked" value="0" />
		</form>
		<?php
	}

	function editSEF( &$_row, &$lists, $_option ) {

?>
	<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
	<script language="Javascript" src="<?php echo $GLOBALS['mosConfig_live_site']; ?>/includes/js/overlib_mini.js"></script>
	<script language="javascript">
	<!--
	function changeDisplayImage() {
		if (document.adminForm.imageurl.value !='') {
			document.adminForm.imagelib.src='../images/404sef/' + document.adminForm.imageurl.value;
		} else {
			document.adminForm.imagelib.src='images/blank.png';
		}
	}
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		// do field validation
<?php if ( ($_row->id) && $_row->dateadd == "0000-00-00" ) { ?>
		if (form.customurl.checked ) {
			form.dateadd.value = "<?php echo date('Y-m-d'); ?>"
		}else{
			form.dateadd.value = "0000-00-00"
		}
<?php } ?>
		if (form.newurl.value == "") {
			alert( "<?php echo _COM_SEF_EMPTYURL?>" );
		} else {
			if (form.newurl.value.match(/^index.php/)) {
				submitform( pressbutton );
			}else{
				alert( "<?php echo _COM_SEF_BADURL ?>" );
			}
		}
	}
	//-->
	</script>
	<table class="adminheading">
		<tr>
			<th>404 SEF <?php echo $_row->id ? _COM_SEF_EDIT : _COM_SEF_ADD;?> Url</th>
		</tr>
	</table>
	<form action="index2.php" method="post" name="adminForm">
	<table class="adminform">
		<tr>
			<td width="20%"><?php echo _COM_SEF_NEWURL;?></td>
			<td width="70%"><input class="inputbox" type="text" size="100" name="oldurl" value="<?php echo $_row->oldurl; ?>">
			<?php echo mosToolTip(_COM_SEF_TT_NEWURL);?></td>
			<td width="10%">&nbsp;</td>
		</tr>
		<tr>
			<td><?php echo _COM_SEF_OLDURL;?></td>
			<td align="left"><input class="inputbox" type="text" size="100" name="newurl" value="<?php echo $_row->newurl; ?>">
			<?php echo mosToolTip(_COM_SEF_TT_OLDURL);?>
			<?php echo ( ($_row->id) && $_row->dateadd == "0000-00-00" ) ? '<br />'._COM_SEF_SAVEAS.'<input type="checkbox" name="customurl" value="0">' : '';?>
			</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
	</table>

	<input type="hidden" name="option" value="<?php echo $_option; ?>">
	<input type="hidden" name="dateadd" value="<?php echo $_row->dateadd; ?>">
	<input type="hidden" name="id" value="<?php echo $_row->id; ?>">
	<input type="hidden" name="task" value="">
	</form>
<?php
	}
	function help(){
	?>
		 <table class="adminform">
	        <tr>
	            <th colspan="4"><?php echo _COM_SEF_TITLE_SUPPORT;?></th>
	        </tr>
	        <tr>
	        	<td>
	        	<ol><?php echo _COM_SEF_HELPVIA;?>
	        		<li><a href="http://www.ty2u.com/" target="_blank">TY2U.com - 404SEFx</a></li>
	        		<li><a href="http://404sef.whw3.com:8080/" target="_blank"><?php echo _COM_SEF_OFFICIAL;?></a></li>
	        		<li><a href="http://www.mambers.com/search.php?query=404sef" target="_blank"><?php echo _COM_SEF_MAMBERS;?></a></li>
	        	</ol>
	        </tr>
	<?php
	}
	function purge($option, $message, $confirmed){
	?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			<?php echo _COM_SEF_TITLE_PURGE;?>
			<br/><font class="small" align="left"><a href="index2.php?option=com_sef"><?php echo _COM_SEF_BACK?></a></font>
			</th>
		</tr>
		<tr>
			<td><p class="message"><?php echo $message ?><br/>
				<input type="hidden" name="option" value="<?php echo $option;?>" />
			<?php if (($message == _COM_SEF_SUCCESSPURGE)||($message == _COM_SEF_NORECORDS)) { ?>
				<input type="hidden" name="task" value="" />
				<input type="submit" name="continue" value="<?php echo _COM_SEF_OK ?>"</p>
			<?php }else{ ?>
				<input type="hidden" name="task" value="purge" />
				<input type="submit" name="confirmed" value="<?php echo _COM_SEF_PROCEED ?>"</p>
			<?php } ?>
			</td>
		</tr>

	<?php
	}
	function import_export() {
?>
<script type="text/javascript">
function checkForm(){
if (document.backupform.userfile.value == ""){
alert('<?php echo _COM_SEF_SELECT_FILE; ?>');
return false;
}else{
return true;
}
}
function toggle_display(idname){
obj = fetch_object(idname);
if (obj){
if (obj.style.display == "none"){
obj.style.display = "";
}else{
obj.style.display = "none";
}
}
return false;
}
</script>
<center>
<form method="post" action="index2.php?option=com_sef&task=import" enctype="multipart/form-data" onSubmit="return checkForm();" name="backupform">
<input type="file" name="userfile">
<input type="submit" value="<?php echo _COM_SEF_IMPORT; ?>">
</form>
<input type="button" value="<?php echo _COM_SEF_EXPORT; ?>" onClick="javascript:location.href='index2.php?option=com_sef&task=export'"></center>
<?php
	}
}
?>
