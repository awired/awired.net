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
 * $Id: ReadMe,v 1.7 2006/03/01 23:32:01 iapostolov Exp $
 *
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class MENU_joomfish {

	function CONFIG_MENU() {

		mosMenuBar::startTable();
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::apply();
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}

	function EDIT_MENU() {
	    mosMenuBar::startTable();
	    mosMenuBar::editList();
	    mosMenuBar::spacer();
		mosMenuBar::custom( 'cpanel', 'tool.png', 'tool_f2.png', _JOOMFISH_ADMIN_CPANEL, false );
	    mosMenuBar::endTable();
  }
	
	function TRANSLATION_OVERVIEW_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::publishList();
		mosMenuBar::spacer();
		mosMenuBar::unpublishList();
//		mosMenuBar::divider();
//		mosMenuBar::custom('setdefaulttext', 'new.png', 'new_f2.png', _JOOMFISH_SET_DEFAULTTEXT, false);
//		mosMenuBar::custom('setcomplete', 'copy.png', 'copy_f2.png', _JOOMFISH_SET_COMPLETE, false);
		mosMenuBar::spacer();
    	mosMenuBar::editList();
		mosMenuBar::spacer();
		mosMenuBar::deleteList();
		mosMenuBar::spacer();
		mosMenuBar::custom( 'cpanel', 'tool.png', 'tool_f2.png', _JOOMFISH_ADMIN_CPANEL, false );
		mosMenuBar::endTable();
	}

	function TRANSLATE_MENU() {
		mosMenuBar::startTable();
		//mosMenuBar::preview();
		//mosMenuBar::divider();
		mosMenuBar::save();
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	
	function UPGRADE_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::custom( 'upgrade', 'upload.png', 'upload_f2.png', _JOOMFISH_UPGRADE, false );
		mosMenuBar::spacer();
		mosMenuBar::custom( 'cpanel', 'tool.png', 'tool_f2.png', _JOOMFISH_ADMIN_CPANEL, false );
		mosMenuBar::endTable();
	}

	function DEFAULT_MENU() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::back();
		mosMenuBar::spacer();
		mosMenuBar::custom( 'cpanel', 'tool.png', 'tool_f2.png', _JOOMFISH_ADMIN_CPANEL, false );
		mosMenuBar::endTable();
	}
}
?>
