<?php
include_once("helpers/connection.php");
include_once("template/header.php");

//Armazena o ID da URL na váriael $id
$id = $_GET['id'] ?? null;

//Valida se possuí um array válido
if ($id) {
    //CRUD PARA ARMAZENAR O $produto em um array
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_produto = $_POST['nome'] ?? null;
    $preco = $_POST['preco'] ?? null;
    $id = $_POST['id'] ?? null;


    
    if(empty($nome_produto)) {
        echo "Não é permitido deixar o campo nome em branco";
    } elseif($preco < 0) {
        echo "Não é permitido adicionar um preço negativo para o produto";
    } else {
        $sql = 'UPDATE produtos SET nome_produto = :nome, preco = :preco WHERE id = :id';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome_produto);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
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
    require_once 'template/footer.php';
?>

