<?php
/**
 * Admin header tweaks
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions/admin
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * charney_admin_head
 *
 * Load scripts and styles on the dashboard
 *
 * @param	N/A
 * @return	N/A
 */
function charney_admin_head() {
	wp_enqueue_style('admin-general');
}
add_action('admin_head', 'charney_admin_head');