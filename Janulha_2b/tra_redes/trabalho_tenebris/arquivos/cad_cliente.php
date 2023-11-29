<?php
    require_once 'conexao.php';

    $nome = $_GET['nome'];
    $user = $_GET['user'];
    $email = $_GET['email'];
    $dt_nascimento = $_GET['data_nascimento'];
    $cpf = $_GET['cpf'];
    $telefone = $_GET['telefone'];
    $endereco = $_GET['endereco'];
    $senha = $_GET['senha'];
    $nivel_user = "1";

    $sql = "INSERT INTO tb_usuario (nome, email, dt_nascimento, cpf, telefone, nome_usuario, senha, endereco)
                VALUES ('$nome', '$email', '$dt_nascimento', '$cpf', '$telefone', '$user', '$senha', '$endereco')";

    mysqli_query($conexao, $sql);

    $busca_user = "SELECT id_usuario FROM tb_usuario WHERE email = '$email'";

    $resultado = mysqli_query($conexao, $busca_user);
    if(mysqli_num_rows($resultado) > 0){
        while ($linha = mysqli_fetch_array($resultado)) {
            $id_user = $linha['id_usuario'];
        }
    }
        

    $cadastro_nivel = "INSERT INTO tb_nivel_user (nivel_user, tb_usuario_id_usuario) VALUES ('$nivel_user', '$id_user')";

    if (mysqli_query($conexao, $cadastro_nivel)) {
        header('Location: index.html');
        exit();
    } else {
        header('Location : form_cad_client.html');
        exit();
    }
?>