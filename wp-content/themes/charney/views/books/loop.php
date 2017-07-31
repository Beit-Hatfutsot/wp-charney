<?php
/**
 * The template for displaying the books page template archive loop
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/books
 * @version		1.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
if ( function_exists('get_field') ) {
	$books = get_field( 'acf-books_items' );
}

if ( $books ) { ?>

	<div class="col-sm-12">

		<?php
			/**
			 * Display each single book item
			 */
			foreach ( $books as $b ) {
				include( locate_template( 'views/books/loop-item.php' ) );
			}
		?>

	</div>

<?php } else { ?>

	<div class="not-found-wrapper col-sm-12">

		<?php
			/**
			 * Not found
			 */
			get_template_part( 'views/components/not-found' );
		?>

	</div>

<?php } ?>