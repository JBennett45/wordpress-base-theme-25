// vars //
let filteringLoadState; 
filteringLoadState = (state) => {
  if(state == 'start') {
    document.querySelectorAll('.jbf-archivable-card-cst').forEach((filter) => {
      filter.classList.add('jbf-archivable-card-cst--loading');
    });
  } else {
    document.querySelectorAll('.jbf-archivable-card-cst').forEach((filter) => {
      filter.classList.remove('jbf-archivable-card-cst--loading');
    });
  }
}
export { filteringLoadState };