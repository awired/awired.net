<!--projekt www.templatki.com -->
<?php defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' ); // needed to seperate the ISO number from the language file constant _ISO $iso = explode( '=', _ISO ); // xml prolog echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php mosShowHead(); ?>
<?php if ( $my->id ) {
initEditor();
}
$collspan_offset = ( mosCountModules( 'right' ) + mosCountModules( 'user2' ) ) ? 2 : 1;
//script to determine which div setup for layout to use based on module configuration
$user1 = 0;
$user2 = 0;
$colspan = 0;
$right = 0;
// banner combos
//user1 combos
if ( mosCountModules( 'user1' ) + mosCountModules( 'user2' ) == 2) {
$user1 = 2;
$user2 = 2;
$colspan = 3;
} elseif ( mosCountModules( 'user1' ) == 1 ) {
$user1 = 1;
$colspan = 1;
} elseif ( mosCountModules( 'user2' ) == 1 ) {
$user2 = 1;
$colspan = 1;
}
//right based combos
if ( mosCountModules( 'right' ) and ( empty( $_REQUEST['task'] ) || $_REQUEST['task'] != 'edit' ) ) {
$right = 1;
} 
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<link href="<?php echo $mosConfig_live_site;?>/templates/eco_templates/css/template_css.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
<!-- body { margin-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; style="padding:0px; margin:0px;" } .style1 {color: #FFFFFF}
-->
</style>
<link href="css/template_css.css" rel="stylesheet" type="text/css" />
</head>
 <body>
 <div align="center">
 <table width="770" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"">
 <tbody><tr>
 <td width="100%">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr>
 <td width="780" valign="bottom" class="naglowek"><table width="780" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <th height="200" valign="bottom" scope="col"><table width="780" height="36" border="0" cellpadding="0" cellspacing="0">
       <tr>
         <th width="363" scope="col">&nbsp;</th>
         <th colspan="2" scope="col"><div align="left" class="moduletable"></span></div>           </th>
       </tr>
       <tr>
         <th scope="col">&nbsp;</th>
         <th width="113" scope="col"><div align="left"></div></th>
         <th width="304" scope="col"><div align="center"><span class="nazwastrony"><?php echo $GLOBALS[mosConfig_sitename]?></span></div></th>
       </tr>
       <tr>
         <th scope="col">&nbsp;</th>
         <th colspan="2" scope="col">&nbsp;</th>
       </tr>
       <tr>
         <th scope="col">&nbsp;</th>
         <th colspan="2" scope="col">&nbsp;</th>
       </tr>
       <tr>
         <th scope="col">&nbsp;</th>
         <th colspan="2" scope="col"><div align="left">
           <?php mospathway() ?>
         </a></span></div></th>
       </tr>
       <tr>
         <th scope="col">&nbsp;</th>
         <th colspan="2" valign="middle" scope="col"><div align="left"></div></th>
       </tr>
     </table></th>
   </tr>
 </table></td>
 </tr>
 </tbody></table>
 </td>
 </tr>
 <tr>
 <td class="maincontainer" valign="top"> <table border="0" cellpadding="0" cellspacing="5" width="100%">
 <!--DWLayoutTable-->
 <tbody><tr>
 <td width="584" height="43" valign="top"><div class="maincontainer">
 <span class="small"> <?php mosLoadModules ( 'top' ); ?> </span> 
 <?php mosMainBody(); ?>
 </div></td>
 <td width="171" valign="top" class="rightmodulecontainer"><?php mosLoadModules ( 'left' ); ?>
 <?php mosLoadModules ( 'right' ); ?></td> 
 </tr>
 </tbody></table>
 </td>
 </tr>
 <tr height="20">
 <td width="100%" align="center" valign="middle"><div align="center">
   <div align="right">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <th scope="col"><div align="right"><a href="http://www.templatki.com" target="_blank" class="footer"><span class="moduletable">
           <?php mosLoadModules ( 'user3' ); ?>
         </span></a></div></th>
       </tr>
     </table>
   </div>
 </div></td>
 </tr>
 </tbody>
 </table>
 <?php mosLoadModules( 'debug', -1 );?>
 </div>
 </body></html>
