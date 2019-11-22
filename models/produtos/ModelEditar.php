<?php
/**
 *
 *	Model Editar Produto
 *
 */ 
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];
$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$unidade_medida = $_POST['unidade_medida'];
$medida = $_POST['medida'];
$preco = $_POST['preco'];


$editarProduto = "UPDATE produtos SET 
produto='$produto', 
categoria='$categoria',
unidade_medida='$unidade_medida',
medida='$medida',
preco='$preco', 
modificado=now() WHERE id='".$idproduto."'"; 

		if ($conecta->query($editarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


