<?php
/**
 * Widgets registration
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Register widgets
 */

// Categories Menu
require_once( WIDGETS_PATH . '/categories-menu.php' );

add_action( 'widgets_init', function() {

	// Categories Menu
	register_widget( 'Charney_Categories_Menu_Widget' );

} );