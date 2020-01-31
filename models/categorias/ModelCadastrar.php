<?php
/**
 *
 *	Model Cadastra Categoria
 *
 */ 
session_start();
include ('../../config.php');

$categoria = $_POST['categoria'];
$icone = $_POST['icone'];

$cadastrarCategoria = "INSERT INTO categorias (categoria,icone,usuario,cadastro) 
VALUES ('$categoria','$icone',".$_SESSION['id'.$app_token].", now() ) "; 

		if ($conecta->query($cadastrarCategoria) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




