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
// Spanish Translation by Juan Timan� - http://www.ezwp.com / sietbukuel@gmail.com
//
// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

// admin interface
DEFINE('_COM_SEF_CONFIG','Configuraci�n de <br/>404SEFx');
DEFINE('_COM_SEF_CONFIGDESC','Configurar 404SEFx');
DEFINE('_COM_SEF_HELP','Soporte para<br/>404SEFx');
DEFINE('_COM_SEF_HELPDESC','Necesitas ayuda con 404SEFx?');
DEFINE('_COM_SEF_INFO','Documentaci�n de <br/>404SEF');
DEFINE('_COM_SEF_INFODESC','Ver sumario y documentaci�n de 404SEFx');
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
DEFINE('_COM_SEF_SUCCESSPURGE','Se purgaron los records exit�samente');
DEFINE('_PREVIEW_CLOSE','Cerrar esta ventana');
DEFINE('_COM_SEF_EMPTYURL','Debes especificar una URL para la redirecci�n.');
DEFINE('_COM_SEF_NOLEADSLASH','No debes incluir ningun slash al princio de la nueva');
DEFINE('_COM_SEF_BADURL','La vieja y no SEF URL debe comenzar con inde.php');
DEFINE('_COM_SEF_URLEXIST','Esta URL ya existe en la base de datos!');
DEFINE('_COM_SEF_SHOW0','Mostrar SEF Urls');
DEFINE('_COM_SEF_SHOW1','Mostrar 404 Log');
DEFINE('_COM_SEF_SHOW2','Mostrar Redirecciones Personalizadas');
DEFINE('_COM_SEF_INVALID_URL','URL INVALIDA: este enlace requiere de un Itemid v�lido, pero no fue encontrado.<br/>SOLUCION: Crear un item en el men�. No necesitas publicarlo, s�lo crearlo.');
DEFINE('_COM_SEF_DEF_404_MSG','<h1>Error 404: P�gina No Encontrada</h1><h4>Lo sentimos, pero la p�gina que busca no existe o no se pudo encontrar</h4>');
DEFINE('_COM_SEF_SELECT_DELETE','Selecciona un item para borrar');
DEFINE('_COM_SEF_ASC',' (asc) ');
DEFINE('_COM_SEF_DESC',' (desc) ');
DEFINE('_COM_SEF_WRITEABLE',' <b><font color="green">Permite escritura</font></b>');
DEFINE('_COM_SEF_UNWRITEABLE',' <b><font color="red">No permite escritura</font></b>');
DEFINE('_COM_SEF_USING_DEFAULT',' <b><font color="red">Usando los valores por defecto</font></b>');
DEFINE('_COM_SEF_DISABLED',"<p class='error'>NOTA: Soporte para SEF en Joomla/Mambo est� actualmente desabilitado. Para usar SEF, habl�telo desde la<a href='".
	$GLOBALS['mosConfig_live_site']."/administrator/index2.php?option=com_config'>Configuraci�n Global</a> p�gina SEO.</p>");
DEFINE('_COM_SEF_TITLE_CONFIG','Configuraci�n 404SEFx');
DEFINE('_COM_SEF_TITLE_BASIC','Configuraci�n B�sica');
DEFINE('_COM_SEF_ENABLED','habilitado');
DEFINE('_COM_SEF_TT_ENABLED','Si lo defines como No, se usar�n las URLs SEF por defecto');
DEFINE('_COM_SEF_DEF_404_PAGE','<b>P�gina 404 por defecto</b><br>');
DEFINE('_COM_SEF_REPLACE_CHAR','Caracter de reemplazo');
DEFINE('_COM_SEF_TT_REPLACE_CHAR','Caracter usado para reemplazar caracteres desconocidos en la URL');
DEFINE('_COM_SEF_PAGEREP_CHAR','Page spacer character');
DEFINE('_COM_SEF_TT_PAGEREP_CHAR','Character to use to space page numbers away from the rest of the URL');
DEFINE('_COM_SEF_STRIP_CHAR','Strip characters');
DEFINE('_COM_SEF_TT_STRIP_CHAR','Characters to strip from the URL, separate with |');
DEFINE('_COM_SEF_FRIENDTRIM_CHAR','Trim friendly characters');
DEFINE('_COM_SEF_TT_FRIENDTRIM_CHAR','Characters to trim from around the URL, separate with |');
DEFINE('_COM_SEF_USE_ALIAS','Usar T�tulo Alias');
DEFINE('_COM_SEF_TT_USE_ALIAS','Usar titlos_alias y no el t�tulo en la URL');
DEFINE('_COM_SEF_SUFFIX','Sufijo');
DEFINE('_COM_SEF_TT_SUFFIX','Extensi�n para usar en los \\\'archivos\\\'. Para desabilitar dejarlo en blanco. Comunmente es \\\'html\\\'.');
DEFINE('_COM_SEF_ADDFILE','Default index file.');
DEFINE('_COM_SEF_TT_ADDFILE','File name to place after a blank url / when no file exists.  Useful for bots that crawl your site looking for a specific file in that place but returns a 404 because there is none there.');
DEFINE('_COM_SEF_PAGETEXT','Texto P�gina');
DEFINE('_COM_SEF_TT_PAGETEXT','Texto para serparar p�ginas multiples. Usar %s para insertar el n�mero, por defecto ir� al final de la URL. Si alg�n sufijo est� definido ser� agregado al final de la URL.');
DEFINE('_COM_SEF_LOWER','Todo en min�sculas');
DEFINE('_COM_SEF_TT_LOWER','Convierte todos los caracteres a min�scilas en la URL','Todo en min�sculas');
DEFINE('_COM_SEF_SHOW_SECT','Mostrar secci�n');
DEFINE('_COM_SEF_TT_SHOW_SECT','Def�nelo como S� para incluir el nombre de la secci�n en la URL');
DEFINE('_COM_SEF_HIDE_CAT','Ocultar Categor�a');
DEFINE('_COM_SEF_TT_HIDE_CAT','Def�nelo como Si para excluir el nombre de la categor�a en la URL');
DEFINE('_COM_SEF_404PAGE','P�gina 404');
DEFINE('_COM_SEF_TT_404PAGE','P�gina de contenido est�tico para uasr con 404 no encontr� errores (si est� publicado o no, no importa)');
DEFINE('_COM_SEF_TITLE_ADV','Configuraci�n Avanzada del Componente');
DEFINE('_COM_SEF_TT_ADV','<b>manejador por defecto</b><br/>proceso normal, si alguna extensi�n de SEF Advance est� presente se usar�. <br/><b>nocache</b><br/>no gurdar las urls en la base de datos ni crear el estilo antiguo de URLs-SEF<br/><b>skip</b><br/>no usar SEF para este componente<br/>');
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
DEFINE('_COM_SEF_TT_NEWURL','S�lo redirecci�n relativa a la carpeta raiz de Joomla/Mambo <i>sin</i> slash al princio');
DEFINE('_COM_SEF_OLDURL','Antigua URL no-SEF');
DEFINE('_COM_SEF_TT_OLDURL','Esta URL debe comezar con index.php');
DEFINE('_COM_SEF_SAVEAS','Guardar una redirecci�n personalizada');
DEFINE('_COM_SEF_TITLE_SUPPORT','Soporte para 404 SEF');
DEFINE('_COM_SEF_HELPVIA','<b>La ayuda esta diponisble en los siguientes foros:</b>');
DEFINE('_COM_SEF_OFFICIAL','Foros oficiales del proyecto');
DEFINE('_COM_SEF_MAMBERS','Foro Mambers');
DEFINE('_COM_SEF_TITLE_PURGE','Purgar base de datos de 404 SEF');
DEFINE('_COM_SEF_USE_DEFAULT','(usar manejador por defecto)');
DEFINE('_COM_SEF_NOCACHE','sin cach�');
DEFINE('_COM_SEF_SKIP','Saltar');
DEFINE('_COM_SEF_INSTALLED_VERS','Versi�n Instalada:');
DEFINE('_COM_SEF_COPYRIGHT','Derechos de Autor');
DEFINE('_COM_SEF_LICENSE','Licencia');
DEFINE('_COM_SEF_SUPPORT_404SEF','Soporta a 404SEF');
DEFINE('_COM_SEF_CONFIG_UPDATED','Configuraci�n actualizada');
DEFINE('_COM_SEF_WRITE_ERROR','Error al escribir la configuraci�n');

// component interface
DEFINE('_COM_SEF_NOREAD','ERROR FATAL: No se puede leer el archivo ');
DEFINE('_COM_SEF_CHK_PERMS','Por favor, revisa y aseg�rate de que tu archivo tenga permisos de lectura.');
DEFINE('_COM_SEF_DEBUG_DATA_DUMP','DEBUG DATA DUMP COMPLETO: Carga de la p�gina terminada');
DEFINE('_COM_SEF_STRANGE','Algo extra�o ocurri�. Esto no debe ocurrir.<br />');

?>
