<?php
/**
 *
 *	Model Cadastra Produto
 *
 */ 
session_start();
include ('../../config.php');

$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];



$cadastrarProduto = "INSERT INTO produtos (produto,categoria,preco,usuario,cadastro) 
VALUES ('$produto','$categoria','$preco',".$_SESSION['id'.$app_token].", now() ) "; 

		if ($conecta->query($cadastrarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




