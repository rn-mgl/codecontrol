<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitFolderName"]) && isset($_POST["type"])) {
    $fileName = $_POST["fileName"];

    $typeSet = $_POST["type"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputFileName($fileName) !== false) {
        header("location: ../PHP/myCodes.php?error=emptyfilenameinput");
        exit();
    }

    if (typeNotClicked($typeSet) !== false) {
        header("location: ../PHP/myCodes.php?error=typeNotClicked");
        exit();
    }

    $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

    $result = $conn->query("SELECT codeName FROM codes WHERE codeName = '$fileName' AND userMail = '$userName' AND fileType = '$typeSet';");

    if ($result->num_rows == 0) {

        $isFolder = "";

        if (isset($_POST["type"])) {
            $fileType = $_POST["type"];
        }

        if ($fileType === "note") {
            $isFolder = "no";
            createFileNote($conn, $userName, $fileName, $fileType, $isFolder);
        }

        if ($fileType === "folder") {
            $isFolder = "yes";
            createFileFolder($conn, $userName, $fileName, $fileType, $isFolder);
        }
    } else {
        header("location: ../PHP/myCodes.php?error=nameAlreadyExists");
        exit();
    }
    header("location: ../PHP/myCodes.php");
    exit();
} else if (isset($_POST["cancelFolderName"])) {
    header("location: ../PHP/myCodes.php");
    exit();
} else {
    header("location: ../PHP/myCodes.php");
    exit();
}
