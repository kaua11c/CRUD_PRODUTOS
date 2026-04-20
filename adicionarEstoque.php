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
    //Objeto produto criado
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') { 
    
    $adicionarEstoque = $_POST['adicionarEstoque'] ?? null;
    $id = $_POST['id'] ?? null;



    $sql = "UPDATE produtos SET estoque = estoque + :adicionarEstoque WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':adicionarEstoque', $adicionarEstoque);
    $stmt->bindParam(':id', $id);
    $stmt->execute(); 

    // Volta para a lista de produtos apos excluir
    header("Location: listar_produto.php");
    exit;
}


?>

<form class="addEstoque" action="" method="POST">
    <label for="">Adicione a quantidade de estoque do produto: <br> <strong> <?= $produto['nome_produto'] ?> </strong> </label>
    <input class="produtoAddEstoque" type="hidden" name="id" value="<?php echo $produto['id'] ?? ''; ?>">
    <input class="quantidadeAddEstoque" type="text" name="adicionarEstoque" id="">
    <input class="botaoEditarProduto" type="submit" value="Salvar">
</form>