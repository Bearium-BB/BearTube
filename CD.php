<?php
function ConnectToDatabase() {
    $servername = "10.16.7.36";
    $username = "test";
    $password = "";
    $dbname = "beartube";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function SendingQuery(mysqli $conn, $sql) {
    $result = $conn->query($sql);
    return $result;
}

function CloseConnection(mysqli $conn) {
    $conn->close();
}
?>