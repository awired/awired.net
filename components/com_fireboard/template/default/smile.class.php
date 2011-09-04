<?php
/**
* @version $Id: smile.class.php 63 2007-04-17 21:23:17Z danialt $
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
// ################################################################
// MOS Intruder Alerts
defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');

// ################################################################
// get fireboards configuration params in
//include_once (JB_ABSADMPATH . '/fireboard_config.php');

class smile
{

    function smileReplace($fb_message, $history, $emoticons, $iconList = null)
    {
        // where $history can be 1 or 0. If 1 then we need to load the grey
        // emoticons for the Topic History. If 0 we need the normal ones

        $type = ($history == 1) ? "-grey" : "";
        $message_emoticons = array();
        $message_emoticons = $iconList? $iconList : smile::getEmoticons($history);

        $fb_message_txt = $fb_message;

        // First: remove existing HTML tags from older posts
        // If there isn't a "<" and a ">" in the message, don't bother.
        if (strpos($fb_message_txt, "<") || strpos($fb_message_txt, ">")) {
            $fb_message_txt = smile::fbStripHtmlTags($fb_message_txt);
        }

        //$fb_message_txt = htmlspecialchars($fb_message_txt);
        //html_entities_decode= PHP >4.3.0; the two lines after it are a replacement/workaround
        //$fb_message_txt = html_entity_decode($fb_message_txt);
        $table = array_flip(get_html_translation_table(HTML_ENTITIES));
        $fb_message_txt = strtr($fb_message_txt, $table);
        $fb_message_txt = smile::fbHtmlSafe($fb_message_txt);
        $fb_message_txt = stripslashes($fb_message_txt);
        
        //replace them all with a dummy variable, and later replace them in CODE
        $fb_message_txt = FBTools::fbRemoveXSS($fb_message_txt);

        //Quote tags
        if ($history == 0)
        {
            $fb_message_txt = str_replace("[quote]", "<span class=\"fb_quote\">", $fb_message_txt);
            $fb_message_txt = str_replace("[QUOTE]", "<span class=\"fb_quote\">", $fb_message_txt);
        }
        else
        {
            $fb_message_txt = str_replace("[quote]", "<span class=\"fb_review_quote\">", $fb_message_txt);
            $fb_message_txt = str_replace("[QUOTE]", "<span class=\"fb_review_quote\">", $fb_message_txt);
        }

        $fb_message_txt = str_replace("[/quote]", "</span>", $fb_message_txt);
        $fb_message_txt = str_replace("[/QUOTE]", "</span>", $fb_message_txt);
        // urls
        //make regular HTML URL links targets _blank
        //the next link is for backwards compatability left in; should be removed in time
        //$fb_message_txt = preg_replace("/<A (.*)>(.*)<\/A>/i", "<A \\1 target=\"_blank\">\\2</A>", $fb_message_txt);
        //bbCode URL translation
        $fb_message_txt = preg_replace('/\[url\](.*?)javascript(.*?)\[\/url\]/si', _LINK_JS_REMOVED, $fb_message_txt);
        $fb_message_txt = preg_replace('/\[url=(.*?)javascript(.*?)\](.*?)\[\/url\]/si', _LINK_JS_REMOVED, $fb_message_txt);
        $fb_message_txt = preg_replace("/\[url\](.*?)\[\/url\]/si", "<a href=\\1 target=\"_blank\">\\1</a>", $fb_message_txt);
        $fb_message_txt = preg_replace("/\[url=(.*?)\](.*?)\[\/url\]/si", "<a href=\"\\1\" target=\"_blank\">\\2</a>", $fb_message_txt);		
		// Begin: hide
		global $my;
		if ($my->id == 0) {
			$hidetext = '<div class="fbhide">'._FB_HIDETEXT.'</div>';
    	    $fb_message_txt = preg_replace("/\[hide\](.*?)\[\/hide\]/si", "$hidetext", $fb_message_txt);
		} else {
    	    $fb_message_txt = preg_replace("/\[hide\]/si", "", $fb_message_txt);
			$fb_message_txt = preg_replace("/\[\/hide\]/si", "", $fb_message_txt);
		}
        // Finish: hide
        // img
        $fb_message_txt = preg_replace("/\[img size=([0-9][0-9][0-9])\](.*?)\[\/img\]/si", "<img src=\"$2\" border=\"0\" width=\"$1\" />", $fb_message_txt);
        $fb_message_txt = preg_replace("/\[img size=([0-9][0-9])\](.*?)\[\/img\]/si", "<img src=\"$2\" border=\"0\" width=\"$1\" />", $fb_message_txt);
        $fb_message_txt = preg_replace("/\[img\](.*?)\[\/img\]/si", "<img src=\"$1\" border=\"0\" />", $fb_message_txt);
        $fb_message_txt = preg_replace("/<img(.*?)javascript(.*?)>/si", _LINK_JS_REMOVED, $fb_message_txt);
        // bold
        $fb_message_txt = preg_replace("/(\[b\])(.*?)(\[\/b\])/si", "<strong>\\2</strong>", $fb_message_txt);
        // underline
        $fb_message_txt = preg_replace("/(\[u\])(.*?)(\[\/u\])/si", "<u>\\2</u>", $fb_message_txt);

        // strike
        $fb_message_txt = preg_replace("/(\[s\])(.*?)(\[\/s\])/si", "<s>\\2</s>", $fb_message_txt);
        // italic
        $fb_message_txt = preg_replace("/(\[i\])(.*?)(\[\/i\])/si", "<em>\\2</em>", $fb_message_txt);
        // lists
        $fb_message_txt = preg_replace("/(\[ul\])(.*?)(\[\/ul\])/si", "<ul>\\2</ul>", $fb_message_txt);
        $fb_message_txt = preg_replace("/(\[ol\])(.*?)(\[\/ol\])/si", "<ol type=1>\\2</ol>", $fb_message_txt);
        $fb_message_txt = preg_replace("/(\[li\])(.*?)(\[\/li\])/si", "<li>\\2</li>", $fb_message_txt);
        //size Max size is 7
        $fb_message_txt = preg_replace("/\[size=([1-7])\](.+?)\[\/size\]/si", "<font size=\"\\1\">\\2</font>", $fb_message_txt);
        //color
        $fb_message_txt = preg_replace("%\[color=(.*?)\](.*?)\[/color\]%si", "<span style=\"color: \\1\">\\2</span>", $fb_message_txt);
               //file attachments
        $fb_message_txt
            = preg_replace(
                  "/\[file name=(.*?) size=(.*?)\](.*?)\[\/file\]/si", "<div class=\"fb_file_attachment\"><span class=\"contentheading\">"._FB_FILEATTACH."</span><br>"._FB_FILENAME."<a href=\"\\3\">\\1</a><br>"._FB_FILESIZE."\\2 </div>", $fb_message_txt);

        //emoticons

        if ($emoticons != 1)
        {
            reset($message_emoticons);

            while (list($emo_txt, $emo_src) = each($message_emoticons)) {
                $fb_message_txt = str_replace($emo_txt, '<img src="' . $emo_src . '" alt="" style="vertical-align: middle;border:0px;" />', $fb_message_txt);
            }
        }

        //code tag
        $fb_message_txt = smile::bbencode_second_pass($fb_message_txt);

        //auto parse links:
        $fb_message_txt = smile::urlMaker($fb_message_txt);
        return $fb_message_txt;
    }
    /**
    * function to retrieve the emoticons out of the database
    *
    * @author Niels Vandekeybus <progster@wina.be>
    * @version 1.0
    * @since 2005-04-19
    * @param boolean $grayscale
    *            determines wether to return the grayscale or the ordinary emoticon
    * @param boolean  $emoticonbar
    *            only list emoticons to be displayed in the emoticonbar (currently unused)
    * @return array
    *             array consisting of emoticon codes and their respective location (NOT the entire img tag)
    */
    function getEmoticons($grayscale, $emoticonbar = 0)
    {
        global $database;
        $grayscale == 1 ? $column = "greylocation" : $column = "location";
        $sql = "SELECT `code` , `$column` FROM `#__fb_smileys`";

        if ($emoticonbar == 1)
            $sql .= " where `emoticonbar` = 1";

        $sql .= ";";
        $database->setQuery($sql);
        $smilies = $database->loadObjectList();

        $smileyArray = array();
        foreach ($smilies as $smiley) {                                                    // We load all smileys in array, so we can sort them
            $smileyArray[$smiley->code] = '' . JB_URLEMOTIONSPATH . '' . $smiley->$column; // This makes sure that for example :pinch: gets translated before :p
        }

        if ($emoticonbar == 0)
        { // don't sort when it's only for use in the emoticonbar
            array_multisort(array_keys($smileyArray), SORT_DESC, $smileyArray);
            reset($smileyArray);
        }

        return $smileyArray;
    }

    function topicToolbar($selected, $tawidth)
    {
        //TO USE
        // $topicToolbar = smile:topicToolbar();
        // echo $topicToolbar;
        //$selected var is used to check the right selected icon
        //important for the edit function
        $selected = (int)$selected;
?>

        <table border = "0" cellspacing = "0" cellpadding = "0" class = "fb_flat">
            <tr>
                <td>
                    <input type = "radio" name = "topic_emoticon" value = "0"<?php echo $selected==0?" checked=\"checked\" ":"";?>/><?php echo _NO_SMILIE; ?>

            <input type = "radio" name = "topic_emoticon" value = "1"<?php echo $selected==1?" checked=\"checked\" ":"";?>/>

            <img src = "<?php echo JB_URLEMOTIONSPATH ;?>exclam.gif" alt = "" border = "0"/>

            <input type = "radio" name = "topic_emoticon" value = "2"<?php echo $selected==2?" checked=\"checked\" ":"";?>/>

            <img src = "<?php echo JB_URLEMOTIONSPATH ;?>question.gif" alt = "" border = "0"/>

            <input type = "radio" name = "topic_emoticon" value = "3"<?php echo $selected==3?" checked=\"checked\" ":"";?>/>

            <img src = "<?php echo JB_URLEMOTIONSPATH ;?>arrow.gif" alt = "" border = "0"/>

            <?php
            if ($tawidth <= 320) {
                echo '</tr><tr>';
            }
            ?>

                <input type = "radio" name = "topic_emoticon" value = "4"<?php echo $selected==4?" checked=\"checked\" ":"";?>/>

                <img src = "<?php echo JB_URLEMOTIONSPATH ;?>love.gif" alt = "" border = "0"/>

                <input type = "radio" name = "topic_emoticon" value = "5"<?php echo $selected==5?" checked=\"checked\" ":"";?>/>

                <img src = "<?php echo JB_URLEMOTIONSPATH ;?>grin.gif" alt = "" border = "0"/>

                <input type = "radio" name = "topic_emoticon" value = "6"<?php echo $selected==6?" checked=\"checked\" ":"";?>/>

                <img src = "<?php echo JB_URLEMOTIONSPATH ;?>shock.gif" alt = "" border = "0"/>

                <input type = "radio" name = "topic_emoticon" value = "7"<?php echo $selected==7?" checked=\"checked\" ":"";?>/>

                <img src = "<?php echo JB_URLEMOTIONSPATH ;?>smile.gif" alt = "" border = "0"/>
                </td>
            </tr>
        </table>

        <?php
    }

    function bbencode_first_pass($text)
    {
        // pad it with a space so we can distinguish between FALSE and matching the 1st char (index 0).
        // This is important; bbencode_quote(), bbencode_list(), and bbencode_code() all depend on it.
        $text = " " . $text;

        //check for unclosed [CODE] tags
        //first rewrite [CODE] and [/CODE] to all lowercase
        $text = preg_replace("/\[code\]/si", "[code]", $text);
        $text = preg_replace("/\[\/code\]/si", "[/code]", $text);
        $text = preg_replace("/\[code:1\]/si", "[code:1]", $text);
        $text = preg_replace("/\[\/code:1\]/si", "[/code:1]", $text);

        while (substr_count($text, "[code]") > substr_count($text, "[/code]")) {
            $text = $text . " [/code]";
        }

        // [CODE] and [/CODE] for posting code (HTML, PHP, C etc etc) in your posts.
        $text = smile::bbencode_first_pass_pda($text, '[code]', '[/code]', '', true, '');
        // Remove our padding from the string..
        return substr($text, 1);
        ;
    } // bbencode_first_pass()
    /**
     * $text - The text to operate on.
     * $open_tag - The opening tag to match. Can be an array of opening tags.
     * $close_tag - The closing tag to match.
     * $close_tag_new - The closing tag to replace with.
     * $mark_lowest_level - boolean - should we specially mark the tags that occur
     *                at the lowest level of nesting? (useful for [code], because
     *                we need to match these tags first and transform HTML tags
     *                in their contents..
     * $func - This variable should contain a string that is the name of a function.
     *          That function will be called when a match is found, and passed 2
     *          parameters: ($text, $uid). The function should return a string.
     *          This is used when some transformation needs to be applied to the
     *          text INSIDE a pair of matching tags. If this variable is FALSE or the
     *          empty string, it will not be executed.
     * If open_tag is an array, then the pda will try to match pairs consisting of
     * any element of open_tag followed by close_tag. This allows us to match things
     * like [list=A]...[/list] and [list=1]...[/list] in one pass of the PDA.
     *
     * NOTES:   - this function assumes the first character of $text is a space.
     *          - every opening tag and closing tag must be of the [...] format.
     */
    function bbencode_first_pass_pda($text, $open_tag, $close_tag, $close_tag_new, $mark_lowest_level, $func, $open_regexp_replace = false)
    {
        $open_tag_count = 0;

        if (!$close_tag_new || ($close_tag_new == '')) {
            $close_tag_new = $close_tag;
        }

        $close_tag_length = strlen($close_tag);
        $close_tag_new_length = strlen($close_tag_new);
        $use_function_pointer = ($func && ($func != ''));
        $stack = array ();

        if (is_array($open_tag))
        {
            if (0 == count($open_tag)) {
                // No opening tags to match, so return.
                return $text;
            }

            $open_tag_count = count($open_tag);
        }
        else
        {
            // only one opening tag. make it into a 1-element array.
            $open_tag_temp = $open_tag;
            $open_tag = array ();
            $open_tag[0] = $open_tag_temp;
            $open_tag_count = 1;
        }

        $open_is_regexp = false;

        if ($open_regexp_replace)
        {
            $open_is_regexp = true;

            if (!is_array($open_regexp_replace))
            {
                $open_regexp_temp = $open_regexp_replace;
                $open_regexp_replace = array ();
                $open_regexp_replace[0] = $open_regexp_temp;
            }
        }

        if ($mark_lowest_level && $open_is_regexp) {
            die("Unsupported operation for bbcode_first_pass_pda().");
        }

        // Start at the 2nd char of the string, looking for opening tags.
        $curr_pos = 1;

        while ($curr_pos && ($curr_pos < strlen($text)))
        {
            $curr_pos = strpos($text, "[", $curr_pos);

            // If not found, $curr_pos will be 0, and the loop will end.
            if ($curr_pos)
            {
                // We found a [. It starts at $curr_pos.
                // check if it is a starting or ending tag.
                $found_start = false;
                $which_start_tag = "";
                $start_tag_index = -1;

                for ($i = 0; $i < $open_tag_count; $i++)
                {
                    // Grab everything until the first "]"...
                    $possible_start = substr($text, $curr_pos, strpos($text, ']', $curr_pos + 1) - $curr_pos + 1);

                    //
                    // We're going to try and catch usernames with "[' characters.
                    //
                    if (preg_match('#\[quote=\\\"#si', $possible_start, $match) && !preg_match('#\[quote=\\\"(.*?)\\\"\]#si', $possible_start))
                    {
                        // OK we are in a quote tag that probably contains a ] bracket.
                        // Grab a bit more of the string to hopefully get all of it..
                        if ($close_pos = strpos($text, '"]', $curr_pos + 9))
                        {
                            if (strpos(substr($text, $curr_pos + 9, $close_pos - ($curr_pos + 9)), '[quote') === false) {
                                $possible_start = substr($text, $curr_pos, $close_pos - $curr_pos + 2);
                            }
                        }
                    }

                    // Now compare, either using regexp or not.
                    if ($open_is_regexp)
                    {
                        $match_result = array ();

                        if (preg_match($open_tag[$i], $possible_start, $match_result))
                        {
                            $found_start = true;
                            $which_start_tag = $match_result[0];
                            $start_tag_index = $i;
                            break;
                        }
                    }
                    else
                    {
                        // straightforward string comparison.
                        if (0 == strcasecmp($open_tag[$i], $possible_start))
                        {
                            $found_start = true;
                            $which_start_tag = $open_tag[$i];
                            $start_tag_index = $i;
                            break;
                        }
                    }
                }

                if ($found_start)
                {
                    // We have an opening tag.
                    // Push its position, the text we matched, and its index in the open_tag array on to the stack, and then keep going to the right.
                    $match = array
                    (
                        "pos" => $curr_pos,
                        "tag" => $which_start_tag,
                        "index" => $start_tag_index
                    );

                    array_push($stack, $match);
                    //
                    // Rather than just increment $curr_pos
                    // Set it to the ending of the tag we just found
                    // Keeps error in nested tag from breaking out
                    // of table structure..
                    //
                    $curr_pos += strlen($possible_start);
                }
                else
                {
                    // check for a closing tag..
                    $possible_end = substr($text, $curr_pos, $close_tag_length);

                    if (0 == strcasecmp($close_tag, $possible_end))
                    {
                        // We have an ending tag.
                        // Check if we've already found a matching starting tag.
                        if (sizeof($stack) > 0)
                        {
                            // There exists a starting tag.
                            $curr_nesting_depth = sizeof($stack);
                            // We need to do 2 replacements now.
                            $match = array_pop($stack);
                            $start_index = $match['pos'];
                            $start_tag = $match['tag'];
                            $start_length = strlen($start_tag);
                            $start_tag_index = $match['index'];

                            if ($open_is_regexp) {
                                $start_tag = preg_replace($open_tag[$start_tag_index], $open_regexp_replace[$start_tag_index], $start_tag);
                            }

                            // everything before the opening tag.
                            $before_start_tag = substr($text, 0, $start_index);
                            // everything after the opening tag, but before the closing tag.
                            $between_tags = substr($text, $start_index + $start_length, $curr_pos - $start_index - $start_length);

                            // Run the given function on the text between the tags..
                            if ($use_function_pointer) {
                                $between_tags = $func($between_tags, $uid);
                            }

                            // everything after the closing tag.
                            $after_end_tag = substr($text, $curr_pos + $close_tag_length);

                            // Mark the lowest nesting level if needed.
                            if ($mark_lowest_level && ($curr_nesting_depth == 1))
                            {
                                if ($open_tag[0] == '[code]')
                                {
                                    //Safeguard against smiley replacement
                                    //$code_entities_match = array('#<#', '#>#', '#"#', '#:#', '#\[#', '#\]#', '#\(#', '#\)#', '#\{#', '#\}#');
                                    //$code_entities_replace = array('&lt;', '&gt;', '&quot;', '&#58;', '&#91;', '&#93;', '&#40;', '&#41;', '&#123;', '&#125;');
                                    //$code_entities_replace = array( ':(', ':)');
                                    //$code_entities_match = array( '/«:(»/', '/«:)»/');
                                    $message_emoticons = smile::getEmoticons(0);

                                    foreach ($message_emoticons as $smiley => $value)
                                    {
                                        $newsmiley = substr($smiley, 0, 1) . '«»' . substr($smiley, 1);
                                        $between_tags = str_replace($smiley, $newsmiley, $between_tags);
                                    }
                                }

                                $text = $before_start_tag . substr($start_tag, 0, $start_length - 1) . ":$curr_nesting_depth]";
                                $text .= $between_tags . substr($close_tag_new, 0, $close_tag_new_length - 1) . ":$curr_nesting_depth]";
                            }
                            else
                            {
                                if ($open_tag[0] == '[code]')
                                {
                                    $text = $before_start_tag . '&#91;code&#93;';
                                    $text .= $between_tags . '&#91;/code&#93;';
                                }
                                else
                                {
                                    if ($open_is_regexp) {
                                        $text = $before_start_tag . $start_tag;
                                    }
                                    else {
                                        $text = $before_start_tag . substr($start_tag, 0, $start_length - 1) . "]";
                                    }

                                    $text .= $between_tags . substr($close_tag_new, 0, $close_tag_new_length - 1) . "]";
                                }
                            }

                            $text .= $after_end_tag;

                            // Now.. we've screwed up the indices by changing the length of the string.
                            // So, if there's anything in the stack, we want to resume searching just after it.
                            // otherwise, we go back to the start.
                            if (sizeof($stack) > 0)
                            {
                                $match = array_pop($stack);
                                $curr_pos = $match['pos'];
                            //                   bbcode_array_push($stack, $match);
                            //                   ++$curr_pos;
                            }
                            else {
                                $curr_pos = 1;
                            }
                        }
                        else {
                            // No matching start tag found. Increment pos, keep going.
                            ++$curr_pos;
                        }
                    }
                    else {
                        // No starting tag or ending tag.. Increment pos, keep looping.,
                        ++$curr_pos;
                    }
                }
            }
        } // while

        return $text;
    }     // bbencode_first_pass_pda()
    /**
     * Does second-pass bbencoding. This should be used before displaying the message in
     * a thread. Assumes the message is already first-pass encoded, and we are given the
     * correct UID as used in first-pass encoding.
     */
    function bbencode_second_pass($text)
    {
        // pad it with a space so we can distinguish between FALSE and matching the 1st char (index 0).
        // This is important; bbencode_quote(), bbencode_list(), and bbencode_code() all depend on it.
        $text = " " . $text;

        // First: If there isn't a "[" and a "]" in the message, don't bother.
        if (!(strpos($text, "[") && strpos($text, "]")))
        {
            // Remove padding, return.
            $text = substr($text, 1);
            return $text;
        }

        // [CODE] and [/CODE] for posting code (HTML, PHP, C etc etc) in your posts.
        $text = smile::bbencode_second_pass_code($text);
        // Remove our padding from the string..
        $text = substr($text, 1);
        return $text;
    } // bbencode_second_pass()
    /**
     * Does second-pass bbencoding of the [code] tags. This includes
     * running htmlspecialchars() over the text contained between
     * any pair of [code] tags that are at the first level of
     * nesting. Tags at the first level of nesting are indicated
     * by this format: [code:1] ... [/code:1]
     * Other tags are in this format: [code] ... [/code]
     */
    function bbencode_second_pass_code($text)
    {
        $code_start_html = '<table width="90%" cellspacing="1" cellpadding="3" border="0" align="center"><tr><td><b>'._FB_MSG_CODE.':</b></td></tr><tr><td><pre>';
        $code_end_html = '</pre></td></tr></table>';
        // First, do all the 1st-level matches. These need an htmlspecialchars() run,
        // so they have to be handled differently.
        $match_count = preg_match_all("#\[code:1\](.*?)\[/code:1\]#si", $text, $matches);

        for ($i = 0; $i < $match_count; $i++)
        {
            $before_replace = $matches[1][$i];
            $after_replace = $matches[1][$i];
            //we have to pad the code string with <?php to make syntax highlighting possible
            // so we must make sure that any existing <?php in the code is not affected when we remove the padded <?php
            $after_replace = str_replace('<?php', 'okphp', $after_replace);
            $after_replace = str_replace('&lt;?php', 'okphp', $after_replace);
            $after_replace = "<?php " . $after_replace;
            //some necessary replacements:
            $after_replace = str_replace('&lt;', '<', $after_replace);
            $after_replace = str_replace('&gt;', '>', $after_replace);
            $after_replace = str_replace('«»', '', $after_replace);
            //we must make sure that any \n in the code is preserved:
            $after_replace = str_replace('\n', '_CRLF_', $after_replace);
            //and get the backslashes out before doing highlighting
            $after_replace = str_replace('\\', '_BKSLSH_', $after_replace);
            //Highlight the syntax
            $after_replace = highlight_string($after_replace, true);
            //and get the backslashes back in after doing highlighting
            $after_replace = str_replace('_BKSLSH_', '&#92;', $after_replace);

            //remove padding and set the already existing <?php occurences back
            $after_replace = str_replace('&lt;?php', '', $after_replace);
            $after_replace = str_replace('okphp', '&lt;?php', $after_replace);
            //remove some superfluous breaks:
            $after_replace = str_replace('<br />', '', $after_replace);
            // you would expect this here: $after_replace= str_replace('_CRLF_','\n',$after_replace);
            // but we'll do that as last step before we're going to render the post in view.php
            $after_replace = str_replace('\r', '', $after_replace);
            /* Next block obsolete since the highlight_string function entered; dont delete just yet
                  // Replace 2 spaces with "&nbsp; " so non-tabbed code indents without making huge long lines.
                  $after_replace = str_replace("  ", "&nbsp; ", $after_replace);
                  // now Replace 2 spaces with " &nbsp;" to catch odd #s of spaces.
                  $after_replace = str_replace("  ", " &nbsp;", $after_replace);
                  // Replace tabs with "&nbsp; &nbsp;" so tabbed code indents sorta right without making huge long lines.
                  $after_replace = str_replace("\t", "&nbsp; &nbsp;", $after_replace);
                  // now Replace space occurring at the beginning of a line
                  $after_replace = preg_replace("/^ {1}/m", '&nbsp;', $after_replace);
            */
            //Now restore character combinations that have been used to safeguard against smiley replacement
            $message_emoticons = smile::getEmoticons(0);

            //replace them all with threir corresponding variable, and later replace them in CODE
            $after_replace = FBTools::fbRemoveXSS($after_replace, 1);


            foreach ($message_emoticons as $smiley => $value)
            {
                $newsmiley = substr($smiley, 0, 1) . '«»' . substr($smiley, 1);
                $after_replace = str_replace($newsmiley, $smiley, $after_replace);
            }

            $str_to_match = "[code:1]" . $before_replace . "[/code:1]";
            $replacement = $code_start_html;
            $replacement .= $after_replace;
            $replacement .= $code_end_html;
            $text = str_replace($str_to_match, $replacement, $text);
        }

        // Now, do all the non-first-level matches. These are simple.
        $text = str_replace("[code]", $code_start_html, $text);
        $text = str_replace("[/code]", $code_end_html, $text);
        return $text;
    } // bbencode_second_pass_code()
    /**
     * Strips all known HTML tags and replaces them with bbcode
     * Removes all unknown tags
     */
    function fbStripHtmlTags($text)
    {
        $fb_message_txt = $text;
        $fb_message_txt = preg_replace("/<p>/si", "", $fb_message_txt);
        $fb_message_txt = preg_replace("%</p>%si", "\n", $fb_message_txt);
        $fb_message_txt = preg_replace("/<br>/si", "\n", $fb_message_txt);
        $fb_message_txt = preg_replace("%<br />%si", "\n", $fb_message_txt);
        $fb_message_txt = preg_replace("%<br />%si", "\n", $fb_message_txt);
        $fb_message_txt = preg_replace("/&nbsp;/si", " ", $fb_message_txt);
        $fb_message_txt = preg_replace("/<OL>/si", "[ol]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</OL>%si", "[/ol]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<ul>/si", "[ul]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</ul>%si", "[/ul]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<LI>/si", "[li]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</LI>%si", "[/li]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<div class=\\\"fb_quote\\\">/si", "[quote]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</div>%si", "[/quote]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<b>/si", "[b]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</b>%si", "[/b]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<i>/si", "[i]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</i>%si", "[/i]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<u>/si", "[u]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</u>%si", "[/u]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<s>/si", "[s]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</s>%si", "[/s]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<strong>/si", "[b]", $fb_message_txt);
        $fb_message_txt = preg_replace("%</strong>%si", "[/b]", $fb_message_txt);
        $fb_message_txt = preg_replace("/<em>/si", "[i]", $fb_message_txt);
        $fb_message_txt = preg_replace("%<em>%si", "[/i]", $fb_message_txt);

        //okay, now we've converted all HTML to known boardcode, nuke everything remaining itteratively:
        while ($fb_message_txt != strip_tags($fb_message_txt)) {
            $fb_message_txt = strip_tags($fb_message_txt);
        }

        return $fb_message_txt;
    } // fbStripHtmlTags()
    /**
     * This will convert all remaining HTML tags to innocent tags able to be displayed in full
     */
    function fbHtmlSafe($text)
    {
        $fb_message_txt = $text;
        $fb_message_txt = str_replace("<", "&lt;", $fb_message_txt);
        $fb_message_txt = str_replace(">", "&gt;", $fb_message_txt);
        return $fb_message_txt;
    } // fbHtmlSafe()
    /**
     * This function will write the TextArea
     */
    function fbWriteTextarea($areaname, $html, $width, $height, $useRte, $emoticons)
    {
        global $editmode;
        // (JJ) JOOMLA STYLE CHECK
        if ($fbConfig['joomlaStyle'] < 1) {
            $boardclass = "fb_";
        }
        ?>

        <tr class = "<?php echo $boardclass; ?>sectiontableentry1">
            <td class = "fb_leftcolumn" valign = "top">
                <strong><a href = "<?php echo sefRelToAbs(JB_LIVEURLREL.'&amp;func=faq').'#boardcode';?>"><?php echo _COM_BOARDCODE; ?></a></strong>:
            </td>

            <td>
                <table border = "0" cellspacing = "0" cellpadding = "0" class = "fb-postbuttonset">
                    <tr>
                        <td class = "fb-postbuttons">
                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "b" name = "addbbcode0" value = " B " style = "font-weight:bold; " onclick = "bbstyle(0)" onmouseover = "helpline('b')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "i" name = "addbbcode2" value = " i " style = "font-style:italic; " onclick = "bbstyle(2)" onmouseover = "helpline('i')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "u" name = "addbbcode4" value = " u " style = "text-decoration: underline;" onclick = "bbstyle(4)" onmouseover = "helpline('u')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "q" name = "addbbcode6" value = "Quote" onclick = "bbstyle(6)" onmouseover = "helpline('q')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "c" name = "addbbcode8" value = "Code" onclick = "bbstyle(8)" onmouseover = "helpline('c')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "k" name = "addbbcode10" value = "ul" onclick = "bbstyle(10)" onmouseover = "helpline('k')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "o" name = "addbbcode12" value = "ol" onclick = "bbstyle(12)" onmouseover = "helpline('o')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "l" name = "addbbcode18" value = "li" onclick = "bbstyle(18)" onmouseover = "helpline('l')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "p" name = "addbbcode14" value = "Img" onclick = "bbstyle(14)" onmouseover = "helpline('p')"/>

                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "w" name = "addbbcode16" value = "URL" style = "text-decoration: underline; " onclick = "bbstyle(16)" onmouseover = "helpline('w')"/>
                            	
                            <input type = "button" class = "<?php echo $boardclass;?>button" accesskey = "h" name = "addbbcode24" value = "Hide" style = "text-decoration: underline; " onclick = "bbstyle(20)" onmouseover = "helpline('h')"/>
							


                            &nbsp;<?php echo _SMILE_COLOUR; ?>:

                    <select name = "addbbcode20"
                        onchange = "bbfontstyle('[color=' + this.form.addbbcode20.options[this.form.addbbcode20.selectedIndex].value + ']', '[/color]');this.selectedIndex=0;" onmouseover = "helpline('s')" class = "<?php echo $boardclass;?>slcbox">
                        <option style = "color:black;   background-color: #FAFAFA" value = ""><?php echo _COLOUR_DEFAULT; ?></option>

                        <option style = "color:#FF0000; background-color: #FAFAFA" value = "#FF0000"><?php echo _COLOUR_RED; ?></option>

                        <option style = "color:#800080; background-color: #FAFAFA" value = "#800080"><?php echo _COLOUR_PURPLE; ?></option>

                        <option style = "color:#0000FF; background-color: #FAFAFA" value = "#0000FF"><?php echo _COLOUR_BLUE; ?></option>

                        <option style = "color:#008000; background-color: #FAFAFA" value = "#008000"><?php echo _COLOUR_GREEN; ?></option>

                        <option style = "color:#FFFF00; background-color: #FAFAFA" value = "#FFFF00"><?php echo _COLOUR_YELLOW; ?></option>

                        <option style = "color:#FF6600; background-color: #FAFAFA" value = "#FF6600"><?php echo _COLOUR_ORANGE; ?></option>

                        <option style = "color:#000080; background-color: #FAFAFA" value = "#000080"><?php echo _COLOUR_DARKBLUE; ?></option>

                        <option style = "color:#825900; background-color: #FAFAFA" value = "#825900"><?php echo _COLOUR_BROWN; ?></option>

                        <option style = "color:#9A9C02; background-color: #FAFAFA" value = "#9A9C02"><?php echo _COLOUR_GOLD; ?></option>

                        <option style = "color:#A7A7A7; background-color: #FAFAFA" value = "#A7A7A7"><?php echo _COLOUR_SILVER; ?></option>
                    </select>

                    &nbsp;<?php echo _SMILE_SIZE; ?>:

                    <select name = "addbbcode22" onchange = "bbfontstyle('[size=' + this.form.addbbcode22.options[this.form.addbbcode22.selectedIndex].value + ']', '[/size]')" onmouseover = "helpline('f')" class = "<?php echo $boardclass;?>button">
                        <option value = "1"><?php echo _SIZE_VSMALL; ?></option>

                        <option value = "2"><?php echo _SIZE_SMALL; ?></option>

                        <option value = "3" selected = "selected"><?php echo _SIZE_NORMAL; ?></option>

                        <option value = "4"><?php echo _SIZE_BIG; ?></option>

                        <option value = "5"><?php echo _SIZE_VBIG; ?></option>
                    </select>

                    &nbsp;&nbsp;<a href = "javascript: bbstyle(-1)"onmouseover = "helpline('a')"><small><?php echo _BBCODE_CLOSA; ?></small></a>
                        </td>
                    </tr>

                    <tr>
                        <td class = "<?php echo $boardclass;?>posthint">
                            <input type = "text" name = "helpbox" size = "45" class = "<?php echo $boardclass;?>inputbox" maxlength = "100" value = "<?php echo _BBCODE_HINT;?>"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class = "<?php echo $boardclass; ?>sectiontableentry2">
            <td valign = "top" class = "fb_leftcolumn">
                <strong><?php echo _MESSAGE; ?></strong>:

                <?php
                if ($emoticons != 1)
                {
                ?>

                    <br/>

                    <br/>

                    <div align = "right">
                        <table border = "0" cellspacing = "3" cellpadding = "0">
                            <tr>
                                <td colspan = "4" style = "text-align: center;">
                                    <strong><?php echo _GEN_EMOTICONS; ?></strong>
                                </td>
                            </tr>

                            <tr>
                                <?php
                                generate_smilies(); //the new function Smiley mod
                                ?>
                            </tr>
                        </table>
                    </div>

                <?php
                }
                ?>
            </td>

            <td valign = "top">
                <textarea class = "<?php echo $boardclass;?>txtarea" name = "<?php echo $areaname;?>" id = "<?php echo $areaname;?>"><?php echo $html; ?></textarea>
<?php
if ($editmode) {
   // Moderator edit area
     ?>
     <fieldset>
     <legend><?php echo _FB_EDITING_REASON?></legend>
        <input name="modified_reason" size="40" maxlength="200"  type="text"><br />

     </fieldset>
<?php
}
?>
            </td>
        </tr>

<?php
    } // fbWriteTextarea()

    function purify($text)
    {
        $text = preg_replace("'<script[^>]*>.*?</script>'si", "", $text);
        $text = preg_replace('/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is', '\2 (\1)', $text);
        $text = preg_replace('/<!--.+?-->/', '', $text);
        $text = preg_replace('/{.+?}/', '', $text);
        $text = preg_replace('/&nbsp;/', ' ', $text);
        $text = preg_replace('/&amp;/', ' ', $text);
        $text = preg_replace('/&quot;/', ' ', $text);
        //smilies
        $text = preg_replace('/:laugh:/', ':-D', $text);
        $text = preg_replace('/:angry:/', ' ', $text);
        $text = preg_replace('/:mad:/', ' ', $text);
        $text = preg_replace('/:unsure:/', ' ', $text);
        $text = preg_replace('/:ohmy:/', ':-O', $text);
        $text = preg_replace('/:blink:/', ' ', $text);
        $text = preg_replace('/:huh:/', ' ', $text);
        $text = preg_replace('/:dry:/', ' ', $text);
        $text = preg_replace('/:lol:/', ':-))', $text);
        $text = preg_replace('/:money:/', ' ', $text);
        $text = preg_replace('/:rolleyes:/', ' ', $text);
        //bbcode
        $text = preg_replace('/\[hide==([1-3])\](.*?)\[\/hide\]/s', '', $text);
        $text = preg_replace('/(\[b\])/', ' ', $text);
        $text = preg_replace('/(\[\/b\])/', ' ', $text);
        $text = preg_replace('/(\[s\])/', ' ', $text);
        $text = preg_replace('/(\[\/s\])/', ' ', $text);
        $text = preg_replace('/(\[i\])/', ' ', $text);
        $text = preg_replace('/(\[\/i\])/', ' ', $text);
        $text = preg_replace('/(\[u\])/', ' ', $text);
        $text = preg_replace('/(\[\/u\])/', ' ', $text);
        $text = preg_replace('/(\[quote\])/', ' ', $text);
        $text = preg_replace('/(\[\/quote\])/', ' ', $text);
        $text = preg_replace('/(\[code:1\])(.*?)(\[\/code:1\])/', '\\2', $text);
        $text = preg_replace('/(\[ul\])(.*?)(\[\/ul\])/s', '\\2', $text);
        $text = preg_replace('/(\[li\])(.*?)(\[\/li\])/s', '\\2', $text);
        $text = preg_replace('/(\[ol\])(.*?)(\[\/ol\])/s', '\\2', $text);
        $text = preg_replace('/\[img size=([0-4][0-9][0-9])\](.*?)\[\/img\]/s', '\\2', $text);
        $text = preg_replace('/\[img size=([0-9][0-9])\](.*?)\[\/img\]/s', '\\2', $text);
        $text = preg_replace('/\[img\](.*?)\[\/img\]/s', '\\1', $text);
        $text = preg_replace('/\[url\](.*?)\[\/url\]/s', '\\1', $text);
        $text = preg_replace('/\[url=(.*?)\](.*?)\[\/url\]/s', '\\2 (\\1)', $text);
        $text = preg_replace('/<A (.*)>(.*)<\/A>/i', '\\2', $text);
        $text = preg_replace('/\[file(.*?)\](.*?)\[\/file\]/s', '\\2', $text);
        $text = preg_replace('/\[size=([1-7])\](.+?)\[\/size\]/s', '\\2', $text);
        $text = preg_replace('/\[color=(.*?)\](.*?)\[\/color\]/s', '\\2', $text);
        $text = preg_replace('#/n#s', ' ', $text);
        $text = strip_tags($text);
        //$text = stripslashes(htmlspecialchars($text));
        $text = stripslashes($text);
        return ($text);
    } //purify

    function urlMaker($text)
    {
        $text = str_replace("\n", " \n ", $text);
        $words = explode(' ', $text);

        for ($i = 0; $i < sizeof($words); $i++)
        {
            $word = $words[$i];
            //Trim below is necessary is the tag is placed at the begin of string
            $c = 0;

            if (strtolower(substr($words[$i], 0, 7)) == 'http://')
            {
                $c = 1;
                $word = '<a href=\"' . $words[$i] . '\" target=\"_new\">' . $word . '</a>';
            }
            elseif (strtolower(substr($words[$i], 0, 8)) == 'https://')
            {
                $c = 1;
                $word = '<a href=\"' . $words[$i] . '\" target=\"_new\">' . $word . '</a>';
            }
            elseif (strtolower(substr($words[$i], 0, 6)) == 'ftp://')
            {
                $c = 1;
                $word = '<a href=\"' . $words[$i] . '\" target=\"_new\">' . $word . '</a>';
            }
            elseif (strtolower(substr($words[$i], 0, 4)) == 'ftp.')
            {
                $c = 1;
                $word = '<a href=\"ftp://' . $words[$i] . '\" target=\"_new\">' . $word . '</a>';
            }
            elseif (strtolower(substr($words[$i], 0, 4)) == 'www.')
            {
                $c = 1;
                $word = '<a href="http://' . $words[$i] . '\" target=\"_new\">' . $word . '</a>';
            }
            elseif (strtolower(substr($words[$i], 0, 7)) == 'mailto:')
            {
                $c = 1;
                $word = '<a href=\"' . $words[$i] . '\">' . $word . '</a>';
            }

            if ($c == 1)
                $words[$i] = $word;
        //$words[$i] = str_replace ("\n ", "\n", $words[$i]);
        }

        $ret = str_replace(" \n ", "\n", implode(' ', $words));
        return $ret;
    }
    /* **************************************************************
    * htmlwrap() function - v1.1
    * Copyright (c) 2004 Brian Huisman AKA GreyWyvern
    *
    * This program may be distributed under the terms of the GPL
    *   - http://www.gnu.org/licenses/gpl.txt
    *
    *
    * htmlwrap -- Safely wraps a string containing HTML formatted text (not
    * a full HTML document) to a specified width
    *
    * See the inline comments and http://www.greywyvern.com/php.php
    * for more info
    ******************************************************************** */
    function htmlwrap($str, $width = 60, $break = "\n", $nobreak = "", $nobr = "pre", $utf = false)
    {
        // Split HTML content into an array delimited by < and >
        // The flags save the delimeters and remove empty variables
        $content = preg_split("/([<>])/", $str, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        // Transform protected element lists into arrays
        $nobreak = explode(" ", $nobreak);
        $nobr = explode(" ", $nobr);
        // Variable setup
        $intag = false;
        $innbk = array ();
        $innbr = array ();
        $drain = "";
        $utf = ($utf) ? "u" : "";
        // List of characters it is "safe" to insert line-breaks at
        // Do not add ampersand (&) as it will mess up HTML Entities
        // It is not necessary to add < and >
        $lbrks = "/?!%)-}]\\\"':;";

        // We use \r for adding <br /> in the right spots so just switch to \n
        if ($break == "\r")
            $break = "\n";

        while (list(, $value) = each($content))
        {
            switch ($value)
            {
                // If a < is encountered, set the "in-tag" flag
                case "<":
                    $intag = true;

                    break;

                // If a > is encountered, remove the flag
                case ">":
                    $intag = false;

                    break;

                default:
                    // If we are currently within a tag...
                    if ($intag)
                    {
                        // If the first character is not a / then this is an opening tag
                        if ($value{0}!= "/")
                        {
                            // Collect the tag name
                            preg_match("/^(.*?)(\s|$)/$utf", $value, $t);

                            // If this is a protected element, activate the associated protection flag
                            if ((!count($innbk) && in_array($t[1], $nobreak)) || in_array($t[1], $innbk))
                                $innbk[] = $t[1];

                            if ((!count($innbr) && in_array($t[1], $nobr)) || in_array($t[1], $innbr))
                                $innbr[] = $t[1];
                        // Otherwise this is a closing tag
                        }
                        else
                        {
                            // If this is a closing tag for a protected element, unset the flag
                            if (in_array(substr($value, 1), $innbk))
                                unset($innbk[count($innbk)]);

                            if (in_array(substr($value, 1), $innbr))
                                unset($innbr[count($innbr)]);
                        }
                    // Else if we're outside any tags...
                    }
                    else if ($value)
                    {
                        // If unprotected, remove all existing \r, replace all existing \n with \r
                        if (!count($innbr))
                            $value = str_replace("\n", "\r", str_replace("\r", "", $value));

                        // If unprotected, enter the line-break loop
                        if (!count($innbk))
                        {
                            do
                            {
                                $store = $value;

                                // Find the first stretch of characters over the $width limit
                                if (preg_match("/^(.*?\s|^)(([^\s&]|&(\w{2,5}|#\d{2,4});){" . $width . "})(?!(" . preg_quote($break, "/") . "|\s))(.*)$/s$utf", $value, $match))
                                {
                                    // Determine the last "safe line-break" character within this match
                                    for ($x = 0, $ledge = 0; $x < strlen($lbrks); $x++)
                                        $ledge = max($ledge, strrpos($match[2], $lbrks{$x}));

                                    if (!$ledge)
                                        $ledge = strlen($match[2]) - 1;

                                    // Insert the modified string
                                    $value = $match[1] . substr($match[2], 0, $ledge + 1) . $break . substr($match[2], $ledge + 1) . $match[6];
                                }
                            // Loop while overlimit strings are still being found
                            } while ($store != $value);
                        }

                        // If unprotected, replace all \r with <br />\n to finish
                        if (!count($innbr))
                            $value = str_replace("\r", "<br />\n", $value);
                    }
            }

            // Send the modified segment down the drain
            $drain .= $value;
        }

        // Return contents of the drain
        return $drain;
    }
} //class
?>
