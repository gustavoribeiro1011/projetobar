<?php
session_start();
include ('../../config.php');

$produto = $_POST['produto'];

$cadastrarProduto = "INSERT INTO produtos (produto,usuario,cadastro) 
VALUES ('$produto',".$_SESSION['id'.$app_token].", now() ) "; 

		if ($conecta->query($cadastrarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




