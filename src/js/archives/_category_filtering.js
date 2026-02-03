import { filteringLoadState } from "./../functions/_card_states";
const category_filter_wrap = document.getElementById('filter-post-wrap-cst');
// Instance check //
if(category_filter_wrap) {
  // Vars //
  const filter_taxonomy = category_filter_wrap.getAttribute('data-taxonomy');
  const filter_type = category_filter_wrap.getAttribute('data-post-type');
  document.querySelectorAll('.filter-value-cst').forEach((filter) => {
    filter.addEventListener('click', async (e) => {
      e.preventDefault();
      // Vars //
      const post_archive_wrap = category_filter_wrap.closest('.post-archive-listing-cst');
      const appending_wrap = post_archive_wrap.querySelector('.archive-three-listing-cst');
      const load_more_button = document.querySelector(".load-more-posts-btn-cst");
      const post_params = document.getElementById('post-parameter-info-cst');
      const filter_term_id = filter.getAttribute('data-term-id');
      let current_query = post_params.getAttribute('data-queryvars');
      let current_page = post_params.getAttribute('data-paged');
      let max_post_count = post_params.getAttribute('data-maxpages');
      if(post_params) { 
        filteringLoadState('start');
        // Create data //
        let filter_data = new FormData();
        filter_data.append('action', 'cst_filter_posts');
        filter_data.append('taxonomy', filter_taxonomy);
        filter_data.append('ptype', filter_type);
        filter_data.append('term', filter_term_id);
        // Fetch with vars //
        let callback = await fetch(theme_ajax.url, {
          method: "POST",
          body: filter_data
        });
        let response = await callback.json();
        // Take over wrapper //
        appending_wrap.innerHTML = response.filter_output; 
        // Update parameters //
        current_query = post_params.setAttribute('data-queryvars', response.new_query);
        current_page = post_params.setAttribute('data-paged', response.new_current_page);
        max_post_count = post_params.setAttribute('data-maxpages', response.new_max_page);
        // Load more button state //
        if(load_more_button) {
          if(response.new_current_page < response.new_max_page) {
            load_more_button.style.display = 'block';
          } else {
            load_more_button.style.display = 'none';
          }
        }
        filteringLoadState('end');
      }
    });
  });
}