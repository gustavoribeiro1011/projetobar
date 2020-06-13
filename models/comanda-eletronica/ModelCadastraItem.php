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

$id_preco=$_POST['id_preco'];
$preco=$_POST['preco'];
$id_unidade_medida=$_POST['id_unidade_medida'];
$unidade_medida=$_POST['unidade_medida'];
$medida=$_POST['medida'];


$agora = date('Y-m-d H:i:s');
$cadastraItem = "INSERT INTO pedidos
(num_pedido,mesa,origem,id_produto,produto,id_categoria,categoria,id_preco,preco,id_unidade_medida,unidade_medida,medida,status,id_usuario,usuario,cadastro) 
VALUES(
	'".$num_pedido."',
	'".$num_mesa."',
	'comanda eletronica',
	'".$id_produto."',
	'".$produto."',	
	'".$id_categoria."',
	'".$categoria."',
	'".$id_preco."',
	'".$preco."',
	'".$id_unidade_medida."',
	'".$unidade_medida."',
	'".$medida."',
	'item cadastrado',
	'".$_SESSION['id'.$app_token]."',
	'".$_SESSION['login_nome'.$app_token]." ".$_SESSION['sobrenome'.$app_token]."',
	'$agora'
	)
";

// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
$pegaIdPrincipalPedido = "SELECT id FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
$row=mysqli_fetch_assoc($result);
$idPrincipalPedido = $row['id'];

//$cadastraMesa

$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";
$conecta->query($updateMesaNaLinhaPrincipalPedido);

if ( $conecta->query($cadastraItem) === TRUE) {
	echo "sucesso";
} else {
	echo "falha";
}




