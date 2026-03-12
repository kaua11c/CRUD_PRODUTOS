<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

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
    }
?>

    <form class="card_excluirProdutos" method="POST">
        <div>
            <label class="labelExcluir"> Informe o ID do produto que deseja excluir</label>
        </div>
        <div>
            <input class="campoDeExclusao" type="number" name="id">
        </div>
        <div>
            <input class="botaoDelete"type="submit" value="Deletar">
        </div>
        
    </form>

<?php 
    include_once("template/footer.php");
?>