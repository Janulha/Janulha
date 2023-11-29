<?php
session_start();
require_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Exibição usuario</title>
</head>

<body>
    <h1>Seu perfil</h1>
    <a href="index.html">voltar</a> <br><br>
    <table border="1">
        <tr>
            <td>Nome</td>
            <td>email</td>
        </tr>


        <?php
        if (!isset($_SESSION['usuario'])) {
            echo "Registre-se para exibir seus dados";
            echo "<button><a href='login.html'></a></button>";
        } else {


            $id_usuario = $_SESSION['usuario'];

            $sql = "SELECT * FROM tb_usuario WHERE id_usuario = '$id_usuario'";


            $resultados = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    echo "<tr>";
                    echo "<td>" . $linha['nome'] . "</td><br>";
                    echo "<td>" . $linha['email'] . "</td><br>";
                    echo "</tr> ";
                }
               echo "<a href='editar_usuario.php'>Edite seu perfil</a> <br>
                <a href='deletar_usuario.php'>Deletar Perfil</a> <br><br>";
            }
            if ($_SESSION['nivel'] == "2") {
                $sql = "SELECT * FROM tb_produto WHERE tb_usuario_id_usuario = $id_usuario";
                $resultados = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultados) > 0){
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $codigo = $linha['codigo_produto'];
                        $produto = $linha['nome_produto'];
                        $preco = $linha['valor_produto'];
                        $descricao = $linha['descricao_produto'];
                        $imagem = $linha['imagem_produto'];

                        echo "<div class='card' style='width: 18rem;'>
                        <img  src='$imagem' class='card-img-top' alt='...'>
                        <div class='card-body'>
                          <h5 class='card-title'>$produto</h5>
                          <p class='card-text'> R$ $preco</p>
                          <p class='card-text'>$descricao</p>
                          <a href='#' class='btn btn-primary'>Deletar</a>
                          <a href='editar_produtos.php' class='btn btn-primary'>Editar</a>
                        </div>
                      </div>";
                    }
                }
            }elseif ($_SESSION['nivel'] == "3") {
                echo "<button><a href='editar_nivel_usuario.php'>Editar Nivel de usuarios</a></button><br>";
            }
        echo "<button><a href='logout.php'>Logout</a></button>";
        }
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>