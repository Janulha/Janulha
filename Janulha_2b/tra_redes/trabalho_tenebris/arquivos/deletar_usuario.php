<?php
    session_start();
    require_once 'conexao.php';

    $id_usuario = $_SESSION['usuario'];
    
    $sql = "DELETE FROM tb_usuario WHERE id_usuario = $id_usuario";
    
    if(mysqli_query($conexao, $sql)){
        
        header('Location: index.html');
        exit();
    }else {
        header('Location: exibir_usuario.php');
        exit();
    }

?>
