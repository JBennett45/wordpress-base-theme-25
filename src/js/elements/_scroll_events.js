window.onscroll = (e) => {
  // set your header here //
  const example_element = document.getElementById('element-example');
  if(example_element) {
    if (window.pageYOffset > 115) {
      // do something //
    } else {
      // or don't //
    }
  }
};