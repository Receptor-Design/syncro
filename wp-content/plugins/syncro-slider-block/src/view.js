/**
 * Shared Swiper config.
 */
import { SwiperInit } from './swiper-init';

document.addEventListener( 'DOMContentLoaded', () => {
	const containers = document.querySelectorAll( '.swiper' );

	// Return early, and often.
	if ( ! containers.length ) {
		return;
	}

	// Loop through all sliders and assign Swiper object.
	containers.forEach( ( element ) => {
		// We could pass in some unique options here.
		let options = {};

		try {
			options = JSON.parse( element.dataset.swiper );
		} catch ( e ) {
			// eslint-disable-next-line no-console
			console.error( e );
			return;
		}

		if( element.classList.contains('syncro-social-proof-slider') ){
			options = {
				...options,
				spaceBetween: 30,
				slidesPerView: 1,
				breakpoints: {
					640: {
						slidesPerView: 1.43
					},
					768: {
						slidesPerView: 1.99
					},
					1024: {
						slidesPerView: 2.43
					}
				}
			}
		} else if( element.classList.contains('syncro-features-slider') ){
			options = {
				...options,
				spaceBetween: 20,
				slidesPerView: 1.05,
				breakpoints: {
					768: {
						slidesPerView: 1.43
					},
					1024: {
						slidesPerView: 1.505,
						spaceBetween: 30
					}
				}
			}
		} else if( element.classList.contains('syncro-testimonials-slider') ){
			options = {
				...options,
				pagination: {
					enabled: true,
					clickable: true
				},
				effect: 'fade'
			}
		} else if( element.classList.contains('syncro-leadership-slider') ){
			options = {
				...options,
				spaceBetween: 30,
				slidesPerView: 1,
				breakpoints: {
					640: {
						slidesPerView: 1.43
					},
					768: {
						slidesPerView: 1.99
					},
					1024: {
						slidesPerView: 2.43
					}
				}
			}
		} else if( element.classList.contains('syncro-awards-marquee-slider') ){
			options = {
				...options,
				spaceBetween: 30,
				slidesPerView: 6,
				speed: 5000,
				loop: true,
				allowTouchMove: false,
				autoplay: options?.autoplay ? { delay: 1 } : false,
			}
		} else if( element.classList.contains('syncro-awards-slider') ){
			options = {
				...options,
				spaceBetween: 30,
				slidesPerView: 1,
				breakpoints: {
					480: {
						slidesPerView: 1.43
					},
					640: {
						slidesPerView: 1.99
					},
					1024: {
						slidesPerView: 3.58
					}
				}
			}
		}

		// Slider 🚀
		SwiperInit( element, options );
	} );
} );
