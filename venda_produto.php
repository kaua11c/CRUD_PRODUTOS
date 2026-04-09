<?php

include_once("helpers/connection.php");
include_once("template/header.php");

$sql = "SELECT * FROM produtos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null; 
    $pedido = $_POST['pedido'] ?? null;

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if($pedido > $produto['estoque']) {
        echo "Não há produtos suficiente para esta compra";
    } else {
        $sql = "UPDATE produtos SET estoque = estoque - :pedido WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pedido', $pedido);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Venda realizada!";
        echo " Novo saldo do produto: " . "<strong>" . $produto['nome_produto'] . "</strong>" . " é de "  . "<strong>" . $produto['estoque'] . "</strong> itens " ;
    }
    
}

?>

<form action="" method="POST">

    <label for="">Vender produto</label>

    <select name="id">
        <?php foreach ($produtos as $produto): ?> 
            <option value="<?= $produto['id'] ?>">
                <?= $produto['nome_produto'] ?>
            </option>

        <?php endforeach; ?>
    </select>

    <input type="text" name="pedido"> 
    <input type="submit" value="Salvar">
</form>