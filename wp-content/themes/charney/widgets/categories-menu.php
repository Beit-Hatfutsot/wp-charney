<?php
/**
 * Categories Menu widget
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Charney_Categories_Menu_Widget extends WP_Widget {

	var $form_fields;

	/**
	 * __construct
	 *
	 * Widget constructor
	 *
	 * @param	N/A
	 * @return	N/A
	 */
	function __construct() {

		$this->widget_id			= 'Charney_Categories_Menu_Widget';
		$this->widget_name			= __( 'Charney Categories Menu', 'charney' );
		$this->widget_cssclass		= 'charney-categories-menu-widget';
		$this->widget_description	= __( 'Add categories menu.', 'charney' );

		$widget_ops = array(
			'classname'		=> $this->widget_cssclass,
			'description'	=> $this->widget_description
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );

		// form fields
		$this->form_fields = array(
			'title'			=> '',	// Widget title
			'show_empty'	=> '',	// Show empty categories
			'show_all'		=> ''	// Show "All" sublink for parent category
		);

	}

	/**
	 * form
	 *
	 * Admin widget form
	 *
	 * @param	$instance (array) Widget instance values
	 * @return	N/A
	 */
	function form( $instance ) {

		$this->form_fields['title']			= isset( $instance['title'] )		? $instance['title']		: '';
		$this->form_fields['show_empty']	= isset( $instance['show_empty'] )	? $instance['show_empty']	: '';
		$this->form_fields['show_all']		= isset( $instance['show_all'] )	? $instance['show_all']		: '';

		$this->generate_widget_form();

	}

	/**
	 * update
	 *
	 * Widget update
	 *
	 * @param	$new_instance (array) Widget instance new values
	 * @param	$old_instance (array) Widget instance old values
	 * @return	$instance (array) Widget instance updated values
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']		= $new_instance['title'];
		$instance['show_empty']	= $new_instance['show_empty'];
		$instance['show_all']	= $new_instance['show_all'];

		// return
		return $instance;

	}

	/**
	 * widget
	 *
	 * Widget frontend
	 *
	 * @param	$args (array)
	 * @param	$instance (array)
	 * @return	N/A
	 */
	function widget( $args, $instance ) {

		extract($args, EXTR_SKIP);

		// Widget content
		echo $before_widget;

		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance);
		if ( ! empty($title) ) {
			echo $before_title . $title . $after_title;
		}

		echo $this->get_categories_menu( $instance['show_empty'], $instance['show_all'] );

		echo $after_widget;
	}

	/**
	 * get_form_field
	 *
	 * This function returns a value from the form_fields array found in Charney_Categories_Menu_Widget object
	 *
	 * @param	$name (string) The form field name to return
	 * @return	(mixed)
	 */
	private function get_form_field( $name, $default = null ) {

		$form_field = charney_maybe_get( $this->form_fields, $name, $default );

		// return
		return $form_field;

	}

	/**
	 * generate_widget_form
	 *
	 * This function generates the widget form
	 *
	 * @param	N/A
	 * @return	N/A
	 */
	private function generate_widget_form() {

		$title		= $this->get_form_field( 'title' );
		$show_empty	= $this->get_form_field( 'show_empty' );
		$show_all	= $this->get_form_field( 'show_all' );

		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'charney' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $this->form_fields['title'] ); ?>" /></label></p>

		<p>
			<label for="<?php echo $this->get_field_id('show_empty'); ?>"><input id="<?php echo $this->get_field_id('show_empty'); ?>" name="<?php echo $this->get_field_name('show_empty'); ?>" type="checkbox" <?php echo esc_attr($show_empty) ? 'checked' : ''; ?> /><?php _e( 'Show Empty Categories', 'charney' ); ?></label><br />
			<label for="<?php echo $this->get_field_id('show_all'); ?>"><input id="<?php echo $this->get_field_id('show_all'); ?>" name="<?php echo $this->get_field_name('show_all'); ?>" type="checkbox" <?php echo esc_attr($show_all) ? 'checked' : ''; ?> /><?php _e( 'Show "All" Sublink for Parent Category', 'charney' ); ?></label>
		</p>

		<?php

	}

	/**
	 * get_categories_menu
	 *
	 * This function returns the catgories menu HTML code
	 *
	 * @param	$show_empty (string)
	 * @param	$show_all (string)
	 * @return	(string)
	 */
	private function get_categories_menu( $show_empty, $show_all ) {

		$output = '';

		$args = array(
			'echo'			=> 0,
			'hide_empty'	=> $show_empty ? 0 : 1,
			'title_li'		=> ''
		);

		if ( $show_all ) {
			// Show "All" sublink for parent category, using a custom walker category
			$args['walker'] = new Charney_Walker_Category();
		}

		$list = wp_list_categories( $args );

		if ( $list )
			$output = '<ul>' . $list . '</ul>';

		// return
		return $output;

	}

}