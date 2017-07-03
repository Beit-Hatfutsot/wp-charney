<?php
/**
 * The template for displaying featured post item - image format
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/main
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
if ( function_exists('get_field') ) {
	$image	= get_field( 'acf-post-attributes_image', $post_id );
}

if ( ! $image )
	return;

?>

<div class="blog-item blog-item-image blog-item-modal" data-item-id="" data-type="image" data-toggle="modal" data-title="<?php echo esc_html( get_the_title( $post_id ) ); ?>" data-excerpt="<?php echo esc_html( get_the_excerpt( $post_id ) ); ?>" data-url="<?php echo $image['url']; ?>" data-target="#archive-items-modal">

	<figure>
		<img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['sizes']['medium-width']; ?>" height="<?php echo $image['sizes']['medium-height']; ?>" alt="<?php echo esc_html( get_the_title( $post_id ) ); ?>" />
		<figcaption>
			<?php echo esc_html( get_the_title( $post_id ) ); ?>
		</figcaption>
	</figure>

</div>