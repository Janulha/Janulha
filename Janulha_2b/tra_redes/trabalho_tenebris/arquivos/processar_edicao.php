<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['usuario'];
    
    // Recuperar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
}

    // Atualizar os dados do usuário no banco de dados
    $sql = "UPDATE tb_usuario SET nome = '$nome', email = '$email' WHERE id_usuario = $id_usuario";
    
    if (mysqli_query($conexao, $sql)) {
        header("Location: exibir_usuario.php"); // Redireciona para a página de exibição de usuário ou outra página apropriada
        exit;}
?>