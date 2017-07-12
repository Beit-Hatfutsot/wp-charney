<?php
/**
 * The template for displaying the search form
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.2
 *
 * @todo		Narrowing search for category archive
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<form method="get" action="<?php echo HOME; ?>">
	<input type="hidden" class="field" name="post_type" id="post_type" value="post" />
	<input type="text" class="search-field <?php echo ( isset($_GET['s']) && $_GET['s'] ) ? 'active' : ''; ?>" placeholder="<?php echo $search_string; ?>" value="<?php echo ( isset($_GET['s']) && $_GET['s'] ) ? $_GET['s'] : ''; ?>" name="s" />
	<div class="search-submit-wrapper">
		<?php
			/**
			 * Display search button
			 */
			get_template_part( 'views/svgs/shape', 'search' );
		?>
		<input type="submit" class="search-submit" value="" title="<?php echo $search_string; ?>" alt="<?php echo $search_string; ?>" />
	</div>
</form>