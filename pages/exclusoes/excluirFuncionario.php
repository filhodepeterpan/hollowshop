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
    <header class="cabecalho">
        <div class="logo">
            <h1 id="hollowshop-form">HOLLOWSHOP</h1>
        </div>
        <nav>

            <select name="cadastro" id="cadastro">
                <option selected value="">Cadastro</option>
                <option value="../cadastro/cliente.php">Cliente</option>
                <option value="../cadastro/funcionario.php">Funcionário</option>
                <option value="../cadastro/fornecedor.php">Fornecedor</option>
                <option value="../cadastro/produto.php">Produto</option>
                <option value="../cadastro/usuario.php">Usuário</option>
            </select>

            <select name="consulta" id="consulta">
                <option selected value="">Consulta</option>
                <option value="../consulta/cliente.php">Cliente</option>
                <option value="../consulta/funcionario.php">Funcionário</option>
                <option value="../consulta/fornecedor.php">Fornecedor</option>
                <option value="../consulta/produto.php">Produto</option>
                <option value="../consulta/usuario.php">Usuário</option>
            </select>
            <a href="../../index.php" id="deslogar">Sair</a>

        </nav>
    </header>
    <script src="../../scripts/script.js"></script>
    
</body>
</html>

<?php

	$cod = $_GET['id'];
	
	include_once('../../config/conexao.php');

	echo "<div class='consulta'>";

	echo "<br>";

	echo"<h1>Excluir Funcionário</h1>";

	 
		$select = $conn->prepare("SELECT * FROM funcionario where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
			echo "<p>";
			echo "<br><b>Codigo: </b>".$row['codigo'];
			echo "<br><b>Nome: </b>".$row['nome'];
			echo "<br><b>CPF: </b>".$row['cpf'];
			echo "<br><b>RG: </b>".$row['rg'];
			echo "<br><b>CEP: </b>".$row['cep'];
			echo "<br><b>Estado: </b>".$row['uf'];
			echo "<br><b>Bairro: </b>".$row['bairro'];
			echo "<br><b>Cidade: </b>".$row['cidade'];
			echo "<br><b>Rua: </b>".$row['rua'];
			echo "<br><b>Numero: </b>".$row['numero'];
			echo "<br><b>Celular: </b>".$row['celular'];
			echo "<br><b>Email: </b>".$row['email'];
            echo "<br><b>Data de Admissão: </b>".$row['dataAdmissao'];		
			echo "</p>";
?>
	<br>
	<button onclick="window.location.href='confirmaExcluirFuncionario.php?id=<?php echo $row['codigo'];?>'">
		Excluir
	</button>
	
	<button onclick="window.location.href='../consulta/funcionario.php'">Voltar</button>

<?php
		}

		echo "</div>";
?>