<?php
/**
 * The template for displaying default post/category/archive/page
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php

	// Content
	if ( have_posts() ) :
	
		while ( have_posts() ) : the_post();
			get_template_part( 'views/page/loop' );
		endwhile;
		
	else :
	
		get_template_part( 'views/components/not-found' );
		
	endif;
	
?>
	
<?php get_footer(); ?>