<?php
/**
 * Admin login tweaks
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions/admin
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * charney_login_screen
 *
 * Enqueue login screen style
 *
 * @param	N/A
 * @return	N/A
 */
function charney_login_screen() {
	wp_enqueue_style('admin-login');
}
add_action('login_head', 'charney_login_screen');

/**
 * charney_login_logo_url
 *
 * Set login logo URL
 *
 * @param	N/A
 * @return	string
 */
function charney_login_logo_url() {
	return HOME;
}
add_filter('login_headerurl', 'charney_login_logo_url');

/**
 * charney_login_logo_url_title
 *
 * Set login logo title
 *
 * @param	N/A
 * @return	string
 */
function charney_login_logo_url_title() {
	return get_bloginfo('name');
}
add_filter('login_headertitle', 'charney_login_logo_url_title' );