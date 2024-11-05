<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/media.query.css">
    <audio id="musica" src="./assets/audio/hollow_knight_title_theme.mp3" autoplay loop></audio>
    <title>HOLLOWSHOP | Login</title>
</head>
<body>

    <div class="tela">

        <form class="tela-login" action="./pages/menu.php" method="POST">

            <h1 id="tela-login-titulo">Entre agora na Hollowshop!</h1>

            <div class="tela-login-inputs">
                <label>Email</label>
                <input type="email" name="email" id="email">
                <label>Senha:</label>
                <input type="password" name="senha" id="senha">
            </div>
            
            <div class="tela-login-botoes">
                <button name="sair" id="sair">Sair</button>
                <button type="submit" name="entrar" id="entrar">Entrar</button>
            </div>

        </form>

    </div>

    <script src="./scripts/script.js"></script>
    
</body>
</html>

<?php
    if($_POST){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $emailPadrao = "admin@admin";
        $senhaPadrao = "admin";

        if($email == $emailPadrao || $senha == $senhaPadrao){
            echo $email . "<br>" . $senha;
        }
    }
?>