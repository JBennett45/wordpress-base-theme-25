class CustomAccordionElement extends HTMLElement {
  constructor() {
    super();
    this.accordion_instance = this.querySelector('.jb-custom-accordion-cst');
    this.accordion_item = this.querySelector('.jb-custom-accordion-cst__item');
  }

  connectedCallback() {
    if(this.accordion_instance) {
      this.accordion_instance.querySelectorAll('.jb-custom-accordion-cst__item__title').forEach((accordion) => {
        accordion.addEventListener('click', (e) => {

          let parent_item = accordion.closest('.jb-custom-accordion-cst__item');
          
          document.querySelectorAll('.jb-custom-accordion-cst__item').forEach((allinstances) => {
            delete allinstances.dataset.status;
          });

          parent_item.dataset.status = 'active';

        });
      });
    }
  }
}
customElements.define("custom-accordion-el", CustomAccordionElement);