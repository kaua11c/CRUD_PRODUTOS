<?php
include_once("helpers/connection.php");
include_once("template/header.php");

//BUSCAR PRODUTO PELO GET (para preencher o formulário)
$id = $_GET['id'] ?? null;
$produto = null;

if ($id) {
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
}

//ATUALIZAR PRODUTO (POST)
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $produto_id = $_POST['id'] ?? null;
    $nome_produto = $_POST['nome'] ?? null;
    $preco = $_POST['preco'] ?? null;

    if($preco < 0) {
        echo "Não é permitido inserir um valor negativo no preço";
    } else {

        $sql = 'UPDATE produtos SET nome_produto = :nome, preco = :preco WHERE id = :id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $produto_id);
        $stmt->bindParam(':nome', $nome_produto);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();

        
        header("Location: listar_produto.php");
        exit;
        
    }
}
?>

<div class="cardEditarProduto">
    <form class="campos_form" method="POST">
        
        <div class="labelEditarProduto">
            <label>Editar produto</label>
        </div>

        <!-- ID escondido -->
        <input type="hidden" name="id" value="<?php echo $produto['id'] ?? ''; ?>">

        <div>
            <input type="text" name="nome" value="<?php echo $produto['nome_produto'] ?? ''; ?>">
        </div>

        <div>
            <input type="number" name="preco" value="<?php echo $produto['preco'] ?? ''; ?>">
        </div>

        <div>
            <input class="botaoEditarProduto" type="submit" value="Salvar">
        </div>

    </form>
</div>
    
<?php 
include_once("template/footer.php");

?>