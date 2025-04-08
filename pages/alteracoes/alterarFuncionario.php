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

        $select = $conn->prepare("SELECT * FROM funcionario where codigo=$cod");
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
        
        <form id="formulario-cadastro" action="confirmaAlterarFuncionario.php" method="POST">

            <h1 id="formulario-titulo">Alterar Cadastro de Funcionário</h1>

            <label>Código</label>
            <input type="text" name="codigo" value="<?php echo $row['codigo']; ?>" readonly="true">
            <label>Nome:</label>
            <br>
            <input required type="text" name="nome" id="nome" maxlength="100" value="<?php echo $row['nome']; ?>">
            <br>
            <label>CPF:</label>
            <br>
            <input required type="text" pattern="[0-9\-.]+" name="cpf" id="cpf" maxlength="11" placeholder="Apenas números" onchange="validaCPF()" value="<?php echo $row['cpf']; ?>">
            <br>
            <p id="consultaDeCPF"></p> 
            <br>
            
            <label>RG:</label>
            <br>
            <input required type="text" pattern="[0-9\-.]+" name="rg" id="rg" maxlength="9" placeholder="Apenas números" value="<?php echo $row['rg']; ?>">
            <br>

            <label>CEP:</label>
            <br>
            <input required type="text" pattern="[0-9\-]+" name="cep" id="cep" maxlength="9" placeholder="Apenas números" onchange="pegaEndereco()" value="<?php echo $row['cep']; ?>">
            <br>

            <label>Estado:</label>
            <br>
            <input required type="text" name="uf" id="uf" value="<?php echo $row['uf']; ?>">
            <br>

            <label>Cidade:</label>
            <br>
            <input required type="text" name="cidade" id="cidade" value="<?php echo $row['cidade']; ?>">
            <br>

            <label>Bairro:</label>
            <br>
            <input required type="text" name="bairro" id="bairro" value="<?php echo $row['bairro']; ?>">
            <br>

            <label>Rua:</label>
            <br>
            <input required type="text" name="rua" id="rua" value="<?php echo $row['bairro']; ?>">
            <br>

            <label>Nº:</label>
            <br>
            <input required type="text" name="numero-rua" id="numero-rua" value="<?php echo $row['numero']; ?>">
            <br>

            <label>Celular:</label>
            <br>
            <input required type="number" name="cel" id="cel" value="<?php echo $row['celular']; ?>">
            <br>

            <label>Email:</label>
            <br>
            <input required type="email" name="email" id="email" value="<?php echo $row['email']; ?>">
            <br>

            <label>Data de Admissão:</label>
            <br>
            <input required type="date" name="data-admissao" id="data-admissao" value="<?php echo $row['dataAdmissao']; ?>">
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
