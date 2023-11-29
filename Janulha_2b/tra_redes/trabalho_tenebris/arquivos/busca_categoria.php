<?php
require_once 'conexao.php';

$categoria = $_GET['nome_categoria'];
$id_categoria = $_GET['id_categoria'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos do tipo "<?php echo $categoria; ?>"</title>
</head>

<body>
    <br><br>
    <form action="busca_geral.php">
        <input type="text" name="produto" placeholder="Busque aqui">
        <input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
        <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
        <input type="submit" value="Busque">
    </form>
    <br><br><br><br>
    <?php
    $sql = "SELECT * FROM tb_produto WHERE tb_categoria_id_categoria = '$id_categoria' ";

    $resultados = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultados) > 0) {
        while ($linha = mysqli_fetch_array($resultados)) {
            $codigo = $linha['codigo_produto'];
            $produto = $linha['nome_produto'];
            $valor = $linha['valor_produto'];
            $descricao = $linha['descricao_produto'];
            $imagem = $linha['imagem_produto'];
            $id_categoria = $linha['tb_categoria_id_categoria'];

          echo"  <div class='card' style='width: 18rem;'>
  <img src='$imagem' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$produto</h5>
    <p class='card-text'>$preco $descricao</p>
    <a href='carrinho.php?id_produto=$id_produto' class='btn btn-primary'>Go somewhere</a>
  </div>
</div>";
        }
    } else {
        echo "Infelizmente não possuimos o produto que você deseja...";
        echo "<br>";
        echo "<img src='imagens/semresultados.webp'>";
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>