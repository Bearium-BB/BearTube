<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/../Style/Index.css?ver=1.0">
    <link rel="stylesheet" href="/../Style/videos.css?ver=1.0">

</head>
<html>
  <body>	
  <?php include '/../Navbar.php'; ?>
      <?php
      include "/../CD.php";

        $conn = ConnectToDatabase();

        $sql = "SELECT * FROM video WHERE 1";
        $result = SendingQuery($conn,$sql);
        if ($result->num_rows > 0) {
            // Define the number of columns in the grid
            $numCols = 4;
            echo '<div class="Container">';
            while($row = $result->fetch_assoc()) {
                // Get the video ID, title and thumbnail path from the current row
                $videoId = $row['Id'];
                $title = $row['NameForTheVideo'];
                $Description = $row['Description'];
                $ImageType = $row['ImageType'];
                $VideoType = $row['VideoType'];


                $thumbUrl = '/../Videos/'.$videoId.'/Thumbnail.'.$ImageType;
                
                // Output the HTML for the current video
                echo '<div class="Card">';
                echo '<a href="play.php?id='.$videoId.'&VideoType='.$VideoType.'">';
                echo '<div class="CardImg" style="background-image: url(\'' . $thumbUrl . '\'); background-size: cover; background-position: center;"></div>';
                echo '<h3>'.$title.'</h3>';
                echo '<p>'.$Description.'</p>';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo 'No videos found.';
        }
      ?>
  </body>
</html>
