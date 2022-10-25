<?php include_once 'header.php' ?>

<div id="codes-input-container">
    <?php include_once '../PHP/COMPONENTS/buttons.php';
    renderInputFolderCodesButtons();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__InputFolderCodes__InputField.php'; ?>
</div>

<div id="changeFolderFileNameContainer">
    <?php include_once '../PHP/COMPONENTS/nameError.php';
    render__NameError__InputCodes();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__InputFolderCodes__ChangeName.php' ?>
</div>

<?php include_once '../PHP/COMPONENTS/errorMessage.php' ?>

<script src="../JS/inputFolderCodes.js"></script>