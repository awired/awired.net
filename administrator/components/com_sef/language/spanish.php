<?php
//
// Copyright (C) 2004 W.H.Welch
// All rights reserved.
//
// This source file is part of the 404SEF Component, a Mambo 4.5.1
// custom Component By W.H.Welch - http://sef404.sourceforge.net/
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// Please note that the GPL states that any headers in files and
// Copyright notices as well as credits in headers, source files
// and output (screens, prints, etc.) can not be removed.
// You can extend them with your own credits, though...
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Spanish Translation by Juan Timaná - http://www.ezwp.com / sietbukuel@gmail.com
//
// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// admin interface
DEFINE('_COM_SEF_CONFIG','Configuración de <br/>404SEFx');
DEFINE('_COM_SEF_CONFIGDESC','Configurar 404SEFx');
DEFINE('_COM_SEF_HELP','Soporte para<br/>404SEFx');
DEFINE('_COM_SEF_HELPDESC','Necesitas ayuda con 404SEFx?');
DEFINE('_COM_SEF_INFO','Documentación de <br/>404SEF');
DEFINE('_COM_SEF_INFODESC','Ver sumario y documentación de 404SEFx');
DEFINE('_COM_SEF_VIEWURL','Ver/Editar<br/>SEF Urls');
DEFINE('_COM_SEF_VIEWURLDESC','Ver/Editar SEF Urls');
DEFINE('_COM_SEF_VIEW404','Ver/Editar<br/>404 Logs');
DEFINE('_COM_SEF_VIEW404DESC','Ver/Editar 404 Logs');
DEFINE('_COM_SEF_VIEWCUSTOM','Ver/Editar<br/>Redirecciones personalizadas');
DEFINE('_COM_SEF_VIEWCUSTOMDESC','Ver/Editar Redirecciones personalizadas');
DEFINE('_COM_SEF_SUPPORT','Sitio Web de<br/>Support');
DEFINE('_COM_SEF_SUPPORTDESC','Visitar el sitio de soporte para 404SEFx (nueva ventana)');
DEFINE('_COM_SEF_BACK','Regresar al panel de Control de 404SEFx');
DEFINE('_COM_SEF_PURGEURL','Purgar<br/>SEF Urls');
DEFINE('_COM_SEF_PURGEURLDESC','Purgar SEF Urls');
DEFINE('_COM_SEF_PURGE404','Purgar<br/>404 Logs');
DEFINE('_COM_SEF_PURGE404DESC','Purgar 404 Logs');
DEFINE('_COM_SEF_PURGECUSTOM','Purgar<br/>Redirecciones personalizadas');
DEFINE('_COM_SEF_PURGECUSTOMDESC','Purgar Redirecciones personalizadas');
DEFINE('_COM_SEF_WARNDELETE','ADVERTENCIA!!!<br/>Vas a borrar ');
DEFINE('_COM_SEF_RECORD',' record');
DEFINE('_COM_SEF_RECORDS',' records');
DEFINE('_COM_SEF_NORECORDS','No se encontraron records.');
DEFINE('_COM_SEF_PROCEED',' Proceder ');
DEFINE('_COM_SEF_OK',' OK ');
DEFINE('_COM_SEF_SUCCESSPURGE','Se purgaron los records exitósamente');
DEFINE('_PREVIEW_CLOSE','Cerrar esta ventana');
DEFINE('_COM_SEF_EMPTYURL','Debes especificar una URL para la redirección.');
DEFINE('_COM_SEF_NOLEADSLASH','No debes incluir ningun slash al princio de la nueva');
DEFINE('_COM_SEF_BADURL','La vieja y no SEF URL debe comenzar con inde.php');
DEFINE('_COM_SEF_URLEXIST','Esta URL ya existe en la base de datos!');
DEFINE('_COM_SEF_SHOW0','Mostrar SEF Urls');
DEFINE('_COM_SEF_SHOW1','Mostrar 404 Log');
DEFINE('_COM_SEF_SHOW2','Mostrar Redirecciones Personalizadas');
DEFINE('_COM_SEF_INVALID_URL','URL INVALIDA: este enlace requiere de un Itemid válido, pero no fue encontrado.<br/>SOLUCION: Crear un item en el menú. No necesitas publicarlo, sólo crearlo.');
DEFINE('_COM_SEF_DEF_404_MSG','<h1>Error 404: Página No Encontrada</h1><h4>Lo sentimos, pero la página que busca no existe o no se pudo encontrar</h4>');
DEFINE('_COM_SEF_SELECT_DELETE','Selecciona un item para borrar');
DEFINE('_COM_SEF_ASC',' (asc) ');
DEFINE('_COM_SEF_DESC',' (desc) ');
DEFINE('_COM_SEF_WRITEABLE',' <b><font color="green">Permite escritura</font></b>');
DEFINE('_COM_SEF_UNWRITEABLE',' <b><font color="red">No permite escritura</font></b>');
DEFINE('_COM_SEF_USING_DEFAULT',' <b><font color="red">Usando los valores por defecto</font></b>');
DEFINE('_COM_SEF_DISABLED',"<p class='error'>NOTA: Soporte para SEF en Joomla/Mambo está actualmente desabilitado. Para usar SEF, hablítelo desde la<a href='".
	$GLOBALS['mosConfig_live_site']."/administrator/index2.php?option=com_config'>Configuración Global</a> página SEO.</p>");
DEFINE('_COM_SEF_TITLE_CONFIG','Configuración 404SEFx');
DEFINE('_COM_SEF_TITLE_BASIC','Configuración Básica');
DEFINE('_COM_SEF_ENABLED','habilitado');
DEFINE('_COM_SEF_TT_ENABLED','Si lo defines como No, se usarán las URLs SEF por defecto');
DEFINE('_COM_SEF_DEF_404_PAGE','<b>Página 404 por defecto</b><br>');
DEFINE('_COM_SEF_REPLACE_CHAR','Caracter de reemplazo');
DEFINE('_COM_SEF_TT_REPLACE_CHAR','Caracter usado para reemplazar caracteres desconocidos en la URL');
DEFINE('_COM_SEF_PAGEREP_CHAR','Page spacer character');
DEFINE('_COM_SEF_TT_PAGEREP_CHAR','Character to use to space page numbers away from the rest of the URL');
DEFINE('_COM_SEF_STRIP_CHAR','Strip characters');
DEFINE('_COM_SEF_TT_STRIP_CHAR','Characters to strip from the URL, separate with |');
DEFINE('_COM_SEF_FRIENDTRIM_CHAR','Trim friendly characters');
DEFINE('_COM_SEF_TT_FRIENDTRIM_CHAR','Characters to trim from around the URL, separate with |');
DEFINE('_COM_SEF_USE_ALIAS','Usar Título Alias');
DEFINE('_COM_SEF_TT_USE_ALIAS','Usar titlos_alias y no el título en la URL');
DEFINE('_COM_SEF_SUFFIX','Sufijo');
DEFINE('_COM_SEF_TT_SUFFIX','Extensión para usar en los \\\'archivos\\\'. Para desabilitar dejarlo en blanco. Comunmente es \\\'html\\\'.');
DEFINE('_COM_SEF_ADDFILE','Default index file.');
DEFINE('_COM_SEF_TT_ADDFILE','File name to place after a blank url / when no file exists.  Useful for bots that crawl your site looking for a specific file in that place but returns a 404 because there is none there.');
DEFINE('_COM_SEF_PAGETEXT','Texto Página');
DEFINE('_COM_SEF_TT_PAGETEXT','Texto para serparar páginas multiples. Usar %s para insertar el número, por defecto irá al final de la URL. Si algún sufijo está definido será agregado al final de la URL.');
DEFINE('_COM_SEF_LOWER','Todo en minúsculas');
DEFINE('_COM_SEF_TT_LOWER','Convierte todos los caracteres a minúscilas en la URL','Todo en minúsculas');
DEFINE('_COM_SEF_SHOW_SECT','Mostrar sección');
DEFINE('_COM_SEF_TT_SHOW_SECT','Defínelo como Sí para incluir el nombre de la sección en la URL');
DEFINE('_COM_SEF_HIDE_CAT','Ocultar Categoría');
DEFINE('_COM_SEF_TT_HIDE_CAT','Defínelo como Si para excluir el nombre de la categoría en la URL');
DEFINE('_COM_SEF_404PAGE','Página 404');
DEFINE('_COM_SEF_TT_404PAGE','Página de contenido estático para uasr con 404 no encontró errores (si está publicado o no, no importa)');
DEFINE('_COM_SEF_TITLE_ADV','Configuración Avanzada del Componente');
DEFINE('_COM_SEF_TT_ADV','<b>manejador por defecto</b><br/>proceso normal, si alguna extensión de SEF Advance está presente se usará. <br/><b>nocache</b><br/>no gurdar las urls en la base de datos ni crear el estilo antiguo de URLs-SEF<br/><b>skip</b><br/>no usar SEF para este componente<br/>');
DEFINE('_COM_SEF_TT_ADV4','Opciones avanzadas para ');
DEFINE('_COM_SEF_TITLE_MANAGER','Administrador de 404 SEF');
DEFINE('_COM_SEF_VIEWMODE','Modo:');
DEFINE('_COM_SEF_SORTBY','Ordenar por:');
DEFINE('_COM_SEF_HITS','Hits');
DEFINE('_COM_SEF_DATEADD','Fecha');
DEFINE('_COM_SEF_SEFURL','Url SEF');
DEFINE('_COM_SEF_URL','Url');
DEFINE('_COM_SEF_REALURL','Url Real');
DEFINE('_COM_SEF_EDIT','Editar');
DEFINE('_COM_SEF_ADD','Agregar');
DEFINE('_COM_SEF_NEWURL','Nueva URL SEF');
DEFINE('_COM_SEF_TT_NEWURL','Sólo redirección relativa a la carpeta raiz de Joomla/Mambo <i>sin</i> slash al princio');
DEFINE('_COM_SEF_OLDURL','Antigua URL no-SEF');
DEFINE('_COM_SEF_TT_OLDURL','Esta URL debe comezar con index.php');
DEFINE('_COM_SEF_SAVEAS','Guardar una redirección personalizada');
DEFINE('_COM_SEF_TITLE_SUPPORT','Soporte para 404 SEF');
DEFINE('_COM_SEF_HELPVIA','<b>La ayuda esta diponisble en los siguientes foros:</b>');
DEFINE('_COM_SEF_OFFICIAL','Foros oficiales del proyecto');
DEFINE('_COM_SEF_MAMBERS','Foro Mambers');
DEFINE('_COM_SEF_TITLE_PURGE','Purgar base de datos de 404 SEF');
DEFINE('_COM_SEF_USE_DEFAULT','(usar manejador por defecto)');
DEFINE('_COM_SEF_NOCACHE','sin caché');
DEFINE('_COM_SEF_SKIP','Saltar');
DEFINE('_COM_SEF_INSTALLED_VERS','Versión Instalada:');
DEFINE('_COM_SEF_COPYRIGHT','Derechos de Autor');
DEFINE('_COM_SEF_LICENSE','Licencia');
DEFINE('_COM_SEF_SUPPORT_404SEF','Soporta a 404SEF');
DEFINE('_COM_SEF_CONFIG_UPDATED','Configuración actualizada');
DEFINE('_COM_SEF_WRITE_ERROR','Error al escribir la configuración');

// component interface
DEFINE('_COM_SEF_NOREAD','ERROR FATAL: No se puede leer el archivo ');
DEFINE('_COM_SEF_CHK_PERMS','Por favor, revisa y asegúrate de que tu archivo tenga permisos de lectura.');
DEFINE('_COM_SEF_DEBUG_DATA_DUMP','DEBUG DATA DUMP COMPLETO: Carga de la página terminada');
DEFINE('_COM_SEF_STRANGE','Algo extraño ocurrió. Esto no debe ocurrir.<br />');

?>
