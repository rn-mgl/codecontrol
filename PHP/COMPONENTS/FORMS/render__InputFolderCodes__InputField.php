<div id="input-field">

    <form action="../INCLUDES/inputFolderCodes.inc.php" method="POST" id="formBody">

        <div id="buttonContainer">
            <?php
            $value1 = explode("|", $_GET["codes"])[0];
            $value2 = explode("|", $_GET["codes"])[1];

            if (isset($_GET["codes"])) {
                echo "<p id='fileName'>" . explode("|", $_GET["codes"])[0] . "</p>";
            }
            echo "<button type='submit' id='okCodeBtn' name='submitCode' value='$value1|$value2' method='POST'>OK</button>";
            echo "<button type='submit' id='cancelCodeBtn' name='cancelCode' value='$value1|$value2' method='POST'>CANCEL</button>";
            ?>

        </div>

        <textarea style="resize: none;" spellcheck="false" name="fileContent" id="textArea" class="inputCodes" cols="130" rows="50" placeholder="//enter your code"><?php include_once '../INCLUDES/getTextFieldFolderCodeContent.inc.php' ?></textarea>

    </form>

</div>