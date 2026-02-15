// vars //
let filteringLoadState; 
filteringLoadState = (element, state) => {
  const loader = element.querySelector('.global-loader-cst');
  if(loader) {
    if(state == 'start') {
      loader.classList.add('global-loader-cst--active');
    } 
    else {
      loader.classList.remove('global-loader-cst--active');
    }
  }
}
export { filteringLoadState };