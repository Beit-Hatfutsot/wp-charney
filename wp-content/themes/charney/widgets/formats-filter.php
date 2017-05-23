<?php
/**
 * Formats Filter widget
 *
 * @author		Beit Hatfutsot
 * @package		charney/widgets
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Charney_Formats_Filter_Widget extends WP_Widget {

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

		$this->widget_id			= 'Charney_Formats_Filter_Widget';
		$this->widget_name			= __( 'Charney Formats Filter', 'charney' );
		$this->widget_cssclass		= 'charney-formats-filter-widget';
		$this->widget_description	= __( 'Add posts formats filter.', 'charney' );

		$widget_ops = array(
			'classname'		=> $this->widget_cssclass,
			'description'	=> $this->widget_description
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );

		// form fields
		$this->form_fields = array(
			'title'			=> '',	// Widget title
			'clear_btn'		=> ''	// Show "Clear" button
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
		$this->form_fields['clear_btn']		= isset( $instance['clear_btn'] )	? $instance['clear_btn']	: '';

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
		$instance['clear_btn']	= $new_instance['clear_btn'];

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

		// Check if is category archive page
		if ( ! is_category() )
			return;

		// Get supported formats
		global $globals;
		$formats = $globals['supported_formats'];

		if ( ! $formats )
			return;

		// Widget content
		echo $before_widget;

		$title = '';
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance);

		if ( $instance['clear_btn'] ) {
			$title .= '<sapn class="clear-filter">(' . __( 'Clear', 'charney' ) . ')</span>';
		}

		if ( ! empty($title) ) {
			echo $before_title . $title . $after_title;
		}

		echo $this->get_formats_filter( $formats );

		echo $after_widget;

	}

	/**
	 * get_form_field
	 *
	 * This function returns a value from the form_fields array found in Charney_Formats_Filter_Widget object
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
		$clear_btn	= $this->get_form_field( 'clear_btn' );

		?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'charney' ); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $this->form_fields['title'] ); ?>" /></label></p>

		<p>
			<label for="<?php echo $this->get_field_id('clear_btn'); ?>"><input id="<?php echo $this->get_field_id('clear_btn'); ?>" name="<?php echo $this->get_field_name('clear_btn'); ?>" type="checkbox" <?php echo esc_attr($clear_btn) ? 'checked' : ''; ?> /><?php _e( 'Show "Clear" button', 'charney' ); ?></label>
		</p>

		<?php

	}

	/**
	 * get_formats_filter
	 *
	 * This function returns the posts formats filter HTML code
	 *
	 * @param	$formats (array)
	 * @return	(string)
	 */
	private function get_formats_filter( $formats ) {

		if ( ! $formats )
			return;

		$output = '';

		$output .= '<ul>';

		foreach ($formats as $f => $labels) {
			$output .= '<li class="filter filter-' . $f . '">' . $labels['name'] . '</li>';
		}

		$output .= '</ul>';

		// return
		return $output;

	}

}