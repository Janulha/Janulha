<?php
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul class="list-group list-group-flush">
        <?php
        $sql = "SELECT * FROM tb_categoria";

        $resultados = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados) > 0) {
            while ($linha = mysqli_fetch_array($resultados)) {
                $id_categoria = $linha['id_categoria'];
                $categoria = $linha['nome_categoria'];

                echo "    <li class='list-group-item'><a href='busca_categoria.php?id_categoria=$id_categoria&nome_categoria=$categoria'>$categoria</a></li>";
            }
        }
        ?>
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>