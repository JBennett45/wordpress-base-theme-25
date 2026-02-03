import { filteringLoadState } from "./../functions/_loader_control";

class PostTypeLoadAndFilter extends HTMLElement {
  constructor() {
    super();
    this.query = this.dataset.queryvars;
    this.page = this.dataset.paged;
    this.post_count = this.dataset.postcount;
    this.max_paged = this.dataset.maxpages;
    this.post_type = this.dataset.posttype;
    this.post_wrapper = this.querySelector(".archive-post-listing-cst");
    this.btn_load_more = this.querySelector(".load-more-posts-btn-cst");
    this.filter_instance = this.querySelector(".archive-post-filtering-cst");
    this.filter_taxonomy = this.filter_instance.getAttribute('data-taxonomy');
  }

  connectedCallback() {
    // Check initial count //
    this.checkPagedStatus();
    // Load more //
    this.btn_load_more.addEventListener('click', async (e) => {
      e.preventDefault();
      filteringLoadState(this.post_wrapper, 'start');

      this.btn_load_more.disabled = true;
      this.btn_load_more.innerHTML = '<span>Loading</span>';

       console.log(this.page);
  
      let post_data = new FormData();
      post_data.append('action', 'cst_load_more_posts');
      post_data.append('query', this.query);
      post_data.append('currentpage', this.page);
      post_data.append('maxpage', this.max_paged);
      post_data.append('ptype', this.post_type);

      console.log(this.page);

      let callback = await fetch(theme_ajax.url, {
        method: "POST",
        body: post_data
      });
      let res = await callback.json();

      if(res.success === 1) {
        this.post_wrapper.innerHTML += res.output; 
        this.btn_load_more.disabled = false;
        this.btn_load_more.innerHTML = '<span>Load more</span>';
        this.dataset.paged = res.paged;
        this.checkPagedStatus();
        filteringLoadState(this.post_wrapper, 'end');
      }
      else {
        console.error('Something went wrong during the loadmore request, please contact admin.')
      }
    }); 
    // Filter //
    if(this.filter_instance && this.filter_taxonomy) {
      this.filter_instance.querySelectorAll('.filter-item-cst').forEach((filter) => {
        filter.addEventListener('click', async (e) => {
          e.preventDefault();
          filteringLoadState(this.post_wrapper, 'start');

          let filter_term_id = filter.getAttribute('data-term-id');
          let filter_data = new FormData();

          filter_data.append('action', 'cst_filter_posts');
          filter_data.append('taxonomy', this.filter_taxonomy);
          filter_data.append('ptype', this.post_type);
          filter_data.append('limit', this.post_count);
          filter_data.append('term', filter_term_id);
        
          let callback = await fetch(theme_ajax.url, {
            method: "POST",
            body: filter_data
          });
          let res = await callback.json();

          if(res.success === 1) {
            this.post_wrapper.innerHTML = res.output; 
            this.dataset.queryvars = res.new_query;
            this.dataset.paged = res.new_current_page;
            this.dataset.maxpages = res.new_max_page;            
            if(this.btn_load_more) {
              if(res.new_current_page < res.new_max_page) {
                this.btn_load_more.style.display = 'block';
              } else {
                this.btn_load_more.style.display = 'none';
              }
            }
            filteringLoadState(this.post_wrapper, 'end');
          }
          else {
            console.error('Something went wrong during the filter request, please contact admin.')
          }
        });
      });
    }
  }
  checkPagedStatus = () => {
    if(this.dataset.paged < this.max_paged) {
      this.btn_load_more.style.display = 'block';
    } else {
      this.btn_load_more.style.display = 'none';
    }
  }
}
customElements.define("post-archive-control", PostTypeLoadAndFilter);