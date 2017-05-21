<?php
/**
 * The template for displaying post within loop
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
global $globals;

$post_id	= get_the_id();
$format		= get_post_format( $post_id );

if ( ! in_array( $format, $globals['supported_formats'] ) )
	return;

?>

<div class="masonry-panel masonry-panel-<?php echo $format; ?>" id="masonry-panel-<?php echo $post_id; ?>">

	<div class="masonry-panel__content">

		<?php
			/**
			 * Display item content
			 */
			get_template_part( 'views/blog/format', $format );
		?>

	</div>

</div>