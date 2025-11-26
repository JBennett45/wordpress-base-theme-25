window.onscroll = (e) => {
  // set your header here //
  const global_header = document.getElementById('id-name');
  if(global_header) {
    if (window.pageYOffset > 115) {
      // do something //
    } else {
      // or don't //
    }
  }
};