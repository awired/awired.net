<?php
/**
* @version $Id: 404SEF_cpanel.php,v 1.3 2005/01/29 18:34:54 marlboroman_2k Exp $
* @package Mambo_4.5
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
?>
<table class="adminform">
   <tr>
      <td width="50%" valign="top">
         <table width="100%">
         <tr>
            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=showconfig" style="text-decoration:none;" title="<?php echo _COM_SEF_CONFIGDESC;?>">
            <img src="components/com_sef/images/config.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_CONFIG;?>
            </a>
            </td>

            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=help" style="text-decoration:none;" title="<?php echo _COM_SEF_HELPDESC;?>">
            <img src="components/com_sef/images/help.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_HELP;?>
            </a>
            </td>

            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=info" style="text-decoration:none;" title="<?php echo _COM_SEF_INFODESC;?>">
            <img src="components/com_sef/images/info.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_INFO;?>
            </a>
            </td>
         </tr>
         <tr>
            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=view&viewmode=0" style="text-decoration:none;" title="<?php echo _COM_SEF_VIEWURLDESC;?>">
            <img src="components/com_sef/images/url.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_VIEWURL ;?>
            </a>
            </td>

            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=view&viewmode=1" style="text-decoration:none;" title="<?php echo _COM_SEF_VIEW404DESC;?>">
            <img src="components/com_sef/images/logs.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_VIEW404 ;?>
            </a>
            </td>

            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=view&viewmode=2" style="text-decoration:none;" title="<?php echo _COM_SEF_VIEWCUSTOMDESC;?>">
            <img src="components/com_sef/images/redirect.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_VIEWCUSTOM ;?>
            </a>
            </td>

         </tr>
         <tr>
            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=purge&viewmode=0&confirmed=0" style="text-decoration:none;" title="<?php echo _COM_SEF_PURGEURLDESC;?>">
            <img src="components/com_sef/images/cut-url.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_PURGEURL ;?>
            </a>
            </td>

            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=purge&viewmode=1&confirmed=0" style="text-decoration:none;" title="<?php echo _COM_SEF_PURGE404DESC;?>">
            <img src="components/com_sef/images/cut-logs.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_PURGE404 ;?>
            </a>
            </td>

            <td align="center" height="90" width="90">
            <a href="index2.php?option=com_sef&task=purge&viewmode=2&confirmed=0" style="text-decoration:none;" title="<?php echo _COM_SEF_PURGECUSTOMDESC;?>">
            <img src="components/com_sef/images/cut-redirect.png" width="48" height="48" align="middle" border="0"/>
            <br />
            <?php echo _COM_SEF_PURGECUSTOM ;?>
            </a>
            </td>

         </tr>         </table>
      </td>
      <td width="50%" valign="top" align="center">
      <table border="1" width="100%" class="adminform">
         <tr>
            <th class="cpanel" colspan="2">404SEFx</th></td>
         </tr>
         <tr><td bgcolor="#D3D3D1" colspan="2"><br />
      <div style="width=100%" align="center">
      <a href="http://sef404.sourceforge.net/" style="text-decoration:none;" target="_blank">
      <img src="components/com_sef/images/logo.gif" align="middle" alt="404SEF logo"/ border="0" /></a>
      <br /><br /></div>
      </td></tr>
         <tr>
            <td width="120" bgcolor="#EFEFEF"><?php echo _COM_SEF_INSTALLED_VERS ;?></td>
            <td bgcolor="#EFEFEF"><?php echo $sefconfig->version;?></td>
         </tr>
         <tr>
            <td bgcolor="#F4F4F4"><?php echo _COM_SEF_COPYRIGHT ;?></td>
            <td bgcolor="#F4F4F4">&copy; 2003-2004 WHW3.COM</td>
         </tr>
         <tr>
            <td bgcolor="#EFEFEF"><?php echo _COM_SEF_LICENSE ;?></td>
            <td bgcolor="#EFEFEF"><a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU GPL</a></td>
         </tr>
		 <tr>
		 	<td bgcolor="#F4F4F4"><?php echo _COM_SEF_SUPPORT_404SEF ;?></td>
			<td bgcolor="#F4F4F4"><form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="paypal@whw3.com">
				<input type="hidden" name="item_name" value="404SEF">
				<input type="hidden" name="item_number" value="404SEF">
				<input type="hidden" name="no_note" value="1">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="tax" value="0">
				<input type="image" src="components/com_sef/images/paypalbutton.png" border="0" name="submit" alt="PayPal">
				</form></td>
		 </tr>
      </table>
      </td>
   </tr>
</table>
<!--
            </td>
            <td align="center" height="100px" width="10">
            &nbsp;
            </td>
-->
