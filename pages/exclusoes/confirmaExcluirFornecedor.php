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

	try 
	{
		   
		$delete = $conn->prepare("DELETE FROM fornecedor WHERE codigo=$cod");
		$delete->execute();
		echo "<h1>Fornecedor excluido com sucesso</h1>";
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}
	
 ?>
<button onclick="window.location.href='../consulta/fornecedor.php'">Voltar</button>
</div>