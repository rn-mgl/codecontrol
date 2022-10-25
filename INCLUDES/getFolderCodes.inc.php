<?php session_start() ?>

<?php

include_once "dbh.inc.php";

$userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

$query = "SELECT * FROM foldercodes WHERE usersName = '$userName'";

$result = mysqli_query($conn, $query);

$codeFiles = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($codeFiles);
