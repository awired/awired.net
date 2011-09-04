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
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_TITLE. ' - '._JOOMFISH_CREDITS, 'credits', false );
    ?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<p>
      	<span class="moduleheading">Velkommen til Joom!Fish</span></p>

        <strong>Joom!Fish - oversettelse? Flerspr�klig innholdsbehandler - Hva prater du om? Hva er egentlig en "babel fish"?</strong>
		<p>Ok, en ting er helt sikkert! <b>Det er ikke et automatisk oversettelsesverkt�y som noen firmaer tilbyr!</b> De har l�nt navnet allerede!</p>
		<p>Men du kjenner til Ford Perfect, gj�r du ikke?<br />
		<strong>NEI!</strong><br />
		&nbsp;<br />
		Uff da, det er hardt - kan livet virkelig bli s� hardt?<br />
		For � v�re �rlig... - ja! <br />
		&nbsp;<br />
		<strong>Men hva n�? ...</strong><br />
		Det beste du kan gj�re: <a href="http://www.amazon.de/exec/obidos/ASIN/0345391802/thinknetwork-21" target="_blank">klikk her for � finne - lese - le - forst�!</a><br />
		&nbsp;<br />
		V�r rask ellers vil den inter galactical ruten bli bygd og det er for seint ;-)</p>
		<p>
		<strong>Ja selvf�lgelig!</strong><br />
		Flott, ditt bord p� "Restauranten ved enden av universet" er reservert.<br />
		Vil du <a href="index2.php?option=com_joomfish&act=dinnermenu">se menyen</a>?<br />
		&nbsp;<br />
		Det er en glede � ha dere her!<br>

		<p>
		<span class="moduleheading">Bidragsytere</span><br />
		For alle dere som fortsatt ikke forst�r hva jeg prater om anbefaler jeg at dere leser b�kene!<br />
		<br />
		Jeg vil ogs� benytte sjangsen til � takke alle brukere av MambelFish og Joom!Fish siden det er dere som gj�r dette<br />
		verkt�yet til et av de viktigste i Joomla!-universet.  Ikke stopp opp med � gi oss nye ideer og �nsker for hvordan<br />
		vi kan forbedre fisken enda mer.
		</p>
		<p>
		Takk til Joom!Fish-utviklerteamet, alle oversettere og Tommy for det flotte designet av fisken.
		&nbsp;<br />
		Alex</p>
		</p>
		</td>
		<td align="left" valign="top" nowrap>
		<img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_joomfish/images/joomfish_slogan.png" border="0" alt="<?php echo _JOOMFISH_ADMIN_LANGUAGE_TITLE;?>"  />
		<p><span class="contentheading">Relaterte emner:</span>
		<ul>
			<li><a href="index2.php?option=com_joomfish&amp;act=credits">Joom!Fish-hjelp, bidragsytere og resten av universet</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=dinnermenu">Middagsmenyen <b>(Dokumentasjonen)</b></a></li>
			<li><a href="http://www.joomfish.net" target="_blank">Offisiell prosjektside</a></li>
			<li><a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">Offisielt prosjektforum</a></li>
			<li><a href="http://forge.joomla.org/sf/tracker/do/listArtifacts/projects.joomfish/tracker.bugs" target="_blank">Feiloppf�lging</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Dokumentasjon og veiledninger:</span>
		<ul>
			<li><a href="http://forge.joomla.org/sf/wiki/do/viewPage/projects.joomfish/wiki/HomePage" target="_blank">Prosjektets dokumentasjonsside</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=readme">Installasjonsmerknader (LesMeg)</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=changelog">Endringslogg</a></li>
			<li><a href="http://www.joomfish.net" target="_blank">Offisiell prosjektside</a></li>
			<li><a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">Offisielt prosjektforum</a></li>
			<li><a href="http://forge.joomla.org/sf/tracker/do/listArtifacts/projects.joomfish/tracker.bugs" target="_blank">Feiloppf�lging</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Lisens:</span>
		<ul>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license">Think Network �pen kildekode-lisens</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Andre sider:</span>
		<ul>
			<li><a href="http://www.joomla.org" target="_blank">Joomla!</a></li>
		</ul>
		</p>
		<p>
		<span class="smallgrey"><strong>Bidragsytere:</strong></span><br />
		<span class="smallgrey">Til alle personer i Joom!Fish-fellesskapet!<br />
		N�v�rende utviklere:
		<ul>
			<li>Alex Kempkens (<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Geraint Edwards (<?php
			$x = "@";
			$y="joomfish.credits";
			$z="copyn.plus.com";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Ivo Apostolov (<?php
			$x = "@";
			$y="joomfish";
			$z="unwe.net";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>L�vis Bisson</li>
			<li>Robin Muilwijk</li>
		</ul>
		<br />

		Logo-design av:
		<ul>
			<li>Tommy White (<?php
			$x = "@";
			$y="tommy";
			$z="tommywhite.com";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
		</ul>

		&nbsp;<br />
		Spesielt takk for testing, gode forslag og oversettelser til:<br />
		Bernhard, Michael, Luc, Olivier, Robin, Rune</span><br />

		&nbsp;<br />
		<span class="smallgrey"><strong>Kontakt:</strong></span><br />
		<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;

			echo '<span class="smallgrey">' .mosHTML::emailCloaking( $mail, 1,  $mail) .'</span>';
		?>
		<br />
		&nbsp;<br />
		<span class="smallgrey"><strong>Versjon:</strong></span><br />
		<span class="smallgrey"><?php echo JoomFishManager::getVersion();?></span><br />
		&nbsp;<br />
		<span class="smallgrey"><strong>Kopirett:</strong></span><br />
		<span class="smallgrey">&copy; 2003-2006 </span><a href="http://www.ThinkNetwork.com" target="_blank" class="smallgrey"><span class="smallgrey">Think Network, Munich</span></a><br />
		<a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license" class="smallgrey"><span class="smallgrey">�pen kildekode-lisens.</span></a>
		</p>
		</td>
	<?php
		HTML_joomfish::_footer($act, $option);
  }


	function showDinnermenu() {
		global $act, $task, $option, $mosConfig_live_site;
		HTML_joomfish::_JoomlaHeader( _JOOMFISH_TITLE. ' - ' ._JOOMFISH_ADMIN_HELP, 'support', false );
    ?>
	<tr align="center" valign="middle">
      <td align="left" valign="top" width="70%">
		<h2>Hvor starter vi?</h2>
	   <p>Har du noen gang spurt deg selv hvordan du kan lage en flerspr�klig nettside uten � kopier
		hele Joomla-tabellen? Joom!Fish er et mulig svar p� dette.<br />
		&nbsp;<br />
		Joom!Fish-komponenten gir deg st�tte for � behandle alle dine innholdsoverettelser, til og med
		innholdet i alle komponenter/moduler i din nettside. Komponenten er s� fleksibel at du enkelt
		kan legge til nye komponenter og etterp� oversette det nye innholdet.<br />
		&nbsp;</p>

		<h2>Hva definerer vi som innhold?</h2>
		<p>N�r vi prater om innhold mener vi all tekst, og annen informasjon, som blir lagret i en av
		tabellene som "Joomla! Open Server" forsyner. Det er noe tekstinformasjon, som teksten til
		til noen lenker, som er lagret i systemets fyldige spr�kfiler. Disse filene gir deg muligheten
		til � enkelt bytte mellom forskjellige spr�k p� siden din. <strong>Men</strong>
		nyhetene, artikklene eller annet <em>innhold</em> du oppretter er bare i det spr�ket du skriver
		det i.<br />
		&nbsp;<br />
		Joom!Fish er en l�sning for � hjelpe deg � oversette dette innholdet, slik at din side
		blir helt flerspr�klig. Hver definisjon av dynamisk innhold som vi kaller komponentelementer.<br />
		&nbsp;</p>

		<h2>Hva gj�r komponenten for deg?</h2>
		Vi �nsket ikke � lage en maskinoversettelse, eller annen datamaskinbasert oversettelsesmetode.
		M�let er � st�tte oversettelsesprosessen, som du vil ha i et litt st�rre milj�.
		For �yeblikket har du kanskje noen eksterne skribenter som oppretter nytt innhold for deg, noen
		m� da ha kontroll over oversettelsen.<br />
		&nbsp;<br />
		Med Joom!Fish kan denne personen sjekke alt innhold for � se hva som enn� ikke er oversatt,
		se endret innhold eller bare behandle st�ttede spr�k. Basert p� dette kan ansvarlig person
		oversette innholdet n�r han/hun �nsker, og da med den teknikk som vedkommende selv foretrekker.</p>

		<h2>Hvordan virker det?</h2>
		<p>Veldig enkelt. I komponentmenyen finner du <a href="index2.php?option=com_joomfish&act=config_component">"Konfigurasjon"</a> for � endre
		alle generelle innstillinger for utseende, funksjoner osv.. Dette er de vanlige tingene.<br />
		Det du f�rst og fremst m� konfigurere her er for hvilken spr�k du vil tilby oversettelser.
		Bare velg de spr�k du vil bruke fra listen.</p>

		<p>Den andre delen er litt mer vanskelig. Definasjonen for komponentelementer er direkte knyttet til din
		database, det er derfor vi valgte � ikke gj�re denne konfigurasjonen tilgjengelig i administrasjonen!<br />
		Administrasjonen viser alle installerte innholdselement definasjoner i <a href="index2.php?option=com_joomfish&act=config_elements">"Innhold"</a>.
		Disse definisjonene ligger i XML-filer som er lagret i undermappen "contentelements" under din
		administrasjonsmappe for Joom!Fish.<br /> Om du �nsker � legge til nytt innhold eller endrer eksisterender
		m� du modifisere XML-filene, noe som ikke burde v�re for vanskelig.<br />
		Det mest viktige her.. du vil finne fine muligheter til � sjekke om XML-filene peker til tiktig informasjon.<br />
		&nbsp;<br />
		Om du legger til en ny XML-fil for en komponent/modul som enn� ikke er implementert m� du forsikre deg om at
		ogs� redigerer komponenten/modulens PHP-skript.</p>

		<p>For oversettelsesprosessen bruker du bare <a href="index2.php?option=com_joomfish&act=translate">"Oversettelser"</a>
		fra menyen. Der vil du finne en	liste over innholdet i din database, etter � ha valgt et element kan du enkelt
		arbeide med oversettelsen og til slutt lagre den i din database.</p>
	   &nbsp;<br />
		 <p>Det er alt s� langt. Noen ideer, problemer osv. - bare send meg en e-post!<br>
	   &nbsp;<br />
	   Alex</p>		</td>
		<td align="left" valign="top" nowrap>
		<img src="<?php echo $mosConfig_live_site;?>/administrator/components/com_joomfish/images/joomfish_slogan.png" border="0" alt="<?php echo _JOOMFISH_ADMIN_LANGUAGE_TITLE;?>"  />
		<p><span class="contentheading">Relaterte emner:</span>
		<ul>
			<li><a href="index2.php?option=com_joomfish&amp;act=credits">Joom!Fish-hjelp, bidragsytere og resten av universet</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=dinnermenu">Middagsmenyen <b>(Dokumentasjonen)</b></a></li>
			<li><a href="http://www.joomfish.net" target="_blank">Offisiell prosjektside</a></li>
			<li><a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">Offisielt prosjektforum</a></li>
			<li><a href="http://forge.joomla.org/sf/tracker/do/listArtifacts/projects.joomfish/tracker.bugs" target="_blank">Feiloppf�lging</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Dokumentasjon og veiledninger:</span>
		<ul>
			<li><a href="http://forge.joomla.org/sf/wiki/do/viewPage/projects.joomfish/wiki/HomePage" target="_blank">Prosjektets dokumentasjonsside</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=readme">Installasjonsmerknader (LesMeg)</a></li>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=changelog">Endringslogg</a></li>
			<li><a href="http://www.joomfish.net" target="_blank">Offisiell prosjektside</a></li>
			<li><a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">Offisielt prosjektforum</a></li>
			<li><a href="http://forge.joomla.org/sf/tracker/do/listArtifacts/projects.joomfish/tracker.bugs" target="_blank">Feiloppf�lging</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Lisens:</span>
		<ul>
			<li><a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license">Think Network �pen kildekode-lisens</a></li>
		</ul>
		</p>
		<p><span class="contentheading">Andre sider:</span>
		<ul>
			<li><a href="http://www.joomla.org" target="_blank">Joomla!</a></li>
		</ul>
		</p>
		<p>
		<span class="smallgrey"><strong>Bidragsytere:</strong></span><br />
		<span class="smallgrey">Til alle personer i Joom!Fish-fellesskapet!<br />
		N�v�rende utviklere:
		<ul>
			<li>Alex Kempkens (<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Geraint Edwards (<?php
			$x = "@";
			$y="joomfish.credits";
			$z="copyn.plus.com";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>Ivo Apostolov (<?php
			$x = "@";
			$y="joomfish";
			$z="unwe.net";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
			<li>L�vis Bisson</li>
			<li>Robin Muilwijk</li>
		</ul>
		<br />

		Logo-design av:
		<ul>
			<li>Tommy White (<?php
			$x = "@";
			$y="tommy";
			$z="tommywhite.com";
			$mail=$y.$x.$z;

			$mode=0;
			echo mosHTML::emailCloaking( $mail, $mode );
			?>)</li>
		</ul>

		&nbsp;<br />
		Spesielt takk for testing, gode forslag og oversettelser til:<br />
		Bernhard, Michael, Luc, Olivier, Robin, Rune</span><br />

		&nbsp;<br />
		<span class="smallgrey"><strong>Kontakt:</strong></span><br />
		<?php
			$x = "@";
			$y="JoomFish";
			$z="ThinkMatrix.net";
			$mail=$y.$x.$z;

			echo '<span class="smallgrey">' .mosHTML::emailCloaking( $mail, 1,  $mail) .'</span>';
		?>
		<br />
		&nbsp;<br />
		<span class="smallgrey"><strong>Versjon:</strong></span><br />
		<span class="smallgrey"><?php echo JoomFishManager::getVersion();?></span><br />
		&nbsp;<br />
		<span class="smallgrey"><strong>Kopirett:</strong></span><br />
		<span class="smallgrey">&copy; 2003-2006 </span><a href="http://www.ThinkNetwork.com" target="_blank" class="smallgrey"><span class="smallgrey">Think Network, Munich</span></a><br />
		<a href="index2.php?option=com_joomfish&amp;act=showInformation&amp;fileCode=license" class="smallgrey"><span class="smallgrey">�pen kildekode-lisens.</span></a>
		</p>
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
       <h2 style="color:red">Det oppstod et problem med din installasjon.</h2>
       <p>Mappen "<?php echo $mosConfig_absolute_path?>/mambots/system/" er ikke skrivbar.</p>
       <p>Du m�:</p>
       <ul>
       <li>- avinstallere Joomfish</li>
       <li>- endre filrettigheter</li>
       <li>- installere p� nytt</li>
       </ul>
       <br/>Takk.</p>
       </td>
	<?php
		HTML_joomfish::_footer($act, $option);

  }
	function showPostInstall( $success=false ) {
		global $act, $task, $option, $mosConfig_live_site, $mosConfig_absolute_path, $_VERSION;
		HTML_joomfish::_header();
	?>
     <td align="left" valign="top">
       <h2>Velkommen til Joom!Fish</h2>
       <p>
       The Joom!Fish component supports you with design and creation of multilingual websites.<br />
       This topic itself isn't that easy and so the handling of this component isn't easy.</p>
       Please make sure you read the following instructions carefully and try out a first example.
       After that you will find support and further help within the Joom!Fish forum at <a href="http://forge.joomla.org/sf/discussion/do/listForums/projects.joomfish/discussion" target="_blank">http://forge.joomla.org</a>.

       This version of the Joom!Fish is only working together with the Joomla Version 1.0.7+. If
	   you have a different version please refer to the project site to get a suitable version.</p>
	   <p>
	   Now please install all languages (there is no limit) you like to use within your site - using
	   the <a href="/administrator/index2.php?option=com_installer&element=language">Site -> Languages -> Install</a> function.<br />
	   After you have done the language installation it is needed to activate the languages and
	   give them a "natural" name. This is done with the language configuration of the Joom!Fish
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
	   	 Anything else? Please post your ideas and comments at <a href="http://forge.joomla.org/sf/sfmain/do/viewProject/projects.joomfish" target="_blank">viewProject/projects.joomfish</a>
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
