<?php
/**
 * The template for displaying Not Found message
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/components
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="not-found">

	<p class="not-found-title"><?php _e( 'No Records Found', 'charney' ); ?></p>
	<p><?php printf('%s <a href="' . HOME . '">%s</a>', __( 'Return to', 'charney' ), __( 'homepage', 'charney' ) ); ?></p>

</div>