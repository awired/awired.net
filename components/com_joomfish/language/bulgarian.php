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
define('_JOOMFISH_TITLE', 'Джум!Фиш');															// @since 1.7


define('_JOOMFISH_ADMIN_FRONTEND', 'Сайт');
define('_JOOMFISH_ADMIN_LANGUAGES', 'Езици');

define('_JOOMFISH_ADMIN_HELP', 'Помощ');                                                                                 // @since 1.7 
   define('_JOOMFISH_ADMIN_CPANEL', 'Панел');                                                                                                             // @since 1.7 
   define('_JOOMFISH_ADMIN_CHECK', 'Проверете компонента');                                                                                             // @since 1.7 
   define('_JOOMFISH_ADMIN_CONFIGURATION', 'Настройки');                                                                               // @since 1.7 
   define('_JOOMFISH_ADMIN_CREDITS', 'Автори');                                                                                                   // @since 1.7 
   define( '_JOOMFISH_E_STATE', 'Статус');                                                                                                                  // @since 1.7 
   define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Статус на компонента');                                                                   // @since 1.7 
   define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Статус на превода');                                                              // @since 1.7 
   define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'Статус на системния бот');                                                                 // @since 1.7 
   define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Статус на бота за търсене');                                                                 // @since 1.7 
   define('_JOOMFISH_ADMIN_MODULE_STATE', 'Статус на модула');                                                                                 // @since 1.7 
   define('_JOOMFISH_CMN_PUBLISHED', '<span style="font-weight:bold; color:green">Публикуван</span>' );                                                                                     // @since 1.7 
   define('_JOOMFISH_CMN_UNPUBLISHED', '<span style="font-weight:bold; color:red">Не е публикуван</span>' );                                                                                   // @since 1.7 
   define('_JOOMFISH_ADMIN_MAMBELFISH_INSTALL', 'Инсталация на Мамбелфиш');                                                                                                                                        // @since 1.7 
   define('_JOOMFISH_ADMIN_INSTAL_UPGRADED', '<span style="font-weight:bold; color:green">стара инсталация</span>');                                      // @since 1.7 
   define('_JOOMFISH_ADMIN_INSTAL_NOT_UPGRADED', '<span style="font-weight:bold; color:red">стара инсталация, която не е обновена</span>');                                // @since 1.7 
   define('_JOOMFISH_INSTALL_UPGRADE', 'Обнови инсталацията');                                                                                                                                                            // @since 1.7 

define('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Управление на езици');             

define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE', 'Език по дефиниция в сайта:');
define('_JOOMFISH_ADMIN_DEFAULT_LANGUAGE_HELP', 'Това е избрания език в <a href="javascript:submitbutton( \'site_config\' );">общите настройки</a> на сайта.');

define('_JOOMFISH_ADMIN_SELECT_LANGUAGES', 'Изберете използваните в сайта езици.');
define('_JOOMFISH_ADMIN_LANGUAGE', 'Изберете езици:');
define('_JOOMFISH_ADMIN_LANGUAGE_HELP', 'Моля задайте имена и изберете всички езици които искате да бъдат ползвани в сайта.');

define('_JOOMFISH_ADMIN_TITLE_NAME', 'Име');
define('_JOOMFISH_ADMIN_TITLE_AUTHOR', 'Автор');
define('_JOOMFISH_ADMIN_TITLE_VERSION', 'Версия');
define('_JOOMFISH_ADMIN_TITLE_DESCRIPTION', 'Описание');
define('_JOOMFISH_ADMIN_TITLE_TITLE', 'Оригинално заглавие');
define('_JOOMFISH_ADMIN_TITLE_LANGUAGE', 'Езици');
define('_JOOMFISH_ADMIN_TITLE_TRANSLATION', 'Превод');
define('_JOOMFISH_ADMIN_TITLE_DATECHANGED', 'Последна промяна');
define('_JOOMFISH_ADMIN_TITLE_STATE', 'Статус');
define('_JOOMFISH_ADMIN_TITLE_PUBLISHED', 'Публикуван');
define('_JOOMFISH_ADMIN_TITLE_CONTENTELEMENTS', 'Елементи');
define('_JOOMFISH_ADMIN_TITLE_DISPLAY', 'Покажи #');
define('_JOOMFISH_ADMIN_PLACEHOLDER','Текст по подразбиране');
define('_JOOMFISH_CREDITS','- за компонента');
define('_JOOMFISH_ADMIN_TITLE_ACTIVE', 'Активиран');
define('_JOOMFISH_ADMIN_TITLE_ISO', 'ISO');
define('_JOOMFISH_ADMIN_TITLE_IMAGE', 'Име на файла');												//new 1.1
define('_JOOMFISH_ADMIN_TITLE_ORDER', 'Подредба');
define('_JOOMFISH_HEADER','Джум!Фиш');													//new 1.1

define('_JOOMFISH_ADMIN_ELEMENT_CONFIG', 'Натройки');
define('_JOOMFISH_ADMIN_ELEMENT_REFERENCE', 'Референция');
define('_JOOMFISH_ADMIN_ELEMENT_SAMPLES', 'Данни');
define('_JOOMFISH_ADMIN_COMMONINFORMATION', 'Информация');

define('_JOOMFISH_ADMIN_DATABASEINFORMATION', 'Информация за базата данни');
define('_JOOMFISH_ADMIN_DATABASETABLE', 'Таблица в базата данни');
define('_JOOMFISH_ADMIN_DATABASETABLE_HELP', 'Референция към базата данни (без представката!)');

define('_JOOMFISH_ADMIN_DATABASEFIELDS', 'Полета в базата данни');
define('_JOOMFISH_ADMIN_DATABASEFIELDS_HELP', 'Дефиниция на свързаните полета в базата данни.');
define('_JOOMFISH_ADMIN_DBFIELDNAME', 'Име');
define('_JOOMFISH_ADMIN_DBFIELDTYPE', 'Вид');
define('_JOOMFISH_ADMIN_DBFIELDLABLE', 'Етикет');
define('_JOOMFISH_ADMIN_TRANSLATE', 'Превод');

define('_JOOMFISH_SET_DEFAULTTEXT', 'Задай текст по подразбиране');												// new 1.5
define('_JOOMFISH_SET_COMPLETE', 'Задай като изпълнен');														// new 1.5
define('_JOOMFISH_SELECT_LANGUAGES', 'Всички езици');
define('_JOOMFISH_SELECT_NOTRANSLATION', 'Няма превод');
define('_JOOMFISH_NOTRANSLATIONYET', '(не е наличен превод)');
define('_JOOMFISH_SELECT_ELEMENTS', 'Моля изберете');
define('_JOOMFISH_NOELEMENT_SELECTED', 'Моля изберете елемент за който искате да проверите превода.');

define('_JOOMFISH_ORIGINAL', 'Оригинал');
define('_JOOMFISH_TRANSLATION', 'Превод');
define('_JOOMFISH_ITEM_INFO', 'Език');
define('_JOOMFISH_STATE_NOTEXISTING', 'Няма налични преводи');
define('_JOOMFISH_STATE_CHANGED', 'Оригинала е променен');
define('_JOOMFISH_STATE_OK', 'Статуса е ОК');

define('_JOOMFISH_COPY', 'Копирай');
define('_JOOMFISH_CLEAR', 'Изчисти');
define('_JOOMFISH_TRANSLATION_UPTODATE', 'Превода е <u>актуален</u>');
define('_JOOMFISH_TRANSLATION_INCOMPLETE', 'Превода е <u>незавършен</u> или оригинала е <u>променен</u>');
define('_JOOMFISH_TRANSLATION_NOT_EXISTING', 'Превод <u>НЕ Е</u> наличен');
define('_JOOMFISH_TRANSLATION_PUBLISHED', 'Превода е <u>публикуван</u>');
define('_JOOMFISH_TRANSLATION_NOT_PUBLISHED', 'Превода <u>НЕ Е</u> публикуван');
define('_JOOMFISH_STATE_TOGGLE', '(Натиснете върху иконата за промяна на състоянието.)');

define('_JOOMFISH_DBERR_NO_LANGUAGE', 'Моля изберете език');
define('_JOOMFISH_CONFIG_SAVED', 'Настройките са запаметени.');																// New 1.1
define('_JOOMFISH_CONFIG_PROBLEMS', 'Проблем при записа на настройките!');		// New 1.1
define('_JOOMFISH_LANG_PROBLEMS', 'Проблем при записа на езиковата информация!');		// New 1.1

define ('_JOOMFISH_ADMIN_CATEGORY','Филтър по категория');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Всички категории');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Филтър по автор');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Всички автори');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Ключова дума');													// New 1.7
define ('_JOOMFISH_ADMIN_TRANSLATION_PUBLISHED','Превода е публикуван');								// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE','Фълтър по меню');														// New 1.7
define ('_JOOMFISH_ADMIN_MENUTYPE_ALL','Всички менюта');													// New 1.7

define ('_JOOMFISH_ADMIN_CLIPBOARD_COPIED','Оригиналното съдържание бе копирано.\nСега го поставете във Вашия редактор');
define ('_JOOMFISH_ADMIN_CLIPBOARD_COPY','Натиснете ctl+C или command+C за да копирате оригиналното съдържание.\nСлед това го поставете в редактора');
define ('_JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT','Вашият браузър не поддържа копиране.\nИзберете оригиналния текст и го копирайте в редактора ръчно');     // New 1.7


/* new 1.7 */
define('_JOOMFISH_TITLE', 'Превод');
define('_JOOMFISH_ADMIN_HELP', 'Помощ');											// @since 1.7
define('_JOOMFISH_ADMIN_CHECK', 'Проверка на компонента');												// @since 1.7
define('_JOOMFISH_ADMIN_CONFIGURATION', 'Настройки');										// @since 1.7
define('_JOOMFISH_ADMIN_CREDITS', 'Автори');													// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_STATE', 'Състояние на компонента');									// @since 1.7
define('_JOOMFISH_ADMIN_TRANSLATION_STATE', 'Състояние на превода');								// @since 1.7
define('_JOOMFISH_ADMIN_SYSTEM_BOT_STATE', 'Състояние на системния бот');									// @since 1.7
define('_JOOMFISH_ADMIN_SEARCH_BOT_STATE', 'Състояние на бота за търсене');									// @since 1.7
define('_JOOMFISH_ADMIN_MODULE_STATE', 'Състояние на модула');										// @since 1.7
															// @since 1.7
define ('_JOOMFISH_ADMIN_LANGUAGE_TITLE','Управление на езици');							// @since 1.7
define ('_JOOMFISH_ADMIN_CATEGORY','Филтриране на категории');													// New 1.7
define ('_JOOMFISH_ADMIN_CATEGORY_ALL','Всички категории');												// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR','Филтриране по автор');														// New 1.7
define ('_JOOMFISH_ADMIN_AUTHOR_ALL','Всички автори');													// New 1.7
define ('_JOOMFISH_ADMIN_KEYWORD','Ключова дума');													// New 1.7
define ('_JOOMFISH_ADMIN_PREF_TITLE','Предпочитания');								// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Достъп');										// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Публикуване през сайта?');											// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Издатели, мениджъри, администратори');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','Никой');
//tooltips
define ('_JOOMFISH_TT_TITLE_NAME','Показване на езика');
define ('_JOOMFISH_TT_TITLE_ISO','Официален ISO код на езика.</strong>');
define ('_JOOMFISH_TT_IMAGES_DIR','За да използвате флаговете по дефиниция, оставете празно. За да използвате други изображения, напишете пътя до тях.');
define ('_JOOMFISH_TT_TITLE_ORDER','Подредба в сайта.');
define ('_JOOMFISH_TT_TRANS_DEFAULT','Използвайте при фиксиран текст. Ако искате текста да бъде бъде променлив в различните езици, трябва да ползвате константата <strong>_JOOMFISH_NO_TRANSLATION_AVAILABLE</strong> която съществува като дефиниция в езиковия файл.');
define ('_JOOMFISH_TT_SPACER','Разделител, който да се показва между езиците, когато те биват показвани хоризонтално.<br /><strong>Внимание</strong>: Ако оставите празно е възмжно за разделител да се появи, като дефиниция по подразбиране на Joomla! Обикновенно този разделител е: |.<br />Разделителя се ползва само между езиците не в началото и края на списъците.');

define ('_JF_FOOTER1','Джум!Фиш Версия');
define ('_JF_FOOTER2','Всички права запазени за');
define ('_JF_FOOTER3','под');
define ('_JF_FOOTER4','Лиценз за отворен код');
define ('_JF_FOOTER5','За контакти');
define ('_JF_HEADER1','Компонент за мултиезичност на Джумла! ');
define ('_JF_HEADER2','За авторите и останалата част от вселената');




// errors
define ('_JOOMFISH_ERROR','ГРЕШКА:');
define ('_JOOMFISH_EDITED_BY_ANOTHER_ADMIN','Обектът [ %s ] се редактира от друг администратор'); 
define ('_JOOMFISH_CONFIG_WRITE_ERROR','Файлът с настройки е без права!');
define ('_JOOMFISH_ADMIN_PREFERENCES','Превод');
define ('_JOOMFISH_FRONTEND_PUBLISH','Публикуване през сайта?');
define ('_JOOMFISH_ADMIN_PUBLISHERS','Издатели, Мениджъри и Администратори');
define ('_JOOMFISH_ADMIN_NOONE','Никой');
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Кой може да публикува преводи директно от сайта?');
define ('_JOOMFISH_ADMIN_MAMBOT_ERROR','Необходимия за функционирането на компонента бот не е инсталиран или не е публикуван');
define ('_JOOMFISH_ADMIN_TITLE_JOOMLA','Име на езиковия файл');


 define ('_JOOMFISH_ADMIN_PREF_TITLE','Настройки на Джум!Фиш');								// @since 1.7
define ('_JOOMFISH_ADMIN_ACCESS_PREFERENCES','Настройки на достъп');										// @since 1.7
define ('_JOOMFISH_FRONTEND_PUBLISH','Публикуване през сайта?');											// @since 1.7
define ('_JOOMFISH_ADMIN_PUBLISHERS','Издатели, мениджъри, администратори');											// @since 1.7
define ('_JOOMFISH_ADMIN_NOONE','Никой');																// @since 1.7
define ('_JOOMFISH_ADMIN_FEPUBLISH_HELP','Кой може да публикува преводи директно през сайта?');	// @since 1.7

define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION', 'Настройки на компонента');							// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_CONFIGURATION_HELP', 'Език в административния панел');		// @since 1.7
define('_JOOMFISH_ADMIN_COMPONENT_LANGUAGE', 'Език в администрацията');								// @since 1.7
define('_JOOMFISH_ADMIN_SHOWIF', 'Какво да се показва ако ...');
define('_JOOMFISH_ADMIN_NOTRANSLATION', 'не е наличен превод?');
define('_JOOMFISH_ADMIN_NOTRANSLATION_HELP', 'Тази функция работи само що се отнася за съдържанието на сайта!');
define('_JOOMFISH_ADMIN_ORIGINAL_CONTENT', 'Оригиналното съдържание');
define('_JOOMFISH_ADMIN_ORIGINAL_WITH_INFO', 'Оригиналното съдържание с информация');


define ('_JOOMFISH_ADMIN_TITLE_UNPUBLISHED', 'Не е публикуван');
define ('_JOOMFISH_NAME_MISSING','Моля въведете име');
define ('_JOOMFISH_ENTER_CORR_JOOMLA_NAME','Трябва да въведете съответното Joomla! име');
define ('_JOOMFISH_LANG_ALREADY_EXISTS','Вече е наличен език с това име, моля опитайте отново');

// upgrade
define('_JOOMFISH_UPGRADE', 'Обновяване');																	// @since 1.7
define('_JOOMFISH_ADMIN_UPGRADE_INFO', 'Обновяването от Мамбелфиш до Джум!Фиш изисква да<span style="font-weight:bold; color:red">ДА ИЗТРИЕТЕ</span> всички налични преводи и езици налични в Джум!Фиш!<br />Трябва да потвърдите това!');										// @since 1.7
define('_JOOMFISH_UPGRADE_BACKUP_TABLES', 'Запазване на бекъп на таблиците на Джум!Фиш?');									// @since 1.7
define('_JOOMFISH_UPGRADE_DELETE_TABLES', 'Потвърдете изтриването на таблиците на Джум!Фиш');						// @since 1.7
define('_JOOMFISH_UPGRADE_RENAME_TABLES', 'Преименуване на старите таблици след обновяване?');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_CONFIRM', '<span style="font-weight:bold; color:red">Трябва да потвърдите, че сегашните таблици ще бъдат изтрити!</span>');							// @since 1.7
define('_JOOMFISH_UPGRADE_ERROR_UPGRADE', 'Грешка при обновяването. Моля прегледайте лог файловете.');							// @since 1.7

define('_JOOMFISH_UPGRADE_SUCCESSFUL', '<span style="font-weight:bold; color:green">Обновяването е успешно</span>');											// @since 1.7
define('_JOOMFISH_UPGRADE_FAILURE', '<span style="font-weight:bold; color:red">Обновяването е неуспешно</span>');													// @since 1.7

define('_JOOMFISH_MBFBOT', 'Мамбелфиш бот');															// @since 1.7
define('_JOOMFISH_MBFMODULE', 'Мамбелфиш модул');														// @since 1.7
define('_JOOMFISH_MBF_UNPUBLISHED', '<span style="font-weight:bold; color:green">не са публикувани</span>' );											// @since 1.7
define('_JOOMFISH_MBF_NOTUNPUBLISHED', '<span style="font-weight:bold; color:red">НЕ МОГАТ да се спрат от публикуване!</span>' );							// @since 1.7

define('_JOOMFISH_CONTENT_BACKUP', 'Бекъп на таблици е');											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_SUCESSFUL', '<span style="font-weight:bold; color:green">успепешно в таблица #__jf_content_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_CONTENT_FAILURE', '<span style="font-weight:bold; color:red">Грешка при създаване на таблица #__jf_content_bak</span>' );			// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_SUCESSFUL', '<span style="font-weight:bold; color:green">успешно в таблица #__jf_languages_bak</span>' );											// @since 1.7
define('_JOOMFISH_BAK_LANGUAGES_FAILURE', '<span style="font-weight:bold; color:red">Грешка при създаване на #__jf_languages_bak</span>' );			// @since 1.7

define('_JOOMFISH_CONTENT_TABLES', 'Джум!Фиш таблици със съдържание');											// @since 1.7
define('_JOOMFISH_LANGUAGE_TABLES', 'Джум!Фиш таблици с езици');											// @since 1.7
define('_JOOMFISH_DEL_SUCESSFUL', '<span style="font-weight:bold; color:green">са успешно изтрити</span>' );											// @since 1.7
define('_JOOMFISH_DEL_FAILURE', '<span style="font-weight:bold; color:red">Грешка при изтриване на сегашните таблици</span>' );					// @since 1.7
define('_JOOMFISH_COPY_SUCESSFUL', '<span style="font-weight:bold; color:green">са успешно копирани</span>' );											// @since 1.7
define('_JOOMFISH_COPY_FAILURE', '<span style="font-weight:bold; color:red">Грешка при изтриване на сегашните таблици</span>' );					// @since 1.7



define( "_JF_LANG_INCLUDED", true );

define( "_JOOMFISH_NO_TRANSLATION_AVAILABLE",'Не е наличен превод на тази статия');
}

?>

