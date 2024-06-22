//variables for nav
const nav = document.querySelector(".nav"),
  searchIcon = document.querySelector("#searchIcon"),
  navOpenBtn = document.querySelector(".navOpenBtn"),
  navCloseBtn = document.querySelector(".navCloseBtn"),
  linksOpenBtn = document.querySelector("#open-icon"),
  userBox = document.querySelector(".user-box"),
  //variables for confirmed password
  password = document.getElementById("password2"),
  confirm_password = document.getElementById("confirm_password");
//variables for profile page
let profileImg = document.querySelector(".account-details .image-div img"),
  userFile = document.querySelector(".account-details .userfile");
let token = 0; //token=1 if submitting or login
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
  if (token == 1 && userIconClick == 0) {
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

//functions for confirmed password

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity("");
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

//Profile picture
userFile.onchange = function () {
  profileImg.src = URL.createObjectURL(userFile.files[0]);
};
