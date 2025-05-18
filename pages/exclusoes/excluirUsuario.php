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

    echo"<h1>Excluir usuário</h1>";
	 
		$select = $conn->prepare("SELECT * FROM usuario where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
			echo "<p>";
			echo "<br><b>Codigo: </b>".$row['codigo'];
            echo "<br><b>Nome do Usuário: </b>".$row['nm_usuario'];
			echo "</p>";
?>
	<br>
	<button onclick="window.location.href='confirmaExcluirUsuario.php?id=<?php echo $row['codigo'];?>'">
		Excluir
	</button>
	
	<button onclick="window.location.href='../consulta/usuario.php'">Voltar</button>

<?php
		}
        echo "</div>";
?>
