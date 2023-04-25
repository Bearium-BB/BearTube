<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form method="post" action="Create.php">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  <input type="submit" value="Create">
</form>

<form method="post" action="Delete.php">
  <label for="Id">Id:</label>
  <input type="number" name="Id" id="Id">
  <input type="submit" value="Delete">
</form>




<div>
  <form method="post" action="Edit.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <label for="Id">Id:</label>
    <input type="number" name="Id" id="Id">
    <input type="submit" value="Updata">
  </form>
</div>

</body>
</html>

<?php
include "../CD.php";
$conn = ConnectToDatabase();


$sql = "SELECT * FROM country";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["country_name"]. " " . "<br>";
  }
} else {
  echo "0 results";
}
?>
