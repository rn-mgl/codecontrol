<h3 id="file-name">Enter File Name</h3>

<br>

<form action="../INCLUDES/myCodes.inc.php" method="POST">
    <input spellcheck="false" type="text" name="fileName" placeholder="File Name" id="nameField">
    <br><br>

    <span>FOLDER</span>
    <input type="radio" id="folder-rb" value="folder" name="type" method="POST">

    <span>NOTE</span>
    <input type="radio" id="note-rb" value="note" name="type" method="POST">

    <br><br>
    <button type="submit" name="submitFolderName" id="okBtn">OK</button>
    <button name="cancelFolderName" id="cancelBtn">CANCEL</button>
</form>