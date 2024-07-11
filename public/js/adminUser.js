
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

  let navoffset=document.getElementById("nav").offsetHeight;
const element1=tableBtns[0].getBoundingClientRect().top;
const offsetPosition1 = element1 + window.pageYOffset -  navoffset - 15;
const element2=tableBtns[1].getBoundingClientRect().top;
const offsetPosition2 = element2 + window.pageYOffset -  navoffset - 15;
const element3=tableBtns[2].getBoundingClientRect().top;
const offsetPosition3 = element3 + window.pageYOffset -  navoffset - 15;
const element4=tableBtns[3].getBoundingClientRect().top;
const offsetPosition4 = element4 + window.pageYOffset -  navoffset - 15;
let btn1=document.getElementById("buton1");
let btn2=document.getElementById("buton2");
let btn3=document.getElementById("buton3");
let btn4=document.getElementById("buton4");

  btn1.addEventListener("click", () => {
    showPanel(0);
    window.scrollTo({
      top: offsetPosition1,
      behavior: 'smooth'
  });
  });
  
  btn2.addEventListener("click", () => {
    showPanel(1);
    window.scrollTo({
      top: offsetPosition2,
      behavior: 'smooth'
  });
  });
  btn3.addEventListener("click", () => {
    showPanel(2);
    window.scrollTo({
      top: offsetPosition3,
      behavior: 'smooth'
  });
  });
  btn4.addEventListener("click", () => {
    showPanel(3);
    window.scrollTo({
      top: offsetPosition4,
      behavior: 'smooth'
  });
  });



  
  // $(window).on("load resize ", function() {
  //   var scrollWidth = $('.table-content').width() - $('.table-content table').width();
  //   $('.table-header').css({'padding-right':scrollWidth});
  // }).resize();