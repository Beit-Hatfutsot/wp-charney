<?php
/**
 * The template for displaying blog archive page
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php
	/**
	 * Display the category description
	 */
	get_template_part( 'views/blog/archive', 'desc' );
?>

<?php
	/**
	 * get_search_form
	 *
	 * Get the search form
	 */
	get_search_form();
?>

<?php
	/**
	 * Display the subcategories menu
	 */
	get_template_part( 'views/components/subcategories-menu' );
?>

<?php

	// Content
	get_template_part( 'views/blog/archive' );
	
?>

<?php get_footer(); ?>