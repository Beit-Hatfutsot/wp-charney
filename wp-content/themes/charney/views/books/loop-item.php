<?php
/**
 * The template for displaying a single book within loop
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/books
 * @version		1.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
$image	= $b['image'];
$title	= $b['title'];
$desc	= $b['description'];
$link	= esc_url( $b['link'] );

if ( ! $image || ! $title )
	return;

?>

<div class="book">
	<div class="row">

		<div class="image col-xs-4"><?php echo $image ? '<img src="' . $image['sizes']['medium'] . '" width="' . $image['sizes']['medium-width'] . '" height="' . $image['sizes']['medium-height'] . '" alt="' . $title . '" />' : ''; ?></div>

		<div class="content col-xs-8">

			<h2><?php echo $title; ?></h2>
			<small><?php _e( 'By Leon Charney', 'charney' ); ?></small>

			<div class="desc"><?php echo $desc; ?></div>

			<?php if ( $link ) { ?>
				<a class="purchase" href="<?php echo $link; ?>" target="_blank"><?php _e( 'Purchase', 'charney' ); ?></a>
			<?php } ?>

		</div>

	</div>
</div>