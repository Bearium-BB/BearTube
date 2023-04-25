<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/../php/BearTube/Style/AccountManager.css?ver=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/../php/BearTube/JS/AccountManager.js?ver=1.0"defer></script>


</head>
<html>
    <body>	
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/BearTube/Navbar.php'; ?>
        <div class="Container">
            <div class="Col-1">
                <div class="Row Row-1">
                    <p class="btn" data-target="Page1">Account Info</P>
                </div>
                <div class="Row Row-2">
                    <p class="btn" data-target="Page2">Your Video </P>
                </div>
                <div class="Row Row-3">
                    <p class="btn">Password</P>
                </div>
            </div>
            <div class="Col-2">
                <div id="Page1" class="Page" data-target="Page1">
                    <div class="InnerContainer">
                        <a class="Logout" href="/php/BearTube/Logout/Logout.php">Logout</a>';
                    </div>
                </div>
                <div id="Page2" class="Page" data-target="Page1">
                    <?php
                            include "../CD.php";

                            $conn = ConnectToDatabase();

                            $sql = "SELECT * FROM video WHERE UserId=".$_SESSION['Id'];
                            $result = SendingQuery($conn,$sql);
                            if ($result->num_rows > 0) {
                                // Define the number of columns in the grid
                                $numCols = 4;
                                echo '<div class="ContainerVideos">';
                                while($row = $result->fetch_assoc()) {
                                    // Get the video ID, title and thumbnail path from the current row
                                    $videoId = $row['Id'];
                                    $title = $row['NameForTheVideo'];
                                    $Description = $row['Description'];
                                    $ImageType = $row['ImageType'];
                                    $VideoType = $row['VideoType'];


                                    $thumbUrl = '/../Videos/'.$videoId.'/Thumbnail.'.$ImageType;
                                    
                                    // Output the HTML for the current video
                                    echo '<div>';
                                    echo '<div class="Card">';
                                    echo '<a href="../videos/play.php?id='.$videoId.'&VideoType='.$VideoType.'">';
                                    echo '<div class="CardImg" style="background-image: url(\'' . $thumbUrl . '\'); background-size: cover; background-position: center;"></div>';
                                    echo '<h3>'.$title.'</h3>';
                                    echo '<p>'.$Description.'</p>';

                                    echo '</a>';
                                    
                                    echo '</div>';
                                    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
                                    echo '<input type="hidden" name="folder_id" value="'.$videoId.'">';
                                    echo '<input class="del" type="submit" name="delete_folder" value="Delete File">';
                                    echo '</form>';
                                    echo '</div>';


                                }

                                echo '</div>';
                            } else {
                                echo 'No videos found.';
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlspecialchars($_POST['folder_id']);
    if (isset($_POST['delete_folder'])) {
        $folder = 'C:/xampp/htdocs/Videos/'.$id;
        echo '<script>console.log("work");</script>';
        if (is_dir($folder)) {
            $files = glob($folder . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                } else {
                    deleteDirectory($file);
                }
            }
            rmdir($folder);
            $conn = ConnectToDatabase();

            $sql = "DELETE FROM video WHERE `video`.`Id` = $id";
            
            SendingQuery($conn,$sql);
        } else {
        }
    }

    
}

function deleteDirectory($dir) {
    if (is_dir($dir)) {
        $files = glob($dir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            } else {
                deleteDirectory($file);
            }
        }
        rmdir($dir);
    }
}
?>