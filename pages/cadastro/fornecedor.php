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

            <h1 id="formulario-titulo">Cadastro de Fornecedor</h1>

            <label>Nome:</label>
            <br>
            <input required type="text" name="nome" id="nome" maxlength="100">
            <br>

            <label>CNPJ:</label>
            <br>
            <input required type="text" pattern="[0-9\-.]+" name="cnpj" id="cnpj" maxlength="14" placeholder="Apenas números" onchange="validaCNPJ()">
            <br>
            <p id="consultaDeCNPJ"></p> 
            <br>
            
            <label>I.E:</label>
            <br>
            <input required type="text" pattern="[0-9\-.]+" name="ie" id="ie" maxlength="12" placeholder="Apenas números">
            <br>

            <label>CEP:</label>
            <br>
            <input required type="text" pattern="[0-9\-]+" name="cep" id="cep" maxlength="9" placeholder="Apenas números" onchange="pegaEndereco()">
            <br>

            <label>Estado:</label>
            <br>
            <input required type="text" name="uf" id="uf">
            <br>

            <label>Cidade:</label>
            <br>
            <input required type="text" name="cidade" id="cidade">
            <br>

            <label>Bairro:</label>
            <br>
            <input required type="text" name="bairro" id="bairro">
            <br>

            <label>Rua:</label>
            <br>
            <input required type="text" name="rua" id="rua">
            <br>

            <label>Nº:</label>
            <br>
            <input required type="text" name="numero-rua" id="numero-rua">
            <br>

            <label>Celular:</label>
            <br>
            <input required type="number" name="cel" id="cel">
            <br>

            <label>Email:</label>
            <br>
            <input required type="email" name="email" id="email">
            <br>

            <label>Vendedor:</label>
            <br>
            <input required type="text" name="vendedor" id="vendedor" maxlength="100">
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
            "Nome" => $_POST['nome'],
            "CNPJ" => $_POST['cnpj'],
            "I.E" => $_POST['ie'],
            "CEP" => $_POST['cep'],
            "Estado" => $_POST['uf'],
            "Cidade" => $_POST['cidade'],
            "Bairro" => $_POST['bairro'],
            "Rua" => $_POST['rua'],
            "Número" => $_POST['numero-rua'],
            "Cel" => $_POST['cel'],
            "Email" => $_POST['email'],
            "Vendedor" => $_POST["vendedor"]
        ];
        
        echo "<div class='resultado'>";
        
        foreach ($dadosCadastro as $tipoDeDado => $dado){
            echo "<p><strong>$tipoDeDado: </strong> $dado</p>";
        }

        echo "</div>";
        echo "<br><br><br>";

        $conteudo = "Fornecedor: ";

        foreach ($dadosCadastro as $tipoDeDado => $dado){
            $conteudo .= $dado.", ";
        }

        $conteudo .= "\n\n";

        $caminho = "dados/fornecedores.txt";

        if (file_put_contents($caminho, $conteudo, FILE_APPEND)){
            echo "<script>alert('Dados cadastrados com sucesso!');</script>";
        }
        else{
            echo "<script>alert('Erro ao cadastrar.');</script>";
        }
    }
?>
