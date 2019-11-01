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


$cadastrarProduto = "INSERT INTO produtos (produto,categoria,usuario,cadastro) 
VALUES ('$produto','$categoria',".$_SESSION['id'.$app_token].", now() ) "; 

		if ($conecta->query($cadastrarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




