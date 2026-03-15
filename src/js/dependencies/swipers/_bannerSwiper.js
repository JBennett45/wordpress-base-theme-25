import Swiper from 'swiper/bundle';
class BannerSwiperSetup extends HTMLElement {
	constructor() {
		super();
		this.swiper = this;
	}

	connectedCallback() {
		console.log(this.swiper);
	}
}
customElements.define('banner-swiper', BannerSwiperSetup);
