<?php
/**
 *
 *	Model Cadastra Item do Pedido
 *
 */ 
session_start();
include ('../../config.php');

$num_pedido = $_POST['num_pedido'];
$num_mesa = $_POST['num_mesa'];
$id_categoria = $_POST['id_categoria'];
$categoria = $_POST['categoria'];
$id_produto = $_POST['id_produto'];
$produto = $_POST['produto'];
$preco = $_POST['preco'];


$cadastraItem = "INSERT INTO pedidos 
(num_pedido,mesa,origem,id_produto,produto,preco,id_categoria,categoria,status,id_usuario,usuario,cadastro) 
VALUES(
	'".$num_pedido."',
	'".$num_mesa."',
	'comanda eletronica',
	'".$id_produto."',
	'".$produto."',
	'".$preco."',
	'".$id_categoria."',
	'".$categoria."',
	'item cadastrado',
	'".$_SESSION['id'.$app_token]."',
	'".$_SESSION['login_nome'.$app_token]." ".$_SESSION['sobrenome'.$app_token]."',
	now()
	)
";

// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
$pegaIdPrincipalPedido = "SELECT id FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
$row=mysqli_fetch_assoc($result);
$idPrincipalPedido = $row['id'];

//$cadastraMesa

$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";


if ( $conecta->query($cadastraItem) === TRUE AND $conecta->query($updateMesaNaLinhaPrincipalPedido) === TRUE) {
	echo "sucesso";
} else {
	echo "falha";
}




