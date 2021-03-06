<?php
/**
 * The template for displaying the blog archive loop
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( have_posts() ) : ?>

	<div class="masonry col-sm-12">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'views/blog/loop', 'item' );

		endwhile; ?>

	</div>

<?php endif; ?>

<div class="not-found-wrapper col-sm-12">

	<?php
		/**
		 * Not found
		 */
		get_template_part( 'views/components/not-found' );
	?>

</div>