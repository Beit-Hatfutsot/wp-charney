<?php
/**
 * ACF Field Groups
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions/acf
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ACF register field groups
 * 
 * @fieldgroup	Main
 * @fieldgroup	General Options
 */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58adad16ca4c0',
	'title' => 'Main',
	'fields' => array (
		array (
			'key' => 'field_58adad3794f4d',
			'label' => 'Bio',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 1,
		),
		array (
			'key' => 'field_58adad4c94f4e',
			'label' => 'Bio Title',
			'name' => 'acf-main_bio_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_58adadba94f4f',
			'label' => 'Bio Image',
			'name' => 'acf-main_bio_image',
			'type' => 'image',
			'instructions' => 'Image Dimensions (px): 450x450',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_58adae4194f50',
			'label' => 'Bio Content',
			'name' => 'acf-main_bio_content',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/main.php',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_58acb091900b3',
	'title' => 'General Options',
	'fields' => array (
		array (
			'key' => 'field_58acb0bbb6799',
			'label' => 'Header',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'left',
			'endpoint' => 1,
		),
		array (
			'key' => 'field_58acb0d2b679a',
			'label' => 'Introduction',
			'name' => 'acf-general-options_introduction',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_58acb137b679b',
			'label' => 'About Page Text',
			'name' => 'acf-general-options_about_page_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_58acb16eb679c',
			'label' => 'About Page Link',
			'name' => 'acf-general-options_about_page_link',
			'type' => 'page_link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'allow_archives' => 0,
			'multiple' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-general',
			),
		),
	),
	'menu_order' => 11,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;