<?php 
/**
 *
 *	Model Verifica Pedido
 *
 */ 
session_start();
include ('../../config.php');


$data = $_POST['data'];

$verificarPedidoExistente = "SELECT COUNT(num_pedido) as count FROM pedidos ORDER BY num_pedido DESC LIMIT 1"; 

if ($result=mysqli_query($conecta,$verificarPedidoExistente))

{
	$row=mysqli_fetch_assoc($result);

	if ($row['count'] <  1){ //se nao tiver nenhum pedido ou seja, count < 1

		$num_pedido = 1;
		$inserePedido = "INSERT INTO pedidos (num_pedido,origem,status,id_usuario,usuario,cadastro)
		VALUES (
		'".$num_pedido."',
		'comanda eletronica',
		'pedido aberto',
		'".$_SESSION['id'.$app_token]."',
		'".$_SESSION['login_nome'.$app_token]." ".$_SESSION['sobrenome'.$app_token]."',
		now()
	)"; 

	$conecta->query($inserePedido);
	$array= array("num_pedido" => $num_pedido);
	echo json_encode($array);

} else if ($row['count'] > 0){
	$pegaUltimoPedido = "SELECT num_pedido FROM pedidos ORDER BY num_pedido DESC LIMIT 1";
	$result=mysqli_query($conecta,$pegaUltimoPedido);
	$row=mysqli_fetch_assoc($result);
	$num_pedido = $row['num_pedido'] + 1;

	$inserePedido = "INSERT INTO pedidos (num_pedido,origem,status,id_usuario,usuario,cadastro)
	VALUES (
	'".$num_pedido."',
	'comanda eletronica',
	'pedido aberto',
	'".$_SESSION['id'.$app_token]."',
	'".$_SESSION['login_nome'.$app_token]." ".$_SESSION['sobrenome'.$app_token]."',
	now()
)"; 

$conecta->query($inserePedido);

$array= array('num_pedido' => $num_pedido);
echo json_encode($array);


}

}



