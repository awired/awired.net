<?php
/**
* @version $Id: xtypo.btn.php 2007-05-10 19:23:43Z Achim Raji $
* @package XTYPO
* @copyright Copyright (C) 2007 Achim Raji. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* @license Released under the terms of the GNU General Public License (see LICENSE.php in the Joomla! root directory)
*/
   defined( '_VALID_MOS' ) or die( 'Direct Access to this script is not allowed');
   global $database;

   // make sure ordering = 3 (after button mospagebreak)
   $query = "UPDATE #__mambots SET ordering = 3"
   . "\n WHERE element = 'extraeditorxtypo.btn'"
   . "\n AND folder = 'editors-xtd'"
   ;
   $database->setQuery( $query );
   $database->query();

   // load mambot params info
   $query = "SELECT params"
   . "\n FROM #__mambots"
   . "\n WHERE element = 'extraeditorxtypo.btn'"
   . "\n AND folder = 'editors-xtd'"
   ;
   $database->setQuery( $query );
   $database->loadObject($mambot);

   // params mambot
   $_MAMBOTS->_content_mambot_params['extraeditorxtypobtn'] = $mambot;
   $botParams = new mosParameters( $mambot->params );

   $botParams->def( 'mosxtypo1', 1 );
   $botParams->def( 'mosxtypo2', 1 );
   $botParams->def( 'mosxtypo3', 1 );
   $botParams->def( 'mosxtypo4', 1 );
   $botParams->def( 'mosxtypo5', 1 );
   $botParams->def( 'mosxtypo6', 1 );
   $botParams->def( 'mosxtypo7', 1 );
   $botParams->def( 'mosxtypo8', 1 );
   $botParams->def( 'mosxtypo9', 1 );
   $botParams->def( 'mosxtypo10', 1 );
   $botParams->def( 'mosxtypo11', 1 );



   // register function(s)
	if( $botParams->get( 'mosxtypo1' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO1Button' ); }
	if( $botParams->get( 'mosxtypo2' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO2Button' ); }
 	if( $botParams->get( 'mosxtypo3' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO3Button' ); }
	if( $botParams->get( 'mosxtypo4' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO4Button' ); }
    if( $botParams->get( 'mosxtypo5' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO5Button' ); }
    if( $botParams->get( 'mosxtypo6' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO6Button' ); }
    if( $botParams->get( 'mosxtypo7' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO7Button' ); }
    if( $botParams->get( 'mosxtypo8' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO8Button' ); }
    if( $botParams->get( 'mosxtypo9' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO9Button' ); }
    if( $botParams->get( 'mosxtypo10' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO10Button' ); }
    if( $botParams->get( 'mosxtypo11' ) ){ $_MAMBOTS->registerFunction( 'onCustomEditorButton','botMosXTYPO11Button' ); }



   function botMosXTYPO1Button()
   {
      return array( 'mosxtypo1.gif',
                    '{xtypo_alert} this is xtypo alert {/xtypo_alert}' );
}

  function botMosXTYPO2Button()
     {

        return array( 'mosxtypo2.gif',
                      '{xtypo_info} this is xtypo info {/xtypo_info}' );

}

  function botMosXTYPO3Button()
     {
        return array( 'mosxtypo3.gif',
                      '{xtypo_warning} this is xtypo warning {/xtypo_warning}' );

}
  function botMosXTYPO4Button()
     {
        return array( 'mosxtypo4.gif',
                      '{xtypo_sticky} this is xtypo sticky {/xtypo_sticky}' );

}
  function botMosXTYPO5Button()
     {
        return array( 'mosxtypo5.gif',
                      '{xtypo_feed} this is xtypo feed {/xtypo_feed}' );
  }
  function botMosXTYPO6Button()
       {
          return array( 'mosxtypo6.gif',
                        '{xtypo_download} this is xtypo download {/xtypo_download}' );
  }
  function botMosXTYPO7Button()
       {
          return array( 'mosxtypo7.gif',
                        '{xtypo_code} your code here{/xtypo_code}' );

}
function botMosXTYPO8Button()
       {
          return array( 'mosxtypo8.gif',
                        '{xtypo_quote} your text here {/xtypo_quote}' );

}
function botMosXTYPO9Button()
       {
          return array( 'mosxtypo9.gif',
                        '{xtypo_quote_left} your text here {/xtypo_quote}' );


}
function botMosXTYPO10Button()
       {
          return array( 'mosxtypo10.gif',
                        '{xtypo_quote_right} your text here {/xtypo_quote}' );

}
function botMosXTYPO11Button()
       {
          return array( 'mosxtypo11.gif',
                        '{xtypo_dropcap}C{/xtypo_dropcap}MS are the most exciting.....' );


}
  ?>

