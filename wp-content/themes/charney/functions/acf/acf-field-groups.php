<?php
/**
 * ACF Field Groups
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions/acf
 * @version		1.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * ACF register field groups
 * 
 * @fieldgroup	Main
 * @fieldgroup	Post Attributes - Image
 * @fieldgroup	Post Attributes - Video/Audio/Link
 * @fieldgroup	Books
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
			'endpoint' => 0,
		),
		array (
			'key' => 'field_58adad4c94f4e',
			'label' => 'Title',
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
			'label' => 'Image',
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
			'label' => 'Content',
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
		array (
			'key' => 'field_5959efd576030',
			'label' => 'Featured',
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
			'endpoint' => 0,
		),
		array (
			'key' => 'field_5959f00676031',
			'label' => 'Title',
			'name' => 'acf-main_featured_title',
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
			'key' => 'field_5959f04a76032',
			'label' => 'Items',
			'name' => 'acf-main_featured_items',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 4,
			'layout' => 'row',
			'button_label' => 'Add Item',
			'sub_fields' => array (
				array (
					'key' => 'field_5959f0bc76033',
					'label' => 'Type',
					'name' => 'type',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'post' => 'Post',
						'custom' => 'Custom',
					),
					'default_value' => array (
						0 => 'post',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array (
					'key' => 'field_5959f11f76034',
					'label' => 'Post',
					'name' => 'post',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5959f0bc76033',
								'operator' => '==',
								'value' => 'post',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
						0 => 'post',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				),
				array (
					'key' => 'field_5959f14b76035',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5959f0bc76033',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
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
					'key' => 'field_5959f1dc76037',
					'label' => 'Excerpt',
					'name' => 'excerpt',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5959f0bc76033',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => 2,
					'new_lines' => 'wpautop',
				),
				array (
					'key' => 'field_5959f16076036',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'Image Dimensions (px): 450x450',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5959f0bc76033',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
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
					'key' => 'field_5959f387e4179',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_5959f0bc76033',
								'operator' => '==',
								'value' => 'custom',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://',
				),
			),
		),
		array (
			'key' => 'field_58b1e47cf6125',
			'label' => 'Timeline',
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
			'endpoint' => 0,
		),
		array (
			'key' => 'field_58b227664a8f4',
			'label' => 'Title',
			'name' => 'acf-main_timeline_title',
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
			'key' => 'field_58b1e49af6126',
			'label' => 'Source',
			'name' => 'acf-main_timeline_source',
			'type' => 'url',
			'instructions' => 'Google Spreadsheet Link',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'https://docs.google.com/spreadsheets/',
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
	'key' => 'group_58f5e8f15c5e6',
	'title' => 'Post Attributes - Image',
	'fields' => array (
		array (
			'key' => 'field_58f5f345afa58',
			'label' => 'Image',
			'name' => 'acf-post-attributes_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
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
			'mime_types' => 'jpg,jpeg,png',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'image',
			),
		),
	),
	'menu_order' => 2,
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
	'key' => 'group_58f5f4a695641',
	'title' => 'Post Attributes - Video/Audio/Link',
	'fields' => array (
		array (
			'key' => 'field_594a235757819',
			'label' => 'Manual Settings',
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
			'endpoint' => 0,
		),
		array (
			'key' => 'field_58f5f4a69e6a7',
			'label' => 'Google Drive ID',
			'name' => 'acf-post-attributes_google_drive_id',
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
			'key' => 'field_594a23895781a',
			'label' => 'Google Drive API Settings',
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
			'endpoint' => 0,
		),
		array (
			'key' => 'field_594a2474eee2c',
			'label' => 'Instructions',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Do not fill in the fields within this section.
All fields will be filled in automatically upon post update.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array (
			'key' => 'field_594a26123508d',
			'label' => 'URL',
			'name' => 'acf-post-attributes_google_url',
			'type' => 'url',
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
		),
		array (
			'key' => 'field_594a26d03508e',
			'label' => 'Duration',
			'name' => 'acf-post-attributes_google_duration',
			'type' => 'number',
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
			'min' => '',
			'max' => '',
			'step' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'video',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'audio',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'link',
			),
		),
	),
	'menu_order' => 3,
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
	'key' => 'group_597f09aab9643',
	'title' => 'Books',
	'fields' => array (
		array (
			'key' => 'field_597f09edc744d',
			'label' => 'Page Description',
			'name' => 'acf-books_description',
			'type' => 'textarea',
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
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
		),
		array (
			'key' => 'field_597f0a5ac744e',
			'label' => 'Books',
			'name' => 'acf-books_items',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Book',
			'sub_fields' => array (
				array (
					'key' => 'field_597f0a95c744f',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'Image width: 450px',
					'required' => 1,
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
					'mime_types' => 'jpg,jpeg,png',
				),
				array (
					'key' => 'field_597f0b26c7450',
					'label' => 'Title',
					'name' => 'title',
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
					'key' => 'field_597f0b91c7451',
					'label' => 'Description',
					'name' => 'description',
					'type' => 'textarea',
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
					'maxlength' => '',
					'rows' => '',
					'new_lines' => 'wpautop',
				),
				array (
					'key' => 'field_597f0bcfc7452',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/books.php',
			),
		),
	),
	'menu_order' => 4,
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