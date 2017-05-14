<?php
/**
 * The template for displaying post content within loop - video format
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$url	= get_field( 'acf-post-attributes_video_url' );
$cover	= get_field( 'acf-post-attributes_video_cover_image' );

?>