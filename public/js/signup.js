
let signupCloseBtn = document.querySelector(".signup-close"),
  //variables for signup multi levels
  slidePage = document.querySelector(".slide-page"),
  nextBtnFirst = document.querySelector(".firstNext"),
  prevBtnSec = document.querySelector(".prev-1"),
  nextBtnSec = document.querySelector(".next-1"),
  prevBtnThird = document.querySelector(".prev-2"),
  progressText = document.querySelectorAll(".step p"),
  submitBtn = document.querySelector(".Sign-Up"),
  progressCheck = document.querySelectorAll(".step .check"),
  bullet = document.querySelectorAll(".step .bullet");
  let current = 1;


signupCloseBtn.addEventListener(
  "click",() =>{
    window.location.href = "/home";
  }
);
//functions for signup multi levels
submitBtn.addEventListener("click", function () {
  bullet[current - 1].classList.add("active1");
  progressCheck[current - 1].classList.add("active1");
  current += 1;
  setTimeout(function () {
    window.location.href="/home";
  }, 300);
  
});
nextBtnFirst.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-35.9%";
  bullet[current - 1].classList.add("active1");
  progressCheck[current - 1].classList.add("active1");
  current += 1;
});

nextBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-71.1%";
  bullet[current - 1].classList.add("active1");
  progressCheck[current - 1].classList.add("active1");
  current += 1;
});

prevBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active1");
  progressCheck[current - 2].classList.remove("active1");
  current -= 1;
});
prevBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-35.9%";
  bullet[current - 2].classList.remove("active1");
  progressCheck[current - 2].classList.remove("active1");
  current -= 1;
});
