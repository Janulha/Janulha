<?php
    require_once 'conexao.php';
    require_once 'teste_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="personalizacao/tema.css">
    <title>Produtos Cadastrados</title>
</head>
<body>
    
    <br><br>
    <table border="1">
        <tr>
            <td>Codigo</td>
            <td>Produto</td>
            <td>Categoria</td>
            <td>Valor (R$)</td>
            <td>Descrição</td>
            <td>Qtd</td>
            <td>Adicionar ao carrinho</td>
        </tr>
        <?php
            $sql = "SELECT * FROM tb_produto";
            
            $resultados = mysqli_query($conexao, $sql);
            
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    
                    $id_produto = $linha['id_produtos'];
                    $codigo = $linha['codigo_produto'];
                    $produto = $linha['nome_produto'];
                    $valor = $linha['valor_produto'];
                    $descricao = $linha['descricao_produto'];
                    $id_categoria = $linha['tb_categoria_id_categoria'];
                    
                    echo "<tr>";
                    echo "<form action='carrinho.php'>";
                    echo "<td> $codigo </td>";
                    echo "<td><a href='produto_individual.php?produto=$id_produto'> $produto </a></td>";
                    
                    $sql = "SELECT nome_categoria FROM tb_categoria WHERE id_categoria = '$id_categoria'";

                    $resultados2 = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($resultados2) > 0) {
                        while ($linha = mysqli_fetch_array($resultados2)) {
                            $categoria = $linha['nome_categoria'];

                            echo "<td> $categoria </td>";
                        }
                    }

                    echo "<td> $valor </td>";
                    echo "<td> $descricao </td>";
                    echo "<td> <input type='number' name='quantidade'> </td>";
                    echo "<td>";
                    echo "<input type='hidden' name='produto' value='$id_produto'>";
                    echo "<input type='submit' value='Adicionar ao Carrinho'>";
                    echo "</td>";
                    echo "</form>";
                    
                    echo "</tr>";
                    
                }
            }
            ?>
    </table>
</body>
</html>