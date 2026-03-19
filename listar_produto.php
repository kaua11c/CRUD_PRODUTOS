<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");

    //SQL 
    $sql = 'SELECT * FROM produtos';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Aqui eu defino na váriavel utilizando o fetchAll transformando todos os produtos em um array associativo com o FETCH_ASSOC
    //$produtos virou um array com todos os produtos
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
    <table class="listaProdutos">
        <thead class="cabecalhoListaProdutos">
            <tr>
                <th>ID</th>
                <th>Nome Produto</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody class=itensListaProdutos>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produto['id']); ?></td>
                    <td><?php echo htmlspecialchars($produto['nome_produto']); ?></td>
                    <td><?php echo "R$ " . htmlspecialchars($produto['preco']); ?></td>
                    <td>
                        <form action="testeButtonExcluir.php" method="POST">
                            <input type="hidden" name="excluir_id" value="<?= $produto['id'] ?>">
                            <button class="botaoExcluirProduto" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa-solid fa-trash"></i></button>
                        </form>         
                    </td>
                    <td>
                        <form action="testeEditProduto.php" method="POST">
                            <input type="hidden" name="id_produto" value="<?= $produto['id'] ?>">
                            <button class="botaoEditProduto" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>         
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


<?php 
    include_once("template/footer.php");
?>