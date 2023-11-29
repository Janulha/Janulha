<?php
    session_start();
    require_once 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
</head> 
<body>
    <h1>Edite seus Produtos</h1>
    <form action="processar_edicao_produtos.php" method="post">
        <?php
        $id_usuario = $_SESSION['usuario'];        

        $sql = "SELECT * FROM tb_produto WHERE tb_usuario = '$id_usuario'";
        $resultados = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados) > 0) {
           while($linha = mysqli_fetch_array($resultados)) {
            echo "Nome do Produto: <input type='text' name='nome_produto' value='" . $linha['nome'] . "'><br>";
            echo "Valor: <input type='text' name='valor' value='" . $linha['valor'] . "'><br>";
            echo "Descrição: <input type='text' name='descricao' value='" . $linha['descricao'] . "'><br>";
            }
        } 
        ?>
        <input type="submit" value="Salvar alterações">
    </form>
</body>
</html>
