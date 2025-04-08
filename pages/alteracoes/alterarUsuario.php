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

        $select = $conn->prepare("SELECT * FROM usuario where codigo=$cod");
        $select->execute();

        $row = $select->fetch();  
    ?>

    <header class="cabecalho">
        <div class="logo">
            <h1 id="hollowshop-form">HOLLOWSHOP</h1>
        </div>
        <nav>

            <select name="cadastro" id="cadastro">
                <option value="">Cadastro</option>
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

    <div class="formulario">
        
        <form id="formulario-cadastro" action="confirmaAlterarUsuario.php" method="POST">

            <h1 id="formulario-titulo">Alterar Cadastro de Usuário</h1>

            <label>Código</label>
            <input type="text" name="codigo" value="<?php echo $row['codigo']; ?>" readonly="true">
            <label>Nome de usuário:</label>
            <br>
            <input required type="text" name="usuario" id="nome-de-usuario" value="<?php echo $row['nm_usuario']; ?>">
            <br>

            <label>Senha:</label>
            <br>
            <input required type="password" name="senha" id="senha-do-usuario" value="<?php echo $row['senha']; ?>">
            <br>
            
            <label>Confirmar Senha:</label>
            <br>
            <input required type="password" name="confirmacao-senha" id="confirmacao-senha">
            <br>

            <label>Funcionário:</label>
            <br>
            <input required type="text" name="funcionario" id="funcionario" value="<?php echo $row['funcionario']; ?>">
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