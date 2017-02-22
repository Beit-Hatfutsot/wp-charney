<?php
/**
 * The template for displaying the main banner
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Variables
if ( function_exists('get_field') ) {
	$intro		= get_field('acf-general-options_introduction', 'option');
	$about_text	= get_field('acf-general-options_about_page_text', 'option');
	$about_link	= get_field('acf-general-options_about_page_link', 'option');
}

?>

<div class="main-banner row">

	<div class="main-banner-left col-sm-7">

		<?php
			/**
			 * Display the site introduction
			 */
			echo $intro ? '<h1>' . $intro . '</h1>' : '';
		?>

	</div>

	<div class="main-banner-right col-sm-5">

		<div class="row">

			<div class="col-sm-6">

				<?php
					/**
					 * Display the link to about page
					 */
					echo $about_text && $about_link ? '<a class="about-page" href="' . $about_link . '">' . $about_text . '</a>' : '';
				?>

			</div>

			<div class="col-sm-6">

				<?php
					/**
					 * Display BH logo
					 */
					get_template_part('views/svgs/shape', 'bh-logo');
				?>

			</div>

		</div>

	</div>

</div>