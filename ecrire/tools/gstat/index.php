<?php
/*  GStat 0.4.5 for DotClear
 *  Copyright (C) 2005 Lisaraël (v0.3 and followed), 
 *  And Alexandre Glouzouic and contributors (v0.1 to 0.2.1).
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

require("tools/gstat/functions.php");

# Affichage du titre
buffer::str("<h2>GStat 0.4.5</h2>");
buffer::str("<fieldset class=\"clear\"><legend>Installation</legend>");

# Test de vérification de l'installation de BBClone
if (!is_readable("tools/bbclone/var/access.php")) {
	buffer::str("<img src=\"images/check_off.png\" /> " . __('var_pb') . "</fieldset>");
} else {

buffer::str("<img src=\"images/check_on.png\" /> " . __('var_ok') . "</fieldset>");

# Affichage de la notice d'utilisation
buffer::str("<fieldset class=\"clear\"><legend>" . __('Use') . "</legend>"
	. __('explanation') . "</fieldset>"
);

# Affichage de la liste des fonctions utilisables
buffer::str("<fieldset class=\"clear\"><legend>" . __('Functions') . "</legend>"
	. "<h3>" . __('Meters') . "</h3>"
	. "<p><strong>" . __('Total_count :') . "</strong> " . GStat::BBCtotalcount()
	. "<br />" . __('Use_function') . " <em>BBCtotalcount()</em></p>"
	. "<p><strong>" . __('Total_human :') . "</strong> " . GStat::BBCtotalhuman()
	. "<br />" . __('Use_function') . " <em>BBCtotalhuman()</em></p>"
	. "<p><strong>" . __('Total_robot :') . "</strong> " . GStat::BBCtotalrobots()
	. "<br />" . __('Use_function') . " <em>BBCtotalrobots()</em></p>"
	. "<p><strong>" . __('Total_visits :') . "</strong> " . GStat::BBCtotalvisits()
	. "<br />" . __('Use_function') . " <em>BBCtotalvisits()</em></p>"
	. "<p><strong>" . __('Day_visits :') . "</strong> " . GStat::BBCdayvisits()
	. "<br />" . __('Use_function') . " <em>BBCdayvisits()</em></p>"
	. "<h3>" . __('Tops') . "</h3>"
	. "<p><strong>" . __('Top_browsers :') . "</strong> " . GStat::BBCtopbrowsers("list", 5)
	. " " . __('Use_function') . " <em>BBCtopbrowsers(X, Y)</em><br />(<em>" . __('Use_tops') . "</em>)<br />"  . __('Example :') .  " BBCtopbrowsers(\"list\", 5)</p>"
	. "<p><strong>" . __('Top_os :') . "</strong> " . GStat::BBCtopos("list", 5)
	. " " . __('Use_function') . " <em>BBCtopos(X, Y)</em><br />(<em>" . __('Use_tops') . "</em>)<br />"  . __('Example :') .  " BBCtopos(\"list\", 5)</p>"
	. "<p><strong>" . __('Top_robots :') . "</strong> " . GStat::BBCtoprobots("list", 5)
	. " " . __('Use_function') . " <em>BBCtoprobots(X, Y)</em><br />(<em>" . __('Use_tops') . "</em>)<br />"  . __('Example :') .  " BBCtoprobots(\"list\", 5)</p>"
	. "<p><strong>" . __('Top_lands :') . "</strong> " . GStat::BBCtoplands("list", 5)
	. " " . __('Use_function') . " <em>BBCtoplands(X, Y)</em><br />(<em>" . __('Use_tops') . "</em>)<br />"  . __('Example :') .  " BBCtoplands(\"list\", 5)</p>"
	. "<p><strong>" . __('Top_pages :') . "</strong> " . GStat::BBCtoppages("list", 5)
	. " " . __('Use_function') . " <em>BBCtoppages(X, Y)</em><br />(<em>" . __('Use_tops') . "</em>)<br />"  . __('Example :') .  " BBCtoppages(\"list\", 5)</p>"
	. "<p><strong>" . __('Top_referers :') . "</strong> " . GStat::BBCtopreferers("list", 5)
	. " " . __('Use_function') . " <em>BBCtopreferers(X, Y)</em><br />(<em>" . __('Use_tops') . "</em>)<br />"  . __('Example :') .  " BBCtopreferers(\"list\", 5)</p>"
	. "<h3>" . __('Time_Stats') . "</h3>"
	. "<p><strong>" . __('Week_Visits :') . "</strong> " . GStat::BBCweekvisits()
	. " " . __('Use_function') . " <em>BBCweekvisits()</em></p>"
	. "<p><strong>" . __('Year_Visits :') . "</strong> " . GStat::BBCyearvisits()
	. " " . __('Use_function') . " <em>BBCyearvisits()</em></p>"
	."<h3>" . __('Detailled_Stats') . "</h3>"
	. "<p><strong>" . __('Last_visitors :') . "</strong> " . GStat::BBClastvisitors("list", 5, "yes")
	. " " . __('Use_function') . " <em>BBClastvisitors(X, Y, Z)</em><br />(<em>" . __('Use_details') . "</em>)<br />"  . __('Example :') .  " BBClastvisitors(\"list\", 5, \"yes\")</p>"
	. "</fieldset>"
);

# Note sur le cas d'absence de données 
buffer::str("<fieldset class=\"clear\"><legend>" . __('No_Data') . "</legend>"
	. __('No_Data_explanation') . "</fieldset>"
);

# Affichage de la notice sur les css 
buffer::str("<fieldset class=\"clear\"><legend>" . __('Styles') . "</legend>"
	. __('Styles_explanation') . "</fieldset>"
);

# Affichage du copyright
buffer::str("<fieldset class=\"clear\"><legend>" . __('Copyright') . "</legend>"
	. __('auteur') . "</fieldset>"
);

}

?>