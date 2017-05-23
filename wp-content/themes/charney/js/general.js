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
			masonry_maxHeight	: ''

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

			// Embedded video - responsive treatment
			$('.page-content').find('iframe, object, embed').each(function() {
				if ( $(this).hasClass('no-flex') )
					return;
					
				var src = $(this).attr('src');
				
				$(this).wrap("<div class='flex-video'></div>");
				
				// Add some usefull attributes
				if (src.indexOf('youtube.com') >= 0) {
					src = src.concat('/?showinfo=0&autohide=1&rel=0&wmode=transparent');
					$(this).attr('src', src);
					$(this).attr('wmode', 'Opaque');
				}
			});

			// Gallery
			if ( typeof _BH_gallery_images !== 'undefined' && _BH_gallery_images.length > 0 ) {
				// Init gallery
				Charney_general.params.gallery_images = $.parseJSON( _BH_gallery_images );
				Charney_general.lazyLoad(0, Charney_general.params.photos_more_interval);

				// Bind click event to gallery 'load more' btn
				$('.gallery-layout-content .load-more').bind('click', function() {
					Charney_general.lazyLoad(Charney_general.params.active_photos, Charney_general.params.photos_more_interval);
				});

				// PhotoSwipe
				Charney_general.initPhotoSwipeFromDOM('.gallery');
			}

			// Masonry
			Charney_general.masonry_init();
			Charney_general.masonry_set_heights();
			Charney_general.masonry_pads();

			// Masonry filter - bind click event to formats filter
			$('.filter').bind('click', function() {
				Charney_general.masonry_filter($(this).attr('class').split(' ')[1].substring(7));
			});

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
		 * lazyLoad
		 *
		 * Load gallery images
		 *
		 * @param	offset (int)
		 * @param	amount (int)
		 * @return	N/A
		 */
		lazyLoad : function(offset, amount) {

			var index, j;

			for (index=offset, j=0 ; j<amount && Charney_general.params.gallery_images.length>index ; index++, j++) {
				// Expose photo
				var photoItem =
					'<figure class="gallery-item" data-index="' + index + '" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">' +
						'<a href="' + Charney_general.params.gallery_images[index]['url'] + '" itemprop="contentUrl">' +
							'<img src="' + Charney_general.params.gallery_images[index]['url'] + '" itemprop="thumbnail" alt="' + Charney_general.params.gallery_images[index]['alt'] + '" />' +
						'</a>' +
						'<figcaption itemprop="caption description">' + Charney_general.params.gallery_images[index]['title'] + '<br><span>' + Charney_general.params.gallery_images[index]['caption'] +  '</span></figcaption>' +
					'</figure>'
					;

				$(photoItem).appendTo( $('.gallery .col' + Charney_general.params.active_column%Charney_general.params.photos_columns) );

				// Update active column
				Charney_general.params.active_column = Charney_general.params.active_column%Charney_general.params.photos_columns + 1;
			}

			if ( index == Charney_general.params.gallery_images.length ) {
				// Hide more btn
				$('.gallery-layout-content .load-more').css('display', 'none');
			} else {
				// Expose more btn
				$('.gallery-layout-content .load-more').css('display', 'block');
			}

			// Update active photos
			Charney_general.params.active_photos += j;

		},

		/**
		 * initPhotoSwipeFromDOM
		 *
		 * PhotoSwipe init
		 *
		 * @param	gallerySelector (string)
		 * @return	N/A
		 */
		initPhotoSwipeFromDOM : function(gallerySelector) {

			// Parse slide data (url, title, size ...) from DOM elements
			// (children of gallerySelector)
			var parseThumbnailElements = function(el) {
				var galleryCols = el.children('.gallery-col'),
					items = [];

				$(galleryCols).each(function() {
					var galleryColItems = $(this).children('.gallery-item');

					$(galleryColItems).each(function() {
						var index = $(this).attr('data-index'),
							link = $(this).children('a'),
							caption = $(this).children('figcaption'),
							img = link.children('img');

						// Create slide object
						var item = {
							src: link.attr('href'),
							w: img[0].naturalWidth,
							h: img[0].naturalHeight,
							msrc: img.attr('src')
						};

						if (caption) {
							item.title = caption.html();
						}

						item.el = $(this)[0];	// Save link to element for getThumbBoundsFn

						items[index] = item;
					});
				});

				// return
				return items;
			};

			// Triggers when user clicks on thumbnail
			var onThumbnailsClick = function(e) {
				e = e || window.event;
				e.preventDefault ? e.preventDefault() : e.returnValue = false;

				var eTarget = e.target || e.srcElement;

				// Find root element of slide
				var clickedListItem = $(eTarget).parent().parent();

				if(!clickedListItem) {
					return;
				}

				// Find index of clicked item
				var clickedGallery = clickedListItem.parent().parent(),
					index = clickedListItem.attr('data-index');

				if(clickedGallery && index >= 0) {
					// Open PhotoSwipe if valid index found
					openPhotoSwipe( index, clickedGallery );
				}

				// return
				return false;
			};

			var openPhotoSwipe = function(index, galleryElement) {
				var pswpElement = document.querySelectorAll('.pswp')[0],
					gallery,
					options,
					items;

				items = parseThumbnailElements(galleryElement);

				// Define options (if needed)
				options = {

					// Define gallery index (for URL)
					galleryUID: galleryElement.attr('data-pswp-uid'),

					getThumbBoundsFn: function(index) {
						// See Options -> getThumbBoundsFn section of documentation for more info
						var thumbnail = items[index].el.getElementsByTagName('img')[0],		// Find thumbnail
						pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
						rect = thumbnail.getBoundingClientRect(); 

						// return
						return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
					},

					index: parseInt(index, 10)

				};

				// Exit if index not found
				if( isNaN(options.index) ) {
					return;
				}

				// Pass data to PhotoSwipe and initialize it
				gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
				gallery.init();
			};

			// Loop through all gallery elements and bind events
			var galleryElements = document.querySelectorAll( gallerySelector );

			for(var i = 0, l = galleryElements.length; i < l; i++) {
				galleryElements[i].setAttribute('data-pswp-uid', i+1);
				galleryElements[i].onclick = onThumbnailsClick;
			}

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
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container);
			var pads		= $('.' + Charney_general.params.masonry_classes.masonry_pad);

			// Remove pads
			if (pads.length) {
				pads.remove();
			}

			// Remove container style (height)
			container.removeAttr('style');

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
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container);
			var panels		= $('.' + Charney_general.params.masonry_classes.masonry_panel);

			// Initiate masonry_heights
			var heights = [];

			if (panels.length) {
				panels.each(function() {
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
			var container	= $('.' + Charney_general.params.masonry_classes.masonry_container);
			var heights		= Charney_general.params.masonry_heights;
			var maxHeight	= Charney_general.params.masonry_maxHeight;
			var pad_class	= Charney_general.params.masonry_classes.masonry_pad;

			$.map(heights, function (height, idx) {
				if (height < maxHeight && height > 0) {
					var pad = $('<div>', {class: pad_class});
					pad.css({
						'height'					: maxHeight - height + 'px',
						'-webkit-box-ordinal-group'	: idx + 1,
						'-moz-box-ordinal-group'	: idx + 1,
						'-ms-flex-order'			: idx + 1,
						'-webkit-order'				: idx + 1,
						'order'						: idx + 1
					});

					container.append(pad);
				}
			});

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
			var panels			= $('.' + Charney_general.params.masonry_classes.masonry_panel);
			var format_panels	= $('.' + Charney_general.params.masonry_classes.masonry_panel + '-' + format);

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
			var format_panels	= $('.' + Charney_general.params.masonry_classes.masonry_panel + '-' + format);
			var breakpoint		= Charney_general.params.breakpoint;
			cols				= Charney_general.params.masonry_cols['width-' + breakpoint];
			order_idx			= 0;

			if (format_panels.length) {
				format_panels.each(function() {
					var order = (order_idx + 1) % cols === 0 ? cols : (order_idx + 1);

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
					}
				});

				Charney_general.masonry_filter(format);
			}
			else {
				Charney_general.masonry_init();
				Charney_general.masonry_set_heights();
				Charney_general.masonry_pads();
			}

		}

	};

// Make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

$(Charney_general.init);
$(window).load(Charney_general.loaded);