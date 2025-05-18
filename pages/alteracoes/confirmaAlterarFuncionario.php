<?php
    include_once('../../config/conexao.php');

    $cod = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $cep = $_POST['cep'];
    $uf = $_POST['uf'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $numero = $_POST['numero-rua'];
    $celular = $_POST['cel'];
    $email = $_POST['email'];
    $dataAdmissao = $_POST['data-admissao'];

        try{
            $stmt = $conn->prepare("UPDATE funcionario SET nome = :nome,       
                                                        cpf = :cpf,
                                                        rg = :rg,
                                                        cep = :cep,
                                                        numero = :numero,
                                                        email = :email,
                                                        cidade = :cidade,
                                                        uf = :uf,
                                                        rua = :rua,
                                                        bairro = :bairro,
                                                        celular = :celular,
                                                        dataAdmissao = :dataAdmissao
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
                                ":celular" => $celular,
                                ":dataAdmissao" => $dataAdmissao));

            header("refresh:0,url='../consulta/funcionario.php'");

            echo "<script>alert('CADASTRO ALTERADO COM SUCESSO');</script>";
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
?>