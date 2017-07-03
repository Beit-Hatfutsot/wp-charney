<?php
/**
 * The template for displaying featured post item - video format
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
	$drive_item_id	= get_field( 'acf-post-attributes_google_drive_id',	$post_id );
	$url			= get_field( 'acf-post-attributes_google_url',		$post_id );
	$duration		= get_field( 'acf-post-attributes_google_duration',	$post_id );
}

// Build thumbnail URL
$thumbnail = $drive_item_id && $url ? 'https://drive.google.com/thumbnail?authuser=0&sz=w450&id=' . $drive_item_id : TEMPLATE . '/images/general/placeholder.png';

?>

<div class="blog-item blog-item-video <?php echo $url ? 'blog-item-modal' : 'no-url'; ?>" <?php echo $url ? 'data-item-id="" data-type="video" data-toggle="modal" data-title="' . esc_html( get_the_title( $post_id ) ) . '" data-excerpt="' . esc_html( get_the_excerpt( $post_id ) ) . '" data-url="' . $url . '" data-target="#archive-items-modal"' : '' ; ?>>

	<figure>
		<img src="<?php echo $thumbnail; ?>" alt="<?php echo esc_html( get_the_title( $post_id ) ); ?>" />

		<?php if ( $duration ) { ?>
			<div class="duration">
				<?php
					echo charney_milliseconds_to_time( $duration );
				?>
			</div>
		<?php } ?>

		<div class="icon icon-play">
			<?php
				/**
				 * Display play icon
				 */
				get_template_part( 'views/svgs/shape', 'play' );
			?>
		</div>
	</figure>

</div>