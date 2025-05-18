<?php
$servername = "localhost";
// $servername = "localhost:3308";
$username = "root";
$password = "";
// $password = "twubc@94";


try {
    $conn = new PDO("mysql:host=$servername;dbname=sistema", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>