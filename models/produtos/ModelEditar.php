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
$preco = $_POST['preco'];


$editarProduto = "UPDATE produtos SET produto='$produto', categoria='$categoria', preco='$preco', modificado=now() WHERE id='".$idproduto."'"; 

		if ($conecta->query($editarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


