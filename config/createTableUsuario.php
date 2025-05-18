<?php
$servername = "localhost";
// $servername = "localhost:3308";
$username = "root";
$password = "";
// $password = "twubc@94";
$dbname = "sistema";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "create table usuario(codigo int PRIMARY KEY AUTO_INCREMENT, 
            nm_usuario varchar(50) not null,
            senha varchar(20) not null,
            funcionario varchar(100) not null)";

    $conn->exec($sql);
    
    echo "Tabela Usuario criada com sucesso";

}    catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>