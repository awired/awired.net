<?php
/*
 * @version $Id: sef.class.php,v 1.5 2005/02/06 16:32:15 marlboroman_2k Exp $
 *
 * 404 SEF for MOS 4.5.1
 *
 * Author:	W.H.Welch <marlboroman_2k@yahoo.com>
 * Copyright:	2004 W.H.Welch
 * License:	GNU General Public License
 */


/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* @package Mambo_4.5.1
*/

class mosSEF extends mosDBTable {
	/** @var int */
	var $id		= null;
	/** @var int */
	var $cpt	= null;
	/** @var string */
	var $oldurl	= null;
	/** @var string */
	var $newurl	= null;
	/** @var date */
	var $dateadd	= null;


	function mosSEF( &$_db ) {
		$this->mosDBTable( '#__redirection', 'id', $_db );
	}
	function check() {

        //initialize
        $this->_error = null;
        $this->oldurl = trim($this->oldurl);
        $this->newurl = trim($this->newurl);

        // check for valid URLs
        if (($this->oldurl == '')||($this->newurl == '')){
            $this->_error .= _COM_SEF_EMPTYURL;
            return false;
        }
        if (eregi("^\/", $this->oldurl)) {
            $this->_error .= _COM_SEF_NOLEADSLASH;
        }
        if ((eregi("^index.php", $this->newurl)) === false ) {
            $this->_error .= _COM_SEF_BADURL;
        }
        if (is_null($this->_error)) {
	        // check for existing URLS
	        $this->_db->setQuery( "SELECT id FROM #__redirection WHERE `oldurl` LIKE '".$this->oldurl."'");
	        $xid = intval( $this->_db->loadResult() );
	        if ($xid && $xid != intval( $this->id )) {
	            $this->_error = _COM_SEF_URLEXIST;
	            return false;
	        }
	        return true;
	   }else{
	   	 return false;
	   }
	}
}

class SEF_config {

	var $version = "404SEFx 1.2 <a href=\"http://www.ty2u.com\" target=\"_blank\">TY2U.com</a>";

	/* boolean, is 404 SEF enabled  */
	var $Enabled = true;

	/* char,  Character to use for url replacement */
	var $replacement = "-";

	/* char,  Character to use for page spacer */
	var $pagerep = "-";

	/* strip these characters */
	var $stripthese = ",|~|!|@|%|^|*|(|)|+|<|>|:|;|{|}|[|]|---|--";

	/* string,  suffix for "files" */
	var $suffix = ".html";

	/* string,  file to display when there is none */
	var $addFile = "index.php";

	/* trims friendly characters from where they shouldn't be */
	var $friendlytrim = "-|.";

	/* string,  page text */
	var $pagetext = "Page_%s";

	/* boolean, convert url to lowercase */
	var $LowerCase = false;

	/* boolean, include the section name in url */
	var $ShowSection = true;

	/* boolean, exclude the category name in url */
	var $ShowCat = false;

	/* boolean, use the title_alias instead of the title */
	var $UseAlias = false;

	/* int, id of #__content item to use for static page */
	var $page404 = 0;

	/* Array, contains predefined components. */
	var $predefined = array(
	   	'com_contact',
	   	'com_frontpage',
	   	'com_login',
	   	'com_newsfeeds',
	   	'com_search',
	   	'com_sef',
	   	'com_weblinks'
	   	);

	/* Array, contains components 404 SEF will ignore. */
	var $skip = array('com_poll');

	/* Array, contains components 404 SEF will not add to the DB.
	 * default style URLs will be generated for these components instead
	 */
	var $nocache = array('com_events');

	function SEF_config() {

	GLOBAL $sef_config_file;
		if (file_exists($sef_config_file)) {
			include($sef_config_file);
		}
		if (isset($Enabled))		$this->Enabled		= $Enabled;
		if (isset($replacement)) 	$this->replacement	= $replacement;
		if (isset($pagerep)) 		$this->pagerep		= $pagerep;
		if (isset($stripthese)) 	$this->stripthese 	= $stripthese;
		if (isset($friendlytrim)) 	$this->friendlytrim	= $friendlytrim;
		if (isset($suffix))			$this->suffix		= $suffix;
		if (isset($addFile)) 		$this->addFile 		= $addFile;
		if (isset($pagetext))		$this->pagetext		= $pagetext;
		if (isset($LowerCase))		$this->LowerCase	= $LowerCase;
		if (isset($ShowSection)) 	$this->ShowSection	= $ShowSection;
		if (isset($HideCat))		$this->HideCat		= $HideCat;
		if (isset($replacement)) 	$this->UseAlias		= $UseAlias;
		if (isset($UseAlias))		$this->page404		= $page404;
		if (isset($predefined))		$this->predefined	= $predefined;
		if (isset($skip))			$this->skip			= $skip;
		if (isset($nocache))		$this->nocache		= $nocache;
		if (isset($ShowCat)) 		$this->ShowCat 		= $ShowCat;
	}

	function saveConfig($return_data=0) {
	GLOBAL $database, $sef_config_file;

		$config_data = '';

		// when the config changes, we automatically purge the cache before we save.
		$query = "DELETE FROM #__redirection WHERE `dateadd` = '0000-00-00'";
		$database->setQuery( $query );
		if (!$database->query()) {
			die( basename(__FILE__)."(line ".__LINE__ .") : ".$database->stderr(1)."<br />");
		}
		//build the data file
		$config_data .= "&lt;?php\n";
		foreach ($this as $key=>$value) {
			if ($key != "0") {
				$config_data .= "\$$key = ";
				switch (gettype($value)) {
					case "boolean":
						$config_data .= ($value ? "true" : "false");
					break;
					case "string":
						$config_data .= "\"".addslashes($value)."\"";
					break;
					case "integer":
					case "double":
						$config_data .= strval($value);
					break;
					case "array";
						$datastring ='';
						foreach($value as $key2=>$data) {
							$datastring .= '"'.addslashes($data).'",';
						}
						$datastring = substr($datastring,0,-1);
						$config_data .= "array($datastring)";
						break;
					default:
						$config_data .= "null";
					break;
				}
			}
			$config_data .= ";\n";
		}
		$config_data .= "?>";

		if ($return_data == 1) {
			return $config_data;
		}else{
			// write to disk
			if (is_writable($sef_config_file)) {
				$trans_tbl = get_html_translation_table(HTML_ENTITIES);
				$trans_tbl = array_flip($trans_tbl);
				$config_data =strtr($config_data, $trans_tbl);
				$fd = fopen($sef_config_file, "w");
				if (fwrite($fd, $config_data, strlen($config_data)) === FALSE) {
       				$ret = 0;
   				}else{
   					$ret = 1;
   				}
				fclose($fd);
			}else{
				$ret = 0;
			}
			return $ret;
		}
	}

	function set($var, $val) {
		if (isset($this->$var)) {
			$this->$var = $val;
			return true;
		}

		return false;
	}
	function version() {
		return $this->$version;
	}
}
// Net/Url.php From the PEAR Library (http://pear.php.net/package/Net_URL)
// +-----------------------------------------------------------------------+
// | Copyright (c) 2002-2004, Richard Heyes                                |
// | All rights reserved.                                                  |
// |                                                                       |
// | Redistribution and use in source and binary forms, with or without    |
// | modification, are permitted provided that the following conditions    |
// | are met:                                                              |
// |                                                                       |
// | o Redistributions of source code must retain the above copyright      |
// |   notice, this list of conditions and the following disclaimer.       |
// | o Redistributions in binary form must reproduce the above copyright   |
// |   notice, this list of conditions and the following disclaimer in the |
// |   documentation and/or other materials provided with the distribution.|
// | o The names of the authors may not be used to endorse or promote      |
// |   products derived from this software without specific prior written  |
// |   permission.                                                         |
// |                                                                       |
// | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |
// | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |
// | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |
// | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |
// | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |
// | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |
// | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
// | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |
// | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |
// | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |
// | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |
// |                                                                       |
// +-----------------------------------------------------------------------+
// | Author: Richard Heyes <richard at php net>                            |
// +-----------------------------------------------------------------------+
//
// $Id: sef.class.php,v 1.5 2005/02/06 16:32:15 marlboroman_2k Exp $
//
// Net_URL Class

class Net_URL
{
    /**
    * Full url
    * @var string
    */
    var $url;

    /**
    * Protocol
    * @var string
    */
    var $protocol;

    /**
    * Username
    * @var string
    */
    var $username;

    /**
    * Password
    * @var string
    */
    var $password;

    /**
    * Host
    * @var string
    */
    var $host;

    /**
    * Port
    * @var integer
    */
    var $port;

    /**
    * Path
    * @var string
    */
    var $path;

    /**
    * Query string
    * @var array
    */
    var $querystring;

    /**
    * Anchor
    * @var string
    */
    var $anchor;

    /**
    * Whether to use []
    * @var bool
    */
    var $useBrackets;

    /**
    * PHP4 Constructor
    *
    * @see __construct()
    */
    function Net_URL($url = null, $useBrackets = true)
    {
        $this->__construct($url, $useBrackets);
    }

    /**
    * PHP5 Constructor
    *
    * Parses the given url and stores the various parts
    * Defaults are used in certain cases
    *
    * @param string $url         Optional URL
    * @param bool   $useBrackets Whether to use square brackets when
    *                            multiple querystrings with the same name
    *                            exist
    */
    function __construct($url = null, $useBrackets = true)
    {
        $HTTP_SERVER_VARS  = !empty($_SERVER) ? $_SERVER : $GLOBALS['HTTP_SERVER_VARS'];

        $this->useBrackets = $useBrackets;
        $this->url         = $url;
        $this->user        = '';
        $this->pass        = '';
        $this->host        = '';
        $this->port        = 80;
        $this->path        = '';
        $this->querystring = array();
        $this->anchor      = '';

        // Only use defaults if not an absolute URL given
        if (!preg_match('/^[a-z0-9]+:\/\//i', $url)) {

            $this->protocol    = (isset ($HTTP_SERVER_VARS['HTTPS']) ?
            						 (@$HTTP_SERVER_VARS['HTTPS'] == 'on' ? 'https' : 'http') : 'http');

            /**
            * Figure out host/port
            */
            if (!empty($HTTP_SERVER_VARS['HTTP_HOST']) AND preg_match('/^(.*)(:([0-9]+))?$/U', $HTTP_SERVER_VARS['HTTP_HOST'], $matches)) {
                $host = $matches[1];
                if (!empty($matches[3])) {
                    $port = $matches[3];
                } else {
                    $port = $this->getStandardPort($this->protocol);
                }
            }

            $this->user        = '';
            $this->pass        = '';
            $this->host        = !empty($host) ? $host : (isset($HTTP_SERVER_VARS['SERVER_NAME']) ? $HTTP_SERVER_VARS['SERVER_NAME'] : 'localhost');
            $this->port        = !empty($port) ? $port : (isset($HTTP_SERVER_VARS['SERVER_PORT']) ? $HTTP_SERVER_VARS['SERVER_PORT'] : $this->getStandardPort($this->protocol));
            $this->path        = !empty($HTTP_SERVER_VARS['PHP_SELF']) ? $HTTP_SERVER_VARS['PHP_SELF'] : '/';
            $this->querystring = isset($HTTP_SERVER_VARS['QUERY_STRING']) ? $this->_parseRawQuerystring($HTTP_SERVER_VARS['QUERY_STRING']) : null;
            $this->anchor      = '';
        }

        // Parse the url and store the various parts
        if (!empty($url)) {
            $urlinfo = parse_url($url);

            // Default querystring
            $this->querystring = array();

            foreach ($urlinfo as $key => $value) {
                switch ($key) {
                    case 'scheme':
                        $this->protocol = $value;
                        $this->port     = $this->getStandardPort($value);
                        break;

                    case 'user':
                    case 'pass':
                    case 'host':
                    case 'port':
                        $this->$key = $value;
                        break;

                    case 'path':
                        if ($value{0} == '/') {
                            $this->path = $value;
                        } else {
                            $path = dirname($this->path) == DIRECTORY_SEPARATOR ? '' : dirname($this->path);
                            $this->path = sprintf('%s/%s', $path, $value);
                        }
                        break;

                    case 'query':
                        $this->querystring = $this->_parseRawQueryString($value);
                        break;

                    case 'fragment':
                        $this->anchor = $value;
                        break;
                }
            }
        }
    }

    /**
    * Returns full url
    *
    * @return string Full url
    * @access public
    */
    function getURL()
    {
        $querystring = $this->getQueryString();

        $this->url = $this->protocol . '://'
                   . $this->user . (!empty($this->pass) ? ':' : '')
                   . $this->pass . (!empty($this->user) ? '@' : '')
                   . $this->host . ($this->port == $this->getStandardPort($this->protocol) ? '' : ':' . $this->port)
                   . $this->path
                   . (!empty($querystring) ? '?' . $querystring : '')
                   . (!empty($this->anchor) ? '#' . $this->anchor : '');

        return $this->url;
    }

    /**
    * Adds a querystring item
    *
    * @param  string $name       Name of item
    * @param  string $value      Value of item
    * @param  bool   $preencoded Whether value is urlencoded or not, default = not
    * @access public
    */
    function addQueryString($name, $value, $preencoded = false)
    {
        if ($preencoded) {
            $this->querystring[$name] = $value;
        } else {
            $this->querystring[$name] = is_array($value) ? array_map('rawurlencode', $value): rawurlencode($value);
        }
    }

    /**
    * Removes a querystring item
    *
    * @param  string $name Name of item
    * @access public
    */
    function removeQueryString($name)
    {
        if (isset($this->querystring[$name])) {
            unset($this->querystring[$name]);
        }
    }

    /**
    * Sets the querystring to literally what you supply
    *
    * @param  string $querystring The querystring data. Should be of the format foo=bar&x=y etc
    * @access public
    */
    function addRawQueryString($querystring)
    {
        $this->querystring = $this->_parseRawQueryString($querystring);
    }

    /**
    * Returns flat querystring
    *
    * @return string Querystring
    * @access public
    */
    function getQueryString()
    {
        if (!empty($this->querystring)) {
            foreach ($this->querystring as $name => $value) {
                if (is_array($value)) {
                    foreach ($value as $k => $v) {
                        $querystring[] = $this->useBrackets ? sprintf('%s[%s]=%s', $name, $k, $v) : ($name . '=' . $v);
                    }
                } elseif (!is_null($value)) {
                    $querystring[] = $name . '=' . $value;
                } else {
                    $querystring[] = $name;
                }
            }
            $querystring = implode(ini_get('arg_separator.output'), $querystring);
        } else {
            $querystring = '';
        }

        return $querystring;
    }

    /**
    * Parses raw querystring and returns an array of it
    *
    * @param  string  $querystring The querystring to parse
    * @return array                An array of the querystring data
    * @access private
    */
    function _parseRawQuerystring($querystring)
    {
        $parts  = preg_split('/[' . preg_quote(ini_get('arg_separator.input'), '/') . ']/', $querystring, -1, PREG_SPLIT_NO_EMPTY);
        $return = array();

        foreach ($parts as $part) {
            if (strpos($part, '=') !== false) {
                $value = substr($part, strpos($part, '=') + 1);
                $key   = substr($part, 0, strpos($part, '='));
            } else {
                $value = null;
                $key   = $part;
            }
            if (substr($key, -2) == '[]') {
                $key = substr($key, 0, -2);
                if (@!is_array($return[$key])) {
                    $return[$key]   = array();
                    $return[$key][] = $value;
                } else {
                    $return[$key][] = $value;
                }
            } elseif (!$this->useBrackets AND !empty($return[$key])) {
                $return[$key]   = (array)$return[$key];
                $return[$key][] = $value;
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
    }

    /**
    * Resolves //, ../ and ./ from a path and returns
    * the result. Eg:
    *
    * /foo/bar/../boo.php    => /foo/boo.php
    * /foo/bar/../../boo.php => /boo.php
    * /foo/bar/.././/boo.php => /foo/boo.php
    *
    * This method can also be called statically.
    *
    * @param  string $url URL path to resolve
    * @return string      The result
    */
    function resolvePath($path)
    {
        $path = explode('/', str_replace('//', '/', $path));

        for ($i=0; $i<count($path); $i++) {
            if ($path[$i] == '.') {
                unset($path[$i]);
                $path = array_values($path);
                $i--;

            } elseif ($path[$i] == '..' AND ($i > 1 OR ($i == 1 AND $path[0] != '') ) ) {
                unset($path[$i]);
                unset($path[$i-1]);
                $path = array_values($path);
                $i -= 2;

            } elseif ($path[$i] == '..' AND $i == 1 AND $path[0] == '') {
                unset($path[$i]);
                $path = array_values($path);
                $i--;

            } else {
                continue;
            }
        }

        return implode('/', $path);
    }

    /**
    * Returns the standard port number for a protocol
    *
    * @param  string  $scheme The protocol to lookup
    * @return integer         Port number or NULL if no scheme matches
    *
    * @author Philippe Jausions <Philippe.Jausions@11abacus.com>
    */
    function getStandardPort($scheme)
    {
        switch (strtolower($scheme)) {
            case 'http':    return 80;
            case 'https':   return 443;
            case 'ftp':     return 21;
            case 'imap':    return 143;
            case 'imaps':   return 993;
            case 'pop3':    return 110;
            case 'pop3s':   return 995;
            default:        return null;
       }
    }

    /**
    * Forces the URL to a particular protocol
    *
    * @param string  $protocol Protocol to force the URL to
    * @param integer $port     Optional port (standard port is used by default)
    */
    function setProtocol($protocol, $port = null)
    {
        $this->protocol = $protocol;
        $this->port = is_null($port) ? $this->getStandardPort() : $port;
    }

}
?>