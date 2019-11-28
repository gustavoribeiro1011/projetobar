<?php
/**
 *
 *	Model Finalizar Pedido
 *  
 */ 
session_start();
include ('../../config.php');

$num_pedido = $_POST['num_pedido'];


$finalizarPedido = "UPDATE pedidos SET status='pedido em processamento' WHERE num_pedido=".$num_pedido." AND status = 'pedido aberto'";

if ($conecta->query($finalizarPedido) === TRUE) {
	echo "sucesso";
} else {
	echo "falha";
}




