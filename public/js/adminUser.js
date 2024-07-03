
// variables for adminUser
let tableBtns=document.querySelectorAll(".tablesContainer .buttons .buttonContainer button");
let tabPanels=document.querySelectorAll(".tablesContainer .tabPanel");

//adminUser page
function showPanel(panelIndex){
    tableBtns.forEach(function(node){
      node.style.borderBottom="";
      node.style.fontWeight="";
    });
    tableBtns[panelIndex].style.borderBottom="2px solid var(--white-bone-color)";
    tableBtns[panelIndex].style.fontWeight="600";
    tabPanels.forEach(function(node){
      node.style.display="none";
      node.style.backgroundColor="";
      node.style.borderBottom="";
    });
    tabPanels[panelIndex].style.display="block";
  };
  showPanel(0);

  // $(window).on("load resize ", function() {
  //   var scrollWidth = $('.table-content').width() - $('.table-content table').width();
  //   $('.table-header').css({'padding-right':scrollWidth});
  // }).resize();