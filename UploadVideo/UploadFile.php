<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Style/UploadFile.css">
</head>
<body>
    <?php include '../Navbar.php'; ?>
	<div class="Container">
		<div class="Background-Card">
            <?php
            if (isset($_SESSION['loggedIn'])) {
                echo '
                <form action="Create.php" method="post" enctype="multipart/form-data">

                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">    
                    </div>
                    <div>
                        <label for="video">Video</label>
                        <input type="file" name="video" id="video">    
                    </div>
                    <div>
                        <label for="NameForTheVideo">Name For The Video</label>
                        <input type="text" name="NameForTheVideo" id="NameForTheVideo" required>    
                    </div>
                    <div>
                        <label for="Description">Description</label>
                        <input type="text" name="Description" id="Description" required>  
                    </div>

                    <div>
                        <input type="submit" value="Upload">
                    </div>
            </form>';
            } else {
                header("Location: /../Index.php",true,301);
            }
            ?>
        </div>
    </div>
</body>
</html>