<div style="text-align:left;">
<p align="right"><font size="1">Updated: 2006-05-26</font></p>
<div>
  <h1 align="center">404SEFx 1.2 for Mambo and Joomla 1.0x</h1>
  <p align="center"><a href="http://www.ty2u.com" target="_blank">TY2U.com</a><br /><a href="http://sef404.sourceforge.net/" target="_blank">http://sef404.sourceforge.net/</a></p>
</div>
<div>
<h3>Project Summary</h3>
<ul id="summary">
<li style="list-style: none">

	<p>Allows Search Engine Friendly URLS for apache and IIS, returns
	proper 404 status code for missing content, provides logging of 404 errors, and
	creation of special &quot;shortcut&quot; URLs that allow the user to redirection to the
	new URL.</p>
	<p>Future Plans:</p>
	<ul>
	<li>Add option to remove duplicate content pages. **This isnt actually here yet but I am doing this now.</li>
	</ul>
	<p>Changelog:</p>
	<p>25th May 2006</p>
	<ul>
	<li>Made URL's even cleaner</li>
	<li>Added option to change page spacer character.</li>
	<li>Added option to include a default index file in empty directories.  i.e. yoursite.com/test can also be yoursite.com/test/ or yoursite.com/test/index.php</li>
	<li>Added option to redirect to Front Page on 404</li>
	<li>Fixed many miscellaneous bugs</li>
	</ul>
	<p>Updated 20th May 2006 to 404SEFx by Ryan <a href="http://www.ty2u.com" target="_blank">TY2U.com</a></p>
	<ul>
	<li>Array code appearing randomly *FIXED*</li>
	<li>Pagination issue *FIXED*</li>
	<li>Categories issue *FIXED*</li>
	<li>Illegal characters in the urls *FIXED*</li>
	<li>Added Strip Characters option in backend.  Useful for removing unwanted characters from your urls.
	<li>Added Trim Characters option.  This is useful when a - or . is at the end or beginning of the link after stripping it.
	<li>By default space replacement is a dash(-) for compliance</li>
	<li style="color:red;">Uninstall will DROP the #__redirection table from the database so make sure to back that up if you want to keep your urls!
	<li>Various other issues fixed</li>
	</ul>
</li>
</ul>
<br />
</div>
<div>
<h3>Project Documentation</h3>
<h3>Introduction</h3>
<p>I will attempt to give some tips on using 404SEFx here.  You can view this documentation again by selecting the '404SEFx Documentation' button from the 404SEFx Control Panel.</p>
<h3>Installation Instructions</h3>
<p>You can view installation instructions below by clicking the appropriate arrow.</p>
<p>If your .htaccess file was set as writable the install may have updated it already and you shouldn't have to worry about it.</p>
<p>If your site is in a subdirectory be sure to change the RewriteBase line accordingly.  ex/ RewriteBase /joomla</p>
<ul id="collapsibleList">
	<li><script type="text/javascript">document.writeln('<img id="imgInstall" src="components/com_sef/images/up.png" width="15" height="8" alt="Open list" onClick="toggle(\'imgInstall\',\'install\');">');</script>
		<b>Installation</b>
	</li>
	<li style="list-style: none">
		<ul id="install">
		<li style="list-style: none">
			<ol>
			<li>Upload the zip file to Joomla/Mambo using the component installer in the usual way.</li>
			<li>For apache, set your &quot;.htaccess&quot; file like this:<br>
			<pre>
##
# @version $Id: htaccess.txt 2368 2006-02-14 17:40:02Z stingrey $
# @package Joomla
# @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
# @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
# Joomla! is Free Software
##


#####################################################
#  READ THIS COMPLETELY IF YOU CHOOSE TO USE THIS FILE
#
# The line just below this section: 'Options FollowSymLinks' may cause problems
# with some server configurations.  It is required for use of mod_rewrite, but may already
# be set by your server administrator in a way that dissallows changing it in
# your .htaccess file.  If using it causes your server to error out, comment it out (add # to 
# beginning of line), reload your site in your browser and test your sef url's.  If they work,
# it has been set by your server administrator and you do not need it set here. 
#
# Only use one of the two SEF sections that follow.  Lines that can be uncommented
# (and thus used) have only one #.  Lines with two #'s should not be uncommented
# In the section that you don't use, all lines should start with #
#
# For Standard SEF, use the standard SEF section.  You can comment out
# all of the RewriteCond lines and reduce your server's load if you
# don't have directories in your root named 'component' or 'content'
#
# If you are using a 3rd Party SEF or the Core SEF solution
# uncomment all of the lines in the '3rd Party or Core SEF' section
#
#####################################################

#####  SOLVING PROBLEMS WITH COMPONENT URL's that don't work #####
# SPECIAL NOTE FOR SMF USERS WHEN SMF IS INTEGRATED AND BRIDGED
# OR ANY SITUATION WHERE A COMPONENT's URL's AREN't WORKING
#
# In both the 'Standard SEF', and '3rd Party or Core SEF' sections the line:
# RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] ##optional - see notes##
# May need to be uncommented.  If you are running your Joomla/Mambo from
# a subdirectory the name of the subdirectory will need to be inserted into this
# line.  For example, if your Joomla/Mambo is in a subdirectory called '/test/',
# change this:
# RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] ##optional - see notes##
# to this:
# RewriteCond %{REQUEST_URI} ^(/test/component/option,com) [NC,OR] ##optional - see notes##
#
#####################################################


##  Can be commented out if causes errors, see notes above.
Options FollowSymLinks

#
#  mod_rewrite in use

RewriteEngine On


#  Uncomment following line if your webserver's URL
#  is not directly related to physical file paths.
#  Update Your Joomla/MamboDirectory (just / for root)

# RewriteBase /


########## Begin Standard SEF Section
## ALL (RewriteCond) lines in this section are only required if you actually
## have directories named 'content' or 'component' on your server
## If you do not have directories with these names, comment them out.
#
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] 		##optional - see notes##
#RewriteCond %{REQUEST_URI} (/|\.htm|\.php|\.html|/[^.]*)$  [NC]
#RewriteRule ^(content/|component/) index.php
#
########## End Standard SEF Section


########## Begin 3rd Party or Core SEF Section
#
#RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] 		##optional - see notes##
RewriteCond %{REQUEST_URI} (/|\.htm|\.php|\.html|/[^.]*)$  [NC]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule (.*) index.php
#
########## End 3rd Party or Core SEF Section

			</pre></li>
			<li>For IIS, see Configuring IIS..</li>
			<li>Ensure that SEF is enabled under Global Configuration in the Joomla/Mambo backend.</li>
			<li>Edit the 404 SEF configuration, Change Enable to yes and save.<br/>
			This is neccessary to ensure the default 404 document gets saved to the Joomla/Mambo database.</li>
			</ol>
		</li>
		<br />
		</ul>
	</li>

	<li><script type="text/javascript">document.writeln('<img id="imgIIS" src="components/com_sef/images/up.png" width="15" height="8" alt="Open list" onClick="toggle(\'imgIIS\',\'iis\');">');</script>
		<b>Configuring IIS</b>
	</li>
	<li style="list-style: none">
		<ul id="iis">
		<li style="list-style: none">
			<ol>
			<li><b>Install ActiveScript</b><br/>After installing PHP, you should download the ActiveScript DLL (php4activescript.dll)
			and place it in the main PHP folder (e.g. C:\php).<br/>
			<br/>After having all the files needed, you must register the DLL on your system.
			To achieve this, open a Command Prompt window (located in the Start Menu). Then
			go to your PHP directory by typing something like cd C:\php. To register the DLL
			just type <pre>regsvr32 php4activescript.dll</pre></li>
			<li><b>Install .NET framework 1.1</b><br/>To the best of my limited knowledge of IIS, this is required for web.config to
			work, so install it<br/><br/></li>
			<li><b>Create/Modify web.config</b><br><br/>
			<font color="red"><b>NOTE: in the example below, Joomla/Mambo is installed in the virtual directory 'mambo'</b></font><br/><br/>
			Create C:\Inetpub\wwwroot\web.config and add the content below:<br>
			<pre>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;
&lt;configuration&gt;
	&lt;system.web&gt;
		&lt;compilation defaultLanguage=&quot;PHP4Script&quot; debug=&quot;true&quot; /&gt;
		&lt;customerrors mode=&quot;On&quot; defaultRedirect=&quot;/mambo/index.php&quot; /&gt;
	&lt;/system.web&gt;
&lt;/configuration&gt;</pre></li>
			<li><b>Configure the Custom Errors</b><br/><br/>
			<font color="red"><b>NOTE: in the example below, Joomla/Mambo is installed in the virtual directory Joomla/Mambo</b></font><pre>
Using the Internet Services Manager, right-click the directory in which Joomla/Mambo is installed.
Select properties >> Custom Error
set the 404 to URL:/mambo/index.php
set the 405 to URL:/mambo/index.php</pre></li>
			</ol>
		</li>
		<br />
		</ul>
	</li>


	<li><script type="text/javascript">document.writeln('<img id="imgUninstall" src="components/com_sef/images/up.png" width="15" height="8" alt="Open list" onClick="toggle(\'imgUninstall\',\'uninstall\');">');</script>
		<b>Uninstall</b>
	</li>
	<li style="list-style: none">
		<ul id="uninstall">
		<li style="list-style: none">
			<ol>
			<li>Uninstall the component using the component unistaller in the usual way.</li>
			<li>For apache, set your &quot;.htaccess&quot; like this :<br>
			<pre>
##
# @version $Id: htaccess.txt 2368 2006-02-14 17:40:02Z stingrey $
# @package Joomla
# @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
# @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
# Joomla! is Free Software
##


#####################################################
#  READ THIS COMPLETELY IF YOU CHOOSE TO USE THIS FILE
#
# The line just below this section: 'Options FollowSymLinks' may cause problems
# with some server configurations.  It is required for use of mod_rewrite, but may already
# be set by your server administrator in a way that dissallows changing it in
# your .htaccess file.  If using it causes your server to error out, comment it out (add # to 
# beginning of line), reload your site in your browser and test your sef url's.  If they work,
# it has been set by your server administrator and you do not need it set here. 
#
# Only use one of the two SEF sections that follow.  Lines that can be uncommented
# (and thus used) have only one #.  Lines with two #'s should not be uncommented
# In the section that you don't use, all lines should start with #
#
# For Standard SEF, use the standard SEF section.  You can comment out
# all of the RewriteCond lines and reduce your server's load if you
# don't have directories in your root named 'component' or 'content'
#
# If you are using a 3rd Party SEF or the Core SEF solution
# uncomment all of the lines in the '3rd Party or Core SEF' section
#
#####################################################

#####  SOLVING PROBLEMS WITH COMPONENT URL's that don't work #####
# SPECIAL NOTE FOR SMF USERS WHEN SMF IS INTEGRATED AND BRIDGED
# OR ANY SITUATION WHERE A COMPONENT's URL's AREN't WORKING
#
# In both the 'Standard SEF', and '3rd Party or Core SEF' sections the line:
# RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] ##optional - see notes##
# May need to be uncommented.  If you are running your Joomla/Mambo from
# a subdirectory the name of the subdirectory will need to be inserted into this
# line.  For example, if your Joomla/Mambo is in a subdirectory called '/test/',
# change this:
# RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] ##optional - see notes##
# to this:
# RewriteCond %{REQUEST_URI} ^(/test/component/option,com) [NC,OR] ##optional - see notes##
#
#####################################################


##  Can be commented out if causes errors, see notes above.
Options FollowSymLinks

#
#  mod_rewrite in use

RewriteEngine On


#  Uncomment following line if your webserver's URL
#  is not directly related to physical file paths.
#  Update Your Joomla/MamboDirectory (just / for root)

# RewriteBase /


########## Begin Standard SEF Section
## ALL (RewriteCond) lines in this section are only required if you actually
## have directories named 'content' or 'component' on your server
## If you do not have directories with these names, comment them out.
#
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
#RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] 		##optional - see notes##
RewriteCond %{REQUEST_URI} (/|\.htm|\.php|\.html|/[^.]*)$  [NC]
RewriteRule ^(content/|component/) index.php
#
########## End Standard SEF Section


########## Begin 3rd Party or Core SEF Section
#
#RewriteCond %{REQUEST_URI} ^(/component/option,com) [NC,OR] 		##optional - see notes##
#RewriteCond %{REQUEST_URI} (/|\.htm|\.php|\.html|/[^.]*)$  [NC]
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteRule (.*) index.php
#
########## End 3rd Party or Core SEF Section


			</pre></li>
			<li>For IIS, remove C:\Inetpub\wwwroot\web.config and<br>
			the Custom Errors you created with the Internet Services Manager<br>
			</ol>
		</li>
		<br />
		</ul>
	</li>
</ul>


<h3>Useful Tips For Using 404SEFx</h3>
<h4>Configuration</h4>
<p>Using the 404SEFx configuration is fairly straight forward.  For more information on each item hover your mouse over the blue (i) images when you are in the configuration screen.</p>
<p>When you save the configuration it will remove all your URL's from the database.  If you have a high traffic site it may be wise to put it offline before saving the 404SEFx config or purging the database and go and browse your site starting at the main page.  This will create the URL's properly for you and prevent numbers from being added to the ends of URL's people were browsing that changed.</p>
<p>You may want to purge the 404 log before creating fresh urls.</p>
<h4>Modifying URL's</h4>
<p>You can modify URL's to your liking.  Go into the 404SEFx Control Panel and click ' View/Edit SEF Urls'.  Select the URL you wish to modify.  If you click the check box labeled 'Save as Custom Redirect' it will place this URL into the 'Custom Redirect' area which you can navigate to from the 404SEFx Control Panel.  When you click 'View/Edit Custom Redirects' you will see your URL in here now instead.  These urls will not be removed when you save the config.  You can modify these and save them as you wish.
<p>This is particularly useful if you are updating from an old site because any URL's that are no longer availble will be logged.  You can view these URL's by clicking 'View/Edit 404 Logs' in the 404SEFx Control Panel.  You can redirect visitors to the new page by selecting the URL you wish to modify and entering the new url.  Note: The ability to enter non-Joomla! URL's into this area is coming soon!  This will allow you to easily transfer a non-Joomla! site to Joomla using 404SEFx and any of your old URL's will be redirected to the new page within Joomla!.</p>
<h4>Backing up your URL's</h4>
<p>It is recommended to backup your database before doing this.</p>
<p>You can also import and export URL's from the Custom Redirect area.  To do this click the 'Import/Export Custom URLS' link above the table of URL's.  To backup your URL's click the 'Backup Custom URLS' button and you will be presented with a file named '404SEFx_custom_urls.sql' to download.</p>
<p>If you want to import your urls browse to the file and click the 'Import Custom URLS' button.</p>

<script type="text/javascript">
 document.getElementById('collapsibleList').style.listStyle="none"; // remove list markers
 document.getElementById('install').style.display="none"; // collapse list
 document.getElementById('iis').style.display="none"; // collapse list
 document.getElementById('uninstall').style.display="none"; // collapse list
 // this function toggles the status of a list
 function toggle(image,list){
 var listElementStyle=document.getElementById(list).style;
 if (listElementStyle.display=="none"){
 	listElementStyle.display="block"; document.getElementById(image).src="components/com_sef/images/down.png";
 	document.getElementById(image).alt="Close list";
 }else{
 	listElementStyle.display="none";
 	document.getElementById(image).src="components/com_sef/images/up.png";
 	document.getElementById(image).alt="Open list";
 }
}
</script></div>
</div>
<br/>
<p>Copyright &copy; 2004 W.H.Welch<br/>
Distributed under the terms of the GNU General Public License<br/>
This software may be used without warranty provided and these statements are left intact.</p>
</div>