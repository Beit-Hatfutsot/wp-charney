<?php
/**
 * The template for displaying the featured item
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/main
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
global $globals;

$type = $item['type'];

if ( $type == 'post' ) {
	$post_id	= $item['post']->ID;
	$format		= get_post_format( $post_id );

	if ( ! in_array( $format, array_keys( $globals['supported_formats'] ) ) )
		return;

	$title		= esc_html( $item['post']->post_title );
	$excerpt	= esc_html( $item['post']->post_excerpt );
}
else {
	$title		= esc_html( $item['title'] );
	$excerpt	= esc_html( strip_tags( $item['excerpt'] ) );
	$image		= $item['image'];
	$link		= esc_url( $item['link'] );
}

?>

<div class="item col-md-4 col-sm-6 col-xs-4">

	<div class="item-title"><?php echo $title ?? ''; ?></div>

	<div class="item-body-wrap">
		<div class="item-body">

			<?php
				if ( $type == 'post' ) {

					/**
					 * Display item content
					 */
					include( locate_template( 'views/main/main-featured-format-' . $format . '.php' ) );

				}
				else if ( $image ) { ?>

					<?php echo $link ? '<a href="' . $link . '">' : ''; ?>

						<figure>
							<img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['sizes']['medium-width']; ?>" height="<?php echo $image['sizes']['medium-height']; ?>" alt="<?php echo $title ?? ''; ?>">
						</figure>

					<?php echo $link ? '</a>' : ''; ?>

				<?php }
			?>

		</div>
	</div>

	<div class="item-excerpt"><?php echo $excerpt ?? ''; ?></div>

</div>