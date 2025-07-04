<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "create table usuario(codigo int PRIMARY KEY AUTO_INCREMENT,
            imagem varchar(255) not null, 
            nm_usuario varchar(50) not null,
            senha varchar(255) not null,
            funcionario varchar(100) not null)";

    $conn->exec($sql);
    
    echo "Tabela Usuario criada com sucesso";

}    catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>