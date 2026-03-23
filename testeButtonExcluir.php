<?php
    include_once("helpers/connection.php");
    

    $excluir_id = $_POST['excluir_id'];

    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $excluir_id);
    $stmt->execute();

    // Volta para a lista de produtos apos excluir
    header("Location: listar_produto.php");
    exit;

