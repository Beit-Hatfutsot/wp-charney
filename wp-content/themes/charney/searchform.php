<?php
/**
 * The template for displaying search form
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Variables
$search_string = __('Search in site...', 'charney');

?>

<form method="get" class="search-form" action="<?php echo HOME; ?>">
	<input type="text" class="search-field <?php echo ( isset($_GET['s']) && $_GET['s'] ) ? 'active' : ''; ?>" value="<?php echo ( isset($_GET['s']) && $_GET['s'] ) ? $_GET['s'] : $search_string; ?>" name="s" onfocus="if (this.value == '<?php echo $search_string; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $search_string; ?>';}" />
	<div class="search-submit-wrapper">
		<div class="magnifying-glass"></div>
		<input type="submit" class="search-submit" value="" title="<?php echo $search_string; ?>" alt="<?php echo $search_string; ?>" />
	</div>
</form>