<?php
/**
 *
 *	Model Cadastra Mesa
 */ 
session_start();
include ('../../config.php');
$instrucao = $_POST['instrucao'];
$num_pedido = $_POST['num_pedido'];
$num_mesa = $_POST['num_mesa'];


if ($instrucao == 'cadastra mesa'){

	// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
	$pegaIdPrincipalPedido = "SELECT id,cadastro FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
	$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
	$row=mysqli_fetch_assoc($result);
	$idPrincipalPedido = $row['id'];
	$cadastroPedido = $row['cadastro'];

//$cadastraMesa

	$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";


	if ( $conecta->query($updateMesaNaLinhaPrincipalPedido) === TRUE) {
		echo "sucesso";
	} else {
		echo "falha";
	}

} else {


// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
	$pegaIdPrincipalPedido = "SELECT id,cadastro FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
	$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
	$row=mysqli_fetch_assoc($result);
	$idPrincipalPedido = $row['id'];
	$cadastroPedido = $row['cadastro'];

//$cadastraMesa

	$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";


	if ( $conecta->query($updateMesaNaLinhaPrincipalPedido) === TRUE) {
		echo "sucesso";
	} else {
		echo "falha";
	}
  

}





