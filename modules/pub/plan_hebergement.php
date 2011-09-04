<?php

	$sql = "SELECT * FROM `tbl_site_plan` WHERE plan_pub = 1 AND  plan_dispo = 1 ORDER BY plan_datedebut";
	$result = mysql_query( $sql );
	while ($resultat = mysql_fetch_array($result)) 
	{
		$plan_reference = $resultat[plan_reference];
		$plan_nom = key2txt($resultat[plan_nom], $lang, $default_lang);  
		$plan_description = key2txt($resultat[plan_description], $lang , $default_lang); 
		$plan_prix = prix2oo($resultat[plan_prix]); 
		$plan_image = $resultat[plan_image];  
	
		?>
		<table width="175" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td height="3"></td>
			</tr>
			<tr>
				<td colspan="2" width="96" height="8" bgcolor="#4C4C4C" background="images/templates/black/fonts/font_hebergement_plan.gif"></td>
				<td rowspan="4" colspan="2"><img align="top" name="plan_hebergement_r1_c3" src="images/templates/black/plan/<?=$plan_image ?>" width="78" height="41" border="0" alt=""></td>
			</tr>
			<tr>
				<td colspan="2" height="22" bgcolor="#272727" align="center"><font class="type_txt1"><?=$plan_nom ?></font></td>
			</tr>
			<tr>
				<td width="4" rowspan="2" bgcolor="#3c3c3c"></td>
				<td width="92" height="4" bgcolor="#3c3c3c"></td>
			</tr>
			<tr>
				<td width="92" height="7" bgcolor="#2F2F2F"></td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="174">
			<tr>
				<td rowspan="3" bgcolor="#3c3c3c" width="4"></td>
				<td rowspan="2" bgcolor="#2F2F2F">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td width="5"></td>
						<td width="100"><?=$plan_description ?></td>
						<td align="center"><font class="type_txt1"><?=$plan_prix ?> €</font></td>
					</tr>
					<tr>
						<td height="5"></td>
					</tr>
				</table>		
				</td>
				<td rowspan="3" bgcolor="#3c3c3c" width="4"></td>
			</tr>
			<tr>
				
				<td></td>
			</tr>
			<tr>
				<td bgcolor="#3c3c3c" align="right" height="20">Plus d'infos | Acheter Maintenant !</td>
			</tr>
		</table>
		<?
	}
?>	