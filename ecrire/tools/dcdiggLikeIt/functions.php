<?
class dcDiggLike
{

	function dcSubmitToDigg ($img=1,$txt=' Digg it! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/digg.jpg" style="border: none;" alt="Digg it!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://digg.com/submit?phase=3&amp;'.
				'url=' . urlencode($url) .'&amp;'.
				';title=' . urlencode($title)
			);
		}
	}

	function dcSubmitToDelicious ($img=1,$txt=' del.icio.us it! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/delicious.gif" style="border: none;" alt="del.icio.us it!"/>';
		$s.=$txt;
		$s.='</a>'; 

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://del.icio.us/post?v=2&amp;'.
				'url=' . urlencode($url) .
				';title=' . urlencode($title)
			);
		}
	}

	// fonction par NiKo http://www.prendreuncafe.com
	// modifier par Tibo
	function dcSubmitToBlogmarks($img=1,$txt=' Blogmark it! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/blogmarks.gif" style="border: none;" alt="Blogmark it!"/>';
		$s.=$txt;
		$s.='</a>'; 

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		$summary = $GLOBALS['news']->getChapo() != "" ? strip_tags($GLOBALS['news']->getChapo()) : strip_tags($GLOBALS['news']->getContent());
		$tN = array("\r", "\n", "\t");
		$tR = array("", " ", "");
		$summary = str_replace($tN, $tR, $summary);
		while (ereg("  ", $summary)) $summary = str_replace("  ", " ", $summary);
		$summary = substr(chop($summary), 0, 255) . '...';
		$tags = $GLOBALS['news']->f('cat_libelle');
		$via = getenv('HTTP_REFERER');
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
				$summary = utf8_encode($summary);
				$tags = utf8_encode($tags);
				$via = utf8_encode($via);
			}
			echo sprintf (
				$s, 'http://www.blogmarks.net/my/new.php?'.
				'title=' . urlencode($title) . '&amp;'.
				'summary=' . urlencode($summary) .'&amp;'.
				'url=' . urlencode($url) . '&amp;'.
				'via=' . urlencode($via) . '&amp;'.
				'tags=' . urlencode($tags)
			);
		}
	}
	
	function dcSubmitToTechnorati($img=1,$txt='Ajouter à mes favoris Technorati') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/technorati.jpg" style="border: none;" alt="Ajouter à mes favoris Technorati"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST');
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://technorati.com/faves?'.
				'add=' . urlencode($url)
			);
		}
	}


	function dcSubmitToScoopeo($img=1,$txt=' Scoop it! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/scoopeo.gif" style="border: none;" alt="Scoop it!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://www.scoopeo.com/scoop/new?'.
				'newurl=' . urlencode($url) . '&amp;'.
				'title=' . urlencode($title)
			);
		}
	}

	function dcSubmitToFuzz($img=1,$txt=' Fuzz it! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/fuzz_mini.gif" style="border: none;" alt="Fuzz it!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://www.fuzz.fr/?news=1&amp;'.
				'url=' . urlencode($url) . '&amp;'.
				'title=' . urlencode($title)
			);
		}
	}
	
	
	function dcSubmitToTapemoi($img=1,$txt=' Tape Moi! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/tapemoi.gif" style="border: none;" alt="Tape Moi!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://www.tapemoi.com/submit.php?'.
				'lien=' . urlencode($url) . '&amp;'.
				'title=' . urlencode($title)
			);
		}
	}
	
	function dcSubmitToAllactu($img=1,$txt=' AllActuer Ca! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/AllActu.gif" style="border: none;" alt="AllActuer Ca!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://www.allactu.com/submit.php?'.
				'url=' . urlencode($url) . '&amp;'.
				'title=' . urlencode($title)
			);
		}
	}

	function dcSubmitToNuouz($img=1,$txt=' Nuouz Ca! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/nuouz.gif" style="border: none;" alt="Nuouz Ca!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://www.nuouz.com/addNews.aspx?'.
				'url=' . urlencode($url) . '&amp;'.
				'title=' . urlencode($title)
			);
		}
	}

	// Merci à Franck
	//http://www.generationmp3.com/ohmypod
	function dcSubmitToMemes($img=1,$txt=' Memes Ca! ') {
		$s='<a href="%s" target="_blank">';
		if ($img)
			$s.='<img src="'.dc_app_url.'/ecrire/tools/dcdiggLikeIt/images/blogmeme.gif" style="border: none;" alt="Memes Ca!"/>';
		$s.=$txt;
		$s.='</a>';

		$title = $GLOBALS['news']->f('post_titre');
		$url = 'http://' . getenv('HTTP_HOST') . $GLOBALS['news']->getPermURL();
		if ($title && $url) {
			if (dc_encoding != 'UTF-8') {
				$title = utf8_encode($title);
				$url = utf8_encode($url);
			}
			echo sprintf (
				$s, 'http://www.blogmemes.net/fr/post.php?'.
				'url=' . urlencode($url) . '&amp;'.
				'title=' . urlencode($title)
			);
		}
	}

}
?>