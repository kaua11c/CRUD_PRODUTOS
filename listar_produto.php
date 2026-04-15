<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");
?>

<div class="cardListaProdutos">
    <div class="cardBuscarProduto">
        <form class="buscarProduto" action="" method="GET">
            <input name="buscarProduto" type="search" placeholder="Buscar produto" value="<?php echo $_GET['buscarProduto'] ?? ''; ?>">
            
            <button type="submit"><i class="fa fa-search"></i> </button>
        </form>
    </div>
    

    <table class="listaProdutos">
        <thead class="cabecalhoListaProdutos">
            <tr>
                
                <th>ID</th>
                <th>Nome Produto</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>

        <?php 
        $buscarProduto = $_GET['buscarProduto'] ?? '';

        if(!empty($buscarProduto)) {

            $sql = "SELECT * FROM produtos WHERE nome_produto LIKE :buscarProduto";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':buscarProduto','%' . $buscarProduto . '%');
            $stmt->execute(); 
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } else {
            $produtos = $pdo->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <tbody class="itensListaProdutos">
            <?php foreach ($produtos as $produto): ?> 
                <tr>
                    <td><?php echo htmlspecialchars($produto['id']); ?></td>
                    <td><?php echo htmlspecialchars($produto['nome_produto']); ?></td>
                    <td><?php echo htmlspecialchars($produto['estoque']); ?></td>
                    <td><?php echo "R$ " . htmlspecialchars($produto['preco']); ?></td>
                    

                    <td>
                        <a href="editar_produto.php?id=<?php echo $produto['id']; ?>">
                            <button class="botaoEditProduto">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>       
                    </td>


                    <td>
                        <a href="adicionarEstoque.php?id=<?php echo $produto['id']; ?>">
                            <button class="botaoAddEstoque">
                                <i class="fa-solid fa-warehouse"></i>
                            </button>
                        </a>  
                    </td>

                    <td>
                        <form action="deletar_produto.php" method="POST">
                            <input type="hidden" name="excluir_id" value="<?= $produto['id'] ?>">
                            <button class="botaoExcluirProduto" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa-solid fa-trash"></i></button>
                        </form>         
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php 
    require_once 'template/footer.php';
?>

