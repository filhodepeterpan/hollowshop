<?php
    include_once('../../config/conexao.php');

    $cod = $_POST['codigo'];
    $codigoProduto = $_POST['codigoProduto'];
    $produto = $_POST['produto'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $dataCompra = $_POST['data-compra'];
    $dataValidade = $_POST['data-validade'];
    $fornecedor = $_POST['fornecedor'];

        try{
            $stmt = $conn->prepare("UPDATE produto SET produto = :produto,       
                                                        codigoProduto = :codigoProduto,
                                                        categoria = :categoria,
                                                        descricao = :descricao,
                                                        preco = :preco,
                                                        quantidade = :quantidade,
                                                        dataCompra = :dataCompra,
                                                        dataValidade = :dataValidade,
                                                        fornecedor = :fornecedor
                                                        WHERE codigo = :id");

            $stmt->execute(array(":id" => $cod,
                                ":produto" => $produto,
                                ":codigoProduto" => $codigoProduto,
                                ":categoria" => $categoria,
                                ":descricao" => $descricao,
                                ":preco" => $preco,
                                ":quantidade" => $quantidade,
                                ":dataCompra" => $dataCompra,
                                ":dataValidade" => $dataValidade,
                                ":fornecedor" => $fornecedor));

            header("refresh:0,url='../consulta/produto.php'");

            echo "<script>alert('CADASTRO ALTERADO COM SUCESSO');</script>";
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
?>