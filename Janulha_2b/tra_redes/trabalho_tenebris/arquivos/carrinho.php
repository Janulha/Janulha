<?php

  session_start();
  $valor = 0;
  $produto = $_GET['produto'];
  $quantidade = $_GET['quantidade'];

  if (empty($quantidade)) {
    $quantidade = "1";
  }
  if (empty($_SESSION['carrinho']['produto'])) {
    $_SESSION['carrinho']['produto'][] = $produto;
    $_SESSION['carrinho']['quantidade_produto'][] = $quantidade;

  }
  if (in_array($produto, $_SESSION['carrinho']['produto'])) {

    $chave = array_search($produto, $_SESSION['carrinho']['produto']);

    $valor = $_SESSION['carrinho']['quantidade_produto'][$chave] += $valor + $quantidade;

  } else {
    $_SESSION['carrinho']['produto'][] = $produto;
    $_SESSION['carrinho']['quantidade_produto'][] = $quantidade;
  }
  header('Location: exibir_produtos.php');
  exit();
?>