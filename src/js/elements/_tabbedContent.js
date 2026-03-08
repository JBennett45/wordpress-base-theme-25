class CustomTabbedContent extends HTMLElement {
	// const tabs_wrap = document.querySelector('.jb-custom-tabs-cst');
	// if(tabs_wrap) {
	// 	document.querySelectorAll('.jb-custom-tabs-title-cst__item').forEach((tab) => {
	// 		tab.addEventListener('click', (e) => {
	// 			let target_number = tab.getAttribute('data-target');
	// 			// Resets //
	// 			document.querySelectorAll('.jb-custom-tabs-title-cst__item').forEach((allinstances) => {
	// 				allinstances.classList.remove('jb-custom-tabs-title-cst__item--active');
	// 			});
	// 			tab.classList.add('jb-custom-tabs-title-cst__item--active');
	// 			document.querySelectorAll('.jb-custom-tabs-content-cst__item').forEach((allinstances) => {
	// 				let content_target = allinstances.getAttribute('data-target');
	// 				if(content_target == target_number) {
	// 					allinstances.classList.add('jb-custom-tabs-content-cst__item--active');
	// 				} else {
	// 					allinstances.classList.remove('jb-custom-tabs-content-cst__item--active');
	// 				}
	// 			});
	// 		})
	// 	});
	// }

	constructor() {
		super();
		this.accordion_instance = this.querySelector('.jb-custom-accordion-cst');
		// this.accordion_item = this.querySelector('.jb-custom-accordion-cst__item');
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
