<?php
/**
 * Joom!Fish - multilingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2006 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multilingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 *
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_joomfish_help {

	function showWelcome() {
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_TITLE. ' '._JOOMFISH_CREDITS, 'credits', false );
    ?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<p>
      	<span class="moduleheading">����� ����� � ����!���</span></p>
      	
        <strong>����!��� - ������? ���������� �� ����������� ���������� - �� ����� ��������? ����� �� ���� � ����� ���?</strong>
		<p>��, ���� � �������! <b>���� �� � �������� �� ����������� ������, ����� �� �������� �� ����� ��������!</b> ����� ���� �� ����� �� ��� ������!</p>
		<p>�� ��� ������ ���� ������� ����?<br />
		<strong>��!</strong><br />
		&nbsp;<br />
		���, ���� � ������ - ���� �� ������ �� � ������� ������?<br />
		�������� ... - ��! <br />
		&nbsp;<br />
		<strong>�� �� ���� �����? ...</strong><br />
		���-�������, ����� ������ �� ��������� �: <a href="http://www.amazon.de/exec/obidos/ASIN/0345391802/thinknetwork-21" target="_blank">�� ��������� ���, �� ���������, �� �� �������� � �� ���������!</a><br />
		&nbsp;<br />
		������ �����, � �������� ������ �������������� ���������� �� ���� ��������� � �� ���� ��������� ����� ;-)</p>
		<p>
		<strong>��, ������� ��!</strong><br />
		������, ������ ���� � "��������� ������ �� ��������" � �����������.<br />
		������ �� �� <a href="index2.php?option=com_joomfish&act=dinnermenu">��������� ������</a>?<br />
		&nbsp;<br />
		�� ��� � ����������, �� �������� ����!���<br>
		
		<p>
		<span class="moduleheading">�������</span><br />
		�� ������ ���, ����� ��� ��� �� ��������� �� ����� ������. ������ ���������� �� ��������� �� ������ �����!<br />
		<br />
		����� ���� ���� �� ��������� ������������ �� ��������� �� ������ ����������� �� ��������� � ����!���, ��� ���� ��� ������ � �������� �� ����, ���� ��� ���������� �� �� ���� �� ���-������� ��� ��������� �� ������!<br /> ���� ��, �� �� ������� �� �� ��������� � ������ ���� � �����������, ��� ����� �� �������� ������� ��� � ���.
		</p>
		<p>
		������������� ��� ����� �� ����!���, ������ ��������� � ���� �� ����������� ������ �� ������.
		&nbsp;<br />
		�����</p>
		</p>
		</td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
	<?php
		HTML_joomfish::_footer($act, $option);
  }		
	
	
	function showDinnermenu() {
		global $act, $task, $option, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_TITLE. ' ' ._JOOMFISH_ADMIN_HELP, 'support', false );
    ?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<h2>�� ���� �� ��������?</h2>
	   <p>������ �� ��� �� ������ ���� � �������� �� ��������� ���� �� ������� ����� ����������� ������? ����!��� � ���� �� ���������� ��������.<br />
		&nbsp;<br />
		����������� �� ��������� �� ����������� ������������ � �����, ������������ � ��������. ���������� � ������� ������, �� ���� ������������� �� ����� ����������, ������ �� �������� ������� �����, �� �� ������ �������� �� ��������� � ���.<br />
		&nbsp;</p>
		
		<h2>����� ��������� ��� ����������?</h2>
		<p>������ ������� �� ����������, ����� ������� ����� ��� ����� ����������, ����� � �������� � ������ ����� �� ������! ��� ����� ��������, ����� �� �������� � ��������� ������� �� ������! ���� ������� �� ����� ���������� �� ��������� ���������� � ��������� �� �������� �� ����������� ����. 
		<strong>��</strong>
		��������, �������� � ������ �������� <em>����������</em> ����� ��������� � ���� �� ����� �� ����� ��� �� ������ :-(.<br />
		&nbsp;<br />
		����!��� � ������� �� �� �� ��������� �� ��������� ������������ �� ;-) � �� ���� ����� �� ��������� ����� �� �����������. ����� ��������� �� ������������ ��� �������� ������� �� ������������.<br />
		&nbsp;</p>

		<h2>����� ����� ���������� �� ���?</h2>
		��� �� ������ �� �������� ����� �� ������� ������ ��� ���� ������� �� ���������� ������.
		����� � �� ����������� ������� �� ������, ����� ��� �� ������� � ����� ��-������ �����.
		� ������� � ����� ��� ����� ������ ��������� � ������ �� ����������, ����� ������ �� ���������� ������� �� ������.<br />
		&nbsp;<br />
		� ����!��� ���� ���� ���� �� ������� ������ ���������� � �� ����, ��� ����� �� ���� �� �� ���������. 
		��������� �� �� ���� �����, ������ �� ��������� ������ ���������� �� �����, ����� ��� �������.</p>

		<h2>��� ������?</h2>
		<p>����� �����. � ������ ����������, ������ �� ������ <a href="index2.php?option=com_joomfish&act=config_component">"���������"</a> � �� ��������� ������ ��������� �� ����������. ���� � ���� ��������.<br />
		��������� ����� ������ �� ��������� � ������� � �� ����� � ��� ����� ������ �� ���� ���������� ������������ �� ����� ��.</p>

		<p>������� ���� � �� ������. ����������� �� ���������� �� ������������ �� �������� �������� � ������ �����. ������ ���� ������� ��� ������� �� �������� ������������ �� ������� �������������� ���� ����������� �� ����������!
	</p>		</td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
	</tr>

<?php
		HTML_joomfish::_footer($act, $option);
  }

  function showMambotWarning(){
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path, $_VERSION;
		HTML_joomfish::_header();
		?>
     <td align="left" valign="top">
       <h2 style="color:red">��� ������� � ������������</h2>
       <p>������������ "<?php echo $mosConfig_absolute_path?>/mambots/system/" � ��� ����� �� �����</p>
       <p>����:</p>
       <ul>
       <li>��-������������ ����!���</li>
       <li>��������� ������� ����� ������������</li>
       <li>���������������</li>
       </ul>
       <br/>���������� ��.</p>
       </td>
	<?php
		HTML_joomfish::_footer($act, $option);
  	
  }
	function showPostInstall( $success=false ) {
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path, $_VERSION;
		HTML_joomfish::_header();
	?>
     <td align="left" valign="top">
       <h2>����� ����� � ����!���</h2>
       <p>
       ����������� ����!��� �� ��������� �� ��������� ����������� ����.<br />
       ������ ���������� �� ����� ���� �� � ����� ������, �� ���� � ���������� �� � �������� ����� �� ����������.</p>
       ���� ��������� ������������ ����������, ���� ����� �� �������� �� ��������� � �������.
       ������ �� �������� ����� � ��������� ��� ������ �� ����!��� � <a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">http://forge.joomla.org</a>.

       ���� ������ �� ����!��� ������ ���������� �� ������ 1.0.7+. ��� �������� �������� ������, ���� �������� ���� �� 1.0.7.</p>
	   <p>
	   ���� ���� ������������ ������ ����� (���� �����������) ���� ������������ �� <a href="/administrator/index2.php?option=com_installer&element=language">���� -> ����� -> ���</a>.<br />
	   ���� ���� ��� ����������� �������, ����� ������ �� ��������, ������ �� �� ���������� ���� ����!���. ���� ����� � ��������� ���������(<a href="/administrator/index2.php?option=com_joomfish&act=config_language">���������� -> ����!��� -> �����</a>).<br />
	   &nbsp;<br />
	   <b>����� ���������:</b> ��� ����� �� ����� � �����, ���� �� ������� ����� �� ����� ���������� ���������.</p>

	   <h2>��� �� ���������� ����������?</h2>
	   ������� � ������  �������� ���� � ���� ���� �������� ���� �� ������������, ����� ������ �� ���������. ���� ����� ������ �� ��������� ����� ����������� �����, ����� ������ �� ��������� � ��������� �������.</p>
	   &nbsp;<br />

	   <h2>����� �����</h2>
	   ���� ������ � ����� ����� ������. ��� ����� ������� � ���������������, ����� � � ����������� �� ������ �� ��������� ���� ����� ����, ����� ��� ��� �� � ������ �� ���������� .<br />
		 &nbsp;<br />
		 ������� ������� � ���������� �� ����� �� ���������� ���� ����� �� ������ ����������. ������ �������� � DHTML ���� ������� �� �������� � ���������� ������.
	   &nbsp;</p>
		 ��� ����� ���� �� ������ ������ �� ���������� ����:
		 <ul>
		 	<li>����������� ����������� ��� ������� � ����������� ����������</li>
		 </ul>
	   	 ���� �����? ���� �������� ������ ���� � ��������� � <a href="http://forge.joomla.org/sf/sfmain/do/viewProject/projects.joomfish" target="_blank">���������� �� �������</a>
	   	 � � ���������� ������.
		 
	   <p>���������� �� �� �������� ��� ����� ���������<br>
		 &nbsp;<br />
		 �����</p>
	   </td>
		<td align="left" valign="top" nowrap>
			<?php HTML_joomfish::_sideMenu();?>
			<?php HTML_joomfish::_creditsCopyright(); ?>
		</td>
<?php
		HTML_joomfish::_footer($act, $option);
  }
}
?>
