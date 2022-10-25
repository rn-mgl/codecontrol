<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitFolderName"])) {
    $fileName = $_POST["fileName"];
    $folderName = $_POST["submitFolderName"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputFileName($fileName) !== false) {
        header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}&error=emptyFileName");
        exit();
    }

    $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

    $result = $conn->query("SELECT codeName FROM foldercodes WHERE folderName = '$folderName' AND codeName = '$fileName' AND usersName = '$userName';");

    if ($result->num_rows == 0) {

        createItemForFolderCodes($conn, $userName, $folderName, $fileName);
        header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}");
        exit();
    } else {
        header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}&error=nameAlreadyExists");
        exit();
    }
} else if (isset($_POST["cancelFolderName"])) {
    $fileName = $_POST["fileName"];
    $folderName = $_POST["cancelFolderName"];
    header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}");
    exit();
}
