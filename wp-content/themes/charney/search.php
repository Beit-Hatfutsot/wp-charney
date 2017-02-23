<?php
/**
 * The template for displaying search page
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php

	// Content
	get_template_part( 'views/page/search' );

?>

<?php get_footer(); ?>