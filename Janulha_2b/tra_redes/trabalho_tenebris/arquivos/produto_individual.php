<?php
session_start();
require_once 'conexao.php';

   if (isset($_GET['produto'])) {
    $id_produto = $_GET['produto'];
    } else {
        $id_produto =$_SESSION['id_produto'];

    }

    $_SESSION['id_produto'] = $id_produto;

$sql = "SELECT * FROM tb_produto WHERE id_produtos = '$id_produto'";

$resultados = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultados) > 0) {
    while ($linha = mysqli_fetch_array($resultados)) {
        // $id_produto = $linha['id_produtos'];
        $codigo = $linha['codigo_produto'];
        $produto = $linha['nome_produto'];
        $valor = $linha['valor_produto'];
        $descricao = $linha['descricao_produto'];
        $id_categoria = $linha['tb_categoria_id_categoria'];


        $sql = "SELECT nome_categoria FROM tb_categoria WHERE id_categoria = '$id_categoria'";

        $resultados2 = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados2) > 0) {
            while ($linha = mysqli_fetch_array($resultados2)) {
                $categoria = $linha['nome_categoria'];
            }
        }

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../personalizacao/fada2.css">
    <title>
        <?php echo $produto; ?>
    </title>
</head>

<body id="quarto">
    <div id="funcoes" class="container-fluid">
        <div class="container-fluid">
            <a href="pagina2.html">
                <svg id="home" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg>
            </a>
        </div>
        <div class="container-fluid">
            <a href="#">
                <svg id="notificacoes" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                </svg>
            </a>
        </div>
        <div class="container-fluid">
            <!-- form de busca -->
            <a href="#">
                <form action="busca_geral.php" class="d-flex" role="search">
                    <input name="produto" id="pesquiza" class="form-control me-2" type="search"
                        placeholder="Pesquise aqui..." aria-label="Search">
                    <button id="pesquiza2" class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </a>
        </div>
        <div class="container-fluid">
            <a href="#">
                <svg id="carrinho" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
            </a>
        </div>
        <div class="container-fluid">
            <a href="#">
                <svg id="user" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill"
                    viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                </svg>
            </a>
        </div>
    </div>
    <!-- dados do prduto - dentro de cada div -->
    <div id="mostrador" class="container-fluid">
        <div id="descricao" class="container-fluid">
            <?php echo $descricao; ?>
        </div>
        <div id="imagem" class="container-fluid">Produto.img
            <?php echo $id_produto; ?>
        </div>
        <div id="produto" class="container-fluid">
            <?php echo $produto; ?>
        </div>
        <button id="favoritos" type="button" class="btn">
            <div id="favoritar" class="container-fluid">
                <input type="number" name="qtd">
            </div>
        </button>
        <div id="valor" class="container-fluid">
            <?php echo " R$ " . $valor; ?>
        </div>
        <div id="venda" class="container-fluid">
            <div id="depois" class="container-fluid"><button type="button" class="btn"><a href="carrinho.php?"></a>Add ao carrinho</button></div>
            <div id="agora" class="container-fluid"><button type="button" class="btn">Comprar agora</button></div>
        </div>
        <div id="avaliacao" class="container-fluid">
            Avaliações
        </div>
        <div id="titulo" class="container-fluid">
            <br><br>
            <form action="avaliacao.php">
                <input type="text" placeholder="Até 500 caracteres" name="comentario">
                <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
                <input type="submit" value="Comentar">
            </form>
            <!-- Exibir outros comentarios -->
            Outras Avaliações:
            <ul class="list-group list-group-flush">

            <?php
            $sql = "SELECT * FROM tb_avaliacao WHERE tb_produto_id_produto = $id_produto";

            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados)) {
                while ($linha = mysqli_fetch_array($resultados)) {
                    $avaliacao = $linha['avaliacao'];
                    $id_usuario = $linha['tb_usuario_id_usuario'];

                    $sql_user = "SELECT nome_usuario FROM tb_usuario WHERE id_usuario = '$id_usuario'";
                    $result_user = mysqli_query($conexao, $sql_user);
                    if (mysqli_num_rows($result_user) > 0) {
                        while ($linha = mysqli_fetch_array($result_user)) {
                            $usuario = $linha['nome_usuario'];

                            echo "<li>". $usuario . ": ". $avaliacao ."</li>";
                            
                        }
                    }
                }
            }
            ?>
            </ul>
        </div>
    </div>
    <!-- rodape vulgo pe2 -->
    <div id="fim" class="container-fluid">
        <img id="pe1" src="imagens/Logo.png">
        <p id="aviso">Este site <a href="pagina2.html"><b><i>Tenebris LTDA</i></b></a> é um trabalho acadêmico,
            desenvolvido com a finalidade de obtenção de nota, o <br>
            mesmo não possui a finalidade de comprir com a tarefa de realizar vendas reais! Por favor não compre
            aqui.<br>
        <h3 id="aviso2">NÃO COMPRE AQUI!</h3>
        </p>
        <div id="pe2" class="container-fluid">
            <div class="container-fluid">
                <a href="#">
                    <svg id="x" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter-x"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                    </svg>
                </a>
            </div>
            <div class="container-fluid">
                <a href="#">
                    <svg id="facebook" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-facebook"
                        viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </a>
            </div>
            <div class="container-fluid">
                <a href="https://www.instagram.com/tenebris.ltda/">
                    <svg id="instagram" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-instagram"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                </a>
            </div>
            <div id="colaborador1" class="container-fluid">Ana Júlia Passos Mercês</div>
            <div id="colaborador2" class="container-fluid">Julian Victor L. Oliveira</div>
            <div id="colaborador3" class="container-fluid">Luís Carlos dos Santos</div>
            <div id="colaborador4" class="container-fluid">Wellison Ferreira</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>