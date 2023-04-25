<?php
function ConnectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "university";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function SendingQuery(mysqli $conn, $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Successfully";
        $result = $conn->query($sql);
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      return $result;
}

function CloseConnection(mysqli $conn) {
    $conn->close();
}

?>