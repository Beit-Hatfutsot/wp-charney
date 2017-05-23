<?php
/**
 * Theme
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Theme wrapper
 */
add_action( 'charney_before_page_content',	'charney_theme_wrapper_start',			10 );
add_action( 'charney_after_page_content',	'charney_theme_wrapper_end',			10 );

add_action( 'charney_before_sidebar',		'charney_theme_sidebar_wrapper_start',	10 );
add_action( 'charney_after_sidebar',		'charney_theme_sidebar_wrapper_end',	10 );

add_action( 'charney_before_main_content',	'charney_theme_content_wrapper_start',	10 );
add_action( 'charney_after_main_content',	'charney_theme_content_wrapper_end',	10 );

/**
 * charney_theme_wrapper_start
 *
 * This function adds opening wrapper tags to the theme
 *
 * @param	N/A
 * @return	N/A
 */
function charney_theme_wrapper_start() {

	echo '<section class="page-content"><div class="container"><div class="row">';

}

/**
 * charney_theme_wrapper_end
 *
 * This function adds closing wrapper tags to the theme
 *
 * @param	N/A
 * @return	N/A
 */
function charney_theme_wrapper_end() {

	echo '</div></div></section><!-- page-content -->';

}

/**
 * charney_theme_sidebar_wrapper_start
 *
 * This function adds opening wrapper tags to the theme sidebar
 *
 * @param	N/A
 * @return	N/A
 */
function charney_theme_sidebar_wrapper_start() {

	echo '<div class="sidebar-wrapper col-sm-3"><section class="sidebar">';

}

/**
 * charney_theme_sidebar_wrapper_end
 *
 * This function adds closing wrapper tags to the theme sidebar
 *
 * @param	N/A
 * @return	N/A
 */
function charney_theme_sidebar_wrapper_end() {

	echo '</section><!-- sidebar --></div><!-- sidebar-wrapper -->';

}

/**
 * charney_theme_content_wrapper_start
 *
 * This function adds opening wrapper tags to the theme content
 *
 * @param	N/A
 * @return	N/A
 */
function charney_theme_content_wrapper_start() {

	echo '<div class="content-wrapper col-sm-9"><section class="content">';

}

/**
 * charney_theme_content_wrapper_end
 *
 * This function adds closing wrapper tags to the theme content
 *
 * @param	N/A
 * @return	N/A
 */
function charney_theme_content_wrapper_end() {

	echo '</section><!-- content --></div><!-- content-wrapper -->';

}

/**
 * Globals
 */
global $globals;
$globals = array(

	'page_template'		=> '',
	'timeline_source'	=> '',
	'supported_formats'	=> array(

		'image'			=> array(
			'name'			=> 'Photos',
			'singular_name'	=> 'Photo'
		),
		'video'			=> array(
			'name'			=> 'Videos',
			'singular_name'	=> 'Video'
		),
		'audio'			=> array(
			'name'			=> 'Audios',
			'singular_name'	=> 'Audio'
		),
		'link'			=> array(
			'name'			=> 'Documents',
			'singular_name'	=> 'Document'
		)

	)

);

/**
 * Theme supports
 */
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
//add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array_keys( $globals['supported_formats'] ) );

/**
 * Remove WordPress defaults
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );