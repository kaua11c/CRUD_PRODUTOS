<?php
    require_once 'helpers/connection.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Produtos</title>
</head>
<body>
    <div class="menuBar">
        <a href="index.php" class="tituloProduto">PRODUTOS</a>
        <ul class="opcoes_menu">
            <li class="opcao_acao_produto">
                    <a href="cadastrar_produto.php">Cadastrar</a>
            </li>
            <li class="opcao_acao_produto">
                <a href="listar_produto.php">Produtos</a>
            </li>
            <li class="opcao_acao_produto">
                <a href="editar_produto.php">Editar</a>
            </li>
            <li class="opcao_acao_produto">
                <a href="deletar_produto.php">Excluir</a>
            </li>
             <li class="opcao_acao_produto">
                <a href="buscar_produto.php">Buscar</a>
            </li>
        </ul>
        </div>
        
    </div>
