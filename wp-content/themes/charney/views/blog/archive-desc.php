<?php
/**
 * The template for displaying the archive description
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! is_category() )
	return;

$desc = category_description();

if ( ! $desc )
	return;

?>

<div class="content-section archive-desc row">

	<div class="col-sm-12">

		<?php
			/**
			 * Category archive description
			 */
			echo $desc;
		?>

	</div>

</div>