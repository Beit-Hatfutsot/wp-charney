<?php
/**
 * Theme header
 *
 * Contains the theme wrapper start
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php get_template_part('views/header/header', 'meta'); ?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'charney' ); ?></a>

	<?php get_template_part('views/header/header'); ?>

	<?php
		/**
		 * charney_before_main_content hook
		 *
		 * @hooked	charney_theme_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action('charney_before_main_content');
	?>