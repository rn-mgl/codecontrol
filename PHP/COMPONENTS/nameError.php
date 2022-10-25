<?php

function render__NameError__InputCodes()
{
    echo htmlspecialchars_decode('<div id="error" style="visibility:hidden;">
    <span id="doNot">DO NOT USE SPECIAL CHARACTERS</span>
    <hr>
</div>

<br>');
}

function render__NameError__MyCodes()
{
    echo htmlspecialchars_decode('<div id="error" style="visibility:hidden;">
    <span id="doNot">DO NOT USE SPECIAL CHARACTERS</span>
    <hr>
</div>
');
}

function render__NameError__MyFolderCodes()
{
    echo htmlspecialchars_decode('<div id="errorFolder" style="visibility:hidden;">
    <span id="doNot">DO NOT USE SPECIAL CHARACTERS</span>
    <hr>
</div>
');
}
