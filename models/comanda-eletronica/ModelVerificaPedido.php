<?php 
/**
 *
 *	Model Verifica Pedido
 *	
 */ 
session_start();
include ('../../config.php');

$id_usuario = $_SESSION['id'.$app_token];
$nome_usuario = $_SESSION['login_nome'.$app_token] . " ". $_SESSION['sobrenome'.$app_token];

/**
 * STATUS
 * 1 - Inclusão do pedido
 * 2 - Existe 1 pedido sem finalizar
 * 3 - Existe mais de 1 pedido sem finalizar
 */



$verificarPedidoExistente = "SELECT COUNT(num_pedido) as count FROM pedidos ORDER BY num_pedido DESC LIMIT 1"; 

if ($result=mysqli_query($conecta,$verificarPedidoExistente))

{
	$row=mysqli_fetch_assoc($result);

	if ($row['count'] <  1){ //se nao tiver nenhum pedido ou seja, count < 1 faz a primeira inclusão

		$num_pedido = 1;
		$inserePedido = "INSERT INTO pedidos (num_pedido,origem,status,id_usuario,usuario,cadastro)
		VALUES (
			'".$num_pedido."',
			'comanda eletronica',
			'pedido aberto',
			'$id_usuario',
			'$nome_usuario',
			now()
			)"; 

$conecta->query($inserePedido);
$array= array( "status" => '1', "num_pedido" => $num_pedido );
echo json_encode($array);


} else if ($row['count'] > 0){// se já existir pedidos

	$verificaPedidoNaoFinalizado = "SELECT COUNT(num_pedido) count FROM pedidos WHERE status = 'pedido aberto' AND id_usuario = '$id_usuario' ";
	$result=mysqli_query($conecta,$verificaPedidoNaoFinalizado);
	$row=mysqli_fetch_assoc($result);

	if ($row['count'] == 0) { // se nao tiver pedidos sem finalizar

		$pegaUltimoPedido = "SELECT num_pedido FROM pedidos ORDER BY num_pedido DESC LIMIT 1";
		$result=mysqli_query($conecta,$pegaUltimoPedido);
		$row=mysqli_fetch_assoc($result);
		$num_pedido = $row['num_pedido'] + 1;

		$inserePedido = "INSERT INTO pedidos (num_pedido,origem,status,id_usuario,usuario,cadastro)
		VALUES (
			'".$num_pedido."',
			'comanda eletronica',
			'pedido aberto',
			'$id_usuario',
			'$nome_usuario',
			now()
			)"; 

$conecta->query($inserePedido);

$array= array( 'status'=> '1', 'num_pedido' => $num_pedido);
echo json_encode($array);


} else if ($row['count'] == '1') { // se existir um 'pedido em aberto' (sem finalizar)

$pegaUltimoPedidoSemFinalizar = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' AND status = 'pedido aberto' ORDER BY id DESC LIMIT 1";
$result=mysqli_query($conecta,$pegaUltimoPedidoSemFinalizar);
$row=mysqli_fetch_assoc($result);

$array= array('status' => '2', 'num_pedido' => $row['num_pedido'], 'mesa' => $row['mesa']);
echo json_encode($array);

} else if ($row['count'] == 1) { // se existir mais de um pedido sem finalizar
	$array= array('status' => '3');
	echo json_encode($array);
}




}

}



