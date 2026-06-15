class MobileToggle extends HTMLElement {
  constructor() {
    super()
    this.mobileOverlay = document.querySelector('.mobile-overlay-cst')
  }

  connectedCallback() {
    this.addEventListener('click', this.toggleMenu)
  }

  disconnectedCallback() {
    this.removeEventListener('click', this.toggleMenu)
  }

  toggleMenu() {
    this.classList.toggle('header-cst__toggle--active')
    if (this.mobileOverlay) {
      document.querySelector('body').classList.toggle('body-overflow-block')
      this.mobileOverlay.classList.toggle('mobile-overlay-cst--active')
    }
  }
}
customElements.define('mobile-toggle', MobileToggle)
