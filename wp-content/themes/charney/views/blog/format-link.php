<?php
/**
 * The template for displaying post content within loop - link format
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$url	= get_field( 'acf-post-attributes_pdf_url' );

if ( ! $url )
	return;

?>

<div class="blog-item blog-item-link">

	<div class="icon icon-pdf">
		<?php get_template_part( 'views/svgs/shape', 'pdf' ); ?>
	</div>

	<div class="item-title">
		<?php the_title(); ?>
	</div>

	<div class="clearfix"></div>

</div>