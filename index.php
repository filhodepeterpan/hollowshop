<?php 
    session_start();

    if(($_SESSION['login']))
    {
        header("Location: pages/menu.php");
        exit;
    }

    if (isset($_SESSION['erro'])) {
        echo "<script>alert('{$_SESSION['erro']}');</script>";
        unset($_SESSION['erro']);
    }

    if (!empty($_POST))
    {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        include_once('config/conexao.php');

        $rs = $conn->query("SELECT * FROM usuario where nm_usuario='$usuario' and senha='$senha'");

        $rs -> execute();

        if($rs->fetch(PDO::FETCH_ASSOC) == true)
        {
            $_SESSION['login'] = $usuario;
            header('Location:pages/menu.php');
        }
        else{
            echo "
                <script>
                    alert('Nome de usuário ou senha incorretos');
                </script>
            ";
        }
    }
?>
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

        <form class="tela-login" action="index.php" method="POST">

            <h1 id="tela-login-titulo">Entre agora na Hollowshop!</h1>

            <div class="tela-login-inputs">
                <label>Usuário</label>
                <input type="text" name="usuario" id="usuario">
                <label>Senha</label>
                <input type="password" name="senha" id="senha">
            </div>
            
            <div class="tela-login-botoes">
                <button type="submit" name="entrar" id="entrar">Entrar</button>
            </div>

        </form>

    </div>

    <script src="./scripts/script.js"></script>
    
</body>
</html>

<?php
    // if($_POST){
    //     $email = $_POST["email"];
    //     $senha = $_POST["senha"];
    //     $emailPadrao = "admin@admin";
    //     $senhaPadrao = "admin";

    //     if($email == $emailPadrao && $senha == $senhaPadrao){
    //         echo $email . "<br>" . $senha;
    //     }
    // }
?>