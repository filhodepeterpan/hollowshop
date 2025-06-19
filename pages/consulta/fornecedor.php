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
    <?php include __DIR__ . '/../header.php'; ?>
    <script src="../../scripts/script.js"></script>
    
</body>
</html>

<?php
    include_once('../../config/conexao.php');

    echo "<div class='consulta'>";

    try{
        $select = $conn->prepare('SELECT * FROM fornecedor');
        $select->execute();

        while($row = $select->fetch()){
            echo "<p>";
            echo "<img src='../cadastro/".$row['imagem']."' width='150px' style='border-radius: 20px; margin: 1rem 0;'";
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
            <button onclick="window.location.href='../menu.php'">Voltar</button>
            <br><br>
            <hr>
    <?php
        }
    }
    catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }

    echo "</div>";
?>