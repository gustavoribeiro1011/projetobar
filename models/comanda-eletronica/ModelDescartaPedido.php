<?php
/**
 *
 *	Model Descarta Pedido
 *  
 */ 
session_start();
include ('../../config.php');

$num_pedido = $_POST['num_pedido'];




$descartaPedido = "DELETE FROM pedidos WHERE num_pedido=$num_pedido";

if ($conecta->query($descartaPedido) === TRUE) {


	echo "sucesso";
} else {
	echo "falha";
}




