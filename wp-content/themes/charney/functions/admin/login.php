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
 * This function enqueues login screen style
 *
 * @param	N/A
 * @return	N/A
 */
function charney_login_screen() {

	wp_enqueue_style('admin-login');

}
add_action( 'login_head', 'charney_login_screen' );

/**
 * charney_login_logo_url
 *
 * This function sets login logo URL
 *
 * @param	N/A
 * @return	(string)
 */
function charney_login_logo_url() {

	// return
	return HOME;

}
add_filter( 'login_headerurl', 'charney_login_logo_url' );

/**
 * charney_login_logo_url_title
 *
 * This function Sets login logo title
 *
 * @param	N/A
 * @return	(string)
 */
function charney_login_logo_url_title() {

	// return
	return get_bloginfo('name');

}
add_filter( 'login_headertitle', 'charney_login_logo_url_title' );