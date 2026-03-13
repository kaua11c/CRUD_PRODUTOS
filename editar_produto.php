<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");

    $sqlEditarNome = 'UPDATE produtos SET nome = :nome WHERE id = :id';
    $sqlEditarPreco = 'UPDATE produtos SET preco = :preco WHERE id = :id';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $produto_id);
    $stmt->bindParam(':nome', $nome_produto);
    $stmt->bindParam(':preco', $preco);
    $stmt->execute();

?>

<?php 
    include_once("template/footer.php");
?>