<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2006 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multi lingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 *
*/

/**
* @package joomfish.language
* @copyright 2003-2006 Think Network GmbH
* @license http://www.gnu.org/copyleft/gpl.html GNU Public License
* @version 1.0, 2003-10-16 $Revision: 1.4 $
* @author Alex Kempkens <JoomFish@ThinkNetwork.com>
*/

if( !defined( '_JF_LANG_INCLUDED') ) {	

define('_JOOMFISH_TITLE', 'Joom!Fish');															// @since 1.7
define('_JOOMFISH_HEADER','Multilingual Content Manager for Joomla! ');							// @since 1.7

// Control panel
define('_JOOMFISH_ADMIN_FRONTEND', 'Portada');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Idiomas');
define('_JOOMFISH_ADMIN_HELP', 'Ayuda y Como Hacerlo');										// @since 1.7
define('_JOOMFISH_ADMIN_CHECK', 'Verificar Componente');										// @since 1.7
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Configuración');										// @since 1.7
define('_JOOMFISH_ADMIN_CREDITS', 'Créditos');													// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Estado del Componente');								// @since 1.7
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Estado de Traducción');							// @since 1.7
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'Estado del System bot');							// @since 1.7
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Estado del Search bot');							// @since 1.7
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Estado del Module bot');								// @since 1.7



define ('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Joom!Fish Language Manager');							// @since 1.7
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Idioma por defecto del sitio:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'Este idioma se define en la configuración de su sitio.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Seleccione los idiomas usados en su sitio.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Seleccione el idioma del sitio:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Por favor, defina nombre y active los idiomas que desea utilizar en su sitio.<br>El nombre será utilizado en la exhibición del inicio también.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Nombre');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Autor');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Versión');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Descripción');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Titulo original');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Idioma');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Traducción');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Ultima modificación');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Estado');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Publicado');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Elementos de contenido');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Mostrar #');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'activo');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Archivo Joomla');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Archivo imagen');										//new 1.1
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Orden');													//new 1.1

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Configuración');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'Referencia de BD');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Ejemplo de datos');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Información general');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Información acerca de las tablas de Base de Datos');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Tabla de Base de Datos');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'La referencia para la tabla en su Base de Datos (sin el prefijo!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Campos de Base de Datos');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definición de los campos relacionados en su Base de Datos.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Nombre');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Tipo');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Lable');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Traducir');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Texto determinado por defecto');											// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Determinado completo');														// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'Todos los lenguajes');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Sin traducción');
define('_JOOMFISH_NOTRANSLATIONYET', '(sin traducción)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Por favor seleccione');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Por favor, seleccione el elemento del contenido por si usted desea comprobar las traducciones.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', 'Traducción');
define('_JOOMFISH_ITEM_INFO', 'Informacion ítem');
define('_JOOMFISH_STATE_NOTEXISTING', 'No existe traducción');
define('_JOOMFISH_STATE_CHANGED', 'Original cambiado');
define('_JOOMFISH_STATE_OK', 'Estado traducción ok');

define('_JOOMFISH_COPY', 'Copia');
define('_JOOMFISH_CLEAR', 'Limpiar');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'La traducción ha sido <u>actualizada</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'Traducción <u>incompleta</u> u original <u>cambiado</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', 'La traducción <u>no</u> existe');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'La traducción a sido <u>publicada</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'Traducción <u>No</u> Actualizada');
define('_JOOMFISH_STATE_TOGGLE', '(Presione sobre icono a estado de cambio.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Usted debe elegir un idioma');
define('_JOOMFISH_CONFIG_SAVED', 'Ajustes guardados.');																// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Problemas la guardar la configuración!');		// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Problemas al almacenar la información del idioma!');		// New 1.1

define ('_JOOMFISH_ADMIN_CATEGORY','Filtro de Categoría');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Todas las Categorías');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Filtro de Autor');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Todos los Autores');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Filtro por Palabra');													// New 1.7

define( '_JOOMFISH_NO_TRANSLATION_AVAILABLE', 'There is no translation avialable, please select a different language.');		// Changed 1.7

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Nombre a mostrar del idioma');
define ('_JOOMFISH_TT_TITLE_ISO','Código oficial ISO del idioma, mejor use definiciones de navegador.</strong>');
define ('_JOOMFISH_TT_IMAGES_DIR','Para usar las banderas por defecto deje vacío. Para las banderas individuales use la trayectoria relativa basada en su directorio de raíz del Joomla.');
define ('_JOOMFISH_TT_TITLE_ORDER','Ordenamiento en la portada.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Usar para texto fijo individual. Para usar idioma dependiendo del permiso de información faltante y usa la <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong> constante definida en los archivos de idioma MBF.');
define ('_JOOMFISH_TT_SPACER','Espaciador para mostrar el selector de idioma en textmode cuando esta en modo horizontal.<br /><strong>Indirecta</strong>: si no se llena aquí adentro, pero se selecciona el modo horizontal, generalmente el espaciador será definido por Joomla como: | (con el espacio antes y después).<br />El espacio antes y después será usado siempre.');

// errors
define ('_JOOMFISH_ERROR','Error:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','El contenido del item [ %s ] está siendo corregido actualmente por otro administrador'); // %s=$actContentObject->title
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Archivo Config no editable!');
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','Multi lingual abstraction layer mambot no esta instalado o publicado - Joomfish no trabajará en esta condición!');

// preferences
define ('_JOOMFISH_ADMIN_PREF_TITLE','Joom!Fish Preferencias de Componentes');							// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Preferencias de Acceso');									// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Publicar desde el frontend?');									// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Publishers y arriba');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','Nadie');																// @since 1.7
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Quién puede publicar traducciones directo del frontend?');	// @since 1.7

define('_JOOMFISH_ADMIN_SHOWIF', 'Qué mostrar si ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'no hay traducción disponible?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', 'Este reemplazo se aplica SOLO a los elementos contenidos que están marcados reference.type=content!');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'Contenido original');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'El contenido original con información');


define('_JOOMFISH_ADMIN_PLACEHOLDER', 'Texto por Defecto');
define('_JOOMFISH_ADMIN_FRONTEND_VIEW', 'Apariencia del inicio');									//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Lista de enlaces (horizontal)');								//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'Caja de selección');												//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Lista de imágenes (horizontal)');								//new 1.1
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Por favor, defina cómo el componente se debe mostrar en el inicio<br>Cuando usted selecciona &quot;Image List&quot;, la trayectoria de la imagen debe estar vacía o basada en el directorio válido de la raíz de Joomla.');							//changed 1.5


define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Sin publicar');
define ('_JOOMFISH_NAME_MISSING','Usted debe elegir un nombre');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','Usted debe entrar en una correspondencia nombre de Joomla You must enter a corresponding Joomla name');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','Ya existe un idioma con este nombre en Joomla, por favor intente otra vez');
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'Lista de nombres (vertical)');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'Lista de imágenes (vertical)');
define ('_JOOMFISH_SPACER','Espaciador al mostrar como texto');

// upgrade
define('_JOOMFISH_UPGRADE', 'Upgrade');																	// @since 1.7
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Upgrading from MambelFish to Joom!Fish requires to <span style="font-weight:bold; color:red">DELETE</span> all existing translations and languages within your Joom!Fish tables!<br />You need to confirm this!');										// @since 1.7
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Backup Joom!Fish tables?');									// @since 1.7
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'Confirm to DELETE Joom!Fish tables');						// @since 1.7
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Rename old tables after upgrade?');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">You need to confirm that the actual tables can be DELETED!</span>');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'An error occoured during upgrade, please see logs and detail information');							// @since 1.7

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Upgrade sucessful</span>');											// @since 1.7
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Upgrade failure</span>');													// @since 1.7

define('_JOOMFISH_MBFBOT', 'Mambelfish bot');															// @since 1.7
define('_JOOMFISH_MBFMODULE', 'Mambelfish module');														// @since 1.7
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">unpublished</span>' );											// @since 1.7
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">could NOT be unpublished!</span>' );							// @since 1.7

define('_JOOMFISH_CONTENT_BACKUP', 'Joom!Fish tables backup');											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful into table #__jf_content_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to create backup table #__jf_content_bak</span>' );			// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful into table #__jf_languages_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to create backup table #__jf_languages_bak</span>' );			// @since 1.7

define('_JOOMFISH_CONTENT_TABLES', 'Joom!Fish content tables');											// @since 1.7
define('_JOOMFISH_LANGUAGE_TABLES', 'Joom!Fish language tables');											// @since 1.7
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful deleted</span>' );											// @since 1.7
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to delete actual Joom!Fish table</span>' );					// @since 1.7
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">sucessful copied</span>' );											// @since 1.7
define('_JOOMFISH_COPY_FAILURE', '<span style="font-weight:bold; color:red">FAILIRE to delete actual Joom!Fish table</span>' );					// @since 1.7

// credits
define('_JOOMFISH_CREDITS','Credits and the rest of the universe');								// @since 1.7

define( "_JF_LANG_INCLUDED", true );
}
?>
