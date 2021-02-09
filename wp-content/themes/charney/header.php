<?php
/**
 * Theme header
 *
 * Contains the theme wrapper start
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php
	/**
	 * Display header meta
	 */
	get_template_part( 'views/header/header', 'meta' );
?>

<body <?php body_class(); ?>>

	<?php
		/**
		 * gtm body
		 */
		gtm_body();
	?>

	<?php
		/**
		 * svg-defs.svg
		 */
		include_once( 'images/general/svg-defs.svg' );
	?>

	<div id="page" class="site">

	<?php
		/**
		 * charney_before_page_content hook
		 *
		 * @hooked	charney_theme_wrapper_start - 10 (outputs opening divs for the page)
		 */
		do_action( 'charney_before_page_content' );
	?>

	<?php
		/**
		 * get_sidebar
		 *
		 * Display the sidebar
		 */
		get_sidebar();
	?>

	<?php
		/**
		 * charney_before_main_content hook
		 *
		 * @hooked	charney_theme_content_wrapper_start - 10 (outputs opening divs for the main content)
		 */
		do_action( 'charney_before_main_content' );
	?>

	<?php
		/**
		 * Display the main banner
		 */
		get_template_part( 'views/components/main-banner' );
	?>