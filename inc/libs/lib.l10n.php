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


function __($str)
{
	return (!empty($GLOBALS['__l10n'][$str])) ? $GLOBALS['__l10n'][$str] : $str;
}

class l10n
{
	function init()
	{
		$GLOBALS['__l10n'] = array();
		$GLOBALS['__l10n_files'] = array();
	}
	
	function set($file)
	{
		$lang_file = $file.'.lang';
		$po_file = $file.'.po';
		$php_file = $file.'.lang.php';
		
		if (file_exists($php_file))
		{
			require $php_file;
		}
		/*elseif (($tmp = l10n::getPoFile($po_file)) !== false)
		{
			$GLOBALS['__l10n_files'][] = $lang_file;
			$GLOBALS['__l10n'] = array_merge($GLOBALS['__l10n'],$tmp);
		}*/
		elseif (($tmp = l10n::getLangFile($lang_file)) !== false)
		{
			$GLOBALS['__l10n_files'][] = $lang_file;
			$GLOBALS['__l10n'] = array_merge($GLOBALS['__l10n'],$tmp);
		}
		else
		{
			return false;
		}
	}
	
	function getLangFile($file)
	{
		if (!file_exists($file)) {
			//trigger_error('l10n file not found',E_USER_NOTICE);
			return false;
		}
		
		$f = file($file);
		$res = array();
		
		for ($i=0; $i<count($f); $i++) {
			if (substr($f[$i],0,1) == ';' && !empty($f[$i+1])) {
				$res[trim(substr($f[$i],1))] = trim($f[$i+1]);
				$i++;
			}
		}
		
		return $res;
	}
	
	function getPoFile($file)
	{
		if (!file_exists($file)) {
			//trigger_error('l10n file not found',E_USER_NOTICE);
			return false;
		}
		
		$fc = implode('',file($file));
		
		$res = array();
		
		$matched = preg_match_all('/(msgid\s+("([^"]|\\\\")*?"\s*)+)\s+'.
		'(msgstr\s+("([^"]|\\\\")*?"\s*)+)/',
		$fc, $matches);
		
		if (!$matched) {
			return false;
		}
		
		for ($i=0; $i<$matched; $i++)
		{
			$msgid = preg_replace('/\s*msgid\s*"(.*)"\s*/s','\\1',$matches[1][$i]);
			$msgstr= preg_replace('/\s*msgstr\s*"(.*)"\s*/s','\\1',$matches[4][$i]);
			$res[l10n::poString($msgid)] = l10n::poString($msgstr);
		}
		
		if (!empty($res[''])) {
			$meta = $res[''];
			unset($res['']);
		}
		
		return $res;
	}
	
	function poString($string,$reverse=false)
	{
		if ($reverse) {
			$smap = array('"', "\n", "\t", "\r");
			$rmap = array('\\"', '\\n"' . "\n" . '"', '\\t', '\\r');
			return (string) str_replace($smap, $rmap, $string);
		} else {
			$smap = array('/"\s+"/', '/\\\\n/', '/\\\\r/', '/\\\\t/', '/\\"/');
			$rmap = array('', "\n", "\r", "\t", '"');
			return (string) preg_replace($smap, $rmap, $string);
		}
	}
	
	function lang2po($file)
	{
		$map = l10n::getLangFile($file);
		
		if ($map === false) {
			return false;
		}
		
		$res = '';
		
		foreach ($map as $k => $v)
		{
			$res .= "\n".'msgid "'.l10n::poString($k,true).'"'."\n";
			$res .= 'msgstr "'.l10n::poString($v,true).'"'."\n";
		}
		
		return $res;
	}
	
	function getHtmlFile($dir,$file,$lang,$encoding)
	{
		if ($encoding == 'UTF-8') {
			$lang .= '-utf8';
		}
		
		$f = $dir.'/'.$lang.'/'.$file;
		if (!file_exists($f)) {
			$f = $dir.'/en/'.$file;
		}
		
		if (!file_exists($f)) {
			return '<p>No file.</p>';
		} else {
			return implode('',file($f));
		}
	}
	
	function getISOcodes($flip=false)
	{
		$res = array(
		'aa' => 'Afar',
		'ab' => 'Abkhazian',
		'af' => 'Afrikaans',
		'am' => 'Amharic',
		'ar' => 'Arabic',
		'as' => 'Assamese',
		'ay' => 'Aymara',
		'az' => 'Azerbaijani',
		'ba' => 'Bashkir',
		'be' => 'Byelorussian',
		'bg' => 'Bulgarian',
		'bh' => 'Bihari',
		'bi' => 'Bislama',
		'bn' => 'Bengali',
		'bo' => 'Tibetan',
		'br' => 'Breton',
		'ca' => 'Catalan',
		'co' => 'Corsican',
		'cs' => 'Czech',
		'cy' => 'Welsh',
		'da' => 'Danish',
		'de' => 'German',
		'dz' => 'Bhutani',
		'el' => 'Greek',
		'en' => 'English',
		'eo' => 'Esperanto',
		'es' => 'Spanish',
		'et' => 'Estonian',
		'eu' => 'Basque',
		'fa' => 'Persian',
		'fi' => 'Finnish',
		'fj' => 'Fiji',
		'fo' => 'Faeroese',
		'fr' => 'French',
		'fy' => 'Frisian',
		'ga' => 'Irish',
		'gd' => 'Gaelic',
		'gl' => 'Galician',
		'gn' => 'Guarani',
		'gu' => 'Gujarati',
		'ha' => 'Hausa',
		'hi' => 'Hindi',
		'hr' => 'Croatian',
		'hu' => 'Hungarian',
		'hy' => 'Armenian',
		'ia' => 'Interlingua',
		'ie' => 'Interlingue',
		'ik' => 'Inupiak',
		'in' => 'Indonesian',
		'is' => 'Icelandic',
		'it' => 'Italian',
		'iw' => 'Hebrew',
		'ja' => 'Japanese',
		'ji' => 'Yiddish',
		'jw' => 'Javanese',
		'ka' => 'Georgian',
		'kk' => 'Kazakh',
		'kl' => 'Greenlandic',
		'km' => 'Cambodian',
		'kn' => 'Kannada',
		'ko' => 'Korean',
		'ks' => 'Kashmiri',
		'ku' => 'Kurdish',
		'ky' => 'Kirghiz',
		'la' => 'Latin',
		'ln' => 'Lingala',
		'lo' => 'Laothian',
		'lt' => 'Lithuanian',
		'lv' => 'Latvian',
		'mg' => 'Malagasy',
		'mi' => 'Maori',
		'mk' => 'Macedonian',
		'ml' => 'Malayalam',
		'mn' => 'Mongolian',
		'mo' => 'Moldavian',
		'mr' => 'Marathi',
		'ms' => 'Malay',
		'mt' => 'Maltese',
		'my' => 'Burmese',
		'na' => 'Nauru',
		'ne' => 'Nepali',
		'nl' => 'Dutch',
		'no' => 'Norwegian',
		'oc' => 'Occitan',
		'om' => 'Oromo',
		'or' => 'Oriya',
		'pa' => 'Punjabi',
		'pl' => 'Polish',
		'ps' => 'Pashto',
		'pt' => 'Portuguese',
		'qu' => 'Quechua',
		'rm' => 'Rhaeto-Romance',
		'rn' => 'Kirundi',
		'ro' => 'Romanian',
		'ru' => 'Russian',
		'rw' => 'Kinyarwanda',
		'sa' => 'Sanskrit',
		'sd' => 'Sindhi',
		'sg' => 'Sangro',
		'sh' => 'Serbo-Croatian',
		'si' => 'Singhalese',
		'sk' => 'Slovak',
		'sl' => 'Slovenian',
		'sm' => 'Samoan',
		'sn' => 'Shona',
		'so' => 'Somali',
		'sq' => 'Albanian',
		'sr' => 'Serbian',
		'ss' => 'Siswati',
		'st' => 'Sesotho',
		'su' => 'Sudanese',
		'sv' => 'Swedish',
		'sw' => 'Swahili',
		'ta' => 'Tamil',
		'te' => 'Tegulu',
		'tg' => 'Tajik',
		'th' => 'Thai',
		'ti' => 'Tigrinya',
		'tk' => 'Turkmen',
		'tl' => 'Tagalog',
		'tn' => 'Setswana',
		'to' => 'Tonga',
		'tr' => 'Turkish',
		'ts' => 'Tsonga',
		'tt' => 'Tatar',
		'tw' => 'Twi',
		'uk' => 'Ukrainian',
		'ur' => 'Urdu',
		'uz' => 'Uzbek',
		'vi' => 'Vietnamese',
		'vo' => 'Volapuk',
		'wo' => 'Wolof',
		'xh' => 'Xhosa',
		'yo' => 'Yoruba',
		'zh' => 'Chinese',
		'zu' => 'Zulu'
		);
		
		if ($flip) {
			$res = array_flip($res);
			ksort($res);
		}
		
		return $res;
	}
}

?>
