<?php
/**
 *
 *	Model Cadastra Mesa
 *
 */ 
session_start();
include ('../../config.php');

$num_pedido = $_POST['num_pedido'];
$num_mesa = $_POST['num_mesa'];

$cadastraMesa = "UPDATE pedidos SET mesa='".$num_mesa."' WHERE num_pedido = ".$num_pedido." AND status = 'pedido aberto'"; 

		if ($conecta->query($cadastraMesa) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




