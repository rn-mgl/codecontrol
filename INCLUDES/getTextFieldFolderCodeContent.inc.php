<?php

include_once "dbh.inc.php";

$fileName = explode("|", $_GET["codes"])[0];

$folderName = explode("|", $_GET["codes"])[1];

$userName = mysqli_real_escape_string($conn, $_SESSION["usersIDName"]);

$query = "SELECT folderCodes FROM foldercodes WHERE codeName = '$fileName' AND folderName = '$folderName' AND usersName = '$userName'";

$result = mysqli_query($conn, $query);

$codeFiles = mysqli_fetch_assoc($result);

echo $codeFiles['folderCodes'];
