<?php
$servername = "localhost";
// $servername = "localhost:3308";
$username = "root";
$password = "";
// $password = "twubc@94";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE sistema";

    $conn->exec($sql);

    echo "Banco de Dados criado com sucesso<br>";
}   catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>