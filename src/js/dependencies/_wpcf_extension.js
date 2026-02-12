// custom-cf-form
class CustomContactFormExtension extends HTMLElement {
  constructor() {
    super();
    this.form = this.querySelector('form');
    this.form_wrap = this.querySelector('.wpcf-extension-wrap-cst');

    this.custom_acceptance = this.querySelector('.custom-acceptance-cst');
  }

  connectedCallback() {
    if(this.custom_acceptance) {
      this.form.querySelectorAll('.custom-acceptance-cst').forEach((acceptance) => {
        acceptance.addEventListener('click', this.customAccept.bind(this));
      });
    }
    this.customListeners();
  }

  customAccept = (e) => {
    console.log(e.currentTarget);
    // console.log(e.target);
  }

  customListeners = () => {
    this.form.addEventListener( 'wpcf7invalid', function(e) {
      document.querySelector('.wpcf7-response-output').classList.remove('alertform-warning');
      document.querySelector('.wpcf7-response-output').classList.add('alertform-danger');
    }, false );
    this.form.addEventListener( 'wpcf7spam', function(e) {
      document.querySelector('.wpcf7-response-output').classList.remove('alertform-danger');
      document.querySelector('.wpcf7-response-output').classList.add('alertform-warning');
    }, false );
    this.form.addEventListener( 'wpcf7mailfailed', function(e) {
      document.querySelector('.wpcf7-response-output').classList.remove('alertform-danger');
      document.querySelector('.wpcf7-response-output').classList.add('alertform-warning');
    }, false );
    this.form.addEventListener( 'wpcf7mailsent', function(e) {
      document.querySelector('.wpcf7-response-output').classList.remove('alertform-danger');
      document.querySelector('.wpcf7-response-output').classList.remove('alertform-warning');
      document.querySelector('.wpcf7-response-output').classList.add('alertform-success');
    }, false );
  }
}

customElements.define("cf-form-extension", CustomContactFormExtension);