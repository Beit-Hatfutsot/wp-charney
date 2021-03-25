<?php
/**
 * The template for displaying the main banner
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
if ( function_exists('get_field') ) {
	$intro		= get_field( 'acf-general-options_introduction', 'option' );
	$about_text	= get_field( 'acf-general-options_about_page_text', 'option' );
	$about_link	= get_field( 'acf-general-options_about_page_link', 'option' );
}

?>

<div class="content-section main-banner row">

	<div class="main-banner-left col-lg-7 col-sm-6">

		<?php
			/**
			 * Display the site introduction
			 */
			echo $intro ? '<h1>' . $intro . '</h1>' : '';
		?>

	</div>

	<div class="main-banner-right col-lg-5 col-sm-6">

		<div class="row">

			<div class="about-page-wrapper col-xs-6">

				<?php
					/**
					 * Display the link to about page
					 */
					echo $about_text && $about_link ? '<a class="about-page" href="' . $about_link . '">' . $about_text . '</a>' : '';
				?>

			</div>

			<div class="logo-wrapper col-xs-6">

				<?php
					/**
					 * Display BH logo
					 */
					?>

					<a href="//www.anumuseum.org.il" target="_blank">
						<?php get_template_part( 'views/svgs/shape', 'anu-logo' ); ?>
					</a>

			</div>

		</div>

	</div>

</div>