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

class dt
{
	function str($p,$ts=NULL)
	{
		if ($ts == NULL) { $ts = time(); }
		
		$hash = '799b4e471dc78154865706469d23d512';
		$p = preg_replace('/(?<!%)%(a|A)/','{{'.$hash.'__$1%w__}}',$p);
		$p = preg_replace('/(?<!%)%(b|B)/','{{'.$hash.'__$1%m__}}',$p);
		
		$res = strftime($p,$ts);
		
		$res = preg_replace_callback('/{{'.$hash.'__(a|A|b|B)([0-9]{1,2})__}}/',array('dt','_callback'),$res);
		
		return $res;
	}
	
	function dt2str($p,$dt)
	{
		return dt::str($p,strtotime($dt));
	}
	
	function iso8601($ts)
	{
		$tz = date('O',$ts);
		$tz = substr($tz,0,-2).':'.substr($tz,-2);
		return date('Y-m-d\\TH:i:s',$ts).$tz;
	}
	
	function _callback($args)
	{
		$b = array(1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',
		7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');
		
		$B = array(1=>'January',2=>'February',3=>'March',4=>'April',
		5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',
		10=>'October',11=>'November',12=>'December');
		
		$a = array(1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',
		6=>'Sat',0=>'Sun');
		
		$A = array(1=>'Monday',2=>'Tuesday',3=>'Wednesday',4=>'Thursday',
		5=>'Friday',6=>'Saturday',0=>'Sunday');
		
		return __(${$args[1]}[(integer) $args[2]]);
	}
}

?>