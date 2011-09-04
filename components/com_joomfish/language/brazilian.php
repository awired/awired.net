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
* @version 1.0, 2003-10-16 $Revision: 1.2 $
* @author Alex Kempkens <JoomFish@ThinkNetwork.com>
* @translation ??? (please contact me again)
*/
if( !defined( '_JF_LANG_INCLUDED') ) {	
define('_JOOMFISH_TITLE', 'Joom!Fish');															// @since 1.7
define('_JOOMFISH_HEADER','Multilingual Content Manager for Joomla! ');							// @since 1.7

define('_JOOMFISH_ADMIN_FRONTEND', 'Página inicial');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Idioma');

define('_JOOMFISH_ADMIN_SHOWIF', 'O que exibir se ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'nenhuma tradução disponível?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', '');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'O conteúdo original');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'O conteúdo original com informação');
define('_JOOMFISH_ADMIN_PLACEHOLDER', 'A placeholder');
define('_JOOMFISH_ADMIN_FRONTEND', 'Aparência da página inicial');
define('_JOOMFISH_ADMIN_FRONTEND_LIST', 'Estilo links (horizontal)');
define('_JOOMFISH_ADMIN_FRONTEND_COMBO', 'Estilo caixa de seleção');
define('_JOOMFISH_ADMIN_FRONTEND_IMAGE', 'Estilo imagem (horizontal)');
define('_JOOMFISH_ADMIN_FRONTEND_HELP', 'Por favor, defina como o componente será exibido na página inicial<br>Quando você escolher a imagem, tenha certeza de que ela esta na pasta &quot;/images&quot;.');	//changed 1.5!
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Idioma padrão dos sites:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'Este idioma está definido na configuração do seu site.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Selecione os idiomas usados no seu site.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Selecione o idiomas do site:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Por favor, defina um nome e ative os idiomas que você deseja usar para tradução.<br>O nome será usado para exibição na página inicial.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Nome');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Autor');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Versão');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Descrição');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Título original');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Idioma');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Tradução');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Última atualização');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Estado');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Publicado');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Elementos do conteúdo');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Exibir #');

define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'Ativado');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_JOOMLA', 'Arquivo Joomla');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Imagem Joomla');
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Ordem');

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Configuração');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'Referência do BD');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Exemplo de dados');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Informações gerais');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Informação sobre as tabelas do Banco de Dados');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Tabelas do Banco de Dados');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'Referência para tabela no seu Banco de Dados (sem o prefixo!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Campos do Banco de Dados');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Definição dos campos relacionados no seu Banco de Dados.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Nome');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Tipo');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Lable');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Traduzir');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Set default text');												// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Set complete');														// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'Todos os idiomas');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Sem tradução');
define('_JOOMFISH_NOTRANSLATIONYET', '(sem tradução)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Por favor selecione');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Por favor, selecione o elemento de conteúdo para o qual você deseja verificar a tradução.');

define('_JOOMFISH_ORIGINAL', 'Original');
define('_JOOMFISH_TRANSLATION', 'Tradução');
define('_JOOMFISH_ITEM_INFO', 'Informação do Item');
define('_JOOMFISH_STATE_NOTEXISTING', 'Não existe tradução');
define('_JOOMFISH_STATE_CHANGED', 'Original atualizado');
define('_JOOMFISH_STATE_OK', 'A tradução está OK');

define('_JOOMFISH_COPY', 'Copiar');
define('_JOOMFISH_CLEAR', 'Limpar');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'A tradução está <u>atualizada</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'A tradução está <u>incompleta</u> ou o texto original foi <u>modificado</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', 'A tradução <u>não</u> existe');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'A tradução está <u>publicada</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'A tradução <u>não</u> foi publicada');
define('_JOOMFISH_STATE_TOGGLE', '(Clique sobre o ícone para mudar o estado.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Você deve escolher um idioma');
define('_JOOMFISH_CONFIG_SAVED', 'Configurações salvas.');																// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Ocorreram problemas ao salvar as configurações!');	// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Ocorreram problemas ao gravar as informações do idioma!');	// New 1.1

define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Unpublished');
define ('_JOOMFISH_NAME_MISSING','You must enter a name');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','You must enter a corresponding Joomla name');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','There is a language already with that Joomla name, please try again');
define ('_JOOMFISH_ADMIN_FRONTEND_VLIST', 'List with names (Vertical)');
define ('_JOOMFISH_ADMIN_FRONTEND_VIMAGE', 'List with icons (Vertical)');
define ('_JOOMFISH_SPACER','Spacer at display as text');

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','original value has been copied to the clipboard.\nNow paste in your editor as html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','press ctl-C or command-C to copy original value to the clipboard.\nThen paste in your editor as html');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','your browser does not support copying to the clipboard.\nSelect the original by hand and copy and paste');     // New 1.7

define( '_JOOMFISH_NO_TRANSLATION_AVAILABLE', 'There is no translation avialable, please select a different language.');		// Changed 1.7

//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Define here the names as they will display in the frontend');
define ('_JOOMFISH_TT_TITLE_ISO','Language codes with <strong>2 digits, e.g. de for german, or en for englisch</strong>');
define ('_JOOMFISH_TT_IMAGES_DIR','Usually the flag icons are in the folder <strong>images/flags</strong>.<br />In this case write only <strong>nur</strong> the icon name.<br />Otherwise fill in the complete absolute path (without http:// or www) inclusive icon name!');
define ('_JOOMFISH_TT_TITLE_ORDER','Ordering for disyplay at frontend.<br />First language with 0 (null), then 1 (one) etc.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Fill in here onyl a text if </strong>fixed text</strong> should be displayed.<br />Otherwise leave this field empty, Joomla will use the defined variable from the language file : <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong>');
define ('_JOOMFISH_TT_SPACER','Spacer for displaying language selector in textmode when in horizontal mode.<br /><strong>Hint</strong>: If nothing is filled here in, but horizontal mode is selected, usually a spacer will be defined by Joomla as: | (with space before and after).<br />Space before and after will be used always.');

// errors
define ('_JOOMFISH_ERROR','Error:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','The content item [ %s ] is currently being edited by another administrator'); // %s=$actContentObject->title
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Config file not writeable!');

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
