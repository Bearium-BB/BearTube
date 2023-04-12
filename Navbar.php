<?php session_start(); ?>
<div class="nav-bar">
    <div class="nav-left">
        <img id="the" src="Img/BearTube Logo.png" alt="Logo">
    </div>
    <div class="nav-middle">
        <a href="/php/BearTube/Index.php">Home</a>
        <a href="/php/BearTube/Videos/Videos.php">Video</a>
        <a href="#">Contact</a>
        <?php
            if (isset($_SESSION['Username'])) {
                echo '<a href="UploadVideo/UploadFile.php">Upload</a>';
            }  
        ?>
    </div>
    <div class="nav-right">
        <?php
            if (isset($_SESSION['loggedIn'])) {
                echo '<a class="sign-in" href="AccountManager/AccountManager.php">Account Manager</a>';
            } else {
                echo '<a class="sign-in" href="SignIn/SignIn.php">Sign In</a>';
            }
        
        ?>
        
    </div>
</div>





