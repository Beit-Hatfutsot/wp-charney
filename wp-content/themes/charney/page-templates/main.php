<?php
/**
 * Template Name: Main
 */?>
<?php get_header(); ?>

<?php
	/**
	 * Variables
	 */
	global $globals;
	$globals['page_template'] = 'main.php';
?>

<?php
	/**
	 * get_search_form
	 *
	 * Get the search form
	 */
	get_search_form();
?>

<?php
	/**
	 * Display the short bio
	 */
	get_template_part('views/main/main', 'bio');
?>

<?php
	/**
	 * Display the timeline
	 */
	get_template_part('views/main/main', 'timeline');
?>

<?php get_footer(); ?>