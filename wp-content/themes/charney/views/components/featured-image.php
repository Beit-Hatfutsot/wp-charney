<?php
/**
 * The template for displaying the post featured image
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( has_post_thumbnail() ) { ?>

	<div class="featured-image">
		<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" />
	</div>

<?php }