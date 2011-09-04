<?php
/**
* @version $Id: fireboard.php 63 2007-04-17 21:23:17Z danialt $
* Fireboard Component
* @package Fireboard
* @Copyright (C) 2006 - 2007 Best Of Joomla All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.bestofjoomla.com
*
* Based on Joomlaboard Component
* @copyright (C) 2000 - 2004 TSMF / Jan de Graaff / All Rights Reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @author TSMF & Jan de Graaff
**/

// Dont allow direct linking
defined ('_VALID_MOS') or die('Direct Access to this location is not allowed.');

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;

// Kill notices (we have many..)
error_reporting (E_ALL ^ E_NOTICE);

global $mosConfig_lang, $fbConfig, $fbIcons;

// Get all the variables we need and strip them in case
$action = mosGetParam($_REQUEST, 'action', '');
$attachfile = mosGetParam($_FILES['attachfile'], 'name', '');
$attachimage = mosGetParam($_FILES['attachimage'], 'name', '');
$catid = (int)mosGetParam($_REQUEST, 'catid', '0');
$contentURL = mosGetParam($_REQUEST, 'contentURL', '');
$do = mosGetParam($_REQUEST, 'do', '');
$email = mosGetParam($_REQUEST, 'email', '');
$favoriteMe = mosGetParam($_REQUEST, 'favoriteMe', '');
$fb_authorname = mosGetParam($_REQUEST, 'fb_authorname', '');
$fb_thread = mosGetParam($_REQUEST, 'fb_thread', '');
$func = mosGetParam($_REQUEST, 'func', 'listcat');
$id = (int)mosGetParam($_REQUEST, 'id', '');
$limit = intval(mosGetParam($_REQUEST, 'limit', 0));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));
$markaction = mosGetParam($_REQUEST, 'markaction', '');
$message = mosGetParam($_REQUEST, 'message', '');
$page = mosGetParam($_REQUEST, 'page', '');
$parentid = (int)mosGetParam($_REQUEST, 'parentid', '');
$pid = (int)mosGetParam($_REQUEST, 'pid', '');
$replyto = mosGetParam($_REQUEST, 'replyto', '');
$resubject = mosGetParam($_REQUEST, 'resubject', '');
$return = mosGetParam($_REQUEST, 'return', '');
$rowid = (int)mosGetParam($_REQUEST, 'rowid', '');
$rowItemid = mosGetParam($_REQUEST, 'rowItemid', '');
$sel = mosGetParam($_REQUEST, 'sel', '');
$subject = mosGetParam($_REQUEST, 'subject', '');
$subscribeMe = mosGetParam($_REQUEST, 'subscribeMe', '');
$thread = (int)mosGetParam($_REQUEST, 'thread', '');
$topic_emoticon = mosGetParam($_REQUEST, 'topic_emoticon', '');
$userid = (int)mosGetParam($_REQUEST, 'userid', '');
$view = mosGetParam($_REQUEST, 'view', '');

// get fireboards configuration params in
include_once ($mainframe->getCfg("absolute_path") . '/administrator/components/com_fireboard/fireboard_config.php');

// Class structure should be used after this and all the common task should be moved to this class
require_once ($mainframe->getCfg("absolute_path") . "/components/com_fireboard/class.fireboard.php");

// get right Language file
if (file_exists(JB_ABSADMPATH . '/language/' . JB_LANG . '.php')) {
    include_once (JB_ABSADMPATH . '/language/' . JB_LANG . '.php');
    }
else {
    include_once (JB_ABSADMPATH . '/language/english.php');
    }

// Include Clexus PM class file
if ($fbConfig['pm_component'] == "clexuspm")
{
    require_once ($mosConfig_absolute_path . '/components/com_mypms/class.mypms.php');
    $ClexusPMconfig = new ClexusPMConfig();
}

//time format
include_once (JB_ABSSOURCESPATH . 'fb_timeformat.class.php');

$systime = time() + ($mainframe->getCfg('offset_user') * 3600);
$settings = $_COOKIE['fboard_settings'];

// set configuration dependent params
$str_FB_templ_path = JB_ABSPATH . '/template/' . $fbConfig['template'];
$board_title = $fbConfig['board_title'];
$fromBot = 0;
$prefview = $fbConfig['default_view'];

// JOOMLA STYLE CHECK
if ($fbConfig['joomlaStyle'] < 1) {
    $boardclass = "fb_";
    }

// Add required header tags
$mainframe->addCustomHeadTag('<script type="text/javascript" src="' . JB_JQURL . '"></script>');
$mainframe->addCustomHeadTag('<script type="text/javascript">
//1: show, 0 : hide
jr_expandImg_url = "' . JB_URLIMAGESPATH . '";</script>');
$mainframe->addCustomHeadTag('<script type="text/javascript" src="' . JB_COREJSURL . '"></script>');

if ($fbConfig['joomlaStyle'] < 1) {
    $mainframe->addCustomHeadTag('<link type="text/css" rel="stylesheet" href="' . JB_TMPLTCSSURL . '" />');
    }
else {
    $mainframe->addCustomHeadTag('<link type="text/css" rel="stylesheet" href="' . JB_DIRECTURL . '/template/default/joomla.css" />');
    }

// WHOIS ONLINE IN FORUM
if (file_exists(JB_ABSTMPLTPATH . '/plugin/who/who.class.php')) {
    include (JB_ABSTMPLTPATH . '/plugin/who/who.class.php');
    }
else {
    include (JB_ABSPATH . '/template/default/plugin/who/who.class.php');
    }

// include required libraries
if (file_exists(JB_ABSTMPLTPATH . '/fb_layout.php')) {
    require_once (JB_ABSTMPLTPATH . '/fb_layout.php');
    }
else {
    require_once (JB_ABSPATH . '/template/default/fb_layout.php');
    }

require_once (JB_ABSSOURCESPATH . 'fb_permissions.php');
require_once (JB_ABSSOURCESPATH . 'fb_category.class.php');

if ($catid != '') {
    $thisCat = new jbCategory($database, $catid);
    }

if (defined('JPATH_BASE')) {
    jimport ('pattemplate.patTemplate');
    }
else {
    require_once (JB_JABSPATH . '/includes/patTemplate/patTemplate.php');
    }

$obj_FB_tmpl = new patTemplate();
$obj_FB_tmpl->setBasedir($str_FB_templ_path);

// Permissions: Check for administrators and moderators
if ($my->id != 0)
{
    $aro_group = $acl->getAroGroup($my->id);
    $is_admin = (strtolower($aro_group->name) == 'super administrator' || strtolower($aro_group->name) == 'administrator');
}
else
{
    $aro_group = 0;
    $is_admin = 0;
}

$is_moderator = fb_has_moderator_permission($database, $thisCat, $my->id, $is_admin);

// TODO: both rss and pdf are totally broken atm, need to fix!
//intercept the RSS request; we should stop afterwards
if ($func == 'fb_rss')
{
    include (JB_ABSSOURCESPATH . 'fb_rss.php');
    die();
}

if ($func == 'fb_pdf')
{
    include (JB_ABSSOURCESPATH . 'fb_pdf.php');
    die();
}

// Include the Community Builder language file if necessary and set CB itemid value
$cbitemid = 0;

if ($fbConfig['cb_profile'])
{
    // $cbitemid = JBgetCBprofileItemid();
    // Include CB language files
    $UElanguagePath = $mainframe->getCfg('absolute_path') . '/components/com_comprofiler/plugin/language';
    $UElanguage = $mainframe->getCfg('lang');

    if (!file_exists($UElanguagePath . '/' . $mosConfig_lang . '/' . $mosConfig_lang . '.php')) {
        $UElanguage = 'default_language';
        }

    include_once ($UElanguagePath . '/' . $UElanguage . '/' . $UElanguage . '.php');
}

// fireboard Current Template Icons Pack
// See if there's an icon pack installed
$useIcons = 0; //init
$fbIcons = 0;

if (file_exists(JB_ABSTMPLTPATH . '/icons.php'))
{
    include_once (JB_ABSTMPLTPATH . '/icons.php');
    $useIcons = 1;
}
else {
    include_once (JB_ABSPATH . '/template/default/icons.php');
    }

//Get the userid; sometimes the new var works whilst $my->id doesn't..?!?
$my_id = $my->id;

if ($fbConfig['regonly'] && !$my->id)
{
    echo _FORUM_UNAUTHORIZIED . "<br />";
    echo _FORUM_UNAUTHORIZIED2;
}
else if ($fbConfig['board_offline'] && !$is_admin) {
    echo $fbConfig['offline_message'];
    }
else
{
    //Initial settings; lots of cookie baking things and session tracking...
    //Note: extremely ugly code here!
    // ob_start();
    $new_fb_user = 0;
    $previousVisit = 0;
    /* Session administration. For security reasons, we will want to initialize it with every
    * Access to fireboard. If we'd pass it with posts or pass it through cookies, we would
    * introduce the risk that someone starts 'leeching' on other sessions... we do not want that.
    * After a perion of 30 minutes if inactivity, the priviliges are reset.
    */
    //try to get an existing sessions to recycle - if n/a this is a new user
    $database->setQuery("SELECT * from #__fb_sessions where userid=" . $my->id);
    $fbSessionArray = $database->loadObjectList();
    $fbSession = $fbSessionArray[0];

    if ($fbSession->userid == "")
    {
        //new session, first access
        $previousVisit = time() - 1314000; //minus 1 year; you gotta draw the line somewhere...
        $new_fb_user = 1;
    }
    else {
        $previousVisit = $fbSession->lasttime;
        } //user has been here before; this was the last time

        //if s/he is not a guest
    if ($new_fb_user != 1)
    {     //get session information, update last time timestamp.
        $inactivePeriod = ($fbSession->lasttime)+1800;

        if ($inactivePeriod < $systime)
        { //grant them 30 minutes of inactivity; then recheck privileges and try to send them back where they came from
            $database->setQuery("UPDATE #__fb_sessions SET allowed='na', readtopics='' where userid=$my->id");
            $database->query();
            setcookie("fboard_settings[prevvisit]", $fbSession->lasttime, time() + 31536000, '/');

            // do not reload the page if user is posting :: TODO: check if it cab be replaced by mosRedirect
            if ($func != "post") {
                echo '<script language="javascript">setTimeout("window.location.reload( true )",100);</script>';
            }
        }

        $database->setQuery("UPDATE #__fb_sessions SET lasttime=$systime where userid=$my->id");
        $database->query();
    }

    //Some things should only occur once so first check if we got a new user
    //(user switched to another userid) or a totally new user who just logged on
    //(in both cases the member_id cookie doesn't match the actual user... check..
    //pseudo: if (empty cookie or cookie_id isn't userid) then new user
    if ($settings[member_id] == "" || $settings[member_id] != $my->id)
    {
        //other or new user
        $new_fb_user = 1;
        $allowed_forums = "";
    }

    //New User: Set who this is in a session cookie:
    //pseudo: if (empty_cookie or new user) then set cookie
    if ($settings[member_id] == "" || $new_fb_user == 1 || $markaction == "allread")
    {
        setcookie("fboard_settings[member_id]", $my->id, time() + 31536000, '/');
        //$previousVisit=$previousVisit+($fbConfig['board_ofset']*3600);
        setcookie("fboard_settings[prevvisit]", $systime, time() + 31536000, '/');

        if ($markaction == "allread") {
            $database->setQuery("UPDATE #__fb_sessions SET lasttime='$systime', readtopics='' where userid=$my->id");
            $database->query();

            echo "<script> alert('" . _GEN_ALL_MARKED . "'); window.location='" . sefRelToAbs(JB_LIVEURLREL) . "';</script>\n";

        }
    }

    //Initial:: get the user's profile if (s)he's registered. If there's no profile
    //for a registered user, we assume (s)he's here for the first time, so we
    //create one. This should only occur once every session!
    //pseudo: if (new user and ( userid isn't empty or userid isn't zero)
    if ($new_fb_user == 1 && ("" != $my->id || 0 != $my->id))
    {
        $prefview = ""; //reset value
        $database->setQuery("select view from #__fb_users where userid=$my->id");
        $prefview = $database->loadResult();

        if ($prefview == "")
        {
            //assume there's no profile; set userid and the default view type as prefered view type.
            if ($fbConfig['default_view'] == "threaded")
            {
                if ($fbConfig['cb_profile']) {
                    $database->setQuery("update #__comprofiler set fbviewtype='_UE_FB_VIEWTYPE_THREADED' where user_id=$my->id");
                    }

                $database->setQuery("insert into #__fb_users (userid,view) values ('$my->id','threaded')");

                if (!$database->query()) {
                    echo _PROBLEM_CREATING_PROFILE;
                    }
            }
            else
            {
                if ($fbConfig['cb_profile']) {
                    $database->setQuery("update #__comprofiler set fbviewtype='_UE_FB_VIEWTYPE_FLAT' where user_id=$my->id");
                    }

                $database->setQuery("insert into #__fb_users (userid,view) values ('$my->id','flat')");

                if (!$database->query()) {
                    echo _PROBLEM_CREATING_PROFILE;
                    }
            }

            $prefview = $fbConfig['default_view'];

            if ($is_admin)
            { //admin is always a moderator on fireboard
                $database->setQuery("UPDATE #__fb_users SET moderator='1' WHERE userid='$my->id'");
                $database->query();
            }

            setcookie("fboard_settings[current_view]", $prefview, time() + 31536000, '/');
        }

        //initialize the user session tracking
        if (!$fbSession->userid)
        {
            $database->setQuery("INSERT INTO #__fb_sessions (userid,allowed,lasttime,readtopics) values ($my->id, 'na', $systime,'')");

            if (!$database->query()) {
                die ("Serious db problem:" . $database->getErrorMsg());
                }
        }
        else
        {
            $database->setQuery("UPDATE #__fb_sessions SET allowed='na', lasttime=$systime, readtopics='' where userid=$my->id");

            if (!$database->query()) {
                die ("Serious db problem:" . $database->getErrorMsg());
                }
        }
    }

    if ($fbConfig['cb_profile'] && ("" != $my->id || 0 != $my->id))
    {
        $database->setQuery("select fbviewtype from #__comprofiler where user_id=$my->id");
        $fbviewtype = $database->loadResult();

        if ($fbviewtype == "_UE_FB_VIEWTYPE_THREADED") {
            $prefview = "threaded";
            }
        else {
            $prefview = "flat";
            }

        setcookie("fboard_settings[current_view]", $prefview, time() + 31536000, '/');
    }

    //Initial:: determining what kind of view to use... from profile, cookie or default settings.
    //pseudo: if (no view is set and the cookie_view is not set)
    if ($view == "" && $settings[current_view] == "")
    {
        //pseudo: if there's no prefered type, use FB's default view otherwise use prefered view from profile
        //and then set the cookie right
        $view = $prefview == "" ? $default_view : $prefview;
        setcookie("fboard_settings[current_view]", $view, time() + 31536000, '/');
    }
    //pseudo: otherwise if (no view set but cookie isn't empty use view as set in cookie
    else if ($view == "" && $settings[current_view] != "") {
        $view = $settings[current_view];
        }

    //get previous visit time from cookie; if there's no cookie yet, use database stored value
    if ($settings[prevvisit] == 0 && $previousVisit != 0) {
        $prevCheck = $previousVisit;
        }
    else {
        $prevCheck = $settings[prevvisit];
        }

    //Get the max# of posts for any one user
    $database->setQuery("SELECT max(posts) from #__fb_users");
    $maxPosts = $database->loadResult();


    //Get the topics this user has already read this session from #__fb_sessions
    $readTopics=$fbSession->readtopics;
    $read_topics = explode(',', $readTopics);

    /*       _\|/_
             (o o)
     +----oOO-{_}-OOo--------------------------------+
     |    Until this section we have included the    |
     |   necessary files and gathered the required   |
     |     variables. Now let's start processing     |
     |                     them                      |
     +----------------------------------------------*/

    //Check if the catid requested is a parent category, because if it is
    //the only thing we can do with it is 'listcat' and nothing else
    if ($func == "showcat" || $func == "view" || $func == "post")
    {
        $database->setQuery("SELECT parent FROM #__fb_categories WHERE id=$catid");
        $strCatParent = $database->loadResult();

        if ($catid == '' || $strCatParent == 0) {
            $func = 'listcat';
            }
    }

    switch ($func)
    {
        case 'view':
            $fbMenu = jb_get_menu(FB_CB_ITEMID, $fbConfig, $fbIcons, $my->id, 3, $view, $catid, $id, $thread);

            break;

        case 'showcat':
            //get number of pending messages
            $database->setQuery("SELECT count(*) FROM #__fb_messages WHERE catid=$catid and hold=1");

            $numPending = $database->loadResult();

            $fbMenu = jb_get_menu(FB_CB_ITEMID, $fbConfig, $fbIcons, $my->id, 2, $view, $catid, $id, $thread, $is_moderator, $numPending);
            break;

        default:
            $fbMenu = jb_get_menu(FB_CB_ITEMID, $fbConfig, $fbIcons, $my->id, 1);

            break;
    }

    // display header
    $obj_FB_tmpl->readTemplatesFromFile("header.html");
    $obj_FB_tmpl->addVar('jb-header', 'menu', $fbMenu);
    $obj_FB_tmpl->addVar('jb-header', 'board_title', $board_title);
    $obj_FB_tmpl->addVar('jb-header', 'css_path', JB_DIRECTURL . '/template/' . $fbConfig['template'] . '/forum.css');
    $obj_FB_tmpl->addVar('jb-header', 'offline_message', $fbConfig['board_offline'] ? '<span id="fbOffline">' . _FORUM_IS_OFFLINE . '</span>' : '');
    $obj_FB_tmpl->addVar('jb-header', 'searchbox', getSearchBox());
    $obj_FB_tmpl->addVar('jb-header', 'pb_imgswitchurl', JB_URLIMAGESPATH . "shrink.gif");
    $obj_FB_tmpl->displayParsedTemplate('jb-header');

    //BEGIN: PROFILEBOX
    if (file_exists(JB_ABSTMPLTPATH . '/plugin/profilebox/profilebox.php')) {
        include (JB_ABSTMPLTPATH . '/plugin/profilebox/profilebox.php');
        }
    else {
        include (JB_ABSPATH . '/template/default/plugin/profilebox/profilebox.php');
        }
    //FINISH: PROFILEBOX

    switch (strtolower($func))
    {
        case 'who':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/who/who.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/who/who.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/who/who.php');
                }

            break;

        #########################################################################################
        case 'announcement':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/announcement/announcement.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/announcement/announcement.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/announcement/announcement.php');
                }

            break;

        #########################################################################################
        case 'stats':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/stats/stats.class.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/stats/stats.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/stats/stats.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/plugin/stats/stats.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/stats/stats.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/stats/stats.php');
                }

            break;

        #########################################################################################
        case 'fbprofile':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/fbprofile/fbprofile.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/fbprofile/fbprofile.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/fbprofile/fbprofile.php');
                }

            break;

        #########################################################################################
        case 'userlist':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/userlist/userlist.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/userlist/userlist.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/userlist/userlist.php');
                }

            break;

        #########################################################################################
        case 'post':
            if (file_exists(JB_ABSTMPLTPATH . '/smile.class.php')) {
                include (JB_ABSTMPLTPATH . '/smile.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/smile.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/post.php')) {
                include (JB_ABSTMPLTPATH . '/post.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/post.php');
                }

            break;

        #########################################################################################
        case 'view':
            if (file_exists(JB_ABSTMPLTPATH . '/smile.class.php')) {
                include (JB_ABSTMPLTPATH . '/smile.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/smile.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/view.php')) {
                include (JB_ABSTMPLTPATH . '/view.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/view.php');
                }

            break;

        #########################################################################################
        case 'faq':
            if (file_exists(JB_ABSTMPLTPATH . '/faq.php')) {
                include (JB_ABSTMPLTPATH . '/faq.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/faq.php');
                }

            break;

        #########################################################################################
        case 'showcat':
            if (file_exists(JB_ABSTMPLTPATH . '/smile.class.php')) {
                include (JB_ABSTMPLTPATH . '/smile.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/smile.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/showcat.php')) {
                include (JB_ABSTMPLTPATH . '/showcat.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/showcat.php');
                }

            break;

        #########################################################################################
        case 'listcat':
            if (file_exists(JB_ABSTMPLTPATH . '/listcat.php')) {
                include (JB_ABSTMPLTPATH . '/listcat.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/listcat.php');
                }

            break;

        #########################################################################################
        case 'review':
            if (file_exists(JB_ABSTMPLTPATH . '/smile.class.php')) {
                include (JB_ABSTMPLTPATH . '/smile.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/smile.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/moderate_messages.php')) {
                include (JB_ABSTMPLTPATH . '/moderate_messages.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/moderate_messages.php');
                }

            break;

        #########################################################################################
        case 'rules':
            include (JB_ABSSOURCESPATH . 'fb_rules.php');

            break;

        #########################################################################################

        // TODO: Will be delete
        case 'userprofile':
            if (file_exists(JB_ABSTMPLTPATH . '/smile.class.php')) {
                include (JB_ABSTMPLTPATH . '/smile.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/smile.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/plugin/myprofile/myprofile.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/myprofile/myprofile.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/myprofile/myprofile.php');
                }

            break;

        #########################################################################################
        case 'myprofile':
            if (file_exists(JB_ABSTMPLTPATH . '/smile.class.php')) {
                include (JB_ABSTMPLTPATH . '/smile.class.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/smile.class.php');
                }

            if (file_exists(JB_ABSTMPLTPATH . '/plugin/myprofile/myprofile.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/myprofile/myprofile.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/myprofile/myprofile.php');
                }

            break;

        #########################################################################################
        case 'report':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/report/report.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/report/report.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/report/report.php');
                }

            break;

        #########################################################################################
        case 'uploadavatar':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/myprofile/myprofile_avatar_upload.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/myprofile/myprofile_avatar_upload.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/myprofile/myprofile_avatar_upload.php');
                }

            break;

        #########################################################################################
        case 'latest':
            if (file_exists(JB_ABSTMPLTPATH . '/latestx.php')) {
                include (JB_ABSTMPLTPATH . '/latestx.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/latestx.php');
                }

            break;

        #########################################################################################
        case 'search':
            require_once (JB_ABSSOURCESPATH . 'fb_search.class.php');

            $searchword = mosGetParam($_REQUEST, 'searchword', '');

            $obj_FB_search = &new jbSearch($database, $searchword, $my->id, $limitstart, $fbConfig['messages_per_page_search']);
            $obj_FB_search->show();
            break;

        //needs work ... still in progress
        case 'advsearch':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/advancedsearch/advsearch.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/advancedsearch/advsearch.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/advancedsearch/advsearch.php');
                }

            break;

        case 'advsearchresult':
            if (file_exists(JB_ABSTMPLTPATH . '/plugin/advancedsearch/advsearchresult.php')) {
                include (JB_ABSTMPLTPATH . '/plugin/advancedsearch/advsearchresult.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/plugin/advancedsearch/advsearchresult.php');
                }

            break;

        #########################################################################################
        case 'markthisread':
            // get all already read topics
            $database->setQuery("SELECT readtopics FROM #__fb_sessions WHERE userid=$my->id");

            $allreadyRead = $database->loadResult();
            /* Mark all these topics read */
            $database->setQuery("SELECT thread FROM #__fb_messages WHERE catid=$catid and thread not in ('$allreadyRead') GROUP BY THREAD");
            $readForum = $database->loadObjectList();
            $readTopics = '--';

            foreach ($readForum as $rf) {
                $readTopics = $readTopics . ',' . $rf->thread;
                }

            $readTopics = str_replace('--,', '', $readTopics);

            if ($allreadyRead != "") {
                $readTopics = $readTopics . ',' . $allreadyRead;
                }

            $database->setQuery("UPDATE #__fb_sessions set readtopics='$readTopics' WHERE userid=$my->id");
            $database->query();
            echo "<script> alert('" . _GEN_FORUM_MARKED . "'); window.history.go(-1); </script>\n";
            break;

        #########################################################################################
        case 'karma':
            include (JB_ABSSOURCESPATH . 'fb_karma.php');

            break;

        #########################################################################################
        case 'bulkactions':
            switch ($do)
            {
                case "bulkDel":
                    FBTools::fbDeletePosts( $is_moderator, $return);

                    break;

                case "bulkMove":
                    FBTools::fbMovePosts($catid, $is_moderator, $return);
                    break;
            }

            break;

        ######################

        /*    template chooser    */
        case "templatechooser":
            $fb_user_template = strval(mosGetParam($_COOKIE, 'fb_user_template', ''));

            $fb_user_img_template = strval(mosGetParam($_REQUEST, 'fb_user_img_template', $fb_user_img_template));
            $fb_change_template = strval(mosGetParam($_REQUEST, 'fb_change_template', $fb_user_template));
            $fb_change_img_template = strval(mosGetParam($_REQUEST, 'fb_change_img_template', $fb_user_img_template));

            if ($fb_change_template)
            {
                // clean template name
                $fb_change_template = preg_replace('#\W#', '', $fb_change_template);

                if (strlen($fb_change_template) >= 40) {
                    $fb_change_template = substr($fb_change_template, 0, 39);
                    }

                // check that template exists in case it was deleted
                if (file_exists($mosConfig_absolute_path . '/components/com_fireboard/template/' . $fb_change_template . '/forum.css'))
                {
                    $lifetime = 60 * 10;
                    $fb_current_template = $fb_change_template;
                    setcookie('fb_user_template', "$fb_change_template", time() + $lifetime);
                }
                else {
                    setcookie('fb_user_template', '', time() - 3600);
                    }
            }

            if ($fb_change_img_template)
            {
                // clean template name
                $fb_change_img_template = preg_replace('#\W#', '', $fb_change_img_template);

                if (strlen($fb_change_img_template) >= 40) {
                    $fb_change_img_template = substr($fb_change_img_template, 0, 39);
                    }

                // check that template exists in case it was deleted
                if (file_exists($mosConfig_absolute_path . '/components/com_fireboard/template/' . $fb_change_img_template . '/forum.css'))
                {
                    $lifetime = 60 * 10;
                    $fb_current_img_template = $fb_change_img_template;
                    setcookie('fb_user_img_template', "$fb_change_img_template", time() + $lifetime);
                }
                else {
                    setcookie('fb_user_img_template', '', time() - 3600);
                    }
            }

            mosRedirect (sefRelToAbs(JB_LIVEURLREL));
            break;

        #########################################################################################
        default:
            if (file_exists(JB_ABSTMPLTPATH . '/listcat.php')) {
                include (JB_ABSTMPLTPATH . '/listcat.php');
                }
            else {
                include (JB_ABSPATH . '/template/default/listcat.php');
                }

            break;
    } //hctiws

    // Bottom Module
    if (mosCountModules('fb_bottom'))
    {
?>

        <div class = "bof-bottom-modul">
            <?php
            mosLoadModules('fb_bottom', -2);
            ?>
        </div>

<?php
    }

    // Credits
    echo '<div class="fb_credits"> ';
    // . _FB_POWEREDBY . ' <a href="http://www.bestofjoomla.com" target="_blank">FireBoard</a>';

    if ($fbConfig['enableRSS']) {
        echo '<a href="' . $mosConfig_live_site . '/index2.php?option=com_fireboard&amp;func=fb_rss&amp;no_html=1" target="_blank" ><img
class="rsslink" src="' . JB_URLEMOTIONSPATH . 'rss.gif" border="0" alt="' . _LISTCAT_RSS . '" title="' . _LISTCAT_RSS . '" /></a>';
        }

    echo '</div>';
    // display footer
    $obj_FB_tmpl->readTemplatesFromFile("footer.html");
    $obj_FB_tmpl->displayParsedTemplate('fb-footer');
} //else

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$tpassed = ($tend - $tstart);
//echo $tpassed;
?>