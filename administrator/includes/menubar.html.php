<?php
/**
* @version $Id: menubar.html.php 4675 2006-08-23 16:55:24Z stingrey $
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

/**
* Utility class for the button bar
* @package Joomla
*/
class mosMenuBar {

	/**
	* Writes the start of the button bar table
	*/
	function startTable() {
		?>
		<table cellpadding="0" cellspacing="0" border="0" id="toolbar">
		<tr valign="middle" align="center">
		<?php
	}

	/**
	* Writes a custom option and task button for the button bar
	* @param string The task to perform (picked up by the switch($task) blocks
	* @param string The image to display
	* @param string The image to display when moused over
	* @param string The alt text for the icon image
	* @param boolean True if required to check that a standard list item is checked
	*/
	function custom( $task='', $icon='', $iconOver='', $alt='', $listSelect=true ) {
		$icon 	= ( $iconOver ? $iconOver : $icon );
		$image 	= mosAdminMenus::ImageCheckAdmin( $icon, '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		
		if ($listSelect) {
			$href = "javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � $alt');}else{submitbutton('$task')}";
		} else {
			$href = "javascript:submitbutton('$task')";
		}
		
		if ($icon && $iconOver) {
			?>
			<td>
				<a class="toolbar" href="<?php echo $href;?>">
					<?php echo $image; ?>
					<br /><?php echo $alt; ?></a>
			</td>
			<?php
		} else {
			?>
			<td>
				<a class="toolbar" href="<?php echo $href;?>">
					<br /><?php echo $alt; ?></a>
			</td>
			<?php
		}
	}

	/**
	* Writes a custom option and task button for the button bar.
	* Extended version of custom() calling hideMainMenu() before submitbutton().
	* @param string The task to perform (picked up by the switch($task) blocks
	* @param string The image to display
	* @param string The image to display when moused over
	* @param string The alt text for the icon image
	* @param boolean True if required to check that a standard list item is checked
	*/
	function customX( $task='', $icon='', $iconOver='', $alt='', $listSelect=true ) {
		$icon 	= ( $iconOver ? $iconOver : $icon );
		$image 	= mosAdminMenus::ImageCheckAdmin( $icon, '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		
		if ($listSelect) {
			$href = "javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � $alt');}else{hideMainMenu();submitbutton('$task')}";
		} else {
			$href = "javascript:hideMainMenu();submitbutton('$task')";
		}
		
		if ($icon && $iconOver) {
			?>
			<td>
				<a class="toolbar" href="<?php echo $href;?>">
					<?php echo $image; ?>
					<br /><?php echo $alt; ?></a>
			</td>
			<?php
		} else {
			?>
			<td>
				<a class="toolbar" href="<?php echo $href;?>">
					<br /><?php echo $alt; ?></a>
			</td>
			<?php
		}
	}

	/**
	* Writes the common 'new' icon for the button bar
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function addNew( $task='new', $alt='Nouveau' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'new_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes the common 'new' icon for the button bar.
	* Extended version of addNew() calling hideMainMenu() before submitbutton().
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function addNewX( $task='new', $alt='Nouveau' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'new_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:hideMainMenu();submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'publish' button
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function publish( $task='publish', $alt='Publier' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'publish_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'publish' button for a list of records
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function publishList( $task='publish', $alt='Publier' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'publish_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
	 	<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � publier'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
	 	<?php
	}

	/**
	* Writes a common 'default' button for a record
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function makeDefault( $task='default', $alt='D&eacute;faut' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'publish_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment par d�faut'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'assign' button for a record
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function assign( $task='assign', $alt='Assigner' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'publish_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � assigner'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'unpublish' button
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function unpublish( $task='unpublish', $alt='D&eacute;publier' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'unpublish_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'unpublish' button for a list of records
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function unpublishList( $task='unpublish', $alt='D&eacute;publier' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'unpublish_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � d�publier'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'archive' button for a list of records
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function archiveList( $task='archive', $alt='Archive' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'archive_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � archiver'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes an unarchive button for a list of records
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function unarchiveList( $task='unarchive', $alt='D&eacute;sarchiver' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'unarchive_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � d�sarchiver'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'edit' button for a list of records
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function editList( $task='edit', $alt='Editer' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'edit_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � �diter'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'edit' button for a list of records.
	* Extended version of editList() calling hideMainMenu() before submitbutton().
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function editListX( $task='edit', $alt='Editer' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'edit_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � �diter'); } else {hideMainMenu();submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'edit' button for a template html
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function editHtml( $task='edit_source', $alt='Editer&nbsp;HTML' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'html_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � �diter'); } else {submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'edit' button for a template html.
	* Extended version of editHtml() calling hideMainMenu() before submitbutton().
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function editHtmlX( $task='edit_source', $alt='Editer&nbsp;HTML' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'html_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � �diter'); } else {hideMainMenu();submitbutton('<?php echo $task;?>', '');}"">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'edit' button for a template css
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function editCss( $task='edit_css', $alt='Editer&nbsp;CSS' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'css_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � �diter'); } else {submitbutton('<?php echo $task;?>', '');}"">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'edit' button for a template css.
	* Extended version of editCss() calling hideMainMenu() before submitbutton().
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function editCssX( $task='edit_css', $alt='Editer&nbsp;CSS' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'css_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste un �l�ment � �diter'); } else {hideMainMenu();submitbutton('<?php echo $task;?>', '');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'delete' button for a list of records
	* @param string  Postscript for the 'are you sure' message
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function deleteList( $msg='', $task='remove', $alt='Supprimer' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'delete_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � supprimer'); } else if (confirm('Etes-vous certain de vouloir supprimer les �l�ments s�lectionn�s? <?php echo $msg;?>')){ submitbutton('<?php echo $task;?>');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a common 'delete' button for a list of records.
	* Extended version of deleteList() calling hideMainMenu() before submitbutton().
	* @param string  Postscript for the 'are you sure' message
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function deleteListX( $msg='', $task='remove', $alt='Supprimer' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'delete_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � supprimer'); } else if (confirm('Etes-vous certain de vouloir supprimer les �l�ments s�lectionn�s? <?php echo $msg;?>')){ hideMainMenu();submitbutton('<?php echo $task;?>');}">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Write a trash button that will move items to Trash Manager
	*/
	function trash( $task='remove', $alt='Corbeille', $check=true ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'delete_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		
		if ( $check ) {
			$js = "javascript:if (document.adminForm.boxchecked.value == 0){ alert('Merci de s�lectionner dans la liste les �l�ments � placer dans la corbeille'); } else { submitbutton('$task');}";
		} else {
			$js = "javascript:submitbutton('$task');";
		}
		
		?>
		 <td>
			<a class="toolbar" href="<?php echo $js; ?>">
				<?php echo $image2; ?>
				<br /><?php echo $alt; ?></a>
		</td>
		<?php
	}

	/**
	* Writes a preview button for a given option (opens a popup window)
	* @param string The name of the popup file (excluding the file extension)
	*/
	function preview( $popup='', $updateEditors=false ) {
		global $database;
		$image2 = mosAdminMenus::ImageCheckAdmin( 'preview_f2.png', '/administrator/images/', NULL, NULL, 'Aper�u', 'preview', 1, 'middle', 'Preview' );

		$sql = "SELECT template"
		. "\n FROM #__templates_menu"
		. "\n WHERE client_id = 0"
		. "\n AND menuid = 0";
		$database->setQuery( $sql );
		$cur_template = $database->loadResult();	
		?>
		<td>
			<script language="javascript" type="text/javascript">
			<!--
			function popup() {
				<?php
				if ($updateEditors) {
					getEditorContents( 'editor1', 'introtext' );
					getEditorContents( 'editor2', 'fulltext' );
				}
				?>
				window.open('popups/<?php echo $popup;?>.php?t=<?php echo $cur_template; ?>', 'win1', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
			}
			//-->
			</script>
		 	<a class="toolbar" href="#" onclick="popup();">
				<?php echo $image2; ?>
				<br />Aper&ccedil;u</a>
		</td>
		<?php
	}

	/**
	* Writes a preview button for a given option (opens a popup window)
	* @param string The name of the popup file (excluding the file extension for an xml file)
	* @param boolean Use the help file in the component directory
	*/
	function help( $ref, $com=false ) {
		global $mosConfig_live_site;
		$image2 	= mosAdminMenus::ImageCheckAdmin( 'help_f2.png', '/administrator/images/', NULL, NULL, 'Aide', 'help', 1, 'middle', 'Help' );
		$helpUrl 	= mosGetParam( $GLOBALS, 'mosConfig_helpurl', '' );
		
		if ( $helpUrl == 'http://help.mamboserver.com' ) {
			$helpUrl = 'http://help.joomla.org';
		}
				
		if ($com) {
	   // help file for 3PD Components
			$url = $mosConfig_live_site . '/administrator/components/' . $GLOBALS['option'] . '/help/';
			if (!eregi( '\.html$', $ref ) && !eregi( '\.xml$', $ref )) {
				$ref = $ref . '.html';
			}
			$url .= $ref;
		} else if ( $helpUrl ) {
	   // Online help site as defined in GC
			$ref .= $GLOBALS['_VERSION']->getHelpVersion();
			$url = $helpUrl . '/index2.php?option=com_content&amp;task=findkey&amp;pop=1&amp;keyref=' . urlencode( $ref );
		} else {
	   // Included html help files
			$url = $mosConfig_live_site . '/help/';
			if (!eregi( '\.html$', $ref ) && !eregi( '\.xml$', $ref )) {
			$ref = $ref . '.html';
			}			
			$url .= $ref;
		}
		?>
		<td>
			<a class="toolbar" href="#" onclick="window.open('<?php echo $url;?>', 'mambo_help_win', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');">
				<?php echo $image2; ?>
				<br />Aide</a>
		</td>
		<?php
	}

	/**
	* Writes a save button for a given option
	* Apply operation leads to a save action only (does not leave edit mode)
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function apply( $task='apply', $alt='Appliquer' ) {
		$image 	= mosAdminMenus::ImageCheckAdmin( 'apply.png', '/administrator/images/', NULL, NULL, $alt, $task );
		$image2 = mosAdminMenus::ImageCheckAdmin( 'apply_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt;?></a>
		</td>
		<?php
	}

	/**
	* Writes a save button for a given option
	* Save operation leads to a save and then close action
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function save( $task='save', $alt='Sauver' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'save_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt;?></a>
		</td>
		<?php
	}

	/**
	* Writes a save button for a given option (NOTE this is being deprecated)
	*/
	function savenew() {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'save_f2.png', '/administrator/images/', NULL, NULL, 'Sauver', 'save', 1 );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('savenew');">
				<?php echo $image2; ?>
				<br />Sauver</a>
		</td>
		<?php
	}

	/**
	* Writes a save button for a given option (NOTE this is being deprecated)
	*/
	function saveedit() {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'save_f2.png', '/administrator/images/', NULL, NULL, 'Sauver', 'save', 1 );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('saveedit');">
				<?php echo $image2; ?>
				<br />Sauver</a>
		</td>
		<?php
	}

	/**
	* Writes a cancel button and invokes a cancel operation (eg a checkin)
	* @param string An override for the task
	* @param string An override for the alt text
	*/
	function cancel( $task='cancel', $alt='Annuler' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'cancel_f2.png', '/administrator/images/', NULL, NULL, $alt, $task, 1, 'middle', $alt );
		?>
		<td>
			<a class="toolbar" href="javascript:submitbutton('<?php echo $task;?>');">
				<?php echo $image2; ?>
				<br /><?php echo $alt;?></a>
		</td>
		<?php
	}

	/**
	* Writes a cancel button that will go back to the previous page without doing
	* any other operation
	*/
	function back( $alt='Retour', $href='' ) {
		$image2 = mosAdminMenus::ImageCheckAdmin( 'back_f2.png', '/administrator/images/', NULL, NULL, 'Retour', 'cancel', 1, 'middle', $alt );
		if ( $href ) {
			$link = $href;
		} else {
			$link = 'javascript:window.history.back();';
		}
		?>
		<td>
			<a class="toolbar" href="<?php echo $link; ?>">
				<?php echo $image2; ?>
				<br /><?php echo $alt;?></a>
		</td>
		<?php
	}

	/**
	* Write a divider between menu buttons
	*/
	function divider() {
		$image = mosAdminMenus::ImageCheckAdmin( 'menu_divider.png', '/administrator/images/' );
		?>
		<td>
			<?php echo $image; ?>
		</td>
		<?php
	}

	/**
	* Writes a media_manager button
	* @param string The sub-drectory to upload the media to
	*/
	function media_manager( $directory='', $alt='Upload' ) {
		global $database, $mainframe;
		
		$cur_template = $mainframe->getTemplate();
		
		$image2 = mosAdminMenus::ImageCheckAdmin( 'upload_f2.png', '/administrator/images/', NULL, NULL, 'Upload Image', 'uploadPic', 1 );
		?>
		<td>
			<a class="toolbar" href="#" onclick="popupWindow('popups/uploadimage.php?directory=<?php echo $directory; ?>&amp;t=<?php echo $cur_template; ?>','win1',250,100,'no');">
				<?php echo $image2; ?>
				<br /><?php echo $alt;?></a>
		</td>
		<?php
	}

	/**
	* Writes a spacer cell
	* @param string The width for the cell
	*/
	function spacer( $width='' ) {
		if ($width != '') {
			?>
			<td width="<?php echo $width;?>">&nbsp;</td>
			<?php
		} else {
			?>
			<td>&nbsp;</td>
			<?php
		}
	}

	/**
	* Writes the end of the menu bar table
	*/
	function endTable() {
		?>
		</tr>
		</table>
		<?php
	}
}
?>