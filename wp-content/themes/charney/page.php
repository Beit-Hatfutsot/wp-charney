<?php
/**
 * The template for displaying default page
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php

	// Content
	if ( have_posts() ) : the_post();
	
		get_template_part('views/page/page');
		
	endif;
	
?>

<?php get_footer(); ?>