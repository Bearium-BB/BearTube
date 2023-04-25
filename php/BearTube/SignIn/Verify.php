<?php
include "../CD.php";
$conn = ConnectToDatabase();

$Email = $_POST['Email'];
$Password = $_POST['Password'];

$sql = 'SELECT * FROM `user` WHERE Email = "'.$Email.'";';

$result = SendingQuery($conn,$sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row["Email"] == $Email && password_verify($Password, $row["HashedPassword"])){
        session_start();
        $_SESSION['Username'] = htmlspecialchars($row["UserName"]);
        $_SESSION['Email'] = htmlspecialchars($row["Email"]);
        $_SESSION['Id'] = htmlspecialchars($row["Id"]);
        $_SESSION["loggedIn"] = true;
    }
  }
} else {
  echo "0 results";
}




CloseConnection($conn);

header("Location: /php/BearTube/Index.php",true,301);
exit();
?>
