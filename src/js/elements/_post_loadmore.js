// vars //
const loadMoreBtn = document.querySelector(".lmax-post-request-cst");
// Instance check //
if(loadMoreBtn) {
  // vars //
  const axiosParamResWrapp = document.getElementById('lmax-post-request-wrapp-cst');
  // Check wrapper exists //
  if(axiosParamResWrapp) { 
    // Setup vars //
    let currentQuery = axiosParamResWrapp.getAttribute('data-queryvars');
    let currentPostsPage = axiosParamResWrapp.getAttribute('data-paged');
    let postsCount = axiosParamResWrapp.getAttribute('data-postcount');
    let maxPostsPage = axiosParamResWrapp.getAttribute('data-maxpages');
    let currentPostType = axiosParamResWrapp.getAttribute('data-posttype');
    // functions // 
    let recheckParameters = () => {
      currentQuery = axiosParamResWrapp.getAttribute('data-queryvars');
      currentPostsPage = axiosParamResWrapp.getAttribute('data-paged');
      postsCount = axiosParamResWrapp.getAttribute('data-postcount');
      maxPostsPage = axiosParamResWrapp.getAttribute('data-maxpages');
      currentPostType = axiosParamResWrapp.getAttribute('data-posttype');
    }
    let checkPostCount = () => {
      if(currentPostsPage < maxPostsPage) {
        loadMoreBtn.style.display = 'block';
      } else {
        loadMoreBtn.style.display = 'none';
      }
    }
    // check first load instance //
    checkPostCount();
    // continue with click event and axios send //
    loadMoreBtn.addEventListener('click', async (e) => {
      e.preventDefault();
      // functions // 
      let recheckParameters = () => {
        currentQuery = axiosParamResWrapp.getAttribute('data-queryvars');
        currentPostsPage = axiosParamResWrapp.getAttribute('data-paged');
        postsCount = axiosParamResWrapp.getAttribute('data-postcount');
        maxPostsPage = axiosParamResWrapp.getAttribute('data-maxpages');
        currentPostType = axiosParamResWrapp.getAttribute('data-posttype');
      }
      // reload if filtered //
      recheckParameters();
      // disable button //
      loadMoreBtn.disabled = true;
      loadMoreBtn.innerHTML = '<span>Loading</span>';
      // append data //
      let loadMoreData = new FormData();
      loadMoreData.append('action', 'cst_load_more_posts');
      loadMoreData.append('query', currentQuery);
      loadMoreData.append('currentpage', currentPostsPage);
      loadMoreData.append('maxpage', maxPostsPage);
      loadMoreData.append('ptype', currentPostType);
      // fetch with vars //
      let callback = await fetch(theme_ajax.url, {
        method: "POST",
        body: loadMoreData
      });
      let response = await callback.json();

      // place new posts //
      axiosParamResWrapp.innerHTML += response.output; 
      // enable button //
      loadMoreBtn.disabled = false;
      loadMoreBtn.innerHTML = '<span>Load more</span>';
      // increase both instances of current page //
      currentPostsPage++;
      axiosParamResWrapp.setAttribute('data-paged',currentPostsPage);
      // check pagination | hide button if not needed //
      checkPostCount();
    }); // end load click //
  } // parameter check (without can't send anything) //
} // end button on page check //