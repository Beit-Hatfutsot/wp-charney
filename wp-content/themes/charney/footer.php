<?php
/**
 * Theme footer
 *
 * Contains the theme wrapper end
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php
	/**
	 * charney_after_main_content hook
	 *
	 * @hooked	charney_theme_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action('charney_after_main_content');
?>

<script>

	var js_globals = {};
	js_globals.template_url	= "<?php echo TEMPLATE; ?>";

</script>

<?php

	/**
	 * Display footer
	 */
	get_template_part( 'views/footer/footer' );

	/**
	 * PhotoSwipe
	 */
	get_template_part( 'views/footer/footer-photoswipe' );

	/**
	 * Footer scripts
	 */
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'photoswipe' );
	wp_enqueue_script( 'photoswipe-ui-default' );
	wp_enqueue_script( 'general' );

?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
