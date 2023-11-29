<?php
require_once 'conexao.php';

$busca = $_GET['produto'];
$_SESSION['busca_produto'] = $busca;
if (isset($_GET['id_categoria'])) {

    $categoria = $_GET['categoria'];
    $id_categoria = $_GET['id_categoria'];

    $sql = "SELECT * FROM tb_produto WHERE tb_categoria_id_categoria = '$id_categoria' AND nome_produto LIKE '%$busca%'";
} else {
    $sql = "SELECT * FROM tb_produto WHERE nome_produto LIKE '%$busca%'";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../personalizacao/fada.css">
        <link rel="stylesheet" href="../personalizacao/tema.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Resultados para "
        <?php echo "$busca"; ?>"
    </title>
</head>

<body>
    <div class="container-fluid">
        <!-- form de busca -->
        <form class="d-flex" action="busca_geral.php" role="search">
            <input id="pesquiza" name="produto" class="form-control me-2" type="search" placeholder="Pesquise aqui..."
                aria-label="Search">
            <button id="pesquiza2" class="btn btn-outline-success" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
    </div>
    <br><br>

    <?php
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

    <!-- SELECT * FROM tb_produto WHERE nome_produto LIKE "%v%" -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>