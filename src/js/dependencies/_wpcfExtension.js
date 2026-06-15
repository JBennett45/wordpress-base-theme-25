class CustomContactFormExtension extends HTMLElement {
  constructor() {
    super()
    this.form = this.querySelector('form')
    this.form_wrap = this.querySelector('.wpcf-extension-wrap-cst')
    this.custom_acceptance = this.querySelector('.custom-acceptance-cst')
    // Bind methods to preserve context
    this.handleInvalid = this.handleInvalid.bind(this)
    this.handleSpam = this.handleSpam.bind(this)
    this.handleMailFailed = this.handleMailFailed.bind(this)
    this.handleMailSent = this.handleMailSent.bind(this)
    this.handleSubmit = this.handleSubmit.bind(this)
  }

  connectedCallback() {
    if (this.custom_acceptance) {
      this.form.querySelectorAll('.custom-acceptance-cst__checkbox').forEach((acceptance) => {
        acceptance.addEventListener('click', this.customAccept.bind(this))
      })
    }

    // Attach listeners once
    this.form.addEventListener('wpcf7invalid', this.handleInvalid)
    this.form.addEventListener('wpcf7spam', this.handleSpam)
    this.form.addEventListener('wpcf7mailfailed', this.handleMailFailed)
    this.form.addEventListener('wpcf7mailsent', this.handleMailSent)
    this.form.addEventListener('wpcf7submit', this.handleSubmit)
  }

  disconnectedCallback() {
    // Clean up all listeners
    this.form.removeEventListener('wpcf7invalid', this.handleInvalid)
    this.form.removeEventListener('wpcf7spam', this.handleSpam)
    this.form.removeEventListener('wpcf7mailfailed', this.handleMailFailed)
    this.form.removeEventListener('wpcf7mailsent', this.handleMailSent)
    this.form.removeEventListener('wpcf7submit', this.handleSubmit)
  }

  customAccept = (e) => {
    const accept_instance = e.currentTarget || e.target
    if (!accept_instance) {
      console.error('Nothing was passed into accept event.')
      return
    }
    let parent_wrapper = accept_instance.closest('.custom-acceptance-cst')
    let input_target = parent_wrapper.querySelector('.wpcf7-form-control-wrap input')
    parent_wrapper.classList.toggle('custom-acceptance-cst--active')
    accept_instance.classList.toggle('custom-acceptance-cst__checkbox--active')
    input_target.checked = parent_wrapper.classList.contains('custom-acceptance-cst--active')
  }

  handleInvalid = () => {
    document.querySelector('.wpcf7-response-output').classList.remove('alertform-warning')
    document.querySelector('.wpcf7-response-output').classList.add('alertform-danger')
  }

  handleSpam = () => {
    document.querySelector('.wpcf7-response-output').classList.remove('alertform-danger')
    document.querySelector('.wpcf7-response-output').classList.add('alertform-warning')
  }

  handleMailFailed = () => {
    document.querySelector('.wpcf7-response-output').classList.remove('alertform-danger')
    document.querySelector('.wpcf7-response-output').classList.add('alertform-warning')
  }

  handleMailSent = () => {
    const output = document.querySelector('.wpcf7-response-output')
    output.classList.remove('alertform-danger', 'alertform-warning')
    output.classList.add('alertform-success')
  }

  handleSubmit = (e) => {
    const current_form = e.currentTarget || e.target
    const acceptance_check = current_form.querySelector('.custom-acceptance-cst')

    if (acceptance_check) {
      current_form.querySelectorAll('.custom-acceptance-cst').forEach((acceptance_instances) => {
        acceptance_instances.classList.remove('custom-acceptance-cst--error')
        const input_value = acceptance_instances.querySelector('.wpcf7-form-control-wrap input')
        if (!input_value.checked) {
          acceptance_instances.classList.add('custom-acceptance-cst--error')
        }
      })
    }
  }
}
customElements.define('cf-form-extension', CustomContactFormExtension)
