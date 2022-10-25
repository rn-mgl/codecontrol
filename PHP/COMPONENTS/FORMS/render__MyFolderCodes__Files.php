<form action="../INCLUDES/deleteFolderFiles.inc.php" method="POST" id="delete-icon-container">

    <div id="button-container">
        <button id="folder-delete-icon" value="<?php echo $_GET["folderCodes"] ?>" name="delete" method="POST" type="submit">
            <img src="../IMG/DELETE ICON.png" alt="folder" class="icon">
            <p class="subF" id="deleteItemsF">Delete</p>
        </button>
    </div>

    <div id="content-container">

    </div>

</form>