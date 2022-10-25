<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;700;800;900&family=Nunito&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/homeStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/myCodesStyle.css">
    <link rel="stylesheet" type="text/css" href="../CSS/aboutStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/loginStyle.css">
    <link rel="stylesheet" type="text/css" href="../CSS/signupStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/loadingStyle.css">
    <link rel="stylesheet" type="text/css" href="../CSS/inputCodesStyle.css">
    <link rel="stylesheet" type="text/css" href="../CSS/myFolderCodes.css">
    <link rel="stylesheet" type="text/css" href="../CSS/inputFolderCodesStyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Control</title>

</head>

<body>

    <div id="header">

        <a href="../PHP/home.php"><img src="../IMG/CODE CONTROL LOGO.PNG" alt="LOGO" id="logo"></a>

        <ul id="link-container">
            <li><a href="home.php">HOME</a></li>

            <?php
            if (isset($_SESSION["usersIDName"])) {
                echo "<li><a href='myCodes.php'>MY CODES</a></li>";
            }
            ?>

            <li><a href="about.php">ABOUT</a></li>

            <?php
            if (isset($_SESSION["usersIDName"])) {
                echo "<li><a href='../INCLUDES/logout.inc.php'>LOG OUT</a></li>";
            } else {
                echo "<li><a href='login.php'>LOG IN</a></li>";
                echo "<li><a href='signup.php'>SIGN UP</a></li>";
            }
            ?>
        </ul>

    </div>