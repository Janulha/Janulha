<?php
    require_once 'teste_login.php';
    require_once 'conexao.php';

    $user = $_SESSION['usuario'];
    $id_produto = $_GET['id_produto'];
    $avaliacao = $_GET['comentario'];

    $_SESSION['id_produto']=$id_produto;

    $sql = "INSERT INTO tb_avaliacao (avaliacao, tb_usuario_id_usuario, tb_produto_id_produto)
            VALUES ('$avaliacao', '$user', '$id_produto')";
    if (mysqli_query($conexao, $sql)) {
        header('Location: produto_individual.php');
        exit();
    }else {
        header('Location: produto_individual.php');
        exit();
    }
 

?>