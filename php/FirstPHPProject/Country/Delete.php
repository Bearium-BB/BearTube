<?php
include "../CD.php";
$conn = ConnectToDatabase();

$Id = $_POST['Id'];

$sql = "DELETE FROM `country` WHERE `country`.`id` =".$Id;
SendingQuery($conn,$sql);

CloseConnection($conn);

header("Location: http://localhost/php/index.php",true,301);
exit();
?>