import Swiper from 'swiper/bundle';
import { Navigation, A11y, Mousewheel } from 'swiper/modules';
class BannerSwiperSetup extends HTMLElement {
	constructor() {
		super();
		this.swiperElement = this.querySelector('.swiper');
		this.swiper = new Swiper(this.swiperElement, {
			modules: [A11y, Navigation, Mousewheel],
			slidesPerView: 1,
			spaceBetween: 20,
			loop: true,
			centeredSlides: true,
			navigation: {
				nextEl: '.banner-swiper-cst__next',
				prevEl: '.banner-swiper-cst__prev',
			},
			// mousewheel: {
			// 	enabled: true,
			// 	forceToAxis: true,
			// },
		});
	}
}
customElements.define('banner-swiper', BannerSwiperSetup);
