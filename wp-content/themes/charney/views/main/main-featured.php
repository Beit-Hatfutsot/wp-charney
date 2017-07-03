<?php
/**
 * The template for displaying the featured items
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
	$title	= get_field( 'acf-main_featured_title' );
	$items	= get_field( 'acf-main_featured_items' );
}

if ( ! $items )
	return;

?>

<div class="content-section featured row">

	<div class="col-sm-12">

		<?php
			/**
			 * Featured items title
			 */
			echo $title ? '<h2 class="section-title">' . $title . '</h2>' : '';
		?>

	</div>

	<div class="col-sm-12">
		<div class="items row">

			<?php foreach ( $items as $item ) {

				include( locate_template( 'views/main/main-featured-item.php' ) );

			} ?>

		</div>
	</div>

</div>

<?php

	/**
	 * Display the blog archive modal
	 */
	get_template_part( 'views/blog/modal' );

?>