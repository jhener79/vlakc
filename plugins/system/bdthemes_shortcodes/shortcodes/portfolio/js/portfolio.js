jQuery(document).ready(function($) {


	$('.megafolio-container').each(function () {
		data = $(this).data();

		var api=$(this).megafoliopro({
				filterChangeAnimation: data.animation,	// fade, rotate, scale, rotatescale, pagetop, pagebottom,pagemiddle
				filterChangeSpeed: data.speed,			// Speed of Transition
				filterChangeRotate:data.rotate,			// If you ue scalerotate or rotate you can set the rotation (99 = random !!)
				filterChangeScale:0.6,			// Scale Animation Endparameter
				delay: data.delay,
				defaultWidth:980,
				paddingHorizontal:data.padding,
				paddingVertical:data.padding,
				layoutarray:[data.grid_types]		// Defines the Layout Types which can be used in the Gallery. 2-9 or "random". You can define more than one, like {5,2,6,4} where the first items will be orderd in layout 5, the next comming items in layout 2, the next comming items in layout 6 etc... You can use also simple {9} then all item ordered in Layout 9 type.
			});

		// CALL FILTER FUNCTION IF ANY FILTER HAS BEEN CLICKED
		$('.filter').click(function() {
			$('.filter').each(function() { $(this).removeClass("selected")});
			api.megafilter($(this).data('category'));
			$(this).addClass("selected");
		});

		// Lightbox for galleries (slider, carousel, custom_gallery)
		$(this).find('.su-lightbox-item').magnificPopup({
			type: 'image',
			mainClass: 'mfp-zoom-in mfp-img-mobile',
			tLoading: '', // remove text from preloader
			removalDelay: 400, //delay removal by X to allow out-animation
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
			},
			callbacks: {
				open: function() {

					//overwrite default prev + next function. Add timeout for css3 crossfade animation
					$.magnificPopup.instance.next = function() {
						var self = this;
						self.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
					}
					$.magnificPopup.instance.prev = function() {
						var self = this;
						self.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
					}
				},
				imageLoadComplete: function() {
					var self = this;
					setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
				}
			}
		});	
	});
});
