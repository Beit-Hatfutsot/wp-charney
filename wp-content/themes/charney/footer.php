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

/**
 * Variables
 */
global $globals;

?>

<?php
	/**
	 * charney_after_main_content hook
	 *
	 * @hooked	charney_theme_content_wrapper_end - 10 (outputs closing divs for the main content)
	 */
	do_action( 'charney_after_main_content' );
?>

<?php
	/**
	 * charney_after_page_content hook
	 *
	 * @hooked	charney_theme_wrapper_end - 10 (outputs closing divs for the page)
	 */
	do_action( 'charney_after_page_content' );
?>

<script>

	var js_globals = {};
	js_globals.template_url		= "<?php echo TEMPLATE; ?>";
	js_globals.page_template	= "<?php echo $globals['page_template']; ?>";
	js_globals.timeline_source	= "<?php echo $globals['timeline_source']; ?>";

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
	if ( $globals['page_template'] == 'main.php' && $globals['timeline_source'] != '' ) wp_enqueue_script( 'timeline' );
	wp_enqueue_script( 'general' );

?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
