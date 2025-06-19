<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "create table cliente(codigo int PRIMARY KEY AUTO_INCREMENT,
            nome varchar(50) not null,
            cpf varchar(20) not null,
            rg varchar(20) not null,
            cep varchar(20) not null,
            uf char (2) not null,
            bairro varchar (200) not null,
            rua varchar(200) not null,
            numero varchar(10) not null,
            celular varchar(20) not null,
            cidade varchar(20) not null,
            email varchar(40) not null,
            imagem varchar(255) not null)";

    $conn->exec($sql);
    
    echo "Tabela Cliente criada com sucesso";

}    catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>