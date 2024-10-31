/**
 * Swiper dependencies
 *
 * @see https://swiperjs.com/get-started
 */
import { Swiper } from 'swiper';
import { Autoplay, Keyboard, Navigation, Pagination, EffectFade } from 'swiper/modules';

/**
 * Initialize the slider.
 *
 * @param {Element} container HTMLElement.
 * @param {Object}  options   Slider parameters.
 *
 * @return {Object} Returns initialized slider instance.
 *
 * @see https://swiperjs.com/swiper-api#parameters
 */
export function SwiperInit( container, options = {} ) {
	const parameters = {
		autoplay: options?.autoplay ?? true,
		centeredSlides: options?.centerSlides ?? false,
		createElements: true,
		grabCursor: options?.grabCursor ?? true,
		initialSlide: 0,
		keyboard: true,
		modules: [ Autoplay, Keyboard, Navigation, Pagination, EffectFade ],
		navigation: options?.navigation ?? false,
		pagination: options?.pagination ?? false,
		simulateTouch: options?.simulateTouch ?? true,
		spaceBetween: options?.spaceBetween ?? 0,
		slidesPerView: options?.slidesPerView ?? 'auto',
		breakpoints: options?.breakpoints ?? {},
		height: options?.height ?? 'auto',
		speed: options?.speed ?? 300,
		loop: options?.loop ?? false,
		allowTouchMove: options?.allowTouchMove ?? true,
		direction: options?.direction ?? 'horizontal',
		reverseDirection: options?.reverseDirection ?? false,
		on: options?.on ?? false,
	};

	return new Swiper( container, parameters );
}
