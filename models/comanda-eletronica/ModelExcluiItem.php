<?php
/**
 *
 *	Model Exclui Item da tela Resumo de Pedidos
 *
 */ 
session_start();
include ('../../config.php');

$id = $_POST['item'];



$excluiItem = "DELETE FROM pedidos WHERE id=".$id;

if ($conecta->query($excluiItem) === TRUE) {
	echo "sucesso";
} else {
	echo "falha";
}




