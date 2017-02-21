<?php
/**
 * Admin footer tweaks
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions/admin
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * charney_footer_text
 *
 * Add customized footer
 *
 * @param	N/A
 * @return	string
 */
function charney_footer_text() {
	return "<span id=\"footer-thankyou\">By <a href=\"http://www.htmline.com/\">HTMLine - בניית אתרים</a>.</span>";
}
add_action('admin_footer_text', 'charney_footer_text');