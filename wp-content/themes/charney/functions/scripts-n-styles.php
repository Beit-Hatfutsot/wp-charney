<?php
/**
 * Scripts and styles
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'login_enqueue_scripts',	'charney_login_scripts_n_styles' );
add_action( 'admin_enqueue_scripts',	'charney_admin_scripts_n_styles' );
add_action( 'wp_enqueue_scripts',		'charney_wp_scripts_n_styles' );

add_filter( 'mce_css', 'charney_editor_style' );

/**
 * charney_login_scripts_n_styles
 *
 * @param	N/A
 * @return	N/A
 */
function charney_login_scripts_n_styles() {

	wp_register_style( 'admin-login',	CSS_DIR . '/admin/login.css',	array(),	VERSION );

}

/**
 * charney_admin_scripts_n_styles
 *
 * @param	N/A
 * @return	N/A
 */
function charney_admin_scripts_n_styles() {

	wp_register_style( 'admin-general',	CSS_DIR . '/admin/general.css',	array(),	VERSION );

}

/**
 * charney_wp_scripts_n_styles
 *
 * @param	N/A
 * @return	N/A
 */
function charney_wp_scripts_n_styles() {

	/**
	 * Styles
	 */
	wp_enqueue_style ( 'bootstrap',					CSS_DIR . '/libs/bootstrap.min.css',							array(),				VERSION );
	wp_enqueue_style ( 'jquery-ui',					CSS_DIR . '/libs/jquery-ui.min.css',							array('bootstrap'),		VERSION );
	wp_enqueue_style ( 'timeline',					'//cdn.knightlab.com/libs/timeline3/latest/css/timeline.css',	array(),				VERSION );
	wp_enqueue_style ( 'general',					CSS_DIR . '/general.css',										array('bootstrap'),		VERSION );

	/**
	 * Scripts
	 */
	wp_register_script( 'bootstrap',				JS_DIR . '/libs/bootstrap.min.js',								array('jquery'),		VERSION,	true );
	wp_register_script( 'jquery-ui',				JS_DIR . '/libs/jquery-ui.min.js',								array('bootstrap'),		VERSION,	true );
	wp_register_script( 'timeline',					'//cdn.knightlab.com/libs/timeline3/latest/js/timeline.js',		array('jquery'),		VERSION,	true );
	wp_register_script( 'general',					JS_DIR . '/min/general.min.js',									array('bootstrap'),		VERSION,	true );
	wp_enqueue_script ( 'charney-analytics',		JS_DIR . '/charney-analytics.js',								array('jquery'),		VERSION,	false );

}

/**
 * charney_editor_style
 *
 * This function adds styles for tinyMCE
 *
 * @param	$styles (string) tinyMCE styles
 * @return	(string)
 */
function charney_editor_style( $styles ) {

	$styles .= ', ' . CSS_DIR . '/admin/' . 'editor.css';

	// Google Fonts
	global $google_fonts;

	if ( $google_fonts ) {
		foreach ( $google_fonts as $key => $val ) {
			$font = str_replace( ',', '&#44', $val );
			$styles .= ', ' . $font;
		}
	}

	// return
	return $styles;

}