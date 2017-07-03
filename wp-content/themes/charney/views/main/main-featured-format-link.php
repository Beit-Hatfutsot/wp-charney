<?php
/**
 * The template for displaying featured post item - link format
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
	$url	= get_field( 'acf-post-attributes_google_url', $post_id );
}

?>

<div class="blog-item blog-item-link <?php echo $url ? 'blog-item-modal' : 'no-url'; ?>" <?php echo $url ? 'data-item-id="" data-type="link" data-toggle="modal" data-title="' . esc_html( get_the_title( $post_id ) ) . '" data-excerpt="' . esc_html( get_the_excerpt( $post_id ) ) . '" data-url="' . $url . '" data-target="#archive-items-modal"' : '' ; ?>>

	<div class="icon icon-pdf">
		<?php
			/**
			 * Display pdf icon
			 */
			get_template_part( 'views/svgs/shape', 'pdf' );
		?>
	</div>

	<div class="item-title">
		<?php
			if ( ! $url ) {
				printf( __( '<strong>Error loading file:</strong> %s', 'charney' ), esc_html( get_the_title( $post_id ) ) );
			} else {
				echo esc_html( get_the_title( $post_id ) );
			}
		?>
	</div>

	<div class="clearfix"></div>

</div>