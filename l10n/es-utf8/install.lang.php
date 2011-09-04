<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
# Copyright (c) 2004 Olivier Meunier and contributors. All rights
# reserved.
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
# 
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****
#


#        DOT NOT MODIFY THIS FILE !




$GLOBALS['__l10n']['Installation'] = 'Instalación';
$GLOBALS['__l10n']['Welcome on DotClear installation'] = 'Bienvenido al instalador de Dotclear';
$GLOBALS['__l10n']['You are about to install DotClear. Please choose your language and encoding.'] = 'Vas a instalar Dotclear. Elige tu idioma y codificación.';
$GLOBALS['__l10n']['Go'] = 'Seguir';
$GLOBALS['__l10n']['Next step'] = 'Siguiente';
$GLOBALS['__l10n']['DotClear is still installed.'] = 'Dotclear se encuentra ya instalado.';
$GLOBALS['__l10n']['Upgrade'] = 'Actualizar';
$GLOBALS['__l10n']['Note: You must accept session cookies to use this installer.'] = 'Aviso: Tu navegador ha de aceptar cookies para poder utilizar este instalador.';
$GLOBALS['__l10n']['Checking your configuration'] = 'Comprobando configuración del servidor';
$GLOBALS['__l10n']['PHP version and modules'] = 'Versión de PHP y módulos';
$GLOBALS['__l10n']['PHP version is %s.'] = 'La versión de PHP es %s.';
$GLOBALS['__l10n']['PHP version is %s. Version 4.1 or better is required.'] = 'Versión PHP detectada %s. Se necesita una versión 4.1 o superior.';
$GLOBALS['__l10n']['%s module is present.'] = 'Módulo %s instalado.';
$GLOBALS['__l10n']['%s module is not present.'] = 'Módulo %s no instalado.';
$GLOBALS['__l10n']['Files permissions'] = 'Permisos de los archivos';
$GLOBALS['__l10n']['%s is writable.'] = '%s posee permisos de escritura.';
$GLOBALS['__l10n']['%s is not writable. Please change its permissions to install.'] = '%s no posee permisos de escritura. Cambia los permisos para poder realizar la instalación.';
$GLOBALS['__l10n']['DotClear cannot be installed.'] = 'Dotclear no ha podido ser instalado.';
$GLOBALS['__l10n']['Your PHP configuration is not valid. Please contact your Web host to solve this problem.'] = 'Tu configuración PHP no es válida. Contacta con tu empresa de alojamiento web para resolver este problema.';
$GLOBALS['__l10n']['Some files or directories are not writable. Please change their permissions to install DotClear.'] = 'Algunos archivos y carpetas no poseen permisos de escritura. Modifica sus permisos para poder instalar Dotclear.';
$GLOBALS['__l10n']['DotClear can be installed on your site.'] = 'Dotclear puede ser instalado en tu servidor.';
$GLOBALS['__l10n']['Database parameters'] = 'Parámetros de la base de datos';
$GLOBALS['__l10n']['Invalid tables prefix. It can contain only letters or "_".'] = 'Prefijo de la base de datos no válido. Sólo puede contener letras o "_".';
$GLOBALS['__l10n']['Error, check your parameters.'] = 'Error, comprueba los parámetros.';
$GLOBALS['__l10n']['Server address'] = 'Dirección del servidor';
$GLOBALS['__l10n']['User ID'] = 'Nombre de usuario';
$GLOBALS['__l10n']['Password'] = 'Contraseña';
$GLOBALS['__l10n']['Database name'] = 'Nombre de la base de datos';
$GLOBALS['__l10n']['Tables prefix'] = 'Prefijo de las tablas';
$GLOBALS['__l10n']['Create tables'] = 'Crear tablas';
$GLOBALS['__l10n']['DotClear seems to be present on your site. You may want to upgrade.'] = 'Parece que Dotclear ya se encuentra instalado en tu servidor. Quizá quieras realizar una actualización.';
$GLOBALS['__l10n']['Don\'t forget to upload your old dotclear.ini in conf/ directory before upgrade.'] = 'No olvides subir al servidor (en el directorio conf/) tu antiguo archivo dotclear.ini antes de realizar la actualización.';
$GLOBALS['__l10n']['Tables creation'] = 'Creando las tablas';
$GLOBALS['__l10n']['Table %s exists'] = 'La tabla %s ha sido creada';
$GLOBALS['__l10n']['Field %s exists'] = 'El campo %s ha sido creado';
$GLOBALS['__l10n']['Create table %s'] = 'Creando la tabla %s';
$GLOBALS['__l10n']['Add fulltext key %s'] = 'Añadiendo la clave fulltext %s';
$GLOBALS['__l10n']['Creation of first category'] = 'Creando la primera categoría';
$GLOBALS['__l10n']['Unable to create all tables. Please check if the tables don\'t exist yet.'] = 'Ha sido imposible crear todas las tablas. Comprueba que no estuvieran ya creadas.';
$GLOBALS['__l10n']['Tables successfully created.'] = 'Tablas creadas con éxito.';
$GLOBALS['__l10n']['DotClear will run properly even if warnings are issued.'] = 'Dotclear funcionará correctamente aunque se muestren algunos avisos.';
$GLOBALS['__l10n']['Creation of first user'] = 'Creación del primer usuario';
$GLOBALS['__l10n']['You are about to create the first user of your blog. This user will be administrator.'] = 'Vas a crear el primer usuario de la bitácora. Este usuario será el administrador.';
$GLOBALS['__l10n']['Create user'] = 'Crear usuario';
$GLOBALS['__l10n']['User successfully created'] = 'Usuario creado con éxito';
$GLOBALS['__l10n']['Blog configuration'] = 'Configuración de la bitácora';
$GLOBALS['__l10n']['DotClear needs to know in which directory it has been installed. For example, if DotClear has been installed in %s/dotclear, then please type "/dotclear" in the field below:'] = 'Es necesario indicar a Dotclear en qué directorio ha sido instalado. Por ejemplo, si ha sido instalado en %s/dotclear, escribe "/dotclear" en el siguiente campo:';
$GLOBALS['__l10n']['DotClear location'] = 'Directorio de Dotclear';
$GLOBALS['__l10n']['Your blog\'s name'] = 'Nombre de tu bitácora';
$GLOBALS['__l10n']['My first weblog'] = 'Mi primera bitácora';
$GLOBALS['__l10n']['Your blog archive addresses (permalinks) may be displayed in various formats. The "Query string" URLs will be displayed as "index.php?/2002/04". The "Path info" URLs will be displayed as "index.php/2002/04" (preferred method for search engine optimization). And the "Get" URLs will be displayed as "index.php?d=2002/04" (only for mod_rewrite fans).'] = 'Las direcciones de los archivos (enlaces permanentes) pueden ser mostrados de diversas maneras. Las URLs con formato "Query string" serán mostradas como "index.php?/2002/04". Las URLs con formato "Path info" serán mostradas como "index.php/2002/04" (este método es el más aconsejado para conseguir una mejor indexación en los buscadores). Las URLs con formato "Get" serán mostradas como "index.php?d=2002/04" (sólo recomendado para aficionados al mod_rewrite).';
$GLOBALS['__l10n']['Please note that "Path info" type could be broken on some Web hosting configurations.'] = 'Ten en cuenta que el formato "Path info" puede no ser admitido por algunos servidores.';
$GLOBALS['__l10n']['URLs format'] = 'Formato de las URLs';
$GLOBALS['__l10n']['Save'] = 'Guardar';
$GLOBALS['__l10n']['Unable to write dotclear.ini'] = 'No se ha podido escribir el archivo dotclear.ini';
$GLOBALS['__l10n']['Weblog successfully configured'] = 'Bitácora configurada con éxito';
$GLOBALS['__l10n']['End installation'] = 'Finalizar instalación';
$GLOBALS['__l10n']['End of installation'] = 'Fin de la instalación';
$GLOBALS['__l10n']['First post'] = 'Primer artículo';
$GLOBALS['__l10n']['This is the first post. Please edit it.'] = 'Este es el primer artículo. Edítalo.';
$GLOBALS['__l10n']['Creation of first entry.'] = 'Creando el primer artículo.';
$GLOBALS['__l10n']['Creation of first entry failed.'] = 'La creación del primer artículo ha fallado.';
$GLOBALS['__l10n']['Creation of config file.'] = 'Creando el fichero de configuración.';
$GLOBALS['__l10n']['Creation of config file failed.'] = 'La creación del fichero de configuración ha fallado.';
$GLOBALS['__l10n']['An error occured while finishing installation.'] = 'Se ha producido un error al finalizar la instalación.';
$GLOBALS['__l10n']['Congratulations!'] = '¡Felicidades!';
$GLOBALS['__l10n']['You successfully installed DotClear. Have fun.'] = 'Has instalado Dotclear con éxito. Que te diviertas mucho.';
$GLOBALS['__l10n']['Manage your blog'] = 'Administrar la bitácora';
$GLOBALS['__l10n']['Upgrade DotClear'] = 'Actualizar Dotclear';
$GLOBALS['__l10n']['Update URLed titles'] = 'Actualizar los títulos URLizados';
$GLOBALS['__l10n']['Update %s'] = 'Actualizar %s';
$GLOBALS['__l10n']['Reord categories'] = 'Reordenar categorías';
$GLOBALS['__l10n']['Reord categories failed'] = 'Ha fallado la reordenación de categorías';
$GLOBALS['__l10n']['Update of dotclear.ini'] = 'Actualizar dotclear.ini';
$GLOBALS['__l10n']['Update of dotclear.ini failed'] = 'Ha fallado la actualización de dotclear.ini';
$GLOBALS['__l10n']['DotClear successfully upgraded.'] = 'Dotclear ha sido actualizado con éxito.';
$GLOBALS['__l10n']['Log in'] = 'Conectar';
?>