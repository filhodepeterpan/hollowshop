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

    <?php 
        $cod = $_GET['id'];

        include_once('../../config/conexao.php');

        $select = $conn->prepare("SELECT * FROM produto where codigo=$cod");
        $select->execute();

        $row = $select->fetch();  
    ?>

    <?php include __DIR__ . '/../header.php'; ?>

    <div class="formulario">
        
        <form id="formulario-cadastro" action="confirmaAlterarProduto.php" method="POST">

            <h1 id="formulario-titulo">Alterar Cadastro de Produto</h1>

            <label>Código</label>
            <input type="text" name="codigo" value="<?php echo $row['codigo']; ?>" readonly="true">
            <label>Código do Produto:</label>
            <br>
            <input required type="text" name="codigoProduto" id="codigoProduto" value="<?php echo $row['codigoProduto']; ?>">
            <br>

            <label>Nome do Produto:</label>
            <br>
            <input required type="text" name="produto" id="produto" maxlength="150" value="<?php echo $row['produto']; ?>">
            <br>
            
            <label>Categoria:</label>
            <br>
            <input required type="text" name="categoria" id="categoria" maxlength="100" value="<?php echo $row['categoria']; ?>">
            <br>

            <label>Descrição:</label>
            <br>
            <textarea name="descricao" id="descricao" maxlength="300"><?php echo $row['descricao']; ?></textarea>
            <br>

            <label>Preço de Compra:</label>
            <br>
            <input required type="text" pattern="[0-9.,R$ ]+" name="preco" id="precoCompra" value="<?php echo $row['preco']; ?>">
            <br> 

            <label>Quantidade:</label>
            <br>
            <input required type="number" name="quantidade" id="quantidadeProduto" value="<?php echo $row['quantidade']; ?>">
            <br>

            <label>Data de Compra:</label>
            <br>
            <input required type="date" name="data-compra" id="data-compra" value="<?php echo $row['dataCompra']; ?>">
            <br>

            <label>Data de Validade:</label>
            <br>
            <input required type="date" name="data-validade" id="data-validade" value="<?php echo $row['dataValidade']; ?>">
            <br>

            <label>Fornecedor:</label>
            <br>
            <input required type="text" name="fornecedor" id="fornecedor" maxlength="100" value="<?php echo $row['fornecedor']; ?>">
            <br>

            <div class="formulario-botoes">
                <button type="submit" id="botaoCadastro">Salvar</button>
                <button type="button" id="botaoLimpar" onclick="limpaFormulario()">Limpar</button>
            </div>

        </form>
    </div>

    <script src="../../scripts/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</body>
</html>