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

class images
{
	function cropImg($uri,$file,$dest_type,$w=120,$h=200)
	{
		if (!file_exists($uri)) {
			return false;
		}
		
		if (($size = @getimagesize($uri)) === false) {
			return false;
		}
		
		$type = $size[2];
		$H = $size[1];
		$W = $size[0];
		
		if ($type == '2') {
			$function = 'imagecreatefromjpeg';
		} elseif ($type == '3') {
			$function = 'imagecreatefrompng';
		} else {
			return false;
		}
		
		if (!function_exists($function)) {
			return false;
		}
		
		if (($img = @$function($uri)) == false) {
			return false;
		}
		
		# Si original plus petit
		if ($H <= $h && $W <= $w)
		{
			if (copy($uri,$file) !== false) {
				return true;
			} else {
				return false;
			}
		}
		
		$rB = $H/$W;
		$rS = $h/$w;
		if (($H > $h) && ($W > $w)) {
			if ($rB > $rS) {
				$height = $h;
				$width  = $height/$rB;
			} else {
				$width = $w;
				$height = $width*$rB; 
			}
		} elseif ($H > $h) {
			$height = $h;
			$width  = $height/$rB;
		} elseif ($W > $w) {
			$width = $w;
			$height = $width*$rB; 
		} else {
			$height = $H;
			$width  = $W;
		}
		
		$zx = $W/$width;
		$zy = $H/$height;
		
		$create_function = images::checkTrueColor() ? 'imagecreatetruecolor' : 'imagecreate';
		
		if (($img2 = $create_function(round($width),round($height)))  === false) {
			return false;
		}
		
		//images::CopyResampleBicubic($img2,$img,0,0,0,0,$width,$height,$zx,$zy);
		imagecopyresized($img2,$img,0,0,0,0,round($width),round($height),$W,$H);
		
		if (!is_dir(dirname($file))) {
			$dmod = fileperms(dirname(dirname($file)));
			if (@mkdir(dirname($file),$dmod) === false) {
				return false;
			}
			chmod(dirname($file),$dmod);
		}
		
		if ($dest_type == 'png') {
			$endfunction = 'imagepng';
		} elseif ($dest_type == 'jpeg') {
			$endfunction = 'imagejpeg';
		}
		
		if (@$endfunction($img2,$file,80) === false) {
			return false;
		}
		chmod($file,fileperms(dirname($file)) & ~0111);
		
		imagedestroy($img2);
		return true;
	}
	
	function CopyResampleBicubic(&$dst, &$src, $dstx, $dsty, $srcx, $srcy, $w, $h, $zoomX, $zoomY = '')
	{
		if (!$zoomY) {
			$zoomY = $zoomX;
		}
		
		$palsize = ImageColorsTotal($src);
		
		for ($i = 0; $i<$palsize; $i++)
		{
			$colors = ImageColorsForIndex($src, $i);
			ImageColorAllocate($dst, $colors['red'], $colors['green'], $colors['blue']);
		}
		
		$zoomX2 = (int)($zoomX/2);
		$zoomY2 = (int)($zoomY/2);
		
		$dstX = imagesx($dst);
		$dstY = imagesy($dst);
		$srcX = imagesx($src);
		$srcY = imagesy($src);
		
		for ($j = 0; $j<($h-$dsty); $j++)
		{
			$sY = (int)($j*$zoomY)+$srcy;
			$y13 = $sY+$zoomY2;
			$dY = $j+$dsty;
			
			if (($sY >= $srcY) or ($dY >= $dstY) or ($y13 >= $srcY)) {
				break 1;
			}
			
			for ($i = 0; $i<($w-$dstx); $i++)
			{
				$sX = (int)($i*$zoomX)+$srcx;
				$x34 = $sX+$zoomX2;
				$dX = $i+$dstx;
				
				if (($sX >= $srcX) or ($dX >= $dstX) or ($x34 >= $srcX)) {
					break 1;
				}
				
				$c1 = ImageColorsForIndex($src, ImageColorAt($src, $sX, $y13));
				$c2 = ImageColorsForIndex($src, ImageColorAt($src, $sX, $sY));
				$c3 = ImageColorsForIndex($src, ImageColorAt($src, $x34, $y13));
				$c4 = ImageColorsForIndex($src, ImageColorAt($src, $x34, $sY));
				
				$r = ($c1['red']+$c2['red']+$c3['red']+$c4['red'])/4;
				$g = ($c1['green']+$c2['green']+$c3['green']+$c4['green'])/4;
				$b = ($c1['blue']+$c2['blue']+$c3['blue']+$c4['blue'])/4;
				
				ImageSetPixel($dst, $dX, $dY, ImageColorClosest($dst, $r, $g, $b));
			}
		}
	}
	
	function type($p)
	{
		if (($size = @getimagesize($p)) === false) {
			return false;
		}
		
		$type = $size[2];
		
		if ($type == '1') {
			return 'gif';
		} elseif ($type == '2') {
			return 'jpeg';
		} elseif ($type == '3') {
			return 'png';
		} else {
			return false;
		}
	}
	
	function checkTrueColor()
	{
		if (function_exists('gd_info'))
		{
			$gdinfo = gd_info();
			$gdversion = $gdinfo['GD Version'];
			if (strpos($gdversion,'2.') !== false) {
				return true;
			}
		}
		
		return false;
	}
}
?>