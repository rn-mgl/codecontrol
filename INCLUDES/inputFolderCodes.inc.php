<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitCode"])) {
    $codeToPlace = $_POST["fileContent"];
    $codeName = explode('|', $_POST["submitCode"])[0];
    $folderName = explode('|', $_POST["submitCode"])[1];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

    if (isset($_POST["submitCode"])) {
        $query = "UPDATE foldercodes SET folderCodes = (?) WHERE codeName = '$codeName' AND folderName = '$folderName' AND usersName = '$userName';";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("location: ../PHP/myCodes.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $codeToPlace);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../PHP/inputFolderCodes.php?codes=${codeName}%7C${folderName}");
        exit();
    }
} else if (isset($_POST["cancelCode"])) {
    $codeName = explode('|', $_POST["cancelCode"])[0];
    $folderName = explode('|', $_POST["cancelCode"])[1];
    echo $codeName;
    header("location: ../PHP/myFolderCodes.php?folderCodes=${folderName}");
    exit();
}
