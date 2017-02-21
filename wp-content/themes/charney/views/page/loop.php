<?php
/**
 * The template for displaying default page content
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/page
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<article class="post" id="post-<?php the_ID(); ?>">

	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
	</a>

	<div class="entry">
		<?php the_excerpt(); ?>
	</div>

</article>