<?php
/**
 *
 *	Model Cadastra Categoria
 *
 */ 
session_start();
include ('../../config.php');

$categoria = $_POST['categoria'];

$cadastrarCategoria = "INSERT INTO categorias (categoria,usuario,cadastro) 
VALUES ('$categoria',".$_SESSION['id'.$app_token].", now() ) "; 

		if ($conecta->query($cadastrarCategoria) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




