<h3 id="file-name">Enter File Name</h3>

<br>
<form action="../INCLUDES/myFolderCodes.inc.php" method="POST">
    <input spellcheck="false" type="text" name="fileName" placeholder="File Name" id="nameField">
    <br><br>


    <button type="submit" name="submitFolderName" value="<?php echo $_GET["folderCodes"] ?>" id="okBtn">OK</button>
    <button type="submit" name="cancelFolderName" value="<?php echo $_GET["folderCodes"] ?>" id="cancelBtn">CANCEL</button>
</form>