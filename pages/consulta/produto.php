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
      $select = $conn->prepare('SELECT * FROM produto');
      $select->execute();

      while($row = $select->fetch()){
          echo "<p>";
          // echo "<br>"<img src=' ".$row['imagem']. " ' width=80px>";
          echo "<br><b>Código: </b>" . $row['codigo'];
          echo "<br><b>Código do Produto: </b>" . $row['codigoProduto'];
          echo "<br><b>Produto: </b>" . $row['produto'];
          echo "<br><b>Categoria: </b>" . $row['categoria'];
          echo "<br><b>Descrição: </b>" . $row['descricao'];
          echo "<br><b>Preço: </b>" . $row['preco'];
          echo "<br><b>Quantidade: </b>" . $row['quantidade'];
          echo "<br><b>Data de Compra: </b>" . $row['dataCompra'];
          echo "<br><b>Data de Validade: </b>" . $row['dataValidade'];
          echo "<br><b>Fornecedor: </b>" . $row ['fornecedor'];
          echo "<br><br>";

          ?>
          <button onclick="window.location.href='../alteracoes/alterarProduto.php?id=<?php echo $row['codigo'];?>'">
              Alterar
          </button>
          <button onclick="window.location.href='../exclusoes/excluirProduto.php?id=<?php echo $row['codigo'];?>'">
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