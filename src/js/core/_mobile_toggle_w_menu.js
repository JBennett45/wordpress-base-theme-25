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
    // Class vars //
    let activeDropdownClass = 'active-mobile-submenu-cst';
    let activeItemClass = 'active-mobile-item-cst';
    let activeChevronClass = 'active-mobile-chevron-cst';
    // Setup click event vars //
    let parentDropdown = mobbutton.closest('ul');
    let closestLi = mobbutton.closest('li');
    let closestChev = mobbutton.closest('.bst-opt-chevron-active-cst');
    let closestDropdown = closestLi.querySelector('.sub-menu');
    let closestLiID = closestLi.getAttribute('ID');
    // Only close all instances if a top level item is clicked //
    if(!parentDropdown.classList.contains('sub-menu')) {
      document.querySelectorAll('.mbl-dropdown-watcher-cst li').forEach((openDropdown) => {
        let thisMenuItemID = openDropdown.getAttribute('ID');
        // check if its not the current item (toggle controls that) //
        if(thisMenuItemID != closestLiID) {
          let targetSubMenu = document.querySelector('#' + thisMenuItemID + ' .sub-menu');
          let closestChevRem = openDropdown.querySelector('.bst-opt-chevron-active-cst');
          // remove li //
          closestChevRem.classList.remove(activeChevronClass);
          openDropdown.classList.remove(activeItemClass);
          // remove drodown //
          if(targetSubMenu) {
            targetSubMenu.classList.remove(activeDropdownClass);
          }
        }
      });
    }
    // Add active class //
    if(!closestLi.classList.contains(activeDropdownClass)) {
      closestLi.classList.toggle(activeItemClass);
      closestChev.classList.toggle(activeChevronClass);
      closestDropdown.classList.toggle(activeDropdownClass);
    }
  });
});
