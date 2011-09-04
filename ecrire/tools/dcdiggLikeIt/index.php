<?php
$plugin_url = 'tools.php?p=dcdiggLikeIt';
$postsperpage = 20;

require_once dirname(__FILE__).'/functions.php';

# Utilisation
$str = <<<EOF

<h3>Utilisation</h3>
<dd>Vous pouvez placer les fonctions ci-dessous n importe ou dans le fichier post.php de votre theme.<br/>
Toutes ces fonctions ont 2 parametres le premier pour afficher l'icone du digg-like, l'autre pour le texte du lien.<br/><br/>
Donc pour l'afficher que les icones : &lt;? dcDiggLike::dcSubmitToDigg(1,''); ?&gt;<br/>
Donc pour l'afficher que les liens : &lt;? dcDiggLike::dcSubmitToDigg(0,'Digg-moi ca!'); ?&gt;<br/>
</dd>

<h3>Fonctions pour les digg-likes internationaux</h3>
<dl>
<dt>dcDiggLike::dcSubmitToDigg()</dt>
<dd>Affiche un lien Digg it! <a href="http://www.digg.com/" hreflang="fr" target="_blank">www.digg.com</a>.</dd>

<dt>dcDiggLike::dcSubmitToDelicious()</dt>
<dd>Affiche un lien del.icio.us it! <a href="http://del.icio.us/" hreflang="fr" target="_blank">del.icio.us</a>.</dd>

<dt>dcDiggLike::dcSubmitToBlogmarks()</dt>
<dd>Affiche un lien Blogmark it!  <a href="http://www.blogmarks.net/" hreflang="fr" target="_blank">www.blogmarks.net</a>.<br/>
Par NiKo -  <a href="http://www.prendreuncafe.com/blog/2005/06/09/129-lien-de-soumission-a-blogmarksnet" hreflang="fr" target="_blank">www.prendreuncafe.com</a></dd>

<dt>dcDiggLike::dcSubmitToTechnorati()</dt>
<dd>Affiche un lien Ajouter à mes favoris Technorati!  <a href="http://technorati.com/" hreflang="fr" target="_blank">www.technorati.com</a>.<br/>

<h3>Fonctions pour les digg-likes francais</h3>
<dl>
<dt>dcDiggLike::dcSubmitToScoopeo()</dt>
<dd>Affiche un lien Scoop it ! <a href="http://www.scoopeo.com/" hreflang="fr" target="_blank">www.scoopeo.com</a>.</dd>

<dt>dcDiggLike::dcSubmitToFuzz()</dt>
<dd>Affiche un lien Fuzz it ! <a href="http://www.fuzz.fr" hreflang="fr" target="_blank">www.fuzz.fr</a>.</dd>

<dt>dcDiggLike::dcSubmitToTapemoi()</dt>
<dd>Affiche un lien Tape Moi! <a href="http://www.tapemoi.com" hreflang="fr" target="_blank">www.tapemoi.com</a>.</dd>

<dt>dcDiggLike::dcSubmitToAllactu()</dt>
<dd>Affiche un lien AllActuer Ca! <a href="http://www.allactu.com/" hreflang="fr" target="_blank">www.allactu.com</a>.</dd>

<dt>dcDiggLike::dcSubmitToNuouz()</dt>
<dd>Affiche un lien Nuouz Ca! <a href="http://www.nuouz.com/" hreflang="fr" target="_blank">www.nuouz.com</a>.</dd>

<dt>dcDiggLike::dcSubmitToMemes()</dt>
<dd>Affiche un lien Memes Ca! <a href="http://www.blogmemes.net/" hreflang="fr" target="_blank">www.blogmemes.net</a>.<br/>
Merci a Frank -  <a href="http://www.generationmp3.com/ohmypod" hreflang="fr" target="_blank">Oh!MyPod</a></dd>
</dl>
<br/><br/>
Tibo - <a href="http://www.c1blog.com/" hreflang="fr" target="_blank">www.c1blog.com</a>
EOF;

if (dc_encoding != 'UTF-8')
	$str = utf8_decode($str);

buffer::str($str);
?>