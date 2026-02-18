(function ($) {
	'use strict';

	function product_video_init() {
		$(document.body).on( 'ecomus_product_thumbnails_init', function() {
			var $gallery = $('.woocommerce-product-gallery'),
				$pagination = $gallery.find('.woocommerce-product-thumbnail__nav'),
				$video = $gallery.find('.woocommerce-product-gallery__image.ecomus-product-video');

			if ($video.length > 0) {
				var videoNumber = $video.index();
				$gallery.addClass('has-video');
				$pagination.find('.woocommerce-product-gallery__image').eq(videoNumber).append('<div class="ecomus-i-video"></div>');
			}
		} );

		$(document.body).on('click', '.ecomus-i-video', function(e) {
			e.preventDefault();

			var $wrapper = $(this).closest('.ecomus-product-video'),
				$videoWrapper = $wrapper.find('.ecomus-video-wrapper');

			if ( $videoWrapper.hasClass('video-youtube') ) {
				const iframe = $videoWrapper.find('iframe').get(0);
				iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
				iframe.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
			} else if ( $videoWrapper.hasClass('video-vimeo') ) {
				const iframe = $videoWrapper.find('iframe').get(0);
				iframe.contentWindow.postMessage('{"method":"play","value":""}', "*");
				iframe.contentWindow.postMessage('{"method":"setVolume","value":1}', "*");
			} else {
				const video = $videoWrapper.find('video').get(0);
				if( video ) {
					video.play();
				}
			}

			$wrapper.addClass('ecomus-product-video-play');
		});

		$(document.body).on( 'ecomus_product_gallery_init ecomus_product_gallery_quickview_init', function() {
			var $gallery = $('.woocommerce-product-gallery__wrapper'),
				$swiperSlider = $gallery.find( '.swiper-slide' );

			$swiperSlider.each( function() {
				var $wrapper = $(this).closest( '.ecomus-product-video' ),
					$video = $(this).find('.ecomus-video-wrapper');

				if( $video.hasClass( 'video-autoplay' ) ) {
					$wrapper.addClass('ecomus-product-video-play');
				}

				if( $(this).hasClass( 'swiper-slide-active' ) ) {
					if( $video.length > 0 ) {
						if( $video.hasClass('video-youtube') ) {
							if( $video.hasClass( 'video-autoplay' ) ) {
								$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&enablejsapi=1&playsinline=1&playerapiid=ytplayer&showinfo=0&fs=0&modestbranding=0&rel=0&loop=1&html5=1&autoplay=1' );
							} else {
								$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&enablejsapi=1&playsinline=1&mute=1&playerapiid=ytplayer&showinfo=0&fs=0&modestbranding=0&rel=0&loop=1&html5=1' );
							}
						} else if ( $video.hasClass('video-vimeo') ) {
							$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&api=1&autoplay=1&muted=1&loop=1' );
						}
					}
				} else {
					if( $video.length > 0 ) {
						if( $video.hasClass('video-youtube') ) {
							$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&enablejsapi=1&playsinline=1&mute=1&playerapiid=ytplayer&showinfo=0&fs=0&modestbranding=0&rel=0&loop=1&html5=1' );
						} else if ( $video.hasClass('video-vimeo') ) {
							$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&api=1&muted=1&loop=1' );
						}
					}
				}
			});

			autoPlay();
		} );
	}

	function autoPlay() {
		var $gallery = $('.woocommerce-product-gallery__wrapper');

		if( $gallery.length && $gallery.get(0).swiper ) {
			$(document.body).on( 'ecomus_product_gallery_slideChangeTransitionEnd ecomus_product_gallery_quickview_slideChangeTransitionEnd', function() {
				var $swiperSlider = $gallery.find( '.swiper-slide' );

				$swiperSlider.each( function() {
					var $video = $(this).find('.ecomus-video-wrapper');

					if( $(this).hasClass( 'swiper-slide-active' ) ) {
						if( ! $video.hasClass( 'video-autoplay' ) ) {
							return;
						}

						$(this).addClass('ecomus-product-video-play');

						if( $video.length > 0 ) {
							if( $video.hasClass('video-youtube') ) {
								$video.find('iframe').get(0).contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
							} else if ( $video.hasClass('video-vimeo') ) {
								$video.find('iframe').get(0).contentWindow.postMessage('{"method":"play","value":""}', "*");
							} else {
								$video.find('video').get(0).play();
							}
						}
					} else {
						if( $video.length > 0 ) {
							if( $video.hasClass('video-youtube') ) {

								$video.find('iframe').get(0).contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
							} else if ( $video.hasClass('video-vimeo') ) {
								$video.find('iframe').get(0).contentWindow.postMessage('{"method":"pause","value":""}', "*");
							} else {
								$video.find('video').get(0).pause();
							}
						}

						if ( $(this).hasClass('ecomus-product-video-play') ) {
							$(this).removeClass('ecomus-product-video-play');
						}
					}
				});
			} );
		} else {
			var $items = $( '.woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image, ul.products li.product .product-thumbnail' );

			$items.each( function() {
				var $video = $(this).find('.ecomus-video-wrapper');

				if( $video.length > 0 ) {
					if( $video.hasClass('video-youtube') ) {
						if( $video.hasClass( 'video-autoplay' ) ) {
							$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&enablejsapi=1&playsinline=1&mute=1&playerapiid=ytplayer&showinfo=0&fs=0&modestbranding=0&rel=0&loop=1&html5=1&autoplay=1' );
						} else {
							$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&enablejsapi=1&playsinline=1&mute=1&playerapiid=ytplayer&showinfo=0&fs=0&modestbranding=0&rel=0&loop=1&html5=1' );
						}
					} else if ( $video.hasClass('video-vimeo') ) {
						$video.find( 'iframe' ).attr( 'src', $video.find( 'iframe' ).attr( 'src' ) + '&api=1&autoplay=1&muted=1&loop=1' );
					}
				}

				if( ! $video.hasClass( 'video-autoplay' ) ) {
					return;
				}

				$(this).addClass('ecomus-product-video-play');

				if( $video.length > 0 ) {
					if( $video.hasClass('video-youtube') ) {
						$video.find('iframe').get(0).contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
					} else if ( $video.hasClass('video-vimeo') ) {
						$video.find('iframe').get(0).contentWindow.postMessage('{"method":"play","value":""}', "*");
					} else {
						$video.find('video').get(0).play();
					}
				}
			});
		}
	}

	/**
	 * Document ready
	 */
	$(function () {
		product_video_init();
		autoPlay();
		$(document.body).on( 'ecomus_product_gallery_quickview_init', function() {
			autoPlay();
		});
	});

})(jQuery);