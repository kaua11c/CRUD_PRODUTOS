<?php

include_once("helpers/connection.php");
include_once("template/header.php");

$sql = "UPDATE produtos SET estoque = estoque + :adicionarEstoque WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':adicionarEstoque', $adicionarEstoque);
$stmt->bindParam(':id', $id);
$stmt->execute();

?>