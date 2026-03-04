class CustomTabbedContent extends HTMLElement {
	constructor() {
		super();
		// this.accordion_instance = this.querySelector('.jb-custom-accordion-cst');
		// this.accordion_item = this.querySelector('.jb-custom-accordion-cst__item');
	}
	connectedCallback() {
		console.log('Tabs to be re-worked');
	}
}
customElements.define('custom-tabs', CustomTabbedContent);
