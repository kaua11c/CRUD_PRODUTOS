<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");

    $produto_id = $_GET['id'];

    $sql = 'DELETE FROM produtos WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $produto_id);
    $stmt->execute();

?>

    <form action="" method="GET">
        <label> Informe o ID do produto que deseja excluir</label>
    </form>

<?php 
    include_once("template/footer.php");
?>