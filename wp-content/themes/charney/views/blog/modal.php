<?php
/**
 * The template for displaying the blog archive modal
 *
 * @author		Beit Hatfutsot
 * @package		charney/views/blog
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="modal" id="archive-items-modal" tabindex="-1" role="dialog" aria-labelledby="archiveItemsModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="archive-items-modal-title"></h4>

				<div class="close" data-dismiss="modal" aria-label="Close">
					<span class="close-btn" aria-hidden="true"></span>
					<span class="sr-only">Close</span>
				</div>
			</div>

			<div class="modal-body">
				<div class="modal-content" id="archive-items-modal-content"></div>

				<div class="button button-previous-item" id="show-previous-item">
					<?php
						/**
						 * Display left icon
						 */
						get_template_part( 'views/svgs/shape', 'left' );
					?>
				</div>

				<div class="button button-next-item" id="show-next-item">
					<?php
						/**
						 * Display right icon
						 */
						get_template_part( 'views/svgs/shape', 'right' );
					?>
				</div>
			</div>

			<div class="modal-footer">
				<div class="modal-excerpt" id="archive-items-modal-excerpt"></div>
			</div>

		</div>
	</div>
</div>