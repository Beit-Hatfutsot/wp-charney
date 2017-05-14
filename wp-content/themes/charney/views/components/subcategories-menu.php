<?php
/**
 * The template for displaying the category subcategories menu
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! is_category() )
	return;

/**
 * Variables
 */
$category	= get_queried_object();
$parent		= charney_get_category_top_parent( $category->term_id );
$id			= $parent ? $parent : $category->term_id;

$args = array(
	'echo'				=> 0,
	'hide_empty'		=> 0,
	'title_li'			=> '',
	'show_option_none'	=> '',
	'child_of'			=> $id
);

$list = wp_list_categories( $args );

if ( ! $list )
	return;

?>

<div class="content-section subcategories-menu row">

	<div class="col-sm-12">

		<ul>

			<?php
				/**
				 * Category subcategories menu
				 */
				echo '<li class="cat-item cat-item-all' . ( $id == $category->term_id ? ' current-cat' : '' ) . '"><a href="' . get_category_link( $id ) . '">' . __( 'All', 'charney' ) . '</a></li>';
				echo $list;
			?>

		</ul>

	</div>

</div>