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
$url			= get_field( 'acf-post-attributes_video_url' );
$cover			= get_field( 'acf-post-attributes_video_cover_image' );
$default_cover	= get_field( 'acf-general-options_default_video_cover_image', 'option' );

if ( ! $url || ! ( $cover || $default_cover ) )
	return;

$image = $cover ? $cover : $default_cover;

?>

<div class="blog-item blog-item-video">

	<figure>
		<img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['sizes']['medium-width']; ?>" height="<?php echo $image['sizes']['medium-height']; ?>" alt="<?php the_title(); ?>" />
		<figcaption>
			<?php the_title(); ?>
		</figcaption>

		<div class="icon icon-play">
			<?php get_template_part( 'views/svgs/shape', 'play' ); ?>
		</div>
	</figure>

</div>