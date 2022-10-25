<?php

function renderInputCodesButtons()
{
    echo htmlspecialchars_decode("<div id='btns'>

    <button id='menuBtn'>
        <p class='subIn' id='menu'>Menu</p><img id='menuImg' class='icon' src='../IMG/MENU ICON.png' alt='menu icon'>
    </button>

    <div id='menuIcons'>

        <button id='changeNameBtn'><img id='menuImg' class='icon' src='../IMG/CHANGE NAME ICON.png' alt='menu icon'>
            <p class='subIn' id='changeNameTxt'>Change Name</p>
        </button>

        <button id='compilerFormatBtn'><img id='menuImg' class='icon' src='../IMG/COMPILER FORMAT ICON.png' alt='menu icon'>
            <p class='subIn' id='compilerFormat'>Compiler Format</p>
        </button>

    </div>
</div>");
}

function renderInputFolderCodesButtons()
{
    echo htmlspecialchars_decode("<div id='btns'>
    <button id='menuFolderBtn'>
        <p class='subInF' id='menuInF'>Menu</p><img id='menuImg' class='icon' src='../IMG/MENU ICON.png' alt='menu icon'>
    </button>

    <div id='menuIcons'>

        <button id='changeNameFolderBtn'><img id='menuImg' class='icon' src='../IMG/CHANGE NAME ICON.png' alt='menu icon'>
            <p class='subInF' id='changeNameTxtF'>Change Name</p>
        </button>
        <button id='compilerFormatFolderBtn'><img id='menuImg' class='icon' src='../IMG/COMPILER FORMAT ICON.png' alt='menu icon'>
            <p class='subInF' id='compilerFormatF'>Compiler Format</p>
        </button>

    </div>
</div>");
}

function renderMyCodesButtons()
{
    echo htmlspecialchars_decode("<div id='btns'>
    <button id='select-icon' value='delete' name='delete' method='POST' type='submit'>
        <img src='../IMG/SELECT ICON.png' alt='folder' class='icon'>
        <p class='sub' id='selectItems'>Select Items</p>
    </button>

    <button id='add-icon' value='add' name='add' method='POST' type='submit'>
        <img id='add-icon-img' src='../IMG/ADD ICON.png' alt='ADD' class='icon'>
        <p class='sub' id='addFile'>Add File</p>
    </button>

    <button id='select-all-icon' value='select all' name='select all' method='POST' type='submit'>
        <p class='sub' id='selectAllItems'>Select All</p>
        <img src='../IMG/SELECT ALL ICON.png' alt='folder' class='icon'>
    </button>
</div>");
}

function renderMyFolderCodesButtons()
{
    echo htmlspecialchars_decode(' 
    <button id="menuBtnMFC">
    <p class="subF" id="menuMFCSub">Menu</p>
    <img id="menuImg" class="icon" src="../IMG/MENU ICON.png" alt="menu icon">
    </button>

<div id="menuIcons">

    <button id="changeNameBtnMFC">
        <img id="menuMFCImg" class="icon" src="../IMG/CHANGE NAME ICON.png" alt="menu icon">
        <p class="subF" id="changeNameMFCSub">Change Name</p>
    </button>

</div>

<button id="select-icon" value="delete" name="delete" method="POST" type="submit">
    <img src="../IMG/SELECT ICON.png" alt="folder" class="icon">
    <p class="subF" id="selectItemsF">Select Items</p>
</button>

<button id="add-icon" value="add" name="add" method="POST" type="submit">
    <img src="../IMG/ADD ICON.png" alt="ADD" class="icon">
    <p class="subF" id="addFileF">Add File</p>
</button>

<button id="select-all" value="select all" name="select all" method="POST" type="submit">
    <p class="subF" id="selectAllItemsF">Select All</p>
    <img src="../IMG/SELECT ALL ICON.png" alt="folder" class="icon">
</button>');
}
