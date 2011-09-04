<?
	//include de entete.php
	include("admin/script/entete.php");

	//include du haut de la page
	include("templates/haut_page.html");
	
?>
	<!-- début du corp du site -->
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<table cellpadding="0" cellspacing="0" border="0" height="100%">
		<tr>
			<td width="175" valign="top" align="center">
			<?
				//modules d'affichage des different plan d'hebergement
				include("modules/pub/plan_hebergement.php");			
			?>
			</td>
			<td width="10"></td>
			<td width="265" valign="top" align="center">
			<img src="images/spacer.gif" border="0" width="1" height="6" alt=""><br>
			<?
				//modules de verif si domaine libre
				include("modules/outils/verif_domaine.php");	
				
				//edito/last news du site		
				include("modules/index_edito.php");	
				
				//pub assistance phone !
				include("modules/pub/assistance_telephone.php");	
			?>
			</td>
			<td width="10"></td>
			<td width="175" valign="top" align="center">
			<img src="images/spacer.gif" border="0" width="1" height="6" alt=""><br>
			<?
				//pub plan
				include("modules/pub/pub_plan.php");	
			?>
			</td>
		</tr>	
	</table>		
	<!-- fin du corp du site -->
<?
	//include bas de la page
	include("templates/bas_page.html");
?>