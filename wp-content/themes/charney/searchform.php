<?php
/**
 * The template for displaying the search form
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 *
 * @todo		Narrowing search for category archive
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Variables
$search_string	= __('Search', 'charney');
$template		= '';	// Page template

// Add/modify variables based on page template
if ( 'main.php' == basename( get_page_template() ) ) {
	// Main page template
	$template = 'main';

	$title		= __("Know what you're looking for?", 'charney');
	$comment	= __('Unsure? you are welcome to search by category using the menu', 'charney');
}
else {
	// Category archive
	$search_string	= __('Search in', 'charney');
}

?>

<div class="content-section search-form row">

	<div class="col-sm-12">

		<?php
			/**
			 * Search form title
			 */
			echo $template == 'main' && $title ? '<h2 class="section-title">' . $title . '</h2>' : '';
		?>

		<?php
			/**
			 * Display the search form
			 */
			include( locate_template('views/components/searchform.php') );
		?>

		<?php
			/**
			 * Search form comment
			 */
			echo $template == 'main' && $comment ? '<small>' . $comment . '</small>' : '';
		?>

	</div>

</div>