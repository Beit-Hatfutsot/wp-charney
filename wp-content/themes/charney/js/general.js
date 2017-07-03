var $ = jQuery,
	Charney_general = {

		/**
		 * Params
		 */
		params : {

			window_width	: 0,	// Client window width - used to maintain window resize events (int)
			breakpoint		: '',	// CSS media query breakpoint (int)
			prev_breakpoint	: '',	// Previous media query breakpoint (int)
			timeout			: 400,	// General timeout (int)

			// Masonry
			masonry_classes		: {
				masonry_container	: 'masonry',
				masonry_panel		: 'masonry-panel',
				masonry_item		: 'masonry-panel__content',
				masonry_pad			: 'masonry-pad'
			},
			masonry_cols		: {
				'width-1200'	: 3,
				'width-1199'	: 3,
				'width-991'		: 2,
				'width-767'		: 3,
				'width-650'		: 2,
				'width-480'		: 1
			},
			masonry_heights		: [],
			masonry_maxHeight	: '',

			// Modal
			modal_current_item	: ''

		},

		/**
		 * init
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		init : function() {

			// jQuery extentions
			$.fn.setAllToMaxHeight = function() {
				// return
				return this.height( Math.max.apply(this, $.map(this, function(e) { return $(e).height() })) );
			}

			// Timeline
			if ( js_globals.page_template == 'main.php' && js_globals.timeline_source.length ) {
				Charney_general.timeline(js_globals.timeline_source);
			}

			// Masonry
			Charney_general.masonry();

			// Modal
			Charney_general.modal();

		},

		/**
		 * timeline
		 *
		 * Load timeline
		 *
		 * @param	src (string)
		 * @return	N/A
		 */
		timeline : function(src) {

			var timeline_options = {
				timenav_position : 'top',
				slide_padding_lr : 50
			}

			timeline = new TL.Timeline('timeline-embed', src, timeline_options);

		},

		/**
		 * masonry
		 *
		 * Initialize masonry
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		masonry : function() {

			// Bind click event to formats filter
			$('.filter').bind('click', function() {
				Charney_general.masonry_filter($(this).attr('class').split(' ')[1].substring(7));
			});

			// Bind click event to "Clear" button
			$('.clear-filter').bind('click', function() {
				Charney_general.masonry_clear_filter();
			});

		},

		/**
		 * masonry_init
		 *
		 * Initialize masonry grid
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		masonry_init : function() {

			// Params
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container),
				pads		= $('.' + Charney_general.params.masonry_classes.masonry_pad);

			// Remove pads
			if (pads.length) {
				pads.remove();
			}

			// Remove container style (height)
			container.removeAttr('style');

			// Hide "Not found" message
			container.next('.not-found-wrapper').hide();

			// Show archive items grid
			$('.archive-items').show();

		},

		/**
		 * masonry_set_heights
		 *
		 * Set masonry container and panels heights
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		masonry_set_heights : function() {

			// Params
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container),
				panels		= $('.' + Charney_general.params.masonry_classes.masonry_panel);

			// Initiate masonry_heights
			var heights = [];

			if (panels.length) {
				panels.each(function() {
					// Skip unfiltered items
					if ($(this).hasClass('hidden'))
						return true;

					// Update panel height
					$(this).css('height', $(this).children().outerHeight());

					// Update masonry_heights
					order = $(this).css('order');
					if (!heights[order - 1]) {
						heights[order - 1] = 0;
					}
					heights[order - 1] += $(this).outerHeight();
				});
			}

			Charney_general.params.masonry_heights = heights;

			// Update container height
			Charney_general.params.masonry_maxHeight = Math.max.apply(Math, heights);
			container.css('height', Charney_general.params.masonry_maxHeight);

			if (!heights.length) {
				// Show "Not found" message
				container.next('.not-found-wrapper').show();
			}

		},

		/**
		 * masonry_pads
		 *
		 * Fill container with pads elements
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		masonry_pads : function() {

			// Params
			var breakpoint	= Charney_general.params.breakpoint,
				cols		= Charney_general.params.masonry_cols['width-' + breakpoint],
				heights		= Charney_general.params.masonry_heights,
				maxHeight	= Charney_general.params.masonry_maxHeight;

			// Create pads for filled columns
			$.map(heights, function (height, idx) {
				if (height < maxHeight && height > 0) {
					Charney_general.masonry_create_pad(height, cols, idx + 1);
				}
			});

			// Create pads for empty columns
			for (var i = heights.length ; i < cols ; i++) {
				Charney_general.masonry_create_pad(0, cols, i + 1);
			}

		},

		/**
		 * masonry_create_pad
		 *
		 * Create and append pad element
		 *
		 * @param	height (int) current col filled height
		 * @param	cols (int) number of cols in grid - used only for empty column
		 * @param	order (int) required pad order
		 * @return	N/A
		 */
		masonry_create_pad : function(height, cols, order) {

			// Params
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container),
				maxHeight	= Charney_general.params.masonry_maxHeight,
				pad_class	= Charney_general.params.masonry_classes.masonry_pad;

			if (typeof height === "undefined" || height === null) {
				height = 0;
			}

			var pad = $('<div>', {class: pad_class});

			if (height === 0) {
				pad.css('width', 100 / cols + '%')
			}

			pad.css({
				'height'					: maxHeight - height + 'px',
				'-webkit-box-ordinal-group'	: order,
				'-moz-box-ordinal-group'	: order,
				'-ms-flex-order'			: order,
				'-webkit-order'				: order,
				'order'						: order
			});

			container.append(pad);

		},

		/**
		 * masonry_filter
		 *
		 * Filter items according to a given format
		 *
		 * @param	format (string)
		 * @return	N/A
		 */
		masonry_filter : function(format) {

			if (!format)
				return;

			// Params
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container);

			// Mark filter item as active
			$('.filter').removeClass('active');
			$('.filter-' + format).addClass('active');

			// Mark container as filtered
			container.addClass('filtered');

			// Initialize masonry grid
			Charney_general.masonry_init();

			// Hide all different format items
			Charney_general.masonry_hide_unfiltered(format);

			// Reorder filtered format items
			Charney_general.masonry_reorder(format);

			// Set masonry container and panels heights
			Charney_general.masonry_set_heights();

			// Fill container with pads elements
			Charney_general.masonry_pads();

		},

		/**
		 * masonry_hide_unfiltered
		 *
		 * Hide all different format items
		 *
		 * @param	format (string)
		 * @return	N/A
		 */
		masonry_hide_unfiltered : function(format) {

			if (!format)
				return;

			// Params
			var panels			= $('.' + Charney_general.params.masonry_classes.masonry_panel),
				format_panels	= $('.' + Charney_general.params.masonry_classes.masonry_panel + '-' + format);

			// Hide all panels
			panels.addClass('hidden');

			// Expose all format panels
			format_panels.removeClass('hidden');

		},

		/**
		 * masonry_reorder
		 *
		 * Reorder filtered format items
		 *
		 * @param	format (string)
		 * @return	N/A
		 */
		masonry_reorder : function(format) {

			if (!format)
				return;

			// Params
			var format_panels	= $('.' + Charney_general.params.masonry_classes.masonry_panel + '-' + format),
				breakpoint		= Charney_general.params.breakpoint;

			cols				= Charney_general.params.masonry_cols['width-' + breakpoint];
			order_idx			= 0;

			if (format_panels.length) {
				format_panels.each(function() {
					var order = (order_idx + 1) % cols === 0 ? cols : (order_idx + 1) % cols;

					$(this).css({
						'-webkit-box-ordinal-group'	: order,
						'-moz-box-ordinal-group'	: order,
						'-ms-flex-order'			: order,
						'-webkit-order'				: order,
						'order'						: order
					});

					order_idx++;
				});
			}

		},

		/**
		 * masonry_clear_filter
		 *
		 * Clear filter and re-initialize masonry grid
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		masonry_clear_filter : function() {

			// Params
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container);

			// Clear marked filter items
			$('.filter').removeClass('active');

			// Clear marked container as filtered
			container.removeClass('filtered');

			// Initialize masonry grid
			Charney_general.masonry_init();

			// Expose all items
			Charney_general.masonry_expose_items();

			// Set masonry container and panels heights
			Charney_general.masonry_set_heights();

			// Fill container with pads elements
			Charney_general.masonry_pads();

		},

		/**
		 * masonry_expose_items
		 *
		 * Expose all items
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		masonry_expose_items : function() {

			// Params
			var panels			= $('.' + Charney_general.params.masonry_classes.masonry_panel);

			// Expose all format panels and remove style attribute (order & height)
			panels.removeClass('hidden').removeAttr('style');

		},

		/**
		 * modal
		 *
		 * Initialize modal
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		modal : function() {

			// Params
			var selector,
				counter = 0;

			// Update item IDs
			$('[data-item-id]').each(function() {
				counter++;
				$(this).attr('data-item-id', counter);
			});

			// Bind items click event
			$('.blog-item-modal').on('click',function() {
				Charney_general.modal_update($(this), counter);
			});

			// Bind next/previous buttons click events
			$('#show-next-item, #show-previous-item').click(function() {
				if($(this).attr('id') == 'show-previous-item') {
					Charney_general.params.modal_current_item--;
				} else {
					Charney_general.params.modal_current_item++;
				}

				selector = $('[data-item-id="' + Charney_general.params.modal_current_item + '"]');
				Charney_general.modal_update(selector, counter);
			});

			// Bind next/previous arrow key press events
			$(document).keydown(function(e) {
				if (!$('body').hasClass('modal-open'))
					return;

				switch(e.which) {
					case 37: // left
						if (Charney_general.params.modal_current_item == 1)
							return;

						Charney_general.params.modal_current_item -= 2;

					case 39: // right
						if (Charney_general.params.modal_current_item == counter)
							return;

						Charney_general.params.modal_current_item++;
						selector = $('[data-item-id="' + Charney_general.params.modal_current_item + '"]');
						Charney_general.modal_update(selector, counter);
						break;

					default: return; // exit this handler for other keys
				}

				e.preventDefault(); // prevent the default action (scroll / move caret)
			});

			// Empty modal content on hide event
			$('#archive-items-modal').on('hide.bs.modal', function (e) {
				$('#archive-items-modal-content').html('');
			});

		},

		/**
		 * modal_update
		 *
		 * Update modal with current item attributes
		 *
		 * @param	selector (string) selector on which to update modal
		 * @param	counter_max (int) number of existing items
		 * @return	N/A
		 */
		modal_update : function(selector, counter_max) {

			// Params
			var type		= selector.data('type'),
				url			= selector.data('url');
				content		= '';

			Charney_general.params.modal_current_item = selector.data('item-id');

			// Update modal
			$('#archive-items-modal-title').text(selector.data('title'));
			$('#archive-items-modal-excerpt').text(selector.data('excerpt'));

			switch (type) {
				case 'video':
				case 'link':
					url = url.replace('view', 'preview');
					content =
						'<div class="flex-video">' +
							'<iframe src="' + url + '">' + '</iframe>' +
						'</div>';

					break;

				case 'audio':
					url = url.replace('view', 'preview');
					content =
						'<iframe class="audio-iframe" src="' + url + '">' + '</iframe>';

					break;

				case 'image':
					content =
						'<img src="' + url + '" />';

					break;

				default: return;
			}

			// Update modal content
			$('#archive-items-modal-content').html(content);

			// Disable modal buttons when needed
			Charney_general.modal_disable_buttons(counter_max, selector.data('item-id'));

		},

		/**
		 * modal_disable_buttons
		 *
		 * Disable modal buttons when needed
		 *
		 * @param	counter_max (int)
		 * @param	counter_current (int)
		 * @return	N/A
		 */
		modal_disable_buttons : function(counter_max, counter_current) {

			$('#show-previous-item, #show-next-item').show();

			if (counter_max == 1) {
				$('#show-previous-item, #show-next-item').hide();
			}
			else {
				if (counter_max == counter_current) {
					$('#show-next-item').hide();
				}
				else if (counter_current == 1) {
					$('#show-previous-item').hide();
				}
			}

		},

		/**
		 * breakpoint_refreshValue
		 *
		 * Set window breakpoint values
		 * Called from loaded/alignments
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		breakpoint_refreshValue : function() {

			var new_breakpoint = window.getComputedStyle(
				document.querySelector('body'), ':before'
			).getPropertyValue('content').replace(/\"/g, '').replace(/\'/g, '');

			Charney_general.params.prev_breakpoint = Charney_general.params.breakpoint;
			Charney_general.params.breakpoint = new_breakpoint;

		},

		/**
		 * loaded
		 *
		 * Called by $(window).load event
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		loaded : function() {

			Charney_general.params.window_width = $(window).width();
			$(window).resize(function() {
				if ( Charney_general.params.window_width != $(window).width() ) {
					Charney_general.alignments();
					Charney_general.params.window_width = $(window).width();
				}
			});

			Charney_general.alignments();

		},

		/**
		 * alignments
		 *
		 * Align components after window resize event
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		alignments : function() {

			// Params
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container);

			// Set window breakpoint values
			Charney_general.breakpoint_refreshValue();

			// Masonry
			if (container.hasClass('filtered')) {
				format = '';

				// Get the current filtered format
				$('.filter').each(function() {
					if ($(this).hasClass('active')) {
						format = $(this).attr('class').split(' ')[1].substring(7);
						return false;
					}
				});

				Charney_general.masonry_filter(format);
			}
			else {
				// Initialize masonry grid
				Charney_general.masonry_init();

				// Set masonry container and panels heights
				Charney_general.masonry_set_heights();

				// Fill container with pads elements
				Charney_general.masonry_pads();
			}

		}

	};

// Make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

$(Charney_general.init);
$(window).load(Charney_general.loaded);