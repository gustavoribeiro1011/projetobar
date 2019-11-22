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
$unidade_medida = $_POST['unidade_medida'];
$medida = $_POST['medida'];
$preco = $_POST['preco'];



$cadastrarProduto = "INSERT INTO produtos (produto,categoria,unidade_medida,medida,preco,usuario,cadastro) 
VALUES ('$produto','$categoria','$unidade_medida','$medida','$preco',".$_SESSION['id'.$app_token].", now() ) "; 

		if ($conecta->query($cadastrarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




