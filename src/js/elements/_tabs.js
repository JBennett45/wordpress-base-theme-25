const tabs_wrap = document.querySelector('.jb-custom-tabs-cst');
if(tabs_wrap) {
  document.querySelectorAll('.jb-custom-tabs-title-cst__item').forEach((tab) => {
    tab.addEventListener('click', (e) => {
      let target_number = tab.getAttribute('data-target');
      // Resets //
      document.querySelectorAll('.jb-custom-tabs-title-cst__item').forEach((allinstances) => {
        allinstances.classList.remove('jb-custom-tabs-title-cst__item--active');
      });
      tab.classList.add('jb-custom-tabs-title-cst__item--active');
      document.querySelectorAll('.jb-custom-tabs-content-cst__item').forEach((allinstances) => {
        let content_target = allinstances.getAttribute('data-target');
        if(content_target == target_number) {
          allinstances.classList.add('jb-custom-tabs-content-cst__item--active');
        } else {
          allinstances.classList.remove('jb-custom-tabs-content-cst__item--active');
        }
      });
    })
  });
}