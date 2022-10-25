<?php include_once 'header.php' ?>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "nameAlreadyExists") {
        echo "<div id='getMessage' style='visibility: visible;'>The name your entered already exists. Try Again.</div>";
    }
};
