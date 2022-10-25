<?php include_once '../PHP/header.php' ?>

<?php

include_once "dbh.inc.php";

$userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

if (isset($_POST["delete"]) && !empty($_POST["check_list"])) {

    $folderName = $_POST["delete"];

    foreach ($_POST["check_list"] as $check) {
        $query1 = "DELETE FROM foldercodes WHERE codeName = '$check' AND usersName = '$userName' AND folderName = '$folderName'";
        mysqli_query($conn, $query1);

        $query2 = "DELETE FROM folders WHERE folderName = '$check' AND usersName = '$userName'";
        mysqli_query($conn, $query2);
    }
    header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}");
    exit();
} else {
    header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}&error=notDeleted");
    exit();
}
