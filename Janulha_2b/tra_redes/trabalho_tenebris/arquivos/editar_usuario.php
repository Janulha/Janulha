<?php

    session_start();
    require_once 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil</h1>
    <form action="processar_edicao.php" method="post">
        <?php

        $id_usuario = $_SESSION['usuario'];

        $sql = "SELECT * FROM tb_usuario WHERE id_usuario = '$id_usuario'";
        $resultados = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados) > 0) {
            $linha = mysqli_fetch_array($resultados);
            echo "Nome: <input type='text' name='nome' value='" . $linha['nome'] . "'><br>";
            echo "Email: <input type='text' name='email' value='" . $linha['email'] . "'><br>";
}
        ?>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
