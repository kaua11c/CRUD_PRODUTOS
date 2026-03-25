<?php
include_once("helpers/connection.php");
include_once("template/header.php");

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $produto_id = $_POST['id'] ?? null;
    $nome_produto = $_POST['nome'] ?? null;
    $preco = $_POST['preco'] ?? null;

    $produto_id = $_GET['id'];

    //CRUD PARA ARMAZENAR O $produto em um array
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $produto_id);
    $stmt->execute();

    $produto = $stmt->fetch(PDO::FETCH_ASSOC); //$produto é um array
    var_dump($produto);

}

?>

<?php 
    require_once 'template/footer.php';
?>