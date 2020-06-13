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
$agora = ('Y-m-d H:i:s');
$cadastrarCategoria = "INSERT INTO categorias (categoria,icone,usuario,cadastro) 
VALUES ('$categoria','$icone',".$_SESSION['id'.$app_token].", '$agora' ) "; 

		if ($conecta->query($cadastrarCategoria) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




