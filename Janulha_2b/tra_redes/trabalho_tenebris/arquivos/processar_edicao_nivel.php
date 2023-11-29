<?php
session_start();
require_once 'conexao.php';


    $usuario = $_GET['id_usuario'];

    $nivel_user = $_GET['nivel'];

    $sql_update_nivel = "UPDATE tb_nivel_user SET nivel_user='$nivel_user' WHERE tb_usuario_id_usuario = '$usuario'";

    echo $sql_update_nivel;

//     if (mysqli_query($conexao, $sql_update_nivel)) {
//         header("Location: editar_nivel_usuario.php"); 
//         exit();
//     } else {
//         header("Location: editar_nivel_usuario.php"); 
//         exit();
//     }

?>
