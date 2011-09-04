<?php
/**
* @version $Id: fb_timeformat.class.php 63 2007-04-17 21:23:17Z danialt $
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

//added time format
$txt['days'] = array
(
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday'
);

$txt['days_short'] = array
(
    'Sun',
    'Mon',
    'Tue',
    'Wed',
    'Thu',
    'Fri',
    'Sat'
);

$txt['months'] = array
(
    1 => 'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
);

$txt['months_titles'] = array
(
    1 => 'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'Agust',
    'September',
    'October',
    'November',
    'December'
);

$txt['months_short'] = array
(
    1 => 'Jan',
    'Feb',
    'Mar',
    'Apr',
    'May',
    'Jun',
    'Jly',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
);

$usertime_format = "%d/%m/%Y %H:%M";

// Format a time to make it look purdy.
function FB_timeformat($logTime, $show_today = true)
{
    global $database, $mainframe, $mosConfig_locale, $txt, $usertime_format;
    $time = $logTime;
    $todayMod = 2;

    // We can't have a negative date (on Windows, at least.)
    if ($time < 0) {
        $time = 0;
    }

    // Today and Yesterday?
    if ($show_today === true)
    {
        // Get the current time.
        $nowtime = fb_forum_time();
        $then = @getdate($time);
        $now = @getdate($nowtime);
        // Try to make something of a time format string...
        $s = strpos($usertime_format, '%S') === false ? '' : ':%S';

        if (strpos($usertime_format, '%H') === false && strpos($usertime_format, '%T') === false) {
            $today_fmt = '%I:%M' . $s . ' %p';
        }
        else {
            $today_fmt = '%H:%M' . $s;
        }

        // Same day of the year, same year.... Today!
        if ($then['yday'] == $now['yday'] && $then['year'] == $now['year'])
            return '' . _TIME_TODAY . '' . FB_timeformat($logTime, $today_fmt);

        // Day-of-year is one less and same year, or it's the first of the year and that's the last of the year...
        if ($todayMod == '2' && (($then['yday'] == $now['yday'] - 1 && $then['year'] == $now['year']) || ($now['yday'] == 0 && $then['year'] == $now['year'] - 1) && $then['mon'] == 12 && $then['mday'] == 31))
            return '' . _TIME_YESTERDAY . '' . FB_timeformat($logTime, $today_fmt);
    }

    $str = !is_bool($show_today) ? $show_today : $usertime_format;

    if (setlocale(LC_TIME, $mosConfig_locale))
    {
        foreach (array
        (
            '%a',
            '%A',
            '%b',
            '%B'
        )as $token)
            if (strpos($str, $token) !== false)
                $str = str_replace($token, ucwords((strftime($token, $time))), $str);
    }
    else
    {
        // Do-it-yourself time localization.  Fun.
        foreach (array
        (
            '%a' => 'days_short',
            '%A' => 'days',
            '%b' => 'months_short',
            '%B' => 'months'
        )as $token => $text_label)
            if (strpos($str, $token) !== false)
                $str = str_replace($token, $txt[$text_label][(int)strftime($token === '%a' || $token === '%A' ? '%w' : '%m', $time)], $str);

        if (strpos($str, '%p'))
            $str = str_replace('%p', (strftime('%H', $time) < 12 ? 'am' : 'pm'), $str);
    }

    // Format any other characters..
    return strftime($str, $time);
}

// The current time with offset.
function fb_forum_time($timestamp = null)
{
    global $mainframe;

    if ($timestamp === null) {
        $timestamp = time();
    }
    elseif ($timestamp == 0) {
        return 0;
    }

    $timestamp = time();
    return $timestamp;
}
?>