<?php
/**
 * Options for the Monobook for DokuWiki template
 *
 * @author Terence J. Grant <tjgrant@tatewake.com>
 */

$meta['mb_use_discussion']		= array('onoff');
$meta['mb_discussion_location']	= array('string');

$meta['mb_use_sitenotice']		= array('onoff');
$meta['mb_sitenotice_location']	= array('string');

$meta['mb_use_navigation']		= array('onoff');
$meta['mb_navigation_location']	= array('string');

$meta['mb_use_copyright']		= array('onoff');
$meta['mb_copyright_location']	= array('string');

$meta['mb_use_search']			= array('onoff');

$meta['mb_use_toolbox']			= array('onoff');
$meta['mb_use_defaulttoolbox']	= array('onoff');
$meta['mb_toolbox_location']		= array('string');

$meta['mb_bc_loc']			= array('multichoice','_choices' => array('top','bottom'));
$meta['mb_hbc_loc']			= array('multichoice','_choices' => array('top','bottom'));

$meta['mb_author']			= array('string');
