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
add_action('charney_before_main_content',	'charney_theme_wrapper_start',	10);
add_action('charney_after_main_content',	'charney_theme_wrapper_end',	10);

/**
 * charney_theme_wrapper_start
 *
 * Theme wrapper start
 *
 * @param	N/A
 * @return	string
 */
function charney_theme_wrapper_start() {
	echo '<section class="page-content"><div class="container"><div class="row">';
}

/**
 * charney_theme_wrapper_end
 *
 * Theme wrapper end
 *
 * @param	N/A
 * @return	string
 */
function charney_theme_wrapper_end() {
	echo '</div></div></section>';
}

/**
 * Theme supports
 */
add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');

/**
 * Remove WordPress defaults
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');