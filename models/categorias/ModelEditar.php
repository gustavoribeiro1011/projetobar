<?php
/**
 *
 *	Model Editar Categoria
 *
 */ 
session_start();
include ('../../config.php');

$idcategoria = $_POST['idcategoria'];
$categoria = $_POST['categoria'];

$editarCategoria = "UPDATE categorias SET categoria='$categoria',modificado=now() WHERE id='".$idcategoria."'"; 

		if ($conecta->query($editarCategoria) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


