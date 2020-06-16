<?php
/**
 *
 *	Model Cadastra Produto
 *
 */ 
session_start();

include ('../../config.php');

$produto = $_POST['produto']; // resgata post

$categoria = $_POST['categoria']; // resgata post

$preco = $_POST['preco']; // resgata post

$agora=date("Y-m-d H:i:s");

$cadastrarProduto = "INSERT INTO produtos (produto,categoria,preco,usuario,cadastro) 
VALUES ('$produto','$categoria',$preco,".$_SESSION['id'.$app_token].", '$agora' ) ";

if ( $conecta->query($cadastrarProduto) ) {

	echo "sucesso";

 } else {

	echo "falha";

}