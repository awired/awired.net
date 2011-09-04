<?php
//
// Copyright (C) 2004 W.H.Welch
// All rights reserved.
//
// This source file is part of the 404SEF Component, a Mambo 4.5.1
// custom Component By W.H.Welch - http://sef404.sourceforge.net/
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// Please note that the GPL states that any headers in files and
// Copyright notices as well as credits in headers, source files
// and output (screens, prints, etc.) can not be removed.
// You can extend them with your own credits, though...
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Italian Translation by Mac - http://www.simfly.it
//
// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Un accesso diretto a questa locazione non è consentito.' );

// admin interface
DEFINE('_COM_SEF_CONFIG','Configurazione<br/> di 404SEFx');
DEFINE('_COM_SEF_CONFIGDESC','Configura  tutte le funzionalità di 404SEFx');
DEFINE('_COM_SEF_HELP','Supporto <br/>di 404SEFx');
DEFINE('_COM_SEF_HELPDESC','Serve aiuto con 404SEFx?');
DEFINE('_COM_SEF_INFO','Documentazione<br/>di 404SEFx');
DEFINE('_COM_SEF_INFODESC','Vedi Sommario e Documentazione del progetto 404SEFx');
DEFINE('_COM_SEF_VIEWURL','Vedi/Modifica<br/>SEF Urls');
DEFINE('_COM_SEF_VIEWURLDESC','Vedi/Modifica SEF Urls');
DEFINE('_COM_SEF_VIEW404','Vedi/Modifica<br/>404 Logs');
DEFINE('_COM_SEF_VIEW404DESC','Vedi/Modifica 404 Logs');
DEFINE('_COM_SEF_VIEWCUSTOM','Vedi/Modifica<br/>Reindirizzamenti personalizzati');
DEFINE('_COM_SEF_VIEWCUSTOMDESC','Vedi/Modifica Reindirizzamenti personalizzati');
DEFINE('_COM_SEF_SUPPORT','Sito<br/>di supporto');
DEFINE('_COM_SEF_SUPPORTDESC','Apri il sito ufficiale di 404SEFx (in una nuova finestra)');
DEFINE('_COM_SEF_BACK','Torna al pannello di controllo di 404SEFx');
DEFINE('_COM_SEF_PURGEURL','Sfoltisci<br/>SEF Urls');
DEFINE('_COM_SEF_PURGEURLDESC','Sfoltisci SEF Urls');
DEFINE('_COM_SEF_PURGE404','Sfoltisci<br/>404 Logs');
DEFINE('_COM_SEF_PURGE404DESC','Sfoltisci 404 Logs');
DEFINE('_COM_SEF_PURGECUSTOM','Sfoltisci<br/>Reindirizzamenti personalizzati');
DEFINE('_COM_SEF_PURGECUSTOMDESC','Sfoltisci Reindirizzamenti personalizzati');
DEFINE('_COM_SEF_WARNDELETE','ATTENZIONE!!!<br/>stai per  cancellare ');
DEFINE('_COM_SEF_RECORD',' record');
DEFINE('_COM_SEF_RECORDS',' records');
DEFINE('_COM_SEF_NORECORDS','Nessun record trovato.');
DEFINE('_COM_SEF_PROCEED',' Procedi ');
DEFINE('_COM_SEF_OK',' OK ');
DEFINE('_COM_SEF_SUCCESSPURGE','I records sono stati sfoltiti');
DEFINE('_PREVIEW_CLOSE','Chiudi questa finestra');
DEFINE('_COM_SEF_EMPTYURL','Devi inserire una URL, per il reindirizzamento.');
DEFINE('_COM_SEF_NOLEADSLASH','La nuova SEF URL non deve avere la barra (slash) all\'inizio');
DEFINE('_COM_SEF_BADURL','La vecchia URL non-SEF deve iniziare con index.php');
DEFINE('_COM_SEF_URLEXIST','Questa URL è già esistente nel database!');
DEFINE('_COM_SEF_SHOW0','Mostra SEF Urls');
DEFINE('_COM_SEF_SHOW1','Mostra 404 Log');
DEFINE('_COM_SEF_SHOW2','Mostra Reindirizzamenti personalizzati');
DEFINE('_COM_SEF_INVALID_URL','URL NON VALIDA: questo link richiede un Itemid valido, ma non è stato trovato.<br/>SOLUZIONE: Crea un menu per questo articolo. Se non ce ne sono da pubblicare, basta crearlo.');
DEFINE('_COM_SEF_DEF_404_MSG','<h1>404: Non Trovato</h1><h4>Spiacente, ma il contenuto che stai cercando non è presente in questo server</h4>');
DEFINE('_COM_SEF_SELECT_DELETE','Seleziona un articolo da cancellare');
DEFINE('_COM_SEF_ASC',' (asc) ');
DEFINE('_COM_SEF_DESC',' (disc) ');
DEFINE('_COM_SEF_WRITEABLE',' <b><font color="green">Scrivibile</font></b>');
DEFINE('_COM_SEF_UNWRITEABLE',' <b><font color="red">Non scrivibile</font></b>');
DEFINE('_COM_SEF_USING_DEFAULT',' <b><font color="red">Usa i valori predefiniti</font></b>');
DEFINE('_COM_SEF_DISABLED',"<p class='error'>NOTA: Il supporto SEF in Joomla/Mambo è attualmente disabilitato. Per usare SEF, attivalo da <a href='".
	$GLOBALS['mosConfig_live_site']."/administrator/index2.php?option=com_config'>Configurazione Globale</a> pagina SEO.</p>");
DEFINE('_COM_SEF_TITLE_CONFIG',' Configurazione 404SEFx');
DEFINE('_COM_SEF_TITLE_BASIC','Configurazione base');
DEFINE('_COM_SEF_ENABLED','Attivato');
DEFINE('_COM_SEF_TT_ENABLED','Se settata su No sarà usato il SEF di Joomla/Mambo');
DEFINE('_COM_SEF_DEF_404_PAGE','<b>Pagina 404 standard</b><br>');
DEFINE('_COM_SEF_REPLACE_CHAR','Sostituzione carattere');
DEFINE('_COM_SEF_PAGEREP_CHAR','Page spacer character');
DEFINE('_COM_SEF_TT_PAGEREP_CHAR','Character to use to space page numbers away from the rest of the URL');
DEFINE('_COM_SEF_STRIP_CHAR','Strip characters');
DEFINE('_COM_SEF_TT_STRIP_CHAR','Characters to strip from the URL, separate with |');
DEFINE('_COM_SEF_FRIENDTRIM_CHAR','Trim friendly characters');
DEFINE('_COM_SEF_TT_FRIENDTRIM_CHAR','Characters to trim from around the URL, separate with |');
DEFINE('_COM_SEF_TT_REPLACE_CHAR','Carattere da usare per sostituire un carattere sconosciuto nella URL');
DEFINE('_COM_SEF_USE_ALIAS','Usa Alias del Titolo');
DEFINE('_COM_SEF_TT_USE_ALIAS','Setta su Sì per usare alias del titolo al posto del titolo nella URL');
DEFINE('_COM_SEF_SUFFIX','Suffisso del file');
DEFINE('_COM_SEF_TT_SUFFIX','Estensione da usare per \\\'files\\\'. Lascia in bianco  per disabilitare. Una scelta comune sarebbe \\\'html\\\'.');
DEFINE('_COM_SEF_ADDFILE','Default index file.');
DEFINE('_COM_SEF_TT_ADDFILE','File name to place after a blank url / when no file exists.  Useful for bots that crawl your site looking for a specific file in that place but returns a 404 because there is none there.');
DEFINE('_COM_SEF_PAGETEXT','Testo della pagina');
DEFINE('_COM_SEF_TT_PAGETEXT','Testo da aggiungere alla URL per pagine multiple. Usa %s per inserire un numero di pagina, per default sarà inserito alla fine. Se è definito un suffisso, sarà aggiunto alla fine della stringa.');
DEFINE('_COM_SEF_LOWER','Tutto minuscolo');
DEFINE('_COM_SEF_TT_LOWER','Converte in minuscolo tutti i caratteri della URL','Tutto minuscolo');
DEFINE('_COM_SEF_SHOW_SECT','Mostra sezione');
DEFINE('_COM_SEF_TT_SHOW_SECT','Setta Sì per includere il nome della sezione nella URL');
DEFINE('_COM_SEF_HIDE_CAT','Nascondi la Categoria');
DEFINE('_COM_SEF_TT_HIDE_CAT','Setta Sì per escludere il nome della categoria nella URL');
DEFINE('_COM_SEF_404PAGE','Pagina 404');
DEFINE('_COM_SEF_TT_404PAGE','Pagina di contenuto statico da usare come pagina 404 Errore Non Trovato (lo stato di pubblicazione non ha importanza)');
DEFINE('_COM_SEF_TITLE_ADV','Configurazione avanzata del componente');
DEFINE('_COM_SEF_TT_ADV','<b>Gestione normale</b><br/>elabora normalmente, se è presente una estensione avanzata, sarà usata quella. <br/><b>Non modificare</b><br/>non memorizzare nel DB e crea le URL SEF nel vecchio stile<br/><b>Salta</b><br/>non usare le URL SEF per questo componente<br/>');
DEFINE('_COM_SEF_TT_ADV4','Opzioni avanzate per ');
DEFINE('_COM_SEF_TITLE_MANAGER','404 SEF URL Manager');
DEFINE('_COM_SEF_VIEWMODE','Modo vista:');
DEFINE('_COM_SEF_SORTBY','Ordina per:');
DEFINE('_COM_SEF_HITS','Viste');
DEFINE('_COM_SEF_DATEADD','Data aggiunta');
DEFINE('_COM_SEF_SEFURL','Url SEF');
DEFINE('_COM_SEF_URL','Url');
DEFINE('_COM_SEF_REALURL','Url Reale');
DEFINE('_COM_SEF_EDIT','Modifica');
DEFINE('_COM_SEF_ADD','Aggiungi');
DEFINE('_COM_SEF_NEWURL','Nuova URL SEF');
DEFINE('_COM_SEF_TT_NEWURL','Solo reindirizzamenti relativi dalla root di Joomla/Mambo <i>senza</i> la barra (slash) iniziale');
DEFINE('_COM_SEF_OLDURL','Vecchia URL Non-SEF');
DEFINE('_COM_SEF_TT_OLDURL','Questa URL deve iniziare con index.php');
DEFINE('_COM_SEF_SAVEAS','Salva il reindirizzamento personalizzato');
DEFINE('_COM_SEF_TITLE_SUPPORT','Supporto 404 SEF');
DEFINE('_COM_SEF_HELPVIA','<b>L\'aiuto è disponibile nei seguenti forums:</b>');
DEFINE('_COM_SEF_OFFICIAL','Forum  del progetto ufficiale');
DEFINE('_COM_SEF_MAMBERS','Forum Mambers');
DEFINE('_COM_SEF_TITLE_PURGE','Sfoltisci il database di 404 SEF');
DEFINE('_COM_SEF_USE_DEFAULT','(Gestione normale)');
DEFINE('_COM_SEF_NOCACHE','Non modificare');
DEFINE('_COM_SEF_SKIP','Salta');
DEFINE('_COM_SEF_INSTALLED_VERS','Versione installata:');
DEFINE('_COM_SEF_COPYRIGHT','Copyright');
DEFINE('_COM_SEF_LICENSE','Licenza');
DEFINE('_COM_SEF_SUPPORT_404SEF','Supporto di 404SEF');
DEFINE('_COM_SEF_CONFIG_UPDATED','Configurazione aggiornata');
DEFINE('_COM_SEF_WRITE_ERROR','Errore scrivendo la configurazione');

// component interface
DEFINE('_COM_SEF_NOREAD','FATAL ERROR: impossibile leggere il file ');
DEFINE('_COM_SEF_CHK_PERMS','Per favore, controlla i permessi del file e assicurati che questo file sia leggibile.');
DEFINE('_COM_SEF_DEBUG_DATA_DUMP','DEBUG DATA DUMP COMPLETE: Caricamento pagina terminato');
DEFINE('_COM_SEF_STRANGE','Qualcosa di strano è successo. Questo non dovrebbe accadere<br />');

?>