<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitCode"])) {

    $codeToPlace = $_POST["fileContent"];
    $codeName = $_POST["submitCode"];

    require_once "dbh.inc.php";
    if (isset($_POST["submitCode"])) {

        $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

        $query = "UPDATE codes SET htmlCode = (?) WHERE codeName = '$codeName' AND userMail = '$userName';";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("location: ../PHP/myCodes.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $codeToPlace);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../PHP/inputCodes.php?codes=${codeName}");
        exit();
    }
} else if (isset($_POST["cancelCode"])) {
    header("location: ../PHP/myCodes.php");
    exit();
}
