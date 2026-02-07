// custom-cf-form
class CustomContactFormExtension extends HTMLElement {
  constructor() {
    super();
    this.form = this.querySelector('form');
  }

  connectedCallback() {
    console.log(this.form);

    // Highlight GDPR box if submitted prior //
    this.form.addEventListener( 'wpcf7submit', function( event ) {
      const formID = event.detail.unitTag;
      // const gdprCheck = document.querySelector('#' + formID + ' .acceptance-checkbox-cst');

      console.log(formID);

      // if(gdprCheck) {
      //   document.querySelectorAll('#' + formID + ' .acceptance-checkbox-cst').forEach( (allInstances) => {
      //     allInstances.classList.remove('acceptance-checkbox-cst--error');
      //   });
      //   let input_check = document.querySelector('#' + formID + ' .acceptance-checkbox-cst .wpcf7-form-control-wrap input');
      //   if(input_check.checked == false) {
      //     gdprCheck.classList.add("acceptance-checkbox-cst--error");
      //   }
      // }
    }, false );


  }
}

customElements.define("cf-form-extension", CustomContactFormExtension);