<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/media.query.css">
    <audio id="musica" src="../../assets/audio/hollow_knight_title_theme.mp3" autoplay loop></audio>
    <title>HOLLOWSHOP | Cadastro</title>
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <div class="formulario">
        
        <form id="formulario-cadastro" action="#" method="POST">

            <h1 id="formulario-titulo">Cadastro de Usuário</h1>

            <label>Nome de usuário:</label>
            <br>
            <input required type="text" name="usuario" id="nome-de-usuario">
            <br>

            <label>Senha:</label>
            <br>
            <input required type="password" name="senha" id="senha-do-usuario">
            <br>
            
            <label>Confirmar Senha:</label>
            <br>
            <input required type="password" name="confirmacao-senha" id="confirmacao-senha">
            <br>

            <label>Funcionário:</label>
            <br>
            <input required type="text" name="funcionario" id="funcionario">
            <br>

            <div class="formulario-botoes">
                <button type="submit" id="botaoCadastro">Cadastrar</button>
                <button type="button" id="botaoLimpar" onclick="limpaFormulario()">Limpar</button>
            </div>

        </form>
    </div>

    <script src="../../scripts/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</body>
</html>

<?php
if(!empty($_POST))
{
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$funcionario = $_POST['funcionario'];

	include_once('../../config/conexao.php');

	try {
/*
		
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = 'img/cliente/'; //Diretório para uploads
 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

    $enderecoImagem = $dir.$new_name;
*/	  
	  
	  $stmt = $conn->prepare("INSERT INTO usuario (nm_usuario, senha, funcionario) VALUES (:nm_usuario, :senha, :funcionario)");

	  $stmt->bindParam(':nm_usuario', $usuario);
	  $stmt->bindParam(':senha', $senha);
	  $stmt->bindParam(':funcionario', $funcionario);
	  //$stmt->bindParam(':imagem', $enderecoImagem);
	  
	  $stmt->execute();

	  

	  echo "<script>alert('Cadastrado com Sucesso');</script>";

	} catch(PDOException $e) {
	  echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>
