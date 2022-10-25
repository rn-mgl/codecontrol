<?php include_once 'header.php' ?>
<?php include_once 'loading.php' ?>

<div id="info-container">

    <?php include_once '../PHP/COMPONENTS/tagline.php'; ?>

    <?php
    if (isset($_SESSION["usersIDName"])) {
        echo "<p id='greeting'>HELLO THERE <b>" . $_SESSION["usersIDName"] . "</b></p>";
    } else {
        echo "<button id='loginBtn'>LOG IN</button>";
        echo "<button id='signupBtn'>SIGN UP</button>";
    }
    ?>

</div>

<script src="../JS/homeScript.js"></script>

<?php include_once 'footer.php' ?>