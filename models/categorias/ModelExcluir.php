<?php
/**
 *
 *	Model Excluir Categoria
 *
 */ 
session_start();
include ('../../config.php');

$idcategoria = $_POST['idcategoria'];

$excluirCategoria = "DELETE FROM categorias WHERE id='".$idcategoria."'"; 

		if ($conecta->query($excluirCategoria) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


