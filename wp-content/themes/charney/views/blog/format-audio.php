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

?>

<div class="blog-item blog-item-audio <?php echo $url ? '' : 'no-url'; ?>">

	<div class="icon icon-audio">
		<?php
			/**
			 * Display audio icon
			 */
			get_template_part( 'views/svgs/shape', 'audio' );
		?>
	</div>

	<div class="item-title">
		<?php
			if ( ! $url ) {
				printf( __( '<strong>Error loading file:</strong> %s', 'charney' ), get_the_title() );
			} else {
				the_title();
			}
		?>
	</div>

	<div class="clearfix"></div>

</div>