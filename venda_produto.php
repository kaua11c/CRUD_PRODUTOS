<?php

include_once("helpers/connection.php");
include_once("template/header.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null; 
    $pedido = $_POST['pedido'] ?? null;
}

$sql = "UPDATE produtos SET estoque = estoque - :pedido WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':pedido', $pedido);
$stmt->bindParam(':id', $id);
$stmt->execute();

?>

<form action="" method="POST">
    <label for="">Vender produto</label>
    <input type="text" name="id">
    <input type="text" name="pedido"> 
    <input type="submit" value="Salvar">
</form>