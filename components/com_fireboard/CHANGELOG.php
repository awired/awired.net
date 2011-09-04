<?php
/**
* @version $Id: CHANGELOG.php 314 2007-09-04 18:39:42Z danialt $
* Fireboard Component
* @package Fireboard
* @Copyright (C) 2006 - 2007 Best Of Joomla All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.bestofjoomla.com
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );
?>

Changelog
------------
This is a non-exhaustive (but still near complete) changelog for
the Fireboard 1.x, including beta and release candidate versions.
The Fireboard 1.x is based on the Joomlaboard releases but includes some
drastic technical changes.
Legend:

* -> Security Fix
# -> Bug Fix
+ -> Addition
^ -> Change
- -> Removed
! -> Note

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
01-September-2007 Miro Dietiker
 + DB Iterator to iterate on huge queries for optimum performance
   (related results are not loaded fully in php memory causing memory exhaust)
 # reCountBoards now is able to reCount without exhausting php in huge forums
17-August-2007 Miro Dietiker
 + CSS Suffixes per forum
 + Feature User Edit disable after n seconds
 + Forums can have header text showing up persistently in forum
 # Migration from JB now produces indices and identical layout as plain
 install from zero
 # Better code stripping for mails when post containing boardcode
 # Announcements can now contain HTML
 # Textarea fields (descriptions) get no more trailing spaces on each edit

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
30-August-2007 Danial Taherzadeh (danialt)


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
23-July-2007 Danial Taherzadeh (danialt)
 # Cpanel order
 ^ Uploaded directory moved to root/fbfiles and required upgrade added to sql

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
17-July-2007 Dan Syme (igd)
 # bug fix - sample data table
 + rank administration added

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
15-July-2007 Danial Taherzadeh (danialt)
 # [#5693] Permission Code error case pub_recurse (&fix)
 + Bulk delete to forum list added
 ^ jQuery updated to the latest version 1.3.1.1

 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
18-May-2007 Danial Taherzadeh (danialt)
 # [#440] Warning: Invalid argument supplied for foreach() in /components/com_fireboard/template/default/view.php on line 636
 # wrong variable name for live path of fireboard
 # itemid bugs, pagination error
 + added missed images on userlist and pm . And uhits field. userprofile fix, userlist fix.
 # missing com_ for com_fireboard option text
 # SEF problem on menu links .. a new variable JB_LIVEURLREL is introduced for SEF calls
 # forum top - forum bottom links now working
 + v1.0.1 release db changes added to installation and upgraded the sql files

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
14-May-2007 Aliyar FIRAT (greatpixels)
 ^ Change all css file and bof- to fb_ , Better css coding. All tempaltes should be updated!
 # Fix IE "No post" table show problem
 # mark all read FB_ITEMID_SUFFIX Fix
 + Added linkable category images.
 # Announcement css and fix userprofile.php

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
10-May-2007 Danial Taherzadeh (danialt)
 ^ FB is moved to a class structure, Itemids and general path are defined there. Hence to avoid any extra DB calls and code, please use the constants defined in that file
 ^ All the unncessary mosGetParams where removed.
 ^ _JB_ renamed to _FB_
 ^ Moved common functions to the class.fireboard.hp

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
04-May-2007 Danial Taherzadeh (danialt)
 # Fixed the MySQL 3 JOIN problem
 # Fixed bug in avatar gallery selection
 # Fixed confliction between SMF hacks and FB : Timeformat function
 # Fixed CB and FB confliction: fmodReplace & check_image_type functions
 ^ Added missing brackets for single IF tags in message.php
 # Apostrophes used in Fireboard cause a backslash to be displayed in front of the apostrophe only in the Topic Header, Pathway, and Last Post sections
 # Missing sendPM icon, not take consideration for templates other than default
 # Include the Community Builder language file if necessary and set CB itemid value / wrong config var
 + Userlist plugin added, lang files updated, config tab added for plugins, options for userlist
 # Missing table tag when in guest mode, listcat.php
 # Do not reload the page if user is posting, to avoid duplicate posts
 # Quick reply cancel not working


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
23-Apr-2007 Tomislav Ribicic (Riba)
 # Fixed the Community Builder itemid retreival

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
22-Apr-2007 Danial Taherzadeh (danialt)

 # Announcements SEF urls were created wrong
 + FB Profile switch added
 + subscription ON by default switch
 + online user status added
 + total fav count
 + added module positions
 # missing link css for whois part
 + subscribe to the thread box is checked by default, with a switch for admin config
 ^ code beautifying and formating
 + basic group management added, at least to work on boj website. the values are kept in a new table, fb_groups and a new field is added to fb_user, group_id
 + Fireboard profile page plugin has been added, needs to be polished though

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
22-Apr-2007 Ivo Apostolov (iapostolov)
 + Adding Missus Support
 + Adding JIM Support
 ^ Polished some GUI classes in the administration
 + Added new definitions in english.php
 + Added language variables to admin.fireboard.html.php
 - Removal of all hardcoded strings from admin.fireboard.html.php

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Initial version published (Fireboard 1.0)
