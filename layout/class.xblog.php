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

#
#  Extension de la classe blog
#

class xblog extends blog
{
	var $use_smilies = false;
	var $smilies_path = '';
	var $smilies_url = '';
	
	function setUseSmilies($v=false)
	{
		$this->use_smilies = (boolean) $v;
	}
	
	function setSmiliesPath($p,$url)
	{
		$this->smilies_path = $p;
		$this->smilies_url = $url;
		
		# Tableau des smilies
		$def_path = $this->smilies_path.'/smilies.txt';
		if ($this->use_smilies && file_exists($def_path))
		{
			$def = file($def_path);
			
			$this->arry_smilies = array();
			foreach($def as $v)
			{
				$v = trim($v);
				if (preg_match('|^([^\t]*)[\t]+(.*)$|',$v,$matches))
				{
					$r = '/(\A|[\s]+|>)('.preg_quote($matches[1],'/').')([\s]+|[<]|\Z)/ms';
					$s = '$1<img src="'.$this->smilies_url.$matches[2].'" '.
					'alt="$2" class="smiley" />$3';
					$this->arry_smilies[$r] = $s;
				}
			}
		}
	}
	
	function addSmilies($str)
	{
		if (!empty($this->arry_smilies) && is_array($this->arry_smilies))
		{
			return preg_replace(array_keys($this->arry_smilies),array_values($this->arry_smilies),$str);
		}
		else
		{
			return $str;
		}
	}
	
	function xCalendar($year,$month,$day,$cat_id,$lang,
	$block='<table summary="calendrier">%s</table>')
	{
		$arry_months = $GLOBALS['arry_months'];
				
		$comp_url = '';
		if ($lang) {
			$comp_url .= $lang.'/';
		}
		if($cat_id) {
			$comp_url .= $cat_id.'/';
		}
		
		if($month == '' || $year == '') {
			$recent = $this->getEarlierDate($cat_id);
			$actual_month = date('m',strtotime($recent));
			$actual_year = date('Y',strtotime($recent));
		} else {
			$actual_month = $month;
			$actual_year = $year;
		}
		
		$days = $this->getAllDates('d',$actual_year,$actual_month,'',$cat_id);
		$ts = strtotime($actual_year.'-'.$actual_month.'-01');
		
		$first = date('w',$ts);
		
		$first = ($first == 0) ? 6 : ($first-1);
		
		# Limite de fin du mois
		$limit = date('t',$ts);
		
		# Mois suivant / précédent
		$link_next = $link_prev = '';
		if (($l_next = util::getNextPrev($arry_months,$ts,'prev')) !== NULL) {
			$ts_next = key($l_next);
			$m_next = date('m',$ts_next);
			$y_next = date('Y',$ts_next);
			$link_next = ' <a href="'.
				sprintf($this->front_url['archive'],$comp_url.$y_next,$m_next).'" '.
				' title="'.dt::str('%B %Y',$ts_next).'">&#187;</a>';
		}
		
		if (($l_prev = util::getNextPrev($arry_months,$ts,'next')) !== NULL) {
			$ts_prev = key($l_prev);
			$m_prev = date('m',$ts_prev);
			$y_prev = date('Y',$ts_prev);
			$link_prev = '<a href="'.
				sprintf($this->front_url['archive'],$comp_url.$y_prev,$m_prev).'" '.
				' title="'.dt::str('%B %Y',$ts_prev).'">&#171;</a> ';
		}
		
		
		$d=1; $i=0; $dstart=false;
		
		$res = "\n<caption>".$link_prev.dt::str('%B %Y',$ts).$link_next.'</caption>';
		$res .= '<thead><tr>';
		
		$monday_ts = strtotime('2003-01-06 00:00:00');
		$sunday_ts = strtotime('2003-01-12 00:00:00');
		
		for($j=$monday_ts;$j<=$sunday_ts;$j=$j+86400) {
			$res .= '<th scope="col"><abbr title="'.dt::str('%A',$j).'">'.
			dt::str('%a',$j).'</abbr></th>';
		}
		$res .= "</tr></thead>\n";
		
		$res .= '<tbody>';
		while($i<42)
		{
			if($i%7 == 0)
				$res .= '<tr>';
			
			if($i == $first) {
				$dstart = true;
			}
			
			if($dstart && !checkdate($actual_month,$d,$actual_year)) {
				$dstart = false;
			}
			
			if(!empty($days[strtotime($actual_year.'-'.$actual_month.'-'.$d)])) {
				$url = sprintf($this->front_url['day'],$comp_url.$actual_year,$actual_month,$d);
				$link = '<a href="'.$url.'">%s</a>';
			} else {
				$link = '%s';
			}
			
			$class = ($day == $d && $dstart) ? ' class="active"' : '';
			
			$res .= '<td'.$class.'>';
			$res .= ($dstart) ? sprintf($link,$d) : ' ';
			$res .= '</td>';
			
			if(($i+1)%7 == 0)
			{
				$res .= '</tr>'."\n";
				if ($d>=$limit) { $i=42; }
			}
			
			$i++;
			if($dstart) { $d++; }
		}
		
		$res .= "</tbody>\n";
		
		return sprintf($block,$res);
	}

	function getAtomID($perm_url)
	{
		$perm_url = str_replace('#','/',$perm_url);
		
		return 'tag:'.htmlspecialchars($_SERVER['HTTP_HOST']).','.date('Y').':'.$perm_url;
	}
}
?>