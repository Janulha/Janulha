<?php
    session_start();
    require_once 'conexao.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_usuario WHERE email = '$email' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_array($resultado)) {

            $id_user = $linha['id_usuario'];
        }
        $sql_nivel_user = "SELECT nivel_user FROM tb_nivel_user WHERE tb_usuario_id_usuario = '$id_user'";

        $resultado_nivel = mysqli_query($conexao, $sql_nivel_user);

        if (mysqli_num_rows($resultado_nivel) > 0) {
            while ($linha = mysqli_fetch_array($resultado_nivel)) {
            $nivel_user = $linha['nivel_user'];
            }
        }

        // session do nível de usuario
        $_SESSION['nivel'] = $nivel_user;

        // Session do teste do Login
        $_SESSION['logado'] = true;

        // Id do usuario
        $_SESSION['usuario'] = $id_user;

        // Arrays do Carrinho
        $_SESSioN['carrinho']['produto'] = array();
        $_SESSION['carrinho']['quantidade_produto'] = array();

        header('Location: index.html');
        exit();

    } else {

        header('Location: login.html');
        exit();
    }
?>