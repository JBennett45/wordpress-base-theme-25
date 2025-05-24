// js coming soon //

const formInstance = document.getElementById('testing-form-base-theme');
  // event listener channelled from the data attr set above //
  formInstance.addEventListener('submit', (e) => { 
    e.preventDefault();
    // get values from input //
    const firstName = document.querySelector('[name="first_name"]').value;
    const lastName = document.querySelector('[name="last_name"]').value;
    // Append data to axios //
    let filterData = new FormData();
    filterData.append('action', 'cst_base_theme_axios_function');
    filterData.append('first-name', firstName);
    filterData.append('last-name', lastName);
    // axios call //
    axios.post(theme_ajax.url, filterData)
    .then((res) => {
      console.log(res.data);
    });
});

