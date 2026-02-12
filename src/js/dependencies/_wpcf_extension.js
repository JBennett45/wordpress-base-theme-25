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
      this.form.querySelectorAll('.custom-acceptance-cst__checkbox').forEach((acceptance) => {
        acceptance.addEventListener('click', this.customAccept.bind(this));
      });
    }
    this.customListeners();
  }

  customAccept = (e) => {
    const accept_instance = e.currentTarget || e.target;

    if(!accept_instance) {
      console.error('Nothing was passed into accept event.');
      return;
    }

    let parent_wrapper = accept_instance.closest('.custom-acceptance-cst');
    let input_target = parent_wrapper.querySelector('.wpcf7-form-control-wrap input');
    parent_wrapper.classList.toggle('custom-acceptance-cst--active');
    accept_instance.classList.toggle('custom-acceptance-cst__checkbox--active');

    if(parent_wrapper.classList.contains('custom-acceptance-cst--active')) {
      input_target.checked = true;
    } else {
      input_target.checked = false;
    }
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

    this.form.addEventListener( 'wpcf7submit', function( e ) {
      const current_form = e.currentTarget || e.target;
      const acceptance_check = current_form.querySelector('.custom-acceptance-cst');

      if(acceptance_check) {
        current_form.querySelectorAll('.custom-acceptance-cst').forEach( (acceptance_instances) => {
          acceptance_instances.classList.remove('custom-acceptance-cst--error');
          let input_value = acceptance_instances.querySelector('.wpcf7-form-control-wrap input');

          if(input_value.checked == false) {
            acceptance_instances.classList.add("custom-acceptance-cst--error");
          }
        });
      }

    }, false );
  }
}
customElements.define("cf-form-extension", CustomContactFormExtension);