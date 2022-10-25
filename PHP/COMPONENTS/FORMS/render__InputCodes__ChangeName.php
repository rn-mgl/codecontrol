<form action="../INCLUDES/changeName.inc.php" method="POST">
    <h3 id="nameChangeText">Change File Name</h3>
    <br>
    <input id="nameChangeInput" name="nameChangeInput" type="text" spellcheck="false" placeholder="Enter name" method="POST">
    <br><br>

    <?php
    $value = $_GET['codes'];
    echo "<button type='submit' id='okNameChangeBtn' name='submitNameChange' value='$value' method='POST'>OK</button>";
    ?>
</form>

<button id="cancelNameChangeBtn">CANCEL</button>