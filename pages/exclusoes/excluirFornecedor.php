<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/media.query.css">
    <audio id="musica" src="../../assets/audio/hollow_knight_title_theme.mp3" autoplay loop></audio>
    <title>HOLLOWSHOP | Excluir</title>
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <script src="../../scripts/script.js"></script>
    
</body>
</html>

<?php

	$cod = $_GET['id'];
	
    include_once('../../config/conexao.php');

    echo "<div class='consulta'>";

    echo "<br>";

    echo"<h1>Excluir Fornecedor</h1>";
	 
		$select = $conn->prepare("SELECT * FROM fornecedor where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
			echo "<p>";
			echo "<br><b>Codigo: </b>".$row['codigo'];
			echo "<br><b>Nome: </b>".$row['nome'];
			echo "<br><b>CNPJ: </b>".$row['cnpj'];
			echo "<br><b>I.E: </b>".$row['ie'];
			echo "<br><b>CEP: </b>".$row['cep'];
			echo "<br><b>Estado: </b>".$row['uf'];
			echo "<br><b>Bairro: </b>".$row['bairro'];
			echo "<br><b>Cidade: </b>".$row['cidade'];
			echo "<br><b>Rua: </b>".$row['rua'];
			echo "<br><b>Numero: </b>".$row['numero'];
			echo "<br><b>Celular: </b>".$row['celular'];
			echo "<br><b>Email: </b>".$row['email'];
            echo "<br><b>Vemdedor: </b>".$row['vendedor'];	
			echo "</p>";
?>
	<br>
	<button onclick="window.location.href='confirmaExcluirFornecedor.php?id=<?php echo $row['codigo'];?>'">
		Excluir
	</button>
	
	<button onclick="window.location.href='../consulta/fornecedor.php'">Voltar</button>

<?php
		}
        echo "</div>";
?>