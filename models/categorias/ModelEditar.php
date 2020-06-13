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
$icone = $_POST['icone'];
$agora = ('Y-m-d H:i:s');
$editarCategoria = "UPDATE categorias
SET categoria='$categoria',
icone='$icone',
modificado='$agora'

WHERE id='".$idcategoria."'"; 

		if ($conecta->query($editarCategoria) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


