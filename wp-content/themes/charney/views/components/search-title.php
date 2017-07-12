<?php
/**
 * The template for displaying the search title
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
global $wp_query;

if ( ! $wp_query->found_posts )
	return;

$search_query = get_search_query();

$search_title =
	'<h2 class="section-title">' .
		( ( $search_query )
			? sprintf( __( 'Search Results for: %s', 'charney' ), '<span>' . $search_query . '</span>' )
			: __( 'Search Results', 'charney' )
		) .
	'</h2>';

?>

<div class="col-sm-12">

	<?php
		/**
		 * Display the search title
		 */
		echo $search_title;
	?>

</div>