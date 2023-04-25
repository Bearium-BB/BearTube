<?php
include "../CD.php";

$conn = ConnectToDatabase();

$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'beartube' AND TABLE_NAME = 'video';";
$videoId;
$result = SendingQuery($conn,$sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $dir = "C:/xampp/htdocs/Videos/".$row["AUTO_INCREMENT"];
    $videoId = $row["AUTO_INCREMENT"];
    if(!is_dir($dir)) {
        mkdir($dir);
        echo "Directory created successfully.";
      } else {
        echo "Directory already exists.";
      }
      
  }
}


$SqlVideoFileType;
$SqlImageFileType;

$target_dir = "C:/xampp/htdocs/Videos/".$videoId . "/";
if(isset($_FILES["video"])) {
  $original_name = $_FILES["video"]["name"];
  $new_name = "Video." . strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
  $target_file = $target_dir . $new_name;
  $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $SqlVideoFileType = $videoFileType;
  // Check if file is a video file
  if($videoFileType == "mp4" ||  $videoFileType == "mov") {
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["video"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "File is not a video file.";
  }
}


if(isset($_FILES["image"])) {
    $original_name = $_FILES["image"]["name"];
    $new_name = "Thumbnail." . strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    $target_file = $target_dir . $new_name;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $SqlImageFileType =  $imageFileType;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    } else {
      echo "File is not an image.";
    }
  }
  
$NameForTheVideo = htmlspecialchars($_POST['NameForTheVideo']);
$Description =  mysqli_real_escape_string($conn, htmlspecialchars($_POST["Description"]));

session_start();

$sql = "INSERT INTO `video` (`Id`, `NameForTheVideo`, `Description`, `UserId`, `ImageType`, `VideoType`) VALUES (NULL, '".$NameForTheVideo."', '".$Description."', '".$_SESSION['Id']."', '".$SqlImageFileType."', '".$SqlVideoFileType."');";

SendingQuery($conn,$sql);

echo "<br>".$sql;
CloseConnection($conn);
exit();
?>
