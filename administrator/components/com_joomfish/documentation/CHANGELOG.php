<?
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
 * $Id: CHANGELOG.php 305 2006-05-01 12:17:49Z akede $
 *
*/
 
// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );
?>

1. Copyright and disclaimer
---------------------------
This application is opensource software released under a variant of the LGPL.
Please see source code and the LICENSE file for more details.

Copyright 2003-2006 Think Network GmbH, Munich 
- All Rights Reserved.


2. Changelog
------------
This is a non-exhaustive (but still near complete) changelog for
the Joom!Fish 1.x, including beta and release candidate versions.

The Joom!Fish 1.x is based on the JoomFish 1.5 releases but includes some
drastic technical changes.


Legend:

* -> Security Fix
# -> Bug Fix
+ -> Addition
^ -> Change
- -> Removed
! -> Note

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

01-May-2006 Alex Kempkens
 # artf4491 : Minor errors in English language file
 # artf4521 : `value` field and `introtext` and `fulltext` fields haven't the same type
 ! Attention for an update from the RC you might want to alter this coulm manually!
 # artf4492 : Commenting _JF_LANG_INCLUDED variable
 # artf4344 : Add to default text
 ! Finishing for stable release

26-Apr-2006 Alex Kempkens
 + Added Thai language file and flag

17-Apr-2006 Geraint Edwards
 # joomfishmanager is not available during installation therefore causing problems setting short_loc wasn't 

16-Apr-2006 Geraint Edwards
 + Add translation of paramaters

13-Apr-2006 Geraint Edwards
 # Fixed artf4366"

12-Apr-2006 Geraint Edwards
 # Fixed artf4341 not counting all the rows!

10-Apr-2006 Ivo Apostolov
 + Adding Bulgarian Help File
 ^ Updated bulgarian help file in installer

10-Apr-2006 Alex Kempkens
 # artf4307 : Error on install
 # Corrected spelling error in file list

 ---------- Joom!Fish 1.7 Release Candidate Version ----------------
13-Apr-2006 Geraint Edwards
 # artf4366 : search only worked in Joomla 1.0.9 
 # artf4373: lang value from query ignored on first visit
 # artf4374: Allow configuration of default language for first time visitors

12-Apr-2006 Geraint Edwards
 # artf4341 :  Content items not all shown in translation list

09-Apr-2006 Alex Kempkens
 ^ updated Norwegian language file
 # artf4307 : Error on install
 
 
08-Apr-2006 Geraint Edwards
 # 4310 (created by fix to artf4285)

07-Apr-2006 Ivo Apostolov
+ Added Swedish Lang file

06-Apr-2006 Alex Kempkens
 # Fixed little issue with Default-Text (could be related to artf4106: Default Text not working)
 # issue with new bot-flag
 + default_text define to language files
 + Added norwegian help file

05-Apr-2006 Alex Kempkens
 - Removed check component link in cpanel - feature is post ponded for 1.8 release
 ^ toolbar of content elements
 ! preparing for RC 1.7
 + task2291 Paramter for enabling/disabling language determination on browser
 ^ changed the name of localized help files into joomfish.help.inc_<language_name>.php

04-Apr-2006 Geraint Edwards
 # artf4218 : Bad HTTP_REFERRER test

 04-Apr-2006 Alex Kempkens
 # artf4160 : Contacts: Description text bypassed
 # artf4158 : Installation adds extra english language

03-Apr-2006 Geraint Edwards
 + support for copy/paste for xstandard editor
 
02-Apr-2006 Geraint Edwards
 # artf4228 Inadequate test on empty table prefix
 
01-Apr-2006 Geraint Edwards
 # art4163 defaultText not working with content (also fixed handling of blank defaultText to use values from language files)

30-Mar-2006 Geraint Edwards
 + Filter out blank poll options and allow filtering of options based on poll name :)

28-Mar-2006 Geraint Edwards
 + Added copy and clear buttons for htmltext - currentlt supports tmedit, tinymce, jce, fckeditor
 # Fix for "message with original content if no translation" - needs multi-language extention
 
28-Mar-2006 Alex Kempkens
 + artf4053: searchbot for actual language
 ^ corrected credits
 # artf4159 : Changelog-link not working

 ---------- Joom!Fish 1.7 Beta 2 Version ----------------
28-Mar-2006 Alex Kempkens
 ! Packaged distribution file

27-Mar-2006 Ivo Apostolov
 # Fixes of hardcoded texts
 # Update of language files

27-Mar-2006 Alex Kempkens
 + Upgrade functionallity implentend (artf3139: Upgrading from Mambelfish)
 # German language file updated
 + English language file: upgrade dialog added
 
27-Mar-2006 Geraint Edwards
 + Add translation filter memory (it really does make things easier to manage!)
 + "New copy to clipboard functionality and associated messages."
   artf3465: Copy and clear buttons for all fields

24-Mar-2006 Alex Kempkens
 # artf3987	Entitleing of fields (included mosStripslashes again for ALL fields)
 # artf4042	Slashed added to quotation marks in translation! (same as artf3987)
 # artf4076	Can't insert an image in translation (same as artf3987)
 # artf4081	In Translation when link is added to text; link error! (same as artf3987)
 # artf4052	[Trivial] Tooltip description of imagefilename is wrong
 # artf4087	module HTML errors - unescaped & or unknown entity "&..."
 ^ Corrected language define names to JOOMFISH
 # artf4020	Search bot not searching static text
 # artf4000	Uninstall should remove mambots and modules
 ^ Updated German language file

23-Mar-2006
 # artf4055: Bug in install.joomfish.php


20-Mar-2006 Ivo Apostolov
 + Updated Norwegian, French and Spanish Language Files

18-Mar-2006 Geraint Edwards
 + Added the following filters:
   Module filter - to hide admin modules
   MenuType filter - to filter by specific menus
   Published filter - to look for missing or unpublished translations (ideally by language)
 # artf3990 Depricated by reference call

17-Mar-2006 
  # Fix of MySQL error in installation. http://forum.joomla.org/index.php/topic,47297.0.html

---------- Joom!Fish 1.7 Beta Version ----------------
17-Mar-2006 Alex Kempkens
 # Issue with wrong copy text in translation dialog

17-Mar-2006 Geraint Edwards
 # Removed references to collation in SQL table creation
 # missing global declaration of select_language_id
 # fix for SEF language switching 
 
17-Mar-2006 Ivo Apostolov
 # Removing collation from joomfish.xml 

16-Mar-2006 Alex Kempkens
 ^ Module styles and possible alternatives, based on suggestions from accessiblity team
 ! todo, adding a bottom for the language select list
 ^ reworked the look and feel of the documentation, credits and licenes pages
 + central control panel for the component
 ^ several language defines to have new text within the cpanel and other pages
 ^ marked several language defines as deprecated (will be removed next version)
 # [mx:#5157] Undefined variable: mosConfig_locale
 # [mx:#5164] Language selector in fontend, &amp;amp; bug with combo box style
 # [mx:#5179] Component icon not available in backend
 # [mx:#5195] CSS validation URL violation
 # [mx:#5274] No language switchinging on startpage via drop down list
 # [mx:#5374] Undefined index: mbf_dir
 # [mx:#7236] overlib doesn't work
 # [mx:#7150] Undefined variable: hrefVars
 # fixed bug in system-bot, with missing default site lang
 # fixed bug related to uncorrect status lamps
 + Added all in one installer
 ^ Text in post install screen
 # Fixed content element dialog
 # artf1224 : Make content images, alt texts and captions translatable

15-Mar-2006 Geraint Edwards
 + Added translation filters for admin interface 
 + Added new defines to english.php to cover translation filters
 # [mx:#5167] phpwarnings $mosConfig_dbprefix

10-Mar-2006 Ivo Apostolov
 ^ Changes in english language file. Item Information is changed to Publishing

09-Mar-2006 Ivo Apostolov
 # fixed bug in joomfish.xml

11-Mar-2006 Alex Kempkens
 # fixed module issue with language parameter & SEF

08-Mar-2006 Alex Kempkens
 + Finised work on the module
 + Added possibility to hide active language within the module
 # fixed artf3826 : Generate *closed* IMG Tags to comply with W3C standard
 # fixed artf3034 : Undefined property notice
 ^ SQL definition to include the JoomFish component as possible link
 ^ removed uninstall queries
 ^ Added bosnian flag, changed swedish flag within XML
 ^ updated norwegian language file
 # fixed artf1330 : Meta Desc and Tag translatable

06-Mar-2006 Geraint Edwards
 + Added config paramater to enable publishing of translations from frontend
 + Removed assumption that primary key for a table is called "id"
 + Added support for translation sql queries involving more than one table at once
 + Take account of tablename and field name aliases in translation 
 + Translate lists all in one go (performance improvement)
 # Content can now be created in the frontend in a non-default language
 # PHP5 copy by reference problem eliminated
 # date formatting fix for admin interface
 + Added Welsh flag

06-Mar-2006 Alex Kempkens
 + Added language determination to system bot
 ^ moved module display from component to module code
 ^ added special module css for Joom!Fish display
 ^ reworked module display using ul or div - not be continued

02-Mar-2006 Ivo Apostolov
 + Added Bulgarian Language File
 ^ Updated SQL file for manual installation, added queries for the bots, change of the module name
 ^ Changed the toolbar.html.php - Cosmetic changes to fit to the outlook of Joomla!
 + Added the Poll Options Content Element, which was missing
 # Changed the name of the component in mosLoadComponents in the module.
 

01-Mar-2006 Alex Kempkens
 + Added Systembot for mlDatabase integration
 ^ splitted mldatabase class into intepended file
 ^ prepared jf_language_selection module xml and parameters

22-Feb-2006 Alex Kempkens
 ^ Naming from mambelfish to joomfish in most of the files
 ^ Corrected copyright notice and references to other sites, documents
 ^ renamed classes to fit to the new name
 ^ refactored the database tables in order to provide more effective use

21-Feb-2006 Alex Kempkens
 ^ Reworked the copyright and nameing convertions from the old release
 + added new structure and basic files to the SVN
 
 === Base of work procress is JoomFish 1.5 release                              ===
