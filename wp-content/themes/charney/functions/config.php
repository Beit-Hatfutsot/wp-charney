<?php
/**
 * Theme configuration
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Set VERSION constant - used to register styles and scripts
 */
if ( function_exists('wp_get_theme') ) {
	$theme_data		= wp_get_theme();
	$theme_version	= $theme_data->get( 'Version' );
}
else {
	$theme_data		= get_theme_data( trailingslashit( get_stylesheet_directory() ) . 'style.css' );
	$theme_version	= $theme_data['Version'];
}

define( 'VERSION', $theme_version );

/**
 * Other constants
 */
$stylesheet = get_stylesheet();
$theme_root = get_theme_root( $stylesheet );

define( 'TEMPLATE',		get_bloginfo('template_directory') );
define( 'HOME',			home_url( '/' ) );
define( 'THEME_ROOT',	"$theme_root/$stylesheet" );
define( 'CSS_DIR',		TEMPLATE . '/css' );
define( 'JS_DIR',		TEMPLATE . '/js' );
define( 'WIDGETS_PATH',	THEME_ROOT . '/widgets' );
define( 'GTM_ID',		'GTM-5KQXW5P' );

/**
 * Google Fonts
 */
$google_fonts = array (
	'Assistant'		=> 'https://fonts.googleapis.com/css?family=Assistant:300,400,600,700'
);