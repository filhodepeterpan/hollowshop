<?php
    include_once('../../config/conexao.php');

    $cod = $_POST['codigo'];
	$nome = $_POST['nome'];
	$cnpj = $_POST['cnpj'];
	$ie = $_POST['ie'];
	$cep = $_POST['cep'];
    $uf = $_POST['uf'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
	$numero = $_POST['numero-rua'];
	$celular = $_POST['cel'];
	$email = $_POST['email'];
    $vendedor = $_POST['vendedor'];

        try{
            $stmt = $conn->prepare("UPDATE fornecedor SET nome = :nome,       
                                                        cnpj = :cnpj,
                                                        ie = :ie,
                                                        cep = :cep,
                                                        numero = :numero,
                                                        email = :email,
                                                        cidade = :cidade,
                                                        uf = :uf,
                                                        rua = :rua,
                                                        bairro = :bairro,
                                                        celular = :celular,
                                                        vendedor = :vendedor
                                                        WHERE codigo = :id");

            $stmt->execute(array(":id" => $cod,
                                ":nome" => $nome,
                                ":cnpj" => $cnpj,
                                ":ie" => $ie,
                                ":cep" => $cep,
                                ":numero" => $cep,
                                ":email" => $email,
                                ":cidade" => $cidade,
                                ":uf" => $uf,
                                ":rua" => $rua,
                                ":bairro" => $bairro,
                                ":celular" => $celular,
                                ":vendedor" => $vendedor));

            header("refresh:0,url='../consulta/fornecedor.php'");

            echo "<script>alert('CADASTRO ALTERADO COM SUCESSO');</script>";
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
?>