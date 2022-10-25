let menuIcon = document.getElementById("menuFolderBtn");
let changeNameIcon = document.getElementById("changeNameFolderBtn");
let compilerIcon = document.getElementById("compilerFormatFolderBtn");

let menuTxt = document.getElementById("menuInF");

let nameChangeForm = document.getElementById("changeFolderFileNameContainer");
let cancelnameChangeForm = document.getElementById("cancelNameChangeFolderBtn");
let nameInput = document.getElementById("nameChangeFolderInput");

let errorMsg = document.getElementById("error");

let menuClickCount = 0;

let nameExists = document.getElementById("getMessage");

if (nameExists != null && nameExists.style.visibility === "visible") {
  hide = setInterval(() => {
    nameExists.style.visibility = "visible";
    if (hide >= 1) {
      nameExists.style.visibility = "hidden";
    }
    history.back();
    clearInterval();
  }, 10000);

  nameExists.addEventListener("click", function () {
    nameExists.style.visibility = "hidden";
    nameExists.style.height = "1px";
    history.back();
  });
}

menuIcon.addEventListener("click", function () {
  if (menuClickCount === 0) {
    menuIcon.style.transform = "rotate(90deg)";
    changeNameIcon.style.visibility = "visible";
    changeNameIcon.style.top = "10rem";
    compilerIcon.style.visibility = "visible";
    compilerIcon.style.top = "13.6rem";
    menuClickCount = 1;
    menuTxt.style.transform = "rotate(-90deg)";
    menuTxt.style.top = "4.4rem";
    menuTxt.style.left = "-0.7rem";
  } else {
    menuIcon.style.transform = "rotate(0deg)";
    changeNameIcon.style.visibility = "hidden";
    changeNameIcon.style.top = "6.3rem";
    compilerIcon.style.top = "6.3rem";
    compilerIcon.style.visibility = "hidden";
    menuClickCount = 0;
    menuTxt.style.transform = "rotate(0deg)";
    menuTxt.style.top = "0.8rem";
    menuTxt.style.left = "-4.4rem";
  }
});

changeNameIcon.addEventListener("click", function () {
  nameChangeForm.style.visibility = "visible";
});

cancelnameChangeForm.addEventListener("click", function () {
  nameChangeForm.style.visibility = "hidden";
  menuClickCount = 1;
  errorMsg.style.visibility = "hidden";
  errorMsg.style.height = "1px";
});

nameInput.addEventListener("keydown", function (e) {
  let format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,<>\/?]+/;

  currChecker = setInterval(() => {
    if (!format.test(nameInput.value)) {
      errorMsg.style.visibility = "hidden";
      errorMsg.style.height = "1px";
    }
  }, 10);

  if (e.keyCode > 90 && e.keyCode !== 190) {
    if (!format.test(nameInput.value)) {
      errorMsg.style.visibility = "hidden";
      errorMsg.style.height = "1px";
    }
    errorMsg.style.visibility = "visible";
    errorMsg.style.height = "auto";
  }
});
