<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/media.query.css">
    <audio id="musica" src="../../assets/audio/hollow_knight_title_theme.mp3" autoplay loop></audio>
    <title>HOLLOWSHOP | Consulta</title>
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
                <option value="cliente.php">Cliente</option>
                <option value="funcionario.php">Funcionário</option>
                <option value="fornecedor.php">Fornecedor</option>
                <option value="produto.php">Produto</option>
                <option value="usuario.php">Usuário</option>
            </select>

            <a href="../../index.php" id="deslogar">Sair</a>

        </nav>
    </header>
    <div class="consulta">
    <?php
            $caminho = "../cadastro/dados/fornecedores.txt";
            if(file_exists($caminho))
            echo  nl2br(file_get_contents($caminho));
        ?>
    </div>
    <script src="../../scripts/script.js"></script>
    
</body>
</html>

<?php
    include_once('../../config/conexao.php');
    try{
        $select = $conn->prepare('SELECT * FROM fornecedor');
        $select->execute();

        while($row = $select->fetch()){
            echo "<p>";
            // echo "<br>"<img src=' ".$row['imagem']. " ' width=80px>";
            echo "<br><b>Código: </b>" . $row['codigo'];
            echo "<br><b>Nome: </b>" . $row['nome'];
            echo "<br><b>CNPJ: </b>" . $row['cnpj'];
            echo "<br><b>IE: </b>" . $row['ie'];
            echo "<br><b>CEP: </b>" . $row['cep'];
            echo "<br><b>UF: </b>" . $row['uf'];
            echo "<br><b>Cidade: </b>" . $row['cidade'];
            echo "<br><b>Bairro: </b>" . $row['bairro'];
            echo "<br><b>Rua: </b>" . $row['rua'];
            echo "<br><b>Numero: </b>" . $row['numero'];
            echo "<br><b>Celular: </b>" . $row ['celular'];
            echo "<br><b>Email: </b>" . $row ['email'];
            echo "<br><b>Vendedor: </b>" . $row ['vendedor'];
            echo "<br><br>";

            ?>
            <button onclick="window.location.href='../alteracoes/alterarFornecedor.php?id=<?php echo $row['codigo'];?>'">
                Alterar
            </button>
            <button onclick="window.location.href='../exclusoes/excluirFornecedor.php?id=<?php echo $row['codigo'];?>'">
                Excluir
            </button>
            <br><br>
            <hr>
    <?php
        }
    }
    catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }
?>