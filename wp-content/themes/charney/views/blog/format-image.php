<?php
/**
 * The template for displaying post content within loop - image format
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$image	= get_field( 'acf-post-attributes_image' );

if ( ! $image )
	return;

?>

<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />