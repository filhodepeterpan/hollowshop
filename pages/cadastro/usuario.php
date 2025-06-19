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
        
        <form id="formulario-cadastro" action="#" method="POST" enctype="multipart/form-data">

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

            <label class="form-label">Foto:</label>
            <br>
			<input type="file" accept="image/jpeg, image/png, image/gif, image/jpg, image/webp" class="form-control" name="img">

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
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$funcionario = $_POST['funcionario'];

    $imagem = $_FILES['img'];
    $dir = "img/usuario/";
    $extensao = strtolower(substr($imagem['name'], -4));
    $novo_nome = date("Y.m.d-H.i.s") . $extensao;

    move_uploaded_file($imagem['tmp_name'], $dir.$novo_nome);

    $caminhoIMG = $dir.$novo_nome;

	include_once('../../config/conexao.php');

	try {
	  
	  $stmt = $conn->prepare("INSERT INTO usuario (nm_usuario, senha, funcionario, imagem) VALUES (:nm_usuario, :senha, :funcionario, :imagem)");

	  $stmt->bindParam(':nm_usuario', $usuario);
	  $stmt->bindParam(':senha', $senha);
	  $stmt->bindParam(':funcionario', $funcionario);
	  $stmt->bindParam(':imagem', $caminhoIMG);
	  
	  $stmt->execute();

	  echo "<script>alert('Cadastrado com Sucesso');</script>";

	} catch(PDOException $e) {
	  echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>
