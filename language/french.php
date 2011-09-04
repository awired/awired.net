<?php
/**
* @version $Id: french.php,v 2.0 2006/06/06 17:12:36 joomlafacile.com Exp $
* @package Joomla
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

// Site page note found
define( '_404', 'Nous sommes désolés mais la page demandée n\'a pu être trouvée.' );
define( '_404_RTS', 'Retour au site' );

define( '_SYSERR1', 'Driver de base de données non disponible' );
define( '_SYSERR2', 'Echec de la connexion au serveur de base de données' );
define( '_SYSERR3', 'Echec de la connexion à la base de données' );

/** common */
DEFINE('_LANGUAGE','fr'); // Paramètre initial 'en'
DEFINE('_NOT_AUTH','Vous n\'êtes pas autorisé(e) à accéder à cette ressource.<br />Vous devez vous connecter.');
DEFINE('_DO_LOGIN','Vous devez vous identifier.');
DEFINE('_VALID_AZ09','Saisissez un %s valide&nbsp;:  sans espace, au moins %d caractères, alphanumériques uniquement (0-9,a-z,A-Z)');
DEFINE('_VALID_AZ09_USER',"Saisissez un %s valide. Au moins %d caractères, alphanumériques uniquement 0-9,a-z,A-Z");
DEFINE('_CMN_YES','Oui');
DEFINE('_CMN_NO','Non');
DEFINE('_CMN_SHOW','Afficher');
DEFINE('_CMN_HIDE','Masquer');

DEFINE('_CMN_NAME','Nom');
DEFINE('_CMN_DESCRIPTION','Description');
DEFINE('_CMN_SAVE','Sauvegarder');
DEFINE('_CMN_APPLY','Appliquer');
DEFINE('_CMN_CANCEL','Annuler');
DEFINE('_CMN_PRINT','Version imprimable');
DEFINE('_CMN_PDF','Convertir en PDF');
DEFINE('_CMN_EMAIL','Suggérer par mail');
DEFINE('_ICON_SEP','|');
DEFINE('_CMN_PARENT','Parent');
DEFINE('_CMN_ORDERING','Trier');
DEFINE('_CMN_ACCESS','Niveau d\'accès');
DEFINE('_CMN_SELECT','Sélectionner');

DEFINE('_CMN_NEXT','Suivant');
DEFINE('_CMN_NEXT_ARROW','&gt;&gt;');
DEFINE('_CMN_PREV','Précédent');
DEFINE('_CMN_PREV_ARROW','&lt;&lt;');

DEFINE('_CMN_SORT_NONE','Aucun Tri');
DEFINE('_CMN_SORT_ASC','Tri Croissant');
DEFINE('_CMN_SORT_DESC','Tri Décroissant');

DEFINE('_CMN_NEW','Nouveau');
DEFINE('_CMN_NONE','Aucun');
DEFINE('_CMN_LEFT','Gauche');
DEFINE('_CMN_RIGHT','Droite');
DEFINE('_CMN_CENTER','Centre');
DEFINE('_CMN_ARCHIVE','Archiver');
DEFINE('_CMN_UNARCHIVE','Désarchiver');
DEFINE('_CMN_TOP','Haut');
DEFINE('_CMN_BOTTOM','Bas');

DEFINE('_CMN_PUBLISHED','Publié');
DEFINE('_CMN_UNPUBLISHED','Non publié');

DEFINE('_CMN_EDIT_HTML','Editer HTML');
DEFINE('_CMN_EDIT_CSS','Editer CSS');

DEFINE('_CMN_DELETE','Effacer');

DEFINE('_CMN_FOLDER','Répertoire');
DEFINE('_CMN_SUBFOLDER','Sous-répertoire');
DEFINE('_CMN_OPTIONAL','Facultatif');
DEFINE('_CMN_REQUIRED','Obligatoire');

DEFINE('_CMN_CONTINUE','Continuer');

DEFINE('_STATIC_CONTENT','Article statique');

DEFINE('_CMN_NEW_ITEM_LAST','Les nouveaux items sont placés en dernière position'); //item au lieu de element
DEFINE('_CMN_NEW_ITEM_FIRST','Les nouveaux items sont placés en première position'); //item au lieu de element
DEFINE('_LOGIN_INCOMPLETE','Merci de renseigner votre nom d\'utilisateur et votre mot de passe.');
DEFINE('_LOGIN_BLOCKED','Votre accès a été bloqué. Veuillez contacter un administrateur.');
DEFINE('_LOGIN_INCORRECT','Nom d\'utilisateur ou mot de passe incorrect. Merci de réessayer.');
DEFINE('_LOGIN_NOADMINS','Vous ne pouvez pas vous identifier. Aucun administrateur n\'a été déclaré.');
DEFINE('_CMN_JAVASCRIPT','!Avertissement! Votre navigateur doit autoriser le javascript pour bénéficier de toutes les fonctions de navigation du site.');

DEFINE('_NEW_MESSAGE','Un nouveau message privé vient de vous être envoyé');
DEFINE('_MESSAGE_FAILED','Cet utilisateur a bloqué sa boîte de réception. Envoi du message impossible.');

DEFINE('_CMN_IFRAMES', 'Cette option ne fonctionnera pas correctement car votre navigateur ne supporte pas les frames internes (iframes)');

DEFINE('_INSTALL_3PD_WARN','ATTENTION: Installer une extension tierce peut compromettre la sécurité de votre serveur. La mise à jour de Joomla! ne met pas à jour les extensions tierces installées sur votre site.<br />Pour plus d\'information sur la sécurisation de votre site vous pouvez consulter le <a href="http://forum.joomlafacile.com/showthread.php?t=22432" target="_blank" style="color: blue; text-decoration: underline;">forum Joomla.fr</a>. La liste des extensions vulnérables est consultable à <a href="http://forum.joomlafacile.com/showthread.php?t=23533" target="_blank" style="color: blue; text-decoration: underline;"> cette adresse</a>.');
DEFINE('_INSTALL_WARN','Pour votre sécurité, merci de supprimer le répertoire d\'installation ainsi que tous les fichiers et sous-dossiers qu\'il contient. Ensuite vous pourrez rafraîchir cette page');
DEFINE('_TEMPLATE_WARN','<font color=\"red\"><B>Fichier template non trouvé! Le fichier recherché&nbsp;:</b></font>');
DEFINE('_NO_PARAMS','Aucun paramètre défini pour ce module');
DEFINE('_HANDLER','Aucun gestionnaire n\'a été défini pour ce type');

/** mambots */
DEFINE('_TOC_JUMPTO','Index de l\'article');

/**  content */
DEFINE('_READ_MORE','Lire la suite...');
DEFINE('_READ_MORE_REGISTER','Identifiez-vous pour lire la suite...');
DEFINE('_MORE','Suite...');
DEFINE('_ON_NEW_CONTENT', 'Un nouveau contenu a été soumis par [ %s ] intitulé [ %s ] dans la section [ %s ] et la catégorie [ %s ]' );
DEFINE('_SEL_CATEGORY','- Sélectionner une catégorie -');
DEFINE('_SEL_SECTION','- Sélectionner une section -');
DEFINE('_SEL_AUTHOR','- Sélectionner un auteur -');
DEFINE('_SEL_POSITION','- Sélectionner une position -');
DEFINE('_SEL_TYPE','- Sélectionner un type -');
DEFINE('_EMPTY_CATEGORY','Cette catégorie ne contient aucun article publié');
DEFINE('_EMPTY_BLOG','Aucune publication à afficher');
DEFINE('_NOT_EXIST','Cette page est indisponible.<br />Veuillez faire un autre choix dans le menu général.');
DEFINE('_SUBMIT_BUTTON','Envoyer');

/** classes/html/modules.php */
DEFINE('_BUTTON_VOTE','Voter');
DEFINE('_BUTTON_RESULTS','Résultats');
DEFINE('_USERNAME','Nom d\'utilisateur');
DEFINE('_LOST_PASSWORD','Perdu');
DEFINE('_PASSWORD','Mot de passe');
DEFINE('_BUTTON_LOGIN','Se connecter');
DEFINE('_BUTTON_LOGOUT','Se déconnecter');
DEFINE('_NO_ACCOUNT','Pas encore de compte&nbsp;?');
DEFINE('_CREATE_ACCOUNT','Enregistrez-vous');
DEFINE('_VOTE_POOR','Faible');
DEFINE('_VOTE_BEST','Meilleur');
DEFINE('_USER_RATING','Appréciation des utilisateurs');
DEFINE('_RATE_BUTTON','Appréciation');
DEFINE('_REMEMBER_ME','Se souvenir de moi');

/** contact.php */
DEFINE('_ENQUIRY','Demande');
DEFINE('_ENQUIRY_TEXT','Une demande de contact a été formulée par e-mail via %s de la part de');
DEFINE('_COPY_TEXT','Ceci est une copie du message que vous avez envoyé à l\'administrateur de %s');
DEFINE('_COPY_SUBJECT','Copie de: ');
DEFINE('_THANK_MESSAGE','Merci pour votre message');
DEFINE('_CLOAKING','Cet e-mail est protégé contre les robots collecteurs de mails, votre navigateur doit accepter le Javascript pour le voir');
DEFINE('_CONTACT_HEADER_NAME','Nom');
DEFINE('_CONTACT_HEADER_POS','Titre');
DEFINE('_CONTACT_HEADER_EMAIL','E-mail');
DEFINE('_CONTACT_HEADER_PHONE','Téléphone');
DEFINE('_CONTACT_HEADER_FAX','Fax');
DEFINE('_CONTACTS_DESC','La liste des contacts du site.');
DEFINE('_CONTACT_MORE_THAN','Vous ne pouvez pas saisir plus d\'une adresse e-mail.');

/** classes/html/contact.php */
DEFINE('_CONTACT_TITLE','Contact');
DEFINE('_EMAIL_DESCRIPTION','Envoyez un e-mail à ce contact&nbsp;:');
DEFINE('_NAME_PROMPT',' Entrez votre nom&nbsp;:');
DEFINE('_EMAIL_PROMPT',' Saisissez votre adresse e-mail&nbsp;:');
DEFINE('_MESSAGE_PROMPT',' Saisissez votre message&nbsp;:');
DEFINE('_SEND_BUTTON','Envoyer');
DEFINE('_CONTACT_FORM_NC','Assurez-vous d\'avoir rempli correctement votre formulaire avant de le valider.');
DEFINE('_CONTACT_TELEPHONE','Téléphone&nbsp;:');
DEFINE('_CONTACT_MOBILE','Mobile&nbsp;:');
DEFINE('_CONTACT_FAX','Télécopie&nbsp;:');
DEFINE('_CONTACT_EMAIL','E-mail&nbsp;:');
DEFINE('_CONTACT_NAME','Nom&nbsp;:');
DEFINE('_CONTACT_POSITION','Titre&nbsp;:');
DEFINE('_CONTACT_ADDRESS','Adresse&nbsp;:');
DEFINE('_CONTACT_MISC','Information&nbsp;:');
DEFINE('_CONTACT_SEL','Sélectionnez un contact&nbsp;:');
DEFINE('_CONTACT_NONE','Aucun profil de contact défini.');
DEFINE('_CONTACT_ONE_EMAIL','Ne saisissez qu\'une adresse e-mail.');
DEFINE('_EMAIL_A_COPY','Recevoir une copie de cet e-mail');
DEFINE('_CONTACT_DOWNLOAD_AS','Télécharger les informations comme');
DEFINE('_VCARD','VCard');

/** pageNavigation */
DEFINE('_PN_LT','&lt;');
DEFINE('_PN_RT','&gt;');
DEFINE('_PN_PAGE','Page');
DEFINE('_PN_OF','sur');
DEFINE('_PN_START','Début');
DEFINE('_PN_PREVIOUS','Précédente');
DEFINE('_PN_NEXT','Suivante');
DEFINE('_PN_END','Fin');
DEFINE('_PN_DISPLAY_NR','Affiche #');
DEFINE('_PN_RESULTS','Résultats');

/** emailfriend */
DEFINE('_EMAIL_TITLE','Suggérer l\'article à un ami');
DEFINE('_EMAIL_FRIEND','Suggérer l\'article à un ami');
DEFINE('_EMAIL_FRIEND_ADDR','Son adresse e-mail&nbsp;:');
DEFINE('_EMAIL_YOUR_NAME','Votre nom&nbsp;:');
DEFINE('_EMAIL_YOUR_MAIL','Votre adresse e-mail&nbsp;:');
DEFINE('_SUBJECT_PROMPT','Objet du message&nbsp;:');
DEFINE('_BUTTON_SUBMIT_MAIL','Envoyer');
DEFINE('_BUTTON_CANCEL','Annuler');
DEFINE('_EMAIL_ERR_NOINFO','Vous devez saisir une adresse e-mail valide');
DEFINE('_EMAIL_MSG','Une page du site %s vous est suggérée par %s ( %s ).
Vous pouvez consulter la page en question à l\'adresse suivante:
%s
Cordialement.');
DEFINE('_EMAIL_INFO','Publication envoyée par');
DEFINE('_EMAIL_SENT','Cette publication a été suggérée à');
DEFINE('_PROMPT_CLOSE','Fermer la fenêtre');

/** classes/html/content.php */
DEFINE('_AUTHOR_BY', ' Soumis par'); 
DEFINE('_WRITTEN_BY', ' Écrit par');
DEFINE('_LAST_UPDATED', ' Dernière mise à jour&nbsp;:');
DEFINE('_BACK','[&nbsp;Retour&nbsp;]');
DEFINE('_LEGEND','Légende');
DEFINE('_DATE','Date');
DEFINE('_ORDER_DROPDOWN','Trier');
DEFINE('_HEADER_TITLE','Titre de la publication');
DEFINE('_HEADER_AUTHOR','Auteur');
DEFINE('_HEADER_SUBMITTED','Soumis');
DEFINE('_HEADER_HITS','Clics');
DEFINE('_E_EDIT','Editer');
DEFINE('_E_ADD','Ajouter');
DEFINE('_E_WARNUSER','Veuillez valider ou annuler la modification en cours'); //ajout veuillez
DEFINE('_E_WARNTITLE','Le titre est obligatoire');
DEFINE('_E_WARNTEXT','Le texte d\'introduction est obligatoire');
DEFINE('_E_WARNCAT','Veuillez sélectionner une catégorie'); //ajout veuillez
DEFINE('_E_CONTENT','Contenu');
DEFINE('_E_TITLE','Titre&nbsp;:');
DEFINE('_E_CATEGORY','Catégorie&nbsp;:');
DEFINE('_E_INTRO','Texte d\'introduction');
DEFINE('_E_MAIN','Texte principal');
DEFINE('_E_MOSIMAGE','INSERT {mosimage}'); // Ne pas traduire c'est une commande SQL
DEFINE('_E_IMAGES','Images');
DEFINE('_E_GALLERY_IMAGES','Galerie d\'images');
DEFINE('_E_CONTENT_IMAGES','Images sélectionnées');
DEFINE('_E_EDIT_IMAGE','Propriétés de l\'image');
DEFINE('_E_NO_IMAGE','Aucune image');
DEFINE('_E_INSERT','Insertion');
DEFINE('_E_UP','Au dessus');
DEFINE('_E_DOWN','Au dessous');
DEFINE('_E_REMOVE','Suppression');
DEFINE('_E_SOURCE','Source&nbsp;:');
DEFINE('_E_ALIGN','Alignement&nbsp;:');
DEFINE('_E_ALT','Balise alt&nbsp;:');
DEFINE('_E_BORDER','Bordure&nbsp;:');
DEFINE('_E_CAPTION','Légende&nbsp;:');
DEFINE('_E_CAPTION_POSITION','Position de la légende');
DEFINE('_E_CAPTION_ALIGN','Alignement de la légende');
DEFINE('_E_CAPTION_WIDTH','Largeur de la légende');
DEFINE('_E_APPLY','Appliquer');
DEFINE('_E_PUBLISHING','Publication');
DEFINE('_E_STATE','Etat&nbsp;:');
DEFINE('_E_AUTHOR_ALIAS','Alias de l\'auteur&nbsp;:');
DEFINE('_E_ACCESS_LEVEL','Niveau d\'accès&nbsp;:');
DEFINE('_E_ORDERING','Ordre&nbsp;:');
DEFINE('_E_START_PUB','Début de publication&nbsp;:');
DEFINE('_E_FINISH_PUB','Fin de publication&nbsp;:');
DEFINE('_E_SHOW_FP','Afficher en page d\'accueil&nbsp;:');
DEFINE('_E_HIDE_TITLE','Masquer le titre de l\'item&nbsp;:'); //item au lieu de element
DEFINE('_E_METADATA','Métadonnées');
DEFINE('_E_M_DESC','Description&nbsp;:');
DEFINE('_E_M_KEY','Mots-clés&nbsp;:');
DEFINE('_E_SUBJECT','Sujet&nbsp;:');
DEFINE('_E_EXPIRES','Date d\'expiration&nbsp;:');
DEFINE('_E_VERSION','Version&nbsp;:');
DEFINE('_E_ABOUT','A propos');
DEFINE('_E_CREATED','Créé&nbsp;:');
DEFINE('_E_LAST_MOD','Modifié le&nbsp;:');
DEFINE('_E_HITS','Clics&nbsp;:');
DEFINE('_E_SAVE','Sauvegarder');
DEFINE('_E_CANCEL','Abandonner');
DEFINE('_E_REGISTERED','Utilisateurs enregistrés seulement');
DEFINE('_E_ITEM_INFO','Info sur l\'article');
DEFINE('_E_ITEM_SAVED','Publication sauvegardée avec succès.');
DEFINE('_ITEM_PREVIOUS','&lt; Précédent');
DEFINE('_ITEM_NEXT','Suivant &gt;');
DEFINE('_KEY_NOT_FOUND','Clé non trouvée');


/** content.php */
DEFINE('_SECTION_ARCHIVE_EMPTY','Cette section ne contient aucune archive.');	
DEFINE('_CATEGORY_ARCHIVE_EMPTY','Cette catégorie ne contient aucune archive.');
DEFINE('_HEADER_SECTION_ARCHIVE','Archives par section');
DEFINE('_HEADER_CATEGORY_ARCHIVE','Archives par catégorie');
DEFINE('_ARCHIVE_SEARCH_FAILURE','Il n\'y a pas d\'archives pour %s %s');	// les valeurs %s représentent mois et année
DEFINE('_ARCHIVE_SEARCH_SUCCESS','Voici les Archives de %s %s');	// les valeurs %s représentent mois et année
DEFINE('_FILTER','Filtre');
DEFINE('_ORDER_DROPDOWN_DA','Date asc');
DEFINE('_ORDER_DROPDOWN_DD','Date desc');
DEFINE('_ORDER_DROPDOWN_TA','Titre asc');
DEFINE('_ORDER_DROPDOWN_TD','Titre desc');
DEFINE('_ORDER_DROPDOWN_HA','Clics asc');
DEFINE('_ORDER_DROPDOWN_HD','Clics desc');
DEFINE('_ORDER_DROPDOWN_AUA','Auteur asc');
DEFINE('_ORDER_DROPDOWN_AUD','Auteur desc');
DEFINE('_ORDER_DROPDOWN_O','Ordre');

/** poll.php */
DEFINE('_ALERT_ENABLED','Vous devez autoriser les cookies.'); 
DEFINE('_ALREADY_VOTE','Vous avez déja voté pour ce sondage aujourd`hui.');
DEFINE('_NO_SELECTION','Vous n`avez rien sélectionné, veuillez recommencer');
DEFINE('_THANKS','Merci d`avoir voté. Pour voir les résultats, cliquez sur le bouton Résultats');
DEFINE('_SELECT_POLL','Veuillez sélectionner un sondage dans la liste');

/** classes/html/poll.php */
DEFINE('_JAN','Janvier');
DEFINE('_FEB','Février');
DEFINE('_MAR','Mars');
DEFINE('_APR','Avril');
DEFINE('_MAY','Mai');
DEFINE('_JUN','Juin');
DEFINE('_JUL','Juillet');
DEFINE('_AUG','Août');
DEFINE('_SEP','Septembre');
DEFINE('_OCT','Octobre');
DEFINE('_NOV','Novembre');
DEFINE('_DEC','Décembre');
DEFINE('_POLL_TITLE','Résultats du sondage');
DEFINE('_SURVEY_TITLE','Titre du sondage');
DEFINE('_NUM_VOTERS','Nombre de votants');
DEFINE('_FIRST_VOTE','Premier vote');
DEFINE('_LAST_VOTE','Dernier vote');
DEFINE('_SEL_POLL','Sélectionner un sondage:');
DEFINE('_NO_RESULTS','Il n\'y a pas encore de résultats pour ce sondage.');

/** registration.php */
DEFINE('_ERROR_PASS','Aucun utilisateur correspondant n\'a été trouvé');
DEFINE('_NEWPASS_MSG','Le compte utilisateur $checkusername est associé à cet e-mail.\n'
.' Un utilisateur de $mosConfig_live_site a demandé un nouveau mot de passe.\n\n'
.' Votre nouveau mot de passe est: $newpass\n\n Vous n\'aviez pas demandé à changer? Ne soyez pas dérouté(e)!'
.' Vous êtes le(la) seul(e) à voir ce message. Ainsi, si vous pensez que ceci est une erreur, connectez vous juste avec votre'
.' nouveau mot de passe puis changez-le de nouveau dans votre profil.');
DEFINE('_NEWPASS_SUB','$_sitename :: Nouveau mot de passe pour - $checkusername'); 
DEFINE('_NEWPASS_SENT','<span class="componentheading">Un nouveau mot de passe a été créé et vous a été envoyé.</span>');
DEFINE('_REGWARN_NAME','Saisissez votre nom.'); 
DEFINE('_REGWARN_UNAME','Saisissez un nom d\'utilisateur.'); 
DEFINE('_REGWARN_MAIL','Saisissez une adresse e-mail valide.');
DEFINE('_REGWARN_PASS','Saisissez un mot de passe valide&nbsp;: sans espace, d\'au moins 6 caractères, alphanumériques uniquement (0-9,a-z,A-Z)'); //
DEFINE('_REGWARN_VPASS1','Vérifiez le mot de passe.');
DEFINE('_REGWARN_VPASS2','Le mot de passe ne correspond pas, veuillez réessayer.');
DEFINE('_REGWARN_INUSE','Ce nom d\'utilisateur / mot de passe existe déjà. Veuillez réessayer.');
DEFINE('_REGWARN_EMAIL_INUSE', 'Cet e-mail est déjà présent dans notre base de données. Si vous avez perdu votre mot de passe, utilisez la fonction de récupération et nous vous enverrons un nouveau mot de passe à cette adresse e-mail.');
DEFINE('_SEND_SUB','Profil de %s inscrit à %s');
DEFINE('_USEND_MSG_ACTIVATE', 'Bonjour %s,

Merci de vous être enregistré(e) sur %s. Votre compte a été créé correctement, il ne vous reste plus qu\'à l\'activer en cliquant sur le lien ci-dessous:
%s

Après activation de votre compte vous pourrez vous connecter à %s en utilisant le nom d\'utilisateur et le mot de passe suivant:

Nom d\'Utilisateur - %s
Mot de passe - %s');
DEFINE('_USEND_MSG', 'Bonjour %s,

Merci de vous être enregistré(e) sur %s.

Vous pouvez maintenant vous connecter à %s en utilisant les nom d\'utilisateur et mot de passe choisis lors de votre inscription.');
DEFINE('_USEND_MSG_NOPASS','Bonjour $name,\n\nVous avez été inscrit(e) comme utilisateur $mosConfig_live_site.\n'
.'Vous pouvez vous connecter au site $mosConfig_live_site avec le nom d\'utilisateur et le mot de passe que vous avez choisi.\n\n'
.'Ne répondez pas à cet e-mail. Il a été envoyé automatiquement pour votre information\n');
DEFINE('_ASEND_MSG','Bonjour %s,

un nouvel utilisateur s\'est inscrit à %s.
Cet e-mail contient son profil:

Nom - %s
e-mail - %s
Nom d\'Utilisateur - %s

Ne répondez pas à ce message, il a été généré automatiquement pour votre information');
DEFINE('_REG_COMPLETE_NOPASS','<div class="componentheading">Inscription complète.</div><br />'
.'Vous pouvez vous connecter.<br />');
DEFINE('_REG_COMPLETE', '<div class="componentheading">Inscription complète.</div><br />Vous pouvez maintenant vous connecter.');
DEFINE('_REG_COMPLETE_ACTIVATE', '<div class="componentheading">Enregistrement effectué.</div><br />Votre profil a été créé correctement pour confirmer et finir votre enregistrement nous vous avons adressé un lien d\'activation par e-mail. Avant de vous connecter sur ce site, il est impératif d\'activer votre compte en utilisant le lien contenu dans cet e-mail d\'activation.');
DEFINE('_REG_ACTIVATE_COMPLETE', '<div class="componentheading">Activation effectuée.</div><br />Votre profil a été correctement activé. Vous pouvez maintenant vous connecter en utilisant le nom d\'utilisateur et mot de passe choisis lors de votre inscription.');
DEFINE('_REG_ACTIVATE_NOT_FOUND', '<div class="componentheading">Lien d\'activation invalide.</div><br />Le lien fait référence à un profil inexitsant ou déjà activé dans notre base de données.');
DEFINE('_REG_ACTIVATE_FAILURE', '<div class="componentheading">L\'activation de votre compte a échoué!</div><br />Veuillez contacter l\'administrateur du site.');

/** classes/html/registration.php */
DEFINE('_PROMPT_PASSWORD','Perdu votre mot de passe&nbsp;?'); 
DEFINE('_NEW_PASS_DESC','Entrez votre nom d\'utilisateur et votre adresse e-mail, puis cliquez sur le bouton envoyer le mot de passe.<br />'
.'Vous recevrez un nouveau mot de passe rapidement. Utilisez-le pour vous identifier sur le site.'); 
DEFINE('_PROMPT_UNAME','Nom d\'utilisateur&nbsp;:');
DEFINE('_PROMPT_EMAIL','Adresse e-mail&nbsp;:');
DEFINE('_BUTTON_SEND_PASS','Envoyer le mot de passe');
DEFINE('_REGISTER_TITLE','Inscription');
DEFINE('_REGISTER_NAME','Nom&nbsp;:');
DEFINE('_REGISTER_UNAME','Nom d\'utilisateur&nbsp;:');
DEFINE('_REGISTER_EMAIL','e-mail&nbsp;:');
DEFINE('_REGISTER_PASS','Mot de passe&nbsp;:');
DEFINE('_REGISTER_VPASS','Vérification du mot de passe&nbsp;:');
DEFINE('_REGISTER_REQUIRED','Les champs marqués avec un astérisque (*) sont obligatoires.');
DEFINE('_BUTTON_SEND_REG','Terminer l\'inscription'); 
DEFINE('_SENDING_PASSWORD','Votre mot de passe sera envoyé à l\'adresse e-mail ci-dessus.<br />Une fois que vous l\'aurez reçu'
.' vous pourrez vous identifier et le modifier à votre convenance dans votre profil.');

/** classes/html/search.php */
DEFINE('_SEARCH_TITLE','Rechercher');
DEFINE('_PROMPT_KEYWORD','Rechercher les mots-clés');
DEFINE('_SEARCH_MATCHES','%d résultat(s)');
DEFINE('_CONCLUSION','$totalRows résultat(s) trouvé(s) au total.  Rechercher <b>$searchword</b> avec');
DEFINE('_NOKEYWORD','Aucun résultats pour cette recherche');
DEFINE('_IGNOREKEYWORD','Un ou plusieurs mots communs ont été ignorés');
DEFINE('_SEARCH_ANYWORDS','Un des termes');
DEFINE('_SEARCH_ALLWORDS','Tous les termes');
DEFINE('_SEARCH_PHRASE','Phrase exacte');
DEFINE('_SEARCH_NEWEST','Plus récent en premier');
DEFINE('_SEARCH_OLDEST','Plus ancien en premier');
DEFINE('_SEARCH_POPULAR','Plus populaire');
DEFINE('_SEARCH_ALPHABETICAL','Alphabétique');
DEFINE('_SEARCH_CATEGORY','Section/Catégorie');
DEFINE('_SEARCH_MESSAGE','Recherche mini 3 lettres et maxi 20 lettres');
DEFINE('_SEARCH_ARCHIVED','Archivée');
DEFINE('_SEARCH_CATBLOG','Categorie Blog');
DEFINE('_SEARCH_CATLIST','Categorie Liste');
DEFINE('_SEARCH_NEWSFEEDS','Flux RSS');
DEFINE('_SEARCH_SECLIST','Section Liste');
DEFINE('_SEARCH_SECBLOG','Section Blog');

/** templates/*.php */
DEFINE('_ISO','charset=iso-8859-1');
DEFINE('_DATE_FORMAT','l, F d Y');  //Uses PHP's DATE Command Format - Depreciated
/**
* Modifier la ligne en accord avec le format de date que vous souhaitez voir apparaitre sur votre site
*
*e.g. DEFINE('_DATE_FORMAT_LC','%A, %d %B %Y %H:%M'); // Référez-vous à l'utilisation de la commande PHP strftime
*/
DEFINE('_DATE_FORMAT_LC','%d-%m-%Y'); // Référez-vous à l'utilisation de la commande PHP strftime
/** la ligne initiale dans le fichier source en anglais :  DEFINE('_DATE_FORMAT_LC2','%A, %d %B %Y %H:%M'); */
DEFINE('_DATE_FORMAT_LC2','%d-%m-%Y %H:%M');
DEFINE('_SEARCH_BOX','Rechercher...');
DEFINE('_NEWSFLASH_BOX','Annonce');
DEFINE('_MAINMENU_BOX','Menu Principal');

/** classes/html/usermenu.php */
DEFINE('_UMENU_TITLE','Menu Utilisateur');
DEFINE('_HI','Bonjour, ');

/** user.php */
DEFINE('_SAVE_ERR','Veuillez remplir tous les champs du formulaire, merci.');
DEFINE('_THANK_SUB','Merci pour votre proposition. Votre proposition sera vérifiée  avant d\'être publiée sur le site.');
DEFINE('_THANK_SUB_PUB','Merci de nous avoir proposé cet article.');
DEFINE('_UP_SIZE','Vous ne pouvez pas transmettre des fichiers de plus de 15ko.'); 
DEFINE('_UP_EXISTS','Une image portant le nom $userfile_name existe déjà. Veuillez renommer votre fichier avant de réessayer.');
DEFINE('_UP_COPY_FAIL','La copie a échoué');
DEFINE('_UP_TYPE_WARN','Seuls les fichiers gif ou jpg sont autorisés.');
DEFINE('_MAIL_SUB','Publication soumise par un membre'); 
DEFINE('_MAIL_MSG','Bonjour $adminName,\n\nUn nouveau texte $type, $title, a été soumis par $author'
.' pour le site $live_site website. \n' 
.'Rendez-vous sur $mosConfig_live_site/administrator pour vérifier et valider ce $type.\n\n'
.'Ne répondez pas à cet e-mail, il a été généré automatiquement pour votre information\n');
DEFINE('_PASS_VERR1','Si vous modifiez votre mot de passe, retapez-le pour vérification.');
DEFINE('_PASS_VERR2','Si vous modifiez votre mot de passe, assurez-vous que le mot de passe et sa vérification concordent.');
DEFINE('_UNAME_INUSE','Ce nom d\'utilisateur est déjà utilisé.');
DEFINE('_UPDATE','Mise à jour');
DEFINE('_USER_DETAILS_SAVE','Votre profil a été sauvegardé.');
DEFINE('_USER_LOGIN','Identification Utilisateur');

/** components/com_user */
DEFINE('_EDIT_TITLE','Editer vos informations personnelles'); 
DEFINE('_YOUR_NAME','Votre nom&nbsp;:');
DEFINE('_EMAIL','E-mail&nbsp;:');
DEFINE('_UNAME','Nom d\'utilisateur&nbsp;:');
DEFINE('_PASS','Mot de passe&nbsp;:');
DEFINE('_VPASS','Vérifiez votre mot de passe&nbsp;:');
DEFINE('_SUBMIT_SUCCESS','Envoi réussi');
DEFINE('_SUBMIT_SUCCESS_DESC','Votre article a été proposé avec succés à nos administrateurs. Il sera vérifié et validé avant d\'être plublié sur le site.');
DEFINE('_WELCOME','Bienvenue');
DEFINE('_WELCOME_DESC','<span class="componentheading">Bienvenue dans la partie utilisateur de notre site</span>');
DEFINE('_CONF_CHECKED_IN','Tous vos éléments sont considérés comme vérifiés/libérés');
DEFINE('_CHECK_TABLE','Table de Vérification');
DEFINE('_CHECKED_IN','Vérifié ');
DEFINE('_CHECKED_IN_ITEMS',' items');
DEFINE('_PASS_MATCH','Mots de passe ne correspondent pas');

/** components/com_banners */
DEFINE('_BNR_CLIENT_NAME','Vous devez spécifier un nom pour ce client.');
DEFINE('_BNR_CONTACT','Vous devez spécifier un contact pour ce client.');
DEFINE('_BNR_VALID_EMAIL','Vous devez spécifier un e-mail valide pour ce client.');
DEFINE('_BNR_CLIENT','Vous devez sélectionner un client,');
DEFINE('_BNR_NAME','Vous devez spécifier un nom pour cette banniére.');
DEFINE('_BNR_IMAGE','Vous devez sélectionner une image pour cette bannière.');
DEFINE('_BNR_URL','Vous devez préciser une URL ou un code personnalisé pour cette bannière.');

/** components/com_login */
DEFINE('_ALREADY_LOGIN','Vous êtes déjà connecté(e)');
DEFINE('_LOGOUT','Cliquez ici pour vous déconnecter');
DEFINE('_LOGIN_TEXT','Utilisez le formulaire d\'identification ci-contre pour obtenir un accès complet');
DEFINE('_LOGIN_SUCCESS','Vous étes connecté(e)');
DEFINE('_LOGOUT_SUCCESS','Vous étes déconnecté(e)');
DEFINE('_LOGIN_DESCRIPTION','Pour accéder à la partie privée merci de vous identifier');
DEFINE('_LOGOUT_DESCRIPTION','Vous êtes connecté(e) à la partie privée du site');

/** components/com_weblinks */
DEFINE('_WEBLINKS_TITLE','Liens Web');
DEFINE('_WEBLINKS_DESC','Nous surfons souvent sur le Web. Dès que nous rencontrons un site intéressant, nous le répertorions'
.' pour vous.  <br />Sélectionnez dans la liste proposée un de nos liens Web.');
DEFINE('_HEADER_TITLE_WEBLINKS','Liens Web');
DEFINE('_SECTION','Section&nbsp;:');
DEFINE('_SUBMIT_LINK','Soumettre un Lien Web');
DEFINE('_URL','URL&nbsp;:');
DEFINE('_URL_DESC','Description&nbsp;:');
DEFINE('_NAME','Nom&nbsp;:');
DEFINE('_WEBLINK_EXIST','il existe déjà un Lien Web qui porte ce nom, merci de réessayer.');
DEFINE('_WEBLINK_TITLE','Votre Lien Web doit contenir un titre.');

/** components/com_newfeeds */
DEFINE('_FEED_NAME','Nom du Fil d\'actualité'); 
DEFINE('_FEED_ARTICLES','# Articles');
DEFINE('_FEED_LINK','Lien vers le Fil d\'actualité'); 

/** whos_online.php */
DEFINE('_WE_HAVE', 'Il y a actuellement ');
DEFINE('_AND', ' et ');
DEFINE('_GUEST_COUNT','%s invité');
DEFINE('_GUESTS_COUNT','%s invités');
DEFINE('_MEMBER_COUNT','%s membre');
DEFINE('_MEMBERS_COUNT','%s membres');
DEFINE('_ONLINE',' en ligne');
DEFINE('_NONE','Aucun utilisateur enregistré en ligne');

/** modules/mod_banners */
DEFINE('_BANNER_ALT','Publicité');

/** modules/mod_random_image */
DEFINE('_NO_IMAGES','Aucune image');

/** modules/mod_stats.php */
DEFINE('_TIME_STAT','Heure');
DEFINE('_MEMBERS_STAT','Membres');
DEFINE('_HITS_STAT','Clics');
DEFINE('_NEWS_STAT','Publications');
DEFINE('_LINKS_STAT','Liens');
DEFINE('_VISITORS','Visiteurs');

/** /adminstrator/components/com_menus/admin.menus.html.php */
DEFINE('_MAINMENU_HOME','* Ceci est le premier item publié dans ce menu [mainmenu] c\'est la page d\'accueil du site par défaut *'); //item au lieu de element
DEFINE('_MAINMENU_DEL','* Vous ne pouvez pas effacer ce menu, car il est nécessaire au bon fonctionnement de Joomla *');
DEFINE('_MENU_GROUP','* Quelques \'Types de Menu\' existent dans plus d\'un groupe *');


/** administrators/components/com_users */
DEFINE('_NEW_USER_MESSAGE_SUBJECT', 'Votre Profil Utilisateur' );
DEFINE('_NEW_USER_MESSAGE', 'Bonjour %s,


Vous avez été inscrit(e) comme membre du site %s par un administrateur.

Cet e-mail contient votre nom d\'utilisateur et mot de passe qui vous permettent de vous identifier sur %s:

Nom d\'Utilisateur - %s
Mot de passe - %s


Merci de ne pas répondre à cet e-mail. Il a été envoyé automatiquement pour votre information');

/** administrators/components/com_massmail */
DEFINE('_MASSMAIL_MESSAGE', "Ceci est un e-mail de \'%s\'

Message:
" );

/** includes/pdf.php */
DEFINE('_PDF_GENERATED','Généré:');
DEFINE('_PDF_POWERED','Propulsé par Joomla!');

?>
