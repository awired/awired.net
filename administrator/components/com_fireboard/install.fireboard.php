<?php
/**
* @version $Id: install.fireboard.php 63 2007-04-17 21:23:17Z danialt $
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
//
// Dont allow direct linking
defined ('_VALID_MOS') or die('Direct Access to this location is not allowed.');

function com_install() {
    global $database, $mainframe, $mosConfig_absolute_path;
?>

    <style>
        .fbscs
        {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .fbscslist
        {
            list-style: none;
            padding: 5px 10px;
            margin: 3px 0;
            border: 1px solid #66CC66;
            background: #D6FEB8;
            display: block;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .fbscslisterror
        {
            list-style: none;
            padding: 5px 10px;
            margin: 3px 0;
            border: 1px solid #FF9999;
            background: #FFCCCC;
            display: block;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
        }
    </style>

    <div style = "border:1px solid #ccc; background:#FBFBFB; padding:10px; text-align:left;margin:10px 0;">
        <table width = "100%" border = "0" cellpadding = "0" cellspacing = "0">
            <tr>
                <td width = "20%" valign = "top" style = "padding:10px;">
                    <a href = "index2.php?option=com_fireboard"><img src = "components/com_fireboard/images/logo.png" alt = "FireBoard" border = "0"></a>
                </td>

                <td width = "80%" valign = "top" style = "padding:10px;">
                    <div style = "clear:both; text-align:left; padding:0 20px;">
                        <ul class = "fbscs">
                            <?php

                            //change fb menu icon
                            $database->setQuery("SELECT id FROM #__components WHERE admin_menu_link = 'option=com_fireboard'");
                            $id = $database->loadResult();

                            //add new admin menu images
                            $database->setQuery("UPDATE #__components " . "SET admin_menu_img  = '../administrator/components/com_fireboard/images/fbmenu.png'" . ",   admin_menu_link = 'option=com_fireboard' " . "WHERE id='$id'");
                            $database->query();

                            //backward compatibility . all the cats are by default moderated
                            $database->setQuery("UPDATE `#__fb_categories` SET `moderated` = '1';");
                            $database->query();

                            // now lets do some checks and upgrades to 1.0.2 version of attachment table
                            $database->setQuery("select from #__fb_attachments where filelocation like '%" . $mainframe->getCfg("absolute_path") . "%'");

                            //if >0 then it means we are on fb version below 1.0.2
                            $is_101_version = $database->loadResult();

                            if ($is_101_version) {
                                // now do the upgrade
                                $database->setQuery("update #__fb_attachments set filelocation = replace(filelocation,'" . $mainframe->getCfg("absolute_path") . "/components/com_fireboard/uploaded','/images/fbfiles');");

                                if ($database->query()) {
                                    print '<li class="fbscslist">Attachment table successfully upgraded to 1.0.12+ version schema!</li>';
                                    }
                                else {
                                    print '<li class="fbscslisterror">Attachment table was not successfully upgraded to 1.0.12+ version schema!</li>';
                                    }

                                $database->setQuery("update #__fb_messages_text set message = replace(message,'/components/com_fireboard/uploaded','/images/fbfiles');");

                                if ($database->query()) {
                                    print '<li class="fbscslist">Attachments in messages table successfully upgraded to 1.0.12+ version schema!</li>';
                                    }
                                else {
                                    print '<li class="fbscslist">Attachments in messages table were not successfully upgraded to 1.0.12+ version schema!</li>';
                                    }
                                }
                                if (is_writable($mainframe->getCfg("absolute_path") )) {

                            //ok now it is installed, just copy the fbfiles directory, and apply 0777
                            dircopy($mainframe->getCfg("absolute_path") . "/components/com_fireboard/_fbfiles_dist", $mainframe->getCfg("absolute_path") . "/images/fbfiles", true);
                                }
                                else {

                            ?>

                                <li class = "fbscslisterror"><div style = "border:1px solid  #FF6666; background: #FFCC99; padding:10px; text-align:left; margin:10px 0;">
                                    <img src = 'images/publish_x.png' align = 'absmiddle'> Creation/permission setting of the following directories failed:

                                    <br>
                                    <pre> <?php echo $mainframe->getCfg("absolute_path"); ?>/images/fbfiles/
            <?php echo $mainframe->getCfg("absolute_path");?>/images/fbfiles/avatars
            <?php echo $mainframe->getCfg("absolute_path");?>/images/fbfiles/avatars/gallery (you have to put avatars inside if you want to use it)
            <?php echo $mainframe->getCfg("absolute_path");?>/images/fbfiles/category_images
            <?php echo $mainframe->getCfg("absolute_path");?>/images/fbfiles/files
            <?php echo $mainframe->getCfg("absolute_path");?>/images/fbfiles/images
</pre>
    a) You can copy the contents of __fbfiles_dist under components/com_fireboard to your Joomla root, under images/ folder, rename it to "fbfiles" and then chmod it to 777 (making it writable)

    <br/> b) If you already have the contents there, but Fireboard installation was not able to make them writable, then please do it manually.
                                </div>

                                </li>

                            <?php
                                }
                            ?>
                        </ul>
                    </div>

                    <div style = "border:1px solid #FFCC99; background:#FFFFCC; padding:20px; margin:20px; clear:both;">
                        <strong>I N S T A L L : <font color = "red">Successful</font> </strong>
                    </div>

                    <div style = "border:1px solid  #99CCFF; background:  #D9D9FF; padding:20px; margin:20px; clear:both;">
                        <strong>Thank you for using Fireboard!</strong>

                        <br/>

                        Fireboard Forum Component <em>for Joomla! CMS</em> &copy; by <a href = "http://www.bestofjoomla.com" target = "_blank">Best Of Joomla</a>. All rights reserved.
                    </div>
                </td>
            </tr>
        </table>
    </div>

<?php
    }

function dircopy($srcdir, $dstdir, $verbose = true) {
    $num = 0;

    if (!is_dir($dstdir)) {
        mkdir ($dstdir);
        chmod ($dstdir, 0777);
        }

    if ($curdir = opendir($srcdir)) {
        while ($file = readdir($curdir)) {
            if ($file != '.' && $file != '..') {
                $srcfile = $srcdir . '/' . $file;
                $dstfile = $dstdir . '/' . $file;

                if (is_file($srcfile)) {
                    if (is_file($dstfile)) {
                        $ow = filemtime($srcfile) - filemtime($dstfile);
                        }
                    else {
                        $ow = 1;
                        }

                    if ($ow > 0) {
                        if ($verbose) {
                            echo "<li class=\"fbscslist\"> Copying '$srcfile' to '$dstfile'...";
                            }

                        if (copy($srcfile, $dstfile)) {
                            touch($dstfile, filemtime($srcfile));
                            $num++;

                            if ($verbose) {
                                echo " [OK]</li>";
                                }
                            }
                        else {
                            echo "<li class=\"fbscslisterror\"> Error: File '$srcfile' could not be copied!</li>";
                            }
                        }
                    }
                else if (is_dir($srcfile)) {
                    $num += dircopy($srcfile, $dstfile, $verbose);
                    }
                }
            }

        closedir ($curdir);
        }

    return $num;
    }
?>