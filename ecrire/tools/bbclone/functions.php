<?php

class bbclone {
    
    function counter() {

        define("_BBCLONE_DIR", dirname(__FILE__) . '/../../../' . DC_ECRIRE . '/tools/bbclone/' );
        
        if ($GLOBALS['mode'] == 'post') {
		    $tag = $GLOBALS['news']->f('post_titre') . ' ';
            //$tag = $titre_billet
	    } else {
            $tag = '';
        }

        if ($GLOBALS['cat_id'] != '') {
		   $tag .= $GLOBALS['news']->f('cat_libelle');
	    }

        if ($GLOBALS['mode'] == 'month') {
		    $ts = strtotime($GLOBALS['year'].'-'.$GLOBALS['month'].'-01 00:00');
            if ( strlen( $tag ) ) $tag .= ' - ';
		    $tag .= dt::str('%B %Y',$ts) . ' ';
	    } 

        if ( !strlen( $tag ) ) {
            $tag = "dc_index";
        } else {
            $tag = trim( $tag );
        }
        
        //$tag = strip_tags( $tag );
        $tag = str_replace( '&amp;', '&', $tag);
        $tag = str_replace( '&quot;', '"', $tag);
        
        define("_BBC_PAGE_NAME", $tag );

        // Explications del'impossibilité de faire un include ici
        // http://forum.bbclone.de/index.php/t/534/60287217b86490e28dd95226b64ae998/
        
        return dirname(__FILE__) . '/../../../' . DC_ECRIRE . '/tools/bbclone/mark_page.php';
        //return '../../tools/bbclonerss/mark_page.php';

    }

}

?>