<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitFolderNameChange"]) && isset($_POST["folderNameChangeInput"])) {

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

    $folderNameToUse = $_POST["folderNameChangeInput"];
    $currName = explode("|", $_POST["submitFolderNameChange"])[0];
    $folderName = explode("|", $_POST["submitFolderNameChange"])[1];

    if (emptyInputFileName($folderNameToUse) !== false) {
        header("location: ../PHP/inputFolderCodes.php?codes=${currName}%7C${folderName}&error=emptyField");
        exit();
    }

    $result = $conn->query("SELECT codeName FROM foldercodes WHERE codeName = '$folderNameToUse' AND folderName = '$folderName' AND usersName = '$userName';");
    if ($result->num_rows == 0) {

        $sql = "UPDATE foldercodes SET codeName = (?) WHERE codeName = '$currName' AND folderName = '$folderName' AND usersName = '$userName';";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../PHP/myCodes.php?error=filefailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $folderNameToUse);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../PHP/inputFolderCodes.php?codes=${folderNameToUse}%7C${folderName}");
        exit();
    } else {
        header("location: ../PHP/inputFolderCodes.php?codes=${folderNameToUse}%7C${folderName}&error=nameAlreadyExists");
        exit();
    }
} else {
    header("location: ../PHP/inputFolderCodes.php?codes=${currName}%7C${folderName}");
    exit();
}
