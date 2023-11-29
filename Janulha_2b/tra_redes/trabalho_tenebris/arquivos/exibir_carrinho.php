<?php
session_start();
require_once 'conexao.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Produtos</title>
</head>

<body>
    <h3>Exibição dos produtos do Carrinho</h3>
    <br>

    <button><a href='index.html'>Home</a></button> <br><br>

        <?php
        $id = $_SESSION['usuario'];

        // verifica a existência do carrinho
        if (isset($_SESSION['carrinho']['produto'])) {
            echo "<button><a href='limpar_carrinho.php'>Limpar Carrinho</a></button> <br><br>";
           
            // Junta os dois arrays do carrinho, de maneira que os valores do carrinho produto se tornem os indices do
            //  array quantidade
            $qtd_valor = array_combine($_SESSION['carrinho']['produto'], $_SESSION['carrinho']['quantidade_produto']);

            $valor_total = 0;
            foreach ($qtd_valor as $key => $value) {

                $sql = "SELECT * FROM tb_produto WHERE id_produtos = '$key'";
                $resultados = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultados) > 0) {
                    while ($linha = mysqli_fetch_array($resultados)) {

                        $codigo = $linha['codigo_produto'];
                        $produto = $linha['nome_produto'];
                        $preco = $linha['valor_produto'];
                        $descricao = $linha['descricao_produto'];
                        $id_categoria = $linha['tb_categoria_id_categoria'];

                        echo '<div class="card" style="width: 18rem;">';
                        echo '    <div class="card-body">';
                        echo '        <h5 class="card-title">' . $produto . '</h5>';
                        echo '        <h6 class="card-subtitle mb-2 text-body-secondary"> R$ ' . $preco . '</h6>';
                        echo '        <p class="card-text">' . $codigo . ' - ' . $descricao . '</p>';
                        echo '        <p class="card-text"> QTD.:' . $value . '</p>';
                        echo "</div>";
                        echo "</div>";
                        $valor_total += ($preco * $value);
                    }
                }
            }
            echo "Valor total = R$ " . $valor_total;
            echo "<br> <button><a href='confirmar_compra.php?valor=$valor_total'>Confirmar Dados</a></button>";
        } else {
            echo "Não há produto no carrinho";
        }
        ?>
    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>