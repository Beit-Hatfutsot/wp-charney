<?php
/**
 * The template for displaying post content within loop - image format
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
	$image	= get_field( 'acf-post-attributes_image' );
}

if ( ! $image )
	return;

?>

<div class="blog-item blog-item-image blog-item-modal" data-item-id="" data-type="image" data-toggle="modal" data-title="<?php echo get_the_title(); ?>" data-excerpt="<?php echo get_the_excerpt(); ?>" data-url="<?php echo $image['url']; ?>" data-target="#archive-items-modal">

	<figure>
		<img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['sizes']['medium-width']; ?>" height="<?php echo $image['sizes']['medium-height']; ?>" alt="<?php the_title(); ?>" />
		<figcaption>
			<?php the_title(); ?>
		</figcaption>
	</figure>

</div>