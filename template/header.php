<?php
    require_once 'helpers/connection.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Produtos</title>
</head>
<body>
    <div class="titulo_produtos">
        <h1 class="tituloProduto">
            PRODUTOS
        </h1>
    </div>
    <div class="opcoes_menu">
        <ul>
            <li class="opcao_acao_produto">
                <a href="cadastrar_produto.php">Cadastrar produtos</a>
            </li>
            <li class="opcao_acao_produto">
                <a href="listar_produto.php">Listar produtos</a>
            </li>
            <li class="opcao_acao_produto">
                <a href="editar_produto.php">Editar produtos</a>
            </li>
            <li class="opcao_acao_produto">
                <a href="deletar_produto.php">Excluir produtos</a>
            </li>
        </ul>
    </div>