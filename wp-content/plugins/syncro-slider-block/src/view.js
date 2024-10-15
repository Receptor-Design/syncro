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
					768: {
						slidesPerView: 1.43
					},
					1024: {
						slidesPerView: 2.43
					}
				}
			}
		} 
		console.log( options );

		// Slider 🚀
		SwiperInit( element, options );
	} );
} );
