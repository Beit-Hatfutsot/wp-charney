<?php
/**
 * The template for displaying the timeline
 *
 * @author    Beit Hatfutsot
 * @package   charney/views/main
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
global $globals;

if ( function_exists('get_field') ) {
	$title				= get_field( 'acf-main_timeline_title' );
	$timeline_source	= get_field( 'acf-main_timeline_source' );
}

if ( ! $timeline_source )
	return;

$globals['timeline_source'] = $timeline_source;

?>

<div class="content-section timeline row">

	<div class="col-sm-12">

		<?php
			/**
			 * Timeline title
			 */
			echo $title ? '<h2 class="section-title">' . $title . '</h2>' : '';
		?>

	</div>

	<div id="timeline-embed" style="width: 100%; height: 400px"></div>

</div>