<?php
    require_once(__DIR__ . '/urlconfig.php');

    date_default_timezone_set('America/Sao_Paulo');
?>

<header class="cabecalho">
    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
    
    <div class="logo">
        <h1 id="hollowshop-menu" onclick="window.location.href='<?= BASE_URL ?>pages/menu.php'">HOLLOWSHOP</h1>
    </div>
    <nav>
        <select name="cadastro" id="cadastro" onchange="if(this.value) window.location.href=this.value">
            <option selected value="">Cadastro</option>
            <option value="<?= BASE_URL ?>pages/cadastro/cliente.php">Cliente</option>
            <option value="<?= BASE_URL ?>pages/cadastro/funcionario.php">Funcionário</option>
            <option value="<?= BASE_URL ?>pages/cadastro/fornecedor.php">Fornecedor</option>
            <option value="<?= BASE_URL ?>pages/cadastro/produto.php">Produto</option>
            <option value="<?= BASE_URL ?>pages/cadastro/usuario.php">Usuário</option>
        </select>

        <select name="consulta" id="consulta" onchange="if(this.value) window.location.href=this.value">
            <option selected value="">Consulta</option>
            <option value="<?= BASE_URL ?>pages/consulta/cliente.php">Cliente</option>
            <option value="<?= BASE_URL ?>pages/consulta/funcionario.php">Funcionário</option>
            <option value="<?= BASE_URL ?>pages/consulta/fornecedor.php">Fornecedor</option>
            <option value="<?= BASE_URL ?>pages/consulta/produto.php">Produto</option>
            <option value="<?= BASE_URL ?>pages/consulta/usuario.php">Usuário</option>
        </select>

        <a href="<?= BASE_URL ?>pages/logout.php" id="deslogar">Sair</a>
    </nav>
</header>
