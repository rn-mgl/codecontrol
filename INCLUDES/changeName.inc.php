<?php include_once '../PHP/header.php' ?>

<?php

if (isset($_POST["submitNameChange"]) && isset($_POST["nameChangeInput"])) {

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $nameToUse = $_POST["nameChangeInput"];
    $currName = $_POST["submitNameChange"];

    if (emptyInputFileName($nameToUse) !== false) {
        header("location: ../PHP/myCodes.php?error=emptyfilenameinput");
        exit();
    }

    $userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

    $result = $conn->query("SELECT codeName FROM codes WHERE userMail = '$userName' AND codeName = '$nameToUse';");

    if ($result->num_rows == 0) {

        $sql = "UPDATE codes SET codeName = (?) WHERE codeName = '$currName' AND userMail = '$userName';";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../PHP/myCodes.php?error=filefailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $nameToUse);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../PHP/inputCodes.php?codes=${nameToUse}");
        exit();
    } else {
        header("location: ../PHP/inputCodes.php?codes=${currName}&error=nameAlreadyExists");
        exit();
    }
} else {
    header("location: ../PHP/inputCodes.php?error=nameNotSet");
    exit();
}
