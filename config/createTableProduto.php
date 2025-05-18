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

    $sql = "create table produto(codigo int PRIMARY KEY AUTO_INCREMENT,
            codigoProduto varchar(50) not null,
            produto varchar(100) not null,
            categoria varchar(30) not null,
            descricao varchar(100) not null,
            preco varchar(4) not null,
            quantidade varchar(255) not null,
            dataCompra varchar(10) not null,
            dataValidade varchar(10) not null,
            fornecedor varchar(100) not null)";

    $conn->exec($sql);
    
    echo "Tabela Produto criada com sucesso";

}    catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>