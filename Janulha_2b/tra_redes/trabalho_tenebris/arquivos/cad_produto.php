<?php
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tenebris</title>
    <meta charsets="UTF-8">
    <link rel="stylesheet" href="personalizacao/tema.css">
</head>

<body>
    <center>
        <h1><b><a href="index.html">Tenebris</a></b></h1>

        <br><br><br><br>

        <form action="cadastro_pro.php" enctype="multipart/form-data" method="post" >
            
            Cadastre aqui um produto!<br><br>
            Nome:<br>
            <input type="text" name="nome_produto" placeholder="Vaso Contemporâneo"><br><br>
            Descrição:<br>
            <input type="text" name="descricao" placeholder="Vaso Contemporâneo preto de tamanho médio, cerca de 45cm (quarenta e cinco centímetros),
                     pesando 1Kg (um quilograma)."><br><br>
            Código:<br>
            <input type="text" name="codigo" placeholder="00-00001"><br><br>

            Imagem 
            <input type="file" name="imagem"> <br></br>

            Tipo:<br>
            <select name="id_tipo" id="">
                <?php
                $sql = "SELECT * FROM tb_categoria";

                $resultados = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($resultados) > 0) {
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id_categoria = $linha['id_categoria'];
                        $categoria = $linha['nome_categoria'];

                        echo "<option value='$id_categoria'>$categoria</option>";
                    }
                }
                ?>
            </select><br> <br>
            <input type="text" name="valor" placeholder="R$ 1.325,00"><br><br>
            <input type="submit" value="Cadastrar">
        </form>



        <br><br><br><br>

        <h3>Instagram - Twitter - Facebook</h3>
    </center>
</body>

</html>