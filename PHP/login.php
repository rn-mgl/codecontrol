<?php include_once 'header.php' ?>

<?php include_once 'loading.php' ?>

<div id="login-form-container">

    <div id="inside-container">

        <div id="login-title">
            <h1>LOG IN</h1>
        </div>

        <div id="login-form">

            <form action="../INCLUDES/login.inc.php" method="post">

                <input type="text" name="Name" placeholder="Username / Email">
                <br>
                <input type="password" name="userpass" placeholder="Password">
                <br>
                <button type="submit" name="submit" id="main_loginBtn"> LOG IN </button>

            </form>

        </div>

    </div>

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        } else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information</p>";
        }
    };
    ?>

</div>

<script>
    let loading = document.getElementById("fade-loading");

    window.onload = function() {
        loading.style.visibility = "hidden";
        loading.style.transition = "500ms ease-in-out";
    }
</script>

<?php include_once 'footer.php' ?>