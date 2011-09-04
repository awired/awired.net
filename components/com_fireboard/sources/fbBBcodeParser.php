<?php
/**
* @version $Id: fbBBcodeParser.php 317 2007-09-05 13:20:40Z danialt $
* Fireboard Component
* @package Fireboard
* @Copyright (C) 2006 - 2007 Best Of Joomla All rights reserved
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.bestofjoomla.com
*/

// Dont allow direct linking
//defined ('_VALID_MOS') or die('Direct Access to this location is not allowed.');

bbcode_filter();
function variable_get($r,$t) {

    return 3;
}
function bbcode_filter( $delta = 0, $format = -1, $text = '') {
      $bbcode_filter = array();
      $bbcode_filter = array(
        '#type' => 'fieldset',
        '#title' => t('BBCode filter'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE);
      $bbcode_filter["bbcode_make_links_$format"] = array(
        '#type' => 'select',
        '#title' => t('Convert addresses to links'),
        '#default_value' => variable_get("bbcode_make_links_$format", 1),
        '#options' => array(t('Disabled'), t('Enabled')),
        '#description' => t('Turn web and e-mail addresses into clickable links. This is useful if content authors do not explicitly mark addresses as links with [url] and [email] tags.'));
      $bbcode_filter["bbcode_encode_mailto_$format"] = array(
        '#type' => 'select',
        '#title' => t('Email address encoding'),
        '#default_value' => variable_get("bbcode_encode_mailto_$format", 1),
        '#options' => array(t('Disabled'), t('Enabled')),
        '#description' => t('Whether to encode email addresses with javascript. With this method you will have clickable mailto links, but it will be a bit harder for spam robots to collect them.'));
      $bbcode_filter["bbcode_paragraph_breaks_$format"] = array(
        '#type' => 'select',
        '#title' => t('Smart paragraph and line breaks'),
        '#default_value' => variable_get("bbcode_paragraph_breaks_$format", 2),
        '#options' => array(t('Disabled'), t('Line breaks only'), t('Line and paragraph breaks')),
        '#description' => t('Add line and paragraph breaks to text, excluding text in preformatted code blocks. If you disable this option, you need to enable Drupal\'s "Line break converter". Don\'t use both together!'));
      $bbcode_filter["bbcode_debug_$format"] = array(
        '#type' => 'select',
        '#title' => t('Print debugging info'),
        '#default_value' => variable_get("bbcode_debug_$format", 0),
        '#options' => array(t('Disabled'), t('Enabled')),
        '#description' => t('Print BBCode parse date and execution time. This option should be disabled on production sites. You may need to clear the cache after changing this option.'));

        $body = '[img]http://localhost/J1.5/images/stories/powered_by.png " onmouseover="alert(\'hello world\')[/img]';

        _bbcode_filter_process($body);
        print ("<pre>");
        print_r($body);
        print ("</pre>");
}

function _bbcode_filter_process(&$body, $format = -1) {

  $quote_text = t('Quote:');
  $quote_user = t('\\1 wrote:');

  // Encode all script tags to prevent XSS html injection attacks
  $body = preg_replace(array('#<script([^>]*)>#i', '#</script([^>]*)>#i'), array('&lt;script\\1&gt;', '&lt;/script\\1&gt;'), $body);

  // Find all [code] tags and check if they contain a newline. If we find a newline,
  // that [code] should be rendered as a block, otherwise it will still be inline
  $mode = variable_get("bbcode_paragraph_breaks_$format", 2);
  $pre = array(); $i = 0;
  if (preg_match_all('#\[code(?::\w+)?\](.*?)\[/code(?::\w+)?\]#si', $body, $code_tags, PREG_SET_ORDER)) {
    foreach ($code_tags as $code_tag) {
      $code_tag[1] = str_replace(array('<', '>'), array('&lt;', '&gt;'), $code_tag[1]);
      if (strpos($code_tag[1], "\n") === FALSE)
        $body = str_replace($code_tag[0], '<code class="bb-code">'. $code_tag[1] .'</code>', $body);
      elseif ($mode) {
        // Strip preformatted code blocks from text during line break processing, replaced below
        $body = str_replace($code_tag[0], "***pRe_sTrInG$i***", $body);
        $pre[$i++] = '<pre class="bb-code-block">'. $code_tag[1] .'</pre>';
      }
      else
        $body = str_replace($code_tag[0], '<pre class="bb-code-block">'. $code_tag[1] .'</pre>', $body);
    }
  }

  // Apply line and paragraph breaks (skipping preformatted code)
  if ($mode) {

    if ($mode == 1)     // Line breaks only (starting with PHP 4.0.5, nl2br() is XHTML compliant)
      $body = nl2br($body);

    if ($mode == 2) {    // Line and paragraph breaks (may not always be XHTML compliant)
      $body  = preg_replace("/(\r\n|\n|\r)/", "\n", $body);
      $body  = preg_replace("/\n\n+/", "\n\n", $body);
      $parts = explode("\n\n", $body);
      for ($i=0; $i<sizeof($parts); $i++) {
         // No linebreaks if paragraph starts with an HTML tag
         if ( !preg_match('/^<.*>/', $parts[$i]) )
           $parts[$i] = nl2br($parts[$i]);

         // Some tags should not be in paragraph blocks
         if ( !preg_match('/^(?:<|\[)(?:table|list|ol|ul|pre|select|form|blockquote|hr)/i', $parts[$i]) )
           $parts[$i] = '<p>'. $parts[$i] .'</p>';
      }
      $body = implode("\n\n", $parts);
    }

    // Reinsert preformatted code blocks
    foreach ($pre as $i => $code_tag)
       $body = str_replace("***pRe_sTrInG$i***", $code_tag, $body);
  }

  // Add closing tags to prevent users from disruping your site's HTML
  // (required for nestable tags only: [list] and [quote])
  preg_match_all('/\[quote/i', $body, $matches);
  $opentags = count($matches['0']);
  preg_match_all('/\[\/quote\]/i', $body, $matches);
  $unclosed = $opentags - count($matches['0']);
  for ($i = 0; $i < $unclosed; $i++)
     $body .= '[/quote]';
  preg_match_all('/\[list/i', $body, $matches);
  $opentags = count($matches['0']);
  preg_match_all('/\[\/list\]/i', $body, $matches);
  $unclosed = $opentags - count($matches['0']);
  for ($i = 0; $i < $unclosed; $i++)
     $body .= '[/list]';

  // Define BBCode tags
  $preg = array(
    // Implement [notag]
    '#\[notag(?::\w+)?\](.*?)\[/notag(?::\w+)?\]#sie'        => '_bbcode_notag_tag(\'\\1\')',

    // Headings and indexes - articles will almost always need them
    '#\[h([1-6])(?::\w+)?\](.*?)\[/h[1-6](?::\w+)?\]#sie'    => '_bbcode_generate_heading(\\1, \'\\2\')',
    '#\[index\s*/?\]#sie'                                    => '_bbcode_generate_index($body)',
    '#\[index style=(ol|ul)\]#sie'                           => '_bbcode_generate_index($body, \'\\1\')',

    // Font, text and alignment
    '#\[color=([\#\w]+)(?::\w+)?\](.*?)\[/color(?::\w+)?\]#si' => '<span style="color:\\1">\\2</span>',
    '#\[size=(\d+)(?::\w+)?\](.*?)\[/size(?::\w+)?\]#sie'    => '_bbcode_size_tag(\\1, \'\\2\')',
    '#\[font=([\w\s]+)(?::\w+)?\](.*?)\[/font(?::\w+)?\]#si' => '<span style="font-family:\\1">\\2</span>',
    '#\[align=(\w+)(?::\w+)?\](.*?)\[/align(?::\w+)?\]#si'   => '<span style="text-align:\\1">\\2</span>',
    '#\[float=(left|right)(?::\w+)?\](.*?)\[/float(?::\w+)?\]#si' => '<span style="float:\\1">\\2</span>',
    '#\[justify(?::\w+)?\](.*?)\[/justify(?::\w+)?\]#si'     => '<div style="text-align:justify;">\\1</div>',
    '#\[(b|strong)(?::\w+)?\](.*?)\[/(b|strong)(?::\w+)?\]#si' => '<span style="font-weight:bold">\\2</span>',
    '#\[(i|em)(?::\w+)?\](.*?)\[/(i|em)(?::\w+)?\]#si'       => '<span style="font-style:italic">\\2</span>',
    '#\[u(?::\w+)?\](.*?)\[/u(?::\w+)?\]#si'                 => '<span style="text-decoration:underline">\\1</span>',
    '#\[s(?::\w+)?\](.*?)\[/s(?::\w+)?\]#si'                 => '<s>\\1</s>',
    '#\[sup(?::\w+)?\](.*?)\[/sup(?::\w+)?\]#si'             => '<sup>\\1</sup>',
    '#\[sub(?::\w+)?\](.*?)\[/sub(?::\w+)?\]#si'             => '<sub>\\1</sub>',
    '#\[center(?::\w+)?\](.*?)\[/center(?::\w+)?\]#si'       => '<div style="text-align:center">\\1</div>',
    '#\[left(?::\w+)?\](.*?)\[/left(?::\w+)?\]#si'           => '<div style="text-align:left">\\1</div>',
    '#\[right(?::\w+)?\](.*?)\[/right(?::\w+)?\]#si'         => '<div style="text-align:right">\\1</div>',

    // Links without a protocol, with a protocol, and with good looking text
    '#\[url(?::\w+)?\]www\.([\w:;&,%+~!=@\/\.\-\#\?]+?)\[/url(?::\w+)?\]#si' => '<a href="http://www.\\1" class="bb-url">\\1</a>',
    '#\[url(?::\w+)?\]([\w:;&,%+~!=@\/\.\-\#\?]+?)\[/url(?::\w+)?\]#si'   => '<a href="\\1" class="bb-url">\\1</a>',
    '#\[url=www\.([\w:;&,%+~!=@\/\.\-\#\?]+?)\](.*?)\[/url(?::\w+)?\]#si' => '<a href="http://www.\\1" class="bb-url">\\2</a>',
    '#\[url=([\w:;&,%+~!=@\/\.\-\#\?]+?)\](.*?)\[/url(?::\w+)?\]#si'      => '<a href="\\1" class="bb-url">\\2</a>',

    // Anchor tags for linking within documents
    '#\[anchor=(\w+)(?::\w+)?\](.*?)\[/anchor(?::\w+)?\]#si' => '<a name="\\1">\\2</a>',

    // Images without or with client-side sizing
    '#\[img(?::\w+)?\]([\w:;&,~%+!=@\/\.\-\#\?]+)\[/img(?::\w+)?\]#si' => '<img src="\\1" alt="" class="bb-image" />',
    '#\[img=(\d+)x(\d+)(?::\w+)?\]([\w:;&,~%+!=@\/\.\-\#\?]+)\[/img(?::\w+)?\]#si' => '<img width="\\1" height="\\2" alt="" src="\\3" class="bb-image" />',
    '#\[img=([\w\s:;,\.\-\'\(\)]+)(?::\w+)?\]([\w:;&,~%+!=@\/\.\-\#\?]+)\[/img(?::\w+)?\]#si' => '<img alt="\\1" src="\\2" class="bb-image" />',
    '#\[img align=(left|right|center)(?::\w+)?\]([\w:;&,~%+!=@\/\.\-\#\?]+)\[/img(?::\w+)?\]#si' => '<img src="\\2" alt="" align="\\1" class="bb-image" />',

    // Flash animations and other special effects
    '#\[flash=(\d+)x(\d+)(?::\w+)?\]([\w:;&,~%+!=@\/\.\-\#\?]+)\[/flash(?::\w+)?\]#si' => '<object type="application/x-shockwave-flash" data="\\3" width="\\1" height="\\2"><param name="movie" value="\\3" /></object>',
    '#\[move(?::\w+)?\](.*?)\[/move(?::\w+)?\]#si'           => '<marquee>\\1</marquee>',

    // Acronyms & abbreviations - show description when mouse moves over tag
    '#\[acronym=([\w\s-,\.]+)(?::\w+)?\](.*?)\[/acronym(?::\w+)?\]#si' => '<acronym title="\\1">\\2</acronym>',
    '#\[abbr=([\w\s-,\.]+)(?::\w+)?\](.*?)\[/abbr(?::\w+)?\]#si'       => '<abbr title="\\1">\\2</abbr>',

    // Quoting with or without specifying the source
    '#\[quote(?::\w+)?\]#i'                                    => '<div class="bb-quote">'.$quote_text.'<blockquote class="bb-quote-body">',
    '#\[quote=(?:&quot;|"|\')?(.*?)["\']?(?:&quot;|"|\')?\]#i' => '<div class="bb-quote"><b>'.$quote_user.'</b><blockquote class="bb-quote-body">',
    '#\[/quote(?::\w+)?\]#si'                                  => '</blockquote></div>',

    // PHP code blocks (syntax highlighted)
    '#\[php(?::\w+)?\](?:[\r\n])*(.*?)\[/php(?::\w+)?\]#sie' => '_bbcode_php_tag(\'\\1\')',

    // Links to popular sites
    '#\[google(?::\w+)?\]([\w\s-]+?)\[/google(?::\w+)?\]#si'       => '<a href="http://www.google.com/search?q=\\1">\\1</a>',
    '#\[wikipedia(?::\w+)?\]([\w\s-]+?)\[/wikipedia(?::\w+)?\]#si' => '<a href="http://www.wikipedia.org/wiki/\\1">\\1</a>',

    // Different kinds of lists and list items
    '#\[\*(?::\w+)?\](.+)(?=\[\*(?::\w+)?\]|\[/list)#Usi'   => '<li>\\1',
    '#\[list(?::\w+)?\]#si'                                 => '<ol class="bb-list" style="list-style-type:circle;">',
    '#\[list=c(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:circle;">',
    '#\[list=d(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:disc;">',
    '#\[list=s(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:square;">',
    '#\[list=1(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:decimal;">',
    '#\[list=i(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:lower-roman;">',
    '#\[list=I(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:upper-roman;">',
    '#\[list=a(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:upper-alpha;">',
    '#\[list=A(?::\w+)?\]#si'                               => '<ol class="bb-list" style="list-style-type:upper-alpha;">',
    '#\[/list(?::\w+)?\]#si'                                => '</ol>',

    // Clean up list output and add closing </li> tags
    '#(?=<li>|</ol>)#si'                                    => '</li>\\1',
    '#<br />(\s+)</li>#si'                                  => '</li>\\1',
    '#<ol(.*?)>(?:.*?)<li(.*?)>#si'                         => '<ol\\1><li\\2>',

    // Table tags
    '#\[table\](.+?)\[/table\]#si'                           => '<table border>\\1</table>',
    '#\[(row|r|tr)\](.+?)\[/(row|r|tr)\]#si'                 => '<tr>\\2</tr>',
    '#\[(row|r|tr) color=([\#\w]+)\](.+?)\[/(row|r|tr)\]#si' => '<tr bgcolor=\\2>\\3</tr>',
    '#\[(header|head|h)\](.+?)\[/(header|head|h)\]#si'       => '<th>\\2</th>',
    '#\[(col|c|td)\](.+?)\[/(col|c|td)\]#si'                 => '<td valign="top">\\2</td>',

    // Cleanup table output (td, th and tr tags)
    '#<([\/]?)t([dhr])><br />#si'                           => '<\\1t\\2>',
    '#<table(.+?)><br />#si'                                => '<table\\1>',
  );
  $body = preg_replace(array_keys($preg), array_values($preg), $body);

  // Simple replacements (str_replace is faster than preg_replace)
  $str = array(
    // Horizontal delimiter
    '[hr]'   => '<hr class="bb-hr" />',
    // Force line break
    '[br]'   => '<br class="bb-br" />',
    // Force space
    '[sp]'   => '&nbsp;',
  );
  $body = str_replace(array_keys($str), array_values($str), $body);

  // We cannot evaluate the variable in callback function because
  // there is no way to pass the $format variable
  if (variable_get("bbcode_encode_mailto_$format", 1)) {
    // Replacing email addresses with encoded html
    $body = preg_replace_callback('#\[email(?::\w+)?\]([\w\.\-\+~@]+)\[/email(?::\w+)?\]#si', '_bbcode_encode_mailto', $body);
    $body = preg_replace_callback('#\[email=(.*?)(?::\w+)?\](.*?)\[/email(?::\w+)?\]#si', '_bbcode_encode_mailto', $body);
  }
  else {
    $body = preg_replace(
      array('#\[email(?::\w+)?\](.*?)\[/email(?::\w+)?\]#si','#\[email=(.*?)(?::\w+)?\]([\w\s]+)\[/email(?::\w+)?\]#si'),
      array('<a href="mailto:\\1" class="bb-email">\\1</a>', '<a href="mailto:\\1" class="bb-email">\\2</a>'),
      $body);
  }

  // Turns web and e-mail addresses into clickable links
  if (variable_get("bbcode_make_links_$format", 1)) {

    // pad with a space so we can match things at the start of the 1st line
    $ret = ' ' . $body;

    // matches an "xxx://yyyy" URL at the start of a line, or after a space.
    // xxxx can only be alpha characters.
    // yyyy is anything up to the first space, newline, comma, double quote or <
    $ret = preg_replace('#(?<=^|[\t\r\n >\(\[\]\|])([a-z]+?://[\w\-]+\.([\w\-]+\.)*\w+(:[0-9]+)?(/[^ "\'\(\n\r\t<\)\[\]\|]*)?)((?<![,\.])|(?!\s))#i', '<a href="\1">\1</a>', $ret);

    // matches a "www|ftp.xxxx.yyyy[/zzzz]" kinda lazy URL thing
    // Must contain at least 2 dots. xxxx contains either alphanum, or "-"
    // zzzz is optional.. will contain everything up to the first space, newline,
    // comma, double quote or <.
     $ret = preg_replace('#([\t\r\n >\(\[\|])(www|ftp)\.(([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\'\(\n\r\t<\)\[\]\|]*)?)#i', '\1<a href="http://\2.\3">\2.\3</a>', $ret);

    // matches an email@domain type address at the start of a line, or after a space.
    // Note: Only the followed chars are valid; alphanums, "-", "_" and or ".".
    if (variable_get("bbcode_encode_mailto_$format", 1))
      $ret = preg_replace_callback("#([\t\r\n ])([a-z0-9\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", '_bbcode_encode_mailto', $ret);
    else
      $ret = preg_replace('#([\t\r\n ])([a-z0-9\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i', '\\1<a href="mailto:\\2@\\3">\\2@\\3</a>', $ret);

    // Remove our padding
    $body = substr($ret, 1);
  }

  return $body;
}

function _bbcode_generate_heading($level, $text) {
  $anchor = preg_replace('/([\s]+)/', '_', $text);
  $anchor = preg_replace('/([\W]+)/', '',  $anchor);
  return '<a name="'. $anchor .'"><h'. $level .'>'. $text .'</h'. $level .'></a>';
}

function _bbcode_generate_index($body, $tag = 'ol') {
  $level = 0;
  $index = '<'. $tag .">\n";
  $close_tags = 0;

  if (preg_match_all('#\[h([1-6]).*?\](.*?)\[/h([1-6]).*?\]#si', $body, $head_tags, PREG_SET_ORDER)) {
    foreach ($head_tags as $head_tag) {
      if ($level == 0) $level = $head_tag[1];
      $anchor = preg_replace('/([\s]+)/', '_', $head_tag[2]);
      $anchor = preg_replace('/([\W]+)/', '',  $anchor);

      if ($head_tag[1] > $level) {
        $index .= '<'. $tag .">\n";
        $index .= '<li><a href="#'. $anchor .'">'. $head_tag[2] ."</a>\n";
        $close_tags++;
        $level = $head_tag[1];
      } else if ($head_tag[1] < $level) {
        while ($close_tags > 0) {
           $index .= '</'. $tag .">\n";
           $close_tags--;
        }
        $index .= '<li><a href="#'. $anchor .'">'. $head_tag[2] ."</a>\n";
        $level = $head_tag[1];
      } else {
        $index .= '<li><a href="#'. $anchor .'">'. $head_tag[2] ."</a>\n";
        $level = $head_tag[1];
      }
    }
  }
  while ($close_tags >= 0) {
    $index .= '</'. $tag .">\n";
    $close_tags--;
  }
  return $index;
}

function _bbcode_encode_mailto($matches) {
  if (isset($matches[3]))
    $link = 'document.write(\'<a href="mailto:' . $matches[2].'@'.$matches[3] . '">' . $matches[2].'@'.$matches[3] . '</a>\');';
  else
    $link = 'document.write(\'<a href="mailto:' . $matches[1] . '" class="bb-email">' . (isset($matches[2]) ? $matches[2] : $matches[1]) . '</a>\');';

  $js_encode = '';
  for ($x = 0; $x < strlen($link); $x++)
    $js_encode .= '%' . bin2hex($link{$x});

  $link = '<script type="text/javascript">eval(unescape(\''.$js_encode.'\'))</script>';
  if (isset($matches[3]))
    $link = $matches[1] . $link;

  return $link;
}

function _bbcode_size_tag($size = NULL, $text = NULL) {
  $size = intval($size);
  if ($size < 6)
    $size = 6;
  if ($size > 48)
    $size = 48;
  return '<span style="font-size:'.$size.'px">'.stripslashes($text).'</span>';
}

function _bbcode_notag_tag($text = NULL) {
  return str_replace( array('[', ']', '@'), array('&#91;', '&#93;', '&#64;'), stripslashes($text));
}

function _bbcode_php_tag($text = NULL) {
  return '<pre>'. highlight_string( str_replace('<br />', '', stripslashes($text)), true) .'</pre>';
}

function t($string, $args = 0) {
  global $locale;
  if (!$args) {
    return $string;
  }
  else {
    return strtr($string, $args);
  }
}
?>