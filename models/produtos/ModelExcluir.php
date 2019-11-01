<?php
/**
 *
 *	Model Excluir Produto
 *
 */ 
session_start();
include ('../../config.php');

$idproduto = $_POST['idproduto'];

$excluirProduto = "DELETE FROM produtos WHERE id='".$idproduto."'"; 

		if ($conecta->query($excluirProduto) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}


