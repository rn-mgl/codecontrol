<?php

include_once "dbh.inc.php";
$userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

$fileName = $_GET["codes"];

$query = "SELECT htmlCode FROM codes WHERE codeName = '$fileName' AND userMail = '$userName'";

$result = mysqli_query($conn, $query);

$codeFiles = mysqli_fetch_assoc($result);

echo $codeFiles['htmlCode'];
