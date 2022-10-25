let addFile = document.getElementById("add-icon");
let selectItem = document.getElementById("select-icon");
let deleteItem = document.getElementById("delete-icon");
let selectAll = document.getElementById("select-all-icon");

let isFolder = document.getElementById("folder-rb");
let isNote = document.getElementById("note-rb");

let container = document.getElementById("content-container");
let folders = document.getElementsByClassName("box");
let notes = document.getElementsByClassName("note");

let fileForm = document.getElementById("file-form-container");

let okBtn = document.getElementById("okBtn");
let cancel = document.getElementById("cancelBtn");

let codesName = document.getElementById("nameField");

let selectClicked = false;
let selectCount = 0;

let type = "";
let loading = document.getElementById("fade-loading");

let inputCodes = document.getElementsByClassName("inputCodes");
let cancelInput = document.getElementById("cancelCodeBtn");

let errorMsg = document.getElementById("error");

let nameExists = document.getElementById("getMessage");

let delOrOpen = "";

let currChecker;

let sub = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
let specChars = /[()\[\]{};':"\\|,<>\/?]+/;

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

codesName.addEventListener("keydown", function (e) {
  let format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,<>\/?]+/;

  currChecker = setInterval(() => {
    if (!format.test(codesName.value)) {
      errorMsg.style.visibility = "hidden";
      errorMsg.style.height = "1px";
    }
  }, 1000);

  if (e.keyCode > 90 && e.keyCode !== 190) {
    if (!format.test(codesName.value)) {
      errorMsg.style.visibility = "hidden";
      errorMsg.style.height = "1px";
    }
    errorMsg.style.visibility = "visible";
    errorMsg.style.height = "auto";
  }
});

function deleteRender() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../INCLUDES/getCodes.inc.php", true);

  xhr.onload = function () {
    if (this.status == 200) {
      let codes = JSON.parse(this.responseText);

      let output = "";

      for (let i in codes) {
        output += `<button type="submit" disabled value="${codes[i].codeName}" class="fileBtn" name="codes" method="POST">
                                <div class="${codes[i].fileType}">
                                    <p>${codes[i].codeName}</p>
                            <input type="checkbox" class="cbox" name="check_list[]" value="${codes[i].codeName}|${codes[i].fileType}" method="POST" style="visibility: visible;">
                            </div></button>`;
      }
      container.innerHTML = output;
    }
  };

  xhr.send();

  deleteItem.style.visibility = "visible";
  selectAll.style.visibility = "visible";
  selectClicked = true;
  selectCount = 1;
}

function render() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../INCLUDES/getCodes.inc.php", true);

  xhr.onload = function () {
    if (this.status == 200) {
      let codes = JSON.parse(this.responseText);

      let output = `<form method="POST" action="../PHP/inputCodes.php"><button id="hidden" type="submit" value="${codes[0].codeName}" class="fileBtn" name="codes" method="POST">
        </div></button></form>`;

      for (let i in codes) {
        if (codes[i].fileType === "note") {
          output += `<form method="GET" action="../PHP/inputCodes.php"><button type="submit" value="${codes[i].codeName}" class="fileBtn" name="codes" method="GET">
                                <div class="${codes[i].fileType}">
                                    <p>${codes[i].codeName}</p>
                            <input type="checkbox" class="cbox" name="check_list[]" value="${codes[i].codeName}|${codes[i].fileType}" method="POST">
                            </div></button></form>`;
        } else {
          output += `<form method="GET" action="../PHP/myFolderCodes.php"><button type="submit" value="${codes[i].codeName}" class="fileBtn" name="folderCodes" method="GET">
                                <div class="${codes[i].fileType}">
                                    <p>${codes[i].codeName}</p>
                            <input type="checkbox" class="cbox" name="check_list[]" value="${codes[i].codeName}|${codes[i].fileType}" method="POST">
                            </div></button></form>`;
        }
      }
      container.innerHTML = output;
    }
  };

  xhr.send();
}

function changeNameRender() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../INCLUDES/getCodes.inc.php", true);

  xhr.onload = function () {
    if (this.status == 200) {
      let codes = JSON.parse(this.responseText);

      let output = `<form method="POST" action="../PHP/inputCodes.php"><button id="hidden" type="submit" value="${codes[0].codeName}" class="fileBtn" name="codes" method="POST">
        </div></button></form>`;

      for (let i in codes) {
        if (codes[i].fileType === "note") {
          output += `<button type="submit" value="${codes[i].codeName}" disabled class="fileBtn" name="codes" method="POST">
                                <div class="${codes[i].fileType}">
                                    <p>${codes[i].codeName}</p>
                            </div></button>`;
        } else {
          output += `<button type="submit" value="${codes[i].codeName}" disabled class="fileBtn" name="folderCodes" method="POST">
                                <div class="${codes[i].fileType}">
                                    <p>${codes[i].codeName}</p>
                            </div></button>`;
        }
      }
      container.innerHTML = output;
    }
  };
  xhr.send();
}

window.onload = function () {
  render();
  selectClicked = false;
  selectCount = 0;
  if (localStorage.getItem("decision").match("open")) {
    render();
  } else {
    deleteRender();
  }
  for (let i = 0; i < inputCodes.length; i++) {
    inputCodes[i].style.height = "1px";
    inputCodes[i].style.visibility = "hidden";
  }
};

addFile.addEventListener("click", function () {
  fileForm.style.visibility = "visible";
  changeNameRender();
});

isFolder.addEventListener("click", function () {
  type = "box";
});

isNote.addEventListener("click", function () {
  type = "note";
});

okBtn.addEventListener("click", function () {
  if (type !== "") {
    fileForm.style.visibility = "hidden";

    render();

    type = "";
  }
  localStorage.setItem("decision", "open");
});

cancel.addEventListener("click", function () {
  fileForm.style.visibility = "hidden";
  type = "";
  localStorage.setItem("decision", "open");
  errorMsg.style.visibility = "hidden";
  errorMsg.style.height = "1px";
  render();
  clearInterval(currChecker);
});

selectItem.addEventListener("click", function () {
  if (selectClicked === false && selectCount === 0) {
    delOrOpen = "delete";
    localStorage.setItem("decision", JSON.stringify(delOrOpen));
    deleteRender();
    deleteItem.style.visibility = "visible";
    selectAll.style.visibility = "visible";
    selectClicked = true;
    selectCount = 1;
  } else {
    delOrOpen = "open";
    localStorage.setItem("decision", JSON.stringify(delOrOpen));
    for (let i = 0; i < document.getElementsByClassName("cbox").length; i++) {
      document.getElementsByClassName("cbox")[i].style.visibility = "hidden";
      document.getElementsByClassName("cbox")[i].checked = false;
    }
    for (
      let i = 0;
      i < document.getElementsByClassName("fileBtn").length;
      i++
    ) {
      document.getElementsByClassName("fileBtn")[i].disabled = false;
    }
    deleteItem.style.visibility = "hidden";
    selectAll.style.visibility = "hidden";
    selectClicked = false;
    selectCount = 0;
    window.location.reload();
  }
});

let allSelected = 0;

selectAll.addEventListener("click", function () {
  if (allSelected === 0) {
    for (let i = 0; i < document.getElementsByClassName("cbox").length; i++) {
      document.getElementsByClassName("cbox")[i].checked = true;
    }
    allSelected = 1;
  } else {
    for (let i = 0; i < document.getElementsByClassName("cbox").length; i++) {
      document.getElementsByClassName("cbox")[i].checked = false;
    }
    allSelected = 0;
  }
});

deleteItem.addEventListener("click", function () {
  delOrOpen = "open";
});
