<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../Style/SignIn.css?ver=1.0">
</head>
<html>
<body>	
<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/BearTube/Navbar.php'; ?>


    <div class="Container">
        <div class="Background-Card">
            <form method="post" action="Verify.php">
                <div class="user-input">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email">    
                </div>
                <div class="password user-input">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password">  
                </div>
                <div>
                    <input type="submit" value="Log In">
                    <a class="sign-up" href="../SignUp/SignUp.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>