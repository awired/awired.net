/* ***** BEGIN LICENSE BLOCK *****
 * This file is part of DotClear.
 * Copyright (c) 2004 Olivier Meunier and contributors. All rights
 * reserved.
 *
 * DotClear is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * DotClear is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with DotClear; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK ***** */

/*img = new Image;
img.src = 'images/moins.png';*/

function getE(id)
{
	if(document.getElementById) {
		return document.getElementById(id);
	} else if(document.all) {
		return document.all[id];
	} else return;
}

function openClose(id,mode)
{
	element = getE(id);
	img = getE('img_'+id);
	
	if(element.style) {
		if(mode == 0) {
			if(element.style.display == 'block' ) {
				element.style.display = 'none';
				img.src = 'images/plus.png';
			} else {
				element.style.display = 'block';
				img.src = 'images/moins.png';
			}
		} else if(mode == 1) {
			element.style.display = 'block';
			img.src = 'images/moins.png';
		} else if(mode == -1) {
			element.style.display = 'none';
			img.src = 'images/plus.png';
		}
	}
}

function mOpenClose(idArray,mode)
{
	for(var i=0;i<idArray.length;i++) {
		openClose(idArray[i],mode);
	}
}

function popup(url)
{
	window.open(url,'dc_popup',
	'alwaysRaised=yes,dependent=yes,toolbar=no,height=420,width=500,menubar=no,resizable=yes,scrollbars=yes,status=no');
}

function limitArea(e,limit)
{
	if (e.value.length > limit) {
		e.value = e.value.substring(0,limit);
	}
}

function createCookie(name,value) {
	document.cookie = name+"="+value+";path=/;";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function openCloseOptions(id,cookie_name,mode)
{
	if (mode != null) {
		openClose(id,mode);
		
		e = getE(id);
		if (e.style.display == 'block') {
			cookie_value = '1';
		} else {
			cookie_value = '-1';
		}
		
		createCookie(cookie_name,cookie_value);
	} else {
		cookie = readCookie(cookie_name);
		if (!cookie) {
			cookie = -1
		}
		openClose(id,cookie);
	}
}

function setNow()
{
	var now = new Date();
	var y = now.getFullYear();
	var m = now.getMonth();
	var d = now.getDate();
	var h = now.getHours();
	var i = now.getMinutes();
	var s = now.getSeconds();
	
	if (m.length == 1) {
		m = '0'+m;
	}
	
	e = getE('p_dt_y');
	e.value = y;
	e = getE('p_dt_m');
	e.selectedIndex = m;
	e = getE('p_dt_d');
	e.value = d;
	e = getE('p_dt_h');
	e.value = h;
	e = getE('p_dt_i');
	e.value = i;
	e = getE('p_dt_s');
	e.value = s;
}

function str2url(str,encoding,ucfirst)
{
	str = str.toUpperCase();
	str = str.toLowerCase();
	
	str = str.replace(/[\u00E0\u00E1\u00E2\u00E3\u00E4\u00E5]/g,'a');
	str = str.replace(/[\u00E7]/g,'c');
	str = str.replace(/[\u00E8\u00E9\u00EA\u00EB]/g,'e');
	str = str.replace(/[\u00EC\u00ED\u00EE\u00EF]/g,'i');
	str = str.replace(/[\u00F2\u00F3\u00F4\u00F5\u00F6\u00F8]/g,'o');
	str = str.replace(/[\u00F9\u00FA\u00FB\u00FC]/g,'u');
	str = str.replace(/[\u00FD\u00FF]/g,'y');
	str = str.replace(/[\u00F1]/g,'n');
	str = str.replace(/[\u0153]/g,'oe');
	str = str.replace(/[\u00E6]/g,'ae');
	str = str.replace(/[\u00DF]/g,'ss');
	
	str = str.replace(/[^a-z0-9_\s\'\:\/\[\]-]/g,'');
	str = trim(str);
	str = str.replace(/[\s\'\:\/\[\]-]+/g,' ');
	str = str.replace(/[ ]/g,'-');
	
	if (ucfirst == 1) {
		c = str.charAt(0);
		str = c.toUpperCase()+str.slice(1);
	}
	
	return str;
}

function trim(s) {
	s = s.replace(/[ ]*$/,'');
	s = s.replace(/^[ ]*/,'');
	return s;
}