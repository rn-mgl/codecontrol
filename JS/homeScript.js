let home_loginBtn = document.getElementById("loginBtn");
let home_signupBtn = document.getElementById("signupBtn");
let loading = document.getElementById("fade-loading");

window.onload = function () {
  loading.style.visibility = "hidden";
  loading.style.transition = "300ms ease-in-out";
};

home_loginBtn.addEventListener("click", function () {
  window.open("../PHP/login.php", "_self");
});

home_signupBtn.addEventListener("click", function () {
  window.open("../PHP/signup.php", "_self");
});
