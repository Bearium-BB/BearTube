<?php
include "../CD.php";
$conn = ConnectToDatabase();

$name = $_POST['name'];

$sql = "INSERT INTO `country` (`id`, `country_name`) VALUES (NULL, '".$name."')";

SendingQuery($conn,$sql);

CloseConnection($conn);

header("Location: http://localhost/php/index.php",true,301);
exit();
?>