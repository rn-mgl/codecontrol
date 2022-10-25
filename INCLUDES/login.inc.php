<?php

if (isset($_POST["submit"])) {

    $username = $_POST["Name"];
    $password = $_POST["userpass"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../PHP/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
} else {
    header("location: ../PHP/login.php");
    exit();
}
