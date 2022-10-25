<?php

if (isset($_POST["submit"])) {

    $name = $_POST["Name"];
    $username = $_POST["Uname"];
    $email = $_POST["usermail"];
    $password = $_POST["userpass"];
    $passwordRepeat = $_POST["userpassRepeat"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($name, $username, $email, $password, $passwordRepeat) !== false) {
        header("location: ../PHP/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUID($username) !== false) {
        header("location: ../PHP/signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../PHP/signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($password, $passwordRepeat) !== false) {
        header("location: ../PHP/signup.php?error=doesnotmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../PHP/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $username, $email, $password);
} else {
    header("location: ../PHP/signup.php");
    exit();
}
