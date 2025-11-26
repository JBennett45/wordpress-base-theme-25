const accordion_wrap = document.querySelector('.jb-custom-accordion-cst');
if(accordion_wrap) {
  document.querySelectorAll('.jb-custom-accordion-cst__item__title').forEach((accordion) => {
    accordion.addEventListener('click', (e) => {
      let parent_item = accordion.closest('.jb-custom-accordion-cst__item');
      // Resets //
      document.querySelectorAll('.jb-custom-accordion-cst__item').forEach((allinstances) => {
        allinstances.classList.remove('jb-custom-accordion-cst__item--active');
      });
      parent_item.classList.add('jb-custom-accordion-cst__item--active');
    })
  });
}