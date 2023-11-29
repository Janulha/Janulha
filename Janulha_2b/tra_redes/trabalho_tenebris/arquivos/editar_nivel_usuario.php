<?php
require_once 'conexao.php';
require_once 'teste_login.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nível de Usuário</title>
</head>

<body>
    <h2>Usuarios Cadastrados</h2>
    <br><br>
    <form action="editar_nivel_usuario.php">
        <input type="text" name="nome_busca" placeholder="busque pelo e-mail">
        <input type="submit" value="Buscar Usuario">
    </form>
    <table border="1">
        <tr>
            <td>Email</td>
            <td>Nível Atual</td>
            <td>Novo Nível</td>
        </tr>
        <?php
        $normal = "1";
        $vendedor = "2";
        $adm = "3";
        if(isset($_GET['nome_busca'])){
            $busca = $_GET['nome_busca'];
            $sql_busca = "SELECT * FROM tb_usuario WHERE email LIKE '%$busca%'";

            $result_busca = mysqli_query($conexao, $sql_busca);

            if (mysqli_num_rows($result_busca) == 1){
                while ($linha = mysqli_fetch_array($result_busca)) {
                    $id_usuario = $linha['id_usuario'];
                    $email = $linha['email'];
                }
                $sql_nivel_user = "SELECT nivel_user FROM tb_nivel_user WHERE tb_usuario_id_usuario = '$id_usuario'";
    
                $resultado_nivel = mysqli_query($conexao, $sql_nivel_user);

                if (mysqli_num_rows($resultado_nivel) > 0) {
                    while ($linha = mysqli_fetch_array($resultado_nivel)) {
                        $nivel_user = $linha['nivel_user'];

                        echo '<td>'. $email . '</td>';
                        echo '<td>'. $nivel_user . '</td>';
                        echo '<td></td>';
                         echo "<td><button><a href=processar_edicao_nivel.php?id_usuario=$id_usuario&nivel=nivel>ALterar Nível</a><button></td>";
                    }
            }else {
                echo "Busque denovo";
                echo"<a href='editar_nivel.php'></a>";
            }
            }}
            
    
            ?>
            </tr>
    </table>

</body>

</html>