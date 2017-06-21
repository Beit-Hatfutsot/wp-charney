<?php
/**
 * The template for displaying post content within loop - audio format
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
if ( function_exists('get_field') ) {
	$url	= get_field( 'acf-post-attributes_google_url' );
}

if ( ! $url )
	return;

?>

<div class="blog-item blog-item-audio">

	<div class="icon icon-audio">
		<?php get_template_part( 'views/svgs/shape', 'audio' ); ?>
	</div>

	<div class="item-title">
		<?php the_title(); ?>
	</div>

	<div class="clearfix"></div>

</div>