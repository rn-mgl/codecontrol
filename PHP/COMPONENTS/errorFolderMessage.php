<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "nameAlreadyExists") {
        echo "<div id='getFolderMessage' style='visibility: visible;'>The name your entered already exists. Try Again.</div>";
    }
};
