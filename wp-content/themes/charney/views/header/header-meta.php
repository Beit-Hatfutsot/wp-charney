<?php
/**
 * The template for displaying the head
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/header
 * @version		1.0.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Google Fonts -->
	<?php

		global $google_fonts;

		if ( $google_fonts ) {
			foreach ( $google_fonts as $key => $val ) {
				printf ( "<link href='%s' rel='stylesheet'>", $val );
			}
		}

	?>

	<?php wp_head(); ?>

	<?php
		/**
		 * gtm head
		 */
		gtm_head();
	?>

</head>