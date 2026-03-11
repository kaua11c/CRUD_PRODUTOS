<?php
    require_once 'template/header.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];

    //Verifica se as variáveis estão vazias
    /* if(!empty($nome_produto) && !empty($preco)) {
        
    } */

    if(empty($nome_produto)) {
        echo "Preencha o nome do produto";
    } elseif(empty($preco)) {
        echo "Preencha o preço do produto";
    } else {
        //SQL
        $sql = 'INSERT INTO produtos (nome_produto, preco) VALUES (:nome_produto, :preco)';

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nome_produto', $nome_produto);
        $stmt->bindParam(':preco', $preco);

        $stmt->execute();

        echo "Produto cadastrado com sucesso!";
    }
}
    
?>

<form class="cadastro_de_produto" action="" method="POST">
    <label class="label_camposCadastroProduto">Nome do produto: </label>
    <input class="campoCadastroProduto" type="text" name="nome_produto" placeholder="Insira o nome do produto..."> 
    <label class="label_camposCadastroProduto">Preço:</label>
    <input class="campoCadastroProduto" type="number" name="preco" step="0.01" placeholder="Insira o preço do produto...">
    <input class="botaoCadastroProduto" type="submit" value="Cadastrar">
</form>

<?php 
    require_once 'template/footer.php';
?>