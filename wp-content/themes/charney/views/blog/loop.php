<?php
/**
 * The template for displaying the blog archive loop
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$args = array(
	'posts_per_page'	=> -1,
	'no_found_rows'		=> true
);
$posts = new WP_Query($args);

if ( $posts->have_posts() ) :

	while ( $posts->have_posts() ) : $posts->the_post();
	
		get_template_part('views/blog/loop', 'item');
		
	endwhile;
	
else :

	get_template_part('views/components/not-found');

endif;

wp_reset_postdata();