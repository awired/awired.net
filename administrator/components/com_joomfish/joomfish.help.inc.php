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
      	<span class="moduleheading">Welcome to the Joom!Fish</span></p>
      	
        <strong>Joom!Fish - translation? multilingual content manager - What are you talking about? What the hell is a babel fish?</strong>
		<p>Ok one thing is for SURE! <b>It's not the automated translation tool some companies provide!</b> They borrowed the name already!</p>
		<p>But you know Ford Perfect, do you?<br />
		<strong>NO!</strong><br />
		&nbsp;<br />
		Uff, that's hard - can life really be so hard?<br />
		Actually ... - yes! <br />
		&nbsp;<br />
		<strong>But what now? ...</strong><br />
		The best you can do: <a href="http://www.amazon.de/exec/obidos/ASIN/0345391802/thinknetwork-21" target="_blank">click here to find - read - lough - understand!</a><br />
		&nbsp;<br />
		Be fast otherwise the inter galactical route will be build and it is to late ;-)</p>
		<p>
		<strong>Yes, of course!</strong><br />
		Cute, your table in "The Restaurant at the End of the Universe " is reserved.<br />
		Do you want to <a href="index2.php?option=com_joomfish&act=dinnermenu">see the menu</a>?<br />
		&nbsp;<br />
		It's a pleasure to have you folks here<br>
		
		<p>
		<span class="moduleheading">Credits</span><br />
		For all of you that still don't get what I'm talking about. You definitly need to read the books!<br />
		<br />
		I would also like to take the change to thank all of the users of MambelFish and Joom!Fish as it's you who makes this<br />
		tool one of the most important onces in the Joomla! universe. Please don't stop pushing us with new ideas and suggestions<br />
		how we can improve the Fish even more.
		</p>
		<p>
		Thank's to the Joom!Fish Development team, all translators and Tommy for the cute design of the fish.
		&nbsp;<br />
		Alex</p>
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
		<h2>Where do we start?</h2>
	   <p>Ever ask yourself how you can create a multi-language web site without copying the
		whole Joomla tables? The Joom Fish is one of the possible answers.<br />
		&nbsp;<br />
		The Joom Fish components supports you managing all your content translations, even the
		content of all the components/modules, in your web site. The component is so flexible that you
		can easily add new components and after that translate the new generated content.<br />
		&nbsp;</p>
		
		<h2>What do we understand as a content?</h2>
		<p>If we speak about content, we mean any text or other information that is stored in
		one of the tables the Joomla Open Server provides. There are some text information, like
		the text of some links, which are stored in system wide language files. These files
		give you an easy change to switch your site between different languages. <strong>But</strong>
		the news, articles or other <em>content</em> you are creating is only in the language
		you write it :-(.<br />
		&nbsp;<br />
		The Joom Fish is a solution to help you translating this content ;-) so that your
		site gets really multi-lingual. Each definition of dynamic content we call component elements.<br />
		&nbsp;</p>

		<h2>What does the component for you?</h2>
		We didn't wanted to create a mashine translation or other computer based translation method.
		The aim is to support the translation process, which you will have in a bit bigger enviornment.
		At the moment you have some external editors which create new content for you, someone has
		to have control over the translation.<br />
		&nbsp;<br />
		With the Joom Fish this person can check all content to find not yet translated items,
		see resently changed items or just manage the supported languages. Based on this your person
		in charge can translate the content items whenever he/she wants and also with any technique
		it is preferred.</p>

		<h2>How does it work?</h2>
		<p>Pretty easy. In the component menu you find the <a href="index2.php?option=com_joomfish&act=config_component">"Component configuration"</a> to change all the
		general settings of apperience and so on. This is the usual stuff.<br />
		The main thing you have to configure here is for which languages you want to provide the translations.
		Just select the languages you want in the list.</p>

		<p>The second part is a bit more difficult. The definition of component elements is directly conntected
		to your database. That's why we decided not to make this configuration available in the Administrator!<br />
		The administrator shows you in the <a href="index2.php?option=com_joomfish&act=config_elements">"Configuration of content's"</a>
		all installed content element definitions. These definitions are hold in XML files which are
		stored in the subdirectory "contentelements" below your administration dir of Joom Fish.<br />
		If you wish you add a new content or change existing once you have to modify the XML files, which
		should not be to difficult.<br />
		Most important here you, will find some nice possibilities to check if the XML files pointing
		to the correct information ;-)<br />
		&nbsp;<br />
		If you add a new XML file for a not yet implemented component/module make sure you edit also
		the component/module PHP scripts.</p>
		
		<p>For the translation process you just use the <a href="index2.php?option=com_joomfish&act=translate">"Translation"</a> menu. There you will find a
		list of the content's in your database. After selecting a content you can easily 
		work with the translation and store it to your database.</p>
	   &nbsp;<br />
		 <p>That's it so far. Any ideas, problems and so on - just send me a mail<br>
	   &nbsp;<br />
	   Alex</p>		</td>
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
       <h2 style="color:red">There was a problem with your installation</h2>
       <p>The directory "<?php echo $mosConfig_absolute_path?>/mambots/system/" is not writeable</p>
       <p>Please:</p>
       <ul>
       <li>Uninstall Joomfish</li>
       <li>Modify the file permissions</li>
       <li>Reinstall</li>
       </ul>
       <br/>Thanks.</p>
       </td>
	<?php
		HTML_joomfish::_footer($act, $option);
  	
  }
	function showPostInstall( $success=false ) {
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path, $_VERSION;
		HTML_joomfish::_header();
	?>
     <td align="left" valign="top">
       <h2>Welcome to the JoomFish</h2>
       <p>
       The JoomFish component supports you with design and creation of multilingual websites.<br />
       This topic itself isn't that easy and so the handling of this component isn't easy.</p>
       Please make sure you read the following instructions carefully and try out a first example.
       After that you will find support and further help within the JoomFish forum at <a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">http://forge.joomla.org</a>.

       This version of the JoomFish is only working together with the Joomla Version 1.0.7+. If
	   you have a different version please refer to the project site to get a suitable version.</p>
	   <p>
	   Now please install all languages (there is no limit) you like to use within your site - using
	   the <a href="/administrator/index2.php?option=com_installer&element=language">Site -> Languages -> Install</a> function.<br />
	   After you have done the language installation it is needed to activate the languages and
	   give them a "natural" name. This is done with the language configuration of the JoomFish
	   (<a href="/administrator/index2.php?option=com_joomfish&act=config_language">Components -> Joom!Fish -> Languanges</a>).<br />
	   &nbsp;<br />
	   <b>First check:</b> When you change the languages within the frontend (Solarflar template is patched) then
	   all static text should change.</p>

	   <h2>How to translate content?</h2>
	   The translation process is pretty simple. After someone created a new content element you'll find
		 that element in the Translation overview (Joom Fish -> Translation).<br />
		 The easiest way for the translation process is that you define a standard language in which all
		 your content is basically written. Then you use the Translation module to translate this content
		 into as many languages as you like.</p>
		 Within the Translation you just click on one item and then you'll find the overview of text fields
		 which are available for translation. Use this form to translate the item and don't forget to 
		 publish it (second page). After this is done you should be able to see your translated content
		 in the frontend (change of language must be done somehow, of course).
	   &nbsp;<br />

	   <h2>What I know</h2>
	   This release is pretty far. There are some minor tasks to make the Administrator conform
		 the Joomla standards (check in/check out) and the use of the configuration in the Frontend.<br />
		 &nbsp;<br />
		 The main issue is the integration of the frontend Translation class in all the core components
		 and modules. Due to several DHTML problems this challange will be relaized within the next release.
	   &nbsp;</p>
		 There are already some ideas for a new second version which should e.g. include:
		 <ul>
		 	<li>Automatic notification of original content changes</li>
		 </ul>
	   	 Anything else? Please post your ideas and comments at <a href="http://www.joomfish.net" target="_blank">viewProject/projects.joomfish</a>
	   	 within the tracers or public forums.
		 
	   <p>Thank's for the interesting challange in realizing this component<br>
		 &nbsp;<br />
		 Alex</p>
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
