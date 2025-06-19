<?php
session_start(); 

if(empty($_SESSION['login']))
{
    $_SESSION['erro'] = "Você precisa logar no sistema.";
    header("Location: ../index.php");
    exit;
}
?>
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
<?php include __DIR__ . '/header.php'; ?>

    <div class="menu-conteudo">

        <div class="menu-conteudo-esquerdo">
            <h1>Cadastre os NPCS e itens de sua preferência no mundo de Hollow Knight!</h1>
            <br>
            <p>Explore Hallownest como nunca antes! Aqui, você pode registrar seus NPCs favoritos, organizar seus itens mais valiosos e criar sua própria coleção personalizada dentro do mundo de Hollow Knight.<br><br>
            Seja você um Cavaleiro em busca de ordem ou apenas um admirador das histórias escondidas sob a terra, nossa loja foi feita para reunir tudo o que você mais ama nesse universo misterioso e encantador.<br><br>
            Prepare seu mapa, escolha seus companheiros de jornada e mergulhe nas profundezas — Hallownest espera por você.</p>
        </div>

        <div class="menu-conteudo-direito">
            <img src="../assets/img/menu-image.png" alt="Hollow Knight" title="Hollow Knight">
        </div>

    </div>

    <script src="../scripts/script.js"></script>
    
</body>
</html>