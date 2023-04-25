<?php
include "../CD.php";
$conn = ConnectToDatabase();

$name = $_POST['name'];
$Id = $_POST['Id'];

$sql = "UPDATE `country` SET `country_name` = '".$name."' WHERE `country`.`id` = ".$Id;

SendingQuery($conn,$sql);

CloseConnection($conn);

header("Location: http://localhost/php/index.php",true,301);
exit();
?>