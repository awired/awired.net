<?php
/* This file is part of BBClone (The PHP web counter on steroids)
 *
 * $Header: /cvs/bbclone/lib/os.php,v 1.46 2004/10/17 01:37:35 olliver Exp $
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

$os = array(
  "aix"=> array(
    "icon"=> "aix",
    "title" => "AIX",
    "rule" => array(
      "aix" => ""
    )
  ),
  "amiga" => array(
    "icon" => "amiga",
    "title" => "AmigaOS",
    "rule" => array(
      "Amiga[ ]?OS[ /]([0-9.]{1,10})" => "\\1",
      "amiga" => ""
    )
  ),
  "atheos" => array(
    "icon" => "atheos",
    "title" => "AtheOS",
    "rule" => array(
      "atheos" => ""
    )
  ),
  "beos" => array(
    "icon" => "be",
    "title" => "BeOS",
    "rule" => array(
      "beos[ a-z]*([0-9.]{1,10})" => "\\1",
      "beos" => ""
    )
  ),
  "darwin" => array(
    "icon" => "darwin",
    "title" => "Darwin",
    "rule" => array(
      "Darwin[ ]?([0-9.]{1,10})" => "\\1",
      "Darwin" => ""
    )
  ),
  "digital" => array(
    "icon" => "digital",
    "title" => "Digital",
    "rule" => array(
      "OSF[0-9][ ]?V(4[0-9.]{1,10})" => "\\1"
    )
  ),
  "freebsd" => array(
    "icon" => "freebsd",
    "title" => "FreeBSD",
    "rule" => array(
     "free[ \-]?bsd[ /]([a-z0-9.]{1,10})" => "\\1",
     "free[ \-]?bsd" => ""
    )
  ),
  "hpux" => array(
    "icon" => "hp",
    "title" => "HPUX",
    "rule" => array(
      "hp[ \-]?ux[ /]([a-z0-9.]{1,10})" => "\\1"
    )
  ),
  "irix" => array(
    "icon" => "irix",
    "title" => "IRIX",
    "rule" => array(
      "irix[0-9]*[ /]([0-9.]{1,10})" => "\\1",
      "irix" => ""
    )
  ),
  "linux" => array(
    "icon" => "linux",
    "title" => "Linux",
    "rule" => array(
      "mdk for ([0-9.]{1,10})" => "MDK \\1",
      "linux[ /\-]([a-z0-9.]{1,10})" => "\\1",
      "linux" => ""
    )
  ),
  "macosx" => array(
    "icon" => "macosx",
    "title" => "MacOS X",
    "rule" => array(
      "Mac[ ]?OS[ ]?X" => ""
    )
  ),
  "macppc" => array(
    "icon" => "macppc",
    "title" => "MacOS PPC",
    "rule" => array(
      "Mac(_Power|intosh.+P)PC" => ""
    )
  ),
  "netbsd" => array(
    "icon" => "netbsd",
    "title" => "NetBSD",
    "rule" => array(
      "net[ \-]?bsd[ /]([a-z0-9.]{1,10})" => "\\1",
      "net[ \-]?bsd" => ""
    )
  ),
  "os2" => array(
    "icon" => "os2",
    "title" => "OS/2 Warp",
    "rule" => array(
      "warp[ /]?([0-9.]{1,10})" => "\\1",
      "os[ /]?2" => ""
    )
  ),
  "openbsd" => array(
    "icon" => "openbsd",
    "title" => "OpenBSD",
    "rule" => array(
      "open[ \-]?bsd[ /]([a-z0-9.]{1,10})" => "\\1",
      "open[ \-]?bsd" => ""
    )
  ),
  "openvms" => array(
    "icon" => "openvms",
    "title" => "OpenVMS",
    "rule" => array(
      "Open[ \-]?VMS[ /]([a-z0-9.]{1,10})" => "\\1",
      "Open[ \-]?VMS" => ""
    )
  ),
  "palm" => array(
    "icon" => "palm",
    "title" => "PalmOS",
    "rule" => array(
      "Palm[ \-]?(Source|OS)[ /]?([0-9.]{1,10})" => "\\2",
      "Palm[ \-]?(Source|OS)" => ""
    )
  ),
  "photon" => array(
    "icon" => "qnx",
    "title" => "QNX Photon",
    "rule" => array(
      "photon" => ""
    )
  ),
  "risc" => array(
    "icon" => "risc",
    "title" => "RiscOS",
    "rule" => array(
      "risc[ \-]?os[ /]?([0-9.]{1,10})" => "\\1",
      "risc[ \-]?os" => ""
    )
  ),
  "sun" => array(
    "icon" => "sun",
    "title" => "SunOS",
    "rule" => array(
      "sun[ \-]?os[ /]?([0-9.]{1,10})" => "\\1",
      "sun[ \-]?os" => ""
    )
  ),
  "symbian" => array(
    "icon"  => "symbian",
    "title" => "Symbian OS",
    "rule"  => array(
      "Symbian" => ""
    )
  ),
  "tru64" => array(
    "icon" => "tru64",
    "title" => "Tru64",
    "rule" => array(
      "OSF[0-9][ ]?V(5[0-9.]{1,10})" => "\\1"
    )
  ),
  "unixware" => array(
    "icon" => "sco",
    "title" => "UnixWare",
    "rule" => array(
      "unixware[ /]?([0-9.]{1,10})" => "\\1",
      "unixware" => ""
    )
  ),
  "windows2003" => array(
    "icon" => "windowsxp",
    "title" => "Windows 2003",
    "rule" => array(
      "wi(n|ndows)[ \-]?(2003|nt[ /]?5\.2)" => ""
    )
  ),
  "windows2k" => array(
    "icon" => "windows",
    "title" => "Windows 2000",
    "rule" => array(
      "wi(n|ndows)[ \-]?(2000|nt[ /]?5\.0)" => ""
    )
  ),
  "windows95" => array(
    "icon" => "windows",
    "title" => "Windows 95",
    "rule" => array(
      "wi(n|ndows)[ \-]?95" => ""
    )
  ),
  "windowsce" => array(
    "icon" => "windows",
    "title" => "Windows CE",
    "rule" => array(
      "wi(n|ndows)[ \-]?ce" => ""
    )
  ),
  "windowsme" => array(
    "icon" => "windows",
    "title" => "Windows ME",
    "rule" => array(
      "win 9x 4\.90" => "",
      "wi(n|ndows)[ \-]?me" => ""
    )
  ),
  "windowsxp" => array(
    "icon" => "windowsxp",
    "title" => "Windows XP",
    "rule" => array(
      "Windows XP" => "",
      "wi(n|ndows)[ \-]?nt[ /]?5\.1" => ""
    )
  ),
// The following ones are catch ups, they got to stay here.
  "bsd" => array(
    "icon" => "bsd",
    "title" => "BSD",
    "rule" => array(
      "bsd" => ""
    )
  ),
  "mac" => array(
    "icon" => "mac",
    "title" => "MacOS",
    "rule" => array(
      "mac[^hk]" => ""
    )
  ),
  "windowsnt" => array(
    "icon" => "windows",
    "title" => "Windows NT",
    "rule" => array(
      "wi(n|ndows)[ \-]?nt[ /]?([0-4][0-9.]{1,10})" => "\\2",
      "wi(n|ndows)[ \-]?nt" => ""
    )
  ),
  "windows98" => array(
    "icon" => "windows",
    "title" => "Windows 98",
    "rule" => array(
      "wi(n|ndows)[ \-]?98" => ""
    )
  ),
  "windows" => array(
    "icon" => "windows",
    "title" => "Windows",
    "rule" => array(
      "wi(n|n32|ndows)" => ""
    )
  ),
// things we don't know by now
  "other" => array(
    "icon" => "question",
    "title" => "other",
    "rule" => array(
      ".*" => ""
    )
  )
);
?>