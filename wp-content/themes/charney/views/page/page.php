<?php
/**
 * The template for displaying default content page
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/page
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="content-section row">

	<div class="col-sm-12">

		<?php
			/**
			 * Section title
			 */
			echo '<h2 class="section-title">' . get_the_title() . '</h2>';
		?>

		<?php
			/**
			 * Section content
			 */
			the_content();
		?>

	</div>

</div>