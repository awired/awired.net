<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/selectlang.php,v 1.37 2004/10/10 23:02:58 olliver Exp $
 *
 * Copyright (C) 2001-2004, the BBClone Team (see file doc/authors.txt
 * distributed with this library)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * See doc/copying.txt for details
 */

if (is_readable($BBC_LIB_PATH."html.php")) require_once($BBC_LIB_PATH."html.php");
else exit(bbc_msg($BBC_LIB_PATH."html.php"));

// initialising the HTML class
$bbc_html =& new bbc_html;

if (is_readable($BBC_LANGUAGE_PATH.$bbc_html->lng.".php")) require_once($BBC_LANGUAGE_PATH.$bbc_html->lng.".php");
elseif (is_readable($BBC_LANGUAGE_PATH."en.php")) {
  // non critical error that shouldn't be displayed in counting mode
  if (!empty($BBC_DEBUG)) exit(bbc_msg($BBC_LANGUAGE_PATH.$bbc_html->lng.".php"));
  require($BBC_LANGUAGE_PATH."en.php");
}
else exit(bbc_msg($BBC_LANGUAGE_PATH."en.php"));
?>