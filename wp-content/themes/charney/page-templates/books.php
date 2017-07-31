<?php
/**
 * Template Name: Books
 */?>
<?php get_header(); ?>

<?php
	/**
	 * Variables
	 */
	global $globals;
	$globals['page_template'] = 'books.php';
?>

<?php
	/**
	 * Display the page description
	 */
	get_template_part( 'views/books/books', 'desc' );
?>

<?php

	// Content
	get_template_part( 'views/books/archive' );
	
?>

<?php get_footer(); ?>