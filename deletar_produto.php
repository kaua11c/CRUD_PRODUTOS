<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");

    $produto_id = $_POST['id'] ?? null;
    if(empty($produto_id)) {
        echo "Favor informe o ID";
    } else {
        // Select para armazenar em um array o banco
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $produto_id);
        $stmt->execute();

        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        //Verifica se retornou true na busca
        if (!$produto) {
            echo "Produto não encontrado";
        } else {
            // Delete do ID informado
            $sql = 'DELETE FROM produtos WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $produto_id);
            $stmt->execute();

            echo "Produto $produto_id deletado";
        }
    }

?>

    <form action="" method="POST">
        <label> Informe o ID do produto que deseja excluir</label>
        <input type="number" name="id">
        <input type="submit" value="Deletar">
    </form>

<?php 
    include_once("template/footer.php");
?>