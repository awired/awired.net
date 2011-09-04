<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of DotClear.
# Copyright (c) 2004 Olivier Meunier and contributors. All rights
# reserved.
#
# DotClear is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
# 
# DotClear is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License
# along with DotClear; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****

/* cassage des magic_quotes */
function magicStrip(&$k,$key)
{
	if(get_magic_quotes_gpc()) {
		$k = handleMagicQuotes($k);
	}
}

function handleMagicQuotes(&$value)
{
	if (get_magic_quotes_gpc()) {
		if (is_array($value)) {
			$result = array();
			foreach ($value as $k => $v)
			{
				if (is_array($v)) {
					$result[$k] = handleMagicQuotes($v);
				} else {
					$result[$k] = stripslashes($v);
				}
			}
			return $result;
		} else {
			return stripslashes($value);
		}
	}
	return $value;
}


if(!empty($_GET)) {
	array_walk($_GET,'magicStrip');
}
if(!empty($_POST)) {
	array_walk($_POST,'magicStrip');
}
if(!empty($_REQUEST)) {
	array_walk($_REQUEST,'magicStrip');
}
if(!empty($_COOKIE)) {
	array_walk($_COOKIE,'magicStrip');
}

?>
