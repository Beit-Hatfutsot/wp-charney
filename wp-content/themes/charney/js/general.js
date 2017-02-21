var $ = jQuery,
	Charney_general = {

		/**
		 * Params
		 */
		params : {

			window_width	: 0,	// client window width - used to maintain window resize events (int)
			breakpoint		: '',	// CSS media query breakpoint (int)
			prev_breakpoint	: '',	// Previous media query breakpoint (int)
			timeout			: 400	// general timeout (int)

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
				return this.height( Math.max.apply(this, $.map(this, function(e) { return $(e).height() })) );
			}

			// Embedded video - responsive treatment
			$('.page-content').find('iframe, object, embed').each(function() {
				if ( $(this).attr('name') == 'chekout_frame' || $(this).attr('name') == 'pelecard_frame' || $(this).hasClass('no-flex') )
					return;
					
				var src = $(this).attr('src');
				
				$(this).wrap("<div class='flex-video'></div>");
				
				// add some usefull attributes
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
		lazyLoad : function (offset, amount) {

			var index, j;

			for (index=offset, j=0 ; j<amount && Charney_general.params.gallery_images.length>index ; index++, j++) {
				// expose photo
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
				// hide more btn
				$('.gallery-layout-content .load-more').css('display', 'none');
			} else {
				// expose more btn
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

			// parse slide data (url, title, size ...) from DOM elements
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

						// create slide object
						var item = {
							src: link.attr('href'),
							w: img[0].naturalWidth,
							h: img[0].naturalHeight,
							msrc: img.attr('src')
						};

						if (caption) {
							item.title = caption.html();
						}

						item.el = $(this)[0]; // save link to element for getThumbBoundsFn

						items[index] = item;
					});
				});

				return items;
			};

			// triggers when user clicks on thumbnail
			var onThumbnailsClick = function(e) {
				e = e || window.event;
				e.preventDefault ? e.preventDefault() : e.returnValue = false;

				var eTarget = e.target || e.srcElement;

				// find root element of slide
				var clickedListItem = $(eTarget).parent().parent();

				if(!clickedListItem) {
					return;
				}

				// find index of clicked item
				var clickedGallery = clickedListItem.parent().parent(),
					index = clickedListItem.attr('data-index');

				if(clickedGallery && index >= 0) {
					// open PhotoSwipe if valid index found
					openPhotoSwipe( index, clickedGallery );
				}

				return false;
			};

			var openPhotoSwipe = function(index, galleryElement) {
				var pswpElement = document.querySelectorAll('.pswp')[0],
					gallery,
					options,
					items;

				items = parseThumbnailElements(galleryElement);

				// define options (if needed)
				options = {

					// define gallery index (for URL)
					galleryUID: galleryElement.attr('data-pswp-uid'),

					getThumbBoundsFn: function(index) {
						// See Options -> getThumbBoundsFn section of documentation for more info
						var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
						pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
						rect = thumbnail.getBoundingClientRect(); 

						return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
					},

					index: parseInt(index, 10)

				};

				// exit if index not found
				if( isNaN(options.index) ) {
					return;
				}

				// Pass data to PhotoSwipe and initialize it
				gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
				gallery.init();
			};

			// loop through all gallery elements and bind events
			var galleryElements = document.querySelectorAll( gallerySelector );

			for(var i = 0, l = galleryElements.length; i < l; i++) {
				galleryElements[i].setAttribute('data-pswp-uid', i+1);
				galleryElements[i].onclick = onThumbnailsClick;
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
		breakpoint_refreshValue : function () {

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

			// set window breakpoint values
			Charney_general.breakpoint_refreshValue();

		}

	};

// make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

$(Charney_general.init);
$(window).load(Charney_general.loaded);