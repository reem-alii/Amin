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

//variables for confirmed password
/*const password = document.getElementById("password2"),
  confirm_password = document.getElementById("confirm_password");*/


signupCloseBtn.addEventListener(
  "click",
  () => (window.location.href = "/home")
);
//functions for signup multi levels
/*submitBtn.addEventListener("click", function () {
  bullet[current - 1].classList.add("active1");
  progressCheck[current - 1].classList.add("active1");
  current += 1;
  setTimeout(function () {
    alert("Your Form Successfully Signed up");
    location.reload();
  }, 800);
});*/
nextBtnFirst.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-36.5%";
  bullet[current - 1].classList.add("active1");
  progressCheck[current - 1].classList.add("active1");
  current += 1;
});

nextBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-72.5%";
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
  slidePage.style.marginLeft = "-36.5%";
  bullet[current - 2].classList.remove("active1");
  progressCheck[current - 2].classList.remove("active1");
  current -= 1;
});
//functions for confirmed password

/*function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity("");
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;*/
