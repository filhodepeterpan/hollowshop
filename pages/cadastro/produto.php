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
    <?php include __DIR__ . '/../header.php'; ?>

    <div class="formulario">
        
        <form id="formulario-cadastro" action="#" method="POST">

            <h1 id="formulario-titulo">Cadastro de Produto</h1>

            <label>Código do Produto:</label>
            <br>
            <input required type="text" name="codigoProduto" id="codigoProduto">
            <br>

            <label>Nome do Produto:</label>
            <br>
            <input required type="text" name="produto" id="produto" maxlength="150">
            <br>
            
            <label>Categoria:</label>
            <br>
            <input required type="text" name="categoria" id="categoria" maxlength="100">
            <br>

            <label>Descrição:</label>
            <br>
            <textarea name="descricao" id="descricao" maxlength="300"></textarea>
            <br>

            <label>Preço de Compra:</label>
            <br>
            <input required type="text" pattern="[0-9.,R$ ]+" name="preco" id="precoCompra">
            <br> 

            <label>Quantidade:</label>
            <br>
            <input required type="number" name="quantidade" id="quantidadeProduto">
            <br>

            <label>Data de Compra:</label>
            <br>
            <input required type="date" name="data-compra" id="data-compra">
            <br>

            <label>Data de Validade:</label>
            <br>
            <input required type="date" name="data-validade" id="data-validade">
            <br>

            <label>Fornecedor:</label>
            <br>
            <input required type="text" name="fornecedor" id="fornecedor" maxlength="100">
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
 if(!empty($_POST))
 {
     $codigoProduto = $_POST['codigoProduto'];
     $produto = $_POST['produto'];
     $categoria = $_POST['categoria'];
     $descricao = $_POST['descricao'];
     $preco = $_POST['preco'];
     $quantidade = $_POST['quantidade'];
     $dataCompra = $_POST['data-compra'];
     $dataValidade = $_POST['data-validade'];
     $fornecedor = $_POST['fornecedor'];
 
     include_once('../../config/conexao.php');
 
     try {
 /*
         $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
     $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo produto para o arquivo
     $dir = 'img/cliente/'; //Diretório para uploads
  
     move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 
     $enderecoImagem = $dir.$new_name;
 */	  
       
       $stmt = $conn->prepare("INSERT INTO produto (codigoProduto, produto, categoria, descricao, preco, quantidade, dataCompra, dataValidade, fornecedor) VALUES (:codigoProduto, :produto,:categoria,:descricao,:preco,:quantidade,:dataCompra,:dataValidade, :fornecedor)");
 
       $stmt->bindParam(':codigoProduto', $codigoProduto);
       $stmt->bindParam(':produto', $produto);
       $stmt->bindParam(':categoria', $categoria);
       $stmt->bindParam(':descricao', $descricao);
       $stmt->bindParam(':preco', $preco);
       $stmt->bindParam(':quantidade', $quantidade);
       $stmt->bindParam(':dataCompra', $dataCompra);
       $stmt->bindParam('dataValidade', $dataValidade);
       $stmt->bindParam('fornecedor', $fornecedor);
       //$stmt->bindParam(':imagem', $enderecoImagem);
       
       $stmt->execute();
 
       
 
       echo "<script>alert('Cadastrado com Sucesso');</script>";
 
     } catch(PDOException $e) {
       echo "Erro ao cadastrar: " . $e->getMessage();
     }
     $conn = null;
 }
?>
