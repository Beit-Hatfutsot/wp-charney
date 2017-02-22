<?php
/**
 * The template for displaying the sidebar
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php
	/**
	 * charney_before_sidebar hook
	 *
	 * @hooked	charney_theme_sidebar_wrapper_start - 10 (outputs opening divs for the sidebar)
	 */
	do_action('charney_before_sidebar');
?>

<?php
	/**
	 * Display logo
	 */
	?>

	<div class="logo">
		<a href="<?php echo HOME; ?>">
			<?php get_template_part('views/svgs/shape', 'logo'); ?>
		</a>
	</div>

<?php
	/**
	 * Display the left sidebar
	 */
	get_template_part('views/sidebar/sidebar');
?>

<?php
	/**
	 * charney_after_sidebar hook
	 *
	 * @hooked	charney_theme_sidebar_wrapper_end - 10 (outputs closing divs for the sidebar)
	 */
	do_action('charney_after_sidebar');
?>