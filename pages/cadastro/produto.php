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
    <header class="cabecalho">
        <div class="logo">
            <h1 id="hollowshop-form">HOLLOWSHOP</h1>
        </div>
        <nav>

            <select name="cadastro" id="cadastro">
                <option value="">Cadastro</option>
                <option value="cliente.php">Cliente</option>
                <option value="funcionario.php">Funcionário</option>
                <option value="fornecedor.php">Fornecedor</option>
                <option value="produto.php">Produto</option>
                <option value="usuario.php">Usuário</option>
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

    <div class="formulario">
        
        <form id="formulario-cadastro" action="#" method="POST">

            <h1 id="formulario-titulo">Cadastro de Produto</h1>

            <label>Código do Produto:</label>
            <br>
            <input type="text" name="codigo" id="codigo-produto">
            <br>

            <label>Nome do Produto:</label>
            <br>
            <input type="text" name="nome" id="nome-produto" maxlength="150">
            <br>
            
            <label>Categoria:</label>
            <br>
            <input type="text" name="cateogria" id="categoria-produto" maxlength="100">
            <br>

            <label>Descrição:</label>
            <br>
            <textarea name="descricao" id="descricao" maxlength="300"></textarea>
            <br>

            <label>Preço de Compra:</label>
            <br>
            <input type="text" pattern="[0-9.,R$ ]+" name="preco" id="precoCompra">
            <br> 

            <label>Quantidade:</label>
            <br>
            <input type="number" name="quantidade" id="quantidadeProduto">
            <br>

            <label>Data de Compra:</label>
            <br>
            <input type="date" name="data-compra" id="data-compra">
            <br>

            <label>Data de Validade:</label>
            <br>
            <input type="date" name="data-validade" id="data-validade">
            <br>

            <label>Fornecedor:</label>
            <br>
            <input type="text" name="fornecedor" id="fornecedor" maxlength="100">
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
if ($_POST) {
    $dadosCadastro = [
        "Código do Produto" => $_POST['codigo'],
        "Nome do Produto" => $_POST['nome'],
        "Categoria" => $_POST['cateogria'],
        "Descrição" => $_POST['descricao'],
        "Preço de Compra" => $_POST['preco'],
        "Quantidade" => $_POST['quantidade'],
        "Data de Compra" => $_POST['data-compra'],
        "Data de Validade" => $_POST['data-validade'],
        "Fornecedor" => $_POST['fornecedor']
    ];
    
    echo "<div class='resultado'>";
    
    foreach ($dadosCadastro as $tipoDeDado => $dado){
        echo "<p><strong>$tipoDeDado: </strong> $dado</p>";
    }

    echo "</div>";
    echo "<br><br><br>";
}
?>
