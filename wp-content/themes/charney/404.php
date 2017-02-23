<?php
/**
 * The template for displaying 404 page
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php

	// Content
	get_template_part( 'views/page/404' );

?>

<?php get_footer(); ?>