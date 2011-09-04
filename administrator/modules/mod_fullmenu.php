<?php
/**
* @version $Id: mod_fullmenu.php 6070 2006-12-20 02:09:09Z robs $
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

if (!defined( '_JOS_FULLMENU_MODULE' )) {
	/** ensure that functions are declared only once */
	define( '_JOS_FULLMENU_MODULE', 1 );

	/**
	* Full DHTML Admnistrator Menus
	* @package Joomla
	*/
	class mosFullAdminMenu {
		/**
		* Show the menu
		* @param string The current user type
		*/
		function show( $usertype='' ) {
			global $acl, $database;
			global $mosConfig_live_site, $mosConfig_enable_stats, $mosConfig_caching;
	
			// cache some acl checks
			$canConfig 			= $acl->acl_check( 'administration', 'config', 'users', $usertype );
	
			$manageTemplates 	= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_templates' );
			$manageTrash 		= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_trash' );
			$manageMenuMan 		= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_menumanager' );
			$manageLanguages 	= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_languages' );
			$installModules 	= $acl->acl_check( 'administration', 'install', 'users', $usertype, 'modules', 'all' );
			$editAllModules 	= $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'modules', 'all' );
			$installMambots 	= $acl->acl_check( 'administration', 'install', 'users', $usertype, 'mambots', 'all' );
			$editAllMambots 	= $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'mambots', 'all' );
			$installComponents 	= $acl->acl_check( 'administration', 'install', 'users', $usertype, 'components', 'all' );
			$editAllComponents 	= $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'components', 'all' );
			$canMassMail 		= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_massmail' );
			$canManageUsers 	= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_users' );
	
			$query = "SELECT a.id, a.title, a.name"
			. "\n FROM #__sections AS a"
			. "\n WHERE a.scope = 'content'"
			. "\n GROUP BY a.id"
			. "\n ORDER BY a.ordering"
			;
			$database->setQuery( $query );
			$sections = $database->loadObjectList();
			
			$menuTypes = mosAdminMenus::menutypes();
			?>
			<div id="myMenuID"></div>
			<script language="JavaScript" type="text/javascript">
			var myMenu =
			[
			<?php
		// Home Sub-Menu
	?>			[null,'Accueil','index2.php',null,'Panneau de Configuration'],
				_cmSplit,
				<?php
		// Site Sub-Menu
	?>			[null,'Site',null,null,'Gestion du site',
	<?php
				if ($canConfig) {
	?>				['<img src="../includes/js/ThemeOffice/config.png" />','Configuration du Site','index2.php?option=com_config&hidemainmenu=1',null,'Configuration'],
	<?php
				}
				if ($manageLanguages) {
	?>				['<img src="../includes/js/ThemeOffice/language.png" />','Gestion des Langues',null,null,'Gérer les langues',
	  					['<img src="../includes/js/ThemeOffice/language.png" />','Gestion des Langues','index2.php?option=com_languages',null,'Gérer les langues'],
	   				],
	<?php
				}
	?>				['<img src="../includes/js/ThemeOffice/media.png" />','Gestion des Médias','index2.php?option=com_media',null,'Gérer les fichiers'],
						['<img src="../includes/js/ThemeOffice/preview.png" />', 'Aperçu', null, null, 'Aperçu',
						['<img src="../includes/js/ThemeOffice/preview.png" />','Dans une nouvelle fenêtre','<?php echo $mosConfig_live_site; ?>/index.php','_blank','<?php echo $mosConfig_live_site; ?>'],
						['<img src="../includes/js/ThemeOffice/preview.png" />','Dans cette fenêtre','index2.php?option=com_admin&task=preview',null,'<?php echo $mosConfig_live_site; ?>'],
						['<img src="../includes/js/ThemeOffice/preview.png" />','Dans cette fenêtre avec Positions','index2.php?option=com_admin&task=preview2',null,'<?php echo $mosConfig_live_site; ?>'],
					],
					['<img src="../includes/js/ThemeOffice/globe1.png" />', 'Statistiques', null, null, 'Statistiques du site',
	<?php
				if ($mosConfig_enable_stats == 1) {
	?>					['<img src="../includes/js/ThemeOffice/globe4.png" />', 'Navigateur, OS, Domain', 'index2.php?option=com_statistics', null, 'Navigateur, OS, Domain'],
	<?php
				}
	?>					['<img src="../includes/js/ThemeOffice/search_text.png" />', 'Texte recherch&eacute', 'index2.php?option=com_statistics&task=searches', null, 'Texte recherch&eacute']
					],
	<?php
				if ($manageTemplates) {
	?>				['<img src="../includes/js/ThemeOffice/template.png" />','Gestion des Templates',null,null,'Changer le template du site',
	  					['<img src="../includes/js/ThemeOffice/template.png" />','Templates du Site','index2.php?option=com_templates',null,'Changer le template du site'],
	  					_cmSplit,
	  					['<img src="../includes/js/ThemeOffice/template.png" />','Templates Administrateur','index2.php?option=com_templates&client=admin',null,'Changer le template administrateur'],
	  					_cmSplit,
	  					['<img src="../includes/js/ThemeOffice/template.png" />','Positions des Modules','index2.php?option=com_templates&task=positions',null,'Positions des modules du template']
	  				],
	<?php
				}
				if ($manageTrash) {
	?>				['<img src="../includes/js/ThemeOffice/trash.png" />','Gestion de la Corbeille','index2.php?option=com_trash',null,'Gérer la corbeille'],
	<?php
				}
				if ($canManageUsers || $canMassMail) {
	?>				['<img src="../includes/js/ThemeOffice/users.png" />','Gestion des utilisateurs','index2.php?option=com_users&task=view',null,'Gérer les utilisateurs'],
	<?php
					}
	?>			],
	<?php
		// Menu Sub-Menu
	?>			_cmSplit,
				[null,'Menu',null,null,'Menu Management',
	<?php
				if ($manageMenuMan) {
	?>				['<img src="../includes/js/ThemeOffice/menus.png" />','Gestionnaire de Menu','index2.php?option=com_menumanager',null,'Gestionnaire de Menu'],
					_cmSplit,
	<?php
				}
				foreach ( $menuTypes as $menuType ) {
	?>				['<img src="../includes/js/ThemeOffice/menus.png" />','<?php echo $menuType;?>','index2.php?option=com_menus&menutype=<?php echo $menuType;?>',null,''],
	<?php
				}
	?>			],
				_cmSplit,
	<?php
		// Content Sub-Menu
	?>			[null,'Contenu',null,null,'Gestion des articles',
	<?php
				if (count($sections) > 0) {
	?>				['<img src="../includes/js/ThemeOffice/edit.png" />','Articles par Section',null,null,'Gestion des articles',
	<?php
					foreach ($sections as $section) {
						$txt = addslashes( $section->title ? $section->title : $section->name );
	?>					['<img src="../includes/js/ThemeOffice/document.png" />','<?php echo $txt;?>', null, null,'<?php echo $txt;?>',
							['<img src="../includes/js/ThemeOffice/edit.png" />', '<?php echo $txt;?> Articles', 'index2.php?option=com_content&sectionid=<?php echo $section->id;?>',null,null],
							['<img src="../includes/js/ThemeOffice/backup.png" />', '<?php echo $txt;?> Archives','index2.php?option=com_content&task=showarchive&sectionid=<?php echo $section->id;?>',null,null],
							['<img src="../includes/js/ThemeOffice/add_section.png" />', '<?php echo $txt;?> Catégories', 'index2.php?option=com_categories&section=<?php echo $section->id;?>',null, null],
						],
	<?php
					} // foreach
	?>				],
					_cmSplit,
	<?php
				}
	?>
					['<img src="../includes/js/ThemeOffice/edit.png" />','Tous les articles','index2.php?option=com_content&sectionid=0',null,'Gérer les articles'],
	  				['<img src="../includes/js/ThemeOffice/edit.png" />','Gestion des articles statiques','index2.php?option=com_typedcontent',null,'Gérer les articles statiques'],
	  				_cmSplit,
	  				['<img src="../includes/js/ThemeOffice/add_section.png" />','Gestion des Sections','index2.php?option=com_sections&scope=content',null,'Gérer les sections de contenu'],
					['<img src="../includes/js/ThemeOffice/add_section.png" />','Gestion des Catégories','index2.php?option=com_categories&section=content',null,'Gérer les catégories de contenu'],
					_cmSplit,
	  				['<img src="../includes/js/ThemeOffice/home.png" />','Articles en page d\'accueil','index2.php?option=com_frontpage',null,'Gérer les articles en page d\'accueil'],
	  				['<img src="../includes/js/ThemeOffice/edit.png" />','Gestion des Archives','index2.php?option=com_content&task=showarchive&sectionid=0',null,'Gérer les articles archivés'],
	  				['<img src="../includes/js/ThemeOffice/globe3.png" />', 'Impressions de Page', 'index2.php?option=com_statistics&task=pageimp', null, 'Impressions de Page'],
				],
	<?php
		// Components Sub-Menu
		if ($installComponents) {
	?>			_cmSplit,
				[null,'Composants',null,null,'Gestion des composants',
	<?php
			$query = "SELECT *"
			. "\n FROM #__components"
			. "\n WHERE name != 'frontpage'"
			. "\n AND name != 'media manager'"
			. "\n ORDER BY ordering, name"
			;
			$database->setQuery( $query );
			$comps = $database->loadObjectList();	// component list
			$subs = array();	// sub menus
			// first pass to collect sub-menu items
			foreach ($comps as $row) {
				if ($row->parent) {
					if (!array_key_exists( $row->parent, $subs )) {
						$subs[$row->parent] = array();
					}
					$subs[$row->parent][] = $row;
				}
			}
			$topLevelLimit = 19; //You can get 19 top levels on a 800x600 Resolution
			$topLevelCount = 0;
			foreach ($comps as $row) {
				if ($editAllComponents | $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'components', $row->option )) {
					if ($row->parent == 0 && (trim( $row->admin_menu_link ) || array_key_exists( $row->id, $subs ))) {
						$topLevelCount++;
						if ($topLevelCount > $topLevelLimit) {
							continue;
						}
						$name = addslashes( $row->name );
						$alt = addslashes( $row->admin_menu_alt );
						$link = $row->admin_menu_link ? "'index2.php?$row->admin_menu_link'" : "null";
						echo "\t\t\t\t['<img src=\"../includes/$row->admin_menu_img\" />','$name',$link,null,'$alt'";
						if (array_key_exists( $row->id, $subs )) {
							foreach ($subs[$row->id] as $sub) {
								echo ",\n";
								$name = addslashes( $sub->name );
								$alt = addslashes( $sub->admin_menu_alt );
								$link = $sub->admin_menu_link ? "'index2.php?$sub->admin_menu_link'" : "null";
								echo "\t\t\t\t\t['<img src=\"../includes/$sub->admin_menu_img\" />','$name',$link,null,'$alt']";
							}
						}
						echo "\n\t\t\t\t],\n";
					}
				}
			}
			if ($topLevelLimit < $topLevelCount) {
				echo "\t\t\t\t['<img src=\"../includes/js/ThemeOffice/sections.png\" />','Tous les composants...','index2.php?option=com_admin&task=listcomponents',null,'Tous les composants'],\n";
			}
	?>
				],
	<?php
		// Modules Sub-Menu
			if ($installModules | $editAllModules) {
	?>			_cmSplit,
				[null,'Modules',null,null,'Gestion des modules',
	<?php
				if ($editAllModules) {
	?>				['<img src="../includes/js/ThemeOffice/module.png" />', 'Modules du Site', "index2.php?option=com_modules", null, 'Gérer les modules du site'],
					['<img src="../includes/js/ThemeOffice/module.png" />', 'Modules Administrateur', "index2.php?option=com_modules&client=admin", null, 'Gérer les modules Administrateur'],
	<?php
				}
	?>			],
	<?php
			} // if ($installModules | $editAllModules)
		} // if $installComponents
		// Mambots Sub-Menu
		if ($installMambots | $editAllMambots) {
	?>			_cmSplit,
				[null,'Mambots',null,null,'Gestion des Mambots',
	<?php
			if ($editAllMambots) {
	?>				['<img src="../includes/js/ThemeOffice/module.png" />', 'Mambots du site', "index2.php?option=com_mambots", null, 'Gérer les mambots du site'],
	<?php
			}
	?>			],
	<?php
		}
	?>
	<?php
		// Installer Sub-Menu
		if ($installModules) {
	?>			_cmSplit,
				[null,'Installation',null,null,'Installer List',
	<?php
			if ($manageTemplates) {
	?>				['<img src="../includes/js/ThemeOffice/install.png" />','Templates - Site','index2.php?option=com_installer&element=template&client=',null,'Installer des templates pour le site'],
					['<img src="../includes/js/ThemeOffice/install.png" />','Templates - Admin','index2.php?option=com_installer&element=template&client=admin',null,'Installer des templates pour l\'interface d\'administration'],
	<?php
			}
			if ($manageLanguages) {
	?>				['<img src="../includes/js/ThemeOffice/install.png" />','Langues','index2.php?option=com_installer&element=language',null,'Installer des langues'],
					_cmSplit,
	<?php
			}
	?>				['<img src="../includes/js/ThemeOffice/install.png" />', 'Composants','index2.php?option=com_installer&element=component',null,'Installer/Désinstaller des Composants'],
					['<img src="../includes/js/ThemeOffice/install.png" />', 'Modules', 'index2.php?option=com_installer&element=module', null, 'Installer/Désinstaller des Modules'],
					['<img src="../includes/js/ThemeOffice/install.png" />', 'Mambots', 'index2.php?option=com_installer&element=mambot', null, 'Installer/Désinstaller des Mambots'],
				],
	<?php
		} // if ($installModules)
		// Messages Sub-Menu
		if ($canConfig) {
	?>			_cmSplit,
	  			[null,'Messages',null,null,'Gestion de la messagerie interne',
	  				['<img src="../includes/js/ThemeOffice/messaging_inbox.png" />','Bo&icirc;te de r&eacute;ception','index2.php?option=com_messages',null,'Bo&icirc;te de r&eacute;ception'],
	  				['<img src="../includes/js/ThemeOffice/messaging_config.png" />','Configuration','index2.php?option=com_messages&task=config&hidemainmenu=1',null,'Configuration']
	  			],
	<?php
		// System Sub-Menu
		/*
	?>			_cmSplit,
	  			[null,'Système',null,null,'Gestion du système',
	  				['<img src="../includes/js/ThemeOffice/joomla_16x16.png" />', 'V&eacute;rification de version', 'index2.php?option=com_admin&task=versioncheck', null,'V&eacute;rification de version'], 				
	  				['<img src="../includes/js/ThemeOffice/sysinfo.png" />', 'Information Système', 'index2.php?option=com_admin&task=sysinfo', null,'Information Système'],
	<?php
		*/
	?>			_cmSplit,
	  			[null,'Système',null,null,'Gestion du système',
	  				['<img src="../includes/js/ThemeOffice/joomla_16x16.png" />', 'V&eacute;rification de version', 'http://www.joomla.org/latest10', '_blank','V&eacute;rification de version'], 				
	  				['<img src="../includes/js/ThemeOffice/sysinfo.png" />', 'Information Système', 'index2.php?option=com_admin&task=sysinfo', null,'Information Système'],
	<?php
	  		if ($canConfig) {
	?>				
					['<img src="../includes/js/ThemeOffice/checkin.png" />', 'Validation Globale', 'index2.php?option=com_checkin', null,'Check-in all checked-out items'],					
	<?php
				if ($mosConfig_caching) {
	?>				['<img src="../includes/js/ThemeOffice/config.png" />','Vider le cache du contenu','index2.php?option=com_admin&task=clean_cache',null,'Vider le cache du contenu'],
					['<img src="../includes/js/ThemeOffice/config.png" />','Vider tous les caches','index2.php?option=com_admin&task=clean_all_cache',null,'Vider tous les caches'],
	<?php
				}
			}
	?>			],
	<?php
				}
	?>			_cmSplit,
	<?php
		// Help Sub-Menu
	?>			[null,'Aide','index2.php?option=com_admin&task=help',null,null]
			];
			cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
			</script>
	<?php
		}
	
	
		/**
		* Show an disbaled version of the menu, used in edit pages
		* @param string The current user type
		*/
		function showDisabled( $usertype='' ) {
			global $acl;
	
			$canConfig 			= $acl->acl_check( 'administration', 'config', 'users', $usertype );
			$installModules 	= $acl->acl_check( 'administration', 'install', 'users', $usertype, 'modules', 'all' );
			$editAllModules 	= $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'modules', 'all' );
			$installMambots 	= $acl->acl_check( 'administration', 'install', 'users', $usertype, 'mambots', 'all' );
			$editAllMambots 	= $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'mambots', 'all' );
			$installComponents 	= $acl->acl_check( 'administration', 'install', 'users', $usertype, 'components', 'all' );
			$editAllComponents 	= $acl->acl_check( 'administration', 'edit', 'users', $usertype, 'components', 'all' );
			$canMassMail 		= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_massmail' );
			$canManageUsers 	= $acl->acl_check( 'administration', 'manage', 'users', $usertype, 'components', 'com_users' );
	
			$text = 'Menu inactive for this Page';
			?>
			<div id="myMenuID" class="inactive"></div>
			<script language="JavaScript" type="text/javascript">
			var myMenu =
			[
			<?php
		/* Home Sub-Menu */
			?>
				[null,'<?php echo 'Accueil'; ?>',null,null,'<?php echo $text; ?>'],
				_cmSplit,
			<?php
		/* Site Sub-Menu */
			?>
				[null,'<?php echo 'Gestion du site'; ?>',null,null,'<?php echo $text; ?>'
				],
			<?php
		/* Menu Sub-Menu */
			?>
				_cmSplit,
				[null,'<?php echo 'Menu'; ?>',null,null,'<?php echo $text; ?>'
				],
				_cmSplit,
			<?php
		/* Content Sub-Menu */
			?>
	 			[null,'<?php echo 'Contenu'; ?>',null,null,'<?php echo $text; ?>'
				],
			<?php
		/* Components Sub-Menu */
				if ( $installComponents) {
					?>
					_cmSplit,
					[null,'<?php echo 'Composants'; ?>',null,null,'<?php echo $text; ?>'
					],
					<?php
				} // if $installComponents
				?>
			<?php
		/* Modules Sub-Menu */
				if ( $installModules | $editAllModules) {
					?>
					_cmSplit,
					[null,'<?php echo 'Modules'; ?>',null,null,'<?php echo $text; ?>'
					],
					<?php
				} // if ( $installModules | $editAllModules)
				?>
			<?php
		/* Mambots Sub-Menu */
				if ( $installMambots | $editAllMambots) {
					?>
					_cmSplit,
					[null,'<?php echo 'Mambots'; ?>',null,null,'<?php echo $text; ?>'
					],
					<?php
				} // if ( $installMambots | $editAllMambots)
				?>
	
	
				<?php
		/* Installer Sub-Menu */
				if ( $installModules) {
					?>
					_cmSplit,
					[null,'<?php echo 'Installation'; ?>',null,null,'<?php echo $text; ?>'
						<?php
						?>
					],
					<?php
				} // if ( $installModules)
				?>
				<?php
		/* Messages Sub-Menu */
				if ( $canConfig) {
					?>
					_cmSplit,
		  			[null,'<?php echo 'Messagerie'; ?>',null,null,'<?php echo $text; ?>'
		  			],
					<?php
				}
				?>
	
				<?php
		/* System Sub-Menu */
				if ( $canConfig) {
					?>
					_cmSplit,
		  			[null,'<?php echo 'Système'; ?>',null,null,'<?php echo $text; ?>'
					],
					<?php
				}
				?>
				_cmSplit,
				<?php
		/* Help Sub-Menu */
				?>
				[null,'<?php echo 'Aide'; ?>',null,null,'<?php echo $text; ?>']
			];
			cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
			</script>
			<?php
		}
	}
}
$cache =& mosCache::getCache( 'mos_fullmenu' );

$hide = intval( mosGetParam( $_REQUEST, 'hidemainmenu', 0 ) );

if ( $hide ) {
	mosFullAdminMenu::showDisabled( $my->usertype );
} else {
	mosFullAdminMenu::show( $my->usertype );
}
?>