<?php
/**
 * The template for displaying the search page
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/page
 * @version		1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="content-section archive-items row">

	<?php
		/**
		 * Display the search title
		 */
		get_template_part( 'views/components/search', 'title' );
	?>

	<?php
		/**
		 * Display the items found
		 */
		get_template_part( 'views/blog/loop' );
	?>

</div>