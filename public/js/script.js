//variables for nav
const nav = document.querySelector(".nav"),
  searchIcon = document.querySelector("#searchIcon"),
  navOpenBtn = document.querySelector(".navOpenBtn"),
  navCloseBtn = document.querySelector(".navCloseBtn"),
  linksOpenBtn = document.querySelector("#open-icon"),
  userBox = document.querySelector(".user-box");
 



//variables for profile page
let profileImg = document.querySelector(".account-details .image-div img"),
  userFile = document.querySelector(".account-details .userfile");
let token=0;
//export {token};//token=1 if submitting or login
let userIconClick = 0;

//functions for nav bar
searchIcon.addEventListener("click", () => {
  nav.classList.toggle("openSearch");
  nav.classList.remove("openNav");
  if (nav.classList.contains("openSearch")) {
    return searchIcon.classList.replace("fa-magnifying-glass", "fa-xmark");
  }
  searchIcon.classList.replace("fa-xmark", "fa-magnifying-glass");
});

navOpenBtn.addEventListener("click", () => {
  nav.classList.add("openNav");
  nav.classList.remove("openSearch");
  searchIcon.classList.replace("fa-xmark", "fa-magnifying-glass");
});
navCloseBtn.addEventListener("click", () => {
  nav.classList.remove("openNav");
});


linksOpenBtn.addEventListener("click", () => {
  if (token==1 && userIconClick == 0) {
    userBox.classList.add("showAfter");
    userIconClick = 1;
    linksOpenBtn.classList.replace("fa-user", "fa-xmark");
  } else if (userIconClick == 0 && token == 0) {
    userBox.classList.add("showBefore");
    userIconClick = 1;
    linksOpenBtn.classList.replace("fa-user", "fa-xmark");
  } else if ((userIconClick = 1)) {
    userBox.classList.remove("showBefore");
    userBox.classList.remove("showAfter");
    userIconClick = 0;
    linksOpenBtn.classList.replace("fa-xmark", "fa-user");
  }
});

//Go to Weather section
const weather=document.querySelector("#main-weather");
const navoffset=nav.offsetHeight;
const weatherPosition=weather.getBoundingClientRect().top;
const offsetPosition = weatherPosition + window.pageYOffset -  navoffset ;
const wLink=document.getElementById("w-link");

wLink.addEventListener("click", () => {
  window.scrollTo({
    top: offsetPosition,
    behavior: 'smooth'
});
});

//statistics chart 
function updatePieChart(chartId) {
  const pieChart = document.getElementById(chartId);
  const percentage = pieChart.getAttribute('data-percentage');
  pieChart.style.setProperty('--p', percentage);
}

document.addEventListener('DOMContentLoaded', () => {
  updatePieChart('pieChart1');
  updatePieChart('pieChart2');
});


//Profile picture
userFile.onchange = function () {
  profileImg.src = URL.createObjectURL(userFile.files[0]);
};


