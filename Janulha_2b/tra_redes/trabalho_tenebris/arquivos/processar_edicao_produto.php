<?php
    session_start();
    require_once 'conexao.php';

    if ($_POST) {
        $id_produtos = $_POST['id_produtos'];
        $nome_produto = $_POST['nome_produto'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];

        $sql = "UPDATE tb_produto SET nome = '$nome_produto', valor = '$valor', descricao = '$descricao' WHERE id_produtos = $id_produtos";

        if (mysqli_query($conexao, $sql)) {
            echo "Produto editado com sucesso!";
        } else {
            echo "Erro ao editar o produto";}

}
?>
