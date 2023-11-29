<?php
require_once 'teste_login.php';
require_once 'conexao.php';

$data = date('Y-m-d');

$user = $_SESSION['usuario'];

//Cadastro na tabela venda
foreach ($_SESSION['carrinho']['quantidade_produto'] as $chave_qtd => $qtd) {

    $sql = "INSERT INTO tb_venda (data_venda, qtd_vendida, tb_usuario_id_usuario) VALUES ('$data', '$qtd', '$user')";

    mysqli_query($conexao, $sql);
}
//cadastro na tabela produtos_venda
$sql = "SELECT id_venda FROM tb_venda";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_array($resultado)) {
        $id_venda = $linha["id_venda"];

        foreach ($_SESSION['carrinho']['produto'] as $chave_produto => $prod) {
            $sql = "INSERT INTO tb_produtos_venda (tb_produtos_id_produtos, tb_venda_id_venda) VALUES ('$prod', '$id_venda')";
            mysqli_query($conexao, $sql);
        }
    }
}
unset($_SESSION['carrinho']);

header('Location: exibir_carrinho.php');
exit();
?>