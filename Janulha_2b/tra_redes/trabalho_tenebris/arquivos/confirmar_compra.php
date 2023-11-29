<?php
require_once 'teste_login.php';
require_once 'conexao.php';
// session_start();

// BUSCA DOS DADOS DO USUÁRIO
$user = $_SESSION['usuario'];
$sql = "SELECT * FROM tb_usuario WHERE id_usuario = '$user'";


$resultados = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultados) > 0) {
    while ($linha = mysqli_fetch_array($resultados)) {
        $nome = $linha["nome"];
        $email = $linha["email"];
        $dt_nascimento = $linha["dt_nascimento"];
        $cpf = $linha["cpf"];
        $telefone = $linha["telefone"];
        $endereco = $linha["endereco"];
    }
}

$valor = $_GET['valor'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compras</title>
</head>

<body>
    <h3>Confirme os dados para a compra </h3>
    <table border="1">
        <tr>
            <td colspan="6">Dados do Usuario</td>
        </tr>
        <tr>
            <td>Nome:</td>
            <td>
                <?php echo $nome; ?>
            </td>
            <td>CPF:</td>
            <td>
                <?php echo $cpf; ?>
            </td>
            <td>Data de Nascimento:</td>
            <td>
                <?php echo $dt_nascimento; ?>
            </td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td>
                <?php echo $email; ?>
            </td>
            <td>Telefone:</td>
            <td>
                <?php echo $telefone; ?>
            </td>
            <td>Endereco:</td>
            <td>
                <?php echo $endereco; ?>
            </td>
        </tr>
        <tr>
            <td colspan="6">Produtos: </td>
        </tr>
        <tr>
            <td colspan="2">Codigo</td>
            <td colspan="2">Produto</td>
            <td>Preço(R$)</td>
            <td colspan="2">Qtd.</td>
        </tr>
        <?php
        $qtd_valor = array_combine($_SESSION['carrinho']['produto'], $_SESSION['carrinho']['quantidade_produto']);
        foreach ($qtd_valor as $produtos => $qtd) {
            $sql = "SELECT * FROM tb_produto WHERE id_produtos = '$produtos'";
            $resultados = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultados) > 0) {
                while ($linha = mysqli_fetch_array($resultados)) {

                    $codigo = $linha['codigo_produto'];
                    $produto = $linha['nome_produto'];
                    $preco = $linha['valor_produto'];
                    echo "<tr>";
                    echo "<td colspan='2'>" . $codigo . "</td>";
                    echo "<td colspan='2'>" . $produto . "</td>";
                    echo "<td>" . $preco . "</td>";
                    echo "<td colspan='2'>" . $qtd . "</td>";
                    echo "</tr>";

                }
            }

        }

        ?>
        <tr>
            <td colspan="2">Valor total </td>
            <td colspan="6"> R$ <?php echo $valor;?></td>
        </tr>
    </table>
    <br>
    <button type="button"><a href="compra.php">Confirmar Compra</a></button> 
    <button type="button"> <a href="exibir_carrinho.php">Cancelar</a></button>
</body>

</html>