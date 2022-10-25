<form action="../INCLUDES/changeNameInFolders.inc.php" method="POST">

    <h3 id="nameChangeFolderText">Change File Name</h3>

    <br>

    <input id="nameChangeFolderInput" name="folderNameChangeInput" type="text" spellcheck="false" placeholder="Enter name" method="POST">

    <br><br>

    <?php
    $value1 = explode("|", $_GET["codes"])[0];
    $value2 = explode("|", $_GET["codes"])[1];
    echo "<button type='submit' id='okNameChangeFolderBtn' name='submitFolderNameChange' value='$value1|$value2' method='POST'>OK</button>";
    ?>

</form>

<button id="cancelNameChangeFolderBtn">CANCEL</button>