<?php
include "../CD.php";
$conn = ConnectToDatabase();

$Email = htmlspecialchars($_POST['Email']);
$Password = htmlspecialchars($_POST['Password']);
$UserName = htmlspecialchars($_POST['UserName']);

$hash = password_hash($Password, PASSWORD_DEFAULT);

$sql = "INSERT INTO `user` (`Id`, `UserName`, `HashedPassword`, `Email`) VALUES (NULL, '".$UserName."', '".$hash."', '".$Email."')";

SendingQuery($conn,$sql);

CloseConnection($conn);

header("Location: /php/BearTube/Index.php",true,301);
exit();
?>
