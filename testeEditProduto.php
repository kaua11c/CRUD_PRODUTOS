<?php 
    include_once("helpers/connection.php");
    include_once("template/header.php");

    


?>

<div class="cardEditarProduto">
    <form class="campos_form"method="POST">
        <div class="labelEditarProduto">
            <label>Editar produto</label>
        </div>
            <input class="id_editarProduto"type="number" name="id" placeholder="ID">
        <div>
            <input type="text" name="nome" placeholder="Insira o nome do produto"> 
        </div>
        <div>
            <input type="number" name="preco" placeholder="Insira o preço do produto">
        </div>
        <div>
            <input class="botaoEditarProduto" type="submit" value="Salvar">
        </div>
    </form>
</div>

<?php 
    include_once("template/footer.php");
?>