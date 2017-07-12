<?php
/**
 * The template for displaying search page
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php
	/**
	 * get_search_form
	 *
	 * Get the search form
	 */
	get_search_form();
?>

<?php

	// Content
	get_template_part( 'views/page/search' );

?>

<?php

	/**
	 * Display the blog archive modal
	 */
	get_template_part( 'views/blog/modal' );

?>

<?php get_footer(); ?>