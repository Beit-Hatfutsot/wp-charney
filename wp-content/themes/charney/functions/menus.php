<?php
/**
 * Menus
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
global $menus;

$menus = array(
	'main-menu'	=> __('Main Menu'),
);

/**
 * charney_register_menus
 *
 * This function registers theme menus
 *
 * @param	N/A
 * @return	N/A
 */
function charney_register_menus() {

	global $menus;
	register_nav_menus($menus);

}
add_action( 'init', 'charney_register_menus' );