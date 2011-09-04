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
 * $Id: ReadMe.php 14 2006-02-21 11:19:17Z akede $
 *
*/
 
// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );
?>

Welcome to the Joom!Fish multi lingual extention

FIRST OF ALL. JOOM!FISH DOES NOT PROVIDE ANY AUTOMATIC TRANSLATION! IT'S A 
MANAGER FOR THE TRANSLATION PROCESS AND A MANUAL TRANSLATION 
CAPAPILITIES OF JOOMLA!.


The Joom!Fish extention is a package of a translation manager, a language 
selection module, and two bots for additional features in searching and 
translating database stored information on the fly. The idea of the Joom!Fish 
is to give you a tool that is enabling you to translate any dynamic information 
within your Joomla! CMS. The translation is based on a generic mapping between
the database tables and the information needed for rendering your content,
module or component output. It is in the responsibility of the 3rd Party
developer to provide the required configuration files for the translation but
generally there is no limitation in the structure or information you want to
make translatabe.


The key features of the fish are:
 * Possibility for an unlimited amount of languages
 * Possibility to MANUAL translate all dynamic information of your Joomla!
   or the additional components/modules within ONE database
 * Overview of the changed contents in the translation list
 * Capabilities of front end translation
 * Module for language selection
 * SearchBot for searches within translated contents
 
 
Introduction
------------
The Joom!Fish project is a so called Joomla! add on project and with this
maintained by the Joomla! core team members and some additional developers.

You can find the project homepage, forum and all additional information at
the Joomla! developer forge at http://developer.joomla.org/projects/joomfish/.

When ever you have questions or new ideas please visit this page and post your 
comments there. The project community is willing to support you in any 
questions. There is also a multi lingual forum at forum.joomla.org which
discusses additional topics around the multi lingual handling of information
within the CMS Joomla!.

Please understand that Think Network or any other developer can only support 
you thru these plattforms. We normally will not answer direct emails or 
support requests. Thank's for your understanding.



Languages
---------

You can download a great variaty of different frontend languages from the
translation partner sites. For a list please visit www.joomla.org and the
forge at developer.joomla.org, searching for the name of your language.

These language files provide the static text information within your templates
or components/modules (e.g. "login", "forgot your password").

By installing the new languages files thru the Language Manager
(Administrator -> Site -> Language Manager) you can use these different adapted
text information. You can upload as many language files as you like!

After uploading these files in the language manager it is possible to use
these languages in the Joom!Fish for the translation process. Please follow
the installation and configurations instructions below.


Joom!Fish system integration
----------------------------
The integration of the automatic translation process is done by a special
system bot which loads a new database transaction layer. This layer is inherited
from the standard jDatabase class and transports the whole interface.

The enhancements will automatically validate any query and automatically trans-
late the content on the fly. This concept results in the fact that no 3rd Party
component or any other object within the Joomla! CMS framework needs to call
a translation method. A call to the $database->loadResult() or $object->load()
methods will return an already translated object.

Please note that in an envirmonment with heavily use of modules and other
elements on your sites this concept can result in a high database usage. In
such an environment page and site caching is highly recommended.




Installation
------------




Language configuration
---------------------
As said, the first step is to upload at least a second language to your
Joomla installation. Do this with the help of the Language Manager
(Administrator -> Site -> Language Manager).

After you installed the language go to
Administrator -> Components -> Joom!Fish -> Component Configuration

Choose the tab "Languages" and activate the new language. Also define the
ISO code and the Name, which is the visible name in the frontend component.
Save the new configuration.

This kind of activation must be done for each language added to the system.


Translation process
-------------------
The translation process is based on the translation overview (Component ->
Joom!Fish -> Translation). In this overview you have to select the language
you want to translate into and a content element.

The content elements represent the possible dynamic content in your database.
This includes normally all your sections, categories, content items but also
the information from other components, like the web links, polls and so on.

It is possible to add new content elements just by adding new XML files in the
folder /administrator/components/com_Joom!Fish/contentelements. These files
describe how the table structure is organized and which fields of the
table should be translatable and how.

After you selected one language and one content element you will see all the
items of this filter. Best start with your new language and the content elements
"menues". Click on one item in the list to translate it.

Now you see the details of the translation - go ahead. Second tab publish
the translation of this item and make sure the language is correct - Save.

Now you can go back to the frontend and you should already find your menu
translated (of course after a reload or change to your new language ;-)).

Small hint:
===========
I found out that it is the best to start creating your site in one language and
translate anything to a second, third one. In this way it is most easy for you
to build the structure and finally translate it to the other languages.
Anyhow if you once have a original content in a second language don't worry,
just translate it into your primary language and you are fine.



I hope this more detailed documentation helped a bit for the first steps.

Thanks to the community for all the support in testing, and new ideas

Alex

