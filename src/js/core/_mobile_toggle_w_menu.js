// [0] Mobile overlay toggle (open & close) //
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
// [1] Mobile Chevron dropdown toggle //
document.querySelectorAll('.mbl-dropdown-watcher-cst .bst-opt-chevron-active-cst').forEach((mobbutton) => {
  mobbutton.addEventListener('click', (e) => {
    e.preventDefault();

    let activeDropdownClass = 'active-mobile-submenu-cst';
    let activeChevronClass = 'active-mobile-item-cst';

    // control this click event //
    let closestLi = mobbutton.closest('li');
    let closestDropdown = closestLi.querySelector('.sub-menu');
    let closestLiID = closestLi.getAttribute('ID');
    // // remove existing classes (li) //
    // document.querySelectorAll('.mbl-dropdown-watcher-cst li').forEach((openDropdown) => {
    //   let thisMenuItemID = openDropdown.getAttribute('ID');
    //   // check if its not the current item (toggle controls that) //
    //   if(thisMenuItemID != closestLiID) {
    //     let targetSubMenu = document.querySelector('#' + thisMenuItemID + ' .sub-menu');
    //     // remove li //
    //     openDropdown.classList.remove(activeChevronClass);
    //     // remove drodown //
    //     if(targetSubMenu) {
    //       targetSubMenu.classList.remove(activeDropdownClass);
    //     }
    //   }
    // });
    // add class //
    if(!closestLi.classList.contains(activeDropdownClass)) {
      closestLi.classList.toggle(activeChevronClass);
      closestDropdown.classList.toggle(activeDropdownClass);
    }
  });
});
