// mobile overlay toggle //
const mobButtonToggle = document.querySelector('.mbl-toggle-wrapp');
if(mobButtonToggle) {
  mobButtonToggle.addEventListener('click', () => {
    let mobileOverlay = document.getElementById('mbl-menu-ovrr-wrapp');
    mobButtonToggle.classList.toggle('mbl-toggle-activated');
    // Click Toggle //
    if(mobileOverlay) {
      document.querySelector('body').classList.toggle('global-block-body-scroll-cst');
      mobileOverlay.classList.toggle('activated-mbl-menu-ovrr-wrapp');
    }
  });
}