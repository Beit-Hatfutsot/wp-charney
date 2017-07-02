<?php
/**
 * The template for displaying post content within loop - video format
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
	$drive_item_id	= get_field( 'acf-post-attributes_google_drive_id' );
	$url			= get_field( 'acf-post-attributes_google_url' );
	$duration		= get_field( 'acf-post-attributes_google_duration' );
}

// Build thumbnail URL
$thumbnail = $drive_item_id && $url ? 'https://drive.google.com/thumbnail?authuser=0&sz=w450&id=' . $drive_item_id : TEMPLATE . '/images/general/placeholder.png';

?>

<div class="blog-item blog-item-video <?php echo $url ? '' : 'no-url'; ?>">

	<figure>
		<img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" />
		<figcaption>
			<?php the_title(); ?>
		</figcaption>

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