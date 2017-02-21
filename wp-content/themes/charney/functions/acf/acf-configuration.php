<?php
/**
 * ACF configuration
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions/acf
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Create options sub pages
 */

if ( function_exists('acf_add_options_sub_page') ) {

	acf_add_options_sub_page('General');

}