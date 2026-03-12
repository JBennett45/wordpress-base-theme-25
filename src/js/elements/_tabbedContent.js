class CustomTabbedContent extends HTMLElement {
	constructor() {
		super();
		this.accordion_instance = this.querySelector('.jb-custom-accordion-cst');
	}
	connectedCallback() {
		this.querySelectorAll('.custom-tabs-wrap__title-tab').forEach((tab) => {
			tab.addEventListener('click', (e) => {
				let target = tab.dataset.target;
				this.querySelectorAll('.custom-tabs-wrap__title-tab').forEach(
					(allinstances) => {
						delete allinstances.dataset.active;
					},
				);

				tab.dataset.active = 'true';

				this.querySelectorAll('.custom-tabs-wrap__content-tab').forEach(
					(tab_content) => {
						let content_target = tab_content.dataset.target;
						if (content_target == target) {
							tab_content.dataset.active = 'true';
						} else {
							delete tab_content.dataset.active;
						}
					},
				);
			});
		});
	}
}
customElements.define('custom-tabs', CustomTabbedContent);
