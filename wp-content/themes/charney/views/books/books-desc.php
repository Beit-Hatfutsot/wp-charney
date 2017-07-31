<?php
/**
 * The template for displaying the books page template archive description
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
	$desc = get_field( 'acf-books_description' );
}

if ( ! $desc )
	return;

?>

<div class="content-section archive-desc row">

	<div class="col-sm-12">

		<?php
			/**
			 * Books page template archive description
			 */
			echo $desc;
		?>

	</div>

</div>