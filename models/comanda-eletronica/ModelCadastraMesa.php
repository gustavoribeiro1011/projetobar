<?php
/**
 *
 *	Model Cadastra Mesa
 */ 
session_start();
include ('../../config.php');

$num_pedido = $_POST['num_pedido'];
$num_mesa = $_POST['num_mesa'];



// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
$pegaIdPrincipalPedido = "SELECT id FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
$row=mysqli_fetch_assoc($result);
$idPrincipalPedido = $row['id'];

//$cadastraMesa

$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";

//cadastra a data e hora da abertura da mesa na tabela comanda eletronica
$cadastraAberturaMesa = "insert comanda_eletronica (mesa,aberto) values ( $num_mesa, now() )";
$conecta->query($cadastraAberturaMesa);

if ( $conecta->query($updateMesaNaLinhaPrincipalPedido) === TRUE) {
	echo "sucesso";
} else {
	echo "falha";
}




