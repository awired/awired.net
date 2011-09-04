<?php

$BBC_ROOT_PATH = 'tools/bbclone/';

buffer::str(
'<h2>'.__('BBClone - Stats').'</h2>'
);

buffer::str(

'<p>' . 
'<a href="tools.php?p=bbclone&mod=global">'.__('Global stats').'</a>' . 
' - ' .
'<a href="tools.php?p=bbclone&mod=detailed">'.__('Detailed stats').'</a>' . 
' - ' .
'<a href="tools.php?p=bbclone&mod=time">'.__('Time stats').'</a>' . 
' - ' .
'<a href="tools.php?p=bbclone&mod=man">Configuration</a>' .
'</p>'


);


require("tools/bbclone/constants.php");

if ( !isset( $_GET['mod'] ) OR ( $_GET['mod'] == 'detailed' )   ) {

    require("tools/bbclone/show_detailed.php");
    
    buffer::str(  '<h3>'.__('Detailed stats').'</h3>' );

    buffer::str(

      "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\"><tr>\n" . 
      bbc_rows_gen() . 
      "</table>\n"

    );

} elseif ( $_GET['mod'] == 'time' )  {

    require("tools/bbclone/show_time.php");
    
    buffer::str(  '<h3>'.__('Time stats').'</h3>' );

    buffer::str(

     "<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\" colspan=\"2\">\n"
    ."<b>". $_['tstat_last_day']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("hour", 570, 240)
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\">\n"
    ."<b>". $_['tstat_last_week']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("wday", 200, 240)
    ."</td>\n"
    ."<td valign=\"top\" align=\"center\">\n"
    ."<b>".$_['tstat_last_year']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("month", 340, 240)
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\" colspan=\"2\">\n"
    ."<b>".$_['tstat_last_month']."</b><br />\n"
    ."<br />\n"
    .bbc_show_plot_time_type("day", 540, 240)
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"

    );

}  elseif ( $_GET['mod'] == 'global' )  {
    
    require("tools/bbclone/show_global.php");
    
    buffer::str(  '<h3>'.__('Global stats').'</h3>' );

    buffer::str( 
    
    "<table align=\"center\" border=\"0\" cellpadding=\"9\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_browser()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_os()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_extension()
    ."</td>\n"
    .(((!empty($BBC_IGNORE_BOTS)) && ($BBC_IGNORE_BOTS == 2)) ? "" : "<td valign=\"top\">\n"
    .bbc_show_robot()."</td>\n")
    ."</tr>\n"
    ."</table>\n"
    ."<table align=\"center\" border=\"0\" cellpadding=\"9\" cellspacing=\"0\">\n"
    ."<tr>\n"
 //   ."<td valign=\"top\">\n"
 //   .bbc_show_top_hosts()
 //   ."</td>\n"
    ."<td width=\"35%\" valign=\"top\">\n"
    .bbc_show_top_pages()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_top_origins()
    ."</td>\n"
    ."<td valign=\"top\">\n"
    .bbc_show_top_keys()
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    .bbc_show_access()

    );

}  elseif ( $_GET['mod'] == 'views' )  {
    
    require("tools/bbclone/show_views.php");
    
    buffer::str(  '<h3>'.__('Visitor stats').'</h3>' );

    buffer::str( 

    "<table align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"1\" width=\"100%\">"
    ."<tr>\n"
    ."<td align=\"center\">".bbc_list_visits()."</td>\n"
    ."</tr>\n"
    ."</table>\n"

    );

}  elseif ( $_GET['mod'] == 'man' )  {
    
     buffer::str(  '<h3>'.__('Utilisation').'</h3>' );

     buffer::str(  '<p>'.__('Add the fowolling code at the end of your main template file').' (template.php) : </p>' );

     buffer::str( 
        
        '<pre>' . "\n" .
        htmlentities( '<?php' ) . "\n" .
       // ';' . "\n" .
        'require( bbclone::counter() );' . "\n" .
        htmlentities( '?>' ) . "\n" .
        '</pre>' . "\n" 

      );


    if (file_exists(dirname(__FILE__).'/../../../' . DC_ECRIRE . '/tools/filemanager/')) {

    if ( file_exists( dirname(__FILE__) . '/../../../themes/'. dc_theme . '/template.php') ) {
       $template_file =  '/themes/'. dc_theme . '/template.php';
    } else {
      $template_file =  '/themes/default/template.php';
    }

    buffer::str( 
        
        '<h4>' . __('Step by step') . '</h4>' .
        '<ol>' .
        '<li>' . __('Copy the PHP code above') . '</li>' .
        '<li>'. '<a href="tools.php?p=filemanager&f=' . $template_file . '">'. __('Edit your main template file'). '</a></li>' . 
        '<li>'.__('Paste the code at the end') . '</li>' .
        '<li>'.__("That's all :-)") . '</li>' .
        '</ol>'
    
    );
    buffer::str(  '<h3>'.__('Advanced configuration').'</h3>' );

    buffer::str(  '<p>'. '<a href="tools.php?p=filemanager&f=/' . DC_ECRIRE . '/tools/bbclone/conf/config.php">'. __('Edit BBClone main config file'). '</a></p>' );

}
	
	buffer::str(  '<h3>'.__('Files informations').'</h3>' );

	$img_check = '<img src="images/check_%s.png" alt="" />';

	if (is_writable(dirname(__FILE__).'/../../../' . DC_ECRIRE . '/tools/bbclone/var')) {

		buffer::str(
		'<p>'.sprintf($img_check,'on').' '.
		sprintf(__('Directory %s is writable.'),  DC_ECRIRE . '/tools/bbclone/var/').
		'</p>'
		);

	} else {

		buffer::str(
		'<p>'.sprintf($img_check,'off').' '.
		sprintf(__('Directory %s is not writable.'), DC_ECRIRE . '/tools/bbclone/var/').
		'</p>'
		);
	}

    buffer::str(  '<h3>'.__('FAQ').'</h3>' );

    buffer::str(  '<p>'. '<a href="tools.php?p=bbclone&mod=faq">'. __('Read the FAQ'). '</a></p>' );

        

}elseif ( $_GET['mod'] == 'faq' )  {

    $filename = dirname(__FILE__).'/../../../' . DC_ECRIRE . '/tools/bbclone/doc/faq4dotclear.txt';
    $handle = fopen ($filename, "r");
    $contents = '';
    while (!feof($handle)) {
      $contents .= fread($handle, 8192);
    }
    fclose($handle);
    
    buffer::str(  '<h2>'.__('FAQ').'</h2>' );
    buffer::str(  '<pre>'. wordwrap( utf8_encode( htmlentities( $contents ) ) , 90 ) .'</pre>' );

}

/*

buffer::str( 

    $bbc_html->copyright()

);

*/

?>