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

            <h1 id="formulario-titulo">Cadastro de Usuário</h1>

            <label>Nome de usuário:</label>
            <br>
            <input type="text" name="usuario" id="nome-de-usuario">
            <br>

            <label>Senha:</label>
            <br>
            <input type="password" name="senha" id="senha-do-usuario">
            <br>
            
            <label>Confirmar Senha:</label>
            <br>
            <input type="password" name="confirmacao-senha" id="confirmacao-senha">
            <br>

            <label>Funcionário:</label>
            <br>
            <input type="text" name="funcionario" id="funcionario">
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
        "Usuário:" => $_POST['usuario'],
        "Nome do Funcionário" => $_POST['funcionario']
    ];
    
    $senha = $_POST['senha'];
    $confirmacaoSenha = $_POST['confirmacao-senha'];

    if($senha == $confirmacaoSenha){
        echo "<div class='resultado'>";
        
        foreach ($dadosCadastro as $tipoDeDado => $dado){
            echo "<p><strong>$tipoDeDado: </strong> $dado</p>";
        }

        echo "</div>";
        echo "<br><br><br>";
    }
    else{
        echo "<div class='resultado'>";
        echo "As senhas são incompatíveis.";
        echo "</div>";
        echo "<br><br><br>";
    }
}
?>
