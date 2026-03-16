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
<div class="form_card_cadastro">
    <form class="cadastro_de_produto" action="" method="POST">
        <div class="campos_form">
            <label class="label_camposCadastroProduto">Cadastro de produto</label>
            <div class="camposPreencher">
                <input class="campoCadastroProduto" type="text" name="nome_produto" placeholder="Nome do produto"> 
            </div>
        </div>
        <div class="campos_form">
            <label class="label_camposCadastroProduto"></label>
            <div class="camposPreencher">
                <input class="campoCadastroProduto" id="preco" type="number" name="preco" step="0.01" placeholder="Preço produto">
            </div>       
        </div>
        <div class="botaoCadastro">
            <input class="botaoCadastroProduto" type="submit" value="Cadastrar">
        </div>
            
            
            
        
    </form>
</div>



<?php 
    require_once 'template/footer.php';
?>