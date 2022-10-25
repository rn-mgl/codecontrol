<?php include_once 'header.php' ?>

<div id="fade-loading">
    <div id="box-loading"></div>
</div>

<div id="signup-form-container">

    <div id="inside-container">

        <div id="signup-title">
            <h1>SIGN UP</h1>
        </div>

        <div id="signup-form">

            <form action="../INCLUDES/signup.inc.php" method="post">

                <input type="text" name="Name" placeholder="Full Name">
                <br>
                <input type="text" name="Uname" placeholder="Username">
                <br>
                <input type="text" name="usermail" placeholder="Email">
                <br>
                <input type="password" name="userpass" placeholder="Password">
                <br>
                <input type="password" name="userpassRepeat" placeholder="Repeat Password">
                <br>
                <button type="submit" name="submit" id="main_signupBtn"> SIGN UP </button>

            </form>

        </div>

    </div>

    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        } else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username</p>";
        } else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email</p>";
        } else if ($_GET["error"] == "doesnotmatch") {
            echo "<p>Password does not match</p>";
        } else if ($_GET["error"] == "stmftfield") {
            echo "<p>Something went wrong, try again</p>";
        } else if ($_GET["error"] == "usernametaken") {
            echo "<p>Username already taken</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You have signed up</p>";
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