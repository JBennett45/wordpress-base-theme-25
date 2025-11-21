import { filteringLoadState } from "./../functions/_card_states";
const load_more_button = document.querySelector(".load-more-posts-btn-cst");
// Instance check //
if(load_more_button) {
  // Vars //
  const post_archive_wrap = load_more_button.closest('.post-archive-listing-cst');
  const appending_wrap = post_archive_wrap.querySelector('.archive-three-listing-cst');
  const post_params = document.getElementById('post-parameter-info-cst');
  if(post_params) { 
    // Vars //
    let current_query = post_params.getAttribute('data-queryvars');
    let current_page = post_params.getAttribute('data-paged');
    let post_count = post_params.getAttribute('data-postcount');
    let max_post_count = post_params.getAttribute('data-maxpages');
    let post_type = post_params.getAttribute('data-posttype');
    // check initial count // 
    let checkPostCount = () => {
      if(current_page < max_post_count) {
        load_more_button.style.display = 'block';
      } else {
        load_more_button.style.display = 'none';
      }
    }
    checkPostCount();
    // Wait for click instance //
    load_more_button.addEventListener('click', async (e) => {
      e.preventDefault();
      filteringLoadState('start');
      // Functions // 
      let checkPostParameters = () => {
        current_query = post_params.getAttribute('data-queryvars');
        current_page = post_params.getAttribute('data-paged');
        post_count = post_params.getAttribute('data-postcount');
        max_post_count = post_params.getAttribute('data-maxpages');
        post_type = post_params.getAttribute('data-posttype');
      }
      // Paint Filters //
      checkPostParameters();
      // Disable button //
      load_more_button.disabled = true;
      load_more_button.innerHTML = '<span>Loading</span>';
      // Create data //
      let post_data = new FormData();
      post_data.append('action', 'cst_load_more_posts');
      post_data.append('query', current_query);
      post_data.append('currentpage', current_page);
      post_data.append('maxpage', max_post_count);
      post_data.append('ptype', post_type);
      // Fetch with vars //
      let callback = await fetch(theme_ajax.url, {
        method: "POST",
        body: post_data
      });
      let response = await callback.json();
      // Place new posts //
      appending_wrap.innerHTML += response.output; 
      // Enable button //
      load_more_button.disabled = false;
      load_more_button.innerHTML = '<span>Load more</span>';
      // Increase both instances of current page //
      current_page++;
      post_params.setAttribute('data-paged',current_page);
      // Check to see if load more is needed //
      checkPostCount();
      filteringLoadState('end');
    }); 
  } 
}