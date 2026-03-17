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
                if($preco < -1) {
                    echo "Não é permitido inserir um valor negativo no preço";
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
        }
    }

?>

<div class="cardEditarProduto">
    <form class="campos_form"method="POST">
        <div class="labelEditarProduto">
            <label>Editar produto</label>
        </div>
            <input type="number" name="id" placeholder="Insira o ID do produto">
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