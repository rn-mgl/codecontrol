<?php

function emptyInputSignup($name, $username, $email, $password, $passwordRepeat)
{
    $result = true;
    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUID($username)
{
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $passwordRepeat)
{
    $result = true;
    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersIDName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../PHP/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password)
{
    $sql = "INSERT INTO users (usersName, usersIDName, usersEmail, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../PHP/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../PHP/signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $password)
{
    $result = true;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../PHP/login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $uidExists["usersPwd"];

    $checkPwd = password_verify($password, $passwordHashed);

    if ($checkPwd === false) {
        header("location: ../PHP/login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["usersID"] = $uidExists["usersID"];
        $_SESSION["usersIDName"] = $uidExists["usersIDName"];
        header("location: ../PHP/home.php");
        exit();
    }
}

function emptyInputFileName($fileName)
{
    $result = true;
    if (empty($fileName)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createFileNote($conn, $userName, $fileName, $fileType, $isFolder)
{
    $sql = "INSERT INTO codes (userMail, codeName, fileType, isFolder) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../PHP/myCodes.php?error=filefailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $userName, $fileName, $fileType, $isFolder);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../PHP/myCodes.php");
    exit();
}

function createFileFolder($conn, $userName, $fileName, $fileType, $isFolder)
{
    $sql = "INSERT INTO codes (userMail, codeName, fileType, isFolder) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../PHP/myCodes.php?error=filefailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $userName, $fileName, $fileType, $isFolder);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql2 = "INSERT INTO folders (usersName, folderName) VALUES (?, ?);";
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("location: ../PHP/myCodes.php?error=filefailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt2, "ss", $userName, $fileName);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);
    header("location: ../PHP/myCodes.php");
    exit();
}

function createItemForFolderCodes($conn, $userName, $folderName, $fileName)
{
    $sql = "INSERT INTO foldercodes (usersName, folderName, codeName) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../PHP/myCodes.php?error=filefailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $userName, $folderName, $fileName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function typeNotClicked($typeSet)
{

    $result = true;
    if (empty($typeSet)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
