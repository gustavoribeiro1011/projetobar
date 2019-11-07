<?php
/**
 *
 *	Model Consuota Produto
 *
 */ 
session_start();
include ('../../config.php');

$categoria = $_POST['categoria'];

$consultaProduto = "SELECT * FROM produtos WHERE categoria = " . $categoria; 

		if ($conecta->query($consultaProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




