<?php
/**
* AkoComment - A User Comments Component
* @version 2.0
* @package AkoComment
* Tweaked version Modified by Artistworks.net
* @copyright (C) 2004 by Arthur Konze - All rights reserved!
* @license http://www.konze.de/content/view/8/26/ Copyrighted Commercial Software
**/

/**
*
* AkoComment Tweaked Special Edition - by visualclinic.fr
* ADD : 
* - RSS on comments
* - Quote this article by copy/paste code
* - some features for layout
* - Favoured
* 
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_comment {

  function showAbout() {
  ?>
      <table cellpadding="4" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="100%">
          <img src="components/com_akocomment/images/logo.png">
        </td>
      </tr>
      <tr>
        <td>
          <p><b>Program</b><br>
          AkoComment lets your users comment on content items. It supports BBCode and Smilies,
          which gives you simple formating options. AkoComment comes with language pack support
          and can easily be changed to your language through the build-in editor. If you have
          any wishes or have found a bug, please contact the author by mail:
          <a href="mailto:webmaster@mamboportal.com">webmaster@mamboportal.com</a></p>
          <p><b>Author</b><br>
          Arthur Konze is one of the early eighties home computer hackers. He started with
          assembler coding on homecomputers like the Apple 2 and the Commodore C16. A few
          years later he get in touch with modem based computer networks like fido. He
          started with Internet in 1989 and concentrated on webdesign after the boom years.
          Currently he is the publisher of Mamboportal.com, which is one of the biggest
          MOS communities worldwide.</p>
          <p><b>Warranty</b><br>
          This program is distributed in the hope that it will be useful, but WITHOUT ANY
          WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
          PARTICULAR PURPOSE.<P>
        </td>
      </tr>
      </table>
  <?php
    }

############################################################################

  function showComments( $option, &$rows, &$search, &$pageNav ) {
    global $mosConfig_live_site; //mod fonny

    $commentlenght = "40";

    # Table header
    ?>
    <form action="index2.php" method="post" name="adminForm">
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%">
        <img src="components/com_akocomment/images/logo.png">
      </td>
      <td nowrap="nowrap">Display #</td>
      <td>
        <?php echo $pageNav->writeLimitBox(); ?>
      </td>
      <td>Search:</td>
      <td>
        <input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />
      </td>
    </tr>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
      <tr>
        <th width="2%" class="title"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
        <th class="title"><div align="left">Author</div></th>
        <th class="title"><div align="left">Comment</div></th>
        <th class="title"><div align="center">Date</div></th>
        <th class="title"><div align="center">ip</div></th>
        <th class="title"><div align="center">Content Item</div></th>
        <th class="title"><div align="center">Published</div></th>
      </tr>
      <?php
    $k = 0;
    for ($i=0, $n=count( $rows ); $i < $n; $i++) {
      $row = &$rows[$i];
      echo "<tr class='row$k'>";
      echo "<td width='2%'><input type='checkbox' id='cb$i' name='cid[]' value='$row->id' onclick='isChecked(this.checked);' /></td>";
      echo "<td align='left'><a href=\"index2.php?option=".$option."&task=edit&cid[]=".$row->id."\">$row->name</a></td>";
      if(strlen($row->comment) > $commentlenght) {
        $row->comment  = substr($row->comment,0,$entrylenght-3);
        $row->comment .= "...";
      }
      echo "<td align='left'>$row->comment</td>";
      echo "<td align='center'>$row->date</td>";
      echo "<td align='center'>$row->ip</td>"; // Included by Artistworks.net
#      echo "<td align='center'>$row->contentid</td>";
      echo "<td align='center'><a href=\"".$mosConfig_live_site."/index.php?option=com_content&task=view&id=".$row->contentid."&Itemid=1\" target=\"_blank\">$row->contentid</a></td>"; //mod fonny

      $task = $row->published ? 'unpublish' : 'publish';
      $img = $row->published ? 'publish_g.png' : 'publish_x.png';
      ?>
        <td width="10%" align="center"><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></a></td>
    </tr>
    <?php    $k = 1 - $k; } ?>
    <tr>
      <th align="center" colspan="7">
        <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="center" colspan="7">
        <?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
  </table>
  <input type="hidden" name="option" value="<?php echo $option;?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  </form>
  <?php
  }

############################################################################

  function editComment( $option, &$row, &$clist, &$olist, &$puplist ) {
    mosMakeHtmlSafe( $row, ENT_QUOTES, 'comment' );
    ?>
    <script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
      var form = document.adminForm;
      if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
      }

      // do field validation
      if (form.comment.value == ""){
        alert( "You must at least write the comment text." );
      } else if (form.contentid.value == "0"){
        alert( "You must select a corresponding content item." );
      } else if (form.name.value == ""){
        alert( "You must enter the author's name." );
      } else {
        submitform( pressbutton );
      }
    }
    </script>
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%"><span class="sectionname"><?php echo $row->id ? 'Edit' : 'Add';?> Comment</span></td>
    </tr>
  </table>
    <table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">
    <form action="index2.php" method="post" name="adminForm" id="adminForm">
      <tr>
        <td width="20%" align="right">Name:</td>
        <td width="80%">
          <input class="inputbox" type="text" name="name" size="50" maxlength="30" value="<?php echo $row->name;?>" />
        </td>
      </tr>

      <tr>
        <td valign="top" align="right">Content Item:</td>
        <td>
          <?php echo $clist; ?>
        </td>
      </tr>

      <tr>
        <td valign="top" align="right">Title:</td>
        <td>
          <input class="inputbox" type="text" name="title" value="<?php echo $row->title; ?>" size="50" maxlength="50" />
        </td>
      </tr>

      <tr>
        <td valign="top" align="right">Comment:</td>
        <td>
          <textarea class="inputbox" cols="50" rows="5" name="comment"><?php echo $row->comment;?></textarea>
        </td>
      </tr>

      <tr>
        <td valign="top" align="right">Ordering:</td>
        <td>
          <?php echo $olist; ?>
        </td>
      </tr>


      <tr>
        <td valign="top" align="right">Published:</td>
        <td>
          <?php echo $puplist; ?>
        </td>
      </tr>

    </table>

    <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
    <input type="hidden" name="option" value="<?php echo $option;?>" />
    <input type="hidden" name="task" value="" />
    </form>
  <?php
  }

############################################################################

  function showFile($file, $option) {
    $file = stripslashes($file);
    $f=fopen($file,"r");
    $content = fread($f, filesize($file));
    $content = htmlspecialchars($content);
    ?>
    <form action="index2.php?" method="post" name="adminForm" class="adminForm" id="adminForm">
    <table cellpadding="4" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="100%">
          <img src="components/com_akocomment/images/logo.png">
        </td>
      </tr>
    </table>
    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
       <tr>
         <th colspan="4">Path: <?php echo $file; ?></td> </tr>
       <tr>
         <td> <textarea cols="80" rows="20" name="filecontent" id="filecontent"><?php echo $content; ?></textarea>
         </td>
       </tr>
       <tr>
         <td class="error">Please note: The file must be writable to save your changes.</td>
       </tr>
    </table>
    <input type="hidden" name="file" value="<?php echo $file; ?>" />
    <input type="hidden" name="option" value="<?php echo $option; ?>">
    <input type="hidden" name="task" value="">
    <input type="hidden" name="boxchecked" value="0">
    </form>
    <?php
  }

}
?>