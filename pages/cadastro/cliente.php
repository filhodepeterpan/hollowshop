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

            <h1 id="formulario-titulo">Cadastro de Cliente</h1>

            <label>Nome:</label>
            <br>
            <input required type="text" name="nome" id="nome" maxlength="100">
            <br>

            <label>CPF:</label>
            <br>
            <input required type="text" pattern="[0-9\-.]+" name="cpf" id="cpf" maxlength="11" placeholder="Apenas números" onchange="validaCPF()">
            <br>
            <p id="consultaDeCPF"></p> 
            <br>

            <label>RG:</label>
            <br>
            <input required type="text" pattern="[0-9\-.]+" name="rg" id="rg" maxlength="9" placeholder="Apenas números">
            <br>

            <label>CEP:</label>
            <br>
            <input required type="text" pattern="[0-9\-]+" name="cep" id="cep" maxlength="9" placeholder="Apenas números" onchange="pegaEndereco()">
            <br>

            <label>Estado:</label>
            <br>
            <input required type="text" name="uf" id="uf">
            <br>

            <label>Cidade:</label>
            <br>
            <input required type="text" name="cidade" id="cidade">
            <br>

            <label>Bairro:</label>
            <br>
            <input required type="text" name="bairro" id="bairro">
            <br>

            <label>Rua:</label>
            <br>
            <input required type="text" name="rua" id="rua">
            <br>

            <label>Nº:</label>
            <br>
            <input required type="text" name="numero" id="numero">
            <br>

            <label>Celular:</label>
            <br>
            <input required type="number" name="cel" id="cel">
            <br>

            <label>Email:</label>
            <br>
            <input required type="email" name="email" id="email">
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

	include_once('../../config/conexao.php');

	try {
/*
		$ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = 'img/cliente/'; //Diretório para uploads
 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

    $enderecoImagem = $dir.$new_name;
*/	  
	  
	  $stmt = $conn->prepare("INSERT INTO cliente (nome,cpf,rg,cep,cidade,numero,celular,email,uf,rua,bairro) VALUES (:nome,:cpf,:rg,:cep,:cidade,:numero,:celular,:email,:uf,:rua,:bairro)");

	  $stmt->bindParam(':nome', $nome);
	  $stmt->bindParam(':cpf', $cpf);
	  $stmt->bindParam(':rg', $rg);
      $stmt->bindParam(':cep', $cep);
      $stmt->bindParam(':cidade', $cidade);
	  $stmt->bindParam(':numero', $numero);
	  $stmt->bindParam(':celular', $celular);
	  $stmt->bindParam(':email', $email);
      $stmt->bindParam(':uf', $uf);
      $stmt->bindParam(':rua', $rua);
      $stmt->bindParam(':bairro', $bairro);
	  //$stmt->bindParam(':imagem', $enderecoImagem);
	  
	  $stmt->execute();

	  echo "<script>alert('Cadastrado com Sucesso');</script>";

	} catch(PDOException $e) {
	  echo "Erro ao cadastrar: " . $e->getMessage();
	}
	$conn = null;
}
?>
