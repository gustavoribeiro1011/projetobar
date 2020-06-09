<?php 
/**
 *
 *	Model Verifica Pedido
 *	
 */ 
session_start();
include ('../../config.php');

$agora = date("Y-m-d H:i:s");

$id_usuario = $_SESSION['id'.$app_token];
$nome_usuario = $_SESSION['login_nome'.$app_token] . " ". $_SESSION['sobrenome'.$app_token];

/**
 * STATUS
 * 1 - Inclusão do pedido
 * 2 - Existe 1 pedido sem finalizar
 * 3 - Existe mais de 1 pedido sem finalizar
 * 4 - Nenhuma mesa foi cadastrada
 * 5 - Cadastro de novo item
 * 6 - Voltar para tela resumo de pedidos
 * 7 - Voltar para tela categorias
 * 8 - Voltar para tela produtos
 * 9 - Voltar para tela mesas
 * 10 - novo pedido
 */


$verificaMesasExistente = "SELECT count(id) count FROM mesas";
$result=mysqli_query($conecta,$verificaMesasExistente);
$qtd_mesas=mysqli_fetch_assoc($result);


if ( $qtd_mesas['count'] > 0 ) {


	$verificarPedidoExistente = "SELECT COUNT(num_pedido) as count FROM pedidos WHERE id_usuario = '$id_usuario' ORDER BY num_pedido DESC LIMIT 1"; 

	if ($result=mysqli_query($conecta,$verificarPedidoExistente))

	{
		$row=mysqli_fetch_assoc($result);

	if ($row['count'] <  1){ //se nao tiver nenhum pedido ou seja, count < 1 faz a primeira inclusão

		
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
$id_num_pedido = $conecta->insert_id;

$pegaDataDoPedido = "select * from pedidos where id =".$id_num_pedido;
$resultpegaDataDoPedido=mysqli_query($conecta,$pegaDataDoPedido);
$rowpegaDataDoPedido=mysqli_fetch_assoc($resultpegaDataDoPedido);


$array= array( 
	"status" => '1',
	"id_num_pedido" => $id_num_pedido,
	"num_pedido" => $num_pedido,
	"cadastro" => $rowpegaDataDoPedido['cadastro'] 	

	);
echo json_encode($array);


} else if ($row['count'] > 0){// se existir pedidos

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
$id_num_pedido = $conecta->insert_id;

$pegaDataDoPedido = "select * from pedidos where id =".$id_num_pedido;
$resultpegaDataDoPedido=mysqli_query($conecta,$pegaDataDoPedido);
$rowpegaDataDoPedido=mysqli_fetch_assoc($resultpegaDataDoPedido);


$_SESSION['cardmesa'.$app_token] = 'ativo'; 

$array= array( 
'status'=> '1',
'num_pedido' => $num_pedido,
'cadastro' => $rowpegaDataDoPedido['cadastro'],
'num_comanda' => $rowpegaDataDoPedido['num_comanda']
);
echo json_encode($array);


} else if ($row['count'] == '1') { // se existir um 'pedido em aberto' (sem finalizar)

$pegaUltimoPedidoSemFinalizar = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' AND status = 'pedido aberto' ORDER BY id DESC LIMIT 1";
$result=mysqli_query($conecta,$pegaUltimoPedidoSemFinalizar);
$row=mysqli_fetch_assoc($result);

$id_num_pedido = $row['id'];

$pegaDataDoPedido = "select * from pedidos where id =".$id_num_pedido;
$resultpegaDataDoPedido=mysqli_query($conecta,$pegaDataDoPedido);
$rowpegaDataDoPedido=mysqli_fetch_assoc($resultpegaDataDoPedido);


if($row['param_1'] == ''){

$array= array(
'status' => '2',
'id_num_pedido' => $row['id'],
'num_pedido' => $row['num_pedido'],
'num_mesa' => $row['mesa'],
'cadastro' => $rowpegaDataDoPedido['cadastro'],
'num_comanda' => $row['num_comanda']
);

echo json_encode($array);

} else if ($row['param_1'] == 'novo item'){

	$array= array('status' => '5', 'num_pedido' => $row['num_pedido'], 'num_mesa' => $row['mesa']);

	echo json_encode($array);
}
else if ($row['param_1'] == 'voltar para tela resumo de pedidos'){

	$array= array('status' => '6', 'num_pedido' => $row['num_pedido'], 'num_mesa' => $row['mesa']);

	echo json_encode($array);
}
else if ($row['param_1'] == 'voltar para tela categorias'){

	$array= array('status' => '7', 'num_pedido' => $row['num_pedido'], 'num_mesa' => $row['mesa']);

	echo json_encode($array);
}
else if ($row['param_1'] == 'voltar para tela produtos'){

	$array= array('status' => '8', 'num_pedido' => $row['num_pedido'], 'num_mesa' => $row['mesa'], 'id_categoria' => $row['param_2'],'categoria' => $row['param_3']);

	echo json_encode($array);
}
else if ($row['param_1'] == 'voltar para tela mesas'){

	$array= array('status' => '9', 'num_pedido' => $row['num_pedido'], 'num_mesa' => $row['mesa']);

	echo json_encode($array);
}
else if ($row['param_1'] == 'novo pedido'){

	$array= array('status' => '10', 'num_pedido' => $row['num_pedido'], 'num_mesa' => $row['param_2']);

	echo json_encode($array);
}

} else if ($row['count'] == 1) { // se existir mais de um pedido sem finalizar

	$array= array('status' => '3');

	echo json_encode($array);
	
}




}

}
} else {
	$array= array('status' => '4');
	echo json_encode($array);
}


