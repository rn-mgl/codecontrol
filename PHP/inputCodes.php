<?php include_once 'header.php' ?>

<div id="codes-input-container">
    <?php include_once '../PHP/COMPONENTS/buttons.php';
    renderInputCodesButtons();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__InputCodes__InputField.php'; ?>
</div>

<div id="changeNameContainer">
    <?php include_once '../PHP/COMPONENTS/nameError.php';
    render__NameError__InputCodes();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__InputCodes__ChangeName.php'; ?>
</div>

<?php include_once '../PHP/COMPONENTS/errorMessage.php' ?>

<script src="../JS/inputCodes.js"></script>