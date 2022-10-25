<?php include_once 'header.php' ?>

<div id="grid-container">
    <?php include_once '../PHP/COMPONENTS/buttons.php';
    renderMyCodesButtons();
    ?>
    <?php include_once '../PHP/COMPONENTS/FORMS/render__MyCodes__Files.php' ?>
</div>


<div id="file-form-container">
    <div id="file-form">
        <?php include_once '../PHP/COMPONENTS/nameError.php';
        render__NameError__MyCodes();
        ?>
        <?php include_once '../PHP/COMPONENTS/FORMS/render__MyCodes__AddFile.php' ?>
    </div>
</div>

<?php include_once '../PHP/COMPONENTS/errorMessage.php' ?>

<script src="../JS/myCodes.js"></script>

<?php include_once 'footer.php' ?>