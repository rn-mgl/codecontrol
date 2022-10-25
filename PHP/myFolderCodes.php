<?php include_once 'header.php' ?>

<h1 id="folderName"><?php echo $_GET["folderCodes"] ?></h1>

<div id="grid-container">
    <?php include_once '../PHP/COMPONENTS/buttons.php';
    renderMyFolderCodesButtons();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__MyFolderCodes__Files.php' ?>
</div>


<div id="file-form-container">
    <div id="file-form">
        <?php include_once '../PHP/COMPONENTS/nameError.php';
        render__NameError__MyCodes();
        ?>
        <?php include_once '../PHP/COMPONENTS/FORMS/render__MyFolderCodes__AddFile.php' ?>
    </div>
</div>

<div id="changeNameContainerMFC">
    <?php include_once '../PHP/COMPONENTS/nameError.php';
    render__NameError__MyFolderCodes();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__MyFolderCodes__ChangeFolderName.php' ?>
</div>

<?php include_once '../PHP/COMPONENTS/errorFolderMessage.php' ?>

<script src="../JS/myFolderCodes.js"></script>

<?php include_once 'footer.php' ?>