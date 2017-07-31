<?php
/**
 * The template for displaying the books page template archive
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/books
 * @version		1.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="content-section books row">

	<?php
		/**
		 * Display the books loop
		 */
		get_template_part( 'views/books/loop' );
	?>

</div>