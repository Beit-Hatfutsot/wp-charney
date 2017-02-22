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

<?php
	/**
	 * charney_after_main_content hook
	 *
	 * @hooked	charney_theme_content_wrapper_end - 10 (outputs closing divs for the main content)
	 */
	do_action('charney_after_main_content');
?>

<?php get_footer(); ?>