<?php
    include_once("helpers/connection.php");
    include_once("template/header.php");
    include_once("template/menu.php");

    $sql = "SELECT FROM produtos WHERE :nome_produto"

?>

<?php 
    include_once("template/footer.php");
?>