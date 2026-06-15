class MobileOverlay extends HTMLElement {
  constructor() {
    super()
    this.activeDropdownClass = 'active-mobile-submenu-cst'
    this.activeItemClass = 'active-mobile-item-cst'
    this.activeChevronClass = 'active-mobile-chevron-cst'
    this.handleDropdownToggle = this.handleDropdownToggle.bind(this)
  }

  connectedCallback() {
    this.querySelectorAll('.bst-opt-chevron-active-cst').forEach((button) => {
      button.addEventListener('click', this.handleDropdownToggle)
    })
  }

  disconnectedCallback() {
    this.querySelectorAll('.bst-opt-chevron-active-cst').forEach((button) => {
      button.removeEventListener('click', this.handleDropdownToggle)
    })
  }

  handleDropdownToggle(event) {
    event.preventDefault()

    const button = event.currentTarget
    const parentDropdown = button.closest('ul')
    const closestLi = button.closest('li')
    const closestDropdown = closestLi?.querySelector('.sub-menu')

    if (!parentDropdown?.classList.contains('sub-menu')) {
      this.querySelectorAll('li').forEach((openDropdown) => {
        if (openDropdown !== closestLi) {
          const targetSubMenu = openDropdown.querySelector('.sub-menu')
          const closestChevRem = openDropdown.querySelector('.bst-opt-chevron-active-cst')

          closestChevRem?.classList.remove(this.activeChevronClass)
          openDropdown.classList.remove(this.activeItemClass)
          targetSubMenu?.classList.remove(this.activeDropdownClass)
        }
      })
    }

    if (closestLi && !closestLi.classList.contains(this.activeDropdownClass)) {
      button.classList.toggle(this.activeChevronClass)
      closestLi.classList.toggle(this.activeItemClass)
      closestDropdown?.classList.toggle(this.activeDropdownClass)
    }
  }
}

customElements.define('mobile-overlay', MobileOverlay)
