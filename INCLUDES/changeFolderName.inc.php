<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitNameChangeMFC"]) && isset($_POST["nameChangeInputMFC"])) {

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $folderNameToUse = $_POST["nameChangeInputMFC"];
    $currFolderName = $_POST["submitNameChangeMFC"];

    $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

    if (emptyInputFileName($folderNameToUse) !== false) {
        header("location: ../PHP/myFolderCodes.php?folderCodes=${currFolderName}&error=nameNotSet");
        exit();
    }

    $result = $conn->query("SELECT codeName FROM codes WHERE codeName = '$folderNameToUse' AND userMail = '$userName';");
    if ($result->num_rows == 0) {
        $sql1 = "UPDATE codes SET codeName = (?) WHERE codeName = '$currFolderName' AND userMail = '$userName';";
        $stmt1 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt1, $sql1)) {
            header("location: ../PHP/myCodes.php?error=filefailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt1, "s", $folderNameToUse);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);

        $sql2 = "UPDATE foldercodes SET folderName = (?) WHERE folderName = '$currFolderName' AND usersName = '$userName';";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2, $sql2)) {
            header("location: ../PHP/myCodes.php?error=filefailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt2, "s", $folderNameToUse);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        header("location: ../PHP/myFolderCodes.php?folderCodes=${folderNameToUse}");
        exit();
    } else {
        header("location: ../PHP/myFolderCodes.php?folderCodes=${currFolderName}&error=nameAlreadyExists");
        exit();
    }
} else {
    header("location: ../PHP/myFolderCodes.php?folderCodes=${currFolderName}&error=nameNotSet");
    exit();
}
