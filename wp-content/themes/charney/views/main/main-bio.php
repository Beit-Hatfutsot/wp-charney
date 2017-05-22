<?php
/**
 * The template for displaying the short bio
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
	$title		= get_field( 'acf-main_bio_title' );
	$image		= get_field( 'acf-main_bio_image' );
	$content	= get_field( 'acf-main_bio_content' );
}

?>

<div class="content-section bio row">

	<div class="col-sm-12">

		<?php
			/**
			 * Bio title
			 */
			echo $title ? '<h2 class="section-title">' . $title . '</h2>' : '';
		?>

	</div>

	<div class="bio-left col-xs-3">

		<?php
			/**
			 * Bio image
			 */
			echo $image ? '<img src="' . $image['sizes']['medium'] . '" width="' . $image['sizes']['medium-width'] . '" height="' . $image['sizes']['medium-height'] . '" alt="' . $image['alt'] . '" />' : '';
		?>

	</div>

	<div class="bio-right col-xs-9">

		<?php
			/**
			 * Bio content
			 */
			echo $content ?? '';
		?>

	</div>

</div>