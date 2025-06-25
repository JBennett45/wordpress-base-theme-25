// Tab Controller, show and hide relevant content via data-tabid, apply SCSS to the elements directly, basic styles applied to control active and none active states //
document.querySelectorAll('.tabbed-content-controller-cst .tabbed-control-input-cst').forEach((tabcontrol) => {
  tabcontrol.addEventListener('click', (e) => {

    let activeTabID = tabcontrol.getAttribute('data-tabid').toLowerCase(); 
    alert(activeTabID);


  });
});

//  <div class="tabbed-content-controller-cst">
  //     <div class="tabbed-control-input-cst active-tabbed-control-input-cst" data-tabid="axios">
  //       Axios
  //     </div>
  //     <div class="tabbed-control-input-cst" data-tabid="paginated">
  //       Paginated
  //     </div>
  //   </div>
  //   <div class="tabbed-content-display-cst">
  //     <div class="tabbed-control-output-cst active-tabbed-control-output-cst" data-tabid="axios">
  //       Axios output
  //     </div>
  //     <div class="tabbed-control-output-cst" data-tabid="paginated"></div>