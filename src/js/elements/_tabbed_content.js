// Tab Controller, show and hide relevant content via data-tabid, apply SCSS to the elements directly, basic styles applied to control active and none active states //
document.querySelectorAll('.jb-tabbed-content-wrapp-cst .tabbed-control-input-cst').forEach((tabcontrol) => {
  tabcontrol.addEventListener('click', (e) => {
    // vars // 
    let activeTabID = tabcontrol.getAttribute('data-tabid').toLowerCase(); 
    // Reset active states from tabs and content wrappers //
    document.querySelectorAll('.jb-tabbed-content-wrapp-cst .tabbed-control-input-cst').forEach((allTabs) => {
      allTabs.classList.remove('active-tabbed-control-input-cst');
    });
    // Active state on clicked item //
    tabcontrol.classList.add('active-tabbed-control-input-cst');
    // Content Conrol //
    document.querySelectorAll('.jb-tabbed-content-wrapp-cst .tabbed-control-output-cst').forEach((allContent) => {
      // vars // 
      let targetContent = allContent.getAttribute('data-tabid').toLowerCase(); 
      // remove all current instances //
      allContent.classList.remove('active-tabbed-control-output-cst');
      // add to relevant wrapper //
      if(activeTabID === targetContent) {
        allContent.classList.add('active-tabbed-control-output-cst');
      }
    });
  });
});