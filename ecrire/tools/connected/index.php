<?php
# ***** BEGIN LICENSE BLOCK *****
# Connected for DotClear.
# Copyright (c) 2005 Antoine Libert. All rights
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

# Diverses variables
global $blog, $con;
$url = "tools.php?p=connected";

# Hop les sous-menus dans l'admin
$mySubMenu->addItem('Connected', $url, 'images/ico_goto.png', FALSE);
$mySubMenu->addItem('Installation', $url.'&installation', 'images/ico_edit.png', FALSE);

buffer::str('<h2>Connected</h2>');

# Requête mySQL pour tester la présence de la table
$rs = $con->select('SHOW TABLES LIKE \''.DB_PREFIX.'connected\'');

# Page d'installation
if (isset($_GET['installation'])) {

	# Si la base n'a pas la table on crée la table
	if ($rs->isEmpty()) {
		
		$con->execute('CREATE TABLE '.DB_PREFIX.'connected (ip varchar(15) NOT NULL default \'\','.
											'time int(11) unsigned NOT NULL default \'0\','.
											'current_page varchar(255) NOT NULL default \'\','.
                      'nick VARCHAR(64) NOT NULL default \'\')');

		buffer::str('<h3>'.__('SQL table has been installed!').'</h3>');


	} else if (!$con->select('SELECT current_page FROM '.DB_PREFIX.'connected LIMIT 1')) {
    // Maj 1		
		$con->execute('ALTER TABLE '.DB_PREFIX.'connected ADD current_page VARCHAR(255) NOT NULL default \'\'');
		buffer::str('<h3>'.__('SQL table has been updated.').' 1/2</h3>');

	} else if (!$con->select('SELECT nick FROM '.DB_PREFIX.'connected LIMIT 1')) {
		// Maj 2
		$con->execute('ALTER TABLE '.DB_PREFIX.'connected ADD nick VARCHAR(64) NOT NULL default \'\'');
		buffer::str('<h3>'.__('SQL table has been updated.').' 2/2</h3>');
  
  } else {

		buffer::str('<h3>'.__('SQL table is already installed.').'</h3>');

	}

	# Affiche l'aide
	buffer::str('<fieldset class="clear"><legend>'.__('Installation').'</legend>');
	buffer::str('<h3>'.__('How to use this plugin?').'</h3>');
	buffer::str('<p>'.__('One functions is available.').'</p>');
	buffer::str('<pre>dcConnected::showConnected(boolean,string,string1,integer)</pre>');
	buffer::str('<p>showConnected '.__('show the counter. String is the message for one user connected, string1 for more, integer is the timetolive of one IP and boolean activate or not the detailed mode.').'</p>');
	buffer::str('<h3>'.__('Example').'</h3>');
	buffer::str('<pre>'.htmlentities('<?php dcConnected::showConnected(true,"Une personne connectée","%s personnes connectées",240); ?>').'</pre>');
	buffer::str('</fieldset>');
}


# La table existe et la page d'aide/options n'est pas demandée
if ($rs->isEmpty() AND !isset($_GET['installation'])) {

	buffer::str(__('SQL table is not installed.'));

} else {

	if (!isset($_GET['installation'])) {
		$rs = $con->select('SELECT ip, current_page, nick FROM '.DB_PREFIX.'connected');
		$count = 1;
		
		while ($rs->fetch()) {
	
			buffer::str('<div class="ligne clear">');
			buffer::str('<h3 class="ligneTitre">'.__('Client') .' n&deg;'.$count.'</h3>');
	
			buffer::str('<p class="semi"><b>'.__('Ip address').' =</b> '.$rs->f('ip').'</p>');
			buffer::str('<p class="semi"><b>'.__('Host').' =</b> '.gethostbyaddr($rs->f('ip')).'</p>');
			buffer::str('<p class="semi"><b>'.__('Current page').' =</b> '.stripslashes($rs->f('current_page')).'</p>');
			buffer::str('<p class="semi"><b>'.__('Nick').' =</b> '.stripslashes($rs->f('nick')).'</p>');
			buffer::str('</div>');
			$count++;
		}
	}
}

?>