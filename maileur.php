<?
// Fonction pour parser les variables vers FLASH 
function Parse($variable,$valeur) { 
   echo "&" . $variable . "=" . utf8_encode(urlencode($valeur)); 
} 

// NB : $Adr_Envoi est l'adresse de l'envoyeur : on peut placer cette variable ici et non dans le flash
// cela permet de mettre par exemple votre propre adresse email pour une console mail sur votre site.

// composition du message

$entete = "From: <$mail> \n Reply-To: <$mail> \n"; // création de l'entête du message.

// Envoi du message
	$to = "lenny@japanim.fr";
	$sujet = "[awired.net] Formulaire de contact - $entreprise";
	
	$mail_OK = @mail($to, $sujet, $message,
     "From: <$mail>", "-fwebmaster@{$_SERVER['SERVER_NAME']}");
					
	// retour vers flash pour dire que le mail est envoyé ou non.
	if ($mail_OK == 1) {
	   Parse ("ok","1") ; // Tout c'est bien passé, le message a été envoyé.
	} else {
	   Parse ("ok","0") ; // problème dans l'envois du mail
	}

// NB : pour envoyer du HTML en PHP il faut mettre "Content-Type: text/html; charset=iso-8859-1" en 5ème argument de la fonction mail().
?>