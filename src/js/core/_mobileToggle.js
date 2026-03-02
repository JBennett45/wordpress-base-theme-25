class MobileToggle extends HTMLElement {
  constructor() {
    super();
    this.mobileOverlay = document.getElementById('mobile-menu-overlay-cst');
  }

  connectedCallback() {
    this.addEventListener('click', this.toggleMenu);
  }

  disconnectedCallback() {
    this.removeEventListener('click', this.toggleMenu);
  }

  toggleMenu() {
    this.classList.toggle('mbl-toggle-activated');
    if (this.mobileOverlay) {
      document
        .querySelector('body')
        .classList.toggle('element-overflow-block-csr');
      this.mobileOverlay.classList.toggle('activated-mbl-menu-ovrr-wrapp');
    }
  }
}
customElements.define('mobile-toggle', MobileToggle);
