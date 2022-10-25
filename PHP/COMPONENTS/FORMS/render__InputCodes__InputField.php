<div id="input-field">
    <form action="../INCLUDES/inputCodes.inc.php" method="POST" id="formBody">
        <div id="buttonContainer">
            <?php
            $value = $_GET['codes'];
            if (isset($_GET["codes"])) {
                echo "<p id='fileName'>" . $_GET["codes"] . "</p>";
            }
            echo "<button type='submit' id='okCodeBtn' name='submitCode' value='$value' method='POST'>OK</button>";
            echo "<button type='submit' name='cancelCode' id='cancelCodeBtn'>CANCEL</button>";
            ?>
        </div>
        <textarea style="resize: none;" spellcheck="false" name="fileContent" id="textArea" class="inputCodes" cols="130" rows="50" placeholder="//enter your code"><?php include_once '../INCLUDES/getTextFieldContent.inc.php' ?></textarea>
    </form>
</div>