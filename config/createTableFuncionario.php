<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "create table funcionario(codigo int PRIMARY KEY AUTO_INCREMENT,
            imagem varchar(255) not null,
            nome varchar(50) not null,
            cpf varchar(23) not null,
            rg varchar(25) not null,
            cep varchar(20) not null,
            uf char(2) not null,
            cidade varchar(21) not null,
            bairro varchar(100) not null,
            rua varchar(50) not null,
            numero varchar(10) not null,
            celular varchar(15) not null,
            email varchar(40) not null,
            dataAdmissao varchar(10) not null)";

    $conn->exec($sql);
    
    echo "Tabela Funcionario criada com sucesso";

}    catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>