<?php
/**
 * The template for displaying the Left Sidebar
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/sidebar
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( is_active_sidebar('left-sidebar') ) {
	echo '<div class="sidebar">';
		dynamic_sidebar('left-sidebar');
	echo '</div>';
}