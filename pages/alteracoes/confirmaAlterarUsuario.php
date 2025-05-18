<?php
    include_once('../../config/conexao.php');

    $cod = $_POST['codigo'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$funcionario = $_POST['funcionario'];

        try{
            $stmt = $conn->prepare("UPDATE usuario SET nm_usuario = :usuario,       
                                                        senha = :senha,
                                                        funcionario = :funcionario
                                                        WHERE codigo = :id");

            $stmt->execute(array(":id" => $cod,
                                ":usuario" => $usuario,
                                ":senha" => $senha,
                                ":funcionario" => $funcionario));

            header("refresh:0,url='../consulta/usuario.php'");

            echo "<script>alert('CADASTRO ALTERADO COM SUCESSO');</script>";
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
?>