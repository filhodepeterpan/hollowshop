<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/media.query.css">
    <audio id="musica" src="../assets/audio/hollow_knight_title_theme.mp3" autoplay loop></audio>
    <title>HOLLOWSHOP</title>
</head>
<body>
    <header class="cabecalho">
        <div class="logo">
            <h1 id="hollowshop-menu">HOLLOWSHOP</h1>
        </div>
        <nav>

            <select name="cadastro" id="cadastro">
                <option selected value="">Cadastro</option>
                <option value="./cadastro/cliente.php">Cliente</option>
                <option value="./cadastro/funcionario.php">Funcionário</option>
                <option value="./cadastro/fornecedor.php">Fornecedor</option>
                <option value="./cadastro/produto.php">Produto</option>
                <option value="./cadastro/usuario.php">Usuário</option>
            </select>

            <select name="consulta" id="consulta">
                <option selected value="">Consulta</option>
                <option value="./consulta/cliente.php">Cliente</option>
                <option value="./consulta/funcionario.php">Funcionário</option>
                <option value="./consulta/fornecedor.php">Fornecedor</option>
                <option value="./consulta/produto.php">Produto</option>
                <option value="./consulta/usuario.php">Usuário</option>
            </select>

            <a href="../index.php" id="deslogar">Sair</a>

        </nav>
    </header>

    <div class="menu-conteudo">

        <div class="menu-conteudo-esquerdo">
            <h1>Cadastre os NPCS e itens de sua preferência no mundo de Hollow Knight!</h1>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam iste nostrum, consectetur doloremque soluta veritatis aliquid perspiciatis sed, nam hic porro ducimus! Libero culpa tempore nostrum cupiditate sed laborum aspernatur.
            Voluptatum placeat inventore quos enim quia veniam mollitia laudantium laboriosam fuga temporibus pariatur accusantium corporis doloribus incidunt, eveniet illo recusandae necessitatibus, veritatis delectus? Delectus aut laboriosam, impedit eos quas reiciendis!
            Eligendi ducimus necessitatibus dolorem quis, magni officiis hic ut quos fuga numquam rem asperiores sequi delectus! Nesciunt consequatur molestiae deserunt ex eligendi cumque veniam ut, unde aspernatur ea ducimus? Quae!</p>
        </div>

        <div class="menu-conteudo-direito">
            <img src="../assets/img/menu-image.png" alt="Hollow Knight" title="Hollow Knight">
        </div>

    </div>

    <script src="../scripts/script.js"></script>
    
</body>
</html>

<?php
    if($_POST){
      
    }
?>