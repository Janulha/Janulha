<?php 
session_start();
 require_once 'conexao.php';
 $pasta = "./imagens/";
 
 $extensao = "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
 
 $novo_nome = time() . md5(uniqid()) . time();
 $arquivo_servidor = $pasta . $novo_nome . $extensao;
 
 // echo $arquivo_servidor;
 move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo_servidor);

$nome_pro = $_POST['nome_produto'];
$descri= $_POST ['descricao'];
$cod= $_POST ['codigo'];
$id_ti= $_POST ['id_tipo'];
$valores= $_POST ['valor'];

$id_usuario = $_SESSION['usuario'];

$sql = "INSERT INTO tb_produto (codigo_produto, nome_produto, valor_produto, descricao_produto, imagem_produto, tb_categoria_id_categoria, tb_usuario_id_usuario) 
        VALUES ( '$cod','$nome_pro','$valores', '$descri', '$arquivo_servidor', '$id_ti', '$id_usuario')" ; 

 if (mysqli_query ($conexao,$sql)){
    header('Location: exibir_produtos.php');
    exit();
 }else {
    header('cad_produto.php');
    exit();
 }

?>