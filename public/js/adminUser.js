
// variables for adminUser
let tableBtns=document.querySelectorAll(".tablesContainer .buttonContainer");
let tabPanels=document.querySelectorAll(".tablesContainer .tabPanel");

//adminUser page
function showPanel(panelIndex){
    // tableBtns.forEach(function(node){
    //   node.style.backgroundColor="";
    //   node.style.color="";
    // });
    //tableBtns[panelIndex].style.backgroundColor=colorcode;
    tabPanels.forEach(function(node){
      node.style.display="none";
    });
    tabPanels[panelIndex].style.display="block";
  };
  showPanel(0);

//   $(window).on("load resize ", function() {
//     var scrollWidth = $('.table-content').width() - $('.table-content table').width();
//     $('.table-header').css({'padding-right':scrollWidth});
//   }).resize();