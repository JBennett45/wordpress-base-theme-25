const wpcfInstance = document.querySelector('.wpcf-master-wrapp-cst');
// Check instance //
if(wpcfInstance) {
  // Styled Error Message //
  let formTarget = null;
  document.addEventListener( 'wpcf7invalid', function( event ) {
    formTarget = document.getElementById(event.detail.unitTag);
    formTarget.querySelector('.wpcf7-response-output').classList.remove('alertform-warning');
    formTarget.querySelector('.wpcf7-response-output').classList.add('alertform-danger');
  }, false );
  document.addEventListener( 'wpcf7spam', function( event ) {
    formTarget = document.getElementById(event.detail.unitTag);
    formTarget.querySelector('.wpcf7-response-output').classList.remove('alertform-danger');
    formTarget.querySelector('.wpcf7-response-output').classList.add('alertform-warning');
  }, false );
  document.addEventListener( 'wpcf7mailfailed', function( event ) {
    formTarget = document.getElementById(event.detail.unitTag);
    formTarget.querySelector('.wpcf7-response-output').classList.remove('alertform-danger');
    formTarget.querySelector('.wpcf7-response-output').classList.add('alertform-warning');
  }, false );
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    formTarget = document.getElementById(event.detail.unitTag);
    formTarget.querySelector('.wpcf7-response-output').classList.remove('alertform-danger');
    formTarget.querySelector('.wpcf7-response-output').classList.remove('alertform-warning');
    formTarget.querySelector('.wpcf7-response-output').classList.add('alertform-success');
  }, false );
  // GDPR Checkbox //
  document.querySelectorAll('.acceptance-checkbox-cst__checkbox').forEach((customAcceptanceBox) => {
    customAcceptanceBox.addEventListener('click', (e) => {
      e.preventDefault();
      let parent_wrapper = customAcceptanceBox.closest('.acceptance-checkbox-cst');
      let input_target = parent_wrapper.querySelector('.wpcf7-form-control-wrap input');
      parent_wrapper.classList.toggle('acceptance-checkbox-cst--active');
      customAcceptanceBox.classList.toggle('acceptance-checkbox-cst__checkbox--active');
      if(parent_wrapper.classList.contains('acceptance-checkbox-cst--active')) {
        input_target.checked = true;
      } else {
        input_target.checked = false;
      }
    });
  });
  // Highlight GDPR box if submitted prior //
  document.addEventListener( 'wpcf7submit', function( event ) {
    const formID = event.detail.unitTag;
    const gdprCheck = document.querySelector('#' + formID + ' .acceptance-checkbox-cst');
    if(gdprCheck) {
      document.querySelectorAll('#' + formID + ' .acceptance-checkbox-cst').forEach( (allInstances) => {
        allInstances.classList.remove('acceptance-checkbox-cst--error');
      });
      let input_check = document.querySelector('#' + formID + ' .acceptance-checkbox-cst .wpcf7-form-control-wrap input');
      if(input_check.checked == false) {
        gdprCheck.classList.add("acceptance-checkbox-cst--error");
      }
    }
  }, false );
}
