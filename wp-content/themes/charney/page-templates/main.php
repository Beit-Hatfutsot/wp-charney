<?php
/**
 * Template Name: Main
 */?>
<?php get_header(); ?>

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

<?php get_footer(); ?>