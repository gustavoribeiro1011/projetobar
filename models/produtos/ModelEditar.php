<?php
/**
 *
 *	Model Editar
 *
 */ 
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];
$produto = $_POST['produto'];

$editarProduto = "UPDATE produtos SET produto='$produto',modificado=now() WHERE id='".$idproduto."'"; 

		if ($conecta->query($editarProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


