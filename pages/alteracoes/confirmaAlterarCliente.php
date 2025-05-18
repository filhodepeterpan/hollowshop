<?php
    include_once('../../config/conexao.php');

    $cod = $_POST['codigo'];
    $nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
	$numero = $_POST['numero'];
	$celular = $_POST['cel'];
	$email = $_POST['email'];

        try{
            $stmt = $conn->prepare("UPDATE cliente SET nome = :nome,       
                                                        cpf = :cpf,
                                                        rg = :rg,
                                                        cep = :cep,
                                                        numero = :numero,
                                                        email = :email,
                                                        cidade = :cidade,
                                                        uf = :uf,
                                                        rua = :rua,
                                                        bairro = :bairro,
                                                        celular = :celular
                                                        WHERE codigo = :id");

            $stmt->execute(array(":id" => $cod,
                                ":nome" => $nome,
                                ":cpf" => $cpf,
                                ":rg" => $rg,
                                ":cep" => $cep,
                                ":numero" => $cep,
                                ":email" => $email,
                                ":cidade" => $cidade,
                                ":uf" => $uf,
                                ":rua" => $rua,
                                ":bairro" => $bairro,
                                ":celular" => $celular));

            header("refresh:0,url='../consulta/cliente.php'");

            echo "<script>alert('CADASTRO ALTERADO COM SUCESSO');</script>";
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
?>