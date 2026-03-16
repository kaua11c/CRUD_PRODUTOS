<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");

    //Basicamente faz o código rodar apenas com o envio do formulário
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $produto_id = $_POST['id'] ?? null;
        $nome_produto = $_POST['nome'] ?? null;
        $preco = $_POST['preco'] ?? null;

        if(empty($produto_id)) {
            echo "Favor, informe o ID do produto que deve ser editado";
        } elseif(empty($nome_produto)) {
            echo "Favor, informe o novo nome do produto";
        }elseif(empty($preco)) {
            echo "Favor, informe o valor do produto";
        } else {
            $sql = 'UPDATE produtos SET nome_produto = :nome, preco = :preco WHERE id = :id';
        
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $produto_id);
            $stmt->bindParam(':nome', $nome_produto);
            $stmt->bindParam(':preco', $preco);
            $stmt->execute();
            
            echo "Produto editado com sucesso!";
        }

        
    }

?>
    <form method="POST">
        <div>
            <label>Editar produto</label>
        </div>
            <input type="number" name="id" placeholder="Insira o ID do produto">
        <div>
            <input type="text" name="nome" placeholder="Insira o novo nome do produto"> 
        </div>
        <div>
            <input type="number" name="preco" placeholder="Insira o novo preco do produto">
        </div>
        <div>
            <input type="submit" value="Salvar">
        </div>
    </form>
<?php 
    include_once("template/footer.php");
?>