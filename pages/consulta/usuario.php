<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/media.query.css">
    <audio id="musica" src="../../assets/audio/hollow_knight_title_theme.mp3" autoplay loop></audio>
    <title>HOLLOWSHOP | Consulta</title>
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <script src="../../scripts/script.js"></script>
</body>
</html>

<?php
  
  include_once('../../config/conexao.php');

  echo "<div class='consulta'>";

  try{
      $select = $conn->prepare('SELECT * FROM usuario');
      $select->execute();

      while($row = $select->fetch()){
          echo "<p>";
          echo "<img src='../cadastro/".$row['imagem']."' width='150px' style='border-radius: 20px; margin: 1rem 0;'";
          echo "<br><b>Código: </b>" . $row['codigo'];
          echo "<br><b>Nome do Usuario: </b>" . $row['nm_usuario'];
          echo "<br><b>Senha: </b>" . $row['senha'];
          echo "<br><b>Funcionario: </b>" . $row['funcionario'];
          echo "<br><br>";

          ?>
          <button onclick="window.location.href='../alteracoes/alterarUsuario.php?id=<?php echo $row['codigo'];?>'">
              Alterar
          </button>
          <button onclick="window.location.href='../exclusoes/excluirUsuario.php?id=<?php echo $row['codigo'];?>'">
              Excluir
          </button>
          <button onclick="window.location.href='../menu.php'">Voltar</button>
          <br><br>
          <hr>
  <?php
      }
  }
  catch(PDOException $e){
      echo 'ERROR: ' . $e->getMessage();
  }

  echo "</div>";
?>