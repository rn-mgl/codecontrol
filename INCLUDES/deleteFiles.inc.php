<?php include_once '../PHP/header.php' ?>

<?php

include_once "dbh.inc.php";

$userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

if (isset($_POST["delete"]) && !empty($_POST["check_list"])) {

    $folderName = $_POST["delete"];

    foreach ($_POST["check_list"] as $check) {
        $nameAndType = explode("|", $check);

        $query = "DELETE FROM codes WHERE codeName = '$nameAndType[0]' AND userMail = '$userName' AND fileType = '$nameAndType[1]'";

        mysqli_query($conn, $query);

        $result = $conn->query("SELECT * FROM foldercodes WHERE usersName = '$userName' AND folderName = '$nameAndType[0]';");

        if ($result->num_rows) {
            $query1 = "DELETE FROM foldercodes WHERE usersName = '$userName' AND folderName = '$nameAndType[0]'";
            mysqli_query($conn, $query1);
        }

        $query2 = "DELETE FROM folders WHERE folderName = '$nameAndType[0]' AND usersName = '$userName'";
        mysqli_query($conn, $query2);
    }
    header("location: ../PHP/myCodes.php");
    exit();
} else {
    header("location: ../PHP/myCodes.php?error=notDeleted");
    exit();
}
