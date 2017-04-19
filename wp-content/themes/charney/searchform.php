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

/**
 * Variables
 */
$template		= '';	// Page template

/**
 * Add/modify variables based on page template
 */
if ( is_category() ) {

	// Category archive
	$template		= 'archive';
	$search_string	= single_cat_title( __( 'Search in ', 'charney' ), false );

}
else {

	// Page
	$template		= 'page';
	$search_string	= __( 'Search', 'charney' );
	$title			= __( "Know what you're looking for?", 'charney' );
	$comment		= __( 'Unsure? you are welcome to search by category using the menu', 'charney' );

}

?>

<div class="content-section search-form row">

	<div class="col-sm-12">

		<?php
			/**
			 * Search form title
			 */
			echo $template == 'page' && $title ? '<h2 class="section-title">' . $title . '</h2>' : '';
		?>

		<?php
			/**
			 * Display the search form
			 */
			include( locate_template( 'views/components/searchform.php' ) );
		?>

		<?php
			/**
			 * Search form comment
			 */
			echo $template == 'page' && $comment ? '<small>' . $comment . '</small>' : '';
		?>

	</div>

</div>