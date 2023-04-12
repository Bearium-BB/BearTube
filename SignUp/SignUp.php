<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../Style/SignUp.css?ver=1.0">
</head>
<html>
<body>	
<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/BearTube/Navbar.php'; ?>

    <div class="Container">
        <div class="Background-Card">
            <form method="post" action="Create.php">
                <div>
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email">    
                </div>
                <div class="password">
                    <label for="Password">Password</label>
                    <input type="password" name="Password" id="Password">  
                </div>

                <div>
                    <label for="UserName">UserName</label>
                    <input type="text" name="UserName" id="UserName">  
                </div>

                <div>
                    <input type="submit" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
</body>
</html>