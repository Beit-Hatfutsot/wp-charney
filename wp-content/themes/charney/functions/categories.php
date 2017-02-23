<?php
/**
 * Categories menu walker
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Charney_Walker_Category extends Walker_Category {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker_Category::start_lvl()
	 *
	 * @param string $output Used to append additional content. Passed by reference.
	 * @param int    $depth  Optional. Depth of category. Used for tab indentation. Default 0.
	 * @param array  $args   Optional. An array of arguments. Will only append content if style argument
	 *                       value is 'list'. See wp_list_categories(). Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {

		parent::start_lvl( $output, $depth, $args );

		// Add "All" sublink
		$output .= '<li class="cat-item cat-item-all cat-item-all-' . $this->current_cat->term_id . '"><a href="' . esc_url( get_term_link( $this->current_cat ) ) . '">All</a></li>';

	}

	/**
	 * Starts the element output.
	 *
	 * @access public
	 *
	 * @see Walker_Category::start_el()
	 *
	 * @param string $output   Passed by reference. Used to append additional content.
	 * @param object $category Category data object.
	 * @param int    $depth    Optional. Depth of category in reference to parents. Default 0.
	 * @param array  $args     Optional. An array of arguments. See wp_list_categories(). Default empty array.
	 * @param int    $id       Optional. ID of the current category. Default 0.
	 */
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {

		parent::start_el( $output, $category, $depth, $args, $id );

		// Store cureent category object to be used later on
		$this->current_cat = $category;

	}

}