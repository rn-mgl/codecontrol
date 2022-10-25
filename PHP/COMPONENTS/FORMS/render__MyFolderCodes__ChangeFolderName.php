<form action="../INCLUDES/changeFolderName.inc.php" method="POST">

    <h3 id="nameChangeTextMFC">Change Folder Name</h3>

    <br>

    <input id="nameChangeInputMFC" name="nameChangeInputMFC" type="text" spellcheck="false" placeholder="Enter name" method="POST">

    <br><br>

    <?php
    $value = $_GET['folderCodes'];
    echo "<button type='submit' id='okNameChangeBtnMFC' name='submitNameChangeMFC' value='$value' method='POST'>OK</button>";
    ?>

</form>

<button id="cancelNameChangeBtnMFC">CANCEL</button>